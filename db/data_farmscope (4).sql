-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 02:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_farmscope`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `gambar`, `judul`, `konten`) VALUES
(25, 'sapi about.png', 'Sapi BIsa Makan Rumput Lho!!', 'Sapi merupakan hewan yang terkenal dengan kebiasaannya memakan rumput. Kebanyakan orang mungkin sudah tahu bahwa sapi adalah hewan herbivora yang memiliki pencernaan khusus untuk mencerna serat tumbuhan. Meskipun terlihat sederhana, proses pencernaan rumput pada sapi sebenarnya melibatkan kerja sama antara mikroorganisme dalam perut sapi yang membantu mencerna serat-serrat tersebut. Sistem pencernaan yang efisien ini memungkinkan sapi untuk menghasilkan energi dan nutrisi yang cukup dari rumput, menjadikannya salah satu sumber pangan yang penting bagi manusia. Pentingnya sapi dalam kontribusinya terhadap produksi pangan tidak hanya terbatas pada dagingnya, tetapi juga pada susu yang dihasilkannya. Sapi dapat menjadi sumber protein hewani yang sangat berharga melalui dagingnya, sementara susu sapi menjadi sumber kalsium dan protein penting bagi manusia. Oleh karena itu, pemeliharaan sapi yang sehat dan pemberian pakan yang tepat sangat diperlukan untuk memastikan kualitas dan kuantitas hasil produksinya. Meskipun sapi memiliki peran penting dalam menyokong kebutuhan pangan manusia, tantangan terkait dengan keberlanjutan pertanian dan kesejahteraan hewan juga perlu diperhatikan. Pendekatan yang berkelanjutan dalam pemeliharaan sapi, termasuk pengelolaan limbah dan efisiensi pakan, dapat membantu menjaga keseimbangan antara kebutuhan manusia dan perlindungan lingkungan serta kesejahteraan hewan.'),
(27, 'pngtree-white-cow-in-a-grassy-field-image_2559693.jpg', 'Penanganan Gizi Sapi: Kunci Utama Kesuksesan Peternakan', 'Peternakan sapi yang sukses tidak hanya tergantung pada pemeliharaan fisik dan lingkungan yang baik, tetapi juga pada manajemen gizi yang efektif. Gizi yang tepat memainkan peran penting dalam pertumbuhan, kesehatan, dan produktivitas sapi. Berikut adalah panduan singkat mengenai penanganan gizi sapi yang dapat membantu peternak mencapai hasil yang optimal.\r\n\r\n1. Analisis Kebutuhan Gizi\r\n\r\nSebelum mengembangkan program pakan, penting untuk melakukan analisis kebutuhan gizi sapi. Faktor-faktor seperti usia, berat badan, tahap produksi, dan kondisi kesehatan harus dipertimbangkan. Ini membantu dalam menentukan kebutuhan protein, energi, mineral, dan vitamin yang diperlukan oleh setiap kelompok sapi.\r\n\r\n2. Rencana Pakan yang Seimbang\r\n\r\nSetelah menganalisis kebutuhan, langkah berikutnya adalah merencanakan pakan yang seimbang. Pastikan pakan mengandung cukup protein, karbohidrat, lemak, serat, serta mineral dan vitamin esensial. Ransum yang seimbang mendukung pertumbuhan optimal, produksi susu yang baik, dan kesehatan umum sapi.\r\n\r\n3. Akses Air Bersih dan Berkualitas\r\n\r\nAir bersih dan berkualitas sangat penting untuk pencernaan yang baik dan kesehatan sapi. Pastikan sapi memiliki akses mudah ke sumber air yang bersih sepanjang waktu. Air yang baik juga membantu menjaga suhu tubuh sapi, terutama dalam cuaca panas.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `katalog_produk`
--

CREATE TABLE `katalog_produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_produk` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `umur` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `berat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog_produk`
--

INSERT INTO `katalog_produk` (`id_produk`, `id_user`, `nama_produk`, `jenis`, `deskripsi`, `umur`, `berat`, `harga`, `foto`) VALUES
(14, 12, 'Sapi Australia', 'sapi', 'Ciri Fisik:\r\n\r\nBerkualitas Tinggi: Sapi Australia Prime kami dipilih dari strain yang berkualitas tinggi, dengan tubuh yang berotot dan bentuk tubuh yang optimal, memberikan hasil daging yang luar biasa.\r\nBulu yang Pendek dan Padat: Bulu pendek dan padat pada sapi mencerminkan kesehatan dan kebersihan hewan, memberikan tampilan yang bersih dan menarik.\r\nManfaat Produk:                     ', '12', '200', '110000000', 'gambar sampel.jpg'),
(17, 12, 'Kambing Kacang', 'kambing', '                      Ciri Fisik:\r\n\r\nUkuran Tubuh Ideal: Kambing Kacang terkenal dengan ukuran tubuhnya yang lebih kecil, membuatnya mudah diurus dan cocok untuk skala peternakan yang lebih kecil.\r\nWarna Bulu yang Menarik: Bulu kambing kacang sering memiliki variasi warna yang menarik, menambah pesona estetika pada peternakan.                      ', '12', '11', '2900000', 'kambing kacang.jpg'),
(18, 4, 'Kambing Etawa', 'kambing', 'Ciri Fisik:\r\n\r\nTubuh yang Kuat dan Proporsional: Kambing Etawa Pilihan kami memiliki tubuh yang kuat dan proporsional, menunjukkan keunggulan genetik yang diperhatikan dengan cermat dalam pemilihan ternak.\r\nBulu yang Berkualitas Tinggi: Bulu kambing Etawa kami memiliki kualitas tinggi, seringkali dengan warna yang menarik dan pola yang mempesona.\r\nTanduk Spiral yang Indah: Ciri khas tanduk spiral kambing Etawa tidak hanya menambah estetika, tetapi juga mencerminkan ketahanan dan keunikan hewan ini.', '24', '8', '2700000', 'kambing etawa.png'),
(19, 4, 'Kambing Jawarandu', 'kambing', 'Ciri Fisik:\r\nBulu Berkualitas Tinggi:\r\nBulu Kambing Jawarandu memiliki kualitas tinggi, dengan tekstur halus dan kilauan alami yang menambah pesona estetika. Warna bulu yang khas juga dapat menjadi ciri yang membedakan, menciptakan tampilan yang unik dan menawan.\r\n\r\nUkuran Tubuh yang Optimal:\r\nKambing Jawarandu memiliki ukuran tubuh yang optimal, tidak terlalu besar namun cukup substansial. Ini menjadikannya hewan yang mudah diurus dan cocok untuk berbagai kondisi lingkungan.', '27', '12', '2500000', 'kambing jawarandu.jp'),
(20, 10, 'Sapi Limosin', 'sapi', 'Ciri Fisik:\r\n\r\nBentuk Tubuh Ideal: Sapi Limosin dikenal dengan bentuk tubuhnya yang proporsional, otot yang berotot, dan punggung yang lurus. Ini menciptakan hasil daging yang optimal dan berkualitas tinggi.\r\nWarna Bulu yang Khas: Bulu sapi Limosin seringkali berwarna cokelat muda hingga cokelat tua, memberikan tampilan yang khas dan menarik.', '35', '1000', '50000000', 'limosin.jpg'),
(21, 4, 'Sapi Bali', 'sapi', 'Ciri Fisik:\r\n\r\nUkuran Tubuh yang Tahan Lama: Sapi Bali seringkali memiliki ukuran tubuh yang sedang hingga kecil, namun memiliki ketahanan yang luar biasa terhadap kondisi lingkungan tropis.\r\nWarna Bulu yang Khas: Bulu sapi Bali sering berwarna hitam atau merah cokelat, menciptakan tampilan yang khas dan mencerminkan identitas budaya lokal.', '25', '500', '20000000', 'sapi bali.jpg'),
(22, 12, 'Sapi Gedhe', 'sapi', 'Sapi sehat dan bermanfaat ', '20', '5000', '33000000', 'Sapi.jpg'),
(30, 12, 'Kambing Guling', 'kambing', 'Enak', '30', '500', '3850000', 'Kambing 1.jpg'),
(33, 12, 'KIMBING', 'kambing', 'ADE', '12', '1000', '110000000', 'about.jpg'),
(34, 12, 'Kombong', 'kambing', 'Beon', '30', '5000', '45000000', 'kambing-1.jpeg'),
(35, 12, 'Keimbink', 'kambing', 'Lero lero', '10', '500', '3300000', 'Ayam 1.jpg'),
(36, 12, 'Kambing Gendhut', 'kambing', 'Kams Kams', '100', '50000', '55600000', 'Tips-1.jpg'),
(37, 12, 'Sapik', 'sapi', 'Limosin awet dan tahan lama', '30', '124', '4500000', 'limosin.jpg'),
(38, 12, 'Sapi Gak Guna', 'sapi', 'Kecoak', '30', '8000', '45700000', 'sapi about.png'),
(39, 12, 'Sapi Hidup', 'sapi', 'Sapiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '18', '3000', '33000000', 'Sapi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'aktif',
  `level` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'peternak',
  `nohp` varchar(25) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `foto_profil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `status`, `level`, `nohp`, `alamat`, `latitude`, `longitude`, `foto_profil`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 'aktif', 'admin', NULL, NULL, NULL, NULL, ''),
