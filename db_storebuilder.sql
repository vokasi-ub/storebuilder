-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 06:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_storebuilder`
--

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
(3, '2019_03_27_095812_tbl_kategoribarang', 1),
(4, '2019_03_27_101803_tbl_administrator', 1),
(5, '2019_03_27_101829_tbl_supplierbarang', 1),
(6, '2019_03_27_101902_tbl_barang', 1),
(7, '2019_03_27_101935_tbl_transaksibarang', 1),
(8, '2019_04_08_092200_tbl_supplaibarang', 1);

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
('erlambangbuana@gmail.com', '$2y$10$mRv.gjTXvmUOL55Rkl7KTOYiTEjOv0WMedH1qDuF6V6FQVPkIX4GO', '2019-04-24 03:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_administrator`
--

CREATE TABLE `tbl_administrator` (
  `id_administrator` int(10) UNSIGNED NOT NULL,
  `nama_administrator` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin_administrator` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahir_administrator` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggallahir_administrator` date NOT NULL,
  `alamat_administrator` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_administrator` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_administrator` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `kode_barang` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_barang` varchar(1999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `satuan_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `kode_barang`, `kode_kategori`, `kode_supplier`, `foto_barang`, `nama_barang`, `stok_barang`, `satuan_barang`, `harga_barang`, `created_at`, `updated_at`) VALUES
(4, '123', 'KK01', 'KS01', '/upload/image/123.png', '123', 121, '123', 123, '2019-04-11 16:49:53', '2019-04-12 01:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategoribarang`
--

CREATE TABLE `tbl_kategoribarang` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `kode_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kategoribarang`
--

INSERT INTO `tbl_kategoribarang` (`id_kategori`, `kode_kategori`, `nama_kategori`, `deskripsi_kategori`, `created_at`, `updated_at`) VALUES
(1, 'KK01', 'Padat', 'Bahan bahan padat seperti batu bata, genting, kayu , paku , dan lain-lain.', '2019-04-11 01:34:03', '2019-04-11 01:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplaibarang`
--

CREATE TABLE `tbl_supplaibarang` (
  `id_supplai` int(10) UNSIGNED NOT NULL,
  `kode_supplai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bukti_nota` varchar(1999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `tbl_supplaibarang`
--
DELIMITER $$
CREATE TRIGGER `trigger_updatestok_supplai` AFTER INSERT ON `tbl_supplaibarang` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET stok_barang=stok_barang+NEW.jumlah_barang
    WHERE kode_barang=NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplierbarang`
--

CREATE TABLE `tbl_supplierbarang` (
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `kode_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_supplier` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_supplierbarang`
--

INSERT INTO `tbl_supplierbarang` (`id_supplier`, `kode_supplier`, `nama_supplier`, `alamat_supplier`, `deskripsi_supplier`, `created_at`, `updated_at`) VALUES
(1, 'KS01', 'Erlambang Buana', 'Pasuruan', 'Supplier semen, pasir, gamping', '2019-04-11 01:28:51', '2019-04-11 01:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksibarang`
--

CREATE TABLE `tbl_transaksibarang` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bukti_nota` varchar(1999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_transaksibarang`
--

INSERT INTO `tbl_transaksibarang` (`id_transaksi`, `kode_transaksi`, `kode_barang`, `jumlah_barang`, `total_harga`, `bukti_nota`, `created_at`, `updated_at`) VALUES
(1, 'KTS01', '123', 2, 2000, '/upload/image/nota/kts01.jpg', '2019-04-11 23:56:13', '2019-04-11 23:56:13');

--
-- Triggers `tbl_transaksibarang`
--
DELIMITER $$
CREATE TRIGGER `trigger_updatestok_transaksi` AFTER INSERT ON `tbl_transaksibarang` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET stok_barang=stok_barang-NEW.jumlah_barang
    WHERE kode_barang=NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'Muhamad Erlambang Buana', 'erlambangbuana@gmail.com', NULL, '$2y$10$jhKfzL1WVHBzW.vpWz3BwevSJ/N4zCLss4Ujl1MA3EeuQIxlJjsV6', NULL, '2019-04-11 01:09:13', '2019-04-11 01:09:13');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_administrator`
--
ALTER TABLE `tbl_administrator`
  ADD PRIMARY KEY (`id_administrator`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `tbl_barang_kode_barang_unique` (`kode_barang`),
  ADD KEY `tbl_barang_kode_kategori_foreign` (`kode_kategori`),
  ADD KEY `tbl_barang_kode_supplier_foreign` (`kode_supplier`);

--
-- Indexes for table `tbl_kategoribarang`
--
ALTER TABLE `tbl_kategoribarang`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `tbl_kategoribarang_kode_kategori_unique` (`kode_kategori`);

--
-- Indexes for table `tbl_supplaibarang`
--
ALTER TABLE `tbl_supplaibarang`
  ADD PRIMARY KEY (`id_supplai`),
  ADD UNIQUE KEY `tbl_supplaibarang_kode_supplai_unique` (`kode_supplai`),
  ADD KEY `tbl_supplaibarang_kode_barang_foreign` (`kode_barang`);

--
-- Indexes for table `tbl_supplierbarang`
--
ALTER TABLE `tbl_supplierbarang`
  ADD PRIMARY KEY (`id_supplier`),
  ADD UNIQUE KEY `tbl_supplierbarang_kode_supplier_unique` (`kode_supplier`);

--
-- Indexes for table `tbl_transaksibarang`
--
ALTER TABLE `tbl_transaksibarang`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `tbl_transaksibarang_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `tbl_transaksibarang_kode_barang_foreign` (`kode_barang`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_administrator`
--
ALTER TABLE `tbl_administrator`
  MODIFY `id_administrator` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategoribarang`
--
ALTER TABLE `tbl_kategoribarang`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_supplaibarang`
--
ALTER TABLE `tbl_supplaibarang`
  MODIFY `id_supplai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplierbarang`
--
ALTER TABLE `tbl_supplierbarang`
  MODIFY `id_supplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksibarang`
--
ALTER TABLE `tbl_transaksibarang`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_kode_kategori_foreign` FOREIGN KEY (`kode_kategori`) REFERENCES `tbl_kategoribarang` (`kode_kategori`),
  ADD CONSTRAINT `tbl_barang_kode_supplier_foreign` FOREIGN KEY (`kode_supplier`) REFERENCES `tbl_supplierbarang` (`kode_supplier`);

--
-- Constraints for table `tbl_supplaibarang`
--
ALTER TABLE `tbl_supplaibarang`
  ADD CONSTRAINT `tbl_supplaibarang_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode_barang`);

--
-- Constraints for table `tbl_transaksibarang`
--
ALTER TABLE `tbl_transaksibarang`
  ADD CONSTRAINT `tbl_transaksibarang_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
