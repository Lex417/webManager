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
            from vista_proyectos_activos ORDER BY id_Proyecto DESC');
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

      function insertar($parametro1,$parametro2){

          $stmt = $this->objetoConexion->prepare('Insert into tb_prueba(columna1, columna2) values (?,?)');
          if($stmt->execute([$parametro1,$parametro2])){
              return true;
          }else{
              return false;
          }
      }

    }

  
?>


	 