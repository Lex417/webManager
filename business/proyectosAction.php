<?php


    include "proyectosBusiness.php";
    $accion=$_POST['accion'];
    $business=new proyectosBusiness();


    if($accion=="obtenerVistaProyectos"){
        echo $business->obtenerVistaPreviaProyecto();
    }

    if($accion=="obtenerDatosGrafica"){
      echo $business->obtenerDatosGrafica();
    }

    if($accion=="editarDatosProyecto"){
      $id=$_POST['id'];
      echo $business->obtenerProyecto($id);
  }

  if($accion=="actualizarDatosProyectoBD"){
    $id_Proyecto=$_POST['id_Proyecto'];
    $nombre_Proyecto=$_POST['nombre_Proyecto'];
    $inicio_Proyecto=$_POST['inicio_Proyecto'];
    $fin_Proyecto=$_POST['fin_Proyecto'];
    $desc_Proyecto=$_POST['desc_Proyecto'];
    $estado_Proyecto=$_POST['estado_Proyecto'];
    echo $business->actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto);
}//////////////////////////////////////

    if($accion == 'insertarProyecto') {
      $result = 0;
    if( isset($_POST['nombre_Proyecto']) &&
       isset($_POST['inicio_Proyecto']) &&
       isset($_POST['fin_Proyecto']) &&
       isset($_POST['desc_Proyecto']) &&
       isset($_POST['estado_Proyecto']) &&
       isset($_POST['id_Proyect_Manager'])) {

        $tempResult = $business->insertarProyecto($_POST['nombre_Proyecto'], $_POST['inicio_Proyecto'], $_POST['fin_Proyecto'], $_POST['desc_Proyecto'], $_POST['estado_Proyecto'], $_POST['id_Proyect_Manager']);

        if($tempResult > 0) {
            $result = $tempResult;
        } else {
            $result = 0;
        }

        } else {
          $result = -1;
        }

        header('Content-Type: application/json');
        //Devolvemos el array pasado a JSON como objeto
        echo json_encode($result, JSON_FORCE_OBJECT);

      } else if($accion == 'mostrar_usuario') {
              $business->mostrar_usuarios();

      } else { $text = array('status' => "false", 'error'=>"Error dato vacios");}

      if($accion=="cargarDepartamentos"){
        echo $business->cargarDepartamentos();
      }
        if($accion=="cargarHabilidades"){
        echo $business->cargarHabilidades();
      }

      if($accion=="cargarColaboradoresFiltro"){
        $nombre=$_POST['nombreUsuario'];
       $departamento=$_POST['departamento'];
       $habilidad=$_POST['habilidad'];
        echo $business->cargarColaboradoresFiltro($nombre,$departamento,$habilidad);
      }

      if($accion=="agregarColaboradoresProyecto"){
        $json=$_POST['json'];
        $json = json_decode($json,true);
        $idProyecto = $_POST['idProyecto'];
        $business->agregarColaboradoresProyecto($json,$idProyecto);
      }

      if($accion=="cargarTodosProyectos"){
        echo $business->cargarTodosProyectos();
      }
      if($accion=="cargarObjetivos"){
        $id=$_POST['id'];
        echo $business->cargarObjetivos($id);
      }
      if($accion=="insertarObjetivo"){
        $text = null;
        if(isset($_POST['descripcionObjetivo']) &&
           isset($_POST['estadoObjetivo']) &&
           $_POST['descripcionObjetivo']) {

             $id=$_POST['id'];
             $descripcionObjtv=$_POST['descripcionObjetivo'];
             $estadoObjtv=$_POST['estadoObjetivo'];
             if($business->insertarObjetivo($id, $descripcionObjtv, $estadoObjtv)){
               $text = array('status' => "true", 'error'=>"");
             } else {
               $text = array('status' => "false", 'error'=>"Error al insertar en la bd.");
             }
        }else{
          $text = array('status' => "false", 'error'=>"Error, faltan datos.");
        }
        echo json_encode($text);
      }
      if($accion=="eliminarObjetivo"){
        $id=$_POST['id'];
        $text=null;
        
        if($business->borrarObjetivo($id)){
          $text = array('status' => "true", 'error'=>"");
        } else{
          $text = array('status' => "false", 'error'=>"Error al borrar de la bd.");
        }
        echo json_encode($text);
      }

      if($accion=="verTodosLosColaboradoresProyecto"){
        $idProyecto = $_POST['idProyecto'];
        echo $business->verTodosLosColaboradoresProyecto($idProyecto);
      }

      if($accion=="eliminarColaboradorProyecto"){
        $idProyectoColaborador = $_POST['idProyectoColaborador'];
        echo $business->eliminarColaboradorProyecto($idProyectoColaborador);
      }

      if($accion=="agregarColaboradorProyectoModificar"){
        $idProyecto = $_POST['idProyecto'];
        $idColaborador = $_POST['idColaborador'];
        echo $business->agregarColaboradorProyectoModificar($idColaborador,$idProyecto);
      }
?>
