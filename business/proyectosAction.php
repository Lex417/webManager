<?php 
    
    include "proyectosBusiness.php";
    $accion=$_POST['accion'];
    $business=new proyectosBusiness();
    if($accion=="obtenerVistaProyectos"){
        echo $business->obtenerVistaPreviaProyecto();
    }


?>