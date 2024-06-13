-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 11:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `history`
--

-- --------------------------------------------------------

--
-- Table structure for table `air_conditioner`
--

CREATE TABLE `air_conditioner` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Technician` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `air_pump`
--

CREATE TABLE `air_pump` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artesian_well`
--

CREATE TABLE `artesian_well` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boiler`
--

CREATE TABLE `boiler` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boiling_pot`
--

CREATE TABLE `boiling_pot` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `electricity`
--

CREATE TABLE `electricity` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elevator`
--

CREATE TABLE `elevator` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fire_alarm`
--

CREATE TABLE `fire_alarm` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freezer`
--

CREATE TABLE `freezer` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Freezer_name` varchar(100) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Technician` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gas`
--

CREATE TABLE `gas` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ice_maker`
--

CREATE TABLE `ice_maker` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `light_sign`
--

CREATE TABLE `light_sign` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Technician` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retort`
--

CREATE TABLE `retort` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `safety_officer`
--

CREATE TABLE `safety_officer` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sound_system`
--

CREATE TABLE `sound_system` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telephone`
--

CREATE TABLE `telephone` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `television`
--

CREATE TABLE `television` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Technician` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Status`) VALUES
(1, 'Chayathon', '135790', 2);

-- --------------------------------------------------------

--
-- Table structure for table `water`
--

CREATE TABLE `water` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_heater`
--

CREATE TABLE `water_heater` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_injection_pump`
--

CREATE TABLE `water_injection_pump` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_treatment`
--

CREATE TABLE `water_treatment` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Quotation` varchar(100) NOT NULL,
  `Bill` varchar(100) NOT NULL,
  `By` varchar(100) NOT NULL,
  `Lastestdate` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `air_conditioner`
--
ALTER TABLE `air_conditioner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `air_pump`
--
ALTER TABLE `air_pump`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `artesian_well`
--
ALTER TABLE `artesian_well`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `boiler`
--
ALTER TABLE `boiler`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `boiling_pot`
--
ALTER TABLE `boiling_pot`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `electricity`
--
ALTER TABLE `electricity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `elevator`
--
ALTER TABLE `elevator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fire_alarm`
--
ALTER TABLE `fire_alarm`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `freezer`
--
ALTER TABLE `freezer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gas`
--
ALTER TABLE `gas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ice_maker`
--
ALTER TABLE `ice_maker`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `light_sign`
--
ALTER TABLE `light_sign`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `retort`
--
ALTER TABLE `retort`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `safety_officer`
--
ALTER TABLE `safety_officer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sound_system`
--
ALTER TABLE `sound_system`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `television`
--
ALTER TABLE `television`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `water`
--
ALTER TABLE `water`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `water_heater`
--
ALTER TABLE `water_heater`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `water_injection_pump`
--
ALTER TABLE `water_injection_pump`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `water_treatment`
--
ALTER TABLE `water_treatment`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `air_conditioner`
--
ALTER TABLE `air_conditioner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `air_pump`
--
ALTER TABLE `air_pump`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artesian_well`
--
ALTER TABLE `artesian_well`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boiler`
--
ALTER TABLE `boiler`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boiling_pot`
--
ALTER TABLE `boiling_pot`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electricity`
--
ALTER TABLE `electricity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elevator`
--
ALTER TABLE `elevator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fire_alarm`
--
ALTER TABLE `fire_alarm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freezer`
--
ALTER TABLE `freezer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gas`
--
ALTER TABLE `gas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ice_maker`
--
ALTER TABLE `ice_maker`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `light_sign`
--
ALTER TABLE `light_sign`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retort`
--
ALTER TABLE `retort`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safety_officer`
--
ALTER TABLE `safety_officer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sound_system`
--
ALTER TABLE `sound_system`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `television`
--
ALTER TABLE `television`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `water`
--
ALTER TABLE `water`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `water_heater`
--
ALTER TABLE `water_heater`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `water_injection_pump`
--
ALTER TABLE `water_injection_pump`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `water_treatment`
--
ALTER TABLE `water_treatment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
