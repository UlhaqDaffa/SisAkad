<?php
session_start();
require('../fpdf.php');
include "../koneksi.php";

// Pastikan mahasiswa telah login
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: ../login.php");
    exit();
}

// Ambil data mahasiswa dari session
$idMahasiswa = $_SESSION['id'];

// Query untuk mengambil data mahasiswa berdasarkan ID
$query_mahasiswa = "SELECT * FROM datamhs WHERE id = '$idMahasiswa'";
$result_mahasiswa = mysqli_query($con, $query_mahasiswa);

if ($result_mahasiswa && mysqli_num_rows($result_mahasiswa) == 1) {
    $data_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
} else {
    echo "Data mahasiswa tidak ditemukan!";
    exit();
}

// Query untuk mengambil nilai mahasiswa dari tabel nilai
$query_nilai = "SELECT m.kodeMK, m.namaMK, n.nilaiHuruf, n.nilaiAngka, n.sks
               FROM nilai n
               INNER JOIN matakuliah m ON n.idMatakuliah = m.id
               WHERE n.idMahasiswa = '$idMahasiswa'";
$result_nilai = mysqli_query($con, $query_nilai);

// Menghitung IPK berdasarkan nilai yang didapatkan
$total_sks = 0;
$total_nilai = 0;

while ($row_nilai = mysqli_fetch_assoc($result_nilai)) {
    $total_nilai += ($row_nilai['nilaiAngka'] * $row_nilai['sks']);
    $total_sks += $row_nilai['sks'];
}

// Menghitung IPK
if ($total_sks > 0) {
    $ipk = number_format($total_nilai / $total_sks, 2);
} else {
    $ipk = 0.00;
}

// Membuat halaman baru
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// Judul Dokumen
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,'UNIVERSITAS CIPUTAT',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR NILAI MAHASISWA',0,1,'C');
$pdf->Cell(10,10,'',0,1); // Memberikan space kebawah agar tidak terlalu rapat

// Biodata Mahasiswa
$pdf->SetFont('Arial','',12);
$pdf->Cell(50,7,'Nama Mahasiswa',0,0);
$pdf->Cell(140,7,': ' . $data_mahasiswa['namaMhs'],0,1);
$pdf->Cell(50,7,'NIM',0,0);
$pdf->Cell(140,7,': ' . $data_mahasiswa['NIM'],0,1);
$pdf->Cell(50,7,'Jurusan',0,0);
$pdf->Cell(140,7,': ' . $data_mahasiswa['jurusan'],0,1);
$pdf->Cell(50,7,'Semester',0,0);
$pdf->Cell(140,7,': ' . $data_mahasiswa['semester'],0,1);
$pdf->Cell(50,7,'IPK',0,0);
$pdf->Cell(140,7,': ' . $ipk,0,1);
$pdf->Cell(10,10,'',0,1); // Memberikan space kebawah agar tidak terlalu rapat

// Header Tabel
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,10,'Kode MK',1,0,'C');
$pdf->Cell(90,10,'Nama Mata Kuliah',1,0,'C');
$pdf->Cell(20,10,'SKS',1,0,'C');
$pdf->Cell(25,10,'Nilai Huruf',1,0,'C');
$pdf->Cell(25,10,'Nilai Angka',1,1,'C');

// Isi Tabel
$pdf->SetFont('Arial','',10);

mysqli_data_seek($result_nilai, 0); // Reset pointer result set
while ($row_nilai = mysqli_fetch_assoc($result_nilai)) {
    $pdf->Cell(30,10,$row_nilai['kodeMK'],1,0,'C');
    $pdf->Cell(90,10,$row_nilai['namaMK'],1,0,'L');
    $pdf->Cell(20,10,$row_nilai['sks'],1,0,'C');
    $pdf->Cell(25,10,$row_nilai['nilaiHuruf'],1,0,'C');
    $pdf->Cell(25,10,$row_nilai['nilaiAngka'],1,1,'C');
}

// Output file PDF
$pdf->Output();
?>
