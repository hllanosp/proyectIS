-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-09-2015 a las 04:50:25
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SELECT_COMMENT_BY_PROJECTID`(IN `projectID` INT(11))
    READS SQL DATA
    SQL SECURITY INVOKER
    COMMENT 'Selecciona todos los campos de comentarios según el proyecto'
SELECT 
	* 
FROM 
	comments 
WHERE 
	comments.projectID = projectID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SELECT_COMMENT_BY_USERID`(IN `userID` INT)
    READS SQL DATA
    SQL SECURITY INVOKER
    COMMENT 'Selecciona todos los campos de comentarios según el usuario'
SELECT
*
FROM
comments
WHERE
comments.projectID = userID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SELECT_PROJECTS`()
    READS SQL DATA
    SQL SECURITY INVOKER
    COMMENT 'This procedure selects all fields in the table projects'
SELECT 
	* 
FROM 
	projects$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SELECT_USER_BY_EMAIL`(IN `email` VARCHAR(100))
    READS SQL DATA
    SQL SECURITY INVOKER
    COMMENT 'This procedure select all fields in the table user by email'
SELECT 
	* 
FROM 
	users 
WHERE 
	users.email = email$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SELECT_USER_BY_ID`(IN `userID` VARCHAR(100))
    NO SQL
    COMMENT 'This procedure select all fields in the table users by ID'
SELECT 
	* 
FROM 
	users 
WHERE 
	users.userID = userID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SELECT_USER_BY_USERNAME`(IN `userName` VARCHAR(50))
    READS SQL DATA
    SQL SECURITY INVOKER
    COMMENT 'This procedure select all fields in the table user by username'
SELECT 
	* 
FROM 
	users 
WHERE 
	users.userName = userName$$

DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`commentID`, `description`, `userID`, `date`, `projectID`) VALUES
(1, 'Hey que cool este proyecto', 1, '2015-09-14 17:00:26', 1),
(2, 'Pues verás este proyecto surgió con la idea de ayudar a niños recién nacidos y, ha sido muy agotador trabajar en él', 2, '2015-09-14 17:20:17', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`projectID`, `projectName`, `userID`, `viewed`, `url`, `description`) VALUES
(1, 'Angelitos', 2, 243, 'https://github.com/hllanosp/Angelitos', 'Sistema de Gestion y Administracion de Neonatos Fundacion Angelitos Hospital Escuela'),
(2, 'Cesamo Amapala', 1, 123, 'https://github.com/darioaplicano/cesamo_Amapala.git', 'systems engineering project');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userID`, `names`, `surNames`, `userName`, `email`, `creationDate`, `modifiedDate`, `password`) VALUES
(1, 'Alex Dario', 'Flores Aplicano', 'darioaplicano', 'alex_dario92@hotmail.com', '2015-09-13 22:18:22', '2015-09-13 22:18:22', ''),
(2, 'Hector Eulises', 'Llanos Pineda', 'hllanos', 'hllanos75@gmail.com', '2015-09-13 22:18:50', '2015-09-13 22:18:50', '');

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
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD UNIQUE KEY `userID` (`userID`);

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
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
