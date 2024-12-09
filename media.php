<?php
include 'header.php';
include 'koneksi.php';

// Menghitung jumlah pelanggan
$pelangganQuery = "SELECT COUNT(*) AS total FROM tb_pelanggan";
$pelangganResult = mysqli_query($conn, $pelangganQuery);
$pelanggan = mysqli_fetch_assoc($pelangganResult)['total'];

// Menghitung jumlah buku
$bukuQuery = "SELECT COUNT(*) AS total FROM buku";
$bukuResult = mysqli_query($conn, $bukuQuery);
$buku = mysqli_fetch_assoc($bukuResult)['total'];

// Menghitung total kolakan (misalnya total pendapatan atau jumlah transaksi)
$jualQuery = "SELECT SUM(total) AS total FROM penjualan"; // Sesuaikan dengan tabel yang relevan
$jualResult = mysqli_query($conn, $jualQuery);
$kolakan = mysqli_fetch_assoc($jualResult)['total'];

// Menghitung total penjualan
$penjualanQuery = "SELECT COUNT(*) AS total FROM penjualan"; // Sesuaikan dengan tabel yang relevan
$penjualanResult = mysqli_query($conn, $penjualanQuery);
$penjualan = mysqli_fetch_assoc($penjualanResult)['total'];

?>
<!-- HTML untuk menampilkan data -->
<div class="page-heading">
    <h1 class="page-title">DataTables</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">DataTables</li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong"><?php echo $pelanggan; ?></h2>
                    <div class="m-b-5">Pelanggan</div><i class="ti-user widget-stat-icon"></i>
                    <div><a href="pelanggan.php" class="small-box-footer color-white ">
                            Lihat Selengkapnya <i class="fa fa-arrow-circle-right color-white"></i>
                        </a></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong"><?php echo $buku; ?></h2>
                    <div class="m-b-5">Buku</div><i class="ti-book widget-stat-icon"></i>
                    <div><a href="buku.php" class="small-box-footer color-white ">
                            Lihat Selengkapnya <i class="fa fa-arrow-circle-right color-white"></i>
                        </a></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong"><?php echo $kolakan; ?></h2>
                    <div class="m-b-5">Total Penjualan</div><i class="fa fa-money widget-stat-icon"></i>
                    <div><i class="fa fa-money"></i><small> Uang penjualan</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong"><?php echo $penjualan; ?></h2>
                    <div class="m-b-5">Total Penjualan</div><i class="ti-user widget-stat-icon"></i>
                    <div><i class="fa fa-users"></i><small> Pembeli</small></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Grafik -->
  
</div>
<!-- END PAGE CONTENT-->
<?php include 'footer.php'; ?>
