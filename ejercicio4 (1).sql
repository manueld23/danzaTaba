-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-02-2020 a las 03:48:56
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
  `numero` varchar(15) DEFAULT NULL,
  `usuario` varchar(140) DEFAULT NULL,
  `contrasenia` varchar(120) DEFAULT NULL,
  `imagenUsuario` varchar(300) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apPaterno`, `apMaterno`, `disciplina`, `maestro`, `numero`, `usuario`, `contrasenia`, `imagenUsuario`, `correo`, `direccion`) VALUES
(1, 'Manuel', 'De Los Santos', 'Jimenez', 'Hip hop', 'Silvia Hernandez Flores', '2721462111', 'manuel', '1234', '1578954016_jose.jpeg', '', ''),
(2, 'Jose', 'Perez', 'Hernandez', 'salsa', 'silvia', '2722345678', 'jose', '123', '1578897974_jose.jpeg', NULL, NULL),
(3, 'katia', 'lopez', 'perez', '', '', '2721902312', 'katia', '1234', '1578897882_katia.jpeg', 'katia@gmail.com', 'felipe carrillo puerto col. nogales Nogales'),
(4, 'katia1', 'perez', 'perez', 'danza arabe', 'silvia', '2721234567', 'katia1', '1234', NULL, 'katia1@gmail.com', 'conocido'),
(9, 'pedro', 'lopez', 'perez', 'sin diciplina', 'sin maestro', 'pedro', 'pedro', '1234', 'avatar.jpeg', 'pedro@gmail.com', 'conocido'),
(10, 'Juan', 'Flores', 'Paz', 'sin diciplina', 'sin maestro', '2721234567', 'juan', '1234', 'avatar.jpeg', 'juan@gmail.com', 'conocido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bailes`
--

