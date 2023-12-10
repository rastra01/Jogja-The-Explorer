<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Pantai Parangtritis</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="destinasi.html">Home</a></li>
                    <li><a href="wisataalam.html">Wisata Alam</a></li>
                    <li><a href="edukasirekreasi.html">Edukasi & Rekreasi</a></li>
                    <li><a href="wisatakuliner.html"> Wisata kuliner</a></li>
                    <li><a href="pusatbelanja.html"> Pusat Belanja</a></li>
                </ul>
            </nav>
            <div class="extra">
                <!-- <a href="login.html">Sign In</a> -->
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown_menu">
                <li><a href="destinasi.html">Home</a></li>
                <li><a href="wisataalam.html">Wisata Alam</a></li>
                <li><a href="edukasirekreasi.html">Edukasi & Rekreasi</a></li>
                <li><a href="wisatakuliner.html"> Wisata kuliner</a></li>
                <li><a href="pusatbelanja.html">Pusat Belanja</a></li>
                <!-- <li class="signin-btn"><a href="login.html">Sign In</a></li> -->
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
    // Mendapatkan judul dari parameter URL (misalnya, judul disimpan dalam parameter GET dengan nama 'judul')
    $judul = isset($_GET['judul']) ? $_GET['judul'] : '';

    // Melakukan query ke database untuk mengambil data berdasarkan judulAlam
    $result = mysqli_query($conn, "SELECT * FROM penalam WHERE judulAlam = '$judul'");
?>

<section class="konten">
    <div class="hero">
        <?php
            // Mengambil setiap baris data dari hasil query
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                // Mengambil nilai dari kolom-kolom yang dibutuhkan
                $gambar = $row['gambarAlam'];
                $judul = $row['judulAlam'];
                $deskripsi = $row['deskripsiAlam'];
        ?>
            <!-- Menampilkan judul dan gambar di dalam elemen hero -->
            <h2><?php echo htmlspecialchars($judul); ?></h2>
            <img src="<?php echo htmlspecialchars($gambar); ?>" alt="<?php echo htmlspecialchars($gambar); ?>">
        <?php
            }
        ?>
    </div>
    <div class="des">
        <?php
            // Mengatur pointer hasil kembali ke awal
                mysqli_data_seek($result, 0);

            // Mengambil setiap baris data dari hasil query (loop kedua)
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $judul = $row['judulAlam'];
                    $deskripsi = $row['deskripsiAlam'];
            ?>
                <!-- Menampilkan judul, deskripsi, dan lokasi di dalam elemen des -->
                    <h2><?php echo htmlspecialchars($judul); ?></h2>
                    <p><?php echo htmlspecialchars($deskripsi); ?></p>
            <?php
            }
            ?>
       </div>
    </section>

    <footer>
        <div id="Tentang" class="footer-column">
            <h3>Patment Method</h3><br>
                <div class="credit-card">
                    <img src="css/Logo PayPal.png" alt="paypal" style="width: 100px;">
                    <img src="css/Logo OVO.png" alt="OVO" style="width: 100px;">
                    <img src="css/Logo DANA.png" alt="dana" style="width: 100px;">
                </div>
        </div>
        <div class="footer-column">
            <h2>Tentang Kami</h2><br>
            <p>Kami berkomitmen untuk ekowisata dan berdedikasi dalam melestarikan keajaiban yang ada di Jogjakarta. Bergabunglah dengan kami dalam misi kami untuk melindungi lingkungan bagi generasi mendatang.</p>
        </div>
        <div class="footer-column">
            <div class="kontak">
                <div>
                    <i class="fa-solid fa-location-dot"></i>
                    <p><span>Indonesia</span>Jogjakarta, Sleman</p>
                </div>
               
                <div>
                    <i class="fa-solid fa-phone"></i>
                    <p>+62 029-422-432</p>
                </div>
                <div>
                    <i class="fa-solid fa-envelope"></i>
                    <p><a href="#">support@gmail.com</a></p>
                </div>
            </div><br>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-tiktok"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
    </footer>
</body>
</html>

