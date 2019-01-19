<?php

class dataPerfil {

    private $objetoConexion;

    function __construct() {
        include "conexion.php";
        $conexion=new conexion();
        $this->objetoConexion=$conexion->crearConexion();
    }

// cumple la funcion de un SELECT *
    function mostarPerfil($id_Persona) {
        $conexion=new conexion();
        
        if ($conexion->crearConexion()==true){
            $sql = $this->objetoConexion->prepare("SELECT  pro.nombreProyecto,pro.estadoProyecto ,puesto.nombrePuesto 
                    from tablaproyectocolaborador as procola 
                    inner join tablacolaborador as co on procola.idColaborador=co.idColaborador 
                    inner JOIN tablaproyecto as pro on procola.idProyecto= pro.idProyecto 
                    inner join tablapuesto as puesto on co.idPuestoColaborador= puesto.idPuesto
                    inner join tablaequipotrabajo as et on co.idEquipoTrabajo= et.idEquipoTrabajo
                    inner join tablapersona as per on co.idPersona= per.idPersona 
                    where pro.estadoProyecto='activo' and per.idPersona= ".$id_Persona);
        
            $sql->execute();
            $lista=array();

            while($valor=$sql->fetch()) {
                $objeto=array('nombreProyecto'=>$valor['nombreProyecto'],'estadoProyecto'=>$valor['estadoProyecto'], 'nombrePuesto'=>$valor['nombrePuesto']);
                array_push($lista,$objeto);
            }
            echo json_encode($lista);
        }
    }
}


       
