<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta name="author" content="" />
        <title>Daftar ke YourLibrary.</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style>
        body{
            background-image: url('https://nibble-images.b-cdn.net/nibble/original_images/perpustakaan_di_jakarta_2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(3px);
        }

        .container{
            position: relative;
            top: 2.5pc;
        }

        .btnWrapper :hover{
            background-color: whitesmoke;
            border: none;
        }
        a{  
            text-decoration: none;
            color: black;
        }
        .fa-arrow-left{
            width: 30px;
            height: 30px;
        }
    </style>
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container mt-1">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header"><a class="text-dark" href="landing-page.php"><i class="pt-2 ms-1 fas fa-arrow-left"></i></a> 
                                    <h3 class="text-center font-weight-light my-1">Daftar ke Your<span class="text-warning">Library.</span></h3>
                                </div>

                                    <div class="card-body">
                                        <?php 
                                            if(isset($_POST['register'])) {
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $alamat = $_POST['alamat'];
                                                $no_telepon = $_POST['no_telepon'];
                                                $username = ($_POST['username']);
                                                $level = 'peminjam';
                                                $password = md5($_POST['password']);

                                                $insert  = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,password,level) VALUES('$nama','$email','$alamat','$no_telepon','$username','$password','$level')");

                                                if($insert){
                                                    echo '<script>alert("Selamat, register berhasil! Silahkan Login."); location.href="login.php"</script>';
                                                }else{
                                                    echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="nama" placeholder="Masukkan Nama Lengkap"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="email" placeholder="Masukkan Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">No. Telepon</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="no_telepon" placeholder="Masukkan No. Telepon"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Alamat</label>
                                                <textarea name="alamat" rows="5" required class="form-control py-3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Username</label>
                                                <input class="form-control py-2" id="inputUsername" type="text" required name="username" placeholder="Masukkan Username"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-2" id="inputPassword" required type="password" name="password" placeholder="Masukkan password"/>
                                            </div>
                                            <div class="btnWrapper d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button class="w-50 btn btn-warning" type="submit" name="register" value="login">Daftar</button>
                                            </div>
                                            <p class="d-flex justify-content-center mt-4"> Sudah Punya Akun?<a class="text-warning" href="login.php">‎ Login</a> </p>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 Your<span class="text-warning">Library.</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
