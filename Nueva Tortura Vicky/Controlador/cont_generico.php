<?php
    require '../Modelo/usuarios.php';


    $user = new Usuario('inmobiliaria');

    $id = $_POST['nombreUsuario'];
    $pass = $_POST['passwordUsuario'];


    if($user->controlUsuarios($id, $pass)){
        // $pepe = $user->controlUsuarios($id, $pass);
        // echo "<br>-------------SUUUUUUU--------------<br>";
    
        session_start();
        $expire = time() + (30 * 24 * 60 * 60); 
        $date2 = date("Y-m-d H:i:s");
        setCookie('datosUltimaConexion', $date2, $expire, '/');//expira en 30 días
        $p = $_COOKIE['datosUltimaConexion'];
        header('location: ../Vista/paginaInicio.php');
    }else {
        // echo "<br>-------------NOOOOOOOOOO--------------<br>";
        header('location: ../Vista/loginUsuarios.html');
    }
      
?>