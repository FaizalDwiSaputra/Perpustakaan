<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <style>
        tbody{
            background-color: #add1d8;
        }
        @media screen and (min-width:300px) and (max-width:769px) {
            td{
                font-size: 9px;
            }
            th{
                font-size: 8px;
            }
            a{
                font-size: 6px;
                margin-top: 4px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PEMINJAMAN</h1>
        <table class="table table-borderless">
            <thead class="bg-dark text-light">
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1;?>
                <?php
                $query = mysqli_query($connect, "SELECT * FROM peminjaman JOIN users ON peminjaman.id_users = users.id_users");
                while($data = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $nomor++;?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['tanggal_pinjam'];?></td>
                    <td><?php echo $data['tanggal_kembali'];?></td>
                    <td>
                        <?php if ($data['status'] == 'sudah kembali'):?>
                            <p class="badge text-bg-success"><?php echo $data['status']; ?></p>
                        <?php else:?>
                            <p class="badge text-bg-warning"><?php echo $data['status']; ?></p>
                        <?php endif ?>
                    </td>
                    <td>
                        <a href="" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>