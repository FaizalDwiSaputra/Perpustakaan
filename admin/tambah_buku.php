<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <h1>TAMBAH BUKU</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label>Judul Buku</label>
                <input type="text" name="judul" class="form-control w-50 shadow-sm">
            </div>

            <div class="form-group mb-3">
                <label for="">Kategori</label>
                <select name="kategori" id="" class="form-control w-50 shadow-sm">
                     <!--  -->
                     <?php 
                        $queryKat = mysqli_query($connect, "SELECT * FROM kategori");
                        while($ambilKat = mysqli_fetch_assoc($queryKat)){
                    ?>
                    <option value="<?php echo $ambilKat['id_kategori']; ?>">
                        - <?php echo $ambilKat['nama_kategori'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="from-group mb-3">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control w-50 shadow-sm">
            </div>

            <div class="from-group mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control w-50 shadow-sm">
            </div>

            <div class="from-group mb-3">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control w-50 shadow-sm">
            </div>

            <div class="from-group mb-3">
                <label>Status</label>
                <select name="nama_tags" id="" class="form-control w-50">
                    <option value="">Pilih Status</option>
                    <!--  -->
                    <?php 
                        $queryTags = mysqli_query($connect, "SELECT * FROM tags");
                        while($ambilTags = mysqli_fetch_assoc($queryTags)){
                    ?>
                    <option value="<?php echo $ambilTags['id_tags']; ?>">
                        - <?php echo $ambilTags['nama_tags'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="from-group mb-3">
                <label>Sampul</label>
                <input type="file" name="foto" class="form-control w-50 shadow-sm">
            </div>


            <button name="tambah" class="btn btn-primary">Tambah</button>
        </form>
        <!--  -->
        <?php
        if(isset($_POST['tambah'])){
            $judul = mysqli_real_escape_string($connect, $_POST['judul']);
            $kategori = mysqli_real_escape_string($connect, $_POST['kategori']);
            $pengarang = mysqli_real_escape_string($connect, $_POST['pengarang']);
            $penerbit = mysqli_real_escape_string($connect, $_POST['penerbit']);
            $tahun = mysqli_real_escape_string($connect, $_POST['tahun']);
            $status = mysqli_real_escape_string($connect, $_POST['nama_tags']);

            // Mengelola file sampul
            $berkas = $_FILES['foto']['name'];
            $berkasSementara = $_FILES['foto']['tmp_name'];

            $direktori = "./sampul/";
            move_uploaded_file($berkasSementara, $direktori.$berkas);

            // Menyimpan data ke database
            $query = mysqli_query($connect, "INSERT INTO buku VALUES ('','$kategori', '$status', '$judul', '$pengarang', '$penerbit', '$tahun', '$berkas')");

            if($query){
                echo "<script>alert('Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=databuku'>";
            } else {
                echo "<script>alert('Gagal Menambahkan Buku')</script>";
            }
        }
        ?>
        <!--  -->
    </div>
</body>
</html>