<?php
    session_start();
    if(isset($_SESSION['usuario']))
        header('location: Controlador/cont_generico.php');
    else    
        header('location: Vista/loginUsuarios.html');

?>