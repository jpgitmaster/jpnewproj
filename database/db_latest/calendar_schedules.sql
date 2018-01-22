-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 02:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jpnewproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_schedules`
--

CREATE TABLE `calendar_schedules` (
  `genid` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `textColor` varchar(7) NOT NULL,
  `color` varchar(7) NOT NULL,
  `activity_type` int(1) NOT NULL,
  `room_type` int(1) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_schedules`
--

INSERT INTO `calendar_schedules` (`genid`, `id`, `title`, `start`, `end`, `textColor`, `color`, `activity_type`, `room_type`, `reason`) VALUES
('otmAtwkkvkcadj5KBRRv', 1, 'dgsgd', '2018-01-24', '2018-01-26', '#FFF', '#a6a6a6', 2, 2, 'dsggsdgsdg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_schedules`
--
ALTER TABLE `calendar_schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_schedules`
--
ALTER TABLE `calendar_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
