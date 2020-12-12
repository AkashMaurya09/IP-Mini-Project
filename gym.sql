-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql307.epizy.com
-- Generation Time: Dec 12, 2020 at 06:18 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27443827_gym`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(38, 'Edit Report a Bug\nDateTime::format\nDateTimeImmutable::format\nDateTimeInterface::format\ndate_format\n(PHP 5 >= 5.2.1, PHP 7)\n\nDateTime::format -- DateTimeImmutable::format -- DateTimeInterface::format -- date_format — Returns date formatted according to given format', '2020-12-11 00:18:01', 20, 6),
(39, 'Good video', '2020-12-12 15:56:20', 20, 17);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `phone_number`, `message`) VALUES
('Dev', 1234512345, 'ffsdfsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `gymAdmin`
--

CREATE TABLE `gymAdmin` (
  `Admin_id` int(10) NOT NULL,
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Email` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymAdmin`
--

INSERT INTO `gymAdmin` (`Admin_id`, `Admin_Name`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'Dev', '2018.devdatta.khoche@ves.ac.in', '$2y$10$Y5Fzx2H/e2ZISfTYG3dBFe8h870YxW9izT0SjxOSb4H01C2pDcSpK');

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `Member_id` int(10) NOT NULL,
  `Member_Name` varchar(100) NOT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Admin_id` int(10) NOT NULL,
  `Member_Email` varchar(250) NOT NULL,
  `Member_Password` varchar(250) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Member`
--

INSERT INTO `Member` (`Member_id`, `Member_Name`, `Phone_Number`, `Admin_id`, `Member_Email`, `Member_Password`, `name`, `location`) VALUES
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`Validity`, `Member_id`, `Video_id`) VALUES
('2020-12-17', 20, 6),
('2021-12-12', 20, 17);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`Trainer_id`, `Trainer_Name`, `Phone_Number`, `Admin_id`, `Trainer_Email`, `Trainer_Password`, `name`, `location`) VALUES
(6, 'Akash', 1234512345, 1, '09.akash.maurya@gmail.com', '$2y$10$YfdiWGNkWwNnIIZJFqGN9eY2.YH1oqF6DdkDJhA1HyTlFz15xHqpi', 'Dev.jpg', '../profileImage/Dev.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Workout`
--

CREATE TABLE `Workout` (
  `Video_Name` varchar(100) NOT NULL,
  `Video_id` int(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Trainer_id` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Workout`
--

INSERT INTO `Workout` (`Video_Name`, `Video_id`, `Price`, `Trainer_id`, `name`, `location`, `Description`, `tag`) VALUES
('Testuvvh', 6, 12222, 6, '5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', '../videos/5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', 'devdatta', ''),
('5 Minute Chest Workout', 7, 12344, 6, '5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', '../videos/5 MINUTE CHEST WORKOUT(NO EQUIPMENT).mp4', 'jdabjhabfyncajfvyusguyarvucuyfgayuwgfvyu', ''),
('Test', 17, 1234, 6, 'test.mp4', '../videos/test.mp4', 'jcbb hnj fsfgsg', '');

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
-- Indexes for table `Member`
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
-- Indexes for table `Workout`
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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `gymAdmin`
--
ALTER TABLE `gymAdmin`
  MODIFY `Admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Member`
--
ALTER TABLE `Member`
  MODIFY `Member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `Trainer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Workout`
--
ALTER TABLE `Workout`
  MODIFY `Video_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
