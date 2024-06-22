-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jún 23. 00:19
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `secret`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `secret`
--

CREATE TABLE `secret` (
  `id` int(11) NOT NULL,
  `secret_text` varchar(1000) NOT NULL,
  `expires_at` datetime NOT NULL,
  `remaining_views` int(11) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expire_view` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `secret`
--

INSERT INTO `secret` (`id`, `secret_text`, `expires_at`, `remaining_views`, `created_at`, `expire_view`, `hash`) VALUES
(1, 'Az alma piros', '2024-06-22 16:26:12', 3, '2024-06-22 16:20:12', '0', '376230d964a0a38d05a34dde21a495f9edb4d306'),
(2, 'Az alma piros', '2024-06-22 16:36:33', 3, '2024-06-22 16:30:33', '0', '491ac001acbb02c50b8eb27db34d62f644d66148'),
(3, 'A fű zöld', '2024-06-22 18:57:18', 6, '2024-06-22 18:54:18', '0', '2da1901f365fcd4169bbfddb3ce41256ed903b33'),
(4, 'Az ég kék', '2024-06-22 19:15:58', 7, '2024-06-22 19:04:58', '0', '6702aacd94c70a0fa0c0eefa284e1d5fb214cfd9'),
(5, 'Atehén legel', '2024-06-22 19:17:00', 3, '2024-06-22 19:14:00', '0', '204a6e96924d6abd0389d7783207d53666b52351'),
(6, 'A cseresznye vörös', '2024-06-22 19:18:56', 11, '2024-06-22 19:15:56', '0', '9fdddb81250416de94cbfd3f7fbb1496d37c1ecb'),
(7, 'Julcsi szép', '2024-06-22 19:22:20', 4, '2024-06-22 19:18:20', '0', 'ffca33d841cdc9ad7eec2a18320cd47216ae7326'),
(8, 'A cica éhes', '2024-06-22 19:28:15', 4, '2024-06-22 19:21:15', '0', '4affdc59beff93a1619d384a7a456ba7fa154657'),
(9, 'Cicó nyávog', '2024-06-22 19:28:18', 5, '2024-06-22 19:27:18', '7', '03d51d61469979174681b0fb73aa84cedf6a706a'),
(10, 'A kutya szőrös', '2024-06-22 20:19:03', 3, '2024-06-22 20:13:03', '0', 'b273957a61c2c49e1480d00565262081a6fb9441'),
(11, 'Tamás fáradt', '2024-06-22 21:26:32', 5, '2024-06-22 21:14:32', '0', 'e7f89db9a77f04f8e61902b3cd8e3bf75f4e6c8f'),
(12, 'A nyúl szőrös', '2024-06-22 21:21:14', 3, '2024-06-22 21:15:14', '2', '8969471ae9b851996a71958bb63287a310c78571'),
(13, 'A ló nyerit', '2024-06-22 21:26:50', 3, '2024-06-22 21:20:50', '0', 'c6fa9414da25d2ce6dfe17466ae3d01e1fd55c9a'),
(14, 'Kacsa úszik', '2024-06-22 23:26:13', 3124, '2024-06-22 21:23:13', '0', '31d23dc6e0cb0b6b1d358f29a045519475732f2a'),
(15, 'A cica nyávog', '2024-06-22 21:37:48', 3, '2024-06-22 21:31:48', '2', 'bb990dfdd2528833bc6c572d5810aa4b8c744879'),
(16, 'A cica egeret fogott', '2024-06-22 22:48:05', 3, '2024-06-22 22:42:05', '0', '82a59c1cca039329687777f2e5ad6fcc600530cc'),
(17, 'Kacsa úszik a vizen', '2024-06-22 22:49:28', 3, '2024-06-22 22:44:28', '0', 'dafc9f152387bab2e0da4703063b964509d6db9d'),
(18, 'A cica elaludt', '2024-06-22 23:45:01', 3, '2024-06-22 23:39:01', '0', 'f291dfa6777dcb7fa6e53e79d620e885e8880f5f'),
(19, 'A cica felfedezte a kiscicát', '2024-08-31 10:50:18', 4, '2024-06-23 00:10:18', '0', 'd6724c36a0e9c148a6d9ff0fb51b814b515a4d65'),
(20, 'Szól a TV a háttérben', '2024-06-23 00:16:56', 4000, '2024-06-23 00:10:56', '1', '7ef4a9475cd4758c7e513729d5f07b9b26b0cd41');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `secret`
--
ALTER TABLE `secret`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `secret`
--
ALTER TABLE `secret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
