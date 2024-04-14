<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="assets/img/UIS.png">
        <title></title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h4 class="text-center font-weight-light my-4"><p></p>
                                    <strong><b><font color="black" face="Franklin Gothic">Register </font></b></strong></h4>
                                </div>
                                    <div class="card-body">
                                        <form name="form" method="POST">
                                            <div class="form-group"><label>Nama</label>
                                                <input class="form-control" type="text" name="nama" placeholder="Enter Your Name" />
                                            </div>
                                            <div class="form-group"><label>Alamat</label>
                                                <input class="form-control" type="text" name="alamat" placeholder="Enter Your Address" />
                                            </div>
                                            <div class="form-group"><label>No. HP</label>
                                                <input class="form-control" type="text" name="no_hp" placeholder="Enter Your Phone Number" />
                                            </div>
                                            <div class="form-group"><label>Email</label>
                                                <input class="form-control" type="text" name="email" placeholder="Enter Your Email" />
                                            </div>
                                            <div class="form-group"><label>Username</label>
                                                <input class="form-control" type="text" name="username" placeholder="Enter Your Username" />
                                            </div>
                                            <div class="form-group"><label>Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Enter Your Password" />
                                            </div>
                                            <div class="form-group d-flex mt-4 mb-0">
                                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Submit" />
                                            </div>                                            
                                        </form>
                                        <div class="card-footer text-center">
                                        <div class="form-group"><a href='index.php'>Back</a>
                                        </div>
                                    </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>

        <?php
    include "koneksi.php";
    if (isset($_POST['submit'])){
        $N = $_POST['nama'];
        $A = $_POST['alamat'];
        $NH = $_POST['no_hp'];
        $E = $_POST['email'];
        $UN = $_POST['username'];
        $P = md5($_POST['password']);


    mysqli_query($db, "INSERT INTO tl_user (nama,alamat,no_hp,email,username,password,status) VALUES ('$N', '$A', '$NH', '$E', '$UN', '$P', 'user')") or die(mysqli_error($db));

    echo "<meta http-equiv='refresh' content='1;url=http://localhost/Pusaka/index.php'>";
}
?>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

