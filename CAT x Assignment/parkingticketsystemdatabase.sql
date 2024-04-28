-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 12:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkingticketsystemdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `parkingticketinfo`
--

CREATE TABLE `parkingticketinfo` (
  `Ticket ID` int(50) NOT NULL,
  `IssueDate&Time` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Violation type` varchar(50) NOT NULL,
  `FineAmount` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `UserID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkingticketinfo`
--

INSERT INTO `parkingticketinfo` (`Ticket ID`, `IssueDate&Time`, `Location`, `Violation type`, `FineAmount`, `Status`, `UserID`) VALUES
(0, '2024/02/18  08:00', 'Lot5', 'Double Parking ', '60000', 'pending', 3),
(1, '2024/02/18  08:00', 'Lot1', 'Parking in Handicap Spot', '57749', 'Active', 1),
(2, '2024/02/18  08:00', 'Lot8', 'Parking in One Spot for More than 24 Hours', '60000', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `PaymentID` int(50) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `AmountPaid` varchar(50) NOT NULL,
  `PaymentDate&Time` varchar(50) NOT NULL,
  `TransactionID` varchar(50) NOT NULL,
  `UserID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`PaymentID`, `PaymentMethod`, `AmountPaid`, `PaymentDate&Time`, `TransactionID`, `UserID`) VALUES
(0, 'Cash', '30000', '2024/02/18  08:00', '6498430', 1),
(1, 'Cash', '4000', '2024/02/18  08:00', '650003438', 3),
(2, 'Momopay', '30000', '2024/02/18  08:00', '75973993', 2),
(3, 'Cash', '19000', '2024/02/18  08:00', '648757839', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserID` int(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `VehicleID` varchar(50) NOT NULL,
  `LicensePlate` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `Firstname`, `Lastname`, `Telephone`, `Address`, `VehicleID`, `LicensePlate`, `Model`) VALUES
(1, 'Mugisha', 'Salomon', '+250782979568', 'Remera', '783gf920bcye', 'RAE380E', ' Hyundai Kona'),
(2, 'KAGABO', 'Methode', '+250788888888', 'Kayonza', '783gf920bzzzz', 'RAE888E', 'Hyundai Tucson'),
(3, 'Mugisha', 'Danny', '+25070000000', 'Kimironko', '783gbbvbfhd', 'RAE000E', 'Hyundai Santa Fe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parkingticketinfo`
--
ALTER TABLE `parkingticketinfo`
  ADD PRIMARY KEY (`Ticket ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parkingticketinfo`
--
ALTER TABLE `parkingticketinfo`
  ADD CONSTRAINT `parkingticketinfo_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`);

--
-- Constraints for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD CONSTRAINT `paymentinfo_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
