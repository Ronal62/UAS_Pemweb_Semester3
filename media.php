<?php
include 'header.php';
include 'koneksi.php';

$pelanggan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_pelanggan"));
//echo $pelanggan;

$buku = mysqli_num_rows(mysqli_query($conn, "SELECT *, COUNT( * ) AS total FROM buku GROUP BY id_buku"));
//echo $buku;

?>
<!-- START PAGE CONTENT-->
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
                    <div> <a href="buku.php" class="small-box-footer color-white ">
                            Lihat Selengkapnya <i class="fa fa-arrow-circle-right color-white"></i>
                        </a></div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">$1570</h2>
                    <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-money widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">108</h2>
                    <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                    <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        <div>
                            <h3 class="m-0">Statistics</h3>
                            <div>Your shop sales analytics</div>
                        </div>
                        <div class="d-inline-flex">
                            <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                <div class="text-muted">WEEKLY INCOME</div>
                                <div>
                                    <span class="h2 m-0">$850</span>
                                    <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
                                </div>
                            </div>
                            <div class="px-3">
                                <div class="text-muted">WEEKLY SALES</div>
                                <div>
                                    <span class="h2 m-0">240</span>
                                    <span class="text-warning ml-2"><i class="fa fa-level-down"></i> -12%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Statistics</div>
                </div>
                <div class="ibox-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <canvas id="doughnut_chart" style="height:160px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Desktop 52%</div>
                            <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Tablet 27%</div>
                            <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Mobile 21%</div>
                        </div>
                    </div>
                    <ul class="list-group list-group-divider list-group-full">
                        <li class="list-group-item">Chrome
                            <span class="float-right text-success"><i class="fa fa-caret-up"></i> 24%</span>
                        </li>
                        <li class="list-group-item">Firefox
                            <span class="float-right text-success"><i class="fa fa-caret-up"></i> 12%</span>
                        </li>
                        <li class="list-group-item">Opera
                            <span class="float-right text-danger"><i class="fa fa-caret-down"></i> 4%</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>

</div>
<!-- END PAGE CONTENT-->
<?php include 'footer.php'; ?>
