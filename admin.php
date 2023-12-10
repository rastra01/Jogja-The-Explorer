<?php
include 'function.php'; // Include the CRUD operations file

if (isset($_POST['addImage'])) {
    $description = $_POST['description'];
    $imagePath = uploadImage(); // Upload image and get the file path
    addImage($imagePath, $description);
}

if (isset($_POST['deleteImage'])) {
    $imageId = $_POST['imageId'];
    deleteImage($imageId);
}

$images = getAllImages(); // Fetch all images

function uploadImage() {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["addImage"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            return $target_file; // Return the file path
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Admin Page - Jogja The Explore</title>
</head>
<body class="body">
    <header>
        <h1>Admin Page - Jogja The Explore</h1>
    </header>

    <div class="admin-container">
        <!-- Add Image Form -->
        <div class="form-container">
            <h2>Tambah Gambar Kuliner</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <label for="description">Deskripsi:</label>
                <input type="text" id="description" name="description" required>

                <label for="image">Gambar:</label>
                <input type="file" id="image" name="image" accept="image/*" required>

                <button type="submit" name="addImage">Tambah Gambar</button>
            </form>
        </div>

        <!-- Delete Image Form -->
        <div class="form-container">
            <h2>Hapus Gambar Kuliner</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <label for="imageId">Pilih ID Gambar:</label>
                <input type="number" id="imageId" name="imageId" required>

                <button type="submit" name="deleteImage">Hapus Gambar</button>
            </form>
        </div>

        <!-- Display Images -->
        <div class="image-container">
            <?php
            foreach ($images as $image) {
                echo '<div class="admin-image-item">';
                echo '<img src="' . $image['image_path'] . '" alt="' . $image['description'] . '">';
                echo '<div class="image-description">' . $image['description'] . '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
