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

       function cargarObjetivos($id){
         $stmt = $this->objetoConexion->prepare('SELECT * FROM tablaobjetivoproyecto WHERE idProyecto=?');
         $stmt->execute([$id]);
         $listaObjetivos=array();
           while($fila=$stmt->fetch()){
             $objetivo=array('ideObjProyecto'=>$fila['idObjetivoProyecto'],
                             'descripObjetivoProyecto'=>$fila['descripcionObjetivoProyecto'],
                             'estadoObjetivo'=>$fila['estadoObjetivoProyecto']);
             array_push($listaObjetivos, $objetivo);
           }

           return json_encode($listaObjetivos);

       }

       function insertarObjetivo($idProy, $descripcionObjtv, $estadoObjtv){
         $query2 = $this->objetoConexion->prepare('INSERT INTO tablaobjetivoproyecto(idProyecto, descripcionObjetivoProyecto, estadoObjetivoProyecto) VALUES(?,?,?)');
         if($query2->execute([$idProy, $descripcionObjtv, $estadoObjtv])) {
           return true;
         } else {
           return false;
         }

       }

       function borrarObjetivo($id){
         $query = $this->objetoConexion->prepare('DELETE FROM tablaobjetivoproyecto WHERE idObjetivoProyecto = ?');
         if($query->execute([$id])) {
           return true;
         } else {
           return false;
         }

       }
      /*function insertar($parametro1,$parametro2){

          $stmt = $this->objetoConexion->prepare('Insert into tb_prueba(columna1, columna2) values (?,?)');
          if($stmt->execute([$parametro1,$parametro2])){
              return true;
          }else{
              return false;
          }
      }*/

      function obtenerGraficaProyectos(){
          $stmt = $this->objetoConexion->prepare('SELECT  TMP.idProyecto, TMP.nombreProyecto, TMP.objetivosFinalizados, COUNT(O.idProyecto) AS "totalObjetivos"
              FROM (
                  SELECT OB.idProyecto, PR.nombreProyecto, COUNT(OB.estadoObjetivoProyecto) AS "objetivosFinalizados"
                  FROM tablaProyecto AS PR
                  INNER JOIN tablaobjetivoproyecto AS OB ON PR.idProyecto = OB.idProyecto
                  WHERE PR.estadoProyecto="activo" AND OB.estadoObjetivoProyecto="finalizado"
                  GROUP BY  OB.idProyecto
              ) AS TMP
              INNER JOIN tablaobjetivoproyecto AS O ON TMP.idProyecto = O.idProyecto
              GROUP BY O.idProyecto'
          );
          $stmt->execute(['activo']);
          $listaProyectos=array();
          while($fila=$stmt->fetch()){
              $proyecto=array('ideProyecto'=>$fila['idProyecto'],
              'nomProyecto'=>$fila['nombreProyecto'],
              'objFinalizados'=>$fila['objetivosFinalizados'],
              'totalObj'=>$fila['totalObjetivos'],
              'porcentaje'=>$fila['objetivosFinalizados'] / $fila['totalObjetivos'] * 100);
              array_push($listaProyectos,$proyecto);
          }
          return json_encode($listaProyectos);
      }
      ///////////////////////////////////////////////////////////////////////////////////////////////////////

          function insertarProyecto($nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, $estado_Proyecto,
           $id_Proyect_Manager) {
           $sql = $this->objetoConexion->prepare('INSERT INTO tablaproyecto(nombreProyecto, fechaInicio, fechaFinal, descripcionProyecto, estadoProyecto, idProjectManager) VALUES(?,?,?,?,?,?)');
             if($sql->execute([$nombre_Proyecto, $inicio_Proyecto, $fin_Proyecto, $desc_Proyecto, $estado_Proyecto, $id_Proyect_Manager])) {
                $sql2 = $this->objetoConexion->prepare('SELECT LAST_INSERT_ID() AS last_id');

                if($sql2->execute()){
                 while($rest=$sql2->fetch()){
                      return (int)$rest['last_id'];
                  }
                } else {

                 return 0;
               }
            } else {
              return false;
            }

         }


          function insertarNotificacion ($proyect_id, $col_id) {
            $sql = $this->objetoConexion->prepare('CALL add_collaborator_proyect_notification(?,?)');                
            if($sql->execute([$proyect_id, $col_id])) {
              return true;
            } else {
                return false;
            }
          }
         //////////////////////////////////////////////////////////////////////////////////



      function obtenerProyecto($id){

        $stmt = $this->objetoConexion->prepare("SELECT idProyecto, nombreProyecto,fechaInicio,fechaFinal,descripcionProyecto,estadoProyecto
        from tablaProyecto where idProyecto='$id'");
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

       function actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto,$manager_Id){
        $stmt = $this->objetoConexion->prepare("UPDATE vista_proyectos_activos SET  nombreProyecto='$nombre_Proyecto',fechaInicio='$inicio_Proyecto',fechaFinal='$fin_Proyecto',descripcionProyecto='$desc_Proyecto',estadoProyecto='$estado_Proyecto',idProjectManager='$manager_Id'
        WHERE idProyecto='$id_Proyecto'");

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
          self::insertarNotificacion($idProyecto, $idUsu);
        }
      }

      function cargarTodosProyectos(){
        $listaProyectos=array();
        $stmt=$this->objetoConexion->prepare('SELECT tablaProyecto.idProyecto, tablaProyecto.nombreProyecto, tablaProyecto.fechaInicio, tablaProyecto.fechaFinal, tablaPersona.nombrePersona, tablaPersona.apellidoPersona from tablaProyecto inner join tablaProjectManager on tablaProyecto.idProjectManager=tablaProjectManager.idProjectManager inner join tablaPersona on  tablaPersona.idPersona=tablaProjectManager.idPersona');
        $stmt->execute();
        while($resultado=$stmt->fetch()){
          $stmt2=$this->objetoConexion->prepare('SELECT tablaObjetivoProyecto.estadoObjetivoProyecto from tablaObjetivoProyecto where tablaObjetivoProyecto.idProyecto=?');
          $stmt2->execute([$resultado['idProyecto']]);
          $contObjetivos=0;
          $contObjetivosCompletos=0;
          while($resultado2=$stmt2->fetch()){
              $contObjetivos++;
              if($resultado2['estadoObjetivoProyecto']=="completo"){
                  $contObjetivosCompletos++;
              }
          }
          if($contObjetivos==0){
            $contObjetivos = 1;
          }
          $porcentaje=($contObjetivosCompletos*100)/$contObjetivos;
          $proyectos = array('nomP'=>$resultado['nombreProyecto'],'fechIP'=>$resultado['fechaInicio'],'fechFP'=>$resultado['fechaFinal'],'nomM'=>$resultado['nombrePersona'],'apeM'=>$resultado['apellidoPersona'],'progreso'=>$porcentaje);
         /* $proyectos=array('nomP'=>$resultado['nombreProyecto'],
        'fechIP'=>$resultado['fechaInicio'],'fechFP'=>$resultado['fechaFinal'],
          ,'nomM'=>$resultado['nombrePersona'],'apeM'=>$resultado['apellidoPersona'],'progreso'=>$porcentaje);*/

            array_push($listaProyectos,$proyectos);
        }
        return json_encode($listaProyectos);

      }

    }
?>
