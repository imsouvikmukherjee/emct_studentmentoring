-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 11:52 AM
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
-- Database: `studentmentoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_mentor`
--

CREATE TABLE `assigned_mentor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `mentee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_mentor`
--

INSERT INTO `assigned_mentor` (`id`, `mentor_id`, `mentee_id`, `created_at`, `updated_at`) VALUES
(103, 813, 745, '2024-12-13 00:40:36', NULL),
(104, 813, 742, '2024-12-13 00:40:36', NULL),
(105, 813, 737, '2024-12-13 00:40:36', NULL),
(106, 813, 744, '2024-12-13 00:40:36', NULL),
(107, 813, 738, '2025-01-23 09:44:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com|127.0.0.1', 'i:2;', 1734680088),
('admin@gmail.com|127.0.0.1:timer', 'i:1734680088;', 1734680088),
('ecmt0000@gmail.com|127.0.0.1', 'i:3;', 1737629832),
('ecmt0000@gmail.com|127.0.0.1:timer', 'i:1737629832;', 1737629832),
('mukherjeesouvik2041@gmail.com|127.0.0.1', 'i:2;', 1738253660),
('mukherjeesouvik2041@gmail.com|127.0.0.1:timer', 'i:1738253660;', 1738253660),
('sandipchan@gmail.com|127.0.0.1', 'i:1;', 1737629882),
('sandipchan@gmail.com|127.0.0.1:timer', 'i:1737629882;', 1737629882);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `description`) VALUES
(13, 'BBA', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated.'),
(14, 'MCA', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated.'),
(16, 'BMLT', NULL),
(17, 'BCA', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated.'),
(20, 'MSC', NULL),
(21, 'BBA HR', NULL),
(22, 'BA', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated.');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_24_083305_create_department_table', 2),
(5, '2024_10_24_162557_create_subject_table', 3),
(6, '2024_11_05_061103_create_student_details_table', 4),
(8, '2024_11_17_074346_create_assigned_mentor_table', 5),
(9, '2024_12_13_075127_create_password_resets_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`) VALUES
(29, 'dewanjeeswapnil@gmail.com', 'Kug58Lgzig5Qqj2rb0fX8LVLKSz4HSiiId2NUrONy8BMLFv9CWw5Ey8ynqMwLecU'),
(31, 'ecmt-22-075@ecmt.in', 'LJfvaBBHxtO7QKrBCPN4VO8NrmjDuRACm0vjs8BkyOwCRUvfR5DJconxDtmCWXpc'),
(32, 'ecmt-22-075@ecmt.in', 'gz5yNLQJ34RM4tDx0qmC1FW6CKdQauj2vUNSRnmslG7WCkKerYFPgaZoLd04omm8'),
(33, 'ecmt-22-075@ecmt.in', '7o22iTxcDwGyNQCgndNJ1QZEllnzT8OJn01Udy1K9ydU5ovNiAZHbW5beboskGnC'),
(34, 'ecmt-22-075@ecmt.in', 'rOwA6gWVi4bLLuhpA2u96HLwPbhH6dfgeymZSOzdtC7ufJvMw78J27mLy5a8GxlQ'),
(35, 'ecmt-22-075@ecmt.in', 'j6WCrkn6Z4zhTt9zYva123t5KJTqVhjdU9cQlbyOE3Gq9AxklzzCivhEffzxE0bu');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
('ROIDmPgxSuJyCVsoY5hptw2c1nRGfmDkUxjEoSld', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNVFWUUNkUnlFSzNWenhGYXhPVDExMlR1WG50cEpMRGMxQkc0aXRsZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2FkZC1tZW50ZWVzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742121893);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `aadhaar_no` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `guardian_mobile` varchar(255) DEFAULT NULL,
  `relation_with_guardian` varchar(255) DEFAULT NULL,
  `residence_status` varchar(255) DEFAULT NULL,
  `student_address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `alternate_mobile` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `roll_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `user_id`, `session`, `aadhaar_no`, `father_name`, `mother_name`, `dob`, `nationality`, `category`, `sex`, `blood_group`, `religion`, `guardian_name`, `guardian_address`, `guardian_mobile`, `relation_with_guardian`, `residence_status`, `student_address`, `state`, `district`, `pin`, `alternate_mobile`, `reg_no`, `roll_no`, `created_at`, `updated_at`) VALUES
