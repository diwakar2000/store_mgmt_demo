-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2021 at 05:08 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kirana`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `address`, `contact_no`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 'Demo', 'Customer', 'Madhumalla', '98918293', '2021-10-11 08:58:11', 1, '2021-10-11 08:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `daily_transaction`
--

CREATE TABLE `daily_transaction` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL,
  `cash` int DEFAULT NULL,
  `credit` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `price_wholesale` int NOT NULL,
  `price_retail` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price_wholesale`, `price_retail`, `created_at`, `updated_at`) VALUES
(1, 'Rum Pum', 0, 0, '2021-10-11 08:05:47', '2021-10-11 08:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_type` enum('1','2') NOT NULL COMMENT '1 for admin, 2 for user',
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(14) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `login_attempts` int NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `user_name`, `email`, `password`, `address`, `contact_no`, `created_at`, `created_by`, `updated_at`, `last_login`, `login_attempts`, `disabled`) VALUES
(1, '1', 'homendra', 'dahal', 'homendra', 'homendra@mail.com', '$2a$12$4NXu21vZukV2M6hHDBOJjO8F86MP/eY4XEIJY9adUQGapdzLacAAO', 'Madhumalla, Morang', '9876543210', '2021-10-05 06:09:55', 1, '2021-10-05 06:09:55', '2021-10-26 07:29:05', 0, 0),
(6, '2', 'Demo', 'User', 'demo_user', 'demo@user.com', '$2a$04$BQahYdI.bSs/B01tZYGgPeUlY.dReZDOs3n8vCECnP4N16jNxxIla', 'mdl, morang', '987654321', '2021-10-09 06:15:52', 1, '2021-10-10 02:58:51', '2021-10-10 06:16:35', 0, 0),
(8, '2', 'bishnu', 'mandal', 'bishnu', 'bishnu@email.com', '$2y$10$9EXJFVFyFWU7AK/6ZC2Ze.zELyqDuo4XGrr6bTvlpnlxzpBT1ISRG', 'madhumalla', '9876543210', '2021-10-10 05:24:28', 1, '2021-10-10 05:24:28', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `created_by` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `address`, `contact_no`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'K K Suppliers', 'Biratnagar', '9817826387', 1, '2021-10-11 07:44:04', '2021-10-11 07:50:59'),
(2, 'Megha Shree Traders', 'Damak', '16325712', 1, '2021-10-11 07:46:26', '2021-10-12 07:10:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
