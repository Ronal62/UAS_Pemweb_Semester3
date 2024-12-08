<?php

include 'koneksi.php';
$id_buku = $_GET['id_buku'];

$sql = mysqli_query($conn, "DELETE FROM buku WHERE id_buku = '$id_buku' ");

if ($sql) {
    echo "
    <script>
        alert('Data Berhasil Di Hapus');
        window.location = 'buku.php';
    </script>
    ";
}
