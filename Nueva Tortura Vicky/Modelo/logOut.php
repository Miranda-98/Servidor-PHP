<?php

    session_start();
    
    $expire = time() + (30 * 24 * 60 * 60); 
        $date2 = date("Y-m-d H:i:s");
        setCookie($_SESSION['user'], $date2, $expire, '/');//expira en 30 días
        //$_COOKIE['datosUltimaConexion'];
        echo "pepe";

        echo $_SESSION['user'];
        echo $_COOKIE[$_SESSION['user']]; 
        session_destroy();
    header('location: ../Vista/loginUsuarios.html');
    
?>