<?php
include 'koneksi.php';
include 'header.php';

$kd = $_GET['kd'];
$sql = mysqli_query($conn, "SELECT * FROM kolakan WHERE kd_kolakan = '$kd' ");

$data = mysqli_fetch_assoc($sql);
$kd_kolakan = $data['kd_kolakan'];
?>

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Detail Kolakan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Detail Kolakan</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Kolakan</div>
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
                    <form>
                        <div class="form-group">
                            <label>Kode Kolakan</label>
                            <input class="form-control" type="text" value="<?= $data['kd_kolakan']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input class="form-control" type="date" value="<?= $data['tanggal']; ?>" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Pembayaran</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Kolakan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?= $data['jml_kolakan']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?= rupiah($data['total']); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Kolakan</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead class="thead-default">
                            <tr>
                                <th>No</th>
                                <th>Buku</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "SELECT d.id_dtk, d.jumlah ,d.total , k.nama_buku FROM detail_kolakan d JOIN buku k ON d.kd_buku = k.kd_buku WHERE d.kd_kolakan = '$kd_kolakan' ");
                            while ($data = mysqli_fetch_assoc($sql)) {

                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_buku']; ?></td>
                                    <td><?= $data['jumlah']; ?></td>
                                    <td><?= rupiah($data['total']); ?></td>
                                    <td>
                                        <a href="hapus_detail_kolakan.php?id=<?= $data['id_dtk']; ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini ?')" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Buku</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" method="post">
                        <input type="hidden" name="kd_kolakan" value="<?= $kd_kolakan; ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih</label>
                            <div class="col-sm-10">
                                <select class="form-control select2_demo_1" name="kd_buku" id="selectExt" required>
                                    <option value="">-pilih buku-</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM buku");
                                    while ($row = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?= $row['kd_buku']; ?>"><?= $row['nama_buku']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="Jumlah" name="jumlah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 ml-sm-auto">
                                <button class="btn btn-info" type="submit" value="submit" name="simpan">Submit</button>
                            </div>
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
    $kd_buku = $_POST['kd_buku'];
    $jumlah = $_POST['jumlah'];
    $kd_kolakan = $_POST['kd_kolakan'];

    $dtbuku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE kd_buku = '$kd_buku' "));
    $total = $jumlah * $dtbuku['harga_kolak'];

    $sql = mysqli_query($conn, "INSERT INTO detail_kolakan VALUES('', '$kd_kolakan', '$kd_buku', '$jumlah', '$total')");

    $jmlKolak = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) AS jmlbuku, SUM(total) AS totHarga FROM detail_kolakan WHERE kd_kolakan = '$kd_kolakan' "));
    $jmlbuku = $jmlKolak['jmlbuku'];
    $totHarga = $jmlKolak['totHarga'];

    $sql2 = mysqli_query($conn, "UPDATE kolakan SET jml_kolakan = '$jmlbuku', total = '$totHarga' WHERE kd_kolakan = '$kd_kolakan' ");
    $sql3 = mysqli_query($conn, "UPDATE buku SET stok_buku   = stok_buku + '$jumlah' WHERE kd_buku = '$kd_buku' ");

    if ($sql && $sql2 && $sql3) {
        echo "
        <script type='text/javascript'>
            alert('Data Berhasil Di Simpan');
            window.location.href = 'detail_kolakan.php?kd=" . $kd . "';
        </script>
        ";
    }
}
?>