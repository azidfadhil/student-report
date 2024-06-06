-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laporan_mt
CREATE DATABASE IF NOT EXISTS `laporan_mt` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laporan_mt`;

-- Dumping structure for table laporan_mt.master_trainer
CREATE TABLE IF NOT EXISTS `master_trainer` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table laporan_mt.master_trainer: ~3 rows (approximately)
INSERT INTO `master_trainer` (`id`, `email`, `password`, `name`, `no_hp`, `role`) VALUES
	(16, 'jonathan2023@gmail.com', 'abcd1234', 'Jonathan Ivan Chandra', '087733178628', 'mt'),
	(19, 'mail.azidfadhil@gmail.com', 'Namamu123', 'Muhammad Azid Fadhil Nabhani', '085877657163', 'mt'),
	(23, 'admin@admin.com', 'adminMT', 'Admin MT Sagasitas', '000000000000', 'admin');

-- Dumping structure for table laporan_mt.presensi
CREATE TABLE IF NOT EXISTS `presensi` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `tgl_mengajar` date NOT NULL,
  `nama_sekolah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelas` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_mt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jml_siswa` int NOT NULL,
  `jenis_mengajar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_modified_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Dumping data for table laporan_mt.presensi: ~22 rows (approximately)
INSERT INTO `presensi` (`id`, `tgl_mengajar`, `nama_sekolah`, `kelas`, `nama_mt`, `nama_file`, `jml_siswa`, `jenis_mengajar`, `created_by`, `last_modified_by`) VALUES
	(23, '2024-01-08', 'SMKN 27 Jakarta', 'X', 'Muhammad Azid Fadhil Nabhani', '240108_SMKN 27 Jakarta_X_Muhammad Azid Fadhil Nabhani.xlsx', 35, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(24, '2024-01-09', 'SMKN 27 Jakarta', 'XI', 'Jonathan Ivan Chandra,Muhammad Azid Fadhil Nabhani', '240109_SMKN 27 Jakarta_XI_Jonathan Ivan Chandra_Muhammad Azid Fadhil Nabhani.xlsx', 41, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(25, '2024-01-10', 'SMA PSKD 4 Jakarta', 'X', 'Jonathan Ivan Chandra,Muhammad Azid Fadhil Nabhani', '240110_SMA PSKD 4 Jakarta_X_Jonathan Ivan Chandra_Muhammad Azid Fadhil Nabhani.xlsx', 35, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(26, '2024-01-10', 'SMA PSKD 4 Jakarta', 'XI', 'Jonathan Ivan Chandra,Muhammad Azid Fadhil Nabhani', '240110_SMA PSKD 4 Jakarta_XI_Jonathan Ivan Chandra_Muhammad Azid Fadhil Nabhani.xlsx', 37, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(27, '2024-01-11', 'SMKS Muhammadiyah 5 Jakarta', 'XI', 'Muhammad Azid Fadhil Nabhani', '240111_SMKS Muhammadiyah 5 Jakarta_XI_Muhammad Azid Fadhil Nabhani.xlsx', 20, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(28, '2024-01-15', 'SMA se-DKI Jakarta', 'ALL', 'Muhammad Azid Fadhil Nabhani', '240115_SMA se-DKI Jakarta_ALL_Muhammad Azid Fadhil Nabhani.xlsx', 118, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(30, '2024-01-16', 'SMK se-DKI Jakarta', 'ALL', 'Muhammad Azid Fadhil Nabhani', '240116_SMK se-DKI Jakarta_ALL_Muhammad Azid Fadhil Nabhani.xlsx', 115, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(31, '2024-01-19', 'SMK Jakarta Pusat 1', 'X', 'Muhammad Azid Fadhil Nabhani', '240119_SMK Jakarta Pusat 1_X_Muhammad Azid Fadhil Nabhani.xlsx', 26, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(32, '2024-01-19', 'SMK Jakarta Pusat 1', 'XI', 'Muhammad Azid Fadhil Nabhani', '240119_SMK Jakarta Pusat 1_XI_Muhammad Azid Fadhil Nabhani.xlsx', 52, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(35, '2024-01-22', 'SMKN 1 Jakarta', 'XI', 'Muhammad Azid Fadhil Nabhani', '240122_SMKN 1 Jakarta_XI_Muhammad Azid Fadhil Nabhani.xlsx', 26, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(36, '2024-01-22', 'SMKN 1 Jakarta', 'XII', 'Muhammad Azid Fadhil Nabhani', '240122_SMKN 1 Jakarta_XII_Muhammad Azid Fadhil Nabhani.xlsx', 35, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(37, '2024-01-24', 'SMKN 47 Jakarta', 'X', 'Muhammad Azid Fadhil Nabhani', '240124_SMKN 47 Jakarta_X_Muhammad Azid Fadhil Nabhani.xlsx', 33, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(38, '2024-01-24', 'SMKN 47 Jakarta', 'XI', 'Muhammad Azid Fadhil Nabhani', '240124_SMKN 47 Jakarta_XI_Muhammad Azid Fadhil Nabhani.xlsx', 31, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(39, '2024-01-25', 'SMAN 94 Jakarta', 'X', 'Muhammad Azid Fadhil Nabhani', '240125_SMAN 94 Jakarta_X_Muhammad Azid Fadhil Nabhani.xlsx', 32, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(40, '2024-01-26', 'SMAN 58 Jakarta', 'X', 'Muhammad Azid Fadhil Nabhani', '240126_SMAN 58 Jakarta_X_Muhammad Azid Fadhil Nabhani.xlsx', 26, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(41, '2024-01-26', 'SMAN 58 Jakarta', 'XI', 'Muhammad Azid Fadhil Nabhani', '240126_SMAN 58 Jakarta_XI_Muhammad Azid Fadhil Nabhani.xlsx', 23, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(42, '2024-01-29', 'SMAN 38 Jakarta', 'X', 'Jonathan Ivan Chandra,Muhammad Azid Fadhil Nabhani', '240129_SMAN 38 Jakarta_X_Jonathan Ivan Chandra_Muhammad Azid Fadhil Nabhani.xlsx', 176, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(43, '2024-01-29', 'SMAN 38 Jakarta', 'XI', 'Jonathan Ivan Chandra,Muhammad Azid Fadhil Nabhani', '240129_SMAN 38 Jakarta_XI_Jonathan Ivan Chandra_Muhammad Azid Fadhil Nabhani.xlsx', 81, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(44, '2024-01-30', 'SMAN 37 Jakarta', 'ALL', 'Muhammad Azid Fadhil Nabhani', '240130_SMAN 37 Jakarta_ALL_Muhammad Azid Fadhil Nabhani.xlsx', 22, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(47, '2024-01-31', 'SMAN 109 Jakarta', 'X', 'Muhammad Azid Fadhil Nabhani', '240131_SMAN 109 Jakarta_X_Muhammad Azid Fadhil Nabhani.xlsx', 28, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(48, '2024-01-31', 'SMAN 109 Jakarta', 'XI', 'Muhammad Azid Fadhil Nabhani', '240131_SMAN 109 Jakarta_XI_Muhammad Azid Fadhil Nabhani.xlsx', 36, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas'),
	(49, '2024-02-02', 'SMKN 23 Jakarta', 'XI', 'Muhammad Azid Fadhil Nabhani', '240202_SMKN 23 Jakarta_XI_Muhammad Azid Fadhil Nabhani.xlsx', 33, 'Offline Luar DIY', 'Admin MT Sagasitas', 'Admin MT Sagasitas');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
