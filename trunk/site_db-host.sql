-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Авг 30 2017 г., 12:47
-- Версия сервера: 5.5.54-cll-lve
-- Версия PHP: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `site_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kartka`
--

CREATE TABLE IF NOT EXISTS `kartka` (
  `prizvishe` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pobatkovi` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `organvlady` varchar(255) NOT NULL,
  `adresamisto` varchar(255) NOT NULL,
  `adresaraion` varchar(255) NOT NULL,
  `adresaoblast` varchar(255) NOT NULL,
  `posada` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `slugtelefon` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `groplata` enum('А','Б','В') NOT NULL,
  `stagdergyear` int(11) NOT NULL,
  `stagdergmonth` int(11) NOT NULL,
  `stagposadayear` int(11) NOT NULL,
  `stagposadamonth` int(11) NOT NULL,
  `osvitavnz` varchar(255) NOT NULL,
  `osvitayear` int(11) NOT NULL,
  `osvitaspec` date NOT NULL,
  `pisliaosvitavnz` varchar(255) NOT NULL,
  `pisliaosvitayear` date NOT NULL,
  `pisliaosvitaspec` int(11) NOT NULL,
  `naukastup` varchar(255) NOT NULL,
  `pidishenia` enum('так','ні') NOT NULL,
  `tema` varchar(255) NOT NULL,
  `datezapovn` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupcat` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pole5` int(11) NOT NULL,
  `pole6` int(11) NOT NULL,
  `pole7` int(11) NOT NULL,
  `pole8` int(11) NOT NULL,
  `pole9` int(11) NOT NULL,
  `pole10` int(11) NOT NULL,
  `pole11` int(11) NOT NULL,
  `pole12` int(11) NOT NULL,
  `pole13` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`),
  UNIQUE KEY `email_3` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `kartka1`
--

