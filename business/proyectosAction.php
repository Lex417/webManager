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
    $text = null;
    if(isset($_POST['id_Proyecto']) &&
       isset($_POST['nombre_Proyecto']) &&
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


?>
