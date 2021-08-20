-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2021 pada 16.25
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
(2, 'Quick Clean', 'Membersihkan Luar Sepatu', 40000),
(3, 'Deep Clean Easy', 'Membersihkan Seluruh Bagian Sepatu', 50000),
(4, 'Deep Clean Hard', 'Membersihkan Seluruh Bagian Sepatu', 70000),
(5, 'Toddler Shoes', 'Membersihkan Sepatu Anak-Anak', 35000),
(6, 'White Shoes', 'Membersihkan Sepatu Putih', 75000),
(7, 'Leather Care', 'Perawatan Kulit', 60000),
(8, 'Unyellowing', 'Menghilangkan noda kekuningan pada sepatu', 70000);

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
  `id_transaksi` int(11) NOT NULL,
  `jawaban` enum('Baik','Cukup','Kurang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jawaban_kuesioner`
--

INSERT INTO `tb_jawaban_kuesioner` (`id_jawaban`, `id_kuesioner`, `id_user`, `id_transaksi`, `jawaban`) VALUES
(17, 6, 11, 29, 'Cukup'),
(18, 7, 11, 29, 'Baik'),
(19, 6, 11, 30, 'Baik'),
(20, 7, 11, 30, 'Baik'),
(21, 6, 12, 32, 'Baik'),
(22, 7, 12, 32, 'Cukup'),
(23, 6, 12, 33, 'Baik'),
(24, 7, 12, 33, 'Baik'),
(25, 6, 13, 34, 'Baik'),
(26, 7, 13, 34, 'Baik'),
(27, 6, 13, 35, 'Baik'),
(28, 7, 13, 35, 'Cukup'),
(29, 6, 14, 36, 'Cukup'),
(30, 7, 14, 36, 'Cukup'),
(31, 6, 14, 37, 'Baik'),
(32, 7, 14, 37, 'Baik'),
(33, 6, 15, 38, 'Baik'),
(34, 7, 15, 38, 'Cukup'),
(35, 6, 14, 39, 'Baik'),
(36, 7, 14, 39, 'Baik'),
(37, 6, 19, 40, 'Baik'),
(38, 7, 19, 40, 'Kurang'),
(39, 6, 8, 28, 'Baik'),
(40, 7, 8, 28, 'Cukup'),
(41, 6, 8, 42, 'Baik'),
(42, 7, 8, 42, 'Cukup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_komplain`
--

CREATE TABLE `tb_kategori_komplain` (
  `id` int(11) NOT NULL,
  `jenis_komplain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_komplain`
--

INSERT INTO `tb_kategori_komplain` (`id`, `jenis_komplain`) VALUES
(8, 'Tidak Bersih'),
(9, 'Tidak Bersih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komplain`
--

CREATE TABLE `tb_komplain` (
  `id_komplain` int(11) NOT NULL,
  `kategori_komplain` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komplain`
--

INSERT INTO `tb_komplain` (`id_komplain`, `kategori_komplain`, `id_transaksi`, `pesan`) VALUES
(7, 8, 44, 'asdasdsa');

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
(6, 'Apakah Anda Puas ?'),
(7, 'Apakah Pelayanan Yang Kami Sediakan Sudah Terbaik?');

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
(49, 44, 'dsadas', 4);

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
(28, 'INV/12/10-08-2021', 2, 8, 1, 55000, 3, '2021-07-11', '2021-07-12', 'dsadsa', 'cbimage.png'),
(29, 'INV/01/12-07-2021', 2, 11, 2, 95000, 3, '2021-07-12', '2021-07-15', 'Pondok Ungu', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(30, 'INV/02/12-07-2021', 2, 11, 1, 55000, 3, '2021-07-12', '2021-07-14', 'PUp', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(31, 'INV/03/12-07-2021', 3, 11, 2, 115000, 3, '2021-07-12', '2021-07-15', 'Pondok Ungu', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(32, 'INV/04/12-07-2021', 3, 12, 2, 115000, 3, '2021-07-12', '2021-07-16', 'Melati', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(33, 'INV/05/12-07-2021', 4, 12, 2, 155000, 3, '2021-07-12', '2021-07-16', 'Melati', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(34, 'INV/06/25-07-2021', 2, 13, 1, 55000, 3, '2021-07-25', '2021-07-27', 'Kenari 10', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(35, 'INV/07/25-07-2021', 2, 13, 2, 95000, 3, '2021-07-25', '2021-07-28', 'Kenari 10', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(36, 'INV/08/25-07-2021', 5, 14, 2, 85000, 3, '2021-07-25', '2021-07-28', 'Melati\r\n', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(37, 'INV/09/25-07-2021', 6, 14, 1, 90000, 3, '2021-07-25', '2021-07-26', 'Melati', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(38, 'INV/10/25-07-2021', 6, 15, 2, 165000, 3, '2021-07-25', '2021-07-26', 'sakura', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(39, 'INV/11/25-07-2021', 2, 14, 2, 95000, 3, '2021-07-25', '2021-07-29', 'Melati', 'bukti_transfer_trf__1577263390_4882166a_progressive.jpg'),
(40, 'INV/13/10-08-2021', 2, 19, 12, 495000, 3, '2021-08-10', '2021-08-12', 'dasdsa', 'Capture.PNG'),
(41, NULL, 4, 19, 12, 855000, 0, '2021-08-10', NULL, 'dsadas', NULL),
(42, 'INV/14/10-08-2021', 2, 8, 12, 495000, 3, '2021-08-10', '2021-08-22', 'dsadsa', 'erd.PNG'),
(43, 'INV/15/11-08-2021', 6, 8, 2, 165000, 3, '2021-08-11', '2021-08-12', 'asdasdsa', 'Capture.PNG'),
(44, 'INV/16/12-08-2021', 2, 21, 12, 495000, 3, '2021-08-12', '2021-08-13', 'dasdsa', 'Capture.PNG'),
(45, 'INV/17/12-08-2021', 3, 21, 12, 615000, 3, '2021-08-12', '2021-08-13', 'sasa', 'Capture.PNG'),
(46, NULL, 3, 19, 12, 615000, 0, '2021-08-13', NULL, 'das', NULL),
(47, NULL, 2, 19, 12, 495000, 0, '2021-08-13', NULL, 'dasdsa', NULL),
(48, NULL, 2, 21, 12, 495000, 0, '2021-08-20', NULL, 'saas', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `no_hp`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `hak_akses`) VALUES
(1, 'hehe', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08923113112211', '', 'Laki-Laki', NULL, 'super'),
(2, 'asd', 'user', '6ad14ba9986e3615423dfca256d04e3f', '089213131231232', '', 'Laki-Laki', NULL, 'user'),
(3, 'asd', 'deni', 'ee11cbb19052e40b07aac0ca060c23ee', '0823131231', '', 'Laki-Laki', NULL, 'user'),
(4, 'bb', 'diki', 'dffaa4c60a250f19dc4a79b1d05c8d53', '08312321231', '', 'Laki-Laki', NULL, 'user'),
(7, 'cc', 'adminbandung', 'b8f8312b939f00abb38eeafd4fd107f3', '08982312312223', '', 'Laki-Laki', NULL, 'admin'),
(8, 'dd', 'prasetya', '7815696ecbf1c96e6894b779456d330e', '089897382189', '', 'Laki-Laki', NULL, 'user'),
(9, 'cc', 'hehe', '7815696ecbf1c96e6894b779456d330e', '432423', '', 'Laki-Laki', NULL, 'user'),
(10, 'ww', 'usertest', 'a8f5f167f44f4964e6c998dee827110c', '089506277284', '', 'Laki-Laki', NULL, 'user'),
(11, 'll', 'ilham', 'b8f8312b939f00abb38eeafd4fd107f3', '089681011657', '', 'Laki-Laki', NULL, 'user'),
(12, 'mm', 'bagas', 'b6d767d2f8ed5d21a44b0e5886680cb9', '0856782778', '', 'Laki-Laki', NULL, 'user'),
(13, 'aasdas', 'ifan', 'c4ca4238a0b923820dcc509a6f75849b', '0876252667', '', 'Laki-Laki', NULL, 'user'),
(14, 'asdklaskokdosa', 'gino', 'c81e728d9d4c2f636f067f89cc14862c', '087623345', '', 'Laki-Laki', NULL, 'user'),
(15, 'asd', 'yanto', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '0896729938', '', 'Laki-Laki', NULL, 'user'),
(16, 'ppp', 'gg', '7815696ecbf1c96e6894b779456d330e', '089506277284', '', 'Laki-Laki', NULL, 'user'),
(17, 'dd', 'dsadsa', '89defae676abd3e3a42b41df17c40096', 'dasdas', '', 'Laki-Laki', NULL, 'user'),
(18, 'asdasd', 'asdasd', '89defae676abd3e3a42b41df17c40096', '089506277284', 'asdasd', 'Laki-Laki', '2021-08-11', 'user'),
(19, 'prasetya', 'asd', '7815696ecbf1c96e6894b779456d330e', '089506277284', 'asd', 'Laki-Laki', '2021-08-20', 'user'),
(20, 'asd', 'cc', 'e0323a9039add2978bf5b49550572c7c', '089506277284', 'cc', 'Laki-Laki', '2021-08-12', 'user'),
(21, 'asdff', 'asd12', '7815696ecbf1c96e6894b779456d330e', '089506277284', 'asd', 'Perempuan', '2021-08-26', 'user'),
(22, 'Prasetya Hadi Saputra', 'asd13', '7815696ecbf1c96e6894b779456d330e', '089506277284', 'dasdas', 'Laki-Laki', '2021-02-02', 'user');

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
  ADD KEY `tb_jawaban_kuesioner_ibfk_2` (`id_user`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `tb_kategori_komplain`
--
ALTER TABLE `tb_kategori_komplain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_komplain`
--
ALTER TABLE `tb_komplain`
  ADD PRIMARY KEY (`id_komplain`),
  ADD KEY `tb_komplain_ibfk_1` (`kategori_komplain`);

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
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_komplain`
--
ALTER TABLE `tb_kategori_komplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_komplain`
--
ALTER TABLE `tb_komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kuesioner`
--
ALTER TABLE `tb_kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jawaban_kuesioner`
--
ALTER TABLE `tb_jawaban_kuesioner`
  ADD CONSTRAINT `tb_jawaban_kuesioner_ibfk_1` FOREIGN KEY (`id_kuesioner`) REFERENCES `tb_kuesioner` (`id_kuesioner`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jawaban_kuesioner_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jawaban_kuesioner_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`transaksi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_komplain`
--
ALTER TABLE `tb_komplain`
  ADD CONSTRAINT `tb_komplain_ibfk_1` FOREIGN KEY (`kategori_komplain`) REFERENCES `tb_kategori_komplain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`transaksi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
