-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb:3306
-- Tiempo de generación: 29-06-2023 a las 20:17:38
-- Versión del servidor: 10.6.14-MariaDB
-- Versión de PHP: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iot_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dht11`
--

CREATE TABLE `dht11` (
  `id` int(11) UNSIGNED NOT NULL,
  `temperatura` double DEFAULT NULL,
  `humedad` double DEFAULT NULL,
  `indice` double DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dht11`
--

INSERT INTO `dht11` (`id`, `temperatura`, `humedad`, `indice`, `fecha`) VALUES
(290, 27.1, 43, 27.1, '2023-06-29 08:42:45'),
(291, 27.1, 43, 27.1, '2023-06-29 08:43:07'),
(2701, 27.1, 42, 27.04, '2023-06-29 08:43:27'),
(2702, 27.1, 42, 27.04, '2023-06-29 08:43:47'),
(2703, 27.1, 42, 27.04, '2023-06-29 08:44:08'),
(2704, 27.1, 42, 27.04, '2023-06-29 08:44:27'),
(2705, 27.1, 43, 27.1, '2023-06-29 08:44:50'),
(2706, 27.1, 43, 27.1, '2023-06-29 08:45:08'),
(2707, 27.1, 43, 27.1, '2023-06-29 08:45:29'),
(2708, 27.1, 44, 27.15, '2023-06-29 08:45:50'),
(2709, 27.1, 44, 27.15, '2023-06-29 08:46:09'),
(2710, 27.1, 44, 27.15, '2023-06-29 08:46:35'),
(2711, 27.1, 44, 27.15, '2023-06-29 08:46:57'),
(2712, 27.6, 45, 27.65, '2023-06-29 08:47:14'),
(2713, 27.6, 45, 27.65, '2023-06-29 08:47:33'),
(2714, 27.6, 46, 27.72, '2023-06-29 08:47:52'),
(2715, 27.6, 46, 27.72, '2023-06-29 08:48:12'),
(2716, 27.6, 46, 27.72, '2023-06-29 08:48:33'),
(2717, 27.6, 46, 27.72, '2023-06-29 08:48:53'),
(2718, 27.6, 47, 27.79, '2023-06-29 08:49:13'),
(2719, 27.6, 47, 27.79, '2023-06-29 08:49:34'),
(2720, 27.6, 47, 27.79, '2023-06-29 08:49:53'),
(2721, 28, 46, 28.11, '2023-06-29 08:50:14'),
(2722, 28, 47, 28.19, '2023-06-29 08:50:34'),
(2723, 28, 47, 28.19, '2023-06-29 08:50:58'),
(2724, 28, 47, 28.19, '2023-06-29 08:51:16'),
(2725, 28, 47, 28.19, '2023-06-29 08:51:37'),
(2726, 28, 47, 28.19, '2023-06-29 08:51:56'),
(2727, 28, 48, 28.27, '2023-06-29 08:52:15'),
(2728, 28, 48, 28.27, '2023-06-29 08:52:37'),
(2729, 28, 48, 28.27, '2023-06-29 08:53:01'),
(2730, 28, 48, 28.27, '2023-06-29 08:53:20'),
(2731, 28, 48, 28.27, '2023-06-29 08:53:41'),
(2732, 28, 48, 28.27, '2023-06-29 08:54:03'),
(2733, 28, 47, 28.19, '2023-06-29 08:54:23'),
(2734, 28, 47, 28.19, '2023-06-29 08:54:42'),
(2735, 28, 46, 28.11, '2023-06-29 08:55:04'),
(2736, 28, 46, 28.11, '2023-06-29 08:55:23'),
(2737, 27.6, 46, 27.72, '2023-06-29 08:55:42'),
(2738, 27.6, 46, 27.72, '2023-06-29 08:56:04'),
(2739, 27.6, 45, 27.65, '2023-06-29 08:56:23'),
(2740, 27.6, 44, 27.58, '2023-06-29 08:56:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dht11`
--
ALTER TABLE `dht11`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dht11`
--
ALTER TABLE `dht11`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2741;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
