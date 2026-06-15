-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 06:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_dwitadiyahpratiwi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('regular','imax','velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(50) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(22, 'The Batman', '2026-06-20 13:00:00', 150, '45000.00', 'regular', 'Dolby Digital 5.1', 'Row G', NULL, NULL, NULL, NULL),
(23, 'The Batman', '2026-06-20 16:00:00', 150, '45000.00', 'regular', 'Dolby Digital 5.1', 'Row E', NULL, NULL, NULL, NULL),
(24, 'Spider-Man: No Way Home', '2026-06-20 14:15:00', 120, '40000.00', 'regular', 'Standard Stereo', 'Row F', NULL, NULL, NULL, NULL),
(25, 'Spider-Man: No Way Home', '2026-06-20 19:30:00', 120, '50000.00', 'regular', 'Standard Stereo', 'Row C', NULL, NULL, NULL, NULL),
(26, 'Inception', '2026-06-21 11:00:00', 150, '40000.00', 'regular', 'Dolby Digital 5.1', 'Row A', NULL, NULL, NULL, NULL),
(27, 'Interstellar', '2026-06-21 15:30:00', 150, '45000.00', 'regular', 'Dolby Digital 5.1', 'Row D', NULL, NULL, NULL, NULL),
(28, 'The Matrix', '2026-06-21 20:00:00', 150, '50000.00', 'regular', 'Standard Stereo', 'Row B', NULL, NULL, NULL, NULL),
(29, 'Dune: Part Two', '2026-06-20 12:45:00', 300, '75000.00', 'imax', 'Dolby Atmos 12-Channel', 'Row K', 'IMAX-3D-001', 'Motion Seat Active', NULL, NULL),
(30, 'Dune: Part Two', '2026-06-20 16:15:00', 300, '75000.00', 'imax', 'Dolby Atmos 12-Channel', 'Row L', 'IMAX-3D-002', 'Motion Seat Active', NULL, NULL),
(31, 'Avatar: The Way of Water', '2026-06-20 19:00:00', 280, '85000.00', 'imax', 'IMAX Custom Sound', 'Row J', 'IMAX-3D-089', 'Wind and Water FX', NULL, NULL),
(32, 'Avatar: The Way of Water', '2026-06-21 13:00:00', 280, '80000.00', 'imax', 'IMAX Custom Sound', 'Row H', 'IMAX-3D-044', 'Wind and Water FX', NULL, NULL),
(33, 'Oppenheimer', '2026-06-21 17:00:00', 300, '80000.00', 'imax', 'Dolby Atmos 12-Channel', 'Row M', NULL, 'Subwoofer Vibration', NULL, NULL),
(34, 'Top Gun: Maverick', '2026-06-22 14:00:00', 300, '75000.00', 'imax', 'IMAX Custom Sound', 'Row K', NULL, 'G-Force Motion Simulation', NULL, NULL),
(35, 'The Avengers', '2026-06-22 20:30:00', 300, '75000.00', 'imax', 'Dolby Atmos 12-Channel', 'Row L', 'IMAX-3D-102', 'Motion Seat Active', NULL, NULL),
(36, 'La La Land', '2026-06-20 14:00:00', 40, '150000.00', 'velvet', NULL, 'Sofa Premium A1', NULL, NULL, 'Premium Quilt Pack', 'Welcome Drink & Popcorn Service'),
(37, 'La La Land', '2026-06-20 17:30:00', 40, '150000.00', 'velvet', NULL, 'Sofa Premium A2', NULL, NULL, 'Premium Quilt Pack', 'Welcome Drink & Popcorn Service'),
(38, 'Titanic', '2026-06-20 20:30:00', 40, '175000.00', 'velvet', NULL, 'Sofa Premium B1', NULL, NULL, 'Luxury Wool Blanket', 'Full Course Meal Service'),
(39, 'Titanic', '2026-06-21 12:00:00', 40, '150000.00', 'velvet', NULL, 'Sofa Premium B3', NULL, NULL, 'Luxury Wool Blanket', 'Full Course Meal Service'),
(40, 'The Godfather', '2026-06-21 16:00:00', 30, '175000.00', 'velvet', NULL, 'Suite VIP 01', NULL, NULL, 'Signature Blanket VIP', 'Personal Butler On-Call'),
(41, 'Casablanca', '2026-06-21 19:30:00', 30, '175000.00', 'velvet', NULL, 'Suite VIP 02', NULL, NULL, 'Signature Blanket VIP', 'Personal Butler On-Call'),
(42, 'Amelie', '2026-06-22 18:00:00', 40, '150000.00', 'velvet', NULL, 'Sofa Premium C1', NULL, NULL, 'Premium Quilt Pack', 'Welcome Drink & Popcorn Service');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
