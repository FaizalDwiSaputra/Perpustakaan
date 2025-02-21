<?php
$local = 'localhost';
$user = 'root';
$pw = '';
$database = 'fadisa_perpus';

$connect = mysqli_connect($local, $user, $pw, $database);

if(!$connect){
    echo "Tidak terhubung";
}
?>