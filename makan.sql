-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2017 at 05:32 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `makan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
  `id_konsumen` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama`, `email`, `password`, `no_telp`, `saldo`) VALUES
('abc', 'abcd', 'abc@gmail.com', '123', '09823013701', NULL),
('mamang', 'Riffan', 'riffan@gmail.com', '12345', '089628376766', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_kategori` varchar(5) NOT NULL,
  `id_restoran` varchar(5) NOT NULL,
  `menu` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(5) NOT NULL,
  `id_konsumen` varchar(5) NOT NULL,
  `id_restoran` varchar(5) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE IF NOT EXISTS `pengelola` (
  `id_pengelola` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_restoran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE IF NOT EXISTS `rekomendasi` (
  `id_konsumen` varchar(5) NOT NULL,
  `tanggal_rekomendasi` date NOT NULL,
  `nama_restoran` varchar(30) NOT NULL,
  `alamat_restoran` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE IF NOT EXISTS `restoran` (
  `id_restoran` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jalan` varchar(50) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `detail_tempat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `rating` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `langtitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE IF NOT EXISTS `topup` (
  `id_topup` varchar(5) NOT NULL,
  `id_konsumen` varchar(5) NOT NULL,
  `id_admin` varchar(5) NOT NULL,
  `tanggal_popup` date NOT NULL,
  `jumlah_popup` int(11) NOT NULL,
  `bukti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
 ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD KEY `id_kategori` (`id_kategori`), ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`id_pemesanan`), ADD KEY `id_konsumen` (`id_konsumen`), ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
 ADD PRIMARY KEY (`id_pengelola`), ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
 ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
 ADD PRIMARY KEY (`id_restoran`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
 ADD PRIMARY KEY (`id_topup`), ADD KEY `id_konsumen` (`id_konsumen`), ADD KEY `id_admin` (`id_admin`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`),
ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`);

--
-- Constraints for table `pengelola`
--
ALTER TABLE `pengelola`
ADD CONSTRAINT `pengelola_ibfk_1` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
ADD CONSTRAINT `rekomendasi_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`),
ADD CONSTRAINT `topup_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
