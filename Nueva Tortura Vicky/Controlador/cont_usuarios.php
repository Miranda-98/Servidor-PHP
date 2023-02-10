<?php
    require '../Modelo/usuarios.php';

    class Controlador_Usuarios{
        function mostrar(){
            $user = new Usuario('inmobiliaria');
            $user->mostrarUsuarios();
        }

        function añadirUsuario(){
            $user = new Usuario('inmobiliaria');
            $user->crearUsuario($_GET['nombre']);
        }
    }

    $control = new Usuario('inmobiliaria');

    if(isset($_GET['valor']) == 'borrar') {
        $control->eliminarUsuario($_GET['id_usuario']);
        header('location: ../Vista/paginaInicio.php?user=user');
    } else if(isset($_GET['valor'])) {
        header('location: ../Vista/paginaInicio.php');
    }
    // else if(isset($_GET['valor']) == 'enviarUsuario'){
    //     header('location: ../Vista/paginaInicio.php?user');
    // }

    // if(isset($_POST['botonUsuarios'])) {
    //     include '../Vista/mostrarUsuarios.php';
    // } else if(isset($_POST['botonAdminUsuarios'])) {
    //     include '../Vista/paginaPublicaciones.php';
    // } 
?>