-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 07:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_perpustakaan`
--

CREATE TABLE `anggota_perpustakaan` (
  `id_anggota` int(6) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `agama` varchar(16) NOT NULL,
  `asal_sekolah` varchar(64) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota_perpustakaan`
--

INSERT INTO `anggota_perpustakaan` (`id_anggota`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `asal_sekolah`, `reg_date`) VALUES
(1, 'Tedy Argo Pratama', 'JL. Educa Studio ', 'Laki-laki', 'Islam', 'SMA Negeri 1 BANTARSARI', '2023-10-30 06:44:19'),
(2, 'Bayu Rusanto', 'JL. Educa Studio Indonesia', 'Laki-laki', 'Islam', 'SMK 33 Gamelab', '2023-10-28 12:17:58'),
(3, 'Evaldo Putra', 'Banjarnegara', 'Laki-laki', 'Islam', 'SMK 40 Gamelab', '2023-10-28 19:12:31'),
(4, 'Adi Kusuma', 'JL. Gamelab Indonesia No. 10', 'Laki-laki', 'Islam', 'SMK 32 Gamelab', '2023-10-28 19:19:13'),
(33, 'Alya', 'Palembang', 'Perempuan', 'Islam', 'SMA Negeri 1 BANTARSARI', '2023-10-28 13:00:13'),
(34, 'Siska', 'Cilacap', 'Perempuan', 'Islam', 'SMA Negeri 1 CILACAP', '2023-10-28 19:24:36'),
(35, 'Veny', 'Yogyakarta Barat', 'Perempuan', 'Islam', 'SMA Negeri 1 CILACAP', '2023-10-28 19:25:45'),
(36, 'Silvi Pitriani', 'Bandung Selatan', 'Perempuan', 'Islam', 'SMA Negeri 1 BANTARSARI', '2023-10-29 19:14:29'),
(39, 'Andi', 'Cilacap', 'Laki-laki', 'Islam', 'SMA Negeri 1 CILACAP', '2023-10-30 06:20:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_perpustakaan`
--
ALTER TABLE `anggota_perpustakaan`
  ADD PRIMARY KEY (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_perpustakaan`
--
ALTER TABLE `anggota_perpustakaan`
  MODIFY `id_anggota` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
