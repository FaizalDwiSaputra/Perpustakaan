<?php
session_start();
unset($_SESSION['login']);
session_destroy();
echo "<script>alert('Logout');</script>";
echo "<script>location='../index.php';</script>";
?>