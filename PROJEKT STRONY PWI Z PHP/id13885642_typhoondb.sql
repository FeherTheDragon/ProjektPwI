-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 05 Cze 2020, 07:07
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `id13885642_typhoondb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id_ogloszenia` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `tytul` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `tresc` varchar(2048) COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `ogl_miejsce` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `ogl_data` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `ogl_wstep` varchar(128) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ogloszenia`
--

INSERT INTO `ogloszenia` (`id_ogloszenia`, `id_uzytkownika`, `tytul`, `tresc`, `data`, `ogl_miejsce`, `ogl_data`, `ogl_wstep`) VALUES
(1, 4, 'Imprezka!', 'Super wydarzenie, zaproście znajomych, ale tylko do 50 osób bo nie można więcej :(', '2020-05-20 10:40:00', 'Rynek Kościuszki', '2020-06-13 20:00:00', 'Wolny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profile`
--

CREATE TABLE `profile` (
  `id_profilu` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `wiek` int(3) DEFAULT NULL,
  `plec` varchar(15) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `profile`
--

INSERT INTO `profile` (`id_profilu`, `id_uzytkownika`, `imie`, `wiek`, `plec`) VALUES
(1, 1, 'Piotr', 21, 'Mężczyzna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `wiek` int(11) DEFAULT NULL,
  `plec` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `haslo` char(58) COLLATE utf8_polish_ci NOT NULL,
  `avatar` varchar(512) COLLATE utf8_polish_ci DEFAULT NULL,
  `typ_uzytkownika` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `imie`, `nazwisko`, `wiek`, `plec`, `login`, `haslo`, `avatar`, `typ_uzytkownika`) VALUES
(1, 'Piotr', 'Gruda', 21, 'Mężczyzna', 'feher', '817717a7f731a9e325c2a04a489523a4573c6f2c9b7ce84a5a8ee99e', 'https://pbs.twimg.com/profile_images/1232010325320511489/Zvr_6eO9_400x400.jpg', 'Admin'),
(2, 'Ania', 'Kropka', 20, '', 'superania', 'bfb03bebf9f4954cbbd19d3bc9ec86dda852929916b1317b02ea61ae', 'https://i.pinimg.com/originals/11/4e/5a/114e5a3d3f7541f9addfdf52413a9838.png', 'Użytkownik'),
(3, 'Michał', 'Kajak', NULL, NULL, 'm1ch4l', '2ba5cae8b7454e8a163c5f77808bed5ff7afba94d405a224dac6ddc6', 'https://cdn.iconscout.com/icon/free/png-512/avatar-372-456324.png', 'Użytkownik'),
(4, 'Janusz', 'Płaz', NULL, NULL, 'janienusz', '02f49d3e79e75bfa21b845bb1cbca7a06bc47f397944dd5944501287', 'https://d-nm.ppstatic.pl/kadr/k/r/22/50/5c4839475c6b1_o,size,200x140,q,70,h,297c75.jpg', 'Użytkownik'),
(8, 'admin', 'admin', NULL, NULL, 'admin', '58acb7acccce58ffa8b953b12b5a7702bd42dae441c1ad85057fa70b', 'https://iupac.org/wp-content/uploads/2018/05/default-avatar.png', 'Admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wpisy`
--

CREATE TABLE `wpisy` (
  `id_wpisu` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `tytul` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `tresc` varchar(2048) COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wpisy`
--

INSERT INTO `wpisy` (`id_wpisu`, `id_uzytkownika`, `tytul`, `tresc`, `data`) VALUES
(1, 1, 'Pierwszy wpis', 'Pierwszy wpis w serwisie! Yay!', '2020-05-18 08:00:00'),
(2, 3, 'Nowa restauracja', 'Otworzyli nową restauracje na osiedlu! Trzeba ją sprawdzić!', '2020-05-19 20:33:00'),
(3, 3, 'Nowa restauracja cd', 'Byłem tam. Nie polecam dań z kurczaka, ale za to ryba jest genialna!', '2020-05-20 11:16:00'),
(8, 1, 'Siemka!', ':)', '2020-05-29 19:46:01');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id_ogloszenia`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profilu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  ADD PRIMARY KEY (`id_wpisu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id_ogloszenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profilu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  MODIFY `id_wpisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD CONSTRAINT `ogloszenia_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Ograniczenia dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  ADD CONSTRAINT `wpisy_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
