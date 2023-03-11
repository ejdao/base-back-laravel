-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 03:53:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notice_portal_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_types`
--

CREATE TABLE `document_types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `code` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `document_types`
--

INSERT INTO `document_types` (`id`, `code`, `name`) VALUES
(1, 'C.C', 'CEDULA DE CIUDADANIA'),
(2, 'T.I', 'TARJETA DE IDENTIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `principal_image_url` varchar(24) NOT NULL,
  `description` varchar(200) NOT NULL,
  `notice_content_id` int(10) UNSIGNED NOT NULL,
  `notice_category_id` tinyint(3) UNSIGNED NOT NULL,
  `published` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `visits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `location` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notices__categories`
--

CREATE TABLE `notices__categories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notices__categories`
--

INSERT INTO `notices__categories` (`id`, `name`) VALUES
(1, 'DEFAULT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notices__contents`
--

CREATE TABLE `notices__contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notices__gallery`
--

CREATE TABLE `notices__gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `notice_category_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `url` varchar(24) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `code`, `name`) VALUES
(1, '0001', 'ADMINISTRADOR'),
(2, '0002', 'REPORTERO'),
(3, '0003', 'CLIENTE_PUBLICIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `document_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `document_number` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `updated_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `document_type_id`, `document_number`, `full_name`, `email`, `username`, `password`, `active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, NULL, NULL, 'ENRIQUE JOSE DE ARMAS OSIA', 'admin', NULL, '$2a$10$UtdB5K1nRtWlbbgUygtBt.8yzMnf0YOzrT9bWecZCjsBkpXLBe2BW', 1, '2022-11-27 15:48:40', '2022-11-27 15:48:40', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notices__categories`
--
ALTER TABLE `notices__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notices__contents`
--
ALTER TABLE `notices__contents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notices__gallery`
--
ALTER TABLE `notices__gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notices__categories`
--
ALTER TABLE `notices__categories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notices__contents`
--
ALTER TABLE `notices__contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notices__gallery`
--
ALTER TABLE `notices__gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
