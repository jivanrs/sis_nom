-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2014 a las 23:46:15
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema_nomina`
--
CREATE DATABASE IF NOT EXISTS `dbpagos` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `dbpagos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Depto` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idDepartamento`),
  UNIQUE KEY `idDepartamento_UNIQUE` (`idDepartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `Nombre_Depto`) VALUES
(1, 'Desarrollo'),
(2, 'Contenido'),
(3, 'Diseño'),
(4, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `emp_idDeparameto_FK` int(11) NOT NULL COMMENT '					',
  `emp_idEmpresa_FK` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Puesto` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Celular` int(11) NOT NULL,
  `Extension` int(11) DEFAULT NULL,
  `Email` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Banco` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Cta_Bancaria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `CLABE_Bancaria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `SueldoBase` int(11) NOT NULL COMMENT 'Sueldo de Semana o Quincena',
  `emp_idTipoPeriodo_FK` int(11) NOT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEmpleado`),
  UNIQUE KEY `idEmpleado_UNIQUE` (`idEmpleado`,`emp_idDeparameto_FK`),
  KEY `idDepartamento_FK_idx` (`emp_idDeparameto_FK`),
  KEY `idEmpresa_FK_idx` (`emp_idEmpresa_FK`),
  KEY `idTipoPeriodo_FK_idx` (`emp_idTipoPeriodo_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `emp_idDeparameto_FK`, `emp_idEmpresa_FK`, `Nombre`, `Direccion`, `Puesto`, `Telefono`, `Celular`, `Extension`, `Email`, `Banco`, `Cta_Bancaria`, `CLABE_Bancaria`, `SueldoBase`, `emp_idTipoPeriodo_FK`, `Activo`) VALUES
(1, 1, 1, 'Jurgen Feuchter Garcia', 'Holanda 2920 Col. del Carmen Monterrey Nuvo Leon', 'Practicante Desarrollador Web', 83337260, 2147483647, 15, 'jfeuchter@gmail.com', 'Banorte', '2345134513', '23513412351234', 10000, 2, 1),
(2, 1, 1, 'Juan Cabral', 'Por aculla', 'Desarrollador', 82314114, 812345123, 16, 'juan.cabral@daniloblack.com.mx', 'Banorte', '124512', '41345135', 40000, 1, 1),
(3, 4, 1, 'Ivan ', 'Por aqui', 'Project Manager', 81234512, 1245124512, 123, 'ivan@daniloblack.com', 'Banorte', '12451245', '12512351', 20000, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Empresa` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idEmpresa`),
  UNIQUE KEY `idEmpresa_UNIQUE` (`idEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `Nombre_Empresa`) VALUES
