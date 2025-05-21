-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2025 a las 21:38:37
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
-- Base de datos: `tienda_retro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `correo`, `fecha_nacimiento`, `genero`) VALUES
(1, 'Marcos', 'Mateos Iglesias', 'marcos@gmail.com', '2025-05-19', 'Masculino'),
(2, NULL, NULL, NULL, NULL, NULL),
(3, 'prueba', 'gonzalo', 'gonzalo@gmail.com', '2005-02-24', 'Femenino'),
(4, 'prueba', 'gonzalo', 'gonzalo@gmail.com', '2005-03-24', 'Masculino'),
(5, 'prueba1', 'prueba_apellidos', 'prueba1@gmail.com', '2000-02-24', 'Masculino'),
(6, 'prueba1', 'gonzalo', 'prueba1@gmail.com', '2000-02-22', 'Femenino'),
(7, 'Marcos', 'Gonzalez Jimenez', 'prueba1@gmail.com', '2000-02-22', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `referencia_producto` varchar(10) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `usuario`, `referencia_producto`, `fecha`) VALUES
(1, 'marcos1', 'ATM96', '2025-05-19 19:17:25'),
(2, 'marcos1', 'BET97', '2025-05-19 22:25:57'),
(3, 'marcos1', 'ATM96', '2025-05-19 22:28:10'),
(4, 'marcos1', 'ESP00', '2025-05-20 15:13:12'),
(5, 'prueba', 'ATM96', '2025-05-20 20:15:13'),
(6, 'prueba', 'BET97', '2025-05-20 20:16:34'),
(7, 'prueba', 'CEL99', '2025-05-20 20:19:22'),
(8, 'prueba1', NULL, '2025-05-20 20:44:58'),
(9, 'prueba1', 'ESP00', '2025-05-20 20:45:06'),
(10, 'prueba2', 'ATM96', '2025-05-20 20:57:20'),
(11, 'prueba3', 'ATM96', '2025-05-20 21:15:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `referencia` varchar(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`referencia`, `nombre`, `precio`, `imagen`) VALUES
('ATH94', 'Camiseta Athletic Club 1994', 35.00, 'img/athletic.jpg\r\n'),
('ATM96', 'Camiseta Atlético 1996', 38.00, 'img/camiseta-retro-atlrtico-madrid-1996-scaled.jpg\r\n'),
('BET97', 'Camiseta Betis 1997', 33.00, 'img/camiseta-real-betis-1-equipacion-retro-96-97-001-1000x1000.jpg\r\n'),
('CEL99', 'Camiseta Celta 1999', 32.75, 'img/8ab6cc4f-scaled.jpeg\r\n'),
('DEP02', 'Camiseta Deportivo 2002', 37.25, 'img/$_57.jpg\r\n'),
('ESP00', 'Camiseta Espanyol 2000', 31.50, 'img/Espanyol.jpg\r\n'),
('FCB06', 'Camiseta Barcelona 2006', 42.50, 'img/1a04478c.jpg\r\n'),
('RM99', 'Camiseta Real Madrid 1999', 39.99, 'img/img_0438-scaled.jpeg\r\n'),
('SEV05', 'Camiseta Sevilla 2005', 34.50, 'img/images.jpg\r\n'),
('VAL01', 'Camiseta Valencia 2001', 36.00, 'img/camiseta-retro-valencia-2001-scaled.jpg\r\n\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contraseña`) VALUES
('marcos1', '$2y$10$x46WhdKWnfAcyMmcwifwEuR5aZsTpOdJbHciFq13POigHu2phKezO'),
('prueba', '$2y$10$tyU79YQFFsO6vknzgqz9QelAPW781YksRcl1ErWWMuisbaujPMAfK'),
('prueba1', '$2y$10$wElnko7PSFgKKvSrGFzQ5O2gzTSOf9Ss0VpJlQjW8W.RFe3AJo8Tu'),
('prueba2', '$2y$10$avXK/E0WMxsW17TRk71KWuWm8f1DtEs2VOf94pfu.08vYyvD2O6cq'),
('prueba3', '$2y$10$U/yol/d6K1zIcP3G4qyEneGtefj4xSO11PxC9xLrOE6boUqlPvDc6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`referencia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
