<?php
$id = $_GET['id'];
include "../koneksi.php";
$query = mysqli_query($connect, "DELETE FROM buku WHERE id_buku = '$id'");
echo "<script>location='index.php?halaman=databuku';</script>";
?>