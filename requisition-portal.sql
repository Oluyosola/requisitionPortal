-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 12:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `requisition-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Store Items'),
(2, NULL, NULL, 'HR'),
(3, NULL, NULL, 'Asset'),
(4, NULL, NULL, 'Services'),
(5, NULL, NULL, 'Others/Non Assets'),
(6, NULL, NULL, 'Maintenance and Request');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2022-07-29 23:08:16', '2022-07-29 23:08:16', 'Officer'),
(2, '2022-07-29 23:08:16', '2022-07-29 23:08:16', 'Site Head'),
(3, '2022-07-29 23:08:16', '2022-07-29 23:08:16', 'Team Lead'),
(4, '2022-07-29 23:08:16', '2022-07-29 23:08:16', 'Manager'),
(5, '2022-07-29 23:08:16', '2022-07-29 23:08:16', 'Ic'),
(6, '2022-07-29 23:08:16', '2022-07-29 23:08:16', 'Store');

-- --------------------------------------------------------

--
-- Table structure for table `designation_types`
--

CREATE TABLE `designation_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `designation_types`
--

INSERT INTO `designation_types` (`id`, `created_at`, `updated_at`, `name`, `designation_id`) VALUES
(1, NULL, NULL, 'SH LUTH', 2),
(2, NULL, NULL, 'SH VI', 2),
(3, NULL, NULL, 'SH MCC', 2),
(4, NULL, NULL, 'SH LEKKI', 2),
(5, NULL, NULL, 'SH GWARINPA', 2),
(6, NULL, NULL, 'SH PH BCP', 2),
(7, NULL, NULL, 'SH ENUGU', 2),
(8, NULL, NULL, 'SH ISOS', 2),
(9, NULL, NULL, 'SH IKEJA', 2),
(10, NULL, NULL, 'SH ILUPEJU', 2),
(11, NULL, NULL, 'SH FESTAC', 2),
(12, NULL, NULL, 'SH IKOTUN', 2),
(13, NULL, NULL, 'SH SHAGAMU', 2),
(14, NULL, NULL, 'SH ABEOKUTA', 2),
(15, NULL, NULL, 'SH IFE', 2),
(16, NULL, NULL, 'SH ILORIN', 2),
(17, NULL, NULL, 'SH PH LAB', 2),
(18, NULL, NULL, 'SH WARRI', 2),
(19, NULL, NULL, 'SH BENIN', 2),
(20, NULL, NULL, 'SH GWAGWALADA', 2),
(21, NULL, NULL, 'SH KADUNA', 2),
(22, NULL, NULL, 'SH ASOKORO', 2),
(23, NULL, NULL, 'SH WUSE', 2),
(24, NULL, NULL, 'SH IBADAN', 2),
(25, NULL, NULL, 'TL ICT', 3),
(26, NULL, NULL, 'TL ENGINEERING', 3),
(27, NULL, NULL, 'TL ADMIN', 3),
(28, NULL, NULL, 'TL CYTOLOGY', 3),
(29, NULL, NULL, 'TL CLINICAL', 3),
(30, NULL, NULL, 'TL MICRO', 3),
(31, NULL, NULL, 'TL LOGIN', 3),
(32, NULL, NULL, 'TL QA', 3),
(33, NULL, NULL, 'TL HELPDESK', 3),
(34, NULL, NULL, 'TL STORE', 3),
(35, NULL, NULL, 'TL PROCUREMENT', 3),
(36, NULL, NULL, 'Admin', 4),
(37, NULL, NULL, 'Area Ops Lag1', 4),
(38, NULL, NULL, 'Area ops Lag2', 4),
(39, NULL, NULL, 'Lab Manager', 4),
(40, NULL, NULL, 'Area Ops North', 4),
(41, NULL, NULL, 'Area Ops East', 4),
(42, NULL, NULL, 'HR Manager', 4),
(43, NULL, NULL, 'Legal', 4),
(44, NULL, NULL, 'Customer service manager', 4),
(45, NULL, NULL, 'CMO', 5),
(46, NULL, NULL, 'CFO', 5),
(47, NULL, NULL, 'COO', 5),
(48, NULL, NULL, 'CEO', 5),
(49, NULL, NULL, 'CSO', 5),
(50, NULL, NULL, 'National Lab', 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ic_approvals`
--

CREATE TABLE `ic_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ic_id` bigint(20) UNSIGNED NOT NULL,
  `requisition_id` bigint(20) UNSIGNED NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `approval_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejection_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ic_approvals`
--

INSERT INTO `ic_approvals` (`id`, `created_at`, `updated_at`, `ic_id`, `requisition_id`, `is_approved`, `approval_comment`, `rejection_comment`) VALUES
(1, '2022-07-31 22:28:34', '2022-07-31 22:28:34', 5, 1, 1, 'k', NULL),
(2, '2022-08-01 07:10:56', '2022-08-01 07:10:56', 5, 5, 1, 'n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `reorder_quantity` decimal(8,2) NOT NULL,
  `quantity_unit_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `created_at`, `updated_at`, `name`, `item_id`, `quantity`, `reorder_quantity`, `quantity_unit_id`, `category_id`) VALUES
