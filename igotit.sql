-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 07:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igotit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_role` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `admin_addres` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_name`, `admin_role`, `admin_password`, `admin_phone`, `admin_addres`) VALUES
(1, 'Jatin@gmail.com', 'Jatin', 'CEO', '123', '9978706184', 'd-8 GG NOW IS  THE ADDRESH');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_qauntity` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT ' code can be ( 0 ) ( 1 ) ( 2 )\r\n( 0 ) = in the cart\r\n( 1 ) = its Buying\r\n( 2 ) = its ordered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'sirt'),
(2, 'pents'),
(3, 'shoe');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_firstname` varchar(20) NOT NULL,
  `customer_lastname` varchar(20) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_addres` varchar(250) NOT NULL,
  `customer_state` varchar(50) NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_zipcode` varchar(20) NOT NULL,
  `customer_ban` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_email`, `customer_password`, `customer_firstname`, `customer_lastname`, `customer_phone`, `customer_addres`, `customer_state`, `customer_city`, `customer_zipcode`, `customer_ban`) VALUES
(1, 'HAHU@gmail.com', '123', 'HAH', 'HU', '9978706184', 'D/8, Rajiv Nagar, Old Acher, Sabarmati, Ahmedabad-380005, Gujarat', 'Gujarat', 'Ahmedabad', '123', 0),
(19, 'tban@gmail.com', '123', 'Tban', 'BUN', '9978706184', 'D/8, Rajiv Nagar, Old Acher, Sabarmati, Ahmedabad-380005, Gujarat', 'Gujarat', 'Ahmedabad', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `favourite_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 2,
  `packing` int(11) DEFAULT NULL COMMENT '0 OR 1 ( 0 = false  1 = true )',
  `onway` int(11) DEFAULT NULL COMMENT '0 OR 1 ( 0 = false  1 = true )',
  `reached` int(11) DEFAULT NULL COMMENT '0 OR 1 ( 0 = false  1 = true )',
  `received` int(11) DEFAULT NULL COMMENT '0 OR 1 ( 0 = false  1 = true )',
  `return` int(11) DEFAULT NULL COMMENT '0 OR 1 ( 0 = false  1 = true )'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_status` int(10) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_discription` varchar(250) NOT NULL,
  `product_img` varchar(200) NOT NULL,
  `product_rating` int(10) NOT NULL DEFAULT 0,
  `product_tags` varchar(50) DEFAULT NULL,
  `product_retailprice` int(20) NOT NULL,
  `product_saleprice` int(20) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `seller_id`, `product_code`, `product_status`, `product_name`, `product_discription`, `product_img`, `product_rating`, `product_tags`, `product_retailprice`, `product_saleprice`, `product_category_id`, `product_subcategory_id`) VALUES
(1, 1, '65ca3883f03c61707751555', NULL, 'bounce', 'bounce is GOOOD', '170775155565ca3883f01e4_Deadlock_Artwork_Full.png', 0, 'Boucn/now/trend', 2000, 1500, 1, 1),
(2, 1, '65ca3be4c424a1707752420', NULL, 'suffle', 'suffle is BAD', '170775242065ca3be4c3f8c_indina fleg.png', 0, 'suffle/bad/dead', 2977, 1590, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `seller_email` varchar(250) NOT NULL,
  `seller_password` varchar(50) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `seller_phone` varchar(50) NOT NULL,
  `seller_addres` varchar(250) NOT NULL,
  `seller_wallet` int(11) NOT NULL,
  `seller_ban` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_email`, `seller_password`, `seller_name`, `seller_phone`, `seller_addres`, `seller_wallet`, `seller_ban`) VALUES
(1, 'New@gmail.com', '123', 'NEW', '9978709154', 'd-8 something somerwhere you got it show me the place', 0, 0),
(3, 'Bun@gmail.com', '123', 'Sban', '9978709154', 'd-8 something somerwhere you got it show me the place', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller_products`
--

CREATE TABLE `seller_products` (
  `seller_product_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_favourite` int(11) DEFAULT 0,
  `product_cart` int(11) DEFAULT 0,
  `product_bought` int(11) DEFAULT 0,
  `product_return` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(20) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `product_category_id`) VALUES
(1, 'man', 1),
(2, 'women', 1),
(3, 'child', 3),
(4, 'Nike', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `product_subcategory_id` (`product_subcategory_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `seller_email` (`seller_email`);

--
-- Indexes for table `seller_products`
--
ALTER TABLE `seller_products`
  ADD PRIMARY KEY (`seller_product_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favourite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_products`
--
ALTER TABLE `seller_products`
  MODIFY `seller_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`product_subcategory_id`) REFERENCES `subcategory` (`subcategory_id`);

--
-- Constraints for table `seller_products`
--
ALTER TABLE `seller_products`
  ADD CONSTRAINT `seller_products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`),
  ADD CONSTRAINT `seller_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
