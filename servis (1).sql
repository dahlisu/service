-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2025 at 05:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servis`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_servis`
--

CREATE TABLE `jadwal_servis` (
  `id` int(11) NOT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `jenis_servis` enum('rutin','pajak_tahunan','ganti_plat') DEFAULT NULL,
  `tanggal_servis` date DEFAULT NULL,
  `status` enum('belum','sudah') DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_servis`
--

INSERT INTO `jadwal_servis` (`id`, `id_kendaraan`, `jenis_servis`, `tanggal_servis`, `status`) VALUES
(1, 1, 'rutin', '2025-08-15', 'belum'),
(2, 2, 'rutin', '2025-08-15', 'belum'),
(3, 3, 'rutin', '2025-08-15', 'belum'),
(4, 4, 'pajak_tahunan', '2025-08-21', 'belum'),
(5, 5, 'rutin', '2025-08-21', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `plat_nomor` varchar(15) DEFAULT NULL,
  `tipe_kendaraan` varchar(50) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `plat_nomor`, `tipe_kendaraan`, `tahun`, `id_pengguna`, `id_perusahaan`) VALUES
(5, 'S 2636 TI', 'SCOOPY', 2016, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan1`
--

CREATE TABLE `kendaraan1` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `tahun_pembuatan` int(11) DEFAULT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `plat` varchar(50) DEFAULT NULL,
  `akhir_pajak` date DEFAULT NULL,
  `akhir_plat` date DEFAULT NULL,
  `akhir_kir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan1`
--

INSERT INTO `kendaraan1` (`id`, `merk`, `tahun_pembuatan`, `pemilik`, `email`, `plat`, `akhir_pajak`, `akhir_plat`, `akhir_kir`) VALUES
(1, 'L300', 2022, 'PT.TASHA INDONESIA', 'dahlia.suaida29@smk.belajar.id', 'S 8339 UF', '2025-03-16', '2027-03-16', '2024-12-26'),
(2, 'L300', 2022, 'PT.TASHA INDONESIA', 'dahlia.suaida29@smk.belajar.id', 'S 8049 UF', '2026-02-21', '2028-02-21', '2025-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `no_hp`, `email`) VALUES
(1, 'Dahlia Suaida Nur Amalina', '088888888888', NULL),
(2, 'DAHLIA SUAIDA NUR AMALINA', '085895445532', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`) VALUES
(1, 'PT.TASHA INDONESIA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_servis`
--
ALTER TABLE `jadwal_servis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan1`
--
ALTER TABLE `kendaraan1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_servis`
--
ALTER TABLE `jadwal_servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kendaraan1`
--
ALTER TABLE `kendaraan1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
