<?php

include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Semua Data</h1>
        <div class="hello">
            <p>Hello, <span class="text-success"><?php echo $_SESSION['admin']['username'];?></span></p>
        </div>
    </div>
</body>
</html>