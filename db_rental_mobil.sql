-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2026 at 10:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `status_akun`) VALUES
('nadia@gmail.com', '123456', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `kode_bayar` varchar(20) NOT NULL,
  `tgl_wkt_byr` datetime NOT NULL,
  `ft_byr` varchar(255) DEFAULT NULL,
  `mtode_byr` varchar(30) NOT NULL,
  `jns_byr` varchar(30) NOT NULL,
  `nominal` decimal(12,2) NOT NULL,
  `stts_byr` varchar(30) NOT NULL,
  `tgl_wkt_ver` datetime DEFAULT NULL,
  `kode_sewa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `kode_denda` varchar(20) NOT NULL,
  `telat_jam` int NOT NULL,
  `tarif_per_jam` decimal(12,2) NOT NULL,
  `kode_kembali` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `kode_kembali` varchar(20) NOT NULL,
  `tgl_wkt_blk` datetime NOT NULL,
  `stts_blk` varchar(30) NOT NULL,
  `ket_blk` text,
  `kode_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `no_plat` varchar(10) NOT NULL,
  `nm_mobil` varchar(100) NOT NULL,
  `nkursi` int NOT NULL,
  `nbagasi` int NOT NULL,
  `jns_mobil` varchar(50) NOT NULL,
  `transmisi` varchar(30) NOT NULL,
  `thn_buat` year NOT NULL,
  `ft_depan` varchar(255) DEFAULT NULL,
  `ft_blkg` varchar(255) DEFAULT NULL,
  `ft_interior` varchar(255) DEFAULT NULL,
  `hrg_hari` decimal(12,2) NOT NULL,
  `cttn_unit` text,
  `status_unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`no_plat`, `nm_mobil`, `nkursi`, `nbagasi`, `jns_mobil`, `transmisi`, `thn_buat`, `ft_depan`, `ft_blkg`, `ft_interior`, `hrg_hari`, `cttn_unit`, `status_unit`) VALUES
('D  4MN N4D', 'Honda Accord G11', 5, 2, 'Sedan', 'Automatic', '2025', 'accord_depan_1.jpeg', 'accord_belakang_1.jpeg', 'accord_interior_1.jpeg', 2000000.00, 'bagus', 'Tersedia'),
('N 4D1A SP', 'BMW M4 G82', 4, 1, 'Coupe', 'Manual', '2024', 'bmw_m4_depan.jpeg', 'bmw_m4_belakang.jpeg', 'bmw_m4_interior.jpeg', 10000000.00, 'BMW M4 G82 kondisi prima', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `user_plq071` varchar(50) NOT NULL,
  `Sandi071` varchar(255) NOT NULL,
  `Nik071` varchar(20) NOT NULL,
  `nm_lngkp071` varchar(100) NOT NULL,
  `no_hp071` varchar(20) NOT NULL,
  `almt_lngkp071` text,
  `ft_ktp` varchar(255) DEFAULT NULL,
  `ft_sim_a` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`user_plq071`, `Sandi071`, `Nik071`, `nm_lngkp071`, `no_hp071`, `almt_lngkp071`, `ft_ktp`, `ft_sim_a`) VALUES
('nadia071', 'nadia123', '3171012007070002', 'Nadia Syadahnie Putri', '081234567890', 'Pangkalan Baru, Bangka Tengah', 'ft_ktp_6ae863f90f903.png', 'ft_sim_a_6ae863f90fdeb.png');

-- --------------------------------------------------------

--
-- Table structure for table `pilih`
--

CREATE TABLE `pilih` (
  `kode_sewa` varchar(20) NOT NULL,
  `no_plat` varchar(15) NOT NULL,
  `hrg_sewa` decimal(12,2) NOT NULL,
  `n_hari` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `kode_sewa` varchar(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `wkt_ambil` datetime DEFAULT NULL,
  `status_sewa` varchar(30) NOT NULL,
  `user_plg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`kode_bayar`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`kode_denda`),
  ADD KEY `kode_kembali` (`kode_kembali`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`kode_kembali`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`user_plq071`),
  ADD UNIQUE KEY `nik` (`Nik071`);

--
-- Indexes for table `pilih`
--
ALTER TABLE `pilih`
  ADD PRIMARY KEY (`kode_sewa`,`no_plat`),
  ADD KEY `no_plat` (`no_plat`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`kode_sewa`),
  ADD KEY `user_plg` (`user_plg`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`kode_kembali`) REFERENCES `kembali` (`kode_kembali`);

--
-- Constraints for table `pilih`
--
ALTER TABLE `pilih`
  ADD CONSTRAINT `pilih_ibfk_1` FOREIGN KEY (`kode_sewa`) REFERENCES `sewa` (`kode_sewa`),
  ADD CONSTRAINT `pilih_ibfk_2` FOREIGN KEY (`no_plat`) REFERENCES `mobil` (`no_plat`);

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`user_plg`) REFERENCES `penyewa` (`user_plq071`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
