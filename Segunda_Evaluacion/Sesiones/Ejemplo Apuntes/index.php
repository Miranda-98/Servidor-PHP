<?php
    if(session_status() == PHP_SESSION_NONE)
        session_start();

    //si identificar no esta vacio comprueba el valor de nombre y se lo asigna a la sesion y redirige a la pagina 2
    if (!empty($_REQUEST['identificar'])){
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $_SESSION['usuario'] = $_POST['nombre'];
            //variable de sesion que solo vale true si el login se realiza correctamente -> existe usuario
            $_SESSION['login'] = 'true';
            include_once ('pagina2.php');
            die;
        }
    }

    if (isset ($_POST['borrar']) && isset ($_SESSION['usuario'])){
        //si existe usuario(login valido) y ha pulsado borrar se va a otra página
        $_SESSION['login'] = 'true';
        include_once ('pagina3.php');
        die;
    }//else if (isset ($_POST['borrar']) && empty ($_REQUEST))
    else{
        include_once ('login.php');
        die;
    }
?>