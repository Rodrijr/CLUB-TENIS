-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-04-2014 a las 15:38:57
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `escuelateniscbba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre_alumno`
--

DROP TABLE IF EXISTS `padre_alumno`;
CREATE TABLE IF NOT EXISTS `padre_alumno` (
  `id_padre_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_padre` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_padre_alumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `padre_alumno`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `ci_persona`, `nombre_persona`, `apellido_persona`, `telefono`, `direccion`, `email`, `tipo`) VALUES
(1, '1234567', 'entrenador1', 'apellido entrenador 1', '12345678', 'direccion entrenador 1', '', 'Entrenador'),
(3, '1234567', 'entrenador2', 'apellido3', '87654321', 'direccion entrenador 2', '', 'Entrenador'),
(4, '4564564', 'alumno 1', 'apellido alumno 1', '12312312', 'direccion aumno 1', '', 'Alumno'),
(6, '1324564', 'alumno 2', 'apellido alumno 2', '12314562', 'direccion aumno 2', '', 'Alumno'),
(8, '123', 'padre 1', 'apellido padre 1', '1234123412', 'qwedqwed', '1adscasdcad', 'Padre'),
(9, '13241', 'padre2', 'apellido padre 2', '1234123412', 'qwedqwed', '1adscasdcad', 'Padre'),
(10, '12365', 'dewqdawe', 'dsdsd', '1234123423', 'qwedqwed', 'asdcasdcasd', 'Padre'),
(11, '2345234', 'WERFW', 'FWERF', '234523452', 'FWERFWERFW', 'FVSDFVSFDV', 'Padre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_persona`, `login`, `password`) VALUES
(10, 'alumno', 'alumno123'),
(9, 'padre', 'padre123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
