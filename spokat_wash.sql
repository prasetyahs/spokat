-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jun 2021 pada 03.50
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spokat_wash`
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
  `deskripsi` text,
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
(1, 'INV/01/06-06-2021', 2, 2, 2, 95000, 3, '2021-06-06', '2021-06-16', 'Taman Rahayu\r\n', 'Screenshot_4.png'),
(2, 'INV/02/06-06-2021', 3, 2, 3, 165000, 3, '2021-06-06', '2021-06-23', 'Bekasong\r\n', 'Screenshot_4.png'),
(4, 'INV/03/06-06-2021', 3, 2, 3, 165000, 3, '2021-06-06', '2021-06-23', 'Bekasong\r\n', 'Screenshot_4.png');

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
(7, 'adminbandung', 'e10adc3949ba59abbe56e057f20f883e', '08982312312223', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
