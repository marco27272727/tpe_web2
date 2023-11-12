-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2023 a las 23:16:37
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
-- Base de datos: `db_cefce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `numero_celular` varchar(45) NOT NULL,
  `dni` int(8) NOT NULL,
  `fecha_dia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellido`, `numero_celular`, `dni`, `fecha_dia`) VALUES
(1, 'marcos', 'cordoba', '2494522237', 37935541, '2023-10-08 15:00:16'),
(2, 'maximo', 'bayones', '2284552410', 42773117, '2023-10-15 21:55:08'),
(3, 'camilas', 'colombani', '2494531201', 42773118, '2023-10-15 21:55:31'),
(4, 'Daniel', 'Perez', ' 2147483647', 42773119, '2023-11-12 22:07:04'),
(5, 'josefina', 'Andres', ' 2147483647', 42773118, '2023-11-12 22:07:30'),
(6, 'Facundo', 'Bolsas', ' 2147483456', 42773156, '2023-11-12 22:07:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `fecha_de_prestado` datetime NOT NULL,
  `fecha_devuelto` datetime NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `fecha_de_prestado`, `fecha_devuelto`, `id_item`) VALUES
(2, '2023-11-01 07:31:00', '2023-11-01 19:00:00', 4),
(3, '2023-11-02 14:30:00', '2023-11-02 20:50:04', 4),
(4, '2023-11-01 16:00:00', '2023-11-01 18:30:00', 3),
(5, '2023-11-17 19:08:18', '2023-11-12 23:08:18', 12),
(9, '2023-11-01 19:09:02', '2023-11-12 23:09:02', 4),
(10, '2023-11-12 23:09:02', '2023-11-12 23:09:02', 13),
(11, '2023-09-05 19:09:37', '2023-11-25 19:09:37', 14),
(12, '2023-11-01 19:09:59', '2023-11-02 19:09:59', 14),
(13, '2023-03-01 19:10:22', '2023-11-08 19:10:22', 12),
(14, '2020-11-02 19:10:42', '2023-11-06 19:10:42', 11),
(15, '2023-09-14 19:12:59', '2023-11-13 19:12:59', 12),
(16, '2023-07-06 19:13:30', '2023-11-09 19:13:30', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `tipo_item` varchar(45) NOT NULL,
  `numero_item` int(11) DEFAULT NULL,
  `en_uso` tinyint(1) NOT NULL,
  `condicion` varchar(45) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `tipo_item`, `numero_item`, `en_uso`, `condicion`, `img`, `id_alumno`) VALUES
(3, 'calculadora', 2, 0, 'en buen estado', 'calculadora.jpg', 2),
(4, 'mate', 20, 0, 'No resuelve integrales', 'mate.jpg', 1),
(7, 'calculadora', 12, 0, 'no tiene pilas', 'calculadora.jpg', NULL),
(8, 'calculadora', 1, 0, 'no tiene pilas', 'calculadora.jpg', 2),
(9, 'mate', 1, 0, 'le falta la bombilla', 'mate.jpg', NULL),
(11, 'mate', 15, 0, 'buen estado', 'mate.jpg', NULL),
(12, 'vaso', NULL, 1, 'manchado con té', 'vaso.jpg', 3),
(13, 'termo', 33, 1, 'pico roto', 'termo.jpg', 1),
(14, 'calculadora', 55, 1, 'falta signo +', 'calculadora.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_auth` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_auth`, `username`, `contraseña`) VALUES
(1, 'webadmin', '$2y$10$LsMCPd6tpTafHRmbifEFAO/gjJFqZgmujL1TnyHj5mOfVS/4x2aVK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_item` (`id_item`) USING BTREE;

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_id_alumno` (`id_alumno`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_auth`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
