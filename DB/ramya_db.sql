-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 10:32 AM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(14, '22', '6', '1', NULL, NULL),
(15, '22', '7', '3', NULL, NULL);

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
(6, 'Fruits', 'Apple', 60, 1, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt', NULL, NULL, NULL, NULL, NULL, '3fcfd5c7c1c38372dca8863dd94290f3.jpg', '2024-03-16 18:31:33', '2024-03-16 18:31:33'),
(7, 'Vegetables', 'Tamato', 20, 3, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt', NULL, NULL, NULL, NULL, NULL, 'caa225943faeb0fedb228ea29a985ab2.webp', '2024-03-16 18:32:50', '2024-03-16 18:32:50'),
(8, NULL, 'teja', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'd107305ab9cb5518a20faf6c22d17b98.jpg', '2024-03-21 13:03:46', '2024-03-21 13:03:46'),
(9, NULL, 'erwerew', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2fb9319d33877321193063de23e26912.png', '2024-03-24 16:49:38', '2024-03-24 16:49:38');

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
(29, '2024_03_21_200547_create_sessions_table', 5);

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
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_reference_id` varchar(100) DEFAULT NULL,
  `delivery_status` varchar(100) DEFAULT NULL,
  `shipment_no` varchar(100) DEFAULT NULL,
  `shipment_status` varchar(100) DEFAULT NULL,
  `coupons` varchar(100) DEFAULT NULL,
  `order_note` varchar(250) DEFAULT NULL,
  `status` tinyint(10) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `grand_total`, `orders_status`, `shipping_options`, `payment_method`, `payment_status`, `transaction_id`, `payment_reference_id`, `delivery_status`, `shipment_no`, `shipment_status`, `coupons`, `order_note`, `status`, `created_at`, `updated_at`) VALUES
(10, 22, NULL, NULL, '120', 'successfully', NULL, NULL, 'successfully', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-27 20:33:45', '2024-03-27 20:33:45');

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

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `product_id`, `order_id`, `quantity`, `price`, `Status`, `created_at`, `updated_at`) VALUES
(18, '22', '6', '10', '1', '60', '1', '2024-03-27 20:33:45', '2024-03-27 20:33:45'),
(19, '22', '7', '10', '3', '20', '1', '2024-03-27 20:33:45', '2024-03-27 20:33:45');

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
('ZeyiJcBin3N2dA0KRdSDaImPQs1OE8rLC4RspalM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjZZM3lBNGhmbVR4UU1vQUFMUFozbUNCUXp0WFphQ282MG5XVkYzWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jaGFja291dHZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEwOiJ1c2VybW9iaWxlIjtzOjEwOiI5OTY2MzQyMDIzIjt9', 1711574505);

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
(22, 'UserNmae', NULL, NULL, '9966342023', NULL, '306177', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 18, 'siva', 'sandeep', 'sivasandeepcompany', 'Gachibowli.', 'K V Rangareddy', 'India', '500032', '987654321', 'sivasandeepmedia@gmail.com', 1, NULL, NULL),
(3, 22, 'siva', 'sandeep', 'abcinfotech', 'sr nagar', 'hyderabad', 'India', '500032', '9876543210', 'sivasandeep@live.com', 1, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
