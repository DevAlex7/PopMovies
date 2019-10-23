-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2019 a las 16:04:28
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
  `name` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actors`
--

INSERT INTO `actors` (`id`, `name`) VALUES
(36, 'Chris Evans'),
(37, 'Steven');

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
(2, 36, 25),
(3, 37, 25);

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
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_profile_at` date NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `lastname`, `username`, `email`, `password`, `created_profile_at`, `role`, `status`) VALUES
(16, 'Alejandro', 'Gonzalez', 'Ale1234', 'alexgve7sv@gmail.com', '$2y$10$oNFhGwLkPVWHt5YpxczHO.h6iHzGr1VU5I03AhcS6TvvjeXeoslsS', '2019-08-22', 0, 0),
(17, 'Steven', 'Diaz', 'StevenD', 'Steven@gmail.com', '$2y$10$KghCT8S86iAEbcHIT/8LS.2hFlDB18/ti3puPSa2jkveKqL8chSEW', '2019-08-22', 0, 0),
(18, 'Alejandro ', 'Manuel', 'Alexgve7', 'alexgve7@gmail.com', '$2y$10$oNFhGwLkPVWHt5YpxczHO.h6iHzGr1VU5I03AhcS6TvvjeXeoslsS', '2019-08-22', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers_reset`
--

CREATE TABLE `answers_reset` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_answer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `answers_reset`
--

INSERT INTO `answers_reset` (`id`, `username`, `date_answer`) VALUES
(5, 'Alexgve7', '2019-08-27'),
(6, 'Alexgve7', '2019-08-28'),
(7, 'Alexgve7', '2019-08-28'),
(8, 'Alexgve7', '2019-08-28'),
(9, 'Alexgve7', '2019-08-28'),
(10, 'Alexgve7', '2019-08-28'),
(11, 'Alexgve7', '2019-08-28'),
(12, 'Alexgve7', '2019-08-28'),
(13, 'Alexgve7', '2019-08-28'),
(14, 'Alexgve7', '2019-08-28'),
(15, 'Alexgve7', '2019-08-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `binnacle`
--

CREATE TABLE `binnacle` (
  `id` int(11) NOT NULL,
  `actionperformed` text COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `year` int(11) NOT NULL,
  `site` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `binnacle`
--

INSERT INTO `binnacle` (`id`, `actionperformed`, `user_id`, `admin_id`, `date`, `year`, `site`) VALUES
(100, 'registrado un nuevo genero: Ciencia Ficción', NULL, 16, '2019-05-13', 2019, 'genders'),
(104, 'ha comentado: Hola como estan', 3, NULL, '2019-05-16', 2019, 'comments'),
(105, 'ha comentado: Hola chicos', 3, NULL, '2019-05-16', 2019, 'comments'),
(106, 'ha comentado: Hola pequeños :V', 3, NULL, '2019-05-16', 2019, 'comments'),
(107, 'ha comentado: Hola que pedos', 3, NULL, '2019-05-16', 2019, 'comments'),
(108, 'ha comentado: Jajajajajajaja en la pelicula: Capitana Marvel', 3, NULL, '2019-05-16', 2019, 'comments'),
(109, 'ha comentado: Jotos todos en la pelicula: Hangover', 3, NULL, '2019-05-16', 2019, 'comments'),
(110, 'ha comentado: Hijos de puta en la pelicula: Hangover', 3, NULL, '2019-05-16', 2019, 'comments'),
(111, 'ha comentado: Hola jajaja en la pelicula: Hangover', 3, NULL, '2019-05-16', 2019, 'comments'),
(112, 'ha comentado: jejejejeje en la pelicula: Capitana Marvel', 3, NULL, '2019-05-16', 2019, 'comments'),
(113, 'ha comentado: Madres :v en la pelicula: Hangover', 3, NULL, '2019-05-16', 2019, 'comments'),
(114, 'ha comentado: Arten mierda todos la capitana es vergona D: en la pelicula: Hangover', 3, NULL, '2019-05-16', 2019, 'comments'),
(115, 'ha comentado: Alexgve7 me la pela  en la pelicula: Hangover', 4, NULL, '2019-05-16', 2019, 'comments'),
(118, 'ha comentado: Candray me la pela en la pelicula: Hangover', 4, NULL, '2019-05-16', 2019, 'comments'),
(119, 'ha comentado: Pendejos en la pelicula: Hangover', 3, NULL, '2019-05-17', 2019, 'comments'),
(120, 'ha comentado: Ojete en la pelicula: Capitana Marvel', 3, NULL, '2019-05-17', 2019, 'comments'),
(123, 'ha comentado: jajajaja en la pelicula: Hangover', 3, NULL, '2019-05-17', 2019, 'comments'),
(124, 'ha comentado: Esa pelicula me la recomendo mi hijo, buenisima! en la pelicula: Hangover', 3, NULL, '2019-05-17', 2019, 'comments'),
(125, 'ha comentado: Hoy la vi y super buenisima \r\n en la pelicula: Hangover', 3, NULL, '2019-05-17', 2019, 'comments'),
(126, 'ha comentado: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui ea dolore sit, saepe laudantium illum necessitatibus explicabo eveniet vel nihil hic eum cumque beatae modi architecto tempore incidunt praesentium. Commodi. en la pelicula: Hango', 3, NULL, '2019-05-17', 2019, 'comments'),
(134, 'ha comentado: Hola jjajaja en la pelicula: Hangover', 3, NULL, '2019-05-17', 2019, 'comments'),
(135, 'ha comentado: Hola jaja xd en la pelicula: Hangover', 3, NULL, '2019-05-17', 2019, 'comments'),
(136, 'ha comentado: Ceroteeeees en la pelicula: Hangover', 3, NULL, '2019-05-18', 2019, 'comments'),
(139, 'ha comentado: Buena pelicula! en la pelicula: Capitana Marvel', 3, NULL, '2019-05-18', 2019, 'comments'),
(142, 'ha comentado: Pendejooo xd\r\n en la pelicula: Hangover', 3, NULL, '2019-05-20', 2019, 'comments'),
(145, 'ha comentado: Pendejos :v\r\n en la pelicula: Avengers', 3, NULL, '2019-05-23', 2019, 'comments'),
(146, 'ha comentado: JAJAJA xd\r\n en la pelicula: Avengers', 4, NULL, '2019-05-23', 2019, 'comments'),
(147, 'ha comentado: Hola como estan :D en la pelicula: John Wick', 4, NULL, '2019-05-25', 2019, 'comments'),
(148, 'ha comentado: Hola :v en la pelicula: Avengers', 3, NULL, '2019-06-03', 2019, 'comments'),
(149, 'ha comentado: sasad en la pelicula: Avengers', 3, NULL, '2019-06-09', 2019, 'comments');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `car`
--

INSERT INTO `car` (`id`, `date`, `status`, `client`) VALUES
(3, '2019-05-25', 0, 4),
(4, '2019-07-03', 1, 3),
(5, '2019-07-05', 1, 3),
(6, '2019-07-05', 1, 3),
(7, '2019-07-06', 1, 3),
(8, '2019-07-06', 1, 3),
(9, '2019-07-06', 1, 3),
(10, '2019-07-06', 1, 3),
(11, '2019-07-06', 1, 3),
(12, '2019-07-06', 1, 3),
(13, '2019-07-06', 1, 3),
(14, '2019-07-06', 1, 3),
(15, '2019-07-06', 1, 3),
(16, '2019-07-06', 1, 3),
(17, '2019-07-10', 1, 3),
(18, '2019-07-10', 1, 3),
(19, '2019-07-10', 1, 3),
(20, '2019-07-11', 1, 3),
(21, '2019-07-11', 1, 3),
(22, '2019-07-11', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasifications`
--

CREATE TABLE `clasifications` (
  `id` int(11) NOT NULL,
  `clasification` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clasifications`
--

INSERT INTO `clasifications` (`id`, `clasification`, `description`, `age`) VALUES
(1, 'AA', 'Todo publico', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificationsmovie`
--

CREATE TABLE `clasificationsmovie` (
  `id` int(11) NOT NULL,
  `clasification` int(11) NOT NULL,
  `movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Daniel Martinez', 'Dan@gmail.es', 'Curacao'),
(4, 'Manuel Gonzalez', 'manue@gmail.com', 'Elaniin'),
(5, 'Alejandro', 'alexgve7@gmail.com', 'Walmart'),
(6, 'Leche', 'gaby@gmail.com', 'Leche industries');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` double(5,2) NOT NULL,
  `id_car` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_movie`, `count`, `price`, `id_car`, `date`) VALUES
(3, 28, 2, 5.00, 4, '2019-07-05'),
(4, 28, 7, 10.00, 5, '2019-07-05'),
(5, 26, 2, 8.00, 5, '2019-07-05'),
(6, 25, 1, 10.00, 5, '2019-07-05'),
(7, 25, 2, 20.00, 6, '2019-07-05'),
(8, 26, 2, 16.00, 7, '2019-07-06'),
(9, 28, 1, 5.00, 7, '2019-07-06'),
(10, 25, 2, 20.00, 8, '2019-07-06'),
(11, 25, 1, 10.00, 9, '2019-07-06'),
(12, 26, 1, 8.00, 10, '2019-07-06'),
(13, 26, 1, 8.00, 11, '2019-07-06'),
(14, 26, 1, 8.00, 12, '2019-07-06'),
(15, 25, 1, 10.00, 13, '2019-07-06'),
(16, 25, 1, 10.00, 14, '2019-07-06'),
(17, 26, 1, 8.00, 15, '2019-07-06'),
(18, 25, 1, 10.00, 16, '2019-07-06'),
(19, 26, 2, 16.00, 17, '2019-07-10'),
(20, 25, 2, 20.00, 18, '2019-07-10'),
(21, 26, 2, 16.00, 19, '2019-07-10'),
(22, 25, 1, 10.00, 19, '2019-07-10'),
(23, 26, 2, 16.00, 20, '2019-07-11'),
(24, 25, 2, 20.00, 21, '2019-07-11'),
(25, 25, 3, 20.00, 22, '2019-07-11'),
(26, 29, 2, 18.00, 22, '2019-07-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `movies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `favorites`
--

INSERT INTO `favorites` (`id`, `user`, `movies`) VALUES
(36, 5, 26),
(41, 3, 26),
(43, 3, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `gender` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`id`, `gender`, `cover`) VALUES
(73, 'Miedo', '5cd62c4b84db3.jpg'),
(74, 'Accion', '5cd62c5589683.jpg'),
(75, 'Aventura', '5cd62c661108e.jpeg'),
(76, 'Ciencia Ficción', '5cd9d786eccc7.jpg');

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
(7, 74, 25),
(9, 74, 26),
(10, 73, 28),
(11, 74, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `membership` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `price` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moviecomments`
--

CREATE TABLE `moviecomments` (
  `id` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `moviecomments`
--

INSERT INTO `moviecomments` (`id`, `id_movie`, `id_user`, `comment`) VALUES
(40, 25, 3, 'Hola jaja xd'),
(41, 25, 3, 'Ceroteeeees'),
(43, 25, 3, 'Pendejooo xd\r\n'),
(44, 26, 3, 'Pendejos :v\r\n'),
(45, 26, 4, 'JAJAJA xd\r\n'),
(47, 26, 3, 'Hola :v'),
(48, 26, 3, 'sasad');

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
  `customer` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `name`, `sinopsis`, `time`, `cover`, `year`, `trailer`, `price`, `count`, `customer`, `likes`) VALUES
(25, 'Hangover', 'Una pelicula de locos ', '01:05:15', '5cda4dab3a455.jpg', 2014, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6Htn1x-_-is\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 10.00, 55, 2, 0),
(26, 'Avengers', 'Los vengadores más poderosos del mundo', '05:32:04', '5ce076f7c212e.jpeg', 2012, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FdSlm7GtTp8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 8.00, 0, 2, 0),
(28, 'IT', 'Miedo', '01:21:51', '5d18d0fe8fdbf.jpg', 2017, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3d_ACcf0rDc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5.00, 0, 4, 0),
(29, 'Capitana Marvel', 'Una mujer', '01:21:51', '5d196b63d10a5.jpeg', 2017, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/W1eYh59VzEs\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 18.00, 48, 5, 0),
(30, 'La leche ataca', 'una caja de leche ataca a la ciudad', '01:21:51', '5d1cb5941597c.jpg', 2017, '<iframe></iframe>', 10.00, 20, 4, 0),
(31, 'La leche ataca 2', 'La leche se levanto', '01:21:51', '5d1cb66f20344.jpg', 2010, '<iframe></iframe>', 10.00, 20, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(0, 'Administrador'),
(1, 'Super');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shopstatus`
--

CREATE TABLE `shopstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `shopstatus`
--

INSERT INTO `shopstatus` (`id`, `status`) VALUES
(0, 'Pendiente'),
(1, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(0, 'Activo'),
(1, 'Inactivo'),
(2, 'Bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_admins`
--

CREATE TABLE `status_admins` (
  `id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `upassword` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `membership` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `uname`, `lastname`, `email`, `username`, `upassword`, `membership`) VALUES
(3, 'Alejandro', 'Gonzalez', 'alexgve7@gmail.com', 'Alexgve7', '$2y$10$IDaDNgrvKlwsgb6LVPhqDutQ.5XIvtVKPYMLceVo9ZlhU0M0.EYIW', NULL),
(4, 'Steven', 'Diaz Hernandez', 'Steven@gmail.com', 'StevenD', '$2y$10$5DyYQ5MnXLmCs//bdZXmeuxuoXufaz4KO.KVJzrFlclG48lBDrEIq', NULL),
(5, 'Manuel ', 'Gonzalez', 'man@gmail.com', 'ManGon7', '$2y$10$F8rKDFtkuZcPNHPO2g00pusYeqeJtRK/jmsXHsNPPFg4W3WUHxmUa', NULL),
(6, 'Sara Yamilet', 'Gonzalez', 'saragon_7@gmail.com', 'Sara7Gonzalez', '$2y$10$UWz4LBD75x2pCqj8invoqOwDlvXTGJY1wa0xgEBajobsbYeL3BIKO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_trusts`
--

CREATE TABLE `users_trusts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_trust` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_trusts`
--

INSERT INTO `users_trusts` (`id`, `id_user`, `id_user_trust`) VALUES
(4, 16, 17),
(6, 18, 17),
(16, 18, 16);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `status` (`status`);

--
-- Indices de la tabla `answers_reset`
--
ALTER TABLE `answers_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `client` (`client`);

--
-- Indices de la tabla `clasifications`
--
ALTER TABLE `clasifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `clasification` (`clasification`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `enterprise` (`enterprise`);

--
-- Indices de la tabla `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_car` (`id_car`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `gender` (`movies`);

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
-- Indices de la tabla `moviecomments`
--
ALTER TABLE `moviecomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_movie` (`id_movie`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shopstatus`
--
ALTER TABLE `shopstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status_admins`
--
ALTER TABLE `status_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `membership` (`membership`);

--
-- Indices de la tabla `users_trusts`
--
ALTER TABLE `users_trusts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `users_trusts_ibfk_2` (`id_user_trust`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `actorsmovie`
--
ALTER TABLE `actorsmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `answers_reset`
--
ALTER TABLE `answers_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `binnacle`
--
ALTER TABLE `binnacle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clasifications`
--
ALTER TABLE `clasifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clasificationsmovie`
--
ALTER TABLE `clasificationsmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `gendersmovie`
--
ALTER TABLE `gendersmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `moviecomments`
--
ALTER TABLE `moviecomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `shopstatus`
--
ALTER TABLE `shopstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `status_admins`
--
ALTER TABLE `status_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users_trusts`
--
ALTER TABLE `users_trusts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `binnacle`
--
ALTER TABLE `binnacle`
  ADD CONSTRAINT `binnacle_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binnacle_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`status`) REFERENCES `shopstatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`client`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clasificationsmovie`
--
ALTER TABLE `clasificationsmovie`
  ADD CONSTRAINT `clasificationsmovie_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clasificationsmovie_ibfk_2` FOREIGN KEY (`clasification`) REFERENCES `clasifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`movies`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gendersmovie`
--
ALTER TABLE `gendersmovie`
  ADD CONSTRAINT `gendersmovie_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gendersmovie_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `moviecomments`
--
ALTER TABLE `moviecomments`
  ADD CONSTRAINT `moviecomments_ibfk_1` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moviecomments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`membership`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_trusts`
--
ALTER TABLE `users_trusts`
  ADD CONSTRAINT `users_trusts_ibfk_2` FOREIGN KEY (`id_user_trust`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
