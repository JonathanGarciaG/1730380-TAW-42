-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-06-2020 a las 10:05:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) DEFAULT NULL,
  `description_category` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `description_category`, `date_added`) VALUES
(1, 'Lacteos', 'Productos Lácteos ', NULL),
(2, 'Enlatados', 'Productos en lata', '2020-06-07 16:00:22'),
(3, 'Robots', 'Nier Automata', '2020-06-10 00:49:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `apellido` int(11) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `note` varchar(100) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `date`, `note`, `reference`, `quantity`) VALUES
(1, 1, 1, '2020-06-07 15:53:13', 'Jonathan Garcia González agrego/compra', 'mas leche', 10),
(2, 1, 1, '2020-06-07 15:53:37', 'Jonathan Garcia González quito', 'Leche vendida', 2),
(3, 1, 1, '2020-06-07 15:54:28', 'Jonathan Garcia González agrego/compra', 'Nueva imagen del producto', 15),
(4, 5, 1, '2020-06-07 16:02:00', 'Jonathan Garcia González quito', 'Ventas', 83),
(5, 6, 1, '2020-06-07 16:22:45', 'Jonathan Garcia González agrego/compra', 'motivo', 125),
(6, 6, 1, '2020-06-07 16:23:18', 'Jonathan Garcia González agrego/compra', 'adff', 11),
(7, 6, 1, '2020-06-07 16:23:32', 'Jonathan Garcia González quito', 's', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `code_product` varchar(60) NOT NULL,
  `name_product` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `price_product` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `code_product`, `name_product`, `date_added`, `price_product`, `stock`, `id_category`) VALUES
(1, 'A12', 'Leche', '2020-06-07 15:21:14', 12, 15, 1),
(4, 'YoRHA 2B', 'Androide Vaca', '2020-06-07 15:55:37', 2499, 1, 1),
(5, '15LV4', 'Chiles', '2020-06-07 16:01:32', 15, 17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_email` varchar(64) DEFAULT NULL,
  `type_user` varchar(30) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password`, `user_email`, `type_user`, `date_added`) VALUES
(1, 'Jonathan', 'Garcia González', 'demo', 'demo', 'johnyahga@gmail.com', 'Administrador', '2020-06-11 02:01:13'),
(12, 'user2', 'user2', 'demo2', 'demo2', 'mail@mail.com', 'Cajero', '2020-06-11 02:10:58'),
(13, 'Nuevo', 'Usuario', 'user', '$2y$10$fNU5GY1sfJ6zKZuAkg34FOLE5d6xm/atFcDw6GuStu3xvWVHTWCGm', 'user@gmail.com', 'Administrador', '2020-06-11 02:12:58'),
(15, 'John', 'Doe', 'johndoe', '$2y$10$fgOezjz.lDg1WA4di8UO6.2qQUIEzeJaefIEOznEzqL2DF3FgC0bW', 'johndoe@mail.com', 'Administrador', '2020-06-11 02:24:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `total` double NOT NULL,
  `pago` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
