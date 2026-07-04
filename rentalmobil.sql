-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2026 at 08:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) DEFAULT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`) VALUES
(1, 'amritama', 'amri', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `kostumer`
--

CREATE TABLE `kostumer` (
  `kostumer_id` int(11) NOT NULL,
  `kostumer_nama` varchar(100) DEFAULT NULL,
  `kostumer_alamat` text DEFAULT NULL,
  `kostumer_jk` varchar(10) DEFAULT NULL,
  `kostumer_hp` varchar(20) DEFAULT NULL,
  `kostumer_ktp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kostumer`
--

INSERT INTO `kostumer` (`kostumer_id`, `kostumer_nama`, `kostumer_alamat`, `kostumer_jk`, `kostumer_hp`, `kostumer_ktp`) VALUES
(2, 'Zainal Abidin', 'Jl. gagak putih no 627, medan, Indonesia', 'L', '082737373787', '998798798798'),
(3, 'Marlon Suwanggai', 'Jl. supapa no.23, Bekasi, Indonesia', 'L', '081234554443', '434534343434'),
(4, 'Muhammad Zainal', 'jl. merpati putih 2, no.66, Indonesia', 'L', '081212121212', '232323232330'),
(5, 'Ratna Dewi', 'Jl. ampera selatan, no. 67, jawa barat, indonesia', 'L', '081112122219', '232231131313'),
(6, 'Samsul Bahri', 'jl. peletok, jawa timur, indonesia', 'L', '081212221221', '876876876786'),
(8, 'amritama', 'rawa panjang', 'L', '081201020304', '327511666611');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `mobil_id` int(11) NOT NULL,
  `mobil_merk` varchar(30) DEFAULT NULL,
  `mobil_plat` varchar(20) DEFAULT NULL,
  `mobil_warna` varchar(30) DEFAULT NULL,
  `mobil_tahun` int(11) DEFAULT NULL,
  `mobil_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`mobil_id`, `mobil_merk`, `mobil_plat`, `mobil_warna`, `mobil_tahun`, `mobil_status`) VALUES
(2, 'Toyota Avanza', 'B 7777 xx', 'Hitam Metalik', 2018, 1),
(3, 'Honda Brio', 'B 1111 AA', 'Putih Mutiara', 2016, 1),
(4, 'Toyota Fortuner', 'BK 2222 XX', 'Hitam Metalik', 2017, 1),
(5, 'Suzuki Swift', 'B 2333 B', 'Putih', 2016, 1),
(6, 'Toyota Innova', 'B 1222 BB', 'Hitam', 2015, 1),
(9, 'BYD Seal', 'B 4 MRI', 'Black', 2026, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_karyawan` int(11) DEFAULT NULL,
  `transaksi_kostumer` int(11) DEFAULT NULL,
  `transaksi_mobil` int(11) DEFAULT NULL,
  `transaksi_tgl_pinjam` date DEFAULT NULL,
  `transaksi_tgl_kembali` date DEFAULT NULL,
  `transaksi_harga` int(11) DEFAULT NULL,
  `transaksi_denda` int(11) DEFAULT NULL,
  `transaksi_tgl` date DEFAULT NULL,
  `transaksi_totaldenda` int(11) DEFAULT NULL,
  `transaksi_status` int(11) DEFAULT NULL,
  `transaksi_tgldikembalikan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_karyawan`, `transaksi_kostumer`, `transaksi_mobil`, `transaksi_tgl_pinjam`, `transaksi_tgl_kembali`, `transaksi_harga`, `transaksi_denda`, `transaksi_tgl`, `transaksi_totaldenda`, `transaksi_status`, `transaksi_tgldikembalikan`) VALUES
(1, 1, 2, 5, '2017-10-29', '2017-10-31', 500000, 100000, '2017-10-29', 200000, 1, '2017-11-02'),
(2, 1, 3, 2, '2017-10-29', '2017-10-30', 100000, 200000, '2017-10-30', 0, 1, '2017-10-30'),
(3, NULL, 5, 2, '2026-02-02', '2026-03-03', 100000, 50000, '2026-02-02', 100000, 1, '2026-03-01'),
(5, NULL, 8, 9, '2026-01-03', '2026-01-05', 500000, 50000, '2026-01-02', 250000, 1, '2026-01-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `kostumer`
--
ALTER TABLE `kostumer`
  ADD PRIMARY KEY (`kostumer_id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`mobil_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `transaksi_karyawan` (`transaksi_karyawan`),
  ADD KEY `transaksi_kostumer` (`transaksi_kostumer`),
  ADD KEY `transaksi_mobil` (`transaksi_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kostumer`
--
ALTER TABLE `kostumer`
  MODIFY `kostumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `mobil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`transaksi_karyawan`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`transaksi_kostumer`) REFERENCES `kostumer` (`kostumer_id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`transaksi_mobil`) REFERENCES `mobil` (`mobil_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
