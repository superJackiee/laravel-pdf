-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 05:17 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `background_image`
--

CREATE TABLE `background_image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `background_image`
--

INSERT INTO `background_image` (`id`, `name`, `img`, `status`) VALUES
(1, 'puper', 'puper', '1');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, 'About US', 'Welcome', '1578857871.png', '2019-12-27 08:44:59', '2019-12-27 09:35:23'),
(5, 'Welcome', 'Smart', '1577467385.png', '2019-12-27 08:53:33', '2019-12-27 10:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `main_code` varchar(255) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `main_code`, `sub_code`, `status`) VALUES
(1, 'Blue', '#1e20d5', '#2ba2e7', '1'),
(2, 'Red', '#bd2121', '#be682e', '1'),
(3, 'Green', '#0b5e14', '#061d2b', '1'),
(4, 'dd', '#e7762b', '#4d4d4d', '1'),
(5, 'dd', '#928d8e', '#e7762b', '1'),
(6, 'ee', '#e7762b', '#928d8e', '1'),
(7, 'ww', '#928d8e', '#e7762b', '1'),
(8, '', '#e7762b', '#928d8e', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_date`, `updated_date`) VALUES
(1, 'tabrez', 'tabrez.noida@gmail.com', '', '', '2019-12-19 13:20:48', '2019-12-19 13:20:48'),
(3, 'fareed', 'tabrez.noida@gmail.com', '', '', '2019-12-19 13:24:10', '2019-12-19 13:24:10'),
(4, 'tabrez', 'tabrez.noida@gmail.com', '', '', '2019-12-19 13:26:56', '2019-12-19 13:26:56'),
(5, 'sss', 'shiblee1983@gmail.com', '4214214', 'sdadsa', '2020-01-10 01:33:57', '2020-01-10 01:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `resume_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume_language_id` int(11) NOT NULL,
  `resume_templet_id` int(11) NOT NULL,
  `experience_level_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_tittle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ulr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#0000A0,#0000FF',
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_font_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'm',
  `header_font_style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lowercase',
  `layout` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `font_style` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'roboto',
  `font_size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `user_id`, `job_category_id`, `resume_name`, `resume_language_id`, `resume_templet_id`, `experience_level_id`, `name`, `photo`, `job_tittle`, `email`, `nationality`, `dob`, `marital_status`, `mobile_number`, `address`, `ulr`, `summary`, `color`, `background`, `header_font_size`, `header_font_style`, `layout`, `font_style`, `font_size`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 'Tabrez', 1, 2, 1, 'dd', '', 'dddd', 'tabrez.noida@gmail.com', 'India', '0000-00-00', NULL, '07503032175', 'H-15/67', NULL, 'dd', '#0000A0,#0000FF', '', 'm', 'lowercase', '1', 'roboto', '1', '2020-01-11 17:02:02', '2020-01-21 06:12:07'),
(18, 4, 1, 'Tabrez', 1, 2, 3, 'fareed', NULL, 'Professional', 'gitgonda@gmail.com', NULL, NULL, NULL, '0598977601', NULL, NULL, 'inquire about buying experience item preferences, \r\nand future purchases. \r\nsign customers up for marketing lists complaints', '#0b5e14,#061d2b', 'puper', 'S', 'capitalize', '1', 'roboto', '1', '2020-01-31 03:39:36', '2020-03-09 17:05:28'),
(23, 4, 1, 'Rizwan CV', 1, 2, 2, 'fareed', NULL, NULL, 'gitgonda@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '#0b5e14,#0b5e14', 'puper', 'm', 'lowercase', '1', 'roboto', '1', '2020-03-05 10:51:32', '2020-03-05 10:51:32'),
(24, 4, 4, 'gfhfg', 1, 5, 5, 'fareed', NULL, NULL, 'gitgonda@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '#0000A0,#0000FF', NULL, 'm', 'lowercase', '1', 'roboto', '1', '2020-04-23 14:33:45', '2020-04-23 14:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `field_of_study` text DEFAULT NULL,
  `school_university` varchar(255) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `city_country` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `cv_id`, `field_of_study`, `school_university`, `start_date`, `end_date`, `city_country`, `description`) VALUES
(8, 23, 'cvxc', 'xcv', 'xvx', 'vxcv', 'vxcv', 'vxcxv'),
(9, 18, 'MCA', 'UPTU', '1-2-2010', '1-2/2014', 'India', 'Master Of Computer sicence'),
(10, 18, 'BSC', 'LBS', '1-2-2004', '1-2-2008', 'india', 'Bachelor of Science');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `position_or_job_title` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `city_country` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `cv_id`, `position_or_job_title`, `company_name`, `city_country`, `start_date`, `end_date`, `responsibilities`) VALUES
(2, 18, 'Web Developer', 'Weblink India', 'india', '18-10-2010', '15-01-2013', 'Assisted customer with trying on items.'),
(3, 18, 'Head Of Programing', 'Rubix Labs', 'KSA', '15-01-2013', '18-11-2020', 'inquire about buying experience item preferences, and future purchases.');

-- --------------------------------------------------------

--
-- Table structure for table `experience_level`
--

CREATE TABLE `experience_level` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0=inactive ,1=Active , 2= Delete',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience_level`
--

INSERT INTO `experience_level` (`id`, `name_en`, `name_ar`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Student/Junior(0-2 years)', 'Student/Junior(0-2 years)', '1', '2020-01-30 00:00:00', '2020-01-30 00:00:00'),
(2, 'Senior(2-6 years)', 'Senior(2-6 years)', '1', '2020-01-30 00:00:00', '2020-01-30 20:46:52'),
(3, 'Executive(+6 years)', 'Executive(+6 years)', '1', '2020-01-30 00:00:00', '2020-01-30 00:00:00'),
(5, 'ddss', 'ddss', '1', '2020-02-01 00:13:53', '2020-02-01 00:13:53');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive ,1=Active , 2= Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', 'information Technlogy', '1', '2019-12-31 21:00:00', '2019-12-31 21:00:00'),
(2, 'Legal', 'يسبسيب', '1', '2020-01-29 21:00:00', '2020-01-29 21:00:00'),
(4, 'test2', 's', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `cv_id`, `name`, `rating`) VALUES
(2, 18, 'Urdu', 5);

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
(4, '2019_12_15_203109_create_pages_table', 2),
(5, '2019_12_18_132218_create_banners', 3),
(6, '2020_01_10_143937_create_cvs_table', 4),
(7, '2020_01_10_150134_create_job_category_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` text CHARACTER SET utf8 NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title_en`, `title_ar`, `subtitle`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'معلومات عنا', 'About SMART', 'Welcome Smart', 'مرحبا بكم', '2019-12-16 05:55:03', '2019-12-16 07:17:15'),
(2, 'Services', 'خدمات', 'Services sub', 'Services description', 'وصف الخدمة', '2019-12-16 18:14:37', '2019-12-16 18:14:37');

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
-- Table structure for table `resume_templet`
--

CREATE TABLE `resume_templet` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` longtext DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0= InActive 1= Active , 2= Delete',
  `created_date` date DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume_templet`
--

INSERT INTO `resume_templet` (`id`, `name_en`, `name_ar`, `image`, `code`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Basic', 'Basic', 'cv.png', '', '1', '0000-00-00', '2020-01-30 08:36:35'),
(2, 'Professional', 'professional', 'cv.png', '', '1', '0000-00-00', '2020-01-30 08:36:35'),
(5, 'Polygon', 'Polygon', '1580557083.jpeg', 'ddd', '1', '2020-02-01', '2020-02-01 14:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `cv_id`, `name`, `rating`) VALUES
(1, 18, 'PHP7', 4),
(3, 18, 'HTML', 3);

-- --------------------------------------------------------

--
-- Table structure for table `skills_level`
--

CREATE TABLE `skills_level` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0=inactive ,1=Active , 2= Delete',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `usertype`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tabrez', '1234567898', 'admin', 'admin@gmail.com', NULL, '$2y$10$tB//nmq9qb.seAY5PXvkxuifRCGxvs6o7iTaqelTvI.G8znnuM/xq', 'YDJ7tJyDA3lntRA2bMc9l1hPUFjmc0sX8GHlNNXr2q7aU8OOrfxwQRIZ3Xf3', '2019-12-13 18:14:13', '2019-12-13 18:14:13'),
(3, 'Fareed', '1234567898', NULL, 'hSahwan@smart.sa', NULL, '$2y$10$f4.J4tfDVTBR4QenH/lJRu/t5hRQR7zY6G1GLHcMYGyEDwR15o9Hi', NULL, '2019-12-16 14:53:56', '2019-12-16 14:53:56'),
(4, 'fareed', '1234567898', NULL, 'gitgonda@gmail.com', NULL, '$2y$10$tB//nmq9qb.seAY5PXvkxuifRCGxvs6o7iTaqelTvI.G8znnuM/xq', 'ynJi4xN0qojlzwPtHIyKVtZZGlSBnJW6iWPDffbksqvvQjACAmXN2FchjXyQ', '2020-01-07 06:29:20', '2020-01-07 06:29:20'),
(5, 'Tabrez', '5678987654', NULL, 'tabrssez.noida@gmail.com', NULL, '$2y$10$FDUKvJRfuw9mIA6TQfcUIuKFtb7XLLuOOtZERwMHzwfdBQMaG7Uby', NULL, '2020-04-29 17:48:17', '2020-04-29 17:48:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background_image`
--
ALTER TABLE `background_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_level`
--
ALTER TABLE `experience_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `resume_templet`
--
ALTER TABLE `resume_templet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills_level`
--
ALTER TABLE `skills_level`
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
-- AUTO_INCREMENT for table `background_image`
--
ALTER TABLE `background_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experience_level`
--
ALTER TABLE `experience_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resume_templet`
--
ALTER TABLE `resume_templet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills_level`
--
ALTER TABLE `skills_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
