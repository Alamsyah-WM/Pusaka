<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i> tambah DATA BUKU</div>
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
            $name = array("Education","Fiction","General","History");
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
</div>

</form>

<?php
include "koneksi.php";
if (isset($_POST['Proses'])) {
    $rand = rand();
    $TITLE = mysqli_real_escape_string($db, $_POST['title']);
    $DESKRIPSI = mysqli_real_escape_string($db, $_POST['deskripsi']);
    $KODE = mysqli_real_escape_string($db, $_POST['kode']);
    $TERBIT = mysqli_real_escape_string($db, $_POST['terbit']);
    $LEVEL = mysqli_real_escape_string($db, $_POST['level']);
    $KATEGORI = mysqli_real_escape_string($db, $_POST['kategori']);
    $STOCK = mysqli_real_escape_string($db, $_POST['stock']);
    
    //file
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

        // Simpan data buku ke database
        mysqli_query($db, "INSERT INTO tl_buku (kode_buku, title, deskripsi, terbit, level, kategori, file, stock) 
                    VALUES ('$KODE', '$TITLE', '$DESKRIPSI', '$TERBIT', '$LEVEL', '$KATEGORI', '$new_filename', '$STOCK')")
        or die(mysqli_error($db));

        echo "<meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/admin.php?page=databuku'>";
    }
}
?>
</div>
</div>