-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 19.38
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spokat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `deskripsi`, `harga`) VALUES
(2, 'Quick Clean', '', 40000),
(3, 'Deep Clean Easy', '', 50000),
(4, 'Deep Clean Hard', '', 70000),
(5, 'Toddler Shoes', '', 35000),
(6, 'White Shoes', '', 75000),
(7, 'Leather Care', '', 60000),
(8, 'Unyellowing', '', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_nama` varchar(255) NOT NULL,
  `pelanggan_hp` varchar(255) NOT NULL,
  `pelanggan_alamat` text NOT NULL,
  `pelanggan_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_hp`, `pelanggan_alamat`, `pelanggan_password`) VALUES
(2, 'Deni', '082176590042', 'Alinda', 'd94016c07f86a27e30bef01e2b8409ac'),
(3, 'Panji', '0857890876', 'Bekasi', '9f5ebaf51cd5985ead9ce8cdc06dde84');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_kuesioner`
--

CREATE TABLE `tb_jawaban_kuesioner` (
  `id_jawaban` int(11) NOT NULL,
  `id_kuesioner` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jawaban` enum('Baik','Cukup','Kurang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jawaban_kuesioner`
--

INSERT INTO `tb_jawaban_kuesioner` (`id_jawaban`, `id_kuesioner`, `id_user`, `jawaban`) VALUES
(5, 1, 8, 'Baik'),
(6, 2, 8, 'Cukup'),
(7, 3, 8, 'Baik'),
(8, 4, 8, 'Cukup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuesioner`
--

CREATE TABLE `tb_kuesioner` (
  `id_kuesioner` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kuesioner`
--

INSERT INTO `tb_kuesioner` (`id_kuesioner`, `pertanyaan`) VALUES
(1, 'Apa yang Anda Pikirkan ?\r\n'),
(2, 'Apa saja yang kamu dapatkan ?'),
(3, 'Apa ?'),
(4, 'Ada Apa ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_transaksi`, `pesan`, `rate`) VALUES
(19, 19, 'test\r\n', 4),
(20, 20, 'dsadas', 4),
(21, 21, 'dsadsa', 2),
(22, 22, 'dsadsa', 5),
(23, 23, 'kurang jos\r\n', 1),
(24, 24, 'joss\r\n', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `transaksi_jml_sepatu` int(11) NOT NULL,
  `transaksi_harga` int(11) NOT NULL,
  `transaksi_status` int(11) NOT NULL,
  `transaksi_tgl` date NOT NULL,
  `transaksi_tgl_selesai` date DEFAULT NULL,
  `transaksi_alamat` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `invoice`, `id_layanan`, `id_user`, `transaksi_jml_sepatu`, `transaksi_harga`, `transaksi_status`, `transaksi_tgl`, `transaksi_tgl_selesai`, `transaksi_alamat`, `bukti_transfer`) VALUES
(19, '', 6, 8, 1, 90000, 3, '2021-06-29', '2021-06-30', 'dsa', NULL),
(20, '', 2, 8, 1, 55000, 3, '2021-06-29', '2021-06-30', 'dsa\r\n', NULL),
(21, '', 3, 8, 1, 65000, 3, '2021-06-29', '2021-06-30', 'dsadsa', NULL),
(22, '', 7, 8, 1, 75000, 3, '2021-06-29', '2021-09-30', 'dsadsa', NULL),
(23, '', 3, 10, 1, 65000, 3, '2021-06-29', '2021-09-30', 'dsa', NULL),
(24, '', 2, 10, 1, 55000, 3, '2021-06-29', '2021-09-30', 'sadsa', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `no_hp`, `hak_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '08923113112211', 'super'),
(2, 'user', '6ad14ba9986e3615423dfca256d04e3f', '089213131231232', 'user'),
(3, 'deni', 'ee11cbb19052e40b07aac0ca060c23ee', '0823131231', 'user'),
(4, 'diki', 'dffaa4c60a250f19dc4a79b1d05c8d53', '08312321231', 'user'),
(7, 'adminbandung', 'b8f8312b939f00abb38eeafd4fd107f3', '08982312312223', 'admin'),
(8, 'prasetya', 'b8f8312b939f00abb38eeafd4fd107f3', '089897382189', 'user'),
(9, 'hehe', '202cb962ac59075b964b07152d234b70', '432423', 'user'),
(10, 'usertest', 'a8f5f167f44f4964e6c998dee827110c', '089506277284', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `tb_jawaban_kuesioner`
--
ALTER TABLE `tb_jawaban_kuesioner`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_kuesioner` (`id_kuesioner`),
  ADD KEY `tb_jawaban_kuesioner_ibfk_2` (`id_user`);

--
-- Indeks untuk tabel `tb_kuesioner`
--
ALTER TABLE `tb_kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`);

--
-- Indeks untuk tabel `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `tb_rating_ibfk_1` (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban_kuesioner`
--
ALTER TABLE `tb_jawaban_kuesioner`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kuesioner`
--
ALTER TABLE `tb_kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jawaban_kuesioner`
--
ALTER TABLE `tb_jawaban_kuesioner`
  ADD CONSTRAINT `tb_jawaban_kuesioner_ibfk_1` FOREIGN KEY (`id_kuesioner`) REFERENCES `tb_kuesioner` (`id_kuesioner`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jawaban_kuesioner_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`transaksi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
