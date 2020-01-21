-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2020 a las 09:09:58
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `socialnet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id` int(255) NOT NULL,
  `usuario1` varchar(255) NOT NULL,
  `usuario2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megustas`
--

CREATE TABLE `megustas` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `idTuitOriginal` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `megustas`
--

INSERT INTO `megustas` (`id`, `usuario`, `idTuitOriginal`) VALUES
(74, 'hola', 103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `emisor` varchar(255) NOT NULL,
  `receptor` varchar(255) NOT NULL,
  `idChat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notis`
--

CREATE TABLE `notis` (
  `id` int(255) NOT NULL,
  `receptor` varchar(255) NOT NULL,
  `emisor` varchar(255) NOT NULL,
  `seguidorNuevo` tinyint(1) DEFAULT NULL,
  `likeAtuit` tinyint(1) DEFAULT NULL,
  `likeART` tinyint(1) DEFAULT NULL,
  `rtAtuit` tinyint(1) DEFAULT NULL,
  `rtART` tinyint(1) DEFAULT NULL,
  `idTuit` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notis`
--

INSERT INTO `notis` (`id`, `receptor`, `emisor`, `seguidorNuevo`, `likeAtuit`, `likeART`, `rtAtuit`, `rtART`, `idTuit`) VALUES
(36, 'hola', 'hola', 0, 1, 0, 0, 0, 103),
(37, 'hola', 'hola', 0, 0, 0, 1, 0, 103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombreCompleto` varchar(255) NOT NULL,
  `biografia` varchar(255) NOT NULL,
  `seguidores` int(255) DEFAULT NULL,
  `siguiendo` int(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `usuario`, `clave`, `nombreCompleto`, `biografia`, `seguidores`, `siguiendo`, `imagen`) VALUES
(8, 'hola', '1', '1', '1', 0, 0, 'fotos/twitter.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retuits`
--

CREATE TABLE `retuits` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `idTuitOriginal` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `retuits`
--

INSERT INTO `retuits` (`id`, `usuario`, `idTuitOriginal`) VALUES
(57, 'hola', 103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE `seguidores` (
  `id` int(255) NOT NULL,
  `esteUsuario` varchar(255) NOT NULL,
  `sigueAa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tuits`
--

CREATE TABLE `tuits` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `tuit` varchar(255) NOT NULL,
  `rt` int(255) NOT NULL,
  `mg` int(255) NOT NULL,
  `rtSiOno` tinyint(1) NOT NULL DEFAULT '0',
  `rtPOR` varchar(255) DEFAULT NULL,
  `idTuitOriginal` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tuits`
--

INSERT INTO `tuits` (`id`, `usuario`, `tuit`, `rt`, `mg`, `rtSiOno`, `rtPOR`, `idTuitOriginal`) VALUES
(103, 'hola', 'holaa', 1, 1, 0, NULL, 103),
(104, 'hola', 'holaa', 1, 1, 1, 'hola', 103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(6, 'hola', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `megustas`
--
ALTER TABLE `megustas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notis`
--
ALTER TABLE `notis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retuits`
--
ALTER TABLE `retuits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tuits`
--
ALTER TABLE `tuits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `megustas`
--
ALTER TABLE `megustas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `notis`
--
ALTER TABLE `notis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `retuits`
--
ALTER TABLE `retuits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tuits`
--
ALTER TABLE `tuits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
