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


      function verTodosLosColaboradoresProyecto($idProyecto){
        return $this->data->verTodosLosColaboradoresProyecto($idProyecto);
      }

      function eliminarColaboradorProyecto($idProyectoColaborador){
        return $this->data->eliminarColaboradorProyecto($idProyectoColaborador);
      }

      function agregarColaboradorProyectoModificar($idColaborador,$idProyecto){
        return $this->data->agregarColaboradorProyectoModificar($idColaborador,$idProyecto);
    }

      function cargarObjetivos($id){
          return $this->data->cargarObjetivos($id);
      }
      function insertarObjetivo($id, $descripcionObjtv, $estadoObjtv){
          return $this->data->insertarObjetivo($id, $descripcionObjtv, $estadoObjtv);
      }
      function borrarObjetivo($id){
          return $this->data->borrarObjetivo($id);
      }
 }
