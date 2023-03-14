-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2023 at 11:19 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_assets`
--

CREATE TABLE `company_assets` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `contact_listing_id` int NOT NULL,
  `insurance_company_id` int NOT NULL,
  `insurance_policy_id` int NOT NULL,
  `premium` float NOT NULL,
  `term_length` varchar(20) NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `deleted` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `policy_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_assets`
--

INSERT INTO `company_assets` (`id`, `user_id`, `contact_listing_id`, `insurance_company_id`, `insurance_policy_id`, `premium`, `term_length`, `status`, `deleted`, `policy_status`) VALUES
(1, 2, 3, 2, 1, 1, '2023-03-03 16:29:58', '1', '1', '0'),
(2, 1, 7, 1, 1, 1, '2023-03-06 05:44:01', '1', '1', '1'),
(3, 1, 7, 1, 1, 1, '2023-03-06 05:51:53', '1', '1', '1'),
(4, 1, 7, 1, 1, 1, '2023-03-06 06:15:35', '1', '1', '1'),
(5, 1, 7, 1, 1, 1, '2023-03-06 06:24:51', '1', '1', '1'),
(6, 1, 7, 1, 1, 1, '2023-03-06 06:27:02', '1', '1', '1'),
(7, 1, 15, 1, 1, 1, '2023-03-06 07:09:22', '1', '1', '1'),
(8, 1, 15, 1, 1, 1, '2023-03-06 07:10:16', '1', '1', '1'),
(9, 1, 15, 1, 1, 1, '2023-03-06 07:10:54', '1', '1', '1'),
(10, 1, 15, 1, 1, 1, '2023-03-06 07:10:54', '1', '1', '1'),
(11, 1, 15, 1, 1, 1, '2023-03-06 07:33:56', '1', '1', '1'),
(12, 1, 2, 1, 1, 1, '2023-03-06 07:34:37', '1', '1', '1'),
(13, 1, 1, 1, 1, 1, '2023-03-06 07:35:23', '1', '1', '1'),
(14, 1, 3, 1, 1, 1, '2023-03-06 07:36:33', '1', '1', '1'),
(15, 1, 15, 1, 1, 1, '2023-03-06 07:38:53', '1', '1', '1'),
(16, 1, 15, 1, 1, 1, '2023-03-06 07:45:06', '1', '1', '1'),
(17, 1, 15, 2, 2, 1, '2023-03-06 07:45:47', '1', '1', '1'),
(18, 1, 1, 1, 1, 1, '2023-03-06 07:47:16', '1', '1', '1'),
(19, 1, 16, 1, 1, 1, '2023-03-06 07:56:30', '1', '1', '1'),
(22, 1, 19, 1, 1, 1, '2023-03-06 09:02:31', '1', '0', '1'),
(23, 1, 20, 1, 1, 1, '2023-03-06 11:09:43', '1', '1', '1'),
(24, 1, 20, 2, 2, 1, '2023-03-06 11:09:43', '1', '1', '1'),
(25, 1, 20, 1, 1, 1, '2023-03-06 12:32:04', '1', '1', '1'),
(26, 1, 20, 1, 2, 1, '2023-03-06 12:41:31', '1', '1', '1'),
(27, 7, 21, 1, 3, 1, '', '1', '1', '1'),
(28, 7, 21, 1, 3, 1, '6 month', '1', '1', '1'),
(29, 7, 21, 1, 3, 1, '3 month', '1', '1', '1'),
(30, 7, 21, 1, 3, 1, '3 month', '1', '1', '1'),
(31, 7, 21, 1, 3, 1, '3 month', '1', '0', '1'),
(32, 7, 21, 1, 3, 1, '6 month', '1', '1', '1'),
(33, 7, 21, 1, 3, 1, '6 month', '1', '0', '1'),
(34, 7, 21, 1, 3, 1, '6 month', '1', '1', '1'),
(35, 7, 21, 1, 3, 1, '3 month', '1', '1', '1'),
(36, 3, 22, 1, 3, 1, '3 month', '1', '0', '0'),
(37, 3, 23, 1, 3, 1, '3 month', '1', '1', '1'),
(38, 3, 18, 1, 3, 1, '3 month', '1', '1', '1'),
(39, 3, 22, 1, 3, 1, '3 month', '1', '1', '1'),
(40, 3, 22, 1, 3, 1, '3 month', '1', '1', '1'),
(41, 3, 24, 4, 3, 1, '6 month', '1', '1', '1'),
(42, 3, 24, 1, 3, 1, '6 month', '1', '1', '1'),
(43, 3, 24, 1, 3, 1, '3 month', '1', '1', '1'),
(44, 3, 22, 1, 3, 1, '6 month', '1', '1', '1'),
(45, 3, 25, 1, 3, 1, '3 month', '1', '1', '1'),
(46, 3, 25, 1, 3, 1, '9 month', '1', '1', '0'),
(47, 3, 26, 1, 3, 1, '3 month', '1', '1', '1'),
(48, 3, 27, 1, 3, 1, '6 month', '1', '1', '0'),
(49, 3, 27, 1, 3, 1, '3 month', '1', '1', '1'),
(50, 3, 27, 1, 3, 1, '3 month', '1', '1', '1'),
(51, 3, 27, 1, 3, 1, '3 month', '1', '1', '1'),
(52, 3, 28, 1, 3, 1, '6 month', '1', '1', '1'),
(53, 8, 29, 1, 3, 1, '6 month', '1', '1', '1'),
(54, 3, 22, 1, 3, 1, '3 month', '1', '1', '1'),
(55, 3, 22, 1, 3, 1, '3 month', '1', '1', '1'),
(56, 3, 22, 1, 3, 1, '3 month', '1', '1', '1'),
(57, 3, 22, 5, 3, 1, '3 month', '1', '1', '1'),
(58, 3, 22, 4, 5, 5, '3 month', '1', '1', '1'),
(59, 3, 30, 1, 3, 1, '3 month', '1', '1', '1'),
(60, 3, 30, 5, 4, 1, '3 month', '1', '1', '1'),
(61, 10, 32, 1, 3, 1, '6 month', '1', '1', '1'),
(62, 10, 32, 1, 3, 1, '9 month', '1', '1', '1'),
(63, 3, 31, 1, 3, 1, '3 month', '1', '0', '0'),
(64, 1, 5, 1, 3, 1, '3 month', '1', '1', '1'),
(65, 3, 22, 1, 3, 1, '', '1', '1', '1'),
(66, 1, 20, 3, 4, 1, '3 month', '1', '1', '1'),
(67, 1, 20, 1, 3, 7, '6 month', '1', '1', '1'),
(68, 1, 20, 1, 7, 1, '6 month', '1', '1', '1'),
(69, 1, 20, 1, 3, 2, '6 month', '1', '1', '1'),
(70, 1, 20, 1, 2, 1, '3 month', '1', '1', '1'),
(71, 1, 20, 1, 1, 100, '3 month', '1', '1', '1'),
(72, 1, 20, 1, 1, 100, '6 month', '1', '1', '1'),
(73, 1, 20, 1, 1, 100, '6 month', '1', '1', '1'),
(74, 1, 1, 1, 1, 3, '6 month', '1', '1', '1'),
(75, 1, 20, 1, 7, 1, '6 month', '1', '1', '1'),
(76, 3, 22, 1, 1, 1, '6 month', '1', '1', '1'),
(78, 3, 31, 1, 6, 1, '3 month', '1', '1', '1'),
(79, 3, 31, 1, 7, 7, '3 month', '1', '1', '1'),
(80, 3, 31, 4, 5, 5, '6 month', '1', '1', '1'),
(81, 3, 31, 1, 3, 3, '6 month', '1', '1', '1'),
(82, 3, 33, 1, 3, 3, '6 month', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact_listings`
--

