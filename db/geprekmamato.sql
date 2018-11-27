-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 10:01 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geprekmamato`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_item` int(11) NOT NULL,
  `kode_item` varchar(255) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_item`, `kode_item`, `nama_item`, `satuan`, `stok`) VALUES
(1, 'BHN001', 'Ayam', 'Ekor', 12),
(2, 'INV001', 'Paper Box', 'Pcs', 95),
(5, 'BHN004', 'Gubis', 'Kilo', 1),
(6, 'INV002', 'Plastik', 'Pcs', 5),
(7, 'BHN002', 'Timun', 'Kilo', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gudang_in`
--

CREATE TABLE `gudang_in` (
  `id_item_in` int(11) NOT NULL,
  `kode_item` varchar(255) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang_in`
--

INSERT INTO `gudang_in` (`id_item_in`, `kode_item`, `tanggal_beli`, `harga_beli`, `jumlah`, `keterangan`) VALUES
(2, 'BHN001', '2018-11-14', 10000, 5, 'masuk 5');

--
-- Triggers `gudang_in`
--
DELIMITER $$
CREATE TRIGGER `item_gudang_in` AFTER INSERT ON `gudang_in` FOR EACH ROW BEGIN
UPDATE gudang SET stok=stok+NEW.jumlah
WHERE kode_item = NEW.kode_item;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gudang_out`
--

CREATE TABLE `gudang_out` (
  `id_item_out` int(11) NOT NULL,
  `kode_item` varchar(255) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `gudang_out`
--
DELIMITER $$
CREATE TRIGGER `item_gudang_out` AFTER INSERT ON `gudang_out` FOR EACH ROW BEGIN
UPDATE gudang SET stok=stok-NEW.jumlah
WHERE kode_item = NEW.kode_item;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `id_kategori_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `id_kategori_menu`) VALUES
(2, 'Jamur Krispi', 6000, 3),
(5, 'Nasi + Ayam Geprek', 12000, 1),
(6, 'Nasi Uduk + Ayam Geprek', 14000, 1),
(7, 'Indomie + Ayam Geprek', 15000, 1),
(8, 'Nasi Goreng Kari + Ayam Geprek', 16000, 1),
(9, 'Tahu', 1500, 3),
(10, 'Tempe', 1500, 3),
(11, 'Terong Goreng', 2000, 3),
(12, 'Es Teh', 2000, 2),
(13, 'Es Nutrisari', 3000, 2),
(14, 'Kopi', 2000, 2),
(15, 'Ayam Geprek', 10000, 1),
(16, 'Nasi Putih', 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `nama_promo` varchar(255) NOT NULL,
  `nilai_promo` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `nilai_promo`, `keterangan`) VALUES
(10, 'promo 2', 30, 'Promo 30%'),
(11, 'Tanpa Promo', 0, 'NO Promo');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `waktu_transaksi` time NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `id_user_transaksi` int(11) NOT NULL,
  `id_menu_transaksi` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_promo_transaksi` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `dibayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `waktu_transaksi`, `no_transaksi`, `nama_customer`, `id_user_transaksi`, `id_menu_transaksi`, `quantity`, `id_promo_transaksi`, `total_bayar`, `dibayar`, `kembali`) VALUES
(162, '2018-11-07', '09:30:11', 'TRANSID-5BE24E337EE56', 'Test', 1, 12, 2, 11, 4000, 0, 0),
(163, '2018-11-07', '09:30:11', 'TRANSID-5BE24E337EE56', 'Test', 1, 5, 1, 11, 12000, 0, 0),
(164, '2018-11-07', '09:30:11', 'TRANSID-5BE24E337EE56', 'Test', 1, 7, 1, 11, 15000, 0, 0),
(165, '2018-11-07', '10:54:58', 'TRANSID-5BE262123CC88', 'Customer 1', 1, 5, 2, 11, 24000, 0, 0),
(166, '2018-11-07', '11:01:20', 'TRANSID-5BE263901955D', 'Customer 2', 1, 8, 1, 11, 16000, 0, 0),
(167, '2018-11-07', '13:44:18', 'TRANSID-5BE289C2EEF49', 'Test', 1, 12, 4, 10, 8000, 0, 0),
(168, '2018-11-07', '13:44:18', 'TRANSID-5BE289C2EEF49', 'Test', 1, 5, 2, 10, 24000, 0, 0),
(169, '2018-11-07', '13:44:18', 'TRANSID-5BE289C2EEF49', 'Test', 1, 6, 2, 10, 28000, 0, 0),
(170, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 13, 4, 11, 12000, 0, 0),
(171, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 5, 1, 11, 12000, 0, 0),
(172, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 6, 1, 11, 14000, 0, 0),
(173, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 8, 2, 11, 32000, 0, 0),
(174, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 2, 1, 11, 6000, 0, 0),
(175, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 7, 1, 11, 15000, 0, 0),
(176, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 10, 2, 11, 3000, 0, 0),
(177, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 9, 6, 11, 9000, 0, 0),
(178, '2018-11-07', '14:59:55', 'TRANSID-5BE29B7BA8181', 'Rizki', 1, 12, 10, 11, 20000, 0, 0),
(179, '2018-11-07', '15:32:52', 'TRANSID-5BE2A334EBCE1', 'Rizki', 1, 5, 1, 11, 12000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'c93ccd78b2076528346216b3b2f701e6', 1),
(2, 'kasir', 'e56f0aaba50c35295d1292ff295f117c', 2),
(3, 'gudang', 'adbb75213665a1b2f0d172b2a9f5d718', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `kode_item` (`kode_item`),
  ADD KEY `kode_item_2` (`kode_item`);

--
-- Indexes for table `gudang_in`
--
ALTER TABLE `gudang_in`
  ADD PRIMARY KEY (`id_item_in`),
  ADD KEY `kode_item` (`kode_item`);

--
-- Indexes for table `gudang_out`
--
ALTER TABLE `gudang_out`
  ADD PRIMARY KEY (`id_item_out`),
  ADD KEY `kode_item` (`kode_item`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori_menu` (`id_kategori_menu`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user_transaksi` (`id_user_transaksi`),
  ADD KEY `id_menu_transaksi` (`id_menu_transaksi`),
  ADD KEY `id_promo_transaksi` (`id_promo_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gudang_in`
--
ALTER TABLE `gudang_in`
  MODIFY `id_item_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gudang_out`
--
ALTER TABLE `gudang_out`
  MODIFY `id_item_out` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gudang_in`
--
ALTER TABLE `gudang_in`
  ADD CONSTRAINT `gudang_in_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `gudang` (`kode_item`);

--
-- Constraints for table `gudang_out`
--
ALTER TABLE `gudang_out`
  ADD CONSTRAINT `gudang_out_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `gudang` (`kode_item`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori_menu`) REFERENCES `kategori_menu` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user_transaksi`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_menu_transaksi`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_promo_transaksi`) REFERENCES `promo` (`id_promo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
