<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/peduli.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Jogja The Explore</title>
</head>
<body class="body">
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="coba.html">Home</a></li>
                    <li><a href="Donasi.php">Donasi</a></li>
                </ul>
            </nav>
            <div class="extra">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown_menu">
                <ul>
                    <li><a href="coba.html">Home</a></li>
                    <li><a href="Donasi.php">Donasi</a></li>
                </ul>
            </div>
        </div>
    </header>

    <?php
    include 'koneksi.php';
    $resultJadwal = mysqli_query($conn, "SELECT * FROM jadwal");
    $resultArtikel = mysqli_query($conn, "SELECT * FROM artikelaksi");
    ?>

    <div class="judul"><h1>Jadwal Aksi Peduli Lingkungan</h1></div>
    <div class="gallery-container">
        <?php
        while ($rowJadwal = mysqli_fetch_array($resultJadwal, MYSQLI_ASSOC)) {
            $namaBulan = $rowJadwal['nama'];
            $tanggal = $rowJadwal['tanggal'];
            $kegiatan = $rowJadwal['kegiatan'];
        ?>
        <div class="month">
            <h2><?php echo $namaBulan; ?></h2>
            <span class="tanggal"><?php echo $tanggal; ?></span>
            <p><?php echo $kegiatan; ?></p>
        </div>
        <?php
        }
        ?>
    </div>

    <h2>Dokumentasi Aksi Peduli Lingkungan</h2>

    <div class="article-container">
        <?php
        while ($rowArtikel = mysqli_fetch_array($resultArtikel, MYSQLI_ASSOC)) {
            $judulArtikel = $rowArtikel['judulArtikel'];
            $isiArtikel = $rowArtikel['isiArtikel'];
            $gambarArtikel = $rowArtikel['gambarArtikel'];
        ?>
        <div class="article">
            <img src="<?php echo $gambarArtikel; ?>" alt="Dokumentasi Aksi">
            <div class="article-content">
                <h3><?php echo $judulArtikel; ?></h3>
                <p><?php echo $isiArtikel; ?></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
