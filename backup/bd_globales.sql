

DROP DATABASE IF EXISTS `bd_globales` ;

CREATE  DATABASE  IF NOT EXISTS `bd_globales` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_globales` ;



-- ---------------------------------------------------
--                  Tabla_Managers
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Manager` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Manager`(
	`id_Manager`		VARCHAR(45) NOT NULL,
	`nombre_Manager`	VARCHAR(45) NOT NULL,
	`apellido_Manager`	VARCHAR(45) NOT NULL,
	`puesto_Manager`	VARCHAR(45) NOT NULL,

	PRIMARY KEY(`id_Manager`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--                  Tabla_Departamento
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Departamento` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Departamento`(
    `id_Departamento`       INT(3) NOT NULL AUTO_INCREMENT,
    `nombre_Departamento`   VARCHAR(45) NOT NULL,
    `id_Manager_Departamento` VARCHAR(45) NOT NULL,

    PRIMARY KEY(`id_Departamento`),
	FOREIGN KEY(`id_Manager_Departamento`) REFERENCES `bd_globales`.`tabla_Manager`(`id_Manager`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--                  Tabla_Usuarios
-- ---------------------------------------------------
-- tipo_Usuario : 0 -> Invitado, 1 -> Colaborador, -> 2 Manager
DROP TABLE IF EXISTS `bd_globales`.`tabla_Usuario` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Usuario`(
    `id_Usuario`        VARCHAR(45) NOT NULL,
    `nombre_Usuario`    VARCHAR(45) NOT NULL,
    `apellido_Usuario`  VARCHAR(45) NOT NULL,
	`password`			VARCHAR(10) NOT NULL,
    `puesto_Usuario`    VARCHAR(45) NOT NULL,
    `tipo_Usuario`      INT(1) NOT NULL,
    `estado_Usuario`    VARCHAR(45) NOT NULL,
	`id_Manager`		VARCHAR(45) NULL,

    PRIMARY KEY(`id_Usuario`),
	FOREIGN KEY(`id_Manager`) REFERENCES `bd_globales`.`tabla_Manager`(`id_Manager`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;


-- ---------------------------------------------------
--                  Tabla_Proyecto
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Proyecto` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Proyecto`(
    `id_Proyecto`       INT(10) NOT NULL,
    `nombre_Proyecto`   VARCHAR(45) NOT NULL,
    `inicio_Proyecto`   DATE NOT NULL,
    `fin_Proyecto`      DATE NOT NULL,
    `desc_Proyecto`     VARCHAR(45) NOT NULL,
    `estado_Proyecto`   VARCHAR(45) NOT NULL,
    `id_Proyect_Manager` VARCHAR(45) NOT NULL,

    PRIMARY KEY (`id_Proyecto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;


-- ---------------------------------------------------
--                  Tabla_Skill
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Skill` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Skill`(
    `id_Skill`      INT(3) NOT NULL AUTO_INCREMENT,
    `nombre_Skill`  VARCHAR(45) NOT NULL,

    PRIMARY KEY(`id_Skill`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--               Tabla_Skill_Usuario
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Skill_Usuario` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Skill_Usuario`(
    `id_Skill`      INT(3) NULL,
    `id_Usuario`    VARCHAR(20) NOT NULL,

    FOREIGN KEY(`id_Skill`) REFERENCES `bd_globales`.`tabla_Skill`(`id_Skill`),
    FOREIGN KEY(`id_Usuario`) REFERENCES `bd_globales`.`tabla_Usuario`(`id_Usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--            Tabla_Departamento_Usuario
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Departamento_Usuario` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Departamento_Usuario`(
    `id_Departamento`   INT(3) NOT NULL,
    `id_Usuario`        VARCHAR(20) NOT NULL,
    `fecha_Departamento` DATE NOT NULL,

    FOREIGN  KEY(`id_Departamento`) REFERENCES `bd_globales`.`tabla_Departamento`(`id_Departamento`),
    FOREIGN KEY(`id_Usuario`) REFERENCES `bd_globales`.`tabla_Usuario`(`id_Usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--            Tabla_Usuario_Proyecto
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Usuario_Proyecto` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Usuario_Proyecto`(
    `id_Usuario`    VARCHAR(20) NOT NULL,
    `id_Proyecto`   INT(10) NOT NULL,
    `tiempo_Dedicado` VARCHAR(45) NOT NULL,

    FOREIGN KEY(`id_Usuario`) REFERENCES `bd_globales`.`tabla_Usuario`(`id_Usuario`),
    FOREIGN KEY(`id_Proyecto`) REFERENCES `bd_globales`.`tabla_Proyecto`(`id_Proyecto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--            		INSERTCIONES
-- ---------------------------------------------------
-- ---------------------------------------------------
--            			ADMIN
-- ---------------------------------------------------
INSERT INTO `tabla_Usuario` VALUES ('123', 'admin', 'admin', 'root', '--' ,2 ,'--', NULL);

-- ---------------------------------------------------
--            	  	  MANAGERS
-- ---------------------------------------------------
INSERT INTO `tabla_Manager` VALUES ('121340567', 'Robin', 'Wallace', 'Develop');
INSERT INTO `tabla_Manager` VALUES ('134350983', 'Marthin', 'Gonz', 'QA');
INSERT INTO `tabla_Manager` VALUES ('140098323', 'Roberth', 'Smith', 'Tech Leader');
INSERT INTO `tabla_Manager` VALUES ('159877662', 'Laura', 'Mendoza', 'Support');

-- ---------------------------------------------------
--            	  	DEPARTAMENTOS
-- ---------------------------------------------------
INSERT INTO `tabla_Departamento` VALUES (DEFAULT, 'Develop','121340567');
INSERT INTO `tabla_Departamento` VALUES (DEFAULT, 'QA','134350983');
INSERT INTO `tabla_Departamento` VALUES (DEFAULT, 'Tech Leadership','140098323');
INSERT INTO `tabla_Departamento` VALUES (DEFAULT, 'Support','159877662');


-- ---------------------------------------------------
--            	  	Skills
-- ---------------------------------------------------
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'JavaScript');
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'C++');
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'C#');
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'Java');
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'Python');
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'C');
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'Ruby');
INSERT INTO `tabla_Skill` VALUES (DEFAULT, 'Kobol');