(1, '2021-06-23 03:46:39', '2022-07-31 23:31:30', 'top', 'ITE-000001', '5.00', '5.30', 2, 1),
(2, '2021-06-23 22:24:39', '2021-06-23 22:24:39', 'A4 paper', 'ITE-000002', '5.00', '5.00', 3, 3),
(3, '2021-06-23 22:26:51', '2021-06-23 22:26:51', 'per', 'ITE-000003', '1.00', '1.00', 1, 1),
(4, '2021-06-23 22:40:47', '2021-06-23 22:40:47', 'ops', 'ITE-000004', '0.00', '0.00', 4, 3),
(5, '2021-06-23 22:42:04', '2021-06-23 22:42:04', 'yosola', 'ITE-000005', '0.00', '0.00', 8, 1),
(6, '2021-06-29 06:07:39', '2021-06-29 06:07:39', 'tyi', 'ITE-000006', '0.00', '0.00', 10, 1),
(7, '2021-06-29 06:08:25', '2021-06-29 06:08:25', 'yu', 'ITE-000007', '2.00', '2.00', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager_approvals`
--

CREATE TABLE `manager_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `requisition_id` bigint(20) UNSIGNED NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `approval_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejection_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `manager_approvals`
--

INSERT INTO `manager_approvals` (`id`, `created_at`, `updated_at`, `manager_id`, `requisition_id`, `is_approved`, `approval_comment`, `rejection_comment`) VALUES
(1, '2022-07-31 21:05:35', '2022-07-31 21:05:35', 4, 1, 1, 'n', NULL),
(2, '2022-07-31 21:11:37', '2022-07-31 21:11:37', 4, 3, 0, NULL, 'j'),
(3, '2022-07-31 21:11:43', '2022-07-31 21:11:43', 4, 5, 1, 'j', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_03_142210_create_categories_table', 1),
(4, '2021_03_03_142329_create_units_table', 1),
(5, '2021_04_09_035955_create_quantity_units_table', 1),
(6, '2021_06_10_043325_create_designations_table', 1),
(7, '2022_07_29_235854_create_designation_types_table', 1),
(8, '2022_07_29_235947_create_users_table', 1),
(9, '2022_07_30_000042_create_items_table', 1),
(10, '2022_07_30_000116_create_requisitions_table', 1),
(11, '2022_07_30_000234_create_sh_tl_approvals_table', 1),
(12, '2022_07_30_000302_create_manager_approvals_table', 1),
(13, '2022_07_30_000330_create_ic_approvals_table', 1),
(14, '2022_07_30_000407_create_store_approvals_table', 1),
(15, '2021_04_10_104119_create_ic_approvals_table', 2),
(16, '2021_06_17_090755_create_store_approvals_table', 3),
(17, '2022_07_30_010805_update_requisitions_table', 3),
(18, '2022_07_30_011116_rename_unit_id', 3),
(19, '2022_07_31_232650_create_ic_approvals_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `quantity_units`
--

CREATE TABLE `quantity_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `quantity_units`
--

INSERT INTO `quantity_units` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Pack'),
(2, NULL, NULL, 'Roll'),
(3, NULL, NULL, 'Carton'),
(4, NULL, NULL, 'Ream'),
(5, NULL, NULL, 'Vial'),
(6, NULL, NULL, 'Bottles'),
(7, NULL, NULL, 'Tubes'),
(8, NULL, NULL, 'Bags'),
(9, NULL, NULL, 'Pieces'),
(10, NULL, NULL, 'Booklet');

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `req_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity_unit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `quantity`, `category_id`, `req_id`, `item_id`, `description`, `status`, `user_id`, `quantity_unit_id`, `created_at`, `updated_at`) VALUES
(1, '0.00', 1, 'REQ-000001', 1, 'm', NULL, 2, 2, '2022-07-31 19:34:29', '2022-07-31 19:34:29'),
(2, '8.00', 1, 'REQ-000002', 1, 'j', NULL, 2, 6, '2022-07-31 19:36:03', '2022-07-31 19:36:03'),
(3, '80.00', 3, 'REQ-000003', 2, 'u', NULL, 2, 3, '2022-07-31 19:36:03', '2022-07-31 19:36:03'),
(4, '9.00', 1, 'REQ-000004', 1, 'u', NULL, 2, 4, '2022-07-31 19:43:48', '2022-07-31 19:43:48'),
(5, '7.00', 3, 'REQ-000005', 2, 'k', NULL, 3, 3, '2022-07-31 20:53:09', '2022-07-31 20:53:09'),
(6, '8.00', 1, 'REQ-000006', 1, '7', NULL, 4, 5, '2022-07-31 21:32:02', '2022-07-31 21:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `sh_tl_approvals`
--

CREATE TABLE `sh_tl_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sh_tl_id` bigint(20) UNSIGNED NOT NULL,
  `requisition_id` bigint(20) UNSIGNED NOT NULL,
  `reporting_id` bigint(20) UNSIGNED NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `approval_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejection_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sh_tl_approvals`
--

INSERT INTO `sh_tl_approvals` (`id`, `created_at`, `updated_at`, `sh_tl_id`, `requisition_id`, `reporting_id`, `is_approved`, `approval_comment`, `rejection_comment`) VALUES
(1, '2022-07-31 20:13:16', '2022-07-31 20:13:16', 3, 1, 37, 1, 'u', NULL),
(2, '2022-07-31 20:14:11', '2022-07-31 20:14:11', 3, 2, 37, 1, 'u', NULL),
(3, '2022-07-31 20:51:45', '2022-07-31 20:51:45', 3, 3, 37, 1, 'k', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_approvals`
--

CREATE TABLE `store_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `requisition_id` bigint(20) UNSIGNED NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `approval_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_given` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `store_approvals`
--

INSERT INTO `store_approvals` (`id`, `created_at`, `updated_at`, `store_id`, `requisition_id`, `is_approved`, `approval_comment`, `quantity_given`) VALUES
(5, '2022-07-31 23:31:30', '2022-07-31 23:31:30', 6, 1, 1, 'j', 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `created_at`, `updated_at`, `unit`) VALUES
(1, NULL, NULL, 'ICT'),
(2, NULL, NULL, 'Engineering'),
(3, NULL, NULL, 'Admin and Logistics'),
(4, NULL, NULL, 'Operations'),
(5, NULL, NULL, 'Marketing'),
(6, NULL, NULL, 'Human resource'),
(7, NULL, NULL, 'Finance'),
(8, NULL, NULL, 'Store'),
(9, NULL, NULL, 'Phlebotomy'),
(10, NULL, NULL, 'Helpdesk'),
(11, NULL, NULL, 'Legal'),
(12, NULL, NULL, 'Pathology'),
(13, NULL, NULL, 'Login'),
(14, NULL, NULL, 'Quality Assurance'),
(15, NULL, NULL, 'Management'),
(16, NULL, NULL, 'Procurement'),
(17, NULL, NULL, 'Laboratory'),
(18, NULL, NULL, 'Ic');

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
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `designation_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reporting_designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reporting_designation_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `unit_id`, `designation_id`, `designation_type_id`, `reporting_designation_id`, `reporting_designation_type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oluyosola Afolabi', 'oluyosolaafolabi@gmail.com', NULL, '$2y$10$4Qudg.cG9nSI2ZDY6EiLceCbpqA..uDWA.LBzEbazBa1NmtXTH7Ia', 1, 1, NULL, NULL, NULL, NULL, '2022-07-30 07:18:27', '2022-07-30 07:18:27'),
(2, 'Officer', 'officer@gmail.com', NULL, '$2y$10$.UFFKZ.KLsqBihhP3.ci7eb08UqmHDQEjLfdBLtrA5hkxDZ2CTHde', 1, 1, NULL, 2, 1, NULL, '2022-07-31 19:06:01', '2022-07-31 19:06:01'),
(3, 'site head', 'sh@gmail.com', NULL, '$2y$10$MLIHhZ7mHYq8fDRPjSVx4uqPx2Jl1gpza52mHF1sUfj/8D/7Y2IjK', 1, 2, 1, 4, 37, NULL, '2022-07-31 19:58:17', '2022-07-31 19:58:17'),
(4, 'manager', 'manager@gmail.com', NULL, '$2y$10$Runi68lmzsa6mnU/9mS/meqAsfUIFEY.trFDa8bPjdjR.TvcmkF32', 9, 4, 37, 5, 45, NULL, '2022-07-31 20:28:13', '2022-07-31 20:28:13'),
(5, 'ic', 'ic@gmail.com', NULL, '$2y$10$3NmIm5b6HeahsI.7coKOO..o3ZbDd/XWRpApAcod64TMUFCEaqboy', 1, 5, 45, NULL, NULL, NULL, '2022-07-31 22:20:50', '2022-07-31 22:20:50'),
(6, 'store', 'store@gmail.com', NULL, '$2y$10$DayMWzWemPNd6dup.Cq6BO2dAB89z0leBxCl3P2DWEVnIoVg9V/eu', 1, 6, NULL, NULL, NULL, NULL, '2022-07-31 22:29:16', '2022-07-31 22:29:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_types`
--
ALTER TABLE `designation_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_types_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ic_approvals`
--
ALTER TABLE `ic_approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ic_approvals_ic_id_foreign` (`ic_id`),
  ADD KEY `ic_approvals_requisition_id_foreign` (`requisition_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_quantity_unit_id_foreign` (`quantity_unit_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `manager_approvals`
--
ALTER TABLE `manager_approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_approvals_manager_id_foreign` (`manager_id`),
  ADD KEY `manager_approvals_requisition_id_foreign` (`requisition_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `quantity_units`
--
ALTER TABLE `quantity_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisitions_item_id_foreign` (`item_id`),
  ADD KEY `requisitions_user_id_foreign` (`user_id`),
  ADD KEY `requisitions_unit_id_foreign` (`quantity_unit_id`);

--
-- Indexes for table `sh_tl_approvals`
--
ALTER TABLE `sh_tl_approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sh_tl_approvals_sh_tl_id_foreign` (`sh_tl_id`),
  ADD KEY `sh_tl_approvals_requisition_id_foreign` (`requisition_id`),
  ADD KEY `sh_tl_approvals_reporting_id_foreign` (`reporting_id`);

--
-- Indexes for table `store_approvals`
--
ALTER TABLE `store_approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_approvals_store_id_foreign` (`store_id`),
  ADD KEY `store_approvals_requisition_id_foreign` (`requisition_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_unit_id_foreign` (`unit_id`),
  ADD KEY `users_designation_id_foreign` (`designation_id`),
  ADD KEY `users_designation_type_id_foreign` (`designation_type_id`),
  ADD KEY `users_reporting_designation_id_foreign` (`reporting_designation_id`),
  ADD KEY `users_reporting_designation_type_id_foreign` (`reporting_designation_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation_types`
--
ALTER TABLE `designation_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_approvals`
--
ALTER TABLE `ic_approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manager_approvals`
--
ALTER TABLE `manager_approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quantity_units`
--
ALTER TABLE `quantity_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sh_tl_approvals`
--
ALTER TABLE `sh_tl_approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_approvals`
--
ALTER TABLE `store_approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designation_types`
--
ALTER TABLE `designation_types`
  ADD CONSTRAINT `designation_types_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ic_approvals`
--
ALTER TABLE `ic_approvals`
  ADD CONSTRAINT `ic_approvals_ic_id_foreign` FOREIGN KEY (`ic_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ic_approvals_requisition_id_foreign` FOREIGN KEY (`requisition_id`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_quantity_unit_id_foreign` FOREIGN KEY (`quantity_unit_id`) REFERENCES `quantity_units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `manager_approvals`
--
ALTER TABLE `manager_approvals`
  ADD CONSTRAINT `manager_approvals_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `manager_approvals_requisition_id_foreign` FOREIGN KEY (`requisition_id`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD CONSTRAINT `requisitions_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requisitions_unit_id_foreign` FOREIGN KEY (`quantity_unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requisitions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sh_tl_approvals`
--
ALTER TABLE `sh_tl_approvals`
  ADD CONSTRAINT `sh_tl_approvals_reporting_id_foreign` FOREIGN KEY (`reporting_id`) REFERENCES `designation_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sh_tl_approvals_requisition_id_foreign` FOREIGN KEY (`requisition_id`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sh_tl_approvals_sh_tl_id_foreign` FOREIGN KEY (`sh_tl_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store_approvals`
--
ALTER TABLE `store_approvals`
  ADD CONSTRAINT `store_approvals_requisition_id_foreign` FOREIGN KEY (`requisition_id`) REFERENCES `requisitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `store_approvals_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_designation_type_id_foreign` FOREIGN KEY (`designation_type_id`) REFERENCES `designation_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_reporting_designation_id_foreign` FOREIGN KEY (`reporting_designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_reporting_designation_type_id_foreign` FOREIGN KEY (`reporting_designation_type_id`) REFERENCES `designation_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
