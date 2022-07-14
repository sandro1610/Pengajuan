-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 08:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
-- Table structure for table `tb_request`
--

CREATE TABLE `tb_request` (
  `no_ticket` int(11) NOT NULL,
  `tgl_req` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` text NOT NULL,
  `attachment` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `v_key` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`no_ticket`, `tgl_req`, `id_user`, `description`, `attachment`, `email`, `v_key`, `status`) VALUES
(14, '2022-07-14', 45, 'Pengajuan proposal permohonan sponsorship untuk acara IT Festival', 'Abdramsyah 14-Jul-2022 07-47-38.pdf', 'abd@gmail.com', '726277f3edd519e956c818dfbd79ec08', 2),
(15, '2022-07-14', 45, 'Pengajuan', 'Abdramsyah 14-Jul-2022 18-59-17.pdf', 'abd@gmail.com', '8780e492061d0542fecbef901e122ce4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`, `nama`, `no_hp`, `email`, `level`) VALUES
(44, '$2y$10$wLLZi5WcGcvap1zcqpnaQuBieZbqzohFNaxQ6w27dJvQBGTbpDnxi', 'Mikhael Sandro', '082384602288', 'sandro@gmail.com', 'Admin'),
(45, '$2y$10$z.hC1BdNN/JgXTyDNdR6Q.Ttl.hSBNp3Y14ixng./HYc5y3u/TUo6', 'Abdramsyah', '0812332112', 'abd@gmail.com', 'Pengaju'),
(46, '$2y$10$YOC4e.uyZW8Fn/ECHskFiOqva3uT/D1u2o8nVMf8NjZr8QJeaa1Am', 'Habib', '081231231', 'habib@gmail.com', 'Kadin'),
(47, '$2y$10$qM7OQ/JNmNU.tATms8sTZOmedDWS/FNH/TKoj6LKU2ivapgE6wSCG', 'Jayah', '08231333311', 'jayah@gmail.com', 'Kabag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`no_ticket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `no_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
