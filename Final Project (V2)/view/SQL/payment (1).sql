-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 10:15 PM
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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Lc_id` varchar(10) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `phone_number` int(14) NOT NULL,
  `pin` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Lc_id`, `payment_method`, `reason`, `amount`, `phone_number`, `pin`) VALUES
('LC-0710', 'bkash', 'buy_books', 1002, 1635265565, 1111),
('LC-0710', 'bkash', 'buy_books', 1002, 1635265565, 1111),
('LC-0710', 'bkash', 'buy_books', 1002, 1635265565, 1111),
('LC-0710', 'bkash', 'buy_books', 1002, 1635265565, 1111),
('LC-6094', 'nagad', 'lost_book', 1110, 1635265565, 1111),
('LC-6094', 'nagad', 'fine', 115, 1635265565, 1213);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
