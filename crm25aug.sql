-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 10:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `url`, `status`, `created_at`, `updated_at`, `logo`, `auth_key`, `phone`, `phone_tel`, `email`, `address`, `address_link`, `sign`) VALUES
(1, 'Design Gene Pro', 'https://www.designgene.com/', 1, '2022-07-15 13:44:28', '2022-08-12 13:54:27', '202207251528beni6.png', NULL, '09900900', '098908', 'design@gmail.com', 'nndkk dkskd alsk', 'https://www.kfcpakistan.com/', NULL),
(2, 'Design Cotton', 'https://laravel.com/', 1, '2022-07-18 13:28:09', '2022-08-22 10:25:59', '202208221525165955189686.png', NULL, '990009', '39949999', 'design@cotton.com', 'A-20023 sec 5-3 sdk', 'https://laravel.com/', NULL),
(3, 'The Web Planet', 'https://laravel.com/', 1, '2022-07-18 13:30:49', '2022-07-18 13:30:49', '202207181830port8.png', NULL, '09809890', '9080809', 'web@planet.com', 'A-2993 ske nkkka', 'https://laravel.com/', NULL),
(6, 'VapeBazaar', 'https://www.vapebazaar.pk/', 1, '2022-08-12 13:32:55', '2022-08-12 13:32:55', '20220812183216587762526 (1).png', NULL, '03392288', '92001999299', 'info@vapebazaar.com', 'Vapebazaar.PK Is One Of The Largest Online Vape Shop In Pakistan Since 2016 , Having The Largest Variety Of Vapes , Eliquids And Vape Accessories.', 'https://www.vapebazaar.pk/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_users`
--

CREATE TABLE `brand_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_users`
--

INSERT INTO `brand_users` (`user_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(20, 1, NULL, NULL),
(20, 2, NULL, NULL),
(19, 2, NULL, NULL),
(19, 1, NULL, NULL),
(19, 3, NULL, NULL),
(20, 3, NULL, NULL),
(19, 6, NULL, NULL),
(20, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_project`
--

CREATE TABLE `category_project` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_project`
--

INSERT INTO `category_project` (`project_id`, `category_id`, `created_at`, `updated_at`) VALUES
(23, 3, '2022-08-22 14:04:07', '2022-08-22 14:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `category_users`
--

CREATE TABLE `category_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_users`
--

INSERT INTO `category_users` (`user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(18, 8, NULL, NULL),
(19, 8, NULL, NULL),
(20, 8, NULL, NULL),
(22, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `last_name`, `email`, `contact`, `created_at`, `updated_at`, `user_id`, `status`, `brand_id`, `url`, `subject`, `service`, `message`) VALUES
(9, 'Johnson', 'Doe', 'johnson@doe.com', '02293338880', '2022-08-19 15:43:58', '2022-08-19 15:43:58', NULL, 1, 1, NULL, NULL, NULL, NULL),
(10, 'Brick', 'Kick', 'brick@kick.com', '09090909202', '2022-08-22 10:33:22', '2022-08-22 10:33:22', NULL, 1, 1, NULL, NULL, NULL, NULL),
(11, 'tetst', 'ttt', 'td@ml.com', '909089', '2022-08-22 12:51:20', '2022-08-22 12:51:20', NULL, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_files`
--

CREATE TABLE `client_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `task_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_check` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_categories`
--

CREATE TABLE `create_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` bigint(11) UNSIGNED DEFAULT NULL,
  `status` bigint(4) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_categories`
--

INSERT INTO `create_categories` (`id`, `name`, `service_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Logo', 3, 1, '2022-07-18 12:27:38', '2022-07-18 12:54:42'),
(3, 'Web Desiging', 1, 1, '2022-07-18 12:54:53', '2022-08-12 12:09:15'),
(4, 'Packaging', 3, 1, '2022-07-29 01:39:42', '2022-07-29 01:39:42'),
(5, 'Video Animation', NULL, 1, '2022-08-11 06:33:34', '2022-08-12 12:12:20'),
(6, 'Ecommerce', NULL, 1, '2022-08-12 12:10:39', '2022-08-12 12:10:39'),
(7, 'Web Development', NULL, 1, '2022-08-12 12:12:38', '2022-08-12 12:12:38'),
(8, 'Other', NULL, 1, '2022-08-12 12:12:48', '2022-08-12 12:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `short_name`, `sign`, `created_at`, `updated_at`) VALUES
(1, 'Dollar', 'USD', '$', '2022-07-15 13:43:39', '2022-07-15 13:43:39'),
(2, 'Euro', 'Euro', '€', '2022-08-10 15:37:56', '2022-08-10 15:37:56'),
(3, 'Canidian Dollar', 'Dollar', 'CA', '2022-08-10 15:37:56', '2022-08-10 15:37:56');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` bigint(20) UNSIGNED DEFAULT NULL,
  `service` bigint(20) UNSIGNED DEFAULT NULL,
  `package` bigint(20) UNSIGNED DEFAULT NULL,
  `currency` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice_date` date NOT NULL DEFAULT current_timestamp(),
  `sales_agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `name`, `email`, `contact`, `brand`, `service`, `package`, `currency`, `client_id`, `invoice_number`, `invoice_date`, `sales_agent_id`, `description`, `amount`, `payment_status`, `payment_type`, `custom_package`, `transaction_id`, `created_at`, `updated_at`) VALUES
(4, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 1190475, '2022-08-20', 1, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown', 2000, 1, 'one_time_payment', 'Custom Package', NULL, '2022-08-19 15:44:48', '2022-08-22 12:11:32'),
(5, 'Brick Kick', 'brick@kick.com', '09090909202', 1, 1, 1, 1, 10, 1621932, '2022-08-22', 18, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 4000, 0, 'one_time_payment', 'Pro Pack', NULL, '2022-08-22 10:37:56', '2022-08-22 10:37:56'),
(6, 'tetst', 'td@ml.com', '909089', NULL, 1, 2, 2, 11, 2585121, '2022-08-22', 1, 'lorem ipsum', 4000, 0, 'one_time_payment', 'custom protext', NULL, '2022-08-22 12:52:31', '2022-08-24 12:00:32'),
(7, 'tetst ttt', 'td@ml.com', '909089', 1, 3, 2, 1, 11, 6804096, '2022-08-22', 1, NULL, 4000, 1, 'one_time_payment', 'my pack', NULL, '2022-08-22 13:35:34', '2022-08-22 13:37:47'),
(8, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 3570231, '2022-08-25', 1, 'lorem ipsum', 3000, 0, 'one_time_payment', 'Custom Web Pack', NULL, '2022-08-24 15:31:09', '2022-08-24 15:31:09'),
(9, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 8324504, '2022-08-25', 1, 'lorem ipsum', 3000, 0, 'one_time_payment', 'Custom Web Pack', NULL, '2022-08-24 15:31:36', '2022-08-24 15:31:36'),
(10, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 8924747, '2022-08-25', 1, 'lorem ipsum', 3999, 0, 'one_time_payment', 'Custom Web Pack', NULL, '2022-08-24 15:33:17', '2022-08-24 15:33:17'),
(11, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 882326, '2022-08-25', 1, 'oklj', 2000, 0, 'one_time_payment', 'Pro Pack', NULL, '2022-08-24 15:33:40', '2022-08-24 15:33:40'),
(12, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 4516449, '2022-08-25', 1, 'lorem ipsum', 389, 0, 'one_time_payment', 'Test Package', NULL, '2022-08-24 15:35:16', '2022-08-24 15:35:16'),
(13, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 3401049, '2022-08-25', 1, 'lorem ipsum', 23999, 0, 'one_time_payment', 'nw', NULL, '2022-08-24 15:39:30', '2022-08-24 15:39:30'),
(14, 'Johnson Doe', 'johnson@doe.com', '02293338880', 1, 1, 1, 1, 9, 1052612, '2022-08-25', 1, 'lorem sdfsfklnsdf`', 4000, 0, 'one_time_payment', 'Pro pack', NULL, '2022-08-24 15:42:28', '2022-08-24 15:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `logo_forms`
--

CREATE TABLE `logo_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagery` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desired_design` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors_visual` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intended_use` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_overview` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_audience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filesname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(11) UNSIGNED NOT NULL,
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
(5, '2021_04_26_085235_add_is_employee_in_users_table', 1),
(6, '2021_04_30_053839_add_paid_to_users_table', 1),
(7, '2021_04_30_063838_add_seller__registration__colums_to_users', 1),
(8, '2021_04_30_222006_add_status_and_block_to_users_table', 1),
(9, '2021_05_15_085430_create_categories_table', 1),
(10, '2021_05_15_114723_create_brands_table', 1),
(11, '2021_05_17_021212_removing_extra_cols_from_users_table', 1),
(12, '2021_05_17_021442_add_brand_id_to_users_table', 1),
(13, '2021_05_17_050739_create_category_users_table', 1),
(14, '2021_05_17_221242_create_projects_table', 1),
(15, '2021_05_17_224857_create_clients_table', 1),
(16, '2021_05_18_231609_add_user_id_to_clients_table', 1),
(17, '2021_05_18_235551_add_status_id_to_clients_table', 1),
(18, '2021_05_30_023444_add_cost_to_projects_table', 1),
(19, '2021_05_30_023757_add_client_id_to_projects_table', 1),
(20, '2021_06_02_153024_create_category_project_table', 1),
(21, '2021_06_02_154432_add_updated_at_to_category_project_table', 1),
(22, '2021_06_02_155205_add_brand_id_to_projects_table', 1),
(23, '2021_06_02_174646_create_tasks_table', 1),
(24, '2021_06_02_175212_add_status_to_tasks_table', 1),
(25, '2021_06_03_125327_create_client_files_table', 1),
(26, '2021_06_03_143047_add_user_id_to_tasks_table', 1),
(27, '2021_06_04_150205_add_brand_id_to_tasks_table', 1),
(28, '2021_06_04_175834_create_sub_task_table', 1),
(29, '2021_06_04_181801_add_user_id_to_sub_task_table', 1),
(30, '2021_07_10_044235_add_logo_and_auth_key_to_brands_table', 1),
(31, '2021_07_10_052315_add_phone_and_email_and_address_to_brands_table', 1),
(32, '2021_07_10_061447_add_image_to_users_table', 1),
(33, '2021_07_12_134410_add_sign_to_brands_table', 1),
(34, '2021_07_12_144124_create_services_table', 1),
(35, '2021_07_12_194309_add_brand_id_to_clients_table', 1),
(36, '2021_07_12_222433_add_url_and_subject_and_services_and_message_to_clients_table', 1),
(37, '2021_07_12_230717_remove_unique_from_email_to_clients_table', 1),
(38, '2021_09_26_014422_create_brand_users_table', 1),
(39, '2021_09_26_053725_add_duedate_to_tasks_table', 1),
(40, '2021_09_26_062003_add_duedate_to_sub_task_table', 1),
(41, '2021_09_27_050444_add_user_id_status_to_client_files_table', 1),
(42, '2021_10_03_044823_create_packages_table', 1),
(43, '2021_10_03_055711_add_paid_status_packages_table', 1),
(44, '2021_10_03_062735_create_currencies_table', 1),
(45, '2021_10_03_065724_add_sign_to_packages_table', 1),
(46, '2021_10_04_221625_create_notifications_table', 1),
(47, '2022_07_12_191237_create_invoices_table', 1),
(48, '2022_07_15_155515_laratrust_setup_tables', 1),
(49, '2022_07_22_124127_create_statuses_table', 2),
(50, '2022_07_22_212017_create_messages_table', 3),
(51, '2022_07_25_173107_create_logo_forms_table', 4),
(52, '2022_07_25_193417_create_website_forms_table', 5),
(53, '2022_09_03_205724_laratrust_setup_tables', 6),
(54, '2022_08_02_150049_laratrust_setup_teams', 7),
(55, '2022_08_24_999999_add_active_status_to_users', 8),
(56, '2022_08_24_999999_add_avatar_to_users', 8),
(57, '2022_08_24_999999_add_dark_mode_to_users', 8),
(58, '2022_08_24_999999_add_messenger_color_to_users', 8),
(59, '2022_08_24_999999_create_favorites_table', 8),
(60, '2022_08_24_999999_create_messages_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` decimal(65,2) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cut_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_selling` tinyint(4) DEFAULT 0,
  `on_landing` tinyint(4) DEFAULT 0,
  `is_combo` tinyint(4) DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` bigint(11) UNSIGNED DEFAULT 1,
  `currencies_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `actual_price`, `price`, `cut_price`, `details`, `addon`, `description`, `best_selling`, `on_landing`, `is_combo`, `brand_id`, `service_id`, `created_at`, `updated_at`, `status`, `currencies_id`) VALUES
(1, 'graphic', 'graphic', '2000.00', '2000', '1800', 'test', 'test', 'this is testing pakcaage', 1, 1, 1, 1, 3, '2022-07-15 13:46:00', '2022-07-18 13:36:32', 1, 1),
(2, 'Web', 'web', '20000.00', '20000', '18000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'lorem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 1, 1, 3, 1, '2022-07-18 13:36:10', '2022-07-18 13:36:53', 1, 1),
(3, 'Extra Pack', NULL, NULL, '18000', NULL, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 0, 0, 0, 3, 1, '2022-07-29 02:25:51', '2022-07-29 02:27:56', 1, 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(13, 'client-access', 'Client Access', 'Client Access', '2022-08-06 09:59:30', '2022-08-06 09:59:30'),
(14, 'lead-access', 'Lead Access', 'Lead Access', '2022-08-06 10:00:02', '2022-08-06 10:00:02'),
(15, 'add-client', 'Add Client', 'Add Client', '2022-08-06 10:01:04', '2022-08-06 10:01:04'),
(16, 'show-client', 'Show Client', 'Show Client', '2022-08-06 10:01:26', '2022-08-06 10:01:26'),
(17, 'edit-client', 'Edit Client', 'Edit Client', '2022-08-06 10:01:45', '2022-08-06 10:01:45'),
(18, 'register-client', 'Register Client', 'Register Client', '2022-08-06 10:02:03', '2022-08-06 10:02:03'),
(19, 'show-lead', 'Show Lead', 'Show Lead', '2022-08-06 10:02:26', '2022-08-06 10:02:26'),
(20, 'create-lead', 'Create Lead', 'Create Lead', '2022-08-06 10:02:51', '2022-08-06 10:02:51'),
(22, 'edit-lead', 'Edit Lead', 'Edit Lead', '2022-08-06 10:03:35', '2022-08-09 01:12:54'),
(23, 'edit-task', 'Edit Task', 'Edit Task', '2022-08-09 06:19:08', '2022-08-09 06:19:08'),
(24, 'view-task', 'View Task', 'View Task', '2022-08-09 06:19:38', '2022-08-09 06:19:38'),
(25, 'delete-task', 'Delete Task', 'Delete Task', '2022-08-09 06:19:55', '2022-08-09 06:19:55'),
(26, 'task-access', 'Task Access', 'Task Access', '2022-08-09 06:20:37', '2022-08-09 06:20:37'),
(27, 'edit-project', 'Edit Project', 'Edit Project', '2022-08-09 06:21:43', '2022-08-09 06:21:43'),
(28, 'project-access', 'Project Access', 'Project Access', '2022-08-09 06:22:07', '2022-08-09 06:22:07'),
(31, 'general-access', 'General Access', 'General Access', '2022-08-09 06:28:30', '2022-08-09 06:28:30'),
(35, 'subtask-access', 'Subtask Access', 'Subtask Access', '2022-08-09 08:23:37', '2022-08-09 08:23:37'),
(36, 'create-subtask', 'Create Subtask', 'Create Subtask', '2022-08-09 08:27:38', '2022-08-09 08:27:38'),
(39, 'create-task', 'Create Task', 'Create Task', '2022-08-10 11:35:12', '2022-08-10 11:35:12'),
(43, 'project-assign', 'Project Assign', 'Project Assign', '2022-08-11 13:22:16', '2022-08-11 13:22:16'),
(44, 'edit-subtask', 'Edit Subtask', 'Edit Subtask', '2022-08-11 15:47:49', '2022-08-11 15:47:49'),
(45, 'delete-subtask', 'Delete Subtask', 'Delete Subtask', '2022-08-11 15:48:24', '2022-08-11 15:48:24'),
(46, 'create-project', 'Create Project', 'Create Project', '2022-08-17 13:18:52', '2022-08-17 13:18:52'),
(47, 'delete-project', 'Delete Project', 'Delete Project', '2022-08-18 10:27:04', '2022-08-18 10:27:04'),
(50, 'edit-brief', 'Edit Brief', 'Edit Brief', '2022-08-22 14:38:28', '2022-08-22 14:38:28'),
(51, 'show-brief', 'Show Brief', 'Show Brief', '2022-08-22 14:38:39', '2022-08-22 14:38:39'),
(52, 'brief-access', 'Brief Access', 'Brief Access', '2022-08-22 14:38:50', '2022-08-22 14:38:50'),
(53, 'add-logobrief', 'Add Logobrief', 'Add Logobrief', '2022-08-24 10:26:33', '2022-08-24 10:26:33'),
(54, 'add-webbrief', 'Add Webbrief', 'Add Webbrief', '2022-08-24 11:38:49', '2022-08-24 11:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(31, 1),
(35, 1),
(36, 1),
(39, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(50, 1),
(51, 1),
(52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `product_status` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `breif_id` bigint(11) UNSIGNED NOT NULL,
  `breif_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `status`, `product_status`, `user_id`, `created_at`, `updated_at`, `cost`, `client_id`, `brand_id`, `breif_id`, `breif_type`) VALUES
(23, 'test', 'lorem ipsum', 1, 1, 19, '2022-08-22 14:04:07', '2022-08-22 14:04:07', '€4000', 11, 1, 9, 'webbreif');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2022-08-06 09:57:05', '2022-08-06 09:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`, `team_id`) VALUES
(1, 1, 'App\\Models\\User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `form`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', NULL, '2022-07-15 13:27:30', '2022-07-15 13:29:16'),
(3, 'Graphic', NULL, '2022-07-18 13:34:38', '2022-07-18 13:34:50'),
(4, '2D/3D animation', NULL, '2022-07-18 13:35:06', '2022-07-18 13:35:06'),
(5, 'Software development', NULL, '2022-07-18 13:35:19', '2022-07-18 13:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2022-07-22 15:36:15', '2022-07-22 15:36:15'),
(2, 'Deactive', '2022-07-22 15:36:15', '2022-07-22 15:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `sub_task`
--

CREATE TABLE `sub_task` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `category_id`, `description`, `created_at`, `updated_at`, `status`, `user_id`, `brand_id`, `duedate`) VALUES
(7, 23, 3, 'this is task', '2022-08-22 14:17:39', '2022-08-22 14:17:39', 0, 19, 1, '2022-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `is_employee` tinyint(1) DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `block` tinyint(4) NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_employee`, `last_name`, `contact`, `status`, `block`, `brand_id`, `image`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'farjad', 'farjad.akbar@toobitech.com', NULL, '$2y$10$bdxguP1d4GWlsIEjlwoGU.ftVFUbkpCEumEKUDUQw0RbuhNUyX9qG', 'i0lLaVG6odb31H3F5WqInFL4zoNAeXaCunDcKp6FekzK24vsKYZMFWCjupv1', '2022-07-15 13:25:10', '2022-08-24 14:18:12', NULL, NULL, '03449349', 1, 0, 2, NULL, 0, 'avatar.png', 0, '#2180f3'),
(18, 'Aqib', 'aqib@toobitech.com', NULL, '$2y$10$53y0URn.1UAH76PQKs3Sv.xuC0DnsD1EDsHFc7ixpgN45poTq1bN.', NULL, '2022-08-22 10:23:25', '2022-08-22 10:23:25', NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 'avatar.png', 0, '#2180f3'),
(19, 'Abeer', 'abeer@toobitech.com', NULL, '$2y$10$/GzDSwovVJHIyiaxszH2yu9m/2nyrND5eBuV3q0WD7DgeF9bQIU/u', NULL, '2022-08-22 10:24:05', '2022-08-22 10:24:05', NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 'avatar.png', 0, '#2180f3'),
(20, 'Farhad', 'farhad@toobitech.com', NULL, '$2y$10$HOowMBG9g45YdNpscuojreXHe1rmYF30vuIJybKQKb5QF8gtFNMdS', NULL, '2022-08-22 10:24:44', '2022-08-22 10:24:44', NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 'avatar.png', 0, '#2180f3'),
(21, 'tetst', 'td@ml.com', NULL, '$2y$10$WltU94FGsOwcY9QOad4AgOR.Y26DBYbDTUGPW0vB7j/48wDNmEr0O', NULL, '2022-08-22 13:03:44', '2022-08-22 13:03:44', 1, NULL, NULL, 1, 0, NULL, NULL, 0, 'avatar.png', 0, '#2180f3'),
(22, 'farjad', 'farjad@gmail.com', NULL, '$2y$10$CvXidNtU84mdfVXhJdTQL.1YGB6ioq2v2q.axdDK6EMWwDs0OFrJ2', NULL, '2022-08-22 13:46:46', '2022-08-22 13:46:46', NULL, NULL, NULL, 1, 0, NULL, NULL, 0, 'avatar.png', 0, '#2180f3');

-- --------------------------------------------------------

--
-- Table structure for table `website_forms`
--

CREATE TABLE `website_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_target` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_target` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desired_reaction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competitor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `design` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `functionality` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postive_aspects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negative_aspects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `traffic_levels` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_performance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currrent_hosting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negative_hosting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filesname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(11) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_forms`
--

INSERT INTO `website_forms` (`id`, `website_title`, `purpose`, `objective`, `project_target`, `brand_target`, `desired_reaction`, `competitor`, `design`, `functionality`, `postive_aspects`, `negative_aspects`, `traffic_levels`, `current_performance`, `currrent_hosting`, `negative_hosting`, `filesname`, `additional_information`, `user_id`, `invoice_id`, `brand_id`, `agent_id`, `created_at`, `updated_at`) VALUES
(9, 'Lorem Ipsum', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', NULL, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', NULL, NULL, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', '[]', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 11, 6, 1, 1, '2022-08-22 13:25:38', '2022-08-22 13:25:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_status_foreign` (`status`);

--
-- Indexes for table `brand_users`
--
ALTER TABLE `brand_users`
  ADD KEY `brand_users_user_id_foreign` (`user_id`),
  ADD KEY `brand_users_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `category_project`
--
ALTER TABLE `category_project`
  ADD KEY `category_project_project_id_foreign` (`project_id`),
  ADD KEY `category_project_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_users`
--
ALTER TABLE `category_users`
  ADD KEY `category_users_user_id_foreign` (`user_id`),
  ADD KEY `category_users_category_id_foreign` (`category_id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`),
  ADD KEY `clients_brand_id_foreign` (`brand_id`),
  ADD KEY `clients_status_id_foreign` (`status`);

--
-- Indexes for table `client_files`
--
ALTER TABLE `client_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_files_task_id_foreign` (`task_id`),
  ADD KEY `client_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `create_categories`
--
ALTER TABLE `create_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_service_id` (`service_id`),
  ADD KEY `category_status_id` (`status`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_brand_foreign` (`brand`),
  ADD KEY `invoices_service_foreign` (`service`),
  ADD KEY `invoices_package_foreign` (`package`),
  ADD KEY `invoices_currency_foreign` (`currency`),
  ADD KEY `invoices_client_id_foreign` (`client_id`),
  ADD KEY `invoices_sales_agent_id_foreign` (`sales_agent_id`);

--
-- Indexes for table `logo_forms`
--
ALTER TABLE `logo_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_brand_key` (`brand_id`),
  ADD KEY `foreign_invoice_key` (`invoice_id`),
  ADD KEY `foreign_agent_key` (`agent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_brand_id_foreign` (`brand_id`),
  ADD KEY `packages_service_id_foreign` (`service_id`),
  ADD KEY `packages_currencies_id_foreign` (`currencies_id`),
  ADD KEY `packages_status_id_foreign` (`status`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD UNIQUE KEY `permission_user_user_id_permission_id_user_type_team_id_unique` (`user_id`,`permission_id`,`user_type`,`team_id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`),
  ADD KEY `projects_client_id_foreign` (`client_id`),
  ADD KEY `projects_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD UNIQUE KEY `role_user_user_id_role_id_user_type_team_id_unique` (`user_id`,`role_id`,`user_type`,`team_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_task`
--
ALTER TABLE `sub_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_task_task_id_foreign` (`task_id`),
  ADD KEY `sub_task_user_id_foreign` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`),
  ADD KEY `tasks_category_id_foreign` (`category_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `website_forms`
--
ALTER TABLE `website_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_web_brand_key` (`brand_id`),
  ADD KEY `foreign_web_agent_key` (`agent_id`),
  ADD KEY `foreign_web_invoice_key` (`invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_files`
--
ALTER TABLE `client_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_categories`
--
ALTER TABLE `create_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `logo_forms`
--
ALTER TABLE `logo_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_task`
--
ALTER TABLE `sub_task`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `website_forms`
--
ALTER TABLE `website_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brand_status_foreign` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `brand_users`
--
ALTER TABLE `brand_users`
  ADD CONSTRAINT `brand_users_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_project`
--
ALTER TABLE `category_project`
  ADD CONSTRAINT `category_project_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `create_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_project_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_users`
--
ALTER TABLE `category_users`
  ADD CONSTRAINT `category_users_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `create_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `clients_status_id_foreign` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `client_files`
--
ALTER TABLE `client_files`
  ADD CONSTRAINT `client_files_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `client_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `create_categories`
--
ALTER TABLE `create_categories`
  ADD CONSTRAINT `category_service_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `category_status_id` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_brand_foreign` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `invoices_currency_foreign` FOREIGN KEY (`currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `invoices_package_foreign` FOREIGN KEY (`package`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `invoices_sales_agent_id_foreign` FOREIGN KEY (`sales_agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `invoices_service_foreign` FOREIGN KEY (`service`) REFERENCES `services` (`id`);

--
-- Constraints for table `logo_forms`
--
ALTER TABLE `logo_forms`
  ADD CONSTRAINT `foreign_agent_key` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `foreign_brand_key` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `foreign_invoice_key` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_currencies_id_foreign` FOREIGN KEY (`currencies_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_status_id_foreign` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `projects_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_task`
--
ALTER TABLE `sub_task`
  ADD CONSTRAINT `sub_task_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `sub_task_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `tasks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `create_categories` (`id`),
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `website_forms`
--
ALTER TABLE `website_forms`
  ADD CONSTRAINT `foreign_web_agent_key` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `foreign_web_brand_key` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_web_invoice_key` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
