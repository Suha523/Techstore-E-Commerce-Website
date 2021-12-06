-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 06, 2021 at 04:32 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_super` enum('yes','no') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `email`, `is_super`) VALUES
(1, 'suha', '$2y$10$Akd6vvBI.ckM0AuCTv.QKOC0gmIzZoDnk.LcZ8izdtuauQFexmjgm', 'suha@admin.com', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Laptops', '2021-11-19 18:02:10'),
(2, 'Mobiles', '2021-11-19 18:02:10'),
(3, 'PCs', '2021-11-19 18:02:10'),
(6, 'Accessories', '2021-12-03 22:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('approved','canceled','pending') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `status`, `created_at`) VALUES
(27, 'suha', 'suha@gmail.com', '123456789', 'Nablus', 'canceled', '2021-12-03 22:49:18'),
(28, 'suha', 'suha@gmail.com', '123456789', 'Nablus', 'approved', '2021-12-03 22:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `qty`) VALUES
(16, 52, 27, 1),
(17, 61, 27, 1),
(18, 61, 28, 1),
(19, 60, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodimgs`
--

DROP TABLE IF EXISTS `prodimgs`;
CREATE TABLE IF NOT EXISTS `prodimgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodimgs`
--

INSERT INTO `prodimgs` (`id`, `name`, `product_id`) VALUES
(99, '163854152261aa28d215b30.webp', 47),
(100, '163854154461aa28e8957d6.jpg', 47),
(101, '163854154461aa28e89765a.webp', 47),
(102, '163854154461aa28e89cdf2.webp', 47),
(103, '163854154461aa28e8a0a69.webp', 47),
(104, '163854154461aa28e8a4a1d.webp', 47),
(105, '163854154461aa28e8a878e.webp', 47),
(106, '163854154461aa28e8ac6d6.webp', 47),
(107, '163854154461aa28e8b0475.webp', 47),
(108, '163854154461aa28e8b42ff.webp', 47),
(111, '163854215661aa2b4c9e7f4.jpg', 48),
(112, '163854216961aa2b596b5cb.jpg', 48),
(113, '163854216961aa2b596cfce.jpg', 48),
(114, '163854216961aa2b596e12a.jpg', 48),
(115, '163854229261aa2bd4c95a6.png', 49),
(116, '163854230461aa2be0c447f.png', 49),
(117, '163854230461aa2be0ca9c8.png', 49),
(118, '163854230461aa2be0d0849.png', 49),
(119, '163854230461aa2be0d4a6f.png', 49),
(120, '163854241161aa2c4b281cc.jpg', 50),
(121, '163854242861aa2c5c18c0a.png', 50),
(122, '163854242861aa2c5c19d83.jpg', 50),
(123, '163854242861aa2c5c1b4d9.jpg', 50),
(128, '163854317761aa2f49e8f3a.jpg', 52),
(129, '163854320261aa2f624dbd3.jpg', 52),
(130, '163854320261aa2f62514fb.jpg', 52),
(131, '163854383661aa31dc3f01f.jpg', 53),
(133, '163854384861aa31e81db00.jpg', 53),
(134, '163854876761aa451f95a53.jpeg', 54),
(135, '163854877861aa452a5cacb.jpeg', 54),
(136, '163854877861aa452a5f0ef.jpeg', 54),
(137, '163854900161aa46093057c.jpg', 55),
(138, '163854902161aa461d8b2f1.jpg', 55),
(139, '163854902161aa461d92fdd.jpg', 55),
(140, '163854902161aa461d9b10e.jpg', 55),
(141, '163855013161aa4a73aa853.jpg', 56),
(142, '163855014561aa4a81ee654.jpg', 56),
(143, '163855014561aa4a81f04bd.jpg', 56),
(155, '163856172361aa77bb0c3b7.jpeg', 60),
(156, '163856173861aa77ca47211.jpeg', 60),
(157, '163856173861aa77ca4e6ec.jpeg', 60),
(159, '163856212461aa794c14c0f.jpg', 61);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `piecesNo` smallint(6) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `categry_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `piecesNo`, `img`, `category_id`, `created_at`) VALUES
(47, 'Lenovo Ideapad', 'IdeaPad 1 (11”, Intel) laptop', '3100.00', 23, '', 1, '2021-12-03 16:25:22'),
(48, 'Asus', 'ASUS Laptop L510 Ultra Thin Laptop, 15.6” FHD Display, Intel Celeron N4020 Processor, 4GB RAM, 128GB Storage, Windows 10 Home in S Mode, 1 Year Microsoft 365, Star Black, L510MA-DS04.', '2200.00', 13, '', 1, '2021-12-03 16:35:56'),
(49, 'HP', 'this is hp', '2000.00', 26, '', 1, '2021-12-03 16:38:12'),
(50, 'Lenovo', 'this is lenovo', '4000.00', 20, '', 3, '2021-12-03 16:40:11'),
(52, 'Macbook', 'Apple MacBook Pro 16-inch with M1 Pro chip 1TB SSD (Silver) [2021], Total Storage: 1TB, Processor Type: M1 Pro chip.\r\n', '2000.00', 10, '', 1, '2021-12-03 16:52:57'),
(53, 'Macbook', 'this is mac', '4000.00', 20, '', 3, '2021-12-03 17:03:56'),
(54, 'hp', 'this is hp', '3000.00', 30, '', 3, '2021-12-03 18:26:07'),
(55, 'iphone6', 'TORRAS [Love Series] iPhone 6S Plus Case/iPhone 6 Plus Case, Liquid Silicone Rubber Gel Soft Microfiber Cushion Shockproof Case Compatible with iPhone 6 Plus/iPhone 6S Plus, Light Blue.', '1000.00', 20, '', 2, '2021-12-03 18:30:01'),
(56, 'huawie', 'Huawei Nova 5T YAL-L21 128GB 6GB RAM International Version - Crush Blue.', '510.00', 40, '', 2, '2021-12-03 18:48:51'),
(60, 'Dell Laptop', 'Dell Inspiron 3583 15” Laptop Intel Celeron – 128GB SSD – 4GB DDR4 – 1.6GHz - Intel UHD Graphics 610 - Windows 10 Home - Inspiron 15 3000 Series - New', '900.00', 20, '', 1, '2021-12-03 22:02:03'),
(61, 'headphone', 'BEATS Solo 3 Wireless Bluetooth Headphones - Rose Gold', '30.00', 20, '', 6, '2021-12-03 22:08:26');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodimgs`
--
ALTER TABLE `prodimgs`
  ADD CONSTRAINT `prodimgs_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
