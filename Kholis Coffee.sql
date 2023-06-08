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


-- Dumping database structure for db_kholiscoffee
CREATE DATABASE IF NOT EXISTS `db_kholiscoffee` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_kholiscoffee`;

-- Dumping structure for table db_kholiscoffee.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `forum_id` int NOT NULL AUTO_INCREMENT,
  `comment` varchar(500) DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=510 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_kholiscoffee.forum: ~2 rows (approximately)
INSERT INTO `forum` (`forum_id`, `comment`, `nama`) VALUES
	(501, 'Halooo', 'NN'),
	(502, 'Halo juga', 'Pecinta Kopi');

-- Dumping structure for table db_kholiscoffee.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `sku` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_produk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=602 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_kholiscoffee.keranjang: ~1 rows (approximately)
INSERT INTO `keranjang` (`cart_id`, `sku`, `tanggal`, `nama_produk`, `harga`, `qty`) VALUES
	(601, 201, '2023-06-07', 'Coffee Milk', '100000', '1');

-- Dumping structure for table db_kholiscoffee.list_pesanan
CREATE TABLE IF NOT EXISTS `list_pesanan` (
  `list_pesanan_id` int NOT NULL AUTO_INCREMENT,
  `pesanan_id` int DEFAULT NULL,
  `produk_id` int DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`list_pesanan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_kholiscoffee.list_pesanan: ~0 rows (approximately)

-- Dumping structure for table db_kholiscoffee.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `pesanan_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `sku` int DEFAULT NULL,
  `nama_produk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty_produk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`pesanan_id`),
  KEY `FK_pesanan_user` (`user_id`),
  CONSTRAINT `FK_pesanan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_kholiscoffee.pesanan: ~2 rows (approximately)
INSERT INTO `pesanan` (`pesanan_id`, `user_id`, `sku`, `nama_produk`, `harga_produk`, `qty_produk`, `total`, `tanggal`, `status`) VALUES
	(301, 902, 101, 'Coffee Milk', '', '1', '', '2023-06-07', 'Complete'),
	(302, 903, 102, 'Americano', NULL, '1', '', '2023-06-07', 'Complete');

-- Dumping structure for table db_kholiscoffee.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `sku` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `keterangan` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stok` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_kholiscoffee.produk: ~4 rows (approximately)
INSERT INTO `produk` (`sku`, `nama_produk`, `harga`, `keterangan`, `stok`, `gambar`) VALUES
	(101, 'Coffee Milk', '100000', 'Aku + Kamu = Kopi Susu', '10', '87104-Kopi Susu.jpg'),
	(102, 'Americano', '100000', 'Kopi hitam tak pakai susu', '5', '42757-Americano.jpg'),
	(103, 'Matcha', '100000', 'I love you sooo Matcha', '3', '57615-Matcha.jpeg'),
	(206, 'Grinder', '5000000', 'Ini penggiling', '2', '96224-Grinder.jpg');

-- Dumping structure for table db_kholiscoffee.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_telepon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=904 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_kholiscoffee.user: ~3 rows (approximately)
INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`, `no_telepon`, `alamat`, `level`) VALUES
	(901, 'Admin 1', 'admin1@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', '082236320842', 'Jl. Dr. Muwardi III No. 38', 1),
	(902, 'Saskia Febe Fedhora', 'saskiafebe@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '082236320842', 'Jl. Dr. Muwardi III No. 38', 2),
	(903, 'Berry', 'berry@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '08128580894', 'Jl. Aurorarori', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
