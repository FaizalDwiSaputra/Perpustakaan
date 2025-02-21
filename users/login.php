<?php
include "../koneksi.php";
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin: 0; padding: 0;
            box-sizing: border-box;
            font-family: "Poppins";
        }
        .full-kontainer{
            width: 100%;    
            height: 100vh;
        }
        form{
            background: linear-gradient(120deg, #000, #333);
            width: 27%;

            h1{
                font-weight: 700;
                color: #fff;
            }
            p{
                color: #777;
            }
            label{
                color: #fff;
            }
        }
        @media screen and (min-width:320px) and (max-width:699px) {
            form{
                width: 80%;
            }
        }
    </style>
  </head>
  <body>
    <div class="full-kontainer d-flex align-items-center justify-content-center">
       <form action="" method="post" class="p-4 rounded">
       <div class="col-12">
                    <h1 class="mb-4">LOGIN</h1>
                    <p class="mb-3">Welcome to FDS Library</p>
                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Username</label>
                        <input type="text" name="username"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2">Password</label>
                        <input type="password" name="pass"  class="form-control">
                        <p class="text-end mt-2 ">Don't have any account ? <a href="daftar.php">Register</a></p>
                    </div>
                    <button class="btn btn-primary w-100 mt-2" name="login">Login</button>
                </div>
       </form>
        <!--  -->
        <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' AND pass = '$pass'");
            $data = mysqli_num_rows($query);
            $pecah = mysqli_fetch_assoc($query);

            if($data == 1){
                $_SESSION['login'] = $pecah;

                echo "<script>alert('Login Berhasil')</script>";
                echo "<script>location='../index.php';</script>";
            }
            else{
                echo "<div class='alert alert-danger'>Password atau Username salah</div?";
            }
        }
        ?>
        <!--  -->


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>