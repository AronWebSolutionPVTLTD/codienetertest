-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 01:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigneter_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 5, '2022-07-12 12:52:08', '2022-07-12 12:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `status`, `updated_at`, `created_at`) VALUES
(1, 'iPhone XXX', 'Iphone XXX\r\nRam 12Gb\r\nStorage 256Gb\r\nCamera 12px', '', 1000, '1', '2022-07-12 16:09:31', '2022-07-12 16:09:31'),
(2, 'prod1', 'Product 1', '', 100, '1', '2022-07-12 16:09:31', '2022-07-12 16:09:31'),
(3, 'prod2', 'Product 2', '', 200, '1', '2022-07-12 16:09:31', '2022-07-12 16:09:31'),
(4, 'prod3', 'Product 3', '', 300, '0', '2022-07-12 16:09:31', '2022-07-12 16:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `nickname`, `password`, `phone_no`, `verified`, `status`, `updated_at`, `created_at`) VALUES
(1, 'dev', 'dev@gmail.com', 'dev', '10032586bc62852d2a7ed121da58d05f', '9876543210', '1', '1', '2022-07-12 16:14:55', '2022-07-12 16:14:55'),
(2, 'dev1', 'dev1@gmail.com', 'dev1', '10032586bc62852d2a7ed121da58d05f', '9876543210', '1', '1', '2022-07-12 16:14:55', '2022-07-12 16:14:55'),
(3, 'dev2', 'dev2@gmail.com', 'dev2', '10032586bc62852d2a7ed121da58d05f', '9876543210', '0', '1', '2022-07-12 16:14:55', '2022-07-12 16:14:55'),
(4, 'dev3', 'dev3@gmail.com', 'dev3', '10032586bc62852d2a7ed121da58d05f', '9876543210', '0', '0', '2022-07-12 16:14:55', '2022-07-12 16:14:55'),
(5, 'dev4', 'dev4@gmail.com', 'dev4', '10032586bc62852d2a7ed121da58d05f', '9876543210', '1', '0', '2022-07-12 16:14:55', '2022-07-12 16:14:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
