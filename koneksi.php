<?php
// Konfigurasi koneksi database
$host = "zklh8.h.filess.io";
$username = "dbbuku_beforerod";
$password = "7ca335ec5301d879e09cbee32ec67c0c06fbb892";
$database = "dbbuku_beforerod";
$port = 3307;

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database, $port);

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, '.', '.');
    return $hasil_rupiah;
}
