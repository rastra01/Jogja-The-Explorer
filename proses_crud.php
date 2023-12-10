<?php
include("koneksi.php");

// Operasi Tambah Data (Create)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah_event"])) {
    $event_date = $_POST["Tanggal"];
    $event_description = $_POST["Kegiatan"];

    $sql = "INSERT INTO jadwalKegiatan (Tanggal, Kegiatan) VALUES ('$event_date','$event_description')";

    if ($conn->query($sql) === TRUE) {
        echo "Event berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Operasi Menampilkan Data (Read)
$sql = "SELECT * FROM jadwalkegiatan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="event">';
        echo '<span class="event-date">' . $row["Tanggal"] . '</span>';
        echo '<div class="event-info">';
        echo '<h3>' . $row["Kegiatan"] . '</h3>';
        echo '<p>' . $row["Deskripsi"] . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Tidak ada event yang ditemukan.";
}

$conn->close();
?>
