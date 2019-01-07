<?php

class usuariosBusiness {

    private $data; 

    function __construct() {
        include "../data/usuariosData.php";
        $this->data=new usuariosData();
    }


<<<<<<< HEAD
    function insertar_usuario($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado) {
            return $this->data->insertar($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado);
    }

    function mostrar_usuarios() {
        return $this->data->select_all_usuarios();
    }
=======
   } else { $text = array('status' => "false", 'error'=>"Error dato vacios");}
   
   echo json_encode($text);

   
} else if($accion == 'modificar_usuario') {


} else if($accion == 'eliminar_usuario') {


} else if ($accion == 'mostrar_vista_colaborador_manager') {
        $business->mostrar_vista_colaborador_manager();

} else if($accion == 'mostrar_usuario') {
        $business->mostrar_usuarios();


} else { $text = array('status' => "false", 'error'=>"Error dato vacios");}
>>>>>>> b4f251c2dae4e6f6bbe45192f223d51e2f99ca39

    function mostrar_vista_colaborador_manager() {
        return $this->data->vista_colaborador_manager();
    }
    function obtener_colaboradores_proyecto($id){
        return $this->data->obtener_colaboradores_proyecto($id);
    }

}
?>