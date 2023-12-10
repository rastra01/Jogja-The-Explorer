<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kuliner.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script type="module" src=".js" defer></script>
    <title>jogja the exploree</title>
</head>
<body class="body">
<header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="coba.html">Home</a></li>
                <li><a href="wisataAlam.php">Wisata Alam</a></li>
                <li><a href="edukasiRekreasi.php">Edukasi & Rekreasi</a></li>
                <li><a href="wisataKuliner.php"> Wisata kuliner</a></li>
                <li><a href="pusatBelanja.php"> Pusat Belanja</a></li>
                <li><a href="destinasi.html"> Lihat Semua</a></li>

            </ul>
        </nav>
        <div class="extra">
            <!-- <a href="login.html">Sign In</a> -->
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="dropdown_menu">
            <li><a href="coba.html">Home</a></li>
            <li><a href="wisataAlam.php">Wisata Alam</a></li>
            <li><a href="edukasiRekreasi.php">Edukasi & Rekreasi</a></li>
            <li><a href="wisataKuliner.php"> Wisata kuliner</a></li>
            <li><a href="pusatBelanja.php"> Pusat Belanja</a></li>
            <li><a href="lihatSemua.php"> Lihat Semua</a></li>

        </div>
    </div>
</header>
<script>
    const extra = document.querySelector('.extra')
    const extraicon = document.querySelector('.extra i')
    const dropdownmenu = document.querySelector('.dropdown_menu')
    
    
    extra.onclick = function () {
      dropdownmenu.classList.toggle('open')
      const isOpen = dropdownmenu.classList.contains('open')

      extraicon.classList = isOpen
        ? 'fa-solid fa-xmark'
        : 'fa-solid fa-bars'
    }
</script>

<?php
$result = mysqli_query($conn, "SELECT * FROM wisatakuliner");
?>

<br><br>
    <div class="gallery-container">
        <h2>Wisata Kuliner</h2>
        <div class="image-grid">
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $gambar = $row['gambarKuliner'];
                $judul = $row['judulKuliner'];
            ?>
                <div class="image-item">
                    <a href="deatil_kuliner.php?judul=<?php echo urlencode($judul); ?>">
                        <img src="<?php echo $gambar; ?>" alt="<?php echo $judul; ?>">
                    </a>
                    <div class="image-description">
                        <a href="detail_kuliner.php?judul=<?php echo urlencode($judul); ?>"><?php echo $judul; ?></a>
                </div>
           </div>
            <?php
            }
            ?>
        </div>
    </div>

    
</body>
</html>

