<?php

class perfilActivoBusiness {

    private $data; 

    function __construct() {
        include "../data/dataPerfil.php";
        $this->data=new dataPerfil();
    }

    function mostrarPerfil($ced) {
        return $this->data->mostrarPerfil($ced);
    }

    function editarPerfil($cedula, $nombre, $apellido, $pass, $estado) {
        return $this->data->modificarPerfil($cedula, $nombre, $apellido, $pass, $estado);
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