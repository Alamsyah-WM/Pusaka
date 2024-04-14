<?php
include "koneksi.php";
$id = $_GET['idb'];
$sql = mysqli_query($db, "delete from tl_buku where id_buku='$id'");

echo "<script> window.location.replace('admin.php?page=databuku')</script>";


?>