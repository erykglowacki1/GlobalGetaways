-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2024 at 01:51 PM
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
  `ownerName` varchar(255) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`id`, `CardNum`, `ownerName`, `Product_id`, `User_id`) VALUES
(8, 14141414, 'Eryk Glowacki', 52, 4),
(9, 41414114, 'Eryk Glowacki', 52, 4),
(10, 141414141, 'Eryk Glowacki', 53, 4),
(11, 4414124, 'Eryk Glowacki', 55, 4),
(12, 412414, 'Eryk Glowacki', 61, 4),
(13, 141414124, 'Eryk Glowacki', 62, 4),
(14, 4141414, 'Eryk Glowacki', 63, 4),
(15, 14141414, 'Eryk Glowacki', 64, 4),
(16, 12341414, 'Eryk Glowacki', 65, 4),
(17, 124141414, 'Eryk Glowacki', 66, 4),
(18, 414141414, 'Eryk Glowacki', 67, 4),
(19, 4344345, 'Eryk Glowacki', 68, 4),
(20, 11414141, 'Eryk Glowacki', 69, 4),
(21, 1212121212, 'Eryk Glowacki', 70, 4),
(22, 1411531515, 'Eryk Glowacki', 71, 4),
(23, 14141414, 'Eryk Glowacki', 72, 4),
(24, 1412414124, 'Eryk Glowacki', 73, 4),
(25, 14124124, 'Eryk Glowacki', 74, 4),
(26, 14124124, 'Eryk Glowacki', 75, 4),
(27, 414141414, 'Eryk Glowacki', 76, 4),
(28, 131313, 'Eryk Glowacki', 77, 4),
(29, 21, 'Eryk Glowacki', 78, 4),
(30, 525252, 'Eryk Glowacki', 80, 4),
(31, 252525, 'Eryk Glowacki', 81, 4),
(32, 14145, 'Eryk Glowacki', 82, 4),
(33, 41515151, 'Eryk Glowacki', 83, 4),
(34, 451515, 'Eryk Glowacki', 84, 4),
(35, 25125, 'Eryk Glowacki', 85, 4),
(36, 414124124, 'Eryk Glowacki', 89, 4),
(37, 123456789, 'Eryk Glowacki', 90, 4);

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
(42, 8, 14, 14),
(43, 11, 17, 17),
(44, 8, 14, 14),
(45, 8, 14, 14),
(46, 8, 14, 14),
(47, NULL, 14, 14),
(48, 8, 14, 14),
(49, 8, 14, 14),
(50, 8, 14, 14),
(51, 8, 14, 14),
(52, 8, 14, 14),
(53, 8, 14, 14),
(54, 8, 14, 14),
(55, 8, 14, 14),
(56, 8, 14, 14),
(57, 8, 14, 14),
(58, 8, 14, 14),
(59, NULL, 14, 14),
(60, 8, 14, 14),
(61, NULL, 14, 14),
(62, 9, 15, 15),
(63, 9, 15, 15),
(64, 9, 15, 15),
(65, 9, 15, 15),
(66, 9, 15, 15),
(67, NULL, 15, 15),
(68, 9, 15, 15),
(69, 8, 14, 14),
(70, 8, 14, 14),
(71, 9, 15, 15),
(72, 9, 15, 15),
(73, 8, 14, 14),
(74, 9, 15, 15),
(75, 9, 15, 15),
(76, NULL, 14, 14),
(77, 9, 15, 15),
(78, NULL, 15, 15),
(79, NULL, 14, 14),
(80, 8, 14, 14),
(81, 8, NULL, 14),
(82, NULL, 15, 15),
(83, NULL, 15, 15),
(84, 9, 15, 15),
(85, NULL, 15, 15),
(87, 8, 14, 14),
(88, NULL, NULL, 14),
(89, 9, 15, 15),
(90, 9, 15, 15);

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
(1, 'Admin', 'admin@globalG.com', '30', 'admin$$$'),
(2, 'Eryk Glowacki', '3ryk.glowacki@gmail.com', '19', '$2y$10$Jd5YNaS6rgdRtWBo1LRkW.MYQM3tNSwR0Xh6c7zSkVhJzwwIg65he'),
(3, 'Eryk Glowacki', 'eryk.glowacki04@gmail.com', '19', '$2y$10$3yyPv0YitP.VoA5Zywk6F.tQx9Cx7VtgndXk0GqNFWlJpf622YCVG'),
(4, 'test', 'test@test.com', '19', '$2y$10$2RGFn7XI/eKaLXQFBeGEOeY4uw7GQOXZQFfEnRM1zn9Pi/1DZvnHG'),
(5, 'Admin1', 'admin@admin.com', '0', 'admin'),
(6, 'test user', 'test@testuser.com', '19', '$2y$10$FcRdC4V1rR4Z2sAnDw3WM.iOSU4CgdP.j4q7qNX1AmibENlOMmOue');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
