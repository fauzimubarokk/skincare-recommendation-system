-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2024 at 08:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_skincare`
--

INSERT INTO `tb_skincare` (`id`, `merk`, `detail`, `gambar`, `harga`, `id_jenis_skincare`, `id_jenis_kulit`) VALUES
(1, 'Ms. Pimple Acne Solution Moisturizing Gel', 'Ms. Pimple Moisturizing Gel adalah teman sehari – harimu untuk\nmerawat kulitmu yang cenderung mudah jerawatan. Lawan\nbakteri penyebab timbulnya jerawat dan kurangi kemerahan\ndengan ekstrak Rosebay Willowherb. Mengandung SPF 15 untuk\nmelindungi kulit dari sinar UV sekaligus memberi kelembapan\npada kulit.\nIni merupakan produk skincare dari Emina Cosmectics', 'emina-ms-pimple-moisturizer.jpeg', 29700, 2, 3),
(2, 'Beausta All In One', 'Pelembab all-in-one menggabungkan 3 produk sekaligus: toner, lotion, dan essence. Juga ditambahkan dengan: efek pmencerahkan, pelembab dan anti-penuaan. Cocok untuk semua jenis kulit.\n1.    Krim All-in-one: Serbaguna. menggabungkan manfaat toner, lotion, & essence dalam satu produk.\n2.     Pemutih, Anti Kerut: Adenosin dan Niacinamide membuat warna kulit cerah dan elastis\n3.  Triple Moisture: Teksturnya berubah dari lotion menjadi essence yang membuat kulit lembab dan segar. Isi : 1 sachet 20ml Bahan Utama: Asam Hyaluronic, Adenosin, Niacinamide', 'beausta-all-in-one.jpg', 21000, 2, 3),
(3, 'Kojie.San', 'Formula Baru dengan Hydromoist Dual Cream bisa digunakan untuk Siang dan Malam. Berfungsi untuk mencerahkan, melembabkan tanpa membuat wajah berminyak, serta meratakan warna kulit. Mengandung ekstrak tumbuhan untuk melembabkan, melembutkan, dan mengencangkan kulit wajah serta kojic acid untuk mencerahkan warna kulit', 'kojiesan.jpeg', 51000, 2, 3),
(4, 'Azarine', 'Formula Baru dengan Hydromoist Dual Cream bisa digunakan \nuntuk membersihkan jerawat dan mengontrol sebum\nDiformulasikan dengan bahan alami purslane, madu dan asam \nsalisilat membantu mencegah pertumbuhan bakteri penyebab \njerawat, mengangkat kelebihan minyak pada wajah dan \nmengecilkan pori- pori.', 'azarine.jpeg', 35000, 2, 3),
(5, 'Complex Night Cream', 'Complex Night Cream formula bahan yang terbukti secara klinis untuk meningkatkan keteguhan kulit, Pengelupasan lembut, Hidrasi dalam, dan kulit Iritasi, CNC Day Lift berbeda dari alternatif krim  anti kerut lainnya karena dibuat dengan formula khusus yang menggabungkan tiga bahan utama dengan hasil yang terbukti.', 'complex-night-cream.jpg', 318000, 2, 3),
(6, 'BioaQua', 'Selain mengandung 7x Ceramide,Produk ini memiliki ingredient \nutama yang lainnya. Centella Asiatica yang bermanfaat untuk \nmeningkatkan kada sebum atau minyak alami kulit, sehingga \nkelembapankulit dapat terjaga. Moisturizing ini juga mengandung \nWitch Hazel, serta Citrus Extract', 'bioaqua.jpeg', 57500, 2, 3),
(7, 'Bioderma', 'Bioderma Sebium Global 30 ml produk perawatan wajah yang \ndapat mengurangi jerawat dan komedo. Produk ini bekerja secara \nbiologis melawan langsung penyebab jerawat dan komedo \ntersebut. Selain melawan penyebab jerawat, produk ini juga \nmelawan akibat jerawat dengan cara mengurangi kemerahan \nakibat peradangan dan menghaluskan kulit.', 'bioderma.jpeg', 300000, 2, 3),
(8, 'Scarlet', 'Kandungan ceramide di dalam produk pelembap wajah Scarlett itu memberi \nbanyak manfaat untuk kulit, di antaranya menjaga kelembapan kulit,\nmembantu merawat skin barrier, mencegah tanda penuaan, sampai membantu \nmenghaluskan kulit.', 'scarlet.jpeg', 67000, 2, 1),
(9, 'Safi', 'Membantu mencerahkan, menyejukkan, menyamankan kulit wajah\nmembantu menyamaratakan warna kulit wajah serta memberikan \nkelembaban sepanjang malam.', 'safi.jpeg', 60500, 2, 1),
(10, 'Trueve', 'Moisturizer Gel Ini memiliki empat manfaat utama yaitu mampu menghidrasi\nkulit selama 24 jam, mencegah tanda penuaan dini, melindungi skin barirrier.', 'trueve.jpeg', 198700, 2, 1),
(11, 'L\'oreal', 'krim malam yang menandingi treatment laser. Manfaat produk :\nperawatan pencerahan kulit yang teruji VS treatment laser. Mencegah timbulnya\nnoda hitam, pori-pori tersamarkan.', 'loreal.png', 221600, 2, 1),
(12, 'Pinkberry', 'Pinkberry Gel moisturizer ringan yang memberikan kelembapan dan \nmembantu melindungi moisture barrier untuk kulit yang sehat, halus, dan \nglowing.', 'pinkberry.jpeg', 27900, 2, 1),
(13, 'Bioderma', 'Bioderma Sebium Global 30 ml produk perawatan wajah yang \ndapat mengurangi jerawat dan komedo. Produk ini bekerja secara \nbiologis melawan langsung penyebab jerawat dan komedo \ntersebut. Selain melawan penyebab jerawat, produk ini juga \nmelawan akibat jerawat dengan cara mengurangi kemerahan \nakibat peradangan dan menghaluskan kulit.', 'bioderma.jpeg', 300000, 2, 1),
(14, 'Beausta All In One', 'Pelembab all-in-one menggabungkan 3 produk sekaligus: toner, lotion, dan essence. Juga ditambahkan dengan: efek pmencerahkan, pelembab dan anti-penuaan. Cocok untuk semua jenis kulit.\n1.    Krim All-in-one: Serbaguna. menggabungkan manfaat toner, lotion, & essence dalam satu produk.\n2.     Pemutih, Anti Kerut: Adenosin dan Niacinamide membuat warna kulit cerah dan elastis\n3.  Triple Moisture: Teksturnya berubah dari lotion menjadi essence yang membuat kulit lembab dan segar. Isi : 1 sachet 20ml Bahan Utama: Asam Hyaluronic, Adenosin, Niacinamide', 'beausta-all-in-one.jpg', 29900, 2, 1),
(15, 'Inez', 'Pelembab wajah untuk kulit normal cenderung kering, dan membantu \nmempertahankan kelembabab kulit', 'inez.jpeg', 32800, 2, 2),
(16, 'Nature-E', 'Vitamin E dalam bentuk e-beads efektif meresap ke dalam kulit untuk \nmemberikan wajahmu kelembapan dan perlindungan dari sinar matahari.', 'nature.jpeg', 38000, 2, 2),
(17, 'Wardah', 'Antioksidan , Membantu mencerahkan wajah ,Menjaga kelmebaban kulit. Untuk \nmenjaga kelembapan kulit dan menjaga teksturnya biar tetap lembut untuk \ndipegang. Kulit yang lebih glowing dan segar sehat.', 'wardah.jpg', 32700, 2, 2),
(18, 'Whitelab', 'Whitelab Sleeping Mask merupakan sleeping mask yang diformulasikan\ndengan kekuatan 3 kandungan utama HyaluComplex-10, Panthenol, dan Grape \nFruit Extract yang dapat secara sinergis membantu melembapkan, \nmeningkatkan, dan mempertahankan level hidrasi kulit, serta merawat dan \nmempertahankan fungsi skin barrier wajah.', 'whitelab.jpeg', 47750, 2, 2),
(19, 'Bioderma', 'Bioderma Sebium Global 30 ml produk perawatan wajah yang \ndapat mengurangi jerawat dan komedo. Produk ini bekerja secara \nbiologis melawan langsung penyebab jerawat dan komedo \ntersebut. Selain melawan penyebab jerawat, produk ini juga \nmelawan akibat jerawat dengan cara mengurangi kemerahan \nakibat peradangan dan menghaluskan kulit.', 'bioderma.jpeg', 190000, 2, 2),
(20, 'Beausta All In One', 'Pelembab all-in-one menggabungkan 3 produk sekaligus: toner, lotion, dan essence. Juga ditambahkan dengan: efek pmencerahkan, pelembab dan anti-penuaan. Cocok untuk semua jenis kulit.\n1.    Krim All-in-one: Serbaguna. menggabungkan manfaat toner, lotion, & essence dalam satu produk.\n2.     Pemutih, Anti Kerut: Adenosin dan Niacinamide membuat warna kulit cerah dan elastis\n3.  Triple Moisture: Teksturnya berubah dari lotion menjadi essence yang membuat kulit lembab dan segar. Isi : 1 sachet 20ml Bahan Utama: Asam Hyaluronic, Adenosin, Niacinamide', 'beausta-all-in-one.jpg', 29900, 2, 2),
(21, 'Cetaphile', 'Membantu membersihkan kulit wajah dari minyak, kotoran, dan sisamake \nup Kelebihan: Non-comedogenicsehingga tidak akan menyumbat pori \nFormulapH-balanceddan bebas sabun Terasa ringan di kulit Aman \ndigunakan secara rutin GunakanCetaphil Oily Skin Cleanser 125mlyang \nsecara efektif membersihkan kulit wajah Anda.', 'cetaphile.jpeg', 236400, 1, 2),
(22, 'Wardah Lightening Micellar Gentle Wash ', 'Wardah Lightening Micellar Gentle Wash, inovasi baru pembersih wajah \ndengan Non Soap Formula, bersihkan wajah dengan lembut sekaligus jaga \nkelembaban kulit tanpa meninggalkan kesan kesat.', 'wardah-lightening-micellar-gentle-wash.jpeg', 22500, 1, 2),
(23, 'Whitelab Brightening Facial Wash', '-Niacinamide berperan untuk mencerahkan kulit, melembabkan kulit, \nCollagen berperan penting untuk meningkatkan elastisitas kulit dan mencegah kulit kusam', 'whitelab-brightening-facial-wash.jpeg', 42200, 1, 2),
(24, 'Azarine', 'Azarine Acne Gentle Cleansing Foam adalah pembersih wajah untuk \nmembersihkan jerawat dan mengontrol sebum. Diformulasikan dengan \nbahan alami purslane, madu dan asam salisilat membantu mencegah \npertumbuhan bakteri penyebab jerawat, mengangkat kelebihan minyak \npada wajah dan mengecilkan pori- pori.', 'azarine.jpeg', 35000, 1, 2),
(25, 'Ponds', 'POND?S White Beauty Spot-less Rosy White Daily Facial Foam teruji klinis \nmenyamarkan noda hitam dalam 2 minggu. Untuk kulit tampak putih merona \nnoda tersamarkan setiap hari* (*gunakan secara teratur minimal 2 kali sehari).', 'ponds.jpg', 23800, 1, 2),
(26, 'Cetaphile', 'Membantu membersihkan kulit wajah dari minyak, kotoran, dan sisamake \nup Kelebihan: Non-comedogenicsehingga tidak akan menyumbat pori \nFormulapH-balanceddan bebas sabun Terasa ringan di kulit Aman \ndigunakan secara rutin GunakanCetaphil Oily Skin Cleanser 125mlyang \nsecara efektif membersihkan kulit wajah Anda.', 'cetaphile.jpeg', 236400, 1, 3),
(27, 'Emina Ms. Pimple Acne Solution', 'Jangan biarkan jerawat semakin parah dengan bantuan Acne-Duo Care\nBersihkan wajah Anda dengan Emina Ms. Pimple Face Wash untuk \nmenghilangkan kotoran dan mengurangi minyak berlebih. Kulit terasa \ndigunakan secara rutin GunakanCetaphil Oily Skin Cleanser 125mlyang \nbersih dan segar tanpa membuatnya kering.', 'emina-ms-pimple-acne-solution.jpeg', 22000, 1, 3),
(28, 'Safi White Expert', 'Membantu membersikan debu dan sisa make up secara seksama dengan \nscrub lembutnya, membantu melindungi kulit dari paparan radikal bebas, \nmembantu menjaga keseimbangan Ph kulit, serta menyegarkan kulit wajah.', 'safi-white-expert.jpeg', 57900, 1, 3),
(29, 'Wardah', 'Inovasi terbaru dari Wardah, kini hadir foam pencerah yang bersihkan \nwajah dari kotoran dan debu secara menyeluruh sekaligus melembapkan \ndan melembutkan kulit untuk wajah tampak cerah, lembut, dan glowing.', 'wardah.jpeg', 20700, 1, 3),
(30, 'Azarine Acne Gentle Cleansing', 'Azarine Acne Gentle Cleansing Foam adalah pembersih wajah untuk \nmembersihkan jerawat dan mengontrol sebum. Diformulasikan dengan \nbahan alami purslane, madu dan asam salisilat membantu mencegah \npertumbuhan bakteri penyebab jerawat, mengangkat kelebihan minyak \npada wajah dan mengecilkan pori- pori.', 'azarine-acne-gentle-cleansing.jpg', 35000, 1, 3),
(31, 'Himalaya Face Wash Purifying Neem ', 'Himalaya Herbal Purifying Neem Face Wash diformulasikan khusus untuk \nmembuat kulit Anda cerah dan bebas masalah, busa pembersih wajah bebas \nsabun yang dapat digunakan setiap hari ini dioleskan dengan lembut pada \nwajah Anda untuk menghilangkan kelebihan minyak dan kotoran tanpa \nmenjadikan kulit Anda kering.', 'himalaya-face-wash-purifying-neem.png', 32340, 1, 1),
(32, 'Pixy', 'Sabun pembersih wajah berbahan dasar air yang segar, ringan, serta \nmembuat kulit terasa halus dan lembut. Mengurangi tanda-tanda kulit lelah \nseperti kusam, kering, dan berminyak. Mengandung Hydra Active yang \nmelembabkan kulit dan Natural Whitening Extract yang membantu melembabkan kulit', 'pixy.jpeg', 31000, 1, 1),
(33, 'Hada Labo', 'Hada Labo Gokujyun Face Wash merupakan sabun pembersih wajah dengan 2 \ntipe Hyaluronic Acid yang mampu mengangkat kotoran dan minyak di wajah \ntanpa menyebabkan kulit menjadi kering dan tetap terasa lembap.', 'hado-labo.jpeg', 29500, 1, 1),
(34, 'Senka', 'Facial foam terbaru dari Senka dapat membantu membersihkan kotoran pada \nkulit wajah, menjaga kelembapan dan memberikan nutrisi. Diperkaya dengan \nDamask Rose Water untuk menenangkan dan menghidrasi kulit wajah, dan \nmemberikan efek kulit lembut', 'senka.jpeg', 57800, 1, 1),
(35, 'St Ives', 'ST IVES FRESH SKIN APRICOT FACE SCRUB merupakan scrub wajah \ndari kandungan bubuk cangkang kenari alami yang menjadikan kulit menjadi \nlembut, halus, dan bercahaya. Produk ini digunakan untuk mengeksfoliasi \nkulit atau mengangkat sel kulit mati agar kulit wajah halus dan cerah ', 'st-ives.jpeg', 74700, 1, 1),
(36, 'Safi Facial Wash', 'Safi White Natural Anti Acne Cleanser Tea Tree Oil Original. Pembersih \nwajah yang mengandung Tea Tree Oil Extract dan Aloe Extract yang \ndapat membersihkan sisa kotoran dan sebum di wajah.', 'safi-facial-wash.jpeg', 36800, 1, 1),
(37, 'Somethinc Low PH Jelly Cleanser', 'Pembersih wajah berbahan vegan dengan tekstur jelly & gentle, \ndiformulasikan dengan Japanese Mugwort & Tea Tree. Somethinc facial \nwash ini teruji klinis menyimbangkan pH kulit tanpa membuat kulit kering, \ntertarik & merusak barier kulit.', 'somethinc-low-ph-jelly-cleanser.jpeg', 108900, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

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
