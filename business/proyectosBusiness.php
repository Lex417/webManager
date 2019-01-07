<?php 

    class proyectosBusiness{
        
        private $data;

        function __construct(){
            include "../data/proyectosData.php";
            $this->data=new proyectosData();
        }
        function obtenerVistaPreviaProyecto(){
            return $this->data->obtenerVistaPreviaProyecto();

        }
         function insertarProyecto($id_Proyecto,$nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, 
            $estado_Proyecto, $id_Proyect_Manager) {
            return $this->data->insertarProyecto($id_Proyecto,$nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto,  $estado_Proyecto, $id_Proyect_Manager);
        }
        function obtenerProyecto($id){
            return $this->data->obtenerProyecto($id);

        }
        function actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto){
            return $this->data->actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto);
        }



 }


?>