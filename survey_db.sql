-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 03:05 AM
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
-- Database: `survey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `response` enum('puas','ragu-ragu','tidak puas') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `response`, `created_at`) VALUES
(1, 'ragu-ragu', '2024-11-12 16:23:37'),
(2, 'ragu-ragu', '2024-11-12 16:23:41'),
(3, 'ragu-ragu', '2024-11-12 16:23:42'),
(4, 'ragu-ragu', '2024-11-12 16:23:42'),
(5, 'ragu-ragu', '2024-11-12 16:23:43'),
(6, 'ragu-ragu', '2024-11-12 16:25:11'),
(7, 'puas', '2024-11-12 16:25:19'),
(8, 'tidak puas', '2024-11-12 16:32:26'),
(9, 'puas', '2024-11-12 16:33:03'),
(10, 'tidak puas', '2024-11-13 01:01:23'),
(11, 'puas', '2024-11-13 01:10:33'),
(12, 'puas', '2024-11-13 01:10:54'),
(13, 'ragu-ragu', '2024-11-13 01:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `survey_suggestions`
--

CREATE TABLE `survey_suggestions` (
  `id` int(11) NOT NULL,
  `suggestion` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_suggestions`
--

INSERT INTO `survey_suggestions` (`id`, `suggestion`, `created_at`) VALUES
(1, 'k', '2024-11-12 16:25:14'),
(2, 'mm', '2024-11-12 16:25:21'),
(3, 'fuck', '2024-11-12 16:32:30'),
(4, 'like it\r\n\r\n', '2024-11-12 16:33:11'),
(5, 'uu', '2024-11-13 01:01:27'),
(6, 'ss', '2024-11-13 01:10:35'),
(7, 'ss', '2024-11-13 01:10:56'),
(8, 'd', '2024-11-13 01:34:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_suggestions`
--
ALTER TABLE `survey_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `survey_suggestions`
--
ALTER TABLE `survey_suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
