

<?php
session_start();
include "koneksi.php";


$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, md5($_POST['password']));

$login = mysqli_query($db, "select *from tl_user where username='$username' and password='$password' ");
$cekdata = mysqli_num_rows($login);
$data = mysqli_fetch_assoc($login);

if ($cekdata > 0) {
    if($data['status'] == "admin"){
        session_start();
        $_SESSION['user'] = $data['username'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['id_user'] = $data['id_user'];
        header("Location:admin.php");
    } else if($data['status'] == "user"){
            session_start();
            $_SESSION['user'] = $data['username'];
            $_SESSION['status'] = $data['status'];
            $_SESSION['id_user'] = $data['id_user'];
            header("Location:pusaka.php");
    } else {
        echo "Maaf Username atau Password salah<a href='index.php'>kembali</a>";
    }
} else {
    echo "Maaf Username dan Password tidak ditemukan <a href='index.php'>kembali</a>";
}
?>