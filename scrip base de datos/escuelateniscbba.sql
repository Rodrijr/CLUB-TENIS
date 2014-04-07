-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2014 a las 10:56:24
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
-- Estructura de tabla para la tabla `alumno_horario`
--

DROP TABLE IF EXISTS `alumno_horario`;
CREATE TABLE IF NOT EXISTS `alumno_horario` (
  `id_horario` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`,`id_alumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `alumno_horario`
--

INSERT INTO `alumno_horario` (`id_horario`, `id_alumno`) VALUES
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
(9, 10),
(10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_entrenador` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre_grupo`, `id_entrenador`) VALUES
(1, 'Grupo 1', 1),
(2, 'Grupo 1', 3),
(3, 'Grupo 2', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `horario` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `horario`, `id_grupo`) VALUES
(1, '7:00 - 8:00', 1),
(2, '8:00 - 9:00', 1),
(3, '10:00 - 11:00', 1),
(4, '15:00 - 16:00', 2),
(5, '16:00 - 17:00', 2),
(6, '18:00 - 19:00', 2),
(7, '7:00 - 8:00', 3),
(8, '8:00 - 9:00', 3),
(9, '9:00 - 10:00', 3),
(10, '10:00 - 11:00', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `ci_persona`, `nombre_persona`, `apellido_persona`, `telefono`, `direccion`, `email`, `tipo`) VALUES
(1, '1234567', 'Daniel', 'Campos Peredo', '12345678', 'direccion entrenador 1', '', 'Entrenador'),
(3, '1234567', 'Dominic', 'Araoz Mendizabal', '87654321', 'direccion entrenador 2', '', 'Entrenador'),
(4, '4564564', 'alumno 1', 'apellido alumno 1', '12312312', 'direccion aumno 1', '', 'Alumno'),
(6, '1324564', 'alumno 2', 'apellido alumno 2', '12314562', 'direccion aumno 2', '', 'Alumno'),
(8, '123', 'padre 1', 'apellido padre 1', '1234123412', 'qwedqwed', '1adscasdcad', 'Padre'),
(9, '13241', 'padre2', 'apellido padre 2', '1234123412', 'qwedqwed', '1adscasdcad', 'Padre'),
(10, '12365', 'dewqdawe', 'dsdsd', '1234123423', 'qwedqwed', 'asdcasdcasd', 'Alumno'),
(11, '2345234', 'WERFW', 'FWERF', '234523452', 'FWERFWERFW', 'FVSDFVSFDV', 'Padre'),
(12, '5234524', 'secretaria 1', 'apellidos secretaria 1', '412341234', 'sdfasdfsadfafd', '1adscasdcad', 'Secretaria'),
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
(26, '4523452', 'Marco', 'Potter', '34624645', 'Cruce taquinia', 'mary@hotmail.com', 'Alumno');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_persona`, `login`, `password`) VALUES
(1, 'entrenador', 'entrenador123'),
(10, 'alumno', 'alumno123'),
(9, 'padre', 'padre123'),
(12, 'secretaria', 'secretaria123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
