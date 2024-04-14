<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i> List Data BUKU</div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">    
            <a href="admin.php?page=inputbuku" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class='fas fa-plus'></i> DATA BUKU </a><p></p>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Buku</th>
                    <th>Kode Buku</th>
                    <th>Title</th>
                    <th>Deskripsi</th>
                    <th>Terbit</th>
                    <th>Gambar</th>
                    <th>level</th>
                    <th>Kategori</th>
                    <th>File</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
include_once"koneksi.php";

$sql = mysqli_query($db, "select * from tl_buku");
$no=1;
while($data = mysqli_fetch_array($sql)){


    ?>
<tr>
    <td><?php echo $no?></td>
    <td><?php echo $data['id_buku']?></td>
    <td><?php echo $data['kode_buku']?></td>
    <td><?php echo $data['title']?></td>
    <td><?php echo $data['deskripsi']?></td>
    <td><?php echo $data['terbit']?></td>
    <td><?php echo "<img src ='img/$data[gambar]' width ='50px' height='50px'>"?></td>
    <td><?php echo $data['level']?></td>
    <td><?php echo $data['kategori']?></td>
    <td>
    <?php
        if (!empty($data['file'])) {
        echo "<a href='file/{$data['file']}' target='_blank'>Download</a>";
        } else {
        echo "Tidak Ada File";
        }
    ?>
    </td>
    <td><?php echo $data['stock']?></td>
    <td><a href="admin.php?page=b_edit&idb=<?php echo $data['id_buku'];?>" 
    class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit"></i></a>
    <a href="admin.php?page=b_del&idb=<?php echo $data['id_buku'];?>" 
    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" 
    onclick="return confirm('Yakin Hapus Data ini...?')"><i class="fas fa-trash"></i></a>
    <a href="admin.php?page=gambar&idb=<?php echo $data['kode_buku'];?>"
    class="btn btn-sm btn-primary"><img src="image.png" width="20px"></a>
    </td>
</tr>
<?php $no++; } ?>
            </tbody>
        </table>

    </div>
</div>