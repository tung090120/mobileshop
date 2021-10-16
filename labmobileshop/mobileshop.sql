-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 04:53 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned_word`
--

CREATE TABLE `banned_word` (
  `ban_word` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `ban_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banned_word`
--

INSERT INTO `banned_word` (`ban_word`, `ban_id`) VALUES
('DCM', 2),
('vcl', 3),
('dcmm', 4),
('dm', 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Blackberry'),
(3, 'HTC'),
(1, 'iPhone'),
(4, 'Nokia'),
(7, 'OPPO'),
(2, 'Samsung'),
(5, 'Sony'),
(9, 'Vivo'),
(8, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text COLLATE utf8_unicode_ci NOT NULL,
  `comm_permission` int(11) NOT NULL DEFAULT '0',
  `rep_comm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`, `comm_permission`, `rep_comm_id`) VALUES
(1, 1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 1, NULL),
(2, 2, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(3, 3, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 1, NULL),
(4, 4, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(5, 5, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(6, 6, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(7, 7, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(8, 8, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(9, 9, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(10, 10, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(11, 11, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(12, 12, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(13, 13, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(14, 14, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(15, 15, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(16, 16, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(17, 17, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(18, 18, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(19, 19, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(20, 20, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(21, 21, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(22, 22, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(23, 23, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(24, 24, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(25, 25, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(26, 26, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(27, 27, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(28, 28, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(29, 29, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(30, 30, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 0, NULL),
(34, 2, 'tun dat', 'hihi@gmail.com', '2020-08-19 21:14:26', 'dsadsadsa', 0, NULL),
(35, 2, 'tun dat', 'hihi@gmail.com', '2020-08-19 21:15:01', 'dsadsadsa', 0, NULL),
(36, 12, 'hihi', 'hihi@gmail.com', '2020-08-26 20:55:26', 'abc', 0, NULL),
(37, 4, 'tun dat', 'hihi@gmail.com', '2020-09-02 15:21:13', 'đjep đó\r\n', 0, NULL),
(38, 4, 'tun dat', 'hihi@gmail.com', '2020-09-02 15:22:23', 'đjep đó\r\n', 0, NULL),
(39, 1, 'tun dat', 'hihi@gmail.com', '2020-09-02 15:46:35', 'đẹp đó', 0, NULL),
(40, 1, 'tun dat', 'hihi@gmail.com', '2020-09-02 16:11:26', 'chào mọi người', 1, NULL),
(41, 1, 'ngoc tram', 'hihi@gmail.com', '0000-00-00 00:00:00', 'chào cậu', 0, 40),
(42, 1, 'ngoc tram', 'hihi@gmail.com', '2020-09-02 16:13:12', 'chào cậu', 1, 40),
(43, 1, 'ngoc tram', 'hihi@gmail.com', '2020-09-02 16:31:27', '*** ******** ***', 1, 40),
(44, 1, 'ngoc tram', 'hihi@gmail.com', '2020-09-02 16:32:55', '*** ******** ***', 0, 40),
(45, 1, 'ngoc tram', 'hihi@gmail.com', '2020-09-02 16:33:30', '*** ******** ***', 0, 40),
(46, 1, 'ngoc tram', 'hihi@gmail.com', '2020-09-02 16:34:06', '*** ******** ***', 0, 40),
(47, 1, 'ngoc tram', 'hihi@gmail.com', '2020-09-02 16:34:14', 'dđ', 0, 40),
(48, 1, 'ngoc tram', 'hihi@gmail.com', '2020-09-02 16:35:07', 'dđ', 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `prd_order`
--

CREATE TABLE `prd_order` (
  `ord_id` int(11) NOT NULL,
  `prd_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `tot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prd_order`
--

INSERT INTO `prd_order` (`ord_id`, `prd_id`, `amount`, `tot_id`) VALUES
(3, 2, 1, 4),
(4, 2, 2, 5),
(5, 6, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_accessories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_new` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_promotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_featured` int(1) NOT NULL,
  `prd_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessories`, `prd_new`, `prd_promotion`, `prd_status`, `prd_featured`, `prd_details`) VALUES
