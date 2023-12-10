<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jadwal.css">
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
                <li><a href="Donasi.html">Donasi</a></li>
            </ul>
        </nav>
        <div class="extra">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="dropdown_menu">
            <li><a href="coba.html">Home</a></li>
            <li><a href="Donasi.html">Donasi</a></li>
        </div>
    </div>
</header>
<script>
   // Ganti script JavaScript yang ada dengan yang berikut
document.addEventListener("DOMContentLoaded", function () {
    const extra = document.querySelector('.extra');
    const extraIcon = document.querySelector('.extra i');
    const dropdownMenu = document.querySelector('.dropdown_menu');

    extra.onclick = function () {
        dropdownMenu.classList.toggle('open');
        const isOpen = dropdownMenu.classList.contains('open');

        extraIcon.className = isOpen
            ? 'fa-solid fa-xmark'
            : 'fa-solid fa-bars';
    };
});

</script>

<?php
$resultJadwal = mysqli_query($conn, "SELECT * FROM jadwal");
$resultArtikel = mysqli_query($conn, "SELECT * FROM artikelaksi");

// Query untuk mengambil data bulan
?>
<div class="judul"><h1>Jadwal Aksi Peduli Lingkungan</h1><br></div>
<div class="gallery-container">

    <?php
    // Menampilkan data bulan
    while ($rowJadwal = mysqli_fetch_array($resultJadwal, MYSQLI_ASSOC)) {
        $namaBulan = $rowJadwal['nama'];
        $tanggal = $rowJadwal['tanggal'];
        $kegiatan = $rowJadwal['kegiatan'];
    ?>
    <!-- Tampilkan Kegiatan untuk Setiap Bulan -->
    <div class="month">
        <h2><?php echo $namaBulan; ?></h2>
        <span class="tanggal"><?php echo $tanggal; ?></span><br>
        <p><?php echo $kegiatan; ?></p>
    </div>
    <?php
    }
    ?>
</div>

<h2>Dokumentasi Aksi Peduli Lingkungan</h2>

<!-- Tampilkan Artikel -->
<div class="article-container">
    <?php
    while ($rowArtikel = mysqli_fetch_array($resultArtikel, MYSQLI_ASSOC)) {
        $judulArtikel = $rowArtikel['judulArtikel'];
        $isiArtikel = $rowArtikel['isiArtikel'];
        $gambarArtikel = $rowArtikel['gambarArtikel'];
    ?>
    <div class="article">
        <img src="<?php echo $gambarArtikel; ?>" alt="p">
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
