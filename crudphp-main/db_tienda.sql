-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2022 a las 12:56:22
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE `tb_producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_producto`
--

INSERT INTO `tb_producto` (`id`, `nombre`, `descripcion`, `categoria`) VALUES
(6, 'refreigerado', 'sdfdg', 'Laptops'),
(7, 'refreigerado', 'sdfdg', 'Laptops'),
(8, 'ADSASD', 'ASDASD', 'Laptops'),
(9, 'sdfsdf', 'sdfsdf', 'Tecnolog&iacute;a'),
(10, 'sdfsdfsdf', 'sdfsdfsdf', 'Laptops'),
(11, 'fghgfhfghfghf', 'fgh fghfgh fgh', 'Tecnolog&iacute;a'),
(12, 'KJKASDJAJDKAJD', 'SAKJKJSDFK', 'Tecnolog&iacute;a'),
(13, 'ASDASD', 'ASDASD', 'Laptops'),
(14, 'ASDASDASDASD', 'ASDASD', 'Laptops'),
(17, 'dsfdsfsdfsf', 'darw', 'Laptops'),
(20, 'CERVEZA', 'cvb', 'Laptops');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
