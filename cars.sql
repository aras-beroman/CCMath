-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 aug 2022 om 11:21
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccmath`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars`
--

CREATE TABLE `cars` (
  `id` int(32) NOT NULL,
  `brand` varchar(16) NOT NULL,
  `model` varchar(16) NOT NULL,
  `year` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`) VALUES
(1, 'BMW', '318', '2018'),
(2, 'BMW', '320', '2018'),
(9, 'BMW', '540', '2019'),
(10, 'BMW', 'M4 CS', '2022'),
(11, 'BMW', '760L', '2021'),
(14, 'MERCEDES', 'E63', '2019'),
(15, 'VOLKSWAGEN', 'Polo', '2020'),
(16, 'VOLKSWAGEN', 'Golf 7', '2016'),
(17, 'BMW', 'M5', '2022'),
(18, 'BMW', '120', '2019'),
(19, 'Toyota', 'Corolla', '2020'),
(20, 'Toyota', 'RAV4', '2021'),
(21, 'Toyota', 'Auris', '2017'),
(22, 'Toyota', 'Yaris', '2022'),
(23, 'MERCEDES', 'Brabus', '2018');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
