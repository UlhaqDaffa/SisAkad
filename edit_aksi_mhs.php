<?php 
include 'koneksi.php'; 
$id = $_POST['id']; 
$NIM = $_POST['NIM']; 
$Nama_Mhs = $_POST['Nama_Mhs']; 
mysqli_query($con, "update mhs set NIM='$NIM', Nama_Mhs='$Nama_Mhs' where id='$id'"); 
header("location:mhs.php"); 
?> 