-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 07:56 PM
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
-- Database: `gymmanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `admin_email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$bfHzteEADccFvYsDQ.jtouYwo9VjLZ5ZBc8EY7yq8uV5bFzqsJYRK');

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `bmi_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`bmi_id`, `client_id`, `height`, `weight`, `date`) VALUES
(46, 41, 1.67, 99, '2023-05-21 12:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `class_request`
--

CREATE TABLE `class_request` (
  `class_request_id` int(11) NOT NULL,
  `sport_name` text NOT NULL,
  `played` text NOT NULL,
  `goal` text NOT NULL,
  `disability` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `years` int(11) NOT NULL,
  `class_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_request`
--

INSERT INTO `class_request` (`class_request_id`, `sport_name`, `played`, `goal`, `disability`, `client_id`, `years`, `class_level`) VALUES
(36, 'kickboxing', 'no', 'fitness', 'no', 41, 0, 1),
(37, 'zumba', 'no', 'fitness', 'no', 41, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `client_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `email`, `password`, `phone`, `address`, `join_date`, `approved`, `image`, `gender`, `client_dob`) VALUES
(41, 'fayez hassan slim', 'fayezslim18@gmail.com', '$2y$10$SeBXzyouMsViXgLMqtAsq.kLAbaWTKTgmeqau5q8ZokVes7CBbud6', '70545492', 'Beirut Governorate (Beirut)', '2023-05-21 12:54:02', 1, 'userimage/fayez.jpg', 'male', '1997-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `client_id`, `amount`, `payment_date`, `class_name`) VALUES
(295, 41, 100.00, '2023-05-22 16:16:59', 'zumba'),
(296, 41, 100.00, '2023-05-22 16:17:06', 'zumba'),
(297, 41, 100.00, '2023-05-22 16:17:11', 'zumba'),
(298, 41, 100.00, '2023-05-22 16:17:13', 'kickboxing'),
(299, 41, 100.00, '2023-05-22 16:17:20', 'kickboxing');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `class_date` varchar(255) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `class_time` time NOT NULL,
  `class_approve` tinyint(4) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `sport_name`, `level`, `class_date`, `trainer_id`, `class_time`, `class_approve`, `start_date`, `end_date`) VALUES
