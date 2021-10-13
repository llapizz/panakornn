-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2018 at 01:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_name`, `datesave`) VALUES
(1, '111', '111', 'devtai', '2018-06-14 11:39:15'),
(2, '222', '222', 'waiyawut', '2018-06-14 11:39:26'),
(3, '333', '333', 'aaa', '2018-06-14 11:39:41'),
(4, '444', '444', 'sss', '2018-06-14 11:39:56'),
(5, '555', '555', 'peenu', '2018-06-14 11:41:37'),
(6, 'aaa', 'aaa', 'thaidev', '2018-06-14 11:41:55'),
(7, 'ssss', 'ssss', 'devtaiwai', '2018-06-14 11:42:13'),
(8, '4110', '1411', 'toon', '2018-06-14 11:42:36'),
(9, 'admin', 'admin', 'devtai', '2018-06-14 11:42:50'),
(10, '44444', '22009', 'waiyawut', '2018-06-14 11:43:04'),
(14, '09872', '09312', 'thanakorn', '2018-07-02 03:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `m_user` varchar(20) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_tel` varchar(20) NOT NULL,
  `m_address` varchar(200) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `m_user`, `m_pass`, `m_name`, `m_email`, `m_tel`, `m_address`, `date_save`) VALUES
(1, '111', '111', 'devtai', 'name@hotmail.com', '087657831', '181 หมู่ 10 ต.โนนสุง อ.บ้านผือ จ.อุดรธานี 41160', '2018-06-16 08:49:48'),
(2, '222', '222', 'sssss', 'wootlove@gmail.com', '0931294710', '28/38-39 ถนนยิงเป้า ต.สนามจันทร์ \r\nอ.เมือง จ.นครปฐม 73000', '2018-06-16 08:52:55'),
(3, '123', '213', 'waina', 'aaaa@gmail.com', '025837588', '46/148-9 ม.3 ถ.ศรีสมาน ต.บ้านใหม่ \r\nอ.ปากเกร็ด จ.นนทบุรี 11120', '2018-06-16 09:02:30'),
(4, '666', '666', 'eeee', 'eeee@amial.com', '0388241313', '72/33-34 ถ.ศุขประยูร ต.หน้าเมือง \r\nอ.เมือง จ.ฉะเชิงเทรา 24000', '2018-06-16 09:11:21'),
(5, '456', '654', 'waiya', 'waiy@gmail.com', '032419717', '252/1-2 ม.6 ถ.เพชรเกษม ต.บ้านหม้อ \r\nอ.เมือง จ.เพชรบุรี 76000', '2018-06-16 09:12:45'),
(6, '88', '8888', 'mmmm', 'mmmm@m.com', '038467809', '104/32 หมู่ 2 ถนนพระยาสัจจา ต.เสม็ด \r\nอ.เมือง จ.ชลบุรี 20000', '2018-06-16 09:18:42'),
(7, '999', '999', 'tbanbi', 'eoom@n.com', '038860799', '109/10-11 ถ.จันทอุดม ต.เชิงเนิน \r\nอ.เมือง จ.ระยอง 21000	', '2018-06-16 09:20:34'),
(8, '765', '765', 'moota', 'aaaa@gmail.com', '053302450', '459/98 ถ.เจริญเมือง ต.วัดเกตุ \r\nอ.เมือง จ.เชียงใหม่ 50000', '2018-06-16 09:23:37'),
(9, '777', '777', 'foodra', 'wsss@gmail.com', '053733708', '111/12-13 ม.13 ต.สันทราย \r\nอ.เมือง จ.เชียงราย 57000', '2018-06-16 09:26:55'),
(10, '144', '311', 'wiratai', 'boom@m.com', '043324754', '269/64-65 ม.4 ถ.มิตรภาพ \r\nอ.เมือง จ.ขอนแก่น 40000', '2018-06-16 09:29:48'),
(12, '11111', '1111111', 'devtai.com', 'devtai@gmail.com', '65444444', 'devtai', '2018-08-31 17:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `p_detail` text NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_status` int(1) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `type_id`, `p_detail`, `p_img`, `p_price`, `p_status`, `datesave`) VALUES
(10, 'aaaaa', 1, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52'),
(11, 'aaaaa', 2, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52'),
(12, 'aaaaa', 2, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52'),
(15, 'x', 2, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52'),
(16, 'Casio', 2, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52'),
(17, 'Casio', 2, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52'),
(18, 'Casio', 2, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52'),
(23, 'aaaaa', 2, '<p>fdgfdgfb</p>\r\n', '74138237520180827_153633.png', 100, 1, '2018-06-22 10:34:52'),
(24, 'aaaaa', 2, '<p>fdgfdgfb</p>\r\n', '193490393320180827_153622.png', 100, 1, '2018-06-22 10:34:52'),
(26, 'aaaaa', 2, '<p>fdgfdgfb</p>\r\n', '164887830720180827_152911.png', 100, 1, '2018-06-22 10:34:52'),
(30, 'Casio', 2, '<p><strong>Casio</strong><br />\r\nบริษัทนาฬิกา&nbsp;Casio&nbsp;เป็นต้น&nbsp;ถ้าให้คุณเดาว่าผลิตภัณฑ์ชิ้นแรกของ&nbsp;Casio&nbsp;คืออะไร คุณอาจจะคิดว่าเป็นเครื่องคิดเลขหรือไม่ก็ผลิตภัณฑ์ที่เกี่ยวกับอิเลคทรอนิคส์ทั่วๆ ไป คุณคิดผิด!!!&nbsp;บริษัท Casio ก่อตั้งขึ้นโดย มิสเตอร์ Tadao Kashio&nbsp;ในปี ค.ศ. 1946&nbsp;ซึ่งเข้าใจได้ว่าก่อตั้งขึ้นนั้นภายหลังประเทศญี่ปุ่นได้ประกาศเข้าร่วมสงครามโลกครั้งที่ 2 ซึ่ง ณ. ตอนนั้นสถานการณ์ทางการเงินในประเทศญี่ปุ่นค่อนข้างย่ำแย่มากเมื่อ มิสเตอร์ Kashio เริ่มงานในบริษัทของเขา เขาเป็นเพียงวิศวกรประกอบซึ่งคาดหวังว่าอยากหาเวลาพักผ่อนยาวๆ&nbsp;</p>\r\n', '49580582620180801_173328.jpg', 25500, 0, '2018-06-22 10:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'อิเล็กทรอนิกส์'),
(2, 'รองเท้า'),
(4, 'แฟชั่น'),
(7, 'เครื่องแต่งกาย'),
(8, 'ของเล่น '),
(9, 'นาฬิกา'),
(10, 'เสื้อผ้า'),
(11, 'โทรศัพท์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
