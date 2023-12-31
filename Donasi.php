<?php
include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.0"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/donatee.css">
    <title>Formulir Donasi</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="coba.html">Home</a></li>
                    <li><a href="Donasi.php">Donasi</a></li>
                </ul>
            </nav>
            <div class="extra">
                <!-- <a href="login.html">Sign In</a> -->
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown_menu">
                <li><a href="coba.html">Home</a></li>
                <li><a href="Donasi.php">Donasi</a></li>
                <li class="signin-btn"><a href="login.html">Sign In</a></li>
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
    
    <div class="donation-container">
        <div class="donation-content">
            <h2>Aksi Peduli Lingkungan</h2>
            <p>
                Dukung misi kami untuk melestarikan lingkungan dengan memberikan donasi. Setiap kontribusi Anda membantu
                dalam proyek-proyek seperti reboisasi hutan, pembersihan pantai, dan pengelolaan limbah. Bersama, kita dapat
                menciptakan lingkungan yang lebih baik untuk generasi mendatang.
            </p>
            <div class="donation-form" id="formContainer">
                <h3>Formulir Donasi</h3>
                <form id="donationForm" action="process_donation.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
            
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <label for="kegiatan">Pilih Kegiatan:</label>
                    <select name="kegiatan" id="kegiatan">
                        <?php
                        $resultJadwal = mysqli_query($conn, "SELECT * FROM jadwal");
                        while ($rowJadwal = mysqli_fetch_array($resultJadwal, MYSQLI_ASSOC)) {
                            $kegiatanOption = $rowJadwal['nama'];
                            echo '<option value="' . $kegiatanOption . '">' . $kegiatanOption . '</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Donasi (IDR):</label>
                        <input type="number" id="jumlah" name="jumlah" required>
                    </div>
            
                    <div class="form-group">
                        <label for="metode">Metode Pembayaran:</label>
                        <div class="payment-method">
                            <img src="css/qris.jpg" alt="QRIS">
                        </div>
                    </div>
                    
            
                    <div class="form-group">
                        <label for="pesan">Pesan:</label>
                        <textarea name="pesan" id="pesan" cols="30" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>
            
                    <button type="submit">Donasi Sekarang</button>
                </form>
            </div>
            
        </div>
    </div>

    <script src="js/donasi.js"></script>
</body>
</html>
