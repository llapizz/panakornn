-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 05:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `p_c_qty` int(11) NOT NULL,
  `total` float NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `p_id`, `p_name`, `p_c_qty`, `total`, `datesave`) VALUES
(1, 1, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-02 09:19:44'),
(2, 1, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-02 09:19:44'),
(3, 2, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-02 09:21:39'),
(4, 2, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-02 09:21:39'),
(5, 2, 32, 'น้ำเป๊ปซี่ 1 ลิตร', 1, 25, '2021-10-02 09:21:39'),
(6, 2, 31, 'ผัดไทกุ้งสด', 1, 40, '2021-10-02 09:21:39'),
(7, 2, 30, 'กระเพราหมูสับ', 1, 50, '2021-10-02 09:21:39'),
(8, 2, 29, 'เกาเหลาเนื้อ', 1, 50, '2021-10-02 09:21:39'),
(9, 3, 25, 'ก๋วยเตี๋ยวเส้นหมี่', 22, 770, '2021-10-02 10:12:46'),
(10, 4, 28, 'เกาเหลาหมู', 20, 1000, '2021-10-02 10:21:04'),
(11, 5, 107, 'Array', 2, 0, '2021-10-04 08:14:58'),
(12, 5, 104, 'Array', 1, 0, '2021-10-04 08:14:58'),
(13, 5, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 08:14:58'),
(14, 5, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 08:14:58'),
(15, 6, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 08:16:41'),
(16, 6, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 08:16:41'),
(17, 7, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 08:17:23'),
(18, 8, 107, 'Array', 3, 0, '2021-10-04 08:49:58'),
(19, 8, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 08:49:58'),
(20, 8, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 08:49:58'),
(21, 10, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 08:52:54'),
(22, 10, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 08:52:54'),
(23, 11, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 08:54:12'),
(24, 11, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 08:54:12'),
(25, 12, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 08:56:42'),
(26, 12, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 08:56:42'),
(27, 12, 107, '', 2, 0, '2021-10-04 09:20:02'),
(28, 12, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 09:20:02'),
(29, 12, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 09:20:02'),
(30, 12, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 09:23:48'),
(31, 12, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 09:23:48'),
(32, 12, 107, '', 1, 0, '2021-10-04 09:23:48'),
(33, 12, 104, '', 1, 0, '2021-10-04 09:23:48'),
(34, 15, 107, '', 2, 0, '2021-10-04 14:32:55'),
(35, 12, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 14:47:04'),
(36, 17, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 14:48:29'),
(37, 17, 33, 'โค้กขวดแก้ว', 1, 15, '2021-10-04 14:48:29'),
(38, 18, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '0000-00-00 00:00:00'),
(39, 18, 33, 'โค้กขวดแก้ว', 1, 15, '0000-00-00 00:00:00'),
(40, 19, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 14:49:45'),
(41, 20, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 14:51:08'),
(42, 21, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 14:54:40'),
(43, 22, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 14:55:56'),
(44, 22, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 15:05:57'),
(45, 22, 34, 'ผัดกระเพราหมูกรอบ', 1, 50, '2021-10-04 15:06:06'),
(46, 22, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 15:10:23'),
(47, 22, 34, 'ผัดกระเพราหมูกรอบ', 2, 100, '2021-10-04 15:12:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
