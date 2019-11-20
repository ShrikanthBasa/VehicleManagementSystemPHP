-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 09:35 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicleMNG`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchID` varchar(5) NOT NULL,
  `BranchName` varchar(15) DEFAULT NULL,
  `branchPhone` bigint(20) DEFAULT NULL,
  `BranchAdd` varchar(30) DEFAULT NULL,
  `BEmail` varchar(20) DEFAULT NULL,
  `Bpass` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `BranchName`, `branchPhone`, `BranchAdd`, `BEmail`, `Bpass`) VALUES
('B001', 'Dahisar', 8898072782, 'S.V Road , Dahisar(west)', 'dahisar@gmail.com', '123456'),
('B002', 'Borivali', 995682545, 'Near Station, Borivali east', 'borivali@gmail.com', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `clogin`
--

CREATE TABLE `clogin` (
  `CID` int(11) NOT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clogin`
--

INSERT INTO `clogin` (`CID`, `mobile`, `email`, `pass`) VALUES
(1122, 98789729, 'shrikanth@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cust_status`
--

CREATE TABLE `cust_status` (
  `FK_CID` int(11) DEFAULT NULL,
  `FK_Driver` int(11) DEFAULT NULL,
  `pickLoc` varchar(15) DEFAULT NULL,
  `dropLoc` varchar(15) DEFAULT NULL,
  `isComplete` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `Lic_No` int(11) NOT NULL,
  `Name` varchar(15) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `Exp` float DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `FK_BID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`Lic_No`, `Name`, `Salary`, `month`, `year`, `Exp`, `Rating`, `FK_BID`) VALUES
(123456, 'shrikanth basa', 20000, 'June', 2011, 8, 4.8, 'B001');

-- --------------------------------------------------------

--
-- Table structure for table `driveravail`
--

CREATE TABLE `driveravail` (
  `DriverId` int(11) DEFAULT NULL,
  `cur_loc` varchar(20) DEFAULT NULL,
  `isAvail` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ephone`
--

CREATE TABLE `ephone` (
  `FK_Driver` int(11) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ephone`
--

INSERT INTO `ephone` (`FK_Driver`, `phone`) VALUES
(123456, 9823876787),
(123456, 9823876789);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `RegNo` int(11) NOT NULL,
  `Model` varchar(15) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Distance` int(11) DEFAULT NULL,
  `costperkm` float DEFAULT NULL,
  `Fueltype` varchar(8) DEFAULT NULL,
  `FK_BID` varchar(5) DEFAULT NULL,
  `FK_Driver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`RegNo`, `Model`, `Capacity`, `Distance`, `costperkm`, `Fueltype`, `FK_BID`, `FK_Driver`) VALUES
(112211, 'Tavera', 8, 10937, 7, 'Petrol', 'B001', NULL),
(432442, 'Maruti', 4, 23453, 7.2, 'Diesel', 'B001', NULL),
(902378, 'safari', 5, 18671, 7, 'Petrol', 'B001', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `clogin`
--
ALTER TABLE `clogin`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `cust_status`
--
ALTER TABLE `cust_status`
  ADD KEY `FK_CID` (`FK_CID`),
  ADD KEY `FK_Driver` (`FK_Driver`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Lic_No`),
  ADD KEY `FK_BID` (`FK_BID`);

--
-- Indexes for table `driveravail`
--
ALTER TABLE `driveravail`
  ADD KEY `DriverId` (`DriverId`);

--
-- Indexes for table `ephone`
--
ALTER TABLE `ephone`
  ADD KEY `FK_Driver` (`FK_Driver`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`RegNo`),
  ADD KEY `FK_BID` (`FK_BID`),
  ADD KEY `FK_Driver` (`FK_Driver`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cust_status`
--
ALTER TABLE `cust_status`
  ADD CONSTRAINT `cust_status_ibfk_1` FOREIGN KEY (`FK_CID`) REFERENCES `clogin` (`CID`),
  ADD CONSTRAINT `cust_status_ibfk_2` FOREIGN KEY (`FK_Driver`) REFERENCES `driver` (`Lic_No`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`FK_BID`) REFERENCES `branch` (`BranchID`);

--
-- Constraints for table `driveravail`
--
ALTER TABLE `driveravail`
  ADD CONSTRAINT `driveravail_ibfk_1` FOREIGN KEY (`DriverId`) REFERENCES `driver` (`Lic_No`);

--
-- Constraints for table `ephone`
--
ALTER TABLE `ephone`
  ADD CONSTRAINT `ephone_ibfk_1` FOREIGN KEY (`FK_Driver`) REFERENCES `driver` (`Lic_No`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`FK_BID`) REFERENCES `branch` (`BranchID`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`FK_Driver`) REFERENCES `driver` (`Lic_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
