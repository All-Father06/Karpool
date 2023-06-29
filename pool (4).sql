-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 08:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pool`
--

-- --------------------------------------------------------

--
-- Table structure for table `1`
--

CREATE TABLE `1` (
  `User` varchar(100) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'Passenger',
  `Startpoint` varchar(500) DEFAULT NULL,
  `Endpoint` varchar(500) DEFAULT NULL,
  `Mobile` int(200) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1`
--

INSERT INTO `1` (`User`, `Type`, `Startpoint`, `Endpoint`, `Mobile`, `Gender`) VALUES
('Atharva', 'Driver', 'Seawoods', 'Powai', 11974131, 'Male'),
('Shabbir', 'Passenger', 'Seawoods', 'Airoli', 917471408, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `4`
--

CREATE TABLE `4` (
  `User` varchar(100) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'Passenger',
  `Startpoint` varchar(500) DEFAULT NULL,
  `Endpoint` varchar(500) DEFAULT NULL,
  `Mobile` int(200) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4`
--

INSERT INTO `4` (`User`, `Type`, `Startpoint`, `Endpoint`, `Mobile`, `Gender`) VALUES
('Atharva', 'Driver', 'Seawoods', 'Airoli', 11974131, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `6`
--

CREATE TABLE `6` (
  `User` varchar(100) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'Passenger',
  `Startpoint` varchar(500) DEFAULT NULL,
  `Endpoint` varchar(500) DEFAULT NULL,
  `Mobile` int(200) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `6`
--

INSERT INTO `6` (`User`, `Type`, `Startpoint`, `Endpoint`, `Mobile`, `Gender`) VALUES
('Atharva', 'Driver', 'Seawoods', 'Bunyan', 11974131, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `Id` int(255) NOT NULL,
  `Driver` varchar(200) NOT NULL,
  `Vehicle` varchar(100) NOT NULL,
  `Numplate` varchar(20) NOT NULL,
  `Startpoint` varchar(180) NOT NULL,
  `Endpoint` varchar(180) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Booked` int(11) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `ap` varchar(10) NOT NULL,
  `waypoint` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`Id`, `Driver`, `Vehicle`, `Numplate`, `Startpoint`, `Endpoint`, `Capacity`, `Booked`, `Cost`, `Date`, `Time`, `ap`, `waypoint`) VALUES
(1, 'Atharva', 'Ertigo', 'MH43BN8682', 'Seawoods', 'Powai', 8, 1, 550, '2023-05-04', '05:30:00', 'Yes', 'Airoli'),
(4, 'Atharva', 'Alto 800', 'MH43BN8682', 'Seawoods', 'Airoli', 3, 0, 200, '2023-05-03', '17:42:00', 'Yes', 'Nerul'),
(6, 'Atharva', 'Alto 800', 'MH43BN8682', 'Seawoods', 'Bunyan', 3, 0, 250, '2023-05-04', '05:30:00', 'Yes', 'Chembur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Phone` int(100) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Vehicle` varchar(80) DEFAULT NULL,
  `numplate` varchar(20) DEFAULT NULL,
  `startpoint` varchar(100) DEFAULT NULL,
  `endpoint` varchar(100) DEFAULT NULL,
  `Userid` int(255) NOT NULL,
  `Gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Phone`, `Email`, `Vehicle`, `numplate`, `startpoint`, `endpoint`, `Userid`, `Gender`) VALUES
('Shabbir', '1234554321', 917471408, 'shabbirtlb@gmail.com', '', '', NULL, NULL, 1, 'Male'),
('Atharva', '1234', 11974131, 'atharva@gmail.com', 'Alto 800', 'MH43BN8682', NULL, NULL, 2, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
