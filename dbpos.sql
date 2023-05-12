-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2023 at 04:24 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpos`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `inputPelanggan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `inputPelanggan` (`kode` VARCHAR(10), `nama` VARCHAR(45), `jk` CHAR(1), `tmp_lahir` VARCHAR(30), `tgl_lahir` DATE, `email` VARCHAR(45), `kartu_id` INT(11))   BEGIN
INSERT INTO pelanggan VALUES(null,kode,nama,jk,tmp_lahir,tgl_lahir,email,kartu_id);
END$$

DROP PROCEDURE IF EXISTS `inputProduk`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `inputProduk` (`kode` VARCHAR(10), `nama` VARCHAR(45), `hrg_beli` DOUBLE, `hrg_jual` DOUBLE, `stok` INT(11), `min_stok` INT(11), `id_jenis` INT(11))   BEGIN
INSERT INTO produk VALUES (null, kode, nama, hrg_beli,hrg_jual,stok,min_stok,id_jenis);
END$$

DROP PROCEDURE IF EXISTS `showPelanggan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `showPelanggan` (IN `id_pelanggan` INT)   BEGIN 
SELECT * FROM pelanggan where id = id_pelanggan;
END$$

DROP PROCEDURE IF EXISTS `showProduk`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `showProduk` (`id_produk` INT)   BEGIN 
SELECT * FROM produk where id = id_produk;
END$$

DROP PROCEDURE IF EXISTS `totalPesanan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `totalPesanan` ()   BEGIN
SELECT pelanggan.id, pelanggan.kode,pelanggan.nama_pelanggan,SUM(pesanan_items.qty) as total_item,pesanan.total FROM pelanggan RIGHT JOIN pesanan ON pesanan.pelanggan_id = pelanggan.id LEFT JOIN pesanan_items ON pesanan_items.pesanan_id = pesanan.id GROUP BY pesanan.id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

