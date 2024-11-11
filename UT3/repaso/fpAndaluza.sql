-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2024 a las 12:48:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fpAndaluza`
--
DROP DATABASE IF EXISTS `fpAndaluza`;
CREATE DATABASE IF NOT EXISTS `fpAndaluza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fpAndaluza`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `codCiclo` char(5) NOT NULL,
  `nomCiclo` varchar(100) NOT NULL,
  `codGrado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`codCiclo`, `nomCiclo`, `codGrado`) VALUES
('ASIR', 'Administración de Sistemas Informáticos en Red', 'GS'),
('DAM', 'Desarrollo de Aplicaciones Multiplataforma', 'GS'),
('DAW', 'Desarrollo de Aplicaciones Web', 'GS'),
('SMR', 'Sistemas Microinformáticos y Redes', 'GM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `codGrado` char(2) NOT NULL,
  `nomGrado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`codGrado`, `nomGrado`) VALUES
('CE', 'Curso de Especialización GS'),
('GM', 'Ciclo FP Grado Medio'),
('GS', 'Ciclo FP Grado Superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `codProvincia` char(2) NOT NULL,
  `nomProvincia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`codProvincia`, `nomProvincia`) VALUES
('04', 'Almería'),
('11', 'Cádiz'),
('14', 'Córdoba'),
('18', 'Granada'),
('21', 'Huelva'),
('23', 'Jaén'),
('29', 'Málaga'),
('41', 'Sevilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudesPlaza`
--

CREATE TABLE `solicitudesPlaza` (
  `DNI` char(9) NOT NULL,
  `codCiclo` char(5) NOT NULL,
  `codProvincia` char(2) NOT NULL,
  `horaSolicitud` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`codCiclo`),
  ADD KEY `codGrado` (`codGrado`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`codGrado`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`codProvincia`);

--
-- Indices de la tabla `solicitudesPlaza`
--
ALTER TABLE `solicitudesPlaza`
  ADD PRIMARY KEY (`DNI`,`codCiclo`,`codProvincia`) USING BTREE,
  ADD KEY `codCiclo` (`codCiclo`),
  ADD KEY `codProvincia` (`codProvincia`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD CONSTRAINT `ciclos_ibfk_1` FOREIGN KEY (`codGrado`) REFERENCES `grados` (`codGrado`);

--
-- Filtros para la tabla `solicitudesPlaza`
--
ALTER TABLE `solicitudesPlaza`
  ADD CONSTRAINT `solicitudesPlaza_ibfk_1` FOREIGN KEY (`codCiclo`) REFERENCES `ciclos` (`codCiclo`),
  ADD CONSTRAINT `solicitudesPlaza_ibfk_2` FOREIGN KEY (`codProvincia`) REFERENCES `provincias` (`codProvincia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
