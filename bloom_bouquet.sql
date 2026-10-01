-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2026 at 01:52 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloom_bouquet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Admin Bloom', 'admin@gmail.com', 'admin123', '2026-09-29 05:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `deskripsi`, `harga`, `stok`, `gambar`, `created_at`) VALUES
(1, 'Rose Romance', 'Flower Bouquet', 'Bouquet mawar merah dengan tampilan elegan untuk hadiah spesial.', 150000.00, 10, 'rose-romance.jpg', '2026-09-29 04:27:59'),
(2, 'Sweet Pastel', 'Flower Bouquet', 'Bouquet bunga bernuansa pastel dengan tampilan lembut dan manis.', 125000.00, 8, 'sweet-pastel.jpg', '2026-09-29 04:27:59'),
(3, 'Golden Bloom', 'Flower Bouquet', 'Bouquet bunga dengan perpaduan warna cerah untuk memberikan kesan hangat.', 135000.00, 12, 'golden-bloom.jpg', '2026-09-29 04:27:59'),
(4, 'Lavender Dream', 'Flower Bouquet', 'Bouquet bunga bernuansa ungu dengan tampilan cantik dan elegan.', 140000.00, 7, 'lavender-dream.jpg', '2026-09-29 04:27:59'),
(5, 'Snack Love', 'Snack Bouquet', 'Bouquet berisi berbagai snack yang cocok sebagai hadiah untuk orang tersayang.', 85000.00, 15, 'snack-love.jpg', '2026-09-29 04:27:59'),
(6, 'Money Bloom', 'Money Bouquet', 'Bouquet dengan konsep uang yang cocok untuk hadiah ulang tahun dan perayaan spesial.', 200000.00, 5, 'money-bloom.jpg', '2026-09-29 04:27:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
