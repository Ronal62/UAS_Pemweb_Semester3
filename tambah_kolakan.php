<?php
include 'koneksi.php';
include 'header.php';
$tgl = date('d');
$mou = date('m');
$kodekl = 'KL-' . $tgl . '.' . $mou . '.' . rand(0, 999999);
?>
<div class="page-heading">
    <h1 class="page-title">Tambah Kolakan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Tambah Kolakan</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Tambah Kolakan </div>
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
                    <form action="" method="POST">

                        <div class="form-group">
                            <label>Kode Kolakan</label>
                            <input class="form-control" name="kd_kolakan" type="text" value="<?= $kodekl; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input class="form-control" name="tanggal" type="date" placeholder="Masukkan Tanggal">
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
    $kd_kolakan = $_POST['kd_kolakan'];
    $jml_kolakan = $_POST['jml_kolakan'];
    $total = $_POST['total'];
    $tanggal = $_POST['tanggal'];
    $sql = mysqli_query($conn, "INSERT INTO kolakan VALUES('','$kd_kolakan','$jml_kolakan','$total','$tanggal')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Di Simpan");
            window.location.href = "kolakan.php";
        </script>
<?php
    }
}
?>