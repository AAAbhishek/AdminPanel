-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 09:09 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `empid` int(11) NOT NULL DEFAULT '0',
  `role` varchar(10) DEFAULT NULL,
  `empname` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`empid`, `role`, `empname`, `age`, `address`, `email`, `pwd`, `status`) VALUES
(101, 'manager', 'Abhishek', 21, 'Patna', 'abhishektrust@hotmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1),
(102, 'Worker', 'Shubham', 22, 'Delhi', 'abhishek.shubham2000@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(103, 'Worker', 'Amit', 25, 'Bhopal', NULL, NULL, NULL),
(104, 'Admin', 'Abhijeet', 23, 'Patna', 'abhijeet9.sh@gmail.com', '14f223fd24c60a165c484aeef64c8e7c', 1),
(105, 'Worker', 'Karan', 27, 'Rachi', NULL, NULL, NULL),
(107, 'Manager', 'manish', 29, 'Pune', 'manish@yahoo.in', 'null', NULL),
(108, 'Manager', 'Arpit', 32, 'kolkata', 'kurkure@hotmail.com', 'null', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `empid` int(11) DEFAULT NULL,
  `empname` varchar(10) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  `empdate` date DEFAULT NULL,
  KEY `empid` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`empid`, `empname`, `description`, `empdate`) VALUES
(101, 'Abhishek', 'I am sure that if you verify y', '0000-00-00'),
(102, 'Shubham', 'I am sure that if you verify y', '0000-00-00'),
(103, 'Amit', 'I am sure that if you verify y', '0000-00-00'),
(105, 'Karan', 'I am sure that if you verify y', '0000-00-00'),
(104, 'Abhijeet', 'I am sure that if you verify y', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `empid` int(11) DEFAULT NULL,
  `empdate` date DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  KEY `empid` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`empid`, `empdate`, `description`) VALUES
(101, '2016-12-12', 'You have to go to Canada'),
(107, '2016-01-13', ''),
(107, '2012-03-11', 'Go to ladakh for picnic'),
(101, '2016-04-04', 'Go to cafeteria'),
(102, '2016-12-12', 'Go for swimming'),
(102, '2016-07-12', 'Report on goGreen project'),
(102, '2016-07-12', 'Outdoor games session');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE IF NOT EXISTS `timesheet` (
  `empid` int(11) DEFAULT NULL,
  `starttime` varchar(20) DEFAULT NULL,
  `endtime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`empid`, `starttime`, `endtime`) VALUES
(101, '2016-08-10', '2016-08-18'),
(102, '2016-08-03', '2016-08-16'),
(102, '2016-08-03', '2016-08-16'),
(102, '2016-08-03', '2016-08-16'),
(102, '2016-08-03', '2016-08-16'),
(102, '2016-08-01', '2016-08-09'),
(102, '2016-08-09', '2016-08-23'),
(102, '2016-08-09', '2016-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `age`, `password`, `role`) VALUES
('Abhishek', 'abhi_717@hotmail.com', 21, 'qwerty', 'M'),
('Abhijeet', 'abhijeet9.sh@gmail.com', 20, 'qwerty', 'M'),
('Shubham', 'abhishek.shubham2000@gmail.com', 22, 'qwerty', 'W');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `emp` (`empid`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `emp` (`empid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
