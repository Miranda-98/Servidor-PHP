<?php
    session_start();
    
    
    if(isset($_SESSION['usuario'])){
        $expire = time() + (30 * 24 * 60 * 60); 
    $date2 = date("Y-m-d H:i:s");
    setCookie($_SESSION['user'], $date2, $expire, '/');//expira en 30 días
    //$_COOKIE['datosUltimaConexion'];
    echo $_COOKIE[$_SESSION['user']]; 
       

        header('location: Controlador/cont_generico.php');
    }else{
        header('location: Vista/loginUsuarios.html');
        
    }

?>