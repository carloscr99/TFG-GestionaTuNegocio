-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2021 a las 13:19:45
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionatunegocio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `reference` varchar(30) NOT NULL,
  `urlImagen` varchar(250) NOT NULL,
  `storedAt` varchar(9) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `reference`, `urlImagen`, `storedAt`, `created_at`, `updated_at`) VALUES
(25, 'iphone 12', 'Apple iPhone 12 128GB', 1200, 21, 'ds2', 'https://firebasestorage.googleapis.com/v0/b/gestionatunegociolaravel.appspot.com/o/H70763552%2Fds2?alt=media&token=0b88103d-92f7-406f-a4f5-d4e90ab06eea', 'H70763552', '2021-05-02', '2021-05-02'),
(27, 'Echo dot 4', 'Altavoz inteligente', 40, 15, 'echodot4', 'https://firebasestorage.googleapis.com/v0/b/gestionatunegociolaravel.appspot.com/o/H70763552%2Fechodot4?alt=media&token=125f9c42-2e07-4196-838d-b6478f9fbb8b', 'H70763552', '2021-05-09', '2021-05-09'),
(28, 'Samsung Galaxy s21 5G', 'Samsung Galaxy s21 5G.\r\n128GB de almacenamiento interno.\r\n12GB de RAM.', 857, 20, 's215G128', 'https://firebasestorage.googleapis.com/v0/b/gestionatunegociolaravel.appspot.com/o/H70763552%2Fs215G128?alt=media&token=437be78f-7964-46cb-9f1a-873ddef6afc3', 'H70763552', '2021-05-09', '2021-05-09'),
(32, 'Reloj despertador', NULL, 23, 10, 'relojDespertador', 'https://via.placeholder.com/300x200', 'H70763552', '2021-05-16', '2021-05-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `nameShop` varchar(150) NOT NULL,
  `direction` varchar(250) NOT NULL,
  `city` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `shops`
--

INSERT INTO `shops` (`id`, `nameShop`, `direction`, `city`, `country`, `cif`, `created_at`, `updated_at`) VALUES
(3, 'Indra', 'cardenal benlloch', 'valencia', 'España', 'A25498650', '2021-04-12', '2021-04-12'),
(22, 'Tienda de Tecnología', 'c/ falsa 21', 'Valencia', 'ES', 'H70763552', '2021-04-25', '2021-04-25');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `iban` varchar(26) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `restablished` int(1) NOT NULL DEFAULT 0,
  `workAt` varchar(9) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `email_verified_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `dni`, `iban`, `email`, `rol`, `password`, `restablished`, `workAt`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(11, 'SuperAdministrador', '69162721L', NULL, 'superadmin@gestionatunegocio.com', 'superadmin', '$2y$10$2aCcFWUH70SSURpBNsj29ue7/PNd/BUtVmA07fQ9IMRgnP7VPzCnK', 0, '', '0000-00-00', '0000-00-00', NULL),
(33, 'Carlos Colomer Revert', '12345678T', NULL, 'carloscolomer4@gmail.com', 'propietario', '$2y$10$F18tVyqKot6OD.Mfw0ms9OvJ.1TnMK9JjiVOix1tUSnOpaMqmDfaG', 0, 'H70763552', '2021-04-25', '2021-04-25', NULL),
(36, 'Maria Díaz', '11643842T', 'ES7920247505163937454383', 'mariaa@gmail.com', 'encargado', '$2y$10$31mW9qv2QK3OmNz6yXolsOi2agUZSsk8SzuSeCEcvZ1zYEFE20Ldm', 0, 'H70763552', '2021-04-27', '2021-04-27', NULL);
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cif` (`cif`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
