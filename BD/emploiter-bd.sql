-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2016 a las 02:53:39
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarEmpleados` ()  NO SQL
SELECT e.documento, e.nombre, e.apellido, c.nombre as nombre_Cargo, e.telefono, e.profesion, c.salario, c.nivel_riesgo FROM tbl_empleados e JOIN tbl_cargos c ON e.id_cargo = c.id_cargo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargos`
--

CREATE TABLE `tbl_cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nivel_riesgo` int(11) NOT NULL,
  `salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cargos`
--

INSERT INTO `tbl_cargos` (`id_cargo`, `nombre`, `nivel_riesgo`, `salario`) VALUES
(1, 'Tornero', 5, 950000),
(2, 'Troquelador', 5, 950000),
(3, 'Servicios Generales', 2, 700000),
(4, 'Director Financiero', 1, 2500000),
(5, 'Asesor Comercial', 1, 1600000),
(6, 'Cortador', 5, 950000),
(7, 'Soldador', 5, 950000),
(8, 'Pintor', 3, 950000),
(9, 'Gerente de Produccion', 1, 2300000),
(10, 'Recepcionista', 1, 700000),
(11, 'Gerente Talento Humano', 1, 1600000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `documento` varchar(20) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `profesion` varchar(60) NOT NULL,
  `salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`documento`, `id_cargo`, `nombre`, `apellido`, `direccion`, `telefono`, `profesion`, `salario`) VALUES
('52765987', 3, 'Blanca Helena', 'Martinez', 'CLL 34 B # 98-67', '2259874', 'Bachiller', 700000),
('52786573', 11, 'Marcela', 'Arias Guzman', 'CLL 23 # 67-89', '1457863', 'Psicologa', 1600000),
('53674365', 10, 'Luisa', 'Quintanilla', 'Cra 18 B # 67-89', '5478963', 'Auxiliar Administrativo', 700000),
('76543397', 4, 'Pedro', 'Ramirez Carranza', 'Cra 26 # 78-89', '3369874', 'Economista', 2500000),
('76549080', 9, 'Julio', 'Valdez', 'CLL 151 # 24-56', '3795216', 'Ingeniero Industrial', 2300000),
('76985467', 8, 'Jose', 'Hurtado', 'CLL 56 # 75-21', '6639871', 'Pintor Industrial', 950000),
('79153476', 1, 'Angel', 'Vasquez Oviedo', 'CLL 54 Sur 16-25', '3201458', 'Tecnico Industrial', 950000),
('79376567', 6, 'Carlos Alberto', 'Cardenas', 'Diag 12 B # 34-90', '3354871', 'Tecnico Industrial', 950000),
('79567945', 5, 'Edgar Fernando', 'Mora Alarcon', 'CLL 80 No 67-54', '3698741', 'Mercadeo y Ventas', 1600000),
('79876495', 2, 'Alfonso', 'Rosas Ortiz', 'Diag 27 No 43-90', '3658947', 'Tecnico Industrial', 950000),
('80537932', 7, 'German Augusto', 'Calderon', 'Cra 66 # 74-16', '4475621', 'Tecnico Industrial', 950000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `tbl_cargos` (`id_cargo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
