<?php
// Memanggil library FPDF
require('../fpdf.php');

// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

// Instansiasi objek dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A3');

// Membuat halaman baru
$pdf->AddPage();

// Judul Dokumen
$pdf->SetFont('Arial','B',16, 'C');
$pdf->Cell(190,10,'UNIVERSITAS CIPUTAT',0,1,'C');
$pdf->SetFont('Arial','B',12, 'C');
$pdf->Cell(190,7,'DAFTAR MAHASISWA',0,1,'C');
$pdf->Cell(10,10,'',0,1); // Memberikan space kebawah agar tidak terlalu rapat

// Header Tabel
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,10,'NIM',1,0,'C');
$pdf->Cell(50,10,'NAMA Mahasiswa',1,0,'C');
$pdf->Cell(35,10,'Jurusan',1,0,'C');
$pdf->Cell(20,10,'Reguler',1,0,'C');
$pdf->Cell(20,10,'Semester',1,0,'C');
$pdf->Cell(30,10,'Tanggal Lahir',1,0,'C');
$pdf->Cell(55,10,'Email',1,0,'C');
$pdf->Cell(25,10,'No Telepon',1,0,'C');
$pdf->Cell(35,10,'Status Mahasiswa',1,0,'C');
$pdf->Cell(25,10,'Kelas',1,1,'C');

// Isi Tabel
$pdf->SetFont('Arial','',10);

// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
include '../koneksi.php';

// Query data mahasiswa
$mhs = mysqli_query($con, "SELECT * FROM datamhs");

// Loop untuk menampilkan data
while ($row = mysqli_fetch_array($mhs)) {
    $pdf->Cell(30,10,$row['NIM'],1,0,'C');
    $pdf->Cell(50,10,$row['namaMhs'],1,0,'C');
    $pdf->Cell(35,10,$row['jurusan'],1,0,'C');
    $pdf->Cell(20,10,$row['reguler'],1,0,'C');
    $pdf->Cell(20,10,$row['semester'],1,0,'C');
    $pdf->Cell(30,10,$row['tglLahir'],1,0,'C');
    $pdf->Cell(55,10,$row['email'],1,0,'C');
    $pdf->Cell(25,10,$row['noTlp'],1,0,'C');
    $pdf->Cell(35,10,$row['statusMhs'],1,0, 'C');
    $pdf->Cell(25,10,$row['kelas'],1,1,'C');
}

// Output file PDF
$pdf->Output();

?>
