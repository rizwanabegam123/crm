-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 12:00 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `internet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uname` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `comid` varchar(15) NOT NULL,
  `cust_id` varchar(15) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `cdate` date NOT NULL,
  `solution` varchar(300) NOT NULL,
  `empid` varchar(15) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `sdate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `rate` int(10) NOT NULL,
  PRIMARY KEY (`comid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`comid`, `cust_id`, `cname`, `complaint`, `cdate`, `solution`, `empid`, `ename`, `sdate`, `status`, `rate`) VALUES
('1', '1', 'jyots', 'net is very slow working..', '2017-03-16', 'cable', '101', 'Ramesh', '2017-03-14', 'solved', 4),
('2', '1', 'jyots', 'signal is poor', '2017-03-07', 'work on signal strenght', '101', 'Ramesh', '2017-03-16', 'solved', 3),
('3', '1', 'jyots', 'abc', '2017-03-16', 'asff', '101', 'Ramesh', '2017-03-22', 'solved', 3),
('4', '2', 'raj', 'slow net', '2017-03-08', 'problem is fixed', '102', 'Suresh', '2017-03-14', 'solved', 3),
('5', '2', 'raj', 'new connection required', '2017-03-15', 'connection strength increased', '102', 'Suresh', '2017-03-20', 'solved', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `cust_id` varchar(15) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `business` varchar(10) NOT NULL,
  `btype` varchar(15) NOT NULL,
  `region` varchar(100) NOT NULL,
  `plan` varchar(200) NOT NULL,
  `expiry` date NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cname`, `contact`, `email`, `age`, `gender`, `business`, `btype`, `region`, `plan`, `expiry`) VALUES
('1', 'jyots', '9897823611', 'jyotsnadesai93@gmail.com', 23, 'Female', 'NO', 'NO', ' borivali', 'ULTRA 600', '2017-03-29'),
('2', 'raj', '8989564421', 'jyotsnadesai93@gmail.com', 21, 'Male', 'YES', 'Small', 'borivali', 'Turbo 1Mbps SME', '2017-06-23'),
('3', 'abc', '9594686542', 'abc@gmail.com', 21, 'Male', 'YES', 'Small', 'borivali', 'Turbo 1Mbps SME', '2017-05-25'),
('4', 'wetr', '9594686542', 'abc@gmail.com', 32, 'Male', 'YES', 'Small', 'vasai', 'ULTRA 600', '2017-03-29'),
('5', 'ram', '9167109666', 'abc@gmail.com', 34, 'Male', 'NO', 'NO', 'vasai', 'ULTRA 600', '2017-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `eid` varchar(15) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `region` varchar(50) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `ename`, `contact`, `email`, `region`) VALUES
('101', 'Ramesh', '9898231212', 'Ramesh@gmail.com', 'goregaon'),
('102', 'Suresh', '8989121121', 'suresh@gmail.com', 'goregaon');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `pid` varchar(15) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `speed` varchar(10) NOT NULL,
  `cost` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pid`, `pname`, `speed`, `cost`, `duration`) VALUES
('1', 'ULTRA 600', '600', 525, 30),
('2', 'Turbo 1Mbps SME', '1', 3450, 90);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
