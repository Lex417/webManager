<?php

class areaTrabajoBusiness {

    private $data;

    function __construct() {
        include "../data/areaTrabajoData.php";
        $this->data=new areaTrabajoData();
    }



    function mostrar_dep_desarrollo($pagina, $limite, $dep) {
        $dep = "Desarrollo";
        $newNum = (intval($pagina)-1) * intval($limite);
        $lim = intval($limite);
        $this->data->obtener_dep_desarrollo($newNum, $lim, $dep);
    }

    function mostrar_filtro($palabra, $filtro) {
        $filtro = $this->determinar_filtro($filtro);
        $this->data->busqueda_filtro($palabra, $filtro);

    }

    function mostrar_dep_qa($pagina, $limite, $dep) {
        $dep = "Quality Assurance";
        $newNum = (intval($pagina)-1) * intval($limite);
        $lim = intval($limite);
        $this->data->obtener_dep_desarrollo($newNum, $lim, $dep);
    }

    function mostrar_dep_soporte($pagina, $limite, $dep) {
        $dep = "Soporte Técnico";
        $newNum = (intval($pagina)-1) * intval($limite);
        $lim = intval($limite);
        $this->data->obtener_dep_desarrollo($newNum, $lim, $dep);
    }

    function mostrar_dep_leadership($pagina, $limite, $dep) {
        $dep = "Team Leadership";
        $newNum = (intval($pagina)-1) * intval($limite);
        $lim = intval($limite);
        $this->data->obtener_dep_desarrollo($newNum, $lim, $dep);
    }

    function count_departamentos($dep) {
        $dep = $this->determinar_departamento($dep);
        $this->data->count_departamentos($dep);
    }

    function determinar_departamento($dep) {
        $res = "";
        switch($dep) {
            case "1":
            $res = "Desarrollo";
            break;

            case "2":
            $res = "Soporte Técnico";
            break;

            case "3":
            $res = "Quality Assurance";
            break;

            case "4":
            $res = "Team Leadership";
            break;
        }
        return $res;
    }

    function determinar_filtro($num) {
        $res = "";
        switch($num) {
            case "1":
            $res = "nombrePersona OR apellidoPersona";
            break;

            case "2":
            $res = "Manager";
            break;

            case "3":
            $res = "nombreEquipoTrabajo";
            break;
        }
        return $res;
    }
}