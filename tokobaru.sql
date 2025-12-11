-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2025 at 06:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kodeBarang` char(5) NOT NULL,
  `namaBarang` varchar(40) NOT NULL,
  `hargaBarang` int(11) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodeBarang`, `namaBarang`, `hargaBarang`, `Stok`) VALUES
('A0001', 'Roti', 4000, 8),
('A0002', 'Pizza', 6000, 2),
('A0003', 'Air', 4000, 9),
('A0004', 'Soda', 5000, 5),
('A0005', 'Burger', 8000, 5),
('A0006', 'Hp', 100000, 5),
('A0007', 'Handphone', 1000000, 5),
('A0090', 'LAPTOP', 1000000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `detailbarang`
--

CREATE TABLE `detailbarang` (
  `Id` int(10) NOT NULL,
  `username` char(10) NOT NULL,
  `kodeBarang` char(5) NOT NULL,
  `namaBarang` varchar(40) NOT NULL,
  `hargaBarang` int(100) NOT NULL,
  `jumlahBarang` int(11) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `username` char(10) NOT NULL,
  `idPenjualan` int(5) NOT NULL,
  `kodeBarang` char(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`id`, `username`, `idPenjualan`, `kodeBarang`, `harga`, `jumlah`) VALUES
(00034, 'fahmi', 1, 'A0001', 4000, 1),
(00035, 'fahmi', 1, 'A0002', 6000, 2),
(00036, 'fahmi', 1, 'A0003', 4000, 3),
(00037, 'operator', 1, 'A0001', 4000, 2),
(00038, 'operator', 2, 'A0001', 4000, 2),
(00039, 'operator', 2, 'A0002', 6000, 3),
(00040, 'operator', 3, 'A0001', 4000, 1),
(00041, 'operator', 4, 'A0001', 4000, 2),
(00042, 'operator', 4, 'A0002', 6000, 3),
(00043, 'operator', 4, 'A0003', 4000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idPenjualan` int(5) NOT NULL,
  `username` char(10) NOT NULL,
  `tanggalPenjualan` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idPenjualan`, `username`, `tanggalPenjualan`, `total`) VALUES
(3, 'operator', '2025-12-05', 4000),
(4, 'operator', '2025-12-05', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` char(9) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Fahmii', 'admin'),
('operator', '4b583376b2767b923c3e1da60d10de59', 'Siti ', 'operator'),
('superadm', '593e6b548958933d90c7ba924b605cb7', 'Budi', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodeBarang`);

--
-- Indexes for table `detailbarang`
--
ALTER TABLE `detailbarang`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idPenjualan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailbarang`
--
ALTER TABLE `detailbarang`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idPenjualan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
