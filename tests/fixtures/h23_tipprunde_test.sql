-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 15. Feb 2019 um 10:44
-- Server-Version: 10.3.12-MariaDB
-- PHP-Version: 7.3.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `h23_tipprunde_test`
--
CREATE DATABASE IF NOT EXISTS `h23_tipprunde_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `h23_tipprunde_test`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `runde`
--

DROP TABLE IF EXISTS `runde`;
CREATE TABLE `runde` (
  `id` int(11) NOT NULL,
  `turnier_id` int(11) NOT NULL,
  `nr` tinyint(4) NOT NULL,
  `anzahl_spiele` tinyint(4) NOT NULL DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `runde`
--

INSERT INTO `runde` (`id`, `turnier_id`, `nr`, `anzahl_spiele`, `completed`) VALUES
(1, 1, 1, 5, 0),
(2, 1, 2, 6, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spiel`
--

DROP TABLE IF EXISTS `spiel`;
CREATE TABLE `spiel` (
  `id` int(11) NOT NULL,
  `turnier_id` int(11) NOT NULL,
  `runde_id` int(11) NOT NULL,
  `nr` tinyint(4) NOT NULL,
  `liga` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `paarung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topspiel` tinyint(1) NOT NULL DEFAULT 0,
  `ergebnis` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `punkte` smallint(6) DEFAULT NULL,
  `canceled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `spiel`
--

INSERT INTO `spiel` (`id`, `turnier_id`, `runde_id`, `nr`, `liga`, `datum`, `paarung`, `topspiel`, `ergebnis`, `punkte`, `canceled`) VALUES
(1, 1, 1, 1, 'BL', '2002-08-10', 'Energie-Leverkusen', 0, '1:1', 4, 0),
(2, 1, 1, 2, 'Bochum-Energie', '2002-08-17', 'Bochum-Energie', 0, NULL, NULL, 0),
(3, 1, 1, 3, NULL, NULL, NULL, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spieler`
--

DROP TABLE IF EXISTS `spieler`;
CREATE TABLE `spieler` (
  `id` int(11) NOT NULL,
  `turnier_id` int(11) NOT NULL,
  `nr` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `punkte` smallint(6) DEFAULT NULL,
  `zusatz` float DEFAULT NULL,
  `gesamt` float DEFAULT NULL,
  `platz` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `spieler`
--

INSERT INTO `spieler` (`id`, `turnier_id`, `nr`, `user_id`, `punkte`, `zusatz`, `gesamt`, `platz`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 1, 2, 2, NULL, NULL, NULL, NULL),
(3, 1, 3, 3, NULL, NULL, NULL, NULL),
(4, 1, 4, 4, NULL, NULL, NULL, NULL),
(5, 1, 5, 5, NULL, NULL, NULL, NULL),
(6, 1, 6, 6, NULL, NULL, NULL, NULL),
(7, 1, 7, 7, NULL, NULL, NULL, NULL),
(8, 1, 8, 8, NULL, NULL, NULL, NULL),
(9, 1, 9, 9, NULL, NULL, NULL, NULL),
(10, 1, 10, 10, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tipp`
--

DROP TABLE IF EXISTS `tipp`;
CREATE TABLE `tipp` (
  `id` int(11) NOT NULL,
  `turnier_id` int(11) NOT NULL,
  `spieler_id` int(11) NOT NULL,
  `spiel_id` int(11) NOT NULL,
  `tipp` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joker` tinyint(1) DEFAULT NULL,
  `zusatzjoker` tinyint(1) DEFAULT NULL,
  `punkte` smallint(6) DEFAULT NULL,
  `sonder` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `tipp`
--

INSERT INTO `tipp` (`id`, `turnier_id`, `spieler_id`, `spiel_id`, `tipp`, `joker`, `zusatzjoker`, `punkte`, `sonder`) VALUES
(1, 1, 1, 1, '2:2', 0, NULL, 1, NULL),
(2, 1, 1, 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `turnier`
--

DROP TABLE IF EXISTS `turnier`;
CREATE TABLE `turnier` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` char(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint(4) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `turnier`
--

INSERT INTO `turnier` (`id`, `title`, `slug`, `order`, `completed`) VALUES
(1, 'Hinrunde 2002/03', NULL, 1, 1),
(2, 'Rückrunde 2002/03', 'rr0203', 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'Wolfgang'),
(2, 'Birgit'),
(3, 'Marko'),
(4, 'Kerstin'),
(5, 'Christian'),
(6, 'Anna'),
(7, 'Thomas'),
(8, 'Olli'),
(9, 'Chris'),
(10, 'Micha A');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `runde`
--
ALTER TABLE `runde`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `spiel`
--
ALTER TABLE `spiel`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `spieler`
--
ALTER TABLE `spieler`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tipp`
--
ALTER TABLE `tipp`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `turnier`
--
ALTER TABLE `turnier`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `runde`
--
ALTER TABLE `runde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `spiel`
--
ALTER TABLE `spiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `spieler`
--
ALTER TABLE `spieler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `tipp`
--
ALTER TABLE `tipp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `turnier`
--
ALTER TABLE `turnier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
