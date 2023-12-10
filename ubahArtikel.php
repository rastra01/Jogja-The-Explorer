<?php

include 'koneksi.php';

$id = $_GET["id"];

// Pastikan $id adalah angka
if (!is_numeric($id)) {
    // Handle error, misalnya redirect ke halaman error
    header("Location: error.php");
    exit;
}

$artikel = query("SELECT * FROM artikelaksi WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
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
</head>

<body>
    <h1>Ubah Jadwal Aksi</h1>

    <!-- ... (kode sebelumnya tetap sama) -->

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $artikel["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $artikel["gambarArtikel"]; ?>">
        <ul>
            <li>
                <label for="judulArtikel">Judul Artikel</label>
                <input type="text" name="judulArtikel" id="judulArtikel" required value="<?= $artikel["judulArtikel"]; ?>">
            </li>
            <li>
                <label for="isiArtikel">Kegiatan</label>
                <textarea name="isiArtikel" id="isiArtikel" cols="30" rows="10" required><?= $artikel["isiArtikel"]; ?></textarea>
            </li>
            <li>
                <label for="gambarArtikel">Gambar Artikel</label>
                <img src="foto/<?= $artikel["gambarArtikel"]; ?>" alt="gambar" width="50">
                <input type="file" name="gambarArtikel" id="gambarArtikel">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>
</body>

</html>

</body>

</html>
