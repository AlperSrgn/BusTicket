-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Mar 2024, 18:58:09
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `busticketci`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_access_menu`
--

CREATE TABLE `tbl_access_menu` (
  `kd_access_menu` int(11) DEFAULT NULL,
  `seviye_kod` int(11) DEFAULT NULL,
  `kd_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_access_menu`
--

INSERT INTO `tbl_access_menu` (`kd_access_menu`, `seviye_kod`, `kd_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(35) DEFAULT NULL,
  `username_admin` varchar(30) DEFAULT NULL,
  `password_admin` varchar(256) DEFAULT NULL,
  `img_admin` varchar(35) DEFAULT NULL,
  `email_admin` varchar(35) DEFAULT NULL,
  `level_admin` varchar(12) DEFAULT NULL,
  `status_admin` int(1) DEFAULT NULL,
  `date_create_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `img_admin`, `email_admin`, `level_admin`, `status_admin`, `date_create_admin`) VALUES
('ADM0001', 'Administrator', 'admin', '$2y$10$nvmCaXC4Ohua5eW4fFAMauISafgwvPsoRXVNnToZpbF4vWfBw.xvu', 'assets/backend/img/default.png', 'adm@gmail.com', '2', 1, '1552276812'),
('ADM0002', 'Second Admin', 'admin2', '$2y$10$ADbNVZYgiDi8SqGl1bB2NOgCufT2sK5v/T3BSZcIpFPVljDSb2S2K', 'assets/backend/img/default.png', 'cbahyu@gmail.com', '1', 1, '1552819095'),
('ADM0003', 'BS Owner', 'owner', '$2y$10$nvmCaXC4Ohua5eW4fFAMauISafgwvPsoRXVNnToZpbF4vWfBw.xvu', 'assets/backend/img/default.png', 'owner@gmail.com', '1', 1, '1552819095');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `kd_bank` varchar(50) NOT NULL,
  `nasabah_bank` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `nomrek_bank` varchar(50) DEFAULT NULL,
  `photo_bank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_bank`
--

INSERT INTO `tbl_bank` (`kd_bank`, `nasabah_bank`, `nama_bank`, `nomrek_bank`, `photo_bank`) VALUES
('BNK0001', 'DMB', 'Deniz Bank', '600000521', 'assets/frontend/img/bank/dominionbank.png'),
('BNK0002', 'BVB', 'Yapi Kredi Bankasi', '107556540', ''),
('BNK0003', 'CBK', 'Ziraat Bankasi', '800140000', 'assets/frontend/img/bank/cloverbank.png'),
('BNK0004', 'WVB', 'Vakifbank', '300124589', 'assets/frontend/img/bank/wvbank.png'),
('BNK0005', 'None', 'Halkbank', '100025001', '/assets/frontend/img/bank/celestialsbank.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `bus_id` varchar(50) NOT NULL,
  `bus_name` varchar(50) DEFAULT NULL,
  `plaka` varchar(50) DEFAULT NULL,
  `kapasite` int(13) DEFAULT NULL,
  `status_bus` int(1) DEFAULT NULL,
  `desc_bus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_bus`
--

INSERT INTO `tbl_bus` (`bus_id`, `bus_name`, `plaka`, `kapasite`, `status_bus`, `desc_bus`) VALUES
('B001', 'Mercedes-Benz Tourismo 2020', 'CA1100', 23, 1, '--'),
('B002', 'Mercedes-Benz Travego 2020', 'CA5656', 23, 1, '--'),
('B003', 'Mercedes-Benz Tourismo 2021', 'CA6969', 23, 1, '--'),
('B004', 'MAN Lion\'s Coach 2023', 'CA0007', 23, 1, '--'),
('B005', 'Temsa Safir Plus 2021', 'CA1234', 23, 1, '--'),
('B006', 'Mercedes-Benz Travego 2018', 'CA7777', 23, 1, '--'),
('B007', 'Temsa Safir Plus 2021', 'CA8520', 23, 1, NULL),
('B008', 'MAN Lion\'s Coach 2019', 'CA0258', 23, 1, NULL),
('B009', 'Temsa LD SB Plus', 'CASTR0', 23, 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_sefer`
--

