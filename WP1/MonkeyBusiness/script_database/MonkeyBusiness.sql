-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2017 at 08:47 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MonkeyBusiness`
--

-- --------------------------------------------------------

--
-- Table structure for table `Evenementen`
--

CREATE TABLE `Evenementen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `klantnummer` int(11) NOT NULL,
  `bezetting` varchar(2048) NOT NULL,
  `kost` double NOT NULL,
  `materialen` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Evenementen`
--

INSERT INTO `Evenementen` (`id`, `naam`, `begindatum`, `einddatum`, `klantnummer`, `bezetting`, `kost`, `materialen`) VALUES
(1, 'Welcome home svon', '2017-04-17', '2017-04-17', 1, 'Persoon a', 5000, 'Bier'),
(2, 'B-Day party', '2017-08-20', '2017-08-21', 2, 'Persoon b', 100, 'Bier, Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `Klanten`
--

CREATE TABLE `Klanten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `gemeente` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Klanten`
--

INSERT INTO `Klanten` (`id`, `naam`, `voornaam`, `postcode`, `gemeente`, `straat`, `huisnummer`, `telefoonnummer`, `mail`) VALUES
(1, 'Kimpen', 'Robbe', '3560', 'LUMMEN', 'Nachtegaalstraat', '37', '0476062751', 'robbe.kimpen@student.pxl.be'),
(2, 'Zeelmaekers', 'Joachim', '3500', 'HASSELT', 'Elfde liniestraat', '11', '0476062751', 'joachim.zeelmaekers@student.pxl.be');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Evenementen`
--
ALTER TABLE `Evenementen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Klanten`
--
ALTER TABLE `Klanten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Evenementen`
--
ALTER TABLE `Evenementen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Klanten`
--
ALTER TABLE `Klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
