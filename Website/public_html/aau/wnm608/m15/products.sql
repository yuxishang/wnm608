-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2019 at 06:03 PM
-- Server version: 5.6.46-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yshang`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(16) NOT NULL,
  `date_creates` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `image_main` varchar(256) NOT NULL,
  `image_other` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `best` decimal(16,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `date_creates`, `date_modify`, `image_main`, `image_other`, `description`, `best`) VALUES
(2, 'Lavender', '5.00', 'Floral', '2019-11-14 15:39:42', '2019-12-17 20:53:54', 'images/lavender_main.jpg', '', 'This luxurious chocolate features a 59% cacao content with notes of wine, fruit, nuts, and oak. Infused with the delicious flavors of lavender essence and blueberries.', '11'),
(4, 'Pistachio', '5.00', 'Nut', '2019-11-14 15:42:21', '2019-11-14 15:42:21', 'images/pistachio_main.jpg', '', 'Unique combination of fine chocolate and premium Turkish pistachios', '10'),
(5, 'Rose', '5.00', 'Alcohol', '2019-11-14 15:44:47', '2019-11-14 15:44:47', 'images/Rose_main.jpg', 'images/Rose_1.jpg', 'Lula\'s Rosé chocolate infused with rosé wine! This is the hottest product of the summer! It\'s rosé season, so sit back, pour a glass, and take a bite of the sweetest new sensation of the year.\r\n', '9'),
(6, 'Salted Caramel ', '3.00', 'Caramel', '2019-11-15 14:00:35', '2019-11-15 14:00:35', 'images/salted_caramel_main.jpg', 'images/salted_caramel_1.jpg', 'Rich dark chocolate wrapped around decadent caramel,Sprinkled with coarse sea salt', '8'),
(7, 'Champagne', '5.00', 'Alcohol', '2019-11-15 14:01:49', '2019-11-15 14:01:49', 'images/champagne_main.jpg', 'images/champagne_1.jpg', 'Dark Ganache Blended with a touch of champagne', '7'),
(8, 'Cappuccino', '5.00', 'Coffee', '2019-11-15 14:03:06', '2019-11-15 14:03:06', 'images/cappuccino_main.jpg', 'images/cappuccino_1.jpg', 'Luxurious milk chocolate infused with coffee', '6'),
(9, 'Matcha', '5.00', 'Matcha', '2019-11-15 14:04:26', '2019-11-15 14:04:26', 'images/matcha_main.jpg', 'images/matcha_1.jpg', 'Matcha powder is blended in white chocolate. Enjoy deep and rich matcha aroma and smooth texture of chocolate\r\n', '6'),
(10, 'Strawberries', '4.00', 'Fruity', '2019-11-15 14:05:40', '2019-11-15 14:05:40', 'images/strawberries_main.jpg', 'images/strawberries_1.jpg', 'White chocolate mixed with powdered strawberries and three kinds of dried fruit, almond puffs, and a touch of banana essence. ', '5'),
(11, 'Dark Rum', '5.00', 'Alcohol', '2019-11-15 14:06:37', '2019-11-15 14:06:37', 'images/dark_rum_main.jpg', 'images/dark_rum_1.jpg', 'Rich, dark chocolate infused with spiced rum.', '4'),
(12, 'Orange', '4.00', 'Fruity', '2019-11-15 15:03:25', '2019-12-17 17:05:33', 'images/orange_main.jpg', 'images/orange_1.jpg', 'Oranges covered in dark Chocolate', '3'),
(19, 'Hazelnut', '4.00', 'Nut', '2019-12-18 17:36:52', '2019-12-18 17:36:52', 'images/hazelnut_main.jpg', 'images/hazelnut_1.jpg', 'Rich hazelnut praline whipped with creamy milk chocolate.', '0'),
(3, 'Mint', '4.00', 'Fruity', '2019-11-15 15:11:19', '2019-11-15 15:11:19', 'images/mint_main.jpg', 'images/mint_1.jpg', 'Dark chocolate truffles with mint ganache filling.', '1'),
(1, 'Coconut lime', '5.00', 'Fruity', '2019-11-14 15:32:37', '2019-11-14 15:32:37', 'images/coconut_lime_main.jpg', '', 'A crisp refreshing lime coconut filling in a dark chocolate shell.', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
