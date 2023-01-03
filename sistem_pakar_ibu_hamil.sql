-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2023 at 07:05 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar_ibu_hamil`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `kd_penyakit` varchar(10) DEFAULT NULL,
  `kd_gejala` text,
  `presentase` float DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `id_user`, `kd_penyakit`, `kd_gejala`, `presentase`, `tanggal`) VALUES
(3, 33, 'P002', '[\"G025\",\"G024\",\"G022\",\"G021\",\"G018\",\"G016\",\"G015\",\"G012\",\"G009\",\"G007\",\"G005\",\"G004\",\"G001\"]', 25.64, '2023-01-04 03:54:14'),
(4, 33, 'P005', '[\"G026\",\"G025\",\"G024\",\"G023\",\"G013\"]', 90, '2023-01-04 03:57:01'),
(5, 1, 'P004', '[\"G021\",\"G020\",\"G019\",\"G018\",\"G017\",\"G010\",\"G009\",\"G006\"]', 50, '2023-01-04 03:58:18'),
(6, 33, 'P002', '[\"G026\",\"G021\",\"G019\",\"G016\",\"G013\",\"G012\",\"G010\",\"G009\",\"G008\",\"G007\",\"G006\",\"G005\",\"G004\",\"G001\"]', 38.1, '2023-01-04 04:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` varchar(10) NOT NULL,
  `gejala` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G001', 'Frekuensi Buang Air Besar (BAB) lebih sering dari biasanya'),
('G002', 'Balita rewel dan nangis terus, tetapi tidak keluar air mata sewaktu menangis'),
('G003', 'Kencing lebih jarang bisa dilihat dari popok yang jarang basah'),
('G004', 'Balita mengalami demam'),
('G005', 'Dehidrasi'),
('G006', 'Nafsu makan berkurang'),
('G007', 'Balita kesakitan saat BAB'),
('G008', 'Sakit perut'),
('G009', 'Frekuensi BAB kurang dari 3x seminggu'),
('G010', 'Ada bercak feses pada popok'),
('G011', 'Feses terlihat lebih besar'),
('G012', 'Terjadi pembengkakan pada perut'),
('G013', 'Mual dan muntah'),
('G014', 'Batuk-batuk seperti mau muntah, terutama malam hari'),
('G015', 'Susah bernafas'),
('G016', 'Kehilangan nafsu makan atau tidak mau menyusui'),
('G017', 'Berat badan turun'),
('G018', 'Perut kembung'),
('G019', 'Mengalami diare tapi dalam jumlah sedikit'),
('G020', 'Diare berlendir'),
('G021', 'Rasa sakit di bagian tengah perut'),
('G022', 'Dalam beberapa jam, rasa sakit bergerak ke sisi kanan bawah perut'),
('G023', 'Mengalami sendawa atau cecegukan'),
('G024', 'Berat badan turun drastis'),
('G025', 'BAB terlihat merah gelap atau hitam'),
('G026', 'Rasa sakit seperti terbakar diperut antara tulag dada dan pusar');

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `kd_kasus` varchar(10) NOT NULL,
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_gejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `kd_kasus`, `kd_penyakit`, `kd_gejala`) VALUES
(1, 'K001', 'P001', 'G006'),
(2, 'K001', 'P001', 'G005'),
(3, 'K001', 'P001', 'G004'),
(4, 'K001', 'P001', 'G003'),
(5, 'K001', 'P001', 'G002'),
(6, 'K001', 'P001', 'G001'),
(7, 'K002', 'P002', 'G012'),
(8, 'K002', 'P002', 'G011'),
(9, 'K002', 'P002', 'G010'),
(10, 'K002', 'P002', 'G009'),
(11, 'K002', 'P002', 'G008'),
(12, 'K002', 'P002', 'G007'),
(13, 'K002', 'P002', 'G006'),
(14, 'K002', 'P002', 'G004'),
(15, 'K003', 'P003', 'G017'),
(16, 'K003', 'P003', 'G016'),
(17, 'K003', 'P003', 'G015'),
(18, 'K003', 'P003', 'G014'),
(19, 'K003', 'P003', 'G013'),
(20, 'K004', 'P004', 'G022'),
(21, 'K004', 'P004', 'G021'),
(22, 'K004', 'P004', 'G020'),
(23, 'K004', 'P004', 'G019'),
(24, 'K004', 'P004', 'G018'),
(25, 'K004', 'P004', 'G008'),
(26, 'K004', 'P004', 'G004'),
(27, 'K005', 'P005', 'G026'),
(28, 'K005', 'P005', 'G025'),
(29, 'K005', 'P005', 'G024'),
(30, 'K005', 'P005', 'G023'),
(31, 'K005', 'P005', 'G013');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(10) NOT NULL,
  `penyakit` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `penyakit`, `deskripsi`, `solusi`) VALUES
