

create table if not exists tablaPersona(idPersona int AUTO_INCREMENT NOT NULL,cedulaPersona VARCHAR(25) not null,
 nombrePersona int not NULL,apellidoPersona VARCHAR(25) NOT NULL,passwordPersona VARCHAR(25) NOT NULL, estadoPersona VARCHAR(25) NOT NULL,
	PRIMARY KEY(idPersona));	

create table if not exists tablaSkill(idSkill int AUTO_INCREMENT not NULL, nombreSkill VARCHAR(15) not NULL, 
	PRIMARY KEY(idSkill));

create table if not exists tablaPuesto(idPuesto int AUTO_INCREMENT not null,nombrePuesto VARCHAR(15),
 PRIMARY KEY(idPuesto));

create table if not exists tablaProjectManager(idProjectManager int AUTO_INCREMENT not null, idPersona int not null, 
	PRIMARY KEY(idProjectManager),FOREIGN KEY (idPersona) REFERENCES tablaPersona(idPersona));

create table if not exists tablaTeamManager(idTeamManager int AUTO_INCREMENT not null, idPersona int not null, 
	PRIMARY KEY(idTeamManager),FOREIGN KEY (idPersona) REFERENCES tablaPersona(idPersona));	

create table if not exists tablaDepartamento(idDepartamento int AUTO_INCREMENT not null, nombreDepartamento VARCHAR(25) not null,
PRIMARY KEY (idDepartamento));

create table if not exists tablaProyecto(idProyecto int AUTO_INCREMENT not null, 
	nombreProyecto VARCHAR(25) not null,fechaInicio date not null,fechaFinal date not null,
	descripcionProyecto VARCHAR(25) not null,estadoProyecto VARCHAR(15) not null, idProjectManager int not null,
PRIMARY KEY(idProyecto),FOREIGN KEY (idProjectManager) REFERENCES tablaProjectManager(idProjectManager));

create table if not exists tablaEquipoTrabajo(idEquipoTrabajo int AUTO_INCREMENT not null,idDepartamento int not null,
	nombreEquipoTrabajo VARCHAR(25) not null,idTeamManager int not null,	
PRIMARY KEY(idEquipoTrabajo),FOREIGN KEY (idDepartamento) REFERENCES tablaDepartamento(idDepartamento),
FOREIGN KEY (idTeamManager) REFERENCES tablaTeamManager(idTeamManager));


create table if not exists tablaColaborador(idColaborador int AUTO_INCREMENT not null,
idPuestoColaborador int not null,tipoColaborador VARCHAR(25) not null,
idEquipoTrabajo int not null,idPersona int NOT NULL,	
PRIMARY KEY(idColaborador),FOREIGN KEY (idPuestoColaborador) REFERENCES tablaPuesto(idPuesto),
FOREIGN KEY (idEquipoTrabajo) REFERENCES tablaEquipoTrabajo(idEquipoTrabajo),
FOREIGN KEY (idPersona) REFERENCES tablaPersona(idPersona));

create table if not exists tablaNotificacion(idNotificacion int AUTO_INCREMENT not null, idManagerPeticionNotificacion int not null,
 idColaboradorNotificacion int not null,idProyectoNotificacion int not null,idManagerAceptacionNotificacion int not null, estadoNotificacion VARCHAR(10) not null,
 PRIMARY KEY(idNotificacion),FOREIGN KEY (idManagerPeticionNotificacion) REFERENCES tablaProjectManager(idProjectManager),FOREIGN KEY (idColaboradorNotificacion) 
 REFERENCES tablaColaborador(idColaborador),FOREIGN KEY (idProyectoNotificacion) REFERENCES tablaProyecto(idProyecto),
  FOREIGN KEY (idManagerAceptacionNotificacion) REFERENCES tablaTeamManager(idTeamManager));

create table if not exists tablaObjetivoProyecto(idObjetivoProyecto int AUTO_INCREMENT not null,idProyecto int not null,
descripcionObjetivoProyecto varchar(25) not null, estadoObjetivoProyecto varchar(10) not null, PRIMARY KEY(idObjetivoProyecto),
 FOREIGN KEY (idProyecto) REFERENCES tablaProyecto(idProyecto));

create table if not exists tablaProyectoColaborador(idProyectoColaborador int AUTO_INCREMENT not null, idProyecto int not null,
idColaborador int not null, PRIMARY KEY(idProyectoColaborador),FOREIGN KEY (idColaborador) REFERENCES tablaColaborador(idColaborador),
FOREIGN KEY (idProyecto) REFERENCES tablaProyecto(idProyecto));

create table if not exists tablaSkillColaborador(idSkillColaborador int AUTO_INCREMENT not null,idSkill int not null, 
	idColaborador int not null, PRIMARY KEY(idSkillColaborador),FOREIGN KEY (idSkill) REFERENCES tablaSkill(idSkill),
	FOREIGN KEY (idColaborador) REFERENCES tablaColaborador(idColaborador));


create table if not exists tablaNegocio(idNegocio int AUTO_INCREMENT NOT NULL, nombreNegocio VARCHAR(25) , 
tipoCedulaNegocio VARCHAR(25) , cedulaNegocio VARCHAR(25) , planNegocio VARCHAR(25) , fechaIncripcionNegocio DATE , 
tipoTarjeta VARCHAR(50) ,digitosTarjetaNegocio VARCHAR(4) ,correoElectronicoNegocio VARCHAR(50) ,
passwordNegocio VARCHAR(10) , estadoNegocio VARCHAR(15) , PRIMARY KEY(idNegocio));

create table if not exists tablaTransaccion(idTransaccion int AUTO_INCREMENT NOT NULL, nTransaccion TEXT NOT NULL, fechaTransacion DATE NOT NULL,
idNegocio int NOT NULL,digitosTarjetaTransaccion VARCHAR(4) NOT NULL, tipoTarjetaTransaccion VARCHAR (25) NOT NULL, estadoTransaccion VARCHAR(15) NOT NULL, 
PRIMARY KEY(idTransaccion),FOREIGN KEY (idNegocio) REFERENCES tablaNegocio (idNegocio) );