CREATE TABLE `contact_listings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletestatus` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_listings`
--

INSERT INTO `contact_listings` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `status`, `created_at`, `deletestatus`) VALUES
(1, 1, 'Ajay', 'ajay@gmail.com', '1234567890', 'ldh', '0', '2023-03-01 07:16:26', '1'),
(2, 2, 'Ankush', 'ankush@gmail.com', '1234567890', 'asd', '1', '2023-03-31 17:02:31', '1'),
(3, 2, 'Harsh', 'harsh@gmail.com', '1234567890', 'Ldh', '1', '2023-03-01 11:36:13', '1'),
(4, 2, 'Deepu', 'deepu@gmail.com', '1234567890', 'Dhk', '1', '2023-03-01 11:41:03', '1'),
(5, 1, 'Manish', 'manish@gmail.com', '1234567890', 'Up', '1', '2023-03-01 11:41:51', '1'),
(6, 2, 'add', 'admin@gmail.com', '1234567890', 'test', '1', '2023-03-02 09:30:11', '1'),
(7, 2, 'test1', 'test1@gmail.com', '1234567890', 'test', '1', '2023-03-02 09:30:39', '1'),
(8, 1, 'test', 'test3@gmail.com', '1234567890', 'sdsd', '1', '2023-03-06 06:45:17', '1'),
(9, 1, 'test', 'test93@gmail.com', '1234567890', 'document.write(name);', '1', '2023-03-06 06:46:35', '1'),
(10, 1, 'test', 'kabishek@teqmavens.com', '1234567890', 'sdsd', '1', '2023-03-06 06:49:01', '1'),
(11, 1, 'test', 'test63@gmail.com', '1234567890', 'df', '1', '2023-03-06 06:50:10', '1'),
(12, 1, 'test', 'test37@gmail.com', '1234567890', 'document.write(name);', '1', '2023-03-06 06:51:52', '1'),
(13, 1, 'test', 'test39@gmail.com', '1234567890', 'te', '1', '2023-03-06 06:53:15', '1'),
(14, 1, 'test', 'test630@gmail.com', '1234567890', 'sdsd', '1', '2023-03-06 06:57:55', '1'),
(15, 1, 'test', 'test16@gmail.com', '1234567890', 'fgf', '1', '2023-03-06 07:07:35', '1'),
(16, 1, 'mohan', 'mohan@gmail.com', '1234567890', 'mohan', '1', '2023-03-06 07:51:03', '1'),
(17, 1, 'dashq', 'dash@gmail.com', '1234567890', 'ss', '1', '2023-03-06 08:36:28', '1'),
(18, 1, 'test', 'ka9bishek@teqmavens.com', '1234567890', 'k', '1', '2023-03-06 08:52:24', '1'),
(19, 1, 'deepu', 'deep@gmail.com', '1234567890', 'yuy', '1', '2023-03-06 08:55:22', '1'),
(20, 1, 'test', 'teste31@gmail.com', '1234567890', 'ete', '1', '2023-03-06 09:04:21', '1'),
(21, 7, 'test', 'test451@gmail.com', '1234567890', 'testr', '1', '2023-03-07 09:53:50', '1'),
(22, 3, 'sky', 'sky@gmail.com', '1234567890', 'sky', '1', '2023-03-09 04:13:40', '1'),
(23, 3, 'ankush', 'sham@gmail.com', '1234567890', 'test', '1', '2023-03-09 04:43:11', '1'),
(24, 3, 'test', 'test61@gmail.com', '1234567890', 'test', '1', '2023-03-09 05:10:38', '1'),
(25, 3, 'test', 'ter@gmail.com', '1234567890', 'test', '1', '2023-03-09 05:33:51', '1'),
(26, 3, 'test', 'test9803@gmail.com', '1234567890', 'test', '1', '2023-03-09 05:44:36', '1'),
(27, 3, 'sam', 'saqwqqm@gmail.com', '897979797', 'add.', '1', '2023-03-09 05:49:24', '1'),
(28, 3, 'test', 'teazxcst1@gmail.com', '1234567890', 'test', '1', '2023-03-09 06:35:26', '1'),
(29, 8, 'test', 'test54@gmail.com', '1234567890', 'test', '1', '2023-03-09 06:39:09', '1'),
(30, 3, 'test', 'test351@gmail.com', '1234567890', 'test', '1', '2023-03-10 04:01:40', '1'),
(31, 3, 'fuuu', 'gfg@gmail.com', '1234567890', 'uu', '1', '2023-03-10 05:49:15', '1'),
(32, 10, 'ajay', 'ajayghalay@gmail.com', '1234567890', 'ldh', '1', '2023-03-10 06:43:37', '1'),
(33, 3, 'test', 'ter45@gmail.com', '1234567890', 'test', '1', '2023-03-13 04:54:38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_companies`
--

