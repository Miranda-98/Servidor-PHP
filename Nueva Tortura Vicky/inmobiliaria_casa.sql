-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2023 a las 05:34:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `id_vivienda` smallint(5) UNSIGNED NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `id_vivienda`, `foto`) VALUES
(1, 1, 'foto1.jpg'),
(2, 2, 'chalet1.jpg'),
(3, 3, 'apartamento1.jpg'),
(4, 4, 'piso3.jpg'),
(5, 5, 'adosado1.jpg'),
(6, 6, 'casa1.jpg'),
(9, 8, 'kitchen-2165756_640.jpg'),
(10, 8, 'chairs-2181947_640.jpg'),
(11, 1, 'foto2.jpg'),
(12, 1, 'foto3.jpg'),
(13, 2, 'foto1.jpg'),
(14, 2, 'foto2.jpg'),
(15, 2, 'foto3.jpg'),
(16, 3, 'foto1.jpg'),
(17, 3, 'foto2.jpg'),
(18, 3, 'foto3.jpg'),
(19, 4, 'foto1.jpg'),
(20, 4, 'foto2.jpg'),
(21, 4, 'foto3.jpg'),
(22, 5, 'foto1.jpg'),
(23, 5, 'foto2.jpg'),
(24, 5, 'foto3.jpg'),
(25, 6, 'foto1.jpg'),
(26, 6, 'foto2.jpg'),
(27, 6, 'foto3.jpg'),
(28, 10, 'foto1.jpg'),
(29, 10, 'foto2.jpg'),
(30, 10, 'foto3.jpg'),
(31, 8, 'foto1.jpg'),
(32, 8, 'foto2.jpg'),
(33, 8, 'foto3.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vivienda` (`id_vivienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_vivienda`) REFERENCES `viviendas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
