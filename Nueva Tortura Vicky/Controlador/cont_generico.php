<?php
    require '../Modelo/usuarios.php';
    session_start();


    $user = new Usuario('inmobiliaria');

    $id = $_POST['nombreUsuario'];
    $pass = $_POST['passwordUsuario'];


    if($user->controlUsuarios($id, $pass)){
        // $pepe = $user->controlUsuarios($id, $pass);
        // echo "<br>-------------SUUUUUUU--------------<br>";
    
        session_start();
        
        $_SESSION['user'] = $id;
        echo  $_SESSION['user'];
        
        header('location: ../Vista/paginaInicio.php');
    }else {
        // echo "<br>-------------NOOOOOOOOOO--------------<br>";
        header('location: ../Vista/loginUsuarios.html');
    }
      
?>