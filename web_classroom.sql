-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2020 lúc 02:37 PM
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
('5fbc751d64f', 'Công nghệ phần mềm 2', 'Công nghệ thông tin', 'Trung Tín', 'B-05010', 'avatar.jpg', 'admin', 21, NULL),
('5fbcb1ed9a5', 'Hóa 3', 'Hóa', 'Trung Tín', 'B-0807', 'avatar4.png', 'admin', 21, NULL),
('5fbcb213d3e', 'Kỹ thuật ô tô', 'Kỹ thuật', 'Mai Văn Mạnh', 'A-0807', 'avatar3.png', 'admin', 21, NULL),
('5fbcb2efe10', 'Cấu trúc rời rạc', 'Công nghệ thông tin', 'Tấn Tài Lộc', 'A-0506', 'avatar.png', 'admin', 21, NULL),
('5fbcb32bcbf', 'Toán cao cấp', 'Toán học', 'Phương Đan', 'C-0708', 'avatar.jpg', 'admin', 21, NULL);

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
('cameraquangthuy@gmail.com', '6a1740ceef50bbe48af98beee231d915', 1606055246);

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
(23, '5fbc751d64f'),
(23, '5fbcb1ed9a5'),
(24, '5fbcb2efe10'),
(24, '5fbcb32bcbf');

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
(19, 'chuongdavid', 'Dương Thụy Chương', '$2y$10$ZhOBGrXRMJ9tKCZ233.0/etuDij5WREEFdJ20oSmmwyaCqPOhgjsi', '2020-11-25', 'cameraquangthuy@gmail.com', '0387845823', '', 1, 1, NULL, '2020-11-22 13:32:47'),
(20, 'Tín Cao', 'Trung Tín', '$2y$10$M.lK9/36B9liPi0CMjrVZe7EIa/iMtU2bZPealv5Ew7ID1I.oRe3m', '2020-11-26', 'chuong@gmail.com', '0387845823', NULL, 1, 1, NULL, '2020-11-21 12:27:59'),
(21, 'admin', 'admin', '$2y$10$g4scKl0..ydwHnjgroLDTuV2r2Z8DwTQZ6X3jPUAzdbj5tnDXTHE6', '2020-11-17', 'admin@gmail.com', '0387845823', NULL, 1, 2, NULL, '2020-11-24 04:23:06'),
(22, 'Vi', 'Khang Vĩ', '$2y$10$pzG8jBjfItUKFaal/eyFMOKGPs0vLB9pjVDUSlV/grT7jYwSQq/lu', '2020-11-11', 'khangvi1412@gmail.com', '0387845823', '', 0, 0, NULL, '2020-11-22 03:07:23'),
(23, 'chuongdavid', 'Dương Thụy Bảo', '$2y$10$vKLitrmehmlwltfhOHk3A.qGMfI24d/n5nL/6WhPehRWT3fVs.btW', '2020-11-10', 'student@gmail.com', '0387845823', '', 1, 0, NULL, '2020-11-23 07:01:27'),
(24, 'xuancute', 'Huỳnh Thị Đan Xuân', '$2y$10$eKkTAMVeacRiK.SDLx.FjOTDGqEfQUXVFNpiQp3kL/8rDTltzakLe', '2020-11-09', 'danxuanhuynhthi2202@gmail.com', '0387845823', '', 1, 0, NULL, '2020-11-24 10:59:00'),
(25, 'teacher', 'Giáo Viên', '$2y$10$LXit4U7soqF2OPJbqgOhOeFi3a8adzClGEteWq4PwQ31BFpwtiK2m', '2020-11-05', 'teacher@gmail.com', '0387845823', NULL, 1, 1, NULL, '2020-11-24 13:37:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
