-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-10-2015 a las 22:21:12
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `projectIS`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`commentID`, `description`, `userID`, `date`, `projectID`) VALUES
(1, 'Hey que cool este proyecto', 1, '2015-09-14 17:00:26', 1),
(2, 'Pues verás este proyecto surgió con la idea de ayudar a niños recién nacidos, y ha sido muy agotador trabajar en él', 2, '2015-09-14 17:20:17', 1),
(3, 'Que genial se ve esto.... puedo participar en este proyecto?', 3, '2015-10-26 15:20:08', 4),
(4, 'No entiendo bien esto, creo que deberian eficientar los procesos de este proyecto...', 2, '2015-10-26 15:20:08', 5),
(5, 'Hola :D', 2, '2015-10-26 15:20:08', 2),
(6, 'Como estas :P', 1, '2015-10-26 15:20:08', 2),
(7, 'Vaya esto es algo serio, quieren que les esplique como funciona!', 3, '2015-10-26 15:20:08', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contributors`
--

CREATE TABLE IF NOT EXISTS `contributors` (
  `contributorID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contributors`
--

INSERT INTO `contributors` (`contributorID`, `userID`, `projectID`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likesComments`
--

CREATE TABLE IF NOT EXISTS `likesComments` (
  `likeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likesComments`
--

INSERT INTO `likesComments` (`likeID`, `userID`, `commentID`) VALUES
(1, 2, 2),
(2, 1, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likesProjects`
--

CREATE TABLE IF NOT EXISTS `likesProjects` (
  `likeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likesProjects`
--

INSERT INTO `likesProjects` (`likeID`, `userID`, `projectID`) VALUES
(1, 1, 1),
(2, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectID` int(11) NOT NULL,
  `projectName` varchar(100) NOT NULL,
  `userID` int(11) NOT NULL,
  `viewed` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`projectID`, `projectName`, `userID`, `viewed`, `url`, `description`) VALUES
(1, 'Angelitos', 2, 4, 'https://github.com/hllanosp/Angelitos', 'Sistema de Gestion y Administracion de Neonatos Fundacion Angelitos Hospital Escuela'),
(2, 'Cesamo Amapala', 1, 2, 'https://github.com/darioaplicano/cesamo_Amapala.git', 'systems engineering project'),
(4, 'proyectIS\r\n', 2, 2, 'https://github.com/hllanosp/proyectIS', 'Comunidad de software y proyectos de vinculacion '),
(5, 'proyecto-ciencias-juridicas', 2, 2, 'https://github.com/hllanosp/proyecto-ciencias-juridicas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `surNames` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userID`, `names`, `surNames`, `userName`, `email`, `creationDate`, `modifiedDate`, `password`) VALUES
(1, 'Alex Dario', 'Flores Aplicano', 'darioaplicano', 'alex_dario92@hotmail.com', '2015-09-13 22:18:22', '2015-09-13 22:18:22', ''),
(2, 'Hector Eulises', 'Llanos Pineda', 'hllanos', 'hllanos75@gmail.com', '2015-09-13 22:18:50', '2015-09-13 22:18:50', ''),
(3, 'Arle', 'Andino Reyes', 'arleandino', 'arle.andino@unah.hn', '2015-09-19 20:33:06', '2015-09-19 20:33:06', 'Arle1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD UNIQUE KEY `commentID` (`commentID`);

--
-- Indices de la tabla `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`contributorID`);

--
-- Indices de la tabla `likesComments`
--
ALTER TABLE `likesComments`
  ADD PRIMARY KEY (`likeID`);

--
-- Indices de la tabla `likesProjects`
--
ALTER TABLE `likesProjects`
  ADD PRIMARY KEY (`likeID`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `userID` (`userID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `contributors`
--
ALTER TABLE `contributors`
  MODIFY `contributorID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `likesComments`
--
ALTER TABLE `likesComments`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `likesProjects`
--
ALTER TABLE `likesProjects`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
