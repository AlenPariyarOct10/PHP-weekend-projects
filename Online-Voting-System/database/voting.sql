-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 12:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

USE voting;

CREATE TABLE `admin` (
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`, `visible`) VALUES
('alen', 'hello@admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `sn` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `votes` bigint(20) NOT NULL DEFAULT 0,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`sn`, `name`, `votes`, `photo`, `password`) VALUES
(4, 'Nepal IT Students Union', 3, 'it.jpg', 'nepalitstudent'),
(6, 'Nepal Medical Student Union', 4, 'OIP.jpg', 'ThisIsPassword');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `citizen` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vote` tinyint(1) DEFAULT 0,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `address`, `phone`, `citizen`, `password`, `vote`, `photo`) VALUES
(1, 'Alen', 'Pariyar', 'Bhangal, Budhanilkan', 9779816699413, 'ABCDE065478', 'ThisIsPassword', 1, 'alen.jpg'),
(6, 'Ram', 'Karki', 'Chitwan, Nepal', 9800123456, 'ABCDE789', 'ThisIsPassword', 1, 'user1.png'),
(7, 'KP', 'Oli', 'Jhapa', 980012345, 'ABCDE8945', 'ThisIsPassword', 1, 'kpbaa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
