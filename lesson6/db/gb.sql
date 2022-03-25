-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2022 at 05:22 PM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `author` varchar(150) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
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
(3, 'Камера настолльная.', 'Удобна для установки на полку и размещения на столе.', 'Бла-бла-бла', 2100, 3, 2),
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
(1, 'first', 'http://fwk.narod.ru/wallpapers/wallpaper_109.jpg', 1),
(2, 'second', 'http://fantasy.mrugala.net/Boris%20Vallejo%201992-1995/Boris%20Vallejo%201995%20-%2004.jpg', 0),
(3, 'third', 'http://sulimart.ru/upload/iblock/fdd/Vallejo-Boris-10.jpg', 2),
(4, 'forth', 'https://i.pinimg.com/originals/f8/48/06/f8480684e9ddf883239680bd2e6a83da.jpg', 1),
(5, 'fifth', 'https://i.pinimg.com/originals/00/42/d5/0042d5d82ec830cd4d879bf10b558f9f.jpg', 6),
(6, 'sixth', 'http://fantasy.mrugala.net/Boris%20Vallejo%20-%20Arcanes/Boris%20Vallejo%20-%20Arcanes%20-%20002.jpg', 0),
(7, 'seventh', 'https://i.pinimg.com/originals/a6/a5/37/a6a537894b25891af1af99c9605099fe.jpg', 3),
(8, 'eitht', 'http://fantasy.mrugala.net/Boris%20Vallejo%201999-2004/Boris%20Vallejo%202000%20-%2011.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `id_goods` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
