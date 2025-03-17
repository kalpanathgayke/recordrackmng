-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 10:08 AM
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
-- Database: `records_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` int(11) NOT NULL,
  `rack_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `rack_name`) VALUES
(1, 'Rack 1'),
(10, 'Rack 10'),
(100, 'Rack 100'),
(11, 'Rack 11'),
(12, 'Rack 12'),
(13, 'Rack 13'),
(14, 'Rack 14'),
(15, 'Rack 15'),
(16, 'Rack 16'),
(17, 'Rack 17'),
(18, 'Rack 18'),
(19, 'Rack 19'),
(2, 'Rack 2'),
(20, 'Rack 20'),
(21, 'Rack 21'),
(22, 'Rack 22'),
(23, 'Rack 23'),
(24, 'Rack 24'),
(25, 'Rack 25'),
(26, 'Rack 26'),
(27, 'Rack 27'),
(28, 'Rack 28'),
(29, 'Rack 29'),
(3, 'Rack 3'),
(30, 'Rack 30'),
(31, 'Rack 31'),
(32, 'Rack 32'),
(33, 'Rack 33'),
(34, 'Rack 34'),
(35, 'Rack 35'),
(36, 'Rack 36'),
(37, 'Rack 37'),
(38, 'Rack 38'),
(39, 'Rack 39'),
(4, 'Rack 4'),
(40, 'Rack 40'),
(41, 'Rack 41'),
(42, 'Rack 42'),
(43, 'Rack 43'),
(44, 'Rack 44'),
(45, 'Rack 45'),
(46, 'Rack 46'),
(47, 'Rack 47'),
(48, 'Rack 48'),
(49, 'Rack 49'),
(5, 'Rack 5'),
(50, 'Rack 50'),
(51, 'Rack 51'),
(52, 'Rack 52'),
(53, 'Rack 53'),
(54, 'Rack 54'),
(55, 'Rack 55'),
(56, 'Rack 56'),
(57, 'Rack 57'),
(58, 'Rack 58'),
(59, 'Rack 59'),
(6, 'Rack 6'),
(60, 'Rack 60'),
(61, 'Rack 61'),
(62, 'Rack 62'),
(63, 'Rack 63'),
(64, 'Rack 64'),
(65, 'Rack 65'),
(66, 'Rack 66'),
(67, 'Rack 67'),
(68, 'Rack 68'),
(69, 'Rack 69'),
(7, 'Rack 7'),
(70, 'Rack 70'),
(71, 'Rack 71'),
(72, 'Rack 72'),
(73, 'Rack 73'),
(74, 'Rack 74'),
(75, 'Rack 75'),
(76, 'Rack 76'),
(77, 'Rack 77'),
(78, 'Rack 78'),
(79, 'Rack 79'),
(8, 'Rack 8'),
(80, 'Rack 80'),
(81, 'Rack 81'),
(82, 'Rack 82'),
(83, 'Rack 83'),
(84, 'Rack 84'),
(85, 'Rack 85'),
(86, 'Rack 86'),
(87, 'Rack 87'),
(88, 'Rack 88'),
(89, 'Rack 89'),
(9, 'Rack 9'),
(90, 'Rack 90'),
(91, 'Rack 91'),
(92, 'Rack 92'),
(93, 'Rack 93'),
(94, 'Rack 94'),
(95, 'Rack 95'),
(96, 'Rack 96'),
(97, 'Rack 97'),
(98, 'Rack 98'),
(99, 'Rack 99');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `rack` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rack_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `title`, `subject`, `day`, `month`, `year`, `rack`, `created_at`, `rack_id`) VALUES
(1, 'Test', 'record 1', 1, 'January', 2000, '', '2025-03-17 08:15:07', 1),
(2, 'Test', 'record 1', 1, 'January', 2000, '', '2025-03-17 08:16:32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rack_name` (`rack_name`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
