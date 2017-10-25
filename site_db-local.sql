-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 30 2017 г., 12:44
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Структура таблицы `grouptema`
--

CREATE TABLE IF NOT EXISTS `grouptema` (
  `groupcat` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  PRIMARY KEY (`groupcat`),
  UNIQUE KEY `groupcat` (`groupcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `grouptema`
--

INSERT INTO `grouptema` (`groupcat`, `groupname`) VALUES
(74, 'Модуль 5. "Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони"'),
(96, 'Тематичний короткостроковий семінар «Управління змінами»');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `members`
--

INSERT INTO `members` (`memberid`, `username`, `password`, `prizvishe`, `name`, `pobatkovi`, `birthday`, `organvlady`, `misceroboty`, `centrevlada`, `adresamisto`, `adresaraion`, `adresaoblast`, `posada`, `email`, `slugtelefon`, `category`, `groplata`, `rang`, `stagdergyear`, `stagdergmonth`, `stagposadayear`, `stagposadamonth`, `osvitavnz`, `osvitayear`, `osvitaspec`, `pisliaosvitavnz`, `pisliaosvitayear`, `pisliaosvitaspec`, `naukastup`, `pidvishenia`, `tema`, `groupcat`, `datezapovn`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'gen', '$2.Odqo7qYCNc', 'Баранецький', 'Сергій', 'Іванович', '2017-08-01', '4', 0, 0, '5', '6', '7', '8', 'g@g.g', '0123456789', 'А', '9', 0, 11, 12, 13, 1, '14', '2017-08-07', '13', '15', '2017-06-01', '16', '17', 2, '18', 90, '2017-08-02 14:28:36', 'Yes', NULL, 'No'),
(2, 'ten', '$2I7a8KZ4XN62', 'Жарчинська', 'Галина', 'Германівна', '2017-07-01', '44', 0, 0, '55', '66', '77', 'проідний фахівець', 't@t.t', '0998888999', 'À', '99', 0, 1010, 10, 1313, 11, '1414', '2017-07-02', '1515', '1616', '2017-07-03', '1717', '1818', 1, '1919', 91, '2017-08-02 14:37:11', 'Yes', NULL, 'No'),
(3, 'pen', '$2VRHiI3pQPVY', 'Заводян', 'Сергій', 'Петрович', '2017-08-04', 'рада смт Тоги', 0, 0, '5', '6', '7', 'інспектор', 'pen@p.p', '088 1234567', 'À', '9', 0, 10, 0, 11, 0, '12', '2017-08-07', '13', '14', '2017-08-02', '15', '16', 2, '17', 91, '2017-08-04 09:53:45', 'Yes', NULL, 'No'),
(4, 'ren', '$2rFl4VLWlcfg', 'Новікова', 'Ірина', 'Костянтинівна', '2017-08-04', '4', 0, 0, '5', '6', '7', 'фахівець', 'ren@r.r', '044 0000000', 'À', '9', 0, 10, 0, 11, 0, '12', '2017-08-07', '13', '14', '2017-08-02', '15', '16', 2, '17', 92, '2017-08-04 09:59:48', 'Yes', NULL, 'No'),
(5, 'fen', '$2YL6CkEjXts2', 'Рибальченко', 'Людмила', 'Григорівна', '2017-08-01', '3', 0, 0, '4', '5', '6', 'провідний інспектор', 'fen@f.f', '088 9999999', 'À', '9', 0, 9, 0, 10, 0, '11', '2017-08-07', '13', '13', '2017-08-04', '14', '15', 2, '16', 93, '2017-08-04 10:10:09', 'Yes', NULL, 'No'),
(6, 'den', '$2J.RbPnVehRo', 'Середюк', 'Наталія', 'Володимирівна', '2017-08-04', '4', 0, 0, '5', '6', '7', 'молодша інспектор', 'den@d.d', '099 9999999', 'À', '9', 0, 10, 0, 11, 0, '12', '2017-08-07', '13', '14', '2017-08-04', '15', '16', 2, '17', 93, '2017-08-04 10:17:58', 'Yes', NULL, 'No'),
(7, 'wen', '$22v6c7yS3oAk', 'Ульянич', 'Наталя', 'Леонідівна', '2017-08-01', '4', 0, 0, '5', '6', '7', 'наймолодший інспектор', 'wen@w.w', '044 0000000', 'À', '9', 0, 10, 0, 11, 0, '12', '2017-08-07', '13', '14', '2017-08-31', '15', '16', 2, '17', 94, '2017-08-04 11:35:19', 'Yes', NULL, 'No'),
(10, 'qen', '$2J5YeVuQSVAY', 'Яворовенко', 'В''ячеслав', 'Вікторович', '2017-08-01', '1', 0, 0, '1', '1', '1', 'інспектор', 'qen@q.q', '088 8888888', 'À', 'А', 0, 2, 2, 2, 2, '2', '2017-08-07', '13', '2', '2017-08-25', '2', '2', 2, '2', 94, '2017-08-04 12:23:04', 'Yes', NULL, 'No'),
(11, 'ring', '$2F2xqk6aSX2Y', 'Дома', 'Домик', 'Домище', '2014-01-01', 'ДомаДома', 0, 0, 'Дома нас', 'Дома рай', 'Дома обл', 'Дома посада', 'ring@r.r', '0448888888', 'А', 'группа 9', 0, 10, 11, 11, 12, 'выща', '2014-01-01', 'спец', 'після', '2014-01-01', 'спец піс', 'Наук', 2, 'тема', 92, '2017-08-07 10:15:30', 'Yes', NULL, 'No'),
(12, 'gen1', '$2/jI9cTWV9ws', 'Подкуйко', 'Олена', 'Петрівна', '2017-08-17', '4', 0, 0, '5', '6', '7', 'старший фахівець', 'gen@g.g', '0999999999', 'À', '10', 0, 11, 12, 13, 11, '14', '2017-08-09', '15', '16', '2017-08-01', '17', '18', 2, '19', 93, '2017-08-08 08:42:03', 'Yes', NULL, 'No'),
(13, 'rring', '$2TnbaqFP2NaA', 'Ротань', 'Ротику', 'Ротанович', '2017-08-16', 'сільска рада смт Роги', 0, 0, 'смт Роги', 'район Рурський', 'Миколаївська', 'молодший інспектор', 'rring@r.r', '0999999999', 'В', '6 група', 0, 12, 0, 11, 0, 'Рурський колледж', '2006-08-19', 'інспектор по кредитам', 'Київський центр', '2014-07-18', 'інспектор по заборгованности', 'нема', 1, 'Виявлення заборгованности', 93, '2017-08-08 09:38:45', 'Yes', NULL, 'No'),
(14, 'rolly', '$2TvAt./t8bkA', 'Ігнатьєва', 'Христина', 'Олегівна', '2017-08-04', 'rolly', 0, 0, 'rolly', 'rolly', 'rolly', 'фахівець', 'rolly@r.r', '0999999999', 'À', 'rolly', 0, 12, 0, 12, 0, 'rolly', '2017-08-04', 'rolly', '', NULL, '', '', 2, '', 90, '2017-08-08 09:51:54', 'Yes', NULL, 'No'),
(20, 'tina', '$2zKO0u/3wA8o', 'Тінич', 'Тіна', 'Тіновна', '1979-01-31', 'Місцевий орган', 0, 0, 'м.Тіса', 'район Хотинський', 'Рівненська', 'Старший інспектор', 'tina@tina.tina', '0999999999', 'Б', '9 група', 0, 11, 2, 11, 3, 'Рівненський внз', '2008-08-16', 'Інстпектор по самоврядуванню', '', '2017-08-19', '', '', 1, '', 92, '2017-08-08 14:26:08', 'Yes', NULL, 'No'),
(21, 'nova', '$2SDqfybOvN86', 'Шауренко', 'Тетяна', 'Володимирівна', '2017-08-09', 'nova', 0, 0, 'nova', 'nova', 'nova', 'молодша інспектор', 'nova@nova.nova', '0999999999', 'А', 'nova', 0, 11, 0, 10, 0, 'nova', '2017-08-31', 'nova', '', '2017-08-23', '', '', 2, '', 90, '2017-08-09 11:56:31', 'Yes', NULL, 'No'),
(22, 'new', '$2FqfdzDgqwAI', 'Ясельська', 'Марія', 'Василівна', '2017-08-01', 'new', 0, 0, 'new', 'new', 'new', 'молодша інспектор', 'new@new.new', '0999999999', 'À', 'new', 0, 1, 0, 2, 0, 'new', '2017-08-25', 'new', '', '0000-00-00', '', '', 2, '', 90, '2017-08-09 13:11:47', 'Yes', NULL, 'No'),
(23, 'centrekiev', '$2tV6wY5DShjE', 'centre-kiev', 'centre-kiev', 'centre-kiev', '2017-08-01', 'centre-kiev', 0, 0, 'centre-kiev', 'centre-kiev', 'centre-kiev', 'centre-kiev', 'kapitanoss@mail.ru', '0440000000', 'А', 'centre-kiev', 0, 11, 0, 12, 0, 'centre-kiev', '2017-08-02', 'centre-kiev', '', '0000-00-00', '', '', 2, '', 0, '2017-08-14 07:39:49', 'Yes', 'ec049041dcbb47964ee3fd982fef86a7', 'Yes'),
(24, 'tttt', '$2s.4HACfyqsg', 'tttt', 'tttt', 'tttt', '2017-08-16', 'tttt', 0, 0, 'tttt', 'tttt', 'tttt', 'tttt', 'tttt@t.t', '0000000000', 'А', 'tttt', 0, 2, 0, 3, 0, 'tttt', '2017-08-04', 'tttt', '', '0000-00-00', '', '', 2, '', 91, '2017-08-15 09:28:43', 'Yes', NULL, 'No'),
(26, 'seek', '$2H/sXwk1CfFA', 'seek1', 'seek2', 'seek3', '2017-08-01', 'seek', 0, 0, 'seek', 'seek', 'seek', 'seek', 'seekdon@mail.ru', '0000000000', 'А', 'seek', 0, 1, 0, 2, 0, 'seek', '2017-08-01', 'seek', 'seek', '0000-00-00', '', '', 2, '', 90, '2017-08-19 09:15:23', 'Yes', 'da49a64ba06464a468729af0eb148674', 'Yes'),
(27, 'test', '$2vU67iv49YBo', 'test', 'test', 'test', '2017-08-01', 'test', 0, 0, 'test', 'test', 'test', 'test', 'test@test.com', '0888888888', '1', '1', 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '', 93, '2017-08-28 14:21:43', 'YES', NULL, 'No'),
(28, 'test1', '$26eaH3zLE5vI', 'test1', 'test1', 'test1', '2017-07-31', NULL, 1, 19, 'test1', '', '', 'test1', 'test1@test1.com', '0000000000', '2', '3', 4, 3, 0, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 91, '2017-08-29 13:40:23', 'YES', NULL, 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
