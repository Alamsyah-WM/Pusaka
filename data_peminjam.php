<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i> List Peminjam</div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">    
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID Inventaris</th>
                    <th>NAMA USER</th>
                    <th>JUDUL Buku</th>
                    <th>Start Pinjam</th>
                    <th>End Pinjam</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
include_once"koneksi.php";

$sql = mysqli_query($db, "SELECT tl_inventaris.id_inventaris, tl_user.nama, tl_buku.title, tl_inventaris.start_pinjam, tl_inventaris.end_pinjam, tl_inventaris.stock, tl_inventaris.status 
                    FROM tl_inventaris 
                    INNER JOIN tl_user ON tl_inventaris.id_user = tl_user.id_user
                    INNER JOIN tl_buku ON tl_inventaris.id_buku = tl_buku.id_buku");

$no=1;
while($data = mysqli_fetch_array($sql)){


    ?>
<tr>
    <td><?php echo $no?></td>
    <td><?php echo $data['id_inventaris']?></td>
    <td><?php echo $data['nama']?></td>
    <td><?php echo $data['title']?></td>
    <td><?php echo $data['start_pinjam']?></td>
    <td><?php echo $data['end_pinjam']?></td>
    <td><?php echo $data['stock']?></td>
    <td>
            <?php
            if ($data['status'] == 'Approved') {
                echo '<label class="d-none d-sm-inline-block btn btn-sm btn btn-success shadow-sm">Approved</label>';
            } elseif ($data['status'] == 'Refused') {
                echo '<label class="d-none d-sm-inline-block btn btn-sm btn btn-danger shadow-sm">Refused</label>';
            } else {
                echo 'PENDING';
            }
            ?>
        </td>
    <td>
            <form method="post" action="admin.php?page=b_approval">
                <input type="hidden" name="id_inventaris" value="<?php echo $data['id_inventaris'] ?>">
                <button type="submit" name="approve" class="btn btn-success">Approve</button>
                <button type="submit" name="refuse" class="btn btn-danger">Refuse</button>
            </form>
        </td>

</tr>
<?php $no++; } ?>
            </tbody>
        </table>

    </div>
</div>