('P001', 'Diare', 'Vel molestiae repreh', 'Et culpa necessitat'),
('P002', 'Sembelit', 'At iusto voluptatem', 'Animi inventore qui'),
('P003', 'Asam Lambung', 'Nisi ex exercitation', 'Delectus sit quo e'),
('P004', 'Radang Usus Buntu', 'Voluptatibus accusan', 'Amet perspiciatis'),
('P005', 'Infeksi Lambung', 'Autem doloremque ull', 'Qui pariatur Aut an');

-- --------------------------------------------------------

--
-- Table structure for table `temp_probabilitas`
--

CREATE TABLE `temp_probabilitas` (
  `kd_penyakit` varchar(10) NOT NULL,
  `probabilitas` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_probabilitas`
--

INSERT INTO `temp_probabilitas` (`kd_penyakit`, `probabilitas`) VALUES
('P001', 0.20),
('P002', 0.20),
('P003', 0.20),
('P004', 0.20),
('P005', 0.20);

-- --------------------------------------------------------

--
-- Table structure for table `temp_probabilitas_gejala`
--

CREATE TABLE `temp_probabilitas_gejala` (
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_gejala` varchar(10) NOT NULL,
  `pembilang` float(10,2) NOT NULL,
  `penyebut` float(10,2) NOT NULL,
  `nilai` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_probabilitas_gejala`
--

INSERT INTO `temp_probabilitas_gejala` (`kd_penyakit`, `kd_gejala`, `pembilang`, `penyebut`, `nilai`) VALUES
('P001', 'G026', 0.00, 5.00, 0.00),
('P001', 'G021', 0.00, 5.00, 0.00),
('P001', 'G019', 0.00, 5.00, 0.00),
('P001', 'G016', 0.00, 5.00, 0.00),
('P001', 'G013', 0.00, 5.00, 0.00),
('P001', 'G012', 0.00, 5.00, 0.00),
('P001', 'G010', 0.00, 5.00, 0.00),
('P001', 'G009', 0.00, 5.00, 0.00),
('P001', 'G008', 0.00, 5.00, 0.00),
('P001', 'G007', 0.00, 5.00, 0.00),
('P001', 'G006', 1.00, 5.00, 0.20),
('P001', 'G005', 1.00, 5.00, 0.20),
('P001', 'G004', 1.00, 5.00, 0.20),
('P001', 'G001', 1.00, 5.00, 0.20),
('P002', 'G026', 0.00, 5.00, 0.00),
('P002', 'G021', 0.00, 5.00, 0.00),
('P002', 'G019', 0.00, 5.00, 0.00),
('P002', 'G016', 0.00, 5.00, 0.00),
('P002', 'G013', 0.00, 5.00, 0.00),
('P002', 'G012', 1.00, 5.00, 0.20),
('P002', 'G010', 1.00, 5.00, 0.20),
('P002', 'G009', 1.00, 5.00, 0.20),
('P002', 'G008', 1.00, 5.00, 0.20),
('P002', 'G007', 1.00, 5.00, 0.20),
('P002', 'G006', 1.00, 5.00, 0.20),
('P002', 'G005', 0.00, 5.00, 0.00),
('P002', 'G004', 1.00, 5.00, 0.20),
('P002', 'G001', 0.00, 5.00, 0.00),
('P003', 'G026', 0.00, 5.00, 0.00),
('P003', 'G021', 0.00, 5.00, 0.00),
('P003', 'G019', 0.00, 5.00, 0.00),
('P003', 'G016', 1.00, 5.00, 0.20),
('P003', 'G013', 1.00, 5.00, 0.20),
('P003', 'G012', 0.00, 5.00, 0.00),
('P003', 'G010', 0.00, 5.00, 0.00),
('P003', 'G009', 0.00, 5.00, 0.00),
('P003', 'G008', 0.00, 5.00, 0.00),
('P003', 'G007', 0.00, 5.00, 0.00),
('P003', 'G006', 0.00, 5.00, 0.00),
('P003', 'G005', 0.00, 5.00, 0.00),
('P003', 'G004', 0.00, 5.00, 0.00),
('P003', 'G001', 0.00, 5.00, 0.00),
('P004', 'G026', 0.00, 5.00, 0.00),
('P004', 'G021', 1.00, 5.00, 0.20),
('P004', 'G019', 1.00, 5.00, 0.20),
('P004', 'G016', 0.00, 5.00, 0.00),
('P004', 'G013', 0.00, 5.00, 0.00),
('P004', 'G012', 0.00, 5.00, 0.00),
('P004', 'G010', 0.00, 5.00, 0.00),
('P004', 'G009', 0.00, 5.00, 0.00),
('P004', 'G008', 1.00, 5.00, 0.20),
('P004', 'G007', 0.00, 5.00, 0.00),
('P004', 'G006', 0.00, 5.00, 0.00),
('P004', 'G005', 0.00, 5.00, 0.00),
('P004', 'G004', 1.00, 5.00, 0.20),
('P004', 'G001', 0.00, 5.00, 0.00),
('P005', 'G026', 1.00, 5.00, 0.20),
('P005', 'G021', 0.00, 5.00, 0.00),
('P005', 'G019', 0.00, 5.00, 0.00),
('P005', 'G016', 0.00, 5.00, 0.00),
('P005', 'G013', 1.00, 5.00, 0.20),
('P005', 'G012', 0.00, 5.00, 0.00),
('P005', 'G010', 0.00, 5.00, 0.00),
('P005', 'G009', 0.00, 5.00, 0.00),
('P005', 'G008', 0.00, 5.00, 0.00),
('P005', 'G007', 0.00, 5.00, 0.00),
('P005', 'G006', 0.00, 5.00, 0.00),
('P005', 'G005', 0.00, 5.00, 0.00),
('P005', 'G004', 0.00, 5.00, 0.00),
('P005', 'G001', 0.00, 5.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `temp_total`
--

CREATE TABLE `temp_total` (
  `kd_penyakit` varchar(10) NOT NULL,
  `total` float(10,2) NOT NULL,
  `total_bayes` float(10,2) NOT NULL,
  `persentase` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_total`
--

INSERT INTO `temp_total` (`kd_penyakit`, `total`, `total_bayes`, `persentase`) VALUES
('P001', 2.83, 13.99, 20.23),
('P002', 5.33, 13.99, 38.10),
('P003', 1.50, 13.99, 10.72),
('P004', 2.83, 13.99, 20.23),
('P005', 1.50, 13.99, 10.72);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `level_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `email`, `phone`, `gambar`, `level_id`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin Aplikasi 4', 'Bogor ', 'saepulramdan244@gmail.com', '083874731480', 'File-230103-ca0835d1d8.png', 1),
(33, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'User Pengguna', 'Bogor', 'ritucased@mailinator.com', '083874731480', 'File-230103-c20088c4a1.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `id_pasien` (`id_user`),
  ADD KEY `kd_penyakit` (`kd_penyakit`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`),
  ADD UNIQUE KEY `kd_gejala` (`kd_gejala`);

--
-- Indexes for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`),
  ADD KEY `kd_penyakit` (`kd_penyakit`),
  ADD KEY `kd_gejala` (`kd_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`),
  ADD UNIQUE KEY `kd_penyakit` (`kd_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `diagnosa_ibfk_2` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`);

--
-- Constraints for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD CONSTRAINT `pengetahuan_ibfk_1` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengetahuan_ibfk_2` FOREIGN KEY (`kd_gejala`) REFERENCES `gejala` (`kd_gejala`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
