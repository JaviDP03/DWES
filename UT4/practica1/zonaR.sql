DROP DATABASE IF EXISTS zonaR;
CREATE DATABASE zonaR;
USE zonaR;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE `usuarios` (
    `id_usuario` int(10) UNSIGNED NOT NULL,
    `user` varchar(255) COLLATE utf8_bin NOT NULL UNIQUE,
    `password` varchar(255) COLLATE utf8_bin NOT NULL,
    `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin;
ALTER TABLE `usuarios`
ADD PRIMARY KEY (`id_usuario`);
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;