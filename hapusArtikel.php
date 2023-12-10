<?php

include 'koneksi.php';

$id = $_GET["id"];

if(hapusArtikelAksi($id) > 0 ) {
    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = 'dashbord.php';
    </script>
    ";
}else {
    echo "
    <script>
    alert('data gagal dihapus!');
    document.location.href = 'dashbord.php';
    </script>
    ";
}


?>