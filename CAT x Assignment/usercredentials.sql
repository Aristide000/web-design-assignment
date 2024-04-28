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
-- Database: `usercredentials`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorizedusers`
--

CREATE TABLE `authorizedusers` (
  `ID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorizedusers`
--

INSERT INTO `authorizedusers` (`ID`, `username`, `email`, `password`) VALUES
(0, 'IRAGUHA Aristide', 'arystoto47@gmail.com', '12345'),
(1, 'MUGISHA Danny', 'mugidan45@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorizedusers`
--
ALTER TABLE `authorizedusers`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
