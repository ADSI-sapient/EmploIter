-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2016 a las 20:39:25
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarCargo` (IN `id_Carg` INT)  NO SQL
DELETE FROM tbl_cargos 
WHERE id_cargo = id_Carg$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarEmpleado` (IN `ced` VARCHAR(20))  NO SQL
DELETE FROM tbl_empleados
WHERE documento = ced$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarPeligro` (IN `idPel` INT)  NO SQL
DELETE FROM tbl_peligros
WHERE id_peligro = idPel$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarProceso` (IN `id_pro` INT)  NO SQL
DELETE FROM tbl_procesos 
WHERE id_proceso = id_pro$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarProcesoCargo` (IN `idCargo` INT)  NO SQL
DELETE FROM tbl_procesocargo
WHERE id_cargo = idCargo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarProcesoPeligro` (IN `id_pro` INT)  NO SQL
DELETE FROM tbl_peligrosprocesos 
WHERE id_proceso = id_pro$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BorrarZona` (IN `id` INT)  NO SQL
DELETE FROM tbl_zonas WHERE id_zona = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsAccidente` (IN `id` INT)  NO SQL
SELECT * FROM tbl_accidentes
WHERE id_accidente = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsCargos` ()  NO SQL
SELECT * FROM tbl_cargos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsEmpleado` (IN `ced` VARCHAR(20))  NO SQL
SELECT e.*, c.salario FROM tbl_empleados e JOIN tbl_cargos c
ON e.id_cargo = c.id_cargo
WHERE e.documento = ced$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsEnfermedad` (IN `id_enf` INT)  NO SQL
SELECT * FROM tbl_enfermedades e
WHERE e.id_enfermedad = id_enf$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsIncapacidades` (IN `ced` VARCHAR(20))  NO SQL
SELECT  i.razonIncapacidad, i.fechaInicio, i.fechaFin, i.diasIncapacidad, i.valorIncapacidad, i.descripcion des, i.id_enfermedad, i.id_accidente FROM tbl_incapacidades i
WHERE i.ced_empleado = ced$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsPeligros` (IN `_id_proceso` INT)  NO SQL
SELECT p.clasificacion, p.descripcion descr_Procs, p.efectos, c.fuente, c.medio, c.individuo, cc.peorConsecuencia, cc.requisitoLegal, mi.ctrIngenieria, mi.descripcion , er.* FROM tbl_peligrosprocesos pp JOIN tbl_peligros p ON pp.id_peligro = p.id_peligro JOIN tbl_controles c ON p.id_control = c.id_control JOIN tbl_criterios_controles cc ON c.id_criterio = cc.id_criterio_control JOIN tbl_medidasintervencion mi ON cc.id_medidasIntervencion = mi.idMedidasIntervencion JOIN tbl_evaluacionriesgos er ON p.id_riesgo = er.id_riesgos WHERE pp.id_proceso = _id_proceso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsProcesos` (IN `_id_cargo` INT)  NO SQL
SELECT pr.nobre, pr.tareas, z.nombre zona, pr.rutinaria, pr.id_proceso,
pl.clasificacion, pl.descripcion descr_Peligro, pl.efectos, c.fuente, c.medio, c.individuo, cc.peorConsecuencia, cc.requisitoLegal, mi.ctrIngenieria, mi.descripcion, er.* FROM tbl_procesocargo pc JOIN tbl_procesos pr 
ON pc.id_proceso = pr.id_proceso JOIN tbl_zonas z 
ON pr.id_zona = z.id_zona JOIN tbl_peligrosprocesos pp 
ON pr.id_proceso = pp.id_proceso JOIN tbl_peligros pl 
ON pp.id_peligro = pl.id_peligro JOIN tbl_controles c
ON pl.id_control = c.id_control JOIN tbl_criterios_controles cc 
ON c.id_criterio = cc.id_criterio_control JOIN tbl_medidasintervencion mi ON cc.id_medidasIntervencion = mi.idMedidasIntervencion JOIN tbl_evaluacionriesgos er 
ON pl.id_riesgo = er.id_riesgos
WHERE pc.id_cargo = _id_cargo
ORDER BY pr.id_proceso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsProfesion` ()  NO SQL
SELECT * FROM tbl_profesiones$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ConsRiesgo` (IN `idRies` INT)  NO SQL
SELECT * FROM tbl_riesgos r
WHERE r.id_riesgo = idRies$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DeleteProf` (IN `idProf` INT)  NO SQL
DELETE FROM tbl_profesiones WHERE id_profesion = idProf$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListAccidente` ()  NO SQL
SELECT * FROM tbl_accidentes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarEmpleados` ()  NO SQL
SELECT e.documento, concat(e.nombre, ' ', e.apellido) nomApe, e.nombre nomEmpleado, e.apellido, c.nombre cargo, e.direccion, p.id_profesion, p.nombre profesion, c.salario, c.id_cargo, r.clase, e.telefono FROM tbl_profesiones p JOIN tbl_empleados e ON p.id_profesion = e.id_profesion JOIN tbl_cargos c
ON e.id_cargo = c.id_cargo JOIN tbl_riesgos r 
ON c.id_riesgo = r.id_riesgo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarIncapacidades` ()  NO SQL
SELECT i.*, concat(e.nombre, ' ', e.apellido) empleado FROM tbl_incapacidades i JOIN tbl_empleados e 
ON i.ced_empleado = e.documento$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarPeligros` ()  NO SQL
SELECT p.*, er.nivelRiesgo, cc.peorConsecuencia FROM tbl_peligros p JOIN tbl_controles c 
ON p.id_control = c.id_control JOIN tbl_criterios_controles cc
ON c.id_criterio = cc.id_criterio_control JOIN tbl_medidasintervencion mi 
ON cc.id_medidasIntervencion = mi.idMedidasIntervencion JOIN tbl_evaluacionriesgos er ON p.id_riesgo = er.id_riesgos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListCargos` ()  NO SQL
SELECT c.*, r.clase, r.tarifa FROM tbl_cargos c JOIN tbl_riesgos r 
ON c.id_riesgo = r.id_riesgo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListProcesos` ()  NO SQL
SELECT p.*, z.nombre zona FROM tbl_procesos p JOIN tbl_zonas z 
ON p.id_zona = z.id_zona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListZona` ()  NO SQL
SELECT * FROM tbl_zonas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ModEmpleado` (IN `ced` VARCHAR(20), IN `cargo` INT, IN `prof` INT, IN `nom` VARCHAR(40), IN `apell` VARCHAR(40), IN `dir` VARCHAR(50), IN `tel` VARCHAR(30))  NO SQL
UPDATE tbl_empleados e SET e.id_cargo = cargo, e.id_profesion = prof, e.nombre = nom, e.apellido = apell, e.direccion = dir, e.telefono = tel
WHERE e.documento = ced$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ModificarIncapacidad` (IN `emp` VARCHAR(20), IN `enf` INT, IN `acc` INT, IN `razon` VARCHAR(30), IN `fInicio` DATE, IN `fFin` DATE, IN `dias` INT, IN `val` DOUBLE, IN `des` TEXT, IN `idInc` INT)  NO SQL
UPDATE tbl_incapacidades i SET i.ced_empleado = emp, i.id_enfermedad = enf, i.id_accidente = acc, i.razonIncapacidad = razon, i.fechaInicio = fInicio, i.fechaFin = fFin, i.diasIncapacidad = dias, i.valorIncapacidad = val, i.descripcion = des WHERE i.id_incapacidad = idInc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ModificarZona` (IN `id` INT, IN `nom` VARCHAR(45))  NO SQL
UPDATE tbl_zonas SET nombre = nom WHERE id_zona = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegCargoProces` (IN `id_carg` INT, IN `id_proc` INT)  NO SQL
INSERT INTO tbl_procesocargo VALUES(null, id_proc, id_carg)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegCont` (IN `fuente` TEXT, IN `medio` TEXT, IN `indiv` TEXT, IN `idCrit` INT)  NO SQL
INSERT INTO tbl_controles VALUES(null, fuente, medio, indiv, idCrit)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegCritCont` (IN `peorCon` VARCHAR(100), IN `reqLeg` VARCHAR(2), IN `idMedIn` INT)  NO SQL
INSERT INTO tbl_criterios_controles VALUES (null, null, peorCon, reqLeg, idMedIn)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegIncapacidad` (IN `emp` VARCHAR(20), IN `enf` INT, IN `acc` INT, IN `razon` VARCHAR(30), IN `fechaIn` DATE, IN `fechaFin` DATE, IN `dias` INT(11), IN `val` DOUBLE, IN `descr` TEXT)  NO SQL
INSERT INTO tbl_incapacidades VALUES(null, emp, enf, acc, razon, fechaIn, fechaFin, dias, val, descr)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarCargo` (IN `idRies` INT, IN `nom` VARCHAR(50), IN `sal` DOUBLE)  NO SQL
INSERT INTO tbl_cargos VALUES (null, idRies, nom, sal)$$

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
-- Estructura de tabla para la tabla `tbl_accidentes`
--

