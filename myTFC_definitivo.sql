-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2011 a las 11:42:46
-- Versión del servidor: 5.5.9
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `myTFC`
--
CREATE DATABASE `myTFC` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myTFC`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmt_category`
--

CREATE TABLE `dmt_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmt_classifiers`
--

CREATE TABLE `dmt_classifiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` int(11) NOT NULL,
  `Filter` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `traingroup` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `algorythm` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `num_instances` bigint(45) NOT NULL DEFAULT '0',
  `num_attributes` double NOT NULL DEFAULT '0',
  `correct` double NOT NULL DEFAULT '0',
  `pct_correct` double NOT NULL DEFAULT '0',
  `incorrect` double NOT NULL DEFAULT '0',
  `pct_incorrect` double NOT NULL DEFAULT '0',
  `mae` double NOT NULL DEFAULT '0',
  `rmse` double NOT NULL DEFAULT '0',
  `rae` double NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmt_members`
--

CREATE TABLE `dmt_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nb` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ap` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `regIP` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usr` (`usr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmt_opinions`
--

CREATE TABLE `dmt_opinions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` mediumtext,
  `polarity` enum('POSITIVE','NEGATIVE','NEUTRAL') NOT NULL,
  `id_session` int(10) NOT NULL,
  PRIMARY KEY (`id`,`id_session`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmt_sessions`
--

CREATE TABLE `dmt_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `id_category` int(10) NOT NULL,
  `last_change` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
