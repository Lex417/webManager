<?php

include "perfilActivoBusiness.php";

/* ---------PARAMETROS------------ */
$accion=$_POST['accion'];
$business = new perfilActivoBusiness();
/* ------------------------------- */


if ($accion == 'mostrarProyectoActivos') {
     $business->mostrarProyectosActivos();

} else if($accion == 'ver_perfil') {
     $business->mostrarPerfil($_POST['cedula']);
     
} else if($accion == 'editar_perfil') {
     $text = null;
     if($business->editarPerfil($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['pass'], $_POST['estado'])){
          $text = array('status' => "true", 'error'=>""); 
     } else { $text = array('status' => "false", 'error'=>"Ocurrio un error.."); }
     echo json_encode($text);
     

} else { $text = array('status' => "false", 'error'=>"Error dato vacios");
}

