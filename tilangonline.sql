-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2015 at 11:06 AM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `useradmin` varchar(30) NOT NULL,
  `password_admin` varchar(20) NOT NULL,
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` int(10) NOT NULL,
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
  `jml_denda` varchar(10) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `id_petugas` varchar(30) NOT NULL,
  `kertas` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatilang`
--

INSERT INTO `datatilang` (`id`, `kesatuan`, `nama_dakwa`, `alamat`, `no_hp`, `pekerjaan`, `pendidikan`, `umur`, `t_lahir`, `tgl_lahir`, `no_ktp`, `sim_gol`, `no_dd`, `jns_kendaraan`, `tgl_tilang`, `jam_tilang`, `jalan`, `wilayah`, `surat_sita`, `ambil_sitaan`, `pasal_dilanggar`, `jml_denda`, `foto`, `id_petugas`, `kertas`) VALUES
(4, 'Satlantas Makassar', 'Siloam', 'Jln Poros Malino', '082347578723', 'PNS', 'S1', 23, 'Makassar', '11/10/2015', 2147483647, 'C', 'DD3625AC', 'Mobil', '11/10/2015', '23:00', 'Hertasning Baru', 'Makassar', 'SIM', 'Diwakilkan', 'Pasal 25 KUHP', '', '', '', ''),
(5, 'Satlantas Gowa', 'Waluyo', 'Jln Poros Malino', '082347578723', 'Petani', 'S2', 23, 'Makassar', '11/10/2015', 2147483647, 'B', 'DD3465AD', 'Mobil', '11/10/2015', '23:00', 'Hertasning Baru', 'Makassar', 'SIM', 'Diwakilkan', 'Pasal 25 KUHP', '', '', '', ''),
(6, 'Satlantas Gowa', 'saya', 'jalan buntu', '082347578723', 'Petani', 'SMA', 23, 'Makassar', '28/09/2015', 2147483647, 'C', 'DD3465AD', 'Roda Enam', '13/10/2015', '23:00', 'Pangayoman', 'Makassar', 'SIM', 'Sendiri', 'Pasal 25 KUHP', '', '', '', ''),
(7, 'Polrestabes Mamuju', 'Handoko', 'jln Tuddopuli', '083245678721', 'Wiraswasta', 'S1', 27, 'Mamuju', '06/10/2015', 2147483647, 'B2', 'DD3453WE', 'Roda Dua', '13/10/2015', '23:00', 'Jln Hertasning baru', 'Makassar', 'SIM', 'Diwakilkan', 'Pasal 23 KUHP', '', '', '', ''),
(8, 'Satlantas Panakukang', 'Anging  Darma', 'Jln Poros Bandara', '082476897346', 'PNS', 'S2', 23, 'Makassar', '17/10/1994', 2147483647, 'B1', 'DD 4567 ', 'Roda Empat', '15/10/2015', '23:00', 'Hertasning Baru', 'Makassar', 'SIM', 'Diwakilkan', 'Pasal 23 KUHP', '', '', '', ''),
(9, 'Satlantas Makassar', 'Darmo', 'jln Tuddopuli', '082476897346', 'Petani', 'SD', 43, 'Makassar', '28/09/2015', 2147483647, 'A', 'DD 4567 ', 'Roda Dua', '12/10/2015', '23:00', 'Jln Hertasning baru', 'Makassar', 'SIM', 'Diwakilkan', '23 KUHP', '343434', 'sd', 'wewe', 'Merah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datatilang`
--
ALTER TABLE `datatilang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
