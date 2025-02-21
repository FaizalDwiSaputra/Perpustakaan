<?php
include "../koneksi.php";
?>
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
                $keyword = $_GET['keyword'];
                $query = mysqli_query($connect, "SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE nama_kategori LIKE '%$keyword%' OR judul_buku LIKE '%$keyword%'");
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