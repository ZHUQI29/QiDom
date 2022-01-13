-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2022 at 09:16 PM
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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` varchar(16) NOT NULL,
  `titel` varchar(200) DEFAULT NULL,
  `text` varchar(5000) DEFAULT NULL,
  `photo_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `titel`, `text`, `photo_id`, `username`, `timestamp`, `status`) VALUES
('34523456', 'titel2', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text ', '0105214121938,', 'anonymous', '2022-01-05 20:41:21.000000', NULL),
('234623642346', 'titel 3', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text ', '0105214147724,', 'anonymous', '2022-01-05 20:41:47.000000', NULL),
('6234623455', 'titeeeel', 'text text text text text text text text text text ', '0105214206299,', 'anonymous', '2022-01-05 20:42:06.000000', NULL),
('23452626234', 'news', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text ', '0105214224872,', 'anonymous', '2022-01-05 20:42:24.000000', NULL),
('745672546', 'Breaking News!', 'I love my Schapanuchsifuchsipuchsimuchsi <3', '0106000910366,', 'admin', '2022-01-05 23:09:10.000000', NULL),
('0110002054904', 'KLUGES', 'SCHAPANUCHSIFUCHSIPUCHSIMUCHSIGLUCHSI\r\n<3 <3 <3 <3 <3 ', '', 'admin', '2022-01-09 23:20:54.000000', NULL),
('0113111845862', 'test12', '12345', '', 'admin', '2022-01-13 10:18:45.510060', NULL),
('0113155453880', 'testtt', 'pic test', '0113155453293,0113155453594,0113155453549,0113155453448,', 'admin', '2022-01-13 14:54:53.784326', NULL),
('0113184333879', 'news', 'i love you <3', '', 'admin', '2022-01-13 17:43:33.487938', NULL);

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
  `photo_id` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`ID`, `status`, `anrede`, `vorname`, `nachname`, `plz`, `ort`, `strasse`, `hausnummer`, `birthday`, `email`, `timestamp`, `photo_id`) VALUES
(134021, 0, 'Divers', 'adadad', 'adadadad', 1234, 'fafd', 'dasfafda', 'fasdf', '2022-01-17', 'adadad@mail.com', '2022-01-04 21:58:23.818845', NULL),
(294524, 0, 'Divers', 'Justin', 'Holler', 4214, 'Nebendorf', 'Nebenstraße', '357', '2021-12-30', 'justin@mail.com', '2022-01-06 21:52:29.382132', NULL),
(431622, 0, 'Herr', 'Günther', 'Gaul', 3200, 'Oberdorf', 'kellerstraße', '12/6', '2022-01-03', 'gpunkt@mail.com', '2022-01-06 21:49:20.437444', NULL),
(481832, 0, '---', 'Gaymer', 'Lex', 1420, 'Gaming', 'Gaymer-heaven', '420/69', '2022-01-03', 'gaymerlex@mail.com', '2022-01-06 21:47:38.413151', NULL),
(539966, 0, 'Frau', 'ststst', 'stststtstt', 1234, 'fasfasf', 'fasfdag', 'asdg', '2022-01-10', 'stst@mail.com', '2022-01-04 21:57:49.156936', NULL),
(837353, 0, 'Frau', 'Babsi', 'Bunk', 4294, 'Hinterdorf', 'grünhaus', '23', '2022-01-10', 'cringe@mail.com', '2022-01-06 21:50:59.395516', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ID` varchar(16) NOT NULL,
  `titel` varchar(200) DEFAULT NULL,
  `text` varchar(5000) DEFAULT NULL,
  `photo_id` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` tinyint(4) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ID`, `titel`, `text`, `photo_id`, `username`, `timestamp`, `status`) VALUES
('2546736', 'SO SMORT', 'you are very smort!\r\ni love your smort brain <3', '', 'admin', '2022-01-07 20:03:48.000000', 2),
('34734573', 'ticket1', 'ticket ticketticket ticket', '0107210432726,', 'admin', '2022-01-07 20:04:32.000000', 2),
('34573457', 'ticket 2', 'bli bla blubbaaaa', '0107210454654,', 'admin', '2022-01-07 20:04:54.000000', 2),
('345783658', 'tiiicket', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam deleniti dolor atque nobis dolorum dignissimos velit veniam esse, neque reprehenderit praesentium blanditiis tenetur vel omnis, soluta maxime, recusandae totam quod facere facilis aut officia laborum quo. Quisquam hic sequi enim reiciendis mollitia alias dolorum sapiente necessitatibus nisi et explicabo ipsum, ipsam vitae vero dignissimos natus. Officia expedita aliquam, harum alias optio quia autem tempora quo cumque rerum nulla aperiam quis, blanditiis distinctio adipisci veritatis quam a eum quasi magnam possimus voluptatem? Nihil repellendus consequatur illum, sed minus repellat ducimus totam iste obcaecati, blanditiis tempore vel assumenda id repudiandae! Quibusdam, voluptatem.', '0107210528896,', 'admin', '2022-01-07 20:05:28.000000', 2),
('345734573457', 'lgh sdfg sdgf sdgf sdf', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam deleniti dolor atque nobis dolorum dignissimos velit veniam esse, neque reprehenderit praesentium blanditiis tenetur vel omnis, soluta maxime, recusandae totam quod facere facilis aut officia laborum ', '', 'admin', '2022-01-07 20:05:41.000000', 2),
('5744568459', 'tesst', 'agaggggggggggggggggggggggg dddddddd', '0107210559323,', 'admin', '2022-01-07 20:05:59.000000', 2),
('946783673', 'looooreeeem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam deleniti dolor atque nobis dolorum dignissimos velit veniam esse, neque reprehenderit praesentium blanditiis tenetur vel omnis, soluta maxime, recusandae totam quod facere facilis aut officia laborum quo. Quisquam hic sequi enim reiciendis mollitia alias dolorum sapiente necessitatibus nisi et explicabo ipsum, ipsam vitae vero dignissimos natus. Officia expedita aliquam, harum alias optio.', '0107210642604,', 'admin', '2022-01-07 20:06:42.000000', 2),
('0110002127132', 'chelp', 'I need a bussi from my Schnuchsi :*', '', 'admin', '2022-01-09 23:21:27.000000', 2),
('0113101016887', 'test', 'erzgesrfh', '', 'anonymous', '2022-01-13 09:10:16.000000', 2),
('0113184350306', 'hats eh geklappt', 'hats eh geklappt?', '', 'admin', '2022-01-13 17:43:50.703762', 2);

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
(134021, 'admin', '$2y$12$wRsq3C2RDJ9vxcMMOSNYPel3c1GpkwQvt5dD9cgF3Z6I./HayZ0Ja', 3, '2022-01-04 21:58:23.809913'),
(294524, 'user352', '$2y$12$fGqi1s1qq/vQk4s2jq3TkO0nJpia2uXMlRn7yJMhRwhui7hBLkqpa', 0, '2022-01-06 21:52:29.376848'),
(431622, 'killer6969', '$2y$12$7SbON8o2EytORqj9pLz25eUIYgdL8W8G/xjsdjFF9RJVadk494raS', 0, '2022-01-06 21:49:20.432237'),
(481832, 'gamer420', '$2y$12$Aq9Yr0NcCoC0IDP3oZBeI.RK247azharULWCwY9KD3F8zVYUIlw56', 0, '2022-01-06 21:47:38.405804'),
(539966, 'stechnik', '$2y$12$ayG0cGS8jarUsZUFYrHavurU8Iy33taBOzim6fwSc.hR8AfuuwR0W', 2, '2022-01-04 21:57:49.151650'),
(773601, 'gast', '$2y$12$10cWkiW31r.CcLlNWeoTrudPmmG7djh37sFffjp.IP6EbfxDWijwK', 1, '2022-01-04 21:56:59.244189'),
(837353, 'cringegirl123', '$2y$12$0DTZgxlsqADxn1WA4vb.v.0cy0YFEPNx1QHR.m.FAJv8zTl7xdHDC', 0, '2022-01-06 21:50:59.390258');

--
-- Indexes for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
