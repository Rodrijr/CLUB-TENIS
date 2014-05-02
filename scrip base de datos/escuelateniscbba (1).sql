-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-04-2014 a las 00:40:55
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `escuelateniscbba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_horario`
--

CREATE TABLE IF NOT EXISTS `alumno_horario` (
  `id_grupo` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`,`id_alumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `alumno_horario`
--

INSERT INTO `alumno_horario` (`id_grupo`, `id_alumno`) VALUES
(0, 21),
(1, 17),
(1, 26),
(2, 18),
(2, 19),
(2, 20),
(3, 22),
(3, 23),
(4, 16),
(4, 24),
(4, 25),
(5, 15),
(6, 14),
(7, 13),
(8, 4),
(10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_personal`
--

CREATE TABLE IF NOT EXISTS `evaluacion_personal` (
  `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `comportamiendo` text COLLATE latin1_spanish_ci NOT NULL,
  `entrega` text COLLATE latin1_spanish_ci NOT NULL,
  `actitud_cancha` text COLLATE latin1_spanish_ci NOT NULL,
  `actitud_preparacion` text COLLATE latin1_spanish_ci NOT NULL,
  `asistencia` text COLLATE latin1_spanish_ci NOT NULL,
  `puntualidad` text COLLATE latin1_spanish_ci NOT NULL,
  `rendimiento_torneos` text COLLATE latin1_spanish_ci NOT NULL,
  `puntaje_total` text COLLATE latin1_spanish_ci NOT NULL,
  `id_entrenador` int(11) NOT NULL,
  `id_preparadorfisico` int(11) NOT NULL,
  `head_pro` int(11) NOT NULL,
  PRIMARY KEY (`id_evaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `horario` varchar(12) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre_grupo`, `horario`) VALUES
(1, 'Grupo 3', '12'),
(2, 'Grupo 1', '3'),
(3, 'Grupo 2', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `hora` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_entrenador` int(11) DEFAULT NULL,
  `tipo` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre_alumno`
--

CREATE TABLE IF NOT EXISTS `padre_alumno` (
  `id_padre_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_padre` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_padre_alumno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `padre_alumno`
--

INSERT INTO `padre_alumno` (`id_padre_alumno`, `id_padre`, `id_alumno`) VALUES
(1, 12, 4),
(2, 12, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int(10) NOT NULL AUTO_INCREMENT,
  `ci_persona` varchar(7) COLLATE latin1_spanish_ci NOT NULL COMMENT 'almacena el ci de la persona',
  `nombre_persona` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'alamacena el nombre de la persona',
  `apellido_persona` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'almacena los apellidos de la persona',
  `telefono` varchar(10) COLLATE latin1_spanish_ci NOT NULL COMMENT 'alamcena el telefono de las personas',
  `direccion` varchar(70) COLLATE latin1_spanish_ci NOT NULL COMMENT 'almacena la direccion de la persona',
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'es el email de la persona',
  `tipo` varchar(15) COLLATE latin1_spanish_ci NOT NULL COMMENT 'indica el tipo de acceso de la persona',
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `ci_persona`, `nombre_persona`, `apellido_persona`, `telefono`, `direccion`, `email`, `tipo`) VALUES
(3, '1234567', 'Daniel ', 'Miranda', '87654321', 'direccion entrenador 2', 'daniel@hotmail.com', 'Entrenador'),
(4, '4564564', 'Jaime', 'Blanco Pozo', '8689572', 'direccion aumno 1', '0', 'Alumno'),
(6, '9876541', 'Ramiro', 'Blanco Pozo', '12314562', 'direccion aumno 2', '0', 'Alumno'),
(9, '1324138', 'Gualberto', 'Escobar Mejia', '1234123412', 'av. america', 'gualberto_padre@hotmail.com', 'Padre'),
(12, '123456', 'Mariana', 'Soto Arce', '412341234', 'sdfasdfsadfafd', 'mariana_secreatria@hotmail.es', 'Secretaria'),
(13, '7456756', 'Leonardo', 'Mejia Pacheco', '442917438', 'Circunvalacion', 'leo@hotmail.com', 'Alumno'),
(14, '8463456', 'Jhonny Rodrigo', 'Blanco Pozo', '745674567', 'Villa lobos', 'rodri@hotmail.com', 'Alumno'),
(15, '4576467', 'Pablo', 'Otondo Alquizalet', '2643562345', 'America Norte', 'pablo@hotmail.com', 'Alumno'),
(16, '5685678', 'Sandra Isabel', 'Lara', '6756785678', 'Oquendo', 'sandy@hotmail.com', 'Alumno'),
(17, '5745674', 'Gary', 'Antoriaro Berrios', '5623452345', 'Capinota', 'gary@hotmail.com', 'Alumno'),
(18, '2345234', 'Jorge', 'Herrera Mendieta', '334653456', 'Final Atahuallpa', 'jorge@hotmail.com', 'Alumno'),
(19, '3874563', 'Mariela', 'Torrez Sejas', '4523466', 'Sacaba km 7', 'mary@hotmail.com', 'Alumno'),
(20, '5674567', 'Amanda', 'Lazo Arias', '45723455', '6 de Agosto', 'mary@hotmail.com', 'Alumno'),
(21, '5145784', 'Noelia', 'Morales Arce', '4856432534', 'Semapa', 'noe@hotmail.com', 'Alumno'),
(22, '3734566', 'Lorena ', 'Rivas Mendez', '6236234627', 'Cruce Taquinia', 'lola@hotmail.com', 'Alumno'),
(23, '5768734', 'Fabiola', 'Pedrazas Peredo', '5635463452', 'Calle Astiruas', 'mary@hotmail.com', 'Alumno'),
(24, '7856785', 'Daniela', 'Perez Paredez', '4673674567', 'Segunda Circunvalacion', 'mary@hotmail.com', 'Alumno'),
(25, '6785757', 'Miguel', 'Illanez Vargas', '3456345634', 'calle Sucre', 'miki@hotail.com', 'Alumno'),
(26, '4523452', 'Marco', 'Potter', '34624645', 'Cruce taquinia', 'mary@hotmail.com', 'Alumno'),
(33, '3134277', 'mariafernanda', 'jimenezperedo', '72211125', 'gghgghghghghghgcccccccccccccccccccccccbbbbbbbbbbbb', 'm@gmai.com', 'Padre'),
(35, '44444', 'enrique', 'arriaza', '434434', 'sfsff', 'cscc@gsgg.com', 'Entrenador'),
(45, '8689572', 'Jhonny Rodrigo', 'Blanco Pozo', '79785382', 'av .america', 'rodri_a_11@hotmail.es', 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_persona`, `login`, `password`) VALUES
(3, 'entrenador', 'entrenador123'),
(10, 'alumno', 'alumno123'),
(9, 'padre', 'padre123'),
(12, 'secretaria', 'secre123'),
(100, 'entrenador', 'entrenador123'),
(33, 'mariafer', 'mariafer123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
