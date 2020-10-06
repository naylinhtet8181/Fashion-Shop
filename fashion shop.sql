-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2020 at 05:12 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `total` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'Men-Shirt', '2020-10-05 00:42:33', '2020-10-05 00:42:33'),
(12, 'Women-Dress', '2020-10-05 00:44:29', '2020-10-05 00:44:29'),
(13, 'Kid-Shirt', '2020-10-05 00:47:04', '2020-10-05 00:47:04'),
(14, 'Men-Trouser', '2020-10-05 00:49:48', '2020-10-05 00:49:48'),
(15, 'Women-Trouser', '2020-10-05 00:51:34', '2020-10-05 00:51:34'),
(16, 'Kid-Trouser', '2020-10-05 00:55:49', '2020-10-05 00:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int NOT NULL,
  `name_on_card` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card_number` int NOT NULL,
  `exp_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_year` int NOT NULL,
  `cvv` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `email`, `address`, `city`, `state`, `zip`, `name_on_card`, `credit_card_number`, `exp_month`, `exp_year`, `cvv`, `created_at`, `updated_at`) VALUES
(3, 1, 'John More Doe', 'john@example.com', '542 W. 15th Street', 'New York', 'NY', 10001, 'John More Doe', 1111, 'September', 2021, 352, '2020-10-05 01:30:07', '2020-10-05 01:30:07'),
(4, 1, 'David Sanchez', 'david@gmail.com', '542 W. 15th Street', 'Washington', 'WH', 10002, 'David-Sanchez', 111133344, 'August', 2022, 333, '2020-10-05 01:42:46', '2020-10-05 01:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `name`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(37, 11, 'Shirt', 20, 'this is a shirt', '/images/shirt1.jpg', '2020-10-05 00:43:55', '2020-10-05 00:43:55'),
(38, 11, 'Shirt-2', 44, 'this is shirt-2', '/images/shirt2.jpg', '2020-10-05 00:44:18', '2020-10-05 00:44:18'),
(39, 12, 'Dress', 34, 'this is dress', '/images/50 looks com vestidos longos para todas as idades.jpeg', '2020-10-05 00:45:10', '2020-10-05 00:45:10'),
(40, 12, 'Dress-2', 55, 'this is a product', '/images/Just Like Honey Dress Red.jpeg', '2020-10-05 00:46:35', '2020-10-05 00:46:35'),
(41, 13, 'K-Shirt', 9, 'this is a product', '/images/Baby boss girl shirt, little boss lady shirt, toddler clothes girl, boss baby shirt, mini boss shirt for girls, black toddler girls shirt.jpeg', '2020-10-05 00:47:39', '2020-10-05 00:47:39'),
(42, 13, 'K-Shirt-2', 17, 'this is a product', '/images/Free Domestic Shipping.jpeg', '2020-10-05 00:48:19', '2020-10-05 00:48:19'),
(43, 14, 'M-Trouser', 63, 'this is a product', '/images/Elastic Cuffed Solid Color Casual Cargo Pants - Light Khaki - 3D84612910 Size 2XL.jpeg', '2020-10-05 00:50:22', '2020-10-05 00:50:22'),
(44, 14, 'M-Trouser-2', 82, 'this is a product', '/images/Kingston White Striped Slim Pants.jpeg', '2020-10-05 00:51:03', '2020-10-05 00:58:38'),
(45, 15, 'W-Trouser', 73, 'this is a product', '/images/View all - Trousers - COLLECTION - WOMEN - Massimo Dutti - United States.jpeg', '2020-10-05 00:53:43', '2020-10-05 00:53:43'),
(46, 15, 'W-Trouser-2', 55, 'this is a product', '/images/Color Block Twill Pant _ Rebecca Taylor.png', '2020-10-05 00:54:46', '2020-10-05 00:54:46'),
(47, 16, 'K-trouser', 27, 'this is a product', '/images/Brand Casual Pants for Boys 100 Cotton Boy Solid Color Cargo Pants Trousers Fashion Kids Pants.jpeg', '2020-10-05 00:56:36', '2020-10-05 00:56:36'),
(48, 16, 'K-trouser-2', 14, 'this is a product', '/images/Children Boys Harem Pants Cotton Casual Loose Letter Printed Pants For Teenage Boys Kids Trouse.jpeg', '2020-10-05 00:57:26', '2020-10-05 00:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_26_000000_create_shopping_cart_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_08_19_140615_create_categories_table', 1),
(6, '2020_08_20_144659_create_items_table', 1),
(7, '2020_09_24_060227_create_wishlists_table', 1),
(8, '2020_09_24_060312_create_carts_table', 1),
(9, '2020_09_29_054139_create_customers_table', 1),
(10, '2020_09_29_063132_create_orderitems_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `total` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `user_id`, `order_id`, `name`, `price`, `qty`, `total`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', '2', 'Shirt', 20, 6, 120, '/images/shirt1.jpg', NULL, NULL),
(2, '1', '2', 'T Shirt', 44, 4, 176, '/images/shirt2.jpg', NULL, NULL),
(5, '2', '1', 'Shirt', 20, 1, 20, '/images/shirt1.jpg', NULL, NULL),
(6, '2', '1', 'T Shirt', 44, 1, 44, '/images/shirt2.jpg', NULL, NULL),
(18, '1', '3', 'W-Trouser', 73, 3, 219, '/images/View all - Trousers - COLLECTION - WOMEN - Massimo Dutti - United States.jpeg', NULL, NULL),
(19, '1', '3', 'W-Trouser-2', 55, 4, 220, '/images/Color Block Twill Pant _ Rebecca Taylor.png', NULL, NULL),
(20, '1', '3', 'K-Shirt', 9, 1, 9, '/images/Baby boss girl shirt, little boss lady shirt, toddler clothes girl, boss baby shirt, mini boss shirt for girls, black toddler girls shirt.jpeg', NULL, NULL),
(21, '1', '3', 'K-Shirt-2', 17, 1, 17, '/images/Free Domestic Shipping.jpeg', NULL, NULL),
(22, '1', '4', 'M-Trouser-2', 82, 3, 246, '/images/Kingston White Striped Slim Pants.jpeg', NULL, NULL),
(23, '1', '4', 'K-trouser', 27, 1, 27, '/images/Brand Casual Pants for Boys 100 Cotton Boy Solid Color Cargo Pants Trousers Fashion Kids Pants.jpeg', NULL, NULL),
(24, '1', '4', 'W-Trouser', 73, 1, 73, '/images/View all - Trousers - COLLECTION - WOMEN - Massimo Dutti - United States.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'user1@gmail.com', NULL, NULL, '$2y$10$taoIms6RvQ2CgsqpbDhjSuTsvn7may4yVkI/1kYGLvRd9GkXKz9TK', NULL, '2020-10-03 04:09:04', '2020-10-03 04:09:04'),
(2, 'User2', 'user2@gmail.com', NULL, NULL, '$2y$10$4RIILxhLSQR2kQ50FUvb3OSwNi.XvR4nvFl1UD4i3m63nIip/bY2O', NULL, '2020-10-04 00:53:35', '2020-10-04 00:53:35'),
(4, 'Admin', 'admin@gmail.com', NULL, 1, '$2y$10$hdFP4eJ5PbJInq/IjAammuUofLxBnQff2c8JE3O8t9Mc04a512wY2', NULL, '2020-10-05 22:39:58', '2020-10-05 22:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `name`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(8, 1, 'K-trouser', 27, 'this is a product', '/images/Brand Casual Pants for Boys 100 Cotton Boy Solid Color Cargo Pants Trousers Fashion Kids Pants.jpeg', '2020-10-05 02:03:05', '2020-10-05 02:03:05'),
(9, 1, 'K-trouser-2', 14, 'this is a product', '/images/Children Boys Harem Pants Cotton Casual Loose Letter Printed Pants For Teenage Boys Kids Trouse.jpeg', '2020-10-05 02:04:11', '2020-10-05 02:04:11'),
(10, 1, 'K-Shirt-2', 17, 'this is a product', '/images/Free Domestic Shipping.jpeg', '2020-10-05 02:04:15', '2020-10-05 02:04:15'),
(11, 1, 'K-Shirt', 9, 'this is a product', '/images/Baby boss girl shirt, little boss lady shirt, toddler clothes girl, boss baby shirt, mini boss shirt for girls, black toddler girls shirt.jpeg', '2020-10-05 02:04:18', '2020-10-05 02:04:18'),
(12, 1, 'W-Trouser-2', 55, 'this is a product', '/images/Color Block Twill Pant _ Rebecca Taylor.png', '2020-10-05 02:04:23', '2020-10-05 02:04:23'),
(13, 2, 'Dress', 34, 'this is dress', '/images/50 looks com vestidos longos para todas as idades.jpeg', '2020-10-05 02:11:34', '2020-10-05 02:11:34'),
(14, 2, 'Dress-2', 55, 'this is a product', '/images/Just Like Honey Dress Red.jpeg', '2020-10-05 02:11:42', '2020-10-05 02:11:42'),
(15, 1, 'Shirt', 20, 'this is a shirt', '/images/shirt1.jpg', '2020-10-05 02:12:37', '2020-10-05 02:12:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`,`instance`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
