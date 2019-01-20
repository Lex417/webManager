<?php

include "usuariosBusiness.php";

/* ---------PARAMETROS------------ */
$accion=$_POST['accion'];
$business=new usuariosBusiness();
/* ------------------------------- */

if($accion == 'insertar_usuario') {
    $text = null;
    if(isset($_POST['cedula']) &&
       isset($_POST['nombre']) &&
       isset($_POST['apellido']) &&
       isset($_POST['pass']) &&
       isset($_POST['puesto']) &&
       isset($_POST['equipo']) &&
       isset($_POST['tipo'])) {

        if($business->insertar_usuario($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['pass'], $_POST['puesto'], $_POST['equipo'], $_POST['tipo'])) {
            $text = array('status' => "true", 'error'=>"");
        } else {
            $text = array('status' => "false", 'error'=>"Error al insertar en la bd");
        }

   } else { $text = array('status' => "false", 'error'=>"Error dato vacios");}
   
   echo json_encode($text);

   
} else if($accion == 'mostrarNotificaciones'){
        $business->mostrarNotificaciones();

}else if($accion == 'obtenerNombreManagerActual'){
        $idProyecto=$_POST['idProyecto'];
        $business->obtenerNombreManagerActual($idProyecto);

}else if($accion == 'mostrar_usuarios_proyecto') {

    $id=$_POST['id'];
    $business->obtener_colaboradores_proyecto($id);


} else if($accion == 'eliminar_usuario') {
        $text = null;
        if($business->eliminar_usuario($_POST['id'])){
                $text = array('status' => "true", 'error'=>""); 
        } else {
                $text = array('status' => "false", 'error'=>"Error al eliminar en la bd"); 
        }
        echo json_encode($text);

} else if($accion == 'editar_usuario') {
        $text = null;
        if($business->editar_usuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['puesto'], $_POST['equipo'], $_POST['tipo'])){
                $text = array('status' => "true", 'error'=>"");   
        } else {
                $text = array('status' => "false", 'error'=>"Error al modificar en la bd");
        }
        echo json_encode($text);

} else if($accion == 'obtener_usuario') {
        $business->obtener_usuario($_POST['id']);

} else if($accion == 'mostrar_usuario') {
        $business->mostrar_usuarios();


} else if($accion == 'count_usuarios') {
        $business->contar_usuarios();

} else if($accion == 'cambio_pagina') {
        if(isset($_POST['pagina'])&&isset($_POST['limite'])) {
            $business->cambiar_pagina($_POST['pagina'], $_POST['limite']);
    } 

}else if($accion == 'obtenerNombresManagers'){
        $business->obtenerNombresManagers();
        
} else if($accion == 'filtrar') {
        $business->busqueda_por_filtro($_POST['palabra'], $_POST['tip_filtro']);

} else if($accion == 'obtener_puestos') {
        $business->obtener_puestos();

} else if($accion == 'obtener_equipos') {
        $business->obtener_equipos();

}else if($accion=='obtenerSkillUsuario'){
    $cedUsuario = $_POST['cedUsuario'];
    echo $business->obtenerSkillUsuario($cedUsuario);
}else if($accion=='eliminarSkillColaborador'){
    $idSkillColaborador = $_POST['idSkillColaborador'];
    echo $business->eliminarSkillColaborador($idSkillColaborador);
}else if($accion=='obtenerSkill'){
    echo $business->obtenerSkill();
}else if($accion=='agregarHabilidad'){
        $cedulaColaborador = $_POST['cedulaColaborador'];
        $idSkill = $_POST['idSkill'];
        echo $business->agregarHabilidad($cedulaColaborador,$idSkill);
}else { 
        $text = array('status' => "false", 'error'=>"Error dato vacios");
}




