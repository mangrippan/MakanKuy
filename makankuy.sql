-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 03:18 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makankuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`) VALUES
('admin', 'Novita Hasibuan', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
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
('abc', 'abcd', 'abc@gmail.com', '123', '09823013701', 18000),
('mamang', 'Riffan', 'riffan@gmail.com', '12345', '089628376766', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_restoran` varchar(5) NOT NULL,
  `foto_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_konsumen` varchar(10) NOT NULL,
  `id_restoran` varchar(15) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_konsumen`, `id_restoran`, `tanggal_pesan`, `jumlah_pesan`, `deposit`, `status`) VALUES
('abc', 'rasut', '2017-12-05 00:00:00', 2, 5000, 0),
('abc', 'berkah', '2017-12-10 00:00:00', 10, 1000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jalan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `detail_tempat` text,
  `no_telp` varchar(15) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT '0',
  `langtitude` double NOT NULL DEFAULT '0',
  `latitude` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `id_kategori` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `nama`, `password`, `jalan`, `kecamatan`, `detail_tempat`, `no_telp`, `rating`, `foto`, `jam_buka`, `jam_tutup`, `kapasitas`, `langtitude`, `latitude`, `status`, `id_kategori`) VALUES
('berkah', 'Berkah Malabar', '12345', 'Jalan Malabar', 'Bogor Tengah', 'Depan Pondok Malabar Indah', '-', 3, '-', '10:00:00', '23:00:00', 30, 0, 0, 0, NULL),
('pecel_pakuan', 'Pecel Lele Pakuan', '123', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00', '00:00:00', 0, 0, 0, 0, NULL),
('rasut', 'Rasa Utama', '123', 'Jalan Pakuan', 'Bogor Tengah', 'Depan Universitas Pakuan', '-', 3, '', '11:00:00', '22:00:00', 100, 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id_konsumen` varchar(5) NOT NULL,
  `tanggal_popup` date NOT NULL,
  `jumlah_popup` int(11) NOT NULL,
  `bukti` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
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
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`tanggal_pesan`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_restoran` (`id_restoran`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`tanggal_popup`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_restoran`) REFERENCES `restoran` (`id_restoran`);

--
-- Constraints for table `restoran`
--
ALTER TABLE `restoran`
  ADD CONSTRAINT `restoran_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
