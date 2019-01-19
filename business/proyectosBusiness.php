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
        function obtenerDatosGrafica(){
          return $this->data->obtenerGraficaProyectos();
        }
        function insertarProyecto($nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, 
              $estado_Proyecto, $id_Proyect_Manager) {
              return $this->data->insertarProyecto($nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto,  $estado_Proyecto, $id_Proyect_Manager);
          }


        function obtenerProyecto($id){
            return $this->data->obtenerProyecto($id);

        }
        function actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto,$manager_Id){
            return $this->data->actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto,$manager_Id);
        }

        function cargarDepartamentos(){
        return $this->data->cargarDepartamentos();
      }
        function cargarHabilidades(){
        return $this->data->cargarHabilidades();
      }

      function cargarColaboradoresFiltro($nombre,$departamento,$habilidad){
        return $this->data->cargarColaboradoresFiltro($nombre,$departamento,$habilidad);
      }

       function agregarColaboradoresProyecto($json,$idProyecto){
        return $this->data->agregarColaboradoresProyecto($json,$idProyecto);
      }

      function contar_usuarios() {
          return $this->data->contar_usuarios();
      }

       function cargarTodosProyectos() {
          return $this->data->cargarTodosProyectos();
      }
 }
