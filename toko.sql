-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2023 pada 14.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `baju`
--

CREATE TABLE `baju` (
  `id` int(11) NOT NULL,
  `Barang` varchar(255) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Harga` varchar(255) NOT NULL,
  `Restock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `baju`
--

INSERT INTO `baju` (`id`, `Barang`, `Stok`, `Harga`, `Restock`) VALUES
(1, 'Kemeja Polos', 11, '60000', '2021-11-12'),
(2, 'Kaos Oblong', 8, '35000', '2021-11-04'),
(3, 'Kaos Berkerah', 15, '75000', '2021-11-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `celana`
--

CREATE TABLE `celana` (
  `id` int(11) NOT NULL,
  `Barang` varchar(255) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Harga` varchar(255) NOT NULL,
  `Restock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `celana`
--

INSERT INTO `celana` (`id`, `Barang`, `Stok`, `Harga`, `Restock`) VALUES
(2, 'Celana Jogger', 3, '75000', '2021-11-07'),
(3, 'Celana Levis', 12, '60000', '2021-11-01'),
(4, 'Celana Kargo', 7, '65000', '2021-10-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaket`
--

CREATE TABLE `jaket` (
  `id` int(11) NOT NULL,
  `Barang` varchar(255) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Harga` varchar(255) NOT NULL,
  `Restock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jaket`
--

INSERT INTO `jaket` (`id`, `Barang`, `Stok`, `Harga`, `Restock`) VALUES
(1, 'Jaket Bomber', 6, '125000', '2021-11-09'),
(3, 'Jaket Kulit', 2, '250000', '2021-11-13'),
(6, 'Jaket Hoodie', 2, '100000', '2023-10-19'),
(7, 'Jaket Sweater', 5, '120000', '2023-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Tujuan` varchar(255) NOT NULL,
  `Jenis` varchar(255) NOT NULL,
  `Barang` varchar(255) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`id`, `Nama`, `Tujuan`, `Jenis`, `Barang`, `Jumlah`, `Tanggal`) VALUES
(1, 'Ronaldo', 'Rumah ponakan Ronaldo', 'Jaket', 'Hoodie Merah', 2, '2023-11-17'),
(2, 'Messi', 'Villa Messi', 'Baju', 'Kaos Berkerah', 1, '2023-11-19'),
(3, 'Haaland', 'Apartemen di Norwegia', 'Celana', 'Jeans Levis', 2, '2021-09-12'),
(4, 'Maradona', 'Rumah kakek maradona', 'Baju', 'Kaos Berkerah', 1, '2021-12-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'rahul', '$2y$10$pCoDtAuN7n4LZB9GwI2zW.yJrB6Thtypzzw0JhmPgg0KQA1cPNgzu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `worker`
--

INSERT INTO `worker` (`id`, `username`, `password`) VALUES
(1, 'yanuar', '$2y$10$BCxYTaL1EARP4G0rA0pk9.kHUZGofFtndACDMSH37cXo7qwk.1ZXS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `celana`
--
ALTER TABLE `celana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jaket`
--
ALTER TABLE `jaket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `baju`
--
ALTER TABLE `baju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `celana`
--
ALTER TABLE `celana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jaket`
--
ALTER TABLE `jaket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
