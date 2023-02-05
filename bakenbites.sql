-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 02:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakenbites`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cake_price` int(11) NOT NULL,
  `cake_message` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(14, 'OCCASIONS', 1),
(15, 'BY FLAVOURS', 1),
(16, 'DESIGNER CAKES', 1);

-- --------------------------------------------------------

--
-- Table structure for table `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conta`
--

INSERT INTO `conta` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'eeefrf', 'klxnvlk', 'klxnvlk', 'ss', '2021-05-30 07:08:07'),
(2, 'ra,', 'ccc', 'cc', 'cc', '2021-05-30 07:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `mobile`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(3, 10, 'Deekshith', 0, 'k', 'll', 0, 'cod', 2250, 'success', 2, '2021-07-20 07:14:31'),
(4, 11, 'test', 345, '544', 'rdghred', 0, 'cod', 43, 'success', 2, '2021-09-03 12:51:30'),
(7, 12, 'f', 0, 'fb', 'dvs', 0, 'cod', 43, 'success', 4, '2021-09-04 01:06:28'),
(8, 12, 'f', 0, 'r', 'r', 0, 'cod', 43, 'success', 2, '2021-09-04 01:14:47'),
(9, 12, 'rakshan', 78945678, 'innanje', 'udupiu', 576122, 'cod', 43, 'pending', 4, '2021-09-04 03:18:51'),
(10, 12, 'rtj', 456, '66', '66', 666, 'cod', 43, 'pending', 1, '2021-09-04 03:34:11'),
(11, 12, 'Rakshan Shetty', 456, '66', '66', 666, 'cod', 43, 'pending', 3, '2021-09-04 03:36:28'),
(12, 12, 'Rakshan Shetty', 45686534, '66', '66', 666, 'cod', 43, 'pending', 4, '2021-09-04 03:36:53'),
(13, 12, 'Rakshan Shetty', 456, '66', '66', 666, 'cod', 43, 'pending', 1, '2021-09-04 05:56:42'),
(14, 12, 'Rakshan Shetty', 456, '66', '66', 666, 'cod', 43, 'pending', 2, '2021-09-05 08:55:08'),
(15, 12, 'Rakshan Shetty', 456, '66', '66', 666, 'cod', 0, 'pending', 1, '2021-09-05 08:55:36'),
(16, 12, 'Rakshan Shetty', 456, '66', '66', 666, 'cod', 4, 'Success', 5, '2021-09-05 08:56:27'),
(17, 17, 'thowhir', 45686534, 'innanje', 'udupiu', 576122, 'cod', 43, 'pending', 2, '2021-09-06 06:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cake_message` varchar(255) NOT NULL,
  `cake_weight` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `cake_message`, `cake_weight`, `qty`, `price`) VALUES
(3, 3, 13, 'hii', 1, 5, 450),
(4, 3, 10, 'hii', 1, 1, 0),
(5, 4, 17, 'hii', 1, 1, 43),
(6, 5, 17, 'hiigbfg', 2, 4, 4),
(7, 6, 17, 'hii', 1, 1, 54),
(8, 7, 17, 'hii', 1, 1, 43),
(9, 8, 17, 'hii', 1, 1, 43),
(10, 9, 17, 'hii', 1, 1, 43),
(11, 10, 17, 'hii', 1, 1, 43),
(12, 11, 17, 'hii', 1, 1, 43),
(13, 12, 17, 'hii', 1, 1, 43),
(14, 13, 17, 'hii', 1, 1, 43),
(15, 14, 17, 'hii', 1, 1, 43),
(16, 16, 17, 'hii', 2, 1, 4),
(17, 17, 17, 'hii', 1, 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `price2` text NOT NULL,
  `price3` text NOT NULL,
  `price4` text NOT NULL,
  `qty` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `price`, `price2`, `price3`, `price4`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(4, 4, 5, 'Chocochip Cake', '720', '0', '0', '0', 90, '818601840_chocochip.jpg', 'xxx', 'xxxx', 0, 'xxxxxxx', '', 'xxxxx', 1),
(12, 3, 2, '11', '122', '0', '0', '0', 12, '503492913_00000IMG_00000_BURST20191130160007350_COVER.jpg', '1111w', 'fv,', 1, 'fkv ;', 'rrrrrr', 'fmv', 1),
(17, 16, 12, 'test11111', '43', '54', '4', '44', 5464, '531547538_wallpapersden.com_louis-hofmann-and-lisa-vicari-netflix-dark_1920x1080.jpg', 'efr', 'wef', 1, 'ew', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`) VALUES
(1, 10, '521594755_wp4148174-stranger-things-1080p-wallpapers.jpg'),
(2, 14, '443873280_wp1839620-stranger-things-wallpapers.png'),
(3, 14, '631771369_wp4148174-stranger-things-1080p-wallpapers.jpg'),
(12, 16, '682069022_825407.jpg'),
(13, 16, '754469458_wallpapersden.com_louis-hofmann-and-lisa-vicari-netflix-dark_1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `name`, `mobile`, `address`, `city`, `pincode`) VALUES
(1, 12, 'Rakshan Shetty', 456, '66', '66', 666),
(2, 17, 'thowhir', 45686534, 'innanje', 'udupiu', 576122);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 2, 'Vanilla', 1),
(2, 1, 'ca2', 1),
(3, 4, 'fkskk', 1),
(4, 3, 'vannila', 1),
(5, 4, 'chvocs;', 1),
(7, 1, 'lfv;lmxkcm', 1),
(8, 3, 'vl;mxd;vm', 1),
(9, 14, 'ANNIVERSARY', 1),
(10, 14, 'BIRTHDAY', 1),
(11, 14, 'PARTY', 1),
(12, 16, 'CARTOON CAKES', 1),
(13, 16, 'PINATA CAKES', 1),
(14, 15, 'VANILLA CAKE', 1),
(15, 15, 'CHOCLATE CAKE', 1),
(16, 15, 'BLACKFOREST CAKE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(10, '11', '111', '11', '11', '2021-06-17 06:49:32'),
(11, 'Rakshan', '12345', 'rakshan', '8296152114', '2021-06-19 08:44:24'),
(12, 'Rakshan Shetty', '11', 'rakshannshetty@gmail.com', '4567392928', '2021-06-25 07:02:17'),
(13, 'Deekshith', '12345', 'deekshithdeekshu11@gmail.com', '123456789', '2021-06-29 07:12:06'),
(14, '88', '12345', 'admin', '465464', '2021-08-24 08:11:32'),
(15, '88', '12345', 'adminkmkn', '465464', '2021-08-24 08:11:43'),
(16, 'Rekha', '11', 'shetttyrekha0@gmail.com', '943539582', '2021-09-05 08:54:14'),
(17, 'thowhir', '11', 'thowhirmohammed12@gmail.com', '456', '2021-09-06 06:21:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
