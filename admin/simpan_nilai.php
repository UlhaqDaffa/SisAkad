<?php
include "../koneksi.php";

// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idMahasiswa = $_POST['mahasiswa'];
    $idMatakuliah = $_POST['matakuliah'];
    $nilaiHuruf = $_POST['nilaiHuruf'];
    $nilaiAngka = $_POST['nilaiAngka'];

    // Query untuk mendapatkan sks dari mata kuliah yang dipilih
    $query_sks = "SELECT jumlahSks FROM matakuliah WHERE id = '$idMatakuliah'";
    $result_sks = mysqli_query($con, $query_sks);
    $row_sks = mysqli_fetch_assoc($result_sks);
    $sks = $row_sks['sks'];

    // Insert nilai ke tabel nilai
    $query_insert = "INSERT INTO nilai (idMahasiswa, idMatakuliah, nilaiHuruf, nilaiAngka, sks) 
                     VALUES ('$idMahasiswa', '$idMatakuliah', '$nilaiHuruf', '$nilaiAngka', '$sks')";

    if (mysqli_query($con, $query_insert)) {
        header("Location: inputNilai.php?pesan=berhasil");
    } else {
        header("Location: inputNilai.php?pesan=gagal");
    }
}
?>
