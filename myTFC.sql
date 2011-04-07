-- phpMyAdmin SQL Dump
-- version 2.11.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2010 a las 17:54:38
-- Versión del servidor: 5.0.41
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `myTFC`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `dmt_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `category`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmt_members`
--

CREATE TABLE `dmt_members` (
  `id` int(11) NOT NULL auto_increment,
  `usr` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `pass` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `nb` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `ap` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `regIP` varchar(15) collate utf8_unicode_ci NOT NULL default '',
  `dt` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `usr` (`usr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcar la base de datos para la tabla `dmt_members`
--

INSERT INTO `dmt_members` VALUES(22, 'javierpelado', '1e809cdee30c0902698c4374e7933936', 'Javier', 'Pelado', 'javier.pelado@gmail.com', '127.0.0.1', '2010-11-26 13:39:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmt_sessions`
--

CREATE TABLE `dmt_sessions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `id_category` int(10) unsigned,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`),
  FOREIGN KEY (`id_category`) REFERENCES dmt_category(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `dmt_usr_session` (
  `id_usr` int(10) unsigned NOT NULL,
  `id_session` int(10) unsigned NOT NULL,
  FOREIGN KEY (`id_usr`) REFERENCES dmt_members(`id`),
  FOREIGN KEY (`id_session`) REFERENCES dmt_sessions(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
