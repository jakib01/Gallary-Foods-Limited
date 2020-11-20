-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2020 at 01:35 PM
-- Server version: 10.3.24-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busizowf_business_gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) DEFAULT 1,
  `product_unit` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `unit_total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'MOBILE & ACCESSORIES', NULL, 'mobileacc_cat.png', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(2, 'FOOD & BEVERAGE', NULL, 'food_cat.png', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(3, 'COSMETIC', NULL, 'cosmetic_cat.png', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(4, 'FASHION', NULL, 'fasion_cat.jpg', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(5, 'SPORTS', NULL, 'sport_cat.png', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(6, 'PROKASHONI', NULL, 'prokashoni_cat.png', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(7, 'OFFICE APPLIANCE', NULL, 'officeappl_cat.png', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(8, 'HEALTH CARE', NULL, 'health_cat.png', 0, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(11, 'Man\'s Product', NULL, 'man_subcat.jpg', 4, '2020-10-25 08:02:48', '2020-10-25 08:02:48'),
(12, 'Woman\'s Product', NULL, 'woman_subcat.png', 4, '2020-10-25 08:02:48', '2020-10-25 08:02:48'),
(13, 'Mobile Phones', '', 'mobile_phones.jpg', 1, NULL, NULL),
(14, 'Headphone', '', 'headphones.jpg', 1, '2020-10-27 04:52:39', '2020-10-27 04:52:39'),
(19, 'Football', NULL, 'football_item.jpg', 5, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(20, 'Cricket', NULL, 'cricket_item.jpg', 5, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(25, 'Cricket', NULL, 'cricket_item.jpg', 4, '2020-10-24 08:02:48', '2020-10-24 08:02:48'),
(26, 'Cricket 2', NULL, 'cricket_item.jpg', 4, '2020-10-24 08:02:48', '2020-10-24 08:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `introducers`
--

CREATE TABLE `introducers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `introducer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_introducer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introducers`
--

