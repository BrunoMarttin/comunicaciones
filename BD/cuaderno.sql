-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2025 a las 04:05:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuaderno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunicados`
--

CREATE TABLE `comunicados` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `id_preceptor` int(11) NOT NULL,
  `tipo` enum('general','individual') DEFAULT 'general'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comunicados`
--

INSERT INTO `comunicados` (`id`, `titulo`, `contenido`, `fecha`, `id_preceptor`, `tipo`) VALUES
(1, 'No hay clases', 'Porque pinto', '2025-11-28 00:03:20', 1, 'general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `tipo_usuario` enum('alumno','tutor','preceptor','directivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `usuario`, `contrasena`, `nombre`, `apellido`, `tipo_usuario`) VALUES
(1, 'miqueasdeacon@gmail.com', 'jos', '$2y$10$GvW2.3OFPcoG2Tk7zH/PP.aw6O9NkbJnnXNjpRsLih8hSdTOc1S2.', 'joshua', 'deacon', 'preceptor'),
(2, 'brunomartin@gmail.com', 'BRUNO', '$2y$10$lLGKX6M/qziWUFZpslpFEO4GFRQZsqsNtt/9Dtqv/7lUrY5fRv.hq', 'bruno', 'martin', 'preceptor'),
(3, 'fede@gmail.com', 'fede', '$2y$10$H9ufuG1jF/Egnfvy6is5eOVOCeQuOKanAhzT3Aqnr3XwSp4p2OC0S', 'Fede', 'Lescano', 'alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comunicados`
--
ALTER TABLE `comunicados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_preceptor` (`id_preceptor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comunicados`
--
ALTER TABLE `comunicados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comunicados`
--
ALTER TABLE `comunicados`
  ADD CONSTRAINT `comunicados_ibfk_1` FOREIGN KEY (`id_preceptor`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
