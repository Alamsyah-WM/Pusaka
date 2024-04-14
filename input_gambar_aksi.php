<html>
    <head>
        <title>Notice...</title>
    </head>
    <body bgcolor="white">

    <?php
    if(isset($_POST['simpan'])) {
        $id = $_POST['kode_buku'];
        include_once("koneksi.php");
        $rand = rand();
        $ekstensi = array('png','jpg','jpeg','gif');
        $filename = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!in_array($ext,$ekstensi)) {
            echo "Gagal menyimpan gambar <meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/admin.php?page=databuku'>";
        } else {
            if($ukuran < 1044070) {
                $ft = $rand.'_'.$filename;
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$rand.'_'.$filename);
                mysqli_query($db, "UPDATE tl_buku SET gambar='$ft' WHERE kode_buku = '$id'");
                echo "<meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/admin.php?page=databuku'>";
            } else{
                echo "ukuran terlalu besar <meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/admin.php?page=databuku'> ";
            }
        }
    }
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    ?>
    </body>
</html>