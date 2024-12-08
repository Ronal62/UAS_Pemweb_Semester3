<footer class="page-footer">
    <div class="font-13">2022 © <b>SMKDWK</b> - All rights reserved.</div>
    <a class="px-4" href="https://www.youtube.com/channel/UCS0Niu7LpNR_NtsDkEqvAfA" target="_blank">SUBSCRIBE YT</a>
    <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
</footer>
</div>
</div>
<!-- BEGIN THEME CONFIG PANEL-->

<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<script src="./assets/vendors/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#selectExt').select2();
        $('#example-table').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>
<script>
    // Fungsi untuk menambahkan titik sebagai pemisah ribuan
    function formatRibuan(input) {
        let value = input.value.replace(/\D/g, ''); // Hapus karakter selain angka
        let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Format angka dengan titik
        input.value = formattedValue; // Set value kembali dengan format yang benar
    }

    // Fungsi untuk menghapus titik saat form disubmit agar dapat disimpan dengan benar
    function removeDots(input) {
        input.value = input.value.replace(/\./g, ''); // Hapus titik sebelum mengirim form
    }
</script>

</body>

</html>