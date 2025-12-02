-- Migration: Thêm các tính năng quản lý hồ sơ đảng viên
-- Date: 2025

-- Bảng danh mục hồ sơ đảng viên (7 mục theo phụ lục 2 hướng dẫn số 12)
CREATE TABLE IF NOT EXISTS `hosodang_muc` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TenMuc` varchar(250) NOT NULL,
  `MoTa` text DEFAULT NULL,
  `ThuTu` int(11) DEFAULT 1,
  `HienThi` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Insert 7 mục hồ sơ cơ bản
INSERT INTO `hosodang_muc` (`Id`, `TenMuc`, `MoTa`, `ThuTu`, `HienThi`) VALUES
(1, 'Lý lịch đảng viên', 'Lý lịch đảng viên', 1, 1),
(2, 'Đơn xin vào Đảng', 'Đơn xin vào Đảng', 2, 1),
(3, 'Bản tự khai lý lịch', 'Bản tự khai lý lịch', 3, 1),
(4, 'Giấy khai sinh', 'Giấy khai sinh', 4, 1),
(5, 'Bằng tốt nghiệp', 'Bằng tốt nghiệp', 5, 1),
(6, 'Chứng minh nhân dân/Căn cước công dân', 'Chứng minh nhân dân/Căn cước công dân', 6, 1),
(7, 'Giấy chứng nhận sức khỏe', 'Giấy chứng nhận sức khỏe', 7, 1);

-- Bảng file hồ sơ theo từng mục và năm
CREATE TABLE IF NOT EXISTS `hosodang_files_muc` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HoSoId` int(11) NOT NULL,
  `MucId` int(11) NOT NULL,
  `Nam` varchar(4) DEFAULT NULL,
  `File` varchar(200) DEFAULT NULL,
  `TenFile` varchar(250) DEFAULT NULL,
  `NgayUpload` datetime DEFAULT CURRENT_TIMESTAMP,
  `NguoiUpload` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `HoSoId` (`HoSoId`),
  KEY `MucId` (`MucId`),
  CONSTRAINT `hosodang_files_muc_ibfk_1` FOREIGN KEY (`HoSoId`) REFERENCES `hosodang` (`Id`) ON DELETE CASCADE,
  CONSTRAINT `hosodang_files_muc_ibfk_2` FOREIGN KEY (`MucId`) REFERENCES `hosodang_muc` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Bảng hồ sơ theo năm (phiếu bổ sung lý lịch, kiểm điểm cuối năm, xác nhận cư trú)
