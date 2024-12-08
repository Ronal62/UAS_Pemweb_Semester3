<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data sebelum dihapus
    $sql = mysqli_query($conn, "SELECT * FROM detail_kolakan WHERE id_dtk = '$id'");
    $data = mysqli_fetch_assoc($sql);

    // Mengupdate stok buku setelah penghapusan
    $kd_buku = $data['kd_buku'];
    $jumlah = $data['jumlah'];

    // Mengurangi stok buku yang dihapus
    $updateStok = mysqli_query($conn, "UPDATE buku SET stok_buku = stok_buku - '$jumlah' WHERE kd_buku = '$kd_buku'");

    if ($updateStok) {
        // Menghapus data dari tabel detail_kolakan
        $delete = mysqli_query($conn, "DELETE FROM detail_kolakan WHERE id_dtk = '$id'");

        if ($delete) {
            // Mengupdate jumlah kolakan dan total
            $kd_kolakan = $data['kd_kolakan'];
            $jmlKolak = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) AS jmlbuku, SUM(total) AS totHarga FROM detail_kolakan WHERE kd_kolakan = '$kd_kolakan' "));
            $jmlbuku = $jmlKolak['jmlbuku'];
            $totHarga = $jmlKolak['totHarga'];

            // Update data kolakan
            $updateKolakan = mysqli_query($conn, "UPDATE kolakan SET jml_kolakan = '$jmlbuku', total = '$totHarga' WHERE kd_kolakan = '$kd_kolakan'");

            if ($updateKolakan) {
                echo "
                <script type='text/javascript'>
                    alert('Detail Kolakan Berhasil Dihapus');
                    window.location.href = 'detail_kolakan.php?kd=" . $kd_kolakan . "';
                </script>
                ";
            } else {
                echo "
                <script type='text/javascript'>
                    alert('Gagal Mengupdate Kolakan');
                    window.location.href = 'detail_kolakan.php?kd=" . $kd_kolakan . "';
                </script>
                ";
            }
        } else {
            echo "
            <script type='text/javascript'>
                alert('Gagal Menghapus Data');
                window.location.href = 'detail_kolakan.php?kd=" . $kd_kolakan . "';
            </script>
            ";
        }
    } else {
        echo "
        <script type='text/javascript'>
            alert('Gagal Mengupdate Stok Buku');
            window.location.href = 'detail_kolakan.php?kd=" . $kd_kolakan . "';
        </script>
        ";
    }
} else {
    echo "
    <script type='text/javascript'>
        alert('ID Tidak Ditemukan');
        window.location.href = 'index.php';
    </script>
    ";
}
?>
