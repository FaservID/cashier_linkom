-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2025 at 01:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cashier_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `in_stock` varchar(100) DEFAULT NULL,
  `sell_stock` varchar(100) NOT NULL DEFAULT '0',
  `keterangan` text DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `tipe`, `slug`, `harga`, `in_stock`, `sell_stock`, `keterangan`, `foto`, `kategori_id`, `created_at`, `updated_at`) VALUES
(37, 'Laptop Asus TUF f-15', 'TUF Series fx-506lh', 'laptop-asus-tuf-f-15-1747650237', '15000000', '5', '1', 'ASUS TUF', '1747650237.png', 1, '2025-05-19 03:23:57', '2025-05-19 03:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `pesanan_id`, `barang_id`, `order_id`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(16, 16, 37, 'INV509881922001', '1', '15000000', '2025-05-19 03:33:05', '2025-05-19 03:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Laptop', '2025-05-04 04:48:24', '2025-05-19 03:22:32'),
(2, 'Printer', 'Printer', '2025-05-04 04:48:24', '2025-05-19 03:22:39'),
(3, 'ATK', 'kertas, paper clip dll', '2025-05-19 03:22:54', '2025-05-19 03:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_13_091257_create_kategoris_table', 1),
(4, '2023_05_14_070452_create_barangs_table', 1),
(5, '2023_05_14_070510_create_stocks_table', 1),
(6, '2023_05_16_104653_create_pesanans_table', 1),
(7, '2023_05_16_130237_detail_pesanan', 1),
(8, '2023_05_18_160100_create_payments_table', 1),
(9, '2025_05_16_065522_create_suppliers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('cash','transfer') NOT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `bank_type` varchar(255) DEFAULT NULL,
  `nama_rekening` varchar(255) DEFAULT NULL,
  `nomor_rekening` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pesanan_id`, `user_id`, `tipe`, `nominal`, `bank_type`, `nama_rekening`, `nomor_rekening`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(11, 16, 1, 'cash', '15000000', NULL, NULL, NULL, NULL, '2025-05-19 03:33:05', '2025-05-19 03:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `status` enum('Unpaid','Paid','Completed') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `order_id`, `status`, `user_id`, `total_harga`, `created_at`, `updated_at`) VALUES
(16, 'INV509881922001', 'Completed', 1, '15000000', '2025-05-19 03:33:05', '2025-05-19 04:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `stock_awal` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `barang_id`, `supplier_id`, `harga_beli`, `jumlah`, `tanggal`, `stock_awal`, `created_at`, `updated_at`) VALUES
(2, 37, 3, '72500000', '5', '2025-05-19', '1', '2025-05-19 03:31:45', '2025-05-19 03:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `contact_person`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(3, 'Jane Blevins', 'Sunt voluptate dolor', '+1 (281) 695-3505', 'zerotup@mailinator.com', 'A voluptas totam pla', '2025-05-16 01:12:14', '2025-05-16 01:29:32'),
(5, 'Cynthia Downs', 'Est aliqua Autem qu', '+1 (124) 682-6949', 'xydyv@mailinator.com', 'Fugiat cupiditate ni', '2025-05-19 04:30:30', '2025-05-19 04:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `type`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2025-05-04 11:49:13', '$2a$12$ylGnKKJxXILAWcJgkddY0upDU2eqrr1wnIxAyHKibqj9qVXAjKlky', '082133221122', 0, 'admin-1747649829.jpg', NULL, '2025-05-04 11:49:13', '2025-05-19 03:17:09'),
(2, 'owner', 'owner@gmail.com', '2025-05-19 11:31:03', '$2y$10$rWeyYYEh0sWiRLDvTB.iQe1TRq7t.puH9jCRU6/wkrJofjo8KVXBG', '082177627550', 1, 'default.png', NULL, '2025-05-04 04:50:45', '2025-05-04 04:50:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanan_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `detail_pesanan_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesanan_order_id_unique` (`order_id`),
  ADD KEY `pesanan_user_id_foreign` (`user_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