CREATE TABLE IF NOT EXISTS `hosodang_nam` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HoSoId` int(11) NOT NULL,
  `Nam` varchar(4) NOT NULL,
  `PhieuBoSungLyLich` varchar(200) DEFAULT NULL,
  `KiemDiemCuoiNam` varchar(200) DEFAULT NULL,
  `XacNhanCuTru` varchar(200) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `HoSoId` (`HoSoId`),
  CONSTRAINT `hosodang_nam_ibfk_1` FOREIGN KEY (`HoSoId`) REFERENCES `hosodang` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Bảng duyệt hồ sơ (kết nạp, chuyển chính thức, chuyển sinh hoạt, xóa tên)
CREATE TABLE IF NOT EXISTS `hosodang_duyet` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HoSoId` int(11) NOT NULL,
  `LoaiDuyet` varchar(50) NOT NULL COMMENT 'ketnap, chuyenchinhthuc, chuyensinhhoat, xoaten',
  `TrangThai` tinyint(4) DEFAULT 0 COMMENT '0: Chờ duyệt, 1: Đã duyệt, 2: Từ chối',
  `FileHoSo` varchar(200) DEFAULT NULL,
  `NoiChuyenSH` varchar(200) DEFAULT NULL COMMENT 'Nơi chuyển sinh hoạt (nếu chuyển trong cùng đảng bộ)',
  `ChiBoMoiId` int(11) DEFAULT NULL COMMENT 'Chi bộ mới (nếu chuyển trong cùng đảng bộ)',
  `NgayGui` datetime DEFAULT CURRENT_TIMESTAMP,
  `NgayDuyet` datetime DEFAULT NULL,
  `NguoiGui` varchar(50) DEFAULT NULL,
  `NguoiDuyet` varchar(50) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `HoSoId` (`HoSoId`),
  KEY `ChiBoMoiId` (`ChiBoMoiId`),
  CONSTRAINT `hosodang_duyet_ibfk_1` FOREIGN KEY (`HoSoId`) REFERENCES `hosodang` (`Id`) ON DELETE CASCADE,
  CONSTRAINT `hosodang_duyet_ibfk_2` FOREIGN KEY (`ChiBoMoiId`) REFERENCES `chibo` (`Id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Bảng thông báo nhắc việc
CREATE TABLE IF NOT EXISTS `thongbao_nhacviec` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HoSoId` int(11) DEFAULT NULL,
  `LoaiNhac` varchar(50) NOT NULL COMMENT 'chuyensinhhoat, chuyenchinhthuc, ra truong',
  `NoiDung` text NOT NULL,
  `NgayNhac` date NOT NULL,
  `NgayHetHan` date DEFAULT NULL,
  `TrangThai` tinyint(4) DEFAULT 0 COMMENT '0: Chưa xử lý, 1: Đã xử lý',
  `NgayTao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `HoSoId` (`HoSoId`),
  CONSTRAINT `thongbao_nhacviec_ibfk_1` FOREIGN KEY (`HoSoId`) REFERENCES `hosodang` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Thêm các trường mới vào bảng hosodang (chạy từng lệnh riêng nếu cột đã tồn tại)
ALTER TABLE `hosodang` 
  ADD COLUMN `LoaiDangVien` varchar(20) DEFAULT NULL COMMENT 'GV: Giảng viên, VC: Viên chức, SV: Sinh viên';
ALTER TABLE `hosodang` 
  ADD COLUMN `TrangThaiDang` varchar(20) DEFAULT 'dubi' COMMENT 'chinhthuc: Chính thức, dubi: Dự bị';
ALTER TABLE `hosodang` 
  ADD COLUMN `DaCapTheDang` tinyint(1) DEFAULT 0 COMMENT '0: Chưa cấp, 1: Đã cấp';
ALTER TABLE `hosodang` 
  ADD COLUMN `NgayRaTruong` date DEFAULT NULL COMMENT 'Ngày ra trường (cho sinh viên)';

-- Thêm các trường mới vào bảng chibo để quản lý thống kê
ALTER TABLE `chibo`
  ADD COLUMN `PhoBiThu` int(11) DEFAULT 0 COMMENT 'Phó bí thư';
ALTER TABLE `chibo`
  ADD COLUMN `XepLoai` varchar(20) DEFAULT NULL COMMENT 'Xếp loại chi bộ';
ALTER TABLE `chibo`
  ADD COLUMN `KhenThuong` text DEFAULT NULL COMMENT 'Khen thưởng chi bộ';

-- Bảng xếp loại đảng bộ (file quyết định khen thưởng)
CREATE TABLE IF NOT EXISTS `dangbo_xeploai` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nam` varchar(4) NOT NULL,
  `FileQuyetDinh` varchar(200) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL,
  `NgayTao` datetime DEFAULT CURRENT_TIMESTAMP,
  `NguoiTao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Bảng theo dõi đảng viên (nhận xét của người theo dõi)
CREATE TABLE IF NOT EXISTS `hosodang_theodoi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HoSoId` int(11) NOT NULL,
  `NguoiTheoDoiId` int(11) NOT NULL COMMENT 'ID đảng viên theo dõi',
  `Nam` varchar(4) NOT NULL,
  `NhanXet` text DEFAULT NULL,
  `File` varchar(200) DEFAULT NULL,
  `NgayTao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `HoSoId` (`HoSoId`),
  KEY `NguoiTheoDoiId` (`NguoiTheoDoiId`),
  CONSTRAINT `hosodang_theodoi_ibfk_1` FOREIGN KEY (`HoSoId`) REFERENCES `hosodang` (`Id`) ON DELETE CASCADE,
  CONSTRAINT `hosodang_theodoi_ibfk_2` FOREIGN KEY (`NguoiTheoDoiId`) REFERENCES `hosodang` (`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Cập nhật bảng vanbannhom để thêm các nhóm mới
INSERT INTO `vanbannhom` (`Id`, `TenNhom`, `MoTa`) VALUES
(5, 'Văn bản mẫu', 'Văn bản mẫu (chia 7 mục)'),
(6, 'Văn bản Trung ương', 'Văn bản từ Trung ương'),
(7, 'Văn bản Thành ủy', 'Văn bản từ Thành ủy'),
(8, 'Văn bản Phường', 'Văn bản từ Phường')
ON DUPLICATE KEY UPDATE `TenNhom`=VALUES(`TenNhom`);

