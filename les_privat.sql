-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2025 pada 08.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `les_privat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `harga_perjam` int(11) DEFAULT NULL,
  `mata_pelajaran` varchar(50) DEFAULT NULL,
  `pengalaman` int(11) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nama_guru`, `harga_perjam`, `mata_pelajaran`, `pengalaman`, `tempat`, `keterangan`) VALUES
(1, 'Narno', 60000, 'Penjaskes', 4, 'SMA Katolik', 'Ahli kebugaran & pelatih voli sekolah.'),
(2, 'Andi Pratama', 75000, 'Matematika', 5, 'SMA Negeri & Bimbel Online', 'Sabar dan mampu membuat pelajaran eksakta mudah dipahami.'),
(3, 'Wanda Aulia', 60000, 'Bahasa Inggris', 8, 'Kampung Inggris Pare', 'Metode fleksibel sesuai karakter siswa.'),
(4, 'Syaifuddin', 80000, 'Fisika & Matematika', 4, 'SMA 1 Kota Blitar', 'Lebih suka praktek langsung daripada teori.'),
(5, 'Aulia Putri', 70000, 'Keagamaan', 9, 'SMA Negeri & Pesantren', 'Hafal 30 Juz & mengajar disertai tafsir.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `username`, `password`) VALUES
(1, 'Andi Pratama', 'andi', 'andi123'),
(2, 'Syaifuddin', 'syaif', 'syaif123'),
(3, 'Wanda Aulia', 'wanda', 'wanda123'),
(4, 'Narno', 'narno', 'narno123'),
(5, 'Aulia Putri', 'aulia', 'aulia123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `tarif` int(50) NOT NULL,
  `jadwal` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `no_hp`, `alamat`, `tanggal`, `nama_guru`, `tarif`, `jadwal`, `created_at`) VALUES
(1, 'Ariel', '', 'Anjay', '2025-12-27', 'Saeful', 0, '05:25:00', '2025-12-26 22:25:58'),
(2, 'M Rivandi hidayat', '0467445455', 'Blitar', '2025-12-27', 'Narno', 0, '07:52:00', '2025-12-26 22:52:21'),
(3, 'M Rivandi hidayat', '0467445455', 'Blitar', '2025-12-27', 'Narno', 0, '07:52:00', '2025-12-26 22:52:53'),
(4, 'M Ariel Permadani ', '95843858485', '34244', '2025-12-11', 'Aulia Putri', 0, '17:28:00', '2025-12-27 09:28:28'),
(5, 'M Ariel Permadani ', '95843858485', 'rtge', '2025-12-11', 'Aulia Putri', 0, '16:32:00', '2025-12-27 09:28:56'),
(6, 'vggh', '0467445455', 'gvh', '2025-12-09', '', 0, '05:40:00', '2025-12-27 22:35:53'),
(7, 'ug', 'ikbh', 'vk', '2025-12-03', '', 0, '05:40:00', '2025-12-27 22:36:19'),
(8, 'ug', '7837327432', 'vk', '2025-12-03', 'Syaifuddin', 0, '08:40:00', '2025-12-27 22:40:46'),
(9, 'Ariel534', '45442524', 'ku', '2026-01-01', 'Andi Pratama', 75000, '11:58:00', '2025-12-27 22:54:30'),
(10, 'RIMADA', '0467445455', 'ef', '2025-12-28', 'Syaifuddin', 0, '17:29:00', '2025-12-28 07:27:53'),
(11, 'zcd', '88', 'dfsad', '2025-12-09', 'Syaifuddin', 0, '18:29:00', '2025-12-28 07:29:51'),
(12, 'zcd', '88', 'fgbfdbfdbfdg', '2025-12-09', 'Wanda Aulia', 60000, '14:38:00', '2025-12-28 07:33:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
