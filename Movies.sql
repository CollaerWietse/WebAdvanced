-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 16 apr 2017 om 14:18
-- Serverversie: 5.7.17-0ubuntu0.16.04.1
-- PHP-versie: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WP2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Movies`
--

CREATE TABLE `Movies` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `ReleaseYear` int(11) NOT NULL,
  `Score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Movies`
--

INSERT INTO `Movies` (`Id`, `Title`, `ReleaseYear`, `Score`) VALUES
(1, 'Star Wars', 1984, 9),
(2, 'Robbe\'s filmpje', 2017, 2),
(5, 'Star Wars 2', 1986, NULL),
(15, 'Star wars 3', 1996, 9);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Movies`
--
ALTER TABLE `Movies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