(3, 'aria@gmail.com', 'aria', '$2y$10$/nGzEp/Wb1BrBj2LndoUo.KmwhUEAF8pzc9KNaYemer', 'aktif', 'peternak', '08987654124', ' Perumahan Jamrud  12        ', '-6.603053225330844', '106.78676607430738', ''),
(4, 'syarah@gmail.com', 'syarah', '$2y$10$t17wJfqZDJg7C46lzojpduxZKpTQWI7lCB13niBfdn2', 'tidak aktif', 'peternak', '+6289636634599', 'aaaaaa', '-6.5971565', '106.8060503', 'gambar sampel.jpg'),
(5, 'jonotampan@gmail.com', 'jonotampan', '$2y$10$Rl3K4tSXDtfiIH/GbOA56e1bje29fmzg6UhNWPcdmSg', 'tidak aktif', 'peternak', NULL, NULL, NULL, NULL, ''),
(6, 'ayamlari@gmail.com', 'ayam lari', '$2y$10$82l7BnCyS8ZLBE2YC1wdo.ozW0u/4S3HxEpIGYfYNLQ', 'aktif', 'peternak', NULL, NULL, NULL, NULL, ''),
(7, 'faridammar', 'akbar', '$2y$10$TPESOa5x.BpmnaJUe0B/0u0ie.5c/dkH9ipzWFsIxn5', 'tidak aktif', 'peternak', '+6289636634599', 'ed', '-6.5891872', '106.8057171', ''),
(8, 'as', 'as', '$2y$10$wp5DpNuShWoVxapMNlVOAeZbfXwWs4iXmIOZt/mT7Om', 'aktif', 'peternak', NULL, NULL, NULL, NULL, ''),
(9, 'kevinkevin@yahoo.com', 'hafisfaqih', '$2y$10$sN2hT0WiMAtTWmakuss7KOgo2LUVFgy0nlRoNPaWnnU', 'aktif', 'peternak', '08987654123', '  gunung batu ', '-6.594355989048073', '106.77595112958733', ''),
(10, 'farmer45@gmail.com', '', '$2y$10$J0Sttr6WTe2s4b78WV0T3e2r8b/GCy4AlfSnPJCOYew', 'aktif', 'peternak', '08987654123', 'Perumahan Gank Semphit No. 99      ', '', '', 'trex1.png'),
(11, 'akugeng@gmail.com', 'akugeng', '$2y$10$OS5b57dSavZ1XhYy6f8lseAEzEWi6r.DiQD2elohANa', 'aktif', 'peternak', NULL, NULL, NULL, NULL, ''),
(12, 'farmscope1@gmail.com', 'farmscope_1', '$2y$10$SoIhBFa7J7uI8IknH/lCwukDeBspfH226eF.JcY6Ry.', 'aktif', 'peternak', '084523786599', 'Jl. Panunggakan no.10, Bogor', '-6.597425556828836', '106.79775258130904', 'farmer.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog_produk`
--
ALTER TABLE `katalog_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `katalog_produk`
--
ALTER TABLE `katalog_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