-- ---------------------------------------------------
--            	  EMPLEADOS NORMALES
-- ---------------------------------------------------
INSERT INTO `tabla_Usuario` VALUES ('116290648', 'Eithan', 'Mendez Mendez', 'qwsa', 'Programador' , 1 ,'Ocupado','121340567');
INSERT INTO `tabla_Usuario` VALUES ('120934505', 'Jack', 'Williams', 'wqsa1223', 'Programador' , 1 ,'Ocupado','121340567');

INSERT INTO `tabla_Usuario` VALUES ('102930934', 'Adam', 'Johnson', 'ssdder', 'Soporte Tecnico' , 1 ,'Disponible','159877662');
INSERT INTO `tabla_Usuario` VALUES ('234454556', 'Aaron', 'Garcia', 'gbnhju8', 'Soporte Tecnico' , 1 ,'Disponible','159877662');
INSERT INTO `tabla_Usuario` VALUES ('133344566', 'Ahmed', 'Rodriguez', 'sdwe234', 'Soporte Tecnico' , 1 ,'Disponible','159877662');

INSERT INTO `tabla_Usuario` VALUES ('343456654', 'Alexander', 'Miller', 'd4f55', 'Aseguramiento de calidad' ,1 ,'Nuevo ingreso','134350983');

INSERT INTO `tabla_Usuario` VALUES ('121340567', 'Robin', 'Wallace', 'man1', 'Manager',2,'Ocupado', NULL);
INSERT INTO `tabla_Usuario` VALUES ('134350983', 'Marthin', 'Gonz', 'man2', 'Manager',2,'Disponible', NULL);
INSERT INTO `tabla_Usuario` VALUES ('140098323', 'Roberth', 'Smith', 'man3', 'Manager',2,'Disponible', NULL);
INSERT INTO `tabla_Usuario` VALUES ('159877662', 'Laura', 'Mendoza', 'man4', 'Manager',2,'Disponible', NULL);

-- ---------------------------------------------------
--            	TABLAS INTERMEDIAS
-- ---------------------------------------------------
INSERT INTO `tabla_Skill_Usuario` VALUES (1,'116290648');
INSERT INTO `tabla_Skill_Usuario` VALUES (2,'116290648');
INSERT INTO `tabla_Skill_Usuario` VALUES (3,'116290648');

