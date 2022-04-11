-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Apr 2022 um 18:55
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be15_cr12_mount_everest_peter`
--
CREATE DATABASE IF NOT EXISTS `be15_cr12_mount_everest_peter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be15_cr12_mount_everest_peter`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `locations`
--

CREATE TABLE `locations` (
  `offer_id` int(11) NOT NULL,
  `locationName` varchar(50) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `picture` varchar(30) NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `locations`
--

INSERT INTO `locations` (`offer_id`, `locationName`, `price`, `description`, `longitude`, `latitude`, `picture`, `available`) VALUES
(1, 'Grado - die Perle an der Adria', '222.22', 'Im mittelalterlichen Kern ist Tag und Nacht zeit zum erleben, flanieren und die Athmosphäre aufzusaugen', 13.3838, 45.677, '62545af50a4c1.png', 1),
(6, 'Stockholm - Sweden', '444.44', 'CAPITAL AND HEART OF MODERN SWEDEN', 18.072, 59.3248, '62545b9b03b4d.jpg', 0),
(8, 'Uppsala - Sweden', '555.11', 'beautiful metropol of the old sweden.\r\nOur future hometown, the center of Biology Sciences', 17.6578, 59.868, '62545a3a9d7cb.jpg', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`offer_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `locations`
--
ALTER TABLE `locations`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
