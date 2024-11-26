-- Database: `pdo_kelompok2`

CREATE DATABASE IF NOT EXISTS `pdo_kelompok2`;
USE `pdo_kelompok2`;

-- Struktur tabel `mahasiswa`
CREATE TABLE `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `jenis` enum('L','P') NOT NULL,
  `email` varchar(30) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `hobi` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tambahkan indeks untuk tabel `mahasiswa`
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
