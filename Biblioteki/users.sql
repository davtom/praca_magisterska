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
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `surname` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`) VALUES
(1, 'D4vez', '4f13e9a094e54e624da30e6bd63ccf95', 'Dawid', 'Zamorowski'),
(2, 'Audi', '4d9fa555e7c23996e99f1fb0e286aea8', 'Ewa', 'Ewa'),
(3, 'yoshi', '3d8829fefb8fe6f0df44a76f14c449d2', 'Krystian', 'DÄ…browski'),
(4, 'Zetor', 'e0ad95fbd21404fa40933265c8ef4b90', 'Tomasz', 'Zamorowski'),
(5, 'Zetor149', '20498b6388cb28b460324bd7f1702847', 'Tomasz', 'Zamorowski');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
