-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 11:36 AM
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
-- Database: `cin_db`
--
-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_of_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_of_id`) VALUES
(1, 'تهران', 1),
(2, 'ورامین', 1),
(3, 'رشت', 2),
(4, 'فومن', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `day_created` varchar(255) NOT NULL,
  `time_created` varchar(255) NOT NULL,
  `date_updated` varchar(255) DEFAULT NULL,
  `day_updated` varchar(255) DEFAULT NULL,
  `time_updated` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `running_time` varchar(50) NOT NULL,
  `director_name` varchar(50) NOT NULL,
  `ex_producer` varchar(50) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(50) NOT NULL,
  `more_about` longtext NOT NULL,
  `country` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `price_of_film` varchar(50) NOT NULL,
  `film_iframe` longtext NOT NULL,
  `image_name` text NOT NULL,
  `salon` varchar(255) NOT NULL,
  `film_of_ids` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `day_created` varchar(255) NOT NULL,
  `time_created` varchar(255) NOT NULL,
  `date_updated` varchar(255) DEFAULT NULL,
  `day_updated` varchar(255) DEFAULT NULL,
  `time_updated` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `film_name`, `running_time`, `director_name`, `ex_producer`, `day`, `time`, `more_about`, `country`, `language`, `price_of_film`, `film_iframe`, `image_name`, `salon`, `film_of_ids`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(3, 'فسیل', '۱:۵۰', 'کریم امینی', 'سید ابراهیم عامریان', 'سه شنبه', '7:45', 'https://fa.wikipedia.org/wiki/%D9%81%D8%B3%DB%8C%D9%84_(%D9%81%DB%8C%D9%84%D9%85_%DB%B1%DB%B3%DB%B9%DB%B9)', 'ایران', 'فارسی', '۲۵۰۰۰۰', 'https://www.aparat.com/video/video/embed/videohash/2Xm7L/vt/frame', 'Fossil_Poster.jpg', '{\"4\":\"14\",\"5\":\"14\"}', '{\"4\":\"4\",\"5\":\"5\"}', '۰۲/۰۵/۰۱', 'یکشنبه', '۱۲:۴۷:۴۴', '۰۲/۰۵/۰۱', 'یکشنبه', '۱۲:۵۴:۰۰', '2023-07-22 20:17:44', '2023-07-22 20:24:00'),
(4, 'نگهبان شب', '...', 'رضا میرکریمی', 'رضا میرکریمی', '{\"4\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\"}', '{\"4\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%86%DA%AF%D9%87%D8%A8%D8%A7%D9%86_%D8%B4%D8%A8_(%D9%81%DB%8C%D9%84%D9%85_%DB%B1%DB%B4%DB%B0%DB%B0)', 'ایران', 'فارسی', '۲۵۰۰۰۰', 'https://www.aparat.com/video/video/embed/videohash/xyMQi/vt/frame', 'Negahban-shab-poster.jpg', '{\"4\":\"13\"}', '{\"4\":\"4\"}', '۰۲/۰۵/۰۱', 'یکشنبه', '۱:۱۳:۲۳', NULL, NULL, NULL, '2023-07-22 20:43:23', '2023-07-22 20:43:23'),
(5, 'سه کام حبس', '۱:۳۵', 'سامان سالور', 'سامان سالور', '{\"4\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\"}', '{\"4\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D8%B3%D9%87_%DA%A9%D8%A7%D9%85_%D8%AD%D8%A8%D8%B3', 'ایران', 'فارسی', '۲۰۰۰۰', 'https://www.aparat.com/video/video/embed/videohash/xP1EA/vt/frame', 'Seh_Kam_Habs_Poster.jpg', '{\"4\":\"104\"}', '{\"4\":\"4\"}', '۰۲/۰۵/۰۱', 'یکشنبه', '۱:۱۸:۱۹', NULL, NULL, NULL, '2023-07-22 20:48:19', '2023-07-22 20:48:19'),
(6, 'فصل ماهی سفید', '۱:۳۳', 'قربان نجفی', 'آرش سجادی حسینی', '{\"5\":\"\\u0633\\u0647 \\u0634\\u0646\\u0628\\u0647\"}', '{\"5\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%81%D8%B5%D9%84_%D9%85%D8%A7%D9%87%DB%8C_%D8%B3%D9%81%DB%8C%D8%AF', 'ایران', 'فارسی', '۲۵۰۰۰۰', 'https://www.aparat.com/video/video/embed/videohash/WGAv9/vt/frame', 'download (1).jpg', '{\"5\":\"121\"}', '{\"5\":\"5\"}', '۰۲/۰۵/۰۱', 'یکشنبه', '۱:۲۳:۳۶', NULL, NULL, NULL, '2023-07-22 20:53:36', '2023-07-22 20:53:36'),
(8, 'شهرک (فیلم)', '...', 'علی حضرتی', 'علی سرتیپی', '{\"5\":\"\\u067e\\u0646\\u062c\\u0634\\u0646\\u0628\\u0647\"}', '{\"5\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D8%B4%D9%87%D8%B1%DA%A9_(%D9%81%DB%8C%D9%84%D9%85)', 'ایران', 'فارسی', '۲۵۰۰۰۰', 'https://www.aparat.com/video/video/embed/videohash/8D9Or/vt/frame', 'Shahrak_poster.jpg', '{\"5\":\"122\"}', '{\"5\":\"5\"}', '۰۲/۰۵/۰۲', 'دوشنبه', '۱:۰۷:۲۹', NULL, NULL, NULL, '2023-07-23 20:37:29', '2023-07-23 20:37:29'),
(9, 'یقه سفیدها', '...', 'شهرام مسلخی', 'شهرام مسلخی', 'سه شنبه', '7:45', 'https://fa.wikipedia.org/wiki/%DB%8C%D9%82%D9%87_%D8%B3%D9%81%DB%8C%D8%AF%D9%87%D8%A7', 'ایران', 'فارسی', '۴۰۰۰۰۰', 'https://www.aparat.com/video/video/embed/videohash/rvZfV/vt/frame', 'img_12.jpg', '{\"4\":\"13\",\"5\":\"14\"}', '{\"4\":\"4\",\"5\":\"5\"}', '۰۲/۰۵/۰۲', 'دوشنبه', '۱:۲۲:۰۸', '۰۲/۰۵/۰۲', 'دوشنبه', '۱:۲۴:۲۵', '2023-07-23 20:52:08', '2023-07-23 20:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `film_place`
--

CREATE TABLE `film_place` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `place_id` bigint(20) UNSIGNED NOT NULL,
  `salon` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(203, '2014_10_12_100000_create_password_resets_table', 1),
(204, '2019_08_19_000000_create_failed_jobs_table', 1),
(205, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(206, '2023_07_05_171955_create_users_table', 1),
(207, '2023_07_21_114831_create_provinces_table', 1),
(208, '2023_07_21_115003_create_cities_table', 2),
(209, '2023_07_21_120454_create_places_table', 2),
(210, '2023_07_21_120720_create_films_table', 2),
(211, '2023_07_21_121010_create_film_place_table', 2),
(212, '2023_07_21_125909_create_news_table', 2),
(213, '2023_07_21_130005_create_orders_table', 2),
(214, '2023_07_21_130921_create_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_images` varchar(50) NOT NULL,
  `news` mediumtext NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `day_created` varchar(255) NOT NULL,
  `time_created` varchar(255) NOT NULL,
  `date_updated` varchar(255) DEFAULT NULL,
  `day_updated` varchar(255) DEFAULT NULL,
  `time_updated` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_images`, `news`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(1, 'Seh_Kam_Habs_Poster.jpg', 'با سلام این نوشته فقط برای تست است.', '۰۲/۰۴/۳۰', 'جمعه', '۹:۳۲:۴۳', '۰۲/۰۵/۰۲', 'دوشنبه', '۲:۴۰:۱۱', '2023-07-21 17:02:43', '2023-07-23 22:10:11'),
(2, 'Shahrak_poster.jpg', 'با سلام این نوشته فقط برای تست 2 می باشد.', '۰۲/۰۵/۰۲', 'دوشنبه', '۳:۱۹:۳۷', NULL, NULL, NULL, '2023-07-23 22:49:37', '2023-07-23 22:49:37'),
(3, 'download (1).jpg', 'با سلام این نوشته فقط برای تست 3 می باشد.', '۰۲/۰۵/۰۲', 'دوشنبه', '۳:۲۰:۳۶', NULL, NULL, NULL, '2023-07-23 22:50:36', '2023-07-23 22:50:36'),
(4, 'Fossil_Poster.jpg', 'با سلام این نوشته فقط برای تست 4 می باشد.', '۰۲/۰۵/۰۲', 'دوشنبه', '۳:۲۱:۴۴', NULL, NULL, NULL, '2023-07-23 22:51:44', '2023-07-23 22:51:44'),
(5, 'Negahban-shab-poster.jpg', 'با سلام این نوشته فقط برای تست 5 می باشد.', '۰۲/۰۵/۰۲', 'دوشنبه', '۳:۲۲:۵۵', NULL, NULL, NULL, '2023-07-23 22:52:55', '2023-07-23 22:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `who_ordered_id` bigint(20) UNSIGNED NOT NULL,
  `who_ordered_name` varchar(50) NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `time_of_film` varchar(8) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `day_created` varchar(255) NOT NULL,
  `time_created` varchar(255) NOT NULL,
  `date_updated` varchar(255) DEFAULT NULL,
  `day_updated` varchar(255) DEFAULT NULL,
  `time_updated` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `address` mediumtext NOT NULL,
  `google_map_iframe` longtext DEFAULT NULL,
  `capacity` varchar(50) NOT NULL,
  `place_image_name` varchar(50) NOT NULL,
  `city_of_id` bigint(20) UNSIGNED NOT NULL,
  `place_of_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `day_created` varchar(255) NOT NULL,
  `time_created` varchar(255) NOT NULL,
  `date_updated` varchar(255) DEFAULT NULL,
  `day_updated` varchar(255) DEFAULT NULL,
  `time_updated` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `place_name`, `address`, `google_map_iframe`, `capacity`, `place_image_name`, `city_of_id`, `place_of_id`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(4, 'place_1', 'تست، تست، تست', NULL, '23', 'download.jpg', 2, 3, '۰۲/۰۵/۰۱', 'یکشنبه', '۱۲:۱۲:۴۹', NULL, NULL, NULL, '2023-07-22 19:42:49', '2023-07-22 19:42:49'),
