<?php

class perfilActivoBusiness {

    private $data; 

    function __construct() {
        include "../data/dataPerfil.php";
        $this->data=new dataPerfil();
    }


    
    function mostrarProyectosActivos() {
        // Session
        $id_Persona = 1;
    	$lista = $this->data->mostarPerfil($id_Persona);
    	if(!$lista){
				return false;
			}else{
				return $lista;
			}
      
    }
}
?>