<?php 
include '../koneksi.php';
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($con, "delete from datamhs where id='$id'");
header("location:mhs.php");
?>