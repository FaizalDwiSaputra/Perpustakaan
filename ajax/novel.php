<?php
include "../koneksi.php";
?>
 <div class="container-fluid mt-4 " id="databuku-1">
            <div class="row">
                <!--  -->
                <?php
                $keyword = $_GET['keyword'];
                $query = mysqli_query($connect, "SELECT * FROM buku  WHERE judul_buku LIKE '%$keyword%'");
                while($data = mysqli_fetch_assoc($query)){
                ?>
                <!--  -->
                <div class="col-lg-2 col-4 my-lg-5 my-4">
                    <div class="kartu-buku-1">
                    <a href="./users/pinjam.php?id=<?php echo $data['id_buku']; ?>" class="text-decoration-none">
                        <div class="gambar-buku h-100">
                            <img src="./assets/<?php echo $data['sampul_buku']; ?>" alt="" class="w-100 h-100">
                        </div>
                        <div class="judul-buku">
                            <p class="mt-2"><?php echo $data['judul_buku'];?></p>
                        </div>
                        <a href="./users/pinjam.php?id=<?php echo $data['id_buku']; ?>" class="text-decoration-none pinjam" >Pinjam</a>
                    </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>