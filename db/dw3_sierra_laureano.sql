-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 04:51:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_sierra_laureano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`) VALUES
(1, 'categoria_aceites'),
(2, 'categoria_cremas'),
(3, 'categoria_capsulas'),
(4, 'categoria_gummies'),
(13, 'categoria_aceites'),
(14, 'categoria_cremas'),
(15, 'categoria_capsulas'),
(16, 'categoria_gummies');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `usuario_fk` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagen_descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `usuario_fk`, `titulo`, `descripcion`, `precio`, `imagen`, `imagen_descripcion`) VALUES
(1, 1, 'Aceite Sublingual 10ML', 'Aceite Sublingual Natures CBD con 39,9% de CBD 10ML', 6000.00, 'aceite.jpg', 'Aceite sublingual de CBD de 10ML'),
(2, 1, 'Aceite Sublingual 10ML', 'Aceite Sublingual Natures CBD con 39,9% de CBD 30ML', 8999.00, 'aceite.jpg', 'Aceite sublingual de CBD de 30ML'),
(3, 1, 'Aceite Sublingual Rojo 10% 10ML', 'Aceite Sublingual Natures CBD con 10% de CBD 10ML', 5400.00, 'aceite-rojo.jpg', 'Aceite sublingual con un 10% de CBD'),
(4, 1, 'Gummies de CBD', 'Gummies Acid Strawberry y Watermelon (de frutilla y sandia) x30 unidades 450mg CBD (15mg CBD por gomita)', 7899.00, 'gummies-cbd.jpg', 'Gomitas con efecto CBD'),
(5, 1, 'Gummies de THC', 'Gummies Candy x30 unidades 450mg THC (15mg THC por gomita)', 8000.00, 'gummies-thc.jpg', 'Gomitas con efecto THC'),
(6, 1, 'Capsulas Fish Oil', 'Compuesto: CBD 39,99% + Omega 3,6 y 9. Contiene 60 cápsulas, 1800mg de cbd, aceite de salmón 200mg.', 12000.00, 'capsulas.jpg', 'Capsulas de CBD'),
(7, 1, 'Crema Corporal para dolores', 'NiCrema Corporal Forte Con tinte de cannabis 40gr.', 5499.00, 'crema-corporal.jpg', 'Crema Corporal para tratar dolores'),
(8, 1, 'Crema Masajeadora', 'Crema Masajeadora 1000mg + Apitoxina x 50gr.', 4500.00, 'crema-masajeadora.jpg', 'Crema para realizar masajes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_tienen_categorias`
--

CREATE TABLE `productos_tienen_categorias` (
  `producto_fk` int(10) UNSIGNED NOT NULL,
  `categoria_fk` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_tienen_categorias`
--

INSERT INTO `productos_tienen_categorias` (`producto_fk`, `categoria_fk`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `rol_fk` tinyint(3) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `rol_fk`, `email`, `password`, `nombre`, `apellido`) VALUES
(1, 1, 'natures@cbd.com', '$2y$10$1nKzeUe/.EfEDimP8RTBIeUjKCI9AqRc9uj8W9OE9DyoPpGcB2qvS', 'natures', 'cbd'),
(5, 2, 'sierra@gmail.com', '$2y$10$SuaKP5jSyCXcSM6goVhl2uA/W0yMV8QvGa3euWFCdH0PFTT0kzLfm', 'Laureano', 'Sierra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `fk_productos_usuarios_idx` (`usuario_fk`);

--
-- Indices de la tabla `productos_tienen_categorias`
--
ALTER TABLE `productos_tienen_categorias`
  ADD PRIMARY KEY (`producto_fk`,`categoria_fk`),
  ADD KEY `fk_productos_tienen_categorias_productos_idx` (`producto_fk`),
  ADD KEY `fk_categorias_tienen_categorias_categorias_idx` (`categoria_fk`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuarios_roles_idx` (`rol_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_usuarios` FOREIGN KEY (`usuario_fk`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_tienen_categorias`
--
ALTER TABLE `productos_tienen_categorias`
  ADD CONSTRAINT `fk_productos_tienen_categorias_categorias` FOREIGN KEY (`categoria_fk`) REFERENCES `categorias` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_tienen_categorias_productos` FOREIGN KEY (`producto_fk`) REFERENCES `productos` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rol_fk`) REFERENCES `roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
