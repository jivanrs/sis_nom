-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2014 a las 23:48:00
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
CREATE DATABASE IF NOT EXISTS `sistema_nomina` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `sistema_nomina`;

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
-- Estructura de tabla para la tabla `empadministradora`
--

CREATE TABLE IF NOT EXISTS `empadministradora` (
  `idEmpAdministradora` int(11) NOT NULL AUTO_INCREMENT,
  `EmpAdministradora` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `PorComision` int(11) NOT NULL,
  PRIMARY KEY (`idEmpAdministradora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empadministradora`
--

INSERT INTO `empadministradora` (`idEmpAdministradora`, `EmpAdministradora`, `PorComision`) VALUES
(1, 'Opcion 1', 5),
(2, 'Opcion 2', 6),
(3, 'Opcion 3', 7);

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
  `FechaDeIngreso` date NOT NULL,
  `Telefono` bigint(11) NOT NULL,
  `Celular` bigint(11) NOT NULL,
  `Extension` int(11) DEFAULT NULL,
  `Email` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Banco` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Cta_Bancaria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `CLABE_Bancaria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `SueldoBase` int(11) NOT NULL COMMENT 'Sueldo de Semana o Quincena',
  `emp_idTipoPeriodo_FK` int(11) NOT NULL,
  `emp_idEmpAdministradora_FK` int(11) NOT NULL DEFAULT '1',
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEmpleado`),
  UNIQUE KEY `idEmpleado_UNIQUE` (`idEmpleado`),
  KEY `idDepartamento_FK_idx` (`emp_idDeparameto_FK`),
  KEY `idEmpresa_FK_idx` (`emp_idEmpresa_FK`),
  KEY `idTipoPeriodo_FK_idx` (`emp_idTipoPeriodo_FK`),
  KEY `	emp_idEmpAdministradora_FK_idx` (`emp_idEmpAdministradora_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=126 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `emp_idDeparameto_FK`, `emp_idEmpresa_FK`, `Nombre`, `Direccion`, `Puesto`, `FechaDeIngreso`, `Telefono`, `Celular`, `Extension`, `Email`, `Banco`, `Cta_Bancaria`, `CLABE_Bancaria`, `SueldoBase`, `emp_idTipoPeriodo_FK`, `emp_idEmpAdministradora_FK`, `Activo`) VALUES
(1, 1, 1, 'Jurgen Feuchter Garcia', 'Holanda 2920 Col. del Carmen Monterrey Nuvo Leon', 'Practicante Desarrollador Web', '0000-00-00', 83337260, 2147483647, 15, 'jfeuchter@gmail.com', 'Banorte', '2345134513', '23513412351234', 10000, 1, 1, 1),
(2, 1, 1, 'Juan Cabral', 'Por aculla', 'Desarrollador', '0000-00-00', 82314114, 812345123, 16, 'juan.cabral@daniloblack.com.mx', 'Banorte', '124512', '41345135', 40000, 1, 1, 1),
(3, 4, 1, 'Ivan ', 'Por aqui', 'Project Manager', '0000-00-00', 81234512, 1245124512, 123, 'ivan@daniloblack.com', 'Banorte', '12451245', '12512351', 20000, 1, 1, 1),
(65, 1, 3, 'Alejandra Perez Elizondo', 'Duraznillo No. 807, Col. Encinos del Vergel, Monterrey, Nuevo Leon, CP 64000', 'Gerente de Mercadotecnia', '0000-00-00', 83638076, 8112664622, 5001, 'alejandra@daniloblack.com', 'Banorte', '869337028', 'NA', 10, 1, 1, 1),
(66, 1, 2, 'Alejandro Carrillo Aguilar', 'Camino de las Aguilas No. 509, Col. San Jeronimo, Monterrey, Nuevo Leon, CP 64630', 'Practicante de Contabilidad', '0000-00-00', 81737000, 8181851402, 0, 'acarrillo@daniloblack.com.mx', 'Banorte', '?0881685383', 'NA', 5, 1, 1, 1),
(67, 1, 3, 'Andres Guzman Muro', 'Alejandro Dumas No. 200, Col. Colinas de San Jeronimo, Monterrey, Nuevo Leon, CP 64630', 'Programador Sr', '0000-00-00', 81737000, 8110442856, 7064, 'andres@daniloblack.com', 'Banorte', '869225862', 'NA', 10, 1, 1, 1),
(68, 1, 1, 'Alonso Benito Ruiz Balleza', 'Coru?a No. 241, Col. Bosques de las Cumbres, Monterrey, Nuevo Leon, CP 64619', 'Coordinador Administrativo', '0000-00-00', 81737000, 8117782640, 7040, 'bruiz@daniloblack.com', '', '', '', 10, 1, 1, 1),
(69, 1, 3, 'Claudia Veronica Chapa Montemayor', 'Tlalpan No. 104, Col. Satelite Acueducto, Monterrey, Nuevo Leon, CP 64938', 'Account Manager', '0000-00-00', 81737000, 8117782650, 7024, 'claudia@daniloblack.com', '', '', '', 5, 1, 1, 1),
(70, 1, 2, 'Cynthia Gonzalez Santiago', 'Catamarca No. 1325, Col. Residencial la Espa?ola, Monterrey, Nuevo Leon, CP 64820', 'Dise?ador Jr', '0000-00-00', 81737000, 8182109270, 7059, 'cynthia@daniloblack.com', 'Banorte', '?0899095277', 'NA', 5, 1, 1, 1),
(71, 1, 3, 'Daniel Eugenio Moreno Lopez', 'Rabindranath Tagore No. 1940, Col. Contry Sol, Guadalupe, Nuevo Leon, CP 67174', 'Programador Jr', '0000-00-00', 81737000, 8110801418, 0, 'daniel@daniloblack.com', 'Banorte', '?0225883103', 'NA', 15, 1, 1, 1),
(72, 1, 3, 'Edna Felissa Acu?a Cuevas', 'Jose Calasanz No. 123, Col. Capistrano, San Pedro Garza Garcia, Nuevo Leon, CP 66244', 'Coordinador de CXC', '0000-00-00', 81737000, 8117786905, 7053, 'edna@daniloblack.com', 'Banorte', '869222106', 'NA', 10, 1, 1, 1),
(73, 1, 2, 'Eduardo Ivan Villarreal Gomez', 'Senda Carpichosa No. 4448, Col. Villa las Fuentes, Monterrey, Nuevo Leon CP 64000', 'Practicante de Dise?o', '0000-00-00', 81737000, 0, 0, 'evillarreal@daniloblack.com.mx', 'Santander', 'NA', '?014580200067511741', 20, 1, 1, 1),
(74, 1, 3, 'Ella Maria Escalante Gonzalez', 'Washington No. 1400 Dpto. 818, Col. Centro, Monterrey, Nuevo Leon, CP 64000', 'Gerente de Proyectos', '0000-00-00', 81737000, 8182599826, 7055, 'ella@daniloblack.com', 'Banorte', '869236680', 'NA', 20, 1, 1, 1),
(75, 1, 1, 'Engler Eduardo Puentes Cornejo', 'Sevilla No. 104, Col. Satelite Acueducto, Monterrey, Nuevo Leon, CP 64979', 'Ejecutivo Comercial Sr', '0000-00-00', 83638076, 8113018770, 0, 'engler@daniloblack.com', 'Banorte', '517364464', 'NA', 5, 1, 1, 1),
(76, 1, 2, 'Erick Adrian Villarreal Garcia', 'Circuito Paris No. 203, Col. Privadas de Anahuac, Escobedo, Nuevo Leon, CP 66050', 'Practicante de Dise?o', '0000-00-00', 81737000, 8112120631, 0, 'erik@daniloblack.com.mx', 'Banorte', 'NA', '?072580008600126850', 10, 1, 1, 1),
(77, 1, 2, 'Esteban Castro Trejo', '16 de Septiembre No. 104 Int, 208, Col. Tampiquito, San Pedro Garza Garcia, Nuevo Leon, CP 64270', 'Editor Sr', '0000-00-00', 81737000, 8120015447, 7063, 'esteban@daniloblack.com', 'Banorte', '?0225880634', 'NA', 15, 1, 1, 1),
(78, 1, 2, 'Ezequiel Daniel Reyes Gutierrez', 'Anillo Periferico No. 319, Col. San Jeronimo, Monterrey, Nuevo Leon, CP 64630', 'Analista de Estrategia Digital', '0000-00-00', 83638076, 8115990502, 0, 'ezequiel@daniloblack.com', 'Banorte', '216236426', 'NA', 5, 1, 1, 1),
(79, 1, 1, 'Fernando Delgado Armendariz', 'Isauro Alfaro Otero No. 123, Col. Cooperativa Union del Noreste, Santa Catarina, Nuevo Leon, CP 6615', 'Chofer', '0000-00-00', 0, 8117544146, 0, 'NA', '', '', '', 5, 2, 1, 1),
(80, 1, 2, 'Gabriel Ponzio Madero', 'Hacienda del Valle No. 124, Col. Hacienda del Valle, San Pedro Garza Garcia, Nuevo Leon, CP 66256', 'Practicante de Mercadotecnia', '0000-00-00', 83638076, 8183968203, 0, 'gabriel@daniloblack.com', 'Santander', 'NA', '`14580200076672600', 15, 1, 1, 1),
(81, 1, 3, 'Hugo Antonio Mendoza Elizondo', 'Lluvia No. 709, Col. Serena Privada Contemporanea, Guadalupe, Nuevo Leon, CP 67129', 'Coordinador de Soporte Tecnico', '0000-00-00', 81737000, 8112127606, 7078, 'hugo@daniloblack.com', 'Banorte', '444085762', 'NA', 10, 1, 1, 1),
(82, 1, 2, 'Ileana Yannire Garcia Guerra', 'Praga No. 1221, Col. Bosques del Nogalar, San Nicolas de los Garza, Nuevo Leon, CP 66480', 'Practicante de Capital Humano', '0000-00-00', 81737000, 8114976065, 0, 'igarcia@daniloblack.com.mx', 'Banorte', '220276960', 'NA', 20, 1, 1, 1),
(83, 1, 3, 'Iliana Tamez Aguirre', 'Cumbre Inglesa No. 142, Col. Cumbres Madeira, Monterrey, Nuevo Leon, CP 64349', 'Consultor Sr de Estrategia Digital', '0000-00-00', 83638076, 8183623520, 0, 'iliana@daniloblack.com', 'Banorte', '219956145', 'NA', 5, 1, 1, 1),
(84, 1, 3, 'Jesus Ivan Rodriguez Silva', 'Huesca No. 218, Col. Aragones, Guadalupe, Nuevo Leon, CP 67124', 'Project Manager', '0000-00-00', 81737000, 8115556264, 7076, 'ivan@daniloblack.com', 'Banorte', '882690843', 'NA', 5, 1, 1, 1),
(85, 1, 3, 'Jessica Lissete Arevalo Cruz', 'Noche Buena No. 201, Col. Industrias del Vidrio, San Nicolas de los Garza, Nuevo Leon, CP 66470', 'Account Manager', '0000-00-00', 81737000, 8182599897, 7047, 'jessica@daniloblack.com', 'Banorte', '?0522014398', 'NA', 10, 1, 1, 1),
(86, 1, 3, 'Jorge Alberto Brice?o O?ate', 'De las Manciones No. 118, Col. Del Moral 2, Leon, Guanajuato, CP 37125', 'Director de Estrategia Digital', '0000-00-00', 83638076, 4772720526, 5003, 'jorge@daniloblack.com', 'Banorte', '532504861', 'NA', 15, 1, 1, 1),
(87, 1, 3, 'Juan Jose Guadalupe Cabral Gonzalez', 'Pintores No. 208, Col. Galerias de Camino Real, Guadalupe, Nuevo Leon, CP 67174', 'Programador Sr', '0000-00-00', 81737000, 8117782655, 7083, 'jcabral@daniloblack.com', 'Banorte', '869348613', 'NA', 5, 1, 1, 1),
(88, 1, 2, 'Jurgen Feuchter Garcia', 'Holanda No. 2920, Col. Del Carmen, Monterrey, Nuevo Leon, CP 64710', 'Practicante de Programacion', '0000-00-00', 81737000, 8182532808, 0, 'jurgen@daniloblack.com.mx', 'Banorte', 'NA', '?072580006743136466', 5, 1, 1, 1),
(89, 1, 3, 'Ana Kelyna Siliceo Cuevas', 'Insurgentes No. 2121 Int. 208, Col. Colinas de San Jeronimo, Monterrey, Nuevo Leon, CP 64630', 'Consultor Jr Estrategia Digital', '0000-00-00', 83638076, 8181681071, 0, 'kelyna@daniloblack.com', 'Banorte', '216240115', 'NA', 10, 1, 1, 1),
(90, 1, 3, 'Leonides Delgado Moya', 'Argos No. 1730, Col. Contry Lux, Monterrey, Nuevo Leon, CP 64845', 'Programador Sr', '0000-00-00', 81737000, 8110778895, 0, 'leonides@daniloblack.com', 'Banorte', '`0231734747', 'NA', 10, 1, 1, 1),
(91, 1, 2, 'Cristina Lizeth Martinez Torres', 'Cerro de las Cumbres No. 5161, Col. Valle de las Cumbres, Monterrey, Nuevo Leon, CP 67124', 'Recepcion', '0000-00-00', 81737000, 8181883093, 9300, 'coordinacion@daniloblack.com', 'Banorte', '884134211', 'NA', 15, 1, 1, 1),
(92, 1, 2, 'Elsa Lorena Hernandez Rodriguez', 'L. Urbina No. 1017, Col. Santa Cecilia, Apodaca, Nuevo Leon, CP 66636', 'Redactor', '0000-00-00', 81737000, 8184745717, 0, 'lorena@daniloblack.com', 'Banorte', '225877625', 'NA', 5, 1, 1, 1),
(93, 1, 3, 'Maria de Lourdes Vargas Trevi?o', 'Nogal No. 218, Col. Privada Valle Alto, Monterrey, Nuevo Leon, CP 64989', 'Account Manager', '0000-00-00', 81737000, 8184662824, 7085, 'lourdes@daniloblack.com', 'Banorte', '?0697797450', 'NA', 5, 1, 1, 1),
(94, 1, 3, 'Luis Gerardo Cabral Gonzalez', 'Florencia No. 1210 Col. Cumbre de San Agustin 3_ Sector, San Pedro Garza Garcia, Nuevo Leon, CP 6434', 'Consultor de E- Marketing', '0000-00-00', 81737000, 8117782651, 7082, 'lcabral@daniloblack.com', 'Banorte', '869345368', 'NA', 10, 1, 1, 1),
(95, 1, 2, 'Luis Sergio Hinojosa Cantu', 'Ave. Del Bosque No. 176, Col. Cuauhtemoc, San Nicolas de los Garza, Nuevo Leon, CP 66450', 'Dise?ador Jr', '0000-00-00', 81737000, 8111700454, 0, 'luiser@daniloblack.com', 'Banorte', '?0899381774', 'NA', 10, 1, 1, 1),
(96, 1, 3, 'Adrian Marcelo Gutierrez Corral', 'Camino Real No. 212, Col. Hacienda de San Agustin, San Pedro Garza Garcia, Nuevo Leon, CP 66276', 'Consultor Sr de Estrategia Digital', '0000-00-00', 83638076, 8182599681, 5004, 'marcelo@daniloblack.com', 'Banorte', '869235964', 'NA', 10, 1, 1, 1),
(97, 1, 1, 'Mariana de la Rosa Salazar', 'Llanos del Topo No. 704, Col. Hacienda los Ayala, Escobedo, Nuevo Leon, CP 66072', 'Limpieza', '0000-00-00', 0, 0, 0, 'NA', '', '', '', 20, 2, 1, 1),
(98, 1, 3, 'Mariano Gomez Gonzalez', 'Jesus Reyes No. 103 Int. 82, Col. Valle Oriente, San Pedro Garza Garcia, Nuevo Leon, CP 66269', 'Director de Operaciones', '0000-00-00', 83638076, 8114978138, 7033, 'mariano@daniloblack.com', 'Banorte', '194217514', 'NA', 5, 1, 1, 1),
(99, 1, 3, 'Martha Maria Madero Gonzalez', 'Laredo No. 222- A, Col. Lomas del Valle, San Pedro Garza Garcia, Nuevo Leon, CP 66256', 'Consultor Jr de TI', '0000-00-00', 83638076, 8110669025, 0, 'martha@daniloblack.com', 'Banorte', '886799306', 'NA', 15, 1, 1, 1),
(100, 1, 2, 'Mauricio Martinez Cortes', 'Antara No. 115, Col. Privada Residencial Antara, Monterrey, Nuevo Leon, CP 64938', 'Practicante de Contabilidad', '0000-00-00', 81737000, 8110519001, 0, 'mmartinez@daniloblack.com.mx', 'Banorte', 'NA', '?072580008749026714', 10, 1, 1, 1),
(101, 1, 3, 'Roman Mauricio Rangel Mariscal', 'Rio Orinoco No. 201 Int. 7, Col. Del Valle, San Pedro Garza Garcia, Nuevo Leon, CP 66220', 'Gerente Estrategico de Contenidos', '0000-00-00', 81737000, 8181619751, 7080, 'mrangel@daniloblack.com', 'Banorte', '869341445', 'NA', 10, 1, 1, 1),
(102, 1, 3, 'Michelle Rodriguez Cerda', 'Bosques del Pedregal No. 2519, Col. Bosques de la Pastora, Guadalupe, Nuevo Leon, CP 67176', 'Coordinadora de Project Management', '0000-00-00', 81737000, 8110785397, 7073, 'michelle@daniloblack.com', 'Banorte', '894591279', 'NA', 10, 1, 1, 1),
(103, 1, 3, 'Miguel Angel Gonzalez Elizondo', 'Salvador Villarreal No. 5136, Col. Valle Verde 3_ Sector, Monterrey, Nuevo Leon, CP 64339', 'Dise?ador Sr', '0000-00-00', 81737000, 8112160912, 7056, 'mgonzalez@daniloblack.com', 'Banorte', '869325427', 'NA', 15, 1, 1, 1),
(104, 1, 2, 'Milade Tellez Aguilar', 'Emilio P. Martinez No. 225, Col. San Agustin, Guadalupe, Nuevo Leon, CP 67160', 'Dise?ador Jr', '0000-00-00', 81737000, 8114650448, 0, 'milade@daniloblack.com', 'Banorte', '?0859825964', 'NA', 5, 1, 1, 1),
(105, 1, 2, 'Penelope Monserrat Ramirez Tamez', 'Privada Guerrero No. 7, Col. Barrio Matamoros, Montemorelos, Nuevo Leon, CP 67510', 'Dise?ador Jr', '0000-00-00', 81737000, 8261293906, 7089, 'monserrat@daniloblack.com', 'Banorte', '805201967', 'NA', 10, 1, 1, 1),
(106, 1, 2, 'Norely Lerma Garcia', 'Cumbres de Alboran No. 152, Col. Cumbres Elite 8vo Sector, Monterrey, Nuevo Leon, CP 64349', 'Analista de Estrategia Digital', '0000-00-00', 83638076, 8115555140, 0, 'norely@daniloblack.com', 'Banorte', '216232400', 'NA', 5, 1, 1, 1),
(107, 1, 1, 'Rafael Aguirre Garcia', 'Monarda No. 614, Col. El Sabino Cerrada Residencial, Monterrey, Nuevo Leon, CP 64988', 'Contralor', '0000-00-00', 81737000, 8117782649, 7042, 'rafael@daniloblack.com', '', '', '', 10, 1, 1, 1),
(108, 1, 2, 'Rodrigo Alfonso Becerril Rosales', 'Bosques de Cipreses No. 507, Col. Bosques del Poniente, Santa Catarina, Nuevo Leon, CP 66362', 'Dise?ador Sr', '0000-00-00', 81737000, 8110775648, 7062, 'rodrigo@daniloblack.com', 'Banorte', '?0225882003', 'NA', 15, 1, 1, 1),
(109, 1, 3, 'Rosa Maria Gallegos Rodriguez', 'Rio Volga No. 214, Col. Villas del Oriente 3_ Sector, San Nicolas de los Garza, Nuevo Leon, CP 66470', 'Asistente de Direccion', '0000-00-00', 83638076, 8117782642, 5000, 'rosy@daniloblack.com', 'Banorte', '768865388', 'NA', 5, 1, 1, 1),
(110, 1, 2, 'Ruben de la Cruz Martinez', 'Cananea No. 2102 Dpto. 4, Col. Martinez, Monterrey, Nuevo Leon, CP 64550', 'Guardia de Seguridad', '0000-00-00', 0, 0, 0, 'NA', '', '', '', 10, 2, 1, 1),
(111, 1, 2, 'Ruben Ni?o Rea', 'Cananea No. 1417, Col. Pablo de la Garza, Monterrey, Nuevo Leon, CP 64580', 'Guardia de Seguridad', '0000-00-00', 0, 8114115360, 0, 'NA', '', '', '', 10, 2, 1, 1),
(112, 1, 2, 'Santos David Silva Garcia', 'Palermo No. 936, Col. Campania, Santa Catarina, Nuevo Leon, CP 66166', 'Dise?ador Sr', '0000-00-00', 81737000, 8110512447, 7054, 'santos@daniloblack.com', 'Banorte', '?0833164636', 'NA', 10, 1, 1, 1),
(113, 1, 1, 'Sergio Alberto Mounier Arredondo', 'Rio Volga No. 214, Col. Villas del Oriente 3_ Sector, San Nicolas de los Garza, Nuevo Leon, CP 66470', 'Soporte Tecnico', '0000-00-00', 81737000, 8117782583, 7077, 'smounier@daniloblack.com', 'Banorte', '768865396', 'NA', 5, 1, 1, 1),
(114, 1, 3, 'Sylvia Berenice Nanclares Espinosa', 'Secuoya No. 4782, Col. Cedros, Monterrey, Nuevo Leon, CP 64370', 'Dise?ador Sr', '0000-00-00', 81737000, 8116558835, 7058, 'sylvia@daniloblack.com', 'Banorte', '678273542', 'NA', 20, 1, 1, 1),
(115, 1, 2, 'Maria Teresa Danes Arellano', 'Terranova No. 1216, Col. Vistahermosa, Monterrey, Nuevo Leon, CP 64620', 'Community Manager', '0000-00-00', 81737000, 8119650067, 0, 'teresa@daniloblack.com', 'Banorte', '225879553', 'NA', 20, 1, 1, 1),
(116, 1, 2, 'Jose Tulio Puente Reyna', 'Voyager No 425, Col. Residencial Cumbres 2_ Sector, Monterrey, Nuevo Leon, CP 64610', 'Practicante de Estrategia Digital', '0000-00-00', 83638076, 8110250061, 0, 'tulio@daniloblack.com.mx', 'Banorte', '219959753', 'NA', 5, 1, 1, 1),
(117, 1, 3, 'Valeria Minel Ibarra Alanis', 'Pedregal del Arrecife No. 5563, Col. Pedregal de la Silla, Monterrey, Nuevo Leon, CP 64898', 'Gerente de Recursos Humanos', '0000-00-00', 81737000, 8117782652, 7070, 'valeria@daniloblack.com', 'Banorte', '897961408', 'NA', 15, 1, 1, 1),
(118, 1, 3, 'Victor Manuel Guerra y Malo', '5 de Mayo No. 1286, Col. Palo Blanco, San Pedro Garza Garcia, Nuevo Leon, CP 66236', 'Relaciones Publicas', '0000-00-00', 83638076, 8183666697, 5002, 'vguerra@daniloblack.com', 'Banorte', '869331893', 'NA', 15, 1, 1, 1),
(119, 1, 2, 'Victor Daniel Lucio Hernandez', 'Peninsula No. 101, Col. Nueva Morelos, Monterrey, Nuevo Leon, CP 64180', 'Practicante de Contenidos', '0000-00-00', 81737000, 8116296931, 0, 'vlucio@daniloblack.com', 'Banregio', 'NA', '?058580148405900126', 5, 1, 1, 1),
(120, 1, 1, 'Victor Hugo Saucedo Ipi?a', 'Geronimo Trevi?o No. 500, Col. Palo Blanco, San Pedro Garza Garcia, Nuevo Leon, CP 66230', 'Director de Proyectos Especiales', '0000-00-00', 81737000, 8181796950, 7012, 'victor@daniloblack.com', 'Banorte', '761126121', 'NA', 10, 1, 1, 1),
(121, 1, 3, 'Yamil Lopez Muro', 'Privada la Alhambra No. 105, Col. La Alhambra, Monterrey, Nuevo Leon, CP 64988', 'Director de Plataformas', '0000-00-00', 81737000, 8117782645, 7050, 'yamil@daniloblack.com', 'Banorte', '768849820', 'NA', 10, 1, 1, 1),
(122, 1, 3, 'Juan Antonio Zertuche Castellanos', '16 de Septiembre No. 104 Int, 208, Col. Tampiquito, San Pedro Garza Garcia, Nuevo Leon, CP 64270', 'Editor Sr', '0000-00-00', 81737000, 8110224259, 7081, 'zertuche@daniloblack.com', 'Banorte', '208789150', 'NA', 10, 1, 1, 1),
(123, 1, 3, 'Miriam Hernandez Ortiz', 'Cenzontles No. 118, Col. Cortijo los Ayala, Escobedo, Nuevo Leon, CP 66050', 'Limpieza', '0000-00-00', 0, 0, 0, 'NA', 'Banorte', '227028766', 'NA', 15, 2, 1, 1),
(124, 1, 1, 'Roberto Madero Coppel', 'Laredo No. 222- A, Col. Lomas del Valle, San Pedro Garza Garcia, Nuevo Leon, CP 66256', 'Director General', '0000-00-00', 83638076, 8182806314, 5005, 'roberto@daniloblack.com', '', '', '', 10, 1, 1, 1),
(125, 1, 3, 'Cecilia Feuchter Garcia', 'Holanda No. 2920, Col. Del Carmen, Monterrey, Nuevo Leon, CP 64710', 'Ejecutivo Comercial Jr', '0000-00-00', 83638076, 8182599933, 0, 'cecilia@daniloblack.com', 'Banorte', '873021847', 'NA', 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Empresa` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idEmpresa`),
  UNIQUE KEY `idEmpresa_UNIQUE` (`idEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `Nombre_Empresa`) VALUES
(1, 'DaniloBlack'),
(2, 'DBDigital'),
(3, 'Otra ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE IF NOT EXISTS `iva` (
  `idIva` int(11) NOT NULL AUTO_INCREMENT,
  `IVA` int(11) NOT NULL,
  PRIMARY KEY (`idIva`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `idPagos` int(11) NOT NULL AUTO_INCREMENT,
  `Pago` double NOT NULL,
  `FechaDePago` date NOT NULL,
  `pag_idRecibos_FK` int(11) NOT NULL,
  `pag_idIva_FK` int(11) NOT NULL,
  PRIMARY KEY (`idPagos`),
  UNIQUE KEY `idPagos_UNIQUE` (`idPagos`),
  KEY `idRecibos_FK_idx` (`pag_idRecibos_FK`),
  KEY `pag_idIva_FK` (`pag_idIva_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

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
  `Monto` int(11) NOT NULL,
  `TipoDeRecibo` tinyint(1) NOT NULL,
  `ConceptoBono` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Comision` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecibos`),
  UNIQUE KEY `idRecibos_UNIQUE` (`idRecibos`),
  KEY `rec_idEmpleado_FK` (`rec_idEmpleado_FK`),
  KEY `rec_idPeriodo_FK` (`rec_idPeriodo_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`idRecibos`, `FechaDeRecibo`, `rec_idPeriodo_FK`, `rec_idEmpleado_FK`, `PorPagar`, `Monto`, `TipoDeRecibo`, `ConceptoBono`, `Comision`) VALUES
(3, '2014-05-01', 1, 1, 5000, 5000, 0, NULL, 250),
(4, '2014-05-30', 2, 1, 5000, 5000, 0, NULL, 250),
(5, '2014-05-01', 1, 2, 20000, 20000, 0, NULL, 1000),
(6, '2014-05-30', 2, 2, 20000, 20000, 0, NULL, 1000);

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
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`emp_idEmpAdministradora_FK`) REFERENCES `empadministradora` (`idEmpAdministradora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_idDepartamento_FK` FOREIGN KEY (`emp_idDeparameto_FK`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_idEmpresa_FK` FOREIGN KEY (`emp_idEmpresa_FK`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emp_idTipoPeriodo_FK` FOREIGN KEY (`emp_idTipoPeriodo_FK`) REFERENCES `tipoperiodo` (`idTipoPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`pag_idIva_FK`) REFERENCES `iva` (`idIva`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
