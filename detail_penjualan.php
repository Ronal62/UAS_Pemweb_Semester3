<?php
include 'koneksi.php';
include 'header.php';

$kd = $_GET['kd'];
$sql = mysqli_query($conn, "SELECT * FROM penjualan WHERE kd_jual = '$kd'");

$data = mysqli_fetch_assoc($sql);
$kd_jual = $data['kd_jual'];

// Proses Pembayaran
if (isset($_POST['majer'])) {
    $bayar = $_POST['bayar'];
    $total = $_POST['total'];
    $kembali = $bayar - $total;  // Menghitung kembalian

    // Memperbarui data bayar dan kembali di tabel penjualan
    $update_sql = mysqli_query($conn, "UPDATE penjualan SET bayar = '$bayar', kembali = '$kembali' WHERE kd_jual = '$kd_jual'");

    if ($update_sql) {
        echo "
        <script type='text/javascript'>
            alert('Pembayaran berhasil! Kembali: " . rupiah($kembali) . "');
            window.location.href = 'detail_penjualan.php?kd=" . $kd_jual . "';
        </script>
        ";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Terjadi kesalahan dalam pemrosesan pembayaran');
        </script>
        ";
    }
}

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
                                <th>Buku</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql_detail = mysqli_query($conn, "SELECT d.id_dtj, d.jumlah, d.total, b.nama_buku FROM detail_jual d JOIN buku b ON d.kd_buku = b.kd_buku WHERE d.kd_jual = '$kd_jual'");
                            while ($data_detail = mysqli_fetch_assoc($sql_detail)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data_detail['nama_buku']; ?></td>
                                    <td><?= $data_detail['jumlah']; ?></td>
                                    <td><?= rupiah($data_detail['total']); ?></td>
                                    <td>
                                        <a href="hapus_detail_jual.php?id=<?= $data_detail['id_dtj']; ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini ?')" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
                                    </td>
                                </tr>
                            <?php
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
                        <input type="hidden" name="kd_jual" value="<?= $kd_jual; ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih</label>
                            <div class="col-sm-10">
                                <select class="form-control select2_demo_1" name="kd_buku" id="selectExt" required>
                                    <option value="">-pilih buku-</option>
                                    <?php
                                    $sql_buku = mysqli_query($conn, "SELECT * FROM buku");
                                    while ($row = mysqli_fetch_array($sql_buku)) {
                                    ?>
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
// Proses Simpan Detail Penjualan
if (isset($_POST['simpan'])) {
    $kd_buku = $_POST['kd_buku'];
    $jumlah = $_POST['jumlah'];
    $kd_jual = $_POST['kd_jual'];

    $dtbuku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE kd_buku = '$kd_buku'"));
    $total = $jumlah * $dtbuku['harga_jual'];
    $stok_buku = $dtbuku['stok_buku'];

    if ($stok_buku < $jumlah) {
        echo "
        <script type='text/javascript'>
            alert('Maaf Stok buku tidak mencukupi');
            window.location.href = 'detail_penjualan.php?kd=" . $kd . "';
        </script>
        ";
    } else {
        $sql_insert = mysqli_query($conn, "INSERT INTO detail_jual VALUES('', '$kd_jual', '$kd_buku', '$jumlah', '$total')");

        $jmljual = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) AS jmlBuku, SUM(total) AS totHarga FROM detail_jual WHERE kd_jual = '$kd_jual'"));
        $jmlBuku = $jmljual['jmlBuku'];
        $totHarga = $jmljual['totHarga'];

        $sql_update_penjualan = mysqli_query($conn, "UPDATE penjualan SET jml_jual = '$jmlBuku', total = '$totHarga' WHERE kd_jual = '$kd_jual'");
        $sql_update_buku = mysqli_query($conn, "UPDATE buku SET stok_buku = stok_buku - $jumlah WHERE kd_buku = '$kd_buku'");

        if ($sql_insert && $sql_update_penjualan && $sql_update_buku) {
            echo "
        <script type='text/javascript'>
            window.location.href = 'detail_penjualan.php?kd=" . $kd . "';
        </script>
        ";
        }
    }
}
?>
