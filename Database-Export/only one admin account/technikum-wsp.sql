-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-01-20 01:11:15
-- 服务器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `technikum-wsp`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
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
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`ID`, `title`, `text`, `photo_id`, `username`, `timestamp`, `cid`) VALUES
('120002153350', 'wow', 'nice', 'banner.png', 'zhuqi', '2022-01-19 23:26:11.246450', 16),
('120004036268', '', '', 'banner.png', 'admin', '2022-01-19 23:43:58.673800', 18),
('120004630479', '', 'WOW', 'banner.png', 'admin', '2022-01-19 23:46:51.163355', 19);

-- --------------------------------------------------------

--
-- 表的结构 `news`
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
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`ID`, `title`, `text`, `photo_id`, `username`, `timestamp`, `status`) VALUES
('120004630479', 'NARAKABLADEPOINT World Championship', 'Trios Winner of 2021 #NARAKABLADEPOINT World Championship: JTEAM\r\nFMVP: JTeam丶Li\r\nCongrats to JTEAM and thanks for all teams\' brilliant performance in the finale!', '0120004630799.jpg,', 'admin', '2022-01-19 23:46:30.630377', NULL),
('120005227626', 'Das heutige empfohlene Menü: Tafelspitz', ' Österreich hat mehr als 600 Jahre Herrschaft der Habsburger erlebt, und seine Esskultur ist stark von der königlichen Familie geprägt. Der Legende nach lebte der österreichische Kaiser Franz Josef I. ein einfaches und geregeltes Leben. Er mochte gekochtes Rindfleisch. Das Rindfleisch wurde mehrere Stunden in Brühe geschmort, mit Gemüse und Meerrettichsauce serviert. Es war ein Jahrhundert lang ein klassisches Gericht. Bei Einheimischen Restaurants sind die Gäste daran gewöhnt, zuerst Rindsuppe zu trinken und dann das Rindfleisch mit Kartoffelpüree oder Bratkartoffeln und einer cremigen Meerrettichsauce zu kombinieren.', '0120005227873.jpg,', 'admin', '2022-01-19 23:52:27.273006', NULL),
('120005758633', 'Dessertempfehlung:Sacher Torte', 'Ein weiteres Muss für Touristen, die Österreich besuchen, ist die Sachertorte, die ihren Ursprung im Jahr 1832 hat.Ministerpräsident Metternich wollte VIPs mit besonderen Kuchen bewirten, aber der Koch konnte sie nicht herstellen.Franz Sacher, ein junger Lehrling, der in Gefahr war, machte sie Die Torte mit Aprikosenmarmelade auf der Innenschicht und Schokolade auf der Außenschicht wurde sehr geschätzt, und Metternich benannte diese Torte nach Saha, die bis heute beliebt ist.', '0120005758102.jpg,', 'admin', '2022-01-19 23:57:58.729795', NULL),
('120010418648', 'Microsoft kauft Activision Blizzard für 68,7 Milliarden Dollar', 'Am 18. Januar um 21:25 Uhr gab Microsoft eine offizielle Erklärung heraus, in der es hieß, dass es Activision Blizzard vollständig in bar zu einem Preis von 95 US-Dollar pro Aktie erwerben würde, ein Deal im Wert von 68,7 Milliarden US-Dollar, einschließlich der Nettoliquidität von Activision Blizzard.\r\nNach Abschluss der Transaktion wird Microsoft nach Umsatz zum drittgrößten Spieleunternehmen der Welt (hinter Tencent und Sony) und besitzt Activision, Blizzard und King Studio und seine Franchises, darunter World of Warcraft und Diablo, „Overwatch“, „Call of Duty\" und \"Candy Crush\" usw.\r\n\r\nBloomberg sagte, dass Microsofts 69-Milliarden-Dollar-Übernahme von Activision Blizzard das von Xbox geförderte Xbox Game Pass-Geschäftsmodell stark fördern und Sonys traditionelles Geschäftsmodell herausfordern wird, das auf hochwertigen exklusiven Spielen und Hardwareverkäufen beruht. Spiele und Netzwerkdienste machen 30 % des Gesamtumsatzes der Sony Group aus.\r\n\r\nMicrosoft gab gestern bekannt, dass seine Xbox Game Pass-Abonnenten jetzt 25 Millionen überschritten haben, und versprach gleichzeitig, so viele Activision Blizzard-Spiele wie möglich auf Xbox/PC Game Pass aufzunehmen, sowohl bestehende als auch zukünftige Titel.\r\n\r\nAmir Anvarzadeh, Analyst von Asymmetric Advisors, sagte: „Sony wird in diesem Zermürbungskrieg allein einer großen Herausforderung gegenüberstehen. Da Call of Duty jetzt sehr wahrscheinlich exklusiv zum Game Pass-Kader hinzugefügt wird, wird der Gegenwind für Sony nur noch zu größer werden.\"\r\n\r\nAbgesehen von Sony bewegten sich auch die Aktien anderer japanischer Spieleunternehmen, wobei Capcom und SE in Tokio, Japan, um mehr als 3,7 % zulegten. Analysten glauben, dass die Bewertungen dieser Unternehmen mit starken Inhalten und geistigem Eigentum gestiegen sind, angeregt durch die Übernahme von Activision Blizzard durch Microsoft.\r\n\r\nWährend Sony seinen Vorsprung bei Hardware-Verkäufen und exklusiven Spielen seit mehreren Generationen behauptet, steht Sony nun, da Microsoft sich entschlossen hat, die Lücke mit seiner Fähigkeit zu Geld zu schließen, unter beispiellosem Druck.\r\n\r\nKazunori Ito, Analyst bei Morningstar Research Japan, sagte: „Sony ist schwer mit Microsoft vergleichbar, wenn es um den Geldbetrag geht, der für den Kauf beliebter Spiele-IP verwendet werden kann, und der Rückgang des Aktienkurses zeigt, dass die Anleger besorgt sind, dass Sony möglicherweise nicht dazu in der Lage ist um weiter zu gewinnen, wenn die Gaming-Industrie sich wirklich vom Hardware-Verkaufsmodell fernhält.“', '0120010418133.png,', 'admin', '2022-01-20 00:04:18.356964', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `personal_data`
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
-- 转存表中的数据 `personal_data`
--

INSERT INTO `personal_data` (`ID`, `status`, `anrede`, `vorname`, `nachname`, `plz`, `ort`, `strasse`, `hausnummer`, `birthday`, `email`, `timestamp`, `photo_id`) VALUES
(437691, 0, 'Divers', 'ad', 'min', 1010, 'Wien', 'adminstreet', '3/1/4', '1990-01-04', 'admin@mail.com', '2022-01-19 22:42:25.641233', ''),
(828130, 0, 'Herr', 'Qi', 'Zhu', 1200, 'Wien', 'Kornhäselgasse', '7/6/8', '2002-08-09', '1993372403@qq.com', '2022-01-19 23:25:55.449601', '');

-- --------------------------------------------------------

--
-- 表的结构 `tickets`
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
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` tinyint(3) UNSIGNED DEFAULT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `level`, `timestamp`) VALUES
(437691, 'admin', '$2y$12$cDNUPxsVrRmnB7WHATO.FeIEoYUSi6ez0bauwVt7wp36A4BnuomdW', 3, '2022-01-19 22:42:25.635204'),
(828130, 'zhuqi', '$2y$12$nWEmTRk1U3Dcgh/V7neKteCpeaYeB79ZikP57fJSsDajOdewEk6uu', 1, '2022-01-19 23:25:55.447925');

--
-- 转储表的索引
--

--
-- 表的索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `timestamp` (`timestamp`),
  ADD KEY `username` (`username`);

--
-- 表的索引 `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `timestamp` (`timestamp`),
  ADD KEY `username` (`username`);

--
-- 表的索引 `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `tickets`
--
ALTER TABLE `tickets`
  ADD UNIQUE KEY `timestamp` (`timestamp`),
  ADD KEY `username` (`username`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
