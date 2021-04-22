-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2021 lúc 06:16 PM
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

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Pro_Get_ListRegistExamDetail` ()  SELECT * from registexamdetail r1 INNER join registexam r2 ON
r1.RegistExamID = r2.RegistExamID order by r2.RegistNumber, r1.UnitExam$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `AccountID` varchar(36) NOT NULL COMMENT 'khóa chính',
  `Username` varchar(100) DEFAULT NULL COMMENT 'tên đăng nhập',
  `Password` varchar(100) DEFAULT NULL COMMENT 'mật khẩu',
  `AccountType` int(11) DEFAULT NULL COMMENT 'Loại người dùng đăng nhập 1- trung tâm khảo thí, 2- thí sinh',
  `FullName` varchar(255) NOT NULL COMMENT 'tên người dùng',
  `AccountDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accountdetail`
--

CREATE TABLE `accountdetail` (
  `AccountDetailID` int(11) NOT NULL COMMENT 'khoa chính',
  `AccountID` varchar(36) NOT NULL COMMENT 'id bảng account',
  `Email` varchar(100) NOT NULL COMMENT 'địa chỉ email',
  `DateOfBirth` date NOT NULL COMMENT 'ngày sinh',
  `Gender` varchar(20) NOT NULL COMMENT 'Gioi tinh',
  `FullName` varchar(500) NOT NULL COMMENT 'ho va ten',
  `Identification` varchar(50) NOT NULL COMMENT 'cmnd',
  `PhoneNumber` varchar(11) NOT NULL COMMENT 'sđt',
  `JDetail` longtext NOT NULL COMMENT 'thông tin cá nhân chi tiết',
  `Address` varchar(255) NOT NULL COMMENT 'địa chỉ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registexam`
--

CREATE TABLE `registexam` (
  `RegistExamID` varchar(36) NOT NULL COMMENT 'primarykey',
  `RegistNumber` int(11) NOT NULL COMMENT 'đợt thi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registexamdetail`
--

CREATE TABLE `registexamdetail` (
  `RegistExamDetailID` varchar(36) NOT NULL COMMENT 'khoas chinh',
  `RegistExamID` varchar(36) NOT NULL COMMENT 'id bảng  registexam',
  `StartedDate` datetime NOT NULL COMMENT 'Ngay mo dang ky',
  `FinishDate` datetime NOT NULL COMMENT 'ngay dong dang ky',
  `ExamDate` datetime NOT NULL COMMENT 'ngày thi',
  `Examee` int(11) NOT NULL COMMENT 'số lượng thí sinh đã đăng ký',
  `ExameeMax` int(11) NOT NULL COMMENT 'số lượng thí sinh tối da',
  `Location` varchar(500) NOT NULL COMMENT 'địa điểm thi',
  `IsRegist` int(11) NOT NULL COMMENT 'mở đóng đăng ký',
  `UnitExam` int(11) NOT NULL COMMENT 'ca thi số mấy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registexaminfor`
--

CREATE TABLE `registexaminfor` (
  `RegistExamInforID` int(11) NOT NULL COMMENT 'khóa chính',
  `AccountID` varchar(36) NOT NULL COMMENT 'id bảng account',
  `RegistExamDetailID` varchar(36) NOT NULL COMMENT 'id bảng examdetail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accountdetail`
--
ALTER TABLE `accountdetail`
  ADD PRIMARY KEY (`AccountDetailID`);

--
-- Chỉ mục cho bảng `registexamdetail`
--
ALTER TABLE `registexamdetail`
  ADD PRIMARY KEY (`RegistExamDetailID`);

--
-- Chỉ mục cho bảng `registexaminfor`
--
ALTER TABLE `registexaminfor`
  ADD PRIMARY KEY (`RegistExamInforID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accountdetail`
--
ALTER TABLE `accountdetail`
  MODIFY `AccountDetailID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khoa chính', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `registexaminfor`
--
ALTER TABLE `registexaminfor`
  MODIFY `RegistExamInforID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
