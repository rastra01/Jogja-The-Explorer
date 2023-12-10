<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogja the Explorer</title>
    <link rel="stylesheet" type="text/css" href="css/crud.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Trigger the showContent function for the default content (e.g., 'jadwal-content')
            showContent('jadwal-content');
        });
    </script>
</head>
<body>
    <div class="menuToggle"></div>
    <div class="sidebar">
        <ul>
            <li class="logo" style="--bg: #333;">
                <a href="#">
                    <div class="icon">
                        <img src="foto/Logo JTE (2).png" alt="logo">
                    </div>
                    <div class="text">Jogja the Explorer</div>
                </a>
            </li>
            <div class="Menulist">
                <li style="--bg: #ffa117;" class="active">
                    <a href="#" onclick="showContent('jadwal-content')">
                        <div class="icon"><ion-icon name="calendar-outline"></ion-icon></div>
                        <div class="text">Jadwal</div> 
                    </a>
                </li>
                <li style="--bg: #0fc70f;">
                    <a href="#" onclick="showContent('artikel-content')">
                        <div class="icon"><ion-icon name="newspaper-outline"></ion-icon></div>
                        <div class="text">Data Donasi</div> 
                    </a>
                </li>
                <li style="--bg: #0fc70f;">
                    <a href="#" onclick="showContent('donasi-content')">
                        <div class="icon"><ion-icon name="folder-outline"></ion-icon></ion-icon></div>
                        <div class="text">Data Donasi</div> 
                    </a>
                </li>
            </div>
            <div class="bottom">
                <li style="--bg: #333;">
                    <a href="#">
                        <div class="icon">
                            <div class="imgBx">
                                <img src="foto/profile.jpg" alt="profile">
                            </div> 
                        </div>
                        <div class="text">Aryajati</div> 
                    </a>
                </li>  
                
                <li style="--bg: #333;">
                    <a href="#">
                        <div class="icon"><ion-icon name="log-out-outline"></ion-icon></div>
                        <div class="text">Logout</div> 
                    </a>
                </li>
            </div>
        </ul>
    </div>
    <?php
    $resultJadwal = mysqli_query($conn, "SELECT * FROM jadwal");

    //$jadwal=mysqli_fetch_assoc($resultJadwal);
    //var_dump($jadwal);
    ?>
    <div id="jadwal-content" class="content">
    <h1>Jadwal</h1>
    <div class="event-container">
        <div class="event">
            <div class="event-info">
                <table border="1" cellpadding="10" cellspacing="0">
                <a href="tambah.php">Tambah</a>|
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Bulan</th>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                    </tr>
                    <tr>
                    <?php $i = 1; ?>
                    <?php while($row = mysqli_fetch_assoc($resultJadwal)) : ?>
                        <td><?= $i ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>|
                            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                            return confirm('yakin?');">delete</a>
                        </td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["tanggal"]; ?></td>
                        <td><?= $row["kegiatan"]; ?></td>
                    </tr>
                     <?php $i++; ?>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php
    $resultArtikel = mysqli_query($conn, "SELECT * FROM artikelaksi");

    //$jadwal=mysqli_fetch_assoc($resultJadwal);
    //var_dump($jadwal);
    ?>
    <div id="artikel-content" class="content">
    <h1>Jadwal</h1>
    <div class="event-container">
        <div class="event">
        <a href="tambahArtikel.php">Tambah</a>
            <div class="event-info">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Judul</th>
                        <th>Kegiatan</th>
                        <th>Gambar</th>
                    </tr>
                    <tr>
                    <?php $i = 1; ?>
                    <?php while($row = mysqli_fetch_assoc($resultArtikel)) : ?>
                        <td><?= $i ?></td>
                        <td>
                            <a href="ubahArtikel.php?id=<?= $row["id"]; ?>">ubah</a>|
                            <a href="hapusArtikel.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">delete</a>
                        </td>
                        <td><?= $row["judulArtikel"]; ?></td>
                        <td><?= $row["isiArtikel"]; ?></td>
                        <td><img src="<?= $row["gambarArtikel"]; ?>" alt="gambar" width="100"></td>
                    </tr>
                     <?php $i++; ?>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    </div>

    <?php
        $result = mysqli_query($conn, "SELECT * FROM donasi");
        ?>
    <div id="donasi-content" class="content">
        <h1>Data artikel</h1>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $namaDonasi = $row['namaDonasi'];
            $jumlahDonasi = $row['jumlahDonasi'];
            $pesanDonasi = $row['pesanDonasi'];
        ?>
        <div class="donasi-container">
            <div class="donasi">
               <h4>Nama : <?php echo $namaDonasi; ?></h3>
               <a>Jumlah Donasi : <?php echo $jumlahDonasi; ?></a>
               <p>Pesan : <?php echo $pesanDonasi; ?></p>
            </div>
            <?php
            } // Menutup tag PHP
            ?>
        </div>
        </div>
           
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/dashbord.js"></script>

</body>
</html>
