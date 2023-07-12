-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 01:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial managment system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` int(50) NOT NULL,
  `items` varchar(400) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `amount` int(255) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `item_name`, `item_type`, `quantity`, `price`) VALUES
(4, 'Samsung Galaxy S21', 'smart phone', 10, 32000),
(5, 'iPhone 12', 'smart phone', 5, 36000),
(6, 'OnePlus 9 Pro', 'smart phone', 4, 25000),
(7, 'Google Pixel 5', 'smart', 7, 26000),
(8, 'Xiaomi Mi 11', 'smart phone', 3, 20000),
(9, 'Oppo Find X3 Pro', 'smart phone', 8, 24000),
(10, 'Huawei P40 Pro', 'smart phone', 5, 28000),
(11, 'Sony Xperia 1 III', 'smart phone', 4, 30000),
(12, 'LG V60 ThinQ', 'smart phone', 6, 18000),
(13, 'Motorola Edge+', 'smart phone', 20, 22000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `urole` varchar(50) NOT NULL,
  `intime` varchar(50) NOT NULL,
  `outtime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `address`, `password`, `urole`, `intime`, `outtime`) VALUES
(12, 'abenezer demissie', 'abenezerdemissie123@gmail.com', 'addiss ababa', 'hellohi', '4', '4:47 , Tuesday, July 11, 2023', '8:51 , Thursday, June 22, 2023'),
(13, 'yona', 'yonajems@gail.com', 'joba', 'yona', '1', '23:41 , Tuesday, July 11, 2023', '23:37 , Tuesday, July 11, 2023'),
(14, 'yosef', 'yonsef@gmail.com', 'addiss ababa', 'yosef', '2', '4:48 , Tuesday, July 11, 2023', '5:31 , Tuesday, July 11, 2023'),
(15, 'manuhe', 'manuhe@gmail.com', 'addiss ababa', 'manuhe', '1', '19:6 , Wednesday, June 14, 2023', '19:7 , Wednesday, June 14, 2023'),
(16, 'eden', 'eden@gmail.com', 'addis ababa', 'eden', '3', '12:57 , Wednesday, July 12, 2023', '19:48 , Wednesday, June 14, 2023'),
(17, 'radya', 'radia@gmail.com', 'addis ababa', 'radya', '2', '23:38 , Tuesday, July 11, 2023', '23:41 , Tuesday, July 11, 2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
