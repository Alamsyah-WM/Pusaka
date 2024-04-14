<?php
include_once "koneksi.php";

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $query = mysqli_query($db, "SELECT * FROM tl_user WHERE id_user = '$id_user'");
    $data = mysqli_fetch_assoc($query);
    $query2 = mysqli_query($db, "SELECT tl_inventaris.*, tl_buku.title FROM tl_inventaris INNER JOIN tl_buku ON tl_inventaris.id_buku = tl_buku.id_buku WHERE id_user = '$id_user'");
    $no=1;

    if ($data) {
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-8">';
        echo '<div class="card mb-4">';
        echo '<div class="card-header row text-center mb-3">';
        echo '<h2>Profile</h2>';
        echo '</div>';
        echo '<div class="form-row">';
        echo '<div class="form-group">';
        echo '<label>Nama :</label>';
        echo '<input type="text" value=" '  . $data['nama'] . ' " class="form-control" disabled>';
        echo '</div></div>';
        echo '<div class="form-row">';
        echo '<div class="form-group">';
        echo '<label>Alamat :</label>';
        echo '<input type="text" value=" '  . $data['alamat'] . ' " class="form-control" disabled>';
        echo '</div></div>';
        echo '<div class="form-row">';
        echo '<div class="form-group">';
        echo '<label>No. HP :</label>';
        echo '<input type="text" value=" '  . $data['no_hp'] . ' " class="form-control" disabled>';
        echo '</div></div>';
        echo '<div class="form-row">';
        echo '<div class="form-group">';
        echo '<label>Email :</label>';
        echo '<input type="text" value=" '  . $data['email'] . ' " class="form-control" disabled>';
        echo '</div></div>';
        echo '<div class="table-responsive">';
        echo '<div class="card-header row text-center mb-3">';
        echo '<h2>History</h2>';
        echo '</div>';
        echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
        echo '<thead>';
        echo '<tr>     
                    <th>NO</th>
                    <th>Title</th>
                    <th>Start Pinjam</th>
                    <th>End Pinjam</th>
                    <th>Stock</th>
                    <th>Status</th>';
        echo '</tr>      
            </thead>
            <tbody>';
            

while($pinjam = mysqli_fetch_assoc($query2)){


                ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $pinjam['title']?></td>
                <td><?php echo $pinjam['start_pinjam']?></td>
                <td><?php echo $pinjam['end_pinjam']?></td>
                <td><?php echo $pinjam['stock']?></td>
                <td>
            <?php
            if ($pinjam['status'] == 'Approved') {
                echo '<a href="pusaka.php?page=b_download&idb=' . $pinjam['id_buku'] . '"
                class="d-none d-sm-inline-block btn btn-sm btn btn-success shadow-sm">Approved</a>';
            } elseif ($pinjam['status'] == 'Refused') {
                echo '<a href="pusaka.php?page=b_refused&idb=' . $pinjam['id_inventaris'] . '" 
                class="d-none d-sm-inline-block btn btn-sm btn btn-danger shadow-sm">Refused</a>';
                
            } else {
                echo 'PENDING';
            }
            ?>
        </td>
                </td>
            </tr>
            <?php $no++; }


    } else {
        // Data akun tidak ditemukan
        echo 'Data akun tidak ditemukan.';
    }
} else {
    // Pengguna tidak memiliki sesi aktif
    echo 'Anda tidak memiliki sesi aktif.';
}

?>
    