CREATE TABLE `tbl_accidentes` (
  `id_accidente` int(11) NOT NULL,
  `causa` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_accidentes`
--

INSERT INTO `tbl_accidentes` (`id_accidente`, `causa`, `descripcion`) VALUES
(1, 'Golpe con', 'Ocurre cuando el elemento material es el que se mueve hacia la persona, siempre que dicho elemento sea manejado o accionado por el individuo, el cual se considera estático para los fines de clasificación. Ejemplo: golpe con un martillo.'),
(2, 'Golpe contra', 'Ocurre lo contrario a la situación de golpe con o por, en cuanto se considera estático al elemento material y es la persona la que se mueve hacia éste, produciéndose el "Golpe contra". Ejemplo: chocar con objetos que sobresalgan.'),
(3, 'Contacto con ', 'Ocurre cuando un individuo se acerca al elemento, el cual tiene la característica de provocar daño con esfuerzos insignificativos. Ejemplo: contacto con electricidad, con cuerpos cortantes, sustancias químicas, cuerpos calientes, etc.'),
(4, 'Contacto por ', 'Ocurre de manera contraria al tipo "contacto con", en el sentido que es ahora el elemento material el que se acerca al individuo, al que con esfuerzos insignificativos, le provoca el daño por proyección de sustancias. Ejemplo: salpicadura de liquido caliente o cáusticos.'),
(5, 'Golpe por', 'Ocurre cuando el elemento material es el que se mueve hacia la persona, a la que también se considera estática para los fines de clasificación, pero en este caso, el material es independiente de la persona. Ejemplo: golpe por caída de objetos.'),
(6, 'Caída a distinto nivel', 'Ocurre cuando la persona, por efecto de la gravedad, se aleja de la superficie que la sustenta, para converger en forma violenta en dirección y sentido fijo a otra ubicada más abajo.'),
(7, 'Atrapamiento ', 'Consiste en la retención o compresión parcial de la persona entre dos elementos materiales, uno de los cuales converge hacia el otro, o ambos entre si. En este caso los movimientos relativos pueden ser indistintamente en uno u otro sentido. Ejemplo: mano atrapada por un engranaje.'),
(8, 'Aprisionamiento', 'Ocurre cuando una persona o parte de su cuerpo es retenida o confinada en un espacio o recinto cerrado. Ejemplo: en contenedores, bodegas, etc.'),
(9, 'Sobreesfuerzo', 'Ocurre cuando la capacidad física del individuo es superada por la reacción que éste ejerce contra una fuerza externa. En este caso la fuerza es esencialmente estática. Ejemplo: operaciones de manejo manual de materiales.'),
(10, 'Exposición a', 'Consiste en la permanencia de una persona en un ambiente en que existe una cantidad masiva de una sustancia agresiva o tóxica o ciertas formas de radiaciones agresivas.'),
(11, 'Caída al mar', 'Corresponde en cierta manera al tipo de accidente "Caída a distinto nivel", pero por ser propio de la actividad marítima, se considera aparte. Su ocurrencia puede ser indistintamente la borda de una nave, o desde tierra, como puede ser, el delantal del muelle, rocas, etc.'),
(12, 'Por inmersión', 'Corresponde al accidente que le ocurre a una persona cuando sufre un principio de asfixia fatal al entrar en contacto con un medio acuático.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargos`
--

CREATE TABLE `tbl_cargos` (
  `id_cargo` int(11) NOT NULL,
  `id_riesgo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_enfermedades`
--

CREATE TABLE `tbl_enfermedades` (
  `id_enfermedad` int(11) NOT NULL,
  `grupo` varchar(5) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_enfermedades`
--

INSERT INTO `tbl_enfermedades` (`id_enfermedad`, `grupo`, `descripcion`) VALUES
(1, 'I', 'Enfermedades infecciosas y parasitarias'),
(2, 'II', 'Cáncer de origen laboral'),
(3, 'III', 'Enfermedades no malignas del sistema hematopoyético'),
(4, 'IV', 'Trastornos mentales y del comportamiento'),
(5, 'V', 'Enfermedades del sistema nervioso'),
(6, 'VI', 'Enfermedades del ojo y sus anexos'),
(7, 'VII', 'Enfermedades del oído y problemas de fonación'),
(8, 'VIII', 'Enfermedades del sistema cardiovascular y cerebro-vascular'),
(9, 'IX', 'Enfermedades del sistema respiratorio'),
(10, 'X', 'Enfermedades del sistema digestivo y el hígado'),
(11, 'XI', 'Enfermedades de la piel y tejido subcutáneo'),
(12, 'XII', 'Enfermedades del sistema músculo-esquelético y tejido conjuntivo'),
(13, 'XIII', 'Enfermedades del sistema genitourinario'),
(14, 'XIV', 'Intoxicaciones'),
(15, 'XV', 'Enfermedades del sistema endocrino');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incapacidades`
--

CREATE TABLE `tbl_incapacidades` (
  `id_incapacidad` int(11) NOT NULL,
  `ced_empleado` varchar(20) NOT NULL,
  `id_enfermedad` int(11) DEFAULT NULL,
  `id_accidente` int(11) DEFAULT NULL,
  `razonIncapacidad` varchar(30) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date DEFAULT NULL,
  `diasIncapacidad` int(11) NOT NULL,
  `valorIncapacidad` double NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_medidasintervencion`
--

CREATE TABLE `tbl_medidasintervencion` (
  `idMedidasIntervencion` int(11) NOT NULL,
  `ctrIngenieria` text,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_peligrosprocesos`
--

CREATE TABLE `tbl_peligrosprocesos` (
  `id_peligroProceso` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_peligro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_procesocargo`
--

CREATE TABLE `tbl_procesocargo` (
  `id_procesoCargo` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profesiones`
--

CREATE TABLE `tbl_profesiones` (
  `id_profesion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_riesgos`
--

CREATE TABLE `tbl_riesgos` (
  `id_riesgo` int(11) NOT NULL,
  `clase` varchar(3) NOT NULL,
  `tarifa` decimal(10,3) NOT NULL,
  `actividades` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_riesgos`
--

INSERT INTO `tbl_riesgos` (`id_riesgo`, `clase`, `tarifa`, `actividades`) VALUES
(1, 'I', '0.522', 'Financieras, trabajos de oficina, administrativos, centros educativos, restaurantes.'),
(2, 'II', '1.044', 'Algunos procesos manufactureros como fabricación de tapetes, tejidos, confecciones y flores artificiales, almacén por departamentos, algunas labores agrícolas.\r\n'),
(3, 'III', '2.436', 'Algunos procesos manufactureros como la fabricación de agujas, alcoholes y artículos de cuero.\r\n'),
(4, 'IV', '4.350', 'Procesos manufactureros como fabricación de aceites, cervezas, vidrios, procesos de galvanización, transportes y servicios de vigilancia privada.\r\n'),
(5, 'V', '6.960', 'Areneras, manejo de asbesto, bomberos, manejo de explosivos, construcción y explotación petrolera.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zonas`
--

CREATE TABLE `tbl_zonas` (
  `id_zona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_accidentes`
--
ALTER TABLE `tbl_accidentes`
  ADD PRIMARY KEY (`id_accidente`);

--
-- Indices de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `id_riesgo` (`id_riesgo`);

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
-- Indices de la tabla `tbl_enfermedades`
--
ALTER TABLE `tbl_enfermedades`
  ADD PRIMARY KEY (`id_enfermedad`);

--
-- Indices de la tabla `tbl_evaluacionriesgos`
--
ALTER TABLE `tbl_evaluacionriesgos`
  ADD PRIMARY KEY (`id_riesgos`);

--
-- Indices de la tabla `tbl_incapacidades`
--
ALTER TABLE `tbl_incapacidades`
  ADD PRIMARY KEY (`id_incapacidad`),
  ADD KEY `id_empleado` (`ced_empleado`),
  ADD KEY `id_enfermedad` (`id_enfermedad`),
  ADD KEY `id_accidente` (`id_accidente`);

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
-- Indices de la tabla `tbl_riesgos`
--
ALTER TABLE `tbl_riesgos`
  ADD PRIMARY KEY (`id_riesgo`);

--
-- Indices de la tabla `tbl_zonas`
--
ALTER TABLE `tbl_zonas`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_accidentes`
--
ALTER TABLE `tbl_accidentes`
  MODIFY `id_accidente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_controles`
--
ALTER TABLE `tbl_controles`
  MODIFY `id_control` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_criterios_controles`
--
ALTER TABLE `tbl_criterios_controles`
  MODIFY `id_criterio_control` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_enfermedades`
--
ALTER TABLE `tbl_enfermedades`
  MODIFY `id_enfermedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbl_evaluacionriesgos`
--
ALTER TABLE `tbl_evaluacionriesgos`
  MODIFY `id_riesgos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_incapacidades`
--
ALTER TABLE `tbl_incapacidades`
  MODIFY `id_incapacidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_medidasintervencion`
--
ALTER TABLE `tbl_medidasintervencion`
  MODIFY `idMedidasIntervencion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_peligros`
--
ALTER TABLE `tbl_peligros`
  MODIFY `id_peligro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_peligrosprocesos`
--
ALTER TABLE `tbl_peligrosprocesos`
  MODIFY `id_peligroProceso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_procesocargo`
--
ALTER TABLE `tbl_procesocargo`
  MODIFY `id_procesoCargo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_profesiones`
--
ALTER TABLE `tbl_profesiones`
  MODIFY `id_profesion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_riesgos`
--
ALTER TABLE `tbl_riesgos`
  MODIFY `id_riesgo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_zonas`
--
ALTER TABLE `tbl_zonas`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  ADD CONSTRAINT `tbl_cargos_ibfk_1` FOREIGN KEY (`id_riesgo`) REFERENCES `tbl_riesgos` (`id_riesgo`);

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
-- Filtros para la tabla `tbl_incapacidades`
--
ALTER TABLE `tbl_incapacidades`
  ADD CONSTRAINT `tbl_incapacidades_ibfk_1` FOREIGN KEY (`ced_empleado`) REFERENCES `tbl_empleados` (`documento`),
  ADD CONSTRAINT `tbl_incapacidades_ibfk_2` FOREIGN KEY (`id_enfermedad`) REFERENCES `tbl_enfermedades` (`id_enfermedad`),
  ADD CONSTRAINT `tbl_incapacidades_ibfk_3` FOREIGN KEY (`id_accidente`) REFERENCES `tbl_accidentes` (`id_accidente`);

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
