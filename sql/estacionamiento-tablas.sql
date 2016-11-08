-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2016 a las 21:47:26
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionados`
--

CREATE TABLE `estacionados` (
  `id` int(11) NOT NULL,
  `patente` text COLLATE utf8_spanish_ci NOT NULL,
  `entrada` varchar(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estacionados`
--

INSERT INTO `estacionados` (`id`, `patente`, `entrada`) VALUES
(18, 'poi890', '2016-11-06 22:31'),
(21, 'ppp123', '2016-11-06 23:11'),
(22, 'www112', '2016-11-07 02:12'),
(24, 'tre333', '2016-11-07 06:02'),
(25, 'ttt555', '2016-11-07 07:26'),
(26, 'bbb222', '2016-11-07 07:26'),
(27, 'asd321', '2016-11-07 17:13'),
(28, 'asd322', '2016-11-07 17:13'),
(29, 'sss111', '2016-11-07 17:14'),
(30, 'qqa223', '2016-11-07 17:15'),
(31, 'aaa321', '2016-11-07 17:23'),
(32, 'cxz234', '2016-11-07 17:23'),
(33, 'rrt555', '2016-11-07 17:23'),
(34, 'tty234', '2016-11-07 17:24'),
(35, 'jkl987', '2016-11-07 17:50'),
(36, 'bab678', '2016-11-08 00:41'),
(37, 'yui876', '2016-11-08 00:52'),
(38, 'asd222', '2016-11-08 00:54'),
(39, 'una001', '2016-11-08 20:04'),
(41, 'ABC001', '2016-10-06 23:11'),
(42, 'ABC002', '2016-10-06 23:11'),
(43, 'ABC003', '2016-10-06 23:11'),
(44, 'ABC004', '2016-10-06 23:11'),
(45, 'ABC005', '2016-10-06 23:11'),
(46, 'ABC006', '2016-10-06 23:11'),
(47, 'ABC007', '2016-10-06 23:11'),
(48, 'ABC008', '2016-10-06 23:11'),
(49, 'ABC009', '2016-10-06 23:11'),
(50, 'ABC010', '2016-10-06 23:11'),
(51, 'ABC011', '2016-10-06 23:11'),
(52, 'ABC012', '2016-10-06 23:11'),
(53, 'ABC013', '2016-10-06 23:11'),
(54, 'ABC014', '2016-10-06 23:11'),
(55, 'ABC015', '2016-10-06 23:11'),
(56, 'ABC016', '2016-10-06 23:11'),
(57, 'ABC017', '2016-10-06 23:11'),
(58, 'ABC018', '2016-10-06 23:11'),
(59, 'ABC019', '2016-10-06 23:11'),
(60, 'ABC020', '2016-10-06 23:11'),
(61, 'ABC021', '2016-10-06 23:11'),
(62, 'ABC022', '2016-10-06 23:11'),
(63, 'ABC023', '2016-10-06 23:11'),
(64, 'ABC024', '2016-10-06 23:11'),
(65, 'ABC025', '2016-10-06 23:11'),
(66, 'ABC026', '2016-10-06 23:11'),
(67, 'ABC027', '2016-10-06 23:11'),
(68, 'ABC028', '2016-10-06 23:11'),
(69, 'ABC029', '2016-10-06 23:11'),
(70, 'ABC030', '2016-10-06 23:11'),
(71, 'ABC031', '2016-10-06 23:11'),
(72, 'ABC032', '2016-10-06 23:11'),
(73, 'ABC033', '2016-10-06 23:11'),
(74, 'ABC034', '2016-10-06 23:11'),
(75, 'ABC035', '2016-10-06 23:11'),
(76, 'ABC036', '2016-10-06 23:11'),
(77, 'ABC037', '2016-10-06 23:11'),
(78, 'ABC038', '2016-10-06 23:11'),
(79, 'ABC039', '2016-10-06 23:11'),
(80, 'ABC040', '2016-10-06 23:11'),
(81, 'ABC041', '2016-10-06 23:11'),
(82, 'ABC042', '2016-10-06 23:11'),
(83, 'ABC043', '2016-10-06 23:11'),
(84, 'ABC044', '2016-10-06 23:11'),
(85, 'ABC045', '2016-10-06 23:11'),
(86, 'ABC046', '2016-10-06 23:11'),
(87, 'ABC047', '2016-10-06 23:11'),
(88, 'ABC048', '2016-10-06 23:11'),
(89, 'ABC049', '2016-10-06 23:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `patente` text COLLATE utf8_spanish_ci NOT NULL,
  `entrada` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `salida` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `patente`, `entrada`, `salida`, `importe`) VALUES
(1, 'eee555', '2016-11-06 20:10', '2016-11-06 22:45', '83.94'),
(2, 'lmr798', '2016-11-06 20:33', '2016-11-06 22:53', '75.79'),
(3, 'hhh777', '2016-11-06 21:05', '2016-11-06 22:54', '59.20'),
(4, 'ggg777', '2016-11-06 20:32', '2016-11-06 22:55', '77.44'),
(5, 'lmr798', '2016-11-06 22:55', '2016-11-06 22:55', '0.50'),
(6, 'bla212', '2016-11-06 22:31', '2016-11-06 23:03', '17.67'),
(7, 'sss', '2016-11-08 00:57', '2016-11-08 00:58', '0.79'),
(8, 'aaa111', '2016-11-07 03:44', '2016-11-08 20:04', '1307.08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `clave`, `nombre`, `rol`) VALUES
(1, 'usuariotest@gmail.com', 'testUser01', 'Usuario Test', 'usuario'),
(2, 'usuarioadmin@gmail.com', 'adminUser92', 'Usuario Admin', 'admin'),
(3, 'usuario1@gmail.com', 'user01', 'Usuario Uno', 'usuario'),
(4, 'usuario2@gmail.com', 'user02', 'Usuario Dos', 'usuario'),
(5, 'usuario3@gmail.com', 'user03', 'Usuario Tres', 'usuario'),
(6, 'usuario4@gmail.com', 'user04', 'Usuario Cuatro', 'usuario'),
(7, 'usuario5@gmail.com', 'user05', 'Usuario Cinco', 'usuario'),
(8, 'usuario6@gmail.com', 'user06', 'Usuario Seis', 'usuario'),
(9, 'usuario7@gmail.com', 'user07', 'Usuario Siete', 'usuario'),
(10, 'usuario8@gmail.com', 'user08', 'Usuario Ocho', 'usuario'),
(11, 'usuario9@gmail.com', 'user09', 'Usuario Nueve', 'usuario'),
(12, 'usuario10@gmail.com', 'user10', 'Usuario Diez', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estacionados`
--
ALTER TABLE `estacionados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
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
-- AUTO_INCREMENT de la tabla `estacionados`
--
ALTER TABLE `estacionados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
