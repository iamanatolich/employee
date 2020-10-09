-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 09 2020 г., 16:16
-- Версия сервера: 8.0.21-0ubuntu0.20.04.4
-- Версия PHP: 7.1.33-17+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `employee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text,
  `surname` text,
  `id_position` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`, `id_position`) VALUES
(1, 'root', '$2y$10$S9M7rEPoKiyAR3xB5lNQFeEydHjUrR/gmP.m6wKoHnvDMC/WE5MaK', 'Администратор', '', 2),
(45, 'supervisor', '$2y$10$CYy6mvFerTRk.VacfQsTqeZfBKW51oJKffX3JZ7N/b.7p6/k69iDe', 'Иван', 'Иванов', 1),
(46, 'employee', '$2y$10$IWg1ToyHS22V.VqoROt0TesCm7pBNMRzGNc2Fj30vI9nr3n.cUPya', 'Пётр', 'Петров', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `vacation`
--

CREATE TABLE `vacation` (
  `id` int NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `id_user` int NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `vacation`
--
ALTER TABLE `vacation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
