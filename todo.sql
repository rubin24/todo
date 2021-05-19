-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 19 2021 г., 09:11
-- Версия сервера: 5.7.24-0ubuntu0.16.04.1
-- Версия PHP: 7.0.33-2+ubuntu16.04.1+deb.sury.org+2+will+reach+end+of+life+in+april+2019

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todo`
--
CREATE DATABASE IF NOT EXISTS `todo` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `todo`;

-- --------------------------------------------------------

--
-- Структура таблицы `todo`
--

CREATE TABLE `todo` (
  `id` int(11) UNSIGNED NOT NULL,
  `cat_name` varchar(24) COLLATE utf8_bin NOT NULL,
  `timestamp_iso8601` datetime NOT NULL,
  `title` varchar(75) COLLATE utf8_bin NOT NULL,
  `description` varchar(300) COLLATE utf8_bin NOT NULL,
  `finish` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todo`
--
ALTER TABLE `todo`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
