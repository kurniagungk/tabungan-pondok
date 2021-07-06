-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2021 at 09:03 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabungan_pondok`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

REPLACE INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `REKENING` varchar(50) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `SALDO` double NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `GAMBAR` varchar(50) NOT NULL,
  PRIMARY KEY (`REKENING`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `saldo-awal` int(11) DEFAULT NULL,
  `tambah-saldo` int(11) NOT NULL,
  `setor` int(11) DEFAULT NULL,
  `tarik` int(11) DEFAULT NULL,
  `uang-yang-ada` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `isi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

REPLACE INTO `setting` (`id`, `nama`, `isi`) VALUES
(1, 'biaya_tanggal', '1'),
(2, 'biaya_jumlah', '500');
(3, 'saldo_minimal', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `TANGGAL` date NOT NULL,
  `IDTR` varchar(50) NOT NULL,
  `REKENING` varchar(50) NOT NULL,
  `JENIS` enum('Setor','Tarik') NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `KETERANGAN` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`IDTR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
