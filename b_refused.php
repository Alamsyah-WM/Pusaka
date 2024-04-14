<?php
include "koneksi.php";
$id = $_GET['idb'];
$sql = mysqli_query($db, "delete from tl_inventaris where id_inventaris='$id'");

echo "<script> window.location.replace('pusaka.php?page=profile')</script>";


?>