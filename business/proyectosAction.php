<?php 
    // Aqui se reciben la informacion proveniente del js.
    include "proyectosBusiness.php";
    $accion=$_POST['accion'];
    $business=new proyectosBusiness();
    if($accion=="obtenerVistaProyectos"){
        echo $business->obtenerVistaPreviaProyecto();
    }


?>