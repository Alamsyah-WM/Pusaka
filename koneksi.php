<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "pusaka";

$db = mysqli_connect($host, $user,$password,$database);

if (!$db){
    die("GAGAL TERHUBUNG KE DATABASE" . mysqli_connect_error());
} else {
    echo "";
}



?>