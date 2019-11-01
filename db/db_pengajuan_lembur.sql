-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 02:04 AM
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
-- Table structure for table `absen_lembur`
--

CREATE TABLE `absen_lembur` (
  `id_absen` int(20) NOT NULL,
  `ajuan_lembur_id` int(20) UNSIGNED NOT NULL,
  `jam_datang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jam_pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_lembur`
--

INSERT INTO `absen_lembur` (`id_absen`, `ajuan_lembur_id`, `jam_datang`, `jam_pulang`) VALUES
(1, 31, '2019-10-29 08:08:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ajuan_lembur`
--

CREATE TABLE `ajuan_lembur` (
  `id_ajuan_lembur` int(20) NOT NULL,
  `form_id` int(20) UNSIGNED NOT NULL,
  `pegawai_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajuan_lembur`
--

INSERT INTO `ajuan_lembur` (`id_ajuan_lembur`, `form_id`, `pegawai_id`) VALUES
(9, 5, 9),
(10, 5, 8),
(31, 4, 14),
(32, 3, 9),
(33, 3, 14),
(34, 3, 8),
(35, 7, 6),
(36, 7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_honor`
--

CREATE TABLE `daftar_honor` (
  `id_honor` int(20) NOT NULL,
  `ajuan_id` int(20) UNSIGNED NOT NULL,
  `jumlah_honor` int(20) NOT NULL
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
(9, 123, 'Test Berhasil', 10),
(13, 6554, 'yfjgvgh', 9),
(14, 6565, 'good job', 15),
(15, 9120, 'hasd', 14);

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
  `status` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_ajuan_lembur`
--

INSERT INTO `form_ajuan_lembur` (`id_form_ajuan`, `tanggal`, `unit_kerja`, `jenis_id`, `hasil`, `alasan`, `status`) VALUES
(3, '2019-10-25', 'Ekonomi', 12, 'jj', 'ihgi', '3'),
(4, '2019-10-25', 'iugiutg', 9, 'hhktfytjhgkiuyghjgih', 'gjkugikj', '2'),
(5, '2019-10-25', 'igyivuhyi', 9, 'khgi', 'ohuh', '1'),
(7, '2019-10-31', 'hgvuyf', 15, 'kjgh', 'ggiuhjkg', '0');

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
(3, 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_lembur`
--
ALTER TABLE `absen_lembur`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `ajuan_lembur`
--
ALTER TABLE `ajuan_lembur`
  ADD PRIMARY KEY (`id_ajuan_lembur`);

--
-- Indexes for table `daftar_honor`
--
ALTER TABLE `daftar_honor`
  ADD PRIMARY KEY (`id_honor`);

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
-- AUTO_INCREMENT for table `absen_lembur`
--
ALTER TABLE `absen_lembur`
  MODIFY `id_absen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ajuan_lembur`
--
ALTER TABLE `ajuan_lembur`
  MODIFY `id_ajuan_lembur` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `daftar_honor`
--
ALTER TABLE `daftar_honor`
  MODIFY `id_honor` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_data_pegawai` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `form_ajuan_lembur`
--
ALTER TABLE `form_ajuan_lembur`
  MODIFY `id_form_ajuan` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
