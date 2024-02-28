-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 01:59 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trengym`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `Imię` varchar(255) NOT NULL,
  `Nazwisko` varchar(255) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `haslo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `data_urodzenia` date DEFAULT NULL,
  `numer_telefonu` int(11) DEFAULT NULL,
  `Typ_karnetu` varchar(255) NOT NULL,
  `Pozostała_dlugosc_karnetu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `Imię`, `Nazwisko`, `login`, `haslo`, `email`, `data_urodzenia`, `numer_telefonu`, `Typ_karnetu`, `Pozostała_dlugosc_karnetu`) VALUES
(1, 'Adam', 'Admin', 'admin', 'admin', 'admin@admin.com', '2023-12-17', 123123123, '', 30),
(2, 'Maciej', 'Sierakowski', 'Sierak', '12345678', 'maciek.sierakowskigg@gmail.com', '0000-00-00', 123123123, '', 30),
(3, 'Wojciech', 'Suchodolski', 'Major', '12345678', 'major@wp.pl', '1998-07-09', 321321321, '', 30),
(4, 'Mchal', 'Kononowicz', 'konon', 'kononowicz', 'Michal.Kononowicz@s.pl', '2023-12-05', 70021371, '', 30);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
