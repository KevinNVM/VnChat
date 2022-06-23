-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 03:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat-app-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `receiver_msg_id` int(255) NOT NULL,
  `sender_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `receiver_msg_id`, `sender_msg_id`, `msg`, `created_at`) VALUES
(1, 56710, 699863, 'hello man', '2022-06-23 12:11:13'),
(2, 699863, 56710, 'who are you man', '2022-06-23 12:11:20'),
(3, 56710, 699863, 'your siblings', '2022-06-23 12:11:27'),
(4, 699863, 56710, 'oh oke', '2022-06-23 12:11:30'),
(5, 699863, 56710, 'a', '2022-06-23 12:11:34'),
(6, 699863, 56710, 'a', '2022-06-23 12:11:34'),
(7, 699863, 56710, 'a', '2022-06-23 12:11:34'),
(8, 699863, 56710, 'a', '2022-06-23 12:11:34'),
(9, 699863, 56710, 'a', '2022-06-23 12:11:34'),
(10, 699863, 56710, 'a', '2022-06-23 12:11:35'),
(11, 699863, 56710, 'a', '2022-06-23 12:11:35'),
(12, 699863, 56710, 'a', '2022-06-23 12:11:35'),
(13, 699863, 56710, 'a', '2022-06-23 12:11:35'),
(14, 699863, 56710, 'a', '2022-06-23 12:11:36'),
(15, 699863, 56710, 'a', '2022-06-23 12:11:37'),
(16, 699863, 56710, 'a', '2022-06-23 12:11:37'),
(17, 699863, 56710, 'a', '2022-06-23 12:11:37'),
(18, 699863, 56710, 'a', '2022-06-23 12:11:38'),
(19, 699863, 56710, 'a', '2022-06-23 12:11:38'),
(20, 699863, 56710, 'a', '2022-06-23 12:11:38'),
(21, 699863, 56710, 'a', '2022-06-23 12:11:38'),
(22, 699863, 56710, 'a', '2022-06-23 12:11:38'),
(23, 699863, 56710, 'a', '2022-06-23 12:11:38'),
(24, 699863, 56710, 'a', '2022-06-23 12:11:38'),
(25, 699863, 56710, 'a', '2022-06-23 12:11:39'),
(26, 699863, 56710, 'a', '2022-06-23 12:11:39'),
(27, 699863, 56710, 'a', '2022-06-23 12:11:39'),
(28, 699863, 56710, 'a', '2022-06-23 12:11:39'),
(29, 699863, 56710, 'a', '2022-06-23 12:11:40'),
(30, 699863, 56710, 'a', '2022-06-23 12:11:40'),
(31, 699863, 56710, 'a', '2022-06-23 12:11:40'),
(32, 699863, 56710, 'a', '2022-06-23 12:11:40'),
(33, 699863, 56710, 'a', '2022-06-23 12:11:40'),
(34, 699863, 56710, 'a', '2022-06-23 12:11:41'),
(35, 699863, 56710, 'a', '2022-06-23 12:11:41'),
(36, 699863, 56710, 'a', '2022-06-23 12:11:41'),
(37, 699863, 56710, 'a', '2022-06-23 12:11:41'),
(38, 699863, 56710, 'aa', '2022-06-23 12:11:42'),
(39, 699863, 56710, 'a', '2022-06-23 12:11:42'),
(40, 699863, 56710, 'a', '2022-06-23 12:11:42'),
(41, 699863, 56710, 'a', '2022-06-23 12:11:42'),
(42, 699863, 56710, 'a', '2022-06-23 12:11:42'),
(43, 699863, 56710, 'a', '2022-06-23 12:11:43'),
(44, 699863, 56710, 'a', '2022-06-23 12:11:43'),
(45, 699863, 56710, 'a', '2022-06-23 12:11:43'),
(46, 699863, 56710, 'a', '2022-06-23 12:11:46'),
(47, 699863, 56710, 'asd', '2022-06-23 12:11:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
