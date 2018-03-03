-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2014 at 07:58 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grading`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `course`, `year`, `section`, `sem`, `teacher`, `subject`) VALUES
(4, 'BSIT', 'III', 'A', '2nd', '3', 'IT104'),
(7, 'BSIT', 'III', 'A', '2nd', '5', 'IT103'),
(8, 'BSIT', 'I', 'D', '1st', '3', 'IT100'),
(9, 'BSIT', 'I', 'C', '1st', '3', 'IT103'),
(10, 'BSIT', 'IV', 'A', '2nd', '5', 'IT113'),
(14, 'BSIT', 'I', 'D', '2nd', '4', 'IT100');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `activity` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `date`, `activity`) VALUES
(24, '11-27-2014', 'update password of username admin'),
(25, '11-27-2014', 'update password of username 0001-2014'),
(26, '11-27-2014', 'add new teacher af df'),
(27, '11-27-2014', 'update teacher afsdfs dfsdf'),
(28, '11-27-2014', 'delete afsdfs from teacher');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studid`, `fname`, `lname`) VALUES
(1, '0827-2007', 'Jimmy', 'Lomocso'),
(2, '0826-2007', 'Rolan', 'Algara'),
(3, '0983-2007', 'Mark', 'Pasicaran'),
(4, '0732-2008', 'Fernando', 'Genon'),
(5, '0001-2014', 'Cherry', 'Aguaviva');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubject`
--

CREATE TABLE IF NOT EXISTS `studentsubject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` varchar(50) NOT NULL,
  `classid` int(11) NOT NULL,
  `att1` float NOT NULL,
  `att2` float NOT NULL,
  `att3` float NOT NULL,
  `exam1` float NOT NULL,
  `exam2` float NOT NULL,
  `exam3` float NOT NULL,
  `quiz1` float NOT NULL,
  `quiz2` float NOT NULL,
  `quiz3` float NOT NULL,
  `project1` float NOT NULL,
  `project2` float NOT NULL,
  `project3` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `studentsubject`
--

INSERT INTO `studentsubject` (`id`, `studid`, `classid`, `att1`, `att2`, `att3`, `exam1`, `exam2`, `exam3`, `quiz1`, `quiz2`, `quiz3`, `project1`, `project2`, `project3`) VALUES
(14, '2', 8, 76, 66, 66, 78, 66, 66, 80, 66, 66, 90, 66, 66),
(15, '2', 9, 78, 78, 87, 74, 66, 88, 85, 77, 88, 90, 90, 75),
(16, '1', 9, 76, 100, 67, 90, 85, 66, 80, 90, 66, 100, 50, 66),
(23, '1', 4, 87, 50, 50, 98, 50, 50, 78, 50, 50, 89, 50, 50),
(24, '2', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '3', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '2', 10, 100, 90, 100, 75, 70, 75, 78, 90, 80, 80, 80, 75),
(27, '1', 10, 100, 100, 100, 80, 85, 80, 75, 90, 90, 80, 90, 95),
(28, '3', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, '4', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, '5', 4, 90, 100, 80, 75, 80, 75, 80, 80, 90, 50, 75, 90),
(33, '3', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, '1', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `code`, `title`) VALUES
(1, 'IT100', 'IT Fundamentals'),
(2, 'IT104', 'System Analysis Design'),
(4, 'IT103', 'Basic Programming'),
(5, 'IT113', 'Capstone Project');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teachid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teachid`, `fname`, `lname`) VALUES
(3, '12345', 'James', 'Castillo'),
(4, '0823-0000', 'Jimmy', 'Lomocso'),
(5, '9082-2006', 'Robert', 'Quingking');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `password`, `fname`, `lname`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin', 'admin'),
(11, '9082-2006', '4b8815283c3940186e173f051af7e0b69249773c', 'Robert', 'Quingking', 'teacher'),
(13, '0823-0000', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Jimmy', 'Lomocso', 'teacher'),
(18, '0001-2014', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Cherry', 'Aguaviva', 'student'),
(20, '0827-2007', 'f04fa54b89f3d0625862b89b2df7dee113cb322f', 'Jimmy', 'Lomocso', 'student'),
(21, '0023-2008', '8da0de097e7faaf2fbaccdf3abb5c9f1940606c1', 'James', 'Castillo', 'teacher'),
(22, '12345', '8cb2237d0679ca88db6464eac60da96345513964', 'James', 'Castillo', 'teacher'),
(23, '0983-2007', '770b14efc367b23a71ecd25141aea6ec5e55d2fd', 'Mark', 'Pasicaran', 'student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
