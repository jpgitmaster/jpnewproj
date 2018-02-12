-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 01:53 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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
-- Table structure for table `employment_history`
--

CREATE TABLE `employment_history` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `company` varchar(250) NOT NULL,
  `position` varchar(150) NOT NULL,
  `currency` tinyint(2) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `ispresent` tinyint(4) NOT NULL,
  `jbdescription` text NOT NULL,
  `reasonforleaving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_history`
--

INSERT INTO `employment_history` (`id`, `genid`, `company`, `position`, `currency`, `salary`, `sdate`, `edate`, `ispresent`, `jbdescription`, `reasonforleaving`) VALUES
(1, '13t1vpbfWRXv0192PwBJ', 'Stratpoint Global Outsourcing', 'Sr. Software Engineer', 2, '20000', '2017-01-12', '0000-00-00', 1, '<p>lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor</p><p>lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor</p><p>lorem ipsum dolor<br></p>', '<p>lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor</p><p>lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor</p><p>lorem ipsum dolor</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employment_history`
--
ALTER TABLE `employment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
