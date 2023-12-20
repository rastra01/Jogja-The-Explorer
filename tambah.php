<?php

include 'koneksi.php';

if( isset($_POST["submit"])) {

    if(tambah($_POST) > 0 ) {
        echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'dashbord.php';
        </script>
        ";
    }else {
        echo "
        <script>
        alert('data berhasil ditambahkan!');
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
    <link rel="stylesheet" href="css/create.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Jadwal Aksi</h1>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required>
                </li>
                <li>
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" required>
                </li>
                <li>
                    <label for="kegiatan">Kegiatan</label>
                    <textarea name="kegiatan" id="kegiatan" cols="30" rows="10" required></textarea>
                </li>
                <li>
                    <button type="submit" name="submit"><b>Tambahkan</b></button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
