-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2026 at 05:59 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `quantity`, `is_active`) VALUES
(3, 'juice', 'health drink', 45, 1),
(2, 'ufa', 'mgaiwa', 10, 1),
(1, 'mpunga', 'delicious', 14, 1),
(4, 'guava', 'fruit', 50, 0),
(5, 'mango ', 'embe', 10, 0),
(6, 'drink', 'carbonated', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `item_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `total` int NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1777160620 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`order_id`, `product_id`, `item_name`, `quantity`, `price`, `discount`, `total`, `date`) VALUES
(1777180478, 2, 'ufa', 5, 200, 0, 1000, '2026-04-26'),
(1777180447, 2, 'ufa', 2, 200, 0, 400, '2026-04-26'),
(1777180850, 2, 'ufa', 5, 200, 0, 1000, '2026-04-26'),
(1777180850, 1, 'mpunga', 5, 6000, 0, 30000, '2026-04-26'),
(1777181499, 1, 'mpunga', 2, 60, 0, 120, '2026-04-26'),
(1777181565, 3, 'juice', 22, 200, 0, 4400, '2026-04-26'),
(1777181602, 2, 'ufa', 1, 200, 0, 200, '2026-04-26'),
(1777182593, 2, 'ufa', 2, 5, 0, 10, '2026-04-26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