CREATE TABLE `insurance_companies` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `deleted` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `insurance_companies`
--

INSERT INTO `insurance_companies` (`id`, `name`, `status`, `deleted`) VALUES
(1, 'Life Insurance Corporation of India	', '1', '1'),
(2, 'HDFC Standard Life Insurance Co. Ltd.	', '0', '1'),
(3, 'Max Life Insurance Co. Ltd.	', '1', '1'),
(4, 'ICICI Prudential Life Insurance Co. Ltd.	', '0', '1'),
(5, 'Bajaj Allianz Life Insurance Co. Ltd.', '1', '1'),
(6, '	PNB MetLife India Insurance Co. Ltd.rr', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_policies`
--

CREATE TABLE `insurance_policies` (
  `id` int NOT NULL,
  `insurance_company_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `premium` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `deleted` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `insurance_policies`
--

INSERT INTO `insurance_policies` (`id`, `insurance_company_id`, `name`, `premium`, `image`, `status`, `deleted`) VALUES
(1, 1, 'Health Insurance', 2999, 'health.webp', '1', '1'),
(2, 2, 'Motor Insurance', 5435, 'motor.webp', '1', '1'),
(3, 1, 'Home Insurance', 5345, 'home.jpg', '1', '1'),
(4, 2, 'Fire Insurance', 4353, 'fire.webp', '1', '1'),
(5, 1, 'car_insurance', 3997, 'motor.webp', '1', '1'),
(6, 2, 'Travel Insurance', 3400, 'travel.avif', '1', '1'),
(7, 1, 'kkk454', 7775, 'cake.icon.png', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `deleted` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `auth` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `contact_number`, `address`, `password`, `status`, `deleted`, `created_at`, `auth`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '1234567890', 'admin', '$2y$10$QZ42RD0iq9XUwKIwdUwUHeHnfo5FBCHR6NyoBwhtcafvd9iuDIty2', '0', '0', '2023-02-28 06:25:13.239000', '0'),
(2, 'admin', 'admin', 'admin1@gmail.com', '1234567890', 'admin', '$2y$10$a/.yszmjDLpcnM3u4F7UkeMc8WOPH79.6r/lM7ZAh6OgxbAMdReGm', '1', '1', '2023-03-02 09:21:15.904197', '1'),
(3, 'test', 'test', 'test1@gmail.com', '1234567890', 'test', '$2y$10$X1QlzNyXXyxZU.J.MJSCNOxC9qbjBHxbHevl/HQ9ubqU5GO4nt4pC', '1', '1', '2023-03-07 04:39:59.755511', '1'),
(4, 'test', 'test', 'test2@gmail.com', '1234567890', 'test', '$2y$10$eT0kAd.hyqV.5DA0O9nt8ehK6C15QZ7D8fEUCa8krSJwCy1m0reva', '1', '1', '2023-03-07 06:25:39.742152', '1'),
(5, 'test', 'test', 'test3@gmail.com', '1234567890', 'test', '$2y$10$qCkR6ktE9AIxikQdno4Ke.Hk1w1yClJv/wyj1y5JnKppBl2BpARi6', '1', '1', '2023-03-07 06:26:03.934313', '1'),
(6, 'ajay', 'ajay', 'ajay@gmail.com', '1234567890', 'test', '$2y$10$X5czAwgOXK6wiE/6lKU8/utzYt02IuS13Y2LbVap72hBv9vpI/bxy', '1', '1', '2023-03-07 09:27:43.271117', '1'),
(7, 'test', 'tesssst', 'test39@gmail.com', '1234567890', 'test', '$2y$10$eZtSjfR5DYhTw9HWQoMLx.njRl0fhk7910w3mR/7VylQKr1NJjY/G', '1', '1', '2023-03-07 09:38:24.347732', '1'),
(8, 'sam', 'sam', 'sam@gmailc.om', '1234567890', 'test', '$2y$10$5Vv9PqL9Z/LjB0yYKizyJOkqKr2r4.rozUMg61mt/ASwfe5ykHAYC', '1', '1', '2023-03-09 06:38:08.283118', '1'),
(9, 'Abis', 'test', 'qwerty@gmail.com', '8797897897', 'test', '$2y$10$6ahRh.6JnV0qrWxj2QwNYu4z.XiNbDmRPhaOvXfT9nKNEalGYIGKe', '1', '1', '2023-03-09 06:48:36.720650', '1'),
(10, 'manoj', 'kumar', 'manoj@gmail.com', '1234567890', 'ldh', '$2y$10$MuAMqf8Oa1DfKPdqPKmpS.gaPyATdqNAfzn/nnUGS8OnLn2mP4gYC', '1', '1', '2023-03-10 06:13:57.995328', '1'),
(11, 'Abishek', 'Kumar', 'kabishek@teqmavens.com', '1234567890', 'test', '$2y$10$4R794RJ.dBaG2a6WBYL4VOFFl89/.PTFY7.iUEkg/pi0YQHFPgC6O', '1', '1', '2023-03-13 05:13:57.068083', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_assets`
--
ALTER TABLE `company_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_listings`
--
ALTER TABLE `contact_listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_policies`
--
ALTER TABLE `insurance_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_assets`
--
ALTER TABLE `company_assets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `contact_listings`
--
ALTER TABLE `contact_listings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insurance_policies`
--
ALTER TABLE `insurance_policies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
