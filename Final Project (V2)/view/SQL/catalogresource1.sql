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
-- Table structure for table `catalogresource1`
--

CREATE TABLE `catalogresource1` (
  `title` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `volume` int(20) NOT NULL,
  `issue` int(11) NOT NULL,
  `CIPN` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalogresource1`
--

INSERT INTO `catalogresource1` (`title`, `publisher`, `volume`, `issue`, `CIPN`) VALUES
('0', '0', 10, 0, 11),
('adnan', 'xvxsvb', 10, 0, 13),
('adnan', 'xvxsvb', 10, 0, 13),
('adnan', 'xvxsvb', 10, 0, 13),
('adnan', 'xvxsvb', 10, 0, 13),
('adnan', 'xvxsvb', 10, 0, 13),
('zxmncmkzxn', 'ss', 10, 20230409, 13),
('zxmncmkzxn', 'ss', 10, 2023, 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
