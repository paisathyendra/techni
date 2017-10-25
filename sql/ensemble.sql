-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 10:22 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensemble`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `created_on`) VALUES
(1, 'Sathyendra', 'Pai', 'paisathyendra@gmail.com', '0410377475', 'Chatswood', '2017-10-31 00:00:00'),
(2, 'Ramesh', 'Pai', 'ramesh@gmail.com', '0411111111', 'Strathfield', '2017-10-25 00:00:00'),
(3, 'Rahul', 'Dravid', 'rahul.g@gmail.com', '0410777654', 'Paramatta', '2017-10-23 00:00:00'),
(4, 'Minion', 'Testing', 'a@b.com', '410377475', 'Chatswood', '2017-10-10 00:00:00'),
(5, 'Sachin', 'Tendulkar', 'paisathyendra@gmail.com', '0410377475', 'Chatswood', '2017-10-26 00:00:00'),
(6, 'Rahu', 'Tendulkar', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '0000-00-00 00:00:00'),
(7, 'Rahu', 'Tendulkar', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 16:07:39'),
(8, 'Rahul', 'Tendulkar', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 16:09:02'),
(9, 'Jaya', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 16:40:02'),
(10, 'Jaya', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 16:41:28'),
(11, 'Jaya', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 16:43:51'),
(12, 'Umesh', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 16:52:12'),
(13, 'Akash', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 16:52:34'),
(14, 'Akash', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:23:31'),
(15, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:24:32'),
(16, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:29:08'),
(17, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:42:00'),
(18, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:43:07'),
(19, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:43:39'),
(20, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:55:56'),
(21, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 20:56:10'),
(22, 'Robot', 'Pai', 'paisathyendra@gmail.com', '0410377466', 'Chatswood', '2017-10-25 22:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(3, 1, 2, 10),
(4, 2, 1, 5),
(5, 1, 1, 5),
(6, 11, 1, 10),
(7, 13, 1, 10),
(8, 13, 3, 5),
(9, 14, 1, 10),
(10, 14, 3, 5),
(11, 15, 1, 10),
(12, 15, 3, 5),
(13, 16, 1, 10),
(14, 16, 3, 5),
(15, 17, 1, 10),
(16, 17, 3, 5),
(17, 18, 1, 10),
(18, 18, 3, 5),
(19, 19, 1, 10),
(20, 19, 3, 5),
(22, 20, 3, 5),
(24, 21, 3, 5),
(25, 22, 1, 10),
(26, 22, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `stock`) VALUES
(1, 'Hat', 'Hand made Hats', 5),
(2, 'Bag', 'Bag', 10),
(3, 'Belt', 'Leather Belt', 15),
(5, 'Men\'s Watch', 'Men\'s Watch', 5),
(6, 'Women\'s Watch', 'Women\'s Watch', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
