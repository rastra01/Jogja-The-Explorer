<?php
// Pastikan Anda sudah menghubungkan ke database sebelum menggunakan script ini
// Gantilah nilai-nilai berikut sesuai dengan informasi database Anda
$host = "localhost";
$username = "root";
$password = "";
$database = "4unity";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jumlah = $_POST["jumlah"];
    $pesan = $_POST["pesan"];

    // Query untuk menyimpan data ke dalam tabel donasi
    $sql = "INSERT INTO donasi (namaDonasi, emailDonasi, jumlahDonasi, pesanDonasi) VALUES ('$nama', '$email', '$jumlah', '$pesan')";

    $successStyle = 'style="background-color: #dff0d8; border: 1px solid #3c763d; color: #3c763d; padding: 15px; margin-bottom: 20px;"';
    
    // Gaya untuk tombol kembali
    $backButtonStyle = 'style="display: inline-block; padding: 8px 15px; font-size: 16px; font-weight: bold; text-decoration: none; background-color: #5cb85c; color: #fff; border-radius: 5px;"';
    
    // Gaya untuk pesan error
    $errorStyle = 'style="background-color: #f2dede; border: 1px solid #a94442; color: #a94442; padding: 15px; margin-bottom: 20px;"';
    
    if (mysqli_query($conn, $sql)) {
        // Pesan keberhasilan dengan tautan atau tombol kembali
        echo '<div ' . $successStyle . '>';
        echo '<p>Terima kasih atas donasinya!</p>';
        echo '<p>Donasi berhasil disimpan.</p>';
        echo '<a href="coba.html" ' . $backButtonStyle . '>Kembali ke Halaman Utama</a>';
        echo '</div>';
    } else {
        // Pesan error jika terjadi kesalahan
        echo '<div ' . $errorStyle . '>';
        echo '<p>Error: ' . mysqli_error($conn) . '</p>';
        echo '<p>Silakan coba lagi nanti.</p>';
        echo '</div>';
    }
    
    
}

mysqli_close($conn);
?>
