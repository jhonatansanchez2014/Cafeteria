-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2014 a las 03:08:55
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `documento` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`user`),
  KEY `documento` (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`user`, `password`, `rol`, `documento`) VALUES
('fulanopere', 'L913X9S', 'Trabajador', '123456'),
('fvaca', 'DPEFCHF', 'Trabajador', '123'),
('marisan', 'VELQOQF', 'Trabajador', '4521'),
('phvillegas', '123456', 'Administrador', '1104011978');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `cod` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_vence` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `precio_total` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `documento` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` enum('Activo','Suspendido') COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`documento`, `nombres`, `apellidos`, `edad`, `celular`, `estado`) VALUES
('1104011978', 'Pedro', 'Hernández Villegas', '23', '3145935035', 'Activo'),
('123', 'Otro Fulano', 'Martinez Vaca', '26', '3000000000', 'Suspendido'),
('123456', 'Fulanito', 'Perez', '25', '3213333333', 'Activo'),
('4521', 'María', 'Sanches', '22', '52525252', 'Suspendido');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `users` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
