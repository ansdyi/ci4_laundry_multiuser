-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 05:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_laundry_mu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_pelanggan`, `alamat_pelanggan`, `jenis_kelamin`, `no_tlp`) VALUES
(10, 'Riyadh Rifaldi Rizkuloh', 'Purwakarta Kota', 'Laki-laki', '081113400005'),
(14, 'Hwang Yeji', 'Karawang Barat', 'Perempuan', '081211651180'),
(16, 'Han Jisung', 'Purwakarta Kota', 'Laki-laki', '081211657781'),
(17, 'Lee Minho', 'Purwakarta Kota', 'Laki-laki', '081113400001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `no_tlp`) VALUES
(1, 'My Laundry 1', 'Karawang Kota', '+62811-000-2'),
(2, 'My Laundry 2', 'Karawang Kota', '+62811-000-1'),
(3, 'My Laundry 3', 'Karawang Timur', '+6255-000-11'),
(4, 'My Laundry 4', 'Karawang Kota', '+6255-021-11'),
(5, 'My Laundry 5', 'Karawang Timur', '+6255-440-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis_paket` enum('Kiloan','Selimut','Bed Cover','Kaos','Lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_outlet`, `jenis_paket`, `nama_paket`, `harga`) VALUES
(12, 1, 'Kiloan', 'Semua Jenis Pakain 1 kg', 30000),
(13, 1, 'Kiloan', 'Semua Jenis Pakain 2 kg', 35000),
(14, 1, 'Kiloan', 'Semua Jenis Pakain 3 kg', 40000),
(15, 1, 'Kiloan', 'Semua Jenis Pakain 4 kg', 45000),
(16, 1, 'Kiloan', 'Semua Jenis Pakain 5 kg', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `status_transaksi` enum('Baru','Proses','Selesai','Diambil') DEFAULT NULL,
  `status_bayar` enum('Dibayar','Belum Dibayar') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl_transaksi`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status_transaksi`, `status_bayar`, `id_user`, `id_paket`, `qty`, `keterangan`) VALUES
(34, 5, 'INV0503230001', 10, '2023-03-05 21:52:00', '2023-03-05 21:52:00', '2023-03-05 21:52:00', 1000, 0, 0, 'Proses', 'Belum Dibayar', 24, 12, 3, 'Kaos'),
(35, 5, 'INV0503230002', 14, '2023-03-05 21:52:00', '2023-03-05 21:53:00', '2023-03-05 21:53:00', 5000, 0, 0, 'Selesai', 'Dibayar', 24, 13, 10, 'Kaos'),
(36, 4, 'INV0503230003', 16, '2023-03-05 22:57:00', '2023-03-05 22:57:00', '2023-03-05 22:58:00', 10000, 0, 0, 'Selesai', 'Dibayar', 26, 15, 10, 'Kaos'),
(37, 4, 'INV0503230004', 17, '2023-03-05 23:31:00', '2023-03-05 23:31:00', '2023-03-05 23:32:00', 0, 0, 0, 'Diambil', 'Dibayar', 26, 15, 1, 'Kaos');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('Admin','Kasir','Owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_pengguna`, `username`, `password`, `id_outlet`, `role`) VALUES
(24, 'Administrator', 'admin', '$2y$10$bQiYIu19NDgOkKjOWgsRXOksdbCKnSIgTp6hp7myRrpg6gKeUevQK', 2, 'Admin'),
(26, 'Anisa Damayanti', 'kasir', '$2y$10$vYU5VnreRRP9mclMbjZKkuBMFULmxfcX1TLNbpyzTJFsY.uFL129O', 4, 'Kasir'),
(27, 'December Skies Code', 'owner', '$2y$10$WUamLuc5rhiPkBfJ/wi1sOVMkLL0bQEr/l9DqZNIXSxNl3.ZQrDVG', 5, 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
