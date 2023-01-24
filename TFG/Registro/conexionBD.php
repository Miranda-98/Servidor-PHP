<?php
function conectar(){
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $bd = "usuariosRegistrados";
    
    $conexion = new mysqli($servidor, $usuario, $contraseña, $bd);
    if ($conexion->connect_errno) {
        echo "fallo de conexion<br>";
    } else {
        echo "se conecto<br>";
    }
    return $conexion;
}
