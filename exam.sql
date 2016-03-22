-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2016 at 12:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` bigint(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` bigint(20) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` text NOT NULL,
  `sku` varchar(10) NOT NULL,
  `stock_level` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `product_image` text NOT NULL,
  `status` int(11) NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `warehouse_id`, `product_name`, `product_desc`, `sku`, `stock_level`, `qty`, `price`, `product_image`, `status`, `datecreated`) VALUES
(1, 1, 'A1', 'A1', 'A1', 1, 100, 100, '1458385920_frozen.jpg', 1, '2016-03-19 19:12:01'),
(2, 1, 'A2', 'A2', 'A2', 1, 98, 100, '', 1, '2016-03-19 19:40:03'),
(3, 1, 'A3', 'A3', 'A3', 1, 96, 100, '', 1, '2016-03-19 19:40:21'),
(4, 1, 'A4', 'A4', 'A4', 1, 100, 100, '', 1, '2016-03-19 19:40:48'),
(5, 1, 'A5', 'A5', 'A5', 1, 100, 100, '', 1, '2016-03-19 19:41:01'),
(6, 1, 'A6', 'A6', 'A6', 1, 100, 100, '', 1, '2016-03-19 19:41:12'),
(7, 1, 'A7', 'A7', 'A7', 1, 100, 100, '', 1, '2016-03-19 19:41:32'),
(8, 1, 'A8', 'A8', 'A8', 1, 100, 100, '', 1, '2016-03-19 19:42:02'),
(9, 1, 'A9', 'A9', 'A9', 1, 100, 100, '', 1, '2016-03-19 19:42:14'),
(10, 1, 'A10', 'A10', 'A10', 1, 100, 100, '', 1, '2016-03-19 19:42:26'),
(11, 1, 'B1', 'B1', 'B1', 1, 100, 100, '', 1, '2016-03-19 19:43:19'),
(12, 1, 'B2', 'B2', 'B2', 1, 100, 100, '', 1, '2016-03-19 19:43:50'),
(13, 1, 'B3', 'B3', 'B3', 1, 100, 100, '', 1, '2016-03-19 19:45:42'),
(14, 1, 'B4', 'B4', 'B4', 1, 100, 100, '', 1, '2016-03-19 19:45:57'),
(15, 1, 'B5', 'B5', 'B5', 1, 100, 100, '', 1, '2016-03-19 19:46:16'),
(16, 1, 'B6', 'B6', 'B6', 1, 100, 100, '', 1, '2016-03-19 19:46:33'),
(17, 1, 'B7', 'B7', 'B7', 1, 100, 100, '', 1, '2016-03-19 19:46:48'),
(18, 1, 'B8', 'B8', 'B8', 1, 100, 100, '', 1, '2016-03-19 19:47:03'),
(19, 1, 'B9', 'B9', 'B9', 1, 100, 100, '', 1, '2016-03-19 19:47:41'),
(20, 1, 'B10', 'B10', 'B10', 1, 100, 100, '', 1, '2016-03-19 19:47:59'),
(21, 2, 'C1', 'C1', 'C1', 1, 100, 100, '', 1, '2016-03-19 19:51:35'),
(22, 2, 'C2', 'C2', 'C2', 1, 100, 100, '', 1, '2016-03-19 19:51:53'),
(23, 2, 'C3', 'C3', 'C3', 1, 100, 100, '', 1, '2016-03-19 19:52:18'),
(24, 2, 'C4', 'C4', 'C4', 1, 100, 100, '', 1, '2016-03-19 19:52:31'),
(25, 2, 'C5', 'C5', 'C5', 1, 100, 100, '', 1, '2016-03-19 19:52:42'),
(26, 2, 'C6', 'C6', 'C6', 1, 100, 100, '', 1, '2016-03-19 19:52:55'),
(27, 2, 'C7', 'C7', 'C7', 1, 100, 100, '', 1, '2016-03-19 19:53:09'),
(28, 2, 'C8', 'C8', 'C8', 1, 100, 100, '', 1, '2016-03-19 19:53:26'),
(29, 2, 'C9', 'C9', 'C9', 1, 100, 100, '', 1, '2016-03-19 19:53:38'),
(30, 2, 'C10', 'C10', 'C10', 1, 100, 100, '', 1, '2016-03-19 19:53:59'),
(31, 2, 'D1', 'D1', 'D1', 1, 100, 100, '', 1, '2016-03-19 20:05:05'),
(32, 2, 'D2', 'D2', 'D2', 1, 100, 100, '', 1, '2016-03-19 20:05:18'),
(33, 2, 'D3', 'D3', 'D3', 1, 100, 100, '', 1, '2016-03-19 20:05:28'),
(34, 2, 'D4', 'D4', 'D4', 1, 100, 100, '', 1, '2016-03-19 20:05:45'),
(35, 2, 'D5', 'D5', 'D5', 1, 100, 100, '', 1, '2016-03-19 20:09:35'),
(36, 2, 'D6', 'D6', 'D6', 1, 100, 100, '', 1, '2016-03-19 20:09:50'),
(37, 2, 'D7', 'D7', 'D7', 1, 100, 100, '', 1, '2016-03-19 20:10:05'),
(38, 2, 'D8', 'D8', 'D8', 1, 100, 100, '', 1, '2016-03-19 20:10:23'),
(39, 2, 'D9', 'D9', 'D9', 1, 100, 100, '', 1, '2016-03-19 20:10:45'),
(40, 2, 'D10', 'D10', 'D10', 1, 100, 100, '', 1, '2016-03-19 20:10:59'),
(41, 3, 'E1', 'E1', 'E1', 1, 100, 100, '', 1, '2016-03-19 20:11:55'),
(42, 3, 'E2', 'E2', 'E2', 1, 100, 100, '', 1, '2016-03-19 20:12:13'),
(43, 3, 'E3', 'E3', 'E3', 1, 100, 100, '', 1, '2016-03-19 20:12:22'),
(44, 3, 'E4', 'E4', 'E4', 1, 100, 100, '', 1, '2016-03-19 20:12:40'),
(45, 3, 'E5', 'E5', 'E5', 1, 100, 100, '', 1, '2016-03-19 20:12:45'),
(46, 3, 'E6', 'E6', 'E6', 1, 100, 100, '', 1, '2016-03-19 20:12:55'),
(47, 3, 'E7', 'E7', 'E7', 1, 100, 100, '', 1, '2016-03-19 20:13:05'),
(48, 3, 'E8', 'E8', 'E8', 1, 100, 100, '', 1, '2016-03-19 20:13:16'),
(49, 3, 'E9', 'E9', 'E9', 1, 100, 100, '', 1, '2016-03-19 20:13:31'),
(50, 3, 'E10', 'E10', 'E10', 1, 100, 100, '', 1, '2016-03-19 20:13:47'),
(51, 3, 'F1', 'F1', 'F1', 1, 100, 100, '', 1, '2016-03-19 20:14:01'),
(52, 3, 'F2', 'F2', 'F2', 1, 100, 100, '', 1, '2016-03-19 20:14:58'),
(53, 3, 'F3', 'F3', 'F3', 1, 100, 100, '', 1, '2016-03-19 20:15:06'),
(54, 3, 'F4', 'F4', 'F4', 1, 100, 100, '', 1, '2016-03-19 20:15:14'),
(55, 3, 'F5', 'F5', 'F5', 1, 100, 100, '', 1, '2016-03-19 20:15:24'),
(56, 3, 'F6', 'F6', 'F6', 1, 100, 100, '', 1, '2016-03-19 20:15:33'),
(57, 3, 'F7', 'F7', 'F7', 1, 100, 100, '', 1, '2016-03-19 20:15:41'),
(58, 3, 'F8', 'F8', 'F8', 1, 100, 100, '', 1, '2016-03-19 20:15:50'),
(59, 3, 'F9', 'F9', 'F9', 1, 100, 100, '', 1, '2016-03-19 20:15:58'),
(60, 3, 'F10', 'F10', 'F10', 1, 100, 100, '', 1, '2016-03-19 20:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
`warehouse_id` bigint(20) NOT NULL,
  `warehouse_code` varchar(50) NOT NULL,
  `warehouse_name` varchar(50) NOT NULL,
  `warehouse_desc` text NOT NULL,
  `status` int(11) NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_code`, `warehouse_name`, `warehouse_desc`, `status`, `datecreated`) VALUES
(1, 'WH0001', 'P1', 'Sample Wahrehouse', 1, '2016-03-19 16:14:58'),
(2, 'WH0002', 'P2', 'Sample warehouse 2', 1, '2016-03-19 16:17:43'),
(3, 'WH0003', 'P3', 'Sample warehouse 3', 1, '2016-03-19 16:17:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
 ADD PRIMARY KEY (`warehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
MODIFY `warehouse_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
