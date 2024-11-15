-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-10-2018 a las 01:07:52
-- Versión del servidor: 5.7.23-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Base de datos: `IMDwes`
DROP DATABASE IF EXISTS IMDwes;
CREATE DATABASE IMDwes;
USE IMDwes;
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `comentarios`
--
CREATE TABLE `opiniones` (
`id_opinion` int(10) UNSIGNED NOT NULL,
`usuario` varchar(255) COLLATE utf8_bin NOT NULL,
`texto` text COLLATE utf8_bin NOT NULL,
`fecha` datetime NOT NULL,
`nota` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
--
-- Volcado de datos para la tabla `comentarios`
--
INSERT INTO `opiniones` (`id_opinion`, `usuario`, `texto`, `fecha`, `nota`) VALUES
(1, 'Susana23', '¡¡Me ha encantado!!', '2018-10-01 09:35:33', 8);
-- --------------------------------------------------------
--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `opiniones`
ADD PRIMARY KEY (`id_opinion`);
--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `opiniones`
MODIFY `id_opinion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;