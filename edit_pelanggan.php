<?php
include 'header.php';
include 'koneksi.php';

// Mengambil ID pelanggan dari URL
$id_pelanggan = $_GET['id'];

// Mengambil data pelanggan berdasarkan ID
$sql = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'");
$data = mysqli_fetch_assoc($sql);

if (!$data) {
    echo "<script>alert('Data pelanggan tidak ditemukan.'); window.location.href = 'pelanggan.php';</script>";
}
?>

<div class="page-heading">
    <h1 class="page-title">Edit Pelanggan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Edit Pelanggan</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Pelanggan</div>
                </div>
                <div class="ibox-body">
                    <form action="" method="POST">

                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input class="form-control" name="nama_pelanggan" type="text" value="<?= $data['nama_pelanggan'] ?>" placeholder="Masukkan Nama Pelanggan" required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input class="form-control" name="nik" type="text" value="<?= $data['nik'] ?>" placeholder="Masukkan NIK" required>
                        </div>
                        
                        <div class="form-group">
                            <label>No KK</label>
                            <input class="form-control" name="no_kk" type="text" value="<?= $data['no_kk'] ?>" placeholder="Masukkan No KK" required>
                        </div>

                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input class="form-control" name="no_hp" type="text" value="<?= $data['no_hp'] ?>" placeholder="Masukkan No. Telepon" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?= ($data['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : ''; ?> required> Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" <?= ($data['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?> required> Perempuan
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" value="submit" name="update" class="btn btn-default">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php
if (isset($_POST['update'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nik = $_POST['nik'];
    $no_kk = $_POST['no_kk'];
    $no_hp = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Query untuk mengupdate data pelanggan
    $sql_update = mysqli_query($conn, "UPDATE tb_pelanggan SET nama_pelanggan = '$nama_pelanggan', nik = '$nik', no_kk = '$no_kk', no_hp = '$no_hp', jenis_kelamin = '$jenis_kelamin' WHERE id_pelanggan = '$id_pelanggan'");

    if ($sql_update) {
        echo "
        <script type='text/javascript'>
            alert('Data Berhasil Di Update');
            window.location.href = 'pelanggan.php';
        </script>
        ";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Gagal Mengupdate Data');
        </script>
        ";
    }
}
?>
