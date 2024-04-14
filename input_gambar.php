<?php
include "koneksi.php";
$id = $_GET['idb'];
$sql = mysqli_query($db, "select * from tl_buku where kode_buku = '$id'");
$data = mysqli_fetch_array($sql);
?>

<body>
<form method="POST" action="input_gambar_aksi.php" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kode BUKU</label>
            <input type="hidden" name="kode_buku"
            value="<?php echo $data['kode_buku']?>"
            class="form-control" >
            <input type="text" name="id"
            value="<?php echo $data['kode_buku']?>"
            class="form-control" disabled>
    </div>

    <div class="form-group">
        <label>Nama BUKU</label>
            <input type="text" name="nama"
            value="<?php echo $data['title']?>"
            class="form-control" disabled>
    </div>

    <div class="form-group">
        <label>Pilih Gambar (maksimal 2 mb)</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <br>
    <input type="submit" class="btn btn-sm btn-primary" value="Save" name="simpan">


</form>



</body>