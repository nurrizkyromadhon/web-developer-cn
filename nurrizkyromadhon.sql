-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Apr 2023 pada 16.34
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nurrizkyromadhon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_monitoring`
--

CREATE TABLE IF NOT EXISTS `project_monitoring` (
  `id_project` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `project_leader_name` varchar(255) NOT NULL,
  `project_leader_email` varchar(255) NOT NULL,
  `project_leader_image` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project_monitoring`
--

INSERT INTO `project_monitoring` (`id_project`, `project_name`, `client`, `project_leader_name`, `project_leader_email`, `project_leader_image`, `start_date`, `end_date`, `progress`) VALUES
(1, 'Pembuatan Si Keuangan', 'Bakeuda Prov. Kalsel', 'Indra Setiawan', 'indra.setiawan@gmail.com', 'pexels-simon-robben-614810.jpg', '2022-01-14', '2022-08-14', 30),
(2, 'Learning Management System', 'Ruang Guru', 'Hilman Syaputera', 'hilman.syah@gmail.com', 'pexels-photo-27411.jpg', '2022-01-30', '2022-03-10', 80),
(3, 'Si Pendeta Atlet Daerah', 'Dispora Jawa Timur', 'Febri Gunawan', 'febri.gunawan@gmail.com', '360_F_232983351_z5CAl79bHkm6eMPSoG7FggQfsJLxiZjY.jpg', '2022-02-02', '2022-05-30', 40),
(5, 'Employee Monitoring', 'PT. Bina Sarana Sukses', 'Handoko Aji', 'handoko.aji@gmail.com', 'depositphotos_74950191-stock-photo-men-latin-american-and-hispanic.jpg', '2021-09-02', '2022-01-15', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(3, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
