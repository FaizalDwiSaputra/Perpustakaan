<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
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
        <h1>PENGGUNA</h1>
        <table class="table table-borderless">
            <thead class="bg-dark text-light">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1;?>
                <?php
                $query = mysqli_query($connect, "SELECT * FROM users");
                while ($data = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $nomor++;?></td>
                    <td><?php echo $data['username'];?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['telepon'];?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>