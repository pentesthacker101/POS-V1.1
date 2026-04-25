-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2026 at 09:41 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `Firstname` varchar(30) DEFAULT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Firstname`, `Lastname`, `Email`) VALUES
('Pince', 'Bingalsaon', 'bingalasonprince@gmail.com'),
('Thando', 'Hara', 'css001623@must.ac.mw'),
('Thando', 'Hara', 'css001623@must.ac.mw');
--
-- Database: `grocery`
--
CREATE DATABASE IF NOT EXISTS `grocery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `grocery`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `quantity`) VALUES
(1, 'asdf', 'sd', 12),
(2, 'dwafeg', 'afesg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`item_id`, `item_name`, `quantity`, `price`, `discount`, `total`, `date`) VALUES
(1, 'Maheu', 4, 400, 0, 1600, '2026-04-24'),
(2, 'Maheu', 4, 400, 0, 1600, '2026-04-22'),
(3, 'Enjoy - Orange 500 mls', 1, 600, 0, 600, '2026-04-24'),
(4, 'Sobo - Pineapple 2L', 2, 8000, 0, 15920, '2026-04-22'),
(5, 'Sobo - Pineapple 2L', 1, 444, 0, 444, '2026-04-24'),
(6, 'Maheu', 1, 44, 0, 45, '2026-04-24'),
(7, 'Maheu', 1, 555, 0, 555, '2026-04-23'),
(8, 'Maheu', 6, 111, 0, 666, '2026-04-24'),
(9, 'Maheu', 2, 9000, 0, 18000, '2026-04-24'),
(10, 'Maheu', 5, 90000, 0.1, 450000, '2026-04-24'),
(11, 'Maheu', 1, 450, 10, 450, '2026-04-24'),
(12, 'Maheu', 2, 1980, 1, 3960, '2026-04-24'),
(13, 'Maheu', 55, 333, 0, 18315, '2026-04-24'),
(14, 'Maheu', 1, 111, 0, 111, '2026-04-24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
