-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 04:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdch_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrations`
--

CREATE TABLE `administrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrations`
--

INSERT INTO `administrations` (`id`, `name`, `designation`, `slug`, `description`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ABU SALEH MOHIBULLAH', 'Chairman', 'chairman', '<p>dfds <strong>dsfds <u>dfdf </u></strong><i><strong><u>dsfsdf </u></strong><u>sfddsf </u></i><u>sdf</u></p>', 'images/chairman.png', 1, NULL, '2023-09-18 08:01:17', '2023-09-18 08:01:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `old_email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'knock.mdch@gmail.com', NULL, NULL, '$2y$10$492dpdNN9WiPzOOfvwin8./wnXe/Yg11F00qx2dqrobK9Z3FA63Yy', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `slug`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Coding Kori', 'coding-kori', '<p>ffg <strong>fgf g</strong></p>', 1, NULL, '2023-09-18 08:30:16', '2023-09-18 08:30:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `heading`, `slug`, `content`, `attachment`, `published_at`, `deadline`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(2, 'asd s fdds', 'asd-s-fdds', '<p>sdf sdf&nbsp;</p>', NULL, '2023-09-18', '2023-09-18', 1, NULL, '2023-09-18 08:21:31', '2023-09-18 08:21:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `description`, `phase`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Departmeny', 'departmeny', 'dfdgsgDF', 1, 1, NULL, '2023-08-22 12:26:52', '2023-08-22 12:26:52', 1),
(2, 'Department', 'department', 'sdsdfsdf', 2, 1, NULL, '2023-08-22 12:29:21', '2023-08-22 12:29:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments_images`
--

CREATE TABLE `departments_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities_images`
--

CREATE TABLE `facilities_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities_images`
--

INSERT INTO `facilities_images` (`id`, `caption`, `path`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'it is a caption', 'facilities//it-is-a-caption-20230822133644.png', 1, NULL, '2023-08-22 07:36:44', '2023-08-22 07:36:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `info_type`, `slug`, `content`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'slogan', 'slogan', 'Institution for the study of dentistry.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(2, 'chairmans-name', 'chairman', 'Name of the Chairman', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(3, 'directors-name', 'director', 'Name of the Director', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(4, 'principals-name', 'principal', 'Name of the Principal', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(5, 'video-id', 'video-id', 'ID', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(6, 'contact', 'contact', '0123456789', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(7, 'contact', 'recieption', '0123456789', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(8, 'contact', 'patient-query', '0123456789', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(9, 'contact', 'email', 'knock.mdch@gmail.com', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(10, 'address', 'address', '295/Jha/14, Sikder Real Estate, West Dhanmondi, Dhaka-1209', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(11, 'opd-in-charge', 'opd-in-charge', 'name of in-charge', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(12, 'socials', 'facebook', 'facebook account link', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(13, 'socials', 'x', 'x account link', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(14, 'socials', 'instagram', 'instagram account link', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(15, 'socials', 'linkedin', 'linkedin account link', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26'),
(16, 'socials', 'youtube', 'youtube channel link', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_06_122434_create_admins_table', 1),
(6, '2023_07_17_180515_create_faqs_table', 1),
(7, '2023_07_20_150314_create_news_table', 1),
(8, '2023_07_23_091537_create_sections_table', 1),
(9, '2023_07_30_134832_create_albums_table', 1),
(10, '2023_07_30_135612_create_media_table', 1),
(11, '2023_08_08_163942_create_administrations_table', 1),
(12, '2023_08_09_175803_create_departments_table', 1),
(13, '2023_08_11_134443_create_departments_images_table', 1),
(14, '2023_08_12_035436_create_faculties_table', 1),
(15, '2023_08_12_092125_create_facilities_images_table', 1),
(16, '2023_08_12_145523_create_advertisements_table', 1),
(17, '2023_08_13_185215_create_informations_table', 1),
(18, '2014_10_12_100000_create_admin_password_resets_table', 2),
(21, '2023_08_21_132844_create_careers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latest_news` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `heading`, `slug`, `content`, `attachment`, `latest_news`, `published_at`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Exam date announced', 'exam-date-announced', '<p>tyh<strong>fd zfgdfz dfzfhddrszdhf dg </strong>fdg fd<u>gg</u> &nbsp;<u>f dfggdd</u></p>', 'news-attachments/exam-date-announced.pdf', 0, '2023-09-18', 1, NULL, '2023-09-18 06:57:08', '2023-09-18 06:57:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_key`, `title`, `slug`, `content`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'about', 'About', 'about', '<p><strong>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.</strong></p>', 1, '2023-08-19 14:04:26', '2023-09-18 06:51:32', 1),
(2, 'facilities', 'Our Facilities', 'facilities', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis. tyh<strong>fd zfgdfz dfzfhddrszdhf dg </strong>fdg fd<u>gg</u> &nbsp;<u>f dfggdd</u></p>', 1, '2023-08-19 14:04:26', '2023-09-18 06:57:58', 1),
(3, 'administration', 'Administration', 'administration', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(4, 'office-stuff', 'Office Stuff', 'office-stuff', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(5, 'messages', 'Chairman\'s Message', 'chairmans-message', '<p>Lorem ipsum <strong>dolor</strong>, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? <u>Maxime </u>similique aperiam a beatae ipsa, <i>ipsum reprehenderit debitis.</i></p>', 1, '2023-08-19 14:04:26', '2023-09-18 08:15:04', 1),
(6, 'messages', 'Director\'s Message', 'directors-message', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(7, 'messages', 'Principal\'s Message', 'principals-message', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(8, 'admission', 'Local Students', 'local-students', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(9, 'admission', 'International Students', 'international-students', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(10, 'bds-course', '1st Phase', '1st-phase', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem a<strong>dipisci? Maxime similique aperiam </strong>a beatae ipsa<u>, ipsum repreh</u>enderit debitis.</p><figure class=\"image image_resized\" style=\"width:23.02%;\"><img src=\"http://127.0.0.1:8000/media/ckeditor-media/IMG_1672947903065_1695045914.jpg\"></figure>', 1, '2023-08-19 14:04:26', '2023-09-18 08:05:44', 1),
(11, 'bds-course', '2nd Phase', '2nd-phase', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(12, 'bds-course', '3rd Phase', '3rd-phase', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(13, 'bds-course', '4th Phase', '4th-phase', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ad ea et! Itaque nesciunt autem provident ducimus magni accusamus quidem adipisci? Maxime similique aperiam a beatae ipsa, ipsum reprehenderit debitis.', NULL, '2023-08-19 14:04:26', '2023-08-19 14:04:26', 1),
(14, 'affiliation', 'text only', 'text-only', '<p>sfas sf sad<strong>sdsd gdsf</strong> sd<u>dgfds df d &nbsp;</u> df <i>dfsdf sd</i></p>', NULL, '2023-09-18 08:09:29', '2023-09-18 08:09:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrations`
--
ALTER TABLE `administrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrations_slug_unique` (`slug`),
  ADD KEY `administrations_created_by_foreign` (`created_by`),
  ADD KEY `administrations_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_old_email_unique` (`old_email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_created_by_foreign` (`created_by`),
  ADD KEY `advertisements_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `albums_slug_unique` (`slug`),
  ADD KEY `albums_created_by_foreign` (`created_by`),
  ADD KEY `albums_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `careers_slug_unique` (`slug`),
  ADD KEY `careers_created_by_foreign` (`created_by`),
  ADD KEY `careers_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_slug_unique` (`slug`),
  ADD KEY `departments_created_by_foreign` (`created_by`),
  ADD KEY `departments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `departments_images`
--
ALTER TABLE `departments_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_images_department_id_foreign` (`department_id`),
  ADD KEY `departments_images_created_by_foreign` (`created_by`),
  ADD KEY `departments_images_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `facilities_images`
--
ALTER TABLE `facilities_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facilities_images_created_by_foreign` (`created_by`),
  ADD KEY `facilities_images_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculties_department_id_foreign` (`department_id`),
  ADD KEY `faculties_created_by_foreign` (`created_by`),
  ADD KEY `faculties_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_created_by_foreign` (`created_by`),
  ADD KEY `faqs_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `informations_slug_unique` (`slug`),
  ADD KEY `informations_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_album_id_foreign` (`album_id`),
  ADD KEY `media_created_by_foreign` (`created_by`),
  ADD KEY `media_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_created_by_foreign` (`created_by`),
  ADD KEY `news_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_slug_unique` (`slug`),
  ADD KEY `sections_updated_by_foreign` (`updated_by`);

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
-- AUTO_INCREMENT for table `administrations`
--
ALTER TABLE `administrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments_images`
--
ALTER TABLE `departments_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities_images`
--
ALTER TABLE `facilities_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrations`
--
ALTER TABLE `administrations`
  ADD CONSTRAINT `administrations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `administrations_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `advertisements_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `albums_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `careers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `departments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `departments_images`
--
ALTER TABLE `departments_images`
  ADD CONSTRAINT `departments_images_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `departments_images_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `departments_images_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `facilities_images`
--
ALTER TABLE `facilities_images`
  ADD CONSTRAINT `facilities_images_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `facilities_images_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `faculties_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculties_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `faqs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `informations_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `media_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `media_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `news_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
