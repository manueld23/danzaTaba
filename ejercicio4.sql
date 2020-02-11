-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2019 a las 22:43:10
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apPaterno` varchar(100) DEFAULT NULL,
  `apMaterno` varchar(100) DEFAULT NULL,
  `disciplina` varchar(120) DEFAULT NULL,
  `maestro` varchar(200) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apPaterno`, `apMaterno`, `disciplina`, `maestro`, `numero`) VALUES
(1, 'Manuel', 'De Los Santos', 'Jimenez', 'Hip hop', 'Silvia Hernandez Flores', '2721462111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `imagen` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `card`
--

INSERT INTO `card` (`id`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'hip hop', 'This is a wider card with supporting', '1571263700_hiphop.jpg'),
(2, 'Card', 'en la semana de la cultura se logro el reconocimiento de el mejor baile tradicional', 'trofeo.jpg'),
(6, 'hola', 'hola que tal', '1571091015_avatar.jpeg'),
(9, 'hip hop', 'This is a wider card with supporting text below as a natural lead-in to additional content', '1571094042_baile.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel1`
--

CREATE TABLE `carrusel1` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `numerodos` varchar(20) DEFAULT NULL,
  `subtitulo` varchar(10) DEFAULT NULL,
  `subdos` varchar(15) DEFAULT NULL,
  `imagen` varchar(90) DEFAULT NULL,
  `tituloC` varchar(100) DEFAULT NULL,
  `numeroC` varchar(100) DEFAULT NULL,
  `numeroDC` varchar(100) DEFAULT NULL,
  `subtituloC` varchar(100) DEFAULT NULL,
  `subdosC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrusel1`
--

INSERT INTO `carrusel1` (`id`, `titulo`, `numero`, `numerodos`, `subtitulo`, `subdos`, `imagen`, `tituloC`, `numeroC`, `numeroDC`, `subtituloC`, `subdosC`) VALUES
(1, 'Doral', '78345', '204', 'Mount', 'Olive Road Two', '1570832533_danza14.jpg', 'blue', 'blue', 'blue', 'blue', 'blue'),
(2, 'Doral, Florida', '78345', '204', 'Mount', 'Olive Road Two', '1569542490_LA-NATURALEZA-02-INED21.jpg', 'red', 'red', 'red', 'red', 'red'),
(3, 'Doral, Florida', '78345', '204', 'Mount', 'Olive Road Two', '1570145570_slide-2.jpg', 'green', 'green', 'green', 'green', 'green'),
(4, 'Doral, Florida', '78345', '204', 'Mount', 'Olive Road Two', '1570221968_danza11.jpeg', 'orange', 'orange', 'orange', 'orange', 'orange'),
(6, 'Doral florida', 'a', 'b', 'c', 'd', '1572570920_fondo.jpeg', '#0000FF', 'red', 'green', 'orange', 'violet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel2`
--

CREATE TABLE `carrusel2` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `imagen` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrusel2`
--

INSERT INTO `carrusel2` (`id`, `titulo`, `imagen`) VALUES
(1, 'danza arabe', '1569620221_danza11.jpeg'),
(2, 'danza', 'danza.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `disciplina` varchar(50) DEFAULT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `imagen` varchar(130) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `disciplina`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'arabe', 'Danza arabe', 'La danza del vientre, danza egipcia o correctamente llamada danza oriental, es la evolución escénica de diversas danzas antiguas tradicionales de Oriente Próximo, junto con otras del Norte de África y Grecia.', '1572398111_baile.jpg'),
(2, 'hiphop', 'Hip hop', 'El hip hop? es una cultura originada en el sur del Bronx y Harlem, en la ciudad de Nueva York, entre jóvenes afroamericanos e puertorriqueños en Estados Unidos durante la década de 1970.', '1572398180_hiphop.jpg'),
(3, 'egipcia', 'Danza egipcia', 'danza egipcia', '1572470440_egipcio.jpg'),
(5, 'ballet', 'Ballet', 'ballet', '1572473084_danza13.jpeg'),
(6, 'salsa', 'Salsa', 'salsa', '1572562374_danza12.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jazz`
--

CREATE TABLE `jazz` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `subtitulo` varchar(30) DEFAULT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) DEFAULT NULL,
  `disciplina` varchar(120) DEFAULT NULL,
  `biografia` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `nombre`, `disciplina`, `biografia`) VALUES
(1, 'Anita', 'danza arabe', 'soy una maestra muy buena en el area de danza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(90) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `video2` varchar(200) DEFAULT NULL,
  `video3` varchar(200) DEFAULT NULL,
  `video4` varchar(200) DEFAULT NULL,
  `video5` varchar(200) DEFAULT NULL,
  `video6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `descripcion`, `video`, `nombre`, `video2`, `video3`, `video4`, `video5`, `video6`) VALUES
(1, 'Danza arabe', 'es una baile moderno', 'https://www.youtube.com/embed/NQmuBuf-QWU', 'arabe', 'https://www.youtube.com/embed/ZDPefcAvTOw', 'https://www.youtube.com/embed/SFGoIQtmjyM', 'https://www.youtube.com/embed/ZDPefcAvTOw', '', ''),
(2, 'hip hop', 'baile', 'https://www.youtube.com/embed/u32xZqgNOPw', 'hiphop', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrusel1`
--
ALTER TABLE `carrusel1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrusel2`
--
ALTER TABLE `carrusel2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jazz`
--
ALTER TABLE `jazz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `carrusel1`
--
ALTER TABLE `carrusel1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carrusel2`
--
ALTER TABLE `carrusel2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `jazz`
--
ALTER TABLE `jazz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
