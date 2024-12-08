<?php
include 'koneksi.php';
$id_pelanggan = $_GET['id_pelanggan']; // Mengambil ID pelanggan dari URL

// Query untuk menghapus data pelanggan berdasarkan ID
$sql = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");

if ($sql) {
    echo "
    <script>
        alert('Data Pelanggan Berhasil Dihapus');
        window.location = 'pelanggan.php'; // Kembali ke halaman pelanggan
    </script>
    ";
} else {
    echo "
    <script>
        alert('Gagal Menghapus Data');
    </script>
    ";
}
?>
