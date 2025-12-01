-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 11:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dangvien_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chibo`
--

CREATE TABLE `chibo` (
  `Id` int(11) NOT NULL,
  `TenChiBo` varchar(250) DEFAULT NULL,
  `BiThu` int(11) NOT NULL,
  `MoTa` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chibo`
--

INSERT INTO `chibo` (`Id`, `TenChiBo`, `BiThu`, `MoTa`) VALUES
(1, 'Điện', 0, 'Chi bộ Điện'),
(2, 'Cơ khí', 62, 'Chi bộ Cơ khí'),
(3, 'Công nghệ thông tin', 25, 'Chi bộ Công nghệ thông tin'),
(5, 'Tổ chức và Quản trị', 0, 'Chi bộ Tổ chức và Quản trị'),
(6, 'Ô tô', 0, 'Chi bộ Ô tô'),
(7, 'May và thời trang', 0, 'Chi bộ May và thời trang'),
(8, 'Kinh tế', 0, 'Chi bộ Kinh tế'),
(9, 'Du lịch ngoại ngữ', 0, 'Chi bộ Du lịch ngoại ngữ'),
(10, 'Luật và Giáo dục đại cương ', 0, 'Chi bộ Luật và Giáo dục đại cương '),
(11, 'Công tác sinh viên', 0, 'Chi bộ Công tác sinh viên'),
(12, 'Kế hoạch và tài chính', 0, 'Chi bộ Kế hoạch và tài chính'),
(13, 'Quản lý chất lượng', 0, 'Chi bộ Quản lý chất lượng'),
(14, 'Quản lý khoa học và hợp tác quốc tế', 0, 'Chi bộ Quản lý khoa học và hợp tác quốc tế'),
(15, 'Giáo dục nghề nghiệp', 0, 'Chi bộ Giáo dục nghề nghiệp'),
(16, 'Nguyễn Thị Duệ', 0, 'Chi bộ Nguyễn Thị Duệ'),
(17, 'Đào tạo và tuyển sinh', 0, 'Chi bộ Đào tạo và tuyển sinh');

-- --------------------------------------------------------

--
-- Table structure for table `hosodang`
--

