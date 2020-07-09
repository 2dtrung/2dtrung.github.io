-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 10:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  `imported_price` double(9,2) NOT NULL,
  `revenue` double(9,2) NOT NULL,
  `profit` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `category`, `status`, `code`, `price`, `image`, `imported_price`, `revenue`, `profit`) VALUES
(1, 'Tiempo Legend 8FG', 'Nike', 'outdoor', 'best_seller', 'TL8', 79.00, './img/img-3.jpg', 69.00, 0.00, 0.00),
(2, 'Mercurial Vapor Elite', 'Nike', 'outdoor', 'best_seller', 'MVE', 75.00, './img/img-4.jpg', 65.00, 0.00, 0.00),
(3, 'Phantom Venom Elite', 'Nike', 'outdoor', 'best_seller', 'PVE', 52.00, './img/img-5.jpg', 42.00, 0.00, 0.00),
(4, 'Phantom Vision Elite', 'Nike', 'outdoor', 'best_seller', 'PVE1', 66.00, './img/img-6.jpg', 56.00, 0.00, 0.00),
(5, 'Tiempo Black', 'Nike', 'futsal', 'show_off', 'TB', 36.00, './img/img-7.jpg', 26.00, 0.00, 0.00),
(6, 'Tiempo 8 IC', 'Nike', 'futsal', 'show_off', 'T8IC', 36.00, './img/img-8.jpg', 26.00, 0.00, 0.00),
(7, 'React Gato S9', 'Nike', 'futsal', 'show_off', 'RGS9', 26.00, './img/img-9.jpg', 16.00, 0.00, 0.00),
(8, 'Mercurial Superfly', 'Nike', 'futsal', 'show_off', 'MS', 29.00, './img/img-10.jpg', 19.00, 0.00, 0.00),
(9, 'Adidas ACE 20.1', 'Adidas', 'outdoor', '', 'AA20', 36.00, './img/img-33.jpg', 26.00, 0.00, 0.00),
(10, 'Adidas Predator', 'Adidas', 'outdoor', '', 'AP', 36.00, './img/img-34.jpg', 26.00, 0.00, 0.00),
(11, 'Adidas X 19.2', 'Adidas', 'outdoor', '', 'AX19', 26.00, './img/img-35.jpg', 16.00, 0.00, 0.00),
(12, 'Adidas Predator', 'Adidas', 'outdoor', '', 'AP1', 29.00, './img/img-36.jpg', 19.00, 0.00, 0.00),
(13, 'Joma Black', 'Joma', 'futsal', '', 'JB', 36.00, './img/img-37.jpg', 26.00, 0.00, 0.00),
(14, 'Joma 2020', 'Joma', 'futsal', '', 'J2020', 36.00, './img/img-38.jpg', 26.00, 0.00, 0.00),
(15, 'Nike Phantom', 'Nike', 'futsal', '', 'NP', 26.00, './img/img-38.jpg', 16.00, 0.00, 0.00),
(16, 'Mercurial X', 'Nike', 'futsal', '', 'MX', 29.00, './img/img-40.jpg', 19.00, 0.00, 0.00),
(17, 'Shock & Case', 'Adidas', 'accessories', '', 'SC', 76.00, './img/img-41.jpg', 66.00, 0.00, 0.00),
(18, 'Hand Wrapper', 'Adidas', 'accessories', '', 'HW', 75.00, './img/img-42.jpg', 65.00, 0.00, 0.00),
(19, 'Gloove', 'Adidas', 'accessories', '', 'GG', 52.00, './img/img-43.jpg', 42.00, 0.00, 0.00),
(20, 'Case', 'Adidas', 'accessories', '', 'C1', 66.00, './img/img-44.jpg', 56.00, 0.00, 0.00),
(21, 'Sock & Case', 'Nike', 'accessories', '', 'SC1', 76.00, './img/img-15.jpg', 66.00, 0.00, 0.00),
(22, 'Case', 'Nike', 'accessories', '', 'C2', 75.00, './img/img-16.jpg', 65.00, 0.00, 0.00),
(23, 'Hand sheel', 'Nike', 'accessories', '', 'HS1', 52.00, './img/img-17.jpg', 42.00, 0.00, 0.00),
(24, 'Hand Wrapper', 'Nike', 'accessories', '', 'HW1', 66.00, './img/img-45.jpg', 56.00, 0.00, 0.00),
(25, 'Hypervenom Black', 'Nike', 'futsal', 'sale', 'HB', 34.00, './img/img-18.jpg', 24.00, 0.00, 0.00),
(26, 'Mercurial S6', 'Nike', 'futsal', 'sale', 'MS6', 44.00, './img/img-19.jpg', 34.00, 0.00, 0.00),
(27, 'Mercurial S2', 'Nike', 'futsal', 'sale', 'MS2', 52.00, './img/img-20.jpg', 42.00, 0.00, 0.00),
(28, 'Mercurial Super', 'Nike', 'futsal', 'sale', 'MS1', 66.00, './img/img-4.jpg', 56.00, 0.00, 0.00),
(29, 'Sock & Case Sale', 'Nike', 'accessories', 'sale', 'SCS', 12.00, './img/img-15.jpg', 2.00, 0.00, 0.00),
(30, 'Case', 'Nike', 'accessories', 'sale', 'NC', 5.00, './img/img-16.jpg', 2.00, 0.00, 0.00),
(31, 'Hand sheel sale', 'Nike', 'accessories', 'sale', 'HSS', 12.00, './img/img-17.jpg', 2.00, 0.00, 0.00),
(32, 'Hand Wrapper Sale', 'Nike', 'accessories', 'sale', 'HWS', 16.00, './img/img-45.jpg', 6.00, 0.00, 0.00),
(33, 'Korea Shirt', 'Nike', 'shirt', '', 'KS', 22.87, './img/img-21.jpg', 12.87, 0.00, 0.00),
(34, 'Nigeria Shirt', 'Nike', 'shirt', '', 'NS', 22.87, './img/img-22.jpg', 12.87, 0.00, 0.00),
(35, 'USA Shirt', 'Nike', 'shirt', '', 'US', 22.87, './img/img-23.jpg', 12.87, 0.00, 0.00),
(36, 'Norway Shirt', 'Nike', 'shirt', '', 'NSS', 22.87, './img/img-24.jpg', 12.87, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `name` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `user_level` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `name`, `phone`, `address`, `user_level`) VALUES
(1, 'tuhuynh', '$2y$10$v0cNajTLVfkemo1TdMIBu.iiXl0uBysfD8NlCzf22W2Wvm374wE.6', '2020-06-27 09:37:56', '', 0, '', 0),
(3, 'admin', '$2y$10$ktGQBSPnifaCAM1uiimxkOoYOXhCBqmPv1.Mm2rHGTtxwKyYps17y', '2020-06-27 15:06:47', '', 0, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
