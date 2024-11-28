-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 06:17 PM
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
-- Database: `lar_proj_1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinemas`
--

CREATE TABLE `cinemas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cinema_name` varchar(50) NOT NULL,
  `address` mediumtext NOT NULL,
  `google_map_iframe` longtext DEFAULT NULL,
  `capacity` varchar(50) NOT NULL,
  `cinema_image_name` varchar(50) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
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
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`id`, `cinema_name`, `address`, `google_map_iframe`, `capacity`, `cinema_image_name`, `province_id`, `city_id`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(7, 'Cinema_1', 'آدرس، آدرس، آدرس', NULL, '۱۲', '7758faa9-196f-4491-980a-258d72a32b25_desktop.jpeg', 2, 3, '۰۳/۰۹/۰۷', 'چهارشنبه', '۷:۰۱:۴۰', NULL, NULL, NULL, '2024-11-27 15:31:40', '2024-11-27 15:31:40'),
(8, 'Cinema_2', 'آدرس، آدرس، آدرس', NULL, '۱۲', 'download.jpg', 2, 4, '۰۳/۰۹/۰۷', 'چهارشنبه', '۷:۰۳:۴۱', '۰۳/۰۹/۰۷', 'چهارشنبه', '۷:۱۰:۵۷', '2024-11-27 15:33:41', '2024-11-27 15:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `province_id`) VALUES
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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_name`, `body`, `film_id`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(28, 'بهرنگ', 'متن شمارۀ1: این یک متن آزمایشی می باشد.', 36, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۲:۳۹', NULL, NULL, NULL, '2024-11-28 02:12:39', '2024-11-28 02:12:39'),
(29, 'بهرنگ', 'متن شمارۀ2: این یک متن آزمایشی می باشد.', 37, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۲:۴۹', NULL, NULL, NULL, '2024-11-28 02:12:49', '2024-11-28 02:12:49'),
(30, 'بهرنگ', 'متن شمارۀ3: این یک متن آزمایشی می باشد.', 38, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۳:۰۰', NULL, NULL, NULL, '2024-11-28 02:13:00', '2024-11-28 02:13:00'),
(31, 'بهرنگ', 'متن شمارۀ4: این یک متن آزمایشی می باشد.', 39, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۳:۱۱', NULL, NULL, NULL, '2024-11-28 02:13:11', '2024-11-28 02:13:11'),
(32, 'بهرنگ', 'متن شمارۀ5: این یک متن آزمایشی می باشد.', 31, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۳:۲۵', NULL, NULL, NULL, '2024-11-28 02:13:25', '2024-11-28 02:13:25'),
(33, 'بهرنگ', 'متن شمارۀ6: این یک متن آزمایشی می باشد.', 33, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۳:۳۷', NULL, NULL, NULL, '2024-11-28 02:13:37', '2024-11-28 02:13:37'),
(34, 'بهرنگ', 'متن شمارۀ7: این یک متن آزمایشی می باشد.', 34, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۳:۴۷', NULL, NULL, NULL, '2024-11-28 02:13:47', '2024-11-28 02:13:47'),
(35, 'بهرنگ', 'متن شمارۀ8: این یک متن آزمایشی می باشد.', 35, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۴۴:۰۶', NULL, NULL, NULL, '2024-11-28 02:14:06', '2024-11-28 02:14:06');

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
  `time` varchar(50) DEFAULT NULL,
  `more_about` longtext NOT NULL,
  `country` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `film_teaser_name` text DEFAULT NULL,
  `film_poster_name` text NOT NULL,
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

INSERT INTO `films` (`id`, `film_name`, `running_time`, `director_name`, `ex_producer`, `day`, `time`, `more_about`, `country`, `language`, `film_teaser_name`, `film_poster_name`, `salon`, `film_of_ids`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(31, 'سرخ پوست', '۱:۴۰', 'نیما جاویدی', 'مجید مطلبی', '{\"7\":\"\\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D8%B3%D8%B1%D8%AE%E2%80%8C%D9%BE%D9%88%D8%B3%D8%AA_(%D9%81%DB%8C%D9%84%D9%85)#:~:text=%D8%B3%D8%B1%D8%AE%E2%80%8C%D9%BE%D9%88%D8%B3%D8%AA%20%D9%81%DB%8C%D9%84%D9%85%DB%8C%20%D8%AF%D8%B1%20%DA%98%D8%A7%D9%86%D8%B1%20%D8%AF%D8%B1%D8%A7%D9%85,%D8%AF%D8%A7%D9%88%D8%B1%D8%A7%D9%86%20%D8%B1%D8%A7%20%D8%A8%D9%87%20%D8%AF%D8%B3%D8%AA%20%D8%A2%D9%88%D8%B1%D8%AF.', 'ایران', 'فارسی', 'تیزر فیلم سرخ پوست با کیفیت عالی-360p.mp4', '1032878_737.jpg', '{\"7\":\"1\",\"8\":\"2\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۵', 'دوشنبه', '۳:۴۴:۱۹', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۰:۵۹', '2024-11-25 12:14:19', '2024-11-27 23:20:59'),
(33, 'مردی بدون سایه', '۱:۳۰', 'علیرضا رئیسیان', 'علیرضا رئیسیان', '{\"7\":\"\\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%85%D8%B1%D8%AF%DB%8C_%D8%A8%D8%AF%D9%88%D9%86_%D8%B3%D8%A7%DB%8C%D9%87#:~:text=%D9%85%D8%B1%D8%AF%DB%8C%20%D8%A8%D8%AF%D9%88%D9%86%20%D8%B3%D8%A7%DB%8C%D9%87%20%D9%81%DB%8C%D9%84%D9%85%DB%8C%20%D8%A8%D9%87,%D8%B3%D8%A7%D9%84%DA%AF%DB%8C%20%D9%88%20%D8%AF%D9%88%D8%B1%D8%A7%D9%86%20%D8%B9%D8%A7%D8%B4%D9%82%DB%8C%20%D8%A7%D8%B3%D8%AA.', 'ایران', 'فارسی', 'تیزر فیلم مردی بدون سایه.mp4', 'Mardi-Bedoone-Sayeh.jpg', '{\"7\":\"3\",\"8\":\"4\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۶', 'سه شنبه', '۱۲:۰۴:۰۷', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۱:۵۶', '2024-11-25 20:34:07', '2024-11-27 23:21:56'),
(34, 'مغز‌های کوچک زنگ‌زده', '۱:۴۲', 'غلام سیدی', 'سعید سعدی', '{\"7\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%85%D8%BA%D8%B2%D9%87%D8%A7%DB%8C_%DA%A9%D9%88%DA%86%DA%A9_%D8%B2%D9%86%DA%AF%E2%80%8C%D8%B2%D8%AF%D9%87#:~:text=%D9%85%D8%BA%D8%B2%D9%87%D8%A7%DB%8C%20%DA%A9%D9%88%DA%86%DA%A9%20%D8%B2%D9%86%DA%AF%E2%80%8C%D8%B2%D8%AF%D9%87%20%D9%81%DB%8C%D9%84%D9%85%DB%8C%20%D8%A8%D9%87,%D8%A7%DB%8C%D9%86%20%D9%81%DB%8C%D9%84%D9%85%20%D8%B1%D8%A7%20%D8%A8%D8%B1%D8%B9%D9%87%D8%AF%D9%87%20%D8%AF%D8%A7%D8%B1%D9%86%D8%AF.', 'ایران', 'فارسی', 'تیزر مغزهای کوچک زنگ زده-240p.mp4', 'Maghzhaye.jpg', '{\"7\":\"1\",\"8\":\"2\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۶', 'سه شنبه', '۱۲:۱۲:۱۱', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۲:۳۰', '2024-11-25 20:42:11', '2024-11-27 23:22:30'),
(35, 'شهرک', '...', 'علی حضرتی', 'علی سرتیپی', '{\"7\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D8%B4%D9%87%D8%B1%DA%A9_(%D9%81%DB%8C%D9%84%D9%85)', 'ایران', 'فارسی', 'فیلم شهرک.mp4', '93098_photo_2023-06-28_13-41-55.4ac18b.jpg', '{\"7\":\"3\",\"8\":\"4\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۶', 'سه شنبه', '۱۲:۲۰:۵۰', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۳:۰۴', '2024-11-25 20:50:50', '2024-11-27 23:23:04'),
(36, 'نگهبان شب', '...', 'رضا میرکریمی', 'رضا میرکریمی', '{\"7\":\"\\u062f\\u0648\\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u062f\\u0648\\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%86%DA%AF%D9%87%D8%A8%D8%A7%D9%86_%D8%B4%D8%A8_(%D9%81%DB%8C%D9%84%D9%85_%DB%B1%DB%B4%DB%B0%DB%B0)', 'ایران', 'فارسی', '6b823abdaabe505f79c92e97c38536f752680247-240p.mp4', 'Negahbane-Shab-Poster.jpg', '{\"7\":\"1\",\"8\":\"2\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۶', 'سه شنبه', '۱۲:۴۵:۵۱', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۳:۳۷', '2024-11-25 21:15:51', '2024-11-27 23:23:37'),
(37, 'روز‌های نارنجی', '...', 'آرش لاهوتی', 'علیرضا قاسم‌خان', '{\"7\":\"\\u062f\\u0648\\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u062f\\u0648\\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D8%B1%D9%88%D8%B2%D9%87%D8%A7%DB%8C_%D9%86%D8%A7%D8%B1%D9%86%D8%AC%DB%8C#:~:text=%D8%B1%D9%88%D8%B2%D9%87%D8%A7%DB%8C%20%D9%86%D8%A7%D8%B1%D9%86%D8%AC%DB%8C%20%D9%81%DB%8C%D9%84%D9%85%DB%8C%20%D8%A8%D9%87%20%DA%A9%D8%A7%D8%B1%DA%AF%D8%B1%D8%AF%D8%A7%D9%86%DB%8C,%D8%AC%D8%B4%D9%86%D9%88%D8%A7%D8%B1%D9%87%20%D9%81%DB%8C%D9%84%D9%85%20%D9%81%D8%AC%D8%B1%20%D9%86%DB%8C%D8%B2%20%D8%B4%D8%AF%D9%87%E2%80%8C%D8%A7%D8%B3%D8%AA.', 'ایران', 'فارسی', 'تیزر فیلم روزهای نارنجی-240p.mp4', '220px-Roozhaye-narenji-poster.jpg', '{\"7\":\"3\",\"8\":\"4\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۶', 'سه شنبه', '۱۲:۵۳:۵۳', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۴:۱۹', '2024-11-25 21:23:53', '2024-11-27 23:24:19'),
(38, 'متری شیش و نیم', '۲:۱۱', 'سعید روستایی', 'سید جمال ساداتیان', '{\"7\":\"\\u0633\\u0647 \\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u0633\\u0647 \\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%85%D8%AA%D8%B1%DB%8C_%D8%B4%DB%8C%D8%B4_%D9%88_%D9%86%DB%8C%D9%85#:~:text=%D9%85%D8%AA%D8%B1%DB%8C%20%D8%B4%DB%8C%D8%B4%20%D9%88%20%D9%86%DB%8C%D9%85%20%D9%81%DB%8C%D9%84%D9%85%DB%8C,%D8%A7%D8%B5%D9%84%D8%A7%D9%86%DB%8C%20%D9%88%20%D9%BE%D8%B1%DB%8C%D9%86%D8%A7%D8%B2%20%D8%A7%DB%8C%D8%B2%D8%AF%DB%8C%D8%A7%D8%B1%20%D9%87%D8%B3%D8%AA%D9%86%D8%AF.', 'ایران', 'فارسی', 'metri_shish_o_nim_teaser.mp4', '5188326.jpg', '{\"7\":\"1\",\"8\":\"2\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۶', 'سه شنبه', '۱۲:۵۸:۵۴', '۰۳/۰۹/۰۸', 'پنجشنبه', '۶:۰۱:۰۳', '2024-11-25 21:28:54', '2024-11-28 02:31:03'),
(39, 'قصر شیرین', '...', 'رضا میرکریمی', 'رضا میرکریمی', '{\"7\":\"\\u0633\\u0647 \\u0634\\u0646\\u0628\\u0647\",\"8\":\"\\u0633\\u0647 \\u0634\\u0646\\u0628\\u0647\"}', '{\"7\":\"7:45\",\"8\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%82%D8%B5%D8%B1_%D8%B4%DB%8C%D8%B1%DB%8C%D9%86_(%D9%81%DB%8C%D9%84%D9%85)#:~:text=%D9%82%D8%B5%D8%B1%20%D8%B4%DB%8C%D8%B1%DB%8C%D9%86%20%D9%81%DB%8C%D9%84%D9%85%DB%8C%20%D8%A8%D9%87%20%DA%A9%D8%A7%D8%B1%DA%AF%D8%B1%D8%AF%D8%A7%D9%86%DB%8C,%D9%88%20%D8%A8%D9%87%D8%AA%D8%B1%DB%8C%D9%86%20%D9%85%D9%88%D8%B3%DB%8C%D9%82%DB%8C%20%D9%85%D8%AA%D9%86%20%D8%B4%D8%AF.', 'ایران', 'فارسی', 'تیزر فیلم قصر شیرین با بازی حامد بهداد-360p.mp4', '2192496_518.jpg', '{\"7\":\"3\",\"8\":\"4\"}', '{\"7\":\"7\",\"8\":\"8\"}', '۰۳/۰۹/۰۶', 'سه شنبه', '۱:۰۱:۲۹', '۰۳/۰۹/۰۸', 'پنجشنبه', '۴:۱۷:۳۰', '2024-11-25 21:31:29', '2024-11-28 00:47:30');

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
  `news_image_name` varchar(50) NOT NULL,
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

INSERT INTO `news` (`id`, `news_image_name`, `news`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(34, '1032878_737.jpg', 'متن شماره ۱: این یک متن آزمایشی است.', '۰۳/۰۹/۰۵', 'دوشنبه', '۵:۴۰:۵۹', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۹:۲۹', '2024-11-25 14:10:59', '2024-11-27 23:29:29'),
(36, 'Mardi-Bedoone-Sayeh.jpg', 'متن شماره ۲: این یک متن آزمایشی است.', '۰۳/۰۹/۰۷', 'چهارشنبه', '۱:۲۶:۳۹', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۹:۱۴', '2024-11-26 21:56:39', '2024-11-27 23:29:14'),
(37, 'Maghzhaye.jpg', 'متن شماره ۳: این یک متن آزمایشی است.', '۰۳/۰۹/۰۷', 'چهارشنبه', '۱:۲۶:۵۷', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۸:۵۷', '2024-11-26 21:56:57', '2024-11-27 23:28:57'),
(38, '93098_photo_2023-06-28_13-41-55.4ac18b.jpg', 'متن شماره ۴: این یک متن آزمایشی است.', '۰۳/۰۹/۰۷', 'چهارشنبه', '۱:۲۷:۱۳', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۸:۴۱', '2024-11-26 21:57:13', '2024-11-27 23:28:41'),
(39, 'Negahbane-Shab-Poster.jpg', 'متن شماره ۵: این یک متن آزمایشی است.', '۰۳/۰۹/۰۷', 'چهارشنبه', '۱:۲۷:۳۰', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۸:۲۲', '2024-11-26 21:57:30', '2024-11-27 23:28:22'),
(40, '220px-Roozhaye-narenji-poster.jpg', 'متن شماره ۶: این یک متن آزمایشی است.', '۰۳/۰۹/۰۷', 'چهارشنبه', '۱:۲۷:۵۱', '۰۳/۰۹/۰۸', 'پنجشنبه', '۲:۵۸:۰۲', '2024-11-26 21:57:51', '2024-11-27 23:28:02'),
(41, '5188326.jpg', 'متن شماره ۷: این یک متن آزمایشی است.', '۰۳/۰۹/۰۸', 'پنجشنبه', '۴:۰۱:۴۷', NULL, NULL, NULL, '2024-11-28 00:31:47', '2024-11-28 00:31:47'),
(42, '2192496_518.jpg', 'متن شماره ۸: این یک متن آزمایشی است.', '۰۳/۰۹/۰۸', 'پنجشنبه', '۴:۰۲:۳۱', NULL, NULL, NULL, '2024-11-28 00:32:31', '2024-11-28 00:32:31');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `who_ordered_id`, `who_ordered_name`, `film_id`, `order_name`, `time_of_film`, `date_created`, `day_created`, `time_created`, `date_updated`, `day_updated`, `time_updated`, `created_at`, `updated_at`) VALUES
(28, 14, 'بهرنگ', 37, 'روز‌های نارنجی', '...', '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۳۴:۲۴', NULL, NULL, NULL, '2024-11-28 02:04:24', '2024-11-28 02:04:24'),
(29, 14, 'بهرنگ', 39, 'قصر شیرین', '...', '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۳۴:۳۴', NULL, NULL, NULL, '2024-11-28 02:04:34', '2024-11-28 02:04:34'),
(30, 14, 'بهرنگ', 34, 'مغز‌های کوچک زنگ‌زده', '۱:۴۲', '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۳۴:۴۳', NULL, NULL, NULL, '2024-11-28 02:04:43', '2024-11-28 02:04:43'),
(31, 14, 'بهرنگ', 33, 'مردی بدون سایه', '۱:۳۰', '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۳۴:۵۳', NULL, NULL, NULL, '2024-11-28 02:04:53', '2024-11-28 02:04:53'),
(32, 14, 'بهرنگ', 31, 'سرخ پوست', '۱:۴۰', '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۳۵:۰۰', NULL, NULL, NULL, '2024-11-28 02:05:00', '2024-11-28 02:05:00'),
(34, 14, 'بهرنگ', 36, 'نگهبان شب', '...', '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۳۸:۵۰', NULL, NULL, NULL, '2024-11-28 02:08:50', '2024-11-28 02:08:50'),
(35, 14, 'بهرنگ', 38, 'متری شیش و نیم', '۲:۱۱', '۰۳/۰۹/۰۸', 'پنجشنبه', '۶:۰۱:۵۶', NULL, NULL, NULL, '2024-11-28 02:31:56', '2024-11-28 02:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('phl.cvt@gmail.com', '$2y$10$OZVmYaXMt9xL2TFaf3NauuG/UiK4/NpNkoJIW0bp1GiVckitv1BuC', '2024-11-27 19:36:46');

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
  `date_entered` varchar(255) DEFAULT NULL,
  `day_entered` varchar(255) DEFAULT NULL,
  `time_entered` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `date_registered`, `day_registered`, `time_registered`, `date_entered`, `day_entered`, `time_entered`, `created_at`, `updated_at`) VALUES
(14, 'بهرنگ', 'phl.cvt@gmail.com', '$2y$10$HftJsRQmKY0rV8Xt26Xj4OLpwXOXMFVb2jjgB.qa1GJoh0TLmVFH6', NULL, '۰۳/۰۹/۰۸', 'پنجشنبه', '۵:۳۴:۱۰', '۰۳/۰۹/۰۸', 'پنجشنبه', '۱:۲۵:۵۸', '2024-11-28 02:04:10', '2024-11-28 07:37:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_city_of_id_index` (`province_id`),
  ADD KEY `places_place_of_id_index` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_city_of_id_index` (`province_id`);

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
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD CONSTRAINT `places_city_of_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `places_place_of_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_city_of_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `film_place_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `cinemas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_who_ordered_id_foreign` FOREIGN KEY (`who_ordered_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
