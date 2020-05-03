-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 08:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID_LOGIN` int(11) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `LEVEL` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `ID_BARANG` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `SATUAN` varchar(10) DEFAULT NULL,
  `HARGA_JUAL` double DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`ID_BARANG`, `NAMA_BARANG`, `STOK`, `SATUAN`, `HARGA_JUAL`, `STATUS`) VALUES
('BR001', 'VGA Galax Geforce RTX 2060 6GB DDR6 - Dual Fan', 0, 'unit', 5600000, ''),
('BR002', 'Prosessor AMD AM4 Raven Ridge Ryzen 3 2200G 3.5 Ghz Box', 0, 'unit', 1270000, ''),
('BR003', 'RAM GEIL DDR4 Evo Potenza PC21330 2666MHz 16GB (2x8GB)', 0, 'unit', 1230000, ''),
('BR004', 'PSU Seasonic S12III-500 80+ Bronze', 0, 'Unit', 780000, ''),
('BR005', 'Motherboard ASRock X570 Phantom Gaming X', 0, 'unit', 2700000, ''),
('BR006', 'Prosessor Intel Core i3 9100F 3.6Ghz Up To 4.2Ghz Box Coffee Lake', 0, 'unit', 1120000, ''),
('BR007', 'PSU Seasonic Prime Gold GX-1000 / 1000GD - 1000W Full Modular', 0, 'unit', 2850000, ''),
('BR008', 'VGA PowerColor RX 580 RED DRAGON 8GB GDDR5', 0, 'unit', 2870000, ''),
('BR009', 'Motherboard Fast Intel H61 Socket 1155 with HDMI Port', 0, 'unit', 656000, ''),
('BR010', 'RAM PATRIOT VIPER ELITE DDR4 8GB (2x4GB) 2666Mhz', 0, 'unit', 715000, '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID_NEWS` int(11) NOT NULL,
  `JUDUL` varchar(100) DEFAULT NULL,
  `WAKTU` datetime DEFAULT NULL,
  `ISI` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `NAMA` varchar(20) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `HP` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `ID_BELI` varchar(50) NOT NULL,
  `ID_SUPP` int(11) DEFAULT NULL,
  `ID_BARANG` varchar(100) DEFAULT NULL,
  `ID_LOGIN` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `SATUAN` varchar(10) DEFAULT NULL,
  `HARGA_BELI` double DEFAULT NULL,
  `TGL_BELI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_PENJUALAN` varchar(100) NOT NULL,
  `ID_PELANGGAN` int(11) DEFAULT NULL,
  `ID_LOGIN` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` date DEFAULT NULL,
  `JUMLAH_BELI` int(11) DEFAULT NULL,
  `TOTAL_HARGA` double DEFAULT NULL,
  `BAYAR_TOTAL` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pre_penjualan`
--

CREATE TABLE `pre_penjualan` (
  `KD_PENJUALAN` int(11) NOT NULL,
  `ID_PENJUALAN` varchar(100) DEFAULT NULL,
  `ID_BARANG` varchar(100) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `ID_PROMO` int(11) NOT NULL,
  `JUDUL` varchar(100) DEFAULT NULL,
  `WAKTU` datetime DEFAULT NULL,
  `ISI` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPP` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `NO_HP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_SUPP`, `NAMA`, `ALAMAT`, `NO_HP`) VALUES
(20201, 'PT. HM Sampoerna', 'Jl. Sempol Blok P10, Vatican City', '083767847563'),
(20202, 'PT. Gudang Garam 2', 'Jl. Bunguran Asih', '083767847563');

-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `ID_WARRANTY` int(11) NOT NULL,
  `ID_PELANGGAN` int(11) DEFAULT NULL,
  `KD_PENJUALAN` int(11) DEFAULT NULL,
  `TANGGAL_HABIS` date DEFAULT NULL,
  `SISA_HARI` int(11) DEFAULT NULL,
  `STATUS` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_LOGIN`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`ID_BARANG`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID_NEWS`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`ID_BELI`),
  ADD KEY `FK_REFERENCE_4` (`ID_SUPP`),
  ADD KEY `FK_REFERENCE_5` (`ID_BARANG`),
  ADD KEY `FK_REFERENCE_6` (`ID_LOGIN`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_PENJUALAN`),
  ADD KEY `FK_REFERENCE_8` (`ID_PELANGGAN`),
  ADD KEY `FK_REFERENCE_9` (`ID_LOGIN`);

--
-- Indexes for table `pre_penjualan`
--
ALTER TABLE `pre_penjualan`
  ADD PRIMARY KEY (`KD_PENJUALAN`),
  ADD KEY `FK_REFERENCE_11` (`ID_PENJUALAN`),
  ADD KEY `FK_REFERENCE_12` (`ID_BARANG`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`ID_PROMO`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPP`);

--
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`ID_WARRANTY`),
  ADD KEY `FK_REFERENCE_10` (`ID_PELANGGAN`),
  ADD KEY `FK_REFERENCE_13` (`KD_PENJUALAN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_SUPP`) REFERENCES `supplier` (`ID_SUPP`),
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_BARANG`) REFERENCES `master_barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_LOGIN`) REFERENCES `login` (`ID_LOGIN`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`),
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_LOGIN`) REFERENCES `login` (`ID_LOGIN`);

--
-- Constraints for table `pre_penjualan`
--
ALTER TABLE `pre_penjualan`
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_PENJUALAN`) REFERENCES `penjualan` (`ID_PENJUALAN`),
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`ID_BARANG`) REFERENCES `master_barang` (`ID_BARANG`);

--
-- Constraints for table `warranty`
--
ALTER TABLE `warranty`
  ADD CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`),
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`KD_PENJUALAN`) REFERENCES `pre_penjualan` (`KD_PENJUALAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
