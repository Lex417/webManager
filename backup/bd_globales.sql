-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2019 a las 20:59:30
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_globales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_departamento`
--

CREATE TABLE `tabla_departamento` (
  `id_Departamento` int(3) NOT NULL,
  `nombre_Departamento` varchar(45) NOT NULL,
  `id_Manager_Departamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_departamento_usuario`
--

CREATE TABLE `tabla_departamento_usuario` (
  `id_Departamento` int(3) NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `fecha_Departamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_proyecto`
--

CREATE TABLE `tabla_proyecto` (
  `id_Proyecto` int(10) NOT NULL,
  `nombre_Proyecto` varchar(45) NOT NULL,
  `inicio_Proyecto` date NOT NULL,
  `fin_Proyecto` date NOT NULL,
  `desc_Proyecto` varchar(45) NOT NULL,
  `estado_Proyecto` varchar(45) NOT NULL,
  `id_Proyect_Manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_proyecto`
--

INSERT INTO `tabla_proyecto` (`id_Proyecto`, `nombre_Proyecto`, `inicio_Proyecto`, `fin_Proyecto`, `desc_Proyecto`, `estado_Proyecto`, `id_Proyect_Manager`) VALUES
(0, 'Proyecto RUBY', '2019-01-03', '2019-01-24', 'sdsdsds', 'inactivo', 1),
(1, 'Proyecto JAVA', '2019-01-03', '2019-01-24', 'sdsdsds', 'activo', 1),
(2, 'Proyecto C++', '2019-01-24', '2019-02-01', 'dddddd', 'activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_skill`
--

CREATE TABLE `tabla_skill` (
  `id_Skill` int(3) NOT NULL,
  `nombre_Skill` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_skill_usuario`
--

CREATE TABLE `tabla_skill_usuario` (
  `id_Skill` int(3) DEFAULT NULL,
  `id_Usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_usuario`
--

CREATE TABLE `tabla_usuario` (
  `id_Usuario` varchar(45) NOT NULL,
  `nombre_Usuario` varchar(45) NOT NULL,
  `password` varchar(10) NOT NULL,
  `apellido_Usuario` varchar(45) NOT NULL,
  `puesto_Usuario` varchar(45) NOT NULL,
  `tipo_Usuario` varchar(45) NOT NULL,
  `estado_Usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_usuario_proyecto`
--

CREATE TABLE `tabla_usuario_proyecto` (
  `id_Usuario` varchar(20) NOT NULL,
  `id_Proyecto` int(10) NOT NULL,
  `tiempo_Dedicado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_proyectos_activos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_proyectos_activos` (
`id_Proyecto` int(10)
,`nombre_Proyecto` varchar(45)
,`inicio_Proyecto` date
,`fin_Proyecto` date
,`desc_Proyecto` varchar(45)
,`estado_Proyecto` varchar(45)
,`id_Proyect_Manager` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_proyectos_activos`
--
DROP TABLE IF EXISTS `vista_proyectos_activos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_proyectos_activos`  AS  select `tabla_proyecto`.`id_Proyecto` AS `id_Proyecto`,`tabla_proyecto`.`nombre_Proyecto` AS `nombre_Proyecto`,`tabla_proyecto`.`inicio_Proyecto` AS `inicio_Proyecto`,`tabla_proyecto`.`fin_Proyecto` AS `fin_Proyecto`,`tabla_proyecto`.`desc_Proyecto` AS `desc_Proyecto`,`tabla_proyecto`.`estado_Proyecto` AS `estado_Proyecto`,`tabla_proyecto`.`id_Proyect_Manager` AS `id_Proyect_Manager` from `tabla_proyecto` where (`tabla_proyecto`.`estado_Proyecto` = 'activo') ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_departamento`
--
ALTER TABLE `tabla_departamento`
  ADD PRIMARY KEY (`id_Departamento`);

--
-- Indices de la tabla `tabla_departamento_usuario`
--
ALTER TABLE `tabla_departamento_usuario`
  ADD KEY `id_Departamento` (`id_Departamento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tabla_proyecto`
--
ALTER TABLE `tabla_proyecto`
  ADD PRIMARY KEY (`id_Proyecto`);

--
-- Indices de la tabla `tabla_skill`
--
ALTER TABLE `tabla_skill`
  ADD PRIMARY KEY (`id_Skill`);

--
-- Indices de la tabla `tabla_skill_usuario`
--
ALTER TABLE `tabla_skill_usuario`
  ADD KEY `id_Skill` (`id_Skill`),
  ADD KEY `id_Usuario` (`id_Usuario`);

--
-- Indices de la tabla `tabla_usuario`
--
ALTER TABLE `tabla_usuario`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- Indices de la tabla `tabla_usuario_proyecto`
--
ALTER TABLE `tabla_usuario_proyecto`
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Proyecto` (`id_Proyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_skill`
--
ALTER TABLE `tabla_skill`
  MODIFY `id_Skill` int(3) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla_departamento_usuario`
--
ALTER TABLE `tabla_departamento_usuario`
  ADD CONSTRAINT `tabla_departamento_usuario_ibfk_1` FOREIGN KEY (`id_Departamento`) REFERENCES `tabla_departamento` (`id_Departamento`),
  ADD CONSTRAINT `tabla_departamento_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tabla_usuario` (`id_Usuario`);

--
-- Filtros para la tabla `tabla_skill_usuario`
--
ALTER TABLE `tabla_skill_usuario`
  ADD CONSTRAINT `tabla_skill_usuario_ibfk_1` FOREIGN KEY (`id_Skill`) REFERENCES `tabla_skill` (`id_Skill`),
  ADD CONSTRAINT `tabla_skill_usuario_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `tabla_usuario` (`id_Usuario`);

--
-- Filtros para la tabla `tabla_usuario_proyecto`
--
ALTER TABLE `tabla_usuario_proyecto`
  ADD CONSTRAINT `tabla_usuario_proyecto_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `tabla_usuario` (`id_Usuario`),
  ADD CONSTRAINT `tabla_usuario_proyecto_ibfk_2` FOREIGN KEY (`id_Proyecto`) REFERENCES `tabla_proyecto` (`id_Proyecto`);
COMMIT;


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_colaborador_manager` AS
	SELECT `tu`.`nombre_Usuario` AS `nombre_Usuario`,
		   `tm`. `nombre_Manager` AS `nombre_Manager`,
		   `td`. `id_Departamento` AS `id_Departamento`
	FROM 	(`tabla_Usuario` `tu` join `tabla_Manager` `tm` join `tabla_Departamento` `td`)
	WHERE (`tm`.`id_Manager` = `tu`.`id_Manager`) AND (`td`.`id_Departamento` = `tm`.`id_Departamento`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

