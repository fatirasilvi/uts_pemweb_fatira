-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 11:30 AM
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
-- Table structure for table `tabel_akun2`
--

CREATE TABLE `tabel_akun2` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nim` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_akun2`
--

INSERT INTO `tabel_akun2` (`id`, `username`, `password`, `nim`) VALUES
(1, 'riku', '979b34c1b199476cea3dbb2542b35f5e', 'A123'),
(2, 'yushi', 'c938d90e65c29b0556104baa66da6070', 'A124'),
(3, 'yuta', 'fd9ba927d65fa1dbf33bfd1ef6e14203', 'A125');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_akun2`
--
ALTER TABLE `tabel_akun2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_akun2`
--
ALTER TABLE `tabel_akun2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_akun2`
--
ALTER TABLE `tabel_akun2`
  ADD CONSTRAINT `tabel_akun2_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tabel_mahasiswa` (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
