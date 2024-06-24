<?php 
include 'koneksi.php'; 
 
$NIM = $_POST['NIM']; 
$Nama_Mhs = $_POST['namaMhs']; 
$jurusan = $_POST['jurusan']; 
$reguler = $_POST['reguler']; 
$semester = $_POST['semester']; 
$tglLahir = $_POST['tglLahir']; 
$email = $_POST['email']; 
$noTelp = $_POST['noTlp']; 
$status = $_POST['statusMhs']; 
$kelas = $_POST['kelas'];  

mysqli_query($con, "insert into datamhs values('','$NIM','$Nama_Mhs', '$jurusan', '$reguler', '$semester', '$tglLahir', '$email', '$noTelp', '$status', '$kelas')"); 
header("location:mhs.php"); 
?> 
