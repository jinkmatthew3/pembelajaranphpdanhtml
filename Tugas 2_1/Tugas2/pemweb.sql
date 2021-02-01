-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2019 at 01:38 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_mahasiswa`
--

CREATE TABLE `ms_mahasiswa` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_mahasiswa`
--

INSERT INTO `ms_mahasiswa` (`nim`, `nama`, `alamat`) VALUES
('110', 'Justin', 'kampung sawah'),
('111', 'Leonardo', 'Primorsk'),
('112', 'Mario', 'wkwkland'),
('113', 'Cika', 'Gading Serpong'),
('114', 'Doni', 'Cimone'),
('115', 'Sandi', 'Cikokol'),
('116', 'Vionie', 'Jambi'),
('117', 'James', 'Warjo'),
('118', 'Handriki', 'Wakanda'),
('119', 'Roni', 'Samen'),
('120', 'Meilona', 'Newton Utara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_mahasiswa`
--
ALTER TABLE `ms_mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
