-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 02:14 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appindosat`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `last_modify` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `after_insert` AFTER INSERT ON `barang` FOR EACH ROW INSERT INTO history SET SN = NEW.sn, site = NEW.site, brand = NEW.brand, desk = NEW.deskripsi, username=NEW.last_modify, action="Insert"
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update` AFTER UPDATE ON `barang` FOR EACH ROW INSERT INTO history SET SN = NEW.sn, site = NEW.site, brand = NEW.brand, desk = NEW.deskripsi, username=NEW.last_modify, action="Update"
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `site` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `SN` varchar(255) NOT NULL,
  `desk` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `site`, `brand`, `SN`, `desk`, `username`, `action`, `time`) VALUES
(109, 'Gudang', 'HP', 'A123', 'A', 'admin', 'Insert', '2021-09-06 13:41:18'),
(110, 'Gudang', 'HP', 'B123', 'OK', 'admin', 'Insert', '2021-09-06 13:41:35'),
(111, 'Gudang', 'HP', 'C123', 'OK', 'admin', 'Insert', '2021-09-06 13:41:56'),
(112, '', '', 'C123', '', 'admin', 'Delete', '2021-09-06 13:42:15'),
(113, '', '', 'B123', '', 'admin2', 'Delete', '2021-09-06 13:43:07'),
(114, '', '', 'A123', '', 'admin2', 'Delete', '2021-09-06 13:46:18'),
(115, 'Gudang', 'HP', 'CN1234567890', 'ok', 'admin2', 'Insert', '2021-09-06 13:47:35'),
(116, 'Gudang', 'HP', 'OJK33390', 'ok', 'admin2', 'Insert', '2021-09-06 13:47:56'),
(117, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin2', 'Insert', '2021-09-06 13:48:20'),
(118, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin2', 'Delete', '2021-09-06 13:48:29'),
(119, 'Gudang', 'HP', 'CN1234567890', 'ok', 'admin2', 'Insert', '2021-09-06 13:51:41'),
(120, 'Gudang', 'HP', 'OJK33390', 'ok', 'admin2', 'Insert', '2021-09-06 13:51:57'),
(121, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin2', 'Insert', '2021-09-06 13:52:13'),
(122, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin2', 'Delete', '2021-09-06 13:54:45'),
(123, 'Gudang', 'HP', 'OJK33390', 'ok', 'admin2', 'Delete', '2021-09-06 13:56:17'),
(124, 'Gudang', 'HP', 'CN1234567890', 'ok', 'admin2', 'Delete', '2021-09-06 13:56:17'),
(125, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin2', 'Insert', '2021-09-06 13:56:50'),
(126, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin2', 'Insert', '2021-09-06 13:57:08'),
(127, 'Gudang 2', 'HP', '11111111', 'ok', 'admin2', 'Insert', '2021-09-06 13:57:30'),
(128, 'Gudang 2', 'HP', '11111111', 'ok', 'admin', 'Delete', '2021-09-06 13:57:53'),
(129, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin', 'Delete', '2021-09-06 13:57:53'),
(130, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin', 'Delete', '2021-09-06 13:57:53'),
(131, 'Gudang', 'HP', 'JK1112223', 'ok', 'admin', 'Insert', '2021-09-07 20:09:08'),
(132, '', '', 'JK1112223', '', 'admin', 'Update', '2021-09-07 20:10:59'),
(133, 'Gudang 2', 'HP', 'JK1112223', 'oke', 'admin', 'Update', '2021-09-07 20:12:29'),
(134, 'Gudang', 'HP', 'OJK33390', 'oke', 'admin', 'Insert', '2021-09-07 20:13:01'),
(135, 'Gudang', 'HP', 'OJK33390', 'oke', 'admin', 'Delete', '2021-09-07 20:13:15'),
(136, 'Gudang 2', 'HP', 'JK1112223', 'oke', 'admin', 'Delete', '2021-09-07 20:13:15'),
(137, 'Gudang', 'HP', 'CN1234567890', 'oke', 'admin', 'Insert', '2021-09-07 20:13:36'),
(138, 'Gudang 3', 'HP', 'CN1234567890', 'oke', 'admin2', 'Update', '2021-09-07 20:13:56'),
(139, 'Gudang 3', 'HP', 'CN1234567890', 'oke', 'admin2', 'Delete', '2021-09-07 20:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'YQ1VmgACymxmfmiKpwmJyA=='),
(20, 'admin2', 'YQ1VmgACymxmfmiKpwmJyA==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
