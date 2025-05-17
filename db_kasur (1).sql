-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2023 pada 10.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `panjang` varchar(100) NOT NULL,
  `lebar` varchar(100) NOT NULL,
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `tipe`, `panjang`, `lebar`, `slug`, `harga`, `in_stock`, `sell_stock`, `keterangan`, `foto`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'Lihab Nomor 1 Rp. 250.000', 'Nomor 1', '180', '190', 'Lihab-Nomor-1-Rp.-250.000', '250000', '11', '3', 'Tes', 'lihab1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:32:41'),
(2, 'Lihab Nomor 2 Rp. 200.000', 'Nomor 2', '160', '190', 'Lihab-Nomor-2-Rp.-200.000', '200000', '10', '0', 'Tes', 'lihab2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(3, 'Lihab Nomor 2 Rp. 350.000', 'Nomor 2', '160', '190', 'Lihab-Nomor-2-Rp.-350.000', '350000', '10', '0', 'Tes', 'lihab2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(4, 'Lihab Nomor 1 Rp. 800.000', 'Nomor 1', '180', '190', 'Lihab-Nomor-1-Rp.-800.000', '800000', '10', '0', 'Tes', 'lihab1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(5, 'Lihab Nomor 3 Rp. 275.000', 'Nomor 3', '160', '190', 'Lihab-Nomor-3-Rp.-275.000', '275000', '9', '1', 'Tes', 'lihab3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:32:41'),
(6, 'Lihab Nomor 3 Rp. 350.000', 'Nomor 3', '160', '190', 'Lihab-Nomor-3-Rp.-350.000', '350000', '10', '0', 'Tes', 'lihab3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(7, 'Lamat Nomor 1 Rp. 1.200.000', 'Nomor 1', '180', '190', 'Lamat-Nomor-1-Rp-1.200.000', '1200000', '10', '0', 'Tes', 'lamat1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(8, 'Lihab Nomor 1 Rp. 400.000', 'Nomor 1', '180', '190', 'Lihab-Nomor-1-Rp.-400.000', '400000', '10', '0', 'Tes', 'lihab1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(9, 'Lihab Nomor 3 Rp. 500.000', 'Nomor 3', '160', '190', 'Lihab-Nomor-3-Rp.-500.000', '500000', '10', '0', 'Tes', 'lihab3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(10, 'Lihab Nomor 1 Rp. 600.000', 'Nomor 1', '180', '190', 'Lihab-Nomor-1-Rp.-600.000', '600000', '10', '0', 'Tes', 'lihab1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(11, 'Lihab Nomor 2 Rp. 500.000', 'Nomor 2', '160', '190', 'Lihab-Nomor-2-Rp.-500.000', '500000', '10', '0', 'Tes', 'lihab2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(12, 'Lamat Nomor 1 Rp. 800.000', 'Nomor 1', '180', '190', 'Lamat-Nomor-1-Rp.-800.000', '800000', '10', '0', 'Tes', 'lamat1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(13, 'Lamat Nomor 2 Rp. 700.000', 'Nomor 2', '160', '190', 'Lamat-Nomor-1-Rp-700.000', '700000', '10', '0', 'Tes', 'lamat2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(14, 'Lihab Nomor 2 Rp. 700.000', 'Nomor 2', '160', '190', 'Lihab-Nomor-2-Rp.-700.000', '700000', '9', '1', 'Tes', 'lihab2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:32:41'),
(15, 'Lamat Nomor 2 Rp. 1.000.000', 'Nomor 2', '160', '190', 'Lamat-Nomor-2-Rp-1.000.000', '1000000', '15', '0', 'Tes', 'lamat2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:28:18'),
(16, 'Lamat Nomor 3 Rp. 700.000', 'Nomor 3', '120', '190', 'Lamat-Nomor-3-Rp-700.000', '700000', '10', '0', 'Tes', 'lamat3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(17, 'Lamat Nomor 3 Rp. 850.000', 'Nomor 3', '120', '190', 'Lamat-Nomor-3-Rp-850.000', '850000', '10', '0', 'Tes', 'lamat3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(18, 'Kasur Nomor 1 Rp. 1.400.000', 'Nomor 1', '180', '190', 'Kasur-Nomor-1-Rp-1.400.000', '1400000', '10', '0', 'Tes', 'kasur1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(19, 'Kasur Nomor 2 Rp. 1.200.000', 'Nomor 2', '160', '190', 'Kasur-Nomor-2-Rp-1.200.000', '1200000', '10', '0', 'Tes', 'kasur2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(20, 'Kasur Nomor 3 Rp. 800.000', 'Nomor 3', '120', '190', 'Kasur-Nomor-3-Rp-800.000', '800000', '8', '2', 'Tes', 'kasur3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:30:52'),
(21, 'Busa Bola Dunia Tebal 11 CM No.1', 'Nomor 1', '180', '190', 'Busa-Bola-Dunia-Tebal-11-CM-No-1', '800000', '10', '0', 'Tes', 'boladunia1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(22, 'Busa Bola Dunia Tebal 11 CM No.2', 'Nomor 2', '160', '190', 'Busa-Bola-Dunia-Tebal-11-CM-No-2', '700000', '10', '0', 'Tes', 'boladunia2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(23, 'Busa Bola Dunia Tebal 11 CM No.3', 'Nomor 3', '120', '190', 'Busa-Bola-Dunia-Tebal-11-CM-No-3', '550000', '10', '0', 'Tes', 'boladunia3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(24, 'Busa Procella Tebal 11 CM No.1', 'Nomor 1', '180', '190', 'Busa-Procella-Tebal-11-CM-No-1', '750000', '10', '0', 'Tes', 'procella1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(25, 'Busa Procella Tebal 11 CM No.2', 'Nomor 2', '160', '190', 'Busa-Procella-Tebal-11-CM-No-2', '650000', '10', '0', 'Tes', 'procella2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(26, 'Busa Procella Tebal 11 CM No.3', 'Nomor 3', '120', '190', 'Busa-Procella-Tebal-11-CM-No-3', '500000', '10', '0', 'Tes', 'procella3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(27, 'Busa Hercules Tebal 18 CM sm 25 CM No.1', 'Nomor 1', '190', '200', 'Busa Hercules Tebal 18 CM sm 25 CM No.1', '1700000', '10', '0', 'Tes', 'hercules1.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(28, 'Busa Hercules Tebal 18 CM sm 25 CM No.2', 'Nomor 2', '160', '200', 'Busa Hercules Tebal 18 CM sm 25 CM No.2', '1500000', '10', '0', 'Tes', 'hercules2.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(29, 'Busa Hercules Tebal 18 CM sm 25 CM No.3', 'Nomor 3', '120', '200', 'Busa Hercules Tebal 18 CM sm 25 CM No.3', '1300000', '10', '0', 'Tes', 'hercules3.jpg', 1, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(30, 'Bantal Busa', '-', '-', '-', 'Bantal-Busa', '50000', '10', '0', 'Tes', 'bantalbusa.jpg', 2, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(31, 'Bantal Dakron', '-', '-', '-', 'Bantal-Dakron', '80000', '10', '0', 'Tes', 'bantaldakron.jpg', 2, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(32, 'Bantal Kapuk', '-', '-', '-', 'Bantal-Kapuk', '90000', '10', '0', 'Tes', 'bantalkapuk.jpg', 2, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(33, 'Bantal Guling Busa', '-', '-', '-', 'Bantal-Guling-Busa', '55000', '10', '0', 'Tes', 'gulingbusa.jpg', 2, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(34, 'Bantal Guling Dakron', '-', '-', '-', 'Bantal-Guling-Dakron', '85000', '10', '0', 'Tes', 'gulingdakron.jpg', 2, '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(35, 'Bantal Guling Kapuk', '-', '-', '-', 'Bantal-Guling-Kapuk', '95000', '10', '0', 'Tes', 'gulingkapuk.jpg', 2, '2023-05-24 01:12:23', '2023-05-24 01:12:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
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
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `pesanan_id`, `barang_id`, `order_id`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'INV360167260141', '2', '500000', '2023-05-24 01:30:52', '2023-05-24 01:30:52'),
(2, 1, 20, 'INV360167260141', '2', '1600000', '2023-05-24 01:30:52', '2023-05-24 01:30:52'),
(3, 2, 1, 'INV967938886521', '1', '250000', '2023-05-24 01:32:41', '2023-05-24 01:32:41'),
(4, 2, 5, 'INV967938886521', '1', '275000', '2023-05-24 01:32:41', '2023-05-24 01:32:41'),
(5, 2, 14, 'INV967938886521', '1', '700000', '2023-05-24 01:32:41', '2023-05-24 01:32:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Kasur', 'Kasur', '2023-05-24 01:12:23', '2023-05-24 01:12:23'),
(2, 'Bantal', 'Bantal', '2023-05-24 01:12:23', '2023-05-24 01:12:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_13_091257_create_kategoris_table', 1),
(4, '2023_05_14_070452_create_barangs_table', 1),
(5, '2023_05_14_070510_create_stocks_table', 1),
(6, '2023_05_16_104653_create_pesanans_table', 1),
(7, '2023_05_16_130237_detail_pesanan', 1),
(8, '2023_05_18_160100_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
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
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `pesanan_id`, `user_id`, `tipe`, `nominal`, `bank_type`, `nama_rekening`, `nomor_rekening`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'transfer', '2100000', 'bri', 'Otan', '12131414342', '1684917128.jpg', '2023-05-24 01:32:08', '2023-05-24 01:32:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `status` enum('Belum Dibayar','Melanjutkan Ke Admin','Pesanan Diproses','Selesai') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `order_id`, `status`, `user_id`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 'INV360167260141', 'Selesai', 3, '2100000', '2023-05-24 01:30:52', '2023-05-24 01:32:20'),
(2, 'INV967938886521', 'Belum Dibayar', 4, '1225000', '2023-05-24 01:32:41', '2023-05-24 01:32:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `stock_awal` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stocks`
--

INSERT INTO `stocks` (`id`, `barang_id`, `harga_beli`, `jumlah`, `tanggal`, `stock_awal`, `created_at`, `updated_at`) VALUES
(1, 1, '1000000', '4', '2023-05-24', '10', '2023-05-24 01:28:00', '2023-05-24 01:28:00'),
(2, 15, '5000000', '5', '2023-05-24', '10', '2023-05-24 01:28:18', '2023-05-24 01:28:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `type`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Udil Surbakti', 'admin@gmail.com', NULL, '$2y$10$Iq80XlVMFxRn0To6vvSZfeNactkns7akLYhodAXpPnZpSIedSih6m', '082178526861', 1, 'default.png', NULL, '2023-05-24 01:25:59', '2023-05-24 01:25:59'),
(2, 'Jalaludin', 'owner@gmail.com', NULL, '$2y$10$mZDj4AVPx1f2w3v1rm7HxOXAhIH3bOaJmi7BswjALpMCDKO2cW7Hi', '0821312312312', 2, 'default.png', NULL, '2023-05-24 01:26:28', '2023-05-24 01:26:28'),
(3, 'Inggih Rembang Setyo', 'inggih@faserv.id', NULL, '$2y$10$SHbidRNri/i6kZTZdxWgZexdPZsR.bOC5lEae728Xf.5Qv6QKHGzy', '04155551212', 0, 'default.png', NULL, '2023-05-24 01:30:52', '2023-05-24 01:30:52'),
(4, 'rendi', 'renditriandi17@gmail.com', NULL, '$2y$10$Y.S63tB4w98fCjc1XuaxQuXdcObZGTBFrcH8b2M8SJk8vjCT0Oadq', '04155551212', 0, 'default.png', NULL, '2023-05-24 01:32:41', '2023-05-24 01:32:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanan_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `detail_pesanan_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesanan_order_id_unique` (`order_id`),
  ADD KEY `pesanan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
