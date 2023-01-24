<?php

function conectar()
{
    $bbdd = "pufosa";
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $contraseña);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "conexion exitosa";

    } catch (PDOException $e) {
        echo "conexion fallida: " . $e->getMessage();
    }

    return $conexion;
}
