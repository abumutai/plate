-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 01:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahani`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Starter', '', '', NULL, NULL),
(2, 'Main Courses', '', '', NULL, NULL),
(3, 'Beef', '', '', NULL, NULL),
(4, 'Desserts', '', '', NULL, NULL),
(5, 'Drinks', '', '', NULL, NULL),
(6, 'Test', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Nairobi', 1, NULL, NULL),
(2, 'Mombasa', 1, NULL, NULL),
(3, 'Garissa', 1, NULL, NULL),
(4, 'Eldoret', 1, NULL, NULL),
(5, 'Kisumu', 1, NULL, NULL),
(6, 'Kampala', 2, NULL, NULL),
(7, 'Gulu', 2, NULL, NULL),
(8, 'Lira', 2, NULL, NULL),
(9, 'Mbarara', 2, NULL, NULL),
(10, 'Jinja', 2, NULL, NULL),
(11, 'Dar es Salaam', 3, NULL, NULL),
(12, 'Mwanza', 3, NULL, NULL),
(13, 'Zanzibar', 3, NULL, NULL),
(14, 'Arusha', 3, NULL, NULL),
(15, 'Morogoro', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kenya', NULL, NULL),
(2, 'Uganda', NULL, NULL),
(3, 'Tanzania', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_profiles`
--

CREATE TABLE `customer_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_profiles`
--

INSERT INTO `customer_profiles` (`id`, `user_id`, `avatar`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, '2020-10-07 12:26:42', '2020-10-07 12:26:42'),
(2, 3, NULL, NULL, NULL, '2020-10-12 18:20:35', '2020-10-12 18:20:35'),
(3, 6, NULL, NULL, NULL, '2020-10-21 06:56:59', '2020-10-21 06:56:59'),
(4, 7, NULL, NULL, NULL, '2020-10-25 16:25:38', '2020-10-25 16:25:38'),
(5, 10, NULL, NULL, NULL, '2020-10-26 18:00:14', '2020-10-26 18:00:14'),
(6, 11, NULL, NULL, NULL, '2020-10-27 08:42:17', '2020-10-27 08:42:17'),
(7, 12, NULL, NULL, NULL, '2020-10-27 10:59:14', '2020-10-27 10:59:14'),
(8, 13, NULL, NULL, NULL, '2020-10-28 05:51:29', '2020-10-28 05:51:29'),
(9, 23, NULL, NULL, NULL, '2020-11-02 16:44:14', '2020-11-02 16:44:14'),
(10, 43, NULL, NULL, NULL, '2020-11-04 08:44:38', '2020-11-04 08:44:38'),
(11, 48, NULL, NULL, NULL, '2020-11-11 06:51:12', '2020-11-11 06:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ksh',
  `pricing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `restaurant_profile_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `title`, `description`, `currency`, `pricing`, `status`, `restaurant_profile_id`, `created_at`, `updated_at`) VALUES