CREATE TABLE `hosodang` (
  `Id` int(11) NOT NULL,
  `ChiBoId` int(11) NOT NULL DEFAULT 0,
  `HoTen` varchar(150) NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Avatar` varchar(550) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `HoKhau` varchar(200) DEFAULT NULL,
  `NguyenQuan` varchar(200) DEFAULT NULL,
  `NgayKetNap` date DEFAULT NULL,
  `NgayChinhThuc` date DEFAULT NULL,
  `SoTheDang` varchar(8) DEFAULT NULL,
  `NgayChuyenSH` date DEFAULT NULL,
  `NoiChuyenSH` varchar(200) DEFAULT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hosodang`
--

INSERT INTO `hosodang` (`Id`, `ChiBoId`, `HoTen`, `GioiTinh`, `NgaySinh`, `Avatar`, `DienThoai`, `Email`, `HoKhau`, `NguyenQuan`, `NgayKetNap`, `NgayChinhThuc`, `SoTheDang`, `NgayChuyenSH`, `NoiChuyenSH`, `TrangThai`) VALUES
(25, 3, 'Phạm Văn Kiên', 'Nam', '1979-11-21', 'avatar_name25-.jpg', '0986362233', 'kienpvdesign@gmail.com', 'Hai Duong', '', '2013-10-31', '2014-10-31', '08107941', '0000-00-00', '', 0),
(30, 3, 'Phạm Thị Tâm', 'Nam', '1987-02-10', NULL, '0987654321', 'thptnguyenthidue@gmail.com', 'Hải Dương', 'Ninh Giang, Hải Dương', '2022-12-27', '2023-12-27', '08230724', '0000-00-00', '', 1),
(31, 3, 'Hoàng Thị An', 'Nữ', '1987-09-19', NULL, '0984420897', 'HTAn@saodo.edu.vn', 'Cộng Hòa, Chí Linh, Hải Dương', 'Cộng Hòa, Chí Linh, Hải Dương', '2014-06-25', '2015-06-25', '08109923', '0000-00-00', '', 0),
(32, 3, 'Phạm Thị Hường', 'Nữ', '1981-03-08', NULL, '0972306806', 'PTHuong@saodo.edu.vn	', '', 'An Lễ, Quỳnh Phụ, Thái Bình', '2008-08-19', '2009-08-19', '08093152', '0000-00-00', '', 0),
(33, 3, 'Vũ Bảo Tạo', 'Nam', '1979-03-17', NULL, '0912519702', '', 'Linh Khê, Thanh Quang, Nam Sách, Hải Dương', 'Linh Khê, Thanh Quang, Nam Sách, Hải Dương', '2005-01-29', '2006-01-29', '08085254', '0000-00-00', '', 0),
(34, 3, 'Nguyễn Thị Thu', 'Nữ', '1983-12-22', NULL, '0977162855', '', 'P. Sao Đỏ, T.P Chí Linh, T. Hải Dương', 'P. Phả Lại, T.P Chí Linh, T. Hải Dương', '2018-04-22', '2019-04-22', '08131653', '0000-00-00', '', 0),
(35, 3, 'Bùi Hoàng Nhật', 'Nam', '2002-06-24', NULL, '', '', '', '', '2023-02-03', '2024-02-03', '08130725', '0000-00-00', '', 0),
(36, 3, 'Nguyễn Đức Trường', 'Nam', '2003-12-01', NULL, '', '', '', '', '2024-01-08', '2025-01-20', '', '0000-00-00', '', 0),
(37, 3, 'Vũ Thị Bắc', 'Nữ', '2003-06-11', NULL, '', '', '', '', '2024-01-08', '0000-00-00', '', '2025-05-06', 'Đảng bộ tập đoàn KHKT Hồng Hải', 1),
(38, 3, 'Vũ Thị Loan', 'Nữ', '2002-10-08', NULL, '', '', '', '', '2024-01-08', '0000-00-00', '', '0000-00-00', '', 0),
(39, 3, 'Phan Hải Yến', 'Nữ', '2003-07-04', NULL, '', '', '', '', '2024-01-08', '0000-00-00', '', '0000-00-00', '', 0),
(40, 3, 'Nguyễn Tuấn Anh', 'Nam', '2002-04-15', NULL, '', '', '', '', '2024-01-08', '0000-00-00', '', '0000-00-00', '', 0),
(41, 3, 'Lý Lương Tuấn', 'Nam', '2002-04-19', NULL, '', '', '', '', '2024-01-08', '0000-00-00', '', '0000-00-00', '', 0),
(42, 3, 'Triệu Tuấn Anh', 'Nam', '2003-01-27', NULL, '', '', '', '', '2025-02-16', '0000-00-00', '', '0000-00-00', '', 0),
(43, 3, 'Nguyễn Chí Thọ', 'Nam', '2003-09-04', NULL, '', '', '', '', '2025-02-16', '0000-00-00', '', '0000-00-00', '', 0),
(45, 5, 'Nguyễn Minh Tuấn', 'Nam', '1977-04-25', NULL, '', '', '', 'Thượng Quận, Kinh Môn, Hải Dương', '2006-08-14', '2007-08-14', '', '0000-00-00', '', 0),
(46, 5, 'Trần Hải Đăng', 'Nam', '1982-12-08', NULL, '', '', '', 'An Sơn, Nam Sách, Hải Dương', '2008-11-20', '2009-11-20', '08093875', '0000-00-00', '', 0),
(47, 5, 'Vũ Hồng Sơn', 'Nam', '1977-09-20', NULL, '', '', '', 'Đông Hoàng, Tiền Hải, Thái Bình', '2011-09-19', '2012-09-19', '08101457', '0000-00-00', '', 0),
(48, 5, 'Lê Thị Huyền', 'Nữ', '1987-05-26', NULL, '', '', '', 'Vĩnh Yên, Vĩnh Lộc, Thanh Hóa', '2018-01-21', '2019-01-21', '08120625', '0000-00-00', '', 0),
(49, 5, 'Nguyễn Tiến Đạt', 'Nam', '1970-10-09', NULL, '', '', '', 'Trưng Trắc, Văn Lâm, Hưng Yên', '2000-05-31', '2001-05-31', '', '0000-00-00', '', 0),
(50, 5, 'Nguyễn Thị Trang', 'Nữ', '1986-12-25', NULL, '', '', '', 'Thượng Quận, Kinh Môn, Hải Dương', '2022-12-30', '2023-12-30', '08120734', '0000-00-00', '', 0),
(51, 5, 'Nguyễn Ngọc Đảm', 'Nam', '1985-07-20', NULL, '', '', '', 'Hiệp Hòa, Yên Hưng, Quảng Ninh', '2016-12-21', '2017-12-24', '', '0000-00-00', '', 0),
(52, 5, 'Hoàng Thị Thu Hiền', 'Nữ', '1985-01-24', NULL, '', '', '', 'Hòa Bình, Vĩnh Bảo, Hải Phòng', '2020-12-15', '2021-12-15', '', '0000-00-00', '', 0),
(53, 5, 'Bạch Huy Thắng', 'Nam', '1972-05-02', NULL, '', '', '', 'Liên Chân, Vĩnh Lạc, Vĩnh Phú', '2001-02-09', '2002-02-09', '', '0000-00-00', '', 0),
(54, 5, 'Nguyễn Thị Hiền', 'Nữ', '1986-01-10', NULL, '', '', '', 'Lê Ninh, Kinh Môn, Hải Dương', '2022-12-30', '2023-12-30', '08130735', '0000-00-00', '', 0),
(55, 5, 'Chu Thị Liên', 'Nữ', '1983-09-20', NULL, '', '', '', 'Nếnh, Việt Yên, Bắc Giang', '2022-12-30', '2023-12-30', '08130733', '0000-00-00', '', 0),
(56, 5, 'Nguyễn Thị Hà', 'Nữ', '1988-01-26', NULL, '', '', '', 'Hiệp Hòa, Kinh Môn, Hải Dương', '2023-07-20', '2024-07-20', '08130787', '0000-00-00', '', 0),
(57, 5, 'Đào Thị Kim Tuyến', 'Nữ', '1984-12-07', NULL, '', '', '', 'Bình Thanh, Kiến Xương, Thái Bình', '2014-06-25', '2015-06-25', '08109919', '0000-00-00', '', 0),
(58, 5, 'Mạc Văn Trưởng', 'Nam', '1974-03-30', NULL, '', '', '', 'Chí Minh, Chí Linh, Hải Dương', '2002-09-10', '2003-09-10', '', '0000-00-00', '', 0),
(59, 5, 'Đinh Văn Nhượng', 'Nam', '1963-10-30', NULL, '', '', '', 'An Lễ, Quỳnh Phụ, Thái Bình', '1995-03-02', '1996-03-02', '', '0000-00-00', '', 0),
(60, 5, 'Nguyễn Thị Hồng Hoa', 'Nữ', '1980-10-16', NULL, '', '', '', 'Trung Thành, Vụ Bản, Nam Định', '2005-07-20', '2006-07-20', '', '0000-00-00', '', 0),
(61, 5, 'Hoàng Quốc Vũ', 'Nam', '2002-05-05', NULL, '', '', '', 'Lê Lợi, Chí Linh, Hải Dương', '2024-05-15', '0000-00-00', '', '0000-00-00', '', 0),
(62, 2, 'Nguyễn Văn Hinh', 'Nam', '2006-12-24', NULL, '', '', '', 'Tân Hưng, Lạng Giang, Bắc Giang', '2012-05-31', '2013-05-31', '08104677', '0000-00-00', '', 0),
(63, 2, 'Mạc Văn Giang', 'Nam', '1980-12-23', NULL, '', '', '', 'Thất Hùng, Kinh Môn, Hải Dương', '2016-02-24', '2017-12-24', '08114939', '0000-00-00', '', 0),
(64, 2, 'Đào Văn Kiên', 'Nam', '1976-08-01', NULL, '', '', '', 'Quỳnh Thọ, Quỳnh Phụ, Thái Bình', '2006-01-06', '2007-01-06', '08086973', '0000-00-00', '', 0),
(65, 2, 'Nguyễn Danh Đạo', 'Nam', '1980-09-22', NULL, '', '', '', 'Thanh Hải, Thanh Hà, Hải Dương', '2011-06-04', '2012-06-04', '08100284', '0000-00-00', '', 0),
(66, 2, 'Nguyễn Thị Liễu', 'Nữ', '1984-11-29', NULL, '', '', '', 'Cộng Hòa, Chí Linh, Hải Dương', '2014-11-25', '2015-11-25', '08110640', '0000-00-00', '', 0),
(67, 2, 'Mạc Thị Nguyên', 'Nữ', '1984-10-02', NULL, '', '', '', 'An Phụ, Kinh Môn, Hải Dương', '2016-08-10', '2017-08-10', '08116285', '0000-00-00', '', 0),
(68, 2, 'Vũ Hoa Kỳ', 'Nam', '1980-11-27', NULL, '', '', '', 'TT Văn Giang, Văn Giang, Hưng Yên', '2010-03-30', '2011-03-30', '08097927', '0000-00-00', '', 0),
(69, 2, 'Trịnh Văn Cường', 'Nam', '1977-09-20', NULL, '', '', '', 'Vĩnh Yên, Vĩnh Lộc, Thanh Hóa', '2022-07-20', '2023-07-20', '08130785', '0000-00-00', '', 0),
(70, 2, 'Nguyễn Hữu Chấn', 'Nam', '1981-01-01', NULL, '', '', '', 'Quỳnh Hội, Quỳnh Phụ, Thái Bình', '2012-04-25', '2013-04-25', '08103087', '0000-00-00', '', 0),
(71, 2, 'Dương Thị Hà', 'Nữ', '1985-04-20', NULL, '', '', '', 'An Lạc, Chí Linh, Hải Dương', '2023-10-25', '2024-10-25', '08131805', '0000-00-00', '', 0),
(72, 11, 'Nguyễn Thị Kim Nguyên', 'Nữ', '1974-02-07', NULL, '', '', '', 'Quyết Thắng, Thanh Hà, Hải Dương', '1998-09-24', '1999-09-24', '', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hosodang_files`
--

CREATE TABLE `hosodang_files` (
  `Id` int(11) NOT NULL,
  `HoSoId` int(11) NOT NULL,
  `File` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hosodang_files`
--

INSERT INTO `hosodang_files` (`Id`, `HoSoId`, `File`) VALUES
(13, 30, '30-1746494256.docx'),
(14, 25, '25-1746494318.jpg'),
(15, 30, '30-1746494501.jpg'),
(16, 36, '36-1747792385.docx'),
(17, 37, '37-1747792517.docx'),
(18, 25, '25-1749084851.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `khenthuong`
--

CREATE TABLE `khenthuong` (
  `Id` int(11) NOT NULL,
  `HoSoId` int(11) NOT NULL,
  `Nam` varchar(4) NOT NULL,
  `LyDo` varchar(250) NOT NULL,
  `File` varchar(100) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `khenthuong`
--

INSERT INTO `khenthuong` (`Id`, `HoSoId`, `Nam`, `LyDo`, `File`, `GhiChu`) VALUES
(2, 25, '2025', 'khen thưởng', '2-1747690385.jpg', 'khen thưởng'),
(3, 33, '2025', 'Bằng khen của Bộ trưởng Bộ công thương', '3-1747796188.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `kyluat`
--

CREATE TABLE `kyluat` (
  `Id` int(11) NOT NULL,
  `HoSoId` int(11) NOT NULL,
  `Nam` varchar(4) NOT NULL,
  `LyDo` varchar(250) NOT NULL,
  `File` varchar(100) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kyluat`
--

INSERT INTO `kyluat` (`Id`, `HoSoId`, `Nam`, `LyDo`, `File`, `GhiChu`) VALUES
(1, 25, '2025', 'kỷ luật', '1-1747690738.jpg', 'kỷ luật');

-- --------------------------------------------------------

--
-- Table structure for table `nam`
--

CREATE TABLE `nam` (
  `Id` int(11) NOT NULL,
  `Nam` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nam`
--

INSERT INTO `nam` (`Id`, `Nam`) VALUES
(1, '2024'),
(2, '2025');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `HoSoId` int(11) NOT NULL,
  `Permission` varchar(250) DEFAULT NULL,
  `Disable` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Id`, `Username`, `Password`, `HoSoId`, `Permission`, `Disable`) VALUES
(25, '01007002', 'f67e5d5493c76ae25d10148d459bd781', 25, 'home, chibo, hosodang, khenthuong, kyluat, taikhoan, thongbao, vanban, vanbannhom, xeploai', 0),
(31, '01007033', '3e279ac4b843cdaa87dcf3b4d634fbeb', 31, 'home, hosodang, khenthuong, kyluat', 0),
(32, '01007003', 'd0095cda4f704addbe5138d1ebf96dea', 32, 'home, chibo, hosodang, khenthuong, kyluat, taikhoan, thongbao, vanban, vanbannhom, xeploai', 0),
(33, '01007027', 'cc9d921f805aa40df41b17f63f67e03c', 33, NULL, 0),
(34, '01007024', '32cf9d835c4dc0807bd6ceb11c0dbf02', 34, 'home, chibo, hosodang', 0),
(35, '01021007', '9a10a0f10968c0f2238eab147565e2e9', 30, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `Id` int(11) NOT NULL,
  `ThongBao` text NOT NULL,
  `NguoiTao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`Id`, `ThongBao`, `NguoiTao`) VALUES
(1, 'Thực hiện quy trình giới thiệu nhân sự tham gia cấp uỷ và các chức danh chủ chốt nhiệm kỳ 2025 - 2030', '01007002'),
(4, '30 - Thông báo vv giao chỉ tiêu kết nạp đảng viên năm 2025 (05-03-2025)', '01007003'),
(5, '32 - Tb thu nộp Đảng phí quý I.2025 (20-03-2025)', '01007003');

-- --------------------------------------------------------

--
-- Table structure for table `thongbao_files`
--

CREATE TABLE `thongbao_files` (
  `Id` int(11) NOT NULL,
  `ThongBaoId` int(11) NOT NULL,
  `File` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thongbao_files`
--

INSERT INTO `thongbao_files` (`Id`, `ThongBaoId`, `File`) VALUES
(1, 1, '1-1747692029.jpg'),
(3, 1, '1-1747692124.jpg'),
(6, 4, '4-1747794610.pdf'),
(7, 5, '5-1747794639.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `vanban`
--

CREATE TABLE `vanban` (
  `Id` int(11) NOT NULL,
  `NhomVBId` int(11) NOT NULL,
  `TenVB` varchar(250) DEFAULT NULL,
  `NgayTao` DATE DEFAULT CURRENT_TIMESTAMP,
  `NguoiTao` varchar(8) DEFAULT NULL,
  `HienThi` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vanban`
--

INSERT INTO `vanban` (`Id`, `NhomVBId`, `TenVB`, `NgayTao`, `NguoiTao`, `HienThi`) VALUES
(1, 1, '64 - KH tổ chức Đại hội Đảng bộ Trường Đại học Sao Đỏ (05-05-2025)', '2025-05-01', '01007003', 1),
(2, 1, '44 - QĐ thành lập BCĐ thực hiện NQ 57-NQ/TW (01-04-2025)', '2025-05-02', '01007003', 1),
(3, 1, '35 - TB triệu tập lớp nhận thức về đảng đợt 2. 2025 (06-05-2025)', '2025-05-05', '01007003', 1),
(5, 1, '43 - QĐ đổi tên chi bộ Luật&GDDC (01-04-2025)', '2025-05-21', '01007003', 1),
(6, 1, '34 - TB triệu tập lớp bồi dưỡng đảng viên mới năm 2025 (22-04-2025)', '2025-05-21', '01007003', 1),
(7, 1, '75 - Báo cáo công tác Đảng tháng 4, phương hướng nhiệm vụ tháng 5 (29-04-2025)', '2025-05-21', '01007003', 1),
(8, 1, '375 - NQ BCH Đảng uỷ tháng 5 (29-04-2025)', '2025-05-21', '01007003', 1),
(9, 1, '33 - TB học lớp bồi dưỡng nhận thức đảng, đảng viên mới đợt 2 năm 2025 (14-04-2025)', '2025-05-21', '01007003', 1),
(10, 1, ' 61 - KH kiểm tra ĐU quý II.QLCL (14-04-2025)', '2025-05-21', '01007003', 1),
(11, 1, '45 - QĐ kiểm tra ĐU quý II. QLCL (14-04-2025)', '2025-05-21', '01007003', 1),
(12, 1, '74 - Báo cáo công tác Đảng quý I.2025 (31-03-2025)', '2025-05-21', '01007003', 1),
(13, 1, '372 - Nghị quyết công tác Đảng quý I.2025 (31-03-2025)', '2025-05-21', '01007003', 1),
(14, 1, '59 - Kế hoạch phòng, chống tham nhũng tiêu cực năm 2025 (27-02-2025)', '2025-05-21', '01007003', 1),
(15, 1, '360 - NQ tăng cường công tác phòng, chống tham nhũng tiêu cực năm 2025 (17-01-2025)', '2025-05-21', '01007003', 1),
(16, 1, '42 - Quyết định kiện toàn BCĐ phòng, chống tham nhũng tiêu cực 2025 (20-02-2025)', '2025-05-21', '01007003', 1),
(19, 2, 'Hướng dẫn một số vấn đề cụ thể thi hành điều lệ Đảng', '2025-05-21', '01007003', 1),
(20, 2, 'Quy định về thi hành điều lệ Đảng', '2025-05-21', '01007003', 1),
(21, 2, 'Điều lệ Đảng cộng sản Việt Nam', '2025-05-21', '01007003', 1),
(22, 4, 'Biểu số 1-BTCTW (Thống kê tăng, giảm đảng viên)', '2025-05-22', '01007033', 1),
(23, 4, 'Biểu số 2-BTCTW (Thống kê đảng viên mới kết nạp)', '2025-05-22', '01007033', 1),
(24, 4, 'Biểu số 2B-BTCTW (Thống kê đảng viên mới kết nạp theo dân tộc, tôn giáo)', '2025-05-22', '01007033', 1),
(25, 4, 'Biểu số 3-BTCTW (Thống kê đội ngũ đảng viên)', '2025-05-22', '01007033', 1),
(26, 4, 'Biểu số 3-BTCTW (Thống kê đảng viên chia theo dân tộc và trong các tôn giáo)	', '2025-05-22', '01007033', 1),
(27, 4, 'Biểu số 5 - BTCTW (Thống kê tổ chức đảng và đảng viên trong các loại hình cơ sở)', '2025-05-22', '01007033', 1),
(29, 4, 'Biểu số 7- BTCTW	(Thống kê về nghiệp vụ công tác đảng viên)', '2025-05-22', '01007033', 1),
(30, 4, 'Biểu số 8C-BTCTW (Thống kê tổ chức bộ máy và cấp phó các cơ quan...)', '2025-05-22', '01007033', 1),
(31, 4, 'Biểu số 9- BTCTW (Thống kê cán bộ lãnh đạo, quản lý các cấp)', '2025-05-22', '01007033', 1),
(32, 4, 'Biểu số 10-BTCTW (Thống kê kết quả đào tạo, bồi dưỡng cán bộ)', '2025-05-22', '01007033', 1),
(33, 4, 'Biểu số 11-BTCTW (Thống kê kết quả luân chuyển cán bộ)', '2025-05-22', '01007033', 1),
(34, 4, 'Biểu số 12-BTCTW (Thống kê kết quả quy hoạch cán bộ các cấp)', '2025-05-22', '01007033', 1),
(35, 4, 'Biểu số 8A-BTCTW (Thống kê tình hình người hưởng lương, phụ cấp ngân sách...)  ', '2025-05-22', '01007033', 1),
(36, 4, 'Biểu số 8B-BTCTW (Thống kê phân tích chất lượng người hưởng lương ngân sách...)	', '2025-05-22', '01007033', 1),
(37, 4, 'Biểu số 6 - BTCTW (Thống kê kết quả đánh giá, xếp loại chất lượng...)				', '2025-05-22', '01007033', 1),
(38, 4, ' Biểu số 13-BTCTW (Thống kê số lượt bổ nhiệm, giới thiệu ứng cử)', '2025-05-22', '01007033', 1),
(39, 4, 'Hướng dẫn sử dụng các biểu mẫu thống kê', '2025-05-22', '01007033', 1),
(40, 2, 'Quy định thi hành Điều lệ Đảng', '2025-05-22', '01007033', 1),
(42, 1, 'TB triệu tập lớp nhận thức về đảng đợt 2. 2025', '2025-05-22', '01007033', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vanbannhom`
--

CREATE TABLE `vanbannhom` (
  `Id` int(11) NOT NULL,
  `TenNhom` varchar(100) NOT NULL,
  `MoTa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vanbannhom`
--

INSERT INTO `vanbannhom` (`Id`, `TenNhom`, `MoTa`) VALUES
(1, 'Văn bản nội bộ', 'Văn bản nội bộ trong trường'),
(2, 'Văn bản cấp trên', 'Văn bản từ cấp trên'),
(4, 'Biểu mẫu', 'Các biểu thống kê cơ bản về công tác Tổ chức xây dựng Đảng theo hướng dẫn của Ban Tổ chức Trung ương.');

-- --------------------------------------------------------

--
-- Table structure for table `vanban_files`
--

CREATE TABLE `vanban_files` (
  `Id` int(11) NOT NULL,
  `VanBanId` int(11) NOT NULL,
  `File` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vanban_files`
--

INSERT INTO `vanban_files` (`Id`, `VanBanId`, `File`) VALUES
(7, 3, '3-1747793672.pdf'),
(8, 1, '1-1747793712.pdf'),
(9, 2, '2-1747793758.pdf'),
(10, 5, '5-1747793788.pdf'),
(11, 6, '6-1747793811.pdf'),
(12, 7, '7-1747793833.pdf'),
(13, 8, '8-1747793858.pdf'),
(14, 9, '9-1747793943.pdf'),
(15, 10, '10-1747793956.pdf'),
(16, 11, '11-1747793990.pdf'),
(17, 12, '12-1747794014.pdf'),
(18, 13, '13-1747794042.pdf'),
(19, 14, '14-1747794065.pdf'),
(20, 15, '15-1747794092.pdf'),
(21, 16, '16-1747794113.pdf'),
(24, 19, '19-1747794372.doc'),
(25, 20, '20-1747794412.doc'),
(26, 21, '21-1747794459.doc'),
(27, 22, '22-1747880101.xlsx'),
(28, 23, '23-1747880157.xlsx'),
(29, 24, '24-1747880231.xlsx'),
(30, 25, '25-1747880280.xlsx'),
(31, 26, '26-1747880455.xlsx'),
(32, 27, '27-1747880513.xlsx'),
(34, 29, '29-1747880652.xlsx'),
(36, 31, '31-1747880813.xlsx'),
(37, 32, '32-1747880871.xlsx'),
(38, 33, '33-1747880917.xlsx'),
(39, 34, '34-1747880980.xlsx'),
(40, 30, '30-1747881245.xls'),
(41, 35, '35-1747881349.xls'),
(42, 36, '36-1747881452.xls'),
(43, 37, '37-1747881582.xlsx'),
(44, 38, '38-1747881657.xlsx'),
(45, 39, '39-1747881705.docx'),
(46, 40, '40-1747882983.pdf'),
(47, 42, '42-1747883461.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `xeploai`
--

CREATE TABLE `xeploai` (
  `Id` int(11) NOT NULL,
  `HoSoId` int(11) NOT NULL,
  `Nam` varchar(4) NOT NULL,
  `CBXepLoai` varchar(6) NOT NULL,
  `DUXepLoai` varchar(6) DEFAULT NULL,
  `NguoiTao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `xeploai`
--

INSERT INTO `xeploai` (`Id`, `HoSoId`, `Nam`, `CBXepLoai`, `DUXepLoai`, `NguoiTao`) VALUES
(1, 25, '2024', 'HTXSNV', 'HTXSNV', '01007002'),
(3, 25, '2025', 'HTXSNV', 'HTTNV', '01007002'),
(4, 30, '2025', 'HTXSNV', '', '01007002'),
(10, 31, '2024', 'HTNV', 'HTNV', '01007002'),
(11, 32, '2024', 'HTTNV', 'HTTNV', '01007002'),
(12, 33, '2024', 'HTTNV', 'HTTNV', '01007002'),
(13, 34, '2024', 'HTTNV', 'HTTNV', '01007002'),
(14, 35, '2024', 'HTNV', 'HTNV', '01007002'),
(15, 36, '2024', 'HTNV', 'HTNV', '01007002'),
(16, 37, '2024', 'HTNV', 'HTNV', '01007002'),
(17, 38, '2024', 'HTNV', 'HTNV', '01007002'),
(18, 39, '2024', 'HTNV', 'HTNV', '01007002'),
(19, 40, '2024', 'HTNV', 'HTNV', '01007002'),
(20, 41, '2024', 'HTTNV', 'HTNV', '01007002'),
(21, 42, '2024', 'HTNV', 'KHTNV', '01007002'),
(22, 43, '2024', 'KHTNV', 'KHTNV', '01007002'),
(23, 30, '2024', 'HTTNV', 'HTTNV', '01007002');

-- --------------------------------------------------------

--
-- Table structure for table `xeploai_files`
--

CREATE TABLE `xeploai_files` (
  `Id` int(11) NOT NULL,
  `Nam` varchar(4) NOT NULL,
  `File` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `xeploai_files`
--

INSERT INTO `xeploai_files` (`Id`, `Nam`, `File`) VALUES
(10, '2024', '2024-1749546494.docx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chibo`
--
ALTER TABLE `chibo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hosodang`
--
ALTER TABLE `hosodang`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_User_Role` (`ChiBoId`);

--
-- Indexes for table `hosodang_files`
--
ALTER TABLE `hosodang_files`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `HoSoId` (`HoSoId`);

--
-- Indexes for table `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `kyluat`
--
ALTER TABLE `kyluat`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nam`
--
ALTER TABLE `nam`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `hosodang_taikhoan` (`HoSoId`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `thongbao_files`
--
ALTER TABLE `thongbao_files`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vanban`
--
ALTER TABLE `vanban`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `VBNhomId` (`NhomVBId`);

--
-- Indexes for table `vanbannhom`
--
ALTER TABLE `vanbannhom`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vanban_files`
--
ALTER TABLE `vanban_files`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `VanBanId` (`VanBanId`);

--
-- Indexes for table `xeploai`
--
ALTER TABLE `xeploai`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `xeploai_files`
--
ALTER TABLE `xeploai_files`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chibo`
--
ALTER TABLE `chibo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hosodang`
--
ALTER TABLE `hosodang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `hosodang_files`
--
ALTER TABLE `hosodang_files`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `khenthuong`
--
ALTER TABLE `khenthuong`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kyluat`
--
ALTER TABLE `kyluat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nam`
--
ALTER TABLE `nam`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2026;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thongbao_files`
--
ALTER TABLE `thongbao_files`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vanban`
--
ALTER TABLE `vanban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `vanbannhom`
--
ALTER TABLE `vanbannhom`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vanban_files`
--
ALTER TABLE `vanban_files`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `xeploai`
--
ALTER TABLE `xeploai`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `xeploai_files`
--
ALTER TABLE `xeploai_files`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hosodang`
--
ALTER TABLE `hosodang`
  ADD CONSTRAINT `hosodang_ibfk_1` FOREIGN KEY (`ChiBoId`) REFERENCES `chibo` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hosodang_files`
--
ALTER TABLE `hosodang_files`
  ADD CONSTRAINT `hosodang_files_ibfk_1` FOREIGN KEY (`HoSoId`) REFERENCES `hosodang` (`Id`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `hosodang_taikhoan` FOREIGN KEY (`HoSoId`) REFERENCES `hosodang` (`Id`);

--
-- Constraints for table `vanban`
--
ALTER TABLE `vanban`
  ADD CONSTRAINT `vanban_ibfk_1` FOREIGN KEY (`NhomVBId`) REFERENCES `vanbannhom` (`Id`);

--
-- Constraints for table `vanban_files`
--
ALTER TABLE `vanban_files`
  ADD CONSTRAINT `vanban_files_ibfk_1` FOREIGN KEY (`VanBanId`) REFERENCES `vanban` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
