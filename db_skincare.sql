-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 03:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_kulit`
--

CREATE TABLE `tb_jenis_kulit` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_kulit`
--

INSERT INTO `tb_jenis_kulit` (`id`, `nama`) VALUES
(1, 'Kering'),
(2, 'Normal'),
(3, 'Berminyak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_skincare`
--

CREATE TABLE `tb_jenis_skincare` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_skincare`
--

INSERT INTO `tb_jenis_skincare` (`id`, `nama`) VALUES
(1, 'Facial Wash'),
(2, 'Moisturizer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita','Lainnya') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `role`, `email`, `password`) VALUES
(1, 'Cole Palmer', 'Pria', '1998-07-11', 'West London UK', 'Admin', 'colepalmer@yopmail.com', 'f4b28e76227655e2f75926a7939b12f4960b40e7'),
(2, 'Budi Santoso', 'Pria', '1990-01-01', 'Jalan Merdeka 1', 'User', 'budi@example.com', 'e38ad214943daad1d64c102faec29de4afe9da3d'),
(3, 'Siti Aminah', 'Wanita', '1991-02-02', 'Jalan Merdeka 2', 'User', 'siti@example.com', '2aa60a8ff7fcd473d321e0146afd9e26df395147'),
(4, 'Andi Wijaya', 'Pria', '1992-03-03', 'Jalan Merdeka 3', 'User', 'andi@example.com', '1119cfd37ee247357e034a08d844eea25f6fd20f'),
(5, 'Dewi Lestari', 'Wanita', '1993-04-04', 'Jalan Merdeka 4', 'User', 'dewi@example.com', 'a1d7584daaca4738d499ad7082886b01117275d8'),
(6, 'Agus Salim', 'Pria', '1994-05-05', 'Jalan Merdeka 5', 'User', 'agus@example.com', 'edba955d0ea15fdef4f61726ef97e5af507430c0'),
(7, 'Nurul Hidayah', 'Wanita', '1995-06-06', 'Jalan Merdeka 6', 'User', 'nurul@example.com', '6d749e8a378a34cf19b4c02f7955f57fdba130a5'),
(8, 'Joko Susilo', 'Pria', '1996-07-07', 'Jalan Merdeka 7', 'User', 'joko@example.com', '330ba60e243186e9fa258f9992d8766ea6e88bc1'),
(9, 'Fitri Ayu', 'Wanita', '1997-08-08', 'Jalan Merdeka 8', 'User', 'fitri@example.com', 'a8dbbfa41cec833f8dd42be4d1fa9a13142c85c2'),
(10, 'Hendra Pratama', 'Pria', '1998-09-09', 'Jalan Merdeka 9', 'User', 'hendra@example.com', '024b01916e3eaec66a2c4b6fc587b1705f1a6fc8'),
(11, 'Lestari Wulan', 'Wanita', '1999-10-10', 'Jalan Merdeka 10', 'User', 'lestari@example.com', 'f68ec41cde16f6b806d7b04c705766b7318fbb1d'),
(12, 'Doni Rahmat', 'Pria', '1980-11-11', 'Jalan Merdeka 11', 'User', 'doni@example.com', 'ddf6c9a1df4d57aef043ca8610a5a0dea097af0b'),
(13, 'Sri Wahyuni', 'Wanita', '1981-12-12', 'Jalan Merdeka 12', 'User', 'sri@example.com', '10c28f9cf0668595d45c1090a7b4a2ae98edfa58'),
(14, 'Bayu Nugroho', 'Pria', '1982-01-13', 'Jalan Merdeka 13', 'User', 'bayu@example.com', 'd505832286e2c1d2839f394de89b3af8dc3f8c1f'),
(15, 'Intan Permatasari', 'Wanita', '1983-02-14', 'Jalan Merdeka 14', 'User', 'intan@example.com', '89f747bced37a9d8aee5c742e2aea373278eb29f'),
(16, 'Rudi Hartono', 'Pria', '1984-03-15', 'Jalan Merdeka 15', 'User', 'rudi@example.com', 'bd021e21c14628faa94d4aaac48c869d6b5d0ec3'),
(17, 'Yuni Kartika', 'Wanita', '1985-04-16', 'Jalan Merdeka 16', 'User', 'yuni@example.com', '3de778e515e707114b622e769a308d1a2f84052b'),
(18, 'Fajar Setiawan', 'Pria', '1986-05-17', 'Jalan Merdeka 17', 'User', 'fajar@example.com', 'b9c3d15c70a945d9e308ac763dd254b47c29bc0a'),
(19, 'Rina Andriani', 'Wanita', '1987-06-18', 'Jalan Merdeka 18', 'User', 'rina@example.com', 'e7369527332f65fe86c44d87116801a0f4fbe5d3'),
(20, 'Teguh Prasetyo', 'Pria', '1988-07-19', 'Jalan Merdeka 19', 'User', 'teguh@example.com', '2c30de294b2ca17d5c356645a04ff4d0de832594'),
(21, 'Dina Kusuma', 'Wanita', '1989-08-20', 'Jalan Merdeka 20', 'User', 'dina@example.com', '6b00888703d6cae5654e2d2a6de79c42bbf94497'),
(22, 'Fauzi Mubarok', 'Pria', '1999-07-17', ' Jalan Merdeka 21', 'User', 'fauzi@gmail.com', '31383f56e8ffca55b083f1b2bbf0444059a77949');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_skincare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id`, `id_pengguna`, `id_skincare`) VALUES
(1, 7, 8),
(2, 2, 5),
(3, 4, 7),
(4, 5, 4),
(5, 3, 3),
(6, 8, 4),
(7, 6, 7),
(8, 5, 7),
(9, 5, 6),
(10, 3, 7),
(11, 6, 8),
(12, 4, 6),
(13, 10, 4),
(14, 4, 6),
(15, 4, 7),
(16, 7, 7),
(17, 5, 4),
(18, 4, 5),
(19, 5, 6),
(20, 2, 4),
(21, 10, 4),
(22, 7, 4),
(23, 7, 3),
(24, 8, 5),
(25, 7, 7),
(26, 22, 6),
(27, 22, 5),
(28, 22, 5),
(29, 22, 5),
(30, 22, 5),
(31, 22, 5),
(32, 22, 6),
(33, 22, 4),
(34, 22, 4),
(35, 22, 4),
(36, 22, 5),
(37, 22, 7),
(38, 22, 7),
(39, 22, 8),
(40, 22, 4),
(41, 22, 3),
(42, 22, 3),
(43, 22, 4),
(44, 22, 4),
(45, 22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_skincare`
--

CREATE TABLE `tb_skincare` (
  `id` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `gambar` varchar(155) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis_skincare` int(11) DEFAULT NULL,
  `id_jenis_kulit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_skincare`
--

INSERT INTO `tb_skincare` (`id`, `merk`, `detail`, `gambar`, `harga`, `id_jenis_skincare`, `id_jenis_kulit`) VALUES
(1, 'Cetaphil Gentle Skin Cleanser', 'Pembersih wajah yang lembut untuk semua jenis kulit.', NULL, 10000, 1, 1),
(2, 'Neutrogena Hydro Boost Water Gel', 'Gel pelembab yang ringan dan melembabkan kulit kering.', NULL, 15000, 2, 2),
(3, 'CeraVe Hydrating Cleanser', 'Pembersih wajah yang menghidrasi untuk kulit normal hingga kering.', NULL, 20000, 1, 3),
(4, 'La Roche-Posay Toleriane Hydrating Cleanser', 'Pembersih wajah untuk kulit sensitif dan kering.', NULL, 25000, 1, 1),
(5, 'The Ordinary Niacinamide 10% + Zinc 1%', 'Serum yang mengurangi noda dan memperbaiki tekstur kulit.', NULL, 30000, 2, 2),
(6, 'Paula’s Choice 2% BHA Liquid Exfoliant', 'Eksfolian yang efektif menghilangkan sel kulit mati.', NULL, 10000, 2, 3),
(7, 'Olay Regenerist Micro-Sculpting Cream', 'Krim anti-aging yang memperbaiki tekstur kulit.', NULL, 15000, 2, 1),
(8, 'Kiehl’s Ultra Facial Cream', 'Krim pelembab yang memberikan hidrasi sepanjang hari.', NULL, 20000, 2, 2),
(9, 'Bioderma Sensibio H2O', 'Micellar water yang membersihkan dan menenangkan kulit sensitif.', 'flash.png', 29000, 1, 1),
(10, 'Vichy Mineral 89', 'Booster harian yang memperkuat kulit dengan mineral dan hyaluronic acid.', NULL, 30000, 2, 1),
(11, 'Laneige Water Sleeping Mask', 'Masker tidur yang memberikan hidrasi intensif sepanjang malam.', NULL, 10000, 2, 2),
(12, 'Drunk Elephant C-Firma Day Serum', 'Serum vitamin C yang mencerahkan dan mengencangkan kulit.', NULL, 15000, 2, 3),
(13, 'Skinceuticals C E Ferulic', 'Serum antioksidan yang melindungi kulit dari radikal bebas.', NULL, 20000, 2, 1),
(14, 'Tatcha The Water Cream', 'Krim pelembab yang ringan dengan hasil akhir matte.', NULL, 25000, 2, 2),
(16, 'First Aid Beauty Ultra Repair Cream', 'Krim pelembab yang kaya untuk kulit sangat kering.', NULL, 10000, 2, 1),
(17, 'Glossier Milky Jelly Cleanser', 'Pembersih wajah yang lembut dan efektif membersihkan makeup.', NULL, 15000, 1, 2),
(18, 'Mario Badescu Facial Spray', 'Spray wajah yang menyegarkan dan melembabkan kulit.', NULL, 20000, 2, 3),
(19, 'Pixi Glow Tonic', 'Toner eksfoliasi yang mencerahkan kulit.', NULL, 25000, 2, 1),
(20, 'Sunday Riley Good Genes', 'Treatment eksfoliasi yang memperbaiki tekstur dan kilau kulit.', NULL, 30000, 2, 2),
(21, 'Test', 'ini test', 'gift.png', 30000, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_kulit`
--
ALTER TABLE `tb_jenis_kulit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_skincare`
--
ALTER TABLE `tb_jenis_skincare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_skincare` (`id_skincare`);

--
-- Indexes for table `tb_skincare`
--
ALTER TABLE `tb_skincare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_skincare` (`id_jenis_skincare`),
  ADD KEY `id_jenis_kulit` (`id_jenis_kulit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_kulit`
--
ALTER TABLE `tb_jenis_kulit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jenis_skincare`
--
ALTER TABLE `tb_jenis_skincare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_skincare`
--
ALTER TABLE `tb_skincare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `tb_riwayat_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_riwayat_ibfk_2` FOREIGN KEY (`id_skincare`) REFERENCES `tb_skincare` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_skincare`
--
ALTER TABLE `tb_skincare`
  ADD CONSTRAINT `tb_skincare_ibfk_1` FOREIGN KEY (`id_jenis_skincare`) REFERENCES `tb_jenis_skincare` (`id`),
  ADD CONSTRAINT `tb_skincare_ibfk_2` FOREIGN KEY (`id_jenis_kulit`) REFERENCES `tb_jenis_kulit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
