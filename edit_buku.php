<?php
include 'koneksi.php';
$id_buku = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id_buku' "));
?>
<?php include 'header.php'; ?>
<div class="page-heading">
    <h1 class="page-title">Edit Buku</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Edit Buku</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Buku</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input class="form-control" name="kd_buku" type="text" placeholder="Masukkan Kode Buku" value="<?= $data['kd_buku']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Buku</label>
                            <input class="form-control" name="nama_buku" type="text" placeholder="Masukkan Nama Buku" value="<?= $data['nama_buku']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input class="form-control" name="stok_buku" type="text" placeholder="Masukkan Stok Buku" value="<?= $data['stok_buku']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga Kolak</label>
                            <input class="form-control" name="harga_kolak" type="text" placeholder="Masukkan Harga Kolak" value="<?= $data['harga_kolak']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input class="form-control" name="harga_jual" type="text" placeholder="Masukkan Harga Jual" value="<?= $data['harga_jual']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input class="form-control" name="gambar" type="file" placeholder="Upload Gambar">
                        </div>

                        <div class="form-group">
                            <button name="edit" type="submit" value="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

<?php
if (isset($_POST['edit'])) {
    $kd_buku = $_POST['kd_buku'];
    $nama_buku = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama_buku']));
    $stok_buku = $_POST['stok_buku'];
    $harga_kolak = $_POST['harga_kolak'];
    $harga_jual = $_POST['harga_jual'];
    // Mengambil gambar yang diupload
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    
    // Jika ada gambar yang diupload, proses untuk dipindahkan ke folder yang sesuai
    if (!empty($gambar)) {
        move_uploaded_file($gambar_tmp, "uploads/" . $gambar); // Folder upload adalah "uploads"
    } else {
        $gambar = $data['gambar']; // Jika tidak ada gambar baru, tetap menggunakan gambar lama
    }

    // Update data buku ke database
    $sql = mysqli_query($conn, "UPDATE buku SET nama_buku = '$nama_buku', stok_buku = '$stok_buku', harga_kolak = '$harga_kolak', harga_jual = '$harga_jual', gambar = '$gambar' WHERE id_buku = '$id_buku'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Buku Berhasil Diubah");
            window.location.href = "buku.php"; // Redirect ke halaman buku
        </script>
<?php
    }
}
?>