CREATE TABLE `bailes` (
  `id` int(11) DEFAULT NULL,
  `disciplina` varchar(500) DEFAULT NULL,
  `idDisciplinas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bailes`
--

INSERT INTO `bailes` (`id`, `disciplina`, `idDisciplinas`) VALUES
(1, 'Danza arabe', 1),
(4, 'Hip hop', 2),
(1, 'Hip hop', 2),
(2, 'Ballet', 5),
(9, 'Salsa', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barra`
--

CREATE TABLE `barra` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `icono` varchar(100) DEFAULT NULL,
  `seleccionado` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `barra`
--

INSERT INTO `barra` (`id`, `nombre`, `icono`, `seleccionado`) VALUES
(1, 'Menu', '1576780556_menu.png', ''),
(2, 'Buscador', '1576781544_icons8-glyph-pastel-64.png', ''),
(3, 'Herramientas', '1576186073_herramientas.png', ''),
(4, 'Notificacion', '1576186125_SinNotificacion.png', ''),
(5, 'Mensaje', '1576781237_icons8-mensaje-48.png', ''),
(6, 'Perfil', '1579738557_Perfil.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `imagen` varchar(90) DEFAULT NULL,
  `medalla` varchar(100) DEFAULT NULL,
  `tituloColor` varchar(100) DEFAULT NULL,
  `descripColor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `card`
--

INSERT INTO `card` (`id`, `titulo`, `descripcion`, `imagen`, `medalla`, `tituloColor`, `descripColor`) VALUES
(3, 'Danza egipcia', 'reconocimiento exitoso', '1575580496_baile.jpg', '1575580516_medalla.jpg', '#093fd9', '#813232'),
(4, 'Hip hop', 'reconocimiento', '1575580529_baile2.jpg', '', '#14adda', '#2f8901');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel1`
--

CREATE TABLE `carrusel1` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `numerodos` date DEFAULT NULL,
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
(1, 'Danza arabe', 'Orizaba', '2020-01-04', 'Festival d', 'Olive Road Two', '1579735174_disciplina6.jpg', 'blue', 'blue', 'blue', 'blue', 'blue'),
(2, 'Doral, Florida', '78345', '2020-01-11', 'Mount', 'Olive Road Two', '1579735233_disciplina7.jpg', 'red', 'red', 'red', 'red', 'red'),
(3, 'Doral, Florida', '78345', '2020-01-01', 'Mount', 'Olive Road Two', '1579735258_disciplina8.jpg', 'green', 'green', 'green', 'green', 'green'),
(4, 'Doral, Florida', '78345', '2020-01-19', 'Mount', 'Olive Road Two', '1579735282_disciplina4.jpg', 'orange', 'orange', 'orange', 'orange', 'orange'),
(6, 'Doral florida', 'Orizaba', '2020-01-04', 'Danza', 'Opcional', '1579738889_disciplina3.jpg', '#0000FF', 'red', 'violet', 'orange', 'violet');

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
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `menuColor` varchar(100) DEFAULT NULL,
  `barraColor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `menuColor`, `barraColor`) VALUES
(1, '#094951', '#16454e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `tema` varchar(300) DEFAULT NULL,
  `mensaje` varchar(300) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `autor` varchar(300) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `correo`, `tema`, `mensaje`, `estado`, `autor`, `fecha`) VALUES
(1, '146w0300@itszongolica.edu.mx', 'hola', 'pregunto por disciplinas', NULL, 'manuel', '2019-12-19 20:39:54'),
(2, '146w0300@itszongolica.edu.mx', 'hola', 'pregunto por disciplinas', NULL, 'manuel', '2019-12-19 20:46:22'),
(3, '146w0300@itszongolica.edu.mx', 'hola', 'disciplinas', NULL, 'manuel', '2019-12-19 22:23:44'),
(4, '146w0300@itszongolica.edu.mx', 'hola', 'disciplinas', NULL, 'manuel', '2019-12-19 22:38:12'),
(5, '146w0300@itszongolica.edu.mx', 'hola', 'disciplinas', NULL, 'manuel', '2019-12-19 23:16:21');

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
(1, 'arabe', 'Danza arabe', 'Descripción:\r\nDanza Árabe, Danza del Vientre, Danza Oriental, Bellydance; es conocida de distintas maneras, pero cualquiera que sea la manera en la que la conozcas, hace referencia a esta danza milenaria, que además de ser un baile hermoso, tiene diversos beneficios para las bailarinas que la practi', '1579732496_61020665_1879510282148549_5854494943657066496_n.jpg'),
(2, 'hiphop', 'Hip hop', 'El hip hop? es una cultura originada en el sur del Bronx y Harlem, en la ciudad de Nueva York, entre jóvenes afroamericanos e puertorriqueños en Estados Unidos durante la década de 1970.', '1572998978_30707282_1342345439198372_6270697001424257024_n.jpg'),
(3, 'egipcia', 'Danza egipcia', 'danza egipcia', '1572999126_60761264_1879522942147283_4579306620760096768_n.jpg'),
(5, 'ballet', 'Ballet', 'ballet', '1572999143_60851608_1879509468815297_4740735723949260800_n.jpg'),
(6, 'salsa', 'Salsa', 'La salsa es un género musical bailable resultante de la síntesis del son cubano y otros géneros de música caribeña, con el jazz y otros ritmos estadounidenses.', '1572999280_30724557_1342345662531683_6652039863371563008_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discipMaest`
--

CREATE TABLE `discipMaest` (
  `id` int(11) NOT NULL,
  `idDiscp` int(11) DEFAULT NULL,
  `idMaes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `discipMaest`
--

INSERT INTO `discipMaest` (`id`, `idDiscp`, `idMaes`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 6, 2);

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
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `idAlum` int(11) DEFAULT NULL,
  `idDisc` int(11) DEFAULT NULL,
  `falta` double DEFAULT NULL,
  `asistencia` double DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `idAlum`, `idDisc`, `falta`, `asistencia`, `fecha`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 4, 2, 0, 0, '2020-02-04'),
(3, 1, 2, NULL, 1, '2020-02-04'),
(4, 2, 5, NULL, NULL, '2020-02-05'),
(5, 9, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) DEFAULT NULL,
  `disciplina` varchar(120) DEFAULT NULL,
  `biografia` varchar(300) DEFAULT NULL,
  `usuario` varchar(90) DEFAULT NULL,
  `contrasenia` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `nombre`, `disciplina`, `biografia`, `usuario`, `contrasenia`) VALUES
(1, 'Anita', 'danza arabe', 'soy una maestra muy buena en el area de danza', 'anita', '1234'),
(2, 'Silvia Hernandez Flores', 'Hip hop', 'soy una maestra', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(90) DEFAULT NULL,
  `icono` varchar(180) DEFAULT NULL,
  `seleccionado` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `icono`, `seleccionado`) VALUES
(4, 'Home', '1576193801_Home.png', ''),
(5, 'Disciplinas', '1579738411_Disciplinas.png', ''),
(6, 'Compartenos', '1576194562_Compartenos.png', ''),
(7, 'Contacto', '1576196043_Contacto.png', ''),
(8, 'Maestros', '1576196315_Maestros.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) DEFAULT NULL,
  `idDisciplina` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `idAlumno`, `idDisciplina`, `pago`, `fecha`, `estado`) VALUES
(1, 1, 1, 1000, '2020-01-27', 1),
(2, 4, 2, 500, '2020-01-27', 1),
(3, 1, 2, 500, '2020-01-27', 1),
(4, 2, 5, 1000, '2020-01-28', 1),
(5, 9, 6, 300, '2020-01-31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redesSociales`
--

CREATE TABLE `redesSociales` (
  `id` int(11) NOT NULL,
  `url` varchar(300) DEFAULT NULL,
  `imagenSocial` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `redesSociales`
--

INSERT INTO `redesSociales` (`id`, `url`, `imagenSocial`) VALUES
(1, 'https://www.facebook.com/', '1579739077_facebook.png'),
(2, 'https://www.instagram.com/?hl=es-la', '1579039180_Instagram.ico');

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
  `video` varchar(5000) DEFAULT NULL,
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
(1, 'Danza arabe', 'es una baile moderno', 'https://www.youtube.com/embed/NQmuBuf-QWU, https://www.youtube.com/embed/zxor87E2ybA', 'arabe', 'https://www.youtube.com/embed/ZDPefcAvTOw', 'https://www.youtube.com/embed/SFGoIQtmjyM', 'https://www.youtube.com/embed/ZDPefcAvTOw', '', ''),
(2, 'hip hop', 'baile moderno aaaa', 'https://www.youtube.com/embed/u32xZqgNOPw', 'hiphop', 'https://www.youtube.com/embed/XNevNiJ7ogo', 'https://www.youtube.com/embed/uILyWHFG2uw', '', '', ''),
(4, 'Ballet', 'ballet', 'https://www.youtube.com/embed/BoKx7BTb0lI', 'ballet', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videosDisciplinas`
--

CREATE TABLE `videosDisciplinas` (
  `id` int(11) NOT NULL,
  `videosV` int(11) DEFAULT NULL,
  `videoUrl` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videosDisciplinas`
--

INSERT INTO `videosDisciplinas` (`id`, `videosV`, `videoUrl`) VALUES
(1, 2, 'https://www.youtube.com/embed/zYbWcefRWWo'),
(16, 4, 'https://www.youtube.com/embed/BoKx7BTb0lI'),
(17, 2, 'https://www.youtube.com/embed/BoKx7BTb0lI'),
(18, 2, 'https://www.youtube.com/embed/YtEWoavDlcM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `bailes`
--
ALTER TABLE `bailes`
  ADD KEY `id` (`id`),
  ADD KEY `idDisciplinas` (`idDisciplinas`);

--
-- Indices de la tabla `barra`
--
ALTER TABLE `barra`
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
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discipMaest`
--
ALTER TABLE `discipMaest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDiscp` (`idDiscp`),
  ADD KEY `idMaes` (`idMaes`);

--
-- Indices de la tabla `jazz`
--
ALTER TABLE `jazz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlum` (`idAlum`),
  ADD KEY `idDisc` (`idDisc`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumno` (`idAlumno`),
  ADD KEY `idDisciplina` (`idDisciplina`);

--
-- Indices de la tabla `redesSociales`
--
ALTER TABLE `redesSociales`
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
-- Indices de la tabla `videosDisciplinas`
--
ALTER TABLE `videosDisciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videosV` (`videosV`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `barra`
--
ALTER TABLE `barra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `discipMaest`
--
ALTER TABLE `discipMaest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jazz`
--
ALTER TABLE `jazz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `redesSociales`
--
ALTER TABLE `redesSociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `videosDisciplinas`
--
ALTER TABLE `videosDisciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `discipMaest`
--
ALTER TABLE `discipMaest`
  ADD CONSTRAINT `discipMaest_ibfk_1` FOREIGN KEY (`idDiscp`) REFERENCES `disciplinas` (`id`),
  ADD CONSTRAINT `discipMaest_ibfk_2` FOREIGN KEY (`idMaes`) REFERENCES `maestros` (`id`);

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`idAlum`) REFERENCES `bailes` (`id`),
  ADD CONSTRAINT `listas_ibfk_2` FOREIGN KEY (`idDisc`) REFERENCES `bailes` (`idDisciplinas`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplinas` (`id`);

--
-- Filtros para la tabla `videosDisciplinas`
--
ALTER TABLE `videosDisciplinas`
  ADD CONSTRAINT `tbl_videoDisciplina` FOREIGN KEY (`videosV`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
