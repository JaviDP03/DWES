-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306-- Tiempo de generación: 22-10-2018 a las 01:07:52
-- Versión del servidor: 5.7.23-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Base de datos: `futblog`
DROP DATABASE IF EXISTS futblog;
CREATE DATABASE futblog;
USE futblog;
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `comentarios`
--
CREATE TABLE `comentarios` (
`id_comentario` int(10) UNSIGNED NOT NULL,
`autor` varchar(255) COLLATE utf8_bin NOT NULL,
`texto` text COLLATE utf8_bin NOT NULL,
`fecha` datetime NOT NULL,
`id_noticia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
--
-- Volcado de datos para la tabla `comentarios`
--
INSERT INTO `comentarios` (`id_comentario`, `autor`, `texto`, `fecha`, `id_noticia`) VALUES
(1, 'Pepe', '¡Qué golazo de Messi!', '2018-10-01 09:35:33', 3),
(2, 'Ana', 'Increíble partido, me encantó.', '2018-10-10 10:38:35', 3);
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `noticias`
--
CREATE TABLE `noticias` (
`id_noticia` int(10) UNSIGNED NOT NULL,
`titular` varchar(255) COLLATE utf8_bin NOT NULL,
`entradilla` text COLLATE utf8_bin NOT NULL,
`cuerpo` text COLLATE utf8_bin NOT NULL,
`fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
--
-- Volcado de datos para la tabla `noticias`
--
INSERT INTO `noticias` (`id_noticia`, `titular`, `entradilla`, `cuerpo`, `fecha`) VALUES
(1, 'Cristiano brilla en la victoria del Real Madrid', 'El astro portugués anotó un hat-trick en el partido de ayer.', '<p>El Real Madrid consiguió una victoria impresionante gracias a los tres goles de Cristiano Ronaldo. El partido fue dominado por el conjunto blanco desde el primer minuto, con una exhibición de talento y táctica. Ronaldo abrió el marcador con un gol de cabeza en el minuto 15, seguido de un potente remate desde fuera del área en el minuto 30. Para cerrar la noche, anotó un penalti impecable en la segunda mitad.</p><p>Los aficionados del Real Madrid están entusiasmados con la forma del equipo, que parece estar en su mejor momento de la temporada. Con esta victoria, el Real Madrid se coloca en una posición favorable para luchar por el título de La Liga.</p>', '2018-10-20 08:34:26'),
(2, 'Victoria épica del Betis contra el Sevilla en el derbi andaluz', 'El Real Betis Balompié se llevó el derbi andaluz con un emocionante 3-2 sobre el Sevilla FC.', '<p>En un partido lleno de emociones, el Real Betis Balompié logró una victoria épica contra el Sevilla FC en el derbi andaluz. El partido empezó con intensidad desde el primer minuto, y fue el Betis quien abrió el marcador con un gol tempranero. Aunque el Sevilla empató poco después, el Betis mostró una gran determinación para retomar la ventaja con dos goles más antes del descanso.</p><p>En la segunda mitad, el Sevilla presionó para empatar, logrando reducir la diferencia a un gol. Sin embargo, la defensa del Betis se mantuvo firme, y el equipo logró aguantar el resultado hasta el pitido final. Esta victoria es un gran impulso moral para el Betis y sus aficionados, quienes celebraron con gran entusiasmo al final del partido.</p>', '2018-10-09 11:20:35'),
(3, 'El clásico: Real Madrid vs Barcelona', 'Una mirada en profundidad al partido más esperado del año.', '<p>El clásico siempre es un partido emocionante, y este año no fue la excepción. La rivalidad entre el Real Madrid y el Barcelona se vio en su máxima expresión. Desde el pitido inicial, ambos equipos mostraron su calidad y determinación para ganar. El Real Madrid tomó la delantera con un gol temprano, pero el Barcelona respondió rápidamente con un empate.</p><p>A medida que avanzaba el partido, las oportunidades se presentaron en ambos lados, pero fue el Barcelona quien consiguió el gol decisivo en los últimos minutos del partido. La victoria del Barcelona fue un golpe duro para el Real Madrid, pero ambos equipos demostraron por qué el clásico es uno de los encuentros más esperados del año.</p>', '2018-09-19 18:30:46');
--
-- Índices para tablas volcadas
--
--
-- Índices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
ADD PRIMARY KEY (`id_comentario`),
ADD KEY `FK_noticias` (`id_noticia`);
--
-- Índices de la tabla `noticias`
--
ALTER TABLE `noticias`
ADD PRIMARY KEY (`id_noticia`);
--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
MODIFY `id_noticia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
---- Restricciones para tablas volcadas
--
--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
ADD CONSTRAINT `FK_noticias` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id_noticia`)
ON DELETE CASCADE ON UPDATE CASCADE;
