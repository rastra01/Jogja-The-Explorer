<?php

include 'koneksi.php';

if (isset($_POST["submit"])) {
    if (tambahArtikel($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'dashbord.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan!');
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
    <title>Tambah Jadwal Aksi</title>
</head>
<body>
    <h1>Tambah Jadwal Aksi</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="judulArtikel">Judul Artikel</label>
                <input type="text" name="judulArtikel" id="judulArtikel" required>
            </li>
            <li>
                <label for="isiArtikel">Kegiatan</label>
                <textarea name="isiArtikel" id="isiArtikel" cols="30" rows="10" required></textarea>
            </li>
            <li>
                <label for="gambarArtikel">Gambar Artikel</label>
                <input type="file" name="gambarArtikel" id="gambarArtikel" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambahkan</button>
            </li>
        </ul>
    </form>
</body>
</html>
