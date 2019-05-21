-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 11:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_kamar` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kamar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `no_kamar`, `tipe_kamar`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, '101', 'Standart', '200000.00', 'Tersedia', '2019-05-04 08:31:13', '2019-05-12 11:04:22'),
(2, '102', 'Standart', '200000.00', 'Tersedia', '2019-05-04 09:21:18', '2019-05-04 09:21:18'),
(3, '103', 'Standart', '200000.00', 'Dalam Perbaikan', '2019-05-12 10:36:42', '2019-05-20 21:58:22'),
(4, '104', 'Family', '500000.00', 'Tersedia', '2019-05-16 15:23:02', '2019-05-16 15:23:02'),
(5, '205', 'Family', '500000.00', 'Tersedia', '2019-05-16 15:23:36', '2019-05-16 15:23:36'),
(6, '206', 'Executive', '750000.00', 'Tersedia', '2019-05-20 21:57:37', '2019-05-20 21:57:37');

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
(3, '2019_05_04_115002_create_kamar_table', 2),
(4, '2019_05_12_180638_create_pelanggan_table', 3),
(5, '2019_05_12_233400_create_reservasi_table', 4),
(6, '2019_05_13_001130_create_reservasi_kamar_table', 5),
(7, '2019_05_20_010142_create_tamu_hotel_table', 6),
(8, '2019_05_20_011156_create_tagihan_tamu_table', 7),
(9, '2019_05_20_072956_create_barus_table', 8);

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
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `no_id`, `jenis_id`, `nama`, `alamat`, `no_telp`, `catatan`, `created_at`, `updated_at`) VALUES
(1, '155150400111066', 'KTM', 'Radea Zulindra Ardisukma', 'Jl. Soekarno Hatta Indah, Malang', '081231458001', NULL, '2019-05-12 11:26:40', '2019-05-12 11:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `nama`, `no_telp`, `catatan`, `tanggal_checkin`, `tanggal_checkout`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Radea', '081231458001', NULL, '2019-05-20', '2019-05-21', 'Sudah Check-In', '2019-05-19 01:31:10', '2019-05-19 13:56:45'),
(4, 'Rinov', '08123456789', NULL, '2019-05-27', '2019-05-28', 'Sudah Konfirmasi', '2019-05-19 03:54:04', '2019-05-19 03:54:04'),
(5, 'Filza', '09876521', NULL, '2019-05-26', '2019-05-29', 'Batal Reservasi', '2019-05-19 03:52:53', '2019-05-19 03:52:53'),
(8, 'Felix', '0876543', NULL, '2019-05-26', '2019-05-29', 'Batal Reservasi', '2019-05-19 00:09:46', '2019-05-19 13:57:25'),
(9, 'Zulindra', '1234', NULL, '2019-05-24', '2019-05-31', 'Batal Reservasi', '2019-05-19 00:16:29', '2019-05-19 13:57:32'),
(11, 'Yosa', '048312', NULL, '2019-05-30', '2019-05-31', 'Sudah Konfirmasi', '2019-05-19 02:10:31', '2019-05-19 15:59:24'),
(12, 'Sukma', '081213', NULL, '2019-06-29', '2019-07-01', 'Belum Konfirmasi', '2019-05-19 02:11:19', '2019-05-19 02:11:19'),
(13, 'Ardisukma', '08123145', 'Tambah Extra Bed', '2019-06-01', '2019-06-03', 'Batal Reservasi', '2019-05-19 13:59:29', '2019-05-19 14:36:38'),
(14, 'DDZZ', '081234', NULL, '2019-05-24', '2019-06-19', 'Sudah Konfirmasi', '2019-05-19 16:57:26', '2019-05-19 17:07:12'),
(15, 'dededede', '1', NULL, '2019-08-28', '2019-08-29', 'Belum Konfirmasi', '2019-05-20 18:02:39', '2019-05-20 18:02:39'),
(16, 'Radea Zulindra Ardisukma', '081231458001', 'Tambah Extra Bed', '2019-05-21', '2019-05-22', 'Sudah Check-In', '2019-05-20 20:15:17', '2019-05-20 20:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_kamar`
--

CREATE TABLE `reservasi_kamar` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_reservasi` int(10) UNSIGNED NOT NULL,
  `id_kamar` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasi_kamar`
--

