-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2020 pada 03.16
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_akses`, `id_user`, `created_at`) VALUES
('AK01', 10, '2019-03-25 13:51:38'),
('AK02', 132, '2020-02-17 16:43:59'),
('AK03', 133, '2020-02-19 14:05:38'),
('AK04', 134, '2020-02-19 14:41:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_com` int(11) NOT NULL,
  `no_tiket` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `com` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_com`, `no_tiket`, `id_user`, `com`, `created_at`) VALUES
(64, 'TK002', 130, 'coba', '2019-08-19 03:55:32'),
(65, 'TK002', 10, 'oke', '2019-08-19 03:56:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailakses`
--

CREATE TABLE `detailakses` (
  `id_detail` int(11) NOT NULL,
  `id_akses` varchar(255) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailakses`
--

INSERT INTO `detailakses` (`id_detail`, `id_akses`, `id_menu`, `created_at`) VALUES
(420, 'AK02', 1, '2020-02-17 16:47:48'),
(421, 'AK02', 2, '2020-02-17 16:47:48'),
(422, 'AK03', 1, '2020-02-19 14:12:31'),
(423, 'AK03', 2, '2020-02-19 14:12:31'),
(424, 'AK03', 4, '2020-02-19 14:12:31'),
(486, 'AK01', 1, '2020-02-19 17:45:49'),
(487, 'AK01', 2, '2020-02-19 17:45:49'),
(488, 'AK01', 3, '2020-02-19 17:45:49'),
(489, 'AK01', 5, '2020-02-19 17:45:49'),
(490, 'AK01', 9, '2020-02-19 17:45:49'),
(491, 'AK01', 40, '2020-02-19 17:45:49'),
(492, 'AK01', 41, '2020-02-19 17:45:49'),
(493, 'AK01', 31, '2020-02-19 17:45:49'),
(494, 'AK01', 32, '2020-02-19 17:45:49'),
(495, 'AK01', 33, '2020-02-19 17:45:49'),
(496, 'AK01', 38, '2020-02-19 17:45:49'),
(497, 'AK01', 34, '2020-02-19 17:45:49'),
(498, 'AK01', 35, '2020-02-19 17:45:49'),
(499, 'AK01', 36, '2020-02-19 17:45:49'),
(500, 'AK01', 37, '2020-02-19 17:45:49'),
(501, 'AK01', 39, '2020-02-19 17:45:49');

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
(5, 'Accounting', 3),
(6, 'Pajak', 3),
(7, 'Marketing', 2),
(9, 'Sales Retail', 0),
(10, 'Technical support', 0),
(11, 'IT', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `pendidikan`) VALUES
(1, 'Agung', 'S2');

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
-- Struktur dari tabel `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(22, 'V2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `no_ruangan` int(11) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `nim` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `id_dosen`, `nama_matkul`, `sks`, `deleted`) VALUES
(1, 1, 'Jaringan Komputer', 4, 0),
(3, 1, 'Web Programming 2', 4, 0),
(4, 1, 'Artificial Intelegence', 6, 0),
(5, 1, 'Logika Informatika', 4, 0);

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
(1, 'Dashboard', 'home', 1, 0, 0, 'fa fa-dashboard'),
(2, 'Ticket', 'ticket', 1, 0, 0, 'fa fa-dashboard'),
(3, 'Data', 'data', 1, 0, 0, 'fa fa-folder'),
(4, 'Report', 'prints', 1, 0, 0, 'fa fa-edit'),
(5, 'User', 'user', 0, 3, 0, 'fa fa-user'),
(6, 'Kategori', 'kategori', 0, 3, 0, 'fa fa-list-alt'),
(7, 'Status', 'status', 0, 3, 0, 'fa fa-info'),
(8, 'Divisi', 'divisi', 0, 3, 0, 'fa fa-building-o'),
(9, 'Manage Menu', 'managemenu', 0, 3, 0, 'fa fa-tasks'),
(31, 'Jadwal', 'jadwal', 1, 0, 0, 'fa fa-building-o'),
(32, 'Jadwal Dosen', 'jadwaldosen', 0, 31, 0, 'fa'),
(33, 'Jadwal Piket', 'jadwalpiket', 0, 31, 0, 'fa'),
(34, 'Input', 'input', 1, 0, 0, 'fa fa-edit'),
(35, 'Nilai', 'nilai', 0, 34, 0, 'fa'),
(36, 'Keuangan', 'keuangan', 0, 34, 0, 'fa'),
(37, 'Slip Gaji', 'slipgaji', 0, 34, 0, 'fa'),
(38, 'Jadwal Kuliah', 'jadwalkuliah', 0, 31, 0, 'fa'),
(39, 'Cuti', 'cuti', 0, 34, 0, 'fa'),
(40, 'Mata Kuliah', 'matkul', 0, 3, 0, 'fa fa-list-alt'),
(41, 'Kelas', 'kelas', 0, 3, 0, 'fa fa-list-alt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `nim` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `nim` int(11) NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL,
  `tgl_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `idcom` int(11) NOT NULL,
  `parent_com` int(11) NOT NULL,
  `comment` text NOT NULL,
  `sender` varchar(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `closed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `closed_by` int(11) NOT NULL,
  `softdel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`no_tiket`, `id_user`, `no_kat`, `id_com`, `masalah`, `flag`, `no_sts`, `create_at`, `updated_at`, `updated_by`, `closed_at`, `closed_by`, `softdel`) VALUES
('TK001', 131, 1, 0, '<p>Tolong</p>\r\n', 1, 3, '2019-08-14 09:44:50', '2019-08-14 04:45:57', 10, '2019-08-14 21:44:57', 10, 1),
('TK002', 130, 2, 0, '<p>Printer rusak</p>\r\n', 1, 2, '2019-08-19 03:52:38', '2019-08-18 23:10:37', 10, '0000-00-00 00:00:00', 0, 0),
('TK003', 132, 1, 0, '<p>asdasd</p>\r\n', 0, 1, '2020-02-17 18:36:18', '0000-00-00 00:00:00', 10, '0000-00-00 00:00:00', 0, 0);

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
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id_token`, `email`, `token`, `created_at`) VALUES
(12, 'sofia@mail.com', '6qlzaW3JnMS/yGBQo1WOJt/FEikg7f6IcELWrr4Nqjs=', 1581957759),
(13, 'nurulannisa0411@yahoo.com', 'EqO/YhacDJjxGFUG3Gx5K5wMwV2KfxVVJCw5Tum5iJs=', 1582121138),
(14, 'dosen@gmail.com', 'ew96IufbF91HIFl4k8wRLB7yrWwNUFhRnQZYCSTZwgA=', 1582123293);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `no_div` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL COMMENT '1: Dosen 2: Karyawan 3: Mahasiswa',
  `aktif` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `foto`, `no_div`, `level`, `jabatan`, `aktif`, `created_at`) VALUES
(10, 'Admin', 'admin@mail.com', '0192023a7bbd73250516f069df18b500', 'IMG_0133_copy_-_Copy.png', 2, 1, 2, 1, '2020-02-19 17:41:38'),
(132, 'Sofia Zahwa', 'sofia@mail.com', '0192023a7bbd73250516f069df18b500', 'IMG_20191114_2122361.jpg', 3, 0, 3, 1, '2020-02-19 17:30:01'),
(133, 'Nurul Annisa', 'nurulannisa0411@yahoo.com', '0192023a7bbd73250516f069df18b500', '', 2, 0, 3, 1, '2020-02-19 17:29:47'),
(134, 'Dosen', 'dosen@gmail.com', '0192023a7bbd73250516f069df18b500', '', 5, 0, 1, 1, '2020-02-19 17:38:01');

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
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

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
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`);

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
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

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
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `detailakses`
--
ALTER TABLE `detailakses`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `no_div` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `it`
--
ALTER TABLE `it`
  MODIFY `no_it` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `no_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
