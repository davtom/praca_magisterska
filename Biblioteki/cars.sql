-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Lut 2021, 19:03
-- Wersja serwera: 10.3.27-MariaDB-31.cba+deb10u1
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `d4vez`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `capacity` float DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `power` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `make`, `model`, `year`, `capacity`, `mileage`, `power`) VALUES
(5, 1, 'Mitsubishi', 'Colt', 2002, 2000, 150000, 126),
(2, 2, 'Audi', 'A3', 2003, 1600, 234500, 75),
(3, 3, 'Chrysler', 'Town & Country', 2001, 3801, 321251, 161),
(6, 5, 'Ford', 'Mondeo', 2008, 2000, 177300, 145);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
