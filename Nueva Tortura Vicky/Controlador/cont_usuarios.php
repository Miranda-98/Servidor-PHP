<?php
    require '../Modelo/usuarios.php';

    class Controlador_Usuarios{
        function mostrar(){
            $user = new Usuario('inmobiliaria');
            $user->mostrarUsuarios();
        }
    }

    $control = new Usuario('inmobiliaria');

    if(isset($_GET['valor']) == 'borrar') {
        $control->eliminarUsuario($_GET['id']);
        include('../Vista/inicioUsuarios.php');
    }

    // if(isset($_POST['botonUsuarios'])) {
    //     include '../Vista/mostrarUsuarios.php';
    // } else if(isset($_POST['botonAdminUsuarios'])) {
    //     include '../Vista/paginaPublicaciones.php';
    // } 
?>