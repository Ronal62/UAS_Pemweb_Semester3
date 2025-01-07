-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2024 pada 09.31
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
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'ronal', 'ronal', 'ronal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kd_buku` varchar(25) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `harga_kolak` decimal(20,0) NOT NULL,
  `harga_jual` decimal(20,0) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kd_buku`, `nama_buku`, `stok_buku`, `harga_kolak`, `harga_jual`, `gambar`) VALUES
(16, 'BUKU-548981', 'Belajar Masak', 13, 20000, 25000, 'vbg ki.png'),
(18, 'BUKU-322262', 'Novel', 2, 10000, 15000, 'vbg ki.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jual`
--

CREATE TABLE `detail_jual` (
  `id_dtj` int(11) NOT NULL,
  `kd_jual` varchar(25) NOT NULL,
  `kd_buku` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_jual`
--

INSERT INTO `detail_jual` (`id_dtj`, `kd_jual`, `kd_buku`, `jumlah`, `total`) VALUES
(20, 'PJ-09.12.67127', 'BUKU-322262', 3, 45000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kolakan`
--

CREATE TABLE `detail_kolakan` (
  `id_dtk` int(11) NOT NULL,
  `kd_kolakan` varchar(25) NOT NULL,
  `kd_buku` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detail_kolakan`
--

INSERT INTO `detail_kolakan` (`id_dtk`, `kd_kolakan`, `kd_buku`, `jumlah`, `total`) VALUES
(8, 'KL-08.12.756913', 'BUKU-548981', 15, 300000),
(9, 'KL-09.12.439171', 'BUKU-322262', 5, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kolakan`
--

CREATE TABLE `kolakan` (
  `id_kolakan` int(11) NOT NULL,
  `kd_kolakan` varchar(25) NOT NULL,
  `jml_kolakan` int(11) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `tanggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kolakan`
--

INSERT INTO `kolakan` (`id_kolakan`, `kd_kolakan`, `jml_kolakan`, `total`, `tanggal`) VALUES
(4, 'KL-08.12.756913', 15, 300000, '2024-12-08'),
(5, 'KL-09.12.439171', 5, 50000, '2024-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kd_jual` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_jual` int(11) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `bayar` decimal(15,2) NOT NULL,
  `kembali` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kd_jual`, `nik`, `tanggal`, `jml_jual`, `total`, `bayar`, `kembali`) VALUES
(13, 'PJ-09.12.257987', '45678', '2024-12-09', 0, 0.00, 0.00, 0.00),
(14, 'PJ-09.12.67127', '23456789098765', '2024-12-09', 3, 45000.00, 50000.00, 5000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nik`, `no_kk`, `nama_pelanggan`, `jenis_kelamin`, `no_hp`) VALUES
(20161070, '45678', '45678', 'Ronald Budi', 'Laki-Laki', '45678'),
(20161073, '23456789098765', '678909876543', 'Noval', 'Laki-Laki', '567887654');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`id_dtj`);

--
-- Indeks untuk tabel `detail_kolakan`
--
ALTER TABLE `detail_kolakan`
  ADD PRIMARY KEY (`id_dtk`);

--
-- Indeks untuk tabel `kolakan`
--
ALTER TABLE `kolakan`
  ADD PRIMARY KEY (`id_kolakan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `detail_jual`
--
ALTER TABLE `detail_jual`
  MODIFY `id_dtj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `detail_kolakan`
--
ALTER TABLE `detail_kolakan`
  MODIFY `id_dtk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kolakan`
--
ALTER TABLE `kolakan`
  MODIFY `id_kolakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20161074;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
