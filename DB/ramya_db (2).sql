-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 04:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_items`
--

CREATE TABLE `banner_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `banner_colour` varchar(100) DEFAULT NULL,
  `banner_card_colour` varchar(100) DEFAULT NULL,
  `font_style` varchar(100) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner_items`
--

INSERT INTO `banner_items` (`id`, `name`, `title`, `description`, `banner_colour`, `banner_card_colour`, `font_style`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Offer for Apple', 'Fresh Apples', '30 % OFF', 'bg-primary', 'bg-warning', NULL, NULL, 1, NULL, NULL),
(2, 'Delivery', 'Tasty Fruits', 'Free Delivery', 'bg-secondary', 'bg-info', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `coupon_id` varchar(100) DEFAULT NULL,
  `discount_amount` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `coupon_id`, `discount_amount`, `created_at`, `updated_at`) VALUES
(18, '22', '7', '26', '1', '370', NULL, '2024-04-08 14:40:55'),
(19, '22', '6', '29', '2', '1740', NULL, '2024-04-08 14:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `discount_code` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `discount_type` enum('Percentage','Flat','Upto_Percentage','Upto_flat') DEFAULT NULL,
  `coupon_type` enum('once','repeated') NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `validity_start_date` varchar(100) DEFAULT NULL,
  `valid_till_date` varchar(100) DEFAULT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `offer_on_product_id` varchar(150) DEFAULT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `discount_code`, `description`, `discount_type`, `coupon_type`, `value`, `validity_start_date`, `valid_till_date`, `quantity`, `offer_on_product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flat 10 Off On Apple', 'Flat10', 'Flat 10 Off On Apple', 'Flat', 'repeated', '10', '1712613304', '1712699704', '2', '6', 1, '2024-04-02 19:22:09', '2024-04-02 19:22:09'),
(2, ' 20 % Offer on Tamoto', 'PR20', ' 20 % Offer on Tamoto', 'Percentage', 'repeated', '20', '1712440540', '1712699704', '5', '7', 1, '2024-04-02 19:22:09', '2024-04-02 19:22:09');

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
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `category` enum('Vegetables','Fruits','Bread','Meat') DEFAULT NULL,
  `fruit_name` varchar(150) DEFAULT NULL,
  `price_per_kg` int(50) DEFAULT NULL,
  `stock` int(150) DEFAULT NULL,
  `quality` varchar(100) DEFAULT NULL,
  `rating` int(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `reviews` varchar(250) DEFAULT NULL,
  `country_of_origin` varchar(150) DEFAULT NULL,
  `weight` varchar(150) DEFAULT NULL,
  `check` varchar(150) DEFAULT NULL,
  `min_weight` varchar(150) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `category`, `fruit_name`, `price_per_kg`, `stock`, `quality`, `rating`, `description`, `reviews`, `country_of_origin`, `weight`, `check`, `min_weight`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Fruits', 'Apple', 60, 30, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt', NULL, NULL, NULL, NULL, NULL, '3fcfd5c7c1c38372dca8863dd94290f3.jpg', '2024-03-16 18:31:33', '2024-03-16 18:31:33'),
