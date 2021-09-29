-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2020 a las 16:37:23
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recargas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `banco_id` int(11) NOT NULL,
  `banco_codigo` varchar(10) DEFAULT NULL,
  `banco_nombre` varchar(160) DEFAULT NULL,
  `banco_status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`banco_id`, `banco_codigo`, `banco_nombre`, `banco_status`) VALUES
(1, '0102', 'BANCO VENEZUELA', '1'),
(2, '0105', 'BANCO MERCANTIL', '1'),
(3, '0108', 'BANCO PROVINCIAL', '1'),
(4, '0134', 'BANCO BANESCO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `ope_id` int(33) NOT NULL,
  `ope_fecha` varchar(100) DEFAULT NULL,
  `socio_id` int(33) DEFAULT NULL,
  `ope_monto` varchar(255) DEFAULT '',
  `ope_status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`ope_id`, `ope_fecha`, `socio_id`, `ope_monto`, `ope_status`) VALUES
(1, '30-3-2020 0:58:5', 1, '250000', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion_recarga`
--

CREATE TABLE `operacion_recarga` (
  `ope_recarga_id` int(33) NOT NULL,
  `ope_recarga_fech` varchar(100) DEFAULT NULL,
  `ope_recarga_num` varchar(30) DEFAULT NULL,
  `socio_id` int(33) DEFAULT NULL,
  `ope_recarga_monto` varchar(255) DEFAULT NULL,
  `ope_recarga_status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `socio_id` int(11) NOT NULL,
  `socio_login` varchar(255) DEFAULT '',
  `socio_cedula` varchar(20) DEFAULT '',
  `socio_nombre` varchar(255) DEFAULT NULL,
  `socio_pass` varchar(255) DEFAULT '',
  `socio_telf` varchar(20) DEFAULT '',
  `socio_local` varchar(255) DEFAULT '',
  `socio_direccion` varchar(255) DEFAULT '',
  `socio_status` varchar(2) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`socio_id`, `socio_login`, `socio_cedula`, `socio_nombre`, `socio_pass`, `socio_telf`, `socio_local`, `socio_direccion`, `socio_status`) VALUES
(1, 'stefanodgr1994@gmail.com', '23947064', 'STEFANO JOSE PELLEGRINO', '123456', '04129119618', 'MINI BURKER', 'AV SAN MARTIN', '1'),
(2, 'prueba2@gmail.com', '21435678', 'STEFANO JOSE PELLEGRINO', '123456', '04124505678', 'BURKER BURKER', 'AV SAN MARTIN', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_pago`
--

CREATE TABLE `socio_pago` (
  `socio_pago_id` int(11) NOT NULL,
  `socio_pago_ref` varchar(40) DEFAULT NULL,
  `socio_pago_fech` varchar(160) DEFAULT NULL,
  `socio_id` int(11) DEFAULT NULL,
  `socio_pago_monto` varchar(255) DEFAULT '',
  `socio_pago_porce` varchar(255) DEFAULT NULL,
  `socio_pago_status` varchar(2) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socio_pago`
--

INSERT INTO `socio_pago` (`socio_pago_id`, `socio_pago_ref`, `socio_pago_fech`, `socio_id`, `socio_pago_monto`, `socio_pago_porce`, `socio_pago_status`, `banco_id`) VALUES
(1, '4334343', '29-3-2020 2:33:41', 1, '250000', '10000', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_login` varchar(255) DEFAULT NULL,
  `usuario_contra` varchar(255) DEFAULT NULL,
  `usuario_status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_login`, `usuario_contra`, `usuario_status`) VALUES
(1, 'TEFO456', '123456 ', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`banco_id`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`ope_id`);

--
-- Indices de la tabla `operacion_recarga`
--
ALTER TABLE `operacion_recarga`
  ADD PRIMARY KEY (`ope_recarga_id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`socio_id`);

--
-- Indices de la tabla `socio_pago`
--
ALTER TABLE `socio_pago`
  ADD PRIMARY KEY (`socio_pago_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `banco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `ope_id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `operacion_recarga`
--
ALTER TABLE `operacion_recarga`
  MODIFY `ope_recarga_id` int(33) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `socio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `socio_pago`
--
ALTER TABLE `socio_pago`
  MODIFY `socio_pago_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
