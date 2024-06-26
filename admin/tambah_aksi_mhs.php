<?php 
include '../koneksi.php'; 

// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

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

$query = "INSERT INTO datamhs (nim, namaMhs, jurusan, reguler, semester, tglLahir, email, noTlp, statusMhs, kelas) 
          VALUES ('$NIM', '$Nama_Mhs', '$jurusan', '$reguler', '$semester', '$tglLahir', '$email', '$noTelp', '$status', '$kelas')";

if (mysqli_query($con, $query)) {
    header("Location: mhs.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>
