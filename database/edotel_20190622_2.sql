-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 12:59 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `jenis_barang`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'Dental Kit', 'Guest Aminities', 100, '2019-05-25 21:46:32', '2019-06-21 13:40:08'),
(2, 'Bath Soap', 'Guest Aminities', 100, '2019-05-25 21:51:32', '2019-06-21 13:40:54'),
(3, 'Towel', 'Linen Supplies', 24, '2019-05-25 21:54:51', '2019-06-21 13:56:34'),
(4, 'Bath Mat', 'Linen Supplies', 24, '2019-05-25 21:56:17', '2019-06-21 13:56:22'),
(5, 'Tumbler Glass', 'Room Supplies', 24, '2019-05-25 21:57:30', '2019-06-21 13:55:48'),
(6, 'Bath Foam', 'Guest Aminities', 100, '2019-05-25 21:58:39', '2019-06-21 13:40:48'),
(7, 'Sheet', 'Linen Supplies', 24, '2019-06-21 13:50:45', '2019-06-21 13:56:15'),
(8, 'Blanket', 'Linen Supplies', 24, '2019-06-21 13:51:02', '2019-06-21 13:56:08'),
(9, 'Pillow Case', 'Linen Supplies', 24, '2019-06-21 13:52:13', '2019-06-21 13:56:28'),
(10, 'Water Heater', 'Room Supplies', 24, '2019-06-21 13:52:42', '2019-06-21 13:52:42'),
(11, 'Cup and Saucer', 'Room Supplies', 24, '2019-06-21 13:53:13', '2019-06-21 13:53:13'),
(12, 'Tea Spoon', 'Room Supplies', 24, '2019-06-21 13:53:29', '2019-06-21 13:53:29'),
(13, 'Shampoo', 'Guest Aminities', 36, '2019-06-21 13:54:28', '2019-06-21 13:58:41'),
(14, 'Slipper', 'Guest Aminities', 100, '2019-06-21 13:54:48', '2019-06-21 13:54:48'),
(15, 'Air Mineral', 'Guest Aminities', 22, '2019-06-21 13:55:19', '2019-06-21 13:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_barang`, `tanggal_keluar`, `jumlah`, `nama_pegawai`, `tujuan`, `created_at`, `updated_at`) VALUES
(12, 15, '2019-06-22', 2, 'Ardi', 'Restock kamar 101', '2019-06-21 13:57:37', '2019-06-21 13:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `gambar_nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_barang`, `tanggal_masuk`, `jumlah`, `gambar_nota`, `created_at`, `updated_at`) VALUES
(5, 13, '2019-06-22', 12, '1561150721_Shampoo.png', '2019-06-21 13:58:41', '2019-06-21 13:58:41');

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
(8, '100', 'Executive', '375000.00', 'Tersedia', '2019-05-21 17:42:47', '2019-05-21 17:42:47'),
(9, '101', 'Deluxe', '275000.00', 'Tersedia', '2019-05-21 17:44:05', '2019-05-21 17:46:17'),
(10, '102', 'Deluxe', '275000.00', 'Tersedia', '2019-05-21 17:46:38', '2019-05-21 17:46:38'),
(11, '103', 'Superior', '200000.00', 'Tersedia', '2019-05-21 17:47:00', '2019-05-21 17:47:07'),
(12, '104', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:47:25', '2019-05-21 17:47:25'),
(13, '105', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:47:48', '2019-05-21 17:47:48'),
(14, '106', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:48:10', '2019-05-21 17:48:10'),
(15, '107', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:48:22', '2019-05-21 17:48:22'),
(16, '108', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:49:00', '2019-05-21 17:49:00'),
(17, '109', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:49:27', '2019-05-21 17:49:27'),
(18, '110', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:49:41', '2019-05-21 17:49:41'),
(19, '201', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:49:54', '2019-05-21 17:49:54'),
(20, '202', 'Standart', '160000.00', 'Tersedia', '2019-05-21 17:50:16', '2019-05-21 17:50:16'),
(21, '203', 'Standart', '160000.00', 'Dalam Perbaikan', '2019-05-21 17:50:31', '2019-05-21 17:51:06'),
(22, '204', 'Standart', '160000.00', 'Dalam Perbaikan', '2019-05-21 17:50:44', '2019-05-21 17:51:15'),
(23, '205', 'Standart', '160000.00', 'Dalam Perbaikan', '2019-05-21 17:51:31', '2019-05-21 17:51:31'),
(24, '206', 'Standart', '160000.00', 'Dalam Perbaikan', '2019-05-21 17:51:47', '2019-05-21 17:51:47');

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
(9, '2019_05_20_072956_create_barus_table', 8),
(10, '2019_05_24_010632_create_barang_table', 9),
(11, '2019_05_26_134048_create_barang_keluar_table', 10),
(12, '2019_05_27_050649_create_barang_masuk_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rdzulindra@gmail.com', '$2y$10$X6uyfXJzjgdrLB8VSZ4JuekmXjasHO1zw0XLDM9AciWzMqBhXwsqG', '2019-06-15 11:08:40');

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
(17, 'Radea', '081231457997', 'Tambah Extra Bed', '2019-05-30', '2019-06-02', 'Sudah Check-In', '2019-05-21 17:59:12', '2019-06-12 11:17:20'),
(18, 'Zulindra', '081231458001', NULL, '2019-05-22', '2019-05-24', 'Sudah Check-In', '2019-05-21 18:00:07', '2019-05-21 18:02:13'),
(21, 'Raeda', '081234567', NULL, '2019-06-14', '2019-06-16', 'Sudah Check-In', '2019-06-13 10:14:52', '2019-06-16 05:47:28'),
(22, 'Rizky', '5453413142', NULL, '2019-06-21', '2019-06-22', 'Batal Reservasi', '2019-06-13 10:39:19', '2019-06-13 10:39:25'),
(23, 'Putri', '573521', NULL, '2019-06-29', '2019-06-30', 'Sudah Konfirmasi', '2019-06-13 10:49:09', '2019-06-16 12:37:21'),
(24, 'Ardean', '0812345', NULL, '2019-06-18', '2019-06-19', 'Batal Reservasi', '2019-06-16 05:46:34', '2019-06-16 12:37:22'),
(25, 'Gatau', '084913649', NULL, '2019-06-19', '2019-06-20', 'Sudah Check-In', '2019-06-16 05:48:19', '2019-06-21 14:19:26'),
(26, 'Radea Zulindra Ardisukma', '081231458001', NULL, '2019-06-28', '2019-06-29', 'Belum Konfirmasi', '2019-06-20 17:18:35', '2019-06-20 17:18:35'),
(27, 'Radea Zulindra Ardisukma', '081231458001', NULL, '2019-06-23', '2019-06-24', 'Sudah Check-In', '2019-06-21 08:43:02', '2019-06-21 08:44:01');

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
(22, 17, 8, '2019-05-21 17:59:12', '2019-05-21 17:59:12'),
(23, 18, 12, '2019-05-21 18:00:07', '2019-05-21 18:00:07'),
(26, 21, 12, '2019-06-13 10:14:52', '2019-06-13 10:14:52'),
(27, 22, 12, '2019-06-13 10:39:19', '2019-06-13 10:39:19'),
(28, 23, 12, '2019-06-13 10:49:09', '2019-06-13 10:49:09'),
(29, 24, 13, '2019-06-16 05:46:34', '2019-06-16 05:46:34'),
(30, 25, 12, '2019-06-16 05:48:19', '2019-06-16 05:48:19'),
(31, 26, 13, '2019-06-20 17:18:36', '2019-06-20 17:18:36'),
(32, 27, 12, '2019-06-21 08:43:02', '2019-06-21 08:43:02'),
(33, 27, 13, '2019-06-21 08:43:02', '2019-06-21 08:43:02');

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
(35, 32, 12, 'Kamar 104', '320000.00', '2019-05-21 18:02:13', '2019-05-21 18:02:13'),
(36, 33, 13, 'Kamar 105', '160000.00', '2019-05-21 18:07:14', '2019-05-21 18:07:14'),
(40, 35, 8, 'Kamar 100', '1125000.00', '2019-06-12 11:17:19', '2019-06-12 11:17:19'),
(41, 36, 8, 'Kamar 100', '375000.00', '2019-06-13 10:05:30', '2019-06-13 10:05:30'),
(42, 37, 13, 'Kamar 105', '160000.00', '2019-06-14 03:57:28', '2019-06-14 03:57:28'),
(43, 37, 14, 'Kamar 106', '160000.00', '2019-06-14 03:57:28', '2019-06-14 03:57:28'),
(44, 37, 15, 'Kamar 107', '160000.00', '2019-06-14 03:57:28', '2019-06-14 03:57:28'),
(45, 36, 8, '- Diskon Korporasi', '-50000.00', '2019-06-14 04:33:15', '2019-06-14 04:33:15'),
(46, 36, 8, '+ Extra Bed', '75000.00', '2019-06-14 04:33:34', '2019-06-14 04:33:34'),
(48, 39, 12, 'Kamar 104', '320000.00', '2019-06-16 05:47:28', '2019-06-16 05:47:28'),
(49, 40, 12, 'Kamar 104', '320000.00', '2019-06-20 06:01:21', '2019-06-20 06:01:21'),
(50, 41, 12, 'Kamar 104', '160000.00', '2019-06-21 08:44:01', '2019-06-21 08:44:01'),
(51, 41, 13, 'Kamar 105', '160000.00', '2019-06-21 08:44:01', '2019-06-21 08:44:01'),
(52, 41, 12, '+ Extra Bed', '75000.00', '2019-06-21 08:45:25', '2019-06-21 08:45:25'),
(53, 41, 12, '- Diskon Korporasi', '-50000.00', '2019-06-21 08:45:35', '2019-06-21 08:45:35'),
(54, 41, 13, '- Diskon Korporasi', '-50000.00', '2019-06-21 08:45:44', '2019-06-21 08:45:44'),
(56, 42, 8, 'Kamar 100', '375000.00', '2019-06-21 09:10:17', '2019-06-21 09:10:17'),
(57, 42, 8, '- Tanpa Breakfast', '-15000.00', '2019-06-21 09:10:36', '2019-06-21 09:10:36'),
(58, 40, 12, '+ Extra Bed', '75000.00', '2019-06-21 13:25:26', '2019-06-21 13:25:26'),
(59, 43, 12, 'Kamar 104', '160000.00', '2019-06-21 14:19:26', '2019-06-21 14:19:26'),
(62, 40, 12, '- Diskon Korporasi', '-50000.00', '2019-06-21 14:33:39', '2019-06-21 14:33:39'),
(63, 40, 12, '- Tanpa Breakfast', '-15000.00', '2019-06-21 14:49:15', '2019-06-21 14:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `tamu_hotel`
--

CREATE TABLE `tamu_hotel` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `tamu_hotel` (`id`, `nama`, `jenis_id`, `no_id`, `alamat`, `no_telp`, `catatan`, `tanggal_checkin`, `tanggal_checkout`, `total_tagihan`, `status`, `created_at`, `updated_at`) VALUES
(32, 'Zulindra', 'KTM', '155150400111066', 'Jl. Soekarno Hatta Indah, Malang', '081231458001', NULL, '2019-05-22', '2019-05-24', '320000.00', 'Check-Out', '2019-05-21 18:02:13', '2019-06-13 01:06:43'),
(33, 'Ardi', 'KTP', '3521906970001', 'Jl. Veteran, Malang', '0833445566', NULL, '2019-05-22', '2019-05-23', '160000.00', 'Check-Out', '2019-05-21 18:07:13', '2019-06-13 01:04:32'),
(35, 'Radea', 'KTP', '54738290', 'Jl. Soekarno Hatta Indah, Malang', '081231457997', '-', '2019-05-30', '2019-06-02', '1125000.00', 'Check-Out', '2019-06-12 11:17:19', '2019-06-13 01:06:46'),
(36, 'Ardi Sukma', 'KTP', '35223132313123', 'Jl. In Aja, Yogyakarta', '08123145167', NULL, '2019-06-14', '2019-06-15', '400000.00', 'Check-Out', '2019-06-13 10:05:30', '2019-06-14 04:33:39'),
(37, 'Radea Zulindra Ardisukma', 'KTP', '35219069797', 'Jl. Soekarno Hatta Indah, Malang', '081231458801', NULL, '2019-06-14', '2019-06-15', '480000.00', 'Check-Out', '2019-06-14 03:57:28', '2019-06-14 03:57:45'),
(39, 'Raeda', 'SIM', '527263108', 'Jl. Melati, Malang', '081234567', NULL, '2019-06-14', '2019-06-16', '320000.00', 'Check-Out', '2019-06-16 05:47:28', '2019-06-16 05:47:33'),
(40, 'Dea', 'KTP', '15555555', 'Jl. Soekarno Hatta Indah, Malang', '0812345678', NULL, '2019-06-20', '2019-06-22', '330000.00', 'Check-Out', '2019-06-20 06:01:21', '2019-06-21 15:04:22'),
(41, 'Radea Zulindra Ardisukma', 'KTP', '35234234252352', 'Jl. Soekarno Hatta Indah, Malang', '081231458001', NULL, '2019-06-23', '2019-06-24', '295000.00', 'Check-Out', '2019-06-21 08:44:01', '2019-06-21 08:47:01'),
(42, 'Samsul', 'KTP', '2416948124', 'Graha, Pamekasan', '08123458001', 'Tanpa Breakfast', '2019-06-21', '2019-06-22', '360000.00', 'Check-Out', '2019-06-21 09:10:17', '2019-06-21 09:11:11'),
(43, 'Gatau', 'KTM', '12412511', 'Jl. Soekarno Hatta Indah, Malang', '084913649', NULL, '2019-06-19', '2019-06-20', '160000.00', 'Check-Out', '2019-06-21 14:19:26', '2019-06-21 14:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `type`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$BthNZxs5tXqz2jZiKTZIjeBzjGbrDb8GY.AXAaibZhP0W4M/p1psu', 'super_admin', NULL, 'Mi4KRVRZs4NQ1KyDFtbINcdkFm7DZedayAZ7LfZhdK1JtqjjMWoq4Cjs4VlS', '2019-04-29 07:41:53', '2019-04-29 07:41:53'),
(4, 'Receptionist 1', 'receptionist1', 'receptionist1@edotel.com', '$2y$10$E2tn8CuWYcSvGCk2h8WHCO24NXr9l6cZlu8CkmX3CbzRRBJ4F.ZTi', 'receptionist', NULL, 'zwoL8TprLnkMfSUWwW1QWzgx00u0OlW4SO9j13p41VDhA35oXznesCC630vD', '2019-06-15 23:44:01', '2019-06-15 23:44:01'),
(5, 'Store Keeper 1', 'storekeeper1', 'storekeeper1@edotel.com', '$2y$10$AZJxiifzo50r4WI0RiK0puGz.GIKhlKq4g1OOf2WkAxQNlm0rJuPG', 'store_keeper', NULL, '3JZB57fLKWP6770u6TQsYYVzGy8Mv6r8bdD3gJA9xKspBiOTitMzxVb3Aq00', '2019-06-15 23:49:17', '2019-06-15 23:49:17'),
(6, 'Manager 1', 'manager1', 'manager1@edotel.com', '$2y$10$Hh7H89Xv0jWM9Xr.D6iOFOJJtm5tNZ3v6bdMeoFW0tLGEV014Iz0C', 'manager', NULL, 'PoUimgcqa3goOB1ixl80ESmrsxmVGKx5sAKoknxOgWekwW1gXW6fzsKtx2Ia', '2019-06-15 23:57:13', '2019-06-15 23:57:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_barang_k` (`id_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_barang_m` (`id_barang`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_kamar` (`no_kamar`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tagihan_tamu`
--
ALTER TABLE `tagihan_tamu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tamu_hotel`
--
ALTER TABLE `tamu_hotel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `fk_id_barang_k` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `fk_id_barang_m` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON UPDATE CASCADE;

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
