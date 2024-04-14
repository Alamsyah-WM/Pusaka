
<?php
include_once "koneksi.php";

// Fungsi untuk menampilkan satu buku dalam bentuk card
function tampilkanCard($gambar, $title ,$id_buku)
{
    echo '<div class="col-md-2 mb-4">';
    echo '<div class="card_buku"><a href="pusaka.php?page=klik_buku&idb=' . $id_buku . '">';
    echo "<img src ='img/$gambar' class='card-img-top'>";
    echo '<div class="card_buku-body">';
    echo '<p class="card-text">' . $title . '</p>';
    echo '</div></div></a></div>';
}

// Fungsi untuk menampilkan buku berdasarkan level
function tampilkanBuku($level)
{
    global $db;
    $sql = mysqli_query($db, "SELECT * FROM tl_buku WHERE level = '$level'");
    
    echo '<div class="container">';
    echo '<div class="col mb-3"><b><u>' . $level . '</u></b></div>';
    echo '<div class="row">';
    
    while ($data = mysqli_fetch_array($sql)) {
        tampilkanCard($data['gambar'], $data['title'], $data['id_buku']);
    }

    echo '</div></div>';
    
}
// Panggil fungsi untuk masing-masing level
tampilkanBuku('Best Seller');
tampilkanBuku('Newest');
tampilkanBuku('Oldest');
echo '</div>';
?>