INSERT INTO `reservasi_kamar` (`id`, `id_reservasi`, `id_kamar`, `created_at`, `updated_at`) VALUES
(5, 3, 1, '2019-05-19 01:31:56', '2019-05-19 01:31:56'),
(7, 4, 1, '2019-05-19 03:54:21', '2019-05-19 03:54:21'),
(8, 5, 1, '2019-05-19 03:53:32', '2019-05-19 03:53:32'),
(9, 8, 5, '2019-05-19 00:09:46', '2019-05-19 00:09:46'),
(10, 9, 4, '2019-05-19 00:16:29', '2019-05-19 00:16:29'),
(13, 11, 5, '2019-05-19 02:10:31', '2019-05-19 02:10:31'),
(14, 12, 1, '2019-05-19 02:11:19', '2019-05-19 02:11:19'),
(15, 12, 2, '2019-05-19 02:11:19', '2019-05-19 02:11:19'),
(16, 12, 4, '2019-05-19 02:11:20', '2019-05-19 02:11:20'),
(17, 12, 5, '2019-05-19 02:11:20', '2019-05-19 02:11:20'),
(18, 13, 5, '2019-05-19 13:59:29', '2019-05-19 13:59:29'),
(19, 14, 2, '2019-05-19 16:57:26', '2019-05-19 16:57:26'),
(20, 15, 5, '2019-05-20 18:02:39', '2019-05-20 18:02:39'),
(21, 16, 2, '2019-05-20 20:15:17', '2019-05-20 20:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_tamu`
--

CREATE TABLE `tagihan_tamu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tamu` int(10) UNSIGNED NOT NULL,
  `id_kamar` int(10) UNSIGNED NOT NULL,
  `nama_tagihan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `besaran` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan_tamu`
--

INSERT INTO `tagihan_tamu` (`id`, `id_tamu`, `id_kamar`, `nama_tagihan`, `besaran`, `created_at`, `updated_at`) VALUES
(10, 27, 1, 'Kamar 101', '200000.00', '2019-05-20 18:49:24', '2019-05-20 18:49:24'),
(11, 28, 4, 'Kamar 104', '1000000.00', '2019-05-20 18:50:26', '2019-05-20 18:50:26'),
(12, 28, 5, 'Kamar 205', '1000000.00', '2019-05-20 18:50:26', '2019-05-20 18:50:26'),
(14, 29, 1, 'Kamar 101', '200000.00', '2019-05-20 20:03:09', '2019-05-20 20:03:09'),
(17, 31, 2, 'Kamar 102', '200000.00', '2019-05-20 20:15:49', '2019-05-20 20:15:49'),
(30, 28, 4, '+ denda merokok', '100000.00', '2019-05-21 14:41:36', '2019-05-21 14:41:36'),
(31, 28, 4, '- diskon korporasi', '-50000.00', '2019-05-21 14:41:46', '2019-05-21 14:41:46'),
(32, 28, 5, '- diskon korporasi', '-50000.00', '2019-05-21 14:41:57', '2019-05-21 14:41:57'),
(33, 28, 5, '+ extra bed', '150000.00', '2019-05-21 14:42:14', '2019-05-21 14:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `tamu_hotel`
--

CREATE TABLE `tamu_hotel` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `total_tagihan` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tamu_hotel`
--

INSERT INTO `tamu_hotel` (`id`, `jenis_id`, `no_id`, `nama`, `alamat`, `no_telp`, `catatan`, `tanggal_checkin`, `tanggal_checkout`, `total_tagihan`, `status`, `created_at`, `updated_at`) VALUES
(27, 'KTP', '123', 'Rad', 'Jl. Veteran, Malang', '456', NULL, '2019-05-21', '2019-05-22', NULL, 'Check-In', '2019-05-20 18:49:24', '2019-05-20 18:49:24'),
(28, 'KTP', '788', 'Dea', 'Jl. Melati, Malang', '321', NULL, '2019-05-21', '2019-05-23', NULL, 'Check-In', '2019-05-20 18:50:26', '2019-05-20 18:50:26'),
(29, '123', '123', 'Radea', '123', '081231458001', NULL, '2019-05-20', '2019-05-21', '200000.00', 'Check-Out', '2019-05-20 20:03:09', '2019-05-20 21:20:47'),
(31, 'KTM', '155150400111066', 'Radea Zulindra Ardisukma', 'Perum. Taman Indah Suhat', '081231458001', 'Tambah Extra Bed', '2019-05-21', '2019-05-22', NULL, 'Check-In', '2019-05-20 20:15:49', '2019-05-20 20:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$BthNZxs5tXqz2jZiKTZIjeBzjGbrDb8GY.AXAaibZhP0W4M/p1psu', NULL, '2019-04-29 07:41:53', '2019-04-29 07:41:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
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
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_id` (`no_id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_reservasi` (`id_reservasi`),
  ADD KEY `fk_id_kamar` (`id_kamar`);

--
-- Indexes for table `tagihan_tamu`
--
ALTER TABLE `tagihan_tamu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_tamu_hotel` (`id_tamu`),
  ADD KEY `fk_id_kamar_2` (`id_kamar`);

--
-- Indexes for table `tamu_hotel`
--
ALTER TABLE `tamu_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tagihan_tamu`
--
ALTER TABLE `tagihan_tamu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tamu_hotel`
--
ALTER TABLE `tamu_hotel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  ADD CONSTRAINT `fk_id_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id`),
  ADD CONSTRAINT `fk_id_reservasi` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihan_tamu`
--
ALTER TABLE `tagihan_tamu`
  ADD CONSTRAINT `fk_id_kamar_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id`),
  ADD CONSTRAINT `fk_id_tamu_hotel` FOREIGN KEY (`id_tamu`) REFERENCES `tamu_hotel` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
