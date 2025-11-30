-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2025 at 03:43 AM
-- Server version: 11.7.2-MariaDB
-- PHP Version: 8.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `on_boarding_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `email` varchar(255) NOT NULL,
                            `message` text NOT NULL,
                            `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
                          `id` int(11) NOT NULL,
                          `customer_name` varchar(255) DEFAULT NULL,
                          `email` varchar(255) DEFAULT NULL,
                          `address` text DEFAULT NULL,
                          `delivery_method` varchar(100) DEFAULT NULL,
                          `shipping_cost` decimal(10,2) DEFAULT 0.00,
                          `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
                          `status` varchar(50) DEFAULT 'Pending',
                          `created` datetime DEFAULT current_timestamp(),
                          `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
                               `id` int(11) NOT NULL,
                               `order_id` int(11) DEFAULT NULL,
                               `product_id` int(11) DEFAULT NULL,
                               `quantity` int(11) DEFAULT 1,
                               `price` decimal(10,2) DEFAULT NULL,
                               `created` datetime DEFAULT current_timestamp(),
                               `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `category` varchar(255) DEFAULT NULL,
                            `price` decimal(10,2) NOT NULL,
                            `image` varchar(255) DEFAULT NULL,
                            `description` text DEFAULT NULL,
                            `stock_level` int(10) UNSIGNED DEFAULT 0,
                            `created` datetime DEFAULT current_timestamp(),
                            `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(96) NOT NULL,
                         `nonce` varchar(255) NOT NULL,
                         `nonce_expiry` datetime NOT NULL,
                         `created` datetime NOT NULL,
                         `modified` datetime NOT NULL,
                         `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nonce`, `nonce_expiry`, `created`, `modified`, `role`) VALUES
                                                                                                            (1, 'test@example.com', '$2y$12$t/wpqUfmQVXw5P2FmWG2N.2fQan7UrAgppjFTOOh6cksHkPphtbz.', 'b9e750fb7ecf35758d3aa8cb20c2ebd4bd46c0a51a011cdbd8a1c7107b2b5431b4b37115c9e07b742e8cf96b5b07962577742479d3c4327801df69843646a827', '2025-04-02 09:02:51', '0000-00-00 00:00:00', '2025-03-26 09:02:51', ''),
                                                                                                            (2, 'employee@example.com', '$2a$12$0rRXOGqPfEMbXj7WoFRH0ObUmtatX5PIT2mRobHc4SDxPRB0vynW2', 'd241ccac1faaf4336b8fe6e377891945ce35889d1ee233be790ac9dea129c521571848a576f39f9e14a3d82efeeb2bc0e592b7f5e843bc9ae115c6e17b687950', '2025-04-14 03:04:23', '2025-04-14 03:04:23', '2025-04-14 03:04:23', 'employee'),
                                                                                                            (3, 'manager@example.com', '$2a$12$1pEHk03iXqkPInTgF2ElVeHtwhx/l16Z6jeZ4AvdsqB.pqWcq4QAq', 'd241ccac1faaf4336b8fe6e377891945ce35889d1ee233be790ac9dea129c521571848a576f39f9e14a3d82efeeb2bc0e592b7f5e843bc9ae115c6e17b687950', '2025-04-14 03:04:23', '2025-04-14 03:04:23', '2025-04-14 03:04:23', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `repair_requests`
--

CREATE TABLE `repair_requests` (
                                   `id` int(11) NOT NULL,
                                   `customer_name` varchar(100) NOT NULL,
                                   `email` varchar(100) NOT NULL,
                                   `address` varchar(255) NOT NULL,
                                   `suburb` varchar(100) NOT NULL,
                                   `brand_name` varchar(255) DEFAULT NULL,
                                   `equipment_category` enum('free weight','cardio','machine') DEFAULT NULL,
                                   `equipment_type` varchar(255) DEFAULT NULL,
                                   `equipment` varchar(100) NOT NULL,
                                   `preferred_datetime` datetime DEFAULT NULL,
                                   `created` datetime DEFAULT current_timestamp(),
                                   `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repair_requests`
--

INSERT INTO `repair_requests` (`id`, `customer_name`, `email`, `address`, `suburb`, `brand_name`, `equipment_category`, `equipment_type`, `equipment`, `preferred_datetime`, `created`, `modified`) VALUES
                                                                                                                                                                                                        (5, 'michael jackson', 'mj@example.com', 'los angeles 315 road', 'los santos', NULL, NULL, NULL, 'smith machine', '2025-05-15 00:00:00', '2025-05-06 11:47:02', '2025-05-09 19:05:36'),
                                                                                                                                                                                                        (6, 'nomi', 'nomi@monash.edu', 'monash road 344', 'clayton', NULL, NULL, NULL, 'i want my smith machined fixed', '2025-05-30 00:00:00', '2025-05-08 04:44:34', '2025-05-09 19:05:36'),
                                                                                                                                                                                                        (7, 'christiano ronaldo', 'cr7@gmail.com', 'glen waverley road 800', 'glen waverley', 'nautilus', 'machine', 'smith machine', '', '2025-05-21 20:40:00', '2025-05-09 09:21:42', '2025-05-09 09:21:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `repair_requests`
--
ALTER TABLE `repair_requests`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `repair_requests`
--
ALTER TABLE `repair_requests`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
-- --------------------------------------------------------

--
-- Table structure for table `install_equipment_requests`
--

CREATE TABLE `install_equipment_requests` (
                                              `id` int(11) NOT NULL,
                                              `full_name` varchar(255) NOT NULL,
                                              `company_name` varchar(255) DEFAULT NULL,
                                              `email` varchar(255) NOT NULL,
                                              `address` text NOT NULL,
                                              `brand_name` varchar(255) NOT NULL,
                                              `equipment_category` enum('free weight','cardio','machine') NOT NULL,
                                              `equipment_type` varchar(255) NOT NULL,
                                              `preferred_datetime` datetime NOT NULL,
                                              `created` datetime DEFAULT current_timestamp(),
                                              `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `install_equipment_requests`
--

INSERT INTO `install_equipment_requests` (`id`, `full_name`, `company_name`, `email`, `address`, `brand_name`, `equipment_category`, `equipment_type`, `preferred_datetime`, `created`, `modified`) VALUES
    (1, 'Bill Gong', 'monash sport', 'bill.gong@monash.edu', 'monash road 344', 'life fitness', 'cardio', 'treadmill', '2025-05-22 09:20:00', '2025-05-09 09:15:43', '2025-05-09 09:15:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `install_equipment_requests`
--
ALTER TABLE `install_equipment_requests`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `install_equipment_requests`
--
ALTER TABLE `install_equipment_requests`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
---- --------------------------------------------------------

-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
    ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
    ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
