-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 06:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `userComment` varchar(500) NOT NULL,
  `timestamp` datetime NOT NULL,
  `Member_id` int(10) NOT NULL,
  `Video_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gymAdmin`
--

CREATE TABLE `gymAdmin` (
  `Admin_id` int(10) NOT NULL,
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Email` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymAdmin`
--

INSERT INTO `gymAdmin` (`Admin_id`, `Admin_Name`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'Dev', '2018.devdatta.khoche@ves.ac.in', '$2y$10$Y5Fzx2H/e2ZISfTYG3dBFe8h870YxW9izT0SjxOSb4H01C2pDcSpK');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `Member` (
  `Member_id` int(10) NOT NULL,
  `Member_Name` varchar(100) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `Admin_id` int(10) NOT NULL,
  `Member_Email` varchar(250) NOT NULL,
  `Member_Password` varchar(250) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT '/img/img_avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `Validity` date NOT NULL,
  `Member_id` int(10) NOT NULL,
  `Video_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `Trainer_id` int(10) NOT NULL,
  `Trainer_Name` varchar(100) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `Admin_id` int(10) NOT NULL,
  `Trainer_Email` varchar(100) NOT NULL,
  `Trainer_Password` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT '/img/img_avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `Workout` (
  `Video_Name` varchar(100) NOT NULL,
  `Video_id` int(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Trainer_id` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `gymAdmin`
--
ALTER TABLE `gymAdmin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `Member`
  ADD PRIMARY KEY (`Member_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`Member_id`,`Video_id`),
  ADD KEY `fk_Video_id` (`Video_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`Trainer_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `workout`
--
ALTER TABLE `Workout`
  ADD PRIMARY KEY (`Video_id`),
  ADD KEY `Trainer_id` (`Trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gymAdmin`
--
ALTER TABLE `gymAdmin`
  MODIFY `Admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `Member`
  MODIFY `Member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `Trainer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `Workout`
  MODIFY `Video_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `Member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `gymAdmin` (`Admin_id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_Video_id` FOREIGN KEY (`Video_id`) REFERENCES `Workout` (`Video_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`Member_id`) REFERENCES `Member` (`Member_id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`Video_id`) REFERENCES `Workout` (`Video_id`);

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `trainer_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `gymAdmin` (`Admin_id`);

--
-- Constraints for table `workout`
--
ALTER TABLE `Workout`
  ADD CONSTRAINT `Trainer_id` FOREIGN KEY (`Trainer_id`) REFERENCES `trainer` (`Trainer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `workout_ibfk_1` FOREIGN KEY (`Trainer_id`) REFERENCES `trainer` (`Trainer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
