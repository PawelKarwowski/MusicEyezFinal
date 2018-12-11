-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Gru 2018, 00:49
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `login`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usersfacebook`
--

CREATE TABLE `usersfacebook` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `plec` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `urodziny` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `plec`, `urodziny`, `picture`) VALUES
(1, 'adam', '$2y$10$qnoBBH9kpfgHYA0LDf9rw.NrYVcJc/azHnP3E3486iI09yux0w4hy', 'adam@gmail.com', 'Mężczyzna', NULL, 'img/icons/Freddie-icon.png'),
(2, 'admin', '$2y$10$atcHa/E/MM8gfa.keXYqqOJNvoyUKf7LkiW3bOD7DWUOHXLgARq2K', 'admin@gmail.com', 'Mężczyzna', NULL, 'img/icons/Hellboy-icon.png'),
(9, 'janusz', 'cvbnm', 'janusz@gmail.com', 'Mężczyzna', NULL, NULL),
(10, 'roman', 'dfghj', 'roman@gmail.com', 'Mężczyzna', NULL, NULL),
(11, 'ewedasda', '$2y$10$zL9QBnhXiAY9hRwJnbKac.N99ujqa0Laq9rSA2BDCuI5gQwCyJUAa', 'jonarkham@wp.pl', 'Kobieta', '26/11/2018', NULL),
(12, 'Karolinka', '$2y$10$biQmkGIuQUVJ/PbJBPGxkuiSU8XQ8O8Xw87gbzzkpKk7oq7/LrrWG', 'karolina.oleszek@onet.pl', 'Kobieta', '12/11/2018', NULL),
(17, 'karolinakarolina', '$2y$10$gdEH5yW6tz1v92A5sWOKxOH34sktASZTpQYXaeZRMhPZHnFx79Tty', 'karolinFSFSa.oleszek@onet.pl', 'Kobieta', '19/11/2018', 'img/icons/Mike-icon.png'),
(16, 'adminadmin', '$2y$10$4ApS0wQYZ6fIC1gjsG9goOD4/79JRHiwPzIDlH2HO.CK1xr63a4by', 'jonarsdsdkham@wp.pl', 'Kobieta', '05/11/2018', 'img/icons/Mike-icon.png');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `usersfacebook`
--
ALTER TABLE `usersfacebook`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `usersfacebook`
--
ALTER TABLE `usersfacebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
