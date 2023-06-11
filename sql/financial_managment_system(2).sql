-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 07:52 PM
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `item_name`, `item_price`, `item_type`, `quantity`) VALUES
(15, 3, 'steel shites', '3000', 'row material', '3');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` int(50) NOT NULL,
  `items` varchar(400) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `items`, `date_time`, `total_price`, `user`) VALUES
(4, '[{\"item_id\":\"3\",\"item_price\":\"3000\",\"item_quantity\":\"1\"},{\"item_id\":\"3\",\"item_price\":\"3000\",\"item_quantity\":\"4\"},{\"item_id\":\"3\",\"item_price\":\"3000\",\"item_quantity\":\"1\"},{\"item_id\":\"3\",\"item_price\":\"3000\",\"item_quantity\":\"6\"}]', '06/10/2023 03:12:13 pm', '12000', ''),
(6, '[{\"item_id\":\"3\",\"item_price\":\"3000\",\"item_quantity\":\"2\"}]', '06/11/2023 11:49:22 am', '3000', ''),
(7, '[{\"item_id\":\"3\",\"item_price\":\"3000\",\"item_quantity\":\"2\"}]', '06/11/2023 11:51:12 am', '3000', '');

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
(3, 'steel shites', 'row material', 25, 3000);

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
(12, 'abenezer demissie', 'abenezerdemissie123@gmail.com', 'addiss ababa', 'hellohi', '4', '11:38 , Sunday, June 11, 2023', ''),
(13, 'yona', 'yonajems@gail.com', 'joba', 'yona', '1', '', ''),
(14, 'yonsef', 'yonsef@gmail.com', 'addiss ababa', 'yosef', '2', '', ''),
(15, 'manuhe', 'manuhe@gmail.com', 'addiss ababa', 'manuhe', '1', '16:21 , Wednesday, June 7, 2023', ''),
(16, 'eden', 'eden@gmail.com', 'addis ababa', 'eden', '3', '10:10 , Sunday, June 11, 2023', ''),
(17, 'radia', 'radia@gmail.com', 'addis ababa', 'radia', '2', '11:49 , Sunday, June 11, 2023', '');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
