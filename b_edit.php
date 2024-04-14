<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i> Tambah Data Barang</div>
    <div class="table-responsive">
<form method="POST" enctype="multipart/form-data">

<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input Kode:</label>
    <input type="text" name="kode" placeholder="silakan masukan kode buku" class="form-control">        
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input Judul:</label>
    <input type="text" name="title" placeholder="silakan masukan judul" class="form-control">        
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input Deskripsi:</label>
    <input type="text" name="deskripsi" placeholder="silakan masukan deskripsi" class="form-control">        
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input Terbit:</label>
    <input type="date" name="terbit" placeholder="silakan masukan tanggal terbit" class="form-control">        
</div>
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input Level:</label>
    <select class="form-control" name="level">
        <option value="0">Silahkan Pilih Level</option>
        <?php   
            $name = array("Best Seller","Newest","Oldest");
            for($i=0;$i< count($name); $i++){
                echo "
                <option value='$name[$i]'> $name[$i] </option>
                ";
            }
            ?>
    </select>
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input Kategori:</label>
    <select class="form-control" name="kategori">
        <option value="0">Silahkan Pilih kategori</option>
        <?php   
            $name = array("Horor","Sci-Fi","Action","Biografi");
            for($i=0;$i< count($name); $i++){
                echo "
                <option value='$name[$i]'> $name[$i] </option>
                ";
            }
            ?>
    </select>
</div>
</div>
</div>
<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input File:</label>
    <input type="file" name="file" placeholder="silakan masukan file" class="form-control">        
</div>
</div>
<div class="form-row">
<div class="col-md-12">
    <div class="form-group">
    <label>Input Stock:</label>
    <input type="text" name="stock" placeholder="silakan masukan stock" class="form-control">        
</div>
</div>
</div>
<div class="form-group">
    <input type="submit" name="Proses" value="Simpan" class="btn btn-primary">
    <!-- <a href="admin.php?page=databarang"> </a> -->
</div>

</form>

<?php
include "koneksi.php";
$id = $_GET['idb'];
if (isset($_POST['Proses'])){
$rand = rand();
$TITLE = $_POST['title'];
$DESKRIPSI = $_POST['deskripsi'];
$KODE = $_POST['kode'];
$TERBIT = $_POST['terbit'];
$LEVEL = $_POST['level'];
$KATEGORI = $_POST['kategori'];
$STOCK = $_POST['stock'];

$filename = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

// Validasi ekstensi file
$allowed_ext = array('pdf', 'docx', 'txt' , 'html');

if (!in_array($ext, $allowed_ext)) {
    echo "Format file tidak didukung. Silakan pilih file PDF, DOCX, HTML, atau TXT.";
} else {
    // Pindahkan file ke direktori yang diinginkan
    $new_filename = $rand . '_' . $filename;
    move_uploaded_file($tmp_name, 'file/' . $new_filename);


    $sql = mysqli_query($db, "UPDATE `tl_buku` SET `kode_buku`='$KODE',`title`='$TITLE',
    `deskripsi`='$DESKRIPSI',`terbit`='$TERBIT',`level`='$LEVEL',`kategori`='$KATEGORI',
    `file`='$new_filename' ,`stock`='$STOCK' WHERE id_buku='$id'") or die(mysqli_error($db));

    echo "<meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/admin.php?page=databuku'>";
}
}
?>
</div>
</div>