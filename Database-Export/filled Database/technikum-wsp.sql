-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2022 at 02:02 AM
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
('120012715725', 'LECKER!', 'Ich liebe Sachertorte!!! ', 'banner.png', 'derBauer', '2022-01-19 00:29:42.784573', 15),
('120000131395', 'Endlich!', 'Ich kann es kaum erwarten, es zu testen! ', 'banner.png', 'kratzBürste', '2022-01-19 00:56:09.907909', 16),
('120012715725', 'cool!', 'Ich mag auch Sachertorte!', 'banner.png', 'kratzBürste', '2022-01-19 00:56:37.886159', 17),
('120005101725', 'oh man', 'wie lang dauert es noch??', 'banner.png', 'kratzBürste', '2022-01-19 00:56:54.551992', 18),
('120012634568', 'Buuuh!', 'Ich hasse Blizzard! :(', 'banner.png', 'DemolitionDieter', '2022-01-19 00:57:46.496701', 19),
('119235430180', 'Geil!', 'Hoffentlich ist diesmal MyLittlePony:AdventureIsland3 dabei!!', 'banner.png', 'DemolitionDieter', '2022-01-19 00:58:21.079755', 20),
('120012735208', 'Ich sah es live!', 'Super Spiel! Es waren echt nice Kämpfe dabei!', 'banner.png', 'TheLegend', '2022-01-19 00:59:28.042245', 21);

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
('119235430180', 'Es ist wieder soweit: neue Games warten auf deinen Besuch!', 'Endlich ist es soweit! Unsere Spielebibliothek wurde mit neuen Titeln geupdatet! \r\n\r\nWir haben alle Systeme aktualisiert, sodass du gleich nach dem Einchecken, sofort mit deinen Freunden loslegen kannst!\r\n\r\nOb alleine, oder im Team. Unsere Gaming-Systeme werden dich umhauen! Neben den diesjährigen Titeln erlauben wir uns auch einen Blick in die Zukunft. Am Ende der Liste finden Sie daher Spiele, für die aktuell noch kein Veröffentlichungstermin feststeht. \r\n\r\nAber auch bei Spielen mit eigentlich festem Release kann es noch zu Verschiebungen kommen. Ein regelmäßiger Blick auf die Liste lohnt sich also und kann vor bösen Überraschungen bewahren.', '0119235430743.jpg,', 'admin', '2022-01-18 22:54:30.726212', NULL),
('120000131395', 'Monatliches Update: besseres W-Lan in den Toiletten, dank der neuen D-Lan-Repeater!', 'Nie wieder lange Ladezeiten am stillen Örtchen! \r\n\r\nDas neue System von Connex-D-Lan ermöglicht nun noch höhere Down- und Uploadraten, für ein noch angenehmeren Besuch am WC. \r\n\r\nGenießt die neue heiße Verbindung und lasst euch Zeit, vor dem runterspülen. Man gönnt sich ja sonst nichts.', '0120000131587.png,', 'admin', '2022-01-18 23:01:31.567803', NULL),
('120012634568', 'Microsoft kauft Activision Blizzard für 68,7 Milliarden Dollar', 'Am 18. Januar um 21:25 Uhr gab Microsoft eine offizielle Erklärung heraus, in der es hieß, dass es Activision Blizzard vollständig in bar zu einem Preis von 95 US-Dollar pro Aktie erwerben würde, ein Deal im Wert von 68,7 Milliarden US-Dollar, einschließlich der Nettoliquidität von Activision Blizzard. Nach Abschluss der Transaktion wird Microsoft nach Umsatz zum drittgrößten Spieleunternehmen der Welt (hinter Tencent und Sony) und besitzt Activision, Blizzard und King Studio und seine Franchises, darunter World of Warcraft und Diablo, „Overwatch“, „Call of Duty\" und \"Candy Crush\" usw. Bloomberg sagte, dass Microsofts 69-Milliarden-Dollar-Übernahme von Activision Blizzard das von Xbox geförderte Xbox Game Pass-Geschäftsmodell stark fördern und Sonys traditionelles Geschäftsmodell herausfordern wird, das auf hochwertigen exklusiven Spielen und Hardwareverkäufen beruht. Spiele und Netzwerkdienste machen 30 % des Gesamtumsatzes der Sony Group aus. Microsoft gab gestern bekannt, dass seine Xbox Game Pass-Abonnenten jetzt 25 Millionen überschritten haben, und versprach gleichzeitig, so viele Activision Blizzard-Spiele wie möglich auf Xbox/PC Game Pass aufzunehmen, sowohl bestehende als auch zukünftige Titel. Amir Anvarzadeh, Analyst von Asymmetric Advisors, sagte: „Sony wird in diesem Zermürbungskrieg allein einer großen Herausforderung gegenüberstehen. Da Call of Duty jetzt sehr wahrscheinlich exklusiv zum Game Pass-Kader hinzugefügt wird, wird der Gegenwind für Sony nur noch zu größer werden.\" Abgesehen von Sony bewegten sich auch die Aktien anderer japanischer Spieleunternehmen, wobei Capcom und SE in Tokio, Japan, um mehr als 3,7 % zulegten. Analysten glauben, dass die Bewertungen dieser Unternehmen mit starken Inhalten und geistigem Eigentum gestiegen sind, angeregt durch die Übernahme von Activision Blizzard durch Microsoft. Während Sony seinen Vorsprung bei Hardware-Verkäufen und exklusiven Spielen seit mehreren Generationen behauptet, steht Sony nun, da Microsoft sich entschlossen hat, die Lücke mit seiner Fähigkeit zu Geld zu schließen, unter beispiellosem Druck. Kazunori Ito, Analyst bei Morningstar Research Japan, sagte: „Sony ist schwer mit Microsoft vergleichbar, wenn es um den Geldbetrag geht, der für den Kauf beliebter Spiele-IP verwendet werden kann, und der Rückgang des Aktienkurses zeigt, dass die Anleger besorgt sind, dass Sony möglicherweise nicht dazu in der Lage ist um weiter zu gewinnen, wenn die Gaming-Industrie sich wirklich vom Hardware-Verkaufsmodell fernhält.“', '0120012634491.png,', 'admin', '2022-01-19 00:26:34.338308', NULL),
('120012715725', 'Dessertempfehlung: Sacher Torte', 'Ein weiteres Muss für Touristen, die Österreich besuchen, ist die Sachertorte, die ihren Ursprung im Jahr 1832 hat.Ministerpräsident Metternich wollte VIPs mit besonderen Kuchen bewirten, aber der Koch konnte sie nicht herstellen.Franz Sacher, ein junger Lehrling, der in Gefahr war, machte sie Die Torte mit Aprikosenmarmelade auf der Innenschicht und Schokolade auf der Außenschicht wurde sehr geschätzt, und Metternich benannte diese Torte nach Saha, die bis heute beliebt ist.', '0120012715616.jpg,', 'admin', '2022-01-19 00:27:15.684146', NULL),
('120012735208', 'NARAKABLADEPOINT World Championship', 'Trios Winner of 2021 #NARAKABLADEPOINT World Championship: JTEAM FMVP: JTeam丶Li Congrats to JTEAM and thanks for all teams\' brilliant performance in the finale!', '0120012735646.jpg,', 'admin', '2022-01-19 00:27:35.655806', NULL),
('120012757364', 'Das heutige empfohlene Menü: Tafelspitz', 'Österreich hat mehr als 600 Jahre Herrschaft der Habsburger erlebt, und seine Esskultur ist stark von der königlichen Familie geprägt. Der Legende nach lebte der österreichische Kaiser Franz Josef I. ein einfaches und geregeltes Leben. Er mochte gekochtes Rindfleisch. Das Rindfleisch wurde mehrere Stunden in Brühe geschmort, mit Gemüse und Meerrettichsauce serviert. Es war ein Jahrhundert lang ein klassisches Gericht. Bei Einheimischen Restaurants sind die Gäste daran gewöhnt, zuerst Rindsuppe zu trinken und dann das Rindfleisch mit Kartoffelpüree oder Bratkartoffeln und einer cremigen Meerrettichsauce zu kombinieren.', '0120012757778.jpg,', 'admin', '2022-01-19 00:27:57.063111', NULL);

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
(143584, 0, 'Herr', 'Roman', 'Hart', 6230, 'Unterdorf', 'Heimweg', '98', '1995-12-27', 'romilein@mail.com', '2022-01-19 00:12:51.249907', '0120014859123.png,'),
(147879, 0, 'Frau', 'Ulfriede', 'Schmid', 3246, 'Hinterdorf', 'Bahnstrasse', '23', '1992-12-27', 'ulfi_schmid@mail.com', '2022-01-19 00:04:42.771270', ''),
(253738, 0, 'Herr', 'Günther', 'Fried', 3350, 'Kuhviertel', 'Wirtsgasse', '24', '1994-01-08', 'guenti.fried@mail.com', '2022-01-19 00:10:16.426014', ''),
(426768, 0, '---', 'tech', 'nik', 1200, 'Wien', 'techy-street', '31/4', '1975-02-08', 'tech@mail.com', '2022-01-19 00:00:47.798282', ' '),
(437691, 0, 'Divers', 'ad', 'min', 1010, 'Wien', 'adminstreet', '3/1/4', '1990-01-04', 'admin@mail.com', '2022-01-19 22:42:25.641233', ''),
(566141, 0, 'Divers', 'tek', 'nich', 1230, 'Wien', 'technician av.', '75/1/32', '2000-10-17', 'tek@mail.com', '2022-01-19 00:02:14.549371', ''),
(615085, 0, 'Frau', 'Stefanie', 'Resch', 4563, 'Gegenpfützing', 'Bergstraße', '94', '1996-01-04', 'stefanie.resch@mail.com', '2022-01-19 00:23:50.553110', '0120015540504.png,'),
(707731, 0, 'Herr', 'Dieter', 'Drössel', 4150, 'Hinterstinkebrunn', 'Stadtstrasse', '47/2', '1989-08-25', 'dieter.drossel@mail.com', '2022-01-19 00:06:54.638355', ''),
(710772, 0, 'Herr', 'Max', 'Müller', 2330, 'Oberdorf', 'Nebenstraße', '4', '1994-03-31', 'maxi@maili.com', '2022-01-19 00:08:29.926778', '');

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
('120003659452', 'HIIILLLFFEEEE', 'Wenn ich Borderlands 3 starte, kommt diese Meldung!!', '0120003659180.jpg,', 'TheLegend', '2022-01-18 23:36:59.847254', 0),
('120003914864', 'was soll das?', 'Ich war MITTEN in einem wichtigen SPiel, dann abgestürzt und jettz das! der pc statrtet sich einfach nciht mehr!! :(((', '0120003914864.jpg,', 'DemolitionDieter', '2022-01-18 23:39:14.484422', 0),
('120004225188', 'NASSER BODEN HAT MICH FAST GETÖTET', 'Nachdem ich geduscht habe, war der Boden nass und ich bin ausgerutscht und fast gestorben! Dabei ist das Waschbecken gesprungen. Bitte sorgen Sie dafür, dass der Boden nicht mehr Nass wird, wenn ich dusche!', '0120004225978.jpeg,', 'TheLegend', '2022-01-18 23:42:25.590309', 1),
('120004319855', 'ich bekommen immer diese Fehlermeldung', 'Ich kann mein Spiel nicht starten und es kommt nur das. ', '0120004319762.jpg,', 'gamergirl69', '2022-01-18 23:43:19.189487', 2),
('120004522861', 'das war schon so', 'Liebe Verwaltung!\r\n\r\nAls wir einchecken wollten, haben wir sofort bemerkt, dass der Tisch kaputt ist!\r\nMan sieht noch unsere Koffer im Hintergrund. Das war also schon so. Bitte schicken sie jemanden, um das zu tauschen! Das ist ja LEBENSGEFÄHRLICH!\r\n\r\nMFG \r\n\r\nDieter D.', '0120004522824.jpg,', 'NoobKiller420', '2022-01-18 23:45:22.683822', 2),
('120004554590', '???', 'HALLOO??', ' ', 'NoobKiller420', '2022-01-18 23:45:54.657313', 2),
('120004709877', 'In dem Skript auf dieser Seite ist ein Fehler aufgetreten....', 'Kann bitte jemand kommen? Ich weiß nicht wieso das aufgetaucht ist. Ich habe nichts falsch gemacht!', '0120004709572.jpg,', 'NoobKiller420', '2022-01-18 23:47:09.358921', 2),
('120004803288', 'upsi', 'Leider ist mir ein kleines Missgeschick passiert...', '0120004803979.jpg,', 'gamergirl69', '2022-01-18 23:48:03.878779', 2),
('120004933266', 'DER PC IST DEFEKT!', 'HILFE! ICH HOFFE DAS FLIEGT NICHT IN DIE LUFT! ICH HABE SICHERHEITSHALBER DEN PC IN DIE BADEWANNE GELEGT UND MIT WASSER BESPRITZT DAMIT ER NICHT EXPLODIERT', '0120004933411.jpg,', 'TheLegend', '2022-01-18 23:49:33.395857', 2),
('120005032471', 'wir hatten einen kleinen Unfall..', 'Könnte bitte jemand kommen und das wegmachen? ich will mich nicht schneiden!', '0120005032271.jpg,', 'kratzBürste', '2022-01-18 23:50:32.856078', 2),
('120005101725', 'meine Internet ist so langsam', 'Wieso ist mein INternet so lansam?', ' ', 'kratzBürste', '2022-01-18 23:51:01.548685', 2),
('120005146148', 'bluescreen', 'Mitten im SPiel ist der PC abgestürzt. Was soll ich machen? kommt jemand oder so?', '0120005146411.jpg,', 'gamergirl69', '2022-01-18 23:51:46.688861', 2),
('120005222757', 'nicht mein Tag...', 'Sorry.. zimmer 301', '0120005222384.webp,', 'derBauer', '2022-01-18 23:52:22.859244', 2);

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
(143584, 'derBauer', '$2y$12$CTQj7ui6qu8m3cI0UpaaWe5ETknFV3XFaAtOAX4lvnwxQQT8AWdWK', 1, '2022-01-19 00:12:51.243961'),
(147879, 'gamergirl69', '$2y$12$ATy/aJ1JkQsUG7EltHP1Gu4A7Gn2pBzYz.hYyO6u9l/hxkfMeaWZa', 1, '2022-01-19 00:04:42.765589'),
(253738, 'TheLegend', '$2y$12$njBLQQxo/b1GOgQEC/CqDepNeq3vBd/.uX0TRKeDNO12Zs6c6ZuYS', 1, '2022-01-19 00:10:16.420361'),
(426768, 'technik1', '$2y$12$E6eaVffDlNM1oCo1MSeMleOOEEgbS0LT77YdrxOnu8Mi0Dt75024C', 3, '2022-01-19 00:00:47.792698'),
(437691, 'admin', '$2y$12$cDNUPxsVrRmnB7WHATO.FeIEoYUSi6ez0bauwVt7wp36A4BnuomdW', 3, '2022-01-18 22:42:25.635204'),
(566141, 'technik2', '$2y$12$HvS6B2HjAslHolw6bzIhnuLxx4ULyb9j2E2vEeto8.h.Vhy/EK1Zu', 2, '2022-01-19 00:02:14.543664'),
(615085, 'kratzBürste', '$2y$12$ewPVPIrHgZOMwSclp8OA7O7/STwXmVUT2Rz1jAzOVDeZBtyTvSm52', 1, '2022-01-19 00:23:50.547714'),
(707731, 'DemolitionDieter', '$2y$12$HVDsjAkVdJyUQ/ZXRAvX7uCG43HfaDO0HT7HIo2kPQnqbsbxQ3V/O', 1, '2022-01-19 00:06:54.632874'),
(710772, 'NoobKiller420', '$2y$12$r3s3.ni3kSL5fypdi1IJ6.CXo09Zw33jq3SOQIBitHrUZZYomIMv2', 1, '2022-01-19 00:08:29.921322');

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
  MODIFY `cid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
