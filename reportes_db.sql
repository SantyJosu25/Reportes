-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2020 a las 01:54:23
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reportes_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargo`
--

CREATE TABLE `tbl_cargo` (
  `CAR_ID` int(11) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `DEP_ID` int(11) DEFAULT NULL,
  `CAR_DESCRIPCION` varchar(50) DEFAULT NULL,
  `CAR_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cargo`
--

INSERT INTO `tbl_cargo` (`CAR_ID`, `EMP_ID`, `DEP_ID`, `CAR_DESCRIPCION`, `CAR_ESTADO`) VALUES
(1, 1, 1, 'Tecnico', 'A'),
(2, 2, 2, 'Jefe Departamento', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `CLI_ID` bigint(20) NOT NULL,
  `CLI_DNI` int(11) DEFAULT NULL,
  `CLI_NOMBRES` varchar(100) DEFAULT NULL,
  `CLI_CELULAR` varchar(12) DEFAULT NULL,
  `CLI_CORREO` varchar(200) DEFAULT NULL,
  `CLI_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`CLI_ID`, `CLI_DNI`, `CLI_NOMBRES`, `CLI_CELULAR`, `CLI_CORREO`, `CLI_ESTADO`) VALUES
(1, 1725099764, 'Santiago Anrango', '0987866683', 'santy2516@gmail.com', 'A'),
(2, 1722222222, 'Pedro Pablo', '0987654321', 'pedro@a.com', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `DEP_ID` int(11) NOT NULL,
  `DEP_DESCRIPCION` varchar(100) DEFAULT NULL,
  `DEP_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_departamento`
--

INSERT INTO `tbl_departamento` (`DEP_ID`, `DEP_DESCRIPCION`, `DEP_ESTADO`) VALUES
(1, 'Sistemas', 'A'),
(2, 'Gerencia', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_pedido`
--

CREATE TABLE `tbl_detalle_pedido` (
  `DEP_CODIGO` int(11) NOT NULL,
  `PRO_ID` int(11) DEFAULT NULL,
  `PED_ID` int(11) DEFAULT NULL,
  `DEP_DESCRIPCION` varchar(100) DEFAULT NULL,
  `DEP_CANTIDAD` int(11) DEFAULT NULL,
  `DEP_PRECIO_UNITARIO` decimal(8,2) DEFAULT NULL,
  `DEP_PRECIOTOTAL` decimal(8,2) DEFAULT NULL,
  `DEP_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_detalle_pedido`
--

INSERT INTO `tbl_detalle_pedido` (`DEP_CODIGO`, `PRO_ID`, `PED_ID`, `DEP_DESCRIPCION`, `DEP_CANTIDAD`, `DEP_PRECIO_UNITARIO`, `DEP_PRECIOTOTAL`, `DEP_ESTADO`) VALUES
(1, 1, 1, 'Laptop', 2, '2.40', '4.80', 'A'),
(2, 2, 2, 'SSD 240 GB', 12, '0.15', '1.80', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `EMP_ID` int(11) NOT NULL,
  `EMP_NOMBRES` varchar(100) DEFAULT NULL,
  `EMP_DNI` varchar(13) DEFAULT NULL,
  `EMP_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`EMP_ID`, `EMP_NOMBRES`, `EMP_DNI`, `EMP_ESTADO`) VALUES
(1, 'Aldo Aldea', '1744425412', 'A'),
(2, 'Carlos Casas', '1778963214', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido`
--

CREATE TABLE `tbl_pedido` (
  `PED_ID` int(11) NOT NULL,
  `CLI_ID` bigint(20) DEFAULT NULL,
  `PED_FECHA` datetime DEFAULT NULL,
  `PED_NUMERO` int(11) DEFAULT NULL,
  `PED_DIRECCION` varchar(200) DEFAULT NULL,
  `PED_TELEFONO` varchar(11) DEFAULT NULL,
  `PED_TOTAL` decimal(8,2) DEFAULT NULL,
  `PED_SUBTOTAL` decimal(8,2) DEFAULT NULL,
  `PED_ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pedido`
--

INSERT INTO `tbl_pedido` (`PED_ID`, `CLI_ID`, `PED_FECHA`, `PED_NUMERO`, `PED_DIRECCION`, `PED_TELEFONO`, `PED_TOTAL`, `PED_SUBTOTAL`, `PED_ESTADO`) VALUES
(1, 1, '2020-09-04 00:03:09', 1, 'Calderon', '2,40', '2.40', '0.00', 'A'),
(2, 2, '2020-09-04 00:03:43', 2, 'Carapungo', '0,15', '0.15', '0.00', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_CODIGO` varchar(50) DEFAULT NULL,
  `PRO_NOMBRE` varchar(100) DEFAULT NULL,
  `PRO_DESCRIPCION` varchar(100) DEFAULT NULL,
  `PRO_PRECIOCOMPRA` decimal(8,2) DEFAULT NULL,
  `PRO_PRECIO_VENTA` decimal(8,2) DEFAULT NULL,
  `PRO_IMAGEN` varchar(500) DEFAULT NULL,
  `PRO_ESTADO` char(1) DEFAULT NULL,
  `PRO_STOCKMAX` int(11) DEFAULT NULL,
  `PRO_STOCKMIN` int(11) DEFAULT NULL,
  `PRO_ADD` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`PRO_ID`, `PRO_CODIGO`, `PRO_NOMBRE`, `PRO_DESCRIPCION`, `PRO_PRECIOCOMPRA`, `PRO_PRECIO_VENTA`, `PRO_IMAGEN`, `PRO_ESTADO`, `PRO_STOCKMAX`, `PRO_STOCKMIN`, `PRO_ADD`) VALUES
(1, 'PR001', 'Laptop', 'HP', '1.20', '2.40', NULL, 'A', 100, 10, '2020-09-04 00:00:16'),
(2, 'PR002', 'SSD 240 GB', 'ADATA', '0.10', '0.15', NULL, 'A', 10, 1, '2020-09-04 00:01:11');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistafactura`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistafactura` (
`PED_NUMERO` int(11)
,`CLI_NOMBRES` varchar(100)
,`CLI_DNI` int(11)
,`CLI_CELULAR` varchar(12)
,`CLI_CORREO` varchar(200)
,`PED_DIRECCION` varchar(200)
,`PRO_NOMBRE` varchar(100)
,`PRO_PRECIO_VENTA` decimal(8,2)
,`DEP_CANTIDAD` int(11)
,`DEP_PRECIOTOTAL` decimal(8,2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistafactura`
--
DROP TABLE IF EXISTS `vistafactura`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistafactura`  AS  select `tbl_pedido`.`PED_NUMERO` AS `PED_NUMERO`,`tbl_cliente`.`CLI_NOMBRES` AS `CLI_NOMBRES`,`tbl_cliente`.`CLI_DNI` AS `CLI_DNI`,`tbl_cliente`.`CLI_CELULAR` AS `CLI_CELULAR`,`tbl_cliente`.`CLI_CORREO` AS `CLI_CORREO`,`tbl_pedido`.`PED_DIRECCION` AS `PED_DIRECCION`,`tbl_producto`.`PRO_NOMBRE` AS `PRO_NOMBRE`,`tbl_producto`.`PRO_PRECIO_VENTA` AS `PRO_PRECIO_VENTA`,`tbl_detalle_pedido`.`DEP_CANTIDAD` AS `DEP_CANTIDAD`,`tbl_detalle_pedido`.`DEP_PRECIOTOTAL` AS `DEP_PRECIOTOTAL` from (((`tbl_pedido` join `tbl_detalle_pedido` on(`tbl_pedido`.`PED_ID` = `tbl_detalle_pedido`.`PED_ID`)) join `tbl_producto` on(`tbl_producto`.`PRO_ID` = `tbl_detalle_pedido`.`PRO_ID`)) join `tbl_cliente` on(`tbl_pedido`.`CLI_ID` = `tbl_cliente`.`CLI_ID`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  ADD PRIMARY KEY (`CAR_ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`EMP_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`DEP_ID`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`CLI_ID`);

--
-- Indices de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`DEP_ID`);

--
-- Indices de la tabla `tbl_detalle_pedido`
--
ALTER TABLE `tbl_detalle_pedido`
  ADD PRIMARY KEY (`DEP_CODIGO`),
  ADD KEY `FK_RELATIONSHIP_2` (`PED_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`PRO_ID`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indices de la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD PRIMARY KEY (`PED_ID`),
  ADD KEY `FK_RELATIONSHIP_1` (`CLI_ID`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  MODIFY `CAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `CLI_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  MODIFY `DEP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_pedido`
--
ALTER TABLE `tbl_detalle_pedido`
  MODIFY `DEP_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  MODIFY `PED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`EMP_ID`) REFERENCES `tbl_empleado` (`EMP_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`DEP_ID`) REFERENCES `tbl_departamento` (`DEP_ID`);

--
-- Filtros para la tabla `tbl_detalle_pedido`
--
ALTER TABLE `tbl_detalle_pedido`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`PED_ID`) REFERENCES `tbl_pedido` (`PED_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`PRO_ID`) REFERENCES `tbl_producto` (`PRO_ID`);

--
-- Filtros para la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`CLI_ID`) REFERENCES `tbl_cliente` (`CLI_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
