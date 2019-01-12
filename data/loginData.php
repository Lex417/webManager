<?php
class loginData{

       private $objetoConexion;

       function __construct(){
           include_once "conexion.php";
           $conexion=new conexion();
           $this->objetoConexion=$conexion->crearConexion();
       }

       function obtenerVistaPreviaProyecto(){
            $stmt = $this->objetoConexion->prepare('SELECT id_Usuario
            from tabla_Usuario where  ORDER BY id_Proyecto DESC');
            $stmt->execute(['activo']);
            while($fila=$stmt->fetch()){
                $proyecto=array('ideProyecto'=>$fila['id_Proyecto'],
            'nomProyecto'=>$fila['nombre_Proyecto'],'fechaProyecto'=>$fila['inicio_Proyecto'],
        'descripProyecto'=>$fila['desc_Proyecto']);
            }
            return json_encode($listaProyectos);
       }
    }
?>
