<?php
include 'header.php';
include 'koneksi.php';
$tgl = date('d');
$mou = date('m');
$kodebuku = 'BUKU-' . rand(0, 999999);
?>

<div class="page-heading">
    <h1 class="page-title">Tambah Buku</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Tambah Buku</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Tambah Buku</div>
                </div>
                <div class="ibox-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Kode Buku</label>
                            <input class="form-control" name="kd_buku" type="text" value="<?= $kodebuku; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Buku</label>
                            <input class="form-control" name="nama_buku" type="text" placeholder="Masukkan Nama Buku">
                        </div>

                        <div class="form-group">
                            <label>Stok Buku</label>
                            <input class="form-control" name="stok_buku" type="text" readonly>
                        </div>

                        <div class="form-group">
                            <label>Harga Kolak</label>
                            <input class="form-control" name="harga_kolak" type="text" placeholder="Masukkan Harga Kolak" oninput="formatRibuan(this)">
                        </div>
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input class="form-control" name="harga_jual" type="text" placeholder="Masukkan Harga Jual" oninput="formatRibuan(this)">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input class="form-control" name="gambar" type="file" placeholder="Upload Gambar Buku">
                        </div>

                        <div class="form-group">
                            <button type="submit" value="submit" name="simpan" class="btn btn-default" onclick="removeDots(document.querySelector('[name=\'harga_kolak\']')); removeDots(document.querySelector('[name=\'harga_jual\']'));">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php
if (isset($_POST['simpan'])) {
    $kd_buku = $_POST['kd_buku'];
    $nama_buku = $_POST['nama_buku'];
    $stok_buku = $_POST['stok_buku'];
    
    // Menggunakan number_format untuk memformat harga dengan titik
    $harga_kolak = str_replace('.', '', $_POST['harga_kolak']); // Hapus titik
    $harga_kolak = (int)$harga_kolak; // Mengonversi ke integer agar bisa disimpan

    $harga_jual = str_replace('.', '', $_POST['harga_jual']); // Hapus titik
    $harga_jual = (int)$harga_jual; // Mengonversi ke integer agar bisa disimpan
    
    // Mengambil gambar yang diupload
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    
    // Jika ada gambar yang diupload, proses untuk dipindahkan ke folder yang sesuai
    if (!empty($gambar)) {
        move_uploaded_file($gambar_tmp, "uploads/" . $gambar); // Folder upload adalah "uploads"
    }

    // Insert data buku ke database
    $sql = mysqli_query($conn, "INSERT INTO buku VALUES('', '$kd_buku', '$nama_buku', '$stok_buku', '$harga_kolak', '$harga_jual', '$gambar')");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Buku Berhasil Disimpan");
            window.location.href = "buku.php"; // Redirect ke halaman daftar buku
        </script>
<?php
    }
}
?>
