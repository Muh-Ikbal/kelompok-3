-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2023 pada 15.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kapal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_kapal` int(10) NOT NULL,
  `kapal` varchar(30) NOT NULL,
  `muatan` int(11) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `harga` decimal(30,0) NOT NULL,
  `nama_kapal` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_kapal`, `kapal`, `muatan`, `tujuan`, `harga`, `nama_kapal`) VALUES
(1, '1.jpg', 100, 'raha', 100000, 'sagoe'),
(2, 'kapal2.jpg', 100, 'kepulauan', 120000, 'sagoe'),
(4, 'kapal2.jpg', 100, 'buton', 200000, ''),
(5, 'kapal3.jpg', 50, 'raha', 80000, ''),
(6, 'kapal3.jpg', 50, 'kepulauan', 100000, ''),
(7, 'kapal3.jpg', 50, 'wakatobi', 120000, ''),
(8, 'kapal3.jpg', 50, 'buton', 180000, ''),
(9, 'kapal.jpg', 150, 'raha', 120000, ''),
(10, 'kapal.jpg', 150, 'kepulauan', 140000, ''),
(13, '4.jpg', 100, 'kendari', 240000, 'men');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` int(11) NOT NULL,
  `kode_tiket` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `total_tiket` int(10) NOT NULL,
  `harga_total` decimal(10,0) NOT NULL,
  `fk_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `fullname`, `username`, `password`) VALUES
(4, 'muh ikbal', 'ikbal', '$2y$10$ttUN447sK66JKoy.EDyyRed.ciFfF4GUj1I81Mrknk5lQrE35SawK'),
(5, 'ikbal', 'ikbal', '$2y$10$egTRsRJVvvnqVaKT5sTsNeElgQJsXSpsypvCFQdO6SrMJ3CcwG6I.'),
(6, 'anto', 'anto', '$2y$10$dxHu1DQYi4IAtcbLHHh/8.ZzkGOonH.y3vYRO3eQQN5ZhefRuXvNW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indeks untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `fk_id_user` (`fk_id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_kapal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`fk_id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
