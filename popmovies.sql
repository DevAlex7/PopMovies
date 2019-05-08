-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2019 a las 16:30:36
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `popmovies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actors`
--

INSERT INTO `actors` (`id`, `name`) VALUES
(1, 'Chris Evans'),
(2, 'Steven Diaz'),
(3, 'Carranza'),
(5, 'Rolin Azmitia'),
(6, 'Sara Ventura'),
(7, 'Fabiola'),
(8, 'Calvin Klein'),
(9, 'Tom Holland'),
(10, 'sada'),
(11, 'asd'),
(12, 'Alisson'),
(13, 'asdsa'),
(14, 'Bermudez'),
(15, 'Manuel'),
(16, 'Diaz'),
(17, 'Daniel'),
(18, 'ass'),
(19, 'Anuel'),
(20, 'asdasdasd'),
(21, 'Hee Hee'),
(22, 'asdadASSas'),
(23, 'asdADADAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actorsmovie`
--

CREATE TABLE `actorsmovie` (
  `id` int(11) NOT NULL,
  `Actor` int(11) NOT NULL,
  `Movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actorsmovie`
--

INSERT INTO `actorsmovie` (`id`, `Actor`, `Movie`) VALUES
(35, 1, 17),
(36, 8, 17),
(37, 2, 17),
(38, 3, 17),
(39, 5, 18),
(40, 11, 18),
(41, 9, 17),
(42, 8, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `lastname`, `username`, `email`, `password`) VALUES
(3, 'Alejandro ', 'Gonzalez', 'Alexgve7', 'alexgve7@gmail.com', '$2y$10$K5xbF5Eo5n9mIgl2YE3F3.e52kzNUFf6YOlH8TZ0kC749dK.ow2JK'),
(4, 'Gaby', 'Ramos', 'Akat', 'wen@gmail.com', '$2y$10$K5xbF5Eo5n9mIgl2YE3F3.e52kzNUFf6YOlH8TZ0kC749dK.ow2JK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `binnacle`
--

CREATE TABLE `binnacle` (
  `id` int(11) NOT NULL,
  `actionperformed` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `year` int(11) NOT NULL,
  `site` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `binnacle`
--

INSERT INTO `binnacle` (`id`, `actionperformed`, `user_id`, `admin_id`, `date`, `year`, `site`) VALUES
(14, 'ha registrado al actor Anuel', NULL, 3, '2019-05-07', 2019, 'actors'),
(15, 'ha registrado la clasificación  adada', NULL, 3, '2019-05-08', 2019, 'clasifications'),
(16, 'ha registrado la clasificación  C15', NULL, 3, '2019-05-08', 2019, 'clasifications'),
(17, 'ha registrado al proveedor Curacao', NULL, 3, '2019-05-08', 2019, 'customers'),
(18, 'ha registrado un nuevo genero:Rap', NULL, 3, '2019-05-08', 2019, 'genders'),
(19, 'ha registrado un nuevo genero: Country', NULL, 3, '2019-05-08', 2019, 'genders'),
(20, 'ha registrado al actor asdasdasd', NULL, 3, '2019-05-08', 2019, 'actors'),
(21, 'ha añadido al actor: ', NULL, 3, '2019-05-08', 2019, 'actors'),
(22, 'ha registrado al actor Hee Hee', NULL, 3, '2019-05-08', 2019, 'actors'),
(23, 'ha registrado al actor asdadASSas', NULL, 3, '2019-05-08', 2019, 'actors'),
(24, 'ha registrado al actor asdADADAD', NULL, 3, '2019-05-08', 2019, 'actors'),
(25, 'ha añadido al actor: Array', NULL, 3, '2019-05-08', 2019, 'actors'),
(26, 'ha añadido al actor: ', NULL, 3, '2019-05-08', 2019, 'actors'),
(27, 'ha añadido al actor: Array', NULL, 3, '2019-05-08', 2019, 'actors'),
(28, 'ha añadido al actor: ', NULL, 3, '2019-05-08', 2019, 'actors'),
(29, 'ha añadido al actor: Calvin Klein', NULL, 3, '2019-05-08', 2019, 'actors'),
(30, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(31, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(32, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(33, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(34, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(35, 'ha registrado un nuevo genero: Culo', NULL, 3, '2019-05-08', 2019, 'genders'),
(36, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(37, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(38, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(39, 'ha añadido al actor:  a la pelicula', NULL, 3, '2019-05-08', 2019, 'actors'),
(40, 'ha añadido al actor:  a la pelicula', NULL, 3, '2019-05-08', 2019, 'actors'),
(41, 'ha añadido al actor:  a la pelicula', NULL, 3, '2019-05-08', 2019, 'actors'),
(42, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(43, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(44, 'ha añadido al actor:  a la pelicula ', NULL, 3, '2019-05-08', 2019, 'actors'),
(45, 'ha registrado un nuevo genero: Tu madre', NULL, 3, '2019-05-08', 2019, 'genders'),
(46, 'ha asignado el actor Rolin Azmitia', NULL, 3, '2019-05-08', 2019, 'actors'),
(47, 'ha asignado el actor asd John Wick', NULL, 3, '2019-05-08', 2019, 'actors'),
(48, 'ha asignado el actor Tom Holland Capitana Marvel', NULL, 3, '2019-05-08', 2019, 'actors'),
(49, 'ha asignado el actor Calvin Klein a la pelicula: John Wick', NULL, 3, '2019-05-08', 2019, 'actors');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasifications`
--

CREATE TABLE `clasifications` (
  `id` int(11) NOT NULL,
  `clasification` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clasifications`
--

INSERT INTO `clasifications` (`id`, `clasification`, `description`) VALUES
(1, 'AA', 'Todo publico'),
(2, 'C', 'Mayores de 15 años'),
(3, 'B', 'Pelicula apta para niños de 12 en adelante'),
(4, 'B12', 'Peliculas para mayores de 19 años'),
(5, 'adada', 'dasd'),
(6, 'C15', 'Pelicula mayores de 19 años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificationsmovie`
--

CREATE TABLE `clasificationsmovie` (
  `id` int(11) NOT NULL,
  `clasification` int(11) NOT NULL,
  `movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasificationsmovie`
--

INSERT INTO `clasificationsmovie` (`id`, `clasification`, `movie`) VALUES
(7, 1, 17),
(8, 3, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `enterprise` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `enterprise`) VALUES
(2, 'Daniel Martinez', 'Dan@gmail.com', 'Curacao'),
(3, 'Alejandro', 'alexgve7@gmail.com', 'Curacao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `gender` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`id`, `gender`) VALUES
(26, 'Acción'),
(41, 'Animados'),
(32, 'Aventura'),
(34, 'Ciencia Ficción'),
(35, 'Clásico'),
(29, 'Comedia'),
(44, 'Country'),
(45, 'Culo'),
(40, 'Documentales'),
(27, 'Drama'),
(37, 'Fantasía'),
(39, 'Historia'),
(25, 'Miedo'),
(33, 'Musicales'),
(42, 'Pornografico'),
(43, 'Rap'),
(38, 'Romance'),
(30, 'Suspenso'),
(28, 'Terror'),
(46, 'Tu madre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gendersmovie`
--

CREATE TABLE `gendersmovie` (
  `id` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gendersmovie`
--

INSERT INTO `gendersmovie` (`id`, `gender`, `movie`) VALUES
(1, 29, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `membership` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `price` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `memberships`
--

INSERT INTO `memberships` (`id`, `membership`, `price`) VALUES
(1, 'Gold', 10.99),
(2, 'Black', 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sinopsis` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `time` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `cover` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `year` int(11) NOT NULL,
  `trailer` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `price` float(4,2) NOT NULL,
  `count` int(11) NOT NULL,
  `customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `name`, `sinopsis`, `time`, `cover`, `year`, `trailer`, `price`, `count`, `customer`) VALUES
(17, 'Capitana Marvel', 'Capitana Marvel regresa a la tierra a conocer su propia vida pasada de ser una heroina', '01:21:51', '5ccaf5936493e.jpeg', 2019, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0LHxvxdRnYc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 25.25, 20, 2),
(18, 'John Wick', 'Mercenario en busca de venganza quienes destruyeron su casa.', '01:25:55', '5ccf15f5d0cc8.jpg', 2010, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-CVqvdgLHm8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 10.25, 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `date` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user` int(11) NOT NULL,
  `discount` float(2,2) NOT NULL,
  `state` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `cover` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `shopstate` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `membership` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actorsmovie`
--
ALTER TABLE `actorsmovie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Movie` (`Movie`),
  ADD KEY `Actor` (`Actor`);

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `clasifications`
--
ALTER TABLE `clasifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `clasificationsmovie`
--
ALTER TABLE `clasificationsmovie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`),
  ADD KEY `clasification` (`clasification`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `gender` (`gender`);

--
-- Indices de la tabla `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gender` (`gender`);

--
-- Indices de la tabla `gendersmovie`
--
ALTER TABLE `gendersmovie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`),
  ADD KEY `gender` (`gender`);

--
-- Indices de la tabla `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membership` (`membership`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer`);

--
-- Indices de la tabla `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_ibfk_1` (`user`),
  ADD KEY `shop_ibfk_2` (`state`),
  ADD KEY `shop_ibfk_3` (`movie`);

--
-- Indices de la tabla `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lastname` (`lastname`),
  ADD KEY `membership` (`membership`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `actorsmovie`
--
ALTER TABLE `actorsmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `clasifications`
--
ALTER TABLE `clasifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clasificationsmovie`
--
ALTER TABLE `clasificationsmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `gendersmovie`
--
ALTER TABLE `gendersmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actorsmovie`
--
ALTER TABLE `actorsmovie`
  ADD CONSTRAINT `actorsmovie_ibfk_2` FOREIGN KEY (`Movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actorsmovie_ibfk_3` FOREIGN KEY (`Actor`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD CONSTRAINT `binnacle_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binnacle_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clasificationsmovie`
--
ALTER TABLE `clasificationsmovie`
  ADD CONSTRAINT `clasificationsmovie_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clasificationsmovie_ibfk_2` FOREIGN KEY (`clasification`) REFERENCES `clasifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gendersmovie`
--
ALTER TABLE `gendersmovie`
  ADD CONSTRAINT `gendersmovie_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gendersmovie_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_ibfk_2` FOREIGN KEY (`state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_ibfk_3` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`membership`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
