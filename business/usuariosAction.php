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
       isset($_POST['tipo']) &&
       isset($_POST['estado'])) {

        if($business->insertar_usuario($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['pass'], $_POST['puesto'], $_POST['tipo'], $_POST['estado'])) {
            $text = array('status' => "true", 'error'=>"");
        } else {
            $text = array('status' => "false", 'error'=>"Error al insertar en la bd");
        }

   } else { $text = array('status' => "false", 'error'=>"Error dato vacios");}
   
   echo json_encode($text);
} else if($accion == 'modificar_usuario') {

} else if($accion == 'eliminar_usuario') {

} else if($accion == 'mostrar_usuario') {
        $business->mostrar_usuarios();


} else { $text = array('status' => "false", 'error'=>"Error dato vacios");}


