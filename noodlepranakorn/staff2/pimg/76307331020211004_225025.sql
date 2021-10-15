-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 03:55 PM
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
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `b_id` int(11) NOT NULL COMMENT 'รหัสธนาคาร',
  `b_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อธนาคาร',
  `b_type` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'ประเภทธนาคาร',
  `b_number` varchar(20) NOT NULL COMMENT 'เลขที่บัญชี',
  `b_owner` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อเจ้าของบัญชี',
  `bn_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อสาขา',
  `b_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่เพิ่มข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='bank';

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`b_id`, `b_name`, `b_type`, `b_number`, `b_owner`, `bn_name`, `b_date`) VALUES
(1, 'กรุงศรี', 'ออมทรัพย์', '4066699249', 'sahassawat pormwat', 'ปากช่อง', '2019-07-27 10:17:37'),
(2, 'กสิกรไทย', 'ออมทรัพย์', '4066699249', 'sahassawat pormwat', 'ปากช่อง', '2019-07-27 10:17:37'),
(4, 'ไทยพาณิชย์', 'ออมทรัพย์', '4066699249', 'sahassawat pormwat', 'ปากช่อง', '2019-07-27 10:17:37'),
(5, 'กรุงไทย', 'ออมทรัพย์', '4066699249', 'sahassawat pormwat', 'ปากช่อง', '2019-07-28 07:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `f_id` int(11) NOT NULL COMMENT 'รหัสอาหาร',
  `f_name` varchar(200) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL COMMENT 'ชื่ออาหาร',
  `type_id` int(11) DEFAULT NULL COMMENT 'ประเภทอาหาร',
  `f_img` varchar(200) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL COMMENT 'รูปอาหาร',
  `f_price` int(11) DEFAULT NULL COMMENT 'ราคาอาหาร',
  `f_qty` varchar(11) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL COMMENT 'จำนวนอาหาร',
  `f_unit` varchar(20) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL COMMENT 'หน่วยอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`f_id`, `f_name`, `type_id`, `f_img`, `f_price`, `f_qty`, `f_unit`) VALUES
(103, 'ก๋วยเตี๋ยวเส้นเล็ก', 0, '1.jpg', 55, '60', ' ถ้วย'),
(104, 'ก๋วยเตี๋ยวเส้นบะหมี่', 1, '2.jpg', 50, '100', 'ถ้วย'),
(107, 'เกาเหลา', 2, '3.jpg', 90, '66', 'ถ้วย');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `pay_slip` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รับจากหน้าร้าน' COMMENT 'ชื่อธนาคาร',
  `b_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลข บช',
  `pay_date` date DEFAULT NULL,
  `pay_amount` float(10,2) DEFAULT NULL,
  `postcode` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `name`, `address`, `email`, `phone`, `status`, `pay_slip`, `b_name`, `b_number`, `pay_date`, `pay_amount`, `postcode`, `order_date`) VALUES
