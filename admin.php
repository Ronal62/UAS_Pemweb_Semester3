<?php include 'header.php'; ?>
<div class="page-heading">
    <h1 class="page-title">Data Admin</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Data Admin</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Admin</div>
            <a href="tambah_admin.php" class="btn btn-primary  btn-rounded pull-right"><i class="fa ti-plus"> Tambah Admin</i></a>
        </div>
        <div class="ibox-body">
            <br>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    include 'koneksi.php';
                    $sql = mysqli_query($conn, "SELECT * FROM admin");
                    while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['username']; ?></td>
                            <td><?= $data['password']; ?></td>
                            <td>
                                <a href="edit_admin.php?id=<?= $data['id_admin']; ?>" class="btn btn-warning btn-rounded"><i class="fa fa-pencil"></i></a>
                                <a href="<?= 'hapus_admin.php?id=' . $data['id_admin'] ?>" onclick="return confirm('Yakin Menghapus Data Ini?')" class="btn btn-danger btn-rounded "><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>