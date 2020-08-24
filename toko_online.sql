-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2020 at 03:16 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_group`, `name`, `description`) VALUES
(1, 'Admin', 'Admin'),
(2, 'User', 'User'),
(3, 'member', 'member'),
(4, 'user biasa', 'user 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `desa` varchar(200) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `alamat_lengkap` varchar(500) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `status_users` int(11) NOT NULL,
  `last_login` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `jenis_kelamin`, `email`, `password`, `phone`, `provinsi`, `kota`, `kecamatan`, `desa`, `rt`, `rw`, `alamat_lengkap`, `active`, `status_users`, `last_login`, `created_at`) VALUES
(1, 'Juni', 'Trianto', 'Laki-laki', 'triantoj13@gmail.com', '$2y$10$ViYyh4e0zoVrCmygoCcl4uOTxdJ1UIfU6E/8tztYJ2as0eOml4iiq', '089603933446', '14', '1405', '1405012', '1405012003', '02', '01', 'dusun broyi', 1, 2, '2020-08-23 15:10:23', '2020-08-12 18:09:00'),
(2, 'juni', 'trianto', '', 'triantoj@gmail.com', '$2y$10$UMwEywalUe5oFlELF7r4/uD.VMRXLJcCXfJsbxEQ7Y1ziDA6Pely.', '', '', '', '', '', '', '', '', 0, 2, '0000-00-00 00:00:00', '2020-08-14 18:11:03'),
(3, 'user', 'd', 'Laki-laki', 'sepeda.hitam1924@gmail.com', '$2y$10$wP4T64ul.HjOCqP8Th2UbeE.t85452ven/KdGViZvxJ4Glhmka.cm', '', '', '', '', '', '', '', '', 0, 2, '0000-00-00 00:00:00', '2020-08-14 18:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id_user_group` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id_user_group`, `user_id`, `group_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `token` longtext NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `created_at`) VALUES
(1, 'triantoj@gmail.com', 'BNJL/JzQP6QkJg040FSE2raXjwLw78wAPCmdNlNaPpI=', '2020-08-14 18:11:12'),
(2, 'sepeda.hitam1924@gmail.com', 'AnO4gDblMVbe2llO2kzQeK9BcbG2Q9FGQ+ATrZ0ZIFA=', '2020-08-14 18:15:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id_user_group`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id_user_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
