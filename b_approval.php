<?php
include_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_inventaris = $_POST['id_inventaris'];

    if (isset($_POST['approve'])) {
        // Handle approval action
        mysqli_query($db, "UPDATE tl_inventaris SET status = 'Approved' WHERE id_inventaris = '$id_inventaris'");
    } elseif (isset($_POST['refuse'])) {
         // Handle refuse action
        $query_inventaris = mysqli_query($db, "SELECT * FROM tl_inventaris WHERE id_inventaris = '$id_inventaris'");
        $data_inventaris = mysqli_fetch_assoc($query_inventaris);

        $id_buku = $data_inventaris['id_buku'];
        $jumlah_pinjam = $data_inventaris['stock'];

         // Ambil data buku untuk mendapatkan stok saat ini
        $query_buku = mysqli_query($db, "SELECT * FROM tl_buku WHERE id_buku = '$id_buku'");
        $data_buku = mysqli_fetch_assoc($query_buku);

         // Perbarui stok buku
        $stok_sekarang = $data_buku['stock'];
        $stok_baru = $stok_sekarang + $jumlah_pinjam;

        mysqli_query($db, "UPDATE tl_buku SET stock = '$stok_baru' WHERE id_buku = '$id_buku'");
        
         // Set status menjadi 'Refused'
        mysqli_query($db, "UPDATE tl_inventaris SET status = 'Refused' WHERE id_inventaris = '$id_inventaris'");
    }

    // Redirect back to the page after processing
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/admin.php?page=datapeminjam'>";
}
?>
