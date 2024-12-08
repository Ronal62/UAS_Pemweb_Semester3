<?php

include 'koneksi.php';
$id_admin = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '$id_admin' ");

if ($sql) {
    echo "
    <script>
        alert('Data Berhasil Di Hapus');
        window.location = 'admin.php';
    </script>
    ";
}
