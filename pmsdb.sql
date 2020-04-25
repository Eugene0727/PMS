-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 09:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `AdminRegDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegDate`) VALUES
(1, 'Janeric Enthusias Madrid', 'jenthusias', '09876543210', 'jenthusiasmadrid@gmail.com', 'c812bb5c79db08f7d489d44c37fe986e', '2020-03-20 13:34:16'),
(2, 'Angela Jesuro', 'angela', '09876543211', 'angelajesuro@gmail.com', '36388794be2cf5f298978498ff3c64a2', '2020-03-27 16:32:40'),
(3, 'Joshua Lepsia', 'joshua', '09876543212', 'joshualepsia@gmail.com', 'd1133275ee2118be63a577af759fc052', '2020-03-27 16:32:57'),
(4, 'Ken Lorilla', 'ken', '09876543213', 'kenlorilla@gmail.com', 'f632fa6f8c3d5f551c5df867588381ab', '2020-03-27 16:33:41'),
(5, 'Eugene Hilario', 'eugene', '09876543214', 'eugenehilario@gmail.com', 'e899c6f51e62080ab6929f2fdced308e', '2020-03-27 16:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbladminprofit`
--

CREATE TABLE `tbladminprofit` (
  `adminProfitId` int(11) NOT NULL,
  `profitDate` date NOT NULL,
  `Income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladminprofit`
--

INSERT INTO `tbladminprofit` (`adminProfitId`, `profitDate`, `Income`) VALUES
(1, '2020-01-17', 90000),
(2, '2020-01-21', 30000),
(3, '2020-01-31', 120000),
(4, '2020-02-14', 30000),
(5, '2020-03-28', 90000),
(6, '2020-03-30', 30000),
(7, '2020-03-31', 30000),
(8, '2020-02-20', 90000),
(9, '2020-02-10', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tblblacklist`
--

CREATE TABLE `tblblacklist` (
  `blacklistId` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerContactNo` varchar(11) NOT NULL,
  `customerPlateNo` varchar(50) NOT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblblacklist`
--

INSERT INTO `tblblacklist` (`blacklistId`, `customerName`, `customerContactNo`, `customerPlateNo`, `areaId`) VALUES
(1, 'Roberto Madrid', '0967564534', 'M099L98', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`brandId`, `brandName`) VALUES
(3, 'Honda'),
(4, 'p'),
(2, 'Toyota'),
(1, 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinessowner`
--

CREATE TABLE `tblbusinessowner` (
  `ownerId` int(11) NOT NULL,
  `businessOwnerName` varchar(50) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `sexId` int(11) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `dateOfRegistration` date NOT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbusinessowner`
--

INSERT INTO `tblbusinessowner` (`ownerId`, `businessOwnerName`, `companyName`, `sexId`, `userName`, `password`, `contact`, `email`, `status`, `dateOfRegistration`, `areaId`) VALUES
(1, 'Ayra Ureta', 'PNC', 1, 'ayra', '9b6e97d2c52910f737056e5fbaa5785a', '09876543210', 'ayraureta@gmail.com', 'Active', '2020-04-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbusinesspartner`
--

CREATE TABLE `tblbusinesspartner` (
  `areaId` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `businessName` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateBecomePartner` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbusinesspartner`
--

INSERT INTO `tblbusinesspartner` (`areaId`, `companyName`, `businessName`, `location`, `contactNo`, `emailAddress`, `status`, `dateBecomePartner`) VALUES
(1, 'PNC', 'Pamantasan Student Lot', 'Banay-banay', '09765785675', 'pnc@gmail.com', 'Active', '2020-03-28'),
(2, 'SVCC', 'Vicentians Parking', 'San Isidro', '09675645645', 'svcc@gmail.com', 'Active', '2020-03-28'),
(3, 'Holy Redeemer', 'Holy Parking Station', 'San Isidro', '09656453453', 'holyredeemer@gmailcom', 'Not Active', '2020-03-30'),
(4, 'Malayan', 'Malaya Ka Na Parking Lot', 'San Isidro', '09656454534', 'malayan@gmail.com', 'Active', '2020-03-31'),
(5, 'LPU', 'LPU Parking Lot', 'Pulo', '09564567787', 'lpu@gmailcom', 'Active', '2020-03-31'),
(6, 'FEU', 'FEU Parking Slot', 'Pulo', '09656454755', 'feu@gmail.com', 'Active', '2020-03-31'),
(7, 'UST', 'UST Parking Slot', 'Manila', '09654534334', 'ust@gmail.com', 'Active', '2020-03-31'),
(8, 'CALA', 'Cala Mo Parking Slot', 'Luzon', '09765654564', 'cala@gmail.com', 'Active', '2020-03-31'),
(9, 'Shon', 'Shoneng Park a lot', 'Visayas', '09756564654', 'shon@gmail.com', 'Active', '2019-05-04'),
(10, 'HHH', 'H Park', 'San Isidro', '09656545645', 'hhh@gmail.com', 'Not Active', '2019-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `categoryId` int(11) NOT NULL,
  `VehicleCat` varchar(50) NOT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`categoryId`, `VehicleCat`, `areaId`) VALUES
(1, 'Tricycle', 1),
(2, 'Motorcycle', 1),
(3, 'Bicycle', 1),
(4, 'Tricycle', 2),
(5, 'Motorcycle', 2),
(6, 'Bus', 1),
(7, 'Truck', 1),
(8, 'Motor', 1),
(9, 'tric', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `ReferenceNo` int(11) NOT NULL,
  `ParkingSlot` varchar(50) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `PlateNo` varchar(50) NOT NULL,
  `OwnerName` varchar(50) NOT NULL,
  `sexId` int(11) NOT NULL,
  `OwnerContactNumber` varchar(11) NOT NULL,
  `InTime` datetime NOT NULL,
  `OutTime` datetime DEFAULT NULL,
  `remarks` varchar(50) NOT NULL,
  `Bill` decimal(10,2) DEFAULT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`ReferenceNo`, `ParkingSlot`, `categoryId`, `brandId`, `PlateNo`, `OwnerName`, `sexId`, `OwnerContactNumber`, `InTime`, `OutTime`, `remarks`, `Bill`, `areaId`) VALUES
(1, 'A4', 1, 1, 'N977O55', 'Hazel Pedralvez', 1, '0987654399', '2020-04-04 11:13:40', NULL, 'None', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `notifId` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `areaId` int(11) DEFAULT NULL,
  `notifTo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotification`
--

INSERT INTO `tblnotification` (`notifId`, `message`, `date`, `status`, `areaId`, `notifTo`) VALUES
(1, 'HHH 1 year contract will be due 1 month from now.', '2020-04-04 10:03:00', 'unread', NULL, 'superAdmin'),
(2, 'HHH 1 year contract is due.', '2020-04-04 10:04:00', 'unread', NULL, 'superAdmin'),
(3, 'Shon company 1 year contract is due.', '2020-04-04 10:11:30', 'unread', NULL, 'superAdmin'),
(4, 'Shon company 1 year contract will be due 1 month from now.', '2020-04-04 22:26:56', 'unread', NULL, 'superAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `tblparkingslot`
--

CREATE TABLE `tblparkingslot` (
  `slotId` int(11) NOT NULL,
  `slotName` varchar(50) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `areaId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblparkingslot`
--

INSERT INTO `tblparkingslot` (`slotId`, `slotName`, `categoryId`, `areaId`, `status`) VALUES
(1, 'A1', 1, 1, 'Reserved'),
(2, 'A2', 2, 1, 'Reserved'),
(3, 'A3', 3, 1, 'Occupied'),
(4, 'N1', 4, 2, 'Reserved'),
(5, 'A12', 1, 1, 'Reserved'),
(6, 'A4', 1, 1, 'Available'),
(7, 'A5', 2, 1, 'Available'),
(8, 'A6', 3, 1, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblpeoplelist`
--

CREATE TABLE `tblpeoplelist` (
  `peopleId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `positionId` int(11) NOT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpeoplelist`
--

INSERT INTO `tblpeoplelist` (`peopleId`, `userName`, `password`, `positionId`, `areaId`) VALUES
(1, 'ayra', '9b6e97d2c52910f737056e5fbaa5785a', 1, 1),
(2, 'nerie', 'd1383314820de326776dbc8790684b82', 1, 2),
(3, 'hazel', '16b9652df79d0e4784bdbf478c9f4fee', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblposition`
--

CREATE TABLE `tblposition` (
  `positionId` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`positionId`, `description`) VALUES
(1, 'Business Associate'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tblprofilepic`
--

CREATE TABLE `tblprofilepic` (
  `profileId` int(11) NOT NULL,
  `profilePic` longtext NOT NULL,
  `ownerId` int(11) DEFAULT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprofilepic`
--

INSERT INTO `tblprofilepic` (`profileId`, `profilePic`, `ownerId`, `ID`) VALUES
(1, '80600406_2658065600946126_7155734051385507840_o.jpg', NULL, 1),
(2, '13240749_802622089839781_5558941311686626217_n.jpg', NULL, 4),
(3, '84614837_2825518400870197_2270036678615760896_o.jpg', NULL, 5),
(4, '31939699_1726432447402570_6964364645276581888_o.jpg', NULL, 2),
(5, '60485114_826785931028910_6345988241979604992_o.jpg', NULL, 3),
(6, '90704314_2888326377899219_8011790745092489216_o.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblprofit`
--

CREATE TABLE `tblprofit` (
  `profitId` int(11) NOT NULL,
  `profitDate` date NOT NULL,
  `Income` int(11) NOT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprofit`
--

INSERT INTO `tblprofit` (`profitId`, `profitDate`, `Income`, `areaId`) VALUES
(1, '2020-03-28', 33, 1),
(2, '2020-03-30', 500, 1),
(3, '2020-04-01', 10000, 1),
(4, '2020-03-31', 4500, 2),
(5, '2020-04-02', 30000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsex`
--

CREATE TABLE `tblsex` (
  `sexId` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsex`
--

INSERT INTO `tblsex` (`sexId`, `description`) VALUES
(1, 'Female'),
(2, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `AdminName` (`AdminName`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `MobileNumber` (`MobileNumber`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tbladminprofit`
--
ALTER TABLE `tbladminprofit`
  ADD PRIMARY KEY (`adminProfitId`);

--
-- Indexes for table `tblblacklist`
--
ALTER TABLE `tblblacklist`
  ADD PRIMARY KEY (`blacklistId`),
  ADD UNIQUE KEY `customerName` (`customerName`),
  ADD UNIQUE KEY `customerContactNo` (`customerContactNo`),
  ADD UNIQUE KEY `customerPlateNo` (`customerPlateNo`),
  ADD KEY `areaId` (`areaId`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`brandId`),
  ADD UNIQUE KEY `brandName` (`brandName`);

--
-- Indexes for table `tblbusinessowner`
--
ALTER TABLE `tblbusinessowner`
  ADD PRIMARY KEY (`ownerId`),
  ADD UNIQUE KEY `businessOwnerName` (`businessOwnerName`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD KEY `areaId` (`areaId`),
  ADD KEY `sexId` (`sexId`);

--
-- Indexes for table `tblbusinesspartner`
--
ALTER TABLE `tblbusinesspartner`
  ADD PRIMARY KEY (`areaId`),
  ADD UNIQUE KEY `companyName` (`companyName`),
  ADD UNIQUE KEY `businessName` (`businessName`),
  ADD UNIQUE KEY `contactNo` (`contactNo`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `areaId` (`areaId`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`ReferenceNo`),
  ADD UNIQUE KEY `PlateNo` (`PlateNo`),
  ADD UNIQUE KEY `OwnerContactNumber` (`OwnerContactNumber`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `areaId` (`areaId`),
  ADD KEY `sexId` (`sexId`);

--
-- Indexes for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`notifId`),
  ADD KEY `areaId` (`areaId`);

--
-- Indexes for table `tblparkingslot`
--
ALTER TABLE `tblparkingslot`
  ADD PRIMARY KEY (`slotId`),
  ADD KEY `areaId` (`areaId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `tblpeoplelist`
--
ALTER TABLE `tblpeoplelist`
  ADD PRIMARY KEY (`peopleId`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD KEY `areaId` (`areaId`),
  ADD KEY `position` (`positionId`);

--
-- Indexes for table `tblposition`
--
ALTER TABLE `tblposition`
  ADD PRIMARY KEY (`positionId`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `tblprofilepic`
--
ALTER TABLE `tblprofilepic`
  ADD PRIMARY KEY (`profileId`),
  ADD KEY `ownerId` (`ownerId`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `tblprofit`
--
ALTER TABLE `tblprofit`
  ADD PRIMARY KEY (`profitId`),
  ADD KEY `areaId` (`areaId`);

--
-- Indexes for table `tblsex`
--
ALTER TABLE `tblsex`
  ADD PRIMARY KEY (`sexId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblblacklist`
--
ALTER TABLE `tblblacklist`
  ADD CONSTRAINT `tblblacklist_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`);

--
-- Constraints for table `tblbusinessowner`
--
ALTER TABLE `tblbusinessowner`
  ADD CONSTRAINT `FK_businessAreaId` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblbusinessowner_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`),
  ADD CONSTRAINT `tblbusinessowner_ibfk_2` FOREIGN KEY (`sexId`) REFERENCES `tblsex` (`sexId`);

--
-- Constraints for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD CONSTRAINT `FK_categoryAreaId` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblcategory_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`);

--
-- Constraints for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD CONSTRAINT `FK_brandId` FOREIGN KEY (`brandId`) REFERENCES `tblbrand` (`brandId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_customerAreaId` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblcustomer_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`),
  ADD CONSTRAINT `tblcustomer_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `tblcategory` (`categoryId`),
  ADD CONSTRAINT `tblcustomer_ibfk_3` FOREIGN KEY (`brandId`) REFERENCES `tblbrand` (`brandId`),
  ADD CONSTRAINT `tblcustomer_ibfk_4` FOREIGN KEY (`sexId`) REFERENCES `tblsex` (`sexId`);

--
-- Constraints for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD CONSTRAINT `tblnotification_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`);

--
-- Constraints for table `tblparkingslot`
--
ALTER TABLE `tblparkingslot`
  ADD CONSTRAINT `FK_categoryId` FOREIGN KEY (`categoryId`) REFERENCES `tblcategory` (`categoryId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_parkingAreaId` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblparkingslot_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`);

--
-- Constraints for table `tblpeoplelist`
--
ALTER TABLE `tblpeoplelist`
  ADD CONSTRAINT `FK_peopleAreaId` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblpeoplelist_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`),
  ADD CONSTRAINT `tblpeoplelist_ibfk_2` FOREIGN KEY (`positionId`) REFERENCES `tblposition` (`positionId`);

--
-- Constraints for table `tblprofilepic`
--
ALTER TABLE `tblprofilepic`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`ID`) REFERENCES `tbladmin` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ownerId` FOREIGN KEY (`ownerId`) REFERENCES `tblbusinessowner` (`ownerId`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblprofilepic_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `tblbusinessowner` (`ownerId`),
  ADD CONSTRAINT `tblprofilepic_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `tbladmin` (`ID`);

--
-- Constraints for table `tblprofit`
--
ALTER TABLE `tblprofit`
  ADD CONSTRAINT `FK_profitAreaId` FOREIGN KEY (`areaId`) REFERENCES `tblbusinesspartner` (`areaId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
