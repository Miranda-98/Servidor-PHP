<?php
    require '../Modelo/publicacion.php';
    
    
    class Controlador_Vistas{
        function mostrarTabla(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->mostraDatosPublicaciones();
        }

        function buscadorPublicaciones(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->filtrarPublicaciones();
        }

        
    }

    $control = new Controlador_Vistas();
    
    // if (isset($_GET['valor'])) {
    //     if($_GET['valor'] == 'filtrarResultados')
    //         $control->buscadorPublicaciones();
    // } else 
    if(isset($_POST['botonTablas'])) {
        include '../Vista/paginaPublicaciones.php';
    } else if(isset($_POST['botonUsuarios'])) {
        include '../Vista/inicioUsuarios.php';
    } else if(isset($_POST['botonFiltrar'])) {
        echo "<h1>pepeweeeeeeeeeeeeeeeeeeeeee</h1>";
        //include '../Vista/busquedaPublicaciones.php';
        header('location: ../Vista/busquedaPublicaciones.php');
    } else if(isset($_POST['añadirPublicacion'])) {
        // include 'añadirPublicacion.php';
        header('location: ../Vista/añadirPublicacion.php');
    } else if(isset($_GET['user'])) {
        include '../Vista/inicioUsuarios.php';
    }
    else {
        include '../Vista/paginaPublicaciones.php';
    }

   
    
?>