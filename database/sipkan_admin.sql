-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 09:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipkan_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `id` int(11) NOT NULL,
  `jenis_ikan` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`id`, `jenis_ikan`) VALUES
(1, 'Lele'),
(2, 'Gurame'),
(3, 'Nila'),
(4, 'Mujair');

-- --------------------------------------------------------

--
-- Table structure for table `ikan_mati`
--

CREATE TABLE `ikan_mati` (
  `id` int(11) NOT NULL,
  `nama_kolam` varchar(100) NOT NULL,
  `jenis_ikan` varchar(100) NOT NULL,
  `penyebab` varchar(255) NOT NULL,
  `jumlah_ikan_mati` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikan_mati`
--

INSERT INTO `ikan_mati` (`id`, `nama_kolam`, `jenis_ikan`, `penyebab`, `jumlah_ikan_mati`, `tanggal`) VALUES
(10, 'Kolam 2', 'Mujair', 'Jamur Ikan', 20, '2022-06-12'),
(11, 'Kolam 1', 'Nila', 'Jamur Ikan', 20, '2022-06-13'),
(12, 'Kolam 7', 'Lele', 'Jamur Ikan', 25, '2022-06-14'),
(13, 'Kolam 5', 'Gurame', 'Hama', 23, '2022-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `kolam`
--

CREATE TABLE `kolam` (
  `id` int(11) NOT NULL,
  `nama_kolam` varchar(24) NOT NULL,
  `tipe` varchar(12) NOT NULL,
  `jenis_ikan` varchar(12) NOT NULL,
  `jumlah_ikan` int(11) NOT NULL,
  `jenis_pakan` varchar(12) NOT NULL,
  `jml_pakan_hari` int(11) NOT NULL,
  `tanggal_tebar` int(11) DEFAULT NULL,
  `masa_panen` int(11) DEFAULT NULL,
  `estimasi_panen` int(11) DEFAULT NULL,
  `jumlah_ikan_mati` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kolam`
--

INSERT INTO `kolam` (`id`, `nama_kolam`, `tipe`, `jenis_ikan`, `jumlah_ikan`, `jenis_pakan`, `jml_pakan_hari`, `tanggal_tebar`, `masa_panen`, `estimasi_panen`, `jumlah_ikan_mati`) VALUES
(1, 'Kolam 1', 'D-2,5', 'Nila', 330, 'PF-500', 3, 1654958671, 120, 1665326671, 20),
(2, 'Kolam 2', 'D-2,5', 'Mujair', 380, 'PF-500', 2, 1655192684, 120, 1665560684, 20),
(3, 'Kolam 3', 'D-2,5', 'Lele', 400, 'PF-800', 2, 1654958731, 150, 1667918731, 0),
(4, 'Kolam 4', 'D-2,5', 'Nila', 400, 'PF-500', 2, 1654958754, 120, 1665326754, 0),
(5, 'Kolam 5', 'D-2,5', 'Gurame', 277, 'PF-500', 2, 1654958771, 90, 1662734771, 23),
(6, 'Kolam 6', 'D-3', 'Gurame', 450, 'PF-500', 3, 1654958913, 120, 1665326913, 0),
(7, 'Kolam 7', 'D-3', 'Lele', 475, 'PF-800', 3, 1654958928, 150, 1667918928, 25),
(8, 'Kolam 8', 'D-3', 'Lele', 500, 'PF-800', 3, 1654958947, 120, 1665326947, 0),
(9, 'Kolam 9', 'D-3', 'Lele', 500, 'PF-800', 3, 1654958962, 120, 1665326962, 0),
(10, 'Kolam 10', 'D-3', 'Lele', 400, 'PF-800', 3, 1654952428, 60, 1660136428, 0),
(11, 'Kolam 11', 'D-3', 'Gurame', 400, 'PF-800', 3, 1655192713, 180, 1670744713, 0),
(12, 'Kolam 12', 'D-3', 'Gurame', 350, 'PF-500', 2, 1655207731, 120, 1665575731, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pakan`
--

CREATE TABLE `pakan` (
  `id` int(11) NOT NULL,
  `jenis_pakan` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakan`
--

INSERT INTO `pakan` (`id`, `jenis_pakan`, `stock`) VALUES
(1, 'PF-500', 84),
(2, 'PF-800', 100),
(3, 'PF-1000', 120),
(4, 'PF-1200', 90);

-- --------------------------------------------------------

--
-- Table structure for table `panen`
--

CREATE TABLE `panen` (
  `id` int(11) NOT NULL,
  `nama_kolam` varchar(100) NOT NULL,
  `jenis_ikan` varchar(100) NOT NULL,
  `jumlah_ikan` int(11) NOT NULL,
  `jumlah_ikan_mati` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panen`
--

INSERT INTO `panen` (`id`, `nama_kolam`, `jenis_ikan`, `jumlah_ikan`, `jumlah_ikan_mati`, `tanggal`) VALUES
(3, 'Kolam 2', 'Mujair', 380, 20, 1655167712),
(4, 'Kolam 12', 'Gurame', 450, 0, 1655168111),
(5, 'Kolam 11', 'Gurame', 450, 0, 1655169296);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'sipkan-admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ikan_mati`
--
ALTER TABLE `ikan_mati`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kolam`
--
ALTER TABLE `kolam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakan`
--
ALTER TABLE `pakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panen`
--
ALTER TABLE `panen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ikan_mati`
--
ALTER TABLE `ikan_mati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kolam`
--
ALTER TABLE `kolam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pakan`
--
ALTER TABLE `pakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `panen`
--
ALTER TABLE `panen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
