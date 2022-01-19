-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2022 at 10:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technikum-wsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` varchar(16) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `text` varchar(2500) DEFAULT NULL,
  `photo_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `cid` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` varchar(16) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `text` varchar(5000) DEFAULT NULL,
  `photo_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `anrede` varchar(10) DEFAULT NULL,
  `vorname` varchar(50) DEFAULT NULL,
  `nachname` varchar(50) DEFAULT NULL,
  `plz` mediumint(8) UNSIGNED DEFAULT NULL,
  `ort` varchar(20) DEFAULT NULL,
  `strasse` varchar(50) DEFAULT NULL,
  `hausnummer` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `timestamp` timestamp(6) NULL DEFAULT current_timestamp(6),
  `photo_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`ID`, `status`, `anrede`, `vorname`, `nachname`, `plz`, `ort`, `strasse`, `hausnummer`, `birthday`, `email`, `timestamp`, `photo_id`) VALUES
(570337, 0, '---', '---', '---', 0, '---', '---', '---', '2022-01-19', '---', '2022-01-19 21:10:22.039198', '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ID` varchar(16) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `text` varchar(5000) DEFAULT NULL,
  `photo_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` tinyint(4) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` tinyint(3) UNSIGNED DEFAULT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `level`, `timestamp`) VALUES
(570337, 'admin', '$2y$12$hYmVs9PE3R/4mJYLcWjqy.LcYI4iM/kHWgSS/EAiAwfZfFiHM.RU.', 3, '2022-01-19 21:10:22.033802');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `timestamp` (`timestamp`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `timestamp` (`timestamp`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD UNIQUE KEY `timestamp` (`timestamp`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
