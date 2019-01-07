<?php

class usuariosData {

    private $objetoConexion;

    function __construct() {
        include "conexion.php";
        $conexion=new conexion();
        $this->objetoConexion=$conexion->crearConexion();
    }

// INSERTA UN USUARIO EN  LA BD
    function insertar($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado) {

        $sql = $this->objetoConexion->prepare('INSERT INTO tabla_Usuario(id_Usuario, nombre_Usuario, password, apellido_Usuario, puesto_Usuario, tipo_Usuario, estado_Usuario) VALUES(?,?,?,?,?,?,?)');
        if($sql->execute([$cedula,$nombre, $pass, $apellido, $puesto, $tipo, $estado])) {
            return true;
        } else {return false;}
    }

// BUSCA UNA VISTA 'vista_colaborador_manager' EN LA BD
    function vista_colaborador_manager() {
        $sql = $this->objetoConexion->prepare('SELECT nombre_Usuario, nombre_Manager, id_Departamento FROM  vista_colaborador_manager');
        $sql->execute(['activo']);
        $lista=array();
        while($valor=$sql->fetch()) {
            $objeto=array('nombre_Usuario'=>$valor['nombre_Usuario'],
                          'nombre_Manager'=>$valor['nombre_Manager'],
                          'id_Departamento'=>$valor['id_Departamento']);
            array_push($lista,$objeto);
        }
        echo json_encode($lista);
    }

// cumple la funcion de un SELECT *
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
