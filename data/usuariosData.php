<?php

class usuariosData {

    private $objetoConexion;

    function __construct() {
        include "conexion.php";
        $conexion=new conexion();
        $this->objetoConexion=$conexion->crearConexion();
    }

// INSERTA UN USUARIO EN  LA BD
    function insertar($cedula, $nombre, $apellido, $pass, $puesto, $equipo, $tipo) {

        $sql = $this->objetoConexion->prepare('CALL proc_agregar_colaborador(?,?,?,?,?,?,?)');
        if($sql->execute([$cedula, $nombre, $apellido, $pass, $puesto, $equipo, $tipo])) {
            return true;
        } else {
            return false;
        }
    }

// EDITA UN USUARIO EN LA BD
    function editar($id, $nombre, $apellido, $puesto, $equipo, $tipo) {
        $sql = $this->objetoConexion->prepare('CALL proc_editar_colaborador(?,?,?,?,?,?)');
        if($sql->execute([$id, $nombre, $apellido, $puesto, $equipo, $tipo])){ return true;}
        else{return false;}
    }

// OBTIENE LA INFORMACION DEL USUARIO QUE SE DESEA EDITAR
    function obtener_usuario($id) {
        $sql = $this->objetoConexion->prepare('SELECT cedulaPersona, nombrePersona, apellidoPersona, nombrePuesto, nombreEquipoTrabajo, tipoColaborador FROM vista_obtener_colaborador WHERE cedulaPersona ='.$id.'');
        $sql->execute(['activo']);
        $lista=array();
        while($valor=$sql->fetch()) {
            $usuario=array('cedulaPersona'=>$valor['cedulaPersona'],
                           'nombrePersona'=>$valor['nombrePersona'],
                           'apellidoPersona'=>$valor['apellidoPersona'],
                           'nombrePuesto'=>$valor['nombrePuesto'],
                           'nombreEquipoTrabajo'=>$valor['nombreEquipoTrabajo'],
                           'tipoColaborador'=>$valor['tipoColaborador']);
            array_push($lista,$usuario);
        }
        echo json_encode($lista);
    }

// ELIMINA UN USUARIO EN LA BD
    function eliminar($id) {
        $sql = $this->objetoConexion->prepare('CALL proc_eliminar_colaborador('.$id.')');
        if($sql->execute(['activo'])){ return true;}
        else{return false;}
    }

// BUSCA UNA VISTA 'vista_colaborador_manager' EN LA BD (Modificar con base nueva)
    function vista_colaborador_manager() {
        $sql = $this->objetoConexion->prepare('SELECT nombre_Usuario, nombre_Manager, id_Departamento FROM  vista_colaborador_manager');
        $sql->execute(['activo']);
        $lista=array();
        while($valor=$sql->fetch()) {
            $objeto=array('nombre_Usuario'=>$valor['nombre_Usuario'],
                          'nombre_Manager'=>$valor['nombre_Manager'],
                          'id_Departamento'=>$valor['id_Departamento']);
            array_push($lista,$objeto);
        }
        echo json_encode($lista);
    }

// cuenta la cantidad de registros de tabla_usuarios
    function contar_usuarios() {
        $sql = $this->objetoConexion->prepare('SELECT COUNT(*) FROM vista_informacion');
        $sql->execute(['activo']);
        $valor=array();
        while($fila=$sql->fetch()){
            $numero=array('size'=>$fila['COUNT(*)']);
            array_push($valor,$numero);
        }
        echo json_encode($valor);
    }

// presenta la tabla 
function cambiar_pagina($newNum, $limite) {
    $sql = $this->objetoConexion->prepare('SELECT cedulaPersona, nombrePersona, apellidoPersona, nombrePuesto, estadoColaborador FROM vista_informacion LIMIT '. $newNum .','. $limite .'');
    $sql->execute(['activo']);
    $lista_usuarios=array();
    while($fila=$sql->fetch()){
        $usuario=array('cedulaPersona'=>$fila['cedulaPersona'],
                           'nombrePersona'=>$fila['nombrePersona'],
                           'apellidoPersona'=>$fila['apellidoPersona'],
                           'nombrePuesto'=>$fila['nombrePuesto'],
                           'estadoColaborador'=>$fila['estadoColaborador']);
        array_push($lista_usuarios,$usuario);
    }
    echo json_encode($lista_usuarios);
}

// cumple la funcion de un SELECT *
    function select_all_usuarios() {
        $sql = $this->objetoConexion->prepare('SELECT id_Usuario, nombre_Usuario, password, apellido_Usuario, puesto_Usuario, estado_Usuario FROM tabla_Usuario');
        $sql->execute(['activo']);
        $lista_usuarios=array();
        while($fila=$sql->fetch()){
            $usuario=array('id_Usuario'=>$fila['id_Usuario'],
                           'nombre_Usuario'=>$fila['nombre_Usuario'],
                           'password'=>$fila['password'],
                           'apellido_Usuario'=>$fila['apellido_Usuario'],
                           'puesto_Usuario'=>$fila['puesto_Usuario'],
                           'estado_Usuario'=>$fila['estado_Usuario']);
        array_push($lista_usuarios,$usuario);
    }
    echo json_encode($lista_usuarios);
}

// obtiene los colaboradores por area de trabajo (Modificar con base nueva)
    function obtener_colaboradores_proyecto($id_Proyecto) {
        $sql = $this->objetoConexion->prepare("select distinct per.cedulaPersona, nombrePersona, apellidoPersona,nombrePuesto, tipoColaborador ,estadoPersona  from tablapersona per ,tablaproyectocolaborador tpcolb, tablapuesto,tablacolaborador tcol where tpcolb.idProyecto = '$id_Proyecto' and tpcolb.idProyectoColaborador = tcol.idColaborador and per.idPersona = tcol.idColaborador;
        ");
        $sql->execute(['activo']);
        $lista_usuarios=array();
        while($fila=$sql->fetch()){
            $usuario=array('id_Usuario'=>$fila['cedulaPersona'],
                           'nombre_Usuario'=>$fila['nombrePersona'],
                           'apellido_Usuario'=>$fila['apellidoPersona'],
                           'puesto_Usuario'=>$fila['nombrePuesto'],
                           'tipo_Usuario'=>$fila['tipoColaborador'],
                           'estado_Usuario'=>$fila['estadoPersona']);
            array_push($lista_usuarios,$usuario);
        }
         echo json_encode($lista_usuarios);
    }

// obtiene la informacion segun el filtro seleccionado y la palabra buscada (en tiempo real)
    function busqueda_filtrada($palabra, $filtro) {
        $sql = $this->objetoConexion->prepare("SELECT cedulaPersona, nombrePersona, apellidoPersona, nombrePuesto, estadoColaborador FROM vista_informacion WHERE ". $filtro ." LIKE  '%". $palabra ."%'");
        $sql->execute(['activo']);
        $lista_usuarios=array();
        while($fila=$sql->fetch()) {
            $usuario=array('cedulaPersona'=>$fila['cedulaPersona'],
                           'nombrePersona'=>$fila['nombrePersona'],
                           'apellidoPersona'=>$fila['apellidoPersona'],
                           'nombrePuesto'=>$fila['nombrePuesto'],
                           'estadoColaborador'=>$fila['estadoColaborador']);
            array_push($lista_usuarios,$usuario);
        }
        echo json_encode($lista_usuarios);
    }

// otiene los puestos disponibles de la BD
    function obtener_puestos() {
        $sql = $this->objetoConexion->prepare('SELECT idPuesto, nombrePuesto FROM tablapuesto');
        $sql->execute(['activo']);
        $lista_puestos=array();
        while($fila=$sql->fetch()) {
            $puesto=array('idPuesto'=>$fila['idPuesto'],
                          'nombrePuesto'=>$fila['nombrePuesto']);
        array_push($lista_puestos,$puesto);
        }
        echo json_encode($lista_puestos);
    }

// obtiene los equipos disponibles de la BD
    function obtener_equipos() {
        $sql = $this->objetoConexion->prepare('SELECT idEquipoTrabajo, nombreEquipoTrabajo FROM tablaequipotrabajo');
        $sql->execute(['activo']);
        $lista_equipos=array();
        while($fila=$sql->fetch()) {
            $equipo=array('idEquipoTrabajo'=>$fila['idEquipoTrabajo'],
                          'nombreEquipoTrabajo'=>$fila['nombreEquipoTrabajo']);
        array_push($lista_equipos,$equipo);
        }
        echo json_encode($lista_equipos);
    }
    function obtenerNombresManagers(){
        $sql = $this->objetoConexion->prepare("SELECT nombrePersona,pm.idProjectManager from tablapersona per inner join tablaprojectmanager pm on per.idPersona = pm.idPersona;");
        $sql->execute(['activo']);
        $lista_equipos=array();
        while($fila=$sql->fetch()) {
            $equipo=array('nombreManager'=>$fila['nombrePersona'],
            'idManager'=>$fila['idProjectManager']);
        array_push($lista_equipos,$equipo);
        }
        echo json_encode($lista_equipos);
    }
    function obtenerNombreManagerActual($idProyecto){
        $sql = $this->objetoConexion->prepare("SELECT per.nombrePersona,tpm.idProjectManager from tablapersona per inner join tablaprojectmanager tpm on tpm.idPersona = per.idPersona inner join tablaproyecto tp on tp.idProjectManager = tpm.idProjectManager where idProyecto = '$idProyecto';");
        $sql->execute(['activo']);
        $lista_equipos=array();
        while($fila=$sql->fetch()) {
            $equipo=array('nombreManager'=>$fila['nombrePersona'],
            'idManager'=>$fila['idProjectManager']);
        array_push($lista_equipos,$equipo);
        }
        echo json_encode($lista_equipos);

    }

}

?>
