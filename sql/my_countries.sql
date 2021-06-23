-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2021 г., 19:38
-- Версия сервера: 5.7.25-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_countries`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `population` float DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `square` float DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `density` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `population`, `country_id`, `square`, `is_active`, `density`) VALUES
(1, 'New-York', 8491080, 1, 783.8, 1, 10833.22),
(2, 'Los-Angeles', 3928860, 1, 1302, 1, 3017.56),
(3, 'Chicago', 2722390, 1, 606.1, 1, 4491.65),
(4, 'Huston', 2239560, 1, 1733, 1, 1292.30),
(5, 'Chongqing', 34000000, 2, 82300, 0, 413.12),
(6, 'Shanqai', 24200000, 2, 6341, 1, 3816.43),
(7, 'Pekin', 21700000, 2, 16800, 1, 1291.67),
(8, 'Tienzinensis', 15700000, 2, 11760, 1, 1335.03),
(10, 'Osaka', 2668590, 3, 222.3, 1, 12004.44),
(11, 'Nagoya', 2283290, 3, 326.45, 1, 6994.30),
(12, 'Sapporo', 1918100, 3, 1710, 0, 1121.69),
(14, 'Hamburg', 1841180, 4, 755.2, 1, 2438.00),
(15, 'Munich', 1471510, 4, 310.7, 1, 4736.11),
(16, 'Koln', 1085660, 4, 405.2, 1, 2679.33),
(17, 'Mumbai', 12478400, 5, 603.4, 1, 20680.22),
(18, 'Deli', 11007800, 5, 1484, 1, 7417.68),
(19, 'Bangalor', 8425970, 5, 741, 1, 11371.08),
(20, 'Haidarabad', 6809970, 5, 650, 1, 10476.88),
(21, 'London', 8173900, 6, 1572, 1, 5199.68),
(22, 'Birmingham', 1028700, 6, 267.8, 1, 3841.30),
(23, 'Leeds', 751485, 6, 551.7, 1, 1362.13),
(24, 'Sheffield', 551800, 6, 367.9, 1, 1499.86),
(25, 'Paris', 2249980, 7, 367.9, 1, 6115.72),
(26, 'Marsel', 850636, 7, 240.6, 1, 3535.48),
(27, 'Lion', 491268, 7, 47.87, 1, 10262.54),
(28, 'Toulouse', 447360, 7, 118.3, 1, 3781.57),
(29, 'Roma', 2867080, 8, 1285, 1, 2231.19),
(30, 'Milan', 1350490, 8, 181.8, 1, 7428.42),
(31, 'Napoli', 972212, 8, 119, 1, 8169.85),
(32, 'Torino', 889600, 8, 130.2, 1, 6832.57),
(33, 'São Paulo', 12176900, 9, 1521, 1, 8005.83),
(34, 'Rio de Janeiro', 6688930, 9, 1255, 1, 5329.82),
(35, 'Brazilia', 2974700, 9, 5802, 0, 512.70),
(36, 'Salvador', 2857330, 9, 693.8, 1, 4118.38),
(37, 'Toronto', 2503280, 10, 630.2, 1, 3972.20),
(38, 'Monreal', 1620690, 10, 431.5, 1, 3755.95),
(39, 'Calgary', 988193, 10, 825.3, 0, 1197.37),
(40, 'Ottawa', 812129, 10, 2790, 0, 291.09);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'USA'),
(2, 'China'),
(3, 'Japan'),
(4, 'Germany'),
(5, 'India'),
(6, 'Greate Britain'),
(7, 'France'),
(8, 'Italy'),
(9, 'Brazil'),
(10, 'Canada');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
