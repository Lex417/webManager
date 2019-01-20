<?php

class usuariosBusiness {

    private $data; 

    function __construct() {
        include "../data/usuariosData.php";
        $this->data=new usuariosData();
    }

    function getFiltro($palabra) {
        $res = "";
        switch($palabra) {
        case "1":
            $res = "cedulaPersona";
            break;
        case "2":
            $res = "nombrePersona";
            break;
        case "3":
            $res = "nombrePuesto";
            break;
        }
    return $res;
    }

    function insertar_usuario($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado) {
            return $this->data->insertar($cedula, $nombre, $apellido, $pass, $puesto, $tipo, $estado);
    }

    function editar_usuario($id, $nombre, $apellido, $puesto, $equipo, $tipo) {
        return $this->data->editar($id, $nombre, $apellido, $puesto, $equipo, $tipo);
    }

    function eliminar_usuario($id) {
        return $this->data->eliminar($id);
    }

    function obtener_usuario($id) {
        return $this->data->obtener_usuario($id);
    }

    function obtener_puestos() {
        return $this->data->obtener_puestos();
    }

    function obtener_equipos() {
        return $this->data->obtener_equipos();
    }

    function mostrar_usuarios() {
        return $this->data->select_all_usuarios();
    }

    function mostrar_vista_colaborador_manager() {
        return $this->data->vista_colaborador_manager();
    }

    function obtener_colaboradores_proyecto($id){
        return $this->data->obtener_colaboradores_proyecto($id);
    }
    function obtenerNombresManagers(){
        return $this->data->obtenerNombresManagers();
    }

    function contar_usuarios() {
        return $this->data->contar_usuarios();
    }

    function cambiar_pagina($num_pag, $limite) {
        $newNum = (intval($num_pag)-1) * intval($limite);
        $lim = intval($limite);
        return $this->data->cambiar_pagina($newNum, $lim);
    }

    function busqueda_por_filtro($palabra, $filtro) {
        $filtro = $this->getFiltro($filtro);
        return $this->data->busqueda_filtrada($palabra, $filtro);
    }
    function obtenerNombreManagerActual($idProyecto){
        return  $this->data->obtenerNombreManagerActual($idProyecto);

    }
     
}
?>