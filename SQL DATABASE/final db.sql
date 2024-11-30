-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 07:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_rooms`
--

CREATE TABLE `add_rooms` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_description` text DEFAULT NULL,
  `room_price` float(11,2) NOT NULL,
  `room_image_url` varchar(255) DEFAULT NULL,
  `room_facilities` text DEFAULT NULL,
  `booking_quantity` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_rooms`
--

INSERT INTO `add_rooms` (`room_id`, `room_type`, `room_description`, `room_price`, `room_image_url`, `room_facilities`, `booking_quantity`, `available`, `created_at`) VALUES
(1, 'Delux Room', 'Best Room', 2000.00, '    Images/Room PNGs/delux hotel room.jpg', 'Wifi, TV, Balcony', 1, 1, '2023-04-01 02:53:18'),
(2, 'Standard Room', 'Affordable Room ', 3000.00, ' Images/Room PNGs/standard hotel room.jpg', 'wifi, tv, sofa, hall', 1, 0, '2023-03-29 20:08:03'),
(3, 'Executive Room', 'Best For Office Work', 3000.00, ' Images/Room PNGs/executive hotel room.jpg', 'work desk, ac, balcony', 1, 1, '2023-03-30 04:45:19'),
(4, 'Non-AC Room', 'A Middle Class Vibe', 2000.00, ' Images/Room PNGs/nonac hotel room.jpg', 'WiFi, Fan, Hall', 1, 1, '2023-03-30 18:04:08'),
(5, 'Family Rooms', 'Best Room For Families ', 5200.00, '   Images/Room PNGs/family hotel room.jpg', 'WiFi, Double Bed, Kitchen,Hall', 1, 1, '2023-04-01 07:59:21'),
(6, 'Suite', 'The Diamond Of Hotel', 7800.00, ' Images/Room PNGs/suite hotel room.jpg', 'double bed, baloney, wifi, ac, hall', 1, 1, '2023-04-01 07:40:03'),
(7, 'Accessible Room', 'Disable Friendly', 5300.00, ' Images/Room PNGs/accessible hotel room.jpg', 'fully automated, wifi, wheelchair ', 1, 1, '2023-04-01 10:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` text NOT NULL,
  `submitted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `room_id`, `rating`, `comment`, `submitted_at`) VALUES
(4, 5, 4, 'Best For Families ', '2023-03-31 08:15:23'),
(6, 1, 3, 'nice room', '2023-04-01 08:34:58'),
(7, 1, 1, 'Bad Experience ', '2023-04-01 09:31:49'),
(8, 3, 3, 'Best For Corporate Employees ', '2023-04-01 12:45:04'),
(11, 1, 4, 'Nice Room But Dislike The Wi-Fi Speed', '2023-04-01 15:03:05'),
(12, 7, 4, 'Auto Mated Room', '2023-04-05 09:09:55'),
(14, 5, 4, 'Awesome ', '2023-04-07 05:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `available_quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `product_name`, `category`, `price`, `description`, `image_url`, `available_quantity`) VALUES
(11, 'Pizza', 'Fast Food', '200.00', 'Peri Peri Pizza', 'Images/Food PNGs/pizza.jpg', 0),
(12, 'Sandwich', 'Snack', '100.00', 'Delicious 😋 ', 'Images/Food PNGs/sandwich.jpg', 0),
(13, 'Burger', 'Fast Food', '300.00', 'Big Burger', 'Images/Food PNGs/burger.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `room_id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`room_id`, `customer_name`, `date`, `room_type`, `start_date`, `end_date`, `price`) VALUES
(1, 'Blackarch', '2023-03-23', 'AC', '2023-03-31', '2023-04-06', '18000.00'),
(2, 'Blackarch', '2023-03-23', 'AC', '2023-03-31', '2023-04-06', '18000.00'),
(3, 'Blackarch', '2023-03-23', 'AC', '2023-03-31', '2023-04-06', '18000.00'),
(4, 'Mohib', '2023-03-26', 'Executive Room', '2023-03-25', '2023-03-30', '10000.00'),
(5, 'Blackarch', '2023-03-26', 'Executive Room', '2023-03-26', '2023-03-28', '4000.00'),
(6, 'Blackarch', '2023-03-26', 'Executive Room', '2023-03-26', '2023-03-28', '4000.00'),
(7, 'Blackarch', '2023-03-26', 'Executive Room', '2023-03-26', '2023-03-28', '4000.00'),
(8, 'Blackarch', '2023-03-26', 'Executive Room', '2023-03-26', '2023-03-28', '4000.00'),
(9, 'Blackarch', '2023-03-26', 'Executive Room', '2023-03-26', '2023-03-28', '4000.00'),
(10, 'Blackarch', '2023-03-26', 'Executive Room', '2023-03-26', '2023-03-28', '4000.00'),
(11, 'Blackarch', '2023-03-26', 'Executive Room', '2023-03-26', '2023-03-28', '4000.00'),
(12, 'Blackarch', '2023-03-29', 'Delux Room', '2023-03-30', '2023-04-01', '4000.00'),
(13, 'Blackarch', '2023-03-29', 'Delux Room', '2023-03-30', '2023-04-01', '4000.00'),
(14, 'Blackarch', '2023-03-29', 'Delux Room', '2023-04-06', '2023-04-08', '4000.00'),
(15, 'Blackarch', '2023-03-30', 'Standard Room', '2023-03-30', '2023-03-31', '3000.00'),
(16, 'Blackarch', '2023-03-30', 'Delux Room', '2023-03-30', '2023-04-07', '16000.00'),
(17, 'Mohib', '2023-04-01', 'Delux Room', '2023-03-30', '2023-04-07', '16000.00'),
(18, 'Mohib', '2023-04-01', 'Standard Room', '2023-04-01', '2023-04-11', '30000.00'),
(19, 'Blackarch', '2023-04-01', 'Family Room', '2023-04-26', '2023-04-28', '10600.00'),
(20, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(21, 'Mohib', '2023-04-01', 'Standard Room', '2023-04-01', '2023-04-11', '30000.00'),
(22, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(23, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(24, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(25, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(26, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(27, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(28, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(29, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(30, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(31, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(32, 'Mohib', '2023-04-01', 'Non-AC Room', '2023-04-01', '2023-04-19', '36000.00'),
(33, 'user', '2023-04-06', 'Suite', '2023-04-07', '2030-06-11', '20451600.00'),
(34, 'user', '2023-04-06', 'Standard Room', '2023-04-07', '2023-04-21', '42000.00'),
(35, 'test', '2023-04-06', 'Executive Room', '2023-04-07', '2023-04-15', '24000.00'),
(36, 'user', '2023-04-07', 'Family Rooms', '2023-04-08', '2023-04-10', '10400.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_food`
--

CREATE TABLE `invoice_food` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_food`
--

INSERT INTO `invoice_food` (`id`, `customer_name`, `date`, `product_name`, `item_quantity`, `item_price`, `total_price`) VALUES
(1, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(2, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(3, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(4, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(5, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(6, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(7, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(8, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(9, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(10, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(11, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(12, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(13, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(14, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(15, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(16, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(17, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(18, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(19, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(20, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(21, '', '2023-03-23', 'Dosa', 1, '100.00', '100.00'),
(22, '', '2023-03-26', '', 0, '0.00', '0.00'),
(23, '', '2023-03-26', '', 0, '0.00', '0.00'),
(24, 'AR Shaikh', '2023-03-26', 'Pizza', 1, '200.00', '200.00'),
(25, 'AR Shaikh', '2023-03-26', 'Pizza', 1, '200.00', '200.00'),
(26, 'AR Shaikh', '2023-03-26', 'Pizza', 1, '200.00', '200.00'),
(27, 'AR Shaikh', '2023-03-30', 'Wrap', 1, '200.00', '200.00'),
(28, 'Abdul Rahim Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(29, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(30, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(31, 'AR Shaikh', '2023-04-01', 'Pizza', 1, '100.00', '100.00'),
(32, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(33, 'AR Shaikh', '2023-04-01', 'Pizza', 1, '100.00', '100.00'),
(34, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(35, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(36, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(37, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(38, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(39, 'AR Shaikh', '2023-04-01', 'Pizza', 1, '100.00', '100.00'),
(40, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(41, 'AR Shaikh', '2023-04-01', 'Dosa', 10, '200.00', '2000.00'),
(42, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(43, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(44, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(45, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(46, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(47, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(48, 'AR Shaikh', '2023-04-01', 'Dosa', 10, '200.00', '2000.00'),
(49, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(50, 'AR Shaikh', '2023-04-01', 'Pizza', 1, '100.00', '100.00'),
(51, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(52, 'AR Shaikh', '2023-04-01', 'Dosa', 1, '200.00', '200.00'),
(53, 'AR Shaikh', '2023-04-01', 'Pizza', 1, '100.00', '100.00'),
(54, 'test', '2023-04-06', 'Pizza', 1, '200.00', '200.00'),
(55, 'test', '2023-04-06', 'Sandwich', 2, '100.00', '200.00'),
(56, 'test', '2023-04-06', 'Sandwich', 3, '100.00', '300.00'),
(57, 'user', '2023-04-07', 'Pizza', 1, '200.00', '200.00'),
(58, 'user', '2023-04-07', 'Burger', 2, '300.00', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_`
--

INSERT INTO `order_` (`order_id`, `name`, `address`, `contact`, `total_price`, `order_date`) VALUES
(18, 'AR Shaikh', 'Navsari', '8849393518', '200.00', '2023-03-26 09:19:50'),
(19, 'AR Shaikh', 'fdhbehb', '9106775722', '250.00', '2023-03-26 09:52:30'),
(20, 'AR Shaikh', 'fdhbehb', '8849393518', '200.00', '2023-03-26 10:33:00'),
(21, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 01:19:21'),
(22, 'AR Shaikh', 'Room No. 2', '8849393518', '400.00', '2023-03-30 01:25:29'),
(23, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 01:30:53'),
(24, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 01:31:46'),
(25, 'AR Shaikh', 'Room No. 2', '9106775722', '0.00', '2023-03-30 01:33:41'),
(26, 'AR Shaikh', 'Room No. 2', '9106775722', '0.00', '2023-03-30 01:33:44'),
(27, 'AR Shaikh', 'Room No. 2', '9106775722', '0.00', '2023-03-30 01:33:46'),
(28, 'AR Shaikh', 'Room No. 2', '9106775722', '0.00', '2023-03-30 01:41:32'),
(29, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 01:42:12'),
(30, 'AR Shaikh', 'Room No. 2', '8849393518', '200.00', '2023-03-30 01:45:59'),
(31, 'AR Shaikh', 'Room No. 2', '8849393518', '200.00', '2023-03-30 01:48:57'),
(32, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 01:54:40'),
(33, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 01:56:29'),
(34, 'AR Shaikh', 'Room No. 2', '9106775722', '0.00', '2023-03-30 01:56:45'),
(35, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 01:57:18'),
(36, 'AR Shaikh', 'Room No. 2', '9106775722', '0.00', '2023-03-30 01:58:52'),
(37, 'Abdul Rahim Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-03-30 04:43:11'),
(38, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-04-01 02:52:19'),
(39, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-04-01 03:15:52'),
(40, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-04-01 03:25:55'),
(41, 'Abdul Rahim Shaikh', 'Room No. 2', '8849393518', '200.00', '2023-04-01 03:33:40'),
(42, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-04-01 07:15:38'),
(43, 'Abdul Rahim Shaikh', 'Room No. 3', '9106775722', '600.00', '2023-04-01 07:52:28'),
(44, 'AR Shaikh', 'Room No. 2', '8849393518', '400.00', '2023-04-01 07:53:42'),
(45, 'AR Shaikh', 'Room No. 2', '8849393518', '400.00', '2023-04-01 07:54:23'),
(46, 'AR Shaikh', 'Room No. 2', '9106775722', '700.00', '2023-04-01 09:03:04'),
(47, 'AR Shaikh', 'Room No. 2', '9106775722', '300.00', '2023-04-01 09:05:45'),
(48, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-04-01 09:06:26'),
(49, 'AR Shaikh', 'Room No. 2', '9106775722', '300.00', '2023-04-01 09:07:34'),
(50, 'AR Shaikh', 'Room No. 2', '9106775722', '200.00', '2023-04-01 09:13:16'),
(51, 'AR Shaikh', 'Room No. 2', '8849393518', '2000.00', '2023-04-01 09:13:58'),
(52, 'AR Shaikh', 'Room No. 2', '9106775722', '300.00', '2023-04-01 10:04:29'),
(53, 'AR Shaikh', 'Room No. 2', '9106775722', '100.00', '2023-04-04 17:24:05'),
(54, 'AR Shaikh', 'Room No. 2', '9106775722', '100.00', '2023-04-04 17:40:41'),
(55, 'Mohib', 'Room No 1', '9979263220', '100.00', '2023-04-05 08:28:05'),
(56, 'test', 'Room No. 2', '123456789', '400.00', '2023-04-06 16:23:38'),
(57, 'test', 'Room No. 2', '123456789', '300.00', '2023-04-06 16:24:45'),
(58, 'test', 'Room No. 2', '123456789', '300.00', '2023-04-06 16:25:19'),
(59, 'AR Shaikh', 'Room No. 2', '1234567899', '300.00', '2023-04-06 16:26:39'),
(60, 'user', 'Room No 5', '9876543210', '800.00', '2023-04-06 23:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` varchar(65) NOT NULL,
  `pay_name` varchar(255) NOT NULL,
  `pay_phone` varchar(255) NOT NULL,
  `pay_amount` decimal(10,2) NOT NULL,
  `payment_reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `pay_name`, `pay_phone`, `pay_amount`, `payment_reason`, `created_at`) VALUES
('aq170', 'AR Shaikh', '9106775722', '300.00', 'Food Ordering', '2023-03-26 09:20:03'),
('aq263', 'Mohib', '9106775722', '300.00', 'Food Ordering', '2023-03-26 09:52:40'),
('aq377', 'Mohib', '8160430948', '1.00', 'Room Book', '2023-04-05 05:35:59'),
('aq438', 'AR Shaikh', '9106775722', '1.00', 'Food Order', '2023-04-01 03:16:28'),
('aq561', 'AR Shaikh', '9106775722', '300.00', 'Food Ordering', '2023-03-26 10:33:09'),
('aq569', 'Mohib', '9106775722', '1.00', 'Food Ordering', '2023-03-30 04:43:27'),
('aq584', 'AR Shaikh', '9106775722', '300.00', 'Room Book', '2023-03-26 10:33:54'),
('aq620', 'AR Shaikh', '9106775722', '1.00', 'Room Book', '2023-04-01 03:33:53'),
('aq650', 'AR Shaikh', '9106775722', '300.00', 'Food Ordering', '2023-03-26 08:33:31'),
('aq652', 'AR Shaikh', '9106775722', '200.00', 'Food Ordering', '2023-03-26 08:35:28'),
('aq707', 'AR Shaikh', '9106775722', '1.00', 'Room Book', '2023-04-01 07:20:18'),
('aq720', 'AR Shaikh', '9106775722', '1.00', 'Room Book10000', '2023-04-01 04:00:11'),
('aq797', 'AR Shaikh', '9106775722', '1.00', 'Room Book', '2023-04-01 03:56:37'),
('aq812', 'AR Shaikh', '9106775722', '1.00', 'Food Ordering', '2023-04-01 07:15:58'),
('aq813', 'AR Shaikh', '9106775722', '1.00', 'Food Ordering', '2023-04-01 03:26:14'),
('aq828', 'Mohib', '8160430948', '1.00', 'Room Book', '2023-04-05 08:22:08'),
('aq925', 'AR Shaikh', '9106775722', '100.00', 'Food Ordering', '2023-04-04 17:41:18'),
('aq978', 'AR Shaikh', '9106775722', '200.00', 'Food Ordering', '2023-03-26 08:52:19'),
('aq993', 'AR Shaikh', '9106775722', '1.00', 'Room Book', '2023-04-01 07:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`booking_id`, `room_id`, `customer_name`, `customer_email`, `room_type`, `start_date`, `end_date`, `price`) VALUES
(80, 0, 'user', '', 'Standard Room', '2023-04-07', '2023-04-21', '3000.00'),
(56, 0, 'Blackarch', '', 'Family Room', '2023-04-26', '2023-04-28', '5300.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `reset_token`) VALUES
(8, 'customer1', '123456', 'shaikhar287@gmail.com', NULL),
(7, 'cutomer 1', '1234', 'shaikhar287@gmail.com', NULL),
(5, 'user', 'user@1234', 'shaikhar287@gmail.com', NULL),
(6, 'Mohib', 'mohib', 'mohibshaikh1001@gmail.com', NULL),
(9, 'test', 'test123', 'blackarchedit@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_rooms`
--
ALTER TABLE `add_rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `invoice_food`
--
ALTER TABLE `invoice_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD UNIQUE KEY `idx_pay_id` (`pay_id`),
  ADD UNIQUE KEY `pay_id` (`pay_id`),
  ADD UNIQUE KEY `pay_id_2` (`pay_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_rooms`
--
ALTER TABLE `add_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `room_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `invoice_food`
--
ALTER TABLE `invoice_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `add_rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
