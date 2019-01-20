<?php

class areaTrabajoData {

    private $objetoConexion;

    function __construct() {
        include "conexion.php";
        $conexion=new conexion();
        $this->objetoConexion=$conexion->crearConexion();
    }

    function obtener_dep_desarrollo($newNum, $limite, $dep) {
        $sql = $this->objetoConexion->prepare("SELECT nombrePersona, apellidoPersona, nombreEquipoTrabajo, Manager FROM vista_departamentos WHERE nombreDepartamento= '".$dep."' LIMIT ". $newNum .",". $limite."");
        $sql->execute(['activo']);
        $lista=array();
        while($fila=$sql->fetch()){
            $usuario=array('nombrePersona'=>$fila['nombrePersona'],
                           'apellidoPersona'=>$fila['apellidoPersona'],
                           'nombreEquipoTrabajo'=>$fila['nombreEquipoTrabajo'],
                           'Manager'=>$fila['Manager']);
            array_push($lista,$usuario);
        }
        echo json_encode($lista);
    }

    function obtener_dep_soporte($newNum, $limite, $dep) {
        $sql = $this->objetoConexion->prepare("SELECT nombrePersona, apellidoPersona, nombreEquipoTrabajo, Manager FROM vista_departamentos WHERE nombreDepartamento= '".$dep."' LIMIT ". $newNum .",". $limite."");
        $sql->execute(['activo']);
        $lista=array();
        while($fila=$sql->fetch()){
            $usuario=array('nombrePersona'=>$fila['nombrePersona'],
                           'apellidoPersona'=>$fila['apellidoPersona'],
                           'nombreEquipoTrabajo'=>$fila['nombreEquipoTrabajo'],
                           'Manager'=>$fila['Manager']);
            array_push($lista,$usuario);
        }
        echo json_encode($lista);
    }

    function obtener_dep_qa($newNum, $limite, $dep) {
        $sql = $this->objetoConexion->prepare("SELECT nombrePersona, apellidoPersona, nombreEquipoTrabajo, Manager FROM vista_departamentos WHERE nombreDepartamento= '".$dep."' LIMIT ". $newNum .",". $limite."");
        $sql->execute(['activo']);
        $lista=array();
        while($fila=$sql->fetch()){
            $usuario=array('nombrePersona'=>$fila['nombrePersona'],
                           'apellidoPersona'=>$fila['apellidoPersona'],
                           'nombreEquipoTrabajo'=>$fila['nombreEquipoTrabajo'],
                           'Manager'=>$fila['Manager']);
            array_push($lista,$usuario);
        }
        echo json_encode($lista);
    }

    function obtener_dep_leadership($newNum, $limite, $dep) {
        $sql = $this->objetoConexion->prepare("SELECT nombrePersona, apellidoPersona, nombreEquipoTrabajo, Manager FROM vista_departamentos WHERE nombreDepartamento= '".$dep."' LIMIT ". $newNum .",". $limite."");
        $sql->execute(['activo']);
        $lista=array();
        while($fila=$sql->fetch()){
            $usuario=array('nombrePersona'=>$fila['nombrePersona'],
                           'apellidoPersona'=>$fila['apellidoPersona'],
                           'nombreEquipoTrabajo'=>$fila['nombreEquipoTrabajo'],
                           'Manager'=>$fila['Manager']);
            array_push($lista,$usuario);
        }
        echo json_encode($lista);
    }

    function count_departamentos($dep) {
        $sql = $this->objetoConexion->prepare("SELECT COUNT(*) FROM vista_departamentos WHERE nombreDepartamento= '".$dep."'");
        $sql->execute(['activo']);
        $valor=array();
        while($fila=$sql->fetch()) {
            $numero=array('size'=>$fila['COUNT(*)']);
            array_push($valor,$numero);
        }
        echo json_encode($valor);
    }

    function busqueda_filtro($palabra, $filtro) {
        $sql = $this->objetoConexion->prepare("SELECT nombrePersona, apellidoPersona, nombreEquipoTrabajo, Manager FROM vista_departamentos WHERE ".$filtro." LIKE '%".$palabra."%'");
        $sql->execute(['activo']);
        $lista=array();
        while($fila=$sql->fetch()){
            $usuario=array('nombrePersona'=>$fila['nombrePersona'],
                           'apellidoPersona'=>$fila['apellidoPersona'],
                           'nombreEquipoTrabajo'=>$fila['nombreEquipoTrabajo'],
                           'Manager'=>$fila['Manager']);
            array_push($lista,$usuario);
        }
        echo json_encode($lista);
    }
}