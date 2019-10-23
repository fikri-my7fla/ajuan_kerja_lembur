-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 03:00 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengajuan_lembur`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan_lembur`
--

CREATE TABLE `ajuan_lembur` (
  `id_ajuan_lembur` int(20) NOT NULL,
  `form_ajuan_lembur_id` int(20) UNSIGNED NOT NULL,
  `form_pegawai_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_data_pegawai` int(20) UNSIGNED NOT NULL,
  `nip` int(20) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jenis_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_data_pegawai`, `nip`, `nama_pegawai`, `jenis_id`) VALUES
(1, 1234567, 'Fikri', 10),
(6, 125, 'Test', 9),
(8, 124, 'BERHASIL', 9),
(9, 123, 'Test Berhasil', 10);

-- --------------------------------------------------------

--
-- Table structure for table `form_ajuan_lembur`
--

CREATE TABLE `form_ajuan_lembur` (
  `id_form_ajuan` int(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `jenis_id` int(20) UNSIGNED NOT NULL,
  `hasil` varchar(100) NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_ajuan_lembur`
--

INSERT INTO `form_ajuan_lembur` (`id_form_ajuan`, `tanggal`, `unit_kerja`, `jenis_id`, `hasil`, `alasan`, `status`) VALUES
(1, '2019-10-21', 'none', 9, 'none', 'noen', '1');

-- --------------------------------------------------------

--
-- Table structure for table `form_pegawai`
--

CREATE TABLE `form_pegawai` (
  `id_form_pegawai` int(20) NOT NULL,
  `form_ajuan_lembur_id` int(20) UNSIGNED NOT NULL,
  `data_pegawai_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id_jenis` int(20) UNSIGNED NOT NULL,
  `sub_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id_jenis`, `sub_unit`) VALUES
(9, 'keuangan'),
(10, 'Arsipan'),
(12, 'Test Edit'),
(13, 'whejdwede'),
(14, 'sjdada'),
(15, 'jshksbd'),
(16, 'shjasd'),
(17, 'asdhjasn'),
(18, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','member','operator') NOT NULL,
  `pegawai_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `type`, `pegawai_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1),
(2, 'member', 'aa08769cdcb26674c6706093503ff0a3', 'member', 2),
(3, 'pimpinan', '3f0eca2cbc7de2aaaff8d23afd465bb2', 'operator', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan_lembur`
--
ALTER TABLE `ajuan_lembur`
  ADD PRIMARY KEY (`id_ajuan_lembur`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_data_pegawai`),
  ADD UNIQUE KEY `unique` (`nip`);

--
-- Indexes for table `form_ajuan_lembur`
--
ALTER TABLE `form_ajuan_lembur`
  ADD PRIMARY KEY (`id_form_ajuan`);

--
-- Indexes for table `form_pegawai`
--
ALTER TABLE `form_pegawai`
  ADD PRIMARY KEY (`id_form_pegawai`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan_lembur`
--
ALTER TABLE `ajuan_lembur`
  MODIFY `id_ajuan_lembur` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_data_pegawai` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_ajuan_lembur`
--
ALTER TABLE `form_ajuan_lembur`
  MODIFY `id_form_ajuan` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_pegawai`
--
ALTER TABLE `form_pegawai`
  MODIFY `id_form_pegawai` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id_jenis` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
