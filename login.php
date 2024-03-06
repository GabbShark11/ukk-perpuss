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
        <meta name="author" content="" />
        <title>Login ke YourLibray.</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <!-- style -->
    <style>
        .backgroundWrapper{
            background-image: url('https://nibble-images.b-cdn.net/nibble/original_images/perpustakaan_di_jakarta_2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(3px);
        }

        .container{
            position: relative;
            top: 7.7pc;
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
    <!-- isi -->
    <body class="backgroundWrapper">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><a class="text-dark" href="landing-page.php"><i class="pt-2 ms-1 fas fa-arrow-left"></i></a>
                                        <h3 class="text-center font-weight-light">Masuk ke Your<span class="text-warning">Library.</span> </h3></div>
                                    <div class="card-body">
                                        <?php 
                                            if(isset($_POST['login'])) {
                                                $username = $_POST['username'];
                                                $password = md5($_POST['password']);

                                                $data = mysqli_query($koneksi, "SELECT*FROM user where username ='$username' and password='$password'");
                                                $cek = mysqli_num_rows($data);
                                                if($cek > 0 ){
                                                    $user_data = mysqli_fetch_array($data);
                                                    $_SESSION['user'] = $user_data;
                                                
                                                    if ($user_data['level'] == "peminjam") {
                                                        echo '<script>alert("Login Berhasil!!!"); location.href="index_user.php";</script>';
                                                    } else {
                                                        echo '<script>alert("Login Berhasil!!!"); location.href="index.php";</script>';
                                                    }
                                                } else {
                                                    echo '<script>alert("Maaf, Username/Password Salah")</script>';
                                                }
                                                
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mt-3 mb-4">
                                                <input class="form-control py-3" id="inputUsername" type="text" name="username" placeholder="Enter username"/>
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-3" id="inputPassword" type="password" name="password" placeholder="Enter password"/>
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                            </div>
                                            <div class="btnWrapper d-flex align-items-center justify-content-center mt-5 mb-0">
                                                <button class="w-50 btn btn-warning" type="submit" name="login" value="login">Masuk</button>
                                            </div>
                                            <p class="d-flex justify-content-center mt-4"> Belum Punya Akun? <a class="text-warning" href="register.php">‎ Daftar</a> </p>
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
