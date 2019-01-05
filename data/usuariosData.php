<?php

class usuariosData {

    private $objetoConexion;

    function __construct() {
        include "conexion.php";
        $conexion=new conexion();
        $this->objetoConexion=$conexion->crearConexion();
    }


    function insertar($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado) {

        $sql = $this->objetoConexion->prepare('INSERT INTO tabla_Usuario(id_Usuario, nombre_Usuario, password, apellido_Usuario, puesto_Usuario, tipo_Usuario, estado_Usuario) VALUES(?,?,?,?,?,?,?)');
        if($sql->execute([$cedula,$nombre, $pass, $apellido, $puesto, $tipo, $estado])) {
            return true;
        } else {return false;}
    }


    function select_all_usuarios() {
        $sql = $this->objetoConexion->prepare('SELECT id_Usuario, nombre_Usuario, password, apellido_Usuario, puesto_Usuario, tipo_Usuario, estado_Usuario FROM tabla_Usuario');
        $sql->execute(['activo']);
        $lista_usuarios=array();
        while($fila=$sql->fetch()){
            $usuario=array('id_Usuario'=>$fila['id_Usuario'],
                           'nombre_Usuario'=>$fila['nombre_Usuario'],
                           'password'=>$fila['password'],
                           'apellido_Usuario'=>$fila['apellido_Usuario'],
                           'puesto_Usuario'=>$fila['puesto_Usuario'],
                           'tipo_Usuario'=>$fila['tipo_Usuario'],
                           'estado_Usuario'=>$fila['estado_Usuario']);
            array_push($lista_usuarios,$usuario);
        }
         echo json_encode($lista_usuarios);
    }
}