<?php include 'header.php'; ?>
<div class="page-heading">
    <h1 class="page-title">Data Buku</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Data Buku</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Data Buku</div>
            <a href="tambah_buku.php" class="btn btn-primary  btn-rounded pull-right"><i class="fa ti-plus"> Tambah Buku</i></a>
        </div>
        <div class="ibox-body">
            <br>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga Kolak</th>
                        <th>Harga Jual</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    include 'koneksi.php';
                    $sql = mysqli_query($conn, "SELECT * FROM buku");
                    while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['kd_buku']; ?></td>
                            <td><?= $data['nama_buku']; ?></td>
                            <td><?= $data['stok_buku']; ?></td>
                            <td><?= rupiah($data['harga_kolak']); ?></td>
                            <td><?= rupiah($data['harga_jual']); ?></td>
                            <td><?= $data['gambar']; ?></td>
                            <td>
                                <a href="edit_buku.php?id=<?= $data['id_buku']; ?>" class="btn btn-warning "><i class="fa fa-pencil"></i></a>
                                <a href="<?= 'hapus_buku.php?id_buku=' . $data['id_buku'] ?>" onclick="return confirm('Yakin Menghapus Data Ini?')" class="btn btn-danger "><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>
