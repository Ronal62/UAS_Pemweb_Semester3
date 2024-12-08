<?php

include 'koneksi.php';
$kd_jual = $_GET['kd'];

$cek = mysqli_query($conn, "SELECT * FROM detail_jual WHERE kd_jual = '$kd_jual' ");

if (mysqli_num_rows($cek) > 0) {
    echo "
    <script>
        alert('Maaf. Masih ada transaksi dengan kode penjaualan ini. Silahkan hapus terlebih dahulu');
        window.location = 'penjualan.php';
    </script>
    ";
} else {
    $sql = mysqli_query($conn, "DELETE FROM penjualan WHERE kd_jual = '$kd_jual' ");

    if ($sql) {
        echo "
    <script>
        alert('Data Berhasil Di Hapus');
        window.location = 'penjualan.php';
    </script>
    ";
    }
}
