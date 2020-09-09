-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 03 2017 г., 09:29
-- Версия сервера: 5.5.41-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `menu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admmenu`
--

CREATE TABLE IF NOT EXISTS `admmenu` (
  `adm_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(40) DEFAULT NULL,
  `vidimost` int(11) DEFAULT NULL,
  `content_page` varchar(50) DEFAULT NULL,
  `adm_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `gr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_title` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`gr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `indproject`
--

CREATE TABLE IF NOT EXISTS `indproject` (
  `indpr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `indpr_theme` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`indpr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `ktp`
--

CREATE TABLE IF NOT EXISTS `ktp` (
  `ktp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `podmenu_id` int(11) DEFAULT NULL,
  `subject` varchar(60) DEFAULT NULL,
  `number_lesson` varchar(7) DEFAULT NULL,
  `view_lesson` varchar(8) DEFAULT NULL,
  `theme_lesson` varchar(105) DEFAULT NULL,
  `hours` varchar(2) DEFAULT NULL,
  `view_posob_lesson` varchar(25) DEFAULT NULL,
  `samost_work_zad` varchar(60) DEFAULT NULL,
  `literature` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ktp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `kurses`
--

CREATE TABLE IF NOT EXISTS `kurses` (
  `kurs_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kurs_title` varchar(10) DEFAULT NULL,
  `kurs_number` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`kurs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `less_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datelesson` varchar(10) DEFAULT NULL,
  `timelesson` varchar(10) DEFAULT NULL,
  `theme lesson` text,
  `info_lesson` varchar(80) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `grouplesson` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`less_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` text,
  `pn` int(11) DEFAULT NULL,
  `priznak` int(11) DEFAULT NULL,
  `vidimost` int(11) DEFAULT NULL,
  `menu_content` text,
  `user_status_id` int(11) DEFAULT NULL,
  `contant_page` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `newspapers`
--

CREATE TABLE IF NOT EXISTS `newspapers` (
  `nsp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nsp_title` text,
  `nsp_text` text,
  `podmenu_id` int(11) DEFAULT NULL,
  `vidimost` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `content_page` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nsp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pars`
--

CREATE TABLE IF NOT EXISTS `pars` (
  `pars_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pars_title` varchar(7) DEFAULT NULL,
  `pars_time` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pars_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `podmenu`
--

CREATE TABLE IF NOT EXISTS `podmenu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `podmenu_item` text,
  `pn` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `content` text,
  `page_annotation` varchar(60) DEFAULT NULL,
  `is_articles` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `content_page` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `prepodloading`
--

CREATE TABLE IF NOT EXISTS `prepodloading` (
  `prl_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usr_id` int(11) DEFAULT NULL,
  `subj_id` int(11) DEFAULT NULL,
  `gr_id` int(11) DEFAULT NULL,
  `hours` varchar(5) DEFAULT NULL,
  `itog` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`prl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `st_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status_title` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subjects_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subjects_title` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`subjects_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(30) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_oname` varchar(20) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` text,
  `status_id` int(11) DEFAULT NULL,
  `activation` int(11) DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `view_lesson`
--

CREATE TABLE IF NOT EXISTS `view_lesson` (
  `vl_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vl_title` text,
  PRIMARY KEY (`vl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `view_posob`
--

CREATE TABLE IF NOT EXISTS `view_posob` (
  `vp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vp_title` text,
  PRIMARY KEY (`vp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `year_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `year_title_begin` varchar(4) DEFAULT NULL,
  `year_title_end` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
