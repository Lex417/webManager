

DROP DATABASE IF EXISTS `bd_globales` ;

CREATE  DATABASE  IF NOT EXISTS `bd_globales` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_globales` ;

-- ---------------------------------------------------
--                  Tabla_Usuarios
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Usuario` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Usuario`(
    `id_Usuario`        VARCHAR(45) NOT NULL,
    `nombre_Usuario`    VARCHAR(45) NOT NULL,
    `password`          VARCHAR(10) NOT NULL,
    `apellido_Usuario`  VARCHAR(45) NOT NULL,
    `puesto_Usuario`    VARCHAR(45) NOT NULL,
    `tipo_Usuario`      VARCHAR(45) NOT NULL,
    `estado_Usuario`    VARCHAR(45) NOT NULL,
    
    PRIMARY KEY(`id_Usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--                  Tabla_Proyecto
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Proyecto` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Proyecto`(
    `id_Proyecto`       INT(10) NOT NULL,
    `nombre_Proyecto`   DATE NOT NULL,
    `inicio_Proyecto`   DATE NOT NULL,
    `fin_Proyecto`      VARCHAR(45) NOT NULL,
    `desc_Proyecto`     VARCHAR(45) NOT NULL,
    `estado_Proyecto`   VARCHAR(45) NOT NULL,
    `id_Proyect_Manager` VARCHAR(45) NOT NULL,

    PRIMARY KEY (`id_Proyecto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8 COLLATE utf8_general_ci;

-- ---------------------------------------------------
--                  Tabla_Departamento
-- ---------------------------------------------------
DROP TABLE IF EXISTS `bd_globales`.`tabla_Departamento` ;
CREATE TABLE IF NOT EXISTS `bd_globales`.`tabla_Departamento`(
    `id_Departamento`       INT(3) NOT NULL,
    `nombre_Departamento`   VARCHAR(45) NOT NULL,
    `id_Manager_Departamento` VARCHAR(45) NOT NULL,

    PRIMARY KEY(`id_Departamento`))
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
    `id_usuario`        VARCHAR(20) NOT NULL,
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
