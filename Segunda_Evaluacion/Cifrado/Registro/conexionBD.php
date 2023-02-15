<?php
function conectar(){
    $bbdd = "cifrado";
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $contraseña);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "conexion fallida: " . $e->getMessage();
    }

    return $conexion;
}
