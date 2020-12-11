-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 12:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `userComment`, `timestamp`, `Member_id`, `Video_id`) VALUES
(4, 'Hello', '2020-12-07 05:41:38', 20, 1),
(13, 'This is an awesome video', '2020-12-07 05:49:30', 20, 1),
(14, 'Order mai aayega sab', '2020-12-07 05:58:43', 20, 1),
(17, 'ajafjkasbdksdnasv', '2020-12-10 06:43:13', 20, 6),
(24, 'Hello from the other side', '2020-12-10 06:51:27', 20, 6),
(32, 'as', '2020-12-11 00:09:30', 20, 6),
(33, 'test', '2020-12-11 00:10:12', 20, 6),
(34, 'helluuu', '2020-12-11 00:11:10', 20, 6),
(35, 'test', '2020-12-11 00:12:23', 20, 6),
(36, 'test', '2020-12-11 00:12:48', 20, 6),
(37, 'alert haga', '2020-12-11 00:17:31', 20, 6),
(38, 'Edit Report a Bug\nDateTime::format\nDateTimeImmutable::format\nDateTimeInterface::format\ndate_format\n(PHP 5 >= 5.2.1, PHP 7)\n\nDateTime::format -- DateTimeImmutable::format -- DateTimeInterface::format -- date_format — Returns date formatted according to given format', '2020-12-11 00:18:01', 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `phone_number`, `message`) VALUES
('Dev', 1234512345, 'ffsdfsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `gymadmin`
--

CREATE TABLE `gymadmin` (
  `Admin_id` int(10) NOT NULL,
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Email` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymadmin`
--

INSERT INTO `gymadmin` (`Admin_id`, `Admin_Name`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'Dev', '2018.devdatta.khoche@ves.ac.in', '$2y$10$Y5Fzx2H/e2ZISfTYG3dBFe8h870YxW9izT0SjxOSb4H01C2pDcSpK');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_id` int(10) NOT NULL,
  `Member_Name` varchar(100) NOT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Admin_id` int(10) NOT NULL,
  `Member_Email` varchar(250) NOT NULL,
  `Member_Password` varchar(250) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_id`, `Member_Name`, `Phone_Number`, `Admin_id`, `Member_Email`, `Member_Password`, `name`, `location`) VALUES
(20, 'Akash', 1234567890, 1, '09.akash.maurya@gmail.com', '$2y$10$F3SowH8Trn8rEQxSRhnGheBJNtcco3Nw4IlhUtCGNULY16c3TcCNG', 'Akash.jpg', '../profileImage/Akash.jpg'),
(22, 'Akash', 930101620, 1, '2018.akash.maurya@ves.ac.in', '$2y$10$17tiZuFKDTvjj13sM/9N1On0GSowdgiFaEbLZ/mFTRn7PD8VhDrSe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `Validity` date NOT NULL,
  `Member_id` int(10) NOT NULL,
  `Video_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`Validity`, `Member_id`, `Video_id`) VALUES
('2020-12-17', 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `Trainer_id` int(10) NOT NULL,
  `Trainer_Name` varchar(100) NOT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Admin_id` int(10) NOT NULL,
  `Trainer_Email` varchar(100) NOT NULL,
  `Trainer_Password` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`Trainer_id`, `Trainer_Name`, `Phone_Number`, `Admin_id`, `Trainer_Email`, `Trainer_Password`, `name`, `location`) VALUES
(2, 'Devdatta Khoche', 1234512345, 1, '2018.devdatta.khoche@ves.ac.in', '$2y$10$kIyG8e.5unKJ3OgwDuM2YuqCNX.oO23ImrpXmQxO4m1NqVH9GgJLC', 'Dev.jpg', '../profileImage/Dev.jpg'),
(6, 'Akash', 1234512345, 1, '09.akash.maurya@gmail.com', '$2y$10$YfdiWGNkWwNnIIZJFqGN9eY2.YH1oqF6DdkDJhA1HyTlFz15xHqpi', 'Dev.jpg', '../profileImage/Dev.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `location`) VALUES
(1, '5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', 'videos/5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4'),
(2, 'NO GYM FULL BODY WORKOUT .mp4', 'videos/NO GYM FULL BODY WORKOUT .mp4');

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `Video_Name` varchar(100) NOT NULL,
  `Video_id` int(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Trainer_id` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `Description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`Video_Name`, `Video_id`, `Price`, `Trainer_id`, `name`, `location`, `Description`) VALUES
('Testuvvh', 6, 12222, 6, '5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', '../videos/5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', 'devdatta'),
('5 Minute Chest Workout', 7, 12344, 6, '5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', '../videos/5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', 'jdabjhabfyncajfvyusguyarvucuyfgayuwgfvyu');

-- --------------------------------------------------------

--
-- Table structure for table `workout_tags`
--

CREATE TABLE `workout_tags` (
  `Tags` int(11) NOT NULL,
  `Video_id` int(11) NOT NULL
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
-- Indexes for table `gymadmin`
--
ALTER TABLE `gymadmin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`Video_id`),
  ADD KEY `Trainer_id` (`Trainer_id`);

--
-- Indexes for table `workout_tags`
--
ALTER TABLE `workout_tags`
  ADD PRIMARY KEY (`Tags`,`Video_id`),
  ADD KEY `Video_id` (`Video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gymadmin`
--
ALTER TABLE `gymadmin`
  MODIFY `Admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `Trainer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `Video_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `gymadmin` (`Admin_id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_Video_id` FOREIGN KEY (`Video_id`) REFERENCES `workout` (`Video_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`Member_id`) REFERENCES `member` (`Member_id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`Video_id`) REFERENCES `workout` (`Video_id`);

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `trainer_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `gymadmin` (`Admin_id`);

--
-- Constraints for table `workout`
--
ALTER TABLE `workout`
  ADD CONSTRAINT `Trainer_id` FOREIGN KEY (`Trainer_id`) REFERENCES `trainer` (`Trainer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `workout_ibfk_1` FOREIGN KEY (`Trainer_id`) REFERENCES `trainer` (`Trainer_id`);

--
-- Constraints for table `workout_tags`
--
ALTER TABLE `workout_tags`
  ADD CONSTRAINT `workout_tags_ibfk_1` FOREIGN KEY (`Video_id`) REFERENCES `workout` (`Video_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
