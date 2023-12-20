<?php

include 'koneksi.php';

$id = $_GET["id"];

// Pastikan $id adalah angka
if (!is_numeric($id)) {
    // Handle error, misalnya redirect ke halaman error
    header("Location: error.php");
    exit;
}

$jadwal = query("SELECT * FROM jadwal WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!');
        document.location.href = 'dashbord.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'dashbord.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Jadwal Aksi</title>
    <link rel="stylesheet" href="css/create.css">
</head>

<body>
    <div class="container">
        <h1>Ubah Jadwal Aksi</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $jadwal["id"]; ?>">
            <ul>
                <li>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required value="<?= $jadwal["nama"]; ?>">
                </li>
                <li>
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" required value="<?= $jadwal["tanggal"]; ?>">
                </li>
                <li>
                    <label for="kegiatan">Kegiatan</label>
                    <textarea name="kegiatan" id="kegiatan" cols="30" rows="10" required><?= $jadwal["kegiatan"]; ?></textarea>
                </li>
                <li>
                    <button type="submit" name="submit">Ubah</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>
