<?php
include 'header.php';
include 'koneksi.php';
?>

<div class="page-heading">
    <h1 class="page-title">Tambah Admin</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Tambah Admin</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Tambah Admin </div>
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
                            <label>Nama</label>
                            <input class="form-control" name="nama" type="text" placeholder="Masukkan Nama">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" type="text" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Masukkan Password">
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
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn, "INSERT INTO admin VALUES('','$nama','$username','$password')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Di Simpan");
            window.location.href = "admin.php";
        </script>
<?php
    }
}
?>