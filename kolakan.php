<?php include 'header.php'; ?>
<div class="page-heading">
    <h1 class="page-title">Data Kolakan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">DataTables</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Kolakan</div>
            <a href="tambah_kolakan.php" class="btn btn-primary  btn-rounded pull-right"><i class="fa ti-plus"> Tambah Kolakan</i></a>
        </div>
        <div class="ibox-body">
            <br>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kolakan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    include 'koneksi.php';
                    $sql = mysqli_query($conn, "SELECT * FROM kolakan");
                    while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['kd_kolakan']; ?></td>
                            <td><?= $data['jml_kolakan']; ?></td>
                            <td><?= rupiah($data['total']); ?></td>
                            <td><?= $data['tanggal']; ?></td>
                            <td>
                                <a href="detail_kolakan.php?kd=<?= $data['kd_kolakan']; ?>" class="btn btn-warning btn-rounded "><i class="fa fa-pencil"> </i> Detail</a>
                                <!-- <a href="hapus_kolakan.php?id=<?= $data['id_kolakan']; ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini ?')" class="btn btn-danger btn-rounded "><i class="fa fa-trash"> </i></a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>