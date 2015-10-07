-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2015 at 04:26 AM
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
  `no_tilang` varchar(10) NOT NULL,
  `kesatuan` varchar(30) NOT NULL,
  `nama_dakwa` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `umur` int(2) NOT NULL,
  `t_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `sim_gol` char(3) NOT NULL,
  `no_dd` varchar(8) NOT NULL,
  `jns_kendaraan` varchar(10) NOT NULL,
  `tgl_tilang` date NOT NULL,
  `jam_tilang` time(6) NOT NULL,
  `jalan` varchar(25) NOT NULL,
  `wilayah` varchar(25) NOT NULL,
  `surat_sita` varchar(4) NOT NULL,
  `ambil_sitaan` varchar(30) NOT NULL,
  `pasal_dilanggar` varchar(10) NOT NULL,
  `kosong` char(1) NOT NULL,
  `kosong1` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatilang`
--

INSERT INTO `datatilang` (`no_tilang`, `kesatuan`, `nama_dakwa`, `alamat`, `no_hp`, `pekerjaan`, `pendidikan`, `umur`, `t_lahir`, `tgl_lahir`, `no_ktp`, `sim_gol`, `no_dd`, `jns_kendaraan`, `tgl_tilang`, `jam_tilang`, `jalan`, `wilayah`, `surat_sita`, `ambil_sitaan`, `pasal_dilanggar`, `kosong`, `kosong1`) VALUES
('10002', 'samsat', 'wadidd', 'asdads', '982345', 'petani', 'S1', 34, 'Jayapura', '2015-10-13', 23412341, 'B', 'DD3456WE', 'Mobil', '2015-10-05', '04:06:00.000000', 'Sukorini', 'Jateng', 'SIM', 'Wakilkan', '23 KUHP', '', ''),
('123', 'samsat', 'sasa', 'jln sukorini', '98234', 'pelajar', 'SMA', 21, 'Temanggung', '2015-10-07', 234141414, 'A', 'DD4323AC', 'Motor', '2015-10-08', '04:06:00.000000', 'Sukawati', 'Sepampang', 'STNK', 'Sendiri', '31', '', '');

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
  ADD PRIMARY KEY (`no_tilang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;