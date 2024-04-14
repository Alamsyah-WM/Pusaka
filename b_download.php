
<?php

if (isset($_GET['idb'])) {
    $id = $_GET['idb'];

    include_once "koneksi.php";

    $query = mysqli_query($db, "SELECT * FROM tl_buku WHERE id_buku = '$id'");
    $data = mysqli_fetch_assoc($query);

    // Tampilkan informasi buku
    if ($data) {
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-8">';
        echo '<div class="card mb-4">';
        echo '<div class="card-header row text-center mb-3">';
        echo '<h2>' . $data['title'] . '</h2>';
        echo '</div>';
        echo '<div class="card_biodata">';
        echo '<div class="card_bio_img">';
        echo "<img src ='img/{$data['gambar']}' alt='{$data['title']}'>";
        echo "</div>";
        echo "<div class='card_bio_text'>";
        echo "<label>Kode Buku: </label>";
        echo "<input type='text' value=' " . $data['kode_buku'] . "' class='form_biodata' disabled>";
        echo "<label>Deskripsi: </label>";
        echo "<textarea class='form_deskripsi' disabled>" . $data['deskripsi'] . "</textarea>";
        echo "<label>Terbit: </label>";
        echo "<input type='text' value=' " . $data['terbit'] . "' class='form_biodata' disabled>";
        echo "<label>Kategori: </label>";
        echo "<input type='text' value=' " . $data['kategori'] . "' class='form_biodata' disabled>";
        echo '<div class="mt-3">';
        echo '<a href="file/' . $data['file'] . '" class="btn btn-sm btn-success" download>Download</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        // ID buku tidak ditemukan, mungkin berikan pesan kesalahan atau kembali ke halaman sebelumnya
        echo 'ID buku tidak valid.';
    }
} else {
    // ID buku tidak ditemukan, mungkin berikan pesan kesalahan atau kembali ke halaman sebelumnya
    echo 'ID buku tidak ditemukan.';
}
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const cardBioImg = document.querySelector('.card_bio_img img');
  const popupImgContainer = document.createElement('div');
  popupImgContainer.classList.add('popup-img-container');
  document.body.appendChild(popupImgContainer);

  cardBioImg.addEventListener('mouseenter', function () {
    const imgUrl = this.src;
    const popupImg = document.createElement('img');
    popupImg.src = imgUrl;
    popupImgContainer.innerHTML = '';
    popupImgContainer.appendChild(popupImg);
    popupImgContainer.style.display = 'block';
  });

  cardBioImg.addEventListener('mouseleave', function () {
    popupImgContainer.style.display = 'none';
  });
});

</script>
