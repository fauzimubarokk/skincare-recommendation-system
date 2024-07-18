-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 03:12 PM
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
(1, 'Cole Palmer', 'Pria', '1998-07-11', 'West London UK', 'Admin', 'colepalmer@yopmail.com', '7bff2eed1233efbeea7119cb5d4e66b1192ce4ac'),
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
(22, 'Fauzi Mubarok', 'Pria', '1999-07-17', ' Jalan Merdeka 21', 'User', 'fauzi@gmail.com', '31383f56e8ffca55b083f1b2bbf0444059a77949'),
(23, 'Fauzi Mubarok', 'Pria', '2024-07-24', ' london', 'User', 'fauzia@gmail.com', 'cab60b2f32211827a150e9c2c0b6a319f030a9d2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
