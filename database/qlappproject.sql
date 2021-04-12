-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2021 lúc 06:36 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlappproject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `AccountID` varchar(36) DEFAULT NULL COMMENT 'khóa chính',
  `UserName` varchar(100) DEFAULT NULL COMMENT 'tên đăng nhập',
  `PassWord` varchar(50) DEFAULT NULL COMMENT 'mật khẩu',
  `AccountType` int(11) DEFAULT NULL COMMENT 'Loại người dùng đăng nhập 1- trung tâm khảo thí, 2- thí sinh',
  `FullName` varchar(255) NOT NULL COMMENT 'tên người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`AccountID`, `UserName`, `PassWord`, `AccountType`, `FullName`) VALUES
('7147456c-9ba8-11eb-a3fd-9840bb0282e0', 'ptthuy@gmail.com', '1234', 2, 'Pham trung thuy'),
('7147456c-9ba8-11eb-a4fd-9840bb0282e0', 'ptthuy2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 'Pham trung thuy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
