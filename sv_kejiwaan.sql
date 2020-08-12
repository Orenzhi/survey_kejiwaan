-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 06:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sv_kejiwaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kode_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode_menu`, `menu`, `icon`) VALUES
(1, 'Home', 'notika-icon notika-house'),
(2, 'Data Master', 'notika-icon notika-edit'),
(5, 'Laporan', 'notika-icon notika-windows'),
(6, 'Menu', 'notika-icon notika-form'),
(7, 'User', 'notika-icon notika-app'),
(8, 'Informasi', 'notika-icon notika-support');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode_pel` varchar(50) NOT NULL,
  `nama_pel` varchar(100) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pel`, `nama_pel`, `jk`, `alamat`, `foto`) VALUES
(1, '1610512023', 'Rezhi Saputra', 'Laki-Laki', 'GG Haji salam', 'foto-1610512023.jpg'),
(2, '1610512010', 'Muhammad Faisal', 'Laki-Laki', 'Pulo Gebang', 'foto-1610512010.jpeg'),
(3, '1610512001', 'Yoga Pratama', 'Laki-Laki', 'Cijantung aja', 'foto-1610512001.jpg'),
(4, '1610512022', 'Bryan Putra', 'Perempuan', 'iya benar, wkwkwkwk', 'foto-1610512022.jpg'),
(5, '1610512050', 'Anynomous', 'Laki-Laki', 'test validate', 'foto-1610512050.jpg'),
(7, '1610512047', 'M. Fadel Kemal P.', 'Laki-Laki', 'Duren tiga', 'foto-16105120471.jpg'),
(8, '111', '121', 'Laki-Laki', 'sdad', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stts_perkawinan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('islam','protestan','khatolik','hindu','budha','khonghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganeraan` enum('wni','wna') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id_p` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_p` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_p` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `kode_menu` int(2) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `kode_menu`, `title`, `url`) VALUES
(2, 2, 'Pelanggan', 'admin/pelanggan'),
(12, 6, 'Menu App', 'menuapp'),
(18, 2, 'Penduduk', 'penduduk'),
(19, 2, 'Surveyor', 'surveyor'),
(20, 2, 'Puskesmas', 'puskesmas');

-- --------------------------------------------------------

--
-- Table structure for table `surveyor`
--

CREATE TABLE `surveyor` (
  `nik_s` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_s` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_s` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_s` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw_s` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_s` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_s` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_s` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_s` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `password_des` varchar(100) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tgl_input` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `password_des`, `foto_user`, `is_active`, `tgl_input`, `role_id`) VALUES
(17, 'Rezhi Saputra', 'rezishaputra@gmail.com', '$2y$10$2BIKauHaXyytlOkBDA1aD.VjnyECGV7pXbLy1r9Sux0uIEezvtZFK', '12345', '2.jpg', 1, '17-04-2019, 10:57 am', 1),
(18, 'Bismillaah', 'reazishaputra@gmail.com', '$2y$10$urzbrxd3LHTNhM1aSlS4Te7t616dtK7WsPF2ojG5Mkzq/5q1OCxku', '12345', '2.jpg', 1, '17-04-2019, 6:55 pm', 2),
(19, 'test', 'rezishaputra@outlook.com', '$2y$10$xdqNPwOn9QINwdZZ8eB5NuSF32Oy/TwCEKj5FRPa7yfJbxwnqLl4a', 'rezhi256', '2.jpg', 1, '18-05-2019, 8:31 am', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_menu` (`kode_menu`);

--
-- Indexes for table `surveyor`
--
ALTER TABLE `surveyor`
  ADD PRIMARY KEY (`nik_s`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `kode_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `sub_menu_ibfk_1` FOREIGN KEY (`kode_menu`) REFERENCES `menu` (`kode_menu`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
