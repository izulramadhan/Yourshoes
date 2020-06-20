-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 05:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `hapus_produk`
--

CREATE TABLE `hapus_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kategori` int(10) DEFAULT NULL,
  `tgl_hapus` date DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hapus_produk`
--

INSERT INTO `hapus_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `kategori`, `tgl_hapus`, `user`) VALUES
(44, 'Converse AllStar Navy', 'Kondisi Baik', '410000', 'NC_00_Sepatu_Converse79_Allstar_Sepatu_Pria___Wani', 1, '2020-05-07', 'root@localhost'),
(51, 'tes', 'tes', '0', 'Screenshot_(76).png', 1, '2020-05-07', 'root@localhost');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `produk` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id`, `order_id`, `produk`, `qty`, `harga`) VALUES
(25, 14, 17, 1, '550000'),
(26, 14, 16, 1, '600000'),
(27, 14, 18, 1, '549000'),
(28, 14, 19, 1, '1000000'),
(31, 17, 16, 2, '600000'),
(32, 18, 21, 1, '290000');

--
-- Triggers `tbl_detail_order`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `tbl_detail_order` FOR EACH ROW begin update tbl_produk set
stok = stok - new.qty where id_produk=new.produk;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Converse'),
(2, 'Running'),
(3, 'Boots');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pelanggan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `tanggal`, `pelanggan`) VALUES
(14, '2020-04-16', 15),
(18, '2020-05-07', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `pengiriman` varchar(100) DEFAULT NULL,
  `pesan` varchar(100) DEFAULT NULL,
  `pembayaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id`, `nama`, `alamat`, `telp`, `pengiriman`, `pesan`, `pembayaran`) VALUES
(15, 'Bachtiar Nur Yogi Pratama', 'Semarang', '0896142636363', 'JNT', 'Cek sebelum kirim', 'Alfamart'),
(16, 'Yofi', 'Semarang', '1', 'JNE', '1', 'ATM BRI'),
(17, 'Yofi', 'Semarang', '1', 'JNE', '1', 'ATM BRI'),
(18, 'Yofi', 'Semarang', '1', 'JNE', '1', 'ATM BRI'),
(19, 'Bachtiar Nur Yogi', 'Semarang', '089222221111', 'JNE', 'Cek sebelum kirim', 'ATM BRI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `kategori` int(10) DEFAULT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `kategori`, `stok`) VALUES
(16, 'Converse Chuck Taylor All Star HI Unisex Sneakers ', 'Kondisi Baik', '600000', 'c1.jpg', 1, 9),
(17, 'Converse Unisex Chuck Taylor Original - Black ', 'Kondisi Baik', '550000', 'c2.jpg', 1, 10),
(18, 'Converse Chuck Taylor All Star', 'Kondisi Baik', '549000', 'c3.jpg', 1, 10),
(19, ' Cloud Waterproof', 'Kondisi Baik', '300000', 'r1.jpg', 2, 10),
(20, ' Cloudflow New Generation', 'Kondisi Baik', '330000', 'r2.jpg', 2, 10),
(21, 'Cloudventure', 'Kondisi Baik', '290000', 'r3.jpg', 2, 9),
(22, 'AP Boots Terra 3 Merah', 'Kondisi Baik', '100000', 'b1.jpg', 3, 10),
(23, 'AP TERMURAH AP Boots Hitam 2', 'Kondisi Baik', '110000', 'b2.jpg', 3, 10),
(24, 'AP BOOTS ULTRAFLEX', 'Kondisi Baik', '105000', 'b3.jpg', 3, 10),
(45, 'Converse AllStar Navy', 'Kondisi Baik', '320000', 'NC_00_Sepatu_Converse79_Allstar_Sepatu_Pria___Wanita_Navy_Li_png.jpg', 1, 10),
(46, 'Converse High Motif', 'Kondisi Baik', '250000', 'sepatu converse high motif.jpg', 1, 10),
(47, 'Converse AllStar Maroon', 'Kondisi Baik', '380000', 'converse_sepatu_converse_marun_ox_full06.jpg', 1, 10),
(48, 'Converse Chuck Taylor White', 'Kondisi Baik', '540000', 'Baru-Sepatu-Converse-All-Star-Sepatu-CHUCK-TAYLOR-Pria-dan-Wanita-Unisex-Tinggi-Klasik-Sepatu-Skateboard.jpg', 1, 10),
(49, 'Converse Chuck Taylor Lemon', 'Kondisi Baik', '490000', '1_205735_ZM_YELLOW_ALT1.JPG', 1, 10),
(50, 'Converse Vintage Liar', 'Kondisi Baik', '390000', '3ac5a0eb1f3e65a5888e3d421edbe8b1_jpg_850x850.jpg', 1, 10);

--
-- Triggers `tbl_produk`
--
DELIMITER $$
CREATE TRIGGER `hapus_barang` AFTER DELETE ON `tbl_produk` FOR EACH ROW begin insert into hapus_produk
(id_produk,nama_produk,deskripsi,harga,gambar,kategori,tgl_hapus,user)
values (OLD.id_produk,OLD.nama_produk,OLD.deskripsi,OLD.harga,OLD.gambar,OLD.kategori,SYSDATE(),CURRENT_USER);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `cookie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `cookie`) VALUES
(7, '1', 'y@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'YqlM1kG8yQWTMDsgXAKVjo1gh42JeEadao0mCO7ZWJBmwfX38TyI9LsrEISnDSGZ'),
(23, '3', 'mail@gmail.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', ''),
(24, '4', 'mail@gmail.com', 'a87ff679a2f3e71d9181a67b7542122c', ''),
(25, '6', '1@gmail.com', '1679091c5a880faf6fb5e6087eb1b2dc', ''),
(26, 'Yogi', 'mail@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_cust`
--

CREATE TABLE `user_cust` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cust`
--

INSERT INTO `user_cust` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(10, 'yogi', 'mail@gmail.com', 'yogi', 'c4ca4238a0b923820dcc509a6f75849b'),
(12, 'Bachtiar', 'bachtiarnuryogipratama@gmail.com', 'bachtiar', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cust`
--
ALTER TABLE `user_cust`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_cust`
--
ALTER TABLE `user_cust`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;