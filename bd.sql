-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2022 г., 22:39
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `ID_Authors` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`ID_Authors`, `name`) VALUES
(1, 'Ulisses Lewis'),
(2, 'Pembroke Martinez'),
(3, 'Quentrell Nelson'),
(4, 'Nestor Walker');

-- --------------------------------------------------------

--
-- Структура таблицы `book_authors`
--

CREATE TABLE `book_authors` (
  `FID_book` int(10) NOT NULL,
  `FID_Authors` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `book_authors`
--

INSERT INTO `book_authors` (`FID_book`, `FID_Authors`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `literature`
--

CREATE TABLE `literature` (
  `ID_Book` int(10) NOT NULL,
  `title` text DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `ISBN` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `number` text DEFAULT NULL,
  `publisher` text DEFAULT NULL,
  `literate` enum('Book','Journal','Newspaper') NOT NULL,
  `Fid_resourse` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `literature`
--

INSERT INTO `literature` (`ID_Book`, `title`, `quantity`, `ISBN`, `date`, `year`, `number`, `publisher`, `literate`, `Fid_resourse`) VALUES
(1, 'Book1', 250, 'ISBN_EXAMPLE-1', NULL, 2001, NULL, 'publisher1', 'Book', 1),
(2, 'Journal1', 15, ' ISBN_EXAMPLE-2', '2008-12-12', NULL, '1', 'publisher2', 'Journal', 1),
(3, 'Book2', 400, ' ISBN_EXAMPLE-3', NULL, 1998, NULL, 'publisher1', 'Book', 1),
(4, 'Book3', 350, ' ISBN_EXAMPLE-4', NULL, 2003, NULL, 'publisher1', 'Book', 2),
(5, 'Newspaper1', 20, ' ISBN_EXAMPLE-5', '2008-12-12', NULL, NULL, 'publisher3', 'Newspaper', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `resourse`
--

CREATE TABLE `resourse` (
  `id_resourse` int(10) NOT NULL,
  `title_resourse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `resourse`
--

INSERT INTO `resourse` (`id_resourse`, `title_resourse`) VALUES
(1, 'Disk'),
(2, 'Web'),
(3, 'Audio');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`ID_Authors`);

--
-- Индексы таблицы `literature`
--
ALTER TABLE `literature`
  ADD PRIMARY KEY (`ID_Book`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
