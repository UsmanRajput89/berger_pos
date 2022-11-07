-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 04:32 PM
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
-- Database: `berger`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Jane', 'jane', '123456', 'jane@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `drumi_price` int(20) NOT NULL,
  `quarter_price` int(20) NOT NULL,
  `gallon_price` int(20) NOT NULL,
  `dabbi_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `drumi_price`, `quarter_price`, `gallon_price`, `dabbi_price`) VALUES
(58, 'Synthetic Enamel', 1800, 1000, 500, 250),
(59, 'NU ENAMEL', 2000, 1800, 600, 300);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(120) DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `customer_address` varchar(150) DEFAULT NULL,
  `customer_city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_address`, `customer_city`) VALUES
(21, 'John', '03335566767', 'some address there', 'Sargodha'),
(30, 'Hani', '03216708877', 'some address there', 'Sargodha'),
(34, 'New', '03001234567', 'Sargodha Paint Store', 'Sargodha'),
(35, 'Random', '03021122333', 'aid oawd a,nx auwy ', 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(22) NOT NULL,
  `invoice_number` int(75) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` varchar(50) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `p_per_item` int(11) NOT NULL,
  `discount_percent` varchar(11) NOT NULL,
  `discounted_price` int(11) NOT NULL,
  `total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_number`, `customer_id`, `category_id`, `product_id`, `product_quantity`, `pcs`, `p_per_item`, `discount_percent`, `discounted_price`, `total`) VALUES
(103, 200432, 21, 58, 18, 'Gallon', 2, 500, '5', 475, 950),
(104, 200432, 21, 58, 18, 'Gallon', 3, 500, '5', 475, 1425),
(105, 200432, 21, 58, 18, 'Quarter', 3, 1000, '5', 950, 2850),
(106, 30272, 21, 58, 18, 'Gallon', 2, 500, '0', 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `category` int(50) DEFAULT NULL,
  `gallon_quantity` int(11) NOT NULL,
  `quarter_quantity` int(11) NOT NULL,
  `dabbi_quantity` int(11) NOT NULL,
  `drumi_quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `category`, `gallon_quantity`, `quarter_quantity`, `dabbi_quantity`, `drumi_quantity`) VALUES
(18, 'Apple White', '1121', 58, 100, 200, 300, 60),
(19, 'Blue Biege', '2212', 59, 400, 500, 600, 200);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(22) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `invoice_number` int(50) NOT NULL,
  `invoice_amount` varchar(50) DEFAULT NULL,
  `amount_recieved` varchar(50) DEFAULT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `customer_id`, `invoice_number`, `invoice_amount`, `amount_recieved`, `date`) VALUES
(13, 1, 2042222, '52305', '60000', '18-08-2022'),
(14, 1, 303323, '9350', '15000', '18-08-2022'),
(15, 2, 3390, '4510', '1000', '20-08-2022'),
(16, 1, 2287622, '119240', '40000', '20-08-2022'),
(17, 0, 23323329, '0', '8000', '20-08-2022'),
(18, 1, 80000, '10750', '', '21-08-2022'),
(19, 1, 80000, '10750', '', '21-08-2022'),
(20, 1, 23334, '3600', '100', '21-08-2022'),
(21, 1, 252023, '24660', '10000', '21-08-2022'),
(22, 1, 222333, '52990', '50000', '23-08-2022'),
(23, 16, 782623, '4600', '0', '28-08-2022'),
(24, 21, 3580620, '2300', '0', '28-08-2022'),
(25, 21, 32230303, '1800', '0', '28-08-2022'),
(26, 21, 32230303, '1800', '0', '28-08-2022'),
(27, 21, 8573292, '500', '0', '28-08-2022'),
(28, 21, 973, '500', '0', '28-08-2022'),
(29, 21, 200432, '5225', '0', '31-08-2022'),
(30, 21, 30272, '1000', '0', '31-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `username` varchar(75) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ProductCategory` (`category`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_ProductCategory` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
