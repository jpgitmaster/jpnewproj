-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 09:30 AM
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
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `avlforwrk` date NOT NULL,
  `typofwork` tinyint(1) NOT NULL,
  `address1` varchar(400) NOT NULL,
  `address2` varchar(400) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `bday` date NOT NULL,
  `bplace` varchar(150) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `cstatus` tinyint(1) NOT NULL,
  `objectives` text NOT NULL,
  `workexperience` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `primary_info`
--

CREATE TABLE `primary_info` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember` tinyint(1) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `act_updated` datetime NOT NULL,
  `act_created` datetime NOT NULL,
  `act_activated` datetime NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `genid`, `email`, `password`, `remember`, `remember_token`, `activated`, `act_updated`, `act_created`, `act_activated`, `role`) VALUES
(3, 'qlMRixkSp2cwYsNBjETW', 'vasquezjp14@gmail.com', '$2y$10$ZSoUpxrjw462TZv6exxga.3qSmof4Xz7YkhiTGoahQqdS7KOfnmJK', 0, 'TvE0nF5XfE72DyPEh78syWyviwd7ZfaiO9NUX70P', 1, '2017-10-30 15:57:05', '2017-10-30 15:31:48', '2017-10-30 15:57:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_info`
--
ALTER TABLE `primary_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `primary_info`
--
ALTER TABLE `primary_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
