-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 08:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sio`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `nama`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(7, 'ADE YUSUF A.', 'Idul Adha', 'Hari raya Idul Adha perlu dimaknai sebagai momentum penting untuk meningkatkan rasa kepedulian terhadap sesama. Melalui kurban, Umat Muslim diajarkan untuk saling berbagi dan membantu sesama yang membutuhkan.', 'nVgW6RWjDM0psKhLXxBK.jpg', '2024-06-17'),
(8, 'ADE YUSUF A.', 'Gotong Royong!!!', 'Dengan hal ini akan tercipta nya kepedulian dan kesadaran masyarakat terhadap lingkungan serta membangkitkan semangat budaya tradisi gotong royong masyarakat', 'Gotong_Royong_adalah_warisan_budaya.jpg', '2024-06-20'),
(9, 'ADE YUSUF A.', 'Hati - hati Curanmor!!!', 'Polsek Bantargebang mengamankan seorang pelaku curanmor yang ditangkap warga', 'g36qeki6k8xg69s.jpg', '2024-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `akses_id` int(11) NOT NULL,
  `akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`akses_id`, `akses`) VALUES
(1, 'Admin'),
(2, 'Warga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hari_tanggal` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `nama`, `hari_tanggal`, `keterangan`, `gambar`, `status`) VALUES
(35, 'nasser alkhelafi', '24 June 2024', 'minta tolong pak rt, di daerah jl,asem pangkalan 2 ada pohon tumbang, minta di kondisikan', 'pengaduan_101.jpg', 0),
(36, 'nasser alkhelafi', '24 June 2024', 'info pak rt, di makan dari kolot , gorong-gorong nya mampet dan banjir. terimakasih', 'pengaduan_102.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hari_tanggal` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `keperluan`, `nama`, `hari_tanggal`, `keterangan`, `alamat`, `status`) VALUES
(40, 'Pindah Domisi', 'Achmad Sholehudin', '23 June 2024', 'Disini RT nya galak', 'Kontrakan Pa Supri No.3', 0),
(41, 'Izin Usaha', 'nasser alkhelafi', '23 June 2024', 'buat usaha', 'bantargebang', 0),
(42, 'Pembuatan SKTM', 'nasser alkhelafi', '24 June 2024', 'buat sktm untuk dapat beasiswa ke cianjur', 'jl.pangkalan2. bantargebang kota bekasi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `akses` int(11) NOT NULL,
  `dibuat` varchar(255) NOT NULL,
  `hp` varchar(225) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `kk` varchar(16) DEFAULT NULL,
  `ktp` varchar(500) DEFAULT NULL,
  `kk_foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `jk`, `akses`, `dibuat`, `hp`, `nik`, `kk`, `ktp`, `kk_foto`, `alamat`) VALUES
(1, 'Admin', 'admin', '$2y$10$WKER4VHv9Nn9/FqisdoDeeb/c4EUrdOW9zbUMCdu9n2LUpR5jc1S.', 'L', 1, '1589868523', '085604331248', '3275072455790643', '3275072477665432', 'ktp_11.jpg', 'kk_13.jpg', 'JL.NAROGONG KM 11\r\nRT:003 RW:008 NOMOR RUMAH:50 KEL: BANTARGEBANG KEC: BANTARGEBANG, KOTA BEKASI , NOMOR WHATSAPP : 0856043312481');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `akses` (`akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `akses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`akses`) REFERENCES `tb_akses` (`akses_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
