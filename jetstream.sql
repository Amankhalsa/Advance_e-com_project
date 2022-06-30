-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 02:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jetstream`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'jetstreamadmin@gmail.com', '2022-03-12 09:12:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LFfT3eCffTh38tbl918Cbk34XKC9KHRTtfpbUnopohm3SvuTgTELEOmjabIQ', NULL, '2022_0312_0247.png', '2022-03-12 09:12:13', '2022-03-12 09:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_hin`, `brand_slug_en`, `brand_slug_hin`, `brand_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'samsung', 'सैमसंग', 'samsung', 'सैमसंग', 'upload/brand/1727203211970245.png', NULL, '2022-03-13 11:05:43', '2022-03-13 11:05:43'),
(2, 'Apple logo', 'एप्पल', 'apple-logo', 'एप्पल', 'upload/brand/1727203672954096.png', NULL, '2022-03-13 11:13:02', '2022-03-13 11:13:02'),
(3, 'Oppo', 'ओपो', 'oppo', 'ओपो', 'upload/brand/1727203938884051.png', NULL, '2022-03-13 11:17:16', '2022-03-13 11:17:16'),
(4, 'vivo', 'विवो', 'vivo', 'विवो', 'upload/brand/1727204007024704.png', NULL, '2022-03-13 11:18:20', '2022-03-13 11:18:20'),
(5, 'Mi brand', 'एम आई', 'mi-brand', 'एम-आई', 'upload/brand/1727206406581759.png', '2022-03-13 12:09:43', '2022-03-13 11:19:15', '2022-03-13 12:09:43'),
(6, 'huvwai', 'हुवाई', 'huvwai', 'हुवाई', 'upload/brand/1727204119097841.png', '2022-03-16 12:09:54', '2022-03-13 11:20:08', '2022-03-16 12:09:54'),
(7, 'Vegetable', 'सबजी', 'vegetable', 'सबजी', 'upload/brand/1735773892544975.jpg', NULL, '2022-06-16 01:33:01', '2022-06-16 01:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_hin`, `category_slug_en`, `category_slug_hin`, `category_icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'Fashion', 'फैशन', 'fashion', 'फैशन', 'fa fa-paw', NULL, '2022-03-24 13:47:37', '2022-04-24 06:41:59'),
(8, 'Electronics', 'इलेक्ट्रानिक्स', 'electronics', 'इलेक्ट्रानिक्स', 'fa fa-heartbeat', NULL, '2022-03-24 13:48:49', '2022-04-24 06:45:27'),
(9, 'Sweet Home', 'प्यारा घर', 'sweet-home', 'प्यारा-घर', 'fa fa-futbol-o', NULL, '2022-03-24 13:49:47', '2022-04-24 06:47:55'),
(10, 'Appliances', 'उपकरण', 'appliances', 'उपकरण', 'fa fa-clock-o', NULL, '2022-03-24 13:50:24', '2022-04-24 06:44:54'),
(11, 'Beauty', 'सुंदरता', 'beauty', 'सुंदरता', 'fa fa-laptop', NULL, '2022-03-24 13:51:22', '2022-04-24 06:41:30'),
(12, 'Vegetable', 'सबजी', 'vegetable', 'सबजी', 'fa fa-user', NULL, '2022-06-16 01:34:14', '2022-06-16 01:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_03_07_094138_create_sessions_table', 1),
(8, '2022_03_07_103215_create_admins_table', 2),
(9, '2022_03_12_144837_create_brands_table', 3),
(10, '2022_03_14_190623_create_categories_table', 4),
(11, '2022_03_16_191518_create_sub_categories_table', 5),
(12, '2022_03_19_052845_create_sub_sub_categories_table', 6),
(13, '2022_03_20_135817_create_products_table', 7),
(14, '2022_03_20_141326_create_multi_imgs_table', 7),
(15, '2022_04_10_095100_create_sliders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE IF NOT EXISTS `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/product/multi_images/1729713565979041.jpeg', '2022-03-30 14:32:49', '2022-04-10 04:06:42'),
(4, 1, 'upload/product/multi_images/1729713544650376.jpeg', '2022-04-09 11:09:27', '2022-04-10 04:06:22'),
(11, 5, 'upload/product/multi_images/1731541883823475.jpeg', '2022-04-30 08:27:02', NULL),
(12, 5, 'upload/product/multi_images/1731541884208336.jpeg', '2022-04-30 08:27:03', NULL),
(13, 5, 'upload/product/multi_images/1731541884598113.jpeg', '2022-04-30 08:27:03', NULL),
(14, 6, 'upload/product/multi_images/1731542181266775.jpeg', '2022-04-30 08:31:46', NULL),
(15, 6, 'upload/product/multi_images/1731542181985292.jpeg', '2022-04-30 08:31:47', NULL),
(16, 6, 'upload/product/multi_images/1731542182980083.jpeg', '2022-04-30 08:31:47', NULL),
(17, 7, 'upload/product/multi_images/1735501695105367.jpg', '2022-06-13 01:26:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_hin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_hin`, `product_slug_en`, `product_slug_hin`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_hin`, `product_size_en`, `product_size_hin`, `product_color_en`, `product_color_hin`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_hin`, `long_descp_en`, `long_descp_hin`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 8, 81, 'printed rund neck shirt', 'प्रिंटेड रंड नेक शर्ट', 'printed-rund-neck-shirt', 'प्रिंटेड-रंड-नेक-शर्ट', '56456410', '10', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'Small,Midium,Large', 'red,Black,Amet', 'red,Black,Large', '500', '400', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', 'लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने गैली का प्रकार लिया और एक प्रकार की नमूना पुस्तक बनाने के लिए इसे खंगाला। यह है', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>', '<p>लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने गैली का प्रकार लिया और एक प्रकार की नमूना पुस्तक बनाने के लिए इसे खंगाला। यह है</p>', 'upload/product/thambnail/1728756388711448.jpeg', 1, NULL, NULL, NULL, 1, '2022-03-30 14:32:47', '2022-04-10 01:30:39'),
(5, 3, 10, 19, 8, 'Samsung 66 cm (26 inch) LCD TV', 'सैमसंग 66 सेमी (26 इंच) एलसीडी टीवी', 'samsung-66-cm-(26-inch)-lcd-tv', 'सैमसंग-66-सेमी-(26-इंच)-एलसीडी-टीवी', '23153', '200', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'Small,Midium,Large', 'red,Black,Amet', 'red,Black,Large', '2000', NULL, 'Samsung 66 cm (26 inch) LCD TV (Black, LA26D450)', 'सैमसंग 66 कम (26 इंच) एलसीडी टीवी (ब्लैक, एलए26डी450)', '<p>Samsung 66 cm (26 inch) LCD TV (Black, LA26D450)</p>', '<p>सैमसंग 66 कम (26 इंच) एलसीडी टीवी (ब्लैक, एलए26डी450)</p>', 'upload/product/thambnail/1731541883161610.jpeg', 1, 1, 1, 1, 1, '2022-06-13 02:03:21', '2022-06-13 02:03:21'),
(6, 1, 10, 19, 8, 'Samsung (26 inch) LCD TV (Black, LA26D450)', 'सैमसंग  (26 इंच) एलसीडी टीवी (ब्लैक, एलए26डी450)', 'samsung-(26-inch)-lcd-tv-(black,-la26d450)', 'सैमसंग--(26-इंच)-एलसीडी-टीवी-(ब्लैक,-एलए26डी450)', '456465', '200', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'Small,Midium,Large', 'red,Black,Amet', 'red,Black,Large', '1800', '1500', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिसिंग एलीट, सेड डो ईयूसमोड', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>', '<p>लोरेम इप्सम डोलर सिट एमेट, कॉन्सेक्टेटूर एडिपिसिसिंग एलीट, सेड डो ईयूसमोड<br />\r\nटेम्पोर इंसीडिंट यूट लेबर एट डोलोरे मैग्ना एलिका। यूट एनिम एड मिनिम वेनिअम,</p>', 'upload/product/thambnail/1731542180679908.jpeg', 1, 1, NULL, NULL, 1, '2022-04-30 08:37:59', '2022-04-30 08:37:59'),
(7, 2, 11, 24, 49, 'strawberry', 'स्ट्रॉबेरी', 'strawberry', 'स्ट्रॉबेरी', '321312', '10', 'Lorem,Ipsum,Amet', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'Small,Midium,Large', 'red,Black,Amet', 'red,Black,Large', '200', '150', 'Love is in the air in February for American Heart Month… and at California Strawberries', 'अमेरिकन हार्ट मंथ के लिए फरवरी में प्यार हवा में है… और कैलिफोर्निया स्ट्रॉबेरी में', '<p>Love is in the air in February for American Heart Month&hellip; and at California StrawberriesLove is in the air in February for American Heart Month&hellip; and at California Strawberries</p>', '<p>अमेरिकन हार्ट मंथ के लिए फरवरी में प्यार हवा में है&hellip; और कैलिफोर्निया स्ट्रॉबेरी में</p>', 'upload/product/thambnail/1735501693918704.jpg', 1, 1, 1, 1, 1, '2022-06-13 01:26:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aXFp72yiSg9UfISyhJg4FxJ8aT98ldWjqsQekCVg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFZraEx2dkFtUldmak0wNkV3VTJWaktIWTJ2WDJ3OU1JTlJYYXFUMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1656532173),
('d7ABr1Uu42mfCbGg0vs6EqBTRUnc1yDYaer91GiJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiend3RWpQRHFFRko4M2pJRk1vb3Q0Nk9YTzkxM0NMS0lMM0RpYU92UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L2RldGFpbHMvNi9zYW1zdW5nLSgyNi1pbmNoKS1sY2QtdHYtKGJsYWNrLC1sYTI2ZDQ1MCkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjg6Imxhbmd1YWdlIjtzOjU6ImhpbmRpIjt9', 1656507710),
('VI9sKHj755omv13kvTdwNadVGqX6ZLRXiQNVK4Ik', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidU10bGZqcUdTRnZweVVoWG1kemFWUEQ5ZmwweWhhN2xMOXFYOEFsSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L2RldGFpbHMvNy9zdHJhd2JlcnJ5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1656490820);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1729718432741531.jpg', 'New Collections', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,', 1, '2022-04-10 05:24:04', '2022-04-24 07:47:27'),
(2, 'upload/slider/1729719792284039.jpg', 'New Collections', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,', 1, '2022-04-10 05:27:34', '2022-04-24 07:47:11'),
(4, 'upload/slider/1730995974363376.jpg', 'New Collections', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,', 0, '2022-04-24 07:50:03', '2022-04-24 07:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_hin`, `subcategory_slug_en`, `subcategory_slug_hin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 7, 'Mans Top Ware', 'मैंस टॉप वेयर', 'mans-top-ware', 'मैंस-टॉप-वेयर', NULL, '2022-03-24 13:52:42', '2022-03-24 13:52:42'),
(9, 7, 'Mans Bottom Ware', 'मैन्स बॉटम वेयर', 'mans-bottom-ware', 'मैन्स-बॉटम-वेयर', NULL, '2022-03-24 13:53:47', '2022-03-24 13:53:47'),
(10, 7, 'Mans Footwear', 'मैन्स फुटवियर', 'mans-footwear', 'मैन्स-फुटवियर', NULL, '2022-03-24 13:54:12', '2022-03-24 13:54:12'),
(11, 7, 'Women Footwear', 'महिलाओं के जूते', 'women-footwear', 'महिलाओं-के-जूते', NULL, '2022-03-24 13:54:37', '2022-03-24 13:54:37'),
(12, 8, 'Computer Peripherals', 'कंप्यूटर पेरिफेरल्स', 'computer-peripherals', 'कंप्यूटर-पेरिफेरल्स', NULL, '2022-03-24 13:55:43', '2022-03-24 13:55:43'),
(13, 8, 'Mobile Accessory', 'मोबाइल एक्सेसरी', 'mobile-accessory', 'मोबाइल-एक्सेसरी', NULL, '2022-03-24 13:56:03', '2022-03-24 13:56:03'),
(16, 9, 'Home Furnishings', 'घर का सामान', 'home-furnishings', 'घर-का-सामान', NULL, '2022-03-24 13:57:52', '2022-03-24 13:57:52'),
(17, 9, 'Living Room`', 'लिविंग रूम', 'living-room`', 'लिविंग-रूम', NULL, '2022-03-24 13:58:13', '2022-03-24 13:58:13'),
(18, 9, 'Home Decor`', 'गृह सज्जा', 'home-decor`', 'गृह-सज्जा', NULL, '2022-03-24 13:58:53', '2022-03-24 13:58:53'),
(19, 10, 'Televisions', 'टेलीविजन', 'televisions', 'टेलीविजन', NULL, '2022-03-24 13:59:14', '2022-03-24 13:59:14'),
(20, 10, 'Washing Machines', 'वाशिंग मशीन', 'washing-machines', 'वाशिंग-मशीन', NULL, '2022-03-24 13:59:50', '2022-03-24 13:59:50'),
(21, 10, 'Refrigerators', 'रेफ्रिजरेटर', 'refrigerators', 'रेफ्रिजरेटर', NULL, '2022-03-24 14:00:11', '2022-03-24 14:00:11'),
(22, 11, 'Beauty and Personal Care', 'सौंदर्य और व्यक्तिगत देखभाल', 'beauty-and-personal-care', 'सौंदर्य-और-व्यक्तिगत-देखभाल', NULL, '2022-03-24 14:00:39', '2022-03-24 14:00:39'),
(23, 11, 'Food and Drinks', 'खाद्य और पेय', 'food-and-drinks', 'खाद्य-और-पेय', NULL, '2022-03-24 14:00:59', '2022-03-24 14:00:59'),
(24, 11, 'Bady Care', 'बैडी केयर', 'bady-care', 'बैडी-केयर', NULL, '2022-03-24 14:01:18', '2022-03-24 14:01:18'),
(25, 8, 'Gaming', 'जुआ', 'gaming', 'जुआ', NULL, '2022-03-26 09:32:04', '2022-03-26 09:32:04'),
(26, 12, 'Cauliflower', 'फूलगोभी', 'cauliflower', 'फूलगोभी', NULL, '2022-06-16 01:35:43', '2022-06-16 01:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `sub_subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_subcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_subcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `sub_subcategory_name_en`, `sub_subcategory_name_hin`, `sub_subcategory_slug_en`, `sub_subcategory_slug_hin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(38, 10, 19, 'Big Screen TVs', 'बिग स्क्रीन टीवी', 'big-screen-tvs', 'बिग-स्क्रीन-टीवी', NULL, '2022-03-26 09:39:20', '2022-03-26 09:39:20'),
(39, 10, 19, 'Smart TVs', 'स्मार्ट टीवी', 'smart-tvs', 'स्मार्ट-टीवी', NULL, '2022-03-26 09:39:43', '2022-03-26 09:39:43'),
(40, 10, 19, 'OLED TVs', 'OLED टीवी', 'oled-tvs', 'OLED-टीवी', NULL, '2022-03-26 09:40:07', '2022-03-26 09:40:07'),
(41, 10, 20, 'Washer Dryers', 'वॉशर ड्रायर्स', 'washer-dryers', 'वॉशर-ड्रायर्स', NULL, '2022-03-26 09:40:34', '2022-03-26 09:40:57'),
(42, 10, 20, 'Washer Only', 'केवल वॉशर', 'washer-only', 'केवल-वॉशर', NULL, '2022-03-26 09:41:59', '2022-03-26 09:41:59'),
(43, 10, 20, 'Energy Efficient', 'ऊर्जा कुशल', 'energy-efficient', 'ऊर्जा-कुशल', NULL, '2022-03-26 09:42:20', '2022-03-26 09:42:20'),
(44, 10, 21, 'Single Door', 'सिंगल डोर', 'single-door', 'सिंगल-डोर', NULL, '2022-03-26 09:42:50', '2022-03-26 09:42:50'),
(45, 10, 21, 'Double Door', 'डबल डोर', 'double-door', 'डबल-डोर', NULL, '2022-03-26 09:43:09', '2022-03-26 09:43:09'),
(46, 10, 21, 'Mini Rerigerators', 'मिनी रेफ्रिजरेटर', 'mini-rerigerators', 'मिनी-रेफ्रिजरेटर', NULL, '2022-03-26 09:43:35', '2022-03-26 09:43:35'),
(47, 11, 24, 'Baby Diapers', 'बेबी डायपर', 'baby-diapers', 'बेबी-डायपर', NULL, '2022-03-26 09:45:30', '2022-03-26 09:45:30'),
(48, 11, 24, 'Baby Wipes', 'बेबी वाइप्स', 'baby-wipes', 'बेबी-वाइप्स', NULL, '2022-03-26 09:45:58', '2022-03-26 09:45:58'),
(49, 11, 24, 'Baby Food', 'बेबी फ़ूड', 'baby-food', 'बेबी-फ़ूड', NULL, '2022-03-26 09:46:22', '2022-03-26 09:46:22'),
(50, 11, 22, 'Eys Makeup', 'आई मेकअप', 'eys-makeup', 'आई-मेकअप', NULL, '2022-03-26 09:47:00', '2022-03-26 09:47:00'),
(51, 11, 22, 'Lip Makeup', 'होंठ मेकअप', 'lip-makeup', 'होंठ-मेकअप', NULL, '2022-03-26 09:47:23', '2022-03-26 09:47:23'),
(52, 11, 22, 'Hair Care', 'बालों की देखभाल', 'hair-care', 'बालों-की-देखभाल', NULL, '2022-03-26 09:47:43', '2022-03-26 09:47:43'),
(53, 11, 23, 'Beverages', 'पेय पदार्थ', 'beverages', 'पेय-पदार्थ', NULL, '2022-03-26 09:48:07', '2022-03-26 09:48:07'),
(54, 11, 23, 'Chocolates', 'चॉकलेट', 'chocolates', 'चॉकलेट', NULL, '2022-03-26 09:48:27', '2022-03-26 09:48:27'),
(55, 11, 23, 'Snacks', 'स्नैक्स', 'snacks', 'स्नैक्स', NULL, '2022-03-26 09:48:49', '2022-03-26 09:48:49'),
(56, 8, 12, 'Printers', 'प्रिंटर', 'printers', 'प्रिंटर', NULL, '2022-03-26 09:51:01', '2022-03-26 09:51:01'),
(57, 8, 12, 'Monitors', 'मॉनिटर्स', 'monitors', 'मॉनिटर्स', NULL, '2022-03-26 09:51:29', '2022-03-26 09:51:29'),
(58, 8, 12, 'Projectors', 'प्रोजेक्टर', 'projectors', 'प्रोजेक्टर', NULL, '2022-03-26 09:51:52', '2022-03-26 09:51:52'),
(59, 8, 13, 'Plain Cases', 'सादा मामले', 'plain-cases', 'सादा-मामले', NULL, '2022-03-26 09:52:21', '2022-03-26 09:52:21'),
(60, 8, 13, 'Designer Cases', 'डिजाइनर मामले', 'designer-cases', 'डिजाइनर-मामले', NULL, '2022-03-26 09:52:39', '2022-03-26 09:52:39'),
(61, 8, 13, 'Screen Guards', 'स्क्रीन गार्ड', 'screen-guards', 'स्क्रीन-गार्ड', NULL, '2022-03-26 09:53:01', '2022-03-26 09:53:01'),
(62, 8, 25, 'Gaming Mouse', 'गेमिंग माउस', 'gaming-mouse', 'गेमिंग-माउस', NULL, '2022-03-26 09:53:58', '2022-03-26 09:53:58'),
(63, 8, 25, 'Gaming Keyboars', 'गेमिंग कीबोर्ड', 'gaming-keyboars', 'गेमिंग-कीबोर्ड', NULL, '2022-03-26 09:54:19', '2022-03-26 09:54:19'),
(64, 8, 25, 'Gaming Mousepads', 'गेमिंग माउसपैड', 'gaming-mousepads', 'गेमिंग-माउसपैड', NULL, '2022-03-26 09:54:42', '2022-03-26 09:54:42'),
(65, 9, 16, 'Bed Liners', 'बेड लाइनर्स', 'bed-liners', 'बेड-लाइनर्स', NULL, '2022-03-26 09:57:43', '2022-03-26 09:57:43'),
(66, 9, 16, 'Bedsheets', 'बेडशीट', 'bedsheets', 'बेडशीट', NULL, '2022-03-26 09:58:08', '2022-03-26 09:58:08'),
(67, 9, 16, 'Blankets', 'कंबल', 'blankets', 'कंबल', NULL, '2022-03-26 09:58:31', '2022-03-26 09:58:31'),
(68, 9, 17, 'Tv Units', 'टीवी इकाइयां', 'tv-units', 'टीवी-इकाइयां', NULL, '2022-03-26 09:58:55', '2022-03-26 09:58:55'),
(69, 9, 17, 'Dining Sets', 'डाइनिंग सेट', 'dining-sets', 'डाइनिंग-सेट', NULL, '2022-03-26 09:59:12', '2022-03-26 09:59:12'),
(70, 9, 17, 'Coffee Tables', 'कॉफी टेबल', 'coffee-tables', 'कॉफी-टेबल', NULL, '2022-03-26 09:59:33', '2022-03-26 09:59:33'),
(71, 9, 18, 'Lightings', 'लाइटिंग्स', 'lightings', 'लाइटिंग्स', NULL, '2022-03-26 09:59:56', '2022-03-26 09:59:56'),
(72, 9, 18, 'Clocks', 'घड़ियां', 'clocks', 'घड़ियां', NULL, '2022-03-26 10:00:18', '2022-03-26 10:00:18'),
(73, 9, 18, 'Wall Decor', 'दीवार की सजावट', 'wall-decor', 'दीवार-की-सजावट', NULL, '2022-03-26 10:00:41', '2022-03-26 10:00:41'),
(74, 7, 9, 'Mans Jeans', 'मैंस जीन्स', 'mans-jeans', 'मैंस-जीन्स', NULL, '2022-03-26 10:02:56', '2022-03-26 10:02:56'),
(75, 7, 9, 'Mans Trousers', 'मैन्स ट्राउजर', 'mans-trousers', 'मैन्स-ट्राउजर', NULL, '2022-03-26 10:03:17', '2022-03-26 10:03:17'),
(76, 7, 9, 'Mans Cargos', 'मैंस Cargos', 'mans-cargos', 'मैंस-Cargos', NULL, '2022-03-26 10:03:37', '2022-03-26 10:03:37'),
(77, 7, 10, 'Mans Sports Shoes', 'मैन्स स्पोर्ट्स शूज़', 'mans-sports-shoes', 'मैन्स-स्पोर्ट्स-शूज़', NULL, '2022-03-26 10:04:01', '2022-03-26 10:04:01'),
(78, 7, 10, 'Mans Casual Shoes', 'मैंस कैजुअल शूज़', 'mans-casual-shoes', 'मैंस-कैजुअल-शूज़', NULL, '2022-03-26 10:04:31', '2022-03-26 10:04:31'),
(79, 7, 10, 'Mans Formal Shoes', 'मैंस औपचारिक जूते', 'mans-formal-shoes', 'मैंस-औपचारिक-जूते', NULL, '2022-03-26 10:04:50', '2022-03-26 10:04:50'),
(80, 7, 8, 'Mans Tshirt', 'मैंस टीशर्ट', 'mans-tshirt', 'मैंस-टीशर्ट', NULL, '2022-03-26 10:05:18', '2022-03-26 10:05:18'),
(81, 7, 8, 'Mans Casual Shirts', 'मैंस कैजुअल शर्ट्स', 'mans-casual-shirts', 'मैंस-कैजुअल-शर्ट्स', NULL, '2022-03-26 10:05:40', '2022-03-26 10:05:40'),
(82, 7, 8, 'Mans Kurtas', 'मन्स कुर्ता', 'mans-kurtas', 'मन्स-कुर्ता', NULL, '2022-03-26 10:05:59', '2022-03-26 10:05:59'),
(83, 7, 11, 'Women Flats', 'महिला फ्लैट', 'women-flats', 'महिला-फ्लैट', NULL, '2022-03-26 10:06:32', '2022-03-26 10:06:32'),
(84, 7, 11, 'Women Heels', 'महिला ऊँची एड़ी के जूते', 'women-heels', 'महिला-ऊँची-एड़ी-के-जूते', NULL, '2022-03-26 10:06:51', '2022-03-26 10:06:51'),
(85, 7, 9, 'Woman Sheakers', 'महिला शेकर्स', 'woman-sheakers', 'महिला-शेकर्स', NULL, '2022-03-26 10:07:10', '2022-03-26 10:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Preet', 'preetkhalsa@gmail.com', '9878000225', NULL, '$2y$10$mAzXLhbbZ.1.4YlZJqrd5.e8mTPmxVe945meCZvxfNPDGLCUmzNHa', NULL, NULL, 'Q4Vf8vGftBQNgVbNHDW5QSewNBZxpmeFACxI4xpVLlpqqAZtCgSlOzqS1tvH', NULL, '2022_0309_0905.png', '2022-03-07 04:41:02', '2022-03-10 13:27:42'),
(2, 'diya', 'diya@gmail.com', '9878000229', NULL, '$2y$10$iQpUYMhSPu/B6XvmVciY0uEdHNf8yWUWHkcptNhjS.v5PCVAGrnmm', NULL, NULL, NULL, NULL, NULL, '2022-03-08 07:51:51', '2022-03-08 07:51:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
