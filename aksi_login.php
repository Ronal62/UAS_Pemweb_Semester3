<?php
include 'koneksi.php';
session_start();

// Mengamankan input data dari form
$username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
$password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));

// Query untuk memeriksa username dan password
$sql  = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$row  = mysqli_fetch_assoc($sql);
$cek  = mysqli_num_rows($sql);

if ($cek == 1) {
    // Menyimpan data ke session
    $_SESSION['id_admin'] = $row['id_admin'];
    $_SESSION['nama'] = $row['nama']; // Nama disimpan ke session
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    // $_SESSION['level'] = $row['level']; // Jika ada level akses

    // Menampilkan alert dan redirect ke media.php
    echo "
        <script>
        alert('Login Berhasil. Selamat datang, " . htmlspecialchars($row['nama']) . "!');
        window.location = 'media.php';
        </script>
    ";
} else {
    // Menampilkan alert dan redirect ke index.php
    echo "
        <script>
        alert('Maaf, login Anda salah!');
        window.location = 'index.php';
        </script>
    ";
}
?>
