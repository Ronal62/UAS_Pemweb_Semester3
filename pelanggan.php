<?php include 'header.php'; ?>
<div class="page-heading">
    <h1 class="page-title">Data Pelanggan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Data Pelanggan</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Pelanggan</div>
            <a href="tambah_pelanggan.php" class="btn btn-primary  btn-rounded pull-right"><i class="fa ti-plus"> Tambah Pelanggan</i></a>
        </div>
        <div class="ibox-body">
            <br>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nik</th>
                        <th>Nama</th>
                        <th>jenis Kelamin</th>
                        <th>No Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    include 'koneksi.php';
                    $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggan");
                    while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nik']; ?></td>
                            <td><?= $data['nama_pelanggan']; ?></td>
                            <td><?= $data['jenis_kelamin']; ?></td>
                            <td><?= $data['no_hp']; ?></td>
                            <td>
                                <a href="edit_pelanggan.php?id=<?= $data['id_pelanggan']; ?>" class="btn btn-warning "><i class="fa fa-pencil"></i></a>
                                <a href="<?= 'hapus_pelanggan.php?id_pelanggan=' . $data['id_pelanggan'] ?>" onclick="return confirm('Yakin Menghapus Data Ini?')" class="btn btn-danger "><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>
