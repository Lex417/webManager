<?php 
include "areaTrabajoBusiness.php";

$accion=$_POST['accion'];
$text = null;
$business=new areaTrabajoBusiness();

if($accion == 'mostrar_dep_desarrollo') {
    $business->mostrar_dep_desarrollo($_POST['pagina'],$_POST['limite'],$_POST['departamento']);

} else if($accion == 'mostrar_dep_soporte') {
    $business->mostrar_dep_soporte($_POST['pagina'],$_POST['limite'],$_POST['departamento']);

} else if($accion == 'mostrar_dep_qa') {
    $business->mostrar_dep_qa($_POST['pagina'],$_POST['limite'],$_POST['departamento']);

}else if($accion == 'mostrar_dep_leadership') {
    $business->mostrar_dep_leadership($_POST['pagina'],$_POST['limite'],$_POST['departamento']);

}else if($accion == 'count_departamentos') {
    $business->count_departamentos($_POST['departamento']);

}else if($accion == 'filtro_areas') {
    $business->mostrar_filtro($_POST['palabra'], $_POST['departamento']);
} else {
    $text = array('status' => "false", 'error'=>"Error dato vacios");
}