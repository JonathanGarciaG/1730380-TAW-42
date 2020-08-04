-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 03-08-2020 a las 10:41:30
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
-- Base de datos: `red_comercial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias_productos`
--

INSERT INTO `categorias_productos` (`id`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Material', NULL, '2020-07-29 08:29:01'),
(2, 'Alimentos', NULL, '2020-07-29 08:29:12'),
(3, 'Lácteos', '2020-07-29 08:28:50', '2020-07-29 08:28:50'),
(6, 'Electrónica', '2020-08-02 11:28:35', '2020-08-02 11:28:35'),
(7, 'Tecnologías', '2020-08-02 11:28:49', '2020-08-02 11:28:49'),
(8, 'Sistemas de Información', '2020-08-02 11:29:03', '2020-08-02 11:29:03'),
(9, 'Arte', '2020-08-02 12:29:07', '2020-08-02 12:29:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_empresa`
--

CREATE TABLE `categoria_empresa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_empresa`
--

INSERT INTO `categoria_empresa` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Arte', NULL, '2020-07-28 09:50:47'),
(2, 'Restaurante', NULL, '2020-07-28 09:47:41'),
(3, 'Comida Rápida', '2020-07-28 09:35:32', '2020-07-28 09:35:32'),
(4, 'Electrónica', '2020-07-28 09:43:56', '2020-07-28 09:43:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_ubicacion` bigint(20) UNSIGNED NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `telefono`, `descripcion`, `id_usuario`, `id_ubicacion`, `id_categoria`, `created_at`, `updated_at`) VALUES
(19, 'ArtesanoMX', '8341231201', 'Empresa dedicada a la venta de artesanía mexicana', 11, 2, 1, '2020-08-02 12:21:49', '2020-08-02 12:21:49'),
(20, 'Dev Systems', '235684394', 'Dev Systems', 10, 1, 4, '2020-08-02 12:22:27', '2020-08-02 12:22:27'),
(21, 'GGArte', '8341231201', 'Empresa dedicada a la venta de Ilustración, diseño y arte digital', 7, 1, 1, '2020-08-02 12:23:44', '2020-08-02 12:23:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pagos`
--

CREATE TABLE `historial_pagos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monto` double(8,2) NOT NULL,
  `metodo_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_productos`
--

CREATE TABLE `imagenes_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes_productos`
--

INSERT INTO `imagenes_productos` (`id`, `imagen`, `id_producto`, `created_at`, `updated_at`) VALUES
(22, '/images/products/default_image.png', 53, '2020-08-02 12:25:25', '2020-08-02 12:25:25'),
(23, '/images/products/1596353201logo upv.png', 54, '2020-08-02 12:26:41', '2020-08-02 12:26:41'),
(24, '/images/products/default_image.png', 55, '2020-08-02 12:28:22', '2020-08-02 12:28:22'),
(25, '/images/products/1596441112101715_2_0c469898-b3eb-46fe-ae89-a783ebe43f94_grande.jpg', 56, '2020-08-03 12:51:52', '2020-08-03 12:51:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_sitio`
--

CREATE TABLE `imagenes_sitio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_micrositio` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes_sitio`
--

INSERT INTO `imagenes_sitio` (`id`, `imagen`, `id_micrositio`, `created_at`, `updated_at`, `descripcion`) VALUES
(1, '/images/carousel/1596437069retro.jpg', 4, '2020-08-03 11:44:29', '2020-08-03 11:44:29', NULL),
(2, '/images/carousel/1596437087realidad aumentada.png', 4, '2020-08-03 11:44:47', '2020-08-03 11:44:47', NULL),
(5, '/images/carousel/1596437879jugar.jpg', 4, '2020-08-03 11:57:59', '2020-08-03 11:57:59', 'descripción demo'),
(6, '/images/carousel/1596441870tekken.jpg', 4, '2020-08-03 13:04:30', '2020-08-03 13:04:30', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `micrositios`
--

CREATE TABLE `micrositios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_sitio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_empresa` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `micrositios`
--

INSERT INTO `micrositios` (`id`, `nombre_sitio`, `color`, `contacto`, `info`, `logo`, `id_empresa`, `created_at`, `updated_at`) VALUES
(2, 'ArtesanoMX', NULL, NULL, NULL, NULL, 19, '2020-08-02 12:21:50', '2020-08-02 12:21:50'),
(3, 'Dev Systems', NULL, NULL, NULL, NULL, 20, '2020-08-02 12:22:28', '2020-08-02 12:22:28'),
(4, 'GGArte', NULL, NULL, NULL, NULL, 21, '2020-08-02 12:23:45', '2020-08-02 12:23:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_07_13_030425_create_usuarios_table', 1),
(4, '2020_07_13_030426_create_categoria_empresa_table', 1),
(5, '2020_07_13_030427_create_ubicacion_table', 1),
(6, '2020_07_13_030526_create_empresas_table', 1),
(7, '2020_07_13_031940_create_micrositios_table', 1),
(8, '2020_07_13_032044_create_imagenes_sitio_table', 1),
(9, '2020_07_13_032214_create_historial_pagos_table', 1),
(10, '2020_07_13_032237_create_categorias_productos_table', 1),
(11, '2020_07_13_032238_create_productos_table', 1),
(12, '2020_07_13_032345_create_imagenes_productos_table', 1),
(13, '2020_07_13_032405_create_pedidos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` double(8,2) NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `longitud` double(8,2) NOT NULL,
  `anchura` double(8,2) NOT NULL,
  `altura` double(8,2) NOT NULL,
  `id_empresa` bigint(20) UNSIGNED NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `tipo`, `codigo`, `precio`, `stock`, `longitud`, `anchura`, `altura`, `id_empresa`, `id_categoria`, `created_at`, `updated_at`, `descripcion`) VALUES
(53, 'Ilustración digital 1', 'Producto', 'SDFTR141AA', 200.00, 100, 100.00, 90.00, 100.00, 21, 7, '2020-08-02 12:25:24', '2020-08-02 12:27:04', 'Pieza de ilustración digital 1'),
(54, 'Diseño de logos', 'Servicio', 'JNJHFG888', 500.00, 100, 100.00, 100.00, 100.00, 21, 6, '2020-08-02 12:26:39', '2020-08-02 12:26:39', 'Diseño original de logo personal'),
(55, 'asdasgd', 'Servicio', 'asd2SDGSFDQ', 221345.00, 1235, 23.00, 23.00, 45.00, 21, 1, '2020-08-02 12:28:21', '2020-08-02 12:28:21', 'Descripcion'),
(56, 'Producto nuevo', 'Producto', 'C0D314wegrerg', 1500.00, 100, 234.00, 24.00, 33.00, 21, 9, '2020-08-03 12:51:46', '2020-08-03 12:51:46', 'descripción de producto nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `municipio`, `estado`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Victoria', 'Tamaulipas', 'Ocampo', NULL, NULL),
(2, 'Monterrey', 'Nuevo León', 'Agrícola', NULL, NULL),
(3, 'Gomez Farias', 'Tamaulipas', 'Gomez Farias Centro', '2020-07-29 09:44:47', '2020-07-29 09:45:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `email_verified_at`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'Admin', 'admin@gmail.com', NULL, '$2y$10$1CjhCnkKaq4FsoWzWZbs2u3Vxx97AW7ARZTfs9xdSuhPqfWgZxfXu', 'Super User', NULL, '2020-07-16 06:06:26', '2020-07-16 06:06:26'),
(7, 'Jonathan', 'Garcia Gonzalez', 'jonathan_dogi@hotmail.com', NULL, '$2y$10$C/CQx1Etsu0zNk47cbokzeHaBUloe/rFas7apsj8109jD.gXRi9dm', 'Administrador', NULL, '2020-07-16 07:03:20', '2020-08-02 10:08:05'),
(8, 'shakabralasha', 'omir', 'asdgsd@gmail.com', NULL, '$2y$10$jMUiJnvY6moYFfbLp8XotedbyRUPrLIk30PQRvYVHXcbyyxA4sjhG', 'Administrador', NULL, '2020-07-16 08:17:41', '2020-07-16 08:34:09'),
(10, 'Admin', 'Istrador', 'admin@admin.es', NULL, '$2y$10$zVslZ28TH6zEhnfkA8s4WOPJhzEwfJQZHN7ewwP3/madk6y2TwA1S', 'Administrador', NULL, '2020-07-16 10:53:48', '2020-07-16 10:53:48'),
(11, 'John', 'Doe', 'correo@mail.com', NULL, '$2y$10$MjxJKaaUFxWYlPcSUc0feu1Eqe4.9n/708yP5gRVjuoW3KNEnxn6O', 'Administrador', NULL, '2020-07-16 10:54:28', '2020-07-16 14:17:57'),
(12, 'administrador', 'demo', 'admin@mail3.com', NULL, '$2y$10$ABVxwWwlw.GmihvsIiChfeC1QyywJVYGVc.V7Hsm4ww3Tm9OPl5Ai', 'Administrador', NULL, '2020-07-16 14:17:35', '2020-07-16 14:17:35'),
(13, 'Balltze', 'Cheems', 'cheemsburger41@mail.com', NULL, '$2y$10$fQuluOXL/o2ToEvl7NLKvey9IkPnuLXU1FcmQ0Fk2FvGSlCkm5s6C', 'Administrador', NULL, '2020-07-28 08:02:17', '2020-07-28 08:02:17'),
(16, 'user', 'client', 'client@mail.com', NULL, '$2y$10$Zb0PncYsLkwfPbv5xv1d3.3pUSVRhwwPT.gC1KP/q8wg36HpdwnEO', 'Cliente', NULL, '2020-08-02 12:54:01', '2020-08-02 12:54:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_empresa`
--
ALTER TABLE `categoria_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresas_id_usuario_foreign` (`id_usuario`),
  ADD KEY `empresas_id_ubicacion_foreign` (`id_ubicacion`),
  ADD KEY `empresas_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_pagos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_productos_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `imagenes_sitio`
--
ALTER TABLE `imagenes_sitio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_sitio_id_micrositio_foreign` (`id_micrositio`);

--
-- Indices de la tabla `micrositios`
--
ALTER TABLE `micrositios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `micrositios_id_empresa_foreign` (`id_empresa`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `pedidos_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_id_empresa_foreign` (`id_empresa`),
  ADD KEY `productos_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categoria_empresa`
--
ALTER TABLE `categoria_empresa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `imagenes_sitio`
--
ALTER TABLE `imagenes_sitio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `micrositios`
--
ALTER TABLE `micrositios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_empresa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empresas_id_ubicacion_foreign` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empresas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_pagos`
--
ALTER TABLE `historial_pagos`
  ADD CONSTRAINT `historial_pagos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD CONSTRAINT `imagenes_productos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_sitio`
--
ALTER TABLE `imagenes_sitio`
  ADD CONSTRAINT `imagenes_sitio_id_micrositio_foreign` FOREIGN KEY (`id_micrositio`) REFERENCES `micrositios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `micrositios`
--
ALTER TABLE `micrositios`
  ADD CONSTRAINT `micrositios_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
