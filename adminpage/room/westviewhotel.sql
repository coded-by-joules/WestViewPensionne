-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2015 at 09:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `westviewhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE IF NOT EXISTS `tblcategories` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(15) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`Category_ID`, `CategoryName`) VALUES
(1, 'Royal');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE IF NOT EXISTS `tblcomment` (
  `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_ID` int(11) NOT NULL,
  `Comments` text NOT NULL,
  PRIMARY KEY (`Comment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE IF NOT EXISTS `tblcustomers` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Province` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`Customer_ID`, `FirstName`, `LastName`, `City`, `Address`, `Province`, `Country`, `Username`, `Password`, `Contact`, `Email`) VALUES
(1, 'ansel', 'lim', 'cebu', 'kin', 'cebu', 'Philippines', 'ansel', '12345678', '09', 'anselim@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE IF NOT EXISTS `tblpayment` (
  `Payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Reservation_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Promo_ID` int(11) NOT NULL,
  `Room_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Payable` varchar(20) NOT NULL,
  PRIMARY KEY (`Payment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpromotion`
--

CREATE TABLE IF NOT EXISTS `tblpromotion` (
  `Promo_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Room_ID` int(11) NOT NULL,
  `CategoryName` varchar(15) NOT NULL,
  `Promo_Rate` varchar(20) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Date_Start` varchar(200) NOT NULL,
  `Date_End` varchar(200) NOT NULL,
  PRIMARY KEY (`Promo_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE IF NOT EXISTS `tblreservation` (
  `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Room_ID` int(11) NOT NULL,
  `Arrival` varchar(30) NOT NULL,
  `Departure` varchar(30) NOT NULL,
  `Payable` varchar(20) NOT NULL,
  `Confirmation` varchar(15) NOT NULL,
  PRIMARY KEY (`Reservation_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`Reservation_ID`, `Customer_ID`, `Category_ID`, `Room_ID`, `Arrival`, `Departure`, `Payable`, `Confirmation`) VALUES
(4, 1, 1, 21, '09/09/2015', '17/09/2015', '100', 'jzgymr35'),
(5, 1, 1, 21, '09/09/2015', '17/09/2015', '100', 'h3x5ayc5');

-- --------------------------------------------------------

--
-- Table structure for table `tblrooms`
--

CREATE TABLE IF NOT EXISTS `tblrooms` (
  `Room_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Rate` varchar(11) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `No_adult` int(11) NOT NULL,
  `No_child` int(11) NOT NULL,
  `Image` varchar(200) NOT NULL,
  PRIMARY KEY (`Room_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrooms`
--

INSERT INTO `tblrooms` (`Room_ID`, `Category_ID`, `Rate`, `Description`, `Status`, `No_adult`, `No_child`, `Image`) VALUES
(21, 1, '100', 'wew', 'Available', 1, 1, 'photos/img018.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Usertype` varchar(15) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblwalkins`
--

CREATE TABLE IF NOT EXISTS `tblwalkins` (
  `Customer_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Room_ID` int(11) NOT NULL,
  `Promo_ID` int(11) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
