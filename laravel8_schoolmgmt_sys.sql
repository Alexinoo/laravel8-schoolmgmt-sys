-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 01:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8_schoolmgmt_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id-user_id',
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(3, 6, 9, 15, 2, '2022-05', 1140, '2022-05-13 17:06:24', '2022-05-13 17:06:24'),
(4, 6, 9, 28, 2, '2022-05', 1092, '2022-05-13 17:06:24', '2022-05-13 17:06:24'),
(5, 4, 2, 25, 2, '2022-05', 558, '2022-05-13 17:15:22', '2022-05-13 17:15:22'),
(6, 5, 6, 27, 2, '2022-05', 768, '2022-05-13 17:23:22', '2022-05-13 17:23:22'),
(7, 5, 6, 27, 3, '2022-05', 5760, '2022-05-13 17:27:23', '2022-05-13 17:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 100, 60, 40, '2022-05-02 04:54:35', '2022-05-02 04:54:35'),
(6, 2, 2, 100, 60, 40, '2022-05-02 04:54:35', '2022-05-02 04:54:35'),
(7, 2, 3, 100, 60, 40, '2022-05-02 04:54:35', '2022-05-02 04:54:35'),
(20, 6, 1, 100, 60, 50, '2022-05-02 05:28:57', '2022-05-02 05:28:57'),
(21, 6, 2, 100, 60, 50, '2022-05-02 05:28:57', '2022-05-02 05:28:57'),
(22, 6, 3, 100, 60, 50, '2022-05-02 05:28:57', '2022-05-02 05:28:57'),
(27, 8, 1, 100, 80, 50, '2022-05-02 05:53:39', '2022-05-02 05:53:39'),
(28, 8, 2, 100, 80, 50, '2022-05-02 05:53:39', '2022-05-02 05:53:39'),
(29, 8, 3, 100, 80, 50, '2022-05-02 05:53:39', '2022-05-02 05:53:39'),
(30, 8, 4, 100, 80, 50, '2022-05-02 05:53:39', '2022-05-02 05:53:39'),
(31, 1, 1, 100, 40, 20, '2022-05-02 05:55:32', '2022-05-02 05:55:32'),
(32, 1, 2, 100, 40, 20, '2022-05-02 05:55:32', '2022-05-02 05:55:32'),
(33, 1, 3, 100, 40, 20, '2022-05-02 05:55:32', '2022-05-02 05:55:32'),
(34, 1, 4, 100, 40, 20, '2022-05-02 05:55:32', '2022-05-02 05:55:32'),
(35, 9, 4, 100, 50, 30, '2022-05-12 08:22:52', '2022-05-12 08:22:52'),
(36, 9, 1, 100, 50, 30, '2022-05-12 08:22:52', '2022-05-12 08:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Head Teacher', '2022-05-02 06:15:26', '2022-05-02 06:15:26'),
(2, 'Deputy head teacher', '2022-05-02 06:15:41', '2022-05-02 06:15:41'),
(3, 'Teacher', '2022-05-02 06:15:49', '2022-05-02 06:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(10, 11, 2, 15, '2022-05-02 12:52:45', '2022-05-02 14:46:32'),
(14, 15, 2, 10, '2022-05-02 12:59:36', '2022-05-02 14:38:19'),
(16, 17, 2, 10, '2022-05-02 14:53:19', '2022-05-02 14:53:19'),
(17, 18, 2, 15, '2022-05-02 14:54:45', '2022-05-02 14:54:45'),
(18, 19, 2, 20, '2022-05-02 14:55:51', '2022-05-02 14:55:51'),
(19, 20, 2, 25, '2022-05-02 14:57:03', '2022-05-02 14:57:03'),
(20, 21, 2, 15, '2022-05-02 14:58:15', '2022-05-02 14:58:15'),
(21, 22, 2, 10, '2022-05-02 14:59:38', '2022-05-02 14:59:38'),
(23, 15, 2, 5, '2022-05-02 15:49:54', '2022-05-02 15:49:54'),
(24, 25, 2, 7, '2022-05-03 10:12:57', '2022-05-03 10:12:57'),
(25, 26, 2, 3, '2022-05-03 16:31:22', '2022-05-03 16:31:22'),
(26, 27, 2, 4, '2022-05-03 16:33:00', '2022-05-03 16:33:00'),
(27, 28, 2, 9, '2022-05-03 16:34:19', '2022-05-03 16:34:19'),
(28, 29, 2, 8, '2022-05-03 16:35:34', '2022-05-03 16:35:34'),
(29, 30, 2, NULL, '2022-05-03 16:36:46', '2022-05-03 16:36:46'),
(30, 31, 2, 3, '2022-05-03 16:39:05', '2022-05-03 16:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id-user_id',
  `date` date NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(1, 36, '2022-05-05', 'Present', '2022-05-05 17:09:17', '2022-05-05 17:09:17'),
(2, 37, '2022-05-05', 'Leave', '2022-05-05 17:09:17', '2022-05-05 17:09:17'),
(3, 38, '2022-05-05', 'Present', '2022-05-05 17:09:17', '2022-05-05 17:09:17'),
(4, 36, '2022-05-06', 'Absent', '2022-05-05 17:16:42', '2022-05-05 17:16:42'),
(5, 37, '2022-05-06', 'Present', '2022-05-05 17:16:42', '2022-05-05 17:16:42'),
(6, 38, '2022-05-06', 'Absent', '2022-05-05 17:16:42', '2022-05-05 17:16:42'),
(7, 36, '2022-05-09', 'Present', '2022-05-05 17:17:19', '2022-05-05 17:17:19'),
(8, 37, '2022-05-09', 'Present', '2022-05-05 17:17:19', '2022-05-05 17:17:19'),
(9, 38, '2022-05-09', 'Present', '2022-05-05 17:17:19', '2022-05-05 17:17:19'),
(10, 36, '2022-05-10', 'Absent', '2022-05-05 17:21:27', '2022-05-05 17:21:27'),
(11, 37, '2022-05-10', 'Absent', '2022-05-05 17:21:27', '2022-05-05 17:21:27'),
(12, 38, '2022-05-10', 'Absent', '2022-05-05 17:21:27', '2022-05-05 17:21:27'),
(19, 36, '2022-05-11', 'Present', '2022-05-06 08:30:06', '2022-05-06 08:30:06'),
(20, 37, '2022-05-11', 'Leave', '2022-05-06 08:30:06', '2022-05-06 08:30:06'),
(21, 38, '2022-05-11', 'Absent', '2022-05-06 08:30:06', '2022-05-06 08:30:06'),
(28, 36, '2022-05-12', 'Present', '2022-05-06 08:54:10', '2022-05-06 08:54:10'),
(29, 37, '2022-05-12', 'Present', '2022-05-06 08:54:10', '2022-05-06 08:54:10'),
(30, 38, '2022-05-12', 'Present', '2022-05-06 08:54:10', '2022-05-06 08:54:10'),
(31, 36, '2022-05-13', 'Absent', '2022-05-12 03:55:54', '2022-05-12 03:55:54'),
(32, 37, '2022-05-13', 'Absent', '2022-05-12 03:55:54', '2022-05-12 03:55:54'),
(33, 38, '2022-05-13', 'Absent', '2022-05-12 03:55:54', '2022-05-12 03:55:54'),
(37, 36, '2022-05-16', 'Present', '2022-05-12 03:58:31', '2022-05-12 03:58:31'),
(38, 37, '2022-05-16', 'Present', '2022-05-12 03:58:31', '2022-05-12 03:58:31'),
(39, 38, '2022-05-16', 'Present', '2022-05-12 03:58:31', '2022-05-12 03:58:31'),
(40, 36, '2022-05-17', 'Leave', '2022-05-15 12:16:32', '2022-05-15 12:16:32'),
(41, 37, '2022-05-17', 'Present', '2022-05-15 12:16:32', '2022-05-15 12:16:32'),
(42, 38, '2022-05-17', 'Absent', '2022-05-15 12:16:32', '2022-05-15 12:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id-user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `applied_from` date NOT NULL,
  `applied_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `applied_from`, `applied_to`, `created_at`, `updated_at`) VALUES
(2, 37, 6, '2022-05-06', '2022-05-06', '2022-05-05 15:14:26', '2022-05-05 15:14:26'),
(3, 38, 2, '2022-05-10', '2022-05-12', '2022-05-05 15:15:59', '2022-05-05 15:49:30'),
(4, 37, 7, '2022-05-09', '2022-05-13', '2022-05-05 15:48:37', '2022-05-05 15:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id-user_id',
  `previous_salary` double DEFAULT NULL,
  `current_salary` double DEFAULT NULL,
  `salary_increment` double DEFAULT NULL,
  `wef` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `current_salary`, `salary_increment`, `wef`, `created_at`, `updated_at`) VALUES
(2, 36, 35000, 35000, 0, '2022-01-05', '2022-05-04 06:41:45', '2022-05-04 06:41:45'),
(3, 37, 100000, 100000, 0, '2022-01-01', '2022-05-04 06:44:47', '2022-05-04 06:44:47'),
(4, 38, 60000, 60000, 0, '2022-01-05', '2022-05-05 05:28:42', '2022-05-05 05:28:42'),
(5, 36, 35000, 50000, 15000, '2022-06-01', '2022-05-05 07:28:39', '2022-05-05 07:28:39'),
(6, 38, 60000, 80000, 20000, '2022-07-01', '2022-05-05 08:07:18', '2022-05-05 08:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, '1st Term Exam', '2022-05-01 16:56:58', '2022-05-01 16:56:58'),
(5, '2nd Term Exam', '2022-05-01 16:57:10', '2022-05-01 16:57:10'),
(7, '3rd Term Exam', '2022-05-01 17:02:48', '2022-05-01 17:02:48');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Registration Fees', '2022-05-01 08:41:26', '2022-05-01 08:51:32'),
(3, 'Monthly Fees', '2022-05-01 08:42:05', '2022-05-01 08:51:41'),
(4, 'Exam Fees', '2022-05-01 08:42:16', '2022-05-01 08:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(22, 2, 1, 400, '2022-05-03 12:10:12', '2022-05-03 12:10:12'),
(23, 2, 2, 600, '2022-05-03 12:10:12', '2022-05-03 12:10:12'),
(24, 2, 6, 800, '2022-05-03 12:10:12', '2022-05-03 12:10:12'),
(25, 2, 8, 1000, '2022-05-03 12:10:12', '2022-05-03 12:10:12'),
(26, 2, 9, 1200, '2022-05-03 12:10:12', '2022-05-03 12:10:12'),
(31, 3, 1, 2000, '2022-05-03 15:13:48', '2022-05-03 15:13:48'),
(32, 3, 2, 4000, '2022-05-03 15:13:48', '2022-05-03 15:13:48'),
(33, 3, 6, 6000, '2022-05-03 15:13:48', '2022-05-03 15:13:48'),
(34, 3, 8, 8000, '2022-05-03 15:13:48', '2022-05-03 15:13:48'),
(35, 3, 9, 10000, '2022-05-03 15:13:49', '2022-05-03 15:13:49'),
(36, 4, 1, 300, '2022-05-03 16:08:50', '2022-05-03 16:08:50'),
(37, 4, 2, 500, '2022-05-03 16:08:50', '2022-05-03 16:08:50'),
(38, 4, 6, 700, '2022-05-03 16:08:50', '2022-05-03 16:08:50'),
(39, 4, 8, 900, '2022-05-03 16:08:50', '2022-05-03 16:08:50'),
(40, 4, 9, 1100, '2022-05-03 16:08:50', '2022-05-03 16:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Personal Matters', NULL, NULL),
(2, 'Family Matters', NULL, NULL),
(5, 'Health', '2022-05-05 11:45:25', '2022-05-05 11:45:25'),
(6, 'Attended a function', '2022-05-05 15:14:26', '2022-05-05 15:14:26'),
(7, 'Attended Graduation function', '2022-05-05 15:42:09', '2022-05-05 15:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `mark_grades`
--

CREATE TABLE `mark_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) DEFAULT NULL,
  `grade_point` varchar(255) DEFAULT NULL,
  `start_marks` varchar(255) DEFAULT NULL,
  `end_marks` varchar(255) DEFAULT NULL,
  `start_point` varchar(255) DEFAULT NULL,
  `end_point` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark_grades`
--

INSERT INTO `mark_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A', '5', '80', '100', '5', '5', 'Excellent', '2022-05-12 15:06:01', '2022-05-12 15:25:50'),
(2, 'B', '4', '65', '80', '4', '4.99', 'Very Good', '2022-05-12 15:08:26', '2022-05-15 09:11:33'),
(3, 'C', '3', '50', '65', '3', '3.99', 'Good', '2022-05-12 15:14:03', '2022-05-15 09:11:45'),
(4, 'D', '2', '30', '49', '2', '2.99', 'Average', '2022-05-12 15:45:38', '2022-05-15 09:11:53'),
(5, 'E', '1', '20', '29', '1', '1.99', 'Poor', '2022-05-12 15:46:23', '2022-05-15 09:12:02'),
(6, 'F', '0', '0', '19', '0', '0.99', 'Fail', '2022-05-12 15:52:14', '2022-05-12 15:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_22_103119_create_sessions_table', 1),
(9, '2022_05_01_091405_create_student_classes_table', 3),
(10, '2022_05_01_100318_create_student_years_table', 4),
(11, '2022_05_01_103359_create_student_groups_table', 5),
(12, '2022_05_01_110540_create_student_shifts_table', 6),
(13, '2022_05_01_112945_create_fee_categories_table', 7),
(14, '2022_05_01_115757_create_fee_amounts_table', 8),
(15, '2022_05_01_194118_create_exam_types_table', 9),
(16, '2022_05_01_201322_create_school_subjects_table', 10),
(17, '2022_05_01_203905_create_assign_subjects_table', 11),
(18, '2022_05_02_090552_create_designations_table', 12),
(19, '2014_10_12_000000_create_users_table', 13),
(21, '2022_05_02_093638_create_student_registrations_table', 14),
(22, '2022_05_02_102336_create_discount_students_table', 14),
(23, '2022_05_04_081152_create_employee_salary_logs_table', 15),
(24, '2022_05_05_112335_create_leave_purposes_table', 16),
(25, '2022_05_05_112400_create_employee_leaves_table', 17),
(26, '2022_05_05_185709_create_employee_attendances_table', 18),
(28, '2022_05_12_080127_create_student_marks_table', 19),
(29, '2022_05_12_135636_create_mark_grades_table', 20),
(30, '2022_05_12_190140_create_account_student_fees_table', 21),
(31, '2022_05_13_085817_create_salary_accounts_table', 22),
(33, '2022_05_14_085038_create_other_costs_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `other_costs`
--

CREATE TABLE `other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other_costs`
--

INSERT INTO `other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, '2022-05-30', 3000, 'Education', '1652524932.jpg', '2022-05-14 07:42:12', '2022-05-14 07:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary_accounts`
--

CREATE TABLE `salary_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id-user_id',
  `date` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_accounts`
--

INSERT INTO `salary_accounts` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 36, '2022-05', 45000, '2022-05-13 17:04:55', '2022-05-13 17:04:55'),
(3, 37, '2022-05', 93333.333333333, '2022-05-13 17:04:55', '2022-05-13 17:04:55'),
(4, 38, '2022-05', 69333.333333333, '2022-05-13 17:04:55', '2022-05-13 17:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English', '2022-05-01 17:22:17', '2022-05-01 17:22:17'),
(2, 'Kiswahili', '2022-05-01 17:22:28', '2022-05-01 17:22:28'),
(3, 'Mathematics', '2022-05-01 17:22:36', '2022-05-01 17:22:46'),
(4, 'Science', '2022-05-02 05:39:14', '2022-05-02 05:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('RPcRubbLA5dnJNZu4gNDVmACbPb1yemtvvL0iIRy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWWVVR1ZUZ3R4aFlsbHpwVGZXd2k3VGFSQVVFY3E3WUt2ZWVXbnVaUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlL2luZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkRUR1Ry5lS241VzlMV3FDbGZOZ1NsZWg2bHNpNS5NSVVXbHNCM0phRDNoQy5YU0F5RVp3cU8iO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlL2luZGV4Ijt9fQ==', 1652640942);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Class One', '2022-05-01 06:38:22', '2022-05-01 06:38:22'),
(2, 'Class Two', '2022-05-01 06:39:12', '2022-05-01 06:39:12'),
(6, 'Class Three', '2022-05-01 06:49:16', '2022-05-01 06:49:16'),
(8, 'Class Four', '2022-05-01 14:27:50', '2022-05-01 14:27:50'),
(9, 'Class Five', '2022-05-02 15:43:45', '2022-05-02 15:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Art', '2022-05-01 07:43:41', '2022-05-01 07:43:41'),
(4, 'IT', '2022-05-01 07:45:57', '2022-05-01 07:45:57'),
(5, 'Science', '2022-05-01 07:50:17', '2022-05-01 07:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id-user_id',
  `id_no` varchar(255) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(4, 34, '20010034', 3, 1, 31, 4, 35, '2022-05-12 08:59:14', '2022-05-12 08:59:14'),
(7, 15, '20030015', 6, 9, 36, 4, 50, '2022-05-12 10:14:19', '2022-05-12 10:14:19'),
(8, 28, '20040028', 6, 9, 36, 4, 85, '2022-05-12 10:14:19', '2022-05-12 10:14:19'),
(9, 25, '20020025', 4, 2, 5, 4, 80, '2022-05-12 10:33:35', '2022-05-12 10:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `student_registrations`
--

CREATE TABLE `student_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id-student_id',
  `roll` int(16) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_registrations`
--

INSERT INTO `student_registrations` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(6, 11, 11, 1, 5, 5, 1, '2022-05-02 11:11:50', '2022-05-03 16:41:49'),
(10, 15, 15, 8, 5, 5, 1, '2022-05-02 12:51:41', '2022-05-03 12:57:10'),
(17, 22, 8, 6, 4, 2, 2, '2022-05-02 14:53:19', '2022-05-03 12:57:34'),
(18, 23, 30, 8, 3, 4, 1, '2022-05-02 14:54:45', '2022-05-03 12:56:25'),
(19, 24, 25, 6, 3, 5, 1, '2022-05-02 14:55:51', '2022-05-03 12:55:57'),
(20, 25, 20, 2, 4, 2, 1, '2022-05-02 14:57:03', '2022-05-03 12:55:39'),
(21, 26, 26, 1, 5, 4, 1, '2022-05-02 14:58:15', '2022-05-03 16:41:49'),
(22, 27, NULL, 6, 5, 2, 1, '2022-05-02 14:59:38', '2022-05-02 14:59:38'),
(24, 15, 1, 9, 6, 5, 1, '2022-05-02 15:49:54', '2022-05-03 10:43:29'),
(25, 28, 2, 9, 6, 4, 1, '2022-05-03 10:12:57', '2022-05-03 10:43:29'),
(26, 29, 12, 6, 6, 2, 2, '2022-05-03 16:31:22', '2022-05-03 16:40:35'),
(27, 30, NULL, 1, 6, 4, 1, '2022-05-03 16:33:00', '2022-05-03 16:33:00'),
(28, 31, 31, 1, 5, 4, 1, '2022-05-03 16:34:19', '2022-05-03 16:41:49'),
(29, 32, 13, 6, 6, 5, 1, '2022-05-03 16:35:34', '2022-05-03 16:40:35'),
(30, 33, NULL, 2, 5, 5, 1, '2022-05-03 16:36:46', '2022-05-03 16:36:46'),
(31, 34, 17, 1, 3, 4, 1, '2022-05-03 16:39:05', '2022-05-03 16:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', '2022-05-01 08:12:36', '2022-05-01 08:17:09'),
(2, 'Shift B', '2022-05-01 08:12:47', '2022-05-01 08:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, '2001', '2022-05-01 07:13:59', '2022-05-01 07:13:59'),
(4, '2002', '2022-05-01 07:20:08', '2022-05-01 07:20:08'),
(5, '2003', '2022-05-02 06:25:48', '2022-05-02 06:25:48'),
(6, '2004', '2022-05-02 15:43:59', '2022-05-02 15:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) DEFAULT NULL COMMENT '0-User , 1-Admin,2-Student,3-Employee',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT 'admin-head-of-software , operator , computer operator, user-employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0-inactive , 1-active',
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `gender`, `image`, `father_name`, `mother_name`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, '1', 'Alex\r\n', 'mwangialex26@yahoo.com', NULL, '$2y$10$EDuG.eKn5W9LWqClfNgSleh6lsi5.MIUWlsB3JaD3hC.XSAyEZwqO', '717316925', '77441 - 00611', 'Male', '1651391206.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, 'profile-photos/r3dt3NSZduBSiGdARGZIdI5sZa8GD7QAeMSRIsQ6.png', NULL, NULL),
(2, '0', 'Jane Doe\r\n', 'janedoe@gmail.com', NULL, '$2y$10$vJ3FdI43OtCmBQlqiIU1d.I.0sp.ftnZMQ9YzbbGwArhoaCEh25Ii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(11, 'Student', 'Heung', NULL, NULL, '$2y$10$n5D7il2wuXYbvMgaJXDuuehjaI9XCj/qxnhmKDZ9s.1Ts5kT8dyS.', '87654323', 'Japan', 'Female', '1651514525.jpg', 'Megan', 'Tracey', 'Christian', '20030011', '1988-12-01', '5573', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 11:11:50', '2022-05-02 15:02:05'),
(15, 'Student', 'Dominic', NULL, NULL, '$2y$10$PU8DFl6l6HobBbaQJ2M9O.gw1pA8gTUJQVcAbtt67cGUJWTEvqypW', '+1 (9) 853-432', 'Korea', 'Male', '1651513617.jpg', 'Edward', 'Yvonne', 'Christian', '20030015', '1997-11-25', '9700', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 12:51:41', '2022-05-02 14:46:57'),
(22, 'Student', 'Theresa', NULL, NULL, '$2y$10$iJcmaD2IERhGdqMQeV7Y2.DL/dGEaJCFujSgTRJm9yjakZczYiu2u', '+1 (325) 853-4839', 'UK', 'Female', '1651514700.jpg', 'Ian', 'Samantha', 'Christian', '20020016', '1990-10-22', '4187', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 14:53:18', '2022-05-02 15:05:00'),
(23, 'Student', 'Vanessa', NULL, NULL, '$2y$10$odDCopcUq/wmVVn5hXFbY.aFOsg0vS5TaMzitB7LxGdWM0BWpSOSK', '+1 (312) 853-4839', 'USA', 'Female', '1651514085.jpg', 'Victoria', 'Dylan', 'Islam', '20010023', '1997-12-21', '4985', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 14:54:45', '2022-05-02 14:54:45'),
(24, 'Student', 'Alex', NULL, NULL, '$2y$10$mVm1Bspd/eZmmmAyrFW.ueYvJmaG/MfEDAigWUPhzVeoa4ItzZDiK', '0716045796', '77441 - 00611', 'Male', '1651514151.jpg', 'Hosea', 'Wakanyi', 'Hindu', '20010024', '1995-09-15', '8183', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 14:55:51', '2022-05-02 14:55:51'),
(25, 'Student', 'Peter', NULL, NULL, '$2y$10$q47AqukjSUWGLzoceIsOmug0I.o/50zOHDaamnTRqWTSZ7sw8Z2Gq', '+1 (32) 853-334', 'Korea', 'Male', '1651514223.jpg', 'James', 'Jennifer', 'Hindu', '20020025', '1990-11-15', '8676', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 14:57:03', '2022-05-02 14:57:03'),
(26, 'Student', 'Frank', NULL, NULL, '$2y$10$UFPl.mwNzZNg6vG/eA1eAe6xVxonyMJlVsF3g1udtBzTcnBJ8NiKG', '+1 (19) 3434-549', 'Canada', 'Male', '1651514295.jpg', 'Bob', 'Mary', NULL, '20030026', '2005-08-29', '7253', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 14:58:15', '2022-05-02 14:58:15'),
(27, 'Student', 'Wendy', NULL, NULL, '$2y$10$mH2QLUDW/LmkkpPjOEOyGeAEnt0o2gus0oVtnVSS3q9CGrcQPBG3e', '+1 (111) 999-487', 'France', 'Female', '1651514378.png', 'Evan', 'Sophie', 'Christian', '20030027', '2001-01-24', '7340', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-02 14:59:38', '2022-05-02 14:59:38'),
(28, 'Student', 'Arthur', NULL, NULL, '$2y$10$n7qJ0axGfZfvXavEJxG8qOByt2fGaFBeNQvBvhy3vbXmiDlqM6.ty', '+1 (05) 853-4839', 'Ethiopia', 'Male', '1651583577.jpg', 'John', 'Teresa', 'Hindu', '20040028', '1999-10-29', '3345', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-03 10:12:57', '2022-05-03 10:12:57'),
(29, 'Student', 'Chloe', NULL, NULL, '$2y$10$G1hm.HA8QOoDXppSIOuF2.P/qM0vn3WqsBXfJhbyc5RO6YBBxBuYm', '+1 (215) 853-094839', 'Rwanda', 'Female', '1651606282.jpg', 'Adrian', 'Joanne', 'Hindu', '20040029', '1991-12-12', '3095', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-03 16:31:22', '2022-05-03 16:31:22'),
(30, 'Student', 'Grace', NULL, NULL, '$2y$10$n6GAzWyh9o.jbtUhrxCAt.0vV9Vl0MO3rN1qd.xMCzeBSsm6rp4Sa', '+1 (111) 853-4839', 'Ohio', 'Female', '1651606380.jpg', 'Christopher', 'Lisa', 'Christian', '20040030', '1997-10-21', '636', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-03 16:33:00', '2022-05-03 16:33:00'),
(31, 'Student', 'Leonard', NULL, NULL, '$2y$10$Zuf2BHuuOmQ.9Kw2/I5JQOKgVc/0j9UFEHk8Engp55FcuP3vwVaZy', '+1 (23) 473-9639', 'Georgia', 'Male', '1651606459.jpg', 'Joshua', 'Wanda', 'Islam', '20030031', '1990-01-31', '1226', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-03 16:34:19', '2022-05-03 16:34:19'),
(32, 'Student', 'Max', NULL, NULL, '$2y$10$FQGVpa7ulvaGkEquTkJ89.SfDuoZ34zV/wOZLRCBEb26WnI8F4sua', '+1 (330)483-464', 'New York', 'Male', '1651606534.jpg', 'Justin', 'Samantha', 'Islam', '20040032', '1995-06-30', '2646', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-03 16:35:34', '2022-05-03 16:35:34'),
(33, 'Student', 'Christopher', NULL, NULL, '$2y$10$GzhUotRdJgG3KSzXpkNI1.YSJtjRoc6qtD/geXqD/pyDXYA1Qrbgq', '+1 (325) 853-4839', 'LA', 'Male', '1651606606.jpg', 'Alan', 'Pippa', 'Christian', '20030033', '1970-01-01', '7265', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-03 16:36:46', '2022-05-03 16:36:46'),
(34, 'Student', 'Neil', NULL, NULL, '$2y$10$IBH/uM9fky1dMLtW1ep19.i.J1oL0uq8120iY87O3CJTHa.SBq.4W', '+1 (322) 853-3839', 'California', 'Male', '1651606745.jpeg', 'Jason', 'Kimberly', NULL, '20010034', '1970-01-01', '4657', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-05-03 16:39:05', '2022-05-03 16:39:05'),
(36, 'Employee', 'Emma', NULL, NULL, '$2y$10$AvutTbjJibPY7dherp2lmO28LHwgLzY9J7fMbWLeaj2I6uEh6zWjS', '+1 (325) 111-111', 'Nairobi', 'Female', '1651666320.jpg', 'Alexander', 'Felicity', 'Christian', '2022010001', '1998-12-20', '4106', NULL, '2022-01-05', 2, 50000, 1, NULL, NULL, NULL, '2022-05-04 06:41:45', '2022-05-05 07:28:39'),
(37, 'Employee', 'Robert', NULL, NULL, '$2y$10$0hpMxKbCdWVse2Jy/Ta5WuaoJuGAzDXLa8HwHJYM5E22Q6ONsZaY.', '+1 (21) 83-973', 'Dar', 'Male', '1651666538.jpg', 'Owen', 'Zoe', 'Christian', '2022010037', '1990-10-10', '4657', NULL, '2022-01-01', 3, 100000, 1, NULL, NULL, NULL, '2022-05-04 06:44:47', '2022-05-04 09:15:38'),
(38, 'Employee', 'Emily', NULL, NULL, '$2y$10$b9Tvkeg8tUf/Ssw3ckZSAOdt3ndeK9bnQ59pS.q5ZyOylBVIvgJGy', '+1 (312) 853-4839', 'Pakistan', 'Female', '1651739322.jpg', 'Adrian', 'Una', 'Hindu', '2022010038', '1995-12-10', '2767', NULL, '2022-01-05', 2, 80000, 1, NULL, NULL, NULL, '2022-05-05 05:28:42', '2022-05-05 08:07:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `mark_grades`
--
ALTER TABLE `mark_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_costs`
--
ALTER TABLE `other_costs`
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
-- Indexes for table `salary_accounts`
--
ALTER TABLE `salary_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_subjects_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registrations`
--
ALTER TABLE `student_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mark_grades`
--
ALTER TABLE `mark_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `other_costs`
--
ALTER TABLE `other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_accounts`
--
ALTER TABLE `salary_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_registrations`
--
ALTER TABLE `student_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
