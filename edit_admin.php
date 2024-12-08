<?php
include 'koneksi.php';
$id_admin = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '$id_admin' "));
?>
<?php include 'header.php'; ?>
<div class="page-heading">
    <h1 class="page-title">Edit Admin</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Edit Admin</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Edit Admin </div>
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
                            <input class="form-control" name="nama" type="text" placeholder="Masukkan Nama" value="<?= $data['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" type="text" placeholder="Masukkan Username" value="<?= $data['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Masukkan Password" value="<?= $data['password']; ?>">
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
    $nama = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama']));
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn, "UPDATE admin SET nama = '$nama', username = '$username',
    password = '$password' WHERE id_admin = $id_admin");

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