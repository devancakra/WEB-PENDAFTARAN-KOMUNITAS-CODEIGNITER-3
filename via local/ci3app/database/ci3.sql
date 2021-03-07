-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2021 pada 16.17
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `robotics`
--

CREATE TABLE `robotics` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `wa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `robotics`
--

INSERT INTO `robotics` (`id`, `email`, `nama`, `prodi`, `wa`) VALUES
(1, 'Mark@gmail.com', 'Otto Mark', 'Sains Data', '+12 0044004'),
(2, 'Jacob@gmail.com', 'Thornton Jacob', 'Sains Data', '+12 0800690'),
(3, 'Larry@gmail.com', 'Larry Wing', 'Computer Sains', '+12 0512463'),
(4, 'Jonny@gmail.com', 'Jonny Proteseus', 'Computer Sains', '+12 0411822'),
(5, 'Gilbert@gmail.com', 'Edison Gilbert', 'Information System', '+12 0411623'),
(6, 'gh@gmail.com', 'Gajah Purnomo', 'Informatika', '0838 3232 5492'),
(7, 'rasyid@gmail.com', 'Bahari Rasyid', 'Sains Data', '0878 7232 3490'),
(8, 'laudya@gmail.com', 'Laudya Nirwani', 'Informatika', '0821 2152 4563'),
(9, 'classya@gmail.com', 'Classyandra Ayu', 'Sistem Informasi', '0822 3252 4552'),
(10, 'robert@gmail.com', 'Alyando Robert', 'Teknik Kimia', '0811 2112 2444'),
(11, 'tiara78@gmail.com', 'Tiara Andini Tzuela', 'Teknik Mesin', '0828 2117 2278'),
(12, 'rifky077@gmail.com', 'Rifky Akhmad Fernanda', 'Informatika', '0852 4578 9090'),
(13, 'herikh7@gmail.com', 'Heri Khariono', 'Informatika', '0812 1245 5444'),
(14, 'guntur@gmail.com', 'Guntur Adi Setiyawan', 'Teknik Industri', '0828 8787 4532'),
(15, 'clarency@gmail.com', 'Clara Mutia Rency ', 'Teknik Mesin', '0812 2454 8754'),
(16, 'sugeng@gmail.com', 'Sugeng Kurniawan', 'Teknik Sipil', '0838 2455 2444'),
(17, 'subagyo@gmail.com', 'Subagyo Moda', 'Teknik Kimia', '0838 8585 3434'),
(18, 'adelia@gmail.com', 'Adelia Nerrizza Putri', 'Arsitektur', '0858 5245 2422'),
(19, 'mutiara@gmail.com', 'Intan Mutiara Prawesti', 'Arsitektur', '0858 2324 9090'),
(20, 'claudya@gmail.com', 'Claudya Murni Sakti', 'Informatika', '0828 4040 6785'),
(21, 'devancakra6@gmail.com', 'Devan Cakra Mudra Wijaya', 'Informatika', '0878 2452 8724'),
(22, 'tasya07@gmail.com', 'Tasya Ardhian Nisa', 'Informatika', '0878 7844 3242');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'admin@gmail.com', 'adminRobotics', '$2y$10$.y/u5yWCXlKagIUgMjXBfOr', 1, 1, '2021-03-06'),
(2, 'member@gmail.com', 'memberRobotics', '$2y$10$g27raBze2svhO8S9U/SxcOd', 2, 1, '2021-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `robotics`
--
ALTER TABLE `robotics`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `robotics`
--
ALTER TABLE `robotics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
