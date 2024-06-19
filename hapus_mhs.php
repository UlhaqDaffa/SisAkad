<?php 
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($con, "delete from mhs where id='$id'");
header("location:mhs.php");
?>