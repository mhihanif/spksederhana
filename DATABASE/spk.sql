-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--
CREATE DATABASE IF NOT EXISTS `spk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `spk`;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kd_mk` varchar(20) NOT NULL,
  `nm_mk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kd_mk`, `nm_mk`) VALUES
('001', 'Sistem Pengambilan Keputusan'),
('002', 'Rekayasa Perangkat Lunak'),
('003', 'Jaringan Komputer 1'),
('005', 'Jaringan Komputer 2');

-- --------------------------------------------------------

--
-- Table structure for table `mhs_mk`
--

CREATE TABLE `mhs_mk` (
  `nim` varchar(20) NOT NULL,
  `kd_mk` varchar(20) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhs_mk`
--

INSERT INTO `mhs_mk` (`nim`, `kd_mk`, `nilai`, `bobot`) VALUES
('11111', '001', 'A', 4),
('11111', '002', 'B', 3),
('11111', '003', 'B', 3),
('11111', '005', 'B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan`
--

CREATE TABLE `pembobotan` (
  `kd_mk` varchar(20) NOT NULL,
  `rpl` float NOT NULL,
  `jaringan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembobotan`
--

INSERT INTO `pembobotan` (`kd_mk`, `rpl`, `jaringan`) VALUES
('001', 3, 1),
('002', 3, 1),
('003', 1, 3),
('005', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `peminatan`
--

CREATE TABLE `peminatan` (
  `nim` varchar(20) NOT NULL,
  `minat` varchar(100) NOT NULL,
  `hasil` varchar(100) NOT NULL,
  `nrpl` int(11) NOT NULL,
  `njrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminatan`
--

INSERT INTO `peminatan` (`nim`, `minat`, `hasil`, `nrpl`, `njrg`) VALUES
('11111', 'Rekayasa Perangkat Lunak', 'Rekayasa Perangkat Lunak', 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `nama`, `password`, `status`) VALUES
('00000', 'admin', 'admin', 'admin'),
('11111', 'budi', 'budi', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kd_mk`);

--
-- Indexes for table `mhs_mk`
--
ALTER TABLE `mhs_mk`
  ADD KEY `mhsmk_mhs` (`nim`),
  ADD KEY `mhsmk_mk` (`kd_mk`);

--
-- Indexes for table `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD KEY `bobot_mk` (`kd_mk`);

--
-- Indexes for table `peminatan`
--
ALTER TABLE `peminatan`
  ADD KEY `minat_mhs` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mhs_mk`
--
ALTER TABLE `mhs_mk`
  ADD CONSTRAINT `mhsmk_mhs` FOREIGN KEY (`nim`) REFERENCES `user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mhsmk_mk` FOREIGN KEY (`kd_mk`) REFERENCES `matakuliah` (`kd_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD CONSTRAINT `bobot_mk` FOREIGN KEY (`kd_mk`) REFERENCES `matakuliah` (`kd_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminatan`
--
ALTER TABLE `peminatan`
  ADD CONSTRAINT `minat_mhs` FOREIGN KEY (`nim`) REFERENCES `user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
