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
    $manager_Id=$_POST['manager_Id'];
    echo $business->actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto,$manager_Id);
}

    if($accion == 'insertarProyecto') {
    $text = null;
    if(isset($_POST['id_Proyecto']) &&
       isset($_POST['nombre_Proyecto']) &&
       isset($_POST['inicio_Proyecto']) &&
       isset($_POST['fin_Proyecto']) &&
       isset($_POST['desc_Proyecto']) &&
       isset($_POST['estado_Proyecto']) &&
       isset($_POST['id_Proyect_Manager'])) {

        if($business->insertarProyecto($_POST['id_Proyecto'], $_POST['nombre_Proyecto'], $_POST['inicio_Proyecto'], $_POST['fin_Proyecto'], $_POST['desc_Proyecto'], $_POST['estado_Proyecto'], $_POST['id_Proyect_Manager'])) {
            $text = array('status' => "true", 'error'=>"");
        } else {
            $text = array('status' => "false", 'error'=>"Error al insertar en la bd");
        }

       } else { $text = array('status' => "false", 'error'=>"Error dato vacios");}

       echo json_encode($text);
      } else if($accion == 'modificar_usuario') {

      } else if($accion == 'eliminar_usuario') {

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
