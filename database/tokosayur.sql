-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 06:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosayur`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `notelefon` varchar(15) NOT NULL,
  `alamat_pembeli` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `gender`, `notelefon`, `alamat_pembeli`) VALUES
(1, 'Devi Alvian', 'Wanita', '089734912681', 'Karawang, Indonesia'),
(2, 'Aryrach', 'Pria', '08772176543', 'Jakarta, Indonesia'),
(3, 'Tiovan', 'Pria', '089573823432', 'Bogor, Indonesia'),
(4, 'Syifaya', 'Wanita', '08782540639', 'Yogyakarta, Indonesia'),
(5, 'Oktiriana', 'Wanita', '08934358175', 'Bandung, Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `sayuran`
--

CREATE TABLE `sayuran` (
  `id_sayur` int(11) NOT NULL,
  `nama_sayur` varchar(25) NOT NULL,
  `jenis_sayur` varchar(25) NOT NULL,
  `stok` varchar(25) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sayuran`
--

INSERT INTO `sayuran` (`id_sayur`, `nama_sayur`, `jenis_sayur`, `stok`, `harga`, `foto`) VALUES
(1, 'Kangkung', 'Sayuran Hijau', '98', '3000', 'kangkung.jpg'),
(2, 'Kangkung 2 ikat', 'Sayuran Hijau', '98', '5000', 'kung.jpg'),
(6, 'Garam sachet', 'Bumbu', '98', '2000', 'garam.jpg'),
(7, 'Gula Putih', 'Bumbu', '99', '5000', 'GulaPutih1.jpg'),
(8, 'Gula Merah', 'Bumbu', '100', '1000', 'GulaMerah.jpg'),
(9, 'Gula Merah 1kg', 'Bumbu', '100', '15000', 'Gula1kg.jpg'),
(10, 'Merica Bubuk', 'Bumbu', '100', '2000', 'Merica.jpg'),
(11, 'Kecap sachet', 'Bumbu', '100', '1000', 'KecapSachet.jpg'),
(12, 'Kecap Botol', 'Bumbu', '100', '10000', 'KecapBotol.jpg'),
(13, 'Kecap Besar', 'Bumbu', '100', '18000', 'KecapBesar.jpg'),
(15, 'Micin (MSG)', 'Bumbu', '100', '3000', 'msg.jpg'),
(16, 'Kunyit Bubuk', 'Bumbu', '100', '3000', 'kunyit.jpg'),
(17, 'Penyedap Rasa', 'Bumbu', '100', '1000', 'penyedaprasa.jpg'),
(18, 'Pakbum 1', 'Paket', '49', '10000', 'pakbum1.jpg'),
(19, 'Pakbum 2', 'Paket', '50', '20000', 'pakbum2.jpg'),
(20, 'Pakbum 3', 'Paket', '50', '30000', 'pakbum3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(10, 'admin', 'admin@gmail.com', 'admin123', 'admin'),
(11, 'wahyu', 'wahyu@gmail.com', 'wahyu88', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `sayuran`
--
ALTER TABLE `sayuran`
  ADD PRIMARY KEY (`id_sayur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sayuran`
--
ALTER TABLE `sayuran`
  MODIFY `id_sayur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
