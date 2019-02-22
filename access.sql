-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 03:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `access`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`adminid`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `email`) VALUES
(1, 'abid', 1130622, 'khanabiddeenmohd96@gmail.com'),
(2, 'nitin', 1130617, 'guptanitin@gmail.'),
(3, 'Ahmed', 1130624, 'ahmedk@gmail.com'),
(4, 'Husain', 1130607, 'ninjahusain@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `docid` varchar(10) NOT NULL,
  `doctorname` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `address` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`docid`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `doctorname`, `password`, `gender`, `contactno`, `address`, `email`, `category`) VALUES
('1001', 'Ahmed', 'D241167252', 'Male', '9876543210', 'Kurla', 'donkurla@gmail.com', 'Dentist'),
('1882', 'Abid', 'D511432424', 'Male', '9167344723', 'Powai', 'khanabiddeenmohd96@gmail.com', 'Heart'),
('2006', 'Dipesh', 'D258097235', 'Male', '9874568520', 'Goregaon', 'dips@gmail.com', 'Plastic Surgeon'),
('2222', 'Nitin', 'D540815767', 'Male', '9167344724', 'Santacruz', 'guptanitin@gmail.com', 'Heart'),
('2760', 'Anas', '27605902', 'Male', '7412589630', 'Croford Market', 'anasthecoder@gmail.com', 'Cardiologist');

-- --------------------------------------------------------

--
-- Table structure for table `doctortreat`
--

CREATE TABLE IF NOT EXISTS `doctortreat` (
  `tid` int(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `docid` varchar(10) NOT NULL,
  `treatmentfor` varchar(15) NOT NULL,
  `treatment` varchar(15) NOT NULL,
  `doctornote` varchar(15) NOT NULL,
  `tdatetime` datetime NOT NULL,
  PRIMARY KEY (`tid`,`uid`,`docid`),
  KEY `doctornote` (`doctornote`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctortreat`
--

INSERT INTO `doctortreat` (`tid`, `uid`, `docid`, `treatmentfor`, `treatment`, `doctornote`, `tdatetime`) VALUES
(1147, '2', '1882', 'Fever', 'Medicine', 'Take bed rest', '2016-04-10 22:03:42'),
(2915, '1', '1882', 'Cold', 'Rest', 'Take Rest', '2016-04-10 22:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `donateonline`
--

CREATE TABLE IF NOT EXISTS `donateonline` (
  `organ` varchar(15) NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `cname` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `address2` varchar(40) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `pin` int(7) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`organ`,`bloodgroup`,`fname`,`lname`,`age`,`gender`,`cname`,`address`,`address2`,`city`,`state`,`pin`,`contactno`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donateonline`
--

INSERT INTO `donateonline` (`organ`, `bloodgroup`, `fname`, `lname`, `age`, `gender`, `cname`, `address`, `address2`, `city`, `state`, `pin`, `contactno`, `email`, `date`) VALUES
('Blood', 'B+', 'ABC', 'DEF', 23, 'Male', 'XYZ', 'PQRST', 'PQRST', 'Mumbai', 'Maharashtra', 400087, '9876543210', 'abcdef@gmail.com', '2016-04-11 01:56:17'),
('Heart', 'O+', 'Abid', 'Khan', 20, 'Male', 'AKDM', 'Powai', 'Powei', 'Mumbai', 'Maharashtra', 400087, '9167344723', 'khanabiddeenmohd96@gmail.com', '2016-04-11 01:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `apid` int(4) NOT NULL,
  `docid` int(4) NOT NULL,
  `uid` int(4) NOT NULL,
  `feedback` varchar(30) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`apid`,`docid`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`apid`, `docid`, `uid`, `feedback`, `date`) VALUES
(1147, 1882, 2, 'Good', '2016-04-10'),
(8555, 2222, 2, 'Good', '2016-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `uid` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `address` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`uid`, `username`, `password`, `gender`, `contactno`, `address`, `email`, `age`) VALUES
(1, 'abid', '622', 'Male', '9167344723', 'powai', 'khanabiddeenmohd96@gmail.com', 20),
(2, 'nitin', '617', 'Male', '9167344744', 'Santacruz', 'guptan@gmail.com', 21),
(3, 'husain', '607', 'Male', '9876543210', 'Croford Market', 'ninjahusain@gmail.com', 20),
(4, 'daanish', '640', 'Male', '9874563218', 'Goregaon', 'surgurudan@gmail.com', 20),
(5, 'Nabil', '632', 'Male', '2222222222', 'Nabuto ;D', 'nabsmail@gmail.com', 21);

-- --------------------------------------------------------

--
-- Table structure for table `patientbook`
--

CREATE TABLE IF NOT EXISTS `patientbook` (
  `uid` varchar(10) NOT NULL,
  `docid` varchar(10) NOT NULL,
  `apid` int(6) NOT NULL,
  `ap_date` date NOT NULL,
  `ap_time` time NOT NULL,
  `disease` varchar(15) NOT NULL,
  `done` int(1) NOT NULL,
  PRIMARY KEY (`uid`,`docid`,`apid`),
  UNIQUE KEY `apid` (`apid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientbook`
--

INSERT INTO `patientbook` (`uid`, `docid`, `apid`, `ap_date`, `ap_time`, `disease`, `done`) VALUES
('1', '1882', 2915, '2016-04-10', '18:00:00', 'Heart', 1),
('1', '1882', 8428, '2016-04-10', '19:00:00', 'Heart', 1),
('2', '1882', 1147, '2016-04-13', '09:00:00', 'Heart', 1),
('2', '1882', 3906, '2016-04-10', '18:00:00', 'Heart', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sitefeedback`
--

CREATE TABLE IF NOT EXISTS `sitefeedback` (
  `uid` int(4) NOT NULL,
  `feedback` varchar(15) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitefeedback`
--

INSERT INTO `sitefeedback` (`uid`, `feedback`, `date`) VALUES
(1, 'Average', '2016-04-09'),
(2, 'Excellent', '2016-04-09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
