-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 01:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bppmddtt`
--

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id` int(11) NOT NULL,
  `nama_instruktur` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `bidang_keahlian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id`, `nama_instruktur`, `jenis_kelamin`, `no_telpon`, `bidang_keahlian`) VALUES
(1, 'Annisa', 'PEREMPUAN', '081234566789', 'MENJAHIT');

-- --------------------------------------------------------

--
-- Table structure for table `materi_pelatihan`
--

CREATE TABLE `materi_pelatihan` (
  `id` int(11) NOT NULL,
  `id_pelatihan` int(11) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `deskripsi_materi` varchar(255) NOT NULL,
  `durasi_materi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi_pelatihan`
--

INSERT INTO `materi_pelatihan` (`id`, `id_pelatihan`, `judul_materi`, `deskripsi_materi`, `durasi_materi`) VALUES
(1, 1, 'Benang', 'Mengenal Jenis dan fungsi benang', '2 jam');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id` int(11) NOT NULL,
  `nama_pelatihan` varchar(255) NOT NULL,
  `angkatan` varchar(15) NOT NULL,
  `provinsi` enum('KALIMANTAN TIMUR','KALIMANTAN SELATAN','KALIMANTAN UTARA','KALIMANTAN BARAT','KALIMANTAN TENGAH') NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `lokasi_pelatihan` varchar(255) NOT NULL,
  `jumlah_peserta_pelatihan` int(10) NOT NULL,
  `tahun` enum('2013','2014','2015','2016','2017','2018','2019','2020','2021','2022','2023','2024') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `nama_pelatihan`, `angkatan`, `provinsi`, `kabupaten`, `tanggal_mulai`, `tanggal_selesai`, `lokasi_pelatihan`, `jumlah_peserta_pelatihan`, `tahun`) VALUES
(1, 'Menjahit', 'IXX', 'KALIMANTAN SELATAN', 'Tanah Laut', '2020-01-20', '2020-01-30', 'Jl.Trikora Banjarbaru', 100, '2020');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_pelatihan` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `status_pendaftaran` enum('BELUM DIVERIFIKASI','DITOLAK','DITERIMA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_pelatihan`, `no_peserta`, `tanggal_pendaftaran`, `status_pendaftaran`) VALUES
(1, 1, 1, '2020-01-10', 'BELUM DIVERIFIKASI');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('admin','peserta') NOT NULL,
  `status_akun` enum('diverifikasi','diajukan','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nik`, `nama_lengkap`, `no_telp`, `username`, `password`, `status`, `status_akun`) VALUES
(1, '0002270451756', 'admin', '08115000344', 'admin', '341b50c6340d357abf3cbc8a9c6f3978', 'admin', 'diverifikasi'),
(2, '0001170451756', 'annisa', '087811223344', 'nisa', 'c9d2cce909ea37234be8af1a1f958805', 'peserta', 'diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `no_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(225) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `agama` enum('ISLAM','KRISTEN','KATOLIK','HINDU','BUDHA','KONGHUCU') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `provinsi` enum('KALIMANTAN TIMUR','KALIMANTAN SELATAN','KALIMANTAN BARAT','KALIMANTAN UTARA','KALIMANTAN TENGAH') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`no_peserta`, `nama_peserta`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`) VALUES
(1, 'AKBAR IBRAHIM', 'Kampung Baru', '2001-01-08', 'LAKI-LAKI', 'S1.Kom', 'ISLAM', 'Jl.Yakut Rt 17 Rw 03', 'Batu Licin', 'Batulicin', 'KALIMANTAN SELATAN');

-- --------------------------------------------------------

--
-- Table structure for table `pilih_pelatihan`
--

CREATE TABLE `pilih_pelatihan` (
  `id` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_pelatihan` int(11) NOT NULL,
  `id_instruktur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pilih_pelatihan`
--

INSERT INTO `pilih_pelatihan` (`id`, `no_peserta`, `id_pelatihan`, `id_instruktur`) VALUES
(1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_pelatihan`
--
ALTER TABLE `materi_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelatihan` (`id_pelatihan`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelatihan` (`id_pelatihan`),
  ADD KEY `no_peserta` (`no_peserta`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`no_peserta`);

--
-- Indexes for table `pilih_pelatihan`
--
ALTER TABLE `pilih_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_peserta` (`no_peserta`),
  ADD KEY `id_pelatihan` (`id_pelatihan`),
  ADD KEY `id_instruktur` (`id_instruktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi_pelatihan`
--
ALTER TABLE `materi_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `no_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pilih_pelatihan`
--
ALTER TABLE `pilih_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materi_pelatihan`
--
ALTER TABLE `materi_pelatihan`
  ADD CONSTRAINT `materi_pelatihan_ibfk_1` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`no_peserta`) REFERENCES `peserta` (`no_peserta`);

--
-- Constraints for table `pilih_pelatihan`
--
ALTER TABLE `pilih_pelatihan`
  ADD CONSTRAINT `pilih_pelatihan_ibfk_1` FOREIGN KEY (`no_peserta`) REFERENCES `peserta` (`no_peserta`),
  ADD CONSTRAINT `pilih_pelatihan_ibfk_2` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id`),
  ADD CONSTRAINT `pilih_pelatihan_ibfk_3` FOREIGN KEY (`id_instruktur`) REFERENCES `instruktur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
