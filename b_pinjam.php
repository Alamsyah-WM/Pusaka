<?php
if (isset($_GET['idb'])) {
    $id = $_GET['idb'];

    include_once "koneksi.php";
    $id = mysqli_real_escape_string($db, $id);
    $query = mysqli_query($db, "SELECT * FROM tl_buku WHERE id_buku = '$id'");
    $data = mysqli_fetch_assoc($query);

    // Tampilkan informasi buku
    if ($data) {
        echo '<form method="POST" enctype="multipart/form-data">';
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
        echo "<label>Start: </label>";
        echo "<input type='date' name='start' class='form_biodata'>";
        echo "<label>End: </label>";
        echo "<input type='date' name='end' class='form_biodata'>";
        echo "<label>Stock: </label>";
        echo "<input type='text' value=' " . $data['stock'] . "' class='form_biodata' disabled>";
        echo "<div class='input-group'>";
        echo "<button type='button' class='btn btn-sm btn-secondary' onclick='decrementStock()'>-</button>";
        echo "<input type='number' id='stockInput' value='1' class='form_jumlah' min='1' readonly oninput='updateJumlahPinjam()'>";
        echo "<button type='button' class='btn btn-sm btn-secondary' onclick='incrementStock()'>+</button>";
        echo 'Rules: ';
        echo '<div class="card-rules">';
        echo '<img src ="RULES.PNG"> ';
        echo '</div>';
        echo "</div>";
        echo "<input type='hidden' name='id_buku' value='{$id}'>"; // Menambahkan input tersembunyi untuk menyimpan id_buku
        echo "<div class='input-group'>";
        echo "<input type='hidden' name='jumlah_pinjam' id='jumlahPinjam' value='1'>";
        echo "<input type='hidden' id='maxStock' value='{$data['stock']}'>";
        echo "<input type='submit' name='Proses' value='Request' class='btn btn-sm btn-primary btn_margin'></input>";
        echo "<a href='pusaka.php&idb={$id}' class='btn btn-sm btn-primary btn_margin'>Kembali</a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        if (isset($_POST['Proses'])){
            $start = $_POST['start'];
            $end = $_POST['end'];
            $jumlah_pinjam = $_POST['jumlah_pinjam'];
            $id_buku = $id; // Menggunakan nilai $id yang sudah didapatkan dari $_GET['idb']
            $id_user = $_SESSION['id_user'];
            // Update tl_buku
            mysqli_query($db, "UPDATE tl_buku SET stock = stock - $jumlah_pinjam WHERE id_buku = '$id_buku'");
            // request success
            echo '<script>alert("Request diterima. Silahkan cek Account anda untuk lebih lanjut.");</script>';
            // Insert into tl_inventaris
            mysqli_query($db, "INSERT INTO tl_inventaris (id_user, id_buku, start_pinjam, end_pinjam, stock) VALUES ('$id_user', '$id_buku', '$start', '$end', '$jumlah_pinjam')") or die(mysqli_error($db));
            
            echo "<meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/pusaka.php' >";
        }
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

const cardRules = document.querySelector('.card-rules');
  const popupRulesContainer = document.createElement('div');
  popupRulesContainer.classList.add('popup-rules-container');
  document.body.appendChild(popupRulesContainer);

  cardRules.addEventListener('mouseenter', function () {
    const rulesContent = 'Rules: <img src="RULES.PNG">';
    popupRulesContainer.innerHTML = rulesContent;
    popupRulesContainer.style.display = 'block';
  });

  cardRules.addEventListener('mouseleave', function () {
    popupRulesContainer.style.display = 'none';
  });

function decrementStock() {
  const stockInput = document.getElementById('stockInput');
  if (stockInput.value > 1) {
    stockInput.value = parseInt(stockInput.value) - 1;
    updateJumlahPinjam();
  }
}

function incrementStock() {
  const stockInput = document.getElementById('stockInput');
  const currentStock = parseInt(stockInput.value);
  const maxStock = parseInt(document.getElementById('maxStock').value);

  if (currentStock < maxStock) {
    stockInput.value = currentStock + 1;
    updateJumlahPinjam();
  } else {
    alert('Jumlah melebihi stok yang tersedia.');
  }
}

function updateJumlahPinjam() {
  const stockInput = document.getElementById('stockInput');
  const jumlahPinjamInput = document.getElementById('jumlahPinjam');
  jumlahPinjamInput.value = stockInput.value;
}

</script>
