-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 10:14 PM
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
-- Table structure for table `catalogresource`
--

CREATE TABLE `catalogresource` (
  `bookname` varchar(20) NOT NULL,
  `authorname` varchar(20) NOT NULL,
  `publishyear` year(4) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `isbn` int(20) NOT NULL,
  `CIPN` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalogresource`
--

INSERT INTO `catalogresource` (`bookname`, `authorname`, `publishyear`, `publisher`, `isbn`, `CIPN`) VALUES
('Adnan', 'Sir', 0000, 'Ad ', 199956, 11),
('Ad', 'Adn', 0000, 'AD', 199954, 14),
('Ad', 'Adn', 2004, 'AD', 199954, 14),
('', '', 0000, '', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
