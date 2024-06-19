<?php 
// memanggil library FPDF 
require('fpdf.php'); 
// intance object dan memberikan pengaturan halaman PDF 
$pdf = new FPDF('l','mm','A5'); 
// membuat halaman baru 
$pdf->AddPage(); 
// setting jenis font yang akan digunakan 
$pdf->SetFont('Arial','B',16); 
// mencetak string  
$pdf->Cell(190,7,'AKADEMIK Kampus',0,1,'C');
$pdf->SetFont('Arial','B',12); 
$pdf->Cell(190,7,'DAFTAR MAHASISWA',0,1,'C'); 
// Memberikan space kebawah agar tidak terlalu rapat 
$pdf->Cell(10,7,'',0,1); 
$pdf->SetFont('Arial','B',10); 
$pdf->Cell(25,6,'NIM',1,0); 
$pdf->Cell(70,6,'NAMA Mahasiswa',1,1); 
$pdf->SetFont('Arial','',10); 
include 'koneksi.php'; 
$mhs = mysqli_query($con, "select * from mhs"); 
while ($row = mysqli_fetch_array($mhs)){ 
$pdf->Cell(25,6,$row['NIM'],1,0); 
$pdf->Cell(70,6,$row['Nama_Mhs'],1,1); 
} 
$pdf->Output(); 
?> 