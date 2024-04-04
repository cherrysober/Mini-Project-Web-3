-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 04:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `candle_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_products` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cart_date` datetime NOT NULL,
  `checked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_users`, `id_products`, `quantity`, `cart_date`, `checked`) VALUES
(4, 5, 3, 2, '2024-04-04 22:05:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` varchar(25) NOT NULL,
  `subtotal` varchar(25) NOT NULL,
  `invoice_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_users`, `id_products`, `quantity`, `item_price`, `subtotal`, `invoice_date`) VALUES
(6, 5, 3, 3, '55000', '165000', '2024-04-04 22:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `products_name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` varchar(25) NOT NULL,
  `stocks` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `products_name`, `desc`, `price`, `stocks`, `img`) VALUES
(1, 'Midnight Rain', 'Gourmet', '55000', 20, 'prod_11.png'),
(3, 'Champagne Problem', 'Gourmet', '55000', 20, 'prod_1.png'),
(4, 'False God', 'Floral', '54000', 50, 'prod_2.png'),
(5, 'You\'re on Your Own Kid', 'Seasonal', '48000', 20, 'prod_3.png'),
(6, 'Lavender Haze', 'Floral', '60000', 50, 'prod_4.png'),
(7, 'Styles', 'Woody', '49000', 50, 'prod_5.png'),
(8, 'Speak Now', 'Aromatherapy', '48000', 50, 'prod_6.png'),
(9, 'Cruel Summer', 'Seasonal', '58000', 20, 'prod_7.png'),
(10, 'Sparks Fly', 'Fruity', '45000', 50, 'prod_8.png'),
(11, 'State of Grace', 'Seasonal', '68000', 20, 'prod_9.png'),
(12, 'Folklore', 'Woody', '54000', 50, 'prod_10.png'),
(13, 'Enchanted', 'Floral', '58000', 50, 'prod_12.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `regist_date` datetime NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `phone`, `regist_date`, `age`) VALUES
(5, 'Lavieee', 'fafa@gmail.com', '123', 'Jalan jalan yuk', 818181818, '2024-04-01 16:02:10', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_products` (`id_products`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_products` (`id_products`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