(251, 'kickboxing', 1, 'monday 8:00:00', 62, '08:00:00', 1, '2023-05-23', '2023-06-23'),
(252, 'kickboxing', 1, 'monday 9:30:00', 62, '09:30:00', 1, '2023-05-23', '2023-06-23'),
(253, 'zumba', 1, 'tuesday 9:30:00', 62, '09:30:00', 1, '2023-05-23', '2023-06-23'),
(254, 'zumba', 1, 'tuesday 8:00:00', 62, '08:00:00', 1, '2023-05-23', '2023-06-23'),
(255, 'kickboxing', 1, 'monday 8:00:00', 63, '08:00:00', 1, '2023-05-23', '2023-06-23'),
(256, 'kickboxing', 1, 'monday 9:30:00', 63, '09:30:00', 1, '2023-05-23', '2023-06-23'),
(257, 'zumba', 1, 'tuesday 8:00:00', 63, '08:00:00', 1, '2023-05-23', '2023-06-23'),
(258, 'zumba', 1, 'tuesday 9:30:00', 63, '09:30:00', 1, '2023-05-23', '2023-06-23'),
(259, 'zumba', 1, 'wednesday 9:30:00', 63, '09:30:00', 1, '2023-05-24', '2023-06-24'),
(260, 'kickboxing', 1, 'monday 8:00:00', 64, '08:00:00', 1, '2023-05-23', '2023-06-23'),
(261, 'kickboxing', 1, 'monday 9:30:00', 64, '09:30:00', 1, '2023-05-23', '2023-06-23'),
(262, 'zumba', 1, 'tuesday 8:00:00', 64, '08:00:00', 1, '2023-05-23', '2023-06-23'),
(263, 'zumba', 1, 'tuesday 9:30:00', 64, '09:30:00', 1, '2023-05-23', '2023-06-23'),
(264, 'zumba', 1, 'tuesday 17:00:00', 64, '17:00:00', 1, '2023-05-24', '2023-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `sport_client`
--

CREATE TABLE `sport_client` (
  `sport_client_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `class_date` varchar(255) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `sport_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport_client`
--

INSERT INTO `sport_client` (`sport_client_id`, `client_id`, `sport_id`, `class_date`, `trainer_id`, `sport_active`) VALUES
(556, 41, 259, 'wednesday 9:30:00', 63, 1),
(557, 41, 257, 'tuesday 8:00:00', 63, 1),
(558, 41, 263, 'tuesday 9:30:00', 64, 1),
(559, 41, 261, 'monday 9:30:00', 64, 1),
(560, 41, 255, 'monday 8:00:00', 63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tpayment`
--

CREATE TABLE `tpayment` (
  `tpayment_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `tpayment_active` tinyint(4) NOT NULL,
  `tpayment_date` date NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpayment`
--

INSERT INTO `tpayment` (`tpayment_id`, `trainer_id`, `amount`, `tpayment_active`, `tpayment_date`, `class_name`) VALUES
(152, 62, 100, 1, '2023-06-23', 'kickboxing'),
(153, 62, 100, 1, '2023-06-23', 'kickboxing'),
(154, 62, 100, 1, '2023-06-23', 'zumba'),
(155, 62, 100, 1, '2023-06-23', 'zumba'),
(156, 63, 100, 1, '2023-06-23', 'kickboxing'),
(157, 63, 100, 1, '2023-06-23', 'kickboxing'),
(158, 63, 100, 1, '2023-06-23', 'zumba'),
(159, 63, 100, 1, '2023-06-23', 'zumba'),
(160, 63, 100, 1, '2023-06-24', 'zumba'),
(161, 64, 100, 1, '2023-06-23', 'kickboxing'),
(162, 64, 100, 1, '2023-06-23', 'kickboxing'),
(163, 64, 100, 1, '2023-06-23', 'zumba'),
(164, 64, 100, 1, '2023-06-23', 'zumba'),
(165, 64, 100, 1, '2023-06-24', 'zumba');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  `trainer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `yoe` int(11) NOT NULL,
  `cover_letter` longtext NOT NULL,
  `resume` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `trainer_dob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `trainer_email`, `password`, `specialization`, `approved`, `yoe`, `cover_letter`, `resume`, `image`, `phone`, `join_date`, `trainer_dob`) VALUES
(62, 'fayez slim', 'fayezslim05@gmail.com', '$2y$10$kBYGn/jtS.trzmnAbHYwfuyIjD5SEGKUva.LTdoo1Ba0/b.s70PN.', 'Kickboxing', 1, 1, 'hi i am professional trainer i have multi years of experience', 'resume/Fayez\'s Resume.pdf', 'trainerpic/fayez.jpg', 70545492, '2023-05-21', 1997),
(63, 'khaldoun', 'khaldounkhishin7@gmail.com', '$2y$10$QK6pVBR/2vuyfG8Qq/N8/u7l4NJPyhl2sQRttRbvikd0O71xQ/sNa', 'Kickboxing', 1, 9, 'hi i am good', 'resume/Khaldoun\'s Resume (1).pdf', 'trainerpic/khaldoun.jpg', 70820049, '2023-05-22', 2005),
(64, 'ali', '11933259@students.liu.edu.lb', '$2y$10$Khu6.sgabUWlGl6NUvCP5udE.eegZI2cCSi4dLIcg9RBuQIRGBJSG', 'Zumba', 1, 0, 'i am a good zumba trainer', 'resume/CV FAYEZ.pdf', 'trainerpic/lifestyle-wellness-coaching-trainer.jpg', 70556281, '2023-05-22', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`admin_email`);

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`bmi_id`);

--
-- Indexes for table `class_request`
--
ALTER TABLE `class_request`
  ADD PRIMARY KEY (`class_request_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `sport_client`
--
ALTER TABLE `sport_client`
  ADD PRIMARY KEY (`sport_client_id`);

--
-- Indexes for table `tpayment`
--
ALTER TABLE `tpayment`
  ADD PRIMARY KEY (`tpayment_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`),
  ADD UNIQUE KEY `email` (`trainer_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `bmi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `class_request`
--
ALTER TABLE `class_request`
  MODIFY `class_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `sport_client`
--
ALTER TABLE `sport_client`
  MODIFY `sport_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;

--
-- AUTO_INCREMENT for table `tpayment`
--
ALTER TABLE `tpayment`
  MODIFY `tpayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
