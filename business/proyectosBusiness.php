<?php 
    // aqui se almacenan los metodos que se van a ejecutar.
    class proyectosBusiness{
        
        private $data;

        function __construct(){
            include "../data/proyectosData.php";
            $this->data=new proyectosData();
        }
        function obtenerVistaPreviaProyecto(){
            return $this->data->obtenerVistaPreviaProyecto();

        }


    }


?>