<?php 

    class proyectosData{
       
       private $objetoConexion;
       
       function __construct(){
           include "conexion.php"; 
           $conexion=new conexion();
           $this->objetoConexion=$conexion->crearConexion();
       } 

       function obtenerVistaPreviaProyecto(){
        $stmt = $this->objetoConexion->prepare('SELECT id_Proyecto, nombre_Proyecto,inicio_Proyecto,fin_Proyecto,desc_Proyecto 
        from vista_proyectos_activos');
        $stmt->execute(['activo']);
        $listaProyectos=array();
        while($fila=$stmt->fetch()){
            $proyecto=array('idProyecto'=>$fila['id_Proyecto'],
        'nomProyecto'=>$fila['nombre_Proyecto'],
        'fechaInicio'=>$fila['inicio_Proyecto'],
        'fechaFinal'=>$fila['fin_Proyecto'],
        'descripProyecto'=>$fila['desc_Proyecto']);
            array_push($listaProyectos,$proyecto);
        }
        return json_encode($listaProyectos);
   }
   function obtenerProyecto($id){
   
    $stmt = $this->objetoConexion->prepare("SELECT id_Proyecto, nombre_Proyecto,inicio_Proyecto,fin_Proyecto,desc_Proyecto,estado_Proyecto 
    from vista_proyectos_activos where id_Proyecto='$id'");
    $stmt->execute(['activo']);
    $listaProyectos=array();
    while($fila=$stmt->fetch()){
        $proyecto=array('idProyecto'=>$fila['id_Proyecto'],
    'nomProyecto'=>$fila['nombre_Proyecto'],
    'fechaInicio'=>$fila['inicio_Proyecto'],
    'fechaFinal'=>$fila['fin_Proyecto'],
    'estado_Proyecto'=>$fila['estado_Proyecto'],
    'descripProyecto'=>$fila['desc_Proyecto']);
        array_push($listaProyectos,$proyecto);
    }
    return json_encode($listaProyectos);
   }

   function actualizarDatosProyectoBD($id_Proyecto,$nombre_Proyecto,$inicio_Proyecto,$fin_Proyecto,$desc_Proyecto,$estado_Proyecto){
    $stmt = $this->objetoConexion->prepare("UPDATE vista_proyectos_activos SET  nombre_Proyecto='$nombre_Proyecto',inicio_Proyecto='$inicio_Proyecto',fin_Proyecto='$fin_Proyecto',desc_Proyecto='$desc_Proyecto',estado_Proyecto='$estado_Proyecto'
    WHERE id_Proyecto='$id_Proyecto'");

    echo $stmt->execute(['activo']);


   }
 


    }
?>

	
	