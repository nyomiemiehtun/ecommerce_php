-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 03:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@email.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, '465.00', 'not paid', 1, 34444555, 'monywa', 'monywa', '2023-01-01 16:38:36'),
(2, '400.00', ' paid', 2, 5555555, 'mandalay', 'mandalay', '2023-01-01 16:44:51'),
(3, '366.00', 'not paid', 2, 5555555, 'mandalay', 'mandalay', '2023-01-01 16:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 1, '2', 'Pink Bag', 'feature1.jpeg', '155.00', 3, 1, '2023-01-01 16:38:36'),
(2, 2, '6', 'Blue coat', 'coat4.jpeg', '200.00', 2, 2, '2023-01-01 16:44:51'),
(3, 3, '12', 'Black watch', 'watch4.jpeg', '366.00', 1, 2, '2023-01-01 16:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'White Shoes', 'shoes', 'awesome white shoes', 'feature.jpeg', 'feature.jpeg', 'feature.jpeg', 'feature.jpeg', '155.00', 0, 'white'),
(2, 'Pink Bag', 'bags', 'awesome pink bag', 'feature1.jpeg', 'feature1.jpeg', 'feature1.jpeg', 'feature1.jpeg', '155.00', 0, 'pink'),
(3, 'Black Bag', 'bags', 'awesome black bags', 'feature4.jpeg', 'feature4.jpeg', 'feature4.jpeg', 'feature4.jpeg', '155.00', 0, 'black'),
(4, 'Red Bag', 'bags', 'awesome red bags', 'feature01.jpeg', 'feature01.jpeg', 'feature01.jpeg', 'feature01.jpeg', '155.00', 0, 'red'),
(5, 'Black coat', 'coats', 'Black coat for men', 'coat1.jpeg', 'coat1.jpeg', 'coat1.jpeg', 'coat1.jpeg', '150.00', 0, 'black'),
(6, 'Blue coat', 'coats', 'Blue coat for men', 'coat4.jpeg', 'coat4.jpeg', 'coat4.jpeg', 'coat4.jpeg', '200.00', 0, 'blue'),
(8, 'Red coat', 'coats', 'coat for men', 'coat3.jpeg', 'coat3.jpeg', 'coat3.jpeg', 'coat3.jpeg', '200.00', 0, 'red'),
(9, 'White coat', 'coats', 'White coat for men', 'coat5.jpeg', 'coat5.jpeg', 'coat5.jpeg', 'coat5.jpeg', '250.00', 0, 'white'),
(10, 'White watch', 'watches', 'awesome watch', 'watch2.jpeg', 'watch2.jpeg', 'watch2.jpeg', 'watch2.jpeg', '395.50', 0, 'white'),
(11, 'Green watch', 'watches', 'awesome watch', 'watch3.jpeg', 'watch3.jpeg', 'watch3.jpeg', 'watch3.jpeg', '244.50', 0, 'green'),
(12, 'Black watch', 'watches', 'awesome watches', 'watch4.jpeg', 'watch4.jpeg', 'watch4.jpeg', 'watch4.jpeg', '366.00', 0, 'black'),
(13, 'Red watch', 'watches', 'awesome watch', 'watch5.jpeg', 'watch5.jpeg', 'watch5.jpeg', 'watch5.jpeg', '244.50', 0, 'red'),
(14, 'Red shoe', 'shoes', 'style shoes', 'redshoes4.jpeg', 'redshoes4.jpeg', 'redshoes4.jpeg', 'redshoes4.jpeg', '300.00', 0, 'red'),
(15, 'Black shoe', 'shoes', 'style shoes', 'shoe.jpeg', 'shoe.jpeg', 'shoe.jpeg', 'shoe.jpeg', '155.00', 0, 'black'),
(16, 'Yellow shoe', 'shoes', 'style shoes', 'shoe3.jpeg', 'shoe3.jpeg', 'shoe3.jpeg', 'shoe3.jpeg', '200.00', 0, 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'MgMg', 'mgmg@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(2, 'mie mie', 'miemie@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
