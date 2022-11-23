-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 05:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbanthucung`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `calculations_for_pets` (IN `pid` VARCHAR(9), IN `sid` VARCHAR(9))  NO SQL BEGIN
DECLARE 
 cpid ,csid int DEFAULT 0;
set cpid=(select cost from pets where pet_id=pid);
set csid=(select total from sales_details where sd_id=sid);
set csid=csid+cpid;
update sales_details set total=csid where sd_id=sid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `calculations_for_product` (IN `ppid` VARCHAR(9), IN `sid` VARCHAR(9), IN `qnty` INT(11))  NO SQL BEGIN
DECLARE 
 cppid ,csid int DEFAULT 0;
set cppid=(select cost from pet_products where pp_id=ppid);
set csid=(select total from sales_details where sd_id=sid);
set csid=csid+qnty*cppid;
update sales_details set total=csid where sd_id=sid;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `MaHD` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaThuCung` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `MaHD` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayHD` date NOT NULL,
  `MaKH` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ThanhTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenKH` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `TenKH`, `SDT`, `Email`, `Password`) VALUES
('KH001', 'Phan Ngọc Thịnh', '0349054106', 'phanthinh106@gmail.com', '12345678'),
('KH002', 'Ngoc Huy', '123456789', 'huynguyen3827@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `MaLoai` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenLoai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`MaLoai`, `TenLoai`) VALUES
('PET001', 'Chó'),
('PET002', 'Mèo'),
('PET003', 'Bò sát');

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `MaNCC` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenNCC` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiNCC` varchar(100) NOT NULL,
  `SDTNCC` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`MaNCC`, `TenNCC`, `DiaChiNCC`, `SDTNCC`) VALUES
('NCC001', 'Nhà cung cấp 1', '01 - Nguyễn Khuyến - Khánh Hòa', '0123456789'),
('NCC002', 'Nhà cung cấp 2', '02 - Nguyễn Khuyến - Khánh Hòa', '0123456987'),
('NCC003', 'Nhà cung cấp 1', '03 - Nguyễn Khuyến - Khánh Hòa', '0123456879');

-- --------------------------------------------------------

--
-- Table structure for table `thu_cung`
--

CREATE TABLE `thu_cung` (
  `MaThuCung` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tuoi` tinyint(4) NOT NULL,
  `MauSac` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` double NOT NULL,
  `MaNCC` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thu_cung`
--

INSERT INTO `thu_cung` (`MaThuCung`, `Ten`, `Tuoi`, `MauSac`, `HinhAnh`, `DonGia`, `MaNCC`, `MaLoai`) VALUES
('TC001', 'Chó vàng', 23, 'Đỏ', 'chovang.jpg', 1000, 'NCC001', 'PET002'),
('TC002', 'Mèo Anh lông ngắn', 1, 'Bạc', 'ecat.jpg', 300, 'NCC001', 'PET002'),
('TC004', 'Komodo Dragon', 1, 'Đen', 'komodo.jpg', 600, 'NCC001', 'PET003'),
('TC005', 'Chó chăn cừu', 1, 'Vàng', 'chochancuu.jpg', 400, 'NCC001', 'PET001'),
('TC009', 'Shiba Inuyasha', 89, 'Vàng', 'shiba.jpg', 400, 'NCC001', 'PET001'),
('TC015', 'Vàng Xanh ', 45, 'vàng', 'shiba.jpg', 44444, 'NCC002', 'PET002'),
('TC017', 'Mèo vui ', 21, 'Chó', 'cat_horray.jpg', 4003, 'NCC001', 'PET002'),
('TC020', 'Chihuahua', 21, 'Da trời', 'chihuahua.jpg', 343434, 'NCC001', 'PET001'),
('TC022', 'Alaska', 21, 'Da trời', 'alaska.jpg', 1000, 'NCC001', 'PET001'),
('TC023', 'Chó chăn cừu43 ', 12, 'Vàng2', 'albe_klee.jpg', 4000, 'NCC003', 'PET002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD PRIMARY KEY (`MaHD`,`MaThuCung`),
  ADD KEY `MaHD` (`MaHD`),
  ADD KEY `MaThuCung` (`MaThuCung`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `thu_cung`
--
ALTER TABLE `thu_cung`
  ADD PRIMARY KEY (`MaThuCung`),
  ADD KEY `MaLoai` (`MaLoai`),
  ADD KEY `MaNCC` (`MaNCC`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `ct_hoadon_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoa_don` (`MaHD`),
  ADD CONSTRAINT `ct_hoadon_ibfk_2` FOREIGN KEY (`MaThuCung`) REFERENCES `thu_cung` (`MaThuCung`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`);

--
-- Constraints for table `thu_cung`
--
ALTER TABLE `thu_cung`
  ADD CONSTRAINT `thu_cung_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`),
  ADD CONSTRAINT `thu_cung_ibfk_2` FOREIGN KEY (`MaNCC`) REFERENCES `nha_cung_cap` (`MaNCC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
