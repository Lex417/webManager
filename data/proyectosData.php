<?php 
    class proyectosData{
       include "conexion.php"; 
       private $objetoConexion;
       
       function __construct(){
           $conexion=new conexion();
           $objetoConexion=$conexion->crearConexion();
       } 

       function obtenerVistaPreviaProyecto(){
            $this->objetoConexion->prepare('SELECT id_Proyecto, nombre_Proyecto,inicio_Proyecto,desc_Proyecto 
            from tabla_proyecto where estado_Proyecto=?');
            $this->objetoConexion->execute(['activo']);
            $listaProyectos=array();
            while($fila=$this->objetoConexion->fetch()){
                $proyecto=array('ideProyecto'=>$fila['id_Proyecto'],
            'nomProyecto'=>$fila['nombre_Proyecto'],'fechaProyecto'=>$fila['inicio_Proyecto'],
        'descripProyecto'=>$fila['desc_Proyecto']);
                array_push($listaProyectos,$proyecto);
            }
            return json_encode($listaProyectos);
       }

    }
?>

	
	