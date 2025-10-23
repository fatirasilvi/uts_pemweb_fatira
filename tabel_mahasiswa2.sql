-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 11:29 AM
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
-- Database: `uts_pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa2`
--

CREATE TABLE `tabel_mahasiswa2` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_mahasiswa2`
--

INSERT INTO `tabel_mahasiswa2` (`nim`, `nama`, `prodi`, `angkatan`, `alamat`, `semester`, `ipk`) VALUES
('A123', 'Riku', 'PTIK', 2023, 'Solo', 3, 3.80),
('A124', 'Yushi', 'PTIK', 2023, 'Sragen', 3, 3.75),
('A125', 'Yuta', 'PTIK', 2023, 'Klaten', 3, 3.40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa2`
--
ALTER TABLE `tabel_mahasiswa2`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
