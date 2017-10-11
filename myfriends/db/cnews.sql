-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 11:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnews`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `email`, `phone`, `content`) VALUES
(1, 'Nguyễn Văn Tèo', 'teo@vinaenter.edu.vn', '0981.234.567', 'Nội dung liên hệ 1'),
(2, 'Trần Thị Diệu Thảo', 'teo@vinaenter.edu.vn', '0981.234.568', 'Nội dung liên hệ 2'),
(3, 'mải', 'ma', '1', 'đf'),
(4, 'mailionel', 'dfsfn', '123', '122'),
(5, 'hiếu', 'sjdhfjnfds', '123', 'dsjhfds'),
(6, 'df', 'dsf', '255.122', 'dfs'),
(7, 'fđ', 'dfsfnd', 'gdfsfg', 'dg'),
(8, 'dfg', 'dfsfnd', '22.51', 'dfg'),
(9, 'df', 'fsdf', 'sfdsd', 'fsd'),
(10, 'fds', 'dsfssdf', 'fsd', 'fsd'),
(11, 'x', 'xc', 'cx', 'cvx'),
(12, 'gfd', 'fdsfdgd', 'fdg', 'g');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `fid` int(255) NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `preview` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `date_create` date NOT NULL,
  `friend_list_id` int(10) NOT NULL,
  `fread` int(10) NOT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`fid`, `fname`, `preview`, `detail`, `date_create`, `friend_list_id`, `fread`, `picture`) VALUES
(5, 'Nguyễn Văn Chung', 'mô tả Chung', '<p>Chi tiết Chung</p>\r\n', '2017-03-00', 1, 100, 'VNE-1488892848.jpg'),
(6, 'Trần Hậu', 'neymarr  ', 'naymar đi bóng hay', '2017-10-05', 1, 200, 'VNE-1488892923.jpg'),
(7, 'Nguyễn Thi Thu Thảo', ' Mô tả Thảo  ', '<p>Chi tiết Thảo</p>\r\n', '2017-03-09', 1, 200, 'VNE-1489726769.jpg'),
(28, 'Trần Thành Công', 'Mô tả Công', '<p>Chi tiết C&ocirc;ng</p>\r\n', '2017-03-09', 1, 200, 'VNE-1488893185.jpg'),
(29, 'Trần Trung Hiếu', ' Mô tả Hiếu', '<p>Chi Tiết Hiếu</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2017-03-09', 1, 100, 'VNE-1489151590.jpg'),
(30, 'Nguyễn Văn Quang', 'mô tả Quang  ', '<p>Chi tiết Quang</p>\r\n', '2017-03-00', 1, 1000, 'VNE-1489726686.jpg'),
(31, 'Nguyễn Trần Quốc Pháp', 'mô tả pháp   ', '<p>chi tiết&nbsp;ph&aacute;p</p>\r\n', '2017-03-07', 1, 100, 'VNE-1489726514.jpg'),
(32, 'Trần Vũ Lộc', 'Mô tả Lộc', '<p>Chi tiết Lộc</p>\r\n', '0000-00-00', 1, 365, 'VNE-1489727078.jpg'),
(33, 'Huỳnh Văn Vũ', 'Mô tả Vũ', '<p>Chi Tiết Vũ</p>\r\n\r\n<p>&nbsp;</p>\r\n', '0000-00-00', 1, 2000, 'VNE-1489727127.jpg'),
(34, 'Nguyên Văn Thuận', 'Mô tả Thuận ', '<p>Chi tiết Thu&acirc;n</p>\r\n', '0000-00-00', 1, 150, 'VNE-1489727217.jpg'),
(35, 'Trần Ngọc Khánh Tín', 'Mô tả Tín ', '<p>Chi Tiết T&iacute;n</p>\r\n', '0000-00-00', 2, 3300, 'VNE-1489727305.jpg'),
(36, 'Nguyễn Nhật Khoa', 'Mô tả Khoa  ', '<p>M&ocirc; tả Khoa</p>\r\n', '2017-03-07', 2, 150, 'VNE-1489727365.jpg'),
(37, 'Lương Kì Cán', 'Mô tả Cán  ', '<p>Chi ti&ecirc;t C&aacute;n</p>\r\n', '2017-03-07', 2, 1540, ''),
(38, 'Huỳnh Nga', 'Mô tả Nga ', '<p>Chi Tiết Nga</p>\r\n', '2017-03-07', 2, 100, 'VNE-1489727692.jpg'),
(39, 'Huỳnh ngọc thương', 'Mô tả Thương', '<p>Chi ti&ecirc;t Thuong</p>\r\n', '2017-03-07', 2, 200, 'VNE-1489728146.jpg'),
(40, 'Đăng khoa', 'Mô tả đăng khoa ', '<p>Chi Tiết đăng khoa</p>\r\n', '2017-03-07', 2, 2301, 'VNE-1489728199.jpg'),
(41, 'Hữu Quốc', 'Mô tả Quốc', '<p>Chi tiết quốc</p>\r\n', '0000-00-00', 2, 200, 'VNE-1489728287.jpg'),
(42, 'Tuyến', 'mô tả tuyến', '<p>chi tiết tuyến</p>\r\n', '2017-03-07', 2, 34, 'VNE-1489728344.jpg'),
(43, 'Lê Vương', 'mô tả vương ', '<p>chi tiết vương</p>\r\n', '2017-03-07', 2, 251, 'VNE-1489728553.jpg'),
(44, 'Hữu Quyết', 'mô tả Quyết  ', '<p>chi tiết quyết</p>\r\n', '2017-03-07', 2, 12, 'VNE-1489736402.jpg'),
(45, 'Nguyễn Đắc Trung', 'mô tả Trung', '<p>Chi tiết trung</p>\r\n', '2017-03-07', 5, 151, 'VNE-1489737241.jpg'),
(46, 'Nguyễn Văn Hiền', 'Mô tả Hiền ', '<p>chi tiết hiền</p>\r\n', '2017-03-07', 5, 541, 'VNE-1489737284.jpg'),
(47, 'Nguyễn Văn Tuấn', 'mô tả tuấn', '<p>Chi tiết tuấn</p>\r\n', '2017-03-07', 5, 1556, 'VNE-1489737337.jpg'),
(48, 'Hồ Văn Thạch ', 'mô tả thạch', '<p>chi tiết thạch</p>\r\n', '2017-03-09', 5, 3515, 'VNE-1489737383.jpg'),
(49, 'Nguyễn Văn Sơn', 'mô tả Sơn', '<p>chi tiết sơn</p>\r\n', '2017-03-08', 5, 545, 'VNE-1489737435.jpg'),
(50, 'Nguyễn Công Trương', 'mô tả Trương', '<p>chi tiết trương</p>\r\n', '2017-03-09', 5, 5, 'VNE-1489737482.jpg'),
(51, 'Phạm đình Nghi', 'mô tả nghi', '<p>chi tiết nghi</p>\r\n', '2017-03-09', 5, 45, 'VNE-1489737527.jpg'),
(52, 'Nguyễn Văn Lành', 'mô tả Lành', '<p>Chi titet l&acirc;nhf</p>\r\n', '2017-03-08', 5, 156, 'VNE-1489737586.jpg'),
(53, 'Trần Thái Pháp', 'mô tả pháp ', '<p>Chi tiết ph&aacute;p</p>\r\n', '2017-03-00', 5, 51, 'VNE-1489737629.jpg'),
(54, 'Đinh Công Nguyên', 'mô tả nguyên', '<p>chi tiết Nguy&ecirc;n</p>\r\n', '2017-03-00', 5, 546, 'VNE-1489737711.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

CREATE TABLE `friend_list` (
  `fl_id` int(10) NOT NULL,
  `fl_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friend_list`
--

INSERT INTO `friend_list` (`fl_id`, `fl_name`) VALUES
(1, 'Bạn phổ thông'),
(2, 'Bạn đại học'),
(5, 'Bạn tri kỷ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `active`) VALUES
(1, 'admin', 'd359832e7d4bc717331e0a9abe52737f', 'Võ Văn Mải', 1),
(2, 'trantrunghieu', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Trung Hiếu', 1),
(17, 'luongkhaihoan', '25f9e794323b453885f5181f1b624d0b', 'Lương Khải Hoàn', 0),
(18, 'nguyenthach', '4c93008615c2d041e33ebac605d14b5b', 'Nguyễn Thạch', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) NOT NULL,
  `vname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `vname`, `vcode`, `date_create`) VALUES
(1, 'Lập trình PHP từ A-Z', 'dVoj3Sm80ng', '2015-01-14 07:17:42'),
(2, 'Lập trình JAVA từ A-Z', 'h0LHNgSDlRk', '2015-01-14 07:17:43'),
(3, 'Lập trình ANDROID từ A-Z', 'dVoj3Sm80ng', '2014-01-14 07:17:44'),
(4, 'Lập trình IOS từ A-Z', 'dVoj3Sm80ng', '2014-01-14 07:17:45'),
(5, 'Lập trình Laravel Framework', 'h0LHNgSDlRk', '2013-01-14 07:17:46'),
(6, 'messi đi bóng', 'z4w7rP2ueUc', '2017-04-02 01:20:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `friend_list`
--
ALTER TABLE `friend_list`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `friend_list`
--
ALTER TABLE `friend_list`
  MODIFY `fl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
