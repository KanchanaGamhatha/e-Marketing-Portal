-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2014 at 08:26 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sep`
--
CREATE DATABASE IF NOT EXISTS `sep` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sep`;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `user_name`, `admin_password`) VALUES
(4, 'a1', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `advertisement_id` int(11) NOT NULL AUTO_INCREMENT,
  `catogory_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) NOT NULL,
  `advertisement_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `advertisement_Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `advertisement_Price` double DEFAULT NULL,
  `advertisement_image` varchar(100) DEFAULT NULL,
  `advertisement_phonnumber` varchar(10) DEFAULT NULL,
  `advertisement_location` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_date_time` datetime NOT NULL,
  `approval` tinyint(4) NOT NULL,
  `popularity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`advertisement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisement_id`, `catogory_id`, `subcategory_id`, `advertisement_title`, `advertisement_Description`, `advertisement_Price`, `advertisement_image`, `advertisement_phonnumber`, `advertisement_location`, `city_id`, `user_id`, `post_date_time`, `approval`, `popularity`) VALUES
(1, 3, 14, 'Laptop', 'Secondhand laptop', 5000000, 'lapppppp.jpg', '0812323261', 1, 1, 6, '2014-01-08 07:06:15', 1, 18),
(2, 3, 10, 'Samsung Galaxy SIII ', 'Used Samsung Galaxy SIII ', 45000, 'Samsung_Galaxy_S3.jpg', '0778456123', 3, 18, 5, '2014-03-17 07:10:11', 1, 7),
(3, 3, 9, 'i3 Desktop Computer', 'Intel core i3 2.0 GHz\r\n4 GB RAM\r\n1 GB VGA\r\n', 75000, 'computer2.jpg', '0753159753', 2, 15, 4, '2014-03-24 14:21:31', 1, 6),
(4, 4, 15, 'Poster', 'A beautiful poster.', 250, 'dsiney_frozen-wide.jpg', '0812230402', 1, 1, 7, '2014-04-13 16:22:09', 1, 0),
(9, 3, 10, 'Nokia Lumia 920', 'Nokia Lumia 920', 55000, 'lumia920_2330131b.jpg', '0778789645', 2, 10, 16, '2014-05-05 03:00:00', 1, 11),
(10, 3, 10, 'Nokia Lumia', 'Nokia Lumia', 50000, 'lumia-920-000.jpg', '0778789645', 1, 2, 10, '2014-05-12 12:25:00', 1, 4),
(16, 4, 18, 'Sri Lankan Cricket T-Shirts', 'Sri Lankan Cricket T-Shirts of all sizes.. Suitable for any age group   \r\nfrom Rs 1000 onwards', 1500, 'WT20SL.jpg', '0812159753', 1, 3, 9, '2014-05-21 12:18:29', 1, 2),
(20, 1, 1, 'BMW car in kandy', 'Available BMW for very nice price interested.', 9500000, 'BMW1.jpg', '0777555888', 1, 4, 9, '2014-05-22 09:59:03', 1, 15),
(22, 2, 8, 'Land for sale in galle', 'Land for sale in galle\r\nLand for sale in galle\r\nLand for sale in galle', 250000, '41.jpg', '0912123123', 3, 19, 9, '2014-05-22 10:07:11', 1, 0),
(23, 1, 1, 'Lamborghini Car in kandy', 'Edited ***** Brand new Lamborghini Car in kandy', 12500000, '26.jpg', '0812456987', 1, 6, 9, '2014-05-23 02:26:10', 1, 2),
(24, 1, 1, 'Honda FIT 2012', '3 YEARS WARRANTY FOR HYBRID BATTERY \r\n2 YEARS/100,000KM WARRANTY \r\n+ UNLIMITED SERVICES FREE', 4900000, '2012-honda-fit.jpg', '0812323261', 1, 5, 10, '2014-05-25 03:05:24', 1, 7),
(25, 3, 11, 'Sony LED Full HD TV R452A', 'FREE DELIVERY & INSTALLATIONS\n<br>\nINSTALLMENT SCHEMES \n<br>\nTO ALL CREDIT HOLDERS WE WILL COME TO YOUR DOOR STEP', 75000, 'sony_bravia.jpg', '0753159753', 4, 22, 10, '2014-05-25 03:10:54', 1, 1),
(26, 2, 7, 'Apartments in Kandy', 'Facilities........Security , Maintains, Swimming Pool , Gym, Natural water pond, Play area......\r\n\r\n<h6>Limited Offers call soon</h6>', 45000, 'apartments_kandy.jpg', '0777444586', 1, 2, 10, '2014-05-25 03:15:06', 1, 0),
(27, 4, 17, 'Rolex Daytona Men''s Luxury Watch', 'Rolex Datejust Vintage (Limited edition)\r\n<br>\r\n*Rolex Men''s Brand New Watch <br>\r\n*Colours- Black <br>\r\n*All the chronographs are Working <br>\r\n*Adjustable Stainless steel Bracelet <br>\r\n*Limited Stocks Availaible <br>\r\n*5999/- Price <br>\r\n*Swiss Watch<br>', 5000, 'luxury-rolex-replica-watch.jpg', '0912323261', 3, 21, 10, '2014-05-25 03:18:44', 1, 1),
(28, 0, 0, 'Teak Timber', 'Good condition teask timber', 45000, 'Teak_Timber.jpg', '0753159753', 4, 23, 10, '2014-05-25 03:21:53', 1, 1),
(29, 1, 2, 'Toyota Hiace van', 'Toyota Hiace van', 6500000, 'sect-home-pic.jpg', '0778456123', 4, 22, 9, '2014-05-26 17:42:13', 1, 2),
(30, 1, 1, 'Tata bus', 'Tata bus', 3500000, 'tata-bus-2005.jpg', '0352456987', 9, 35, 9, '2014-05-26 17:43:59', 1, 8),
(31, 1, 4, 'Lorry for sale', 'Lorry for sale Lorry for sale Lorry for sale ', 8600000, 'lorry1.jpg', '0112369852', 3, 19, 7, '2014-05-27 01:11:58', 1, 1),
(43, 1, 1, 'Honda car', 'Test', 45000, 'honda-cr-z-concept.jpg', '0778456123', 3, 21, 7, '2014-06-18 08:45:24', 1, 2),
(44, 3, 14, 'Apple mac book Air', 'Brand new condition', 100000, 'Apple-MacBook-Air-PWGSC.jpg', '0112456789', 2, 11, 18, '2014-07-02 11:16:03', 1, 2),
(45, 3, 10, 'Apple iphone 6', 'Apple iphone 6', 250000, 'Apple-iPhone-6.jpg', '0112456789', 2, 12, 18, '2014-07-02 11:18:04', 1, 0),
(46, 3, 10, 'Apple iphone 5s', 'Apple iphone 5s', 75000, 'apple-iphone-5s-110913.jpg', '0112456789', 2, 13, 18, '2014-07-02 11:19:42', 1, 13),
(47, 0, 0, 'Apple for sale', 'Apple stocks for sale\r\nUnit price included here', 30, 'Apples-in-a-basket.jpg', '0777888666', 2, 14, 7, '2014-07-03 04:51:33', 1, 0),
(48, 4, 19, 'Apple pie', 'Delicious Apple pie for sale', 250, 'Tuaca-hot-apple-pie-3.jpg', '0777888666', 2, 15, 7, '2014-07-03 04:57:19', 1, 0),
(49, 3, 9, 'Apple iwatch', 'Apple iwatch', 30000, 'iwatch.jpg', '0777555444', 7, 29, 16, '2014-07-03 05:34:55', 1, 4),
(51, 3, 10, 'Apple iphone 5c', 'Apple iphone 5c\r\nGreen clolor', 75000, 'apple5c.jpeg', '0777888666', 2, 16, 16, '2014-07-03 09:15:50', 1, 7),
(52, 3, 13, 'Apple ipad mini', 'Apple ipad mini', 45000, 'apple-ipad-mini-2.jpg', '0777888666', 1, 3, 16, '2014-07-03 10:15:23', 1, 1),
(53, 3, 14, 'Apple MacBook Pro', 'Apple-MacBook-Pro-2.53GHz', 100000, 'Apple-MacBook-Pro-2.53GHz_.jpg', '0776449789', 1, 4, 16, '2014-07-03 11:22:32', 1, 0),
(54, 4, 15, 'Flowers', 'Different Flowers for sale', 100, 'flower.jpg', '0777555444', 7, 28, 20, '2014-07-03 12:07:56', 0, 0),
(56, 0, 0, 'Timber for sale', 'Good condition timber', 10003, 'Teak_Timber1.jpg', '0777222222', 1, 2, 20, '2014-07-06 00:30:04', 0, 0),
(62, 3, 9, 'i3 Desktop Computer', 'sdfsdf dsf', 45000, '112522.md_.jpg', '0812111222', 17, 48, 9, '2014-07-14 19:10:30', 0, 0),
(69, 1, 2, 'Nissan vanette', 'Quick offer. Need to sell soon. Good condition.', 2200000, 'nissanVannte1.JPG', '0776449789', 1, 1, 16, '2014-07-23 09:05:10', 0, 0),
(70, 1, 3, 'Volvo bus', '54 seat full option. ', 7500000, 'Volvobus.jpg', '0776449789', 1, 2, 16, '2014-07-23 09:07:48', 1, 1),
(71, 1, 4, 'Toyota Facelift', 'Toyota LY Series Lorry, 1.5 Ton', 5000000, 'toyota_lorry.jpg', '0776449789', 1, 3, 16, '2014-07-23 09:12:02', 1, 0),
(72, 2, 6, 'Office Building for sale', '5000 square foot area. 2 stories', 5000000, 'commercial_pr.jpg', '0776449789', 1, 4, 16, '2014-07-23 09:15:49', 1, 1),
(73, 2, 5, 'House for sale in Gampaha', 'Two flats, 2000 square foot, 5 bed rooms', 7500000, 'house_yakka.jpg', '0776449789', 9, 30, 16, '2014-07-23 09:18:48', 1, 0),
(74, 4, 19, 'Aluminium cooking pots', 'Set of 5 different pans and pots.', 5000, 'banner_1.jpg', '0776449789', 6, 26, 16, '2014-07-23 09:22:55', 0, 0),
(75, 4, 19, 'Spoon and utencil set', 'Good utencils set for every need in the kitchen', 1500, 'Kitchen_Tool_Kitchen_Ware_.jpg', '0776449789', 10, 70, 16, '2014-07-23 09:24:00', 1, 0),
(76, 4, 16, 'American table set', 'Four chairs and a round table ', 25000, 'American-Furniture.jpg', '0776449789', 8, 30, 16, '2014-07-23 09:25:55', 0, 0),
(77, 4, 17, 'Adidas shoes', 'Adidas black shoes with white strips', 7000, '53fa.jpg', '0776449789', 12, 39, 16, '2014-07-23 09:29:50', 0, 0),
(78, 4, 17, 'Women necklace set', 'Colorful necklace set  for parties', 1000, 'nechlase.jpg', '0776449789', 14, 71, 16, '2014-07-23 09:32:17', 1, 0),
(79, 3, 14, 'Toshiba satellite', '15 inch display, 8GB ram, 1 TB hard', 120000, 'toshiba-satellite-pro-l850_800.jpg', '0776449789', 14, 43, 16, '2014-07-23 09:41:13', 0, 0),
(80, 3, 10, 'Samsung galaxy s4', 'Used only for 2 weeks', 45000, 'samsung-galaxy-s5-mwc-2014_610x458.jpg', '0776449789', 17, 47, 16, '2014-07-23 09:42:33', 1, 0),
(81, 3, 12, 'Sony radio system', 'Full bass and surround system', 35000, 'Modern-Radio-2032088.jpg', '0776449789', 16, 46, 16, '2014-07-23 09:44:06', 1, 3),
(82, 3, 13, 'Samsung galaxy note 3', 'Brand new Limited offfers', 65000, 'Samsung_Ativ_Tab_3_tablet.jpg', '0776449789', 20, 63, 16, '2014-07-23 09:45:39', 1, 4),
(84, 0, 0, 'Reject Test 2', 'Reject Test 2', 250, 'Classic_room.jpg', '0776449789', 23, 59, 16, '2014-07-23 09:54:54', 1, 0),
(85, 0, 0, 'Reject Test 3', 'Reject Test 3', 1000, '579_official-simple-office-furniture.jpg', '0776449789', 19, 51, 16, '2014-07-23 10:04:20', 0, 0),
(87, 0, 0, 'Bricks for sale', 'Bricks for sale only large orders. 9 inch bricks.  Price indicated for a piece.', 15, '', '0776449789', 6, 73, 16, '2014-07-23 11:19:00', 0, 0),
(88, 0, 0, 'පරික්ෂා කිරීම සඳහා', 'සිංහල අකුරු පරික්ෂා කිරීම සඳහා', 1000, '', '0776449789', 1, 2, 16, '2014-07-23 11:33:48', 0, 0),
(89, 0, 0, 'Match boxes for sale', 'All types of match boxes for sale. Price indicated for a pack', 100, '', '0776449789', 18, 50, 16, '2014-07-25 19:08:08', 0, 0),
(90, 0, 0, 'Bird for sale', 'Flying bird for sale', 500, 'bird.gif', '0352159753', 4, 69, 16, '2014-08-22 23:01:12', 1, 1),
(91, 0, 0, 'Test', 'Test', 123, '', '0776449789', 1, 1, 16, '2014-08-22 23:44:04', 0, 0),
(92, 0, 0, 'Test', 'Test', 123, '', '0776449789', 1, 1, 16, '2014-08-22 23:44:45', 0, 0),
(93, 0, 0, 'Test', 'Test', 22, '', '0776449789', 1, 1, 16, '2014-08-22 23:45:38', 0, 0),
(103, 0, 0, 'Add aa', 'Add aa', 9500000, 'positive.jpg', '0812111222', 3, 20, 9, '2014-08-24 06:44:22', 1, 4),
(104, 0, 0, 'Add aa', 'Add aa', 9500000, 'positive1.jpg', '0812111222', 3, 18, 9, '2014-08-24 06:59:02', 0, 0),
(106, 0, 0, 'Test', 'Test', 10003, 'hp-M95xx-monitor-500.jpg', '0812111222', 16, 45, 9, '2014-08-24 07:09:33', 1, 1),
(107, 3, 14, 'Laptop for sale', 'Test', 30000, '123.jpg', '0776789456', 6, 26, 16, '2014-08-24 09:38:00', 1, 2),
(109, 1, 3, 'Bus in mathara', 'Bus in mathara', 500000, 'bus3.jpg', '0776449789', 17, 47, 16, '2014-08-24 09:59:28', 0, 4),
(110, 0, 0, 'Metals for sale', 'Metals for sale', 500, 'sdas.jpg', '0223123654', 19, 51, 16, '2014-08-24 10:09:42', 1, 10),
(111, 0, 0, 'Pen', 'High quality product', 1000, 'pen1.jpg', '0776123123', 4, 22, 23, '2014-08-24 09:17:21', 1, 4),
(114, 0, 0, 'dsf', 'dsfd', 33, '3d_sphere-wide.jpg', '0776449789', 2, 3, 16, '2014-08-24 09:49:32', 0, 0),
(116, 0, 0, 'dsf', 'dsfd', 33, 'internet_icon-300x213.png', '0812111222', 1, 1, 9, '2014-08-24 09:55:57', 0, 10),
(117, 0, 0, 'Test edit', 'Test edit', 100, 'pgass.png', '0776449789', 1, 2, 16, '2014-09-12 06:30:23', 1, 1),
(118, 0, 0, 'test 2 edit', 'test 2 edit', 10, 'apple_pphm_e.png', '0776449789', 1, 5, 16, '2014-09-12 06:40:58', 0, 0),
(119, 3, 9, 'Nokia N73', 'Nokia N 73 Good condition', 15000, 'nokia-n73-large.jpg', '0776449789', 1, 5, 16, '2014-09-12 06:58:23', 0, 0),
(120, 0, 0, 'Add aa', 'test', 0, '1231.jpg', '0812111222', 12, 40, 9, '2014-09-12 07:42:38', 0, 0),
(121, 0, 0, 'www', 'eeee', 444, '', '0812111222', 1, 2, 9, '2014-09-12 16:19:04', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `black_list`
--

CREATE TABLE IF NOT EXISTS `black_list` (
  `black_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`black_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `black_list`
--

INSERT INTO `black_list` (`black_list_id`, `email`) VALUES
(2, 'bandara1@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `category_id`, `brand_name`) VALUES
(1, 1, 'Toyota'),
(2, 1, 'Nissan'),
(3, 3, 'Samsung'),
(4, 3, 'Nokia'),
(5, 3, 'Sony'),
(6, 3, 'Apple'),
(7, 1, 'Ford'),
(8, 1, 'BMW'),
(9, 3, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `catogory`
--

CREATE TABLE IF NOT EXISTS `catogory` (
  `catogory_id` int(11) NOT NULL AUTO_INCREMENT,
  `catogory_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`catogory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `catogory`
--

INSERT INTO `catogory` (`catogory_id`, `catogory_name`) VALUES
(0, 'Other'),
(1, 'Vehicle'),
(2, 'Property'),
(3, 'Electronic'),
(4, 'Home and Personal');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `city_name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `location_id`, `city_name`) VALUES
(1, 1, 'Kandy Town'),
(2, 1, 'Peradeniya'),
(3, 2, 'Colombo 1'),
(4, 2, 'Colombo 2'),
(5, 1, 'Gampola'),
(6, 1, 'Kadugannawa'),
(7, 1, 'Pilimathalawa'),
(8, 2, 'Colombo 3'),
(9, 2, 'Colombo 4'),
(10, 2, 'Colombo 5'),
(11, 2, 'Colombo 6'),
(12, 2, 'Malabe'),
(13, 2, 'Kaduwela'),
(14, 2, 'Maharagama'),
(15, 2, 'Avissawella'),
(16, 2, 'Hanwella'),
(17, 2, 'Battaramulla'),
(18, 3, 'Galle City'),
(19, 3, 'Ambalangoda'),
(20, 3, 'Elpitiya'),
(21, 3, 'Hikkaduwa'),
(22, 4, 'Kegalle City'),
(23, 4, 'Mawanella'),
(24, 5, 'Ampara City'),
(25, 5, 'Potuvil'),
(26, 6, 'Anuradhapura city'),
(27, 6, 'Kekirawa'),
(28, 7, 'Badulla City'),
(29, 7, 'Mahiyanganaya'),
(30, 8, 'Batticaloa city'),
(31, 9, 'Gampaha city'),
(32, 9, 'Kadawatha'),
(33, 9, 'Biyagama'),
(34, 9, 'Negambo'),
(35, 9, 'Nittabuwa'),
(36, 10, 'Hambanthota city'),
(37, 10, 'Tangalle'),
(38, 11, 'Jaffna city'),
(39, 12, 'Kalutara city'),
(40, 12, 'Panadura'),
(41, 13, 'Kilinochchi city'),
(42, 14, 'Kurunegala city'),
(43, 14, 'Wariyapola'),
(44, 15, 'Mannar city'),
(45, 16, 'Matale city'),
(46, 16, 'Dambulla'),
(47, 17, 'Matara city'),
(48, 17, 'Deniyaya'),
(49, 18, 'Moneragala city'),
(50, 18, 'Wellawaya'),
(51, 19, 'Mullativu city'),
(52, 20, 'Nuwara Eliya city'),
(53, 20, 'Walapane'),
(54, 20, 'Hatton'),
(55, 21, 'Polonnaruwa city'),
(56, 21, 'Higurakgoda'),
(57, 22, 'Puttlam city'),
(58, 23, 'Ratnapura city'),
(59, 23, 'Balangoda'),
(60, 24, 'Trincomalee city'),
(61, 24, 'Kantale'),
(62, 25, 'Vavuniya city'),
(63, 20, 'Kothmale'),
(64, 1, 'Nawalapitiya'),
(65, 1, 'Dawlagala'),
(66, 9, 'Pasyala'),
(67, 2, 'Colombo 13'),
(68, 7, 'Haliela'),
(69, 4, 'Galigamuwa'),
(70, 10, 'Ambalanthota'),
(71, 14, 'Mawathagama'),
(72, 4, 'Warakapola'),
(73, 6, 'Padaviya'),
(74, 4, 'Ruwanwalla'),
(75, 2, 'Kottawa'),
(76, 10, 'Katuwana'),
(77, 6, 'Thanthirimale'),
(78, 4, 'Bulathkohupitya'),
(79, 1, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `advertisement_id` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`comment_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_Id`, `user_id`, `name`, `advertisement_id`, `comment`, `date`) VALUES
(1, 7, 'Vimal', 1, 'Test 123', '2014-03-21'),
(4, 7, 'Vimal', 1, 'This is a comment again...', '2014-03-21'),
(5, 7, 'Vimal', 2, 'This is a very good phone', '2014-03-21'),
(6, 10, 'Sarath', 4, 'Good poster I need to buy.', '2014-03-21'),
(7, 10, 'Sarath', 4, 'Test 123', '2014-03-21'),
(8, 10, 'Sarath', 4, 'Good one', '2014-03-21'),
(11, 9, 'Sam', 4, 'Very good', '2014-03-21'),
(17, 9, 'Sam', 1, 'this is a comment', '2014-03-24'),
(19, 9, 'Sam', 3, 'It very beautiful', '2014-03-24'),
(20, 7, 'Vimal Silva', 9, 'Nokia Lumia is best', '2014-03-29'),
(21, 9, 'Sam', 9, 'This is by sam', '2014-03-29'),
(25, 9, 'Sam', 2, 'වෙබ් මත ඕනෑම තැනක, ඔබ තෝරන භාෂාවෙන් ටයිප් කිරීම Google ආදාන මෙවලම් වලින් පහසු කරවයි. තවත් දැනගන්න', '2014-05-29'),
(26, 7, 'Vimal Silva', 1, 'This is a comment', '2014-07-04'),
(27, 21, 'randika', 43, 'testing', '2014-07-04'),
(28, 7, 'Vimal Silva', 53, 'Good product', '2014-07-04'),
(29, 16, 'Kanchana', 2, 'මෙය ඉතා හොඳ ජංගම දුරකථනයකි', '2014-07-23'),
(30, 16, 'Kanchana', 49, 'This is a good ad', '2014-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE IF NOT EXISTS `compare` (
  `compare_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad1_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`compare_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `electronicad`
--

CREATE TABLE IF NOT EXISTS `electronicad` (
  `electron_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `electronic_type` varchar(100) DEFAULT NULL,
  `electronic_brand` varchar(50) DEFAULT NULL,
  `electronic_model` varchar(100) NOT NULL,
  `electronic_subcategory` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_date_time` datetime NOT NULL,
  PRIMARY KEY (`electron_ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `electronicad`
--

INSERT INTO `electronicad` (`electron_ad_id`, `electronic_type`, `electronic_brand`, `electronic_model`, `electronic_subcategory`, `user_id`, `post_date_time`) VALUES
(1, 'Test', 'Test', 'Mod 1', '10', 5, '2014-03-17 07:10:11'),
(2, 'Test', 'Test', 'Mod 1', '14', 6, '2014-01-08 07:06:15'),
(4, 'Test', 'Test', 'Mod 1', '9', 4, '2014-03-24 14:21:31'),
(7, 'Phone', 'Nokia', 'Lumia 920', '9', 16, '2014-05-05 03:00:00'),
(8, 'Test', 'Test', 'Mod 1', '10', 10, '2014-05-12 12:25:00'),
(10, 'LED Full HD TV', 'Sony ', 'R452A', '11', 10, '2014-05-25 03:10:54'),
(11, 'Laptop', 'Apple', 'MacBook Air 11-Inch', '14', 18, '2014-07-02 11:16:03'),
(12, 'Phone', 'Apple', 'iphone 6', '10', 18, '2014-07-02 11:18:04'),
(13, 'Phone', 'Apple', 'iphone 5s', '10', 18, '2014-07-02 11:19:42'),
(14, 'Watch', 'Apple', 'iwatch', '9', 20, '2014-07-03 05:34:55'),
(15, 'Phone', 'Apple', 'iphone 5c', '10', 16, '2014-07-03 09:15:50'),
(16, 'I pad', 'Apple', 'ipad mini', '13', 16, '2014-07-03 10:15:23'),
(17, 'Laptop', 'Apple', 'MacBook-Pro-2.53GHz', '14', 16, '2014-07-03 11:22:32'),
(19, 'Computer', 'Sony ', 'sdfd', '9', 9, '2014-07-14 19:10:30'),
(20, 'Laptop', 'Toshiba', 'Satellite pro 850', '14', 16, '2014-07-23 09:41:13'),
(21, 'Phone', 'Samsung', 'Galaxy s4', '10', 16, '2014-07-23 09:42:33'),
(22, 'Radio', 'Sony', 'F230', '12', 16, '2014-07-23 09:44:06'),
(23, 'Tablet', 'Samsung', 'Galaxy Note 3', '13', 16, '2014-07-23 09:45:39'),
(24, 'Laptop', 'Dell', 'M33', '14', 16, '2014-08-24 09:38:00'),
(25, 'Phone', 'Nokia', 'N73', '9', 16, '2014-09-12 06:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `electronicadsubcategory`
--

CREATE TABLE IF NOT EXISTS `electronicadsubcategory` (
  `electronic_subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `electronic_subcategory_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`electronic_subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `electronicadsubcategory`
--

INSERT INTO `electronicadsubcategory` (`electronic_subcategory_id`, `electronic_subcategory_name`) VALUES
(1, 'Computer'),
(2, 'Phone'),
(3, 'TV'),
(4, 'Radio'),
(5, 'Tablet'),
(6, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` varchar(255) NOT NULL,
  `receiver_email_address` varchar(255) NOT NULL,
  `sender_email_address` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `email_name`, `receiver_email_address`, `sender_email_address`, `phone`, `message`) VALUES
(1, 'Kanchana', 'itp2013g7@gmail.com', 'itp2013g7@gmail.com', 776123456, 'Testing email'),
(2, 'Namal', 'test@gmail.com', 'test@gmail.com', 776123489, 'Message 1'),
(3, 'Hello', 'test@gmail.com', 'test@gmail.com', 776138456, 'Testing Hello'),
(4, 'Hira', 'hiranthaathurupana@yahoo.com', 'hiranthaathurupana@yahoo.com', 776125456, 'Hira 123'),
(5, 'Kamal', 'kamal@gmail.com', 'kanchanagsm@hotmail.com', 776123456, 'Sample email'),
(6, 'Sunil', 'sunil@mail.com', 'kanchanagsm@hotmail.com', 711456987, 'Sample email'),
(7, 'Amara', 'amara@mail.com', 'kanchanagsm@hotmail.com', 776123456, 'Hello seller'),
(8, 'Amara', 'amara@mail.com', 'kanchanagsm@hotmail.com', 776123456, 'Hello seller'),
(9, 'Saman', 'saman@gmail.com', 'kanchanagsm@hotmail.com', 557531598, 'Testing email'),
(10, 'Sunimal', 'sunimal@gmail.com', 'kanchanagsm@hotmail.com', 117496315, 'Message 123'),
(11, 'Nimal', 'nimal123@mail.com', 'kanchanagsm@hotmail.com', 751596358, 'Sample message 2'),
(12, 'Gamunu', 'gamunu@ymail.com', 'kanchanagsm@hotmail.com', 251254985, 'Sample message 3'),
(13, 'Kanchana', 'kan@mail.com', 'kanchanagsm@hotmail.com', 789789789, 'Sample email message'),
(14, 'Kanchana', 'kan@mail.com', 'kanchanagsm@hotmail.com', 776123456, 'Sample email 122'),
(15, 'Tisara', 'tisara@mail.com', 'kanchanagsm@hotmail.com', 654753159, 'Another message'),
(16, 'qwe', 'amara@mail.com', 'kanchanagsm@hotmail.com', 776123456, 'Message 456'),
(17, 'Tisara', 'tisara@mail.com', 'kanchanagsm@hotmail.com', 776123456, 'Sample message'),
(18, 'Sunimal', 'sunimal@mail.com', 'kanchanagsm@hotmail.com', 665985362, 'Final email'),
(19, 'Mahen', 'itp2013g7@gmail.com', 'mahen@mail.com', 251254985, 'Message 123'),
(20, 'Kanchana', 'itp2013g7@gmail.com', 'kan@mail.com', 789789789, 'Sample message 2'),
(21, 'Amara', 'itp2013g7@gmail.com', 'amara@mail.com', 117496315, 'Email message'),
(22, 'sarath', 'itp2013g7@gmail.com', 'sarath@mail.com', 891354697, 'Sample message 1'),
(23, 'Kanchana', 'itp2013g7@gmail.com', 'gamunuud@gmail.com', 117496315, 'Test message'),
(24, 'Namal', 'itp2013g7@gmail.com', 'namal@mail.com', 776123456, 'I want to buy this'),
(25, 'Kamal', '0', 'kamal@gmail.com', 117496315, 'Hello'),
(26, 'Kamal', 'itp2013g7@gmail.com', 'kamal@gmail.com', 776123456, 'Hello'),
(27, 'Saman', 'kanchanagsm@hotmail.com', 'saman@gmail.com', 117496315, 'Hello '),
(28, 'Kanchana', 'hathurupana@gmail.com', 'kanchanagamhatha@mail.com', 117496315, 'This is a test email to check SEP Site'),
(29, 'Kanchana', 'itp2013g7@gmail.com', 'kanchanagsm@hotmail.com', 112123456, 'Testing email for SEP'),
(30, 'Kanchana', 'itp2013g7@gmail.com', 'kanchanagsm@hotmail.com', 112123456, 'Testing email for SEP'),
(31, 'Mahinda', 'itp2013g7@gmail.com', 'mahinda@yahoo.com', 757987654, 'This is a great product'),
(32, 'Silva', 'kanchanagsm@hotmail.com', 'silva@mail.com', 251254985, 'Message from Silva'),
(33, 'Hirantha', 'kanchanagamhatha@gmail.com', 'hiranthaathurupana@yahoo.com', 112123321, 'This by hirantha'),
(34, 'Hello', 'kanchanagamhatha@gmail.com', 'kanchanagsm@hotmail.com', 117496315, 'Hello testing Hello testing Hello testing'),
(35, 'Kamal', 'kanchanagsm@hotmail.com', 'itp2013g7@gmail.com', 777888666, 'Hello'),
(36, 'Kamal', 'kanchanagsm@hotmail.com', 'itp2013g7@gmail.com', 812111222, 'Test has sent you this message about your ad "Portable hard Disk ":'),
(37, 'Vimal Silva', 'kanchanagsm@hotmail.com', 'itp2013g7@gmail.com', 812345612, 'Testing Email \r\nTesting Email \r\nTesting Email Testing Email \r\nTesting Email Testing Email \r\nTesting Email \r\nTesting Email '),
(38, 'Sam', 'itp2013g7@gmail.com', 'kanchanagsm@hotmail.com', 812111222, 'Testing call me'),
(39, 'Kamal', 'itp2013g7@gmail.com', 'kanbaa@hotmail.com', 812111222, 'I want to check this product'),
(40, 'Sam Perera', 'itp2013g7@gmail.com', 'vimal@mail.com', 812111222, 'Hello I need to check this'),
(41, 'Kamal', 'itp2013g7@gmail.com', 'kamal@mm.cc', 777888666, 'I want '),
(42, 'Vimal Silva', 'itp2013g7@gmail.com', 'vimal@mail.com', 812111222, 'Big Orange. Big Ideas.'),
(43, 'Vimal Silva', 'itp2013g7@gmail.com', 'vimal@mail.com', 777888666, 'Jon snow WWW'),
(44, 'Vimal Silva', 'itp2013g7@gmail.com', 'vimal@mail.com', 777888666, 'Vimal Silva'),
(45, 'Jon snow', 'itp2013g7@gmail.com', 'vimal@mail.com', 777888666, 'Hey Jon snow WWW here I wanna buy this from you'),
(46, 'Kanchana Gamhatha', 'hiranthaathurupana@yahoo.com', 'kanchanagamhatha@gmail.com', 111123456, 'Hello How are you...'),
(47, 'Johny', 'itp2013g7@gmail.com', 'jonny@gmail.com', 112312312, 'I want to buy this. How can i meet you'),
(48, 'Johny', 'itp2013g7@gmail.com', 'jonny@gmail.com', 112312312, 'Test 123'),
(49, 'Johny', 'itp2013g7@gmail.com', 'jonny@gmail.com', 112312312, 'fsdds dsfdfs'),
(50, 'Johny', 'itp2013g7@gmail.com', 'jonny@gmail.com', 112312312, 'dsfdf'),
(51, 'Johny', 'itp2013g7@gmail.com', 'jonny@gmail.com', 112312312, 'dfdfds'),
(52, 'Johny', 'itp2013g7@gmail.com', 'jonny@gmail.com', 112312312, 'dssssssssssssss'),
(53, 'Vimal Silva', 'hiranthaathurupana@yahoo.com', 'vimal@mail.com', 777888666, 'I want to buy this product'),
(54, 'Kanchana', 'kanchanagamhatha@gmail.com', 'kanchanagamhatha@gmail.com', 776449789, 'hello'),
(55, 'ITP', 'itp2013g7@gmail.com', 'kanchanagamhatha@gmail.com', 777555444, 'I want to buy this'),
(56, 'Ishan', 'itp2013g7@gmail.com', 'kanchanagamhatha@gmail.com', 777555444, 'Test'),
(57, 'Ishan', 'itp2013g7@gmail.com', 'abc@gmail.com', 777555444, 'test'),
(58, 'Ishan', 'itp2013g7@gmail.com', 'abc@gmail.com', 777222222, 'test'),
(59, 'Ishan Perera', 'itp2013g7@gmail.com', 'abc@gmail.com', 777222233, 'Test'),
(60, 'Kanchana', 'itp2013g7@gmail.com', 'est@gmail.com', 776449789, 'hellllllllllllllllllooooooooooooooooooo');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `favorite_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `added_date` date DEFAULT NULL,
  PRIMARY KEY (`favorite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`favorite_id`, `user_id`, `advertisement_id`, `added_date`) VALUES
(11, 10, 1, '2014-03-23'),
(14, 7, 2, '2014-03-28'),
(16, 5, 30, '2014-05-27'),
(19, 9, 23, '2014-06-02'),
(20, 9, 10, '2014-06-21'),
(22, 7, 43, '2014-06-21'),
(25, 9, 3, '2014-06-28'),
(26, 9, 9, '2014-06-28'),
(28, 18, 29, '2014-07-02'),
(29, 18, 23, '2014-07-02'),
(30, 18, 31, '2014-07-02'),
(31, 18, 3, '2014-07-02'),
(33, 18, 1, '2014-07-02'),
(34, 18, 25, '2014-07-02'),
(35, 7, 29, '2014-07-03'),
(37, 7, 46, '2014-07-03'),
(39, 21, 43, '2014-07-04'),
(40, 21, 1, '2014-07-04'),
(43, 20, 52, '2014-07-04'),
(45, 20, 45, '2014-07-05'),
(46, 20, 51, '2014-07-05'),
(48, 9, 52, '2014-07-17'),
(49, 6, 43, '2014-07-23'),
(50, 16, 49, '2014-07-23'),
(51, 16, 43, '2014-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `seller_id`, `user_id`, `feedback`, `comment`, `date`, `time`) VALUES
(1, 16, 9, 0, 'Very good\n', '2014-08-01', ''),
(2, 16, 20, -1, 'Not satisfied with the seller', '2014-07-06', ''),
(3, 16, 10, 1, 'Brilliant seller', '2014-07-07', ''),
(4, 10, 9, 0, 'A moderate seller', '2014-07-10', ''),
(5, 10, 16, 1, 'A fantastic seller', '2014-08-21', ''),
(6, 10, 20, -1, 'Not a trusted seller', '2014-08-18', ''),
(7, 10, 18, 1, 'Best seller', '2014-08-20', ''),
(11, 16, 18, 1, 'Very reliable', '2014-08-21', '23:23:47'),
(12, 5, 16, 1, 'Very good seller', '2014-08-24', '11:15:14'),
(13, 16, 15, 0, 'Good seller', '2014-08-24', '09:39:38'),
(14, 6, 9, 1, 'good', '2014-09-14', '18:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `help_&_support`
--

CREATE TABLE IF NOT EXISTS `help_&_support` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `help_&_support`
--

INSERT INTO `help_&_support` (`faq_id`, `question`, `answer`) VALUES
(1, '1. How do I post an ad?', 'Posting an ad on e-marketing portal is quick, easy and completely free! Simply click the yellow Post Ad button in the upper right-hand corner and follow the instructions. If you are logged in to your '),
(2, '2. How do I delete my ad?', 'To delete an ad, please go to your ad''s page and click the "Delete ad" button at the bottom of the ad.\r\n\r\nIf you have an account, you can also log in and click the "Delete" button on your "My ads" pag'),
(3, '3. How do I edit my ad?', 'To edit an ad, please go to your ad''s page and click the "Edit ad" button at the bottom of the ad.\r\n\r\nIf you have an account, you can also log in and click the "Edit" button on your "My ads" page.'),
(4, '4. How do I set a new password for my ad?', 'If you would like to set a new password, go to your ad and click the "Edit/delete" link at the bottom of the ad. Click on the link that says "Lost your password?" and follow the instructions.\r\n\r\nIf yo'),
(5, '5. How long do ads stay on  e-marketing portal?', 'Ads appear for 90 days, unless you manually delete them.'),
(6, '6. I posted an ad but can''t find it. What’s wrong?', 'All ads are reviewed against fraud and spam so it can take up to 1 hour before an ad is published on the site. If you still can''t find your ad after 1 hour, it may have violated our posting rules. If '),
(7, '7. Why has my ad been rejected?', 'All of the ads are manually reviewed - if your ad violates our posting rules it will be rejected. You can read what changes you have to make before the ad can be approved in the rejection email.'),
(8, '8. I''m getting contacted about an ad I didn''t post. Can you help me?', 'Of course. Please contact us and we will help you right away.'),
(9, '9. I haven''t received any responses to my ad. What''s wrong?', 'It is strongly recommended that you write a good title and detailed description, and use clear original images in your ad. Take a look at our tips on how to sell fast.\r\n\r\nClick here to get help on how'),
(10, '10. How does this site make money?', 'The basic service of selling and buying will always be free on ikman.lk. However, we are now starting to add advertising to the site, as well as paid features.');

-- --------------------------------------------------------

--
-- Table structure for table `homeandpersonalad`
--

CREATE TABLE IF NOT EXISTS `homeandpersonalad` (
  `home_personal_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_personal_type` varchar(100) DEFAULT NULL,
  `home_personal_subcategory` varchar(100) DEFAULT NULL,
  `sale_or_want` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`home_personal_ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `homeandpersonalad`
--

INSERT INTO `homeandpersonalad` (`home_personal_ad_id`, `home_personal_type`, `home_personal_subcategory`, `sale_or_want`, `user_id`, `post_date_time`) VALUES
(1, 'T-Shirts', '18', '0', 9, '2014-05-21 12:18:29'),
(2, 'Potser', '17', '0', 7, '2014-04-13 16:22:09'),
(4, 'Watch', '17', '0', 10, '2014-05-25 03:18:44'),
(5, 'Food', '19', '0', 7, '2014-07-03 04:57:19'),
(7, 'Plants', '15', '0', 20, '2014-07-03 12:07:56'),
(9, 'Cooking Pots', '19', '0', 16, '2014-07-23 09:22:55'),
(10, 'Utencils', '19', '0', 16, '2014-07-23 09:24:00'),
(11, 'Table set', '16', '0', 16, '2014-07-23 09:25:55'),
(12, 'Shoes', '17', '0', 16, '2014-07-23 09:29:50'),
(13, 'Jewelry ', '17', '0', 16, '2014-07-23 09:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `homeandpersonaladsubcategory`
--

CREATE TABLE IF NOT EXISTS `homeandpersonaladsubcategory` (
  `home_personal_subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_personal_subcategory_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`home_personal_subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `homeandpersonaladsubcategory`
--

INSERT INTO `homeandpersonaladsubcategory` (`home_personal_subcategory_id`, `home_personal_subcategory_name`) VALUES
(1, 'Home & Garden'),
(2, 'Furniture'),
(3, 'Footwear & Accessories'),
(4, 'Clothes'),
(5, 'Kitchenware');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(50) DEFAULT NULL,
  `advertisment_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_name`, `advertisment_id`) VALUES
(1, 'nechlase.jpg', 103),
(2, 'banner_1.jpg', 103),
(3, '', 106),
(4, 'toyota_lorry.jpg', 106),
(5, 'hp-M95xx-monitor-500.jpg', 107),
(6, 'bus3.jpg', 108),
(7, 'bus2.jpg', 109),
(8, 'tata-bus-2005.jpg', 109),
(9, 'ee.jpg', 110),
(10, 'ef.jpg', 110),
(11, 'qwe.jpg', 110),
(12, 'zx.jpg', 110),
(13, 'CR-book-edit.jpg', 116),
(14, '$_57.JPG', 116),
(15, '2014_how_to_train_your_dragon_2-wide.jpg', 116),
(16, '2876194_orig.jpg', 116),
(17, '', 118),
(18, 'C:\\fakepath\\ja nama.png', 118),
(19, 'C:\\fakepath\\1344283199_424799942_3-Sony-Xperia-S-1', 118),
(20, 'asus_notebook_4yz.jpg', 120);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `keyword` varchar(50) DEFAULT NULL,
  `keyword_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keyword`, `keyword_count`) VALUES
('honda', 13),
('hybrid', 4),
('apple', 1),
('apple mac', 1),
('apple mac book', 1),
('apple i phone', 1),
('apple iphone', 4),
('', 16),
('a', 1),
('matc', 7),
('Test', 3);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'Kandy'),
(2, 'Colombo'),
(3, 'Galle'),
(4, 'Kegalle'),
(5, 'Ampara'),
(6, 'Anuradhapura'),
(7, 'Badulla'),
(8, 'Batticaloa'),
(9, 'Gampaha'),
(10, 'Hambantota'),
(11, 'Jaffna'),
(12, 'Kalutara'),
(13, 'Kilinochchi'),
(14, 'Kurunegala'),
(15, 'Mannar'),
(16, 'Matale'),
(17, 'Matara'),
(18, 'Moneragala'),
(19, 'Mullaitivu'),
(20, 'Nuwara Eliya'),
(21, 'Polonnaruwa'),
(22, 'Puttalam'),
(23, 'Ratnapura'),
(24, 'Trincomalee'),
(25, 'Vavuniya');

-- --------------------------------------------------------

--
-- Table structure for table `propertyad`
--

CREATE TABLE IF NOT EXISTS `propertyad` (
  `property_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_address` varchar(100) DEFAULT NULL,
  `property_subcategory` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`property_ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `propertyad`
--

INSERT INTO `propertyad` (`property_ad_id`, `property_address`, `property_subcategory`, `user_id`, `post_date_time`) VALUES
(1, ' No 23, Beach road, Galle', '8', 9, '2014-05-22 10:07:11'),
(2, 'No 33, Main Rd, Kandy', '7', 10, '2014-05-25 03:15:06'),
(5, 'No 33, Main Rd, Pilimathalawa', '6', 16, '2014-07-23 09:15:49'),
(6, 'No 33, Yakkala Rd, Gampaha', '5', 16, '2014-07-23 09:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `propertyadsubcategory`
--

CREATE TABLE IF NOT EXISTS `propertyadsubcategory` (
  `property_subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_subcategory_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`property_subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `propertyadsubcategory`
--

INSERT INTO `propertyadsubcategory` (`property_subcategory_id`, `property_subcategory_name`) VALUES
(1, 'Houses'),
(2, 'Commercial Property'),
(3, 'Apartments'),
(4, 'Land');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `rate_Id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `rate_amount` int(11) NOT NULL,
  PRIMARY KEY (`rate_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_Id`, `seller_Id`, `user_Id`, `rate_amount`) VALUES
(1, 6, 10, 5),
(2, 6, 9, 10),
(3, 7, 9, 7),
(6, 7, 10, 8),
(7, 4, 10, 3),
(8, 10, 9, 9),
(9, 7, 21, 6),
(10, 16, 7, 2),
(11, 16, 9, 4),
(12, 4, 16, 18);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_Id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_Id` int(11) NOT NULL,
  `current_rate` double NOT NULL,
  PRIMARY KEY (`rating_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_Id`, `seller_Id`, `current_rate`) VALUES
(13, 6, 2),
(14, 4, 2.8),
(15, 7, 2.5),
(16, 10, 1.8),
(17, 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE IF NOT EXISTS `registered_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `location_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`user_id`, `name`, `phone`, `password`, `email`, `type`, `location_id`, `city_id`, `admin`) VALUES
(1, 'Sunimal', '0777123456', '7812e8b74f6837fba66f86fe86688a2b', 'sunimal@gmail.com', 1, 0, 0, 0),
(2, 'Namal', '0712123456', '96a6f60d3fa04a6f2ed07dc5aa6445af', 'namal.a@mail.com', 1, 0, 0, 0),
(3, 'Kumara', '0776123456', '81dc9bdb52d04dc20036dbd8313ed055', 'kumara@gmail.com', 1, 4, 0, 0),
(4, 'Saman123', '0111333444', 'fd2cc6c54239c40495a0d3a93b6380eb', 'hathurupana@gmail.com', 2, 2, 0, 0),
(5, 'Kanchana Perera', '0777888999', '02c425157ecd32f259548b33402ff6d3', 'kanchanagsm@hotmail.com', 1, 2, 0, 0),
(6, 'Johny', '0112312312', 'b59c67bf196a4758191e42f76670ceba', 'jonny@gmail.com', 2, 3, 21, 0),
(7, 'Vimal Silva', '0777888633', 'b59c67bf196a4758191e42f76670ceba', 'vimal@mail.com', 2, 2, 12, 0),
(9, 'Sam Perera', '0812111222', 'b59c67bf196a4758191e42f76670ceba', 'sam@mail.com', 1, 1, 2, 0),
(10, 'Sarath', '0812345612', 'b59c67bf196a4758191e42f76670ceba', 'sarath@mail.com', 2, 1, 1, 0),
(15, 'roshan', NULL, 'bc4327fb6eaffa935f554bec4d7635e9', 'roshan@gmail.com', 1, 0, 0, 0),
(16, 'Kanchana', '0776449789', 'b59c67bf196a4758191e42f76670ceba', 'itp2013g7@gmail.com', 2, 1, 5, 0),
(18, 'Namal', '0112456789', 'b59c67bf196a4758191e42f76670ceba', 'namal@mail.com', 1, 2, 12, 0),
(20, 'Ishan Perera', '0777222233', 'b59c67bf196a4758191e42f76670ceba', 'abc@gmail.com', 1, 1, 5, 0),
(21, 'randika', NULL, 'fd2cc6c54239c40495a0d3a93b6380eb', 'onlinerandika@gmail.com', 1, 0, 0, 0),
(22, 'a1', NULL, 'b59c67bf196a4758191e42f76670ceba', 'a1', 1, 0, 0, 1),
(23, 'Malaka', NULL, 'b59c67bf196a4758191e42f76670ceba', 'hiranthaathurupana@yahoo.com', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `advertisement_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `bookmark_flag` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `advertisement_id`, `reason`, `email`, `message`, `bookmark_flag`) VALUES
(1, 1, 'Fraud', 'sam@mail.com', 'This is a fraud ad', 'N'),
(3, 4, 'Duplicate', 'sam@mail.com', 'This item is duplicated in site', 'N'),
(4, 26, 'Wrong category', 'sam@mail.com', 'This is not in correct category', 'N'),
(6, 28, 'Duplicate', 'sam@mail.com', 'Report duplication', 'N'),
(7, 2, 'Offensive', 'kanchanagsm@hotmail.com', 'This ad is offensve', 'N'),
(8, 1, 'Duplicate', 'sam@mail.com', 'This is a duplicate', 'N'),
(9, 1, 'Spam', 'sam@mail.com', 'It is spam ....!!!!!!!!!!!', 'N'),
(10, 1, 'Fraud', 'sam@mail.com', 'It is a fraud ad', 'N'),
(11, 53, 'Spam', 'vimal@mail.com', 'This is a spam\r\n', 'N'),
(12, 53, 'Duplicate', 'abc@gmail.com', 'This is a test', 'N'),
(13, 111, 'Other', 'sam@mail.com', 'Wrong product', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_text` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`rule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rule_id`, `rule_text`) VALUES
(3, 'Text1'),
(4, 'Sampletext'),
(5, 'Testing 3');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(1, 1, 'Car'),
(2, 1, 'Van'),
(3, 1, 'Bus'),
(4, 1, 'Lorry'),
(5, 2, 'Houses'),
(6, 2, 'Commercial Property'),
(7, 2, 'Apartments'),
(8, 2, 'Land'),
(9, 3, 'Computer'),
(10, 3, 'Phone'),
(11, 3, 'Television'),
(12, 3, 'Radio'),
(13, 3, 'Tablet'),
(14, 3, 'Laptop'),
(15, 4, 'Home & Garden'),
(16, 4, 'Furniture'),
(17, 4, 'Footwear & Accessories'),
(18, 4, 'Clothes'),
(19, 4, 'Kitchenware'),
(20, 1, 'Bicycle'),
(21, 4, 'Tools and utencils'),
(22, 1, 'Three Wheel'),
(23, 2, 'Agricultural Land');

-- --------------------------------------------------------

--
-- Table structure for table `unregistered_user`
--

CREATE TABLE IF NOT EXISTS `unregistered_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `location_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `string` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclead`
--

CREATE TABLE IF NOT EXISTS `vehiclead` (
  `vehicle_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(100) DEFAULT NULL,
  `vehicle_brand` varchar(50) DEFAULT NULL,
  `vehicle_model` varchar(100) DEFAULT NULL,
  `vehicle_manufacture_year` int(11) DEFAULT NULL,
  `vehicle_transmission` varchar(50) DEFAULT NULL,
  `vehicle_milage` float DEFAULT NULL,
  `vehicle_engine` varchar(100) DEFAULT NULL,
  `vehicle_subcategory` varchar(100) DEFAULT NULL,
  `vehicle_condition` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`vehicle_ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `vehiclead`
--

INSERT INTO `vehiclead` (`vehicle_ad_id`, `vehicle_type`, `vehicle_brand`, `vehicle_model`, `vehicle_manufacture_year`, `vehicle_transmission`, `vehicle_milage`, `vehicle_engine`, `vehicle_subcategory`, `vehicle_condition`, `user_id`, `post_date_time`) VALUES
(2, 'Sedan', 'BMW', 'S 2011', 2011, 'Auto gear', 10000, '1500', '1', 'Best', 9, '2014-05-22 09:59:03'),
(3, 'SUV', 'Lamborghini', 'L3000', 2012, 'Auto gear', 0, '5000', '1', 'Brand new', 9, '2014-05-23 02:26:10'),
(4, 'SUV', 'Honda', 'FIT ', 2012, 'Manual', 12000, '1500 ', '1', 'Good', 10, '2014-05-25 03:05:24'),
(5, 'Van', 'Toyota', 'Hiace ', 2009, 'Manual', 5222, '500', '2', 'Good', 9, '2014-05-26 17:42:13'),
(6, 'Double door bus', 'Tata', '1512', 1995, 'Manual', 25000, '1500', '1', 'Good', 9, '2014-05-26 17:43:59'),
(7, 'Lorry', 'Isuzu', 'L300', 2001, 'Manual', 15000, '6000', '4', 'Good', 7, '2014-05-27 01:11:58'),
(8, 'SUV', 'Honda', 'FIT ', 2012, 'Manual', 12000, '5000', '1', 'Good', 7, '2014-06-18 08:45:24'),
(9, 'Van', 'Nissan', 'Vanette', 2000, 'Manual', 25000, '500', '2', 'Good', 16, '2014-07-23 09:05:10'),
(10, 'Bus', 'Volvo', 'S 500', 2009, 'Manual', 12000, '5000', '3', 'Good', 16, '2014-07-23 09:07:48'),
(11, 'Lorry', 'Toyota', 'LY Series (Facelift)', 2001, 'Auto gear', 0, '1500 ', '4', 'Brand new', 16, '2014-07-23 09:12:02'),
(12, 'Bus', 'Tata', 'D456', 2010, 'Auto gear', 1500, '1200', '3', 'Used', 16, '2014-08-24 09:48:47'),
(13, 'Bus', 'Tata', 'D456', 2010, 'Auto gear', 1500, '5000', '3', 'Used', 16, '2014-08-24 09:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleadsubcategory`
--

CREATE TABLE IF NOT EXISTS `vehicleadsubcategory` (
  `vehicle_subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_subcategory_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`vehicle_subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vehicleadsubcategory`
--

INSERT INTO `vehicleadsubcategory` (`vehicle_subcategory_id`, `vehicle_subcategory_name`) VALUES
(1, 'Car'),
(2, 'Van'),
(3, 'Bus'),
(4, 'Lorry'),
(5, 'Three Wheel'),
(6, 'Motor Bicycle');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
