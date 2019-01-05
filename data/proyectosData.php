<?php 
    class proyectosData{
       
       private $objetoConexion;
       
       function __construct(){
           include_once "conexion.php"; 
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

    }
?>

	
	