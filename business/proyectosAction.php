<?php 
    // Aqui se reciben la informacion proveniente del js.
    include "proyectosBusiness.php";
    $accion=$_POST['accion'];
    $business=new proyectosBusiness();
    if($accion=="obtenerVistaProyectos"){
        echo $business->obtenerVistaPreviaProyecto();
    }
    
    /*if($accion=="insertar" && isset($_POST['nombre']) && isset($_POST['apellido'])){
    	$miarray=null;
    	if($business->insertar($_POST['nombre'],$_POST['apellido'])){
    		$miarray = array('status' => "true", 'error'=>"");

    	}else{
    		$miarray = array('status' => "false", 'error'=>"Error al insertar en la bd");
    		
    	}
    	echo json_encode($miarray);
    }else{
    	$miarray = array('status' => "false", 'error'=>"Error dato vacios");
    }*/



?>