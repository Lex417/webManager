<?php

 // aqui se almacenan los metodos que se van a ejecutar.
 class proyectosBusiness{

    private $data;

    function __construct(){
        include "../data/conexion.php";
        $this->data=new proyectosData();
    }
    function loguearUsuario(){
        return $this->data->obtenerVistaPreviaProyecto();
    }

}
?>
