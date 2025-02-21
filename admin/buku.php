<?php
include "../koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="./css/buku.css">
</head>
<body>
    <div class="container">
        <h1>DATA BUKU</h1>
        <a href="index.php?halaman=tambahbuku" class="btn btn-primary my-1">Tambah Buku</a>
        <form action="" method="post">
            <input type="text" id="keyword" class="form-control my-2 w-50" placeholder="Cari buku ">
        </form>
        <table class="table  table-borderless" id="databuku">
            <thead class="bg-dark text-light">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Sampul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php
                $query = mysqli_query($connect, "SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                while ($data = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $nomor++;?></td>
                    <td><?php echo $data['nama_kategori'];?></td>
                    <td><?php echo $data['judul_buku'];?></td>
                    <td><?php echo $data['pengarang'];?></td>
                    <td><?php echo $data['penerbit'];?></td>
                    <td><?php echo $data['tahun'];?></td>
                    <td><img src="../admin/sampul/<?php echo $data['sampul_buku']; ?>" alt="" width="100"td>
                    <td>
                        <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <a href="hapus_buku.php?id=<?php echo $data['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('hapus buku ini ?');"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="./js/ajax.js"></script>
</body>
</html>