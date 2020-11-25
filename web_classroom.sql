-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2020 lúc 06:54 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_classroom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `announcement`
--

CREATE TABLE `announcement` (
  `id` varchar(11) NOT NULL,
  `news` varchar(200) DEFAULT NULL,
  `id_class` varchar(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `announcement`
--

INSERT INTO `announcement` (`id`, `news`, `id_class`, `created_by_id`, `created_at`, `updated_at`) VALUES
('5fbde4218c7', 'something', '5fbdb0b668d', 19, '2020-11-25 04:57:05', NULL),
('5fbde49b82f', 'adasdas', '5fbdb0b668d', 19, '2020-11-25 04:59:07', NULL),
('5fbde507835', 'vui vui', '5fbdb0b668d', 19, '2020-11-25 05:00:55', NULL),
('5fbde544412', 'sadsa', '5fbdb0b668d', 19, '2020-11-25 05:01:56', NULL),
('5fbde5843fc', 'adasd', '5fbdb0b668d', 19, '2020-11-25 05:03:00', NULL),
('5fbde5f2941', 'asdasd', '5fbdb0b668d', 19, '2020-11-25 05:04:50', NULL),
('5fbde6987a5', 'something', '5fbdb0b668d', 19, '2020-11-25 05:07:36', NULL),
('5fbde9fbe4f', '', '5fbdb0b668d', 19, '2020-11-25 05:22:03', NULL),
('5fbdeaf057b', '', '5fbdb0b668d', 19, '2020-11-25 05:26:08', NULL),
('5fbdeb3f8cf', '', '5fbdb0b668d', 19, '2020-11-25 05:27:27', NULL),
('5fbdeb4aec8', '', '5fbdb0b668d', 19, '2020-11-25 05:27:38', NULL),
('5fbdeb9c78b', 'Vui vẻ thôi', '5fbdb0b668d', 19, '2020-11-25 05:29:00', NULL),
('5fbdebf9e34', 'Bài tập lớn 10 %', '5fbdb0b668d', 19, '2020-11-25 05:30:33', NULL),
('5fbdecbde53', 'Bài tập 1', '5fbdb0b668d', 19, '2020-11-25 05:33:49', NULL),
('5fbded072f1', 'asdasdasd', '5fbdb0b668d', 19, '2020-11-25 05:35:03', NULL),
('5fbded545f9', '', '5fbdb0b668d', 19, '2020-11-25 05:36:20', NULL),
('5fbdee66b03', 'vui ve', '5fbdb0b668d', 19, '2020-11-25 05:40:54', NULL),
('5fbdeebe8d6', 'vui ve', '5fbdb0b668d', 19, '2020-11-25 05:42:22', NULL),
('5fbdeec6e7c', 'asdasd', '5fbdb0b668d', 19, '2020-11-25 05:42:30', NULL),
('5fbdeff941f', 'asdasdasd', '5fbdb0b668d', 19, '2020-11-25 05:47:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` varchar(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `teacher` varchar(100) DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_by_who` varchar(100) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `name`, `subject`, `teacher`, `room`, `image`, `created_by_who`, `created_by_id`, `updated_at`) VALUES
('5fbcb2efe10', 'Cấu trúc rời rạc', 'Công nghệ thông tin', 'Tấn Tài Lộc', 'A-0506', 'avatar.png', 'admin', 21, NULL),
('5fbd4451956', 'tên lớp 4', 'Công nghệ thông tin', 'Tấn Tài', 'B-0507', 'avatar4.png', 'admin', 21, NULL),
('5fbdb0b668d', 'Giải thuật 2', 'Công nghệ thông tin', 'Cẩm Quang 123', 'phòng', 'avatar.jpg', 'Dương Thụy Chương', 19, NULL),
('5fbdb0c3cab', 'tên lớp 3', 'Công nghệ thông tin 2', 'Cẩm Quang', 'B-05010', 'avatar.png', 'Dương Thụy Chương', 19, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file_upload_announce`
--

CREATE TABLE `file_upload_announce` (
  `id_file` int(11) NOT NULL,
  `id_announce` varchar(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `file_upload_announce`
--

INSERT INTO `file_upload_announce` (`id_file`, `id_announce`, `name`) VALUES
(1, '5fbde5f2941', '5'),
(2, '5fbde6987a5', 'A'),
(3, '5fbdeb3f8cf', 'DSC_0007.JPG'),
(4, '5fbdeb3f8cf', 'DSC_0009.JPG'),
(5, '5fbdeb4aec8', 'DSC_0007.JPG'),
(6, '5fbdeb4aec8', 'DSC_0009.JPG'),
(7, '5fbdeb4aec8', 'DSC_0012.JPG'),
(8, '5fbdeb9c78b', 'DSC_0239.JPG'),
(9, '5fbdeb9c78b', 'DSC_0240.JPG'),
(10, '5fbdeb9c78b', 'DSC_0242.JPG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reset_token`
--

CREATE TABLE `reset_token` (
  `email` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `expire_on` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `reset_token`
--

INSERT INTO `reset_token` (`email`, `token`, `expire_on`) VALUES
('cameraquangthuy@gmail.com', 'b4a1fb06586abe4b46cf33049b504098', 1606316749);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_class`
--

CREATE TABLE `student_class` (
  `id_student` int(11) NOT NULL,
  `id_class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `vkey` varchar(255) DEFAULT NULL,
  `verified` int(11) DEFAULT 0,
  `role` int(5) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `fullname`, `password`, `date`, `email`, `phone`, `vkey`, `verified`, `role`, `created_at`, `updated_at`) VALUES
(19, 'chuongdavid', 'Dương Thụy Chương', '$2y$10$234e8YxDb/u7nVgm1LZ3/eELlECWJ7TnnEVPAK7aIgDZXZEVu2Lt.', '2020-11-25', 'cameraquangthuy@gmail.com', '0387845823', '', 1, 1, NULL, '2020-11-24 15:06:09'),
(21, 'admin', 'admin', '$2y$10$g4scKl0..ydwHnjgroLDTuV2r2Z8DwTQZ6X3jPUAzdbj5tnDXTHE6', '2020-11-17', 'admin@gmail.com', '0387845823', NULL, 1, 2, NULL, '2020-11-24 04:23:06'),
(23, 'chuongdavid', 'Dương Thụy Bảo', '$2y$10$vKLitrmehmlwltfhOHk3A.qGMfI24d/n5nL/6WhPehRWT3fVs.btW', '2020-11-10', 'student@gmail.com', '0387845823', '', 1, 0, NULL, '2020-11-24 14:31:29'),
(24, 'xuancute', 'Huỳnh Thị Đan Xuân', '$2y$10$eKkTAMVeacRiK.SDLx.FjOTDGqEfQUXVFNpiQp3kL/8rDTltzakLe', '2020-11-09', 'danxuanhuynhthi2202@gmail.com', '0387845823', '', 1, 0, NULL, '2020-11-24 10:59:00'),
(25, 'teacher', 'Giáo Viên', '$2y$10$LXit4U7soqF2OPJbqgOhOeFi3a8adzClGEteWq4PwQ31BFpwtiK2m', '2020-11-05', 'teacher@gmail.com', '0387845823', NULL, 1, 1, NULL, '2020-11-24 13:37:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `file_upload_announce`
--
ALTER TABLE `file_upload_announce`
  ADD PRIMARY KEY (`id_file`,`id_announce`) USING BTREE;

--
-- Chỉ mục cho bảng `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`id_student`,`id_class`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `file_upload_announce`
--
ALTER TABLE `file_upload_announce`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
