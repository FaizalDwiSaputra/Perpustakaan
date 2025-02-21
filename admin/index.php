<?php
session_start();
if(!isset($_SESSION['admin']) OR empty($_SESSION['admin'])){
    echo "<script>alert('Silahkan Login dahulu')</script>";
    echo "<script>location='login.php'</script>";
}
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end " id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom text-light">FDSPerpus</div>
                <div class="nav-kiri list-group list-group-flush ">
                    <a class=" p-3" href="index.php"><i class="bi bi-house-fill mx-2"></i>Dashboard</a>
                    <a class=" p-3" href="index.php?halaman=databuku"><i class="bi bi-book-fill mx-2"></i>Data Buku</a>
                    <a class=" p-3" href="index.php?halaman=peminjaman"><i class="bi bi-backpack-fill mx-2"></i>Peminjaman</a>
                    <a class=" p-3" href="index.php?halaman=pengguna"><i class="bi bi-people-fill mx-2"></i>Pengguna</a>
                    <a class=" p-3" href="logout.php" onclick="return confirm('Ingin logout ?')"><i class="bi bi-box-arrow-left mx-2"></i>Logout</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->

                
                <!--  -->

                <?php
                if(isset($_GET['halaman'])){
                    if($_GET['halaman'] == 'databuku'){
                        include "buku.php";
                    }
                    else if($_GET['halaman'] == 'peminjaman'){
                        include "peminjaman.php";
                    }
                    else if($_GET['halaman'] == 'pengguna'){
                        include "pengguna.php";
                    }
                    else if($_GET['halaman'] == 'tambahbuku'){
                        include "tambah_buku.php";
                    }
                }else{
                    include "home.php";
                }
                ?>
               
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
