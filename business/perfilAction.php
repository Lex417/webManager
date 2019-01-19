<?php

include "perfilActivoBusiness.php";

/* ---------PARAMETROS------------ */
$accion=$_POST['accion'];
$businesss = new perfilActivoBusiness();
/* ------------------------------- */


if ($accion == 'mostrarProyectoActivos') {
     $businesss->mostrarProyectosActivos();

} else { $text = array('status' => "false", 'error'=>"Error dato vacios");
}

