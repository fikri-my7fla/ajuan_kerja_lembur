-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 03:11 AM
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
  `form_id` int(10) UNSIGNED NOT NULL,
  `nip_absen` int(20) UNSIGNED NOT NULL,
  `jam_datang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jam_pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_lembur`
--

INSERT INTO `absen_lembur` (`id_absen`, `form_id`, `nip_absen`, `jam_datang`, `jam_pulang`) VALUES
(1, 1, 1, '2019-12-20 01:46:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ajuan_lembur`
--

CREATE TABLE `ajuan_lembur` (
  `id_ajuan_lembur` int(20) NOT NULL,
  `form_id` int(20) UNSIGNED NOT NULL,
  `nip_pegawai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajuan_lembur`
--

INSERT INTO `ajuan_lembur` (`id_ajuan_lembur`, `form_id`, `nip_pegawai`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_honor`
--

CREATE TABLE `daftar_honor` (
  `id_honor` int(20) NOT NULL,
  `form_id_honor` int(20) UNSIGNED NOT NULL,
  `nip_honor` int(20) UNSIGNED NOT NULL,
  `jenis_id_honor` int(10) UNSIGNED NOT NULL,
  `tarif_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_honor`
--

INSERT INTO `daftar_honor` (`id_honor`, `form_id_honor`, `nip_honor`, `jenis_id_honor`, `tarif_id`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` int(20) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jenis_id` int(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`nip`, `nama_pegawai`, `jenis_id`, `user_id`) VALUES
(1, 'admin', 1, 1),
(2, 'operator', 1, 2);

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
  `status` enum('1','2','3','4') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `pengusul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_ajuan_lembur`
--

INSERT INTO `form_ajuan_lembur` (`id_form_ajuan`, `tanggal`, `unit_kerja`, `jenis_id`, `hasil`, `alasan`, `status`, `description`, `pengusul`) VALUES
(1, '2019-12-20', 'admin', 1, 'admin', 'admin', '2', NULL, 'admin');

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
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `id_sign` int(20) NOT NULL,
  `sign` longtext NOT NULL,
  `nip_pgw` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id_sign`, `sign`, `nip_pgw`) VALUES
(1, 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgNTcwIDMxOCIgd2lkdGg9IjU3MCIgaGVpZ2h0PSIzMTgiPjxwYXRoIGQ9Ik0gMTU2LjAwMCwyMTUuMDAwIEMgMTU3Ljk0NiwyMDkuNjYxIDE1OC41MDAsMjEwLjAwMCAxNjEuMDAwLDIwNS4wMDAiIHN0cm9rZS13aWR0aD0iNS4yNzIiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTYxLjAwMCwyMDUuMDAwIEMgMTY2LjkxMiwxOTQuNTAzIDE2Ny40NDYsMTk1LjE2MSAxNzUuMDAwLDE4Ni4wMDAiIHN0cm9rZS13aWR0aD0iMy4yMzYiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTc1LjAwMCwxODYuMDAwIEMgMTg2LjAxMSwxNzIuODYwIDE4Ni40MTIsMTc0LjAwMyAyMDAuMDAwLDE2NC4wMDAiIHN0cm9rZS13aWR0aD0iMi41NjUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjAwLjAwMCwxNjQuMDAwIEMgMjMwLjgxNywxNDEuMTg3IDIzMS4wMTEsMTQ0LjM2MCAyNjUuMDAwLDEyOS4wMDAiIHN0cm9rZS13aWR0aD0iMS40NzMiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjY1LjAwMCwxMjkuMDAwIEMgMjg5Ljk5MSwxMjUuMDg0IDI4OC4zMTcsMTIwLjY4NyAzMTUuMDAwLDEyMy4wMDAiIHN0cm9rZS13aWR0aD0iMS45MzAiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMzE1LjAwMCwxMjMuMDAwIEMgMzI2LjA2MSwxMjIuMjMxIDMxOS45OTEsMTIyLjU4NCAzMjUuMDAwLDEyNC4wMDAiIHN0cm9rZS13aWR0aD0iMy4xNTgiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMzI1LjAwMCwxMjQuMDAwIEMgMzE3LjU2NSwxMzAuMTQ1IDMyMy4wNjEsMTI3LjIzMSAzMDkuMDAwLDEzMy4wMDAiIHN0cm9rZS13aWR0aD0iNC4xMDciIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMzA5LjAwMCwxMzMuMDAwIEMgMjk5LjA0OSwxMzYuNDQyIDI5OS41NjUsMTM2LjE0NSAyODkuMDAwLDEzNi4wMDAiIHN0cm9rZS13aWR0aD0iMy40NDAiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjg5LjAwMCwxMzYuMDAwIEMgMjQ3Ljk3OSwxMzIuMjI4IDI1My41NDksMTM0LjQ0MiAyMTguMDAwLDEyOS4wMDAiIHN0cm9rZS13aWR0aD0iMi45MjIiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjE4LjAwMCwxMjkuMDAwIEMgMjIxLjUzNCwxMjcuNDI1IDIxNS40NzksMTI4LjcyOCAyMjQuMDAwLDEyOS4wMDAiIHN0cm9rZS13aWR0aD0iNC4yNjkiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjI0LjAwMCwxMjkuMDAwIEMgMjQwLjEzMSwxMzkuMzExIDIzOS41MzQsMTM4LjkyNSAyNTQuMDAwLDE1Mi4wMDAiIHN0cm9rZS13aWR0aD0iMy4yMDIiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjU0LjAwMCwxNTIuMDAwIEMgMjYyLjIzNywxNjIuMjM2IDI2My42MzEsMTYwLjgxMSAyNzEuMDAwLDE3Mi4wMDAiIHN0cm9rZS13aWR0aD0iMi41NjQiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjwvc3ZnPg==', 2),
(2, 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgNTcwIDMxOCIgd2lkdGg9IjU3MCIgaGVpZ2h0PSIzMTgiPjxwYXRoIGQ9Ik0gMTQ2LjAwMCwxNzMuMDAwIEMgMTUxLjQzNSwxNjUuNDYxIDE1Mi4wMDAsMTY2LjAwMCAxNTguMDAwLDE1OS4wMDAiIHN0cm9rZS13aWR0aD0iNS4xNDEiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTU4LjAwMCwxNTkuMDAwIEMgMTgxLjA4MSwxMzIuMDA3IDE4Mi45MzUsMTM0LjQ2MSAyMDkuMDAwLDExMS4wMDAiIHN0cm9rZS13aWR0aD0iMS43ODAiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjA5LjAwMCwxMTEuMDAwIEMgMjg0LjQ3MSw1NC4wMjAgMjg0LjA4MSw1NC41MDcgMzY0LjAwMCw0LjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjI0NiIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAxMzIuMDAwLDEyMC4wMDAgQyAxMzcuNzEyLDEyMC40OTQgMTM3LjUwMCwxMTkuNTAwIDE0My4wMDAsMTE5LjAwMCIgc3Ryb2tlLXdpZHRoPSI1LjMxNiIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAxNDMuMDAwLDExOS4wMDAgQyAxNjAuMjk1LDExMi4yODAgMTYwLjcxMiwxMTMuOTk0IDE3OC4wMDAsMTA3LjAwMCIgc3Ryb2tlLXdpZHRoPSIyLjIxNCIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAxNzguMDAwLDEwNy4wMDAgQyAxODguOTI2LDEwNC4xMDkgMTg4Ljc5NSwxMDMuNzgwIDIwMC4wMDAsMTAyLjAwMCIgc3Ryb2tlLXdpZHRoPSIyLjQwNCIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAyMDAuMDAwLDEwMi4wMDAgQyAyMDkuOTcxLDEwMC4xMTQgMjA5LjkyNiwxMDAuMTA5IDIyMC4wMDAsOTkuMDAwIiBzdHJva2Utd2lkdGg9IjIuNTE3IiBzdHJva2U9ImJsYWNrIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiPjwvcGF0aD48cGF0aCBkPSJNIDIyMC4wMDAsOTkuMDAwIEMgMjIzLjU1Nyw5OC41NDEgMjIzLjQ3MSw5OC42MTQgMjI3LjAwMCw5OS4wMDAiIHN0cm9rZS13aWR0aD0iMy40NTUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjI3LjAwMCw5OS4wMDAgQyAyMzMuODc0LDk5LjAzMCAyMzEuMDU3LDk5LjU0MSAyMzUuMDAwLDEwMS4wMDAiIHN0cm9rZS13aWR0aD0iNC4yODEiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjM1LjAwMCwxMDEuMDAwIEMgMjMzLjY3MywxMDQuMzA3IDIzNS44NzQsMTAyLjUzMCAyMzEuMDAwLDEwNi4wMDAiIHN0cm9rZS13aWR0aD0iNC43OTYiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjMxLjAwMCwxMDYuMDAwIEMgMjE4LjE0NiwxMTMuMjg3IDIxOC42NzMsMTEzLjgwNyAyMDUuMDAwLDEyMC4wMDAiIHN0cm9rZS13aWR0aD0iMi40ODAiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjA1LjAwMCwxMjAuMDAwIEMgMTk0LjcxNSwxMjUuNTE0IDE5NC42NDYsMTI1LjI4NyAxODQuMDAwLDEzMC4wMDAiIHN0cm9rZS13aWR0aD0iMi41MTQiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTg0LjAwMCwxMzAuMDAwIEMgMTczLjI2NywxMzUuMDQ5IDE3My4yMTUsMTM0LjUxNCAxNjIuMDAwLDEzOC4wMDAiIHN0cm9rZS13aWR0aD0iMi41NjgiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTYyLjAwMCwxMzguMDAwIEMgMTQ3LjM4MSwxMzkuNDYyIDE1Mi4yNjcsMTQwLjU0OSAxNDIuMDAwLDE0MS4wMDAiIHN0cm9rZS13aWR0aD0iMi43NjkiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTQyLjAwMCwxNDEuMDAwIEMgMTQ1LjAxMywxNDEuNDI2IDE0MC4zODEsMTQxLjQ2MiAxNDguMDAwLDE0Mi4wMDAiIHN0cm9rZS13aWR0aD0iNC4xNzUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTQ4LjAwMCwxNDIuMDAwIEMgMTcxLjc2NSwxNDMuOTA4IDE3MS4wMTMsMTQ2LjQyNiAxOTQuMDAwLDE1MS4wMDAiIHN0cm9rZS13aWR0aD0iMi4xMDkiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTk0LjAwMCwxNTEuMDAwIEMgMjI5LjYyMSwxNjMuNjUyIDIyOS43NjUsMTYyLjQwOCAyNjQuMDAwLDE3OS4wMDAiIHN0cm9rZS13aWR0aD0iMS4zMTUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjY0LjAwMCwxNzkuMDAwIEMgMjg0LjQwMSwxOTEuMzQ0IDI4NS42MjEsMTg4LjY1MiAzMDYuMDAwLDIwMS4wMDAiIHN0cm9rZS13aWR0aD0iMS40NzAiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMzA2LjAwMCwyMDEuMDAwIEMgMzI3LjUzNCwyMDguOTExIDMyNi45MDEsMjEwLjM0NCAzNDkuMDAwLDIxNy4wMDAiIHN0cm9rZS13aWR0aD0iMS41NDkiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMzQ5LjAwMCwyMTcuMDAwIEMgMzYyLjQ4MSwyMjEuMDEzIDM2Mi4wMzQsMjIxLjkxMSAzNzUuMDAwLDIyNy4wMDAiIHN0cm9rZS13aWR0aD0iMS45MTUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMzc1LjAwMCwyMjcuMDAwIEMgMzg0Ljk0MywyMzMuMDk3IDM4NS40ODEsMjMyLjAxMyAzOTUuMDAwLDIzOS4wMDAiIHN0cm9rZS13aWR0aD0iMi4zMDUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMzk1LjAwMCwyMzkuMDAwIEMgNDA3Ljg1NSwyNDYuNzcwIDQwNy45NDMsMjQ2LjU5NyA0MjEuMDAwLDI1NC4wMDAiIHN0cm9rZS13aWR0aD0iMi4yNjYiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gNDIxLjAwMCwyNTQuMDAwIEMgNDI4LjEzNywyNTcuMjU2IDQyNy44NTUsMjU3Ljc3MCA0MzUuMDAwLDI2MS4wMDAiIHN0cm9rZS13aWR0aD0iMi42OTIiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gNDM1LjAwMCwyNjEuMDAwIEMgNDM4Ljg1MCwyNjMuNzg3IDQzOS4xMzcsMjYzLjI1NiA0NDMuMDAwLDI2Ni4wMDAiIHN0cm9rZS13aWR0aD0iMy4zNTkiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjwvc3ZnPg==', 1),
(3, 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgNTcwIDMxOCIgd2lkdGg9IjU3MCIgaGVpZ2h0PSIzMTgiPjxwYXRoIGQ9Ik0gMTYyLjAwMCwxNzcuMDAwIEMgMTY0LjI0NCwxNzIuNTA0IDE2NS4wMDAsMTczLjUwMCAxNjguMDAwLDE3MC4wMDAiIHN0cm9rZS13aWR0aD0iNS4yOTkiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTY4LjAwMCwxNzAuMDAwIEMgMTc1LjI5MywxNjUuODkwIDE3NC43NDQsMTY1LjUwNCAxODMuMDAwLDE2My4wMDAiIHN0cm9rZS13aWR0aD0iNC4yNTEiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTgzLjAwMCwxNjMuMDAwIEMgMTg3LjQ0MywxNjEuNDgwIDE4Ny4yOTMsMTYxLjM5MCAxOTIuMDAwLDE2MS4wMDAiIHN0cm9rZS13aWR0aD0iMy45MTUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTkyLjAwMCwxNjEuMDAwIEMgMTk3LjAwMCwxNjEuMDAwIDE5Ni45NDMsMTYwLjQ4MCAyMDIuMDAwLDE2MS4wMDAiIHN0cm9rZS13aWR0aD0iMy43MDEiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjAyLjAwMCwxNjEuMDAwIEMgMjA3LjUzOCwxNTkuMDMwIDIwNi4wMDAsMTYxLjAwMCAyMTAuMDAwLDE2MS4wMDAiIHN0cm9rZS13aWR0aD0iNC40NTEiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjEwLjAwMCwxNjEuMDAwIEMgMjEyLjQzNCwxNjUuMDk3IDIxMi41MzgsMTYzLjAzMCAyMTIuMDAwLDE2OS4wMDAiIHN0cm9rZS13aWR0aD0iNC41MjIiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjEyLjAwMCwxNjkuMDAwIEMgMjEwLjc5NywxNzQuNTI1IDIxMS40MzQsMTc0LjA5NyAyMDguMDAwLDE3OS4wMDAiIHN0cm9rZS13aWR0aD0iNC4yOTgiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjA4LjAwMCwxNzkuMDAwIEMgMjA1LjM1MywxODIuNDIxIDIwNS43OTcsMTgyLjUyNSAyMDIuMDAwLDE4NS4wMDAiIHN0cm9rZS13aWR0aD0iMy45NTQiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjAyLjAwMCwxODUuMDAwIEMgMTkyLjM0NywxOTIuNTY4IDE5Mi4zNTMsMTkyLjQyMSAxODIuMDAwLDE5OS4wMDAiIHN0cm9rZS13aWR0aD0iMi42MzgiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTgyLjAwMCwxOTkuMDAwIEMgMTczLjc3NSwyMDQuMTI4IDE3My44NDcsMjA0LjA2OCAxNjUuMDAwLDIwOC4wMDAiIHN0cm9rZS13aWR0aD0iMi43OTUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTY1LjAwMCwyMDguMDAwIEMgMTU2LjQyOSwyMTAuODExIDE1Ni43NzUsMjExLjYyOCAxNDguMDAwLDIxNC4wMDAiIHN0cm9rZS13aWR0aD0iMi44MDYiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTQ4LjAwMCwyMTQuMDAwIEMgMTM4LjE0NCwyMTguNDIwIDEzNy45MjksMjE3LjgxMSAxMjguMDAwLDIyMi4wMDAiIHN0cm9rZS13aWR0aD0iMi42ODUiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTI4LjAwMCwyMjIuMDAwIEMgMTIxLjAyMywyMjQuMDg1IDEyMS4xNDQsMjI0LjQyMCAxMTQuMDAwLDIyNi4wMDAiIHN0cm9rZS13aWR0aD0iMy4wNjAiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTE0LjAwMCwyMjYuMDAwIEMgMTEwLjAyOCwyMjcuMTM3IDExMC4wMjMsMjI3LjA4NSAxMDYuMDAwLDIyOC4wMDAiIHN0cm9rZS13aWR0aD0iMy42MTciIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMTA2LjAwMCwyMjguMDAwIEMgOTcuOTAwLDIyOS42MzAgMTAzLjAyOCwyMjguNjM3IDEwMC4wMDAsMjI5LjAwMCIgc3Ryb2tlLXdpZHRoPSI0LjM2NiIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAxMDAuMDAwLDIyOS4wMDAgQyAxMTcuODE1LDIyMy4yMzcgMTEyLjkwMCwyMjUuMTMwIDEzNi4wMDAsMjE5LjAwMCIgc3Ryb2tlLXdpZHRoPSIzLjkzMiIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAxMzYuMDAwLDIxOS4wMDAgQyAxNjkuMjI2LDIxMC4xMzQgMTY5LjMxNSwyMTEuMjM3IDIwMy4wMDAsMjA1LjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjQyNSIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAyMDMuMDAwLDIwNS4wMDAgQyAyMzEuOTQyLDIwMS4zNTIgMjMxLjcyNiwyMDAuNjM0IDI2MS4wMDAsMjAwLjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjM1NiIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAyNjEuMDAwLDIwMC4wMDAgQyAyOTYuNDk5LDE5OS4zNzAgMjk2LjQ0MiwxOTguMzUyIDMzMi4wMDAsMTk5LjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjE1NSIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAzMzIuMDAwLDE5OS4wMDAgQyAzNDQuNTAwLDE5OS4wMDAgMzQ0LjQ5OSwxOTguODcwIDM1Ny4wMDAsMTk5LjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjc2MyIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAzNTcuMDAwLDE5OS4wMDAgQyAzNzEuMDAwLDE5OS4wMDAgMzcxLjAwMCwxOTkuMDAwIDM4NS4wMDAsMTk5LjAwMCIgc3Ryb2tlLXdpZHRoPSIyLjA0OSIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAzODUuMDAwLDE5OS4wMDAgQyAzODguMDAwLDE5OS4wMDAgMzg4LjAwMCwxOTkuMDAwIDM5MS4wMDAsMTk5LjAwMCIgc3Ryb2tlLXdpZHRoPSIzLjE3NyIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAzMDUuMDAwLDcwLjAwMCBDIDMwMS4yNjEsNzMuODA4IDMwMS41MDAsNzQuMDAwIDI5OC4wMDAsNzguMDAwIiBzdHJva2Utd2lkdGg9IjUuMTY3IiBzdHJva2U9ImJsYWNrIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiPjwvcGF0aD48cGF0aCBkPSJNIDI5OC4wMDAsNzguMDAwIEMgMjkwLjIyNiw4Ny4wMDEgMjkwLjc2MSw4Ny4zMDggMjg0LjAwMCw5Ny4wMDAiIHN0cm9rZS13aWR0aD0iMy4wMzYiIHN0cm9rZT0iYmxhY2siIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCI+PC9wYXRoPjxwYXRoIGQ9Ik0gMjg0LjAwMCw5Ny4wMDAgQyAyNzQuNzc4LDExNC4xNjAgMjczLjcyNiwxMTMuNTAxIDI2NS4wMDAsMTMxLjAwMCIgc3Ryb2tlLXdpZHRoPSIyLjE0OCIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAyNjUuMDAwLDEzMS4wMDAgQyAyMzcuNzkyLDE3NS42MDYgMjM4Ljc3OCwxNzYuMTYwIDIxMi4wMDAsMjIxLjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjEyNSIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAyMTIuMDAwLDIyMS4wMDAgQyAyMDEuMDQxLDI0Mi4wMjIgMjAwLjI5MiwyNDEuNjA2IDE5MC4wMDAsMjYzLjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjM1NyIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PHBhdGggZD0iTSAxOTAuMDAwLDI2My4wMDAgQyAxNzYuMTg0LDI4OS42MDEgMTc2LjA0MSwyODkuNTIyIDE2Mi4wMDAsMzE2LjAwMCIgc3Ryb2tlLXdpZHRoPSIxLjI3NSIgc3Ryb2tlPSJibGFjayIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48L3BhdGg+PC9zdmc+', 1);

-- --------------------------------------------------------

--
-- Table structure for table `signature_absen`
--

CREATE TABLE `signature_absen` (
  `id_sign_absen` int(10) NOT NULL,
  `sign_id` int(10) UNSIGNED NOT NULL,
  `absen_id` int(10) UNSIGNED NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signature_absen`
--

INSERT INTO `signature_absen` (`id_sign_absen`, `sign_id`, `absen_id`, `date_time`) VALUES
(1, 2, 1, '2019-12-20 01:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `signature_honor`
--

CREATE TABLE `signature_honor` (
  `id_sign_honor` int(10) NOT NULL,
  `sign_id` int(10) UNSIGNED NOT NULL,
  `honor_id` int(10) UNSIGNED NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signature_honor`
--

INSERT INTO `signature_honor` (`id_sign_honor`, `sign_id`, `honor_id`, `date_time`) VALUES
(1, 3, 1, '2019-12-20 02:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `signature_ppk`
--

CREATE TABLE `signature_ppk` (
  `id_sign_ppk` int(10) NOT NULL,
  `sign_id` int(10) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signature_ppk`
--

INSERT INTO `signature_ppk` (`id_sign_ppk`, `sign_id`, `form_id`, `date_time`) VALUES
(1, 1, 1, '2019-12-20 01:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `tarif_honor`
--

CREATE TABLE `tarif_honor` (
  `id_tarif` int(10) NOT NULL,
  `tarif_jumlah` int(20) NOT NULL,
  `tarif_sebagai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif_honor`
--

INSERT INTO `tarif_honor` (`id_tarif`, `tarif_jumlah`, `tarif_sebagai`) VALUES
(1, 250000, 'Eselan II'),
(2, 200000, 'Eselan III'),
(3, 150000, 'Eselan IV'),
(4, 150000, 'Penanggung Jawab'),
(5, 150000, 'Pelayanan Umum'),
(6, 150000, 'Manager Koleksi'),
(7, 130000, 'PME'),
(8, 130000, 'Pimpok'),
(9, 130000, 'Koordinator'),
(10, 130000, 'Pengawas'),
(11, 100000, 'Pegawai Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','member','operator','pjbt_pk') NOT NULL,
  `nickname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `type`, `nickname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(2, 'operator', '4b583376b2767b923c3e1da60d10de59', 'pjbt_pk', 'operator');

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
  ADD PRIMARY KEY (`nip`) USING BTREE;

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
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id_sign`);

--
-- Indexes for table `signature_absen`
--
ALTER TABLE `signature_absen`
  ADD PRIMARY KEY (`id_sign_absen`);

--
-- Indexes for table `signature_honor`
--
ALTER TABLE `signature_honor`
  ADD PRIMARY KEY (`id_sign_honor`);

--
-- Indexes for table `signature_ppk`
--
ALTER TABLE `signature_ppk`
  ADD PRIMARY KEY (`id_sign_ppk`);

--
-- Indexes for table `tarif_honor`
--
ALTER TABLE `tarif_honor`
  ADD PRIMARY KEY (`id_tarif`);

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
  MODIFY `id_ajuan_lembur` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_honor`
--
ALTER TABLE `daftar_honor`
  MODIFY `id_honor` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_ajuan_lembur`
--
ALTER TABLE `form_ajuan_lembur`
  MODIFY `id_form_ajuan` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id_jenis` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id_sign` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signature_absen`
--
ALTER TABLE `signature_absen`
  MODIFY `id_sign_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signature_honor`
--
ALTER TABLE `signature_honor`
  MODIFY `id_sign_honor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signature_ppk`
--
ALTER TABLE `signature_ppk`
  MODIFY `id_sign_ppk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tarif_honor`
--
ALTER TABLE `tarif_honor`
  MODIFY `id_tarif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
