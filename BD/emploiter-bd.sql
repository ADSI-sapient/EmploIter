-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2016 a las 16:48:00
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emploiter`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarProfesion` (IN `id` INT, IN `nom` VARCHAR(45))  NO SQL
UPDATE tbl_profesiones SET nombre = nom
WHERE id_profesion = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarZona` (IN `id` INT)  NO SQL
DELETE FROM tbl_zonas WHERE id_zona = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsCargos` ()  NO SQL
SELECT * FROM tbl_cargos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsPeligros` (IN `_id_proceso` INT)  NO SQL
SELECT p.clasificacion, p.descripcion descr_Procs, p.efectos, c.fuente, c.medio, c.individuo, cc.peorConsecuencia, cc.requisitoLegal, mi.ctrIngenieria, mi.descripcion , er.* FROM tbl_peligrosprocesos pp JOIN tbl_peligros p ON pp.id_peligro = p.id_peligro JOIN tbl_controles c ON p.id_control = c.id_control JOIN tbl_criterios_controles cc ON c.id_criterio = cc.id_criterio_control JOIN tbl_medidasintervencion mi ON cc.id_medidasIntervencion = mi.idMedidasIntervencion JOIN tbl_evaluacionriesgos er ON p.id_riesgo = er.id_riesgos WHERE pp.id_proceso = _id_proceso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsProfesion` ()  NO SQL
SELECT * FROM tbl_profesiones$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DeleteProf` (IN `idProf` INT)  NO SQL
DELETE FROM tbl_profesiones WHERE id_profesion = idProf$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarEmpleados` ()  NO SQL
SELECT concat(e.nombre, ' ', e.apellido) empleado, c.nombre cargo, e.direccion, e.documento, p.nombre profesion, c.salario, c.id_cargo FROM tbl_profesiones p JOIN tbl_empleados e ON p.id_profesion = e.id_profesion JOIN tbl_cargos c
ON e.id_cargo = c.id_cargo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarProcesos` (IN `_id_cargo` INT)  NO SQL
SELECT p.nobre, p.tareas, z.nombre zona, p.rutinaria, p.id_proceso FROM tbl_procesocargo pc JOIN tbl_procesos p ON pc.id_proceso = p.id_proceso JOIN tbl_zonas z ON z.id_zona = p.id_zona WHERE pc.id_cargo = _id_cargo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListPeligros` ()  NO SQL
SELECT p.*, r.nivelRiesgo riesgo FROM tbl_peligros p JOIN tbl_evaluacionriesgos r
ON p.id_riesgo = r.id_riesgos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListProcesos` ()  NO SQL
SELECT p.*, z.nombre zona FROM tbl_procesos p JOIN tbl_zonas z 
ON p.id_zona = z.id_zona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListZona` ()  NO SQL
SELECT * FROM tbl_zonas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ModificarZona` (IN `id` INT, IN `nom` VARCHAR(45))  NO SQL
UPDATE tbl_zonas SET nombre = nom WHERE id_zona = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegCargoProces` (IN `id_carg` INT, IN `id_proc` INT)  NO SQL
INSERT INTO tbl_procesocargo VALUES(null, id_proc, id_carg)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegCont` (IN `fuente` TEXT, IN `medio` TEXT, IN `indiv` TEXT, IN `idCrit` INT)  NO SQL
INSERT INTO tbl_controles VALUES(null, fuente, medio, indiv, idCrit)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegCritCont` (IN `peorCon` VARCHAR(100), IN `reqLeg` VARCHAR(2), IN `idMedIn` INT)  NO SQL
INSERT INTO tbl_criterios_controles VALUES (null, null, peorCon, reqLeg, idMedIn)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarCargo` (IN `nom` VARCHAR(50), IN `sal` DOUBLE)  NO SQL
INSERT INTO tbl_cargos VALUES (null, nom, sal)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarProfesion` (IN `nom` VARCHAR(45))  NO SQL
INSERT into tbl_profesiones VALUES (null, nom)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegMedInt` (IN `ctrIng` TEXT, IN `descr` TEXT)  NO SQL
INSERT INTO tbl_medidasintervencion VALUES(null, ctrIng, descr)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegPeligro` (IN `idRi` INT, IN `idCon` INT, IN `clas` VARCHAR(45), IN `descr` VARCHAR(300), IN `efectos` VARCHAR(300))  NO SQL
INSERT INTO tbl_peligros VALUES(null, idRi, idCon, clas, descr, efectos)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegProceso` (IN `idZona` INT, IN `nom` VARCHAR(45), IN `tare` TEXT, IN `rut` VARCHAR(2))  NO SQL
INSERT INTO tbl_procesos VALUES (null, idZona, nom, tare, rut, 0)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegProcesoPeligro` (IN `idPro` INT, IN `idPel` INT)  NO SQL
INSERT INTO tbl_peligrosprocesos VALUES(null, idPro, idPel)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegRiesgo` (IN `a` INT, IN `b` INT, IN `c` INT, IN `d` VARCHAR(3), IN `e` INT, IN `f` INT, IN `g` INT, IN `h` TEXT)  NO SQL
INSERT INTO tbl_evaluacionriesgos VALUES(null, a, b, c, d, e, f, g, h)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegZona` (IN `nom` VARCHAR(45))  NO SQL
INSERT INTO tbl_zonas VALUES(null, nom)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UltCargo` ()  NO SQL
SELECT max(id_cargo) id_cargo FROM tbl_cargos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UltCont` ()  NO SQL
SELECT MAX(id_control) idControl FROM tbl_controles$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UltCritCont` ()  NO SQL
SELECT MAX(id_criterio_control) idCriCon FROM tbl_criterios_controles$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UltMedInt` ()  NO SQL
SELECT MAX(idMedidasIntervencion) idMedInt FROM tbl_medidasintervencion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UltProc` ()  NO SQL
SELECT max(id_proceso) id_proceso FROM tbl_procesos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UltRiesgo` ()  NO SQL
SELECT MAX(id_riesgos)idRiesgo FROM tbl_evaluacionriesgos$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargos`
--

CREATE TABLE `tbl_cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cargos`
--

INSERT INTO `tbl_cargos` (`id_cargo`, `nombre`, `salario`) VALUES
(1, 'Cortador', 900000),
(2, 'Otros', 2100000),
(3, 'Tornero', 1000000),
(4, 'Soldador', 100000),
(5, 'Troquelador', 1000000),
(6, 'Troquelador', 1000000),
(7, 'Troquelador', 1000000),
(8, 'Troquelador', 1000000),
(9, 'Tornero', 300000),
(10, 'Presidente', 900000000),
(11, 'Desarrollador', 5000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_controles`
--

