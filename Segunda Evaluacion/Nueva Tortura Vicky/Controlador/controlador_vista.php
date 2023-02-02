<?php
    require '../Modelo/publicacion.php';
    
    
    class Controlador_Vistas{
        function mostrarTabla(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->mostraDatosPublicacionesPaginacionSI();
        }

        function buscadorPublicaciones(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->filtrarPublicaciones();
        }

        
    }

    $control = new Controlador_Vistas();
    
    if (isset($_GET['valor'])) {
        if($_GET['valor'] == 'mostrarTabla')
            $control->mostrarTabla();
        else if($_GET['valor'] == 'filtrarResultados')
            $control->buscadorPublicaciones();
    }       

   
    
?>