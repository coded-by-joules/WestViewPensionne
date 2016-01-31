-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2016 at 02:06 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `tbladdonreserve`
--

CREATE TABLE IF NOT EXISTS `tbladdonreserve` (
`addonid` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Reservation_ID` int(11) NOT NULL,
  `Item` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `UserInCharge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbladdons`
--

CREATE TABLE IF NOT EXISTS `tbladdons` (
`addon_id` int(11) NOT NULL,
  `item` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE IF NOT EXISTS `tblcategories` (
`Category_ID` int(11) NOT NULL,
  `CategoryName` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`Category_ID`, `CategoryName`) VALUES
(1, 'Deluxe'),
(4, 'hhhhh'),
(2, 'Royal');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE IF NOT EXISTS `tblcomment` (
`Comment_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`Comment_ID`, `Customer_ID`, `Comments`) VALUES
(1, 2, 'jkasdjaskjdasjkdasjdjda hahaha');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotifications`
--

CREATE TABLE IF NOT EXISTS `tblnotifications` (
`NotifierID` int(11) NOT NULL,
  `FromUser` varchar(255) NOT NULL,
  `ToUser` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `DateRecieved` date NOT NULL,
  `Unread` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotifications`
--

INSERT INTO `tblnotifications` (`NotifierID`, `FromUser`, `ToUser`, `Message`, `DateRecieved`, `Unread`) VALUES
(1, 'jec', 'admin', 'ansel lim was Checkout to Room Royal In  jec 2016-01-16', '2016-01-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE IF NOT EXISTS `tblpayment` (
`Payment_ID` int(11) NOT NULL,
  `Reservation_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Promo_ID` int(11) NOT NULL,
  `Room_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Payable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaypal`
--

CREATE TABLE IF NOT EXISTS `tblpaypal` (
`customer_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpaypal`
--

INSERT INTO `tblpaypal` (`customer_id`, `balance`) VALUES
(1, 50000),
(2, 43400),
(3, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tblpromotion`
--

CREATE TABLE IF NOT EXISTS `tblpromotion` (
`Promo_ID` int(11) NOT NULL,
  `Room_ID` int(11) NOT NULL,
  `CategoryName` varchar(15) NOT NULL,
  `Promo_Rate` varchar(20) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Date_Start` varchar(200) NOT NULL,
  `Date_End` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE IF NOT EXISTS `tblreservation` (
`Reservation_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `CategoryName` varchar(15) NOT NULL,
  `Room_ID` int(11) NOT NULL,
  `ReservationDate` date NOT NULL,
  `Arrival` date NOT NULL,
  `Departure` date NOT NULL,
  `NumberofDay` int(11) NOT NULL,
  `No_Adult` int(11) NOT NULL,
  `No_Child` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `AddonPayable` int(11) NOT NULL,
  `Downpayment` int(15) NOT NULL,
  `Payable` int(15) NOT NULL,
  `Confirmation` varchar(15) NOT NULL,
  `transaction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`Reservation_ID`, `Customer_ID`, `CategoryName`, `Room_ID`, `ReservationDate`, `Arrival`, `Departure`, `NumberofDay`, `No_Adult`, `No_Child`, `Status`, `AddonPayable`, `Downpayment`, `Payable`, `Confirmation`, `transaction`) VALUES
(1, 2, 'Royal', 123, '2016-01-16', '2016-01-20', '2016-01-22', 2, 1, 2, 'Check Out', 0, 0, 200, 'wv-gi6kwewx', NULL),
(2, 2, 'Deluxe', 321, '2016-01-16', '2016-01-21', '2016-01-23', 2, 2, 2, 'Confirmed', 0, 0, 400, 'wv-w4ozvsnw', 'Complete'),
(3, 2, 'hhhhh', 101, '2016-01-16', '2016-01-20', '2016-01-28', 8, 1, 0, 'Confirmed', 0, 0, 4800, 'wv-an22tfa6', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservationnotify`
--

CREATE TABLE IF NOT EXISTS `tblreservationnotify` (
`NotifierID` int(11) NOT NULL,
  `Confirmation` varchar(255) NOT NULL,
  `ReservationName` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Unread` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreservationnotify`
--

INSERT INTO `tblreservationnotify` (`NotifierID`, `Confirmation`, `ReservationName`, `Message`, `Unread`) VALUES
(1, 'wv-2nftnpr0', 'ansel  lim', 'ansel  lim Was Reserve', 0),
(2, 'wv-r8ccy7ke', 'ansel  lim', 'ansel  lim Was Reserve', 0),
(3, 'wv-3zr8fpsj', 'ansel  lim', 'ansel  lim Was Reserve', 0),
(4, 'wv-gi6kwewx', 'ansel  lim', 'ansel  lim Was Reserve', 0),
(5, 'wv-w4ozvsnw', 'ansel  lim', 'ansel  lim Was Reserve', 0),
(6, 'wv-an22tfa6', 'ansel  lim', 'ansel  lim Was Reserve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblrooms`
--

CREATE TABLE IF NOT EXISTS `tblrooms` (
  `Room_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Rate` varchar(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `No_adult` int(11) NOT NULL,
  `No_child` int(11) NOT NULL,
  `Date_Start` date DEFAULT NULL,
  `Date_End` date DEFAULT NULL,
  `Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrooms`
--

INSERT INTO `tblrooms` (`Room_ID`, `Category_ID`, `Rate`, `Discount`, `Description`, `Status`, `No_adult`, `No_child`, `Date_Start`, `Date_End`, `Image`) VALUES
(101, 4, '600', 99, 'torjeckanan', 'Available', 4, 0, '2016-01-14', '2016-01-17', 'photos/IMG56980f09e7934_2016-01-14.jpg'),
(123, 2, '100', 0, 'we', 'Available', 2, 4, '0000-00-00', '0000-00-00', 'photos/IMG568651f8b9a77_2016-01-01.jpg'),
(321, 1, '200', 20, 'wew', 'Available', 3, 5, '2016-01-12', '2016-01-13', 'photos/IMG568652081ca45_2016-01-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblroomtransfer`
--

CREATE TABLE IF NOT EXISTS `tblroomtransfer` (
`transfer_id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `RoomNumber` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `Rate` int(11) NOT NULL,
  `DateTransfer` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `UserInCharge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE IF NOT EXISTS `tbltransaction` (
`Reservation_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `DateReserve` date NOT NULL,
  `DateIn` date DEFAULT NULL,
  `DateOut` date DEFAULT NULL,
  `Amount` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `UserInCharge` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`Reservation_ID`, `Customer_ID`, `DateReserve`, `DateIn`, `DateOut`, `Amount`, `Status`, `UserInCharge`) VALUES
(1, 2, '2016-01-16', '2016-01-16', '2016-01-16', 200, 'Check Out', 'admin'),
(2, 2, '2016-01-16', '0000-00-00', NULL, 400, 'Pending', 'None'),
(3, 2, '2016-01-16', '0000-00-00', NULL, 4800, 'Confirmed', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransactionwalkin`
--

CREATE TABLE IF NOT EXISTS `tbltransactionwalkin` (
`transactionwalkin_id` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
`Customer_ID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Active` varchar(255) NOT NULL,
  `Verification` int(11) NOT NULL,
  `Code` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Customer_ID`, `FirstName`, `LastName`, `Username`, `Password`, `Contact`, `Email`, `Gender`, `City`, `Country`, `Type`, `Active`, `Verification`, `Code`) VALUES
(1, 'admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '09327272849', 'admin@yahoo.com', 'Male', 'cebu', 'Philippines', 'Administrator', 'Activate', 1, '963b34b394ddf9a0c9f9c14eec8c8041'),
(2, 'ansel', 'lim', 'anselim', '2c090bdb12f051cfd91121c73c6958415840967396a8354acbb3e6f62cc5f807', '09327272849', 'anselim@yahoo.com', 'Male', '0932455556', 'Philippines', 'User', 'Activate', 1, 'c6d978ce8aaf39d57b534b2b8a5dfe24'),
(3, 'jec', 'saban', 'jec', 'bf006926cc6a4b0dfc77f5b798d1ea7f2c438271c120a982dcd346b967e649ae', '09327272845', 'jecsaban@yahoo.com', 'Male', 'cebu', 'Colombia', 'Staff', 'Activate', 1, '519769589d4db63c78c43e1b971d515b'),
(4, 'kitjoseph', 'villacin', 'boydangas', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '23123', 'aasd@gmail.com', 'Male', 'Cebu', 'Philippines', 'User', 'Activate', 0, 'd30bdb30639cb479db6ff4a7af6e0444');

-- --------------------------------------------------------

--
-- Table structure for table `tblwalkins`
--

CREATE TABLE IF NOT EXISTS `tblwalkins` (
`Customer_ID` int(11) NOT NULL,
  `Room_ID` int(11) NOT NULL,
  `CategoryName` varchar(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `ReservationDate` date NOT NULL,
  `Arrival` date NOT NULL,
  `Departure` date NOT NULL,
  `NumberofDays` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Addonpayable` int(11) NOT NULL,
  `Downpayment` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladdonreserve`
--
ALTER TABLE `tbladdonreserve`
 ADD PRIMARY KEY (`addonid`);

--
-- Indexes for table `tbladdons`
--
ALTER TABLE `tbladdons`
 ADD PRIMARY KEY (`addon_id`);

--
-- Indexes for table `tblcategories`
--
ALTER TABLE `tblcategories`
 ADD PRIMARY KEY (`Category_ID`), ADD UNIQUE KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
 ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
 ADD PRIMARY KEY (`NotifierID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
 ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `tblpaypal`
--
ALTER TABLE `tblpaypal`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tblpromotion`
--
ALTER TABLE `tblpromotion`
 ADD PRIMARY KEY (`Promo_ID`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
 ADD PRIMARY KEY (`Reservation_ID`);

--
-- Indexes for table `tblreservationnotify`
--
ALTER TABLE `tblreservationnotify`
 ADD PRIMARY KEY (`NotifierID`);

--
-- Indexes for table `tblrooms`
--
ALTER TABLE `tblrooms`
 ADD PRIMARY KEY (`Room_ID`);

--
-- Indexes for table `tblroomtransfer`
--
ALTER TABLE `tblroomtransfer`
 ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
 ADD PRIMARY KEY (`Reservation_ID`);

--
-- Indexes for table `tbltransactionwalkin`
--
ALTER TABLE `tbltransactionwalkin`
 ADD PRIMARY KEY (`transactionwalkin_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
 ADD PRIMARY KEY (`Customer_ID`), ADD UNIQUE KEY `Username` (`Username`), ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tblwalkins`
--
ALTER TABLE `tblwalkins`
 ADD PRIMARY KEY (`Customer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladdonreserve`
--
ALTER TABLE `tbladdonreserve`
MODIFY `addonid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbladdons`
--
ALTER TABLE `tbladdons`
MODIFY `addon_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblcategories`
--
ALTER TABLE `tblcategories`
MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
MODIFY `NotifierID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpaypal`
--
ALTER TABLE `tblpaypal`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblpromotion`
--
ALTER TABLE `tblpromotion`
MODIFY `Promo_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblreservationnotify`
--
ALTER TABLE `tblreservationnotify`
MODIFY `NotifierID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblroomtransfer`
--
ALTER TABLE `tblroomtransfer`
MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbltransactionwalkin`
--
ALTER TABLE `tbltransactionwalkin`
MODIFY `transactionwalkin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblwalkins`
--
ALTER TABLE `tblwalkins`
MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
