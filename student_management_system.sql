-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2026 at 09:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$pUFFhvWMqJTBizf2XzwFi.goT/njCsMkI18lYhJF2CCqNcVzq8Ddu');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `dob` date NOT NULL,
  `Course` varchar(50) NOT NULL,
  `Semester` int(2) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Name`, `Email`, `Phone`, `dob`, `Course`, `Semester`, `gender`, `created_at`) VALUES
(1, 'Rahul Kumar', 'kumarrahul@gmail.com', '9993523998', '2005-11-20', 'CSE', 6, 'Male', '2026-08-03 09:56:51'),
(2, 'Ayushi Dubey', 'ayushi@gmail.com', '8319523998', '2004-02-29', 'CSE', 2, 'Female', '2026-08-03 10:04:15'),
(4, 'Priya Rani', 'rani@gmail.com', '6268823998', '2005-01-26', 'Pharmacy', 4, 'Female', '2026-08-03 11:14:22'),
(7, 'Ankit Rathore', 'ankit@gmail.com', '9340370548', '2005-04-01', 'BSc', 6, 'Male', '2026-08-03 11:24:15'),
(10, 'Yogesh Yadav', 'yogeshyadav@gamil.com', '9997054835', '2005-09-27', 'Pharmacy', 4, 'Male', '2026-08-03 13:33:24'),
(11, 'Ayush Upadhyay', 'upadhyayayush1976@gmail.com', '9997805678', '2007-10-09', 'BBALLB', 2, 'Male', '2026-08-03 14:27:46'),
(12, 'Priya Tiwari', 'tiwaripriya205@gmail.com', '8654289667', '2005-08-15', 'CSE', 6, 'Female', '2026-08-04 08:26:33'),
(13, 'Ayushi Singh', 'singh@gmail.om', '6847885532', '2006-06-07', 'BBALLB', 2, 'Female', '2026-08-04 08:57:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
