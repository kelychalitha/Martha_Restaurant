-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 02:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`) VALUES
(9, 'Carl Moneda', '09431215641', 'Walana', 'na'),
(10, 'Ian Estabaya', '09644164565', 'Galle', 'na'),
(11, 'Jun Magayanes', '09641513561', 'Katunayake', 'na'),
(13, 'nimal', '0125478933', 'colombo', 'N/A'),
(14, 'P.V Kamal', '0774768202', 'Nittambuwa', 'N/A'),
(15, 'kcc', '0712223369', 'Colombo', 'ABC'),
(16, 'Kely', '0775698521', 'Matara', 'N/A'),
(17, 'KC Weerasooriya', '0745425661', 'Colombo', 'zxcvnvbg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `retail` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`) VALUES
(35, 'Main Dishes', 'Rice', 162, 50, 100, 'Perera Fonseka'),
(36, 'Main Dishes', 'Roti', 210, 10, 20, 'Marina Lopez'),
(37, 'Main Dishes', 'Noodles', 80, 75, 150, 'Tharindu Kalpana'),
(38, 'Side Dishes', 'Wadai', 297, 20, 45, 'Marina Lopez'),
(39, 'Side Dishes', 'Dhal curry', 90, 45, 75, 'John Hopkins'),
(40, 'Side Dishes', 'Fish curry', 57, 80, 120, 'Marina Lopez'),
(41, 'Desserts', 'Watalappam', 123, 25, 40, 'Teena Nishadhi'),
(42, 'Desserts', 'Jelly', 160, 12, 20, 'Marina Lopez'),
(43, 'Desserts', 'Pudding', 140, 18, 25, 'N.B. Kamal');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `customers` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amnt` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `tendered` int(11) NOT NULL,
  `changed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `dates`, `customers`, `category`, `name`, `amnt`, `quantity`, `total`, `profit`, `tendered`, `changed`) VALUES
(49, '2021-09-25', 'Walk in Customers', 'Main Dishes', 'Rice', 90, 5, 450, -50, 0, -450),
(50, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 2, 200, 0, 0, -200),
(51, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 1, 100, 50, 500, 400),
(52, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 2, 200, 100, 500, 300),
(53, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 1, 100, 50, 500, 400),
(54, '2021-09-26', 'Walk in Customers', 'Main Dishes Rice', 'Noodles', 150, 2, 300, 150, 0, 700),
(55, '2021-09-26', 'Walk in Customer', 'Main Dishes', 'Noodles', 150, 2, 300, 150, 0, 200),
(56, '2021-09-27', 'nimal', 'Side Dishes', 'Wadai', 45, 1, 45, 25, 0, 55),
(57, '2021-09-28', 'Walk in Customers', 'Side Dishes', 'Fish curry', 0, 1, 120, 40, 0, 80),
(58, '2021-09-28', 'Walk in Customers', 'Desserts', 'Watalappam', 0, 3, 120, 45, 0, 80),
(59, '2021-09-28', 'Walk in Customers', 'Desserts', 'Watalappam', 40, 3, 120, 45, 0, 80),
(60, '2021-09-28', 'Walk in Customers', 'Desserts', 'Watalappam', 0, 3, 120, 45, 200, 80),
(61, '2021-09-28', 'Walk in Customers', 'Desserts', 'Watalappam', 40, 5, 200, 75, 500, 300),
(62, '2021-09-28', 'Walk in Customers', 'Main Dishes', 'Rice', 0, 5, 500, 250, 0, 500),
(63, '2021-09-28', 'Walk in Customers', 'Main Dishes', 'Rice', 0, 5, 500, 250, 0, 500),
(64, '2021-09-28', 'Walk in Customers', 'Main Dishes', 'Rice', 0, 5, 500, 250, 0, 100),
(65, '2021-09-28', 'Walk in Customers', 'Desserts', 'Pudding', 0, 6, 150, 42, 0, 50),
(66, '2021-09-28', 'Walk in Customers', 'Desserts', 'Pudding', 0, 6, 150, 42, 0, 50),
(67, '2021-09-28', 'Walk in Customers', 'Side Dishes', 'Fish curry', 0, 2, 240, 80, 0, 10),
(68, '2021-09-28', 'Walk in Customers', 'Side Dishes', 'Dhal curry', 0, 5, 375, 150, 0, 25),
(69, '2021-09-29', 'Walk in Customers', 'Side Dishes', 'Dhal curry', 0, 5, 375, 150, 0, 125),
(70, '2021-09-29', 'Walk in Customers', 'Desserts', 'Watalappam', 0, 2, 80, 30, 0, 20),
(71, '2021-09-29', 'nimal', 'Main Dishes', 'Rice', 0, 2, 200, 100, 0, 300),
(72, '2021-09-29', 'Carl Moneda', 'Main Dishes', 'Rice', 0, 1, 100, 50, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `suppliername` varchar(100) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `contactperson`, `address`, `contactno`, `note`) VALUES
(13, 'Marina Lopez', 'Juliya Sanjuan', 'Galle', '0774569875', 'N/A'),
(17, 'Perera Fonseka', 'Nilusha Pranandu', 'Hikkaduwa', '0712256983', 'N/A'),
(18, 'Tharindu Kalpana', 'Jayantha', 'Colombo', '0712369872', 'N/A'),
(19, 'Teena Nishadhi', 'Shanika', 'Gampaha', '0775698363', 'N/A'),
(20, 'N.B. Kamal', 'N.T. Nuwan', 'Kandy', '0785698323', 'food'),
(21, 'Thakshila Pranandu', 'chamali', 'moratuwa', '0457525656', 'noodles');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `access`) VALUES
(1, 'waiter', 'f64cff138020a2060a9817272f563b3c', 'User'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`category`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
