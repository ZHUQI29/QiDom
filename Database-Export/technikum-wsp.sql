-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2022 at 05:24 PM
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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `title`, `text`, `photo_id`, `username`, `timestamp`, `cid`) VALUES
('0113111845862', 'gjgfh', 'kfhkfhk', 'banner', 'test', '2022-01-16 21:34:42.761502', 2),
('0113111845862', 'jhl', 'lgljfl', 'banner', 'test', '2022-01-16 21:35:11.836856', 3),
('6234623455', 'safd', 'adhgdfj', 'banner', 'test', '2022-01-16 21:35:41.324931', 4),
('0117151357975', 'teeest', 'tessst', '0117151204510,', 'admin', '2022-01-17 14:14:13.469023', 5),
('34523456', 'asd', 'asd', 'banner', 'g', '2022-01-17 16:17:36.169852', 6);

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `title`, `text`, `photo_id`, `username`, `timestamp`, `status`) VALUES
('34523456', 'titel2', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text ', '0105214121938,', 'anonymous', '2022-01-05 20:41:21.000000', NULL),
('6234623455', 'titeeeel', 'text text text text text text text text text text ', '0105214206299,', 'anonymous', '2022-01-05 20:42:06.000000', NULL),
('745672546', 'Breaking News!', 'I love my Schapanuchsifuchsipuchsimuchsi <3', '0106000910366,', 'admin', '2022-01-05 23:09:10.000000', NULL),
('0110002054904', 'KLUGES', 'SCHAPANUCHSIFUCHSIPUCHSIMUCHSIGLUCHSI\r\n<3 <3 <3 <3 <3 x3\r\naaaaaaand i love you <3', '', 'admin', '2022-01-09 23:20:54.000000', NULL),
('0113111845862', 'test12', '12345', '', 'admin', '2022-01-13 10:18:45.510060', NULL),
('0113155453880', 'testtt', 'pic test', '0113155453293,0113155453594,0113155453549,0113155453448,', 'admin', '2022-01-13 14:54:53.784326', NULL),
('0113184333879', 'news', 'i love you <3', '', 'admin', '2022-01-13 17:43:33.487938', NULL),
('0113225143925', 'drzjsrhjw4h', 'awthbswr4tjhswtjswjswj w 4jsw4j', '', 'admin', '2022-01-13 21:51:43.536609', NULL),
('0113225148940', 'rstj rsj', 'srzjsrtjthjasw4 jw jasw jas ej', '', 'admin', '2022-01-13 21:51:48.890894', NULL),
('0113225153565', 'srtjsrt jsr', 'jsrtjsrt js rjsthjjswj', '', 'admin', '2022-01-13 21:51:53.925688', NULL),
('0113225158402', 'drjst', 'jsrtjulguiö öö rö zli', '', 'admin', '2022-01-13 21:51:58.302331', NULL),
('0113225202648', 'uiötglrf e', 'e 57ie46i e56zhu 5j', '', 'admin', '2022-01-13 21:52:02.502375', NULL),
('0113225206249', 'kfz ukdftuk dtk', 'dtkfzul6r8ldkuk', '', 'admin', '2022-01-13 21:52:06.417007', NULL),
('0113225210844', 'zuloäötö', 'zötz8özldhazh', '', 'admin', '2022-01-13 21:52:10.241830', NULL),
('0113225215228', 'shrthsth', 'srthsthsrtjuskjdtlkdftk', '', 'admin', '2022-01-13 21:52:15.378987', NULL),
('0113225231532', 'sehsdrj', 'drzjdzjszj', '', 'admin', '2022-01-13 21:52:31.743382', NULL),
('0113225234762', 'zulkfzkl', 'fzlufzlfzl', '', 'admin', '2022-01-13 21:52:34.796550', NULL),
('0113225242743', '22.', 'drfgjsrjasd', '', 'admin', '2022-01-13 21:52:42.976241', 0),
('0116220930347', 'sad', 'asfsagf', ' ', 'admin', '2022-01-16 21:29:39.718952', NULL),
('0116223041685', 'sdfasdf', 'asdfasdf', ' ', 'test', '2022-01-16 21:30:41.938788', NULL);

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
(324449, 0, '---', '---', '---', 0, '---', '---', '---', '2022-01-17', '---', '2022-01-17 16:08:48.139456', ''),
(423764, 0, 'Frau', 'tech', 'nik', 1111, 'wien', 'techstreet', '1', '2022-01-02', 'tech@mail.com', '2022-01-17 15:51:40.885116', ''),
(521552, 0, 'Herr', 'ad', 'min', 3141, 'admin-island', 'adminstreet', '314', '2022-01-01', 'admin@mail.com', '2022-01-17 15:50:27.120484', '');

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

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ID`, `title`, `text`, `photo_id`, `username`, `timestamp`, `status`) VALUES
('2546736', 'SO SMORT', 'you are very smort!\r\ni love your smort brain very much <3', '', 'admin', '2022-01-07 20:03:48.000000', 2),
('34734573', 'ticket1', 'ticket ticketticket ticket', '0107210432726,', 'admin', '2022-01-07 20:04:32.000000', 2),
('34573457', 'ticket 2', 'bli bla blubbaaaa', '0107210454654,', 'admin', '2022-01-07 20:04:54.000000', 1),
('345783658', 'tiiicket', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam deleniti dolor atque nobis dolorum dignissimos velit veniam esse, neque reprehenderit praesentium blanditiis tenetur vel omnis, soluta maxime, recusandae totam quod facere facilis aut officia laborum quo. Quisquam hic sequi enim reiciendis mollitia alias dolorum sapiente necessitatibus nisi et explicabo ipsum, ipsam vitae vero dignissimos natus. Officia expedita aliquam, harum alias optio quia autem tempora quo cumque rerum nulla aperiam quis, blanditiis distinctio adipisci veritatis quam a eum quasi magnam possimus voluptatem? Nihil repellendus consequatur illum, sed minus repellat ducimus totam iste obcaecati, blanditiis tempore vel assumenda id repudiandae! Quibusdam, voluptatem.', '0107210528896,', 'admin', '2022-01-07 20:05:28.000000', 2),
('345734573457', 'lgh sdfg sdgf sdgf sdf 1234', 'lol test', '', 'admin', '2022-01-07 20:05:41.000000', 0),
('5744568459', 'tesst', 'agaggggggggggggggggggggggg dddddddd', '0107210559323,', 'admin', '2022-01-07 20:05:59.000000', 2),
('946783673', 'looooreeeem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam deleniti dolor atque nobis dolorum dignissimos velit veniam esse, neque reprehenderit praesentium blanditiis tenetur vel omnis, soluta maxime, recusandae totam quod facere facilis aut officia laborum quo. Quisquam hic sequi enim reiciendis mollitia alias dolorum sapiente necessitatibus nisi et explicabo ipsum, ipsam vitae vero dignissimos natus. Officia expedita aliquam, harum alias optio.', '0107210642604,', 'admin', '2022-01-07 20:06:42.000000', 1),
('0110002127132', 'chelp', 'I need a bussi from my Schnuchsi :*', '', 'admin', '2022-01-09 23:21:27.000000', 2),
('0113184350306', 'hats eh geklappt', 'hats eh geklappt?', '', 'admin', '2022-01-13 17:43:50.703762', 0),
('0117144147775', 'asd', 'dfafd', ' ', 'admin', '2022-01-17 13:41:47.848883', 2),
('0117144155767', '1234', '1234', ' ', 'admin', '2022-01-17 13:41:55.089044', 2),
('0117145235641', 'asd', 'asdasd', '0117145235578,', 'admin', '2022-01-17 13:52:35.657657', 2),
('0117145433290', 'asd', 'asd', ' ', 'admin', '2022-01-17 13:54:33.083048', 2),
('0117151357975', 'loltest', 'pictest', '0117151357677,', 'admin', '2022-01-17 14:13:57.972858', 2);

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
(324449, 'test1234', '$2y$12$bhnQm/lSjO/JVwiHhVfk0esyX3opQrIjbJdVmzGmi6Kp3MeWuOuJW', 1, '2022-01-17 16:08:48.133790'),
(399086, 'asdf', '$2y$12$NacZ5SarvDAHO0nL1uoWPO6MmBQH.GrkluBBrcM3G/BizmzPcWPXC', 1, '2022-01-17 16:03:50.141370'),
(423764, 'technik', '$2y$12$5gwQY.mn3VcadZiH0YlBoOybbGUqrS38qVtxGw9A9lggcuUTZwTwe', 2, '2022-01-17 15:51:40.879317'),
(521552, 'admin', '$2y$12$r6XCF0eBuJuWMOGOFPimqOi7YpRbYUrMNqWbGaTj7NAOohqGvmtZe', 3, '2022-01-17 15:50:27.114851'),
(810173, 'gast', '$2y$12$5lPky6sd2QxBMMmUx3JwF.v29C4TTowbTJwG59RB.9nlER0ueKL/y', 1, '2022-01-17 15:52:28.615883');

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
  MODIFY `cid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
