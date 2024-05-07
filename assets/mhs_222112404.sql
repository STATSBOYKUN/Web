-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 06:58 PM
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
-- Database: `mhs_222112404`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(8) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
('guest', 'guest', '', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `events` int(11) NOT NULL,
  `home` int(11) NOT NULL,
  `community` int(11) NOT NULL,
  `about` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `events`, `home`, `community`, `about`) VALUES
(1, 167, 721, 94, 135);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(3) NOT NULL,
  `username` varchar(32) NOT NULL,
  `text` varchar(256) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `read` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `username`, `text`, `time`, `read`) VALUES
(6, 'aaa2', 'Your ticket is under review!', '2023-06-16 01:22:44', 1),
(7, '', 'Your ticket status is Pending! Please wait for the admin to review your ticket.', '2023-06-16 13:13:11', 1),
(8, '', 'Your ticket status is Approved! Please wait for the admin to contact you.', '2023-06-16 13:22:35', 1),
(9, 'aaa6', 'Your ticket is under review!', '2023-06-16 13:24:45', 0),
(10, '', 'Your ticket status is Rejected! Please contact the admin for more information.', '2023-06-16 13:25:23', 1),
(11, 'aaa6', 'Your ticket status is Rejected! Please contact the admin for more information.', '2023-06-16 13:26:42', 0),
(12, 'aaa6', 'Your ticket status is Approved! Please wait for the admin to contact you.', '2023-06-16 13:26:59', 0),
(13, 'aaa6', 'Your ticket status is Pending! Please wait for the admin to review your ticket.', '2023-06-16 13:27:22', 0),
(14, 'aaa6', 'Your ticket status is Rejected! Please contact the admin for more information.', '2023-06-16 13:27:47', 0),
(15, 'aaa2', 'Your ticket is under review!', '2023-06-16 16:46:26', 1),
(16, 'aaa2', 'Your ticket status is Approved! Please wait for the admin to contact you.', '2023-06-16 16:51:46', 1),
(17, 'aaa2', 'Your ticket status is Rejected! Please contact the admin for more information.', '2023-06-16 16:52:47', 1),
(18, 'aaa2', 'Your ticket status is Pending! Please wait for the admin to review your ticket.', '2023-06-16 17:01:50', 1),
(19, 'aaa2', 'Your ticket status is Rejected! Please contact the admin for more information.', '2023-06-16 23:25:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `tickets` tinyint(4) NOT NULL,
  `invoices` longblob NOT NULL,
  `status` varchar(116) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `email`, `date`, `tickets`, `invoices`, `status`) VALUES
(15, 'aaa', 'aaa@m.c', '2023-06-11 06:37:18', 1, 0x313637333637313835372e6a7067, 'Approved'),
(16, 'aaa', 'aaa@m.c', '2023-06-11 11:39:44', 1, 0x313637333637313835372e6a7067, 'Pending'),
(17, 'aaa', 'aaa@m.c', '2023-06-13 21:57:32', 1, 0x616c757220646f6b756d656e206f6e6c6e652e706e67, 'Review'),
(18, 'aaa', 'aaa@m.c', '2023-06-13 21:58:12', 1, 0x616c757220646f6b756d656e206f6e6c6e652e706e67, 'Pending'),
(19, 'aaa', 'aaa@m.c', '2023-06-16 01:20:31', 1, 0x616c757220646f6b756d656e206f6e6c6e652e706e67, 'Review'),
(20, 'Aaa', 'aaa@m.c', '2023-06-16 01:22:44', 1, 0x616c757220646f6b756d656e206f6e6c6e652e706e67, 'Review'),
(21, 'aaa', 'aaa@m.c', '2023-06-16 13:24:45', 1, 0x313637333637313835372e6a7067, 'Rejected'),
(22, 'DUdudu', 'aaa@mm.bm', '2023-06-16 16:46:26', 1, 0x313637333637313835372e6a7067, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `country` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `sex`, `telephone`, `age`, `country`, `password`) VALUES
(11, 'aaa@m.c', 'aaa6', 'male', '081081018112', 17, 'Brunei', '$2y$10$YIUxtjCTlc./7Z5VCDw26eMwXikD3o3Kjufj.aqGQF8zpM6ljKJrO'),
(15, 'aam@m.commana', 'aasada51', 'male', '081279163111', 17, 'North Korea', '$2y$10$NTCUQqBv4O.NTRfZQ/32C.v6DToD0dz.ZJXx8y5iahyrLhcgQbcAW'),
(16, 'aaa@mm.bm', 'aaa2', 'male', '08103170131221', 17, 'China', '$2y$10$Ile73dsEbkPySI.Au3s74.PCCXHrULJ.sDg6tLEl/28ZqCIMwtn4O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
