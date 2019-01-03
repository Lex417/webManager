<?php 

    class proyectosBusiness{
        include "../data/proyectosData.php";
        private $data;

        function __construct(){
            $this->data=new proyectosData();
        }
        function obtenerVistaPreviaProyecto(){
            return $this->data->obtenerVistaPreviaProyecto();

        }


    }


?>