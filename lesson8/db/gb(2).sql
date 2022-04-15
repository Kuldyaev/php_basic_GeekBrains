-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2022 at 11:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gb`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_cart`
--

CREATE TABLE `current_cart` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_cart`
--

INSERT INTO `current_cart` (`id`, `cart_id`, `item_id`, `quantity`, `user`) VALUES
(21, '486cf8a733826f10bf6604e82b05f052', 3, 1, NULL),
(23, '20', 2, 1, NULL),
(24, '20', 3, 1, NULL),
(26, '21', 1, 1, NULL),
(27, '22', 1, 1, NULL),
(28, '22', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `goods_id`, `author`, `date`, `feedback`) VALUES
(1, 1, 'админ', '2022-03-23', 'тестовое сообщение'),
(2, 1, 'админ', '2022-03-23', 'другое тестовое сообщение '),
(3, 3, 'таинственный покупатель', '2022-03-22', 'очень доволен своей покупкой. советую эту камеру всем друзьям и знакомым');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `s_describ` varchar(300) NOT NULL,
  `f_describ` text NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `q_limit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `s_describ`, `f_describ`, `price`, `quantity`, `q_limit`) VALUES
(1, 'Камера белая 1', 'Очень интересный вариант. Подходит для помещений.', 'Бла-бла-бла', 1200, 5, 2),
(2, 'Камера черная 1', 'Подходит для помещений. Наблюдение в гараж, на производство.', 'Бла-бла-бла', 1250, 15, 2),
(3, 'Камера настольная.', 'Удобна для установки на полку и размещения на столе.', 'Бла-бла-бла', 2100, 3, 2),
(4, 'Камера настенная', 'Рыбий глаз, большой обзор, монтаж на стену', 'Бла-бла-бла', 1800, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `way` varchar(255) NOT NULL,
  `views` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `title`, `way`, `views`) VALUES
(2, 'second', 'http://fantasy.mrugala.net/Boris%20Vallejo%201992-1995/Boris%20Vallejo%201995%20-%2004.jpg', 4),
(3, 'third', 'http://sulimart.ru/upload/iblock/fdd/Vallejo-Boris-10.jpg', 3),
(4, 'forth', 'https://i.pinimg.com/originals/f8/48/06/f8480684e9ddf883239680bd2e6a83da.jpg', 2),
(5, 'fifth', 'https://i.pinimg.com/originals/00/42/d5/0042d5d82ec830cd4d879bf10b558f9f.jpg', 6),
(6, 'sixth', 'http://fantasy.mrugala.net/Boris%20Vallejo%20-%20Arcanes/Boris%20Vallejo%20-%20Arcanes%20-%20002.jpg', 7),
(7, 'seventh', 'https://i.pinimg.com/originals/a6/a5/37/a6a537894b25891af1af99c9605099fe.jpg', 4),
(8, 'eitht', 'http://fantasy.mrugala.net/Boris%20Vallejo%201999-2004/Boris%20Vallejo%202000%20-%2011.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `items` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `open_date` date NOT NULL,
  `close_date` date DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `items`, `amount`, `open_date`, `close_date`, `status`) VALUES
(1, 3, 2, 2000, '2022-04-05', NULL, 1),
(2, 2, 4, 5600, '2022-04-06', NULL, 1),
(19, 3, 2, 3350, '2022-04-07', NULL, 1),
(22, 2, 2, 2450, '2022-04-07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `name`) VALUES
(1, 'created'),
(2, 'closed'),
(3, 'confirmed'),
(4, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `can_read` tinyint(1) NOT NULL,
  `can_write` tinyint(1) NOT NULL,
  `can_edit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `can_read`, `can_write`, `can_edit`) VALUES
(1, 'admin', 1, 1, 1),
(2, 'guest', 1, 0, 0),
(3, 'user', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(10) UNSIGNED NOT NULL,
  `password` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `role`, `password`, `hash`) VALUES
(1, 'admin', 'admin', 'admin@admin.ru', 1, '$1$A8N1W9F3$sCWnODBvSUftsk70xb0ww1', '859933831624e182b086828.67725672'),
(2, 'student', 'miliy', 'student@mail.ru', 3, '$1$2LOZek4q$D02qG8Jfe3ZCLVMeXjQ5r1', ''),
(3, 'Leo', 'Velikiy', 'leopold@velikiy.ru', 3, '$1$ria3xshq$eIIiktPZqH4mxxLnPZQKV.', '1652674142624f4dc8b71a45.64646876');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_cart`
--
ALTER TABLE `current_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback` (`feedback`(768)),
  ADD KEY `goods_id` (`goods_id`),
  ADD KEY `feedback_2` (`feedback`(768)),
  ADD KEY `goods_id_2` (`goods_id`),
  ADD KEY `goods_id_3` (`goods_id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_cart`
--
ALTER TABLE `current_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `current_cart`
--
ALTER TABLE `current_cart`
  ADD CONSTRAINT `item` FOREIGN KEY (`item_id`) REFERENCES `goods` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `id_goods` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `orders_status` (`id`),
  ADD CONSTRAINT `user_name` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
