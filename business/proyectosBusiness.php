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
<<<<<<< HEAD
        function obtenerProyecto($id){
            return $this->data->obtenerProyecto($id);

        }
        function actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto){
            return $this->data->actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto);
        }
=======
>>>>>>> b4f251c2dae4e6f6bbe45192f223d51e2f99ca39

        function cargarDepartamentos(){
        return $this->data->cargarDepartamentos();
      }
        function cargarHabilidades(){
        return $this->data->cargarHabilidades();
      }

      function cargarColaboradoresFiltro($nombre,$departamento,$habilidad){
        return $this->data->cargarColaboradoresFiltro($nombre,$departamento,$habilidad);
      }

<<<<<<< HEAD
=======
       function agregarColaboradoresProyecto($json,$idProyecto){
        return $this->data->agregarColaboradoresProyecto($json,$idProyecto);
      }
>>>>>>> b4f251c2dae4e6f6bbe45192f223d51e2f99ca39
 }


?>