CREATE TABLE IF NOT EXISTS `kartka1` (
  `prizvishe` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `kartka1`
--

INSERT INTO `kartka1` (`prizvishe`, `name`, `email`, `id`, `username`, `password`) VALUES
('Zvolinsky', NULL, 'g.zvolinsky@gmail.com', 1, 'admin', 'admin'),
('Fam', NULL, 'seekdon@mail.ru', 2, 'men', 'men'),
('Z', NULL, 'Z@Z', 3, 'z', 'z'),
('yyy', NULL, 'y@y.y', 4, 'y', 'y'),
('rr', NULL, 'r@r.r', 5, 'r', 'r'),
('t', NULL, 't@t', 6, 't', 't');

-- --------------------------------------------------------

--
-- Структура таблицы `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prizvishe` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pobatkovi` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `organvlady` varchar(255) DEFAULT NULL,
  `misceroboty` int(11) NOT NULL,
  `centrevlada` int(11) NOT NULL,
  `adresamisto` varchar(255) NOT NULL,
  `adresaraion` varchar(255) DEFAULT NULL,
  `adresaoblast` varchar(255) DEFAULT NULL,
  `posada` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `slugtelefon` varchar(255) NOT NULL,
  `category` varchar(5) NOT NULL,
  `groplata` varchar(255) NOT NULL,
  `rang` int(11) NOT NULL,
  `stagdergyear` int(11) NOT NULL,
  `stagdergmonth` int(11) NOT NULL DEFAULT '0',
  `stagposadayear` int(11) NOT NULL,
  `stagposadamonth` int(11) NOT NULL DEFAULT '0',
  `osvitavnz` varchar(255) DEFAULT NULL,
  `osvitayear` date DEFAULT NULL,
  `osvitaspec` varchar(255) DEFAULT NULL,
  `pisliaosvitavnz` varchar(255) DEFAULT NULL,
  `pisliaosvitayear` date DEFAULT NULL,
  `pisliaosvitaspec` varchar(255) DEFAULT NULL,
  `naukastup` varchar(255) DEFAULT NULL,
  `pidvishenia` int(11) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `groupcat` int(11) NOT NULL,
  `datezapovn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`memberid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `members`
--

INSERT INTO `members` (`memberid`, `username`, `password`, `prizvishe`, `name`, `pobatkovi`, `birthday`, `organvlady`, `misceroboty`, `centrevlada`, `adresamisto`, `adresaraion`, `adresaoblast`, `posada`, `email`, `slugtelefon`, `category`, `groplata`, `rang`, `stagdergyear`, `stagdergmonth`, `stagposadayear`, `stagposadamonth`, `osvitavnz`, `osvitayear`, `osvitaspec`, `pisliaosvitavnz`, `pisliaosvitayear`, `pisliaosvitaspec`, `naukastup`, `pidvishenia`, `tema`, `groupcat`, `datezapovn`, `active`, `resetToken`, `resetComplete`) VALUES
(17, 'victor', '$2y$10$F4Y8yFeI0wONN2G17SiRiuvpTskMpOsS9eyIJ2lIhk8vQrT73rtSy', 'Вікторенко', 'Віктор', 'Вікторович', '2017-08-01', 'орган місцевої влади смт. Вікторія', 2, 0, 'смт. Вікторія', 'район Вікторіаньский', 'Закарпатська область', 'головний уповноважений по аудіту', 'victor@victor.victor', '0559999999', '3', '3', 4, 1, 0, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 90, '2017-08-10 08:53:27', 'Yes', NULL, 'No'),
(19, 'centrekiev', '$2y$10$4LLGGWUgfZE.QbZPOQhsh.UEi0NHkjv5Q4wtTcbPAH7r7uqHDc88u', 'centrekiev', 'centrekiev', 'centrekiev', '2017-08-16', 'centrekiev', 2, 0, 'centrekiev', 'centrekiev', 'centrekiev', 'centrekiev', 'centrekiev@centrekiev.centrekiev', '0000000000', '1', '1', 1, 1, 0, 2, 0, 'centrekiev', '2017-08-16', 'centrekiev', '', '0000-00-00', '', '', 2, '', 0, '2017-08-16 07:28:26', 'Yes', NULL, 'No'),
(20, 'nastasyak1986', '$2y$10$l7o5IXGpelMSUxuLLrCkFeBpT8r.hI3PEJWYhWpxnUGPQL4S7QUPm', 'марчен', 'нас', 'сер', '1990-01-01', 'про', 2, 0, 'киев', 'сол', 'київська', 'фах', 'nastasyak1986@ukr.net', '0991300427', '1', '1', 1, 1, 1, 1, 1, 'ен', '1996-02-02', 'ррр', 'рр', '1999-09-09', 'ррр', 'ррррр', 1, 'рррррр', 90, '2017-08-16 08:09:39', 'Yes', NULL, 'No'),
(21, 'seek', '$2y$10$siybTCncECw1e25HqepO9.Xy7xX4HEftGQ.m5P/.ApDiEfBUh1vbO', 'seek', 'seek', 'seek', '2017-08-02', 'seek', 2, 0, 'seek', 'seek', 'seek', 'seek', 'seekdon@mail.ru', '0000000000', '1', '1', 1, 1, 0, 1, 0, 'seek', '2017-08-01', 'seek', '', '0000-00-00', '', '', 2, '', 92, '2017-08-18 13:43:35', 'Yes', '7e7667ffe734ecb4296051ae34d66e30', 'Yes'),
(25, 'kapt', '$2y$10$uO5gwFAJNCRsdTc/z8vrNubBZO91gGJDV7RwpG5n/faMfhpLPZUgi', 'kapt', 'kapt', 'kapt', '2017-08-08', 'kapt', 2, 0, 'kapt', 'kapt', 'kapt', 'kapt', 'kapitanoss@mail.ru', '0000000000', '2', '1', 4, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '', 91, '2017-08-21 08:27:12', 'Yes', NULL, 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