(1, 'DaniloBlack'),
(2, 'DBDigital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `idPagos` int(11) NOT NULL AUTO_INCREMENT,
  `Pago` double NOT NULL,
  `FechaDePago` date NOT NULL,
  `pag_idEmpleado_FK` int(11) NOT NULL,
  `pag_idEmpresa_FK` int(11) NOT NULL,
  `pag_idDepartamento_FK` int(11) NOT NULL,
  `pag_idPeriodo_FK` int(11) NOT NULL,
  `PagoEspecial` tinyint(1) NOT NULL DEFAULT '0',
  `pag_idRecibos_FK` int(11) NOT NULL,
  PRIMARY KEY (`idPagos`),
  UNIQUE KEY `idPagos_UNIQUE` (`idPagos`),
  KEY `idEmpleado_FK_idx` (`pag_idEmpleado_FK`),
  KEY `idEmpresa_FK_idx` (`pag_idEmpresa_FK`),
  KEY `idDepartamento_Fk_idx` (`pag_idDepartamento_FK`),
  KEY `idPeriodo_FK_idx` (`pag_idPeriodo_FK`),
  KEY `idRecibos_FK_idx` (`pag_idRecibos_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idPagos`, `Pago`, `FechaDePago`, `pag_idEmpleado_FK`, `pag_idEmpresa_FK`, `pag_idDepartamento_FK`, `pag_idPeriodo_FK`, `PagoEspecial`, `pag_idRecibos_FK`) VALUES
(1, 5000, '2014-05-30', 1, 1, 1, 1, 0, 3),
(2, 5000, '2014-05-30', 1, 1, 1, 2, 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
  `idPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `Periodo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `per_idTipoPeriodo_FK` int(11) NOT NULL,
  PRIMARY KEY (`idPeriodo`),
  UNIQUE KEY `idPeriodo_UNIQUE` (`idPeriodo`),
  KEY `idTipoPeriodo_FK_idx` (`per_idTipoPeriodo_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idPeriodo`, `Periodo`, `per_idTipoPeriodo_FK`) VALUES
(1, 'Primera Quincena', 1),
(2, 'Segunda Quincena', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE IF NOT EXISTS `recibos` (
  `idRecibos` int(11) NOT NULL AUTO_INCREMENT,
  `FechaDeRecibo` date NOT NULL,
  `rec_idPeriodo_FK` int(11) NOT NULL,
  `rec_idEmpleado_FK` int(11) NOT NULL,
  `PorPagar` int(11) NOT NULL,
  PRIMARY KEY (`idRecibos`),
  UNIQUE KEY `idRecibos_UNIQUE` (`idRecibos`),
  KEY `rec_idEmpleado_FK` (`rec_idEmpleado_FK`),
  KEY `rec_idPeriodo_FK` (`rec_idPeriodo_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`idRecibos`, `FechaDeRecibo`, `rec_idPeriodo_FK`, `rec_idEmpleado_FK`, `PorPagar`) VALUES
(3, '2014-05-01', 1, 1, 0),
(4, '2014-05-30', 2, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoperiodo`
--

CREATE TABLE IF NOT EXISTS `tipoperiodo` (
  `idTipoPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `TipoPeriodo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idTipoPeriodo`),
  UNIQUE KEY `idTipoPeriodo_UNIQUE` (`idTipoPeriodo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipoperiodo`
--

INSERT INTO `tipoperiodo` (`idTipoPeriodo`, `TipoPeriodo`) VALUES
(1, 'Quincenal'),
(2, 'Semanal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `remember_token` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Nombre`, `Usuario`, `password`, `Admin`, `remember_token`) VALUES
(2, 'Jurgen Feuchter Garcia', 'jfeuchter', '$2y$10$Ob9h0hMwSaXv9f75Huqpuue99UCwooELEw1iaEArjepb5DDk3VWIO', 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `emp_idDepartamento_FK` FOREIGN KEY (`emp_idDeparameto_FK`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_idEmpresa_FK` FOREIGN KEY (`emp_idEmpresa_FK`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_idTipoPeriodo_FK` FOREIGN KEY (`emp_idTipoPeriodo_FK`) REFERENCES `tipoperiodo` (`idTipoPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pag_idDepartamento_FK` FOREIGN KEY (`pag_idDepartamento_FK`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pag_idEmpleado_FK` FOREIGN KEY (`pag_idEmpleado_FK`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pag_idEmpresa_FK` FOREIGN KEY (`pag_idEmpresa_FK`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pag_idPeriodo_FK` FOREIGN KEY (`pag_idPeriodo_FK`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pag_idRecibos_FK` FOREIGN KEY (`pag_idRecibos_FK`) REFERENCES `recibos` (`idRecibos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `per_idTipoPeriodo_FK` FOREIGN KEY (`per_idTipoPeriodo_FK`) REFERENCES `tipoperiodo` (`idTipoPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD CONSTRAINT `rec_idEmpleado_FK` FOREIGN KEY (`rec_idEmpleado_FK`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rec_idPeriodo_FK` FOREIGN KEY (`rec_idPeriodo_FK`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