INSERT INTO `introducers` (`id`, `user_id`, `introducer_type`, `parent_introducer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'CID', '1', '2020-11-07 18:01:55', '2020-11-07 18:01:55'),
(2, 2, 'CID', '1', '2020-11-07 18:49:37', '2020-11-07 18:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_13_112202_create_categories_table', 1),
(6, '2020_10_13_112607_create_brands_table', 3),
(7, '2020_10_13_112726_create_admins_table', 4),
(8, '2020_10_13_112911_create_countries_table', 5),
(17, '2020_10_13_122319_create_divisions_table', 13),
(18, '2020_10_13_122508_create_districts_table', 14),
(19, '2020_10_13_122611_create_upazilas_table', 15),
(25, '2014_10_12_000000_create_users_table', 18),
(27, '2020_11_04_060809_create_settings_table', 19),
(28, '2020_11_04_101153_create_payments_table', 20),
(30, '2020_10_13_121606_create_orders_table', 21),
(31, '2020_10_13_121758_create_carts_table', 21),
(33, '2020_10_13_121030_create_products_table', 22),
(34, '2020_10_13_121436_create_product_images_table', 22),
(35, '2020_10_13_115022_create_product_category_mappings_table', 23),
(36, '2020_10_13_121959_create_introducers_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `total_price_with_shipping_cost` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In ', 'cash_in.jpg', 1, 'cash_in', NULL, NULL, '2020-11-04 04:15:09', '2020-11-04 04:15:09'),
(2, 'Bkash', 'bkash.jpg', 2, 'bkash', '01673952895', 'personal', '2020-11-04 04:15:09', '2020-11-04 04:15:09'),
(3, 'Rocket', 'rocket.jpg', 3, 'rocket', '016739528955', 'personal', '2020-11-04 04:15:09', '2020-11-04 04:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_dec` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `title`, `description`, `unit`, `slug`, `quantity`, `price`, `offer_price`, `status`, `color`, `size`, `meta_title`, `meta_keyword`, `meta_dec`, `created_at`, `updated_at`) VALUES
(2, NULL, 'hoody', 'There are many display/panel types used in smartphones today.\r\n\r\nThese include:\r\n\r\nLCD (Liquid Crystal Display)\r\nIPS-LCD (In-Plane Switching Liquid Crystal Display)\r\nOLED (Organic Light-Emitting Diode)\r\nAMOLED (Active-Matrix Organic Light-Emitting Diode)\r\nThe screen, when combined with the touch element, is \'the\' major element of the user interface and as such we go to great lengths when testing screens during our review process to measure a displays quality by measuring Contrast Ratio, Color Calibration, Brightness and Sunlight Legibility.\r\nThere are many display/panel types used in smartphones today.\r\n\r\nThese include:\r\n\r\nLCD (Liquid Crystal Display)\r\nIPS-LCD (In-Plane Switching Liquid Crystal Display)\r\nOLED (Organic Light-Emitting Diode)\r\nAMOLED (Active-Matrix Organic Light-Emitting Diode)\r\nThe screen, when combined with the touch element, is \'the\' major element of the user interface and as such we go to great lengths when testing screens during our review process to measure a displays quality by measuring Contrast Ratio, Color Calibration, Brightness and Sunlight Legibility.\r\nThere are many display/panel types used in smartphones today.\r\n\r\nThese include:\r\n\r\nLCD (Liquid Crystal Display)\r\nIPS-LCD (In-Plane Switching Liquid Crystal Display)\r\nOLED (Organic Light-Emitting Diode)\r\nAMOLED (Active-Matrix Organic Light-Emitting Diode)\r\n\r\nThe screen, when combined with the touch element, is \'the\' major element of the user interface and as such we go to great lengths when testing screens during our review process to measure a displays quality by measuring Contrast Ratio, Color Calibration, Brightness and Sunlight Legibility.', NULL, 'man-huddy-1', 1, 2000, 2000, 1, 'red', 'L', NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'huddy 2', 'huddyhuddyhuddyhuddyhuddyhuddyhuddy\r\nhuddyhuddyhuddyhuddyhuddyhuddyhuddy\r\nhuddyhuddyhuddyhuddyhuddyhuddyhuddy', NULL, 'man-huddy-2', 1, 3000, 2000, 1, 'red', 'L', NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'huddy 3', 'huddyhuddyhuddyhuddyhuddyhuddyhuddy\r\nhuddyhuddyhuddyhuddyhuddyhuddyhuddy\r\nhuddyhuddyhuddyhuddyhuddyhuddyhuddy', NULL, 'man-huddy-3', 1, 4000, 2000, 1, 'red', 'L', NULL, NULL, NULL, NULL, NULL),
(9, NULL, 'Gown 1', 'GownGownGownGownGown', '2', 'woman-gown-1', 5, 7000, 2000, 1, 'red', 'L', NULL, NULL, NULL, NULL, NULL),
(10, NULL, 'Gown 2', 'GownGownGownGownGown', '2', 'woman-gown-2', 5, 8000, 2000, 1, 'red', 'S', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category_mappings`
--

CREATE TABLE `product_category_mappings` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_mappings`
--

INSERT INTO `product_category_mappings` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 26, 2, '2020-10-26 23:19:34', '2020-10-26 23:19:34'),
(2, 26, 3, '2020-10-26 23:19:34', '2020-10-26 23:19:34'),
(3, 26, 4, '2020-10-26 23:19:34', '2020-10-26 23:19:34'),
(4, 12, 9, '2020-10-26 23:19:34', '2020-10-26 23:19:34'),
(5, 12, 10, '2020-10-26 23:19:34', '2020-10-26 23:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(4, 2, 'productlist_huddy_1.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(5, 3, 'productlist_huddy_2.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(6, 4, 'productlist_huddy_3.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(7, 9, 'productlist_gown_1.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(8, 10, 'productlist_gown_2.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(11, 2, 'huddy (5).jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(12, 2, 'huddy (5).jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(13, 3, 'productlist_huddy_2.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(14, 3, 'productlist_huddy_2.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(15, 9, 'productlist_gown_1.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(16, 10, 'productlist_gown_2.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(17, 9, 'productlist_gown_1.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(18, 10, 'productlist_gown_2.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45'),
(19, 4, 'productlist_huddy_3.jpg', '2020-10-26 23:15:45', '2020-10-26 23:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'julkernienaki@gmail.com', '01673952895', 'housr:05, road:10, Mohammadia Housing society', 100, '2020-11-04 06:10:13', '2020-11-04 06:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=Inactive|1=Active|2=Ban',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countrie_id` int(10) UNSIGNED DEFAULT NULL,
  `division_id` int(10) UNSIGNED DEFAULT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `upazilas_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone_code`, `phone_no`, `password`, `country`, `date_of_birth`, `gender`, `status`, `ip_address`, `avatar`, `shipping_address`, `father_name`, `mother_name`, `post_code`, `occupation`, `nominee_name`, `nominee_relation`, `nominee_address`, `other`, `other1`, `street_address`, `countrie_id`, `division_id`, `district_id`, `upazilas_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Julker Nien', NULL, '01673952895', 'jakib142157@bscse.uiu.ac.bd', NULL, '01673952895', '12345678', 'Select Country', '2020-11-09', 'Male', 1, '59.153.103.9', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-07 18:01:55', '2020-11-07 18:01:55'),
(2, 'Ershad', 'Ali', '01739142959', 'achieverbd@gmail.com', NULL, '01739142959', 'Dhaka@25800', 'Bangladesh', '2020-11-01', 'Male', 1, '202.134.14.129', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-07 18:49:37', '2020-11-07 18:49:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisions_country_id_foreign` (`country_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `introducers`
--
ALTER TABLE `introducers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `introducers_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_category_mappings`
--
ALTER TABLE `product_category_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_mappings_category_id_foreign` (`category_id`),
  ADD KEY `product_category_mappings_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `introducers`
--
ALTER TABLE `introducers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_category_mappings`
--
ALTER TABLE `product_category_mappings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `introducers`
--
ALTER TABLE `introducers`
  ADD CONSTRAINT `introducers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_category_mappings`
--
ALTER TABLE `product_category_mappings`
  ADD CONSTRAINT `product_category_mappings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_category_mappings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
