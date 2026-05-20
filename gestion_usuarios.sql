-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2026 a las 10:51:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `es_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre`, `apellido`, `fecha_nac`, `es_admin`) VALUES
(1, 'admin', '$2y$10$kY/IZJND.fay.ZStra37aO.Ea.2mWoApoKVC5mYT9py9kUE.ZwlKS', 'Francisco', 'Morales', '1988-04-12', 1),
(2, 'carlos92', '$2y$10$vHhRQjnf55jDBJdXfSRymemflELry8XOBe7yuCyx/aK5B2klmJqIW', 'Carlos', 'Mendoza', '1992-05-15', 0),
(3, 'ana_gomez', '$2y$10$vHhRQjnf55jDBJdXfSRymemflELry8XOBe7yuCyx/aK5B2klmJqIW', 'Ana', 'Gómez', '1995-10-22', 0),
(4, 'luis_fer', '$2y$10$vHhRQjnf55jDBJdXfSRymemflELry8XOBe7yuCyx/aK5B2klmJqIW', 'Luis', 'Fernández', '2000-03-08', 0),
(5, 'marta_silva', '$2y$10$vHhRQjnf55jDBJdXfSRymemflELry8XOBe7yuCyx/aK5B2klmJqIW', 'Marta', 'Silva', '1997-07-19', 0),
(6, 'lucas_rock', '$2y$10$vHhRQjnf55jDBJdXfSRymemflELry8XOBe7yuCyx/aK5B2klmJqIW', 'Lucas', 'Ortiz', '2010-08-14', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
