-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2021 pada 23.45
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isds`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_item`
--

CREATE TABLE `tb_item` (
  `id_item` int(11) NOT NULL,
  `name_item` text NOT NULL,
  `type_item` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_item`
--

INSERT INTO `tb_item` (`id_item`, `name_item`, `type_item`) VALUES
(1, 'Aplikasi', 'Software'),
(2, 'E-mail', 'Software'),
(3, 'Perangkat Komputer', 'Hardware');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kind_req`
--

CREATE TABLE `tb_kind_req` (
  `id_request` int(11) NOT NULL,
  `name_request` text NOT NULL,
  `type_request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kind_req`
--

INSERT INTO `tb_kind_req` (`id_request`, `name_request`, `type_request`) VALUES
(1, 'Pembuatan Aplikasi', 'Software'),
(2, 'Pengembangan Aplikasi', 'Software'),
(3, 'Pengadaan Barang', 'Hardware');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_problem`
--

CREATE TABLE `tb_problem` (
  `no_ticket` int(11) NOT NULL,
  `tgl_prob` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `id_service` int(11) NOT NULL,
  `problem` text NOT NULL,
  `id_item` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `v_key` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_problem`
--

INSERT INTO `tb_problem` (`no_ticket`, `tgl_prob`, `id_user`, `id_section`, `status`, `id_service`, `problem`, `id_item`, `attachment`, `v_key`, `email`) VALUES
(5, '2021-02-19', 33, 1, 3, 1, 'Perbaikan PC rusak', 1, 'SIT 19-Feb-2021 18-02-47.doc', 'db61e7ad87961f00890f8054607b4be5', 'geofanny@gmail.com'),
(6, '2021-02-19', 33, 1, 0, 1, 'Perbaikan PC rusak', 1, 'SIT 19-Feb-2021 18-04-07.doc', 'ee9e6d08ae633a49bc7cb36dbbb2a65c', 'geofanny@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_request`
--

CREATE TABLE `tb_request` (
  `no_ticket` int(11) NOT NULL,
  `tgl_req` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `description` text NOT NULL,
  `attachment` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `v_key` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_request`
--

INSERT INTO `tb_request` (`no_ticket`, `tgl_req`, `id_user`, `id_section`, `id_request`, `id_item`, `description`, `attachment`, `email`, `v_key`, `status`) VALUES
(10, '2021-02-19', 33, 1, 1, 1, 'Butuh Aplikasi Rekap Dana Bulanan ', 'SIT 19-Feb-2021 18-13-57.xls', 'geofanny@gmail.com', '4f265eddeb48703758c935a99620812c', 3),
(11, '2021-02-19', 33, 1, 2, 1, 'Report Mingguan Aplikasi Rekap Dana Bulanan ', 'SIT 19-Feb-2021 18-14-18.xls', 'geofanny@gmail.com', '9b0cf752c235d8f8ce2003c68e1a9d20', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_section`
--

CREATE TABLE `tb_section` (
  `id_section` int(11) NOT NULL,
  `section` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_section`
--

INSERT INTO `tb_section` (`id_section`, `section`) VALUES
(1, 'SIT'),
(2, 'SCA'),
(3, 'SES'),
(4, 'SMT'),
(5, 'SQA'),
(6, 'SRO'),
(8, 'DP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_service`
--

CREATE TABLE `tb_service` (
  `id_service` int(11) NOT NULL,
  `name_service` text NOT NULL,
  `type_service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_service`
--

INSERT INTO `tb_service` (`id_service`, `name_service`, `type_service`) VALUES
(1, 'Repair', 'Software'),
(2, 'Changing', 'Hardware'),
(4, 'Maintanance', 'Hardware');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `id_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`, `nama`, `email`, `level`, `id_section`) VALUES
(31, '$2y$10$rKGRL8WqSCsynUIvtXWyi.Owb/ZegYlbwULrK4YZzErmcuP7SqCse', 'Mikhael Sandro', 'mikhaelsandro82@gmail.com', 'admin', 1),
(32, '$2y$10$aerGZFxUd5ahYkPrkigdsOIOLxJNnrkFMtn/1RP2M1CWkEhVn0tqy', 'Hafiz Ibrahim', 'hafiz@gmail.com', 'manager', 8),
(33, '$2y$10$keEA3shHtyiSdFgY6AMpA.5Wrv8vNmXl7Fuvd3/93xdlZxFqhj65a', 'Geofanny Lorenza', 'geofanny@gmail.com', 'staff', 1),
(34, '$2y$10$fLJJ.Xyq7gbvgKTt.6epP.XeAVjC9rvzbmVrQ.VRlwbgFb8HuJAsy', 'Kelvin', 'kelvin@gmail.com', 'staff', 2),
(35, '$2y$10$zw0yBAFTq6JiOepA7LBLzu6TApP15kzSTkcg57wyTn/arTtQqWLOG', 'Ramandha Sari Sinabang', 'ramandha@gmail.com', 'staff', 3),
(37, '$2y$10$YuzpC0G0EF9XYs5ypm/lA.YlTWgAQHh3P459ISmCJ2PIbj9tV/iOm', 'Azriel Akbar', 'azriel@gmail.com', 'staff', 4),
(38, '$2y$10$/YEkoa77NtbRdk4EP7Q5LOBQkCcC5KUVbYimtXTnswCFopouqZeWW', 'Ardi', 'ardi@gmail.com', 'staff', 5),
(39, '$2y$10$yMswsNjvPYSrHEgEtnEc/O4kAdvqjzbhFFFc9YvXsFrH3teTunFkG', 'Rahmat Aditya', 'rahmat@gmail.com', 'staff', 6),
(40, '$2y$10$NhVkTkyEszG6w4uG.P2jOuz0ZVSSv1wRbVn7mihyX60XPWYoH3VpS', 'Ade Chandra', 'ade@gmail.com', 'petugas', 8),
(41, '$2y$10$PeTDdTMZbFPoAH.WTt7BPutGwsk1/zXI22O50OMOh.PXHq0myye2i', 'Wahyu Akbar', 'wahyu@gmail.com', 'engineer', 1),
(42, '$2y$10$lBM7Rk0QSQzKkCFGaWztTO7TFISxgtYmGgtlNQUWITnkOuDnGXTiu', 'Naufal', 'naufal@gmail.com', 'engineer', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_item` (`id_item`);

--
-- Indeks untuk tabel `tb_kind_req`
--
ALTER TABLE `tb_kind_req`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `tb_problem`
--
ALTER TABLE `tb_problem`
  ADD PRIMARY KEY (`no_ticket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_section` (`id_section`);

--
-- Indeks untuk tabel `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`no_ticket`);

--
-- Indeks untuk tabel `tb_section`
--
ALTER TABLE `tb_section`
  ADD PRIMARY KEY (`id_section`),
  ADD KEY `id_section` (`id_section`);

--
-- Indeks untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_service` (`id_service`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_section` (`id_section`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kind_req`
--
ALTER TABLE `tb_kind_req`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_problem`
--
ALTER TABLE `tb_problem`
  MODIFY `no_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `no_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_section`
--
ALTER TABLE `tb_section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_problem`
--
ALTER TABLE `tb_problem`
  ADD CONSTRAINT `tb_problem_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `tb_section` (`id_section`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