DROP TABLE IF EXISTS `jenis_produk`;
CREATE TABLE IF NOT EXISTS `jenis_produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `nama`) VALUES
(1, 'elektronik'),
(2, 'makanan'),
(3, 'minuman'),
(4, 'furniture');

-- --------------------------------------------------------

--
-- Table structure for table `kartu`
--

DROP TABLE IF EXISTS `kartu`;
CREATE TABLE IF NOT EXISTS `kartu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(6) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `diskon` double DEFAULT NULL,
  `iuran` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kartu`
--

INSERT INTO `kartu` (`id`, `kode`, `nama`, `diskon`, `iuran`) VALUES
(1, '10021', 'Gold', 0.7, 100000),
(2, '10022', 'Silver', 0.03, 50000),
(3, '10023', 'Diamond', 0.35, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fullname`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Admin', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin', 'admin.jpg'),
(2, 'Siti ', 'siti', 'adcd7048512e64b48da55b027577886ee5a36350', 'manager', 'manager.jpg'),
(3, 'ujang', 'ujang', 'adcd7048512e64b48da55b027577886ee5a36350', 'staff', 'staff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `kartu_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode`, `nama_pelanggan`, `jk`, `tmp_lahir`, `tgl_lahir`, `email`, `kartu_id`) VALUES
(5, '011101', 'Agung', 'L', 'Bandung', '1998-09-06', 'agung@gmail.com', 2),
(6, '011102', 'Sekar', 'P', 'Jakarta', '1994-08-04', 'sekar@gmail.com', 2),
(7, '011103', 'Sarih', 'P', 'Garut', '1991-02-06', 'sarih@gmail.com', 2),
(8, '011104', 'Karim', 'L', 'Yogyakarta', '1990-09-06', 'karim@gmail.com', 1),
(9, '011105', 'Giro', 'L', 'Bandung', '1991-02-06', 'giro@gmail.com', 1),
(10, '011106', 'Kamal', 'L', 'Kediri', '1998-09-06', 'kamal@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nokuitansi` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ke` int DEFAULT NULL,
  `pesanan_id` int NOT NULL,
  `status_pembayaran` enum('belum lunas','lunas','','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nokuitansi` (`nokuitansi`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nokuitansi`, `tanggal`, `jumlah`, `ke`, `pesanan_id`, `status_pembayaran`) VALUES
(7, '84.7828321', '2003-04-01', 0, 1, 9, 'belum lunas'),
(6, '56.9473262', '2023-03-01', 0, 1, 8, 'belum lunas'),
(5, '53.5501694', '2023-05-01', 90000, 2, 7, 'lunas'),
(8, '61.0084528', '2030-02-01', 0, 1, 10, 'belum lunas');

--
-- Triggers `pembayaran`
--
DROP TRIGGER IF EXISTS `check_status`;
DELIMITER $$
CREATE TRIGGER `check_status` BEFORE UPDATE ON `pembayaran` FOR EACH ROW BEGIN
SET @total = (SELECT total FROM pesanan WHERE id = NEW.pesanan_id);
IF NEW.jumlah > @total THEN
SET NEW.status_pembayaran = "lunas";
ELSE
SET NEW.status_pembayaran = "belum lunas";
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(45) DEFAULT NULL,
  `nomor` varchar(10) DEFAULT NULL,
  `produk_id` int NOT NULL,
  `jumlah` int DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `vendor_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `pelanggan_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `total`, `pelanggan_id`) VALUES
(1, '2023-05-01', 1999, 5),
(2, '2023-05-02', 3500, 6),
(7, '2023-05-01', 8000, 6);

--
-- Triggers `pesanan`
--
DROP TRIGGER IF EXISTS `input_pembayaran`;
DELIMITER $$
CREATE TRIGGER `input_pembayaran` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
SET @jum_pesanan = (SELECT COUNT(*) FROM pesanan WHERE pelanggan_id = NEW.pelanggan_id);
SET @struk = ("TK"+(RAND()*100)+NEW.id);
INSERT INTO pembayaran VALUES (null,@struk ,NEW.tanggal,0,@jum_pesanan,NEW.id,"belum lunas");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_items`
--

DROP TABLE IF EXISTS `pesanan_items`;
CREATE TABLE IF NOT EXISTS `pesanan_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produk_id` int NOT NULL,
  `pesanan_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan_items`
--

INSERT INTO `pesanan_items` (`id`, `produk_id`, `pesanan_id`, `qty`, `harga`) VALUES
(1, 1, 1, 1, 5040000),
(2, 3, 1, 1, 4680000),
(3, 5, 2, 5, 3500),
(6, 5, 3, 4, 3500),
(7, 1, 3, 1, 5040000),
(9, 5, 5, 10, 3500),
(10, 5, 6, 20, 3500),
(11, 2, 4, 3, 10500),
(12, 2, 4, 3, 10500);

--
-- Triggers `pesanan_items`
--
DROP TRIGGER IF EXISTS `item_kembali`;
DELIMITER $$
CREATE TRIGGER `item_kembali` BEFORE UPDATE ON `pesanan_items` FOR EACH ROW BEGIN
    IF old.id = NEW.produk_id THEN
    	SET @stok = (SELECT stok FROM produk WHERE id = OLD.produk_id);
   		SET @sisa = (@stok + OLD.qty) - NEW.qty;
    	IF @sisa < 0 THEN
    		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'warning:stok tidak cukup';
    	END IF;
    	UPDATE produk SET stok = @sisa WHERE id = OLD.produk_id;
    ELSE
    	SET @stok_lama = (SELECT stok FROM produk WHERE id = OLD.produk_id);
     	SET @sisa_lama = (@stok_lama + OLD.qty);
     	UPDATE produk SET stok = @sisa_lama WHERE id = OLD.produk_id;
    	SET @stok_baru = (SELECT stok FROM produk WHERE id = NEW.produk_id);
     	SET @sisa_baru = (@stok_baru - NEW.qty);
     	IF @sisa_baru < 0 THEN
     		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "warning:stok tidak tersedia";
            
    END IF;
    UPDATE produk SET stok = @sisa_baru WHERE id = NEW.produk_id;
    END IF;
 END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `tambah_item`;
DELIMITER $$
CREATE TRIGGER `tambah_item` BEFORE INSERT ON `pesanan_items` FOR EACH ROW BEGIN
SET @stok = (SELECT stok FROM produk WHERE id = NEW.produk_id);
SET @sisa = @stok - NEW.qty;
IF @sisa < 0 THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "warning:stok tidak cukup";
END if;
UPDATE produk SET stok = @sisa WHERE id = new.produk_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pesanan_produk_vw`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `pesanan_produk_vw`;
CREATE TABLE IF NOT EXISTS `pesanan_produk_vw` (
`id` int
,`kode` varchar(10)
,`nama_pelanggan` varchar(50)
,`tanggal` date
,`pelanggan_id` int
,`nama` varchar(45)
,`qty` int
,`harga` double
);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `min_stok` int DEFAULT NULL,
  `jenis_produk_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga_beli`, `harga_jual`, `stok`, `min_stok`, `jenis_produk_id`) VALUES
(1, 'TV01', 'TV', 3000000, 4000000, 3, 2, 1),
(2, 'TV02', 'TV 21 Inch', 4000000, 4500000, 7, 2, 1),
(3, 'K001', 'Kulkas', 2000000, 3000000, 6, 1, 1),
(4, 'MM01', 'Meja Makan', 1500000, 2000000, 3, 2, 2),
(5, 'T001', 'Taro', 1000, 2000, 9, 2, 2),
(6, 'TP001', 'Teh Pucuk', 3000, 4000, 2, 2, 3),
(7, 'AC01', 'Notebook Acer', 8000000, 10800000, 7, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomor` varchar(4) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kontak` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure for view `pesanan_produk_vw`
--
DROP TABLE IF EXISTS `pesanan_produk_vw`;

DROP VIEW IF EXISTS `pesanan_produk_vw`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pesanan_produk_vw`  AS SELECT `pelanggan`.`id` AS `id`, `pelanggan`.`kode` AS `kode`, `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`, `pesanan`.`tanggal` AS `tanggal`, `pesanan`.`pelanggan_id` AS `pelanggan_id`, `produk`.`nama` AS `nama`, `pesanan_items`.`qty` AS `qty`, `pesanan_items`.`harga` AS `harga` FROM (((`pesanan` left join `pelanggan` on((`pelanggan`.`id` = `pesanan`.`pelanggan_id`))) left join `pesanan_items` on((`pesanan_items`.`pesanan_id` = `pesanan`.`id`))) left join `produk` on((`pesanan_items`.`produk_id` = `produk`.`id`)))  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
