<?php 
    function conectar(){
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        //$bd = "alumnos_bbdd";//casa
        $bd = "alumnos";//clase

        try{
            $conexion = new PDO ("mysql:host=$servidor;dbname=$bd", $usuario, $contraseña);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "conexion correcta";
        } catch(PDOException $e) {
            echo "<br/>" . $e->getMessage();
            $conexion = null;
        }

       
        return $conexion;
    }

    conectar();
?>