-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 21:31:47
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fpandaluza`
--
DROP DATABASE IF EXISTS `fpandaluza`;
CREATE DATABASE IF NOT EXISTS `fpandaluza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fpandaluza`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `codigoModulo` char(5) NOT NULL,
  `nombreModulo` varchar(100) NOT NULL,
  `curso` int(11) NOT NULL,
  `numeroHorasSemanales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`codigoModulo`, `nombreModulo`, `curso`, `numeroHorasSemanales`) VALUES
('BD', 'Bases de Datos', 1, 6),
('DAW', 'Despliegue de Aplicaciones Web', 2, 3),
('DIW', 'Diseño de Interfaces Web', 2, 6),
('DWEC', 'Desarrollo Web en Entorno Cliente', 2, 6),
('DWES', 'Desarrollo Web en Entorno Servidor', 2, 8),
('ED', 'Entornos de Desarrollo', 1, 3),
('EIE', 'Empresa e Iniciativa Emprendedora', 2, 4),
('FOL', 'Formación y Orientación Laboral', 1, 3),
('HLC', 'Horas de Libre Configuración', 2, 3),
('LMSGI', 'Lenguajes de Marcas y Sistemas de Gestión de la Información', 1, 4),
('PR', 'Programación', 1, 8),
('SI', 'Sistemas Informáticos', 1, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`codigoModulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
