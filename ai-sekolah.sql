-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 06:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai-sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `defuzzifikasi`
--

CREATE TABLE `defuzzifikasi` (
  `id_defuzzifikasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defuzzifikasi`
--

INSERT INTO `defuzzifikasi` (`id_defuzzifikasi`, `id_user`, `nilai`) VALUES
(11, 1, 65.68),
(12, 2, 75),
(13, 9, 75);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy_gaji`
--

CREATE TABLE `fuzzy_gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sedikit` double NOT NULL,
  `cukup` double NOT NULL,
  `besar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzy_gaji`
--

INSERT INTO `fuzzy_gaji` (`id_gaji`, `id_user`, `sedikit`, `cukup`, `besar`) VALUES
(1, 1, 0, 0.75, 0),
(3, 7, 0, 0, 1),
(5, 5, 0, 0.75, 0),
(6, 9, 0, 0, 0.67),
(7, 6, 0, 0.75, 0),
(9, 2, 0, 0.75, 0),
(10, 8, 0, 0, 1),
(11, 10, 0.5, 0.25, 0),
(17, 11, 0.5, 0.25, 0),
(18, 4, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy_jarak`
--

CREATE TABLE `fuzzy_jarak` (
  `id_jarak` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dekat` double NOT NULL,
  `sedang` double NOT NULL,
  `jauh` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzy_jarak`
--

INSERT INTO `fuzzy_jarak` (`id_jarak`, `id_user`, `dekat`, `sedang`, `jauh`) VALUES
(1, 1, 0, 0, 1),
(3, 7, 1, 0, 0),
(5, 5, 1, 0, 0),
(6, 9, 1, 0, 0),
(7, 6, 1, 0, 0),
(9, 2, 0, 1, 0),
(10, 8, 1, 0, 0),
(11, 10, 1, 0, 0),
(17, 11, 0, 1, 0),
(18, 4, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy_nilai`
--

CREATE TABLE `fuzzy_nilai` (
  `id_nilai_f` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `buruk` double NOT NULL,
  `sedang` double NOT NULL,
  `bagus` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzy_nilai`
--

INSERT INTO `fuzzy_nilai` (`id_nilai_f`, `id_user`, `buruk`, `sedang`, `bagus`) VALUES
(27, 1, 0, 0.17, 0.56),
(29, 7, 0, 0.5, 0),
(31, 5, 1, 0, 0),
(32, 9, 0, 0, 0.76),
(33, 6, 0, 0.85, 0),
(35, 2, 0, 0, 0.93),
(36, 8, 0, 0, 0.73),
(37, 10, 0.03, 0.48, 0),
(43, 11, 0, 0.5, 0.33),
(44, 4, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inferensi`
--

CREATE TABLE `inferensi` (
  `id_inferensi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `layak` double NOT NULL,
  `tidak_layak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inferensi`
--

INSERT INTO `inferensi` (`id_inferensi`, `id_user`, `layak`, `tidak_layak`) VALUES
(1, 10, 0.48, 0.03),
(2, 1, 0.56, 0.17),
(13, 5, 0, 0.75),
(15, 11, 0.5, 0),
(18, 2, 0.75, 0),
(20, 8, 0.73, 0),
(21, 4, 0, 1),
(22, 9, 0.67, 0),
(23, 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id` int(11) NOT NULL,
  `jam_m` varchar(20) NOT NULL,
  `jam_b` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id`, `jam_m`, `jam_b`) VALUES
(1, '06.30', '07.00'),
(2, '07.00', '07.30'),
(3, '07.30', '08.00'),
(4, '08.00', '08.30');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `matematika` double NOT NULL,
  `bhs_indo` double NOT NULL,
  `bhs_inggris` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_user`, `matematika`, `bhs_indo`, `bhs_inggris`) VALUES
(1, 1, 85, 85, 80),
(2, 2, 89, 89, 89),
(3, 3, 100, 100, 100),
(4, 4, 90, 90, 90),
(5, 5, 25, 20, 20),
(6, 6, 50, 86, 65),
(7, 7, 85, 30, 65),
(8, 8, 89, 85, 84),
(9, 9, 85, 89, 85),
(10, 10, 58, 56, 65),
(11, 11, 80, 80, 80),
(12, 12, 100, 100, 85);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `jalur` varchar(15) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `jarak` double NOT NULL,
  `gaji` double NOT NULL,
  `status` varchar(15) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `gender`, `password`, `birthday`, `phone`, `jalur`, `jurusan`, `jarak`, `gaji`, `status`, `role`) VALUES
(1, 'Arsika Citra Pelangi', 'arsika@mail', 'Perempuan', '$2y$10$9dTkg0TwBU07stunJriDc.CJ7MPHilsC.f5xhogncle23tmVZGVPS', '15/10/1999', '2545665', 'JPA', 'IPS', 12, 5, 'Diterima', 2),
(2, 'Lalu Muh. Andre Winarta', 'glassqwert@gmail.com', 'Laki-Laki', '$2y$10$aPhdoxGiOlvt2lIfChz4WOlomR8ZOJAgKAyFbbZdwGhewK9gVevD6', '11/03/1999', '2545665', 'JPU', 'IPA', 8, 5, 'Diterima', 2),
(3, 'Admin Sekolah', 'admin@mail', 'Laki-Laki', '$2y$10$pErYf44gxDl8nONorITm3uX8T78SbD/2amcLQfm4yfC09fQ36kXmK', '14/04/1999', '+6287760313747', 'JPA', 'IPS', 15, 25, 'Diterima', 1),
(4, 'Irvan Guari', 'gur@mail', 'Laki-Laki', '$2y$10$R8uIA2dkqGIoPsgL9suhFO6hbt9vnTCYARjmxK5xtZ.DP6EWbIWnC', '15/10/1999', '2545665', 'JPU', 'IPA', 15, 15, 'Diterima', 2),
(5, 'Atta Otok', 'atta@mail.com', 'Laki-Laki', '$2y$10$q5/jWVjd2cYT6btyT5WTUuzaQuKHKPds5HvhZIB7RRKWrEVc5TWk6', '26/05/2012', '123444', 'JPU', 'IPS', 5, 5, 'Diterima', 2),
(6, 'Della Ayu', 'della@mail', 'Perempuan', '$2y$10$UwD8qRIwBWYvgVApZkFtjOoYtPnVruFu03ocE1rMuNIfBQjyaK7Ky', '11/12/2000', '25466566', 'JPU', 'IPS', 5, 5, 'Ditolak', 2),
(7, 'Wiwik Hariyanti', 'wiwik@mail', 'Perempuan', '$2y$10$ytfxrZLAhYujCCdKO7PwP.voVPQ3Zb5m8Msh3Jqxj7YjtaGI4x58W', '12/02/1981', '2511111', 'JPA', 'Bahasa', 2, 13, 'Waiting', 2),
(8, 'Lalu Muh. Hatta', 'hatta@mail', 'Laki-Laki', '$2y$10$.pMw3QIgNI./WctpCkDD7uF2jiOQ1BvVCmZs/cysHQawIpSUJnova', '27/07/2020', '4565555', 'JPA', 'IPS', 5, 20, 'Diterima', 2),
(9, 'Baiq Della Rahmatika', 'dellar@mail', 'Perempuan', '$2y$10$Ugqm7LJEFuAr6WRhk30V5Ou91hJxVtnpi1Ur2.9BhaRRfkmupvfsW', '04/12/2000', '021333', 'JPU', 'IPA', 5, 10, 'Diterima', 2),
(10, 'Naufal Bahri', 'bagir@mail', 'Laki-Laki', '$2y$10$SSFxEkKcqQLvRDpmpAt92.d9HYNMjhsROD5ztcmXACLckBSZJy5.6', '25/01/1999', '12555444', 'JPU', 'IPS', 5, 3, 'Waiting', 2),
(11, 'tes kecerdasan', 'tes@mail', 'Laki-Laki', '$2y$10$BTgZgIp2MDJ2s/VvIAWt7eFByMw.vm7.Mo.JArr/drrqc0SXDKJya', '11/12/2000', '0254656', 'JPU', 'IPA', 8, 3, 'Diterima', 2),
(12, 'Arsike Cipta', 'arsike@mail', 'Perempuan', '$2y$10$Tda2lC6twX4HExatwja/XOn9xkjmerhUqeTswbxsLkQ4n1QSPW0l.', '07/07/2020', '0215548888', 'JPU', 'IPA', 10, 50, 'Diterima', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `defuzzifikasi`
--
ALTER TABLE `defuzzifikasi`
  ADD PRIMARY KEY (`id_defuzzifikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `fuzzy_gaji`
--
ALTER TABLE `fuzzy_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `fuzzy_jarak`
--
ALTER TABLE `fuzzy_jarak`
  ADD PRIMARY KEY (`id_jarak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `fuzzy_nilai`
--
ALTER TABLE `fuzzy_nilai`
  ADD PRIMARY KEY (`id_nilai_f`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `inferensi`
--
ALTER TABLE `inferensi`
  ADD PRIMARY KEY (`id_inferensi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defuzzifikasi`
--
ALTER TABLE `defuzzifikasi`
  MODIFY `id_defuzzifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fuzzy_gaji`
--
ALTER TABLE `fuzzy_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fuzzy_jarak`
--
ALTER TABLE `fuzzy_jarak`
  MODIFY `id_jarak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fuzzy_nilai`
--
ALTER TABLE `fuzzy_nilai`
  MODIFY `id_nilai_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `inferensi`
--
ALTER TABLE `inferensi`
  MODIFY `id_inferensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `defuzzifikasi`
--
ALTER TABLE `defuzzifikasi`
  ADD CONSTRAINT `defuzzifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `fuzzy_gaji`
--
ALTER TABLE `fuzzy_gaji`
  ADD CONSTRAINT `fuzzy_gaji_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `fuzzy_jarak`
--
ALTER TABLE `fuzzy_jarak`
  ADD CONSTRAINT `fuzzy_jarak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `fuzzy_nilai`
--
ALTER TABLE `fuzzy_nilai`
  ADD CONSTRAINT `fuzzy_nilai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `inferensi`
--
ALTER TABLE `inferensi`
  ADD CONSTRAINT `inferensi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
