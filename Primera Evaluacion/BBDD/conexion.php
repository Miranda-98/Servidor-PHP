<?php 
    function conectar(){
        $bbdd = "alumnos_bbdd";
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";

        try {
            $conecta = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $contraseña);
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexion exitosa";

        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }
    }
    conectar();
    
?>