(633, 665, '2023-24', '123456789876', 'KONU 1', 'TYFFG', '2003-01-12', 'INDIAN', 'STUDENT', 'MALE', 'B+', 'HINDU', 'KONU', 'NEW BARRACKPUR', '9876543210', 'FATHER', 'HOSTEL', 'NEW BARRACKPUR', 'WEST BENGAL', 'NORTH 24 PARGANA', '700131', '9876543210', NULL, NULL, '2024-11-06 08:36:27', '2024-11-10 18:30:00'),
(634, 666, '2023-24', '123456789875', 'HODOL', 'HDCF', '2003-01-04', 'INDIAN', 'STUDENT', 'MALE', 'B+', 'HINDU', 'HODOL', 'MADHYAMGRAM', '9876543212', 'FATHER', 'HOME', 'MADHYAMGRAM', 'WEST BENGAL', 'NORTH 24 PARGANA', '700130', '9876543212', NULL, NULL, '2024-11-06 08:36:28', '2024-11-06 08:36:28'),
(635, 667, '2023-24', '123456789874', 'CHINTU', 'BHCVHG', '2003-01-05', 'INDIAN', 'STUDENT', 'MALE', 'B+', 'HINDU', 'CHINTU', 'NEW BARRACKPUR ', '9876543211', 'FATHER', 'HOSTEL', 'NEW BARRACKPUR ', 'WEST BENGAL', 'NORTH 24 PARGANA', '700129', '9876543211', NULL, NULL, '2024-11-06 08:36:28', '2024-11-06 08:36:28'),
(637, 669, '2023-24', '123456789872', 'LANU', 'HVUH', '2003-01-07', 'INDIAN', 'STUDENT', 'MALE', 'B+', 'HINDU', 'LANU', 'NEW BARRACKPUR ', '9876543214', 'FATHER', 'HOSTEL', 'NEW BARRACKPUR ', 'WEST BENGAL', 'NORTH 24 PARGANA', '700127', '9876543214', NULL, NULL, '2024-11-06 08:36:29', '2024-11-06 08:36:29'),
(639, 671, '2023-24', '123456789877', 'LOLTU', 'NGV', '2003-01-09', 'INDIAN', 'STUDENT', 'FEMALE', 'B+', 'HINDU', 'LOLTU', 'NEW BARRACKPUR ', '9876543215', 'FATHER', 'HOSTEL', 'NEW BARRACKPUR ', 'WEST BENGAL', 'NORTH 24 PARGANA', '700125', '9876543215', NULL, NULL, '2024-11-06 08:36:29', '2024-11-06 08:36:29'),
(640, 672, '2023-24', '123456789878', 'PANDU', 'HUDDD', '2003-01-10', 'INDIAN', 'STUDENT', 'MALE', 'B+', 'HINDU', 'PANDU', 'MADHYAMGRAM', '9876543229', 'FATHER', 'HOME', 'MADHYAMGRAM', 'WEST BENGAL', 'NORTH 24 PARGANA', '700124', '9876543229', NULL, NULL, '2024-11-06 08:36:29', '2024-11-06 08:36:29'),
(650, 682, '2022-26', '101101101101', 'Demo Father', 'Demo Mother', '2004-06-05', 'Indian', 'SC', 'Male', 'O-', 'Hindu', 'Demo Father', 'Kolkata', '1111111111', 'Father', 'Hosteler', 'kolkata', 'West bengal', 'District 1', '743272', '2222222222', NULL, NULL, '2024-11-06 09:20:13', '2024-11-06 09:20:13'),
(651, 683, '2023-24', '456789012345', 'Mahesh Gupta', 'Sita Gupta', '2007-05-15', 'Indian', 'General', 'F', 'AB+', 'Hindu', 'Anil Gupta', '234 Street, Lucknow', '6543210987', 'Uncle', 'Resident', '456 Lane, Lucknow', 'Uttar Pradesh', 'Lucknow', '226001', '6543210985', NULL, NULL, '2024-11-06 09:20:14', '2024-11-06 09:20:14'),
(662, 694, '2023-24', '178901234156', 'Rajesh Verma', 'Sunita Verma', '2005-04-15', 'Indian', 'General', 'M', 'B+', 'Hindu', 'Mohan Verma', '123, Street Rd, City', '9123456789', 'Uncle', 'Day Scholar', '456, Main St, City', 'Maharashtra', 'Mumbai', '400001', '9876543211', NULL, NULL, '2024-11-06 10:19:52', '2024-11-06 10:19:52'),
(663, 695, '2023-24', '178901234156', 'Arjun Shah', 'Kavita Shah', '2006-09-22', 'Indian', 'OBC', 'F', 'A+', 'Hindu', 'Seema Shah', '789, Avenue Rd, City', '9323456781', 'Aunt', 'Hostel', '890, Hill Rd, City', 'Gujarat', 'Ahmedabad', '380001', '9876543221', NULL, NULL, '2024-11-06 10:19:53', '2024-11-06 10:19:53'),
(665, 697, '2023-24', '178901234156', 'Ravi Nair', 'Latha Nair', '2006-08-12', 'Indian', 'General', 'F', 'AB+', 'Hindu', 'Sunil Nair', '234, Station Rd, City', '9423456783', 'Uncle', 'Hostel', '768, Lake St, City', 'Kerala', 'Kochi', '682001', '9876543241', NULL, NULL, '2024-11-06 10:19:54', '2024-11-06 10:19:54'),
(668, 700, '2023-24', '178901234156', 'Manoj Mehta', 'Asha Mehta', '2006-10-29', 'Indian', 'General', 'M', 'O+', 'Hindu', 'Naveen Mehta', '456, Ring Rd, City', '9223456786', 'Uncle', 'Day Scholar', '243, Sunset Rd, City', 'Delhi', 'New Delhi', '110001', '9876543271', NULL, NULL, '2024-11-06 10:19:55', '2024-11-06 10:19:55'),
(672, 704, '2023-24', '178901234156', 'Sagar Patil 1', 'Meera Patil', '2006-06-14', 'Indian', 'OBC', 'M', 'A+', 'Hindu', 'Raj Patil', '143, Circle Rd, City', '9723456782', 'Uncle', 'Day Scholar', '234, Oak Rd, City', 'Maharashtra', 'Thane', '400601', '9876543311', NULL, NULL, '2024-11-06 10:19:57', '2024-11-10 18:30:00'),
(673, 705, '2023-24', '178901234156', 'Suresh Das', 'Renu Das', '2006-04-21', 'Indian', 'SC', 'F', 'B+', 'Hindu', 'Vikash Das', '678, Street Rd, City', '9823456783', 'Uncle', 'Hostel', '123, Bridge Rd, City', 'West Bengal', 'Kolkata', '700001', '9876543321', NULL, NULL, '2024-11-06 10:19:57', '2024-11-06 10:19:57'),
(692, 728, '2022-25', '710146007616', 'Sanjib Chandra', 'Rupa Chandra', '2004-08-04', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Sanjib Chandra', 'Rajarhat', '8900465621', 'Father', 'Home', 'Rajarhat', 'West Bengal', 'North 24prgs', '245637', NULL, NULL, NULL, '2024-11-15 02:43:48', '2024-11-15 02:43:48'),
(693, 729, '2022-26', '846531500942', 'Rajeeb Ghosh', 'Ankita Ghosh', '2003-11-08', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'Rajeeb Ghosh', 'Rajarhat', '7603037633', 'Father', 'Hostel', 'Chiner park', 'West Bengal', 'North 24prgs', '465874', NULL, NULL, NULL, '2024-11-15 02:43:48', '2024-11-15 02:43:48'),
(694, 730, '2022-27', '982916994268', 'Rajesh Saha', 'Sumana Saha', '2003-02-11', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Rajesh Saha', 'Sodepur', '6305609645', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '686111', NULL, NULL, NULL, '2024-11-15 02:43:48', '2024-11-15 02:43:48'),
(695, 731, '2022-28', '111902487594', 'Sambhu Pal', 'Gopa Pal', '2002-05-17', 'Indian', 'General', 'male', 'A+', 'Hindu', 'Sambhu Pal', 'Dumdum', '8008181657', 'Father', 'Home', 'Dumdum', 'West Bengal', 'North 24prgs', '906348', NULL, NULL, NULL, '2024-11-15 02:43:49', '2024-11-15 02:43:49'),
(696, 732, '2022-29', '125587980920', 'Damadar Das', 'Purbasha Das', '2001-08-20', 'Indian', 'General', 'female', 'B+', 'Hindu', 'Damadar Das', 'Baguihati', '9710753669', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24prgs', '126585', NULL, NULL, NULL, '2024-11-15 02:43:49', '2024-11-15 02:43:49'),
(700, 736, '2022-25', '710146007616', 'Sanjib Chandra', 'Rupa Chandra', '2004-08-04', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Sanjib Chandra', 'Rajarhat', '8900465621', 'Father', 'Home', 'Rajarhat', 'West Bengal', 'North 24prgs', '245637', NULL, NULL, NULL, '2024-11-15 02:56:02', '2024-11-15 02:56:02'),
(701, 737, '2022-26', '710146007616', 'Rajeeb Ghosh', 'Ankita Ghosh', '2003-11-08', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'Rajeeb Ghosh', 'Rajarhat', '7603037633', 'Father', 'Hostel', 'Chiner park', 'West Bengal', 'North 24prgs', '465874', NULL, NULL, NULL, '2024-11-15 02:56:03', '2024-11-15 02:56:03'),
(702, 738, '2022-26', '710146007616', 'Rajesh Saha', 'Sumana Saha', '2003-02-11', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Rajesh Saha', 'Sodepur', '6305609645', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '686111', NULL, NULL, NULL, '2024-11-15 02:56:03', '2024-11-15 02:56:03'),
(703, 739, '2022-25', '710146007616', 'Sambhu Pal', 'Gopa Pal', '2002-05-17', 'Indian', 'General', 'male', 'A+', 'Hindu', 'Sambhu Pal', 'Dumdum', '8008181657', 'Father', 'Home', 'Dumdum', 'West Bengal', 'North 24prgs', '906348', NULL, NULL, NULL, '2024-11-15 02:56:03', '2024-11-15 02:56:03'),
(704, 740, '2022-26', '710146007616', 'Damadar Das', 'Purbasha Das', '2001-08-20', 'Indian', 'OBC', 'female', 'B+', 'Hindu', 'Damadar Das', 'Baguihati', '9710753669', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24prgs', '126585', NULL, NULL, NULL, '2024-11-15 02:56:04', '2024-11-15 02:56:04'),
(705, 741, '2022-25', '710146007616', 'Sanjib Chandra', 'Rupa Chandra', '2004-08-04', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Sanjib Chandra', 'Rajarhat', '8900465621', 'Father', 'Home', 'Rajarhat', 'West Bengal', 'North 24prgs', '245637', NULL, NULL, NULL, '2024-11-15 02:56:04', '2024-11-15 02:56:04'),
(706, 742, '2022-25', '710146007616', 'Rajeeb Ghosh', 'Ankita Ghosh', '2003-11-08', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'Rajeeb Ghosh', 'Rajarhat', '7603037633', 'Father', 'Hostel', 'Chiner park', 'West Bengal', 'North 24prgs', '465874', NULL, NULL, NULL, '2024-11-15 02:56:04', '2024-11-15 02:56:04'),
(707, 743, '2023-27', '710146007616', 'Rajesh Saha', 'Sumana Saha', '2003-02-11', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Rajesh Saha', 'Sodepur', '6305609645', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '686111', NULL, NULL, NULL, '2024-11-15 02:56:05', '2024-11-15 02:56:05'),
(708, 744, '2022-25', '710146007616', 'Sambhu Pal', 'Gopa Pal', '2002-05-17', 'Indian', 'OBC', 'female', 'A+', 'Hindu', 'Sambhu Pal', 'Dumdum', '8008181657', 'Father', 'Home', 'Dumdum', 'West Bengal', 'North 24prgs', '906348', NULL, NULL, NULL, '2024-11-15 02:56:05', '2024-11-18 18:30:00'),
(709, 745, '2023-28', '710146007616', 'Damadar Das', 'Purbasha Das', '2001-08-20', 'Indian', 'General', 'female', 'B+', 'Hindu', 'Damadar Das', 'Baguihati', '9710753669', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24prgs', '126585', NULL, NULL, NULL, '2024-11-15 02:56:06', '2024-11-15 02:56:06'),
(710, 746, '2022-25', '710146007616', 'Rupam Dey 1', 'Runki Dey', '2000-11-23', 'Indian', 'General', 'female', 'AB+', 'Hindu', 'Rupam Dey', 'Rajarhat', '7413325681', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '346822', NULL, NULL, NULL, '2024-11-15 02:56:06', '2024-11-14 18:30:00'),
(711, 747, '2022-25', '710146007616', 'Sarnajay Ganguli', 'Sonali Ganguli', '2000-02-27', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Sarnajay Ganguli', 'Sodepur', '8115897693', 'Father', 'Hostel', 'Dumdum', 'West Bengal', 'North 24prgs', '267059', NULL, NULL, NULL, '2024-11-15 02:56:07', '2024-11-15 02:56:07'),
(712, 748, '2023-27', '710146007616', 'Ranjeet Banik', 'Soumita Banik', '1999-06-02', 'Indian', 'OBC', 'male', 'A+', 'Hindu', 'Ranjeet Banik', 'Dumdum', '9818469705', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24prgs', '187296', NULL, NULL, NULL, '2024-11-15 02:56:07', '2024-11-15 02:56:07'),
(713, 749, '2024-28', '710146007616', 'Subhajit Sarkar', 'Ranchita Sarkar', '1998-09-05', 'Indian', 'General', 'male', 'B+', 'Hindu', 'Subhajit Sarkar', 'Baguihati', '6521041717', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '107533', NULL, NULL, NULL, '2024-11-15 02:56:07', '2024-11-15 02:56:07'),
(714, 750, '2024-28', '710146007616', 'bijoy Das', 'Sanjana Das', '1997-12-09', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'bijoy Das', 'Rajarhat', '8223613729', 'Father', 'Home', 'Boshirhat', 'West Bengal', 'North 24prgs', '277790', NULL, NULL, NULL, '2024-11-15 02:56:08', '2024-11-15 02:56:08'),
(715, 751, '2024-28', '710146007616', 'Ranajoy Pal', 'Ruposhree Pal', '2001-12-06', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Ranajoy Pal', 'Sodepur', '7926185741', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24prgs', '519934', NULL, NULL, NULL, '2024-11-15 02:56:08', '2024-11-15 02:56:08'),
(716, 752, '2023-26', '710146007616', 'Santan Dewanjee', 'Manami Dewanjee', '2001-12-07', 'Indian', 'OBC', 'male', 'A+', 'Hindu', 'Santan Dewanjee', 'Dumdum', '7628757753', 'Father', 'Hostel', 'Sodepur', 'West Bengal', 'North 24prgs', '131756', NULL, NULL, NULL, '2024-11-15 02:56:08', '2024-11-15 02:56:08'),
(717, 753, '2024-27', '710146007616', 'Souvijit Mukherjee', 'Anamika Mukherjee', '2001-10-08', 'Indian', 'General', 'male', 'B+', 'Hindu', 'Souvijit Mukherjee', 'Baguihati', '7331329765', 'Father', 'Home', 'Dumdum', 'West Bengal', 'North 24prgs', '211519', NULL, NULL, NULL, '2024-11-15 02:56:09', '2024-11-15 02:56:09'),
(718, 754, '2023-26', '710146007616', 'Abhisekh Biswas', 'Tanushree Biswas', '2001-12-09', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'Abhisekh Biswas', 'Rajarhat', '7033901777', 'Father', 'Home', 'Barast', 'West Bengal', 'North 24prgs', '291282', NULL, NULL, NULL, '2024-11-15 02:56:09', '2024-11-15 02:56:09'),
(719, 755, '2024-28', '710146007616', 'Aranya Banerjee', 'Sathi Banerjee', '2001-12-07', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Aranya Banerjee', 'Sodepur', '6736473789', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '371045', NULL, NULL, NULL, '2024-11-15 02:56:09', '2024-11-15 02:56:09'),
(734, 771, '2022-25', '346811110000', 'Demo Father', 'Demo Mother ', '2004-10-12', 'Indian', 'SC', 'Male', 'AB+', 'Hindi', 'Demo Father', 'Kolkata', '1111111111', 'Father', 'Hosteler', 'Barasat', 'West Bengal', '24 PGS (N)', '563214', '2323232323', NULL, NULL, '2024-11-16 01:07:59', '2024-11-16 01:07:59'),
(735, 772, '2022-25', '346811110000', 'Demo Father', 'Demo Mother ', '2004-11-12', 'Indian', 'ST', 'Male', 'O+', 'Hindu', 'Demo Father', 'Kolkata', '1111111111', 'Father', 'Hosteler', 'Barasat', 'West Bengal', '24 PGS (N)', '568111', '3636363636', NULL, NULL, '2024-11-16 01:07:59', '2024-11-16 01:07:59'),
(736, 773, '2022-25', '346811110000', 'Demo Father', 'Demo Mother ', '2004-03-08', 'Indian', 'General', 'Female', 'B+', 'Hindu', 'Demo Father', 'Kolkata', '1212121212', 'Father', 'Room', 'Barasat', 'West Bengal', '24 PGS (N)', '569412', '2364580001', NULL, NULL, '2024-11-16 01:07:59', '2024-11-16 01:07:59'),
(737, 774, '2022-25', '710146007616', 'Rajeeb Ghosh', 'Ankita Ghosh', '2002-05-17', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Rajeeb Ghosh', 'Bhidhanagar', '7603037633', 'Father', 'Home', 'Chiner park', 'West Bengal', 'North 24prgs', '456210', NULL, NULL, NULL, '2024-11-16 01:16:48', '2024-11-16 01:16:48'),
(738, 775, '2022-26', '846531500942', 'Rajesh Saha', 'Sumana Saha', '2001-08-20', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'Rajesh Saha', 'Nahihati', '6305609645', 'Father', 'Hostel', 'Sodepur', 'West Bengal', 'North 24prgs', '264895', NULL, NULL, NULL, '2024-11-16 01:16:48', '2024-11-16 01:16:48'),
(739, 776, '2022-27', '846531500942', 'Sambhu Pal', 'Gopa Pal', '2003-02-11', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Sambhu Pal', 'Shyambazar', '8008181657', 'Father', 'Home', 'Dumdum', 'West Bengal', 'North 24prgs', '971050', NULL, NULL, NULL, '2024-11-16 01:16:49', '2024-11-16 01:16:49'),
(740, 777, '2022-28', '846531500942', 'Damadar Das', 'Purbasha Das', '2000-02-27', 'Indian', 'OBC', 'female', 'A+', 'Hindu', 'Damadar Das', 'Sodepur', '9710753669', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24prgs', '469852', NULL, NULL, NULL, '2024-11-16 01:16:49', '2024-11-16 01:16:49'),
(741, 778, '2022-29', '846531500942', 'Rupam Dey', 'Runki Dey', '1999-06-02', 'Indian', 'General', 'female', 'B+', 'Hindu', 'Rupam Dey', 'Dumdum', '7413325681', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '727272', NULL, NULL, NULL, '2024-11-16 01:16:49', '2024-11-16 01:16:49'),
(742, 779, '2022-25', '846531500942', 'Sarnajay Ganguli', 'Sonali Ganguli', '1998-09-05', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'Sarnajay Ganguli', 'Baguihati', '8115897693', 'Father', 'Home', 'Dumdum', 'West Bengal', 'North 24prgs', '801980', NULL, NULL, NULL, '2024-11-16 01:16:50', '2024-11-16 01:16:50'),
(743, 780, '2022-26', '846531500942', 'Subhajit Sarkar', 'Ranchita Sarkar', '1997-12-09', 'Indian', 'General', 'male', 'O+', 'Hindu', 'Subhajit Sarkar', 'Rajarhat', '9818469705', 'Father', 'Hostel', 'Baguihati', 'West Bengal', 'North 24prgs', '876688', NULL, NULL, NULL, '2024-11-16 01:16:50', '2024-11-16 01:16:50'),
(744, 781, '2022-25', '846531500942', 'bijoy Das', 'Sanjana Das', '2001-12-06', 'Indian', 'OBC', 'male', 'A+', 'Hindu', 'bijoy Das', 'Sodepur', '6521041717', 'Father', 'Home', 'Sodepur', 'West Bengal', 'North 24prgs', '951396', NULL, NULL, NULL, '2024-11-16 01:16:51', '2024-11-16 01:16:51'),
(745, 782, '2022-25', '846531500942', 'Ranajoy Pal', 'Ruposhree Pal', '2001-12-07', 'Indian', 'General', 'male', 'B+', 'Hindu', 'Ranajoy Pal', 'Dumdum', '8223613729', 'Father', 'Home', 'Boshirhat', 'West Bengal', 'North 24prgs', '626104', NULL, NULL, NULL, '2024-11-16 01:16:51', '2024-11-16 01:16:51'),
(746, 783, '2022-26', '846531500942', 'Santan Dewanjee', 'Manami Dewanjee', '2001-10-08', 'Indian', 'General', 'male', 'AB+', 'Hindu', 'Santan Dewanjee', 'Baguihati', '7926185741', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24prgs', '510812', NULL, NULL, NULL, '2024-11-16 01:16:51', '2024-11-16 01:16:51'),
(747, 784, '2023-26', '346811110000', 'Demo Father', 'Demo Mother', '2004-11-20', 'Indian', 'SC', 'male', 'B-', 'Hindu', 'Damadar Das', 'Kolkata', '2626262626', 'Father', 'Home', 'Habra', 'West Bengal', 'North 24prgs', '743272', NULL, NULL, NULL, '2024-11-16 01:16:52', '2024-11-16 01:16:52'),
(756, 793, '2023-26', '123654852621', 'pefkjewe Sinha', 'fhsfn Sinha', '2002-10-05', 'Indian', 'General', 'Male', 'O+', 'Hindu', 'pefkjewe Sinha', 'Barasat ', '8456952361', 'Father', 'Home', 'Barasat ', 'West Bengal', 'North 24 prgs', '569841', NULL, NULL, NULL, '2024-11-16 07:44:31', '2024-11-16 07:44:31'),
(757, 794, '2023-27', '265423698450', 'Rewe Sen', 'rjgsnfe Sen', '2004-12-24', 'Indian', 'OBC', 'Male', 'AB+', 'Hindu', 'Rewe Sen', 'Chiner park', '7569846254', 'Father', 'Home', 'Chiner park', 'West Bengal', 'North 24 prgs', '658723', NULL, NULL, NULL, '2024-11-16 07:44:32', '2024-11-16 07:44:32'),
(758, 795, '2023-28', '265423698450', 'esfs Jamal', 'dehfe Jamal', '2002-03-15', 'Indian', 'General', 'Male', 'B+', 'Hindu', 'esfs Jamal', 'Baguihati', '9564875125', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24 prgs', '965842', NULL, NULL, NULL, '2024-11-16 07:44:32', '2024-11-16 07:44:32'),
(759, 796, '2023-26', '410236584100', 'Resfeswe Gupta', 'efhuea Gupta', '2003-06-03', 'Indian', 'OBC', 'Male', 'A+', 'Hindu', 'Resfeswe Gupta', 'Dashadrone', '9852001205', 'Father', 'Home', 'Dashadrone', 'Bihar', 'Jharkhand', '254630', NULL, NULL, NULL, '2024-11-16 07:44:33', '2024-11-16 07:44:33'),
(760, 797, '2023-26', '652166134258', 'sfagewe Mallik', 'bgfaf Mallik', '2001-08-23', 'Indian', 'General', 'Female', 'O+', 'Hindu', 'sfagewe Mallik', 'hathibagan', '9852001205', 'Father', 'Home', 'hathibagan', 'West Bengal', 'North 24 prgs', '658794', NULL, NULL, NULL, '2024-11-16 07:44:33', '2024-11-16 07:44:33'),
(762, 799, '2023-27', '265423698450', 'Rewe Sen', 'rjgsnfe Sen', '2004-12-24', 'Indian', 'OBC', 'Male', 'AB+', 'Hindu', 'Rewe Sen', 'Chiner park', '7569846254', 'Father', 'Home', 'Habra', 'West Bengal', 'North 24 prgs', '658723', '0629550300', '111111111111', '111111111110', '2024-11-16 07:50:17', '2024-11-15 18:30:00'),
(763, 800, '2023-26', '123654852621', 'pefkjewe Sinha', 'fhsfn Sinha', '2002-10-05', 'Indian', 'General', 'Male', 'O+', 'Hindu', 'pefkjewe Sinha', 'Barasat ', '8456952361', 'Father', 'Home', 'Barasat ', 'West Bengal', 'North 24 prgs', '569841', NULL, NULL, NULL, '2024-11-16 08:15:42', '2024-11-16 08:15:42'),
(768, 805, '2023-26', '123654852621', 'pefkjewe Sinha', 'fhsfn Sinha', '2002-10-05', 'Indian', 'General', 'Male', 'O+', 'Hindu', 'pefkjewe Sinha', 'Barasat ', '8456952361', 'Father', 'Home', 'Barasat ', 'West Bengal', 'North 24 prgs', '569841', NULL, NULL, NULL, '2024-11-16 12:00:33', '2024-11-16 12:00:33'),
(769, 806, '2023-26', '265423698450', 'Rewe Sen', 'rjgsnfe Sen', '2004-12-24', 'Indian', 'OBC', 'Male', 'AB+', 'Hindu', 'Rewe Sen', 'Chiner park', '7569846254', 'Father', 'Home', 'Chiner park', 'West Bengal', 'North 24 prgs', '658723', NULL, NULL, NULL, '2024-11-16 12:00:33', '2024-11-16 12:00:33'),
(770, 807, '2023-26', '265423698450', 'esfs Jamal', 'dehfe Jamal', '2002-03-15', 'Indian', 'General', 'Male', 'B+', 'Hindu', 'esfs Jamal', 'Baguihati', '9564875125', 'Father', 'Home', 'Baguihati', 'West Bengal', 'North 24 prgs', '965842', NULL, NULL, NULL, '2024-11-16 12:00:33', '2024-11-16 12:00:33'),
(771, 808, '2023-26', '410236584100', 'Resfeswe Gupta', 'efhuea Gupta', '2003-06-03', 'Indian', 'OBC', 'Male', 'A+', 'Hindu', 'Resfeswe Gupta', 'Dashadrone', '9852001205', 'Father', 'Home', 'Dashadrone', 'Bihar', 'Jharkhand', '254630', NULL, NULL, NULL, '2024-11-16 12:00:34', '2024-11-16 12:00:34'),
(772, 809, '2023-26', '652166134258', 'sfagewe Mallik', 'bgfaf Mallik', '2001-08-23', 'Indian', 'General', 'Female', 'O+', 'Hindu', 'sfagewe Mallik', 'hathibagan', '9852001205', 'Father', 'Home', 'hathibagan', 'West Bengal', 'North 24 prgs', '658794', NULL, NULL, NULL, '2024-11-16 12:00:34', '2024-11-16 12:00:34'),
(785, 823, '2023-2026', '745621002351', 'Sokdf Saha', 'sekfb Saha', '2003-11-04', 'Indian', 'General ', 'Male', 'O+', 'Hindu', 'Sokdf Saha', 'Rajarhat', '7865985210', 'Father', 'Home', 'Rajarhat', 'West Bengal', 'North 24prgs', '569854', '8659745825', NULL, NULL, '2024-12-13 00:49:07', '2024-12-13 00:49:07'),
(786, 824, '2023-2027', '458236514298', 'kjhhksd Ghosh', 'ekeaefka Ghosh', '2004-09-11', 'Indian', 'General ', 'Male', 'AB+', 'Hindu', 'kjhhksd Ghosh', 'Barasat', '8745632541', 'Father', 'Home', 'Barasat', 'West Bengal', 'North 24prgs', '652410', '8659745825', NULL, NULL, '2024-12-13 00:49:07', '2024-12-13 00:49:07'),
(787, 825, '2023-2028', '458236514298', 'hafeakjf Das', 'esgjbea Das', '2005-07-20', 'Indian', 'General ', 'Male', 'A+', 'Hindu', 'hafeakjf Das', 'Kestopur', '9658415247', 'Father', 'Home', 'Kestopur', 'West Bengal', 'North 24prgs', '653254', '9658411365', NULL, NULL, '2024-12-13 00:49:08', '2024-12-13 00:49:08'),
(788, 826, '2023-2029', '458236514298', 'kesjfh Gupta', 'kbhkawf Gupta', '2006-05-28', 'Indian', 'General ', 'Male', 'B+', 'Hindu', 'kesjfh Gupta', 'Baranagar', '9006523481', 'Father', 'Home', 'Baranagar', 'West Bengal', 'North 24prgs', '254862', '8965442366', NULL, NULL, '2024-12-13 00:49:08', '2024-12-13 00:49:08'),
(789, 827, '2023-2030', '458236514298', 'kaejfh Chowdhury', 'trgsk Chowdhury', '2007-04-05', 'Indian', 'General ', 'Female', 'O+', 'Hindu', 'kaejfh Chowdhury', 'Habra', '7562004590', 'Father', 'Home', 'Habra', 'West Bengal', 'North 24prgs', '365481', '8745002540', NULL, NULL, '2024-12-13 00:49:09', '2024-12-13 00:49:09'),
(790, 828, '2023-2031', '458236514298', 'esjfes Giri', 'tkjhh Giri', '2008-02-11', 'Indian', 'General ', 'Male', 'A+', 'Hindu', 'esjfes Giri', 'Lake town', '6354852647', 'Father', 'Home', 'Lake town', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:09', '2024-12-13 00:49:09'),
(791, 829, '2023-2032', '458236514298', 'xdbd Chanda', 'sdknf Chanda', '2008-12-19', 'Indian', 'General ', 'Female', 'AB+', 'Hindu', 'xdbd Chanda', 'Rajarhat', '5147700704', 'Father', 'Home', 'Howrah', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:10', '2024-12-13 00:49:10'),
(792, 830, '2023-2033', '458236514298', 'dcbdb Ghosh', 'dcbdvndb Ghosh', '2009-10-27', 'Indian', 'General ', 'Male', 'A+', 'Hindu', 'dcbdb Ghosh', 'Barasat', '3940548761', 'Father', 'Home', 'Rajarhat', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:10', '2024-12-13 00:49:10'),
(793, 831, '2023-2034', '458236514298', 'dsfhbs Dutta', 'jkndnae Dutta', '2010-09-04', 'Indian', 'General ', 'Male', 'B+', 'Hindu', 'dsfhbs Dutta', 'Kestopur', '2733396818', 'Father', 'Home', 'Barasat', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:11', '2024-12-13 00:49:11'),
(794, 832, '2023-2035', '458236514298', 'daefba Barik', 'ejfakn Pal', '2011-07-13', 'Indian', 'General ', 'Male', 'O+', 'Hindu', 'daefba Barik', 'Baranagar', '1526244875', 'Father', 'Home', 'Kestopur', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:11', '2024-12-13 00:49:11'),
(795, 833, '2023-2036', '458236514298', 'shfbeeb Nandi', 'ejfae Dutta', '2012-05-20', 'Indian', 'General ', 'Female', 'A+', 'Hindu', 'shfbeeb Nandi', 'Habra', '8979092932', 'Father', 'Home', 'Baranagar', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:12', '2024-12-13 00:49:12'),
(796, 834, '2023-2037', '458236514298', 'ajfba Pal', 'eafknae Pal', '2013-03-28', 'Indian', 'General ', 'Male', 'AB+', 'Hindu', 'ajfba Pal', 'Lake town', '7888059011', 'Father', 'Home', 'Habra', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:12', '2024-12-13 00:49:12'),
(797, 835, '2023-2038', '458236514298', 'sjhbf Halder', 'sjdwahbf Halder', '2014-02-03', 'Indian', 'General ', 'Male', 'A+', 'Hindu', 'sjhbf Halder', 'Rajarhat', '8095210954', 'Father', 'Home', 'Lake town', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:13', '2024-12-13 00:49:13'),
(798, 836, '2023-2039', '458236514298', 'kjdsds Dhar', 'fafaaf Dhar', '2014-12-12', 'Indian', 'General ', 'Male', 'B+', 'Hindu', 'kjdsds Dhar', 'Barasat', '6302362897', 'Father', 'Home', 'Howrah', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:13', '2024-12-13 00:49:13'),
(799, 837, '2023-2040', '458236514298', 'esfeef Chowdhury', 'efaefea Chowdhury', '2015-10-20', 'Indian', 'General ', 'Male', 'O+', 'Hindu', 'esfeef Chowdhury', 'Kestopur', '9509514840', 'Father', 'Home', 'Rajarhat', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:14', '2024-12-13 00:49:14'),
(800, 838, '2023-2041', '458236514298', 'ejfbe Sinha', 'wawafae Sinha', '2016-08-27', 'Indian', 'General ', 'Male', 'A+', 'Hindu', 'ejfbe Sinha', 'Baranagar', '8716666783', 'Father', 'Home', 'Barasat', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:14', '2024-12-13 00:49:14'),
(801, 839, '2023-2042', '458236514298', 'fesfea Das', 'awfaj Das', '2017-07-05', 'Indian', 'General ', 'Male', 'AB+', 'Hindu', 'fesfea Das', 'Habra', '7923818726', 'Father', 'Home', 'Kestopur', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:15', '2024-12-13 00:49:15'),
(802, 840, '2023-2043', '458236514298', 'efaeklmf Poddar', 'fafaf Poddar', '2018-05-13', 'Indian', 'General ', 'Male', 'A+', 'Hindu', 'efaeklmf Poddar', 'Lake town', '8300970669', 'Father', 'Home', 'Baranagar', 'West Bengal', 'North 24prgs', '365481', '9874851006', NULL, NULL, '2024-12-13 00:49:15', '2024-12-13 00:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `paper_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `department_name`, `subject`, `paper_code`) VALUES
(10, 13, 'Python Programming', 'BCAD102'),
(11, 13, 'Math', 'DEMO126');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Student name',
  `email` varchar(255) NOT NULL,
  `contact` varchar(22) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'Student',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department`, `name`, `email`, `contact`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Souvik Mukherjee', 'mukherjeesouvik2043@gmail.com', '1234567890', '$2y$12$yyZGkBOIXOE/ZeCRQK/CnuykVHepL.Glt6EWTwxRjcIVtFG2ty472', 'Superadmin', NULL, '2024-10-08 11:35:34', '2024-10-23 11:28:50'),
(665, '13', 'SWAPNIL ', 'ecmt0001@gmail.com', '9876543210', '$2y$12$RmDU/PtiNkFV.2WP5vrzge3qMyU2R8jeIGOXULZeoX0QwpHeIRg.i', 'Student', NULL, '2024-11-06 08:36:27', '2025-01-23 05:27:50'),
(666, '13', 'SAYAN', 'ecmt0000@gmail.com', '9876543211', '$2y$12$Y1LP1FoKi/rQTLR704pMh.pb3/iPIw5XtN4Z3S.u3uo.sL36vOwTu', 'Student', NULL, '2024-11-06 08:36:28', '2024-11-06 08:36:28'),
(667, '13', 'ANURAG', 'ecmt0009@gmail.com', '9876543212', '$2y$12$DxfOPGocWp90/HvaIVZ9TOOWMUDBi6UFYIsPEZJxkZ0ZRPUd9t3K2', 'Student', NULL, '2024-11-06 08:36:28', '2024-11-06 08:36:28'),
(669, '13', 'SOUVIK', 'ecmt-22-075@ecmt.in', '9876543214', '$2y$12$/DpVBS9LFRPsV0O3MPJXPOAICBnZi.Tri4D49yypT5ChdM71G8E9i', 'Student', NULL, '2024-11-06 08:36:29', '2024-11-06 08:36:29'),
(671, '13', 'SNEHA', 'ecmt0005@gmail.com', '9876543216', '$2y$12$DOcW6HwK4XRPNELNbffnyOQKP2vR4qHgIC6BKwjrW663qS2U6TvcO', 'Student', NULL, '2024-11-06 08:36:29', '2024-11-06 08:36:29'),
(672, '13', 'SAYANTAN ', 'ecmt0004@gmail.com', '9876543217', '$2y$12$4PTb1q52cyAFxAjJyLBhruveqRqwIYiAQoFxXCf38HeuG2tLThQPy', 'Student', NULL, '2024-11-06 08:36:29', '2024-11-06 08:36:29'),
(682, '20', 'Rohan Verma', 'rohan.verma@example.com', '7654321097', '$2y$12$x0fsPB/YCYBItk0gT17IOeWLeP6OlBK6V4sobWsiJ8JiH7irxxZ4i', 'Student', NULL, '2024-11-06 09:20:13', '2024-11-06 09:20:13'),
(683, '20', 'Nisha Gupta', 'nisha.gupta@example.com', '6543210986', '$2y$12$o3vVgQuN3K.pPQ4PrnaF8.bwCqSmSHkFICJdoUoonck6ALyulDihC', 'Student', NULL, '2024-11-06 09:20:14', '2024-11-06 09:20:14'),
(694, '21', 'Ankit Verma', 'ankit.verma@example.com', '9876543210', '$2y$12$OwQ6Qzsi1.DtFOstZmL3.OU4yx.iS2vxx14td4cbwN3vd1FQTu4wa', 'Student', NULL, '2024-11-06 10:19:52', '2024-11-06 10:19:52'),
(695, '21', 'Riya Shah', 'riya.shah@example.com', '9876543220', '$2y$12$vn0XrkdZHLTePLZJt/.x5uMoVb2z1y1sDN5hoM9NgQYilRIHXb7CG', 'Student', NULL, '2024-11-06 10:19:52', '2024-11-06 10:19:52'),
(697, '21', 'Anjali Nair', 'anjali.nair@example.com', '9876543240', '$2y$12$maCkF5qQqlo1c2QHG.PuBub92l87hfOa/hvZFxB0R70EuIVu/Tw.q', 'Student', NULL, '2024-11-06 10:19:53', '2024-11-06 10:19:53'),
(700, '21', 'Aarav Mehta', 'aarav.mehta@example.com', '9876543270', '$2y$12$qN32vEudhDghR4ZZhXDqVOH/MEs90CL4cKXDVGhxTLhTw/qFWVx..', 'Student', NULL, '2024-11-06 10:19:55', '2024-11-06 10:19:55'),
(704, '21', 'Amit Patil', 'amit.patil@example.com', '9876543310', '$2y$12$HTxCVHgY89oirPPiYQLPau.OBu6hvE5xBeWBbbZKXT5aWanvhfg1K', 'Student', NULL, '2024-11-06 10:19:57', '2024-11-06 10:19:57'),
(705, '21', 'Priya Das', 'priya.das@example.com', '9876543320', '$2y$12$h2VYkh2BSOHs8TTyEsjWF.RAnqBTo/YhotjRVaxrcXzU12lVor1dG', 'Student', NULL, '2024-11-06 10:19:57', '2024-11-06 10:19:57'),
(721, '17', 'Swapnil Dewanjee', 'dewanjeeswapnil@gmail.com', '1234567850', '$2y$12$0RRTDEVZGAi89HnSPJZIHeW5RV.GczyQGnubiE62j0N3rX48jaJ6i', 'Admin', NULL, '2024-11-14 18:30:00', NULL),
(722, '16', 'Test 6', 'test6@gmail.com', '1111111145', '$2y$12$PN.YiPd0cmGNp39OQRZi0ebxvoCE4t.MNyYwpLOrjYu05vDAyl6TK', 'Mentor', NULL, '2024-11-14 18:30:00', NULL),
(728, '20', 'Sandip Chandra', 'sandipchan@gmail.com', '9005648055', '$2y$12$BhYWjIVUpg6bo8FjorRcQuEPf0CgMOX32CUeIuxAGI2gcyfDxqpz.', 'Student', NULL, '2024-11-15 02:43:48', '2024-11-15 02:43:48'),
(729, '20', 'Ronit Ghosh', 'ronitchan@gmail.com', '8456965870', '$2y$12$DHUokoTjVoJ7Clu3j8N8uOMQSb5pmKfgAAqznUMckW9H8DRX49hme', 'Student', NULL, '2024-11-15 02:43:48', '2024-11-15 02:43:48'),
(730, '20', 'Rajit Saha', 'rajitchan@gmail.com', '7908283685', '$2y$12$EDVpe60P9qqhiKVQ8Wxb/eQOe9gQGLCNTKpd5diU92xysLWT9.N02', 'Student', NULL, '2024-11-15 02:43:48', '2024-11-15 02:43:48'),
(731, '20', 'Sayan Pal', 'sayanpal@gmail.com', '7359601500', '$2y$12$QRpHH2.a7CQOvrpVXjYm6.WAOqnDctWluJw8/Q06//aXlf45LWegq', 'Student', NULL, '2024-11-15 02:43:49', '2024-11-15 02:43:49'),
(732, '20', 'Ashmita Das', 'ashmitachan@gmail.com', '6810919315', '$2y$12$1sKR.WZSPbsbuCsfEptVmOJLLhwHsaWUqPrV13LJjk09Ivz5liMc.', 'Student', NULL, '2024-11-15 02:43:49', '2024-11-15 02:43:49'),
(736, '14', 'Sandip Chandra', 'sandipchan01@gmail.com', '9005648055', '$2y$12$q1ouqKupi3NGDiqGA1VS7.k8oyZd086zpGlN3r4z9WJf8sfDwgGFG', 'Student', NULL, '2024-11-15 02:56:02', '2024-11-15 02:56:02'),
(737, '14', 'Ronit Ghosh', 'ronitchan012@gmail.com', '8456965870', '$2y$12$0pn0fN3HcHJHx9/vKGoYse5vI2gpVWoch25qX/XMAaOMXDhk2kmIu', 'Student', NULL, '2024-11-15 02:56:02', '2024-11-15 02:56:02'),
(738, '14', 'Rajit Saha', 'rajitchan013@gmail.com', '7908283685', '$2y$12$.8CkGgG7dbmCUO84xd2NyuFY/CwR1Xpgp66.LuB0mCr5OsJ6uJ67u', 'Student', NULL, '2024-11-15 02:56:03', '2024-11-15 02:56:03'),
(739, '14', 'Sayan Pal', 'sayanpal014@gmail.com', '7359601500', '$2y$12$EthE45tBeSXr9P8qF99NBe/wJoZYQWBxAYeMmMu5YEwxOWSTskHZW', 'Student', NULL, '2024-11-15 02:56:03', '2024-11-15 02:56:03'),
(740, '14', 'Ashmita Das', 'ashmitachan44@gmail.com', '6810919315', '$2y$12$fMwb.JUivjQhqbq3JOjsOO0rLkTTsoWF8g318P1mypSRA6SvfhEQO', 'Student', NULL, '2024-11-15 02:56:04', '2024-11-15 02:56:04'),
(741, '14', 'Sanik Chandra', 'sandipchan56@gmail.com', '9005648055', '$2y$12$M6FFkhcfjK2DVvz1ZFpXWuTvSymw7f4yW4TYkeQbWLK2FgWtGajTK', 'Student', NULL, '2024-11-15 02:56:04', '2024-11-15 02:56:04'),
(742, '14', 'Rohit Ghosh', 'ronitchan10@gmail.com', '8456965870', '$2y$12$QOL/lU9a0pLyOuC1DOuACO3.QhFOXRbzt1UuuzDbyahmP65K2JAWW', 'Student', NULL, '2024-11-15 02:56:04', '2024-11-15 02:56:04'),
(743, '14', 'Rajib Saha', 'rajitchan06@gmail.com', '7908283685', '$2y$12$sPLfAVYw6Hv1Hd3sEjP3kO/pdhoHjORS4B3ELQAddj0bAHsM8B7y6', 'Student', NULL, '2024-11-15 02:56:05', '2024-11-15 02:56:05'),
(744, '14', 'Sayantan Pal', 'sayanpal04@gmail.com', '7359601500', '$2y$12$1EBr5.3XC4WTgW/EK8GJEeVGiZqtFeKkaMVfElvfiZXKpGIO8RmoC', 'Student', NULL, '2024-11-15 02:56:05', '2024-11-15 02:56:05'),
(745, '14', 'Shreya Das', 'ashmitachan78@gmail.com', '6810919315', '$2y$12$4hf2/ZSlmAyKVmiW/ZLHsenYIqtK6tPLav7lrw6Nc09XZppspZJWu', 'Student', NULL, '2024-11-15 02:56:06', '2024-11-15 02:56:06'),
(746, '14', 'Piyali Dey', 'PiyaliDey142@gmail.com', '6262237130', '$2y$12$R7qdCKYW5xkwuh0Kd5oAhuUYTwr9uBSK1neUo/aknh8IBxgYne2A.', 'Student', NULL, '2024-11-15 02:56:06', '2024-11-15 02:56:06'),
(747, '14', 'Bishanath Ganguli', 'BishanathGanguli036@gmail.com', '9713554945', '$2y$12$g5LtHasSrmrf8953nTzJCeat1iFezihLE0Wi51nRyYKTuLXtAD8dC', 'Student', NULL, '2024-11-15 02:56:07', '2024-11-15 02:56:07'),
(748, '14', 'Asutosh Banik', 'AsutoshBan0ik@gmail.com', '8164872760', '$2y$12$FIyfHjZf55VTgL65RGWf7epReAK1c35LfIrpF9LGSeLyY/6fPs2Da', 'Student', NULL, '2024-11-15 02:56:07', '2024-11-15 02:56:07'),
(749, '14', 'Sidhhartha Sarkar', 'SidhharthaSarkar056@gmail.com', '6616190575', '$2y$12$nFcQcKVa4C1Gs2UhYatQwuIFswq3DtHT5zCCbyzW7PpLyGOptWXm.', 'Student', NULL, '2024-11-15 02:56:07', '2024-11-15 02:56:07'),
(750, '14', 'Subir Das', 'SubirDas04@gmail.com', '9067508390', '$2y$12$ejW72JOOS6r6dZ1nVl16reAbRDD/p6oisB5MNdaT80v2YX8B7Gqxy', 'Student', NULL, '2024-11-15 02:56:08', '2024-11-15 02:56:08'),
(751, '14', 'Ankan Pal', 'AnkanPal21500@gmail.com', '7518826205', '$2y$12$BlZe2UVb1yBI7XQpcCptrO4S.8U84kbzF4uGQ3gt1ZKmHwo6xKlE6', 'Student', NULL, '2024-11-15 02:56:08', '2024-11-15 02:56:08'),
(752, '14', 'Swapnil Dewanjee', 'SwapnilDewanjee018@gmail.com', '8970144020', '$2y$12$lBqSVdKkLMYG3slv3kpO0u4fN2CfVetA5oUmJmGe6SW9Oc0cFQj.S', 'Student', NULL, '2024-11-15 02:56:08', '2024-11-15 02:56:08'),
(753, '14', 'Souvik Mukherjee', 'SouvikMukherjee20048@gmail.com', '7421461835', '$2y$12$HNUaP.LJF.EA3MH.20T/P.l9F4m36YV4yNVN1sKLniyy5A.GB.qjG', 'Student', NULL, '2024-11-15 02:56:09', '2024-11-15 02:56:09'),
(754, '14', 'Arit Biswas', 'AritBiswas24012@gmail.com', '9872779650', '$2y$12$94NEoy.xUyyyikfyfUiG3.y9TFAja9SKoN5/Ulv4REB.UNVdwap/m', 'Student', NULL, '2024-11-15 02:56:09', '2024-11-15 02:56:09'),
(755, '14', 'Jayanta Banerjee', 'JayantaBanerjee048@gmail.com', '8324097465', '$2y$12$HE0cT6BV0svNlQVmHwDKM.BzHk52w4LCxzrQuaKjinijrHJCqn.Lq', 'Student', NULL, '2024-11-15 02:56:09', '2024-11-15 02:56:09'),
(756, '21', 'Another Mentor', 'anothermentor456@ecmt.in', '1236547801', '$2y$12$920Kwj2NlJNB7198lqpXzORFjwod5Ah3nEFFdAw8uPq1EKRe9ODrC', 'Mentor', NULL, '2024-11-14 18:30:00', NULL),
(771, '14', 'Prasenjit Paul', 'prasenjitpaul213@gmail.com', '2222222222', '$2y$12$12cc9/l39JS6IDg/vh7IMeo20gPMz04IIz3ACrupU4jxAVmUtBbJG', 'Student', NULL, '2024-11-16 01:07:58', '2024-11-16 01:07:58'),
(772, '14', 'Mentee 1', 'mentee123@gmail.com', '3333333333', '$2y$12$JTTxp61F22b9nPPyD2nQlOBJQ0trK/qcGVIZTEfTCtAhhOvEmww7G', 'Student', NULL, '2024-11-16 01:07:59', '2024-11-16 01:07:59'),
(773, '14', 'Mentee 2', 'mentee236@ecmt.in', '6666666666', '$2y$12$HT92XIbVWPx9qBHMcIi1muNYCJmEm0YfIC4fqiLbCFny9dVvI4022', 'Student', NULL, '2024-11-16 01:07:59', '2024-11-16 01:07:59'),
(774, '13', 'Rakeit Ghosh', 'bidhannagar12@gmail.com', '8974562410', '$2y$12$R8FKrtvNc6bnU7r2CBpcz.wbijR/YSfJc3ifW.MR7brGVUBhMyL8S', 'Student', NULL, '2024-11-16 01:16:48', '2024-11-16 01:16:48'),
(775, '13', 'Rajin Saha', 'naihati213@gmail.com', '7869541002', '$2y$12$UHPUDCk8B.9zO/Rg3R7oEe7pLDrGVAYcG4dSjB7rYdAsWievoC5Wy', 'Student', NULL, '2024-11-16 01:16:48', '2024-11-16 01:16:48'),
(776, '13', 'Sayashan Pal', 'shyambazar365@gmail.com', '6589744125', '$2y$12$5LocluFZ0e7OvSA32LhuZOkI5ILJsOLGj4yPBbH2Rxf/yVNOgLrpe', 'Student', NULL, '2024-11-16 01:16:49', '2024-11-16 01:16:49'),
(777, '13', 'Shreyashi Das', 'sodepur532@gmail.com', '8974562541', '$2y$12$pkBxJrJz4dKNHLDqZyt3huoJnWfRYaT0X2dQqN/L5vqLTeUO4uGVq', 'Student', NULL, '2024-11-16 01:16:49', '2024-11-16 01:16:49'),
(778, '13', 'Pitali Dey', 'pitalidey245@gmail.com', '9875698510', '$2y$12$UkO8aBq/kU8aC7UDCrXn2OJvvLSGH8eeiF0UGkRKVMI5cDVe.t3ja', 'Student', NULL, '2024-11-16 01:16:49', '2024-11-16 01:16:49'),
(779, '13', 'Bisharup Ganguli', 'baguihati578@gmail.com', '7435986120', '$2y$12$.CrqPPz3f0QBcrExmYuj8.QGgBdKFTyL10Wlc48GWCDSG5O7AHkAC', 'Student', NULL, '2024-11-16 01:16:50', '2024-11-16 01:16:50'),
(780, '13', 'Sidhharth Sarkar', 'rajarhat236@gmail.com', '7223505969', '$2y$12$SytgG9kHBTSG.eQIBbdgwulYrTpv53xrtuRhXJ./pY.L13m0JbbOK', 'Student', NULL, '2024-11-16 01:16:50', '2024-11-16 01:16:50'),
(781, '13', 'Subuash Das', 'rajarhat452@gmail.com', '6454217758', '$2y$12$Ubq/tNkAENJYlH0HWO4aR.PKIzzBtyG2gKdq/m65mGUexe8QRibRa', 'Student', NULL, '2024-11-16 01:16:51', '2024-11-16 01:16:51'),
(782, '13', 'Ankit Pal', 'ankitpal4261@gmail.com', '7684929548', '$2y$12$G9Yl1j6FzfWo4Kd782MgZuLO1DL7TV1PoOzFgJdSaRjdeXpu7OaZS', 'Student', NULL, '2024-11-16 01:16:51', '2024-11-16 01:16:51'),
(783, '13', 'Swarup Dewanjee', 'swarupdewanjee2563@gmail.com', '8915641337', '$2y$12$8lWQaDVFhnqGYwtZj37jpu0im7kRf6ktzD12hXHXPYoEZemGhSkC.', 'Student', NULL, '2024-11-16 01:16:51', '2024-11-16 01:16:51'),
(784, '13', 'Pratik Chakraborty ', 'pratikchakraborty45@gmail.com', '6969696969', '$2y$12$QqpFhlGz3zyOPvwv8Otzied/4QNJVw7X.ZRQN0QF0UTK4KHIhABPu', 'Student', NULL, '2024-11-16 01:16:52', '2024-11-16 01:16:52'),
(793, '16', 'Rakesh Sinha', 'rakesh24@gmail.com', '9874569874', '$2y$12$409h8Jy8t4WRx/iRYrN11.doiZSzwukjPpPLwyqrrXprgDn7R.paS', 'Student', NULL, '2024-11-16 07:44:31', '2024-11-16 07:44:31'),
(794, '16', 'Soudra Sen', 'soudrasen456@gmail.com', '6598745210', '$2y$12$Kqu9ft2hv7tm4ckXg2Ivt.bXeRtJqRGFV6hMEcUWC0TWhEhqJawjm', 'Student', NULL, '2024-11-16 07:44:32', '2024-11-16 07:44:32'),
(795, '16', 'Vidhut Jamal', 'vidhut24@gmail.com', '7569854620', '$2y$12$egTMkpxyKrSk7gXGmAg.heow4ponk9bXBXb1i3Gn6G7134flITMbS', 'Student', NULL, '2024-11-16 07:44:32', '2024-11-16 07:44:32'),
(796, '16', 'Sonjoy Gupta', 'sonjoyan@gmail.com', '8549652214', '$2y$12$olxIBAtxQ9bd8f2lj2vXF.IVl0Qru9McNxNssvoHT5GJeDKLJKQaK', 'Student', NULL, '2024-11-16 07:44:33', '2024-11-16 07:44:33'),
(797, '16', 'Riyanjana Mallik', 'riyanjana24@gfeil.com', '8400251365', '$2y$12$NxhP/8fFA2z.KVI62HwsheLSE450S74E0.qiziPFl4I4Kbo.tPQxq', 'Student', NULL, '2024-11-16 07:44:33', '2024-11-16 07:44:33'),
(799, '16', 'Virat Kohli', 'viratkohli18@ecmt.in', '6598745210', '$2y$12$1pt35Jm2sFtjpxvO4HZ3vemW5xkwoZWKN7m3DSguN6rwxTzTNOA2a', 'Student', NULL, '2024-11-16 07:50:17', '2024-11-16 07:50:17'),
(800, '13', 'John Duo', 'johnduo21@ecmt.in', '9874569874', '$2y$12$F57bwIIz8t63hfHnIJG1r.zxEFf2XSp8WJPdMaUjOUsJaaQqrY5BO', 'Student', NULL, '2024-11-16 08:15:42', '2024-11-16 08:15:42'),
(805, '16', 'Rakesh Sinha', 'rakesh2400@gmail.com', '9874569874', '$2y$12$VesUnFWI2uzMhcLgW2dW9uhtP1VXhAeN5e0Yze3fKqQsiBtY3WNjS', 'Student', NULL, '2024-11-16 12:00:33', '2024-11-16 12:00:33'),
(806, '16', 'Soudra Sen', 'soudrasen11456@gmail.com', '6598745210', '$2y$12$rHAsjWJ0DL1uj/CAwBBP1uOsiZThjz0dL8Gxt1OA2ccKy6hc4/346', 'Student', NULL, '2024-11-16 12:00:33', '2024-11-16 12:00:33'),
(807, '16', 'Vidhut Jamal', 'vidhut2423@gmail.com', '7569854620', '$2y$12$jElGey7bLTfGRaBF2iPLzO3DsbwBj26iA56LQNHbT/u1L7WunvT4y', 'Student', NULL, '2024-11-16 12:00:33', '2024-11-16 12:00:33'),
(808, '16', 'Sonjoy Gupta', 'sonjoyan143@gmail.com', '8549652214', '$2y$12$/GK1XQ.sARd84PhGyEiZ/..ZK0RDs41/GFX0JCIKtQLjd6Oo38Ykm', 'Student', NULL, '2024-11-16 12:00:34', '2024-11-16 12:00:34'),
(809, '16', 'Riyanjana Mallik', 'riyanjana6924@gfeil.com', '8400251365', '$2y$12$gHWWYjRNuKVHmE9cwj28vubIvLO9gDc5XpNHvXbUBQXU7oR4cs8lm', 'Student', NULL, '2024-11-16 12:00:34', '2024-11-16 12:00:34'),
(813, '14', 'Swapnil Mentor', 'swapnilmentor452@ecmt.in', '2365498710', '$2y$12$umN5IMXUddODiBSCpTgaO.YSYZEj0fYxw0P9392EXQzg7PaXuCz/q', 'Mentor', NULL, '2024-11-16 18:30:00', NULL),
(823, '17', 'Simati Das', 'SimatiDas89@gmail.com', '6598745632', '$2y$12$MNY1Z4LDWfVIuK9DVbHWT.C.WX3UZtL2xtm8LJHlLaBaLWd8F6En6', 'Student', NULL, '2024-12-13 00:49:07', '2024-12-13 00:49:07'),
(824, '17', 'Pubali Basu', 'Pubali54Basu@gmail.com', '8549520130', '$2y$12$xdlm7Ja7d168BxmW5OdfO.TGGjTMrKCsFryJu1oxVLds5NW2749U2', 'Student', NULL, '2024-12-13 00:49:07', '2024-12-13 00:49:07'),
(825, '17', 'Ritika Sarkar', 'RitikaSarkar86@gmail.com', '6598740025', '$2y$12$Jiuzb0FBe0tjCjRL08Mroe7Ya5nF0ir3FF6SuvT3zxWK9VeMtQo9K', 'Student', NULL, '2024-12-13 00:49:08', '2024-12-13 00:49:08'),
(826, '17', 'Kusha mondol', 'Kushamondol26@gmail.com', '8563254100', '$2y$12$8md.89uuyurv.FtyDwnJMeIslaFtCNOUefji1WVuejS6pvHHSjyZO', 'Student', NULL, '2024-12-13 00:49:08', '2024-12-13 00:49:08'),
(827, '17', 'Bishal Majumder', 'BishalMajumder18@gmail.com', '6532789548', '$2y$12$3OFsFa3MlAoyKWiKiyJXK.24u5TJAvfq8lbE67TjS3lHpGFg2XG6i', 'Student', NULL, '2024-12-13 00:49:09', '2024-12-13 00:49:09'),
(828, '17', 'Somita Ghosh', 'SomitaGhosh11@gmail.com', '9653210054', '$2y$12$aHvio0Tzc0RrYX/xPCJ8NuDh.wdKcnhiSOHXRObwGINHdweIAm0sS', 'Student', NULL, '2024-12-13 00:49:09', '2024-12-13 00:49:09'),
(829, '17', 'Priya Chanda', 'PriyaChanda20@gmail.com', '8773630560', '$2y$12$kQVbqpqrk8yTWNNSwdMeieedp/gtmfrWQg03O4WpIEeJpeHB8909e', 'Student', NULL, '2024-12-13 00:49:10', '2024-12-13 00:49:10'),
(830, '17', 'Pramit Ghosh', 'PramitGhosh24@gmail.com', '9894051066', '$2y$12$efa/E6ICBok0a9f1AJniuOcw6vyDdY2RoDiLpcf71CeOoOJr/IeyC', 'Student', NULL, '2024-12-13 00:49:10', '2024-12-13 00:49:10'),
(831, '17', 'Sayan Dutta', 'SayanDutta69@gmail.com', '9014471572', '$2y$12$cyH8bpGQ1KIBiLbOO5CjDuG.ZjqClY84GqzD.Os7MBehFQ2wgbWfS', 'Student', NULL, '2024-12-13 00:49:11', '2024-12-13 00:49:11'),
(832, '17', 'Piyush Barik', 'PiyushBarik248@gmail.com', '6134892078', '$2y$12$MBdBFCAWaec4Xw2Z5k49Ke5xsxQySCyt14EFTXLgWZbW8E4vqgvH6', 'Student', NULL, '2024-12-13 00:49:11', '2024-12-13 00:49:11'),
(833, '17', 'Shena Nandi', 'ShenaNandi14@gmail.com', '8255312584', '$2y$12$NLgbEQFZrnJDkZwxMPy/B.aTQUL6rJYE4Fq6tzcck8ja/lnL0ws2a', 'Student', NULL, '2024-12-13 00:49:12', '2024-12-13 00:49:12'),
(834, '17', 'Jilick Pal', 'JilickPal211@gmail.com', '8375733090', '$2y$12$jrmjTr7Gz.ClouM0n4LDAOiDUQ1dekZ0vBui25fMEEmfUu1devmse', 'Student', NULL, '2024-12-13 00:49:12', '2024-12-13 00:49:12'),
(835, '17', 'Amit Halder', 'AmitHalder263@gmail.com', '9496153596', '$2y$12$D5ivLy4nKvPg/DOw7aUg8uKORVTFHJ0Vg2uWDVpgPjr1Ceuj0.ZEi', 'Student', NULL, '2024-12-13 00:49:13', '2024-12-13 00:49:13'),
(836, '17', 'Biswajit Dhar', 'BiswajitDhar14@gmail.com', '7616574102', '$2y$12$OY/EDhhFZd0NCW3VRWvbx.pESTh5tRLwSFtmZny4sjEyb9fyV.SY.', 'Student', NULL, '2024-12-13 00:49:13', '2024-12-13 00:49:13'),
(837, '17', 'Rajit Chowdhury', 'RajitChowdhury18@gmail.com', '7736994608', '$2y$12$6wFIQw2ZzRhhwkHKy6.zhurx4ZoHyB9C/1lWkfvkkdsZoQ1U0TEkK', 'Student', NULL, '2024-12-13 00:49:14', '2024-12-13 00:49:14'),
(838, '17', 'Depak Sinha', 'DepakSinha19@gmail.com', '9087415114', '$2y$12$UmKI5fQ.thFyrmNzF5u1aeWh4PWpL.VFaVKT9PsPZ08F2JmXniCFW', 'Student', NULL, '2024-12-13 00:49:14', '2024-12-13 00:49:14'),
(839, '17', 'Ramit Das', 'RamitDas289@gmail.com', '6977835620', '$2y$12$pHTdsfWWL86/64GTW8UrsOZlgd6UEHU7iLUFKhQmazUgVec6/H2TC', 'Student', NULL, '2024-12-13 00:49:15', '2024-12-13 00:49:15'),
(840, '17', 'Subhankar Poddar', 'SubhankarPoddar254@gmail.com', '8098256126', '$2y$12$.dth4nhavgxylQRtmjqh3ux8hpc.QLdopxz3LKPhwAyOif4gi0OJi', 'Student', NULL, '2024-12-13 00:49:15', '2024-12-13 00:49:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_mentor`
--
ALTER TABLE `assigned_mentor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_mentor_mentor_id_foreign` (`mentor_id`),
  ADD KEY `assigned_mentor_mentee_id_foreign` (`mentee_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_department_name_foreign` (`department_name`);

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
-- AUTO_INCREMENT for table `assigned_mentor`
--
ALTER TABLE `assigned_mentor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=805;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_mentor`
--
ALTER TABLE `assigned_mentor`
  ADD CONSTRAINT `assigned_mentor_mentee_id_foreign` FOREIGN KEY (`mentee_id`) REFERENCES `student_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_mentor_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_department_name_foreign` FOREIGN KEY (`department_name`) REFERENCES `department` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
