-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2020 lúc 03:05 PM
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
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('cameraquangthuy@gmail.com', '26c8af66b17f84b996cbc80f33332af0', 1605954080);

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
(19, 'chuongdavid', 'Dương Thụy Chương', '$2y$10$/u2mA9H8UsaYjaczf9iT4.uzQ9j1d4xd2cOY1WGSumFen8QL9/KJm', '2020-11-25', 'cameraquangthuy@gmail.com', '0387845823', '', 1, 0, NULL, '2020-11-21 06:41:12'),
(20, 'Tín Cao', 'Trung Tín', '$2y$10$M.lK9/36B9liPi0CMjrVZe7EIa/iMtU2bZPealv5Ew7ID1I.oRe3m', '2020-11-26', 'chuong@gmail.com', '0387845823', NULL, 1, 1, NULL, '2020-11-21 12:27:59'),
(21, 'admin', 'admin', '$2y$10$g4scKl0..ydwHnjgroLDTuV2r2Z8DwTQZ6X3jPUAzdbj5tnDXTHE6', '2020-11-17', 'admin@gmail.com', '0387845823', NULL, 1, 2, NULL, '2020-11-21 12:28:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
