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
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `datewhen` date DEFAULT NULL,
  `what` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `services`
--

INSERT INTO `services` (`id`, `car_id`, `datewhen`, `what`) VALUES
(1, 2, '2021-02-04', 'Wymiana oleju '),
(2, 2, '2021-02-27', 'Wymiana pÅ‚ynÃ³w '),
(3, 2, '2021-02-19', 'PrzeglÄ…d techniczny ');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
