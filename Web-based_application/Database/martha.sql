-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 06:04 AM
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
-- Database: `martha`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`) VALUES
(9, 'Kathrina Monika', '09431215641', 'Negombo', 'na'),
(10, 'liya Esthiya', '09644164565', 'Kandy', 'na'),
(11, 'Riya Manisha', '09641513561', 'Malabe', 'na'),
(13, 'nimal', '0125478933', 'colombo', 'N/A'),
(14, 'P.V Kamal', '0774768202', 'Nittambuwa', 'N/A'),
(15, 'Ruwan Perera', '0785698536', 'Galle', 'daily customer'),
(16, 'abcde', '01288744444', 'mmmmamamam', 'assssasa'),
(17, 'Waruni Nadeesha', '0725469821', 'Tangalle', 'New customer'),
(19, 'zzss', '01111111', 'fghgh', 'hhg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `retail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`) VALUES
(35, 'Main Dishes', 'Rice', 134, 50, 100),
(36, 'Main Dishes', 'Roti', 183, 10, 20),
(37, 'Main Dishes', 'Noodles', 47, 75, 150),
(38, 'Side Dishes', 'Wadai', 288, 20, 45),
(39, 'Side Dishes', 'Dhal curry', 88, 45, 75),
(40, 'Side Dishes', 'Fish curry', 53, 80, 120),
(41, 'Desserts', 'Watalappam', 142, 25, 40),
(42, 'Desserts', 'Jelly', 138, 12, 20),
(43, 'Desserts', 'Pudding', 92, 18, 25);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `dates`, `customers`, `category`, `name`, `amnt`, `quantity`, `total`, `profit`, `tendered`, `changed`) VALUES
(49, '2021-09-25', 'Walk in Customers', 'Main Dishes', 'Rice', 90, 5, 450, -50, 0, -450),
(50, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 2, 200, 0, 0, -200),
(51, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 1, 100, 50, 500, 400),
(52, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 2, 200, 100, 500, 300),
(53, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Rice', 100, 1, 100, 50, 500, 400),
(54, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Noodles', 150, 2, 300, 150, 0, 700),
(55, '2021-09-26', 'Walk in Customers', 'Main Dishes', 'Noodles', 150, 2, 300, 150, 0, 200),
(59, '2021-10-02', 'Kathrina Monika', 'Desserts', 'Watalappam', 40, 3, 120, 45, 0, 80),
(60, '2021-10-02', 'Kathrina Monika', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 10),
(63, '2021-10-02', 'Ruwan Perera', 'Main Dishes', 'Rice', 100, 2, 200, 100, 0, 300),
(64, '2021-10-03', 'liya Esthiya', 'Main Dishes', 'Rice', 100, 5, 500, 250, 0, 500),
(65, '2021-10-03', 'Riya Manisha', 'Side Dishes', 'Fish curry', 120, 5, 600, 200, 0, 400),
(66, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Dhal curry', 75, 2, 150, 60, 0, 50),
(67, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Dhal curry', 75, 2, 150, 60, 0, 50),
(68, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Dhal curry', 75, 2, 150, 60, 0, 50),
(69, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Dhal curry', 75, 2, 150, 60, 0, 50),
(70, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Dhal curry', 75, 2, 150, 60, 0, 50),
(71, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Dhal curry', 75, 2, 150, 60, 0, 50),
(72, '2021-10-04', 'Riya Manisha', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 60),
(73, '2021-10-04', 'Riya Manisha', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 60),
(74, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Fish curry', 120, 2, 240, 80, 0, 260),
(75, '2021-10-04', 'Waruni Nadeesha', 'Desserts', 'Watalappam', 40, 2, 80, 30, 0, 20),
(76, '2021-10-04', 'Waruni Nadeesha', 'Desserts', 'Watalappam', 40, 2, 80, 30, 0, 20),
(77, '2021-10-04', 'P.V Kamal', 'Main Dishes', 'Noodles', 150, 1, 150, 75, 0, 50),
(78, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Wadai', 45, 2, 90, 50, 0, 10),
(79, '2021-10-04', 'P.V Kamal', 'Side Dishes', 'Wadai', 45, 2, 90, 50, 0, 10),
(80, '2021-10-04', 'Ruwan Perera', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 10),
(81, '2021-10-04', 'nimal', 'Side Dishes', 'Wadai', 45, 2, 90, 50, 0, 10),
(82, '2021-10-04', 'nimal', 'Side Dishes', 'Wadai', 45, 2, 90, 50, 0, 10),
(83, '2021-10-04', 'liya Esthiya', 'Desserts', 'Jelly', 20, 1, 20, 8, 0, 30),
(84, '2021-10-04', 'Kathrina Monika', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 60),
(85, '2021-10-04', 'Kathrina Monika', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 60),
(86, '2021-10-04', 'Kathrina Monika', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 60),
(87, '2021-10-04', 'Kathrina Monika', 'Main Dishes', 'Roti', 20, 2, 40, 20, 0, 60),
(88, '2021-10-04', 'nimal', 'Main Dishes', 'Roti', 20, 1, 20, 10, 0, 30),
(89, '2021-10-04', 'abcde', 'Main Dishes', 'Rice', 100, 2, 200, 100, 0, 300),
(90, '2021-10-04', 'zzss', 'Side Dishes', 'Wadai', 45, 2, 90, 50, 0, 10),
(91, '2021-10-04', 'abcde', 'Desserts', 'Jelly', 20, 1, 20, 8, 0, 30),
(92, '2021-10-04', 'Waruni Nadeesha', 'Desserts', 'Watalappam', 40, 1, 40, 15, 0, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` enum('User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `access`) VALUES
(1, 'waiter', 'f64cff138020a2060a9817272f563b3c', 'User');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
