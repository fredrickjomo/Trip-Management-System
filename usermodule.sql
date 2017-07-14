-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 12:04 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usermodule`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(50) NOT NULL,
  `assigned_vehicle_id` int(50) NOT NULL,
  `assigned_driver_id` int(50) NOT NULL,
  `date_of_trip` date NOT NULL,
  `num_of_days` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `party` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(200) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `driver_contact` int(50) NOT NULL,
  `availability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `driver_contact`, `availability`) VALUES
(45975, 'Mogita Fredrick', 756452156, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_contact`, `user_type`, `password`) VALUES
(1, 'admin', '0703646148', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(50) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `number_plate` varchar(50) DEFAULT NULL,
  `driver_id` int(50) DEFAULT NULL,
  `capacity` int(20) DEFAULT NULL,
  `availability` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_type`, `number_plate`, `driver_id`, `capacity`, `availability`) VALUES
(98, 'bus', 'KZDSA', 78546, 52, 'yes'),
(100, 'mini-bus', 'KBZ', 854899, 54, 'yes'),
(101, 'bus', 'KZDSA', 78546, 52, 'yes'),
(103, 'bus', 'p87', 666, 666, 'yes'),
(104, 'mini-bus', 'KBZ', 854899, 54, 'yes'),
(105, 'mini-bus', 'KBZ', 854899, 54, 'yes'),
(106, 'mini-bus', 'KBZ', 854899, 54, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
