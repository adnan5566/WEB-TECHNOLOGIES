-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 10:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `userid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` datetime(6) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contactnumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`userid`, `name`, `email`, `dob`, `password`, `contactnumber`) VALUES
('L-1234', 'Joy', 'joy@gmail.com', '0000-00-00 00:00:00.000000', '1111', '01111111111'),
('U-0068', 'Emran', 'em@gmail.com', '2023-04-02 00:00:00.000000', '1111', '01635265565'),
('U-1215', 'ovi', 'ovi@gmail.com', '2023-04-02 00:00:00.000000', '1111', '01222222222'),
('U-3588', 'ad', 'aj@gmail.com', '2023-04-03 00:00:00.000000', '11111', '01333333333'),
('U-4320', 'mohish', 'mohish@gmail.com', '2023-04-02 00:00:00.000000', '1111', '0111111111111'),
('U-6012', 'Juwel1', 'juwel1@gmail.com', '2023-04-02 00:00:00.000000', '1111', '01716309513'),
('U-6433', 'ovi', 'ovi@gmail.com1', '2023-04-09 00:00:00.000000', '1111', '01635265565'),
('U-9668', 'mohish', 'mohish1@gmail.com', '2023-04-01 00:00:00.000000', '1111', '0813438784');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `userid_2` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