(0000000001, 2, 'member', '', '', '0931294710', 2, '40061940820211002_162036.jpg', 'กรุงเทพ', '4066699249', '2021-10-02', 65.00, '', '2021-10-02 16:19:44'),
(0000000002, 2, 'member', '', '', '0931294710', 2, '209406694720211002_163338.jpg', 'กรุงเทพ', '4066699249', '2021-10-02', 130.00, '', '2021-10-02 16:21:39'),
(0000000003, 2, 'member', '', '', '0931294710', 1, '', '', '', '0000-00-00', 0.00, '', '2021-10-02 17:12:46'),
(0000000004, 2, 'member', '', '', '0931294710', 2, '84531736420211002_172134.jpg', 'กรุงเทพ', '4066699249', '2021-10-02', 900.00, '', '2021-10-02 17:21:04'),
(0000000005, 9, 'พนักงาน', '', '', '0448859854', 1, '', '', '', '0000-00-00', 0.00, '', '2021-10-04 15:14:58'),
(0000000006, 9, 'พนักงาน', '', '', '0448859854', 2, '63701947820211004_151651.jpg', 'รับจากหน้าร้าน', '0', '2021-10-04', 65.00, '', '2021-10-04 15:16:41'),
(0000000007, 9, 'พนักงาน', '', '', '0448859854', 2, '59216943020211004_151742.jpg', 'รับจากหน้าร้าน', '0', '2021-10-04', 100.00, '', '2021-10-04 15:17:23'),
(0000000008, 2, 'member', '', '', '0931294710', 2, '182690870220211004_155155.jpg', 'กรุงเทพ', '4066699249', '2021-10-04', 65.00, '', '2021-10-04 15:49:58'),
(0000000009, 2, 'member', '', '', '0931294710', 1, '', '', '', '0000-00-00', 0.00, '', '2021-10-04 15:51:15'),
(0000000010, 2, 'member', '', '', '0931294710', 2, '1645663520211004_155304.jpg', 'กรุงเทพ', '4066699249', '2021-10-04', 65.00, '', '2021-10-04 15:52:54'),
(0000000011, 4, 'sahassawat', '', '', '0931294710', 1, '', '', '', '0000-00-00', 0.00, '', '2021-10-04 15:54:12'),
(0000000012, 4, 'sahassawat', '', '', '0931294710', 2, '', '', '', '0000-00-00', 0.00, '', '2021-10-04 15:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `d_id` int(10) NOT NULL COMMENT 'รหัสรายละเอียดออเดอร์',
  `order_id` int(11) NOT NULL COMMENT 'รหัสออเดอร์',
  `f_id` int(11) NOT NULL COMMENT 'รหัสอาหาร',
  `f_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ชื่ออาหาร',
  `f_c_qty` int(11) NOT NULL COMMENT 'จำนวนอาหารที่ขายไป',
  `total` float NOT NULL COMMENT 'ราคาอาหาร',
  `datesave` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `pro_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_price` int(7) NOT NULL,
  `pro_discount` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`pro_id`, `type_id`, `pro_name`, `pro_price`, `pro_discount`) VALUES
(1, 1, 'ส่วนลดก๋วยเตี๋ยว 20% เมื่อซื้อครบ 200 บาท', 200, '20%'),
(4, 0, 'ส่วนลด 100 เมื่อซื้อครบ 180 บาท', 180, '100');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL COMMENT 'รหัสประเภทอาหาร',
  `type_name` varchar(100) COLLATE utf8mb4_thai_520_w2 NOT NULL COMMENT 'ชื่อประเภทอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, ' ก๋วยเตี๋ยว '),
(2, 'เกาเหลา'),
(3, 'ผัดกระเพรา'),
(4, ' เครื่องดื่ม ');

-- --------------------------------------------------------

--
-- Table structure for table `typeuser`
--

CREATE TABLE `typeuser` (
  `type_id_user` int(11) NOT NULL COMMENT 'รหัสประเภทผู้ใช้',
  `type_name_user` varchar(100) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL COMMENT 'ชื่อประเภทผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `typeuser`
--

INSERT INTO `typeuser` (`type_id_user`, `type_name_user`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อีเมล',
  `user_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสผ่าน',
  `type_id_user` int(11) DEFAULT NULL COMMENT 'รหัสประเภทผู้ใช้',
  `user_tel` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL COMMENT 'ชื่อผู้ใช้',
  `user_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL COMMENT 'ที่อยู่ผู้ใช่งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `type_id_user`, `user_tel`, `user_name`, `user_address`) VALUES
(1, 'sahassawat.pormwat@gmail.com', '260243', 1, '0959980084', 'Sahassawat Pormwat', 'New york'),
(2, 'staff@gmail.com', '260243', 2, '083384442', 'staff 1', 'pakchong'),
(3, 'customer@gmail.com', '260243', 3, '0885952296', ' customer 1', 'pakchong '),
(4, 'wwww@gmail.com', '260243', 1, '0999980084', 'test', 'dddd'),
(5, 'ai.aiyakarn@gmail.com', '260243', 0, '555555', 'test', 'wasa'),
(6, 'ai.aiyakarn@gmail.com', '3131', 1, '555555', 'testt', 'adadad'),
(7, 'sahassawat.po@rmuti.ac.th', '260243', 2, '260243', 'staff', 'guygyugy'),
(8, 'tsrif.4202@gmail.com', '260243', 3, '555555', 'user', '0dwadad'),
(9, 'test@gmail.com', '260243', 3, '556156', 'test@gmail.com', 'dwasdasd'),
(10, 'sahassawat.pormwat@gmail.com', '260243', 0, '1231243', 'sahassawat.pormwat@gmail.com', 'dawdad'),
(11, 'first@gmail.com', '260243', 1, '095555555', 'first@gmail.com', 'new york'),
(12, 'custer@gmail.com', '260243', 3, '0000000', 'cus', '0000000000'),
(13, 'test@test.com', '260243', 0, '', 'test', 'test'),
(14, 'sahassawat.pormwat@gmail.com', '260243', 0, '', 'sahassawat.pormwat', 'test'),
(15, 'test2@gmail.com', '260243', 0, '', 'test', 'test'),
(16, 'sahassawat.pormwat@gmail.com', '260243', 0, '556156', 'sahassawat.pormwat@gmail.com', 'wdawd'),
(17, 'test@test.com', '260243', 0, '0999980084', 'sahassawat.pormwat@gmail.com', '64546'),
(18, 'staff@gmail.com', '260243', 0, '555555', 'sahassawat.pormwat@gmail.com', 'dawda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `typeuser`
--
ALTER TABLE `typeuser`
  ADD PRIMARY KEY (`type_id_user`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสธนาคาร', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอาหาร', AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดออเดอร์';

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทอาหาร', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
