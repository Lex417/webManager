-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2019 a las 05:32:31
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdglobales`
--
DROP DATABASE IF EXISTS `bdglobales` ;
CREATE  DATABASE  IF NOT EXISTS `bdglobales` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdglobales` ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablacolaborador`
--
DROP TABLE IF EXISTS `bdglobales`.`tablacolaborador`;

CREATE TABLE `tablacolaborador` (
  `idColaborador` int(11) NOT NULL,
  `idPuestoColaborador` int(11) NOT NULL,
  `tipoColaborador` varchar(25) NOT NULL,
  `passwordColaborador` varchar(25) NOT NULL,
  `idEquipoTrabajo` int(11) NOT NULL,
  `estadoColaborador` varchar(15) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablapersona`
--
DROP TABLE IF EXISTS `bdglobales`.`tablapersona`;

CREATE TABLE `tablapersona` (
  `idPersona` int(11) NOT NULL,
  `cedulaPersona` varchar(25) NOT NULL,
  `nombrePersona` varchar(25) NOT NULL,
  `apellidoPersona` varchar(25) NOT NULL,
  `passwordPersona` varchar(25) NOT NULL,
  `estadoPersona` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabladepartamento`
--
DROP TABLE IF EXISTS `bdglobales`.`tabladepartamento`;

CREATE TABLE `tabladepartamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombreDepartamento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaequipotrabajo`
--
DROP TABLE IF EXISTS `bdglobales`.`tablaequipotrabajo`;

CREATE TABLE `tablaequipotrabajo` (
  `idEquipoTrabajo` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `nombreEquipoTrabajo` varchar(25) NOT NULL,
  `idTeamManager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablanegocio`
--
DROP TABLE IF EXISTS `bdglobales`.`tablanegocio`;

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
DROP TABLE IF EXISTS `bdglobales`.`tablanotificacion`;

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
DROP TABLE IF EXISTS `bdglobales`.`tablaobjetivoproyecto`;

CREATE TABLE `tablaobjetivoproyecto` (
  `idObjetivoProyecto` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `descripcionObjetivoProyecto` varchar(25) NOT NULL,
  `estadoObjetivoProyecto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `tablaprojectmanager`
--
DROP TABLE IF EXISTS `bdglobales`.`tablaprojectmanager`;

CREATE TABLE `tablaprojectmanager` (
  `idProjectManager` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaproyecto`
--
DROP TABLE IF EXISTS `bdglobales`.`tablaproyecto`;

CREATE TABLE `tablaproyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreProyecto` varchar(25) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `descripcionProyecto` varchar(25) NOT NULL,
  `estadoProyecto` varchar(15) NOT NULL,
  `idProjectManager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaproyectocolaborador`
--
DROP TABLE IF EXISTS `bdglobales`.`tablaproyectocolaborador`;

CREATE TABLE `tablaproyectocolaborador` (
  `idProyectoColaborador` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `idColaborador` int(11) NOT NULL,
  `estadoProyectoColaborador` VARCHAR(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablapuesto`
--
DROP TABLE IF EXISTS `bdglobales`.`tablapuesto`;

CREATE TABLE `tablapuesto` (
  `idPuesto` int(11) NOT NULL,
  `nombrePuesto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaskill`
--
DROP TABLE IF EXISTS `bdglobales`.`tablaskill`;

CREATE TABLE `tablaskill` (
  `idSkill` int(11) NOT NULL,
  `nombreSkill` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablaskillcolaborador`
--
DROP TABLE IF EXISTS `bdglobales`.`tablaskillcolaborador`;

CREATE TABLE `tablaskillcolaborador` (
  `idSkillColaborador` int(11) NOT NULL,
  `idSkill` int(11) NOT NULL,
  `idColaborador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablateammanager`
--
DROP TABLE IF EXISTS `bdglobales`.`tablateammanager`;

CREATE TABLE `tablateammanager` (
  `idTeamManager` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablatransaccion`
--
DROP TABLE IF EXISTS `bdglobales`.`tablatransaccion`;

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
  MODIFY `idColaborador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabladepartamento`
--
ALTER TABLE `tabladepartamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablaequipotrabajo`
--
ALTER TABLE `tablaequipotrabajo`
  MODIFY `idEquipoTrabajo` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idObjetivoProyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablapersona`
--
ALTER TABLE `tablapersona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablaprojectmanager`
--
ALTER TABLE `tablaprojectmanager`
  MODIFY `idProjectManager` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablaproyecto`
--
ALTER TABLE `tablaproyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablaproyectocolaborador`
--
ALTER TABLE `tablaproyectocolaborador`
  MODIFY `idProyectoColaborador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablapuesto`
--
ALTER TABLE `tablapuesto`
  MODIFY `idPuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablaskill`
--
ALTER TABLE `tablaskill`
  MODIFY `idSkill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablaskillcolaborador`
--
ALTER TABLE `tablaskillcolaborador`
  MODIFY `idSkillColaborador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tablateammanager`
--
ALTER TABLE `tablateammanager`
  MODIFY `idTeamManager` int(11) NOT NULL AUTO_INCREMENT;

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


--
-- FUNCIONES
--
DROP FUNCTION IF EXISTS obtener_manager;
DELIMITER //

CREATE FUNCTION obtener_manager(id INT(11)) RETURNS VARCHAR(20)
BEGIN
	DECLARE res VARCHAR(20);
	SET res = (SELECT CONCAT(`tp`.`nombrePersona`,' ',`tp`.`apellidoPersona`) AS `Manager` FROM (`tablapersona` `tp`) WHERE (id = `tp`.`idPersona`));
	RETURN res;
END //
DELIMITER ;

--
-- VISTAS
--
DROP VIEW IF EXISTS `vista_informacion`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_informacion` AS
	SELECT `tp`.`cedulaPersona` AS `cedulaPersona`, `tp`.`nombrePersona` AS `nombrePersona`,
		   `tp`.`apellidoPersona` AS `apellidoPersona`, `tpu`.`nombrePuesto` AS `nombrePuesto`,
		   `tc`.`estadoColaborador` AS `estadoColaborador`
		   
	FROM (`tablapersona` `tp` JOIN `tablacolaborador` `tc` JOIN `tablapuesto` `tpu`)
	WHERE(`tp`.`idPersona` = `tc`.`idPersona`) AND (`tpu`.`idPuesto` = `tc`.`idPuestoColaborador`);
	
	
	
	

DROP VIEW IF EXISTS `vista_obtener_colaborador`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_obtener_colaborador` AS
	SELECT `tp`.`cedulaPersona` AS `cedulaPersona`, `tp`.`nombrePersona` AS `nombrePersona`,
		   `tp`.`apellidoPersona` AS `apellidoPersona`, `tpu`.`nombrePuesto` AS `nombrePuesto`,
		   `te`.`nombreEquipoTrabajo` AS `nombreEquipoTrabajo`, `tc`.`tipoColaborador` AS `tipoColaborador`
		   
	FROM (`tablapersona` `tp` JOIN `tablapuesto` `tpu` JOIN `tablaequipotrabajo` `te` JOIN `tablacolaborador` `tc`)
	WHERE(`tp`.`idPersona` = `tc`.`idPersona`) AND (`tpu`.`idPuesto` = `tc`.`idPuestoColaborador`) AND (`te`.`idEquipoTrabajo` = `tc`.`idEquipoTrabajo`);
	

  DROP VIEW IF EXISTS `vista_departamentos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_departamentos` AS
    SELECT `tp`.`nombrePersona` AS `nombrePersona`,`tp`.`apellidoPersona` AS `apellidoPersona`,
		   `tet`.`nombreEquipoTrabajo` AS `nombreEquipoTrabajo`,`td`.`nombreDepartamento` AS `nombreDepartamento`,
		   obtener_manager(`tet`.`idTeamManager`) AS `Manager`
		   
	FROM(`tablapersona` `tp` JOIN `tablacolaborador` `tc` JOIN `tablaequipotrabajo` `tet` JOIN `tabladepartamento` `td`)
	WHERE(`tp`.`idPersona` = `tc`.`idPersona`) 
	AND (`tet`.`idEquipoTrabajo` = `tc`.`idEquipoTrabajo`) 
	AND (`tet`.`idDepartamento` = `td`.`idDepartamento`)
	AND (`tc`.`tipoColaborador`<> 'Team Manager')
	AND (`tc`.`tipoColaborador`<> 'Project Manager');
	
--
-- PROCEDIMIENTOS ALMACENADOS
--


DROP PROCEDURE IF EXISTS `proc_agregar_colaborador`;
DELIMITER $$
CREATE PROCEDURE `bdglobales`.`proc_agregar_colaborador`(IN `cedula_usuario` VARCHAR(25), IN `nombre_usuario` VARCHAR(25), IN `apellido_usuario` VARCHAR(25), IN `pass_usuario` VARCHAR(25), IN `puesto_usuario` INT(11), IN `equipo_trabajo` INT(11), IN `tipo_usuario` VARCHAR(25))
BEGIN
	DECLARE id_auto_inc_persona INT(11);	
	INSERT INTO `tablapersona` VALUES(NULL, cedula_usuario, nombre_usuario, apellido_usuario, pass_usuario, 'Activo');
	SET id_auto_inc_persona = (SELECT idPersona FROM `tablapersona` WHERE cedulaPersona = cedula_usuario);
	
	IF tipo_usuario = 'Colaborador' THEN
		INSERT INTO `tablacolaborador` VALUES (NULL, puesto_usuario, tipo_usuario, pass_usuario, equipo_trabajo,'Activo', id_auto_inc_persona);
		
	ELSEIF tipo_usuario = 'Team Manager' THEN
		INSERT INTO `tablateammanager` VALUES (NULL, id_auto_inc_persona);
	
	ELSEIF tipo_usuario = 'Proyect Manager' THEN
		INSERT INTO `tablaprojectmanager` VALUES (NULL, id_auto_inc_persona);
	END IF;
END $$
DELIMITER ;



DROP PROCEDURE IF EXISTS `proc_editar_colaborador`;
DELIMITER $$
CREATE PROCEDURE `bdglobales`.`proc_editar_colaborador`(IN `cedula_usuario` VARCHAR(25), IN `nombre_usuario` VARCHAR(25), IN `apellido_usuario` VARCHAR(25), IN `puesto_usuario` INT(11), IN `equipo_trabajo` INT(11), IN `tipo_usuario` VARCHAR(25))
BEGIN

	DECLARE id_auto_inc_persona INT(11);
	DECLARE tipo_anterior VARCHAR(25);
	SET id_auto_inc_persona = (SELECT idPersona FROM `tablapersona` WHERE cedulaPersona = cedula_usuario);
	
		UPDATE `tablapersona` 
		SET	cedulaPersona = cedula_usuario,
			nombrePersona = nombre_usuario,
			apellidoPersona = apellido_usuario
		WHERE idPersona = id_auto_inc_persona;
		
		UPDATE `tablacolaborador`
		SET idPuestoColaborador = puesto_usuario,
			tipoColaborador = tipo_usuario,
			idEquipoTrabajo = equipo_trabajo
		WHERE idPersona = id_auto_inc_persona;
		
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS `proc_eliminar_colaborador`;
DELIMITER $$
CREATE PROCEDURE `bdglobales`.`proc_eliminar_colaborador`(IN `cedula_usuario` VARCHAR(25))
BEGIN
	DECLARE id_auto_inc_persona INT(11);
	SET id_auto_inc_persona = (SELECT idPersona FROM `tablapersona` WHERE cedulaPersona = cedula_usuario);
	
	UPDATE `tablapersona`
	SET estadoPersona = 'Inactivo'
	WHERE idPersona = id_auto_inc_persona;
	
	UPDATE `tablacolaborador`
	SET estadoColaborador = 'Inactivo'
	WHERE idPersona = id_auto_inc_persona;
	
END $$
DELIMITER ;



--
-- INSERCIONES
--

-- ------------------DEPARTAMENTOS--------------------------------
INSERT INTO `tabladepartamento` VALUES(NULL, 'Desarrollo');
INSERT INTO `tabladepartamento` VALUES(NULL, 'Soporte Técnico');
INSERT INTO `tabladepartamento` VALUES(NULL, 'Quality Assurance');
INSERT INTO `tabladepartamento` VALUES(NULL, 'Team Leadership');
-- ----------------------------------------------------------------

-- --------------------PUESTOS------------------------------------
INSERT INTO `tablapuesto` VALUES(NULL,'Desarrollador Front End');
INSERT INTO `tablapuesto` VALUES(NULL, 'Soportista');
INSERT INTO `tablapuesto` VALUES(NULL, 'Ingeniero QA');
INSERT INTO `tablapuesto` VALUES(NULL,'Desarrollador Back End');
INSERT INTO `tablapuesto` VALUES(NULL, 'Team Leader');
-- ---------------------------------------------------------------


-- --------------------SKILLS---------------------------------------------------------------
INSERT INTO `tablaskill` VALUES(NULL,'C++');
INSERT INTO `tablaskill` VALUES(NULL,'C');
INSERT INTO `tablaskill` VALUES(NULL,'C#');
INSERT INTO `tablaskill` VALUES(NULL,'Java');
INSERT INTO `tablaskill` VALUES(NULL,'Python');
INSERT INTO `tablaskill` VALUES(NULL,'Javascript');
INSERT INTO `tablaskill` VALUES(NULL,'Typescript');
INSERT INTO `tablaskill` VALUES(NULL,'Ruby');
INSERT INTO `tablaskill` VALUES(NULL,'Scheme');
INSERT INTO `tablaskill` VALUES(NULL,'Prolog');
INSERT INTO `tablaskill` VALUES(NULL,'PHP');
INSERT INTO `tablaskill` VALUES(NULL,'SQL');
-- --------------------------------------------------------------------------------------------

-- ---------------------------------PERSONAS---------------------------------------------------
INSERT INTO `tablapersona` VALUES(NULL, '121340567', 'Robin', 'Wallace', 'man1', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '134350983', 'Marthin', 'Gonz', 'man2', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '140098323', 'Roberth', 'Smith', 'man3', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '159877662', 'Laura', 'Mendoza', 'man4', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '120059873', 'Alfonzo', 'Cascante', 'prom1', 'Activo');
-- ------------------------------TEAM MANAGERS-------------------------------------------------
INSERT INTO `tablateammanager` VALUE(NULL,1);
INSERT INTO `tablateammanager` VALUE(NULL,2);
INSERT INTO `tablateammanager` VALUE(NULL,3);
INSERT INTO `tablateammanager` VALUE(NULL,4);
-- -----------------------------------------------------------------------------------------------
-- -----------------------------PROJECT MANAGERS--------------------------------------------------
INSERT INTO `tablaprojectmanager` VALUE(NULL,5);
-- ----------------------------PERSONAS-COLABORADORES---------------------------------------------
INSERT INTO `tablapersona` VALUES(NULL, '116290648', 'Eithan', 'Mendez Mendez', 'qwsa', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '120934505', 'Jack', 'Williams', 'wqsa1223', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '102930934', 'Adam', 'Johnson', 'ssdder', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '234454556', 'Aaron', 'Garcia', 'gbnhju8', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '133344566', 'Ahmed', 'Rodriguez', 'sdwe234', 'Activo');
INSERT INTO `tablapersona` VALUES(NULL, '343456654', 'Alexander', 'Miller', 'd4f55', 'Activo');
-- -----------------------------------------------------------------------------------------------

-- ---------------------------EQUIPOS-DE-TRABAJO---------------------------------------------------
INSERT INTO `tablaequipotrabajo` VALUES(NULL,1,'Develop-Team',1);
INSERT INTO `tablaequipotrabajo` VALUES(NULL,2,'Support-Team',2);
INSERT INTO `tablaequipotrabajo` VALUES(NULL,3,'QA-Team',3);
INSERT INTO `tablaequipotrabajo` VALUES(NULL,4,'TL-Team',4);
-- -------------------------------------------------------------------------------------------------

-- ----------------------------COLABORADORES--------------------------------------------------------
INSERT INTO `tablacolaborador` VALUES(NULL,5,'Team Manager','man1',1,'Activo',1);
INSERT INTO `tablacolaborador` VALUES(NULL,5,'Team Manager','man2',2,'Activo',2);
INSERT INTO `tablacolaborador` VALUES(NULL,5,'Team Manager','man3',3,'Activo',3);
INSERT INTO `tablacolaborador` VALUES(NULL,5,'Project Manager','man4',4,'Activo',4);

INSERT INTO `tablacolaborador` VALUES(NULL,1,'Colaborador','qwsa',1,'Activo',5);
INSERT INTO `tablacolaborador` VALUES(NULL,1,'Colaborador','wqsa1223',1,'Activo',6);
INSERT INTO `tablacolaborador` VALUES(NULL,2,'Colaborador','ssdder',2,'Activo',7);
INSERT INTO `tablacolaborador` VALUES(NULL,2,'Colaborador','gbnhju8',2,'Activo',8);
INSERT INTO `tablacolaborador` VALUES(NULL,2,'Colaborador','sdwe234',2,'Activo',9);
INSERT INTO `tablacolaborador` VALUES(NULL,3,'Colaborador','d4f55',3,'Activo',10);
-- --------------------------------------------------------------------------------------------------

-- ------------------------------PROYECTOS-----------------------------------------------------------
INSERT INTO `tablaproyecto` VALUES(NULL, 'PFE', '2019-01-03', '2019-03-30', 'Proyecto de Factura Elect', 'activo',1);
INSERT INTO `tablaproyecto` VALUES(NULL, 'PPV', '2019-02-16', '2019-03-31', 'Proyecto de Punto de Vent', 'activo',1);
-- ---------------------------OBJETIVOS PROYECTO-----------------------------------------------------
INSERT INTO `tablaobjetivoproyecto` VALUES(NULL,1,'Realizar conexion con hacienda', 'activo');
INSERT INTO `tablaobjetivoproyecto` VALUES(NULL,1,'Crear formulario de inscripcion', 'activo');
INSERT INTO `tablaobjetivoproyecto` VALUES(NULL,2,'Conectarse a la Base de Datos', 'activo');
INSERT INTO `tablaobjetivoproyecto` VALUES(NULL,2,'Hacer las ventanas responsive', 'activo');
-- ---------------------------------------------------------------------------------------------------
-- -----------------------COLABORADORES DE PROYECTO---------------------------------------------------
INSERT INTO `tablaproyectocolaborador` VALUES(NULL,1,1,'Activo');
INSERT INTO `tablaproyectocolaborador` VALUES(NULL,1,5,'Activo');
INSERT INTO `tablaproyectocolaborador` VALUES(NULL,1,6,'Activo');
INSERT INTO `tablaproyectocolaborador` VALUES(NULL,2,2,'Activo');
INSERT INTO `tablaproyectocolaborador` VALUES(NULL,2,7,'Activo');
INSERT INTO `tablaproyectocolaborador` VALUES(NULL,2,8,'Activo');
-- ------------------------SKILL DE COLABORADORES--------------------------------------------------------
INSERT INTO `tablaskillcolaborador` VALUES(NULL,1,3);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,12,5);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,7,6);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,7,7);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,8,8);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,9,9);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,1,1);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,2,2);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,4,2);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,6,7);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,9,2);
INSERT INTO `tablaskillcolaborador` VALUES(NULL,1,5);










/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
