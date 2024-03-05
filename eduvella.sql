-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 04:51 PM
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
-- Database: `eduvella`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_sessions`
--

CREATE TABLE `academic_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `current` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `academic_sessions`
--

INSERT INTO `academic_sessions` (`id`, `name`, `note`, `start`, `end`, `current`, `created_at`, `updated_at`) VALUES
(1, '2018/2019', '2018/2019', '2018-08-21 19:00:00', '2019-08-21 19:00:00', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, '2019/2020', '2019/2020', '2019-08-21 19:00:00', '2020-08-21 19:00:00', 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, '2020/2021', '2020/2021', '2020-08-21 19:00:00', '2021-08-21 19:00:00', 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, '2021/2021', '2021/2022', '2021-08-21 19:00:00', '2022-08-21 19:00:00', 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(5, '2022/2023', '2022/2023', '2022-08-21 19:00:00', '2023-08-21 19:00:00', 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(6, '2023/2024', '2023/2024', '2023-08-21 19:00:00', '2024-08-21 19:00:00', 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `name`, `app_token`, `app_secret`, `status`, `created_at`, `updated_at`) VALUES
(1, 'eduvella app', 'VRzcwMFVzzwsMvEfyZphPRW7F', 'KfgMJH0X3pqlQLNJg4hFHAG1Y', 'active', '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `teacher_id`, `student_id`, `subject_id`, `section_id`, `school_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, 1, 'Grade One', 'grade-one', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 4, 1, 1, 1, 1, 'Grade Two', 'grade-two', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 4, 1, 1, 1, 1, 'Grade Three', 'grade-three', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 4, 1, 1, 1, 1, 'Grade Four', 'grade-four', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(5, 4, 1, 1, 1, 1, 'Grade Five', 'grade-five', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(6, 4, 1, 1, 1, 1, 'Grade Six', 'grade-six', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(7, 4, 1, 1, 1, 1, 'Grade Seven', 'grade-seven', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `on_post` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `from_user_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `on_post`, `from_user`, `from_user_role`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'teaching', 'This is a sample comment', '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `c_a_tests`
--

CREATE TABLE `c_a_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_a` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_b` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_c` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `second` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `term_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `obedience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `honesty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `self_reliance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `self_control` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_of_initiative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `punctuality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `general_neatness` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `industry_or_perserverance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendance_in_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attentiveness` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handwriting` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sports_and_games` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verbal_communication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manual_skills` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handling_musical_instruments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vacation_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resumption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `principal_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sunday', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'Monday', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 'Tuesday', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 'Wednesday', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(5, 'Thursday', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(6, 'Friday', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(7, 'Saturday', '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `dormitories`
--

CREATE TABLE `dormitories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dormitories`
--

INSERT INTO `dormitories` (`id`, `name`, `room_number`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Beecroft', '10', 'this sample dormitory', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duty_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `religion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discussion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `students` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('pending','done') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `term_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `date`, `comment`, `term_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'First Terminal Examination', '2018-11-10', '', 1, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'Second Terminal Examination', '2019-04-03', '', 2, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 'Third Terminal Examination', '2019-08-14', '', 3, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 'First Terminal Examination', '2018-11-10', '', 4, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(5, 'Second Terminal Examination', '2019-04-03', '', 5, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(6, 'Third Terminal Examination', '2019-08-14', '', 6, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(7, 'First Terminal Examination', '2018-11-10', '', 7, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(8, 'Second Terminal Examination', '2019-04-03', '', 8, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(9, 'Third Terminal Examination', '2019-08-14', '', 9, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `amount`, `method`, `date`, `category`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Salary Payment', '5000', 'Cash', '2017-12-25', 1, 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Salary Payment', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Excellent', 'A', 75, 100, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'Good', 'B', 50, 74, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 'Average', 'C', 40, 49, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 'Poor', 'D', 0, 39, 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount_paid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `title`, `description`, `amount`, `amount_paid`, `due`, `date`, `creation_timestamp`, `student_id`, `payment_method`, `payment_detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School Fees', 'School Fees', '4000', '4000', '', '2018-12-14', 0, 3, 'Cash', 'Cash', 'paid', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'School Fees', 'School Fees', '5000', '5000', '', '2018-12-14', 0, 3, 'Cash', 'Cash', 'paid', '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL DEFAULT '1',
  `mark_obtained` int(11) NOT NULL,
  `mark_total` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `obedience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `honesty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `self_reliance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `self_control` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_of_initiative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `punctuality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `general_neatness` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `industry_or_perserverance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendance_in_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attentiveness` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handwriting` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sports_and_games` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verbal_communication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manual_skills` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handling_musical_instruments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vacation_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resumption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `principal_comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `subject_id`, `student_id`, `class_id`, `exam_id`, `term_id`, `mark_obtained`, `mark_total`, `comment`, `obedience`, `honesty`, `self_reliance`, `self_control`, `use_of_initiative`, `punctuality`, `general_neatness`, `industry_or_perserverance`, `attendance_in_class`, `attentiveness`, `handwriting`, `sports_and_games`, `verbal_communication`, `manual_skills`, `handling_musical_instruments`, `vacation_date`, `resumption`, `teacher_comment`, `teacher_id`, `principal_comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1, 1, 54, 60, 'good', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 1, 6, 1, 1, 1, 43, 60, 'good', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 1, 7, 1, 2, 2, 38, 60, 'good', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 2, 8, 1, 2, 2, 36, 60, 'good', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `title`, `description`, `file_name`, `file_format`, `class_id`, `teacher_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Cabinet/Parliamentary System of Government', 'The central government has exclusive matters constitutionally allocated to it, such matters are of common interest and they may include currency, foreign affairs, communication, census, defence, arms and ammunitions, immigration, customs and excise etc.', '72775introduction-to-technology.doc', '', 1, 4, '', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'Cabinet/Parliamentary System of Government', 'The central government has exclusive matters constitutionally allocated to it, such matters are of common interest and they may include currency, foreign affairs, communication, census, defence, arms and ammunitions, immigration, customs and excise etc.', '72775introduction-to-technology.doc', '', 1, 4, '', '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `from_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to` int(11) NOT NULL,
  `to_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `attach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_05_24_073233_create_messages_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2016_06_20_023525_posts', 1),
(10, '2016_06_20_023559_comments', 1),
(11, '2016_06_24_071404_create_transports_table', 1),
(12, '2016_06_24_071420_create_dormitories_table', 1),
(13, '2016_07_08_050334_create_settings_table', 1),
(14, '2016_07_16_034036_create_subjects_table', 1),
(15, '2016_07_16_155838_create_items_table', 1),
(16, '2016_07_17_051120_create_libraries_table', 1),
(17, '2016_07_17_052210_create_expense_categories_table', 1),
(18, '2016_07_19_020530_create_days_table', 1),
(19, '2016_07_19_020738_create_class_routine_table', 1),
(20, '2016_07_27_080420_create_sections_table', 1),
(21, '2016_07_28_053953_create_attendance_table', 1),
(22, '2016_08_06_161011_create_exams_table', 1),
(23, '2016_08_06_170423_create_grades_table', 1),
(24, '2016_11_14_132126_create_replies_table', 1),
(25, '2016_11_28_084250_create_classes_table', 1),
(26, '2016_11_28_094915_create_galleries_table', 1),
(27, '2016_12_03_152429_create_notices_table', 1),
(28, '2016_12_09_102739_create_expenses_table', 1),
(29, '2016_12_09_114317_create_payments_table', 1),
(30, '2016_12_09_114804_create_invoices_table', 1),
(31, '2016_12_12_160030_create_marks_table', 1),
(32, '2016_12_12_160039_create_materials_table', 1),
(33, '2017_01_11_080622_create_test_questions_table', 1),
(34, '2017_01_11_080633_create_tests_table', 1),
(35, '2017_01_11_081132_create_test_results_table', 1),
(36, '2017_01_29_152356_create_teacher_attendances_table', 1),
(37, '2017_01_29_161902_create_employees_table', 1),
(38, '2017_01_29_161924_create_employee_attendances_table', 1),
(39, '2018_04_18_172011_create_schools_table', 1),
(40, '2018_11_14_172357_create_roles_table', 1),
(41, '2018_11_16_164046_create_visitors_table', 1),
(42, '2018_11_16_164058_create_enquiries_table', 1),
(43, '2018_11_19_110407_create_academic_sessions_table', 1),
(44, '2018_11_19_213714_create_promotion_histories_table', 1),
(45, '2019_01_21_200604_create_apps_table', 1),
(46, '2019_02_06_170800_create_terms_table', 1),
(47, '2019_02_06_210557_create_c_a_tests_table', 1),
(48, '2019_08_06_183849_create_test_options_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `body`, `for`, `active`, `created_at`, `updated_at`) VALUES
(1, 'This is a sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'all', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'This is a sample Notification', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'all', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `title`, `expense_category_id`, `payment_type`, `invoice_id`, `student_id`, `method`, `description`, `amount`, `active`, `created_at`, `updated_at`) VALUES
(1, 'School Fees', 0, 'income', 1, 3, 'Cash', 'School Fees', '5000', 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'School Fees', 0, 'income', 1, 3, 'Cash', 'School Fees', '4000', 0, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `image`, `body`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Industrial Visit to A Broadcasting Corporation', '62206industrial-visit-to-a-broadcasting-corporation.jpg', 'Students of Semester one to three offering Business Administration were privileged to visit Ghana Broadcasting Corporation (GBC) on 06-11-2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'industrial-visit-to-a-broadcasting-corporation', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 1, 'Pre-Exam Stress Buster', '75092pre-exam-stress-buster.jpg', 'We conducted a seminar on ‘Pre-Exam Stress Buster’ at Auditorium on 10-11-2017. Resource person, Dr. Hiteshini Jugessur is a renowned International faculty from Art of Living Foundation. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pre-exam-stress-buster', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 1, 'Attitude: An essential element at the workplace', '13807attitude-an-essential-element-at-the-workplace.jpg', 'Department of Business Administration organized a seminar for its BBA students on 11th November. Resource person was Mrs. Lynda C H Fiati, Director of Stelin Automobiles and she spoke on ‘Attitude: An essential element at the workplace. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'attitude-an-essential-element-at-the-workplace', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 1, 'International Students Week 2017', '36580international-students-week-2017.jpg', 'In 1941, November 17 was declared International Students Day. The International Student’s Day is a celebration of multiculturalism, diversity and cooperation among students. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'international-students-week-2017', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_histories`
--

CREATE TABLE `promotion_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `from_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion_histories`
--

INSERT INTO `promotion_histories` (`id`, `student_id`, `from_class`, `to_class`, `created_at`, `updated_at`) VALUES
(1, 3, '1', '2', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 3, '2', '3', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 6, '1', '2', '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 6, '2', '3', '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_role` int(11) NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `add_student` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_students` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_parents` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_teacher` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_teachers` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_admin` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_admin` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_class` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_classes` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_school` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_schools` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_section` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_sections` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_tests` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_tests` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_subject` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_subjects` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_post` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_media` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `send_sms` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_exam` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_exams` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_grade` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_grade` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_mark` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_marks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_general_mark_report` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `edit_general_mark_report` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_invoice` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_invoice` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_expense` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_expenses` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_expense_category` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_expense_category` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_payment` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_payment` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_employee` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_employee` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_routine` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `take_attendance` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_hostel` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_library` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_notice` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `add_transport` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_tools` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_settings` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_student` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_teacher` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_quality_assurance` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_result` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_admin` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `admission_enquiry` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_visitors_log` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `add_student`, `view_students`, `add_parent`, `view_parents`, `add_teacher`, `view_teachers`, `add_admin`, `view_admin`, `add_class`, `view_classes`, `add_school`, `view_schools`, `add_section`, `view_sections`, `add_tests`, `view_tests`, `add_subject`, `view_subjects`, `add_post`, `add_media`, `send_sms`, `add_exam`, `view_exams`, `add_grade`, `view_grade`, `add_mark`, `view_marks`, `view_general_mark_report`, `edit_general_mark_report`, `add_invoice`, `view_invoice`, `add_expense`, `view_expenses`, `add_expense_category`, `view_expense_category`, `add_payment`, `view_payment`, `add_employee`, `view_employee`, `add_routine`, `take_attendance`, `add_hostel`, `add_library`, `add_notice`, `add_transport`, `view_tools`, `view_settings`, `is_student`, `is_parent`, `is_teacher`, `is_quality_assurance`, `view_result`, `is_admin`, `admission_enquiry`, `view_visitors_log`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(2, 'parent', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(3, 'student', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(4, 'teacher', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(5, 'receptionist', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(6, 'quality_assurance', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2019-10-21 09:48:14', '2019-10-21 09:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `class_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `starts` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ends` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `time` enum('am','pm') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'am',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `subject_id`, `class_id`, `starts`, `ends`, `day_id`, `time`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '6 am', '9 am', 4, 'am', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 2, 1, '9 am', '11 am', 4, 'am', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stamp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `email`, `phone`, `address`, `photo`, `stamp`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'California High School', 'contact@calhigh.edu', '+1 925-803-3200', '9870 Broadmoor Dr, San Ramon, CA 94583, USA', 'logo.png', '', 'cosmic', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `class_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `teacher_id`, `class_id`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'First', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `system_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `system_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `system_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_align` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skin_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `can_change` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_name`, `system_title`, `address`, `system_email`, `currency`, `text_align`, `skin_color`, `page`, `can_change`, `created_at`, `updated_at`) VALUES
(1, 'technoknowledge', 'Sample School', 'TechnoKnowledge (PVT.LTD)\r\n ,Pakistan', 'info@thetecknoknowledge.com', 'PKR', '', 'green', '1', '1', '2019-10-21 09:48:15', '2019-10-21 09:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `class_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `teacher_id`, `class_id`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Mathematics', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 4, 1, 'English', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 4, 2, 'Computer Science', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 4, 2, 'Social Science', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendances`
--

CREATE TABLE `teacher_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'First Term', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(2, 'Second Term', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(3, 'Third Term', 1, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(4, 'First Term', 2, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(5, 'Second Term', 2, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(6, 'Third Term', 2, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(7, 'First Term', 3, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(8, 'Second Term', 3, '2019-10-21 09:48:15', '2019-10-21 09:48:15'),
(9, 'Third Term', 3, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '2',
  `redo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_options`
--

CREATE TABLE `test_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `option` text COLLATE utf8_unicode_ci NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `point` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `score` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `questions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_action` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` int(10) UNSIGNED NOT NULL,
  `route_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `section_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `dormitory_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('student','teacher','parent','admin','super','receptionist','quality_assurance') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'student',
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_type` enum('user','super') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `birthday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `religion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bloodgroup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `reg_no`, `class_id`, `section_id`, `parent_id`, `dormitory_id`, `school_id`, `image`, `role`, `role_id`, `admin_type`, `birthday`, `gender`, `active`, `religion`, `bloodgroup`, `profession`, `address`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'info@thetecknoknowledge.com', 'info@thetecknoknowledge.com', '$2y$10$hc3DoquNc.iy68unhn0uDeCa5X4N6GCHWvB9ZGaOc7bT3AVc8K19K', '', 0, 0, 0, 0, 1, 'sample.jpg', 'admin', 1, 'super', '', '', 1, '', '', '', '', '232', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:21'),
(2, 'Mr and Mrs Doe', 'parent@mail.com', '$2y$10$ozSKV9ie8kNWyvPspFtYTO2YjnaKs5L/oT3E2Aj/Inf/nurn5Kgle', '', 0, 0, 0, 0, 1, 'sample.jpg', 'parent', 2, 'user', '', '', 1, '', '', 'Doctor', 'Oke Ayepe, Osogbo', '6645', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(3, 'Ojo Kayode', 'student@student.com', '$2y$10$8iGbZSJJjrRflKPePT2F4emZKBX49ErKKA2fGPJvFZQRXDsU5FdrK', 'EV20170001', 1, 1, 2, 1, 1, 'sample.jpg', 'student', 3, 'user', '', 'Male', 1, '', '', '', 'Washington, USA', '', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(4, 'Uncle Emmanuel', 'teacher@teacher.com', '$2y$10$yxMtonVo/VEQ0NOXp.Y4rOs//4HXroMJOfqBBzhXrfp008C5eniqG', '', 0, 0, 0, 0, 1, 'sample.jpg', 'teacher', 4, 'user', '', '', 1, '', '', '', 'Oke Ayepe, Osogbo', '', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(5, 'Evelina Bills', 'reception@reception.com', '$2y$10$6U/97.pdvy6yWgCpU0T7bufk9P4XaDSd6d3lRZBByUZBWjDebLTUq', '', 0, 0, 0, 0, 1, 'sample.jpg', 'receptionist', 5, 'user', '', '', 1, '', '', '', '', '', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(6, 'Sammy Brook', 'sammy@student.com', '$2y$10$OQnOTi7X9n0xRnd51/EF4OXxK9hqyJgl9g63dMfvDviV/EUdloRhu', 'EV20180002', 1, 1, 2, 1, 1, 'sample.jpg', 'student', 3, 'user', '', 'Male', 1, '', '', '', 'Michigan, USA', '', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(7, 'Jon Cameron', 'jon@student.com', '$2y$10$EkfNssWMccGKpV7OBownRuX85efQUKBbIHuvwgYkPe7eJHAxPl6IW', 'EV20180003', 1, 1, 2, 1, 1, 'sample.jpg', 'student', 3, 'user', '', 'Male', 1, '', '', '', 'Iowa, USA', '', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(8, 'Raven Sean', 'raven@student.com', '$2y$10$W5GlD6nz9gUY2pYhoRxwNunR82N8WQcSSbxqUNJ3A1iYOiE1qX5cC', 'EV20180004', 1, 1, 2, 1, 1, 'sample.jpg', 'student', 3, 'user', '', 'Male', 1, '', '', '', 'Vegas, USA', '', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(9, 'Kelvin Ball', 'kelvin@student.com', '$2y$10$7XNSjCtkJ3Z6lUCInO7Hv.8RcvD0zyGszYfNHUnaodTHWo7YyzWjq', 'EV20180005', 1, 1, 2, 1, 1, 'sample.jpg', 'student', 3, 'user', '', 'Male', 1, '', '', '', 'Florida, USA', '', NULL, '2019-10-21 09:48:14', '2019-10-21 09:48:14'),
(10, 'Miss Joe', 'curriculum@curriculum.com', '$2y$10$iQ9bO00dgtXnqUG.zCot8eKLWq1NGauPpdH/bsJHXFM5lnljj7nEe', '', 0, 0, 0, 0, 1, 'sample.jpg', 'quality_assurance', 6, 'user', '', '', 1, '', '', '', 'San Diego', '', NULL, '2019-10-21 09:48:15', '2019-10-21 09:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `check_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `check_out` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `counts` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `whom_to_meet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_title_unique` (`title`),
  ADD UNIQUE KEY `classes_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_a_tests`
--
ALTER TABLE `c_a_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dormitories`
--
ALTER TABLE `dormitories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `promotion_histories`
--
ALTER TABLE `promotion_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_title_unique` (`title`);

--
-- Indexes for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_options`
--
ALTER TABLE `test_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `c_a_tests`
--
ALTER TABLE `c_a_tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dormitories`
--
ALTER TABLE `dormitories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotion_histories`
--
ALTER TABLE `promotion_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_options`
--
ALTER TABLE `test_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
