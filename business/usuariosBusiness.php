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

    function mostrar_vista_colaborador_manager() {
        return $this->data->vista_colaborador_manager();
    }
<<<<<<< HEAD
    function obtener_colaboradores_proyecto($id){
        return $this->data->obtener_colaboradores_proyecto($id);
    }
=======
>>>>>>> b4f251c2dae4e6f6bbe45192f223d51e2f99ca39

}
?>