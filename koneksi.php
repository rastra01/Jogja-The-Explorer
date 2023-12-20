<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "4unity";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("koneksi gagal: " . mysqli_connect_error());
}


function  tambah($data) {
  global $conn;
  $nama = htmlspecialchars($data["nama"]);
  $tanggal = htmlspecialchars($data["tanggal"]);
  $kegiatan = htmlspecialchars ($data["kegiatan"]);

  // ... Kode sebelumnya ...

$query = "INSERT INTO jadwal (tanggal, kegiatan, nama) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

// Bind parameter ke statement
mysqli_stmt_bind_param($stmt, "sss", $tanggal, $kegiatan, $nama);

// Eksekusi statement
mysqli_stmt_execute($stmt);

// Periksa jumlah baris yang terpengaruh
$affected_rows = mysqli_stmt_affected_rows($stmt);

// Tutup statement
mysqli_stmt_close($stmt);

// ... Kode setelahnya ...


    return mysqli_affected_rows($conn);

}
function  tambahArtikel($data) {
  global $conn;
  $judulArtikel = htmlspecialchars($data["judulArtikel"]);
  $isiArtikel = htmlspecialchars ($data["isiArtikel"]);
  

  $gambarArtikel = upload();
  if (!$gambarArtikel) {
      return false;
  }
  

    $query = "INSERT INTO artikelaksi (judulArtikel, isiArtikel, gambarArtikel) VALUES ('$judulArtikel', '$isiArtikel', '$gambarArtikel')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function upload(){
  $namaFile = $_FILES['gambarArtikel']['name'];
  $ukuranFile = $_FILES['gambarArtikel']['size'];
  $eror = $_FILES['gambarArtikel']['error'];
  $tmpName = $_FILES['gambarArtikel']['tmp_name'];

  if($eror === 4 ) {
    echo "<script>
          alert('pilih gambar terlebih dahulu');
          </script>";
    return false;
  }
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
          alert('gambar harus jpg, jpeg, png!');
          </script>";
    return false;
  }

  // if($ukuranFile > 1000000) {
  //   echo "<script>
  //      alert('ukuran gambar terlalu besar!');
  //      </script>";
  //    return false;
  // }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, "foto/" . $namaFileBaru);

  return $namaFileBaru;

}



function hapus ($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM jadwal WHERE id = $id");
  return mysqli_affected_rows($conn);
}
function hapusArtikelAksi ($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM artikelaksi WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function query($sql)
{
    global $conn; // Variabel koneksi database

    $result = mysqli_query($conn, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}



function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $tanggal = htmlspecialchars($data["tanggal"]);
    $kegiatan = htmlspecialchars($data["kegiatan"]);
    $nama = htmlspecialchars($data["nama"]); 

    // Gunakan prepared statement untuk mencegah SQL injection
    $query = "UPDATE jadwal SET tanggal = ?, kegiatan = ?, nama = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "sssi", $tanggal, $kegiatan, $nama, $id);


    // Eksekusi prepared statement
    mysqli_stmt_execute($stmt);

    // Periksa jumlah baris yang terpengaruh
    $affected_rows = mysqli_stmt_affected_rows($stmt);

    // Tutup statement
    mysqli_stmt_close($stmt);

    return $affected_rows;
}

function edit($data)
{
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judulArtikel"]);
    $isi = htmlspecialchars($data["isiArtikel"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambarArtikel']['error'] === 4) {
      $gambar = $gambarLama;
  } else {
      $gambar = upload();
  }
  

    // Gunakan prepared statement untuk mencegah SQL injection
    $query = "UPDATE artikelaksi SET judulArtikel = ?, isiArtikel = ?, gambarArtikel = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "sssi", $judul, $isi, $gambarLama, $id);


    // Eksekusi prepared statement
    mysqli_stmt_execute($stmt);

    // Periksa jumlah baris yang terpengaruh
    $affected_rows = mysqli_stmt_affected_rows($stmt);

    // Tutup statement
    mysqli_stmt_close($stmt);

    return $affected_rows;
}


?>