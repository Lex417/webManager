<?php
  class conexion{
    function crearConexion(){
      $objetoPDO=null;
        try{
            $usuario="root";
            $contraseña="";
            $objetoPDO = new PDO('mysql:host=localhost;dbname=bd_globales', $usuario, $contraseña);
          }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
          }
    }
    return $objetoPDO;

  }
  
?>