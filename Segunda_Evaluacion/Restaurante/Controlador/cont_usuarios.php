<?php
    require '../Modelo/usuario.php';

    $id = $_POST['nombre'];
    $pass = $_POST['contraseña'];

    $user = new Usuario('restaurante');
    if($user->comprobarUsuario($id,$pass)) {
        echo "existe";
    } else {
        echo "no existe";
    }
?>