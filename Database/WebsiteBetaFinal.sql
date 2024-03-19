-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2024 at 12:16 AM
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
(14, 'Museum Tour', 200, 14),
(15, 'Cycling Trip', 300, 15),
(16, 'Helicopter flight around New York', 200, 16),
(17, 'JR Pass to travel to whatever city you like', 500, 17),
(18, 'Guided Tour to see Jesus Christ Sculpture', 300, 18);

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `accessLevel` int(11) DEFAULT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `accessLevel`, `User_id`) VALUES
(1, 1, 1);

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
(14, 'London', 2000, '7 Day trip to the capital of England'),
(15, 'Amsterdam', 2500, 'Trip to Amsterdam'),
(16, 'New York', 3000, '10 Day Trip to The City that never sleeps'),
(17, 'Japan', 4000, '14 day trip to Tokyo '),
(18, 'Rio De Janeiro', 3500, '7 Day trip to Brazil');

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
(8, 'Ritz Carlton', 10, 200, 14),
(9, 'Ritz Carlton', 3, 350, 15),
(10, 'Hilton', 5, 500, 16),
(11, 'Hilton Tokyo', 6, 540, 17),
(12, 'Royal Rio Palace', 6, 500, 18);

-- --------------------------------------------------------

--
-- Table structure for table `Miles`
--

CREATE TABLE `Miles` (
  `id` int(11) NOT NULL,
  `PointsNum` varchar(45) DEFAULT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Miles`
--

INSERT INTO `Miles` (`id`, `PointsNum`, `User_id`) VALUES
(1, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `id` int(11) NOT NULL,
  `CardNum` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `FullName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Age` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `FullName`, `Email`, `Age`, `Password`) VALUES
(1, 'Admin', 'admin@globalG.com', '30', 'admin$$$');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Admin_User1_idx` (`User_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Miles_User1_idx` (`User_id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`id`,`Product_id`,`User_id`),
  ADD KEY `fk_Payment_Product1_idx` (`Product_id`),
  ADD KEY `fk_Payment_User1_idx` (`User_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Product_Hotel_idx` (`Hotel_id`),
  ADD KEY `fk_Product_Activity1_idx` (`Activity_id`),
  ADD KEY `fk_Product_Destination1_idx` (`Destination_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activity`
--
ALTER TABLE `Activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Destination`
--
ALTER TABLE `Destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Activity`
--
ALTER TABLE `Activity`
  ADD CONSTRAINT `fk_Activity_Destination1` FOREIGN KEY (`Destination_id`) REFERENCES `Destination` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `fk_Admin_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD CONSTRAINT `fk_Hotel_Destination1` FOREIGN KEY (`Destination_id`) REFERENCES `Destination` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Miles`
--
ALTER TABLE `Miles`
  ADD CONSTRAINT `fk_Miles_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `fk_Payment_Product1` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Payment_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `fk_Product_Activity1` FOREIGN KEY (`Activity_id`) REFERENCES `Activity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Destination1` FOREIGN KEY (`Destination_id`) REFERENCES `Destination` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Hotel` FOREIGN KEY (`Hotel_id`) REFERENCES `Hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
