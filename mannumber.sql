-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2017 at 06:11 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mannumber`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) NOT NULL COMMENT 'Batch Id',
  `employee_number` bigint(20) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_hire` date DEFAULT NULL,
  `sss_number` bigint(20) DEFAULT NULL,
  `tin_number` bigint(20) DEFAULT NULL,
  `phic_number` bigint(20) DEFAULT NULL,
  `pagibig_number` bigint(20) DEFAULT NULL,
  `hdmf_number` bigint(20) DEFAULT NULL,
  `date_regularized` date DEFAULT NULL,
  `hourly_rate` decimal(10,2) DEFAULT NULL,
  `daily_rate` decimal(10,2) DEFAULT NULL,
  `branch` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_branch` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_id` bigint(20) NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_data` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(178, '2014_10_12_000000_create_users_table', 1),
(179, '2014_10_12_100000_create_password_resets_table', 1),
(180, '2017_12_01_043034_create_requests_table', 1),
(181, '2017_12_01_043239_create_employees_table', 1),
(182, '2017_12_06_061834_create_roles_table', 1),
(183, '2017_12_06_061907_create_permissions_table', 1),
(184, '2017_12_06_110700_create_modules_table', 1),
(185, '2017_12_06_111903_create_user_roles', 1),
(186, '2017_12_06_111954_create_user_permissions', 1),
(187, '2017_12_06_112014_create_user_modules', 1),
(188, '2017_12_12_112355_create_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `title`, `description`, `prefix`, `icon`, `sort_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'Dashboard Module', 'dashboard', 'fa-dashboard', 0, 'active', 1, NULL, '2017-12-12 22:10:35', NULL),
(2, 'Request', 'Request Module', 'request', 'fa-send', 1, 'active', 1, NULL, '2017-12-12 22:10:36', NULL),
(3, 'User Management', 'User Management Module', 'user', 'fa-users', 2, 'active', 1, NULL, '2017-12-12 22:10:36', NULL),
(4, 'Roles', 'Roles Module', 'role', 'fa-circle-o', 3, 'active', 1, NULL, '2017-12-12 22:10:36', NULL),
(5, 'Permissions', 'Permissons Module', 'permission', 'fa-circle-o', 4, 'active', 1, NULL, '2017-12-12 22:10:36', NULL),
(6, 'Modules', 'Modules Module Management', 'module', 'fa-circle-o', 5, 'active', 1, NULL, '2017-12-12 22:10:36', NULL),
(7, 'Logs', 'Logs Module', 'log', 'fa-history', 6, 'active', 1, NULL, '2017-12-12 22:10:36', NULL),
(8, 'Account', 'Account Module', 'account', 'fa-user', 100, 'active', 1, NULL, '2017-12-12 22:10:36', NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `prefix`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Create', 'create', 'Create Permission', NULL, 1, NULL, '2017-12-12 22:10:37', NULL),
(2, 'Read', 'read', 'Read Permission', NULL, 1, NULL, '2017-12-12 22:10:37', NULL),
(3, 'Update', 'update', 'Update Permission', NULL, 2, NULL, '2017-12-12 22:10:37', NULL),
(4, 'Delete', 'delete', 'Delete Permission', NULL, 2, NULL, '2017-12-12 22:10:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Batch Id',
  `request_number` int(11) NOT NULL COMMENT 'Request Number of Employees to be added',
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `prefix`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', 'Super Admin Role', 1, NULL, '2017-12-12 22:10:37', NULL),
(2, 'Admin', 'admin', 'Admin Role', 1, NULL, '2017-12-12 22:10:37', NULL),
(3, 'Encoder', 'encoder', 'Encoder Role', 2, NULL, '2017-12-12 22:10:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sss_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `middlename`, `lastname`, `email`, `username`, `employee_no`, `sss_no`, `password`, `image`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super', NULL, 'Admin', 'superadmin@gmail.com', 'super-admin', '000000000', '000000000', '$2y$10$I87pZzwEYBRQoGO3o1sMlO1YPPV43apvnPQmhIIoLiZRxc7FiVnTm', NULL, 'active', NULL, NULL, NULL, NULL, NULL),
(2, 'Admin', 'Main', NULL, 'Admin', 'dmin@gmail.com', 'admin', '000000001', '000000001', '$2y$10$MxgZuMCXYZqjkCUi6oF9.OmZGRto4pnWVrC0qXkTbHc4ljHL0jzxS', NULL, 'active', NULL, NULL, NULL, NULL, NULL),
(3, 'Main Encoder', 'Main', NULL, 'Encoder', 'encoder@gmail.com', 'encoder', '000000002', '000000003', '$2y$10$2.WwxfYhdo91ga7ObcA3N.ypfWj/zediw7aO.OmE8zWPAacf2y75i', NULL, 'active', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_modules`
--

CREATE TABLE `user_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_modules`
--

INSERT INTO `user_modules` (`id`, `module_id`, `user_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'active', 1, NULL, '2017-12-12 22:10:39', NULL),
(2, '2', 1, 'active', 1, NULL, '2017-12-12 22:10:39', NULL),
(3, '3', 1, 'active', 1, NULL, '2017-12-12 22:10:39', NULL),
(4, '4', 1, 'active', 1, NULL, '2017-12-12 22:10:39', NULL),
(5, '5', 1, 'active', 1, NULL, '2017-12-12 22:10:39', NULL),
(6, '6', 1, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(7, '7', 1, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(8, '8', 1, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(9, '1', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(10, '2', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(11, '3', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(12, '4', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(13, '5', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(14, '6', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(15, '7', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(16, '8', 2, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(17, '1', 3, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(18, '2', 3, 'active', 1, NULL, '2017-12-12 22:10:40', NULL),
(19, '8', 3, 'active', 1, NULL, '2017-12-12 22:10:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `permission_id`, `user_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(2, '2', 1, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(3, '3', 1, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(4, '4', 1, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(5, '1', 2, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(6, '2', 2, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(7, '3', 2, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(8, '1', 3, 'active', 1, NULL, '2017-12-12 22:10:38', NULL),
(9, '2', 3, 'active', 1, NULL, '2017-12-12 22:10:39', NULL),
(10, '3', 3, 'active', 1, NULL, '2017-12-12 22:10:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `user_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'active', 1, NULL, '2017-12-12 22:10:37', NULL),
(2, '2', 2, 'active', 1, NULL, '2017-12-12 22:10:37', NULL),
(3, '3', 3, 'active', 1, NULL, '2017-12-12 22:10:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_number_unique` (`employee_number`),
  ADD UNIQUE KEY `employees_sss_number_unique` (`sss_number`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_employee_no_unique` (`employee_no`),
  ADD UNIQUE KEY `users_sss_no_unique` (`sss_no`);

--
-- Indexes for table `user_modules`
--
ALTER TABLE `user_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Batch Id';
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_modules`
--
ALTER TABLE `user_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
