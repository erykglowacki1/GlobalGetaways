-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 14, 2024 at 12:51 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GlobalGetaways`
--
CREATE DATABASE IF NOT EXISTS `GlobalGetaways` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `GlobalGetaways`;

-- --------------------------------------------------------

--
-- Table structure for table `Activity`
--

CREATE TABLE `Activity` (
  `id` int(11) NOT NULL,
  `Equipment` varchar(45) NOT NULL,
  `Price` double NOT NULL,
  `Destination_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Activity`
--

INSERT INTO `Activity` (`id`, `Equipment`, `Price`, `Destination_id`) VALUES
(9, 'Ski', 1, 10),
(10, 'Cycling Trip', 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `accessLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Destination`
--

CREATE TABLE `Destination` (
  `id` int(11) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Price` double NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Destination`
--

INSERT INTO `Destination` (`id`, `City`, `Price`, `Description`) VALUES
(10, 'London', 12, 'hasdfuhasiodhasod;oaishdioas'),
(11, 'Warsaw', 12, 'Software Engineering + Web Dev Semester 2 Project');

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `id` int(11) NOT NULL,
  `HotelName` varchar(45) NOT NULL,
  `NumOfRooms` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Destination_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Hotel`
--

INSERT INTO `Hotel` (`id`, `HotelName`, `NumOfRooms`, `Price`, `Destination_id`) VALUES
(4, 'Ritz Carlton', 12, 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Miles`
--

CREATE TABLE `Miles` (
  `id` int(11) NOT NULL,
  `PointsNum` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `id` int(11) NOT NULL,
  `CardNum` int(11) NOT NULL,
  `Reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `Hotel_id` int(11) DEFAULT NULL,
  `Activity_id` int(11) DEFAULT NULL,
  `Destination_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `Hotel_id`, `Activity_id`, `Destination_id`) VALUES
(1, NULL, NULL, 10),
(2, NULL, NULL, 11),
(3, NULL, 9, NULL),
(4, NULL, 9, NULL),
(5, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `id` int(11) NOT NULL,
  `Price` float NOT NULL,
  `User_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `FullName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Age` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Miles_id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activity`
--
ALTER TABLE `Activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Activity_Destination1_idx` (`Destination_id`);

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Destination`
--
ALTER TABLE `Destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Hotel_Destination1_idx` (`Destination_id`);

--
-- Indexes for table `Miles`
--
ALTER TABLE `Miles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`id`,`Reservation_id`),
  ADD KEY `fk_Payment_Reservation1_idx` (`Reservation_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Product_Hotel_idx` (`Hotel_id`),
  ADD KEY `fk_Product_Activity1_idx` (`Activity_id`),
  ADD KEY `fk_Product_Destination1_idx` (`Destination_id`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id`,`Product_id`),
  ADD KEY `fk_Reservation_User1_idx` (`User_id`),
  ADD KEY `fk_Reservation_Product1_idx` (`Product_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`,`Miles_id`,`Admin_id`),
  ADD KEY `fk_User_Miles1_idx` (`Miles_id`),
  ADD KEY `fk_User_Admin1_idx` (`Admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activity`
--
ALTER TABLE `Activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Destination`
--
ALTER TABLE `Destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Activity`
--
ALTER TABLE `Activity`
  ADD CONSTRAINT `fk_Activity_Destination1` FOREIGN KEY (`Destination_id`) REFERENCES `Destination` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD CONSTRAINT `fk_Hotel_Destination1` FOREIGN KEY (`Destination_id`) REFERENCES `Destination` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `fk_Payment_Reservation1` FOREIGN KEY (`Reservation_id`) REFERENCES `Reservation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `fk_Product_Activity1` FOREIGN KEY (`Activity_id`) REFERENCES `Activity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Destination1` FOREIGN KEY (`Destination_id`) REFERENCES `Destination` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Hotel` FOREIGN KEY (`Hotel_id`) REFERENCES `Hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `fk_Reservation_Product1` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reservation_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `fk_User_Admin1` FOREIGN KEY (`Admin_id`) REFERENCES `Admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_Miles1` FOREIGN KEY (`Miles_id`) REFERENCES `Miles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