CREATE TABLE `tbl_sefer` (
  `sefer_kodu` varchar(50) NOT NULL,
  `bus_id` varchar(50) DEFAULT NULL,
  `hedef_kod` varchar(50) DEFAULT NULL,
  `kalkis_kod` varchar(50) DEFAULT NULL,
  `sehir` varchar(50) DEFAULT NULL,
  `kalkis_saat` time DEFAULT NULL,
  `varis_saat` time DEFAULT NULL,
  `ucret` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_sefer`
--

INSERT INTO `tbl_sefer` (`sefer_kodu`, `bus_id`, `hedef_kod`, `kalkis_kod`, `sehir`, `kalkis_saat`, `varis_saat`, `ucret`) VALUES
('J0001', 'B001', 'TJ010', 'TJ019', 'Agocaster', '07:00:00', '11:15:00', '68'),
('J0002', 'B009', 'TJ008', 'TJ010', 'Crenton', '09:00:00', '01:50:00', '75'),
('J0003', 'B002', 'TJ012', 'TJ011', 'Yloumore', '11:30:00', '05:30:00', '89'),
('J0004', 'B001', 'TJ019', 'TJ007', 'Adenabert', '09:00:00', '10:30:00', '29'),
('J0005', 'B005', 'TJ014', 'TJ016', 'Wromburg', '08:00:00', '11:45:00', '40'),
('J0006', 'B001', 'TJ012', 'TJ010', 'Yloumore', '08:30:00', '04:15:00', '109'),
('J0007', 'B003', 'TJ017', 'TJ019', 'Inasbridge', '10:00:00', '11:00:00', '17'),
('J0008', 'B009', 'TJ009', 'TJ008', 'Rocvale', '08:45:00', '01:55:00', '47'),
('J0009', 'B002', 'TJ019', 'TJ007', 'Adenabert', '09:45:00', '11:45:00', '33'),
('J0010', 'B006', 'TJ013', 'TJ015', 'Prifpus', '07:30:00', '02:00:00', '64'),
('J0011', 'B001', 'TJ008', 'TJ016', 'Crenton', '09:00:00', '11:45:00', '28'),
('J0012', 'B005', 'TJ017', 'TJ012', 'Inasbridge', '08:45:00', '11:50:00', '40'),
('J0013', 'B003', 'TJ019', 'TJ014', 'Adenabert', '09:00:00', '04:15:00', '82'),
('J0014', 'B001', 'TJ017', 'TJ013', 'Inasbridge', '07:30:00', '06:00:00', '119'),
('J0015', 'B005', 'TJ019', 'TJ013', 'Adenabert', '10:45:00', '02:45:00', '40'),
('J0016', 'B005', 'TJ010', 'TJ013', 'Agocaster', '09:15:00', '01:00:00', '30'),
('J0017', 'B004', 'TJ017', 'TJ009', 'Inasbridge', '08:50:00', '01:55:00', '59'),
('J0018', 'B007', 'TJ017', 'TJ015', 'Inasbridge', '09:00:00', '11:30:00', '27'),
('J0019', 'B009', 'TJ019', 'TJ015', 'Adenabert', '08:30:00', '11:50:00', '39'),
('J0020', 'B009', 'TJ012', 'TJ015', 'Yloumore', '10:30:00', '03:10:00', '57'),
('J0021', 'B008', 'TJ016', 'TJ018', 'Sledmouth', '08:45:00', '01:00:00', '53'),
('J0022', 'B006', 'TJ019', 'TJ016', 'Adenabert', '06:30:00', '09:45:00', '38'),
('J0023', 'B002', 'TJ010', 'TJ018', 'Agocaster', '07:00:00', '11:55:00', '42'),
('J0024', 'B002', 'TJ016', 'TJ008', 'Sledmouth', '08:00:00', '10:30:00', '30'),
('J0025', 'B008', 'TJ007', 'TJ019', 'Ankara', '00:54:00', '03:54:00', '50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_onay`
--

CREATE TABLE `tbl_onay` (
  `onay_kodu` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `musteri_isim` varchar(50) DEFAULT NULL,
  `banka_adi` varchar(50) DEFAULT NULL,
  `hesap_no` varchar(50) DEFAULT NULL,
  `total_fiyat` varchar(50) DEFAULT NULL,
  `foto_dogrulama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_onay`
--

INSERT INTO `tbl_onay` (`onay_kodu`, `kd_order`, `musteri_isim`, `banka_adi`, `hesap_no`, `total_fiyat`, `foto_dogrulama`) VALUES
('KF0001', 'ORD00001', 'Ellen', 'New Leaf Bank', '197777450', '68', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0002', 'ORD00002', 'Andie Sand', 'RoyalCrown Bank', '701111458', '68', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0003', 'ORD00004', 'Delbert', 'New Leaf Bank', '1000008569', '40', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0004', 'ORD00005', 'Ruth Russo', 'Aurora', '001114547', '178', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0005', 'ORD00006', 'Carl J. Montoya', 'RoyalCrown Bank', '100045855', '68', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0006', 'ORD00007', 'Diana Kirk', 'Zenith Bank', '1007452', '40', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0007', 'ORD00008', 'Agnes Wonka', 'Aurora', '20145002', '59', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0008', 'ORD00009', 'Mary Smith', 'Zenith Bank', '0144520', '64', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0009', 'ORD00010', 'Thomas Ford', 'RoyalCrown Bank', '100045802', '82', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0010', 'ORD00012', 'Steven Bast', 'Zenith Bank', '10102257', '75', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0011', 'ORD00013', 'Will Williams', 'New Leaf Bank', '1000478', '75', '/assets/frontend/upload/payment/sample_image.jpg'),
('KF0012', 'ORD00015', 'ali', NULL, '132456', '50', '/assets/frontend/upload/payment/ORD00015.png'),
('KF0013', 'ORD00017', '', NULL, '-1', '50', '/assets/frontend/upload/payment/ORD000151.png'),
('KF0014', 'ORD00018', 'alper', 'New Leaf Bank', '121321', '50', '/assets/frontend/upload/payment/ORD000152.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_level`
--

CREATE TABLE `tbl_level` (
  `seviye_kod` int(11) NOT NULL,
  `seviye_ad` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_level`
--

INSERT INTO `tbl_level` (`seviye_kod`, `seviye_ad`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `kd_menu` int(11) NOT NULL,
  `menu_isim` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_menu`
--

INSERT INTO `tbl_menu` (`kd_menu`, `menu_isim`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `kd_bilet` varchar(50) DEFAULT NULL,
  `sefer_kodu` varchar(50) DEFAULT NULL,
  `kd_musteri` varchar(50) DEFAULT NULL,
  `kd_bank` varchar(50) DEFAULT NULL,
  `cikis_kodu` varchar(200) DEFAULT NULL,
  `sahip` varchar(50) DEFAULT NULL,
  `alim_tarih` varchar(50) DEFAULT NULL,
  `hareket_tarihi` varchar(50) DEFAULT NULL,
  `onay_isim` varchar(50) DEFAULT NULL,
  `yolcu_yas` varchar(50) DEFAULT NULL,
  `koltuk_no` varchar(50) DEFAULT NULL,
  `yolcu_kimlik_no` varchar(50) DEFAULT NULL,
  `yolcu_tel_no` varchar(50) DEFAULT NULL,
  `yolcu_adres` varchar(100) DEFAULT NULL,
  `yolcu_email` varchar(100) DEFAULT NULL,
  `gecerlilik_sure` varchar(50) DEFAULT NULL,
  `qrcode_order` varchar(100) DEFAULT NULL,
  `status_order` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `kd_order`, `kd_bilet`, `sefer_kodu`, `kd_musteri`, `kd_bank`, `cikis_kodu`, `sahip`, `alim_tarih`, `hareket_tarihi`, `onay_isim`, `yolcu_yas`, `koltuk_no`, `yolcu_kimlik_no`, `yolcu_tel_no`, `yolcu_adres`, `yolcu_email`, `gecerlilik_sure`, `qrcode_order`, `status_order`) VALUES
(25, 'ORD00001', 'TORD00001J00012022122915', 'J0001', 'PL0011', 'BNK0004', 'TJ019', 'Ellen', 'Wednesday, 28 December 2022, 20:01', '2022-12-29', 'Ellen', '31', '15', '101111458666', '7774545555', '554 Southern Cross St', 'ellen@mail.com', '29-12-2022 20:01:02', 'assets/frontend/upload/qrcode/ORD00001.png', '2'),
(26, 'ORD00002', 'TORD00002J00012022123018', 'J0001', 'PL0012', 'BNK0004', 'TJ019', 'Andie Sand', 'Wednesday, 28 December 2022, 20:49', '2022-12-30', 'Andie Sand', '30', '18', '201145896969', '7458885454', '114 Allace Avenue', 'andie@mail.com', '29-12-2022 20:49:15', 'assets/frontend/upload/qrcode/ORD00002.png', '2'),
(27, 'ORD00003', 'TORD00003J00052022123020', 'J0005', 'PL0013', 'BNK0002', 'TJ016', 'Robert C. Frazier', 'Thursday, 29 December 2022, 00:25', '2022-12-30', 'Robert C. Frazier', '26', '20', '60145CASTR02', '7778545699', '11 Haymond Rocks Road', 'robert@mail.com', '30-12-2022 00:25:58', 'assets/frontend/upload/qrcode/ORD00003.png', '1'),
(28, 'ORD00004', 'TORD00004J00052022123110', 'J0005', 'PL0014', 'BNK0003', 'TJ016', 'Delbert Rochelle', 'Friday, 30 December 2022, 00:06', '2022-12-31', 'Delbert Rochelle', '32', '10', '201010105580', '7850001414', '81 Single Street', 'delbert@mail.com', '31-12-2022 00:06:42', 'assets/frontend/upload/qrcode/ORD00004.png', '2'),
(29, 'ORD00005', 'TORD00005J0003202212318', 'J0003', 'PL0015', 'BNK0004', 'TJ011', 'Ruth Russo', 'Friday, 30 December 2022, 00:58', '2022-12-31', 'Ruth Russo', '32', '8', '012256669874', '7854545454', '17 Olive Street', 'ruth@mail.com', '31-12-2022 00:58:12', 'assets/frontend/upload/qrcode/ORD00005.png', '2'),
(30, 'ORD00005', 'TORD00005J0003202212319', 'J0003', 'PL0015', 'BNK0004', 'TJ011', 'Ruth Russo', 'Friday, 30 December 2022, 00:58', '2022-12-31', 'Jake Russo', '35', '9', '012256669874', '7854545454', '17 Olive Street', 'ruth@mail.com', '31-12-2022 00:58:12', 'assets/frontend/upload/qrcode/ORD00005.png', '2'),
(31, 'ORD00006', 'TORD00006J00012022123123', 'J0001', 'CA0016', 'BNK0002', 'TJ019', 'Carl J. Montoya', 'Friday, 30 December 2022, 15:27', '2022-12-31', 'Carl J. Montoya', '25', '23', '700014520019', '7350001455', '70 Cerullo Road', 'carl@mail.com', '31-12-2022 15:27:55', 'assets/frontend/upload/qrcode/ORD00006.png', '2'),
(32, 'ORD00007', 'TORD00007J0015202301023', 'J0015', 'CA0017', 'BNK0005', 'TJ013', 'Diana Kirk', 'Friday, 30 December 2022, 18:53', '2023-01-02', 'Diana Kirk', '39', '3', '30222245', '7450001010', '105 Fairmont Avenue', 'diana@mail.com', '31-12-2022 18:53:59', 'assets/frontend/upload/qrcode/ORD00007.png', '2'),
(33, 'ORD00008', 'TORD00008J00172023010122', 'J0017', 'CA0018', 'BNK0001', 'TJ009', 'Agnes Wonka', 'Friday, 30 December 2022, 19:06', '2023-01-01', 'Agnes Wonka', '41', '22', '3012552', '7312580010', '65 Cherry Ridge Drive', 'agnes@mail.com', '31-12-2022 19:06:33', 'assets/frontend/upload/qrcode/ORD00008.png', '2'),
(34, 'ORD00009', 'TORD00009J0010202212315', 'J0010', 'CA0019', 'BNK0001', 'TJ015', 'Mary Smith', 'Friday, 30 December 2022, 19:17', '2022-12-31', 'Mary Smith', '38', '5', '10102258', '7412555545', '43 Saint Francis Way', 'mary@mail.com', '31-12-2022 19:17:38', 'assets/frontend/upload/qrcode/ORD00009.png', '1'),
(35, 'ORD00010', 'TORD00010J00132023010514', 'J0013', 'CA0020', 'BNK0003', 'TJ014', 'Thomas Ford', 'Friday, 30 December 2022, 19:20', '2023-01-05', 'Thomas Ford', '34', '14', '1074450', '7140002569', '87 Hudson Street', 'thomasf@mail.com', '31-12-2022 19:20:23', 'assets/frontend/upload/qrcode/ORD00010.png', '2'),
(36, 'ORD00011', 'TORD00011J00162023011211', 'J0016', 'CA0021', 'BNK0005', 'TJ013', 'Shane Gustin', 'Friday, 30 December 2022, 22:34', '2023-01-12', 'Shane Gustin', '25', '11', '2014580', '7410140025', '27 Duff Avenue', 'shane@mail.com', '31-12-2022 22:34:09', 'assets/frontend/upload/qrcode/ORD00011.png', '1'),
(37, 'ORD00012', 'TORD00012J0002202301039', 'J0002', 'CA0022', 'BNK0002', 'TJ010', 'Steven Bast', 'Friday, 30 December 2022, 22:35', '2023-01-03', 'Steven Bast', '39', '9', '12000045', '4501450000', '58 Crestview Terrace', 'basteven@mail.com', '31-12-2022 22:35:57', 'assets/frontend/upload/qrcode/ORD00012.png', '1'),
(38, 'ORD00013', 'TORD00013J00022022123114', 'J0002', 'CA0023', 'BNK0004', 'TJ010', 'Will Williams', 'Friday, 30 December 2022, 23:40', '2022-12-31', 'Will Williams', '31', '14', '10145007', '7014698500', '47 Wilson Street', 'williams@mail.com', '31-12-2022 23:40:37', 'assets/frontend/upload/qrcode/ORD00013.png', '2'),
(39, 'ORD00014', 'TORD00014J00132023010420', 'J0013', 'CA0023', 'BNK0005', 'TJ014', 'Will Williams', 'Friday, 30 December 2022, 23:55', '2023-01-04', 'Steeve Williams', '42', '20', '10002584', '7014698500', '47 Wilson Street', 'williams@mail.com', '31-12-2022 23:55:26', 'assets/frontend/upload/qrcode/ORD00014.png', '1'),
(40, 'ORD00014', 'TORD00014J00132023010421', 'J0013', 'CA0023', 'BNK0005', 'TJ014', 'Will Williams', 'Friday, 30 December 2022, 23:55', '2023-01-04', 'Will Williams', '31', '21', '10002584', '7014698500', '47 Wilson Street', 'williams@mail.com', '31-12-2022 23:55:26', 'assets/frontend/upload/qrcode/ORD00014.png', '1'),
(41, 'ORD00015', 'TORD00015J0025202403281', 'J0025', 'CA0024', 'BNK0001', 'TJ019', 'mehdi', 'Saturday, 23 March 2024, 17:48', '2024-03-28', 'ali', '16', '1', '123456789', '475645645', 'abc123', 'mehdi@qgmail.com', '24-03-2024 17:48:38', 'assets/frontend/upload/qrcode/ORD00015.png', '1'),
(42, 'ORD00016', 'TORD00016J0025202403281', 'J0025', 'CA0024', 'BNK0001', 'TJ019', 'mehdi', 'Saturday, 23 March 2024, 18:27', '2024-03-28', 'ali', '17', '1', '123456789', '475645645', 'abc123', 'mehdi@qgmail.com', '24-03-2024 18:27:59', 'assets/frontend/upload/qrcode/ORD00016.png', '1'),
(43, 'ORD00017', 'TORD00017J0025202403281', 'J0025', 'CA0024', 'BNK0001', 'TJ019', 'mehdi', 'Saturday, 23 March 2024, 18:28', '2024-03-28', 'ali', '17', '1', '123456789', '475645645', 'abc123', 'mehdi@qgmail.com', '24-03-2024 18:28:47', 'assets/frontend/upload/qrcode/ORD00017.png', '1'),
(44, 'ORD00018', 'TORD00018J0025202403231', 'J0025', 'CA0024', 'BNK0001', 'TJ019', 'mehdi', 'Saturday, 23 March 2024, 19:43', '2024-03-23', 'Alper', '22', '1', '123456789', '475645645', 'abc123', 'mehdi@qgmail.com', '24-03-2024 19:43:51', 'assets/frontend/upload/qrcode/ORD00018.png', '1'),
(45, 'ORD00019', 'TORD00019J0025202403301', 'J0025', 'CA0024', 'BNK0002', 'TJ019', 'mehdi', 'Saturday, 23 March 2024, 19:47', '2024-03-30', 'vhbn', '100', '1', '12346789', '475645645', 'abc123', 'mehdi@qgmail.com', '24-03-2024 19:47:18', 'assets/frontend/upload/qrcode/ORD00019.png', '1'),
(52, 'ORD00026', 'TORD00026J00252024032911', 'J0025', 'CA0025', NULL, 'TJ019', 'alper', 'Friday, 29 March 2024, 23:37', '2024-03-29', 'alper', '22', '11', '12345984', '12345678', 'aksdadksladjaskldjsald', 'alper@gmail.com', '30-03-2024 23:37:31', 'assets/frontend/upload/qrcode/ORD00026.png', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_musteri`
--

CREATE TABLE `tbl_musteri` (
  `kd_musteri` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `sifre_musteri` varchar(200) NOT NULL,
  `kimlik_no_musteri` varchar(50) NOT NULL,
  `muster_adi` varchar(100) NOT NULL,
  `musteri_adres` varchar(200) NOT NULL,
  `musteri_email` varchar(100) NOT NULL,
  `musteri_telefon` varchar(20) NOT NULL,
  `musteri_foto` varchar(200) NOT NULL,
  `musteri_durum` int(1) DEFAULT NULL,
  `musteri_ols_veri` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `tbl_musteri`
--

INSERT INTO `tbl_musteri` (`kd_musteri`, `username`, `sifre_musteri`, `kimlik_no_musteri`, `muster_adi`, `musteri_adres`, `musteri_email`, `musteri_telefon`, `musteri_foto`, `musteri_durum`, `musteri_ols_veri`) VALUES
('CA0002', 'bettyb', '$2y$10$wzz5.QSqiNfrc2JKuYK5huJHEvry340XZlspPACOJLf0TmU3yu30.', '02564651321564', 'Betty B. McMillan\n', '62 Limer Street', 'bettymcm@mail.com', '7014445450', 'assets/frontend/img/default.png', 1, '1552202266'),
('CA0001', 'oscarharrison', '$2y$10$PO4viVqheGgw7HPeozUih.V6qK4aWKbACLMe9UWOoSaJ8pSdaiISG', '021452125', 'Oscar A. Harrison', '59 Pine Tree Lane', 'oscar.harrison69@mail.com', '0455658500', 'assets/frontend/img/default.png', 1, '1552199781'),
('CA0003', 'ruffner', '$2y$10$N6imN8KmAhuw9rH.iJxGLeVaRCG.27UmhHVF7MaICMhYlm.TGJ9iy', '346454215172455', 'Pearl R. Ruffner', '93 Steele Street', 'ruffp@mail.com', '9458001455', 'assets/frontend/img/default.png', 1, '1552397128'),
('CA0005', 'ellington', '$2y$10$PYDzqnOpzeGSo0ngK40Q1.M77oxnQ7fvhMYpI2q/JoZFS5r.g5FPG', '321963127368762639', 'Robert N. Ellington', '31 Andell Road', 'robelli@mail.com', '0147410147', 'assets/frontend/img/default.png', 1, '1554340197'),
('CA0004', 'danielw', '$2y$10$hHamfvIRbCNYiAvS289f0uj.T6kUfpfxTUcI210SLRqdTrxj4zyxG', '78456', 'Daniel Winkles', '52 Coplin Avenue', 'danielw@mail.com', '021212545', 'assets/frontend/img/default.png', 1, '1554017732'),
('CA0006', 'tiffewis', '$2y$10$pwr/ZSCVcya8JOV1Xt13qeRzhz.nLsJGWYcWWZJgR5DFLUfjJeaGO', '', 'Tiffany G. Lewis', '72 Raintree Boulevard', 'tiffewis101@mail.com', '0978542255', 'assets/frontend/img/default.png', 1, '1554385261'),
('CA0007', 'emestcoy', '$2y$10$Z7yJqwWa0pCPtGb5sVYf9epvdjT97BD9U4guma.EhKU3JS9H675lG', '', 'Ernest E. McCoy', '42 Sunburst Drive', 'ernest@mail.com', '0898765345', 'assets/frontend/img/default.png', 1, '1554534514'),
('CA0008', 'demoaccount', '$2y$10$N1GVdIFWQ967xcLsVEb1ROH1ESfMew4mqjHoGSGIJ/0Qsf9oO/xOO', '', 'Demo Account', 'Demo Address', 'demo@mail.com', '7000000020', 'assets/frontend/img/default.png', 1, '1634359787'),
('CA0009', 'johnwatson', '$2y$10$2HJ6mUfIPHpJ87BKQEv7YuMjT8nX9W8CJFqG5jAnekEJhJMv2MFGy', '', 'John Watson', '1145 Bleck St', 'john@mail.com', '7778885540', 'assets/frontend/img/default.png', 1, '1642506186'),
('CA0010', 'christine', '$2y$10$Al3FDFQOSTQEQBvnQc45fe8NHRQ5OtGkgF6LnYplEzJqMEfy2Au0q', '', 'Christine Moore', '114 Test Address', 'christine@mail.com', '7774445454', 'assets/frontend/img/default.png', 1, '1672227893'),
('CA0011', 'ellen', '$2y$10$I5m6NM5hPzyeAS5cT6CBtuD5Xc5xSJytC6GOu.51LsLkdi/7UPZz.', '', 'Ellen', '554 Southern Cross St', 'ellen@mail.com', '7774545555', 'assets/frontend/img/default.png', 1, '1672229233'),
('CA0012', 'andie', '$2y$10$sFXYN8pGoGA24LwQrHuBW.uQuOWuVzcNu0yRbqaBgEDJq0OZRThCq', '', 'Andie Sand', '114 Allace Avenue', 'andie@mail.com', '7458885454', 'assets/frontend/img/default.png', 1, '1672235116'),
('CA0013', 'robert', '$2y$10$C5Faofquq/6Sckw0ERuLK.6qXSAFQpU1QMDuAU/UWglUN4X6mJYSi', '', 'Robert C. Frazier', '11 Haymond Rocks Road', 'robert@mail.com', '7778545699', 'assets/frontend/img/default.png', 1, '1672247531'),
('CA0014', 'delbert', '$2y$10$H/24vkHCSs2vLXxiwwUEq.7sUYSeT61wU18PSAbfIHz63HisAFD6K', '', 'Delbert Rochelle', '81 Single Street', 'delbert@mail.com', '7850001414', 'assets/frontend/img/default.png', 1, '1672333316'),
('CA0015', 'ruthrusso', '$2y$10$WDBh38OmnT.3v2.7sQ/8C./0mGMUIRLsXTzZlJeWGgWBTEQPq6Gou', '', 'Ruth Russo', '17 Olive Street', 'ruth@mail.com', '7854545454', 'assets/frontend/img/default.png', 1, '1672336612'),
('CA0016', 'montoya', '$2y$10$IRBkQQZ4Kw5iKu7bsOwkA.5D3xj9mbCKA0Lvo3myKwmJvKrhZHsIS', '', 'Carl J. Montoya', '70 Cerullo Road', 'carl@mail.com', '7350001455', 'assets/frontend/img/default.png', 1, '1672388181'),
('CA0017', 'diana', '$2y$10$R5EOyPHwynjwPkzZEwUKjO/YwAdhsaGVIvUEyvgTygTd19G3qHhkC', '', 'Diana Kirk', '105 Fairmont Avenue', 'diana@mail.com', '7450001010', 'assets/frontend/img/default.png', 1, '1672401155'),
('CA0018', 'agnes', '$2y$10$qIBv6Y2PnV4AqV5kG3M6gO4UzfvkFiMAvXcPJT.D1igRkQd8uuMu.', '', 'Agnes Wonka', '65 Cherry Ridge Drive', 'agnes@mail.com', '7312580010', 'assets/frontend/img/default.png', 1, '1672401850'),
('CA0019', 'marysmith', '$2y$10$KokpNWTZSwXXLDpjqZXWgekm7Oi3E2gKF1Iaui0dsG9a.KD4FMBBC', '', 'Mary Smith', '43 Saint Francis Way', 'mary@mail.com', '7412555545', 'assets/frontend/img/default.png', 1, '1672402552'),
('CA0020', 'thomas', '$2y$10$qQbkAXlNKDPmAJQQpmxDOOxVpuEZUs/DS.49ukgekOwzXhBwrFS.O', '', 'Thomas Ford', '87 Hudson Street', 'thomasf@mail.com', '7140002569', 'assets/frontend/img/default.png', 1, '1672402730'),
('CA0021', 'shane', '$2y$10$ovPI98iJNIbf8XKzPzy3.e7pQKf4OooU/QoAEXlwxC3e8N42ZUWNG', '', 'Shane Gustin', '27 Duff Avenue', 'shane@mail.com', '7410140025', 'assets/frontend/img/default.png', 1, '1672414382'),
('CA0022', 'steven', '$2y$10$FNs3qmXmq.fM/lwmCEdnG.dq8FJ2HNnZAFQ6Z9crWGUZYvJ3E3CBG', '', 'Steven Bast', '58 Crestview Terrace', 'basteven@mail.com', '4501450000', 'assets/frontend/img/default.png', 1, '1672414504'),
('CA0023', 'williams', '$2y$10$oU/PX/oEKmoxbUHJQvtKmOHYktfhyROtQYbwHUJiMVi.nCH49wgfG', '', 'Will Williams', '47 Wilson Street', 'williams@mail.com', '7014698500', 'assets/frontend/img/default.png', 1, '1672417879'),
('CA0024', 'abc123', '$2y$10$Thj3CqKtcaVjPXbDfYMQnOEo.6mEtz/zeUTq1LMEQNgVbPi1to0Eu', '', 'mehdi', 'abc123', 'mehdi@qgmail.com', '475645645', 'assets/frontend/img/default.png', 1, '1711141895'),
('CA0025', 'alper', '$2y$10$GzPnCwMEWZ3.kAD0DOtmtePn2JizneJsuHBxnhAYR.yzctf8VIRe2', '', 'alper', 'aksdadksladjaskldjsald', 'alper@gmail.com', '12345678', 'assets/frontend/img/default.png', 1, '1711684131');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `kd_sub_menu` int(11) NOT NULL,
  `kd_menu` int(11) DEFAULT NULL,
  `title_sub_menu` varchar(128) DEFAULT NULL,
  `url_sub_menu` varchar(128) DEFAULT NULL,
  `is_active_sub_menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`kd_sub_menu`, `kd_menu`, `title_sub_menu`, `url_sub_menu`, `is_active_sub_menu`) VALUES
(0, 1, 'Dashboard', 'backend/home', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_bilet`
--

CREATE TABLE `tbl_bilet` (
  `kd_bilet` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `bilet_isim` varchar(50) DEFAULT NULL,
  `bilet_koltuk` varchar(50) DEFAULT NULL,
  `bilet_yas` varchar(50) DEFAULT NULL,
  `bilet_cikis_kod` varchar(50) DEFAULT NULL,
  `bilet_fiyat` varchar(50) NOT NULL,
  `bilet_path` varchar(100) DEFAULT NULL,
  `bilet_durum` varchar(50) NOT NULL,
  `bilet_olstrm_tarih` date DEFAULT NULL,
  `bilet_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_bilet`
--

INSERT INTO `tbl_bilet` (`kd_bilet`, `kd_order`, `bilet_isim`, `bilet_koltuk`, `bilet_yas`, `bilet_cikis_kod`, `bilet_fiyat`, `bilet_path`, `bilet_durum`, `bilet_olstrm_tarih`, `bilet_admin`) VALUES
('TORD00001J00012022122915', 'ORD00001', 'Ellen', '15', '31 Years', 'TJ019', '68', 'assets/backend/upload/etiket/ORD00001.pdf', '2', '2022-12-28', 'admin'),
('TORD00002J00012022123018', 'ORD00002', 'Andie Sand', '18', '30 Years', 'TJ019', '68', 'assets/backend/upload/etiket/ORD00002.pdf', '2', '2022-12-29', 'owner'),
('TORD00004J00052022123110', 'ORD00004', 'Delbert Rochelle', '10', '32 Years', 'TJ016', '40', 'assets/backend/upload/etiket/ORD00004.pdf', '2', '2022-12-30', 'admin'),
('TORD00005J0003202212318', 'ORD00005', 'Ruth Russo', '8', '32 Years', 'TJ011', '89', 'assets/backend/upload/etiket/ORD00005.pdf', '2', '2022-12-30', 'owner'),
('TORD00005J0003202212319', 'ORD00005', 'Jake Russo', '9', '35 Years', 'TJ011', '89', 'assets/backend/upload/etiket/ORD00005.pdf', '2', '2022-12-30', 'owner'),
('TORD00006J00012022123123', 'ORD00006', 'Carl J. Montoya', '23', '25 Years', 'TJ019', '68', 'assets/backend/upload/etiket/ORD00006.pdf', '2', '2022-12-30', 'owner'),
('TORD00007J0015202301023', 'ORD00007', 'Diana Kirk', '3', '39 Years', 'TJ013', '40', 'assets/backend/upload/etiket/ORD00007.pdf', '2', '2022-12-30', 'owner'),
('TORD00008J00172023010122', 'ORD00008', 'Agnes Wonka', '22', '41 Years', 'TJ009', '59', 'assets/backend/upload/etiket/ORD00008.pdf', '2', '2022-12-30', 'owner'),
('TORD00010J00132023010514', 'ORD00010', 'Thomas Ford', '14', '34 Years', 'TJ014', '82', 'assets/backend/upload/etiket/ORD00010.pdf', '2', '2022-12-30', 'owner'),
('TORD00013J00022022123114', 'ORD00013', 'Will Williams', '14', '31 Years', 'TJ010', '75', 'assets/backend/upload/etiket/ORD00013.pdf', '2', '2022-12-30', 'owner');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_musteri_token`
--

CREATE TABLE `tbl_musteri_token` (
  `kd_token` int(11) NOT NULL,
  `token_name` varchar(256) DEFAULT NULL,
  `email_token` varchar(50) DEFAULT NULL,
  `date_create_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_musteri_token`
--

INSERT INTO `tbl_musteri_token` (`kd_token`, `token_name`, `email_token`, `date_create_token`) VALUES
(1, '65a01b40a0cc44076458f9d00ce94720', 'demo@mail.com', 1634359787),
(2, 'dd79d52fe9968f73fc66a1d481778655', 'john@mail.com', 1642506186),
(3, 'cd7b785a63c58898bfed23bab186ee1d', 'christine@mail.com', 1672227893),
(4, '616b4176a96b190073514fd3c154c2e0', 'ellen@mail.com', 1672229234),
(5, '87702b38ef9a5b80a98c077c43073182', 'andie@mail.com', 1672235116),
(6, '02a2fcb0be5250471a94142ed81d04df', 'robert@mail.com', 1672247531),
(7, '6f531b65df037f2f7ba0fb78231e577d', 'delbert@mail.com', 1672333316),
(8, '9d40b5ed83fc9cb3ce68f7050d69ee6a', 'ruth@mail.com', 1672336612),
(9, '0cb29395d911e02aba3a746691d7f5cf', 'carl@mail.com', 1672388181),
(10, '276466e9d4a5d8003fde3aa3990f46ae', 'demo@mail.com', 1672396084),
(11, '36c79fa8f57a423a794d8421be08e024', 'diana@mail.com', 1672401155),
(12, '51f91e83a25741a3626f99d0dbf0f5a0', 'agnes@mail.com', 1672401850),
(13, '2ec7e10ab13703d8817a2e74f712f45a', 'mary@mail.com', 1672402552),
(14, '3fed0f58dd880c8fa5f606e7a2b878bf', 'thomasf@mail.com', 1672402730),
(15, 'ca46de539fd1c62fa3614d0b18539233', 'shane@mail.com', 1672414382),
(16, 'a98db0cf72281841d03067c42ab953ac', 'basteven@mail.com', 1672414504),
(17, '6a05822bb349381f20ba0b464559879b', 'williams@mail.com', 1672417879),
(18, '8b56297cffe33c36a01c38d3b08aed3c', 'mehdi@qgmail.com', 1711141895),
(19, '52e028603eb2d8ea8eab957a6cbd7aff', 'alper@gmail.com', 1711684131);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_seferler`
--

CREATE TABLE `tbl_seferler` (
  `hedef_kod` varchar(50) NOT NULL,
  `yolculuk_sehir` varchar(50) NOT NULL,
  `yolculuk_terminal_ad` varchar(50) NOT NULL,
  `terminal_adi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tbl_sefer`
--

INSERT INTO `tbl_seferler` (`hedef_kod`, `yolculuk_sehir`, `yolculuk_terminal_ad`, `terminal_adi`) VALUES
('TJ007', 'Ankara', '', 'Ankara (Asti) Otogari\r\n'),
('TJ008', 'Istanbul', '', 'Istanbul Esenler Otogari'),
('TJ009', 'Izmir', '', 'Izmir Otogari'),
('TJ010', 'Antalya', '', 'Antalya Otogari'),
('TJ011', 'Kars', '', 'Kars Sehir Otogari'),
('TJ012', 'Konya', '', 'Konya Otogari'),
('TJ013', 'Sivas', '', 'Sivas Merkez Otogari'),
('TJ014', 'Eskisehir', '', 'Eskisehir Otogari'),
('TJ015', 'Mersin', '', 'Mersin Otogari'),
('TJ016', 'Edirne', '', 'Edirne Otogari'),
('TJ017', 'Bursa', '', 'Bursa Otogari'),
('TJ018', 'Kocaeli', '', 'Kocaeli (Izmit) Otogari'),
('TJ019', 'Adana', '', 'Adana Merkez Otogari');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Tablo için indeksler `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Tablo için indeksler `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Tablo için indeksler `tbl_sefer`
--
ALTER TABLE `tbl_sefer`
  ADD PRIMARY KEY (`sefer_kodu`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `hedef_kod` (`hedef_kod`);

--
-- Tablo için indeksler `tbl_onay`
--
ALTER TABLE `tbl_onay`
  ADD PRIMARY KEY (`onay_kodu`),
  ADD KEY `kode_order` (`kd_order`);

--
-- Tablo için indeksler `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`seviye_kod`);

--
-- Tablo için indeksler `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`kd_menu`);

--
-- Tablo için indeksler `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `sefer_kodu` (`sefer_kodu`),
  ADD KEY `kd_kustomer` (`kd_musteri`),
  ADD KEY `kd_bilet` (`kd_bilet`),
  ADD KEY `kd_bank` (`kd_bank`);

--
-- Tablo için indeksler `tbl_musteri`
--
ALTER TABLE `tbl_musteri`
  ADD PRIMARY KEY (`kd_musteri`);

--
-- Tablo için indeksler `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`kd_sub_menu`),
  ADD KEY `kd_menu` (`kd_menu`);

--
-- Tablo için indeksler `tbl_bilet`
--
ALTER TABLE `tbl_bilet`
  ADD PRIMARY KEY (`kd_bilet`),
  ADD KEY `kode_order` (`kd_order`);

--
-- Tablo için indeksler `tbl_musteri_token`
--
ALTER TABLE `tbl_musteri_token`
  ADD PRIMARY KEY (`kd_token`);

--
-- Tablo için indeksler `tbl_sefer`
--
ALTER TABLE `tbl_sefer`
  ADD PRIMARY KEY (`hedef_kod`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `seviye_kod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `kd_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_musteri_token`
--
ALTER TABLE `tbl_musteri_token`
  MODIFY `kd_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
