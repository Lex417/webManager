<?php 

    class proyectosData{
       
       private $objetoConexion;
       
       function __construct(){
           include "conexion.php"; 
           $conexion=new conexion();
           $this->objetoConexion=$conexion->crearConexion();
       } 

       function obtenerVistaPreviaProyecto(){
            $stmt = $this->objetoConexion->prepare('SELECT idProyecto, nombreProyecto,fechaInicio,descripcionProyecto
            from tablaProyecto where estadoProyecto=?');

            $stmt->execute(['activo']);
            $listaProyectos=array();
            while($fila=$stmt->fetch()){
                $proyecto=array('ideProyecto'=>$fila['idProyecto'],
            'nomProyecto'=>$fila['nombreProyecto'],'fechaProyecto'=>$fila['fechaInicio'],
              'descripProyecto'=>$fila['descripcionProyecto']);
                array_push($listaProyectos,$proyecto);
            }
            return json_encode($listaProyectos);
       }
      /*function insertar($parametro1,$parametro2){

          $stmt = $this->objetoConexion->prepare('Insert into tb_prueba(columna1, columna2) values (?,?)');
          if($stmt->execute([$parametro1,$parametro2])){
              return true;
          }else{
              return false;
          }
      }*/
       function insertarProyecto($id_Proyecto,$nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, $estado_Proyecto, $id_Proyect_Manager) {
        $sql = $this->objetoConexion->prepare('INSERT INTO tabla_proyecto(id_Proyecto, nombre_Proyecto, inicio_Proyecto, fin_Proyecto, desc_Proyecto, estado_Proyecto, id_Proyect_Manager) VALUES(?,?,?,?,?,?,?)');
        if($sql->execute([$id_Proyecto,$nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, $estado_Proyecto, $id_Proyect_Manager])) {
            return true;
        } else {
          return false;
        }

      }

      function obtenerProyecto($id){
   
        $stmt = $this->objetoConexion->prepare("SELECT idProyecto, nombreProyecto,fechaInicio,fechaFinal,descripcionProyecto,estadoProyecto 
        from vista_proyectos_activos where idProyecto='$id'");
        $stmt->execute(['activo']);
        $listaProyectos=array();
        while($fila=$stmt->fetch()){
            $proyecto=array('idProyecto'=>$fila['idProyecto'],
        'nomProyecto'=>$fila['nombreProyecto'],
        'fechaInicio'=>$fila['fechaInicio'],
        'fechaFinal'=>$fila['fechaFinal'],
        'estado_Proyecto'=>$fila['estadoProyecto'],
        'descripProyecto'=>$fila['descripcionProyecto']);
            array_push($listaProyectos,$proyecto);
        }
        return json_encode($listaProyectos);
       }

       function actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto){
        $stmt = $this->objetoConexion->prepare("UPDATE vista_proyectos_activos SET  nombreProyecto='$nombre_Proyecto',fechaInicio='$inicio_Proyecto',fechaFinal='$fin_Proyecto',descripcionProyecto='$desc_Proyecto',estadoProyecto='$estado_Proyecto'
        WHERE idProyecto='$id_Proyecto'");
    
        echo $stmt->execute(['activo']);
    
    
       }

      function cargarDepartamentos(){
          $stmt = $this->objetoConexion->prepare('SELECT id_Departamento, nombre_Departamento from tabla_departamento');
            $stmt->execute();
            $listaDepartamentos=array();
            while($fila=$stmt->fetch()){
                $departamento=array('idD'=>$fila['id_Departamento'],
            'nombreD'=>$fila['nombre_Departamento']);

                array_push($listaDepartamentos,$departamento);
            }
            return json_encode($listaDepartamentos);

      }
        

      function cargarHabilidades(){
          $stmt = $this->objetoConexion->prepare('SELECT id_Skill,nombre_Skill from tabla_skill');
            $stmt->execute();
            $listaHabilidades=array();
            while($fila=$stmt->fetch()){
                $habilidad=array('idH'=>$fila['id_Skill'],
            'nombreH'=>$fila['nombre_Skill']);

                array_push($listaHabilidades,$habilidad);
            }
            return json_encode($listaHabilidades);
        
      }

      function cargarColaboradoresFiltro($nombre,$departamento,$habilidad){
        $stmt=null;
        if(empty($nombre)&& $departamento=="0" && $habilidad=="0" ){
            $stmt = $this->objetoConexion->prepare('SELECT nombre_Usuario,apellido_Usuario,id_Usuario,nombre_Departamento,nombre_Manager,apellido_Manager,nombre_Skill from vista_mostrar_todo_filtro');
            $stmt->execute();
        }else if(empty($nombre)&& $departamento=="0" && $habilidad!="0" ){
            $stmt = $this->objetoConexion->prepare('SELECT tabla_usuario.nombre_Usuario,tabla_usuario.apellido_Usuario, tabla_usuario.id_Usuario,tabla_departamento.nombre_Departamento,tabla_manager.nombre_Manager,tabla_manager.apellido_Manager,tabla_skill.nombre_Skill FROM tabla_usuario inner join tabla_skill_usuario on tabla_skill_usuario.id_Usuario=tabla_usuario.id_Usuario inner join tabla_skill on tabla_skill.id_Skill=tabla_skill_usuario.id_Skill inner join tabla_departamento_usuario on tabla_usuario.id_Usuario=tabla_departamento_usuario.id_usuario inner join tabla_departamento on tabla_departamento_usuario.id_Departamento=tabla_departamento.id_Departamento inner join tabla_manager on tabla_manager.id_Manager=tabla_departamento.id_Manager_Departamento where tabla_skill.id_Skill=?');
            $stmt->execute([$habilidad]);

        }else if(!empty($nombre)&& $departamento=="0" && $habilidad!="0"){


        }else if(empty($nombre)&& $departamento!="0" && $habilidad!="0"){


        }else if(!empty($nombre)&& $departamento!="0" && $habilidad=="0"){


        }else if(empty($nombre)&& $departamento!="0" && $habilidad=="0"){

          $stmt = $this->objetoConexion->prepare('SELECT tabla_usuario.nombre_Usuario,tabla_usuario.apellido_Usuario, tabla_usuario.id_Usuario,tabla_departamento.nombre_Departamento,tabla_manager.nombre_Manager,tabla_manager.apellido_Manager,tabla_skill.nombre_Skill FROM tabla_usuario inner join tabla_skill_usuario on tabla_skill_usuario.id_Usuario=tabla_usuario.id_Usuario inner join tabla_skill on tabla_skill.id_Skill=tabla_skill_usuario.id_Skill inner join tabla_departamento_usuario on tabla_usuario.id_Usuario=tabla_departamento_usuario.id_usuario inner join tabla_departamento on tabla_departamento_usuario.id_Departamento=tabla_departamento.id_Departamento inner join tabla_manager on tabla_manager.id_Manager=tabla_departamento.id_Manager_Departamento where tabla_departamento.id_Departamento=?');
            $stmt->execute([$departamento]);
        }else if(!empty($nombre)&& $departamento=="0" && $habilidad!="0"){


        }else if(!empty($nombre)&& $departamento=="0" && $habilidad=="0"){


        }else if(!empty($nombre)&& $departamento!="0" && $habilidad!="0"){


        }
        $listaColaboradores=array();
        while($fila=$stmt->fetch()){
            $colaboradores=array('nomUsu'=>$fila['nombre_Usuario'],
        'apeUsu'=>$fila['apellido_Usuario'],'idUsu'=>$fila['id_Usuario'],
          'nomD'=>$fila['nombre_Departamento'],'nomM'=>$fila['nombre_Manager'],'apeM'=>$fila['apellido_Manager'],'nomS'=>$fila['nombre_Skill']);
            
            array_push($listaColaboradores,$colaboradores);
        }
        return json_encode($listaColaboradores);
      }

      function agregarColaboradoresProyecto($json,$idProyecto){
        $bandera = true;
        print_r($json);
        foreach ($json as $val) {
          $sql = $this->objetoConexion->prepare('INSERT INTO tabla_usuario_proyecto(id_Proyecto,id_Usuario,tiempo_Dedicado) VALUES(?,?,?)');
          $idUsu = $val['idUsu'];
          echo $idUsu;
          if(!$sql->execute([$idUsu,$idProyecto,"40"])) {
            $bandera=false;
            echo "no inserto";
            echo 'Error occurred:'.implode(":",$this->objetoConexion->errorInfo());
          } 
        }
         return $bandera; 
      }
    }
?>

	
	