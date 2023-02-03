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
        include '../Vista/administracionUsuarios.html';
    } else if(isset($_POST['botonFiltrar'])) {
        include '../Vista/busquedaPublicaciones.php';
    } else {
        include '../Vista/paginaPublicaciones.php';
    }

   
    
?>