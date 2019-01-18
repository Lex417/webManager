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
   
        $stmt = $this->objetoConexion->prepare('SELECT id_Proyecto, nombre_Proyecto,inicio_Proyecto,fin_Proyecto,desc_Proyecto,estado_Proyecto 
        from vista_proyectos_activos where id_Proyecto=?');
        $stmt->execute([$id]);
        $listaProyectos=array();
        while($fila=$stmt->fetch()){
            $proyecto=array('idProyecto'=>$fila['id_Proyecto'],
        'nomProyecto'=>$fila['nombre_Proyecto'],
        'fechaInicio'=>$fila['inicio_Proyecto'],
        'fechaFinal'=>$fila['fin_Proyecto'],
        'estado_Proyecto'=>$fila['estado_Proyecto'],
        'descripProyecto'=>$fila['desc_Proyecto']);
            array_push($listaProyectos,$proyecto);
        }
        return json_encode($listaProyectos);
       }

       function actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto){
        $stmt = $this->objetoConexion->prepare("UPDATE vista_proyectos_activos SET  nombre_Proyecto='$nombre_Proyecto',inicio_Proyecto='$inicio_Proyecto',fin_Proyecto='$fin_Proyecto',desc_Proyecto='$desc_Proyecto',estado_Proyecto='$estado_Proyecto'
        WHERE id_Proyecto='$id_Proyecto'");
    
        echo $stmt->execute(['activo']);
    
    
       }

      function cargarDepartamentos(){
          $stmt = $this->objetoConexion->prepare('SELECT idDepartamento, nombreDepartamento from tabladepartamento');
            $stmt->execute();
            $listaDepartamentos=array();
            while($fila=$stmt->fetch()){
                $departamento=array('idD'=>$fila['idDepartamento'],
            'nombreD'=>$fila['nombreDepartamento']);

                array_push($listaDepartamentos,$departamento);
            }
            return json_encode($listaDepartamentos);

      }
        

      function cargarHabilidades(){
          $stmt = $this->objetoConexion->prepare('SELECT idSkill,nombreSkill from tablaskill');
            $stmt->execute();
            $listaHabilidades=array();
            while($fila=$stmt->fetch()){
                $habilidad=array('idH'=>$fila['idSkill'],
            'nombreH'=>$fila['nombreSkill']);

                array_push($listaHabilidades,$habilidad);
            }
            return json_encode($listaHabilidades);
        
      }

      function cargarColaboradoresFiltro($nombre,$departamento,$habilidad){
        $stmt=null;
        $nom="";
        $ape="";
        $arrayNombre=explode(' ',$nombre);
        if(count($arrayNombre)>1){
          $nom=$arrayNombre[0];
          $ape=$arrayNombre[1];
        }else{
          $nom=$arrayNombre[0];
        }
        if(empty($nombre)&& $departamento=="0" && $habilidad=="0" ){
            $stmt = $this->objetoConexion->prepare('SELECT nombre_Usuario,apellido_Usuario,id_Usuario,nombre_Departamento,nombre_Manager,apellido_Manager,nombre_Skill from vista_mostrar_todo_filtro');
            $stmt->execute();
        }else if(empty($nombre)&& $departamento=="0" && $habilidad!="0" ){
            $stmt = $this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaColaborador.idColaborador,tablaDepartamento.nombreDepartamento,tablaSkill.nombreSkill, tablaEquipoTrabajo.idEquipoTrabajo from tablaPersona inner join tablaColaborador on tablaPersona.idPersona = tablaColaborador.idPersona inner join tablaEquipoTrabajo on tablaColaborador.idEquipotrabajo = tablaEquipoTrabajo.idEquipotrabajo inner join tablaDepartamento on tablaDepartamento.idDepartamento = tablaEquipoTrabajo.idDepartamento inner join tablaSkillColaborador on tablaColaborador.idColaborador = tablaSkillColaborador.idColaborador inner join tablaSkill on tablaSkill.idSkill=tablaSkillColaborador.idSkill where tablaSkill.idSkill=?');
            $stmt->execute([$habilidad]);

        }else if(!empty($nombre)&& $departamento=="0" && $habilidad!="0"){
            $stmt = $this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaColaborador.idColaborador,tablaDepartamento.nombreDepartamento,tablaSkill.nombreSkill, tablaEquipoTrabajo.idEquipoTrabajo from tablaPersona inner join tablaColaborador on tablaPersona.idPersona = tablaColaborador.idPersona inner join tablaEquipoTrabajo on tablaColaborador.idEquipotrabajo = tablaEquipoTrabajo.idEquipotrabajo inner join tablaDepartamento on tablaDepartamento.idDepartamento = tablaEquipoTrabajo.idDepartamento inner join tablaSkillColaborador on tablaColaborador.idColaborador = tablaSkillColaborador.idColaborador inner join tablaSkill on tablaSkill.idSkill=tablaSkillColaborador.idSkill where tablaPersona.nombrePersona like ? and tablaPersona.apellidoPersona like ? and tablaSkill.idSkill=?'); 
            $stmt->execute(["%".$nom."%","%".$ape."%",$habilidad]);

        }else if(empty($nombre)&& $departamento!="0" && $habilidad!="0"){
             $stmt = $this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaColaborador.idColaborador,tablaDepartamento.nombreDepartamento,tablaSkill.nombreSkill, tablaEquipoTrabajo.idEquipoTrabajo from tablaPersona inner join tablaColaborador on tablaPersona.idPersona = tablaColaborador.idPersona inner join tablaEquipoTrabajo on tablaColaborador.idEquipotrabajo = tablaEquipoTrabajo.idEquipotrabajo inner join tablaDepartamento on tablaDepartamento.idDepartamento = tablaEquipoTrabajo.idDepartamento inner join tablaSkillColaborador on tablaColaborador.idColaborador = tablaSkillColaborador.idColaborador inner join tablaSkill on tablaSkill.idSkill=tablaSkillColaborador.idSkill where tablaDepartamento.idDepartamento=? and tablaSkill.idSkill=?');
              $stmt->execute([$departamento,$habilidad]);

        }else if(!empty($nombre)&& $departamento!="0" && $habilidad=="0"){
            $stmt = $this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaColaborador.idColaborador,tablaDepartamento.nombreDepartamento,tablaSkill.nombreSkill, tablaEquipoTrabajo.idEquipoTrabajo from tablaPersona inner join tablaColaborador on tablaPersona.idPersona = tablaColaborador.idPersona inner join tablaEquipoTrabajo on tablaColaborador.idEquipotrabajo = tablaEquipoTrabajo.idEquipotrabajo inner join tablaDepartamento on tablaDepartamento.idDepartamento = tablaEquipoTrabajo.idDepartamento inner join tablaSkillColaborador on tablaColaborador.idColaborador = tablaSkillColaborador.idColaborador inner join tablaSkill on tablaSkill.idSkill=tablaSkillColaborador.idSkill where tablaPersona.nombrePersona like ? and tablaPersona.apellidoPersona like ? and tablaDepartamento.idDepartamento=?');

            $stmt->execute(["%".$nom."%","%".$ape."%",$departamento]);

        }else if(empty($nombre)&& $departamento!="0" && $habilidad=="0"){

          $stmt = $this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaColaborador.idColaborador,tablaDepartamento.nombreDepartamento,tablaSkill.nombreSkill, tablaEquipoTrabajo.idEquipoTrabajo from tablaPersona inner join tablaColaborador on tablaPersona.idPersona = tablaColaborador.idPersona inner join tablaEquipoTrabajo on tablaColaborador.idEquipotrabajo = tablaEquipoTrabajo.idEquipotrabajo inner join tablaDepartamento on tablaDepartamento.idDepartamento = tablaEquipoTrabajo.idDepartamento inner join tablaSkillColaborador on tablaColaborador.idColaborador = tablaSkillColaborador.idColaborador inner join tablaSkill on tablaSkill.idSkill=tablaSkillColaborador.idSkill where tablaDepartamento.idDepartamento=?');
            $stmt->execute([$departamento]);
        }else if(!empty($nombre)&& $departamento=="0" && $habilidad!="0"){


        }else if(!empty($nombre)&& $departamento=="0" && $habilidad=="0"){
           $stmt=$this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaColaborador.idColaborador,tablaDepartamento.nombreDepartamento,tablaSkill.nombreSkill, tablaEquipoTrabajo.idEquipoTrabajo from tablaPersona inner join tablaColaborador on tablaPersona.idPersona = tablaColaborador.idPersona inner join tablaEquipoTrabajo on tablaColaborador.idEquipotrabajo = tablaEquipoTrabajo.idEquipotrabajo inner join tablaDepartamento on tablaDepartamento.idDepartamento = tablaEquipoTrabajo.idDepartamento inner join tablaSkillColaborador on tablaColaborador.idColaborador = tablaSkillColaborador.idColaborador inner join tablaSkill on tablaSkill.idSkill=tablaSkillColaborador.idSkill where tablaPersona.nombrePersona like ? and tablaPersona.apellidoPersona like ?');
            
            $stmt->execute(["%".$nom."%","%".$ape."%"]);

        }else if(!empty($nombre)&& $departamento!="0" && $habilidad!="0"){
            $stmt=$this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaColaborador.idColaborador,tablaDepartamento.nombreDepartamento,tablaSkill.nombreSkill, tablaEquipoTrabajo.idEquipoTrabajo from tablaPersona inner join tablaColaborador on tablaPersona.idPersona = tablaColaborador.idPersona inner join tablaEquipoTrabajo on tablaColaborador.idEquipotrabajo = tablaEquipoTrabajo.idEquipotrabajo inner join tablaDepartamento on tablaDepartamento.idDepartamento = tablaEquipoTrabajo.idDepartamento inner join tablaSkillColaborador on tablaColaborador.idColaborador = tablaSkillColaborador.idColaborador inner join tablaSkill on tablaSkill.idSkill=tablaSkillColaborador.idSkill where tablaPersona.nombrePersona like ? and tablaPersona.apellidoPersona like ? and tablaDepartamento.idDepartamento=? and tablaSkill.idSkill=?');
            $stmt->execute(["%".$nom."%","%".$ape."%",$departamento,$habilidad]);
        }
        $listaColaboradores=array();
        while($fila=$stmt->fetch()){
            $stmt2=$this->objetoConexion->prepare('SELECT tablaPersona.nombrePersona,tablaPersona.apellidoPersona,tablaTeamManager.idTeamManager from tablaEquipoTrabajo inner join tablaTeamManager on tablaTeamManager.idTeamManager =tablaEquipoTrabajo.idTeamManager inner join tablaPersona on tablaPersona.idPersona= tablaTeamManager.idPersona where tablaEquipoTrabajo.idEquipoTrabajo=?');
            $stmt2->execute([$fila['idEquipoTrabajo']]);
            $nombreManager="";
            $apellidoManager="";
            while($fila2=$stmt2->fetch()){
              $nombreManager=$fila2['nombrePersona'];
              $apellidoManager=$fila2['apellidoPersona'];
            }
            $colaboradores=array('nomUsu'=>$fila['nombrePersona'],
        'apeUsu'=>$fila['apellidoPersona'],'idUsu'=>$fila['idColaborador'],
          'nomD'=>$fila['nombreDepartamento'],'nomM'=>$nombreManager,'apeM'=>$apellidoManager,'nomS'=>$fila['nombreSkill']);
            
            array_push($listaColaboradores,$colaboradores);
        }
        return json_encode($listaColaboradores);
      }

      function agregarColaboradoresProyecto($json,$idProyecto){
        
       // print_r($json);
        foreach ($json as $val) {
          $sql1=$this->objetoConexion->prepare('SELECT idProyecto,idColaborador from tablaProyectoColaborador Where idProyecto=? AND idColaborador=?');
          $idUsu = $val['idUsu'];
          $sql1->execute([$idProyecto,$idUsu]);
          if($sql1->fetch()){
            $data = array();
            $text = array('status' => "error", 'mensaje'=>"El colaborador ya se encuentra asignado en el proyecto");
            array_push($data, $text);
            echo json_encode($data);

          }else{
            $sql = $this->objetoConexion->prepare('INSERT INTO tablaproyectocolaborador(idProyecto,idColaborador,estadoProyectoColaborador) VALUES(?,?,?)');
            //echo "Id del idColaborador: ".$idUsu." id del proyecto: ".$idProyecto;
            if(!$sql->execute([(int)$idProyecto,(int)$idUsu,"pendiente"])) {
              $bandera=false;
              $data = array();
               $text = array('status' => "error", 'mensaje'=>"No insertó correctamente");
               array_push($data, $text);
               echo json_encode($data);
              
              //echo 'Error occurred:'.implode(":",$this->objetoConexion->errorInfo());
            } else{
               $data = array();
               $text = array('status' => "success", 'mensaje'=>"Se insertó correctamente");
               array_push($data, $text);
               echo json_encode($data);
            }
          }
          
        }
      }
    }
?>

	
	