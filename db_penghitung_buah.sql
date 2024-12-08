-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2024 pada 16.12
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
-- Database: `db_penghitung_buah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(7, 'admin', 'admin', 'admin'),
(8, 'ronald', 'ronald', 'ronald');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buah`
--

CREATE TABLE `buah` (
  `id_buah` int(11) NOT NULL,
  `nama_buah` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buah`
--

INSERT INTO `buah` (`id_buah`, `nama_buah`, `satuan`) VALUES
(3, 'Apel', '0.1'),
(4, 'Pisang', '0.1'),
(5, 'Anggur', '0.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghitung_buah`
--

CREATE TABLE `penghitung_buah` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `stok_awal` float NOT NULL,
  `stok_akhir` float NOT NULL,
  `stok_digunakan` float NOT NULL,
  `harga_awal` decimal(10,2) NOT NULL,
  `harga_akhir` decimal(10,2) NOT NULL,
  `harga_penggunaan` decimal(10,2) NOT NULL,
  `id_buah` int(11) NOT NULL,
  `barang_terjual` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penghitung_buah`
--

INSERT INTO `penghitung_buah` (`id`, `tanggal`, `stok_awal`, `stok_akhir`, `stok_digunakan`, `harga_awal`, `harga_akhir`, `harga_penggunaan`, `id_buah`, `barang_terjual`) VALUES
(12, '2024-12-06', 2, 1, 1, 90000.00, 30000.00, 60000.00, 3, 10),
(13, '2024-12-06', 10, 5, 5, 90000.00, 60000.00, 30000.00, 3, 50),
(15, '2024-12-06', 30, 10, 20, 50000.00, 20000.00, 30000.00, 5, 200);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buah`
--
ALTER TABLE `buah`
  ADD PRIMARY KEY (`id_buah`);

--
-- Indeks untuk tabel `penghitung_buah`
--
ALTER TABLE `penghitung_buah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buah` (`id_buah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `buah`
--
ALTER TABLE `buah`
  MODIFY `id_buah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penghitung_buah`
--
ALTER TABLE `penghitung_buah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penghitung_buah`
--
ALTER TABLE `penghitung_buah`
  ADD CONSTRAINT `penghitung_buah_ibfk_1` FOREIGN KEY (`id_buah`) REFERENCES `buah` (`id_buah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
