<?php

class usuariosBusiness {

    private $data; 

    function __construct() {
        include "../data/usuariosData.php";
        $this->data=new usuariosData();
    }


    function insertar_usuario($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado) {
            return $this->data->insertar($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado);
    }

    function mostrar_usuarios() {
        return $this->data->select_all_usuarios();
    }

}
?>