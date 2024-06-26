<?php 
include '../koneksi.php'; 
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
$id = $_POST['id']; 
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
mysqli_query($con, "update datamhs set NIM='$NIM', namaMhs='$Nama_Mhs', jurusan='$jurusan', reguler='$reguler', semester='$semester', tglLahir='$tglLahir', email='$email', noTlp='$noTelp', statusMhs='$status', kelas='$kelas' where id='$id'"); 
header("location:mhs.php"); 
?> 