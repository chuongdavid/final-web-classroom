-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2020 lúc 09:22 AM
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
  `title` varchar(100) DEFAULT NULL,
  `news` varchar(200) DEFAULT NULL,
  `id_class` varchar(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `news`, `id_class`, `created_by_id`, `created_at`, `updated_at`) VALUES
('5fbf80c43b2', 'Thắc mắc về bài tập', 'Thầy cho em hỏi về bài tập này ạ', '5fbdb0c3cab', 26, '2020-11-26 10:17:40', NULL),
('5fbfcb161c1', 'Thắc mắc về bài tập', 'Giải giúp em vài bài', '5fbdb0c3cab', 19, '2020-11-26 15:34:46', NULL),
('5fc0606beaf', 'Nhớ làm bài tuần này nha', 'Tập tin đính kèm ở đây', '5fbdb0b668d', 19, '2020-11-27 02:11:55', NULL),
('5fc0f812264', 'Test tính năng ẩn', 'hhfhfdhhffsd', '5fbdb0c3cab', 26, '2020-11-27 12:58:58', NULL),
('5fc12ca5973', 'Thắc mắc về bài tập', 'sdfasdfadf', '5fc07ad5319', 19, '2020-11-27 16:43:17', NULL),
('5fc1cad4eea', 'Test tính năng download', 'asdfadfa', '5fc07ad5319', 21, '2020-11-28 03:58:12', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `instruction` varchar(100) DEFAULT NULL,
  `id_class` varchar(11) DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `date_end` timestamp NULL DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `assignment`
--

INSERT INTO `assignment` (`id`, `title`, `instruction`, `id_class`, `date_start`, `date_end`, `created_by_id`, `created_at`, `updated_at`) VALUES
(13, 'assignment 1', '1', '5fc07ad5319', '2020-11-24 07:01:00', '2020-12-03 07:01:00', 19, '2020-11-30 07:01:55', NULL),
(14, 'assignment 2', '2', '5fc07ad5319', '2020-12-01 07:02:00', '2020-12-06 07:02:00', 19, '2020-11-30 07:02:18', NULL),
(15, 'Test tính năng download', 'asd', '5fc07ad5319', '2020-12-01 07:02:00', '2020-12-03 07:02:00', 19, '2020-11-30 07:02:50', NULL);

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
('5fbdb0c3cab', 'tên lớp 3', 'Công nghệ thông tin 2', 'Cẩm Quang', 'B-05010', 'avatar.png', 'Dương Thụy Chương', 19, NULL),
('5fc07ad5319', 'Hệ thống thông tin kế toán', 'Kế toán', 'Nguyễn Nam', 'A-0506', 'avatar4.png', 'Dương Thụy Chương', 19, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` varchar(11) NOT NULL,
  `id_class` varchar(11) DEFAULT NULL,
  `id_announce` varchar(11) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `created_by_who` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_class`, `id_announce`, `content`, `created_by_who`, `created_at`, `updated_at`) VALUES
('5fc0f0f5cd6', '5fbdb0c3cab', '5fbf80c43b2', 'Bài tập khó quá thầy ơi', 'admin@gmail.com', '2020-11-27 12:28:37', NULL),
('5fc0f50cbb7', '5fbdb0c3cab', '5fbfcb161c1', 'Làm sao đây', 'admin@gmail.com', '2020-11-27 12:46:04', NULL),
('5fc0f670a37', '5fbdb0c3cab', '5fbf80c43b2', 'hoàng hà', 'duongthuychuong@gmail.com', '2020-11-27 12:52:00', NULL),
('5fc499e8103', '5fc07ad5319', '5fc12ca5973', 'Bài tập khó quá thầy ơi', 'cameraquangthuy@gmail.com', '2020-11-30 07:06:16', NULL),
('5fc499efad1', '5fc07ad5319', '5fc12ca5973', 'Làm sao đây', 'cameraquangthuy@gmail.com', '2020-11-30 07:06:23', NULL);

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
(17, '5fbf61cd02b', 'DoAnCuoiKi-v3.pdf'),
(18, '5fbf61cd02b', 'LABWEB (1).txt'),
(19, '5fbf80c43b2', 'DSC_0916.jpg'),
(33, '5fbfcb161c1', 'DSC_0032.JPG'),
(34, '5fbfcb161c1', 'DSC_0213.NEF'),
(35, '5fbfcb161c1', 'DSC_0214.NEF'),
(36, '5fbfcd21550', 'DSC_0005.JPG'),
(37, '5fc0606beaf', 'DSC_0240.JPG'),
(38, '5fc12ca5973', 'sdfsdfsa.jpg'),
(39, '5fc1cad4eea', 'sdfsdfsa.jpg');

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

--
-- Đang đổ dữ liệu cho bảng `student_class`
--

INSERT INTO `student_class` (`id_student`, `id_class`) VALUES
(26, '5fbcb2efe10'),
(26, '5fbdb0c3cab'),
(26, '5fc07ad5319');

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
(25, 'teacher', 'Giáo Viên', '$2y$10$LXit4U7soqF2OPJbqgOhOeFi3a8adzClGEteWq4PwQ31BFpwtiK2m', '2020-11-05', 'teacher@gmail.com', '0387845823', NULL, 1, 1, NULL, '2020-11-24 13:37:45'),
(26, 'A Tủn', 'Tuấn Tèo', '$2y$10$sWF7CL/wXgcpkybELsk6EeJiQvsmv0gX.Xk30B7DlWARpDMpSHOpq', '1999-11-20', 'duongthuychuong@gmail.com', '0387845823', '', 1, 0, NULL, '2020-11-25 15:13:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
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
-- AUTO_INCREMENT cho bảng `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `file_upload_announce`
--
ALTER TABLE `file_upload_announce`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
