-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 08:33 AM
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
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `m_user` varchar(20) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_level` varchar(50) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_tel` varchar(20) NOT NULL,
  `m_address` varchar(200) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `m_user`, `m_pass`, `m_level`, `m_name`, `m_email`, `m_tel`, `m_address`, `date_save`) VALUES
(2, 'mm', 'mm', 'member', 'member', 'member@gmail.com', '0931294710', 'member adress', '2019-07-29 14:05:58'),
(3, '11', '11', 'admin', '', '@gmail.com', '0931294710', '517/181 Suksawat 38', '2019-07-29 16:08:44'),
(4, '22', '22', 'member', 'sahassawat', 'sahassawat.pormwat@gmail.com', '0931294710', '517/181 nongsarai pakchong nakornratchasima 3000', '2019-07-29 16:09:02'),
(5, 'tsrifuck', '260243', 'member', 'first', 'sahassawat.pormwat@gmail.com', '0959980084', '123456', '2021-08-31 02:04:05'),
(6, 'noah', '260243', 'member', 'noah', 'sahassawat.po@rmut.ac.th', '0995599666', '111222', '2021-08-31 02:13:00'),
(7, 'www', 'www', 'member', 'www', 'wwww@gmail.com', '0959980084', 'wwww', '2021-08-31 02:26:32'),
(8, '', '260243', 'member', 'customer test', 'customertest@gmail.com', '0959980084', 'test', '2021-09-25 10:17:07'),
(9, 'emp', '1234', 'member', 'พนักงาน', 'employ@gmail.com', '0448859854', 'หน้าร้าน', '2021-10-02 07:13:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
