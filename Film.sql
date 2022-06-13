-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 04 2022 г., 20:00
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `film`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actor`
--

CREATE TABLE `actor` (
  `ID_Actor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `actor`
--

INSERT INTO `actor` (`ID_Actor`, `name`) VALUES
(1, 'Омари Хардвик'),
(2, 'Лоретта Дивайн'),
(3, 'Данила Козловский'),
(4, 'Оксана Акиньшина'),
(5, 'Харрисон Форд\r\n'),
(6, 'Омар Си');

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `ID_Film` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `country` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `codec` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `carrier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`ID_Film`, `name`, `date`, `country`, `quality`, `resolution`, `codec`, `producer`, `director`, `carrier`) VALUES
(1, 'Зов предков', '2020-02-20', 'Канада', 'HD', '1920x1080', 'K-Lite', 'Эрвин Стофф', 'Крис Сандерс', 'video'),
(2, 'Чернобыль', '2021-04-15', 'Россия', 'HD', '1920x1080', 'K-Lite', 'Данила Козловский', 'Данила Козловский', 'video'),
(3, 'Заклинание', '2020-10-30', 'США', 'HD', '1920x1080', 'K-Lite', 'Моррис Честнат', 'Марк Тондерай', 'video');

-- --------------------------------------------------------

--
-- Структура таблицы `film_actor`
--

CREATE TABLE `film_actor` (
  `FID_Film` int(11) NOT NULL,
  `FID_Actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film_actor`
--

INSERT INTO `film_actor` (`FID_Film`, `FID_Actor`) VALUES
(3, 2),
(3, 1),
(1, 5),
(1, 6),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `film_genre`
--

CREATE TABLE `film_genre` (
  `FID_Film` int(11) NOT NULL,
  `FID_Genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film_genre`
--

INSERT INTO `film_genre` (`FID_Film`, `FID_Genre`) VALUES
(3, 6),
(3, 7),
(2, 4),
(2, 5),
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `ID_Genre` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`ID_Genre`, `title`) VALUES
(1, 'Мультфильмы'),
(2, 'Приключения'),
(3, 'Семейный'),
(4, 'Драма'),
(5, 'Романтика'),
(6, 'Ужасы'),
(7, 'Триллер');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`ID_Actor`),
  ADD KEY `ID_Actor` (`ID_Actor`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_Film`),
  ADD KEY `ID_Film` (`ID_Film`);

--
-- Индексы таблицы `film_actor`
--
ALTER TABLE `film_actor`
  ADD KEY `FID_Actor` (`FID_Actor`),
  ADD KEY `FID_Film` (`FID_Film`);

--
-- Индексы таблицы `film_genre`
--
ALTER TABLE `film_genre`
  ADD KEY `FID_Film` (`FID_Film`),
  ADD KEY `FID_Genre` (`FID_Genre`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_Genre`),
  ADD KEY `ID_Genre` (`ID_Genre`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actor`
--
ALTER TABLE `actor`
  MODIFY `ID_Actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `film`
--
ALTER TABLE `film`
  MODIFY `ID_Film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_Genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `film_actor`
--
ALTER TABLE `film_actor`
  ADD CONSTRAINT `film_actor_ibfk_1` FOREIGN KEY (`FID_Actor`) REFERENCES `actor` (`ID_Actor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `film_actor_ibfk_2` FOREIGN KEY (`FID_Film`) REFERENCES `film` (`ID_Film`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_genre_ibfk_1` FOREIGN KEY (`FID_Film`) REFERENCES `film` (`ID_Film`) ON UPDATE CASCADE,
  ADD CONSTRAINT `film_genre_ibfk_2` FOREIGN KEY (`FID_Genre`) REFERENCES `genre` (`ID_Genre`) ON UPDATE CASCADE;
COMMIT;