CREATE TABLE `tbl_controles` (
  `id_control` int(11) NOT NULL,
  `fuente` text,
  `medio` text,
  `individuo` text,
  `id_criterio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_controles`
--

INSERT INTO `tbl_controles` (`id_control`, `fuente`, `medio`, `individuo`, `id_criterio`) VALUES
(1, NULL, NULL, NULL, 1),
(2, 'ninguno', 'ninguno', 'ningunno', 3),
(3, 'qwer', 'rewq', 'weqr', 4),
(4, 'Prueba final', 'Prueba final', 'Prueba final', 5),
(5, 'fsdadf', 'adsfaf', 'fasfa', 6),
(6, 'nose', 'menos', 'tampoco', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_criterios_controles`
--

CREATE TABLE `tbl_criterios_controles` (
  `id_criterio_control` int(11) NOT NULL,
  `numExpuestos` varchar(45) DEFAULT NULL,
  `peorConsecuencia` varchar(100) DEFAULT NULL,
  `requisitoLegal` varchar(2) DEFAULT NULL,
  `id_medidasIntervencion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_criterios_controles`
--

INSERT INTO `tbl_criterios_controles` (`id_criterio_control`, `numExpuestos`, `peorConsecuencia`, `requisitoLegal`, `id_medidasIntervencion`) VALUES
(1, '12', 'morir', NULL, 1),
(2, NULL, 'Morir2', 'Si', 4),
(3, NULL, 'Morir otra vez', 'No', 5),
(4, NULL, 'Cuarta prueba', 'Si', 6),
(5, NULL, 'Prueba final', 'nu', 7),
(6, NULL, 'asds', 'No', 8),
(7, NULL, 'muerte', 'Si', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `documento` varchar(20) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_profesion` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`documento`, `id_cargo`, `id_profesion`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
('1234567', 2, 2, 'Johan', 'Arteaga', 'call71c #30-215 INT 127', '3116440736'),
('24821548', 11, 7, 'juan ', 'mora', 'cl 548 S 54 - 12', '25481548');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evaluacionriesgos`
--

CREATE TABLE `tbl_evaluacionriesgos` (
  `id_riesgos` int(11) NOT NULL,
  `ND` int(11) NOT NULL,
  `NE` int(11) NOT NULL,
  `NP` int(11) NOT NULL,
  `interp` varchar(3) NOT NULL,
  `NC` int(11) NOT NULL,
  `NR` int(11) NOT NULL,
  `nivelRiesgo` int(11) NOT NULL,
  `valoracion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_evaluacionriesgos`
--

INSERT INTO `tbl_evaluacionriesgos` (`id_riesgos`, `ND`, `NE`, `NP`, `interp`, `NC`, `NR`, `nivelRiesgo`, `valoracion`) VALUES
(1, 1, 2, 3, '4', 5, 2, 3, 'Es nivel medio de riesgo'),
(2, 1, 2, 3, '4', 5, 6, 7, '8'),
(3, 5, 5, 5, 'J', 5, 5, 5, '5'),
(4, 1, 2, 3, 'M', 5, 6, 7, 'Quinta prueba'),
(5, 1, 2, 3, 'J', 4, 5, 5, 'Prueba final'),
(6, 4, 4, 4, '4', 4, 4, 4, '44fs'),
(7, 4, 3, 3, 'mj', 2, 2, 1, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_medidasintervencion`
--

CREATE TABLE `tbl_medidasintervencion` (
  `idMedidasIntervencion` int(11) NOT NULL,
  `ctrIngenieria` text,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_medidasintervencion`
--

INSERT INTO `tbl_medidasintervencion` (`idMedidasIntervencion`, `ctrIngenieria`, `descripcion`) VALUES
(1, '', ''),
(2, 'asd', 'dsa'),
(3, 'klñ', 'ñlk'),
(4, 'zxc', 'cxz'),
(5, 'tercero', 'tercero'),
(6, 'Cuartaa prueba', 'Cuarta prueba'),
(7, 'Prueba final', 'Prueba final'),
(8, 'fasd', 'asffa'),
(9, 'nada', 'adios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_peligros`
--

CREATE TABLE `tbl_peligros` (
  `id_peligro` int(11) NOT NULL,
  `id_riesgo` int(11) NOT NULL,
  `id_control` int(11) NOT NULL,
  `clasificacion` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `efectos` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_peligros`
--

INSERT INTO `tbl_peligros` (`id_peligro`, `id_riesgo`, `id_control`, `clasificacion`, `descripcion`, `efectos`) VALUES
(1, 1, 1, 'Quimico', 'es peligrosa', 'dolor de cabez'),
(2, 2, 2, 'Fiisico', 'Malo', 'Morir&'),
(3, 5, 4, 'Prueba final', 'Prueba final', 'Prueba final'),
(4, 6, 5, 'afsdfa', 'afas', 'adfasdf'),
(5, 7, 6, 'material', 'Hola', 'NAda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_peligrosprocesos`
--

CREATE TABLE `tbl_peligrosprocesos` (
  `id_peligroProceso` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_peligro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_peligrosprocesos`
--

INSERT INTO `tbl_peligrosprocesos` (`id_peligroProceso`, `id_proceso`, `id_peligro`) VALUES
(4, 10, 1),
(5, 11, 3),
(6, 11, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_procesocargo`
--

CREATE TABLE `tbl_procesocargo` (
  `id_procesoCargo` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_procesocargo`
--

INSERT INTO `tbl_procesocargo` (`id_procesoCargo`, `id_proceso`, `id_cargo`) VALUES
(4, 2, 8),
(5, 1, 8),
(6, 2, 9),
(7, 1, 9),
(8, 1, 10),
(9, 2, 10),
(10, 11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_procesos`
--

CREATE TABLE `tbl_procesos` (
  `id_proceso` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `nobre` varchar(45) NOT NULL,
  `tareas` text NOT NULL,
  `rutinaria` varchar(2) NOT NULL,
  `numExpuestosPeligro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_procesos`
--

INSERT INTO `tbl_procesos` (`id_proceso`, `id_zona`, `nobre`, `tareas`, `rutinaria`, `numExpuestosPeligro`) VALUES
(1, 1, 'cortar', 'realizar cortes de laminas', 'si', 0),
(2, 2, 'Servicios generales', 'Limpiar las instalaciones', 'No', 0),
(3, 1, 'otro', 'Hacer algo', 'SI', 0),
(4, 2, 'Otro más ', '', 'SI', 0),
(5, 1, 'Descansar', '', 'SI', 0),
(6, 7, 'Corredor', 'Producir como loco', 'SI', 0),
(7, 2, '54ARSF', 'GFSGDFGS', 'SI', 0),
(8, 2, 'no ultimo', 'Ultima prueba de este modulo', 'SI', 0),
(9, 2, 'Ultimo', 'Ultima prueba de este modulo', 'SI', 0),
(10, 2, 'Otra ves ultimo', 'Nuevo intento por que hice una chambonada', 'SI', 0),
(11, 8, 'Desarrollar', 'otras', 'NO', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profesiones`
--

CREATE TABLE `tbl_profesiones` (
  `id_profesion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_profesiones`
--

INSERT INTO `tbl_profesiones` (`id_profesion`, `nombre`) VALUES
(1, 'Enfermero'),
(2, 'Analista'),
(3, 'Profesor'),
(7, 'Ing Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zonas`
--

CREATE TABLE `tbl_zonas` (
  `id_zona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_zonas`
--

INSERT INTO `tbl_zonas` (`id_zona`, `nombre`) VALUES
(1, 'planta'),
(2, 'Terraza'),
(7, 'Produccion'),
(8, 'Oficina');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `tbl_controles`
--
ALTER TABLE `tbl_controles`
  ADD PRIMARY KEY (`id_control`),
  ADD KEY `fk_tbl_Controles_tbl_Criterios_Controles1_idx` (`id_criterio`);

--
-- Indices de la tabla `tbl_criterios_controles`
--
ALTER TABLE `tbl_criterios_controles`
  ADD PRIMARY KEY (`id_criterio_control`),
  ADD KEY `fk_tbl_Criterios_Controles_tbl_medidasIntervencion1_idx` (`id_medidasIntervencion`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `fk_tbl_empleados_tbl_profesiones1_idx` (`id_profesion`);

--
-- Indices de la tabla `tbl_evaluacionriesgos`
--
ALTER TABLE `tbl_evaluacionriesgos`
  ADD PRIMARY KEY (`id_riesgos`);

--
-- Indices de la tabla `tbl_medidasintervencion`
--
ALTER TABLE `tbl_medidasintervencion`
  ADD PRIMARY KEY (`idMedidasIntervencion`);

--
-- Indices de la tabla `tbl_peligros`
--
ALTER TABLE `tbl_peligros`
  ADD PRIMARY KEY (`id_peligro`),
  ADD KEY `fk_tbl_Peligros_tbl_ClasificacionesPeligros1_idx` (`clasificacion`),
  ADD KEY `fk_tbl_Peligros_tbl_Controles1_idx` (`id_control`),
  ADD KEY `fk_tbl_Peligros_tbl_evaluacionRiesgos1_idx` (`id_riesgo`);

--
-- Indices de la tabla `tbl_peligrosprocesos`
--
ALTER TABLE `tbl_peligrosprocesos`
  ADD PRIMARY KEY (`id_peligroProceso`),
  ADD KEY `fk_tbl_peligrosProcesos_tbl_procesos1_idx` (`id_proceso`),
  ADD KEY `fk_tbl_peligrosProcesos_tbl_Peligros1_idx` (`id_peligro`);

--
-- Indices de la tabla `tbl_procesocargo`
--
ALTER TABLE `tbl_procesocargo`
  ADD PRIMARY KEY (`id_procesoCargo`),
  ADD KEY `fk_tbl_procesoCargo_tbl_procesos1_idx` (`id_proceso`),
  ADD KEY `fk_tbl_procesoCargo_tbl_cargos1_idx` (`id_cargo`);

--
-- Indices de la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `fk_tbl_procesos_tbl_zonas1_idx` (`id_zona`);

--
-- Indices de la tabla `tbl_profesiones`
--
ALTER TABLE `tbl_profesiones`
  ADD PRIMARY KEY (`id_profesion`);

--
-- Indices de la tabla `tbl_zonas`
--
ALTER TABLE `tbl_zonas`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tbl_controles`
--
ALTER TABLE `tbl_controles`
  MODIFY `id_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_criterios_controles`
--
ALTER TABLE `tbl_criterios_controles`
  MODIFY `id_criterio_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_evaluacionriesgos`
--
ALTER TABLE `tbl_evaluacionriesgos`
  MODIFY `id_riesgos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_medidasintervencion`
--
ALTER TABLE `tbl_medidasintervencion`
  MODIFY `idMedidasIntervencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbl_peligros`
--
ALTER TABLE `tbl_peligros`
  MODIFY `id_peligro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_peligrosprocesos`
--
ALTER TABLE `tbl_peligrosprocesos`
  MODIFY `id_peligroProceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_procesocargo`
--
ALTER TABLE `tbl_procesocargo`
  MODIFY `id_procesoCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tbl_profesiones`
--
ALTER TABLE `tbl_profesiones`
  MODIFY `id_profesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_zonas`
--
ALTER TABLE `tbl_zonas`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_controles`
--
ALTER TABLE `tbl_controles`
  ADD CONSTRAINT `fk_tbl_Controles_tbl_Criterios_Controles1` FOREIGN KEY (`id_criterio`) REFERENCES `tbl_criterios_controles` (`id_criterio_control`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_criterios_controles`
--
ALTER TABLE `tbl_criterios_controles`
  ADD CONSTRAINT `fk_tbl_Criterios_Controles_tbl_medidasIntervencion1` FOREIGN KEY (`id_medidasIntervencion`) REFERENCES `tbl_medidasintervencion` (`idMedidasIntervencion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `tbl_cargos` (`id_cargo`),
  ADD CONSTRAINT `fk_tbl_empleados_tbl_profesiones1` FOREIGN KEY (`id_profesion`) REFERENCES `tbl_profesiones` (`id_profesion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_peligros`
--
ALTER TABLE `tbl_peligros`
  ADD CONSTRAINT `fk_tbl_Peligros_tbl_Controles1` FOREIGN KEY (`id_control`) REFERENCES `tbl_controles` (`id_control`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_Peligros_tbl_evaluacionRiesgos1` FOREIGN KEY (`id_riesgo`) REFERENCES `tbl_evaluacionriesgos` (`id_riesgos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_peligrosprocesos`
--
ALTER TABLE `tbl_peligrosprocesos`
  ADD CONSTRAINT `fk_tbl_peligrosProcesos_tbl_Peligros1` FOREIGN KEY (`id_peligro`) REFERENCES `tbl_peligros` (`id_peligro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_peligrosProcesos_tbl_procesos1` FOREIGN KEY (`id_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_procesocargo`
--
ALTER TABLE `tbl_procesocargo`
  ADD CONSTRAINT `fk_tbl_procesoCargo_tbl_cargos1` FOREIGN KEY (`id_cargo`) REFERENCES `tbl_cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_procesoCargo_tbl_procesos1` FOREIGN KEY (`id_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  ADD CONSTRAINT `fk_tbl_procesos_tbl_zonas1` FOREIGN KEY (`id_zona`) REFERENCES `tbl_zonas` (`id_zona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
