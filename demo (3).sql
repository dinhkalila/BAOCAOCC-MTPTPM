-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2024 lúc 03:16 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `name`, `role`) VALUES
(1, 'dinhanhvnn1@gmail.com', '$2y$12$ltKZThYayS0PvmGQomKM1ORnaCRlxYkuWV1kDLm9S5Vb6fE6qhM4i', 'anhnguyen', 'admin'),
(2, 'dinhanhvnn2@gmail.com', '$2y$12$Ubm9XtZK.kCIME6c/9n1Qet8G98cJWAAtmdoSNZG220YHZGOqSOvy', 'anhnguyen2', 'user'),
(3, 'dinhanhvnn3@gmail.com', '$2y$12$hgW1QWhkvUwKN6WnTC0UzuKuq9TVdsKLFNY6jqo7zF3R5mw8SLdqm', 'anhnguyen', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `thumnail` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `thumnail`) VALUES
(1, 'Xe Kia Soluto 1.4 AT Deluxe 2023', 'Bán Kia Soluto Deluxe 1.4AT 2023, biển 30Kxx, TN 1 chủ sử dụng, đẹp xuất sắc, odo-> 1.1 vạn km, miễn bàn chất lượng', 919000000, NULL, 'uploads/1iphone 16.jpg'),
(2, 'Xe Mitsubishi Triton 4x4 AT Mivec 2017', '✓Hỗ trợ vay ngân hàng lãi suất ưu đãi. ✓Bảo hành 6 tháng hoặc 10.000km động cơ, máy móc. ✓Bảo dưỡng thay nhớt một lần miễn phí trước khi giao xe. ✓Hỗ trợ test hãng có văn bản', 599, NULL, 'uploads/1iphone 16.jpg'),
(3, 'Xe Mazda CX5 Premium 2.0 AT 2022', 'Xe Mazda CX5 Premium 2.0 AT 2022', 999, 'uploads/m_1709473019.509.jpg', 'uploads/1iphone 16.jpg'),
(4, 'Xe BMW 5 Series 528i GT 2014', 'BMW 528i GT sx 2014 Trắng/Kem, tư nhân sd lăn bánh hơn 7v miles rất đẹp. Cam kết xe không đâm đụng , không ngập nước , máy móc nguyên bản Có hỗ trợ thủ tục vay ngân hàng trả góp Có bao test xe check hãng', 999, 'uploads/m_1709175548.745.jpg', 'uploads/1iphone 16.jpg'),
(5, 'Xe Mercedes Benz E class E300 AMG 2019 ', 'Mercedes_E300_AMG xanh cavansite nt nâu - Sản xuất 2019 - Odo: 49.000 km (Full lịch sử hãng) - Option: Loa Bumester, cửa sổ trời, rèm che nắng, LED nội thất, cốp điện, Auto Hold, phanh tay điện tử, lẫy chuyển số vô lăng, ga tự động Cruise Control, giới hạn tốc độ Lim,… - Bank 70% - trả trước từ 500tr', 999, 'uploads/m_1709473019.509.jpg', 'uploads/1iphone 16.jpg'),
(6, 'Xe Honda CRV L 2024', 'Những điểm nổi bật trên Honda CR-V mới: - Công nghệ hỗ trợ lái xe an toàn tiên tiến Honda SENSING - Camera quan sát làn đường - Sạc không dây tiện ích - Cốp điện với tính năng mở cốp rảnh tay - Camera lùi 3 góc quay - Gạt mưa tự động,', 888, 'uploads/m_1709175548.745.jpg', 'uploads/1iphone 16.jpg'),
(7, '111111111 BMW 123', '111Xe BMW Premium 2.0 AT 2022', 111, 'uploads/m_1709473019.509.jpg', 'uploads/1iphone 16.jpg'),
(8, 'Xe Mitsubishi Triton 4x4 AT Mivec 2017', 'Xe Mazda CX5 Premium 2.0 AT 2022', 999, 'uploads/m_1709175548.745.jpg', 'uploads/1iphone 16.jpg'),
(9, '22222222', '1111111', 999, 'uploads/m_1709473019.509.jpg', 'uploads/1iphone 16.jpg'),
(10, 'Xe Mitsubishi Triton 4x4 AT Mivec 2017', 'Xe Mazda CX5 Premium 2.0 AT 2022', 999, 'uploads/m_1709175548.745.jpg', 'uploads/1iphone 16.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
