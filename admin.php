<?php
session_start();
if ($_SESSION['status'] == "") {
    echo"<script language = 'JavaScript'> 
    alert('Maaf!!! Akses halaman ini harus login terlebih dahulu'); 
    document.location='index.php'; </script>";
}   
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="..//assets/img/UIS.png">
        <title>Pusaka</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href=""><img src="assets/img/pusaka.png" width='50%' height='50%'></a>
            <!-- Navbar Menu -->
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" href="admin.php?page=datapeminjam">Data Peminjam</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin.php?page=databuku">Data Buku</a>
            </li>
            </ul>
            <!-- Navbar Search--
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>Account</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <b> </b></div>
                        <b> </b>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h3 class="mt-4"></h3>
                    <?php
            if(isset($_GET['page'])){
                $page=$_GET['page'];
                switch($page) {
                    case 'databuku': 
                        include "data_buku.php";
                        break;

                    case 'datapeminjam': 
                        include "data_peminjam.php";
                        break;

                    case 'inputbuku':
                        include "input_buku.php";
                        break;

                    case 'gambar':
                        include "input_gambar.php";
                        break;

                    case 'b_edit':
                        include "b_edit.php";
                        break;

                    case 'b_approval':
                        include "b_approval.php";
                        break;

                    case 'b_del':
                        include "b_del.php";
                        break;
                        default:
                        echo "Maaf Halaman Tidak Ditemukan";
                }
            } else {
                include "data_peminjam.php";
            }
        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

</body>
</html>