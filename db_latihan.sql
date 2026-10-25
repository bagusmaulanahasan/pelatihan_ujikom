-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2026 at 03:03 AM
-- Server version: 8.0.42-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan`
--
CREATE DATABASE IF NOT EXISTS `db_latihan`;
USE `db_latihan`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `kd_dosen` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`kd_dosen`, `nama`, `alamat`) VALUES
(5001, 'Ari', 'Jakarta'),
(5002, 'Joko', 'Tangerang Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id` int NOT NULL,
  `kd_dosen` int DEFAULT NULL,
  `kd_matkul` int DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `ruang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id`, `kd_dosen`, `kd_matkul`, `waktu`, `ruang`) VALUES
(1, 5001, 1001, '19.00-20.00 WIB', 'V. 601'),
(2, 5002, 1002, '19.00-20.00 WIB', 'V. 602');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id` int NOT NULL,
  `nim` int DEFAULT NULL,
  `id_jadwal` int DEFAULT NULL,
  `kd_semester` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama`, `alamat`, `jurusan`) VALUES
(2011424, 'Heri', 'Jakarta', 'Teknik Informatika'),
(20114123, 'Dimas', 'Jakarta', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `kd_matkul` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sks` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`kd_matkul`, `nama`, `sks`) VALUES
(1001, 'algo1', '2 sks'),
(1002, 'web2', '3 sks');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `kd_semester` int NOT NULL,
  `semester` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`kd_semester`, `semester`) VALUES
(20221, 'Ganjil 2022/2023'),
(20222, 'Genap 2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`kd_dosen`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matkul` (`kd_matkul`),
  ADD KEY `fk_dosen` (`kd_dosen`);

--
-- Indexes for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mhs` (`nim`),
  ADD KEY `fk_jadwal` (`id_jadwal`),
  ADD KEY `fk_semester` (`kd_semester`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`kd_matkul`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`kd_semester`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `fk_dosen` FOREIGN KEY (`kd_dosen`) REFERENCES `tbl_dosen` (`kd_dosen`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_matkul` FOREIGN KEY (`kd_matkul`) REFERENCES `tbl_matkul` (`kd_matkul`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_mhs` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_semester` FOREIGN KEY (`kd_semester`) REFERENCES `tbl_semester` (`kd_semester`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
