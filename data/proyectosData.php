<?php 

    class proyectosData{
       
       private $objetoConexion;
       
       function __construct(){
           include "conexion.php"; 
           $conexion=new conexion();
           $this->objetoConexion=$conexion->crearConexion();
       } 

       function obtenerVistaPreviaProyecto(){
            $stmt = $this->objetoConexion->prepare('SELECT id_Proyecto, nombre_Proyecto,inicio_Proyecto,desc_Proyecto 
            from vista_proyectos_activos');
            $stmt->execute(['activo']);
            $listaProyectos=array();
            while($fila=$stmt->fetch()){
                $proyecto=array('ideProyecto'=>$fila['id_Proyecto'],
            'nomProyecto'=>$fila['nombre_Proyecto'],'fechaProyecto'=>$fila['inicio_Proyecto'],
              'descripProyecto'=>$fila['desc_Proyecto']);
                array_push($listaProyectos,$proyecto);
            }
            return json_encode($listaProyectos);
       }
       function insertarProyecto($id_Proyecto,$nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, $estado_Proyecto, $id_Proyect_Manager) {
        $sql = $this->objetoConexion->prepare('INSERT INTO tabla_proyecto(id_Proyecto, nombre_Proyecto, inicio_Proyecto, fin_Proyecto, desc_Proyecto, estado_Proyecto, id_Proyect_Manager) VALUES(?,?,?,?,?,?,?)');
        if($sql->execute([$id_Proyecto,$nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, $estado_Proyecto, $id_Proyect_Manager])) {
            return true;
        } else {
          return false;
        }

      }
 


    }
?>

	
	