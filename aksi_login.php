<?php
include 'koneksi.php';
session_start();
$username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
$password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));
$sql  = mysqli_query($conn, " SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
$row      = mysqli_fetch_assoc($sql);
$cek    = mysqli_num_rows($sql);
if ($cek == 1) {
	$_SESSION['id_admin']            = $row['id_admin'];
	$_SESSION['nama']                = $row['nama'];
	$_SESSION['username']            = $row['username'];
	$_SESSION['password']            = $row['password'];
	// $_SESSION['level']					= $row['level'];

	echo "
		<script>
        alert('Login Berhasil');
		window.location = 'media.php';
		</script>
		";
} else {
	echo "
		<script>
		alert('maaf login anda salah');
		window.location = 'index.php';
		</script>
		";
}