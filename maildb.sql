-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2016 at 11:48 AM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maildb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dbprocedure`()
BEGIN
 

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logdetails`
--

CREATE TABLE IF NOT EXISTS `logdetails` (
  `logid` int(11) NOT NULL,
  `senid` varchar(50) NOT NULL,
  `recid` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `parentst` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logdetails`
--

INSERT INTO `logdetails` (`logid`, `senid`, `recid`, `msg`, `status`, `parentst`) VALUES
(8, '->logann', 'karthic', 'sdf', 'delivered', 'sent'),
(9, '->karthic', 'logann', 'sdfs', 'delivered', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `mailid` int(11) NOT NULL,
  `recid` varchar(50) NOT NULL,
  `senid` varchar(50) NOT NULL,
  `sub` char(50) NOT NULL,
  `msg` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`mailid`, `recid`, `senid`, `sub`, `msg`, `status`) VALUES
(1, 'jason', 'karthic', 'Testing', 'Heyyy wassup how r u', 'sent'),
(2, 'karthic', 'logann', 'Testing', 'HEY WATUPP!!', 'sent'),
(3, 'karthic', 'logann', 'TESTING 2', 'HEYYYYYYY ASLKJD', 'sent'),
(4, '', 'karthic', 'Testing', 'HEY WATUPP!!', 'forward'),
(5, 'jason', 'karthic', 'Testing', 'HEY WATUPP!!', 'forward'),
(7, 'karthic', 'karthic', 'TESTING 2', 'HEYYYYYYY ASLKJD', 'forward'),
(8, 'karthic', 'karthic', 'BLABLA', 'HEY WATSSUP REPLY', 'reply'),
(9, 'logann', 'karthic', 'qweqw', 'aklfalksd', 'sent'),
(10, 'logann', 'karthic', 'qweqwe', 'wdfjlfglkd', 'sent'),
(11, 'logann', 'karthic', 'asda', 'esdfsdf', 'sent'),
(12, 'logann', 'karthic', 'adfdf', 'wrw', 'sent'),
(13, 'logann', 'karthic', 'adfe', 'sdfs', 'sent'),
(14, 'karthic', 'logann', 'jqe', 'sdfs', 'sent'),
(15, 'karthic', 'logann', 'klajdf', 'skldf', 'sent'),
(16, 'logann', 'karthic', 'jnjj', 'ojikdfjlskdjfiweifjsl', 'sent'),
(17, 'logann', 'karthic', 'lsdfsdfs', 'werwr', 'sent'),
(18, 'karthic', 'logann', 'qdfsd', 'sdfsdf', 'sent'),
(19, 'karthic', 'karthic', 'jsjfsdfsf', 'srrer', 'sent'),
(20, 'karthic', 'logann', 'qwe', 'rt', 'sent'),
(21, 'karthic', 'logann', 'asd', 'asd', 'sent'),
(22, 'logann', 'karthic', 'kddsf', 'dsf', 'sent'),
(23, 'logann', 'karthic', 'dskjf', 'sdf', 'sent'),
(24, 'karthic', 'logann', 'klajd', 'sdf', 'sent'),
(25, 'logann', 'karthic', 'kajd', 'sjdf', 'sent'),
(26, 'karthic', 'logann', 'lsdfsdfs', 'werwr', 'forward'),
(27, 'karthic', 'logann', 'qwe', 'sdf', 'sent'),
(28, 'logann', 'karthic', 'jdfsd', 'sdfs', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `mails1`
--

CREATE TABLE IF NOT EXISTS `mails1` (
  `mailid` int(11) NOT NULL,
  `recid` varchar(50) NOT NULL,
  `senid` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `user_id` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `username`, `password`, `mobile`, `email`, `gender`) VALUES
(1, 'karthic', 'qwerty123', 8622356895, 'kp444@njit.edu', 'm'),
(2, 'jason', 'abc123', 8622356995, 'json@gmail.com', 'm'),
(3, 'logan', 'log123', 9789678123, 'ty@gmai.com', 'm'),
(4, 'logann', 'qwe123', 123, 'kp44@gmail.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logdetails`
--
ALTER TABLE `logdetails`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `mails1`
--
ALTER TABLE `mails1`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logdetails`
--
ALTER TABLE `logdetails`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `mailid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `mails1`
--
ALTER TABLE `mails1`
  MODIFY `mailid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
