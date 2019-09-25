-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2012 at 02:03 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doctorslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `date` date NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `doc_name` varchar(30) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `pat_name` text NOT NULL,
  `pat_mobile` varchar(12) NOT NULL,
  `seid` text NOT NULL,
  `daid` int(11) NOT NULL,
  `pat_email` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`date`, `dept_name`, `doc_name`, `pat_id`, `pat_name`, `pat_mobile`, `seid`, `daid`, `pat_email`) VALUES
('2012-12-04', '1', '1', 0, 'roga vai', '0161777788', '', 0, 'rogavai@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` text NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Department 1'),
(2, 'Department 2'),
(3, 'Department 3'),
(4, 'Department 4'),
(5, 'Department 5'),
(6, 'Department 6'),
(7, 'Department 7');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `approval` int(11) NOT NULL DEFAULT '0',
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_dept` text NOT NULL,
  `doc_dept_id` int(11) NOT NULL,
  `doc_name` text NOT NULL,
  `doc_img` text NOT NULL,
  `doc_qualification` text NOT NULL,
  `doc_sche_date` text NOT NULL,
  `doc_sche_time` text NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`approval`, `doc_id`, `doc_dept`, `doc_dept_id`, `doc_name`, `doc_img`, `doc_qualification`, `doc_sche_date`, `doc_sche_time`) VALUES
(1, 1, 'Department 1', 1, 'Dr. Salman Hossain', 'doc_1356681925.jpg', 'Class1', 'Sun-Thu', '7.00-10.00'),
(0, 10, 'Department 3', 3, 'habu', 'doc_1355498790.png', 'kabu', 'sun', '7.00pm'),
(0, 14, 'Department 1', 1, 'sohel', 'doc_1356625487.jpg', 'ha ha ha', '10.00', '01.00'),
(0, 18, 'Department 7', 7, 'Sohel', 'doc_1356682090.jpg', ':P', '9.00am', '10.00pm'),
(0, 19, 'Department 1', 1, 'Dr. Arman Khan', 'doc_1356682254.jpg', 'infinity ', '10.00 am', '01.00 pm'),
(0, 20, 'Department 2', 2, 'Dr Jahingir Gafur', 'doc_1356682586.jpg', 'M.B.B.S', '9.00am', '01.00 pm'),
(0, 21, 'Department 4', 4, 'Dr. Arman', 'doc_1356682647.jpg', 'chata', '9.00am', '10.00pm'),
(0, 22, 'Department 5', 5, 'Dr. Vilen', 'doc_1356682710.png', 'kill', '10.00', '01.00'),
(0, 23, 'Department 6', 6, 'Dr. Namhin', 'doc_1356682789.jpg', 'namchara', '9.00am', '01.00pm');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user`, `pass`, `role`) VALUES
(1, 'admin', 'admin', 'administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
