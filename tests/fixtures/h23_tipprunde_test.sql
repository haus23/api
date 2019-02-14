-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2019 at 12:22 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h23_tipprunde_test`
--
CREATE DATABASE IF NOT EXISTS `h23_tipprunde_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `h23_tipprunde_test`;

-- --------------------------------------------------------

--
-- Table structure for table `runde`
--

DROP TABLE IF EXISTS `runde`;
CREATE TABLE `runde` (
  `id` int(11) NOT NULL,
  `turnier_id` int(11) NOT NULL,
  `nr` tinyint(4) NOT NULL,
  `anzahl_spiele` tinyint(4) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spiel`
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
  `topspiel` tinyint(1) DEFAULT NULL,
  `ergebnis` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `punkte` smallint(6) DEFAULT NULL,
  `canceled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spieler`
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
-- Dumping data for table `spieler`
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
-- Table structure for table `tipp`
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

-- --------------------------------------------------------

--
-- Table structure for table `turnier`
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
-- Dumping data for table `turnier`
--

INSERT INTO `turnier` (`id`, `title`, `slug`, `order`, `completed`) VALUES
(1, 'Hinrunde 2002/03', NULL, 1, 1),
(2, 'Rückrunde 2002/03', 'rr0203', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `runde`
--
ALTER TABLE `runde`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spiel`
--
ALTER TABLE `spiel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spieler`
--
ALTER TABLE `spieler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipp`
--
ALTER TABLE `tipp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnier`
--
ALTER TABLE `turnier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `runde`
--
ALTER TABLE `runde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spiel`
--
ALTER TABLE `spiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spieler`
--
ALTER TABLE `spieler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tipp`
--
ALTER TABLE `tipp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turnier`
--
ALTER TABLE `turnier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
