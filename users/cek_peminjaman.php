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
            width: 80%;
            margin: 0 auto;
        }
        .body1{
            background-color: #0e0d0d;
            color: #e6e6e6;
        }
        #navbar{
            background-color: #3c3c3c;
            border-radius: 30px;

            a{
                font-size: 14px;
            }
        }

        .logout{
            background-color: orange;
            border-radius: 15px;
        }
        .login{
            background-color: green;
            border-radius: 15px;
        }
        @media screen and (min-width:320px) and (max-width:699px) {
            .full-kontainer{
                width: 99%;
            }
        }
    </style>
  </head>
  <body class="body1">
    <div class="full-kontainer">
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LibraryFD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link text-light" href="../index.php">Home</a>
                    <a class="nav-link text-light" href="../index.php?#databuku">Buku</a>
                    <?php if (isset($_SESSION['login'])) :?>
                    <a href="cek_peminjaman.php" class="nav-link text-light">Cek Peminjaman</a>
                    <a href="" class="nav-link text-success">Welcome !, <?php echo $_SESSION['login']['username'];?></a>
                    <a class="nav-link text-light logout px-4 " href="logout.php">Logout</a>
                    <?php else:?>
                    <a class="nav-link text-light login px-4" href="login.php">Login</a>
                    <a class="nav-link text-light daftar" href="daftar.php">Daftar</a>
                    <?php endif?>
                </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Judul</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php $nomor=1;?>
                        <?php
                        $id_peminjam = $_SESSION['login']['id_users'];
                        $query = mysqli_query($connect, "SELECT * FROM peminjaman JOIN buku ON peminjaman.id_buku = buku.id_buku WHERE id_users = '$id_peminjam'");
                        while ($data = mysqli_fetch_assoc($query)){
                        $nama = $_SESSION['login']['nama_lengkap'];
                        ?>
                        <td><?php echo $nomor++;?></td>
                        <td><?php echo $nama;?></td>
                        <td><?php echo $data['judul_buku'];?></td>
                        <td><?php echo $data['tanggal_pinjam'];?></td>
                        <td><?php echo $data['tanggal_kembali'];?></td>
                        <td>
                            <?php if($data['status'] == 'belum kembali'): ?>
                                <p class="badge text-bg-warning"><?php echo $data['status']; ?></p>
                            <?php else: ?>
                                <p class="badge text-bg-success"><?php echo $data['status']; ?></p>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>