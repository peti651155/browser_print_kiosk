-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 20. 14:40
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szakdoga`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `events`
--

CREATE TABLE `events` (
  `nev` varchar(255) DEFAULT NULL,
  `helyszin` varchar(255) DEFAULT NULL,
  `idopont` datetime DEFAULT NULL,
  `ar` decimal(10,2) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `events`
--

INSERT INTO `events` (`nev`, `helyszin`, `idopont`, `ar`, `id`) VALUES
('Futóverseny', 'Városliget', '2023-06-05 10:00:00', '5500.00', 1),
('Popkoncert', 'Papp László Budapest Sportaréna', '2023-06-12 19:00:00', '8900.00', 2),
('Kosárlabda mérkőzés', 'Fővárosi Sportcsarnok', '2023-06-14 18:00:00', '7200.00', 3),
('Társasjáték est', 'Board Game Café', '2023-06-17 19:00:00', '3000.00', 4),
('Jazz koncert', 'A38 Hajó', '2023-06-20 20:00:00', '6500.00', 5),
('Teniszverseny', 'Római Teniszklub', '2023-06-22 12:00:00', '8000.00', 6),
('Rock koncert', 'Dürer Kert', '2023-06-24 21:00:00', '4500.00', 7),
('Asztalitenisz bajnokság', 'Budapesti Sportcsarnok', '2023-06-26 09:00:00', '5400.00', 8),
('Fesztivál', 'Margitsziget', '2023-06-29 16:00:00', '10000.00', 9),
('Sakk verseny', 'Corvinus Egyetem', '2023-06-30 14:00:00', '3800.00', 10);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
