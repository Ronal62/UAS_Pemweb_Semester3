<?php
include 'koneksi.php';
include 'header.php';

$kd = $_GET['kd'];
$sql = mysqli_query($conn, "SELECT * FROM penjualan WHERE kd_jual = '$kd' ");

$data = mysqli_fetch_assoc($sql);
$kd_jual = $data['kd_jual'];
?>

<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Detail penjualan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Detail Penjualan</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Penjualan</div>
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
                            <label>Kode Penjualan</label>
                            <input class="form-control" type="text" value="<?= $data['kd_jual']; ?>" disabled>
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
                    <form class="form-horizontal" action="" method="POST" name="autoSumForm">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?= $data['jml_jual']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?= rupiah($data['total']); ?>">
                                <input type="hidden" name="total" value="<?= $data['total']; ?>" onFocus="startCalc();" onBlur="stopCalc();" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bayar </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="Nominal Bayar" name="bayar" onFocus="startCalc();" onBlur="stopCalc();">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kembali</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="kembali" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 ml-sm-auto">
                                <button class="btn btn-info" name="majer" type="submit" value="submit">Bayar</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function startCalc() {

                            interval = setInterval("calc()", 1);
                        }

                        function calc() {
                            total = document.autoSumForm.total.value;
                            bayar = document.autoSumForm.bayar.value;
                            document.autoSumForm.kembali.value = bayar - total;
                        }

                        function stopCalc() {

                            clearInterval(interval);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Penjualan</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead class="thead-default">
                            <tr>
                                <th>No</th>
                                <th>Kitab</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "SELECT d.id_dtj, d.jumlah ,d.total  , k.nama FROM detail_jual d JOIN kitab k ON d.kd_kitab = k.kd_kitab WHERE d.kd_jual = '$kd_jual' ");
                            while ($data = mysqli_fetch_assoc($sql)) {

                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['jumlah']; ?></td>
                                    <td><?= rupiah($data['total']); ?></td>
                                    <td>
                                        <a href="hapus_detail_jual.php?id=<?= $data['id_dtj']; ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini ?')" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
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
                    <div class="ibox-title">Data Kitab</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" method="post">
                        <input type="hidden" name="kd_jual" value="<?= $kd_jual; ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih</label>
                            <div class="col-sm-10">
                                <select class="form-control select2_demo_1" name="kd_kitab" id="selectExt" required>
                                    <option value="">-pilih kitab-</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM kitab");
                                    while ($row = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?= $row['kd_kitab']; ?>"><?= $row['nama']; ?></option>
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
    $kd_kitab = $_POST['kd_kitab'];
    $jumlah = $_POST['jumlah'];
    $kd_jual = $_POST['kd_jual'];

    $dtkitab = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kitab WHERE kd_kitab = '$kd_kitab' "));
    $total = $jumlah * $dtkitab['harga_jual'];
    $stok = $dtkitab['stok'];

    if ($stok < $jumlah) {
        echo "
        <script type='text/javascript'>
            alert('Maaf Stok kitab tidak mencukupi');
            window.location.href = 'detail_penjualan.php?kd=" . $kd . "';
        </script>
        ";
    } else {
        $sql = mysqli_query($conn, "INSERT INTO detail_jual VALUES('', '$kd_jual', '$kd_kitab', '$jumlah', '$total')");

        $jmljual = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) AS jmlKitab, SUM(total) AS totHarga FROM detail_jual WHERE kd_jual = '$kd_jual' "));

        $jmlKitab = $jmljual['jmlKitab'];
        $totHarga = $jmljual['totHarga'];

        $sql2 = mysqli_query($conn, "UPDATE penjualan SET jml_jual = '$jmlKitab', total = '$totHarga' WHERE kd_jual = '$kd_jual' ");
        $sql3 = mysqli_query($conn, "UPDATE kitab SET stok = stok - $jumlah WHERE kd_kitab = '$kd_kitab' ");
        if ($sql && $sql2 && $sql3) {
            echo "
        <script type='text/javascript'>
            alert('Data Berhasil Di Simpan');
            window.location.href = 'detail_penjualan.php?kd=" . $kd . "';
        </script>
        ";
        }
    }
}

if (isset($_POST['majer'])) {
    $bayar = $_POST['bayar'];
    $kembali = $_POST['kembali'];
    $totalbayar = $_POST['total'];


    $sql = mysqli_query($conn, "UPDATE penjualan SET bayar = $bayar, kembali = $kembali  WHERE kd_jual = '$kd_jual' ");
    $sql2 = mysqli_query($conn, "UPDATE penjualan SET bayar = bayar - $totalbayar WHERE kd_kitab = '$kd_kitab' ");


    if ($sql && $sql2) {


        echo "
        <script type='text/javascript'>
            alert('Berhasil Di Bayar');
            window.location.href = 'penjualan.php?kd=" . $kd . "';
        </script>
        ";
    }
}
?>