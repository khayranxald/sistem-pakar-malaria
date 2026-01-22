-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2025 pada 07.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak_malaria`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_penyakit` varchar(10) DEFAULT NULL,
  `id_gejala` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `id_penyakit`, `id_gejala`) VALUES
(1, 'P001', 'G001'),
(2, 'P001', 'G002'),
(3, 'P001', 'G003'),
(4, 'P001', 'G010'),
(5, 'P001', 'G013'),
(6, 'P001', 'G020'),
(7, 'P002', 'G001'),
(8, 'P002', 'G002'),
(9, 'P002', 'G005'),
(10, 'P002', 'G006'),
(11, 'P002', 'G007'),
(12, 'P002', 'G011'),
(13, 'P002', 'G012'),
(14, 'P002', 'G013'),
(15, 'P002', 'G014'),
(16, 'P002', 'G015'),
(17, 'P002', 'G017'),
(18, 'P002', 'G018'),
(19, 'P002', 'G020'),
(20, 'P003', 'G001'),
(21, 'P003', 'G002'),
(22, 'P003', 'G004'),
(23, 'P003', 'G005'),
(24, 'P003', 'G009'),
(25, 'P003', 'G013'),
(26, 'P003', 'G014'),
(27, 'P003', 'G016'),
(28, 'P003', 'G019'),
(29, 'P003', 'G020'),
(30, 'P004', 'G001'),
(31, 'P004', 'G003'),
(32, 'P004', 'G005'),
(33, 'P004', 'G006'),
(34, 'P004', 'G008'),
(35, 'P004', 'G013'),
(36, 'P004', 'G016'),
(37, 'P004', 'G020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(100) DEFAULT NULL,
  `nilai_pakar` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `nilai_pakar`) VALUES
('G001', 'Demam', 0.8),
('G002', 'Menggigil', 0.6),
('G003', 'Berkeringan', 0.7),
('G004', 'Sakit Kepala', 0.8),
('G005', 'Hilang kesadaran / Pingsan', 0.6),
('G006', 'Animea', 0.7),
('G007', 'Denyut Nadi Melambat', 0.4),
('G008', 'Muncul bintik-bintik merah', 0.6),
('G009', 'Badan lesu / lemah', 0.7),
('G010', 'Muka merah', 0.3),
('G011', 'Muntah-muntah', 0.8),
('G012', 'Diare', 0.6),
('G013', 'Pegal-pegal', 0.4),
('G014', 'Kejang-kejang', 0.8),
('G015', 'Dehidrasi', 0.4),
('G016', 'Sesak nafas', 0.4),
('G017', 'Mual', 0.8),
('G018', 'Gagal ginjal', 0.3),
('G019', 'Nyeri otot', 0.3),
('G020', 'Kurang nafsu makan', 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `hasil_diagnosa` varchar(100) DEFAULT NULL,
  `tingkat_keyakinan` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi_gejala`
--

CREATE TABLE `konsultasi_gejala` (
  `id_konsultasi` int(11) DEFAULT NULL,
  `id_gejala` varchar(10) DEFAULT NULL,
  `nilai_user` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi`, `solusi`) VALUES
('P001', 'Malaria Tertiana', 'Malaria yang disebabkan oleh Plasmodium vivax dan Plasmodium ovale, dengan demam yang muncul setiap 48 jam.', 'Pengobatan dengan obat antimalaria seperti klorokuin dan primakuin. Pencegahan dengan menghindari gigitan nyamuk Anopheles.'),
('P002', 'Malaria Tropika', 'Malaria yang disebabkan oleh Plasmodium falciparum, jenis malaria paling berbahaya dengan gejala berat.', 'Pengobatan dengan kombinasi artemisinin (ACT). Pencegahan dengan kelambu berinsektisida dan penyemprotan rumah.'),
('P003', 'Malaria Quartana', 'Malaria yang disebabkan oleh Plasmodium malariae, dengan demam muncul setiap 72 jam.', 'Dapat diobati dengan klorokuin. Pencegahan dilakukan dengan menghindari gigitan nyamuk dan menjaga kebersihan lingkungan.'),
('P004', 'Malaria Ovale', 'Malaria yang mirip dengan tertiana, disebabkan oleh Plasmodium ovale, umumnya ditemukan di Afrika dan Asia.', 'Pengobatan dengan klorokuin dan primakuin. Pencegahan dilakukan dengan menghindari gigitan nyamuk dan penggunaan kelambu.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `konsultasi_gejala`
--
ALTER TABLE `konsultasi_gejala`
  ADD KEY `id_konsultasi` (`id_konsultasi`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`),
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Ketidakleluasaan untuk tabel `konsultasi_gejala`
--
ALTER TABLE `konsultasi_gejala`
  ADD CONSTRAINT `konsultasi_gejala_ibfk_1` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`),
  ADD CONSTRAINT `konsultasi_gejala_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
