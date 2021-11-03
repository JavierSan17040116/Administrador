-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2021 a las 06:31:45
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `administrador_tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `ID` int(7) UNSIGNED NOT NULL,
  `autor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `respuestas` int(11) NOT NULL DEFAULT 0,
  `identificador` int(7) NOT NULL DEFAULT 0,
  `ult_respuesta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`ID`, `autor`, `titulo`, `mensaje`, `fecha`, `respuestas`, `identificador`, `ult_respuesta`) VALUES
(0, 'javier', 'Tablas', 'Buen tipo de tablas ', '2003-07-21', 0, 0, '2003-07-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `tarea_id` int(9) NOT NULL,
  `tarea` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` int(11) NOT NULL,
  `comentarios` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `status_tarea` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`tarea_id`, `tarea`, `area`, `fecha_creacion`, `comentarios`, `status_tarea`) VALUES
(1, 'Cambiar monitores', 'Sistemas', 0, '', 0),
(2, 'Cambiar CPU Gerente Produccion', 'Sistemas', 0, '', 0),
(3, 'Entregar equipo de Computo', 'Sistemas', 0, '', 0),
(4, 'Enviar listado de compras', 'Compras', 0, '', 0),
(5, 'Cotizar nuevos equipos', 'Compras', 0, '', 0),
(6, 'Revisar CV', 'Recursos Humanos', 0, '', 0),
(7, 'Agendar 3 entrevistas', 'Recursos Humanos', 0, '', 0),
(8, 'Pedir CV a otras áreas', 'Recursos Humanos', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Codigo` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `usuario`, `password`, `nombre`, `apellidos`, `tipo_usuario`, `Correo`, `Codigo`) VALUES
(1, 'Administrador', 'administrador', 'Guillermo Efraín', 'Cázares Ramos', 'Administrador', 'Guillermo@gmail.com', 0),
(2, 'Coordinador', 'Coordinador', 'Sandra', 'Ramirez Muñoz', 'Coordinador', 'Sandra@hotmail.com', 0),
(3, 'Trabajador', 'Trabajador', 'Francisco Javier', 'Sanchez Delgado', 'Trabajador', 'javiersanchezdelgado20@gmail.com', 149946),
(4, 'Trabajador2', '12345', 'Adrián ', 'Gil Duque ', 'Trabajador', 'saike_javi20@hotmail.com', 733805);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`tarea_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tarea_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
