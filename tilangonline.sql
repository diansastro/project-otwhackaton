-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2015 at 05:08 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tilangonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`user_id`, `password`) VALUES
('polisi1', 'pakpol');

-- --------------------------------------------------------

--
-- Table structure for table `datatilang`
--

CREATE TABLE IF NOT EXISTS `datatilang` (
  `id` varchar(10) NOT NULL,
  `kesatuan` varchar(30) NOT NULL,
  `nama_dakwa` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `umur` int(2) NOT NULL,
  `t_lahir` varchar(15) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `sim_gol` char(3) NOT NULL,
  `no_dd` varchar(8) NOT NULL,
  `jns_kendaraan` varchar(10) NOT NULL,
  `tgl_tilang` varchar(10) NOT NULL,
  `jam_tilang` varchar(5) NOT NULL,
  `jalan` varchar(25) NOT NULL,
  `wilayah` varchar(25) NOT NULL,
  `surat_sita` varchar(4) NOT NULL,
  `ambil_sitaan` varchar(30) NOT NULL,
  `pasal_dilanggar` varchar(30) NOT NULL,
  `kosong1` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatilang`
--

INSERT INTO `datatilang` (`id`, `kesatuan`, `nama_dakwa`, `alamat`, `no_hp`, `pekerjaan`, `pendidikan`, `umur`, `t_lahir`, `tgl_lahir`, `no_ktp`, `sim_gol`, `no_dd`, `jns_kendaraan`, `tgl_tilang`, `jam_tilang`, `jalan`, `wilayah`, `surat_sita`, `ambil_sitaan`, `pasal_dilanggar`, `kosong1`) VALUES
('', 'Satlantas Gowa', 'Mujahidin', 'Jln Poros Malino', '082347578723', 'Swasta', 'S1', 23, 'Gowa', '08/10/2015', 2147483647, 'A', 'DD3625AC', 'Mobil', '08/10/2015', '23:00', 'Hertasning Baru', 'Makassar', 'STNK', 'Sendiri', 'Pasal 25 K', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `datatilang`
--
ALTER TABLE `datatilang`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
