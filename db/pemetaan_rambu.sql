-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 10:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemetaan_rambu`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rambu`
--

CREATE TABLE `jenis_rambu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_rambu`
--

INSERT INTO `jenis_rambu` (`id`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Peringatan', '2019-07-13 11:10:05', '2019-07-13 11:10:39'),
(2, 'Larangan', '2019-07-13 11:10:21', '2019-07-13 11:10:49'),
(3, 'Perintah', '2019-07-13 11:11:08', '2019-07-13 11:11:08'),
(4, 'Petunjuk', '2019-07-13 11:11:24', '2019-07-13 11:11:24'),
(5, 'Tambahan', '2019-07-13 11:11:36', '2019-07-13 11:11:36'),
(6, 'Nomor Rute Jalan', '2019-07-13 11:12:08', '2019-07-13 11:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan_rambus`
--

CREATE TABLE `kebutuhan_rambus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_rambu_id` bigint(20) NOT NULL,
  `prioritas` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kebutuhan_rambus`
--

INSERT INTO `kebutuhan_rambus` (`id`, `lokasi_rambu_id`, `prioritas`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'mendesak', 'lokasi-1--6.897541712514.png', '2019-07-13 11:20:52', '2019-07-13 11:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kecamatan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kode_kecamatan`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, '01', 'Kedungbanteng', '2019-07-13 11:15:31', '2019-07-13 11:15:31'),
(2, '02', 'Pangkah', '2019-07-13 11:15:45', '2019-07-13 11:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelurahan` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kode_kelurahan`, `nama_kelurahan`, `kecamatan_id`, `created_at`, `updated_at`) VALUES
(1, '001', 'Semedo', 2, '2019-07-13 11:16:07', '2019-07-13 11:18:58'),
(2, '001', 'Bogares', 2, '2019-07-13 11:16:48', '2019-07-13 11:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `ketersediaan_rambus`
--

CREATE TABLE `ketersediaan_rambus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_rambu_id` bigint(20) NOT NULL,
  `apbn` int(11) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ketersediaan_rambus`
--

INSERT INTO `ketersediaan_rambus` (`id`, `lokasi_rambu_id`, `apbn`, `kondisi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 2, 2019, 1, 'lokasi-1--7.000591321344.png', '2019-07-15 00:44:31', '2019-07-15 00:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_masyarakats`
--

CREATE TABLE `laporan_masyarakats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_masyarakats`
--

INSERT INTO `laporan_masyarakats` (`id`, `nama`, `no_hp`, `keterangan`, `gambar`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lampu merah mati', 8190497223, 'disini lampune mati', 'Lampu merah mati - 08190497223.jpg', '-3130.860387488', '-6.860656081123', 1, '2019-07-09 17:47:28', '2019-07-09 17:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_rambus`
--

CREATE TABLE `lokasi_rambus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelurahan_id` bigint(20) NOT NULL,
  `rambu_id` bigint(20) NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi_rambus`
--

INSERT INTO `lokasi_rambus` (`id`, `kelurahan_id`, `rambu_id`, `longitude`, `latitude`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '-250.8580949133', '-6.897541712514', 'dungtenk', 2, '2019-07-13 11:20:51', '2019-07-13 11:20:51'),
(2, 1, 1, '109.19079762356', '-7.000591321344', 'tegal', 1, '2019-07-15 00:44:31', '2019-07-15 00:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_09_072615_create_rambu_table', 1),
(4, '2019_04_09_072704_create_jenis_rambu_table', 1),
(5, '2019_04_22_050545_create_kecamatan_table', 1),
(6, '2019_04_22_070806_create_kelurahan_table', 1),
(7, '2019_05_20_044209_create_laporan_masyarakats_table', 1),
(8, '2019_05_22_063826_create_lokasi_rambus_table', 1),
(9, '2019_05_22_064559_create_kebutuhan_rambus_table', 1),
(10, '2019_05_22_064651_create_ketersediaan_rambus_table', 1),
(11, '2019_06_14_231608_create_pejabat_strukturals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pejabat_strukturals`
--

CREATE TABLE `pejabat_strukturals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` bigint(20) NOT NULL,
  `nama_pejabat` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pejabat_strukturals`
--

INSERT INTO `pejabat_strukturals` (`id`, `nip`, `nama_pejabat`, `pangkat`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 1123456789, 'Dorman', 'Gol 3B', 'KEPALA DINAS', '2019-07-13 11:17:47', '2019-07-13 11:17:47'),
(2, 1123456780, 'Sobri', 'Golongan 2C', 'KASI REKSA', '2019-07-13 11:18:17', '2019-07-13 11:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `rambu`
--

CREATE TABLE `rambu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rambu` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rambu` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_rambu_id` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rambu`
--

INSERT INTO `rambu` (`id`, `kode_rambu`, `nama_rambu`, `jenis_rambu_id`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '001', 'Hati Hati', 1, 'Anda Harus Hati hati', '001 - Hati Hati.png', '2019-07-13 11:15:00', '2019-07-13 11:15:00'),
(2, '002', 'Tiang pal', 3, 'dddd', '002 - Tiang pal.png', '2019-07-15 00:04:23', '2019-07-15 00:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(11) NOT NULL,
  `username` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Ropii', 1123456789, 'admin', 'ar.ropii@gmail.com', NULL, '$2y$10$9IBTKnVDkIRiOzJT.Yze7ecHschxIUpajK/d1EgO2WoKHspvgUcC.', NULL, '2019-07-09 17:40:54', '2019-07-09 17:40:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_rambu`
--
ALTER TABLE `jenis_rambu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebutuhan_rambus`
--
ALTER TABLE `kebutuhan_rambus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketersediaan_rambus`
--
ALTER TABLE `ketersediaan_rambus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_masyarakats`
--
ALTER TABLE `laporan_masyarakats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_rambus`
--
ALTER TABLE `lokasi_rambus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pejabat_strukturals`
--
ALTER TABLE `pejabat_strukturals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rambu`
--
ALTER TABLE `rambu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_rambu`
--
ALTER TABLE `jenis_rambu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kebutuhan_rambus`
--
ALTER TABLE `kebutuhan_rambus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ketersediaan_rambus`
--
ALTER TABLE `ketersediaan_rambus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_masyarakats`
--
ALTER TABLE `laporan_masyarakats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lokasi_rambus`
--
ALTER TABLE `lokasi_rambus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pejabat_strukturals`
--
ALTER TABLE `pejabat_strukturals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rambu`
--
ALTER TABLE `rambu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
