-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2023 lúc 01:48 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `booksto`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `aut_id` int(11) NOT NULL,
  `aut_name` varchar(255) NOT NULL,
  `aut_description` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`aut_id`, `aut_name`, `aut_description`, `isDelete`) VALUES
(1, 'Nguyễn Du', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(2, 'Tô Hoài', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(3, 'Tố Hữu', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(4, 'Nam Cao', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(5, 'Xuân Diệu', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(6, 'Hồ Xuân Hương', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(7, 'Huy Cận', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(9, 'Thế Lữ', 'Hiện tại chưa có thông tin cho tác giả này!', 0),
(10, 'Hồ Chí Minh', 'Chủ tịch Hồ Chí Minh vĩ đại', 0),
(11, 'Vũ Trọng Phụng', 'Không có mô tả nào cho tác giả này!', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookauthor`
--

CREATE TABLE `bookauthor` (
  `prd_id` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bookauthor`
--

INSERT INTO `bookauthor` (`prd_id`, `aut_id`) VALUES
(1, 1),
(15, 1),
(21, 1),
(10, 2),
(16, 2),
(22, 2),
(17, 3),
(23, 3),
(12, 4),
(18, 4),
(24, 4),
(11, 5),
(13, 5),
(19, 5),
(25, 5),
(28, 5),
(14, 6),
(20, 6),
(29, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `prd_image` varchar(255) NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_date` date NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_featured` int(1) NOT NULL,
  `prd_detail` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`prd_id`, `cat_id`, `pub_id`, `prd_name`, `prd_image`, `prd_price`, `prd_date`, `prd_status`, `prd_featured`, `prd_detail`, `isDelete`) VALUES
(1, 1, 5, 'Vợ nhặt', '01.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(10, 1, 4, 'Tắt đèn', '02.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(11, 4, 4, 'Những ngôi sao xa xôi', '03.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(12, 1, 4, 'Chiếc thuyền ngoài xa', '03.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(13, 1, 4, 'Rừng xà nu', '04.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(14, 4, 4, 'Con cóc', '05.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(15, 1, 4, 'Tắt đèn', '06.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(16, 1, 4, 'Con chó xấu xí', '07.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(17, 4, 4, 'Bạch tuyết', '08.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(18, 1, 4, 'Cô bé quàng khăn đỏ', '09.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(19, 4, 4, 'Tắt đèn', '10.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(20, 1, 4, 'Tắt đèn', '11.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(21, 4, 4, 'Tắt đèn', '12.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(22, 1, 4, 'Tắt đèn', '13.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(23, 4, 4, 'Tắt đèn', '14.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(24, 1, 4, 'Tắt đèn', '15.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(25, 1, 4, 'Tắt đèn', '16.jpg', 100000, '2023-05-01', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.', 0),
(28, 6, 4, 'Truyện Kiều', 'truyen-kieu.jpg', 54400, '2022-06-24', 1, 1, 'Truyện Kiều được mệnh danh là một trong những tác phẩm kiệt tác hàng đầu của văn học dân tộc ở mọi thời đại. Tác phẩm Truyền Kiều là sự kết hợp từ những tinh hoa của nhiều thể loại văn học mang đến giá trị nhân văn sâu sắc.', 0),
(29, 1, 4, 'Làm đĩ', 'lam-di.jpg', 200000, '2023-05-11', 1, 1, 'Đéo có mô tả', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_description`, `isDelete`) VALUES
(1, 'Văn học', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(2, 'Chính trị – pháp luật', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(3, 'Tình cảm', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(4, 'Khoa học', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(5, 'Tiểu thuyết', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(6, 'Tiên hiệp', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(7, 'Tâm lý', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(8, 'Sách thiếu nhi', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(9, 'Kinh tế', 'Hiện tại chưa có thông tin cho thể loại này!', 0),
(10, 'Sách giáo khoa', 'Chưa có mô tả cho thể loại này!', 0),
(11, 'Văn hóa xã hội – Lịch sử', 'Rất nhiều chữ và buồn ngủ', 0),
(12, 'Tâm linh', 'Tâm linh ghê rợn', 0),
(13, 'Viễn tưởng', 'Không có mô tả nào cho thể loại này!', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `price` decimal(15,4) NOT NULL DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `prd_id`, `qty`, `price`) VALUES
(5, 1, 2, '10000000.0000'),
(6, 1, 2, '100000.0000'),
(7, 1, 17, '100000.0000'),
(8, 1, 1, '100000.0000'),
(10, 10, 4, '100000.0000'),
(4, 11, 1, '10000000.0000'),
(5, 11, 3, '10000000.0000'),
(4, 14, 1, '10000000.0000'),
(10, 14, 2, '100000.0000'),
(8, 15, 1, '100000.0000'),
(10, 15, 1, '100000.0000'),
(3, 16, 3, '10000000.0000'),
(5, 16, 1, '10000000.0000'),
(7, 16, 4, '100000.0000'),
(11, 16, 1, '100000.0000'),
(16, 16, 15, '100000.0000'),
(19, 16, 1, '100000.0000'),
(10, 17, 5, '100000.0000'),
(21, 17, 1, '100000.0000'),
(3, 18, 2, '10000000.0000'),
(4, 18, 2, '10000000.0000'),
(6, 18, 1, '100000.0000'),
(7, 18, 10, '100000.0000'),
(9, 18, 1, '100000.0000'),
(21, 18, 1, '100000.0000'),
(9, 19, 1, '100000.0000'),
(21, 19, 1, '100000.0000'),
(3, 20, 1, '10000000.0000'),
(8, 20, 1, '100000.0000'),
(16, 20, 1, '100000.0000'),
(20, 20, 1, '100000.0000'),
(9, 21, 1, '100000.0000'),
(3, 24, 1, '10000000.0000'),
(5, 24, 1, '10000000.0000'),
(6, 24, 3, '100000.0000'),
(20, 24, 1, '100000.0000'),
(19, 25, 1, '100000.0000'),
(22, 25, 1, '100000.0000'),
(6, 28, 1, '54400.0000'),
(8, 28, 1, '54400.0000'),
(9, 28, 1, '54400.0000'),
(16, 28, 27, '54400.0000'),
(19, 28, 1, '54400.0000'),
(17, 29, 10, '200000.0000'),
(19, 29, 1, '200000.0000'),
(22, 29, 2, '200000.0000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `all_price` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `user_name`, `user_email`, `user_phone`, `address`, `status`, `all_price`, `order_date`) VALUES
(3, 6, 'Tạ Văn Phúc', 'p@gmail.com', '0365330543', 'Hà nội', 6, '73500000.0000', '2023-04-28'),
(4, 6, 'Nguyễn Ánh Tuyết', 'tuyet@gmail.com', '0326047067', 'Hoàng Mai, Hà Nội', 4, '42000000.0000', '2023-05-28'),
(5, 6, 'Tạ Bích Loan', 'loan@gmail.com', '0943021067', 'Hanoi', 1, '73500000.0000', '2023-04-30'),
(6, 6, 'Đỗ Mỹ Chinh', 'chinh@gmail.com', '0123512919', 'HCM', 5, '687120.0000', '2023-05-02'),
(7, 6, 'Thông', 'thong@gmail.com', '1234567897', 'Hà Nam', 5, '3255000.0000', '2023-03-03'),
(8, 6, 'Tí', 'as@gmail.com', '1515151515', 'hawai', 5, '372120.0000', '2023-04-03'),
(9, 6, 'Hoàng Hoa', 'hh@gmail.com', '1234567897', 'HCM', 5, '372120.0000', '2023-02-04'),
(10, 6, 'Nguyễn Mai Phương', 'phuong@gmail.com', '0151456285', 'Hn', 1, '1260000.0000', '2023-05-07'),
(11, 6, 'Tiểu Hy', 'hy@gmail.com', '0154682456', 'Ngách 16/77', 1, '105000.0000', '2023-05-07'),
(16, 14, 'Chiến Thần Bom Hàng', 'chienthanbomhang@gmail.com', '1900100110', 'Ở tận gốc mít , đi tít vào trong', 5, '3222240.0000', '2023-05-07'),
(17, 6, 'Vũ trọng phụng', 'vtp@gmail.com', '1234567897', 'hanoi', 2, '2100000.0000', '2023-05-08'),
(19, 13, 'Chu Hy', 'chuhy@gmail.com', '0110220334', 'Hanoi', 1, '477120.0000', '2023-05-11'),
(20, 13, 'Chu Hy', 'Hy@gmail.com', '4545454545', 'Hanoi', 1, '210000.0000', '2023-05-11'),
(21, 13, 'Diệp Phàm', 'pham@gmail.com', '1212121212', 'hanoi', 6, '315000.0000', '2023-05-11'),
(22, 13, 'Chu hy', 'a@gmail.com', '1212121212', 'hanoi', 2, '525000.0000', '2023-05-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

CREATE TABLE `publisher` (
  `pub_id` int(11) NOT NULL,
  `pub_name` varchar(255) NOT NULL,
  `pub_description` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `publisher`
--

INSERT INTO `publisher` (`pub_id`, `pub_name`, `pub_description`, `isDelete`) VALUES
(1, 'Chính trị Quốc gia', 'Hiện tại chưa có thông tin cho NXB này!', 0),
(2, 'Tư pháp', 'Hiện tại chưa có thông tin cho NXB này!', 0),
(3, 'Hồng Đức', 'Hiện tại chưa có thông tin cho NXB này!', 0),
(4, 'Kim Đồng', 'Hiện tại chưa có thông tin cho NXB này!', 0),
(5, 'Thanh niên', 'Hiện tại chưa có thông tin cho NXB này!', 0),
(6, 'Lao động', 'Hiện tại chưa có thông tin cho NXB này!', 0),
(7, 'Trẻ', 'Hiện tại chưa có thông tin cho NXB này!', 0),
(8, 'Phụ nữ', 'Không có mô tả nào cho NXB này!', 0),
(9, 'Mỹ thuật', 'Các tác phẩm nghệ thuật tuyệt vời', 0),
(10, 'Tôn giáo', 'Ảo tưởng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_level` int(1) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`, `isDelete`) VALUES
(1, 'Administrator', 'admin@gmail.com', '123456', 1, 0),
(2, 'Nguyễn Van A', 'nguyenvana@gmail.com', '123456', 2, 0),
(3, 'Nguyễn Van B', 'nguyenvanb@gmail.com', '123456', 2, 0),
(4, 'Nguyễn Van C', 'nguyenvanc@gmail.com', '123456', 2, 0),
(5, 'Nguyễn Van D', 'nguyenvand@gmail.com', '123456', 2, 0),
(6, 'Tạ Văn Phúc', 'p@gmail.com', '123456', 2, 0),
(7, 'Nguyễn Ánh Tuyết', 'tuyet@gmail.com', '123456', 2, 0),
(9, 'Nguyễn Hải Long', 'long@gmail.com', '123456', 2, 0),
(10, 'Tạ Hải Anh', 'ha@gmail.com', '123456', 2, 0),
(11, 'Nguyễn Quý Dương', 'duong@gmail.com', '123456', 2, 0),
(12, 'Quỳnh Hoa', 'quynhhoa@gmail.com', '123456', 2, 0),
(13, 'Chu Hy', 'chuhy@gmail.com', '123456', 2, 0),
(14, 'Tiểu Bối', 'tieuboi@gmail.com', '123456', 2, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`aut_id`),
  ADD UNIQUE KEY `aut_name` (`aut_name`);

--
-- Chỉ mục cho bảng `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD PRIMARY KEY (`aut_id`,`prd_id`),
  ADD KEY `FK_Author_Book` (`aut_id`),
  ADD KEY `FK_Detail_Book` (`prd_id`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `FK_CateProduct` (`cat_id`),
  ADD KEY `FK_PubProduct` (`pub_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`prd_id`,`order_id`),
  ADD KEY `FK_Detail_Product` (`prd_id`),
  ADD KEY `FK_Detail_Order` (`order_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_User_Order` (`user_id`);

--
-- Chỉ mục cho bảng `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pub_id`),
  ADD UNIQUE KEY `pub_name` (`pub_name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `aut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD CONSTRAINT `FK_Author_Book` FOREIGN KEY (`aut_id`) REFERENCES `author` (`aut_id`),
  ADD CONSTRAINT `FK_Detail_Book` FOREIGN KEY (`prd_id`) REFERENCES `books` (`prd_id`);

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_CateProduct` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `FK_PubProduct` FOREIGN KEY (`pub_id`) REFERENCES `publisher` (`pub_id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_Detail_Order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `FK_Detail_Product` FOREIGN KEY (`prd_id`) REFERENCES `books` (`prd_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_User_Order` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