(7, 'Vegetables', 'Tamato', 20, 60, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt', NULL, NULL, NULL, NULL, NULL, 'caa225943faeb0fedb228ea29a985ab2.jpg', '2024-03-16 18:32:50', '2024-03-16 18:32:50');

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
(8, '2024_03_14_050346_create_employee_table', 1),
(9, '2024_03_14_054230_create_employe_table', 2),
(20, '2014_10_12_000000_create_users_table', 3),
(21, '2014_10_12_100000_create_password_resets_table', 3),
(22, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(23, '2019_08_19_000000_create_failed_jobs_table', 3),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(25, '2024_03_12_030136_create_sessions_table', 3),
(26, '2024_03_12_032645_add_google_id_column', 3),
(27, '2024_03_14_184845_create_employe_table', 3),
(28, '2024_03_19_015750_create_carts_table', 4),
(29, '2024_03_21_200547_create_sessions_table', 5),
(30, '2024_04_02_181204_add_razorpay_response_to_transactions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` bigint(30) DEFAULT NULL,
  `product_id` varchar(250) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `grand_total` varchar(100) DEFAULT NULL,
  `orders_status` enum('pending','successfully','failed','none') NOT NULL DEFAULT 'pending',
  `shipping_options` varchar(100) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `payment_status` enum('pending','successfully','failed','none') DEFAULT 'pending',
  `payment_id` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `delivery_status` varchar(100) DEFAULT NULL,
  `shipment_no` varchar(100) DEFAULT NULL,
  `shipment_status` varchar(100) DEFAULT NULL,
  `coupons` varchar(100) DEFAULT NULL,
  `order_note` varchar(250) DEFAULT NULL,
  `status` tinyint(10) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `product_id` varchar(250) DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `Status` varchar(20) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('m9KvfxcJXjP1kMXI7mEeev0FLHtS4zE7eCKD6SSX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2llbHluS05UYlJCcHVXVWJkUE1KYUZYZ2JPQTQzR2d0NWIyYU1kSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXJ0dmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoidXNlcl9pZCI7aToyMjt9', 1712607080),
('W7yQIzKRNwHn8GdIGFK5kYsVBAykPvyjXe46v5b4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTk1OZ2ZYbldxa0toRjZnOUtwOFRwWUVTOEtIaGh1NzVYOEVYR0pWViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1712606138);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(150) DEFAULT NULL,
  `admin_mobile` varchar(50) DEFAULT NULL,
  `admin_address` varchar(150) DEFAULT NULL,
  `meta_name` varchar(100) DEFAULT NULL,
  `meta_keyword` varchar(100) DEFAULT NULL,
  `copy_writer` varchar(150) DEFAULT NULL,
  `terms&conditions` text DEFAULT NULL,
  `privacy_policy` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `admin_email`, `admin_mobile`, `admin_address`, `meta_name`, `meta_keyword`, `copy_writer`, `terms&conditions`, `privacy_policy`) VALUES
(1, 'info@fruitables.com', '9876543210', 'Kukatpalli, Hyderabad', NULL, NULL, 'A copyright is a type of intellectual property protection. In short, it limits who can copy and redistribute your content. This is the type of legal p', 'A Terms and Conditions agreement is where you let the public know the terms, rules and guidelines for using your website or mobile app. They include topics such as acceptable use, restricted behavior and limitations of liability.\r\n\r\nThis article will get you started with creating your own custom Terms and Conditions agreement. We\'ve also put together a Sample Terms and Conditions Template that you can use to help you write your own.', 'Privacy Policy Template (2023 Edition) is a do-it-yourself privacy policy template that is developed to comply with privacy laws from multiple jurisdictions - Europe\'s General Data Protection Regulation ...');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `media_name` varchar(150) DEFAULT NULL,
  `media_image` blob DEFAULT NULL,
  `media_url` varchar(250) DEFAULT NULL,
  `media_description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `payment_stats` varchar(100) DEFAULT NULL,
  `razorpay_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `payment_id`, `amount`, `currency`, `payment_stats`, `razorpay_response`, `status`, `created_at`, `updated_at`) VALUES
(4, '22', 'pay_NtqrzKI6ILBKuj', '10', 'INR', 'authorized', NULL, 1, '2024-04-02 12:54:59', '2024-04-02 12:54:59'),
(5, '22', 'pay_Ntr0xkTcbPUHpg', '300', 'INR', 'authorized', NULL, 1, '2024-04-02 13:03:31', '2024-04-02 13:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT 'UserNmae',
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `otp_verified_at` varchar(100) DEFAULT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `otp_verified_at`, `otp`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `google_id`) VALUES
(22, 'UserNmae', 'svsndp@gmail.com', NULL, '9966342023', NULL, '342641', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'UserNmae', 'sansvsndp@gmail.com', NULL, '8328227728', NULL, '202967', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `town_city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `post_code` varchar(50) DEFAULT NULL,
  `contact_mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` tinyint(10) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `company_name`, `address`, `town_city`, `country`, `post_code`, `contact_mobile`, `email`, `status`, `created_at`, `updated_at`) VALUES
(4, 22, 'siva', 'sandeep', 'sivasandeeptechcomp', 'Gachibowli.', 'K V Rangareddy', 'India', '500032', '8328227728', 'sivasandeepmedia@gmail.com', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_items`
--
ALTER TABLE `banner_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_items`
--
ALTER TABLE `banner_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