(5, 'Place_2', 'تست، تست، تست', NULL, '12', 'download3.jpg', 1, 2, '۰۲/۰۵/۰۱', 'یکشنبه', '۱۲:۱۳:۳۸', NULL, NULL, NULL, '2023-07-22 19:43:38', '2023-07-22 19:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`) VALUES
(1, 'تهران'),
(2, 'گیلان');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `date_registered` varchar(255) NOT NULL,
  `day_registered` varchar(255) NOT NULL,
  `time_registered` varchar(255) NOT NULL,
  `date_loged_in` varchar(255) DEFAULT NULL,
  `day_loged_in` varchar(255) DEFAULT NULL,
  `time_loged_in` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `date_registered`, `day_registered`, `time_registered`, `date_loged_in`, `day_loged_in`, `time_loged_in`, `created_at`, `updated_at`) VALUES
(2, 'بهرنگ', 'behrang.abad20@gmail.com', '$2y$10$RaQWlL3lJxsmD1io0smCXuoAHi2o2sZrP1PjZaNVH77ynWNBfR5.S', NULL, '۰۲/۰۵/۰۲', 'دوشنبه', '۲:۳۸:۲۱', NULL, NULL, NULL, '2023-07-23 22:08:21', '2023-07-23 22:08:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_city_of_id_index` (`city_of_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_film_id_index` (`film_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film_place`
--
ALTER TABLE `film_place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_place_film_id_index` (`film_id`),
  ADD KEY `film_place_place_id_index` (`place_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_who_ordered_id_index` (`who_ordered_id`),
  ADD KEY `orders_film_id_index` (`film_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_city_of_id_index` (`city_of_id`),
  ADD KEY `places_place_of_id_index` (`place_of_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `film_place`
--
ALTER TABLE `film_place`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_city_of_id_foreign` FOREIGN KEY (`city_of_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film_place`
--
ALTER TABLE `film_place`
  ADD CONSTRAINT `film_place_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_place_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_who_ordered_id_foreign` FOREIGN KEY (`who_ordered_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_city_of_id_foreign` FOREIGN KEY (`city_of_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `places_place_of_id_foreign` FOREIGN KEY (`place_of_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
