-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2019 pada 00.52
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `purchase` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(1, 2013, 2000, 3000, 1000),
(2, 2014, 4500, 5000, 500),
(3, 2015, 3000, 4500, 1500),
(4, 2016, 2000, 3000, 1000),
(5, 2017, 2000, 4000, 2000),
(6, 2018, 2200, 3000, 800),
(7, 2019, 5000, 7000, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_akses` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_akses`, `id_user`, `created_at`) VALUES
('AK01', 10, '2019-03-25 13:51:38'),
('AK02', 11, '2019-03-25 13:51:38'),
('AK03', 12, '2019-03-25 13:51:38'),
('AK04', 13, '2019-03-25 13:51:38'),
('AK05', 63, '2019-03-25 13:53:56'),
('AK06', 64, '2019-03-25 14:06:11'),
('AK07', 65, '2019-03-25 14:07:44'),
('AK08', 66, '2019-04-04 14:46:54'),
('AK09', 67, '2019-04-04 15:32:53'),
('AK10', 68, '2019-04-04 15:33:43'),
('AK11', 69, '2019-04-04 15:52:39'),
('AK12', 70, '2019-04-04 15:57:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_com` int(11) NOT NULL,
  `no_tiket` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `com` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_com`, `no_tiket`, `id_user`, `com`, `created_at`) VALUES
(1, 'TK004', 0, 'coba', '2019-03-20 13:39:44'),
(2, 'TK004', 0, 'coba', '2019-03-20 13:39:50'),
(3, 'TK003', 0, 'coba', '2019-03-20 13:39:57'),
(4, 'TK002', 0, 'masuk ya', '2019-03-20 13:40:01'),
(5, 'TK001', 11, 'bissmillah', '2019-03-20 15:11:10'),
(6, 'TK004', 0, 'bismillah ya Allah', '2019-03-20 13:46:19'),
(7, 'TK004', 0, 'masuk nih', '2019-03-20 13:47:32'),
(8, 'TK004', 0, 'belum bisa nih', '2019-03-20 13:57:02'),
(9, 'TK003', 0, 'sebentar ya bu', '2019-03-20 14:03:08'),
(10, 'TK003', 0, 'baik pak, tolong cepat yaa', '2019-03-20 14:04:38'),
(11, 'TK004', 0, 'oke', '2019-03-20 14:05:08'),
(12, 'TK004', 12, 'ahah', '2019-03-20 14:16:42'),
(13, 'TK004', 12, 'masushhhsshh', '2019-03-20 14:11:28'),
(14, 'TK004', 12, 'baik pak', '2019-03-20 14:16:55'),
(15, 'TK004', 10, 'okee mba', '2019-03-20 14:17:31'),
(16, 'TK004', 10, 'ditunggu sebetar ya', '2019-03-20 14:17:52'),
(17, 'TK004', 10, 'oke non', '2019-03-20 14:45:26'),
(18, 'TK004', 12, 'sip om', '2019-03-20 14:45:57'),
(19, 'TK001', 10, 'IYA IYA', '2019-03-20 15:11:25'),
(20, 'TK001', 10, 'lah santaaaaii', '2019-03-20 15:11:59'),
(21, 'TK004', 10, 'test admin', '2019-03-20 15:13:06'),
(22, 'TK004', 12, 'tes mulu', '2019-03-20 15:13:39'),
(23, 'TK005', 11, 'cepet ya', '2019-03-20 15:15:40'),
(24, 'TK005', 11, 'jiaaaahhh', '2019-03-20 15:16:01'),
(25, 'TK005', 10, 'coba', '2019-03-20 15:17:32'),
(26, 'TK004', 12, 'hia hia', '2019-03-20 15:18:11'),
(27, 'TK005', 10, 'iya siaap ni cepet', '2019-03-20 15:42:53'),
(28, 'TK005', 11, 'baik om', '2019-03-20 15:43:21'),
(29, 'TK005', 10, 'mohaaha', '2019-03-21 10:26:24'),
(30, 'TK005', 11, 'jiaaah', '2019-03-21 10:26:53'),
(31, 'TK006', 10, 'segera ke lokasi', '2019-03-21 10:30:26'),
(32, 'TK006', 11, 'sip di tunggu, ubah statusnya dulu pak', '2019-03-21 10:31:12'),
(33, 'TK006', 10, 'sip udah', '2019-03-21 10:32:32'),
(34, 'TK006', 10, 'problem solved ya', '2019-03-22 01:50:21'),
(35, 'TK002', 11, 'gimanaaa inin paak', '2019-03-22 08:21:52'),
(36, 'TK002', 11, 'saya ga bisa kerjaa', '2019-03-22 08:21:59'),
(37, 'TK002', 10, 'sabaaar cot', '2019-03-22 08:22:33'),
(38, 'TK007', 64, 'cek bag', '2019-03-25 14:13:25'),
(39, 'TK007', 10, 'siaaap', '2019-03-25 14:14:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailakses`
--

CREATE TABLE `detailakses` (
  `id_detail` int(11) NOT NULL,
  `id_akses` varchar(255) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailakses`
--

INSERT INTO `detailakses` (`id_detail`, `id_akses`, `id_menu`, `created_at`) VALUES
(1, 'AK01', 1, '2019-03-25 13:40:06'),
(2, 'AK01', 2, '2019-03-25 13:40:06'),
(3, 'AK01', 3, '2019-03-25 13:40:06'),
(4, 'AK01', 4, '2019-03-25 13:40:06'),
(5, 'AK01', 5, '2019-03-25 13:40:06'),
(6, 'AK01', 6, '2019-03-25 13:40:06'),
(7, 'AK01', 7, '2019-03-25 13:40:06'),
(8, 'AK01', 8, '2019-03-25 13:40:06'),
(64, 'AK05', 1, '2019-03-25 13:53:56'),
(65, 'AK05', 2, '2019-03-25 13:53:56'),
(66, 'AK05', 3, '2019-03-25 13:53:56'),
(120, 'ujang', 1, '2019-03-26 17:06:55'),
(121, 'ujang', 2, '2019-03-26 17:06:55'),
(122, 'ujang', 3, '2019-03-26 17:06:55'),
(123, 'ujang', 5, '2019-03-26 17:06:55'),
(124, 'ujang', 6, '2019-03-26 17:06:55'),
(125, 'ujang', 4, '2019-03-26 17:06:55'),
(254, 'AK02', 1, '2019-03-26 17:25:32'),
(255, 'AK02', 2, '2019-03-26 17:25:32'),
(256, 'AK02', 3, '2019-03-26 17:25:32'),
(257, 'AK02', 4, '2019-03-26 17:25:32'),
(262, 'Nurul Annisa', 1, '2019-03-26 17:28:02'),
(263, 'Nurul Annisa', 2, '2019-03-26 17:28:02'),
(264, 'Nurul Annisa', 3, '2019-03-26 17:28:02'),
(269, 'AK03', 1, '2019-03-26 17:29:02'),
(270, 'AK03', 2, '2019-03-26 17:29:02'),
(271, 'AK03', 3, '2019-03-26 17:29:02'),
(272, 'AK03', 5, '2019-03-26 17:29:02'),
(273, 'AK03', 6, '2019-03-26 17:29:02'),
(274, 'AK03', 7, '2019-03-26 17:29:02'),
(275, 'AK03', 8, '2019-03-26 17:29:02'),
(276, 'AK03', 4, '2019-03-26 17:29:02'),
(284, 'AK06', 1, '2019-03-26 18:05:07'),
(285, 'AK06', 2, '2019-03-26 18:05:07'),
(286, 'AK06', 3, '2019-03-26 18:05:07'),
(289, 'AK04', 1, '2019-04-04 13:36:24'),
(290, 'AK04', 2, '2019-04-04 13:36:24'),
(291, 'AK04', 4, '2019-04-04 13:36:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `no_div` int(11) NOT NULL,
  `nama_div` varchar(40) NOT NULL,
  `lt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`no_div`, `nama_div`, `lt`) VALUES
(1, 'HRD', 4),
(2, 'Finance', 3),
(3, 'Sales Inst', 2),
(4, 'Sales Retail', 4),
(5, 'Accounting', 3),
(6, 'Pajak', 3),
(7, 'Marketing', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `it`
--

CREATE TABLE `it` (
  `no_it` int(11) NOT NULL,
  `nama_it` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `no_kat` int(11) NOT NULL,
  `nama_kat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`no_kat`, `nama_kat`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'Jaringan'),
(4, 'Lain - lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `parent` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `fungsi` int(11) NOT NULL,
  `icon` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `slug`, `parent`, `child`, `fungsi`, `icon`) VALUES
(1, 'Dashboard', 'home', 1, 0, 0, 'mdi mdi-view-dashboard'),
(2, 'Ticket', 'ticket', 1, 0, 0, 'mdi mdi-chart-bar'),
(3, 'Data', 'data', 1, 0, 0, 'mdi mdi-database'),
(4, 'Report', 'prints', 1, 0, 0, 'mdi mdi-file-document-box'),
(5, 'User', 'user', 0, 3, 0, 'mdi  mdi-account'),
(6, 'Kategori', 'kategori', 0, 3, 0, 'mdi mdi-format-align-center'),
(7, 'Status', 'status', 0, 3, 0, 'mdi mdi-file'),
(8, 'Divisi', 'divisi', 0, 3, 0, 'mdi mdi-division-box');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `no_sts` int(11) NOT NULL,
  `nama_sts` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`no_sts`, `nama_sts`) VALUES
(1, 'Open'),
(2, 'Progress'),
(3, 'Closed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `idcom` int(11) NOT NULL,
  `parent_com` int(11) NOT NULL,
  `comment` text NOT NULL,
  `sender` varchar(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `no_tiket` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_kat` int(11) NOT NULL,
  `id_com` int(11) NOT NULL,
  `masalah` text NOT NULL,
  `flag` int(11) NOT NULL,
  `no_sts` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `closed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `closed_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`no_tiket`, `id_user`, `no_kat`, `id_com`, `masalah`, `flag`, `no_sts`, `create_at`, `updated_at`, `updated_by`, `closed_at`, `closed_by`) VALUES
('TK001', 11, 2, 1, 'Monitor saya meletus', 1, 3, '2019-03-18 17:00:00', '2019-03-19 10:21:54', 10, '2019-03-20 02:52:30', 10),
('TK002', 11, 3, 0, 'Wifi lt 3 mati', 1, 3, '2019-03-19 09:25:03', '2019-03-20 13:13:50', 10, '2019-03-22 09:19:35', 10),
('TK003', 12, 1, 0, 'website sadhanas down', 1, 3, '2019-03-19 09:25:38', '2019-03-20 13:13:43', 10, '2019-03-21 07:17:08', 10),
('TK004', 12, 1, 0, 'v2 out of memory', 1, 3, '2019-03-19 09:26:00', '2019-03-20 13:13:47', 10, '2019-03-20 13:14:01', 10),
('TK005', 11, 1, 0, 'au nih ngapa om\r\n', 1, 3, '2019-03-20 15:14:41', '2019-03-21 01:50:36', 10, '2019-03-21 06:34:20', 10),
('TK006', 11, 1, 0, 'awdasdsad', 1, 3, '2019-03-21 10:29:46', '2019-03-21 10:31:51', 10, '2019-03-22 01:49:58', 10),
('TK007', 64, 2, 0, 'anuuu', 1, 3, '2019-03-25 14:13:11', '2019-03-25 14:14:15', 10, '2019-03-26 08:16:03', 10),
('TK008', 12, 3, 0, 'hahah', 1, 3, '2019-03-25 14:43:02', '0000-00-00 00:00:00', 0, '2019-03-25 14:44:07', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `no_tiket` int(11) NOT NULL,
  `no_it` int(11) NOT NULL,
  `no_sts` int(11) NOT NULL,
  `no_kat` int(11) NOT NULL,
  `selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `no_div` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `foto`, `no_div`, `level`, `created_at`) VALUES
(10, 'Admin', 'admin', 'admin', '', 1, 1, '2019-03-25 13:52:00'),
(11, 'Mohamad Akbar', 'akbar@mail.com', 'akbar', 'ic_user.png', 6, 2, '2019-04-04 17:33:40'),
(12, 'Nurul Annisa', 'annisa@mail.com', 'anis', 'IMG_0421.JPG', 2, 2, '2019-04-04 17:30:22'),
(13, 'Sofia tp', 'sofia@mail.co', 'abcde-12345', 'Chrysanthemum.jpg', 2, 2, '2019-04-04 17:22:23'),
(63, 'bismillah', 'mohamadakbar1102@gmail.com', 'asd', '', 2, 0, '2019-03-25 13:53:56'),
(64, 'kitoy', 'ujang@mail.com', 'ujang', '', 2, 0, '2019-03-26 18:04:46'),
(65, 'asd', 'asd@asd.cdsc', 'asd', '', 3, 0, '2019-03-25 14:07:44'),
(66, 'asd', 'admin@sadhanas.co.id', 'asd', '', 1, 0, '2019-04-04 14:46:54'),
(67, 'asd', '', '', 'Screenshot_51.png', 3, 0, '2019-04-04 15:32:53'),
(68, 'ajjjaa', 'zc@asd.asd', 'zxc', 'Screenshot_8.png', 0, 0, '2019-04-04 15:33:43'),
(69, 'asdasd', 'asd@asd.cdsc', 'asd', 'Screenshot_10.png', 2, 0, '2019-04-04 15:52:39'),
(70, 'jahah', 'sofia@mail.co', 'asd', 'Screenshot_14.png', 1, 0, '2019-04-04 15:57:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_com`);

--
-- Indeks untuk tabel `detailakses`
--
ALTER TABLE `detailakses`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`no_div`);

--
-- Indeks untuk tabel `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`no_it`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`no_kat`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`no_sts`);

--
-- Indeks untuk tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`idcom`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`no_tiket`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `detailakses`
--
ALTER TABLE `detailakses`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `no_div` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `it`
--
ALTER TABLE `it`
  MODIFY `no_it` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `no_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `no_sts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `test`
--
ALTER TABLE `test`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
