<?php
include 'header.php';
include 'koneksi.php';
?>

<div class="page-heading">
    <h1 class="page-title">Tambah Pelanggan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Tambah Pelanggan</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Tambah Pelanggan</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">Option 1</a>
                            <a class="dropdown-item">Option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <form action="" method="POST">

                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input class="form-control" name="nama_pelanggan" type="text" placeholder="Masukkan Nama Pelanggan" required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input class="form-control" name="nik" type="text" placeholder="Masukkan NIK" required>
                        </div>
                        
                        <div class="form-group">
                            <label>No KK</label>
                            <input class="form-control" name="no_kk" type="text" placeholder="Masukkan No KK" required>
                        </div>

                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input class="form-control" name="no_hp" type="text" placeholder="Masukkan No. Telepon" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" value="submit" name="simpan" class="btn btn-default">Submit</button>
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
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nik = $_POST['nik'];
    $no_kk = $_POST['no_kk'];
    $no_hp = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Pastikan query ini sesuai dengan struktur tabel tb_pelanggan
    $sql = mysqli_query($conn, "INSERT INTO tb_pelanggan (nama_pelanggan, nik, no_kk, no_hp, jenis_kelamin) 
    VALUES('$nama_pelanggan', '$nik', '$no_kk', '$no_hp', '$jenis_kelamin')");

    if ($sql) {
        echo "
        <script type='text/javascript'>
            alert('Data Berhasil Di Simpan');
            window.location.href = 'pelanggan.php';
        </script>
        ";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Gagal Menyimpan Data');
        </script>
        ";
    }
}
?>
