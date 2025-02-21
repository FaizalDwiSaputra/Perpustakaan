<?php
session_start();
include "koneksi.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./admin/css/index_user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        .deskripsi-utama{
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }
        
        .logout{
            background-color: orange;
            border-radius: 15px;
        }
        .login{
            background-color: green;
            border-radius: 15px;
        }
        .pinjam{
            background-color: orange;
            padding: 3px 20px;
            color: #000;
            border-radius: 10px;
            transition: 0.2s linear;
        }
        .pinjam:hover{
            background-color: yellow;
        }
        .judul-buku{
            height: 80px;
        }
        .gambar-buku{
            height: 250px;
            position: relative;
            overflow: hidden;
        }
        .gambar-buku:hover img{
            transform: scale(1.1);
            transition: 0.2s ease-in-out;
        }
        .deskripsi-buku{
            height: 70px;

            p{
                font-size: 14px;
            }
        }
        @media screen and (min-width:320px) and (max-width:699px) {
            .full-kontainer{
                width: 99%;
            }
            .gambar-buku{
                height: 180px;
            }
            .deskripsi-buku{
                p{
                    font-size: 12px;
                }
            }
           
        }
    </style>
  </head>
  <body class="body1">
    <div class="full-kontainer">
        <nav class="navbar navbar-expand-lg mb-3" id="navbar" data-aos="fade-down" data-aos-duration="1000">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LibraryFD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link text-light" href="#">Home</a>
                    <a class="nav-link text-light" href="#databuku">Buku</a>
                    <?php if (isset($_SESSION['login'])) :?>
                    <a href="./users/cek_peminjaman.php" class="nav-link text-light">Cek Peminjaman</a>
                    <a href="" class="nav-link text-success">Welcome, <?php echo $_SESSION['login']['username'];?>!</a>
                    <a class="nav-link text-light logout px-4 " href="./users/logout.php">Logout</a>
                    <?php else:?>
                    <a class="nav-link text-light login px-4" href="./users/login.php">Login</a>
                    <a class="nav-link text-light daftar" href="./users/daftar.php">Daftar</a>
                    <?php endif?>
                </div>
                </div>
            </div>
        </nav>

        <div class="marque container-fluid">
            <marquee behavior="" direction="" >
                <div class="pertama d-flex">
                   
                </div>              
            </marquee>
        </div>

        <!--  -->
        <div class="utama container-fluid mb-4 position-relative" data-aos="fade-in" data-aos-duration="2000">
            <img src="./bg/bg.avif" alt="">
            <div class="deskripsi-utama position-absolute d-flex align-items-center px-4">
                <div class="deskripsi-utama-huruf">
                    <h2>Welcome to the FDS library !</h2>
                    <p>Find complete books only here</p>
                    <a href="" class="btn btn-primary">look at the book</a>
                </div>  
            </div>
        </div>
        <!--  -->

        <!-- KONTEN -->
        <div class="kontainer-1 container-fluid">
            <h1>Popular</h1>
            <div class="row">
                <div class="col-md-8" data-aos="fade-right" data-aos-duration="1000">
                    <div class="kartu-pertama">
                        <div class="sampul">
                            <img src="./bg/hp11.jpeg" alt="" class="w-100">
                        </div>
                        <div class="deskripsi-sampul my-3">
                            <h2>Harry Potter And The Sorcere's Stone</h2>
                            <form action="" method="post">
                                <input type="text" id="keyword" name="keyword" placeholder="Cari buku" class="w-50 form-control">
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12" data-aos="fade-left" data-aos-duration="2000">
                            <div class="sampul">
                                <img src="./bg/hp2.jpg" alt="" class="w-100">
                            </div>
                            <div class="deskripsi-sampul my-3">
                                <h2>Harry Potter And The Chamber of Secret</h2>
                            </div>
                        </div>
                        <div class="col-12" data-aos="fade-left" data-aos-duration="3000">
                            <div class="sampul">
                                <img src="./bg/hp3.jpg" alt="" class="w-100">
                            </div>
                            <div class="deskripsi-sampul my-3">
                                <h2>Harry Potter And The Prisoner of Azkaban</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- KONTEN -->
        <div class="container-fluid mt-4 " id="databuku">
            <div class="loadmore d-flex align-items-center justify-content-between">
                <h1>All Book</h1>
                <button class="btn btn-primary " id="load">Load more</button>
            </div>
            <div class="row">
                <?php
                $query = mysqli_query($connect, "SELECT * FROM buku ");
                while ($data = mysqli_fetch_assoc($query)){
                ?>
                
                <div class="col-lg-2 col-4 my-lg-5" data-aos="fade-out" data-aos-duration="2000">
                    <div class="kartu-buku">
                    <a href="./users/pinjam.php?id=<?php echo $data['id_buku']; ?>" class="text-decoration-none">
                        <div class="gambar-buku ">
                            <img src="./assets/<?php echo $data['sampul_buku'];?>" alt="" class="w-100 h-100">
                        </div>
                        <div class="deskripsi-buku">
                            <p class="text-light"><?php echo $data['judul_buku'];?></p>
                        </div>
                        <a href="./users/pinjam.php?id=<?php echo $data['id_buku']; ?>" class="text-decoration-none pinjam" >Pinjam</a>
                    </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="container-fluid text-center bg-secondary " style="height: 50px; line-height: 50px;">
            <footer >
                <p>Copyright &copy; FDSLibrary 2024</p>
            </footer>
        </div>
        <!--  -->


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        var itemsToShow = 6; // Jumlah item yang akan ditampilkan awalnya
        var itemsIncrement = 6; // Jumlah item yang akan ditampilkan setiap klik

        // Sembunyikan semua produk kecuali 'itemsToShow' pertama
        $('.kartu-buku').slice(itemsToShow).hide();

        $('#load').on('click', function() {
            var hiddenItems = $('.kartu-buku:hidden');
            
            if (hiddenItems.length === 0) {
                // Jika tidak ada item tersembunyi, sembunyikan semua produk kecuali 'itemsToShow' pertama dan ubah teks tombol
                $('.kartu-buku').slice(itemsToShow).slideUp();
                $(this).text('Load more').show();
            } else {
                // Tampilkan produk tambahan sebanyak 'itemsIncrement'
                hiddenItems.slice(0, itemsIncrement).slideDown();
                // Jika semua produk sudah ditampilkan, ubah teks tombol menjadi "Sembunyikan"
                if (hiddenItems.length <= itemsIncrement) {
                    $(this).text('Hidden');
                }
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        var itemsToShow = 6; // Jumlah item yang akan ditampilkan awalnya
        var itemsIncrement = 6; // Jumlah item yang akan ditampilkan setiap klik

        // Sembunyikan semua produk kecuali 'itemsToShow' pertama
        $('.kartu-buku-2').slice(itemsToShow).hide();

        $('#load-2').on('click', function() {
            var hiddenItems = $('.kartu-buku-2:hidden');
            
            if (hiddenItems.length === 0) {
                // Jika tidak ada item tersembunyi, sembunyikan semua produk kecuali 'itemsToShow' pertama dan ubah teks tombol
                $('.kartu-buku-2').slice(itemsToShow).slideUp();
                $(this).text('Load more').show();
            } else {
                // Tampilkan produk tambahan sebanyak 'itemsIncrement'
                hiddenItems.slice(0, itemsIncrement).slideDown();
                // Jika semua produk sudah ditampilkan, ubah teks tombol menjadi "Sembunyikan"
                if (hiddenItems.length <= itemsIncrement) {
                    $(this).text('Hidden');
                }
            }
        });
    });
    </script>
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    <script src="./admin/js/ajax-novel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>