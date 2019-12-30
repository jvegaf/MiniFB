-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2019 a las 15:52:25
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

DROP DATABASE IF EXISTS `mini-fb_db`;
CREATE DATABASE `mini-fb_db`;
USE `mini-fb_db`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mini-fb_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_mensajes`
--

CREATE TABLE `T_MENSAJES` (
  `ID_MENSAJE` int(11) NOT NULL,
  `TEXTO_MENSAJE` varchar(280) COLLATE utf8_spanish2_ci NOT NULL,
  `DESTACADO` tinyint(4) NOT NULL,
  `PINEADO` tinyint(4) NOT NULL,
  `PUBLICADO` datetime NOT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `t_mensajes`
--

INSERT INTO `T_MENSAJES` (`ID_MENSAJE`, `TEXTO_MENSAJE`, `DESTACADO`, `PINEADO`, `PUBLICADO`, `ID_USUARIO`) VALUES
(1, 'Queda inaugurado este pantano', 1, 0, '2019-12-25 19:30:00', 1),
(2, 'Pues parece que va bien esto no??', 0, 0, '2019-12-27 10:00:00', 2),
(3, 'ma ma ma ma ma ma.....', 0, 0, '2019-12-28 12:03:10', 3),
(4, 'Esta noche estare poniendo musicote en el Botanico   :D', 1, 0, '2019-12-28 12:28:44', 1),
(5, 'hola tamara', 0, 0, '2019-12-28 14:12:01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_respuestas`
--

CREATE TABLE T_RESPUESTAS (
  `ID_RESPUESTA` int(11) NOT NULL,
  `TEXTO_RESPUESTA` varchar(280) COLLATE utf8_spanish2_ci NOT NULL,
  `PUBLICADO` datetime NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENSAJE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `t_respuestas`
--

INSERT INTO T_RESPUESTAS (`ID_RESPUESTA`, `TEXTO_RESPUESTA`, `PUBLICADO`, `ID_USUARIO`, `ID_MENSAJE`) VALUES
(1, 'Bravo !!!! Nos lo vamos a pasar teta', '2019-12-26 10:00:00', 2, 1),
(2, 'A mi a veces se me queda pipa', '2019-12-27 11:00:00', 5, 2),
(4, 'jajjajajajajjaja', '2019-12-27 10:10:00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_usuario`
--

CREATE TABLE T_TIPO_USUARIO (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `TIPO_USUARIO` varchar(5) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `t_tipo_usuario`
--

INSERT INTO T_TIPO_USUARIO (`CODIGO_USUARIO`, `TIPO_USUARIO`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE T_USUARIOS (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_USUARIO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ALIAS_USUARIO` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `PASSWORD_USUARIO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDOS_USUARIO` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO_COOKIE` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TIPO_USUARIO` int(11) NOT NULL,
  `EMAIL` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO T_USUARIOS (`ID_USUARIO`, `NOMBRE_USUARIO`, `ALIAS_USUARIO`, `PASSWORD_USUARIO`, `APELLIDOS_USUARIO`, `CODIGO_COOKIE`, `TIPO_USUARIO`, `EMAIL`) VALUES
(1, 'Jose', 'jvegaf', 'josito81', NULL, NULL, 2, 'josevega234@me.com'),
(2, 'Ruben', 'rubencito', 'rubencito', NULL, NULL, 1, 'rubencito@me.com'),
(3, 'Sergio', 'svega', 'svega', NULL, '58fa3e24107ff436a62e29cd7a61722b7322ac02', 1, 'svega@gmail.com'),
(4, 'Miguel', 'mimi90', 'mimi90', NULL, NULL, 1, 'mimi90@hotmail.com'),
(5, 'Juan', 'jj981', 'juan', NULL, NULL, 1, 'juanitoTheFucker@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_mensajes`
--
ALTER TABLE `T_MENSAJES`
  ADD PRIMARY KEY (`ID_MENSAJE`,`ID_USUARIO`),
  ADD KEY `fk_T_MENSAJES_T_USUARIOS1` (`ID_USUARIO`);

--
-- Indices de la tabla `t_respuestas`
--
ALTER TABLE T_RESPUESTAS
  ADD PRIMARY KEY (`ID_RESPUESTA`,`ID_USUARIO`,`ID_MENSAJE`),
  ADD KEY `fk_T_RESPUESTAS_T_USUARIOS1` (`ID_USUARIO`),
  ADD KEY `fk_T_RESPUESTAS_T_MENSAJES1` (`ID_MENSAJE`);

--
-- Indices de la tabla `t_tipo_usuario`
--
ALTER TABLE T_TIPO_USUARIO
  ADD PRIMARY KEY (`CODIGO_USUARIO`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE T_USUARIOS
  ADD PRIMARY KEY (`ID_USUARIO`,`TIPO_USUARIO`),
  ADD KEY `fk_T_USUARIOS_T_TIPO_USUARIO` (`TIPO_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_mensajes`
--
ALTER TABLE `T_MENSAJES`
  MODIFY `ID_MENSAJE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_respuestas`
--
ALTER TABLE T_RESPUESTAS
  MODIFY `ID_RESPUESTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE T_USUARIOS
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_mensajes`
--
ALTER TABLE `T_MENSAJES`
  ADD CONSTRAINT `fk_T_MENSAJES_T_USUARIOS1` FOREIGN KEY (`ID_USUARIO`) REFERENCES T_USUARIOS (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_respuestas`
--
ALTER TABLE T_RESPUESTAS
  ADD CONSTRAINT `fk_T_RESPUESTAS_T_MENSAJES1` FOREIGN KEY (`ID_MENSAJE`) REFERENCES `T_MENSAJES` (`ID_MENSAJE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_T_RESPUESTAS_T_USUARIOS1` FOREIGN KEY (`ID_USUARIO`) REFERENCES T_USUARIOS (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE T_USUARIOS
  ADD CONSTRAINT `fk_T_USUARIOS_T_TIPO_USUARIO` FOREIGN KEY (`TIPO_USUARIO`) REFERENCES T_TIPO_USUARIO (`CODIGO_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
