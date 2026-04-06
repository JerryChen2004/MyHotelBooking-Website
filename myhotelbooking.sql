-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 05:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhotelbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_password`) VALUES
(1, 'hoteladmin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user`, `room`, `checkin`, `checkout`, `status`) VALUES
(22, 'jerry', 'Marriott Room 3', '2025-04-08', '2025-04-17', 'Not Check In'),
(24, 'jerry', 'Four Seasons Room 2', '2025-04-30', '2025-05-03', 'Not Check In');

-- --------------------------------------------------------

--
-- Table structure for table `bookingcheckout`
--

CREATE TABLE `bookingcheckout` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `checkouton` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingcheckout`
--

INSERT INTO `bookingcheckout` (`id`, `user`, `room`, `checkin`, `checkout`, `checkouton`) VALUES
(6, 'jenny', 'Marriott Room 1', '2025-04-05', '2025-04-16', '2025-04-04'),
(7, 'jerry', 'Marriott Room 1', '2025-04-05', '2025-04-15', '2025-04-04'),
(8, 'jerry', 'Marriott Room 2', '2025-04-05', '2025-04-08', '2025-04-04'),
(17, 'John', 'Marriott Room 3', '2025-04-06', '2025-04-07', '2025-04-05'),
(18, 'John', 'Four Seasons Room 1', '2025-04-06', '2025-04-08', '2025-04-05'),
(23, 'jen', 'Marriott Room 1', '2025-04-08', '2025-04-11', '2025-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `cancelbooking`
--

CREATE TABLE `cancelbooking` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `cancelledon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancelbooking`
--

INSERT INTO `cancelbooking` (`id`, `user`, `room`, `checkin`, `checkout`, `cancelledon`) VALUES
(1, 'jerry', 'Marriott Room 1', '2025-04-04', '2025-04-06', '2025-04-04'),
(2, 'jerry', 'Hilton Room 1', '2025-04-04', '2025-04-06', '2025-04-04'),
(3, 'jenny', 'Hilton Room 1', '2025-04-05', '2025-04-07', '2025-04-04'),
(4, 'jenny', 'Marriott Room 1', '2025-04-05', '2025-04-08', '2025-04-04'),
(5, 'jenny', 'Marriott Room 1', '2025-04-18', '2025-04-29', '2025-04-04'),
(9, 'jenny', 'Marriott Room 1', '2025-04-05', '2025-04-15', '2025-04-04'),
(10, 'jenny', 'Marriott Room 1', '2025-04-16', '2025-04-18', '2025-04-05'),
(11, 'jenny', 'Hyatt Room 1', '2025-04-05', '2025-04-13', '2025-04-05'),
(12, 'jenny', 'Four Seasons Room 1', '2025-04-05', '2025-04-13', '2025-04-04'),
(13, 'jerry', 'Marriott Room 1', '2025-04-05', '2025-04-06', '2025-04-04'),
(14, 'jerry', 'Marriott Room 1', '2025-04-05', '2025-04-06', '2025-04-04'),
(15, 'jerry', 'Four Seasons Room 1', '2025-04-05', '2025-04-06', '2025-04-04'),
(16, 'jerry', 'Marriott Room 1', '2025-04-06', '2025-04-09', '2025-04-05'),
(19, 'John', 'Four Seasons Room 1', '2025-04-09', '2025-04-11', '2025-04-05'),
(20, 'John', 'Marriott Room 2', '2025-04-06', '2025-04-13', '2025-04-05'),
(21, 'John', 'Marriott Room 2', '2025-04-06', '2025-04-08', '2025-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `fourseasons`
--

CREATE TABLE `fourseasons` (
  `id` int(11) NOT NULL,
  `hotelroom` varchar(100) NOT NULL,
  `features` varchar(100) NOT NULL,
  `facilities` varchar(100) NOT NULL,
  `guests` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `promotion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fourseasons`
--

INSERT INTO `fourseasons` (`id`, `hotelroom`, `features`, `facilities`, `guests`, `price`, `promotion`) VALUES
(1, 'Four Seasons Room 1', '1 Room, 1 King Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults, 1 children', 50.00, 40.00),
(2, 'Four Seasons Room 2', '1 Room, 1 Queen Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults', 60.00, 0.00),
(3, 'Four Seasons Room 3', '1 Room, 1 Queen Size bed, 1 bathroom', 'Wifi, AC, TV', '1 Adult', 70.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `hilton`
--

CREATE TABLE `hilton` (
  `id` int(11) NOT NULL,
  `hotelroom` varchar(50) NOT NULL,
  `features` varchar(100) NOT NULL,
  `facilities` varchar(100) NOT NULL,
  `guests` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `promotion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hilton`
--

INSERT INTO `hilton` (`id`, `hotelroom`, `features`, `facilities`, `guests`, `price`, `promotion`) VALUES
(1, 'Hilton Room 1', '1 Room, 1 King Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults, 1 children', 50.00, 30.00),
(2, 'Hilton Room 2', '1 Room, 1 Queen Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults', 60.00, 0.00),
(3, 'Hilton Room 3', '1 Room, 1 Single Size bed, 1 bathroom', 'Wifi, AC, TV', '1 Adult', 70.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `hyatt`
--

CREATE TABLE `hyatt` (
  `id` int(11) NOT NULL,
  `hotelroom` varchar(100) NOT NULL,
  `features` varchar(100) NOT NULL,
  `facilities` varchar(100) NOT NULL,
  `guests` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `promotion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hyatt`
--

INSERT INTO `hyatt` (`id`, `hotelroom`, `features`, `facilities`, `guests`, `price`, `promotion`) VALUES
(1, 'Hyatt Room 1', '1 Room, 1 King Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults, 1 children', 50.00, 20.00),
(2, 'Hyatt Room 2', '1 Room, 1 Queen Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults', 60.00, 0.00),
(3, 'Hyatt Room 3', '1 Room, 1 Single Size bed, 1 bathroom', 'Wifi, AC, TV', '1 Adult', 70.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `marriott`
--

CREATE TABLE `marriott` (
  `id` int(11) NOT NULL,
  `hotelroom` varchar(100) NOT NULL,
  `features` varchar(100) NOT NULL,
  `facilities` varchar(100) NOT NULL,
  `guests` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `promotion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriott`
--

INSERT INTO `marriott` (`id`, `hotelroom`, `features`, `facilities`, `guests`, `price`, `promotion`) VALUES
(1, 'Marriott Room 1', '1 Room, 1 King Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults 1 children', 50.00, 40.00),
(2, 'Marriott Room 2', '1 Room, 1 Queen Size bed, 1 bathroom', 'Wifi, AC, TV', '2 Adults', 60.00, 20.00),
(3, 'Marriott Room 3', '1 Room, 1 Single Size bed, 1 bathroom', 'Wifi, AC, TV', '1 Adult', 70.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `user`, `room`, `checkin`, `checkout`, `price`) VALUES
(1, 'jerry', 'Marriott Room 1', '2025-04-04', '2025-04-06', 100.00),
(2, 'jerry', 'Hilton Room 1', '2025-04-04', '2025-04-06', 100.00),
(3, 'jenny', 'Hilton Room 1', '2025-04-05', '2025-04-07', 100.00),
(4, 'jenny', 'Marriott Room 1', '2025-04-05', '2025-04-08', 150.00),
(5, 'jenny', 'Marriott Room 1', '2025-04-18', '2025-04-29', 550.00),
(6, 'jenny', 'Marriott Room 1', '2025-04-05', '2025-04-16', 550.00),
(7, 'jerry', 'Marriott Room 1', '2025-04-05', '2025-04-15', 500.00),
(8, 'jerry', 'Marriott Room 2', '2025-04-05', '2025-04-08', 180.00),
(9, 'jenny', 'Marriott Room 1', '2025-04-05', '2025-04-15', 500.00),
(10, 'jenny', 'Marriott Room 1', '2025-04-16', '2025-04-18', 100.00),
(11, 'jenny', 'Hyatt Room 1', '2025-04-05', '2025-04-13', 400.00),
(12, 'jenny', 'Four Seasons Room 1', '2025-04-05', '2025-04-13', 400.00),
(13, 'jerry', 'Marriott Room 1', '2025-04-05', '2025-04-06', 50.00),
(14, 'jerry', 'Marriott Room 1', '2025-04-05', '2025-04-06', 40.00),
(15, 'jerry', 'Four Seasons Room 1', '2025-04-05', '2025-04-06', 10.00),
(16, 'jerry', 'Marriott Room 1', '2025-04-06', '2025-04-09', 30.00),
(17, 'John', 'Marriott Room 3', '2025-04-06', '2025-04-07', 70.00),
(18, 'John', 'Four Seasons Room 1', '2025-04-06', '2025-04-08', 100.00),
(19, 'John', 'Four Seasons Room 1', '2025-04-09', '2025-04-11', 80.00),
(20, 'John', 'Marriott Room 2', '2025-04-06', '2025-04-13', 420.00),
(21, 'John', 'Marriott Room 2', '2025-04-06', '2025-04-08', 120.00),
(22, 'jerry', 'Marriott Room 3', '2025-04-08', '2025-04-17', 630.00),
(23, 'jen', 'Marriott Room 1', '2025-04-08', '2025-04-11', 120.00),
(24, 'jerry', 'Four Seasons Room 2', '2025-04-30', '2025-05-03', 180.00);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user`, `hotel`, `rating`, `comment`) VALUES
(1, 'jerry', 'Marriott', 3, 'Not bad'),
(2, 'jerry', 'Hilton', 4, 'Quite Good'),
(3, 'jenny', 'Hyatt', 3, 'Good'),
(4, 'jerry', 'Hilton', 3, 'Good Enough'),
(5, 'jerry', 'Four Seasons', 3, 'Not bad'),
(6, 'John', 'Four Seasons', 4, 'Not Bad'),
(7, 'jen', 'Four Seasons', 4, 'Not bad');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(225) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `phone`) VALUES
(2, 'jerry', 12345, '60123456789'),
(3, 'jenny', 12345, '60123456789'),
(4, 'John', 12345, '60123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingcheckout`
--
ALTER TABLE `bookingcheckout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelbooking`
--
ALTER TABLE `cancelbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fourseasons`
--
ALTER TABLE `fourseasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hilton`
--
ALTER TABLE `hilton`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hyatt`
--
ALTER TABLE `hyatt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriott`
--
ALTER TABLE `marriott`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bookingcheckout`
--
ALTER TABLE `bookingcheckout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cancelbooking`
--
ALTER TABLE `cancelbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fourseasons`
--
ALTER TABLE `fourseasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hilton`
--
ALTER TABLE `hilton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hyatt`
--
ALTER TABLE `hyatt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marriott`
--
ALTER TABLE `marriott`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
