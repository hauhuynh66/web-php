-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2019 lúc 02:56 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `user` int(11) NOT NULL,
  `template` int(11) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 3,
  `content` text COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`user`, `template`, `star`, `content`) VALUES
(2, 6, 3, 'OK'),
(5, 5, 3, 'Test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `user` int(11) DEFAULT NULL,
  `status` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL DEFAULT 'ACTIVE',
  `role` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL DEFAULT 'USER',
  `lastest` datetime DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`user`, `status`, `role`, `lastest`) VALUES
(2, 'ACTIVE', 'ADMIN', '2019-12-14 13:06:19'),
(3, 'ACTIVE', 'USER', '2019-12-14 13:07:54'),
(4, 'ACTIVE', 'USER', '2019-12-14 13:00:16'),
(5, 'ACTIVE', 'USER', '2019-12-13 13:03:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL,
  `type` varchar(20) COLLATE utf16_vietnamese_ci NOT NULL DEFAULT 'web',
  `uploader` int(11) NOT NULL,
  `downloads` int(10) DEFAULT 0,
  `description` mediumtext COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `upload_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `template`
--

INSERT INTO `template` (`id`, `name`, `type`, `uploader`, `downloads`, `description`, `upload_date`) VALUES
(3, 'template2', 'web', 2, 4, 'Description TEST', '2019-12-11'),
(4, 'template5', 'web', 2, 0, 'Template 5 Description', '2019-12-11'),
(5, 'template17', 'powerpoint', 2, 4, 'Lorem Ipsum', '2019-12-11'),
(6, 'Class Presentation', 'powerpoint', 2, 0, 'Template 6', '2019-12-11'),
(13, 'template20', 'powerpoint', 2, 1, 'Test', '2019-12-11'),
(43, 'Ocean Theme', 'web', 2, 0, 'This is a test', '2019-12-13'),
(44, 'Test 123', 'web', 3, 0, 'This is a test', '2019-12-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf16_vietnamese_ci NOT NULL,
  `join_date` date DEFAULT curdate(),
  `picture` varchar(5) COLLATE utf16_vietnamese_ci DEFAULT '001',
  `github` varchar(100) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `join_date`, `picture`, `github`, `facebook`, `twitter`) VALUES
(2, 'hauhuynh', 'Hau', 'Huynh', 'hauhuynh66@gmail.com', '$2y$10$AjT6CcsQSYvg.r1pd3tDeuWo///TmkAkVUoLJP1khbU96QLB5RhCC', '2019-12-11', '015', '', '', ''),
(3, 'vietcong', 'Cong', 'Dinh', 'dvcong@gmail.com', '$2y$10$VbnORXfIzoC.Js7MuZ8wqejDFx.7Z8pmf/b6314rYF7maFaSGZ1oO', '2019-12-11', '001', NULL, NULL, NULL),
(4, 'nguyenanh', 'Nguyen', 'Anh', 'nguyenanh@gmail.com', '$2y$10$rRo41DNlxWfFO.QFBZRayODlLZpaHFfrCwIqG41mVQiAabagfz5re', '2019-12-13', '006', NULL, NULL, NULL),
(5, 'hauhfsd', 'Hau', 'Nguyen', 'hauhuynh@gmail.com', '$2y$10$3weVPxzNJ9.7V4Zicn2LhuHQ0Qh7Td5/tddGmnT/tt1cuttpU.Fjq', '2019-12-13', '002', '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD UNIQUE KEY `fk_unique` (`user`,`template`),
  ADD KEY `template` (`template`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD KEY `user` (`user`);

--
-- Chỉ mục cho bảng `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `uploader` (`uploader`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`template`) REFERENCES `template` (`id`);

--
-- Các ràng buộc cho bảng `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`uploader`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
