<?php
  class conexion{
    function crearConexion(){
      $objetoPDO=null;
        try{
            $usuario="root";
            $contraseña="";
            $objetoPDO = new PDO('mysql:host=localhost;dbname=bd_globales', $usuario, $contraseña);
            $objetoPDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            $objetoPDO->exec('SET NAMES UTF8');
          }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
          }
          return $objetoPDO;
    }
  }
?>