INSERT INTO `tabla_Skill_Usuario` VALUES (8,'102930934');
INSERT INTO `tabla_Skill_Usuario` VALUES (1,'102930934');
INSERT INTO `tabla_Skill_Usuario` VALUES (8,'102930934');

INSERT INTO `tabla_Skill_Usuario` VALUES (7,'234454556');
INSERT INTO `tabla_Skill_Usuario` VALUES (8,'133344566');
INSERT INTO `tabla_Skill_Usuario` VALUES (6,'121340567');
INSERT INTO `tabla_Skill_Usuario` VALUES (5,'134350983');

INSERT INTO `tabla_Skill_Usuario` VALUES (3,'159877662');
INSERT INTO `tabla_Skill_Usuario` VALUES (2,'159877662');
INSERT INTO `tabla_Skill_Usuario` VALUES (2,'159877662');
INSERT INTO `tabla_Skill_Usuario` VALUES (3,'121340567');

INSERT INTO `tabla_Departamento_Usuario` VALUES(1, '116290648', '06-01-2019');
INSERT INTO `tabla_Departamento_Usuario` VALUES(1, '120934505', '06-01-2019');

INSERT INTO `tabla_Departamento_Usuario` VALUES(4, '102930934', '06-01-2019');
INSERT INTO `tabla_Departamento_Usuario` VALUES(4, '234454556', '06-01-2019');
INSERT INTO `tabla_Departamento_Usuario` VALUES(4, '133344566', '06-01-2019');

INSERT INTO `tabla_Departamento_Usuario` VALUES(2, '343456654', '06-01-2019');

-- ------------------------------------------------------------------------------------------------------------
--            								VISTAS
-- ------------------------------------------------------------------------------------------------------------
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_proyectos_activos`  AS
  SELECT `tabla_proyecto`.`id_Proyecto` AS `id_Proyecto`,
		 `tabla_proyecto`.`nombre_Proyecto` AS `nombre_Proyecto`,
		 `tabla_proyecto`.`inicio_Proyecto` AS `inicio_Proyecto`,
		 `tabla_proyecto`.`fin_Proyecto` AS `fin_Proyecto`,
		 `tabla_proyecto`.`desc_Proyecto` AS `desc_Proyecto`,
		 `tabla_proyecto`.`estado_Proyecto` AS `estado_Proyecto`,
		 `tabla_proyecto`.`id_Proyect_Manager` AS `id_Proyect_Manager`
	FROM `tabla_proyecto` WHERE (`tabla_proyecto`.`estado_Proyecto` = 'activo') ;


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_colaborador_manager` AS
	SELECT `tu`.`nombre_Usuario` AS `nombre_Usuario`,
		   `tm`. `nombre_Manager` AS `nombre_Manager`,
		   `td`. `id_Departamento` AS `id_Departamento`
	FROM 	(`tabla_Usuario` `tu` join `tabla_Manager` `tm` join `tabla_Departamento` `td`)
	WHERE (`tm`.`id_Manager` = `tu`.`id_Manager`) AND (`tm`.`id_Manager` = `td`.`id_Manager_Departamento`);


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW vista_mostrar_todo_filtro AS
	SELECT  tabla_usuario.nombre_Usuario,
		    tabla_usuario.apellido_Usuario,
		    tabla_usuario.id_Usuario,
			tabla_departamento.nombre_Departamento,
			tabla_manager.nombre_Manager,
			tabla_manager.apellido_Manager,
			tabla_skill.nombre_Skill

	FROM 	tabla_usuario INNER JOIN tabla_skill_usuario ON tabla_usuario.id_Usuario=tabla_skill_usuario.id_Usuario
			INNER JOIN tabla_skill ON tabla_skill.id_Skill=tabla_skill_usuario.id_Skill
			INNER JOIN tabla_departamento_usuario ON tabla_usuario.id_Usuario=tabla_departamento_usuario.id_Usuario
			INNER JOIN tabla_departamento ON tabla_departamento.id_Departamento=tabla_departamento_usuario.id_Departamento
			INNER JOIN tabla_manager ON tabla_manager.id_Manager=tabla_departamento.id_Manager_Departamento
-- ------------------------------------------------------------------------------------------------------------
--            								VISTAS
-- ------------------------------------------------------------------------------------------------------------