(1, 'Extra Large Chips', 'Big Chips', 'ksh', '50', 1, 1, '2020-10-07 17:32:27', '2020-10-07 17:32:27'),
(2, 'Extra Cheese', 'Xtra', 'ksh', '50', 1, 1, '2020-10-07 17:35:29', '2020-10-07 17:35:29'),
(3, 'Extra Sauce', 'Xtra', 'ksh', '120', 1, 12, '2020-11-02 14:03:24', '2020-11-02 14:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ksh',
  `pricing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `description`, `restaurant_profile_id`, `category_id`, `currency`, `pricing`, `status`, `image`, `created_at`, `updated_at`) VALUES
(10, 'Ugali Mboga', '2222222222222', 12, 3, 'ksh', '122', 1, 'http://127.0.0.1:7878/storage/images/menus/naxtlbvLBhv11eikHzOAC8MLj6YhHP7dOIk7ngzI.jpeg', '2020-11-03 03:08:27', '2020-11-03 15:01:49'),
(8, 'Chapati', 'Ya Mum', 12, 2, 'ksh', '1000', 0, 'http://127.0.0.1:7878/storage/images/menus/naxtlbvLBhv11eikHzOAC8MLj6YhHP7dOIk7ngzI.jpeg', '2020-11-03 02:53:46', '2020-11-03 02:53:46'),
(6, 'Beef And Wedge', 'Sweet Beef and wedget', 12, 3, 'ksh', '250', 0, 'http://127.0.0.1:7878/storage/images/menus/Ih64QDmJGrrfyPAW4ecvGOOgJI4HwhMdmgVAeAJS.jpeg', '2020-11-02 14:00:01', '2020-11-02 14:00:01'),
(11, 'Ugali Fish', 'Ugali Fish', 40, 3, 'ksh', '120', 0, 'http://127.0.0.1:7878/storage/images/menus/gfGSQvZ2OyLJBrGQ6a5fDETn8vYEmuvLfkSS3Lfr.jpeg', '2020-11-11 16:31:40', '2020-11-11 16:31:40'),
(12, 'Ugali Beef', 'Ugali Beef is an African Delicacy', 40, 6, 'ksh', '120', 0, 'http://127.0.0.1:7878/storage/images/menus/t1NBHGz0UlmiP6X800O1dEpntb5EAGeTu0OFH29L.png', '2021-03-15 07:31:20', '2021-03-15 07:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `menu_ingredients`
--

CREATE TABLE `menu_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_ingredients`
--

INSERT INTO `menu_ingredients` (`id`, `menu_id`, `ingredient_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-10-07 17:35:06', '2020-10-07 17:35:06'),
(2, 2, 2, '2020-10-07 17:36:37', '2020-10-07 17:36:37'),
(3, 3, 1, '2020-10-18 09:21:17', '2020-10-18 09:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `menu_sizes`
--

CREATE TABLE `menu_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `pricing` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_sizes`
--

INSERT INTO `menu_sizes` (`id`, `menu_id`, `size_id`, `pricing`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, '2020-10-07 17:36:37', '2020-10-07 17:36:37'),
(2, 3, 1, NULL, '2020-10-18 09:21:17', '2020-10-18 09:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_08_100000_create_telescope_entries_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_09_13_043108_create_mobiles_table', 1),
(6, '2020_09_16_070952_create_roles_table', 1),
(7, '2020_09_16_073934_create_customer_profiles_table', 1),
(8, '2020_09_16_074223_create_restaurant_profiles_table', 1),
(9, '2020_09_16_164411_create_services_table', 1),
(10, '2020_09_17_070452_create_restaurant_services_table', 1),
(11, '2020_09_17_081627_create_ratings_table', 1),
(12, '2020_09_17_141059_create_categories_table', 1),
(13, '2020_09_17_141647_create_menus_table', 1),
(14, '2020_09_17_142954_create_orders_table', 1),
(15, '2020_09_20_070851_create_sessions_table', 1),
(16, '2020_09_24_115928_create_galleries_table', 1),
(17, '2020_09_24_134114_create_ingredients_table', 1),
(18, '2020_09_24_134309_create_sizes_table', 1),
(19, '2020_09_24_140734_create_menu_ingredients_table', 1),
(20, '2020_09_24_141902_create_menu_sizes_table', 1),
(21, '2020_09_25_071337_create_temp_orders_table', 1),
(22, '2020_09_28_044529_create_temp_ingredients_table', 1),
(23, '2020_09_30_135046_create_cities_table', 1),
(24, '2020_09_30_135223_create_countries_table', 1),
(25, '2020_10_06_131127_create_points_table', 1),
(26, '2020_10_06_131955_create_reviews_table', 1),
(27, '2020_10_12_000000_create_reservations_table', 2),
(28, '2020_10_07_133124_create_tables_table', 3),
(29, '2020_10_25_142954_create_orders_table', 4),
(30, '2020_10_25_143747_create_statuses_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `restaurant_service_id` int(11) NOT NULL COMMENT 'order type',
  `restaurant_profile_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `menu_id`, `table_id`, `quantity`, `restaurant_service_id`, `restaurant_profile_id`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(46, 48, 11, 120, 1, 45, 40, 4, NULL, '2020-12-14 12:59:04', '2020-12-14 14:31:27'),
(47, 48, 12, 3, 1, 45, 40, 3, NULL, '2021-03-15 07:33:18', '2021-03-15 07:34:33'),
(48, 48, 11, NULL, 1, 44, 40, 4, NULL, '2021-03-15 07:36:43', '2021-03-15 07:37:30'),
(49, 48, 11, NULL, 1, 43, 40, 1, NULL, '2021-03-15 07:39:25', '2021-03-15 07:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `full_name`, `note`, `email`, `city`, `estate`, `house`, `house_no`, `delivery_day`, `delivery_time`, `phone`, `order_id`, `created_at`, `updated_at`) VALUES
(20, 'Collins Kemboi', 'sasas', 'collynes@gmail.com', 'Nairobi', 'Kenya', 'Block A', '12', '07.00pm', 'Today', '+254711180014', 38, '2020-11-03 19:15:49', '2020-11-03 19:15:49'),
(21, 'Collins Kemboi', 'asas', 'collynes@gmail.com', 'Nairobi', 'Kenya', 'Block A', '12', '08.30pm', 'Tomorrow', '+254711180014', 39, '2020-11-03 19:17:23', '2020-11-03 19:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('collynes@gmail.com', '8DXrrk62hQBiwqcuqeCKSnrCXe9RgQeJR8jeScXKFUfmlrPhfBVLAFkfw6VA', '2020-11-27 09:18:31'),
('collynes@gmail.com', 'FegkPpDrZ7N97nDqV7CqmrajkQyHFFTfYqvPf8hk2bosYmjRCiX3NNBGmPko', '2020-11-27 09:19:13'),
('collynes@gmail.com', 'nC7GHHXiRpxcSzdnRa9AobkO5j3jl5DbTiWHmxCcaxbPSRn21xkM3V6M9Ke6', '2020-11-27 09:20:36'),
('collynes@gmail.com', 'geGKmMVjivk52oP7hdr9xAKfvEOewEFCgKv83lEwb0HaZ5vvxWSlh0nB3A13', '2020-11-27 09:21:03'),
('collynes@gmail.com', 'JviHrdAc34WsoNAqfL5bWzE388wChgtadJajDPAEC4c0HpdyLZEoB6m0xpvO', '2020-11-27 09:23:17'),
('collynes@gmail.com', 'ngPjDxeAJHDzXWWjVIrFVCYFK76UG7q0GydopZuRapgK4T5lbVu5elS6xXSp', '2020-11-27 09:23:20'),
('collynes@gmail.com', 'eHjw8SNuajJP45ENG2luQvqofZZLtRopGQsrWq680senMYbub2QOT5AotKvN', '2020-11-27 09:23:55'),
('collynes@gmail.com', 'a2tcodqxoouTkrCeGHozJhTcznGlBHAbHZmOW4P2lrKCSqvNpX7yrBKqk1Ma', '2020-11-27 09:24:25'),
('collynes@gmail.com', 'Hz3zLr4mIVqCeZoD4Fo1lo4gJpL0GJbz2WuxtOsVuX0laeb1QXG0P3TOBr3g', '2020-11-27 09:26:15'),
('collynes@gmail.com', 'UXbdU0xAsupp04Itk18EctW4GBLIBPCFmVPsu4Z2hhcdEViFAJ7tnM4bAJDM', '2020-11-27 09:26:41'),
('collynes@gmail.com', 'Aer8Q9tZlfPQnvHibxqQPhkM1qUSi5ZjQOpCDBUjpWqTZcahfc9OiP6L0Oe0', '2020-11-27 09:27:04'),
('collynes@gmail.com', 'KPuzV0gu7gaXibhnYQfEkrcpLiFWku0qQGlyY03y4Upcv3ZzOA5w1PlvaAwE', '2020-11-27 09:27:18'),
('collynes@gmail.com', 'sQj3Cn8hNhcbToFHmClnXtdRyoR8J6IgOvOxyaqWSdoyGHhVBZULPe1xGp3M', '2020-11-27 09:27:38'),
('collynes@gmail.com', '9wrIgy58ZA9nmXNU3aFm30SGEBftoZUpwDmHJsHQCINjKH7m7YNB4x4RaNPc', '2020-11-27 09:27:48'),
('collynes@gmail.com', 'o3O5Cay5ZyIWh2CFHdEFXNtRfksBt29SwLQSBZZaR1aMFktWvX4RZk6VDoA8', '2020-11-27 09:27:52'),
('collynes@gmail.com', 'Gtq5nulprdBhaBpOzDKmu9QsEGarNBaKhiRnGoF4RUglEzrq5EpsPruAuMSv', '2020-11-27 09:28:18'),
('collynes@gmail.com', 'ZvnvRjF7BpxiNhatTOU7oXM8ADPxhVdGA00ZMXU2f6SB5L9PNqWse2KhNdW1', '2020-11-27 09:28:24'),
('collynes@gmail.com', 'J7OWAGVvIDFk7GnpzH9yJeQMWrxiMKDPh9eG3u1Ty3MBXBL5wD3djRdYu0S1', '2020-11-27 09:28:49'),
('collynes@gmail.com', '6xMueYTqCmlGEvQDTDqwr235hnt0ZkH2rzyLBtUFEdScVGwjgY5UWOesJckp', '2020-11-27 09:29:40'),
('collynes@gmail.com', 'UgW4PYCvxCIB2LKiZrmC9tM00qxiZJea34ChTGRU1pWL6yNoDTzFd08fVuyF', '2020-11-27 09:30:27'),
('collynes@gmail.com', '6QAXLYsNne3RfLR7FfTKdSo760TK8LYuXpxaQc9g4YmQ33sAfrerAoNRE3nD', '2020-11-27 09:30:43'),
('collynes@gmail.com', 'zmQVRijyz0iWLhqh8Qatpd03ECYegWQ7EQAGDM9kMLurOrjekiaKvUIjVvsE', '2020-11-27 09:30:53'),
('collynes@gmail.com', 'vsJL8D5UMuuCH5ynQ1rMvxrmOdMZx5l6i5T9cCkkNkNTZ5nM6RwXuTmlnd9J', '2020-11-27 09:31:16'),
('collynes@gmail.com', 'DgnlssgkYwKIQZUw7ukkJf2x9aw9QcgAEmevpTl6i5ta8yApvu2mLCX8Fc7j', '2020-11-27 09:34:55'),
('collynes@gmail.com', '3TXapQOdXuZcy782tWxJkuaA8iC9cw8o0zIR8LIUD5mnnxdOxukvW4hp9Mlu', '2020-11-27 09:34:57'),
('collynes@gmail.com', 'j3rDngl4H2TtxbZab4RFb5OLI1pMzLOwocMDE6XWCk5LTbR7Lb4iT9qkG79t', '2020-11-27 09:34:57'),
('collynes@gmail.com', '8BQAHirX5OUFntBgCuovEWRd6fXaI7zC2r478BKNkChAFGgtvnFnP8vRmnNj', '2020-11-27 09:34:59'),
('collynes@gmail.com', 'jDbpfcHWtz6kk7moVsF50rN2ffYuuTsQlo29KxYXJgi7Tv1CVX387FJMFU1P', '2020-11-27 09:35:06'),
('collynes@gmail.com', 'zFw33fPYw4DOAS4F0GvdFcIWrCdQ52wu0C3pqTI1YP8sGhxHWdbqyERltlqk', '2020-11-27 09:35:07'),
('collynes@gmail.com', 'Gecjv1FeiR8V3f7ZCw3GnbTGM2U7ZPqKLTtuaYofEKaTwO4xnLZabUJT29LY', '2020-11-27 09:35:08'),
('collynes@gmail.com', 'QPxhVTcUQqeDp9iLAGBeAPjnSksqvwEZV4amQbVuKaATwN9zw1JB1wPGSR1p', '2020-11-27 09:35:09'),
('collynes@gmail.com', 'Dxj14hairxPx6WXlUanNFkr5GmHfK32Ob3EJhtdeQNlMLdSbYegB6Og6L3Mf', '2020-11-27 09:36:21'),
('collynes@gmail.com', 'fwBmz4TD99GqJUfhjXhhaCgRI7hS4CEgm0s4FwdTaHmnHMfMvCOMdsVcpJzq', '2020-11-27 09:37:00'),
('collynes@gmail.com', 'gZW5e5q98bgiGiruHCBpRJM0Hii9fsMBlV0O6AHcMgUEtgE1f8K0ss5mgpiP', '2020-11-27 09:37:18'),
('collynes@gmail.com', '7PFQFMnzeGueMIeNWXODqVfHAifGqlJXthtqj5YST23MgBu4lorMwTCry2q7', '2020-11-27 09:38:11'),
('collynes@gmail.com', 'L54k1QPuUK6cwTgMR70CYCnemzjXG9odFCepiNIEOZLrXUNaW5vposGVH0R4', '2020-11-27 09:39:18'),
('collynes@gmail.com', '4xjSFfbBTZoStlJ2VOJR0dbjyh8llLPw7rsUb1r9DJyVrthmqDKR2DUNfV13', '2020-11-27 09:39:26'),
('collynes@gmail.com', 'aMsGJSiOh2AIPBOqtid9ogMt6douXpbA9e2fc5LX2f5xdktUalMpJaqUucHx', '2020-11-27 09:41:16'),
('collynes@gmail.com', 'gKaADUEOz2cGnlEJZrp6SYE91tjrjrRBdHqOykQ5zEuzLI54FbDcxva4NRqP', '2020-11-27 09:42:02'),
('collynes@gmail.com', 'UPdRgmw9AQW38x3T7euBn2W0iJrlGz067XfaDYAkSdvJHlv8fmZ6afTrKzAV', '2020-11-27 09:42:04'),
('collynes@gmail.com', 'tSdDw2uZNf3otpHWQrgnxrEXFExHT2W0gJ6dYRbUdq4dxXKb95DZfQb8IMta', '2020-11-27 09:42:20'),
('collynes@gmail.com', 'VYL3Zqoi0Yv4CgBcQOGumuDZCGCWvtaGYKqsV1vK1p1zG84sTAMRsezcqk9L', '2020-11-27 09:42:23'),
('collynes@gmail.com', 'Im6MqoSJ8PIEhrzIutfmRl9zXmovPZ5MNXCt2gQyIW9aAJGPaJm4sxJ19m7C', '2020-11-27 09:43:18'),
('collynes@gmail.com', '0pqJsPG9tl86OhrsNxregtRHkw8CefrCpi5fcmv5eyOwUUyS7jFZhFtsvBeU', '2020-11-27 09:43:27'),
('collynes@gmail.com', 'NqedKo3M64XtWP7K6M3lZ2JmlbLQrWhxuJhH2PiqaPpQrWLSzzUBtx2VEwqC', '2020-11-27 09:44:00'),
('collynes@gmail.com', '7SJlarsDvjWBgm9Wa0k01eZdfiyQzGgQajH3LHA8AhKl4d9FQ0PC5aDTsl8R', '2020-11-27 09:44:48'),
('collynes@gmail.com', 'Q4p9sRVWQCcDcMaAohf3bcD7BSKDCyF9zPcjT3LdRraNNL5BcsJGwfPhFR2i', '2020-11-27 09:47:35'),
('collynes@gmail.com', 'QEXz3ZcmnJfaKSoMnMBE4M9aSLIdjdfGWjjMT542hK6CRrqn2ooU8090JTjh', '2020-11-27 09:50:13'),
('collynes@gmail.com', '5cBEXH5OeCJrGvQTRPESyj1iNMKuIbBlXAmfJ21OkrV4W0YOy98fxceVbqPq', '2020-11-27 09:54:03'),
('collynes@gmail.com', 'cba2tJK6AJHzaN4YxphUa2bNYJN3lnIDUJ96raIyuWHpGv43mIkUiOjMae3H', '2020-11-27 09:54:27'),
('collynes@gmail.com', '64yxNkFupBXXtTFLWalCEU8Ao8QW6c6U99w84oC38cubuQErA31Vi2XH9qmw', '2020-11-27 09:55:32'),
('collynes@gmail.com', 'Qg904K5TS6tb8QdSwTpDu49tYOxl0SAW6RoY4HCvuUtXRh6ldC5S8t4bzhqN', '2020-11-27 10:01:02'),
('collynes@gmail.com', 'mIky1M6g87dSpug6EgTkQnKizxRnexHsEKT0cdO9ZJZzkO8fC27m4eDM2698', '2020-11-27 10:01:28'),
('collynes@gmail.com', 'e1wsYEFCTbk6NLnVtYuxtSMT7BdSRZh8sTXvMmciJcJeVanydPuBOnbp1vLC', '2020-11-27 10:02:36'),
('collynes@gmail.com', '9RMB1hX0WLB88b65lnStYnl8p3f7KwrM14ohejugjtX5dyLBnOqutUkRvc4C', '2020-11-27 10:03:21'),
('collynes@gmail.com', 'GQCCm13lOb39UFJ5bigJxTAYDu1Vqo0OoA0hzCBfoXQ11qqTpfyehNNoHzjq', '2020-11-27 10:04:05'),
('collynes@gmail.com', 'WbQKfeLxhMYnhqXIZONY0x88S1LesOdaCn67abRW4OtwVXr2myN7NiJGt805', '2020-11-27 10:05:54'),
('collynes@gmail.com', 'dFtOPedRnX5MpyWy2YAHd4zYZosdFZdXMltiEv3FchIhWT88I8d8VOzY03Zx', '2020-11-27 10:07:11'),
('collynes@gmail.com', 'ayfN8fjAhynJt2138Ln7ZqdKfkBw1LroODEHaWD1lmBdBMI580uwCHTjCJWs', '2020-11-27 10:07:41'),
('collynes@gmail.com', '61yORkRRAyH1BHqQfCANFl6PcRsfNqhZ9CbFzkscpVOzMKxtvJSWpnav7LSF', '2020-11-27 10:09:34'),
('collynes@gmail.com', 'i6WUFwmTET6xvlT79niRwzDVV7drCY96X9Ur8YxbnfsawP9p6bl7ZWe8oQ3q', '2020-11-27 10:11:20'),
('collynes@gmail.com', 'qmPQE3iHMXvInU7vbw9TvUt2ioeiWBHHFsySxSO8we9fh0YdnhtpedeF2koF', '2020-11-27 10:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_profile_id` int(11) NOT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `kula_point` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_people` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paybill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_profiles`
--

CREATE TABLE `restaurant_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_hours` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kula_points_ratio` double DEFAULT NULL,
  `delivery_fee` double DEFAULT 0,
  `coordinates` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_profiles`
--

INSERT INTO `restaurant_profiles` (`id`, `title`, `headline`, `category_id`, `location`, `city_id`, `country_id`, `phone`, `email`, `postal_address`, `opening_hours`, `banner`, `logo`, `about`, `website`, `kula_points_ratio`, `delivery_fee`, `coordinates`, `status`, `created_at`, `updated_at`) VALUES
(38, 'Java House', 'This is it', 1, 'Nairobi', NULL, NULL, '+254711180014', 'collynes@gmail.com', NULL, NULL, NULL, 'http://127.0.0.1:7878/storage/images/logos/uDm3jR9nSAlBiyoRD4INxyju0eqbfsmTvVj6iVOv.jpeg', NULL, 'http://www.bbc.com', 100, 990, NULL, NULL, '2020-11-04 09:01:30', '2020-11-08 05:34:06'),
(40, 'Techxers  Inn', 'This is it', 5, NULL, NULL, NULL, '+254711180014', 'techxers@gmail.com', NULL, NULL, 'http://127.0.0.1:7878/storage/images/banner/Tce1IdaOJDIg4j1z827joLwzmkAouzfNu68xCY0o.jpeg', 'http://127.0.0.1:7878/storage/images/logos/7tIZAGkBnuwBeu0fCoVWyLmlwV7wZBp2OVtsrgaY.jpeg', NULL, 'http://www.bbc.com', NULL, 0, NULL, '2', '2020-11-11 06:34:06', '2021-03-15 07:42:42'),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-11-12 05:20:06', '2020-11-12 05:20:06'),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-11-12 05:26:26', '2020-11-12 05:26:26'),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-11-12 05:33:35', '2020-11-12 05:33:35'),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-11-12 05:34:55', '2020-11-12 05:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_services`
--

CREATE TABLE `restaurant_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_services`
--

INSERT INTO `restaurant_services` (`id`, `restaurant_profile_id`, `service_id`, `created_at`, `updated_at`) VALUES
(45, 40, 3, '2020-11-11 06:42:38', '2020-11-11 06:42:38'),
(44, 40, 2, '2020-11-11 06:42:38', '2020-11-11 06:42:38'),
(43, 40, 1, '2020-11-11 06:42:38', '2020-11-11 06:42:38'),
(42, 1, 1, NULL, NULL),
(41, 38, 3, '2020-11-08 05:34:06', '2020-11-08 05:34:06'),
(40, 38, 2, '2020-11-08 05:34:06', '2020-11-08 05:34:06'),
(39, 38, 1, '2020-11-08 05:34:06', '2020-11-08 05:34:06'),
(36, 12, 2, '2020-11-03 18:09:52', '2020-11-03 18:09:52'),
(38, 1, 1, NULL, NULL),
(37, 12, 3, '2020-11-03 18:09:52', '2020-11-03 18:09:52'),
(35, 12, 1, '2020-11-03 18:09:52', '2020-11-03 18:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `res_statuses`
--

CREATE TABLE `res_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `res_statuses`
--

INSERT INTO `res_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Pending', NULL, NULL),
(1, 'Active', NULL, NULL),
(2, 'Banned', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_profile_id` int(11) NOT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `food_review` int(11) NOT NULL DEFAULT 0,
  `price_review` int(11) NOT NULL DEFAULT 0,
  `punctuality_review` int(11) NOT NULL DEFAULT 0,
  `courtesy_review` int(11) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin of the System', NULL, NULL),
(2, 'Restaurant', 'Restaurant hosting the services', NULL, NULL),
(3, 'Customer', 'Customer looking to buy or order food', NULL, NULL),
(4, 'Waiter', 'Waiter', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Takeaway', NULL, NULL),
(2, 'Delivery', NULL, NULL),
(3, 'Dine-in', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dEv6PVT59YbloMpaQ1JymqwQ0a5HOxhWFk5rBqTr', NULL, '197.156.190.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDZrMmJ0bUlQTHp5Vm1CUXh0V0hLYXZ0cTcxclRzMjNKVFBsQ3FtTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xNzguNjIuMTA0LjExOS9zaXRlcy9TYWhhbmlOZXdXZWIvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1602058412),
('GGXUG77YnciKLv2eKXDhzwpihFCduWEhJmwyzdNb', NULL, '105.160.34.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDc5NmcyNTRHUk12d0IwSmlseFFDaTVSNUtWQ0FXOGxMU05sb1R4OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xNzguNjIuMTA0LjExOS9zaXRlcy9TYWhhbmlOZXdXZWIvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1602065524),
('5MBiarllD8BShfzqckzyNONRV6TLDnQY1t44bjQy', 2, '102.7.238.76', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS1FOaXRaV1ZucU03aWNEQm90QnZtMUZEbmZVdWp5RGVYTW9reFg0RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHA6Ly8xNzguNjIuMTA0LjExOS9zaXRlcy9TYWhhbmlOZXdXZWIvcHVibGljL3BhZ2VzL3Jlc3RhdXJhbnRzLzEvbWVudSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1602073632),
('VcpTcd1IyqcOOsqd7BI7xTsrRzba8G06t1jZlFXA', 2, '105.160.34.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMmZ2c0ltRFF4TzE1UEg3VUlkV0JCSmlBMHlpU0NNZVc1MGNQV2tXMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzM6Imh0dHA6Ly8xNzguNjIuMTA0LjExOS9zaXRlcy9TYWhhbmlOZXdXZWIvcHVibGljL3Jlc3RhdXJhbnQvMS9vcmRlci9maW5pc2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MjE6InJlc3RhdXJhbnRfc2VydmljZV9pZCI7czoxOiIxIjt9', 1602092366),
('hRbqd1RS98Y6MWBM4qXFmPhZ7nEcksQI3raIiFaD', NULL, '105.160.34.70', 'Mozilla/5.0 (Linux; Android 10; SM-A205F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.120 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUZaeUcwdTRmT0QwN1JZaVEzYVFBaHpSYkw1Y0FoYVY5bFYwOWg3SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xNzguNjIuMTA0LjExOS9zaXRlcy9TYWhhbmlOZXdXZWIvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1602091575),
('f5PgGWPKlplQerbXBeRtVKS5h69YpBnNAuoIKJGI', 1, '105.160.34.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.68', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaWRXN0xYRHJLSGMwMzJma1RLeWlNNUJQVUlJOFJ1eUJpM3duSDFkVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njk6Imh0dHA6Ly8xNzguNjIuMTA0LjExOS9zaXRlcy9TYWhhbmlOZXdXZWIvcHVibGljL3BvcnRhbC9pbmdyZWRpZW50L2FsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1602092649),
('1nX5PXliof1mja5DLVPLKkWKq9UKp0iYJ7PEiZN5', NULL, '196.106.168.33', 'Mozilla/5.0 (Linux; Android 10; SM-A205F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.120 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjN6YWpNVXlBZWdmU3Nxd0xWS081dWN6Q0JxamdGWmFhT2t1MmdacSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xNzguNjIuMTA0LjExOS9zaXRlcy9TYWhhbmlOZXdXZWIvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1602141671),
('cEmVRMHMPX7hqgsRNn2k83RUX3ZG5Zn6k3Qo1Wbn', 2, '197.237.103.187', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMXhpbzg5SzZPNFVCTjFpem4xRTZCUmlCaEl3WFgwZHNYUkZUVVRINSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2NToiaHR0cDovLzE3OC42Mi4xMDQuMTE5L3NpdGVzL1NhaGFuaU5ld1dlYi9wdWJsaWMvcGFnZXMvcmVzdGF1cmFudHMiO319', 1602488179);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Medium', NULL, NULL),
(2, 'Large', NULL, NULL),
(3, 'Extra Large', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', NULL, NULL),
(2, 'Processing', NULL, NULL),
(3, 'Completed', NULL, NULL),
(4, 'Cancelled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `title`, `restaurant_profile_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Table One', 40, 0, NULL, NULL),
(2, 'Table Two', 40, 0, '2020-11-02 14:00:30', '2020-11-02 14:00:30'),
(3, 'Table 3', 40, 0, '2021-03-15 07:32:50', '2021-03-15 07:32:50'),
(4, 'Table 3', 40, 0, '2021-03-15 07:33:28', '2021-03-15 07:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_ingredients`
--

CREATE TABLE `temp_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_ingredient_id` int(11) NOT NULL,
  `temp_order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_ingredients`
--

INSERT INTO `temp_ingredients` (`id`, `menu_ingredient_id`, `temp_order_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-10-07 17:37:49', '2020-10-07 17:37:49'),
(2, 2, 2, '2020-10-12 18:20:59', '2020-10-12 18:20:59'),
(3, 2, 3, '2020-10-12 18:21:00', '2020-10-12 18:21:00'),
(4, 1, 4, '2020-10-23 02:32:27', '2020-10-23 02:32:27'),
(5, 1, 5, '2020-10-26 08:51:03', '2020-10-26 08:51:03'),
(6, 1, 6, '2020-10-26 08:51:05', '2020-10-26 08:51:05'),
(7, 1, 7, '2020-10-26 08:51:06', '2020-10-26 08:51:06'),
(8, 1, 8, '2020-10-26 08:51:09', '2020-10-26 08:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `temp_orders`
--

CREATE TABLE `temp_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_size_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `restaurant_profile_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_orders`
--

INSERT INTO `temp_orders` (`id`, `user_id`, `menu_id`, `menu_size_id`, `service_id`, `restaurant_profile_id`, `created_at`, `updated_at`) VALUES
(38, 23, 8, NULL, NULL, 12, '2020-11-03 19:25:33', '2020-11-03 19:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3 COMMENT '1=admin, 2=restaurant, 3=customer',
  `restaurant_profile_id` int(11) DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `provider`, `provider_id`, `role_id`, `restaurant_profile_id`, `avatar`, `job_role`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(48, 'Collins Kemboi', 'collynes@gmail.com', '2020-11-04 09:01:58', NULL, NULL, 3, NULL, 'http://127.0.0.1:7878/storage/images/logos/kMG5hcSJzPc0EPjuna8U9S7kk4r8xduD4xb0huvk.png', NULL, NULL, '$2y$10$VkQ9ssxFnK9P1xoJ9GYBbuDzuTPqfm4naiIQQ0tHM42ak.ziAI.Su', '5iVvFF6OkGUeN6Bi4DTsE8Az1NtFB7DvUhf6UgPbFOaU0D5onBq3x6rkSz1Y', '2020-11-11 06:51:12', '2020-11-13 07:16:40'),
(49, 'Collins Kemboi Kip', 'collins@gmail.com', '2020-11-11 07:42:50', NULL, NULL, 4, 40, NULL, NULL, '0788900008', '$2y$10$wBFzBrIRekvijNdZ9PQEZOs6c/OOajRCzSWR44PbAJjM1ppWT1lLu', NULL, '2020-11-11 07:42:50', '2020-12-14 13:54:11'),
(46, 'Collins Kemboi', 'admin@gmail.com', '2020-11-04 09:01:58', NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$FozrAuk4C9rX7Hi/2twrTeJ4fFVICLpRhLBsRypzoIMwHwPjM3DNm', NULL, '2020-11-04 09:01:30', '2020-11-04 09:01:58'),
(47, 'Techxers', 'techxers@gmail.com', '2020-11-04 09:01:58', NULL, NULL, 2, 40, NULL, NULL, NULL, '$2y$10$kOcGywUIEcTLt0ZVarYrXu3d6k4xg71vZrrbmBwDQYWsOCVgdxFYq', NULL, '2020-11-11 06:34:06', '2020-11-11 06:34:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_profiles`
--
ALTER TABLE `customer_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `menu_ingredients`
--
ALTER TABLE `menu_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `menu_sizes`
--
ALTER TABLE `menu_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `table_id` (`table_id`),
  ADD KEY `restaurant_service_id` (`restaurant_service_id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_profile_id` (`customer_profile_id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservations_table_no_unique` (`table_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_profile_id` (`restaurant_id`);

--
-- Indexes for table `restaurant_profiles`
--
ALTER TABLE `restaurant_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `restaurant_services`
--
ALTER TABLE `restaurant_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `res_statuses`
--
ALTER TABLE `res_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_profile_id` (`customer_profile_id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `temp_ingredients`
--
ALTER TABLE `temp_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_ingredient_id` (`menu_ingredient_id`),
  ADD KEY `temp_order_id` (`temp_order_id`);

--
-- Indexes for table `temp_orders`
--
ALTER TABLE `temp_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `menu_size_id` (`menu_size_id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `restaurant_profile_id` (`restaurant_profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_profiles`
--
ALTER TABLE `customer_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu_ingredients`
--
ALTER TABLE `menu_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_sizes`
--
ALTER TABLE `menu_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_profiles`
--
ALTER TABLE `restaurant_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `restaurant_services`
--
ALTER TABLE `restaurant_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `res_statuses`
--
ALTER TABLE `res_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_ingredients`
--
ALTER TABLE `temp_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_orders`
--
ALTER TABLE `temp_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
