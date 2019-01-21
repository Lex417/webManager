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


// obtiene los colaboradores por area de trabajo (Modificar con base nueva)
    function obtener_colaboradores_proyecto($id_Proyecto) {
        $sql = $this->objetoConexion->prepare("SELECT  per.cedulaPersona, nombrePersona, apellidoPersona,nombrePuesto, tipoColaborador ,estadoPersona from tablapersona per inner join tablacolaborador tcol  on per.idPersona = tcol.idPersona inner join tablaproyectocolaborador tpcolb on tpcolb.idColaborador = tcol.idColaborador inner join tablapuesto pu on tcol.idPuestoColaborador = pu.idPuesto where tpcolb.idProyecto = '$id_Proyecto';");
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
    function mostrarNotificaciones(){
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

    function obtenerSkillUsuario($cedUsuario){
        $stmt=$this->objetoConexion->prepare('SELECT tablaSkillColaborador.idSkillColaborador, tablaSkill.nombreSkill from tablaSkillColaborador inner join tablaColaborador on tablaColaborador.idColaborador=tablaSkillColaborador.idColaborador inner join tablaPersona on tablaColaborador.idPersona=tablaPersona.idPersona inner join tablaSkill on tablaSkill.idSkill = tablaSkillColaborador.idSkill where tablaPersona.cedulaPersona=?');
        $stmt->execute([$cedUsuario]);
        $Skills=array();
        while($fila=$stmt->fetch()){
                $listaSkills=array('idSkiCol'=>$fila['idSkillColaborador'],'nomSkill'=>$fila['nombreSkill']);
                
                array_push($Skills,$listaSkills);
        }
        
        
        return json_encode($Skills);

    }

    function eliminarSkillColaborador($idSkillColaborador){
        $stmt=$this->objetoConexion->prepare('DELETE FROM tablaSkillColaborador WHERE idSkillColaborador = ?');
        if($stmt->execute([$idSkillColaborador])){
            return true;
        }else{
            return false;
        }
    }

    function obtenerSkill(){
        $stmt=$this->objetoConexion->prepare('SELECT nombreSkill,idSkill FROM tablaskill');
        $stmt->execute();
        $listaSkills=array();
        while($fila=$stmt->fetch()){
                $skill=array('nomSkill'=>$fila['nombreSkill'],'idSki'=>$fila['idSkill']);                
                array_push($listaSkills,$skill);
        }
        return json_encode($listaSkills);
    }

    function agregarHabilidad($cedulaColaborador,$idSkill){
        $stmt=$this->objetoConexion->prepare('SELECT idColaborador FROM tablacolaborador INNER JOIN tablapersona ON tablacolaborador.idpersona = tablapersona.idpersona WHERE tablapersona.cedulaPersona=?');
        $stmt->execute([$cedulaColaborador]);
        $idColaborador="";
        while($fila=$stmt->fetch()){
            $idColaborador=$fila['idColaborador'];                
        }
        $stmt=$this->objetoConexion->prepare('SELECT idColaborador FROM tablaskillcolaborador WHERE idSkill=? AND idColaborador = ?');
        $stmt->execute([$idSkill,$idColaborador]);
        $bandera = true;
        while($fila=$stmt->fetch()){
            $bandera = false;
        }
        if($bandera){
            $stmt=$this->objetoConexion->prepare('INSERT INTO tablaskillcolaborador(idSkill,idColaborador) VALUES(?,?)');
            $stmt->execute([$idSkill,$idColaborador]);
            $data = array();
            $text = array('status' => "success", 'mensaje'=>"Se insertó correctamente");
            array_push($data, $text);
            echo json_encode($data);
        }else{
            $data = array();
            $text = array('status' => "error", 'mensaje'=>"Ya posee la habilidad asignada");
            array_push($data, $text);
            echo json_encode($data);
        }
        
    }

    function pagarMembresia($nomTarjeta,$numeroTarjeta,$fechaTarjeta,$codTarjeta,$cedEmpresa,$contEmpresa){
         
          $numeroTarjeta= substr($numeroTarjeta,0,-4); 
        
        $stmt=$this->objetoConexion->prepare('UPDATE  tablanegocio SET planNegocio=?,tipoTarjeta=?,digitosTarjetaNegocio=?,fechaTarjetaNegocio=?  WHERE passwordNegocio=? AND cedulaNegocio=? AND estadoNegocio=?');
        $stmt->execute(['Mensual','VISA',$numeroTarjeta,$fechaTarjeta,$contEmpresa,$cedEmpresa,'activo']);    
        
        if($stmt->rowCount()>0){
            $data = array();
            $text = array('status' => "success", 'mensaje'=>"El pago se realizó correctamente");
            array_push($data, $text);
            echo json_encode($data);
        }else{
            $data = array();
            $text = array('status' => "error", 'mensaje'=>"El pago no se realizó correctamente");
            array_push($data, $text);
            echo json_encode($data);
        }
    }

}

?>
