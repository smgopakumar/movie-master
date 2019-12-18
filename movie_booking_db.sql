-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2018 at 02:17 AM
-- Server version: 5.6.35-1+deb.sury.org~xenial+0.1
-- PHP Version: 7.2.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_09_08_114612_create_user_types_table', 1),
(2, '2018_09_08_114613_create_users_table', 1),
(3, '2018_09_08_114614_create_password_resets_table', 1),
(4, '2018_09_08_115859_create_movies_table', 1),
(5, '2018_09_08_121633_create_show_times_table', 1),
(6, '2018_09_08_123457_create_seat_masers_table', 1),
(7, '2018_09_08_142128_create_show_bookings_table', 1),
(8, '2018_09_08_142139_create_show_booking_seats_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `from_date`, `to_date`, `price`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Avengers: Infinity War', '2018-09-08', '2018-09-15', '150', 'storage/uploads/movie/Avengers_Infinity_War_poster.jpg', 1, NULL, NULL);

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
-- Table structure for table `seat_masers`
--

CREATE TABLE `seat_masers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_number` smallint(6) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_masers`
--

INSERT INTO `seat_masers` (`id`, `name`, `row_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A1', 1, 1, NULL, NULL),
(2, 'A2', 1, 1, NULL, NULL),
(3, 'A3', 1, 1, NULL, NULL),
(4, 'A4', 1, 1, NULL, NULL),
(5, 'A5', 1, 1, NULL, NULL),
(6, 'A6', 1, 1, NULL, NULL),
(7, 'A7', 1, 1, NULL, NULL),
(8, 'A8', 1, 1, NULL, NULL),
(9, 'A9', 1, 1, NULL, NULL),
(10, 'A10', 1, 1, NULL, NULL),
(11, 'B1', 2, 1, NULL, NULL),
(12, 'B2', 2, 1, NULL, NULL),
(13, 'B3', 2, 1, NULL, NULL),
(14, 'B4', 2, 1, NULL, NULL),
(15, 'B5', 2, 1, NULL, NULL),
(16, 'B6', 2, 1, NULL, NULL),
(17, 'B7', 2, 1, NULL, NULL),
(18, 'B8', 2, 1, NULL, NULL),
(19, 'B9', 2, 1, NULL, NULL),
(20, 'B10', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `show_bookings`
--

CREATE TABLE `show_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `show_time_id` int(10) UNSIGNED NOT NULL,
  `show_date` date DEFAULT NULL,
  `seat_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_bookings`
--

INSERT INTO `show_bookings` (`id`, `user_id`, `movie_id`, `show_time_id`, `show_date`, `seat_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-09-09', '4', 1, NULL, NULL),
(2, 1, 1, 1, '2018-09-09', '3', 1, NULL, NULL),
(3, 1, 1, 3, '2018-09-10', '2', 1, NULL, NULL),
(4, 1, 1, 2, '2018-09-09', '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `show_booking_seats`
--

CREATE TABLE `show_booking_seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `show_booking_id` int(10) UNSIGNED NOT NULL,
  `seat_maser_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_booking_seats`
--

INSERT INTO `show_booking_seats` (`id`, `show_booking_id`, `seat_maser_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 1, NULL, NULL),
(2, 1, 11, 1, NULL, NULL),
(3, 1, 12, 1, NULL, NULL),
(4, 1, 13, 1, NULL, NULL),
(5, 2, 2, 1, NULL, NULL),
(6, 2, 3, 1, NULL, NULL),
(7, 2, 4, 1, NULL, NULL),
(9, 3, 16, 1, NULL, NULL),
(10, 3, 15, 1, NULL, NULL),
(11, 4, 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `show_times`
--

CREATE TABLE `show_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_show_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_time` time DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_times`
--

INSERT INTO `show_times` (`id`, `display_show_time`, `show_time`, `status`, `created_at`, `updated_at`) VALUES
(1, '9 AM', '09:00:00', 1, NULL, NULL),
(2, '11.30 AM', '11:30:00', 1, NULL, NULL),
(3, '2.30 PM', '14:30:00', 1, NULL, NULL),
(4, '5 PM', '17:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `email`, `password`, `mobile`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@movie.com', '$2y$10$dt09Xb1d8cA14hy84XH1luRI4u5N828Jy67lzq2fJD4WQoW5a7da.', NULL, 1, 'Qr4qUezLk5nl3YfKP8tXT7PbeDk2FgRZ8iBzSTVjPKTpOZ1HqLGJ85Lu5dxG', NULL, NULL),
(2, 2, 'Arunjith PK', 'aruntkry@gmail.com', '$2y$10$FvL6w1wc/evOcal7W9tAg.NRJezRBTLmsNxv6oTFbb2.hv6V0FzVm', '9995341417', 1, NULL, '2018-09-08 12:37:24', '2018-09-08 12:37:24'),
(3, 2, 'Arunjith PK', 'aruntkr1y@gmail.com', '$2y$10$tqnYvZGp37fafn4i0SIC6eig7G9n3PyxNPFxQ0qFll05SaOpE7Gju', '9995341412', 1, NULL, '2018-09-08 12:38:28', '2018-09-08 12:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, NULL, NULL),
(2, 'Public User', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `seat_masers`
--
ALTER TABLE `seat_masers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_bookings`
--
ALTER TABLE `show_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_bookings_user_id_foreign` (`user_id`),
  ADD KEY `show_bookings_movie_id_foreign` (`movie_id`),
  ADD KEY `show_bookings_show_time_id_foreign` (`show_time_id`);

--
-- Indexes for table `show_booking_seats`
--
ALTER TABLE `show_booking_seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_booking_seats_show_booking_id_foreign` (`show_booking_id`),
  ADD KEY `show_booking_seats_seat_maser_id_foreign` (`seat_maser_id`);

--
-- Indexes for table `show_times`
--
ALTER TABLE `show_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seat_masers`
--
ALTER TABLE `seat_masers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `show_bookings`
--
ALTER TABLE `show_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `show_booking_seats`
--
ALTER TABLE `show_booking_seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `show_times`
--
ALTER TABLE `show_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `show_bookings`
--
ALTER TABLE `show_bookings`
  ADD CONSTRAINT `show_bookings_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_bookings_show_time_id_foreign` FOREIGN KEY (`show_time_id`) REFERENCES `show_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `show_booking_seats`
--
ALTER TABLE `show_booking_seats`
  ADD CONSTRAINT `show_booking_seats_seat_maser_id_foreign` FOREIGN KEY (`seat_maser_id`) REFERENCES `seat_masers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_booking_seats_show_booking_id_foreign` FOREIGN KEY (`show_booking_id`) REFERENCES `show_bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
