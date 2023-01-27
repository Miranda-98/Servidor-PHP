<?php
    require '../Modelo/usuarios.php';


    $user = new Usuario('inmobiliaria');

    $id = $_POST['nombreUsuario'];
    $pass = $_POST['passwordUsuario'];


    if($user->controlUsuarios($id, $pass) == true){
        session_start();
        header('location: ../Vista/paginaInicio.html');
    }else {
        header('location: ../Vista/loginUsuarios.html');
    }
      
?>