(1, 1, 'iPhone 7 Plus 32GB Rose Gold', 'iPhone-7-Plus-32GB-Rose-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 1, 'iPhone X 256GB Silver Seedstock', 'iPhone-X-256GB-Silver-Seedstock.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(3, 1, 'iPhone Xr 2 Sim 64GB Yellow', 'iPhone-Xr-2-Sim-64GB-Yellow.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(4, 1, 'iPhone Xr 2 Sim 56GB Red', 'iPhone-Xr-2-Sim-256GB-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 1, 'iPhone Xs 256GB Gold', 'iPhone-Xs-256GB-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(6, 2, 'Samsung Galaxy A9 2018 Black', 'Samsung-Galaxy-A9-2018-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(7, 2, 'Samsung Galaxy J2 Core Gold', 'Samsung-Galaxy-J2-Core-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(8, 2, 'Samsung Galaxy J4 Core Black', 'Samsung-Galaxy-J4-Core-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(9, 2, 'Samsung Galaxy S9 Plus 64GB Orchid Gray', 'Samsung-Galaxy-S9-Plus-64GB-Orchid-Gray.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(10, 2, 'Samsung Galaxy S9 Plus Black 128GB', 'Samsung-Galaxy-S9-Plus-Black-128GB.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(11, 4, 'Nokia 1 red', 'Nokia-1-red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(12, 4, 'Nokia 3.1 Black', 'Nokia-3.1-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(13, 4, 'Nokia 6.1 Plus Blue', 'Nokia-6.1-Plus-Blue.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(14, 4, 'Nokia 6.1 Plus White', 'Nokia-6.1-Plus-White.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(15, 4, 'Nokia 150 White', 'Nokia-150-White.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(16, 7, 'OPPO A3s 16GB Red', 'OPPO-A3s–16GB-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(17, 7, 'OPPO A7 64GB Blue', 'OPPO-A7-64GB-Blue.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(18, 7, 'OPPO F7 128GB Black', 'OPPO-F7-128GB-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(19, 7, 'OPPO F9 Sunrise Red', 'OPPO-F9-Sunrise-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(20, 7, 'OPPO R17 Pro Lavender', 'OPPO-R17-Pro-Lavender.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(21, 8, 'Xiaomi Mi 8 Pro Black', 'Xiaomi-Mi-8-Pro-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(22, 8, 'Xiaomi Mi A1 Black', 'Xiaomi-Mi-A1-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(23, 8, 'Xiaomi Mi A1 Gold', 'Xiaomi-Mi-A1-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(24, 8, 'Xiaomi Mi Max 3 Ram 4 64GB-Black', 'Xiaomi-Mi-Max-3-Ram-4–64GB-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(25, 8, 'Xiaomi Redmi Note 6 Pro 32GB Blue', 'Xiaomi-Redmi-Note-6-Pro–32GB-Blue.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(26, 9, 'Vivo V7 Gold', 'Vivo-V7-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(27, 9, 'Vivo V9 Gold', 'Vivo-V9-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(28, 9, 'Vivo Y53C Gold', 'Vivo-Y53C-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(29, 9, 'Vivo Y69 Gold', 'Vivo-Y69-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(30, 9, 'Vivo Y81i Red', 'Vivo-Y81i-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `prd_id` int(11) DEFAULT NULL,
  `rate_star` int(11) DEFAULT '0',
  `rate_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate_cmt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate_time` datetime NOT NULL,
  `rate_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `prd_id`, `rate_star`, `rate_name`, `rate_mail`, `rate_cmt`, `rate_time`, `rate_image`) VALUES
(3, 1, 3, '0', 'hihi@gmail.com', 'sản phẩm xịn', '2020-08-31 21:09:54', ''),
(4, 1, 3, 'dat', 'hihi@gmail.com', 'sản phẩm xịn', '2020-08-31 21:16:03', ''),
(5, 1, 5, 'dat', 'hihi@gmail.com', 'đẹp', '2020-09-01 08:15:42', ''),
(6, 1, 1, 'dat', 'hihi@gmail.com', 'aaa', '2020-09-01 08:16:51', ''),
(7, 1, 4, 'dat', 'hihi@gmail.com', 'dđ', '2020-09-01 08:40:02', ''),
(8, 1, 5, 'hih', 'hihi@gmail.com', 'dđ', '2020-09-01 08:40:14', ''),
(9, 1, 5, 'dat', 'hihi@gmail.com', 'dd', '2020-09-01 08:40:25', ''),
(10, 1, 4, 'văn a', 'hihi@gmail.com', 'chào', '2020-09-01 10:19:53', ''),
(11, 1, 5, 'dat', 'hihi@gmail.com', 'dđ', '2020-09-01 10:20:13', ''),
(12, 1, 0, 'dat', 'hihi@gmail.com', 'aaa', '2020-09-02 09:45:50', ''),
(13, 1, 4, 'dat', 'hihi@gmail.com', 'sdasdaas', '2020-09-02 09:46:55', 'logo.jpg'),
(14, 1, 4, 'dat', 'hihi@gmail.com', 'sdasdaas', '2020-09-02 09:47:45', 'logo.jpg'),
(15, 1, 0, 'dsasaddsa', 'hihi@gmail.com', 'adsdsadsa', '2020-09-02 09:53:46', ''),
(16, 1, 0, 'dat', 'hihi@gmail.com', 'dệp', '2020-09-02 10:16:41', '95139433-pixel-art-jet-plane.jpg'),
(17, 1, 0, 'dat', 'hihi@gmail.com', 'ddd', '2020-09-02 15:25:04', 'Center Of Information Security.jpg'),
(18, 1, 0, 'dat', 'hihi@gmail.com', 'ddd', '2020-09-02 15:25:38', 'Center Of Information Security.jpg'),
(19, 1, 0, 'dat', 'hihi@gmail.com', 'ddd', '2020-09-02 15:25:50', 'Center Of Information Security.jpg'),
(20, 1, 5, 'dat', 'hihi@gmail.com', 'ddd', '2020-09-02 15:26:07', 'Center Of Information Security.jpg'),
(21, 1, 5, 'dat', 'hihi@gmail.com', 'ddd', '2020-09-02 16:20:06', ''),
(22, 1, 5, 'dat', 'hihi@gmail.com', 'dđ', '2020-09-02 16:21:03', ''),
(23, 1, 5, 'dat', 'hihi@gmail.com', 'ddddđaaaa', '2020-09-02 16:23:52', 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `repcmt`
--

CREATE TABLE `repcmt` (
  `rep_id` int(11) NOT NULL,
  `rep_cmt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comm_id` int(11) DEFAULT NULL,
  `rep_time` datetime NOT NULL,
  `rep_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rep_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `repcmt`
--

INSERT INTO `repcmt` (`rep_id`, `rep_cmt`, `comm_id`, `rep_time`, `rep_name`, `rep_mail`) VALUES
(1, 'nhận xét đúng rùi', 35, '2020-09-02 14:42:26', 'ngoc tram', 'hihi@gmail.com'),
(2, 'sáda', 35, '2020-09-02 14:42:54', 'ngoc tram', 'hihi@gmail.com'),
(3, 'a', 35, '2020-09-02 14:43:11', 'ngoc tram', 'hihi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tot_order`
--

CREATE TABLE `tot_order` (
  `tot_id` int(11) NOT NULL,
  `ord_time` datetime NOT NULL,
  `cust_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cust_num` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_add` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_mail` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tot_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tot_order`
--

INSERT INTO `tot_order` (`tot_id`, `ord_time`, `cust_name`, `cust_num`, `cust_add`, `cust_mail`, `tot_price`) VALUES
(4, '2020-10-12 09:05:24', 'Nguyễn Xuân Tùng', '0987654321', 'tungnguyen090120@gmail.com', 'Kiến Hưng - Hà Đông - Hà Nội', 10000000),
(5, '2020-10-12 09:06:10', 'Tùng Nguyễn', '0987654321', 'tungnguyen090120@gmail.com', 'Kiến Hưng - Hà Đông - Hà Nội', 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`) VALUES
(1, 'Vietpro Academy', 'vietpro.edu.vn@gmail.com', '123456', 1),
(2, 'Administrator', 'admin@gmail.com', '123456', 1),
(3, 'Nguyễn Van A', 'nguyenvana@gmail.com', '123456', 2),
(4, 'Nguyễn Van B', 'nguyenvanb@gmail.com', '123456', 2),
(5, 'Nguyễn Van C', 'nguyenvanc@gmail.com', '123456', 2),
(6, 'Nguyễn Van D', 'nguyenvand@gmail.com', '123456', 2),
(7, 'Tuan dat hihi', 'hihi@gmail.com', '123456', 1),
(8, 'admin', 'admin123@gmail.com', '$2y$10$RhiMCQY//vMn4xZtnHTW5uHBr4oQq4MwhcXBqmiizqR.REycwDLfy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banned_word`
--
ALTER TABLE `banned_word`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `prd_order`
--
ALTER TABLE `prd_order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `repcmt`
--
ALTER TABLE `repcmt`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `tot_order`
--
ALTER TABLE `tot_order`
  ADD PRIMARY KEY (`tot_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banned_word`
--
ALTER TABLE `banned_word`
  MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `prd_order`
--
ALTER TABLE `prd_order`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `repcmt`
--
ALTER TABLE `repcmt`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tot_order`
--
ALTER TABLE `tot_order`
  MODIFY `tot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
