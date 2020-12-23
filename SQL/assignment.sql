-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2020 lúc 04:04 PM
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
-- Cơ sở dữ liệu: `assignment`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Username` varchar(60) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_tbl`
--

INSERT INTO `admin_tbl` (`Id`, `Username`, `Password`) VALUES
(1, 'admin', '12345678');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `Id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Number` varchar(11) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Message` mediumtext NOT NULL,
  `PostingDate` datetime NOT NULL,
  `IsRead` int(11) NOT NULL,
  `IsContact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_images_tbl`
--

CREATE TABLE `page_images_tbl` (
  `Id` int(5) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Page` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Number` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `page_images_tbl`
--

INSERT INTO `page_images_tbl` (`Id`, `Image`, `Page`, `Type`, `Number`) VALUES
(1, 'banner-img.png', 'home', 'slider', 1),
(2, 'banner-img02.jpg', 'home', 'slider', 2),
(3, 'About-us-banner.jpg', 'home', 'slider', 0),
(4, 'banner3.jpg', 'home', 'slider', 0),
(5, 'banner4.jpg', 'home', 'slider', 0),
(8, 'slide1.jpg', 'home', 'slider', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_tbl`
--

CREATE TABLE `page_tbl` (
  `Id` int(10) NOT NULL,
  `PageType` varchar(50) NOT NULL,
  `PageDescription` mediumtext NOT NULL,
  `Address` text NOT NULL,
  `Email` text NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `NumProduct` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `page_tbl`
--

INSERT INTO `page_tbl` (`Id`, `PageType`, `PageDescription`, `Address`, `Email`, `Phone`, `NumProduct`) VALUES
(1, 'contact', 'Đội ngũ Ultraman luôn hoạt động 16h/24h. Để Ultraman có thể hỗ trợ bạn một cách nhanh chóng, vui lòng điền đầy đủ thông tin vào form dưới đây hoặc liên hệ qua email hoặc SĐT chúng tôi đã cung cấp bên dưới. Liên hệ ngay.', '60 Nguyễn Đình Chiểu, P.Đakao, Q.1, TPHCM', 'humanres@gmail.com', '(+84) 358 121 712', 0),
(2, 'contact', 'Đội ngũ Ultraman luôn hoạt động 16h/24h. Để Ultraman có thể hỗ trợ bạn một cách nhanh chóng, vui lòng điền đầy đủ thông tin vào form dưới đây hoặc liên hệ qua email hoặc SĐT chúng tôi đã cung cấp bên dưới. Liên hệ ngay.', '60 Nguyễn Đình Chiểu, P.Đakao, Q.1, TPHCM', 'info1@ultraman.com', '(+84) 358 121 725', 0),
(3, 'home', '', '', '', '', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Id` int(10) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Link` varchar(100) NOT NULL,
  `CompleteDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`Id`, `Title`, `Image`, `Link`, `CompleteDate`) VALUES
(1, 'SONY Center tăng trưởng doanh số ấn tượng', 'product_1.png', 'https://store.sony.com.vn/', '2020-12-30'),
(2, 'TOKYO DELI - Thiết kế web thương hiệu', 'product_2.png', 'http://www.tokyodeli.com.vn/', '2020-12-29'),
(3, 'MASTERI tỏa sáng trên thị trường Bất động sản', 'product_3.jpg', 'http://www.masteri.com.vn/', '2020-12-29'),
(4, 'PVOIL - Tổng công ty Dầu Việt Nam', 'product_4.jpg', 'https://www.pvoil.com.vn/', '2020-12-29'),
(5, 'TOSHIBA - Thương hiệu hàng đầu về sản phẩm điện tử', 'product_5.jpg', 'http://www.toshiba.com.vn/', '2020-12-28'),
(6, 'DOMINO Pizza tăng doanh thu ấn tượng qua việc thiết kế website', 'product_6.jpg', 'https://dominos.vn/', '2020-12-28'),
(7, 'ĐẤT XANH GROUP - Xây dựng niềm tin của bạn', 'product_7.jpg', 'https://www.datxanh.vn/', '2020-12-28'),
(8, 'Công ty TNHH MTV cho thuê tài chính ngân hàng Á Châu', 'product_8.jpg', 'https://acbleasing.com.vn/', '2020-12-27'),
(9, 'CBRE VIỆT NAM - Làm website dịch vụ khu dân cư hiện đại', 'product_9.jpg', 'https://residential.cbrevietnam.com/', '2020-12-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Fullname` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `Type` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `Image` varchar(150) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Email`, `Fullname`, `Type`, `Image`) VALUES
(1, 'hoanghuy', '12345678', 'hoanghuyd6nc@gmail.com', 'Lê Hoàng Huy', 'normal', NULL),
(33, 'admin1', '123456', 'admin1@gmail.com', 'Hoang Huy', 'VIP', 'admin1_avatar.jpg'),
(34, 'admin2', '123456', 'admin2@gmail.com', 'Hoang Huy', 'normal', 'admin2_avatar.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `page_images_tbl`
--
ALTER TABLE `page_images_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `page_tbl`
--
ALTER TABLE `page_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `page_images_tbl`
--
ALTER TABLE `page_images_tbl`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `page_tbl`
--
ALTER TABLE `page_tbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
