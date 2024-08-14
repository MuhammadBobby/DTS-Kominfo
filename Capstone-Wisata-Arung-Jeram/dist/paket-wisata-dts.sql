-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 12:09 PM
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
-- Database: `paket-wisata-dts`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `max_orang` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `image`, `nama_paket`, `max_orang`, `deskripsi`, `harga_paket`) VALUES
(1, 'paketSmall.jpg', 'small', 9, 'Paket Small adalah paket wisata arung jeram / rafting untuk 4-9 pengunjung. Paket ini ditujukan untuk para pengunjung dengan kelompok kecil sekali rafting dengan harga terjangkau.', 900000),
(2, 'paketMedium.jpg', 'medium', 15, 'Paket Medium adalah paket wisata arung jeram / rafting untuk 10-15 pengunjung. Paket ini ditujukan untuk para pengunjung dengan kelompok rafting yang cukup besar untuk sekali rafting.', 1000000),
(3, 'paketParty.jpg', 'party', 20, 'Paket Party adalah paket wisata arung jeram / rafting untuk 15-20 pengunjung. Paket ini untuk anda yang akan menikmati rafting beramai-ramai untuk sekali perjalanan rafting.', 1100000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `paket_id` int(11) NOT NULL,
  `penginapan` varchar(10) NOT NULL,
  `transportasi` varchar(10) NOT NULL,
  `makan` varchar(10) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `total_tagihan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `no_hp`, `tanggal_pesan`, `paket_id`, `penginapan`, `transportasi`, `makan`, `harga`, `total_tagihan`) VALUES
(1, 'Muhammad Bobby', '082265453762', '2024-08-15', 1, 'tidak', 'ya', 'ya', 900000.00, 2600000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket_pemesanan` (`paket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `paket_pemesanan` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
