-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 09:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `table_reserver`
--

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
(4, '2020_05_25_192453_add_role_to_users', 2),
(5, '2020_05_30_112126_create_tables_table', 3),
(6, '2020_05_31_110453_create_operating_hours_table', 4),
(7, '2020_05_31_112204_add_open_boolean_to_operating_hours', 5),
(8, '2020_06_02_104544_create_reservations_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `operating_hours`
--

CREATE TABLE `operating_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_hour` int(11) NOT NULL,
  `closing_hour` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `open` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operating_hours`
--

INSERT INTO `operating_hours` (`id`, `day`, `starting_hour`, `closing_hour`, `created_at`, `updated_at`, `open`) VALUES
(1, 'MONDAY', 10, 24, '2020-05-31 11:23:10', '2020-06-02 08:08:09', 1),
(2, 'TUESDAY', 8, 24, '2020-05-31 11:23:15', '2020-06-02 08:08:46', 1),
(3, 'WEDNESDAY', 8, 24, '2020-05-31 11:23:19', '2020-06-02 08:08:43', 1),
(4, 'THURSDAY', 8, 24, '2020-05-31 11:23:21', '2020-06-02 08:08:39', 1),
(5, 'FRIDAY', 8, 24, '2020-05-31 11:23:24', '2020-06-02 08:08:33', 1),
(6, 'SATURDAY', 8, 24, '2020-05-31 11:23:27', '2020-06-02 08:08:36', 1),
(7, 'SUNDAY', 8, 24, '2020-05-31 11:23:30', '2020-06-02 08:08:21', 0);

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `table_id`, `user_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2020-06-17', '8.30', '2020-06-02 11:18:58', '2020-06-02 11:18:58'),
(2, 6, 3, '2020-06-11', '17.00', '2020-06-02 08:47:41', '2020-06-02 08:47:41'),
(3, 6, 2, '2020-09-10', '16.00', '2020-06-02 08:48:10', '2020-06-02 08:48:10'),
(4, 6, 2, '2020-06-25', '15.30', '2020-06-02 08:51:05', '2020-06-02 08:51:05'),
(5, 6, 2, '2020-09-10', '18.30', '2020-06-02 08:51:41', '2020-06-02 08:51:41'),
(6, 7, 2, '2020-06-18', '11.30', '2020-06-03 04:34:25', '2020-06-03 04:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `seats`, `created_at`, `updated_at`) VALUES
(6, 'A1', 4, '2020-05-31 09:43:21', '2020-05-31 09:43:21'),
(7, 'B1', 2, '2020-06-03 04:34:00', '2020-06-03 04:34:00');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@localhost', NULL, '$2y$10$zq0cTmpFLTM9mV68clsbB.DZO9ZgFkEJJUZx2NkS4IAS.zC.WmOWa', NULL, '2020-05-25 16:22:59', '2020-05-25 16:22:59', 'admin'),
(2, 'User', 'user@localhost', NULL, '$2y$10$ORCHmWLHmkk1U6nOlol9..3jVZ6w3c0A1rbtvUwt7YAMQuO8Areo2', NULL, '2020-05-25 16:29:19', '2020-05-25 16:29:19', 'user'),
(3, 'user2', 'user2@localhost', NULL, '$2y$10$mnBGr9OjIA2bSdoIhIZIyeZEI1k93748qA3yxr2ek9KWSa1EiEgLG', NULL, '2020-05-25 16:30:25', '2020-05-25 16:30:25', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operating_hours`
--
ALTER TABLE `operating_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_table_id_foreign` (`table_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `operating_hours`
--
ALTER TABLE `operating_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`),
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
