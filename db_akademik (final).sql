-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 10:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `datamhs`
--

CREATE TABLE `datamhs` (
  `id` int(11) NOT NULL,
  `NIM` varchar(15) NOT NULL,
  `namaMhs` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `reguler` varchar(5) NOT NULL,
  `semester` int(11) NOT NULL,
  `tglLahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `noTlp` varchar(15) DEFAULT NULL,
  `statusMhs` enum('aktif','non-aktif','lulus') NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datamhs`
--

INSERT INTO `datamhs` (`id`, `NIM`, `namaMhs`, `jurusan`, `reguler`, `semester`, `tglLahir`, `email`, `noTlp`, `statusMhs`, `kelas`, `ipk`) VALUES
(31, '211011400001', 'Ahmad Murai Batu', 'Teknik Informatika', 'A', 5, '1998-05-15', 'john.pai@example.com', '08123456789', 'aktif', '05TPLP001', 3.75),
(32, '211011400002', 'Adit Samudra Pasifik', 'Teknik Informatika', 'B', 4, '1999-02-20', 'pasificAdit@example.com', '08765432100', 'aktif', '04TPLP002', 3.50),
(33, '211011400003', 'Michael Johnson', 'Teknik Informatika', 'CS', 3, '1997-08-10', 'michael.johnson@example.com', '08567895432', 'aktif', '03TPLP003', 3.25),
(34, '211011400004', 'Emily Williams', 'Teknik Informatika', 'CK', 6, '2000-01-25', 'emily.williams@example.com', '08123456789', 'aktif', '06TPLP004', 3.85),
(35, '211011400005', 'Daniel Brown', 'Teknik Informatika', 'A', 4, '1999-11-05', 'daniel.brown@example.com', '08765432100', 'aktif', '04TPLP005', 3.60),
(36, '211011400006', 'Olivia Miller', 'Teknik Informatika', 'B', 5, '1998-04-12', 'olivia.miller@example.com', '08567895432', 'aktif', '05TPLP006', 3.70),
(37, '211011400007', 'William Davis', 'Teknik Informatika', 'CS', 6, '1997-10-30', 'william.davis@example.com', '08123456789', 'aktif', '06TPLP007', 3.80),
(38, '211011400008', 'Sophia Garcia', 'Teknik Informatika', 'CK', 4, '2000-03-17', 'sophia.garcia@example.com', '08765432100', 'aktif', '04TPLP008', 3.55),
(39, '211011400009', 'Alexander Martinez', 'Teknik Informatika', 'A', 3, '1999-07-22', 'alexander.martinez@example.com', '08567895432', 'aktif', '03TPLP009', 3.45),
(40, '211011400010', 'Isabella Hernandez', 'Teknik Informatika', 'B', 4, '1998-02-08', 'isabella.hernandez@example.com', '08123456789', 'aktif', '04TPLP010', 3.90);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `namaDosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `namaDosen`) VALUES
(1, 'IIS AISYAH'),
(2, 'PETRICIA OKTAVIA'),
(3, 'SAMSONI'),
(4, 'JOKO SUWARNO'),
(5, 'JOKO RIYANTO'),
(6, 'SANTI RAHAYU'),
(7, 'OCTAVIANA ANUGRAH ADE PURNAMA'),
(8, 'PERANI ROSYANI');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `idMatakuliah` int(11) NOT NULL,
  `idDosen` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jamMulai` time NOT NULL,
  `jamSelesai` time NOT NULL,
  `ruang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `idMatakuliah`, `idDosen`, `hari`, `jamMulai`, `jamSelesai`, `ruang`) VALUES
(1, 8, 1, 'Senin', '08:50:00', '10:30:00', 'VIKTOR, V.615'),
(2, 1, 2, 'Selasa', '07:10:00', '08:50:00', 'VIKTOR, V.615'),
(3, 2, 3, 'Selasa', '08:50:00', '10:30:00', 'VIKTOR, V.615'),
(4, 3, 4, 'Selasa', '10:30:00', '12:10:00', 'VIKTOR, V.615'),
(5, 4, 5, 'Selasa', '12:10:00', '14:40:00', 'VIKTOR, V.615'),
(6, 5, 6, 'Rabu', '07:10:00', '08:50:00', 'VIKTOR, V.615'),
(7, 6, 7, 'Rabu', '08:50:00', '10:30:00', 'VIKTOR, V.615'),
(8, 7, 8, 'Rabu', '10:30:00', '12:10:00', 'VIKTOR, V.615');

-- --------------------------------------------------------

--
-- Table structure for table `loginmhs`
--

CREATE TABLE `loginmhs` (
  `id` int(11) NOT NULL,
  `idMahasiswa` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginmhs`
--

INSERT INTO `loginmhs` (`id`, `idMahasiswa`, `username`, `password`) VALUES
(5, 31, 'mahasiswa1', 'mahasiswa1'),
(6, 32, 'mahasiswa2', 'mahasiswa2');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kodeMK` varchar(10) NOT NULL,
  `namaMK` varchar(100) NOT NULL,
  `jumlahSks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kodeMK`, `namaMK`, `jumlahSks`) VALUES
(1, 'TPL0362', 'KOMPUTER GRAFIK I', 2),
(2, 'TPL0392', 'SISTEM INFORMASI MANAJEMEN', 2),
(3, 'TPL0383', 'REKAYASA PERANGKAT LUNAK', 3),
(4, 'TPL0422', 'KERJA PRAKTEK', 2),
(5, 'TPL0432', 'MOBILE PROGRAMMING', 2),
(6, 'TPL0373', 'PEMROGRAMAN WEB 2', 3),
(7, 'TPL0403', 'KECERDASAN BUATAN', 3),
(8, 'TPL0412', 'TEKNIK KOMPILASI', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `idMahasiswa` int(11) DEFAULT NULL,
  `idMatakuliah` int(11) DEFAULT NULL,
  `nilaiHuruf` varchar(2) DEFAULT NULL,
  `nilaiAngka` decimal(5,2) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `idMahasiswa`, `idMatakuliah`, `nilaiHuruf`, `nilaiAngka`, `sks`) VALUES
(1, 31, 1, 'A', 4.00, 3),
(2, 31, 2, 'B', 3.00, 4),
(3, 31, 3, 'B+', 3.33, 3),
(4, 31, 4, 'A-', 3.67, 3),
(5, 31, 5, 'A', 4.00, 4),
(6, 31, 6, 'B+', 3.33, 3),
(7, 31, 7, 'B', 3.00, 3),
(8, 31, 8, 'B+', 3.33, 4),
(10, 32, 6, 'A', 4.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sks`
--

CREATE TABLE `sks` (
  `id` int(11) NOT NULL,
  `idMahasiswa` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sks`
--

INSERT INTO `sks` (`id`, `idMahasiswa`, `semester`, `sks`) VALUES
(11, 31, 1, 18),
(12, 32, 2, 20),
(13, 33, 3, 22),
(14, 34, 4, 24),
(15, 35, 5, 26),
(16, 36, 6, 28),
(17, 37, 7, 30),
(18, 38, 8, 32),
(19, 39, 9, 34),
(20, 40, 10, 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `datamhs`
--
ALTER TABLE `datamhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMatakuliah` (`idMatakuliah`),
  ADD KEY `idDosen` (`idDosen`);

--
-- Indexes for table `loginmhs`
--
ALTER TABLE `loginmhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idMahasiswa` (`idMahasiswa`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMahasiswa` (`idMahasiswa`),
  ADD KEY `idMatakuliah` (`idMatakuliah`);

--
-- Indexes for table `sks`
--
ALTER TABLE `sks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMahasiswa` (`idMahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datamhs`
--
ALTER TABLE `datamhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loginmhs`
--
ALTER TABLE `loginmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sks`
--
ALTER TABLE `sks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idMatakuliah`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`idDosen`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `loginmhs`
--
ALTER TABLE `loginmhs`
  ADD CONSTRAINT `loginmhs_ibfk_1` FOREIGN KEY (`idMahasiswa`) REFERENCES `datamhs` (`id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`idMahasiswa`) REFERENCES `datamhs` (`id`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`idMatakuliah`) REFERENCES `matakuliah` (`id`);

--
-- Constraints for table `sks`
--
ALTER TABLE `sks`
  ADD CONSTRAINT `sks_ibfk_1` FOREIGN KEY (`idMahasiswa`) REFERENCES `datamhs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
