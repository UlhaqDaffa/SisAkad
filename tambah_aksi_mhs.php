<?php 
include 'koneksi.php'; 
 
$NIM = $_POST['NIM']; 
$Nama_Mhs = $_POST['Nama_Mhs']; 
 
mysqli_query($con, "insert into mhs values('','$NIM','$Nama_Mhs')"); 
header("location:mhs.php"); 
?> 
