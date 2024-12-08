<?php
include 'header.php';


?>
<div class="page-heading">
    <h1 class="page-title">Data Penjualan</h1>
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
            <div class="ibox-title">Data Penjualan</div>
            <a href="tambah_penjualan.php" class="btn btn-primary  btn-rounded pull-right"><i class="fa ti-plus"> Tambah Penjualan</i></a>
        </div>
        <div class="ibox-body">
            <br>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Jual</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jumlah Jual</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembali</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    include 'koneksi.php';
                    $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggan JOIN penjualan ON tb_pelanggan.nik = penjualan.nik");
                    while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['kd_jual'] ?></td>
                            <td><?= $data['nik'] ?></td>
                            <td><?= $data['nama_pelanggan'] ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['jml_jual'] ?></td>
                            <td><?= rupiah($data['total']) ?></td>
                            <td><?= rupiah($data['bayar']) ?></td>
                            <td><?= rupiah($data['kembali']) ?></td>
                            <td>
                                <a href="detail_penjualan.php?kd=<?= $data['kd_jual']; ?>" class="btn btn-warning btn-rounded center"><i class="fa fa-pencil"> </i></a>
                                <a href="hapus_penjualan.php?kd=<?= $data['kd_jual']; ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini ?')" class="btn btn-danger btn-rounded "><i class="fa fa-trash"> </i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>