-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 08:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digit_betting`
--

-- --------------------------------------------------------

--
-- Table structure for table `betting_record`
--

CREATE TABLE `betting_record` (
  `id` int(11) NOT NULL,
  `counter_name` varchar(255) NOT NULL,
  `record_date` date NOT NULL,
  `digit` int(100) NOT NULL,
  `first_prize` varchar(100) DEFAULT NULL,
  `second_prize` varchar(100) DEFAULT NULL,
  `third_prize` varchar(100) DEFAULT NULL,
  `fourth_prize` varchar(100) DEFAULT NULL,
  `fifth_prize` varchar(100) DEFAULT NULL,
  `sixth_prize` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consolation`
--

CREATE TABLE `consolation` (
  `id` int(11) NOT NULL,
  `counter` varchar(100) NOT NULL,
  `consolation_date` date NOT NULL,
  `digit` int(11) NOT NULL,
  `consolation_prize` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` int(11) NOT NULL,
  `counter` varchar(100) NOT NULL,
  `special_date` date NOT NULL,
  `digit` int(11) NOT NULL,
  `special_prize` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `user_password`) VALUES
(1, 'Admin ', 'admin@admin.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `betting_record`
--
ALTER TABLE `betting_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consolation`
--
ALTER TABLE `consolation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `betting_record`
--
ALTER TABLE `betting_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consolation`
--
ALTER TABLE `consolation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
