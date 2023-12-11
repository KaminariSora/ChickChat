-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 06:09 PM
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
-- Database: `chickchat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emotiontag`
--

CREATE TABLE `emotiontag` (
  `EmotionID` int(10) NOT NULL,
  `EmoName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emotiontag`
--

INSERT INTO `emotiontag` (`EmotionID`, `EmoName`) VALUES
(1, 'เหงา'),
(2, 'ท้อแท้'),
(3, 'มีความสุข'),
(4, 'อยากเล่า'),
(5, 'ผู้ฟังที่ดี');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `Price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Price`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ProfileID` int(10) NOT NULL,
  `EmotionID` int(5) NOT NULL,
  `StatusID` int(5) NOT NULL,
  `Name_avatar` varchar(255) NOT NULL,
  `Chick_count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statustag`
--

CREATE TABLE `statustag` (
  `StatusID` int(10) NOT NULL,
  `StatusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `statustag`
--

INSERT INTO `statustag` (`StatusID`, `StatusName`) VALUES
(1, 'โสด'),
(2, 'ไม่ชัดเจน'),
(3, 'มีคนคุย'),
(4, 'มีแฟนแล้ว'),
(5, 'FriendZone');

-- --------------------------------------------------------

--
-- Table structure for table `usercatalog`
--

CREATE TABLE `usercatalog` (
  `UserID` int(10) NOT NULL,
  `CatProduct` int(3) NOT NULL,
  `ActiveProduct` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(10) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emotiontag`
--
ALTER TABLE `emotiontag`
  ADD PRIMARY KEY (`EmotionID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ProfileID`),
  ADD KEY `ShowTag` (`EmotionID`),
  ADD KEY `ShowStatus` (`StatusID`);

--
-- Indexes for table `statustag`
--
ALTER TABLE `statustag`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `usercatalog`
--
ALTER TABLE `usercatalog`
  ADD PRIMARY KEY (`UserID`,`CatProduct`),
  ADD KEY `UserProduct` (`CatProduct`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emotiontag`
--
ALTER TABLE `emotiontag`
  MODIFY `EmotionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `statustag`
--
ALTER TABLE `statustag`
  MODIFY `StatusID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `ProfileID` FOREIGN KEY (`ProfileID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ShowStatus` FOREIGN KEY (`StatusID`) REFERENCES `statustag` (`StatusID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ShowTag` FOREIGN KEY (`EmotionID`) REFERENCES `emotiontag` (`EmotionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usercatalog`
--
ALTER TABLE `usercatalog`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserProduct` FOREIGN KEY (`CatProduct`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
