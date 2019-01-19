-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2019 a las 20:41:28
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
-- Base de datos: `bdglobales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablacolaborador`
--

CREATE TABLE `tablacolaborador` (
  `idColaborador` int(11) NOT NULL,
  `idPuestoColaborador` int(11) NOT NULL,
  `tipoColaborador` varchar(25) NOT NULL,
  `idEquipoTrabajo` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablacolaborador`
--

INSERT INTO `tablacolaborador` (`idColaborador`, `idPuestoColaborador`, `tipoColaborador`, `idEquipoTrabajo`, `idPersona`) VALUES
(1, 2, 'colaborador', 1, 1),
(2, 1, 'colaborador', 1, 2),
(3, 1, 'TM', 1, 3),
(4, 1, 'PM', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablacomentario`
--

CREATE TABLE `tablacomentario` (
  `idComentario` int(11) NOT NULL,
  `idNegocio` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fechaComentario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabladepartamento`
--

CREATE TABLE `tabladepartamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombreDepartamento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabladepartamento`
--

INSERT INTO `tabladepartamento` (`idDepartamento`, `nombreDepartamento`) VALUES
(1, 'TI'),
(2, 'Desarrollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaequipotrabajo`
--

CREATE TABLE `tablaequipotrabajo` (
  `idEquipoTrabajo` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `nombreEquipoTrabajo` varchar(25) NOT NULL,
  `idTeamManager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaequipotrabajo`
--

INSERT INTO `tablaequipotrabajo` (`idEquipoTrabajo`, `idDepartamento`, `nombreEquipoTrabajo`, `idTeamManager`) VALUES
(1, 2, 'PDA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablanegocio`
--

CREATE TABLE `tablanegocio` (
  `idNegocio` int(11) NOT NULL,
  `nombreNegocio` varchar(25) DEFAULT NULL,
  `tipoCedulaNegocio` varchar(25) DEFAULT NULL,
  `cedulaNegocio` varchar(25) DEFAULT NULL,
  `planNegocio` varchar(25) DEFAULT NULL,
  `fechaIncripcionNegocio` date DEFAULT NULL,
  `tipoTarjeta` varchar(50) DEFAULT NULL,
  `digitosTarjetaNegocio` varchar(4) DEFAULT NULL,
  `correoElectronicoNegocio` varchar(50) DEFAULT NULL,
  `passwordNegocio` varchar(10) DEFAULT NULL,
  `estadoNegocio` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablanotificacion`
--

CREATE TABLE `tablanotificacion` (
  `idNotificacion` int(11) NOT NULL,
  `idManagerPeticionNotificacion` int(11) NOT NULL,
  `idColaboradorNotificacion` int(11) NOT NULL,
  `idProyectoNotificacion` int(11) NOT NULL,
  `idManagerAceptacionNotificacion` int(11) NOT NULL,
  `estadoNotificacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaobjetivoproyecto`
--

CREATE TABLE `tablaobjetivoproyecto` (
  `idObjetivoProyecto` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `descripcionObjetivoProyecto` text NOT NULL,
  `estadoObjetivoProyecto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaobjetivoproyecto`
--

INSERT INTO `tablaobjetivoproyecto` (`idObjetivoProyecto`, `idProyecto`, `descripcionObjetivoProyecto`, `estadoObjetivoProyecto`) VALUES
(1, 1, 'Realizar Conexión con hacienda', 'finalizado'),
(1, 1, 'Realizar Interfaz De Login', 'activo');

INSERT INTO `tablaobjetivoproyecto` (`idProyecto`,`descripcionObjetivoProyecto`,`estadoObjetivoProyecto`)
VALUES
(2, 'Wireframe', 'activo'),
(2, 'Vistas', 'activo'),
(2, 'Bases de datos', 'finalizado'),
(2, 'CRUDS', 'finalizado'),
(2, 'Funcionalides', 'finalizado'),
(2, 'Documentación', 'finalizado'),
(2, 'Deploy', 'finalizado'),


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablapersona`
--

CREATE TABLE `tablapersona` (
  `idPersona` int(11) NOT NULL,
  `cedulaPersona` varchar(25) NOT NULL,
  `nombrePersona` varchar(25) NOT NULL,
  `apellidoPersona` varchar(25) NOT NULL,
  `passwordPersona` varchar(25) NOT NULL,
  `estadoPersona` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablapersona`
--

INSERT INTO `tablapersona` (`idPersona`, `cedulaPersona`, `nombrePersona`, `apellidoPersona`, `passwordPersona`, `estadoPersona`) VALUES
(1, '90054321', 'Ana', 'Romero', 'ana1234', 'activo'),
(2, '305678990', 'Kenner', 'Alvarado', 'ken1234', 'activo'),
(3, '500087662', 'Luis', 'Guzman', 'lu1234', 'activo'),
(4, '399007712', 'Tatiana', 'Garro', 'ta1234', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaprojectmanager`
--

CREATE TABLE `tablaprojectmanager` (
  `idProjectManager` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaprojectmanager`
--

INSERT INTO `tablaprojectmanager` (`idProjectManager`, `idPersona`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaproyecto`
--

CREATE TABLE `tablaproyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreProyecto` varchar(25) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `descripcionProyecto` text NOT NULL,
  `estadoProyecto` varchar(15) NOT NULL,
  `idProjectManager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaproyecto`
--

INSERT INTO `tablaproyecto` (`idProyecto`, `nombreProyecto`, `fechaInicio`, `fechaFinal`, `descripcionProyecto`, `estadoProyecto`, `idProjectManager`) VALUES
(1, 'PFE', '2019-01-03', '2019-03-30', 'Proyecto de Factura Elect', 'activo', 1),
(2, 'PPV', '2019-02-16', '2019-03-31', 'Proyecto de Punto de Vent', 'activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaproyectocolaborador`
--

CREATE TABLE `tablaproyectocolaborador` (
  `idProyectoColaborador` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `idColaborador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaproyectocolaborador`
--

INSERT INTO `tablaproyectocolaborador` (`idProyectoColaborador`, `idProyecto`, `idColaborador`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablapuesto`
--

CREATE TABLE `tablapuesto` (
  `idPuesto` int(11) NOT NULL,
  `nombrePuesto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablapuesto`
--

INSERT INTO `tablapuesto` (`idPuesto`, `nombrePuesto`) VALUES
(1, 'Desarrollo'),
(2, 'DBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaskill`
--

CREATE TABLE `tablaskill` (
  `idSkill` int(11) NOT NULL,
  `nombreSkill` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaskill`
--

INSERT INTO `tablaskill` (`idSkill`, `nombreSkill`) VALUES
(1, 'JAVA'),
(2, 'CSS'),
(3, 'SQL Server');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaskillcolaborador`
--

CREATE TABLE `tablaskillcolaborador` (
  `idSkillColaborador` int(11) NOT NULL,
  `idSkill` int(11) NOT NULL,
  `idColaborador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablaskillcolaborador`
--

INSERT INTO `tablaskillcolaborador` (`idSkillColaborador`, `idSkill`, `idColaborador`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablateammanager`
--

CREATE TABLE `tablateammanager` (
  `idTeamManager` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tablateammanager`
--

INSERT INTO `tablateammanager` (`idTeamManager`, `idPersona`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablatransaccion`
--

CREATE TABLE `tablatransaccion` (
  `idTransaccion` int(11) NOT NULL,
  `nTransaccion` text NOT NULL,
  `fechaTransacion` date NOT NULL,
  `idNegocio` int(11) NOT NULL,
  `digitosTarjetaTransaccion` varchar(4) NOT NULL,
  `tipoTarjetaTransaccion` varchar(25) NOT NULL,
  `estadoTransaccion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tablacolaborador`
--
ALTER TABLE `tablacolaborador`
  ADD PRIMARY KEY (`idColaborador`),
  ADD KEY `idPuestoColaborador` (`idPuestoColaborador`),
  ADD KEY `idEquipoTrabajo` (`idEquipoTrabajo`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `tablacomentario`
--
ALTER TABLE `tablacomentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idNegocio` (`idNegocio`);

--
-- Indices de la tabla `tabladepartamento`
--
ALTER TABLE `tabladepartamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `tablaequipotrabajo`
--
ALTER TABLE `tablaequipotrabajo`
  ADD PRIMARY KEY (`idEquipoTrabajo`),
  ADD KEY `idDepartamento` (`idDepartamento`),
  ADD KEY `idTeamManager` (`idTeamManager`);

--
-- Indices de la tabla `tablanegocio`
--
ALTER TABLE `tablanegocio`
  ADD PRIMARY KEY (`idNegocio`);

--
-- Indices de la tabla `tablanotificacion`
--
ALTER TABLE `tablanotificacion`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD KEY `idManagerPeticionNotificacion` (`idManagerPeticionNotificacion`),
  ADD KEY `idColaboradorNotificacion` (`idColaboradorNotificacion`),
  ADD KEY `idProyectoNotificacion` (`idProyectoNotificacion`),
  ADD KEY `idManagerAceptacionNotificacion` (`idManagerAceptacionNotificacion`);

--
-- Indices de la tabla `tablaobjetivoproyecto`
--
ALTER TABLE `tablaobjetivoproyecto`
  ADD PRIMARY KEY (`idObjetivoProyecto`),
  ADD KEY `idProyecto` (`idProyecto`);

--
-- Indices de la tabla `tablapersona`
--
ALTER TABLE `tablapersona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `tablaprojectmanager`
--
ALTER TABLE `tablaprojectmanager`
  ADD PRIMARY KEY (`idProjectManager`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `tablaproyecto`
--
ALTER TABLE `tablaproyecto`
  ADD PRIMARY KEY (`idProyecto`),
  ADD KEY `idProjectManager` (`idProjectManager`);

--
-- Indices de la tabla `tablaproyectocolaborador`
--
ALTER TABLE `tablaproyectocolaborador`
  ADD PRIMARY KEY (`idProyectoColaborador`),
  ADD KEY `idColaborador` (`idColaborador`),
  ADD KEY `idProyecto` (`idProyecto`);

--
-- Indices de la tabla `tablapuesto`
--
ALTER TABLE `tablapuesto`
  ADD PRIMARY KEY (`idPuesto`);

--
-- Indices de la tabla `tablaskill`
--
ALTER TABLE `tablaskill`
  ADD PRIMARY KEY (`idSkill`);

--
-- Indices de la tabla `tablaskillcolaborador`
--
ALTER TABLE `tablaskillcolaborador`
  ADD PRIMARY KEY (`idSkillColaborador`),
  ADD KEY `idSkill` (`idSkill`),
  ADD KEY `idColaborador` (`idColaborador`);

--
-- Indices de la tabla `tablateammanager`
--
ALTER TABLE `tablateammanager`
  ADD PRIMARY KEY (`idTeamManager`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `tablatransaccion`
--
ALTER TABLE `tablatransaccion`
  ADD PRIMARY KEY (`idTransaccion`),
  ADD KEY `idNegocio` (`idNegocio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tablacolaborador`
--
ALTER TABLE `tablacolaborador`
  MODIFY `idColaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tablacomentario`
--
ALTER TABLE `tablacomentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabladepartamento`
--
ALTER TABLE `tabladepartamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tablaequipotrabajo`
--
ALTER TABLE `tablaequipotrabajo`
  MODIFY `idEquipoTrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tablanegocio`
--
ALTER TABLE `tablanegocio`
  MODIFY `idNegocio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablanotificacion`
--
ALTER TABLE `tablanotificacion`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablaobjetivoproyecto`
--
ALTER TABLE `tablaobjetivoproyecto`
  MODIFY `idObjetivoProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tablapersona`
--
ALTER TABLE `tablapersona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tablaprojectmanager`
--
ALTER TABLE `tablaprojectmanager`
  MODIFY `idProjectManager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tablaproyecto`
--
ALTER TABLE `tablaproyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tablaproyectocolaborador`
--
ALTER TABLE `tablaproyectocolaborador`
  MODIFY `idProyectoColaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tablapuesto`
--
ALTER TABLE `tablapuesto`
  MODIFY `idPuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tablaskill`
--
ALTER TABLE `tablaskill`
  MODIFY `idSkill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tablaskillcolaborador`
--
ALTER TABLE `tablaskillcolaborador`
  MODIFY `idSkillColaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tablateammanager`
--
ALTER TABLE `tablateammanager`
  MODIFY `idTeamManager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tablatransaccion`
--
ALTER TABLE `tablatransaccion`
  MODIFY `idTransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tablacolaborador`
--
ALTER TABLE `tablacolaborador`
  ADD CONSTRAINT `tablacolaborador_ibfk_1` FOREIGN KEY (`idPuestoColaborador`) REFERENCES `tablapuesto` (`idPuesto`),
  ADD CONSTRAINT `tablacolaborador_ibfk_2` FOREIGN KEY (`idEquipoTrabajo`) REFERENCES `tablaequipotrabajo` (`idEquipoTrabajo`),
  ADD CONSTRAINT `tablacolaborador_ibfk_3` FOREIGN KEY (`idPersona`) REFERENCES `tablapersona` (`idPersona`);

--
-- Filtros para la tabla `tablacomentario`
--
ALTER TABLE `tablacomentario`
  ADD CONSTRAINT `tablacomentario_ibfk_1` FOREIGN KEY (`idNegocio`) REFERENCES `tablanegocio` (`idNegocio`);

--
-- Filtros para la tabla `tablaequipotrabajo`
--
ALTER TABLE `tablaequipotrabajo`
  ADD CONSTRAINT `tablaequipotrabajo_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `tabladepartamento` (`idDepartamento`),
  ADD CONSTRAINT `tablaequipotrabajo_ibfk_2` FOREIGN KEY (`idTeamManager`) REFERENCES `tablateammanager` (`idTeamManager`);

--
-- Filtros para la tabla `tablanotificacion`
--
ALTER TABLE `tablanotificacion`
  ADD CONSTRAINT `tablanotificacion_ibfk_1` FOREIGN KEY (`idManagerPeticionNotificacion`) REFERENCES `tablaprojectmanager` (`idProjectManager`),
  ADD CONSTRAINT `tablanotificacion_ibfk_2` FOREIGN KEY (`idColaboradorNotificacion`) REFERENCES `tablacolaborador` (`idColaborador`),
  ADD CONSTRAINT `tablanotificacion_ibfk_3` FOREIGN KEY (`idProyectoNotificacion`) REFERENCES `tablaproyecto` (`idProyecto`),
  ADD CONSTRAINT `tablanotificacion_ibfk_4` FOREIGN KEY (`idManagerAceptacionNotificacion`) REFERENCES `tablateammanager` (`idTeamManager`);

--
-- Filtros para la tabla `tablaobjetivoproyecto`
--
ALTER TABLE `tablaobjetivoproyecto`
  ADD CONSTRAINT `tablaobjetivoproyecto_ibfk_1` FOREIGN KEY (`idProyecto`) REFERENCES `tablaproyecto` (`idProyecto`);

--
-- Filtros para la tabla `tablaprojectmanager`
--
ALTER TABLE `tablaprojectmanager`
  ADD CONSTRAINT `tablaprojectmanager_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tablapersona` (`idPersona`);

--
-- Filtros para la tabla `tablaproyecto`
--
ALTER TABLE `tablaproyecto`
  ADD CONSTRAINT `tablaproyecto_ibfk_1` FOREIGN KEY (`idProjectManager`) REFERENCES `tablaprojectmanager` (`idProjectManager`);

--
-- Filtros para la tabla `tablaproyectocolaborador`
--
ALTER TABLE `tablaproyectocolaborador`
  ADD CONSTRAINT `tablaproyectocolaborador_ibfk_1` FOREIGN KEY (`idColaborador`) REFERENCES `tablacolaborador` (`idColaborador`),
  ADD CONSTRAINT `tablaproyectocolaborador_ibfk_2` FOREIGN KEY (`idProyecto`) REFERENCES `tablaproyecto` (`idProyecto`);

--
-- Filtros para la tabla `tablaskillcolaborador`
--
ALTER TABLE `tablaskillcolaborador`
  ADD CONSTRAINT `tablaskillcolaborador_ibfk_1` FOREIGN KEY (`idSkill`) REFERENCES `tablaskill` (`idSkill`),
  ADD CONSTRAINT `tablaskillcolaborador_ibfk_2` FOREIGN KEY (`idColaborador`) REFERENCES `tablacolaborador` (`idColaborador`);

--
-- Filtros para la tabla `tablateammanager`
--
ALTER TABLE `tablateammanager`
  ADD CONSTRAINT `tablateammanager_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tablapersona` (`idPersona`);

--
-- Filtros para la tabla `tablatransaccion`
--
ALTER TABLE `tablatransaccion`
  ADD CONSTRAINT `tablatransaccion_ibfk_1` FOREIGN KEY (`idNegocio`) REFERENCES `tablanegocio` (`idNegocio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
