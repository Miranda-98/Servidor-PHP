<?php
    require '../Modelo/publicacion.php';
    
    
    class Controlador_Vistas{
        function mostrarTabla(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->mostraDatosPublicaciones();
        }
    }

    $control = new Controlador_Vistas();
    
    if (isset($_GET['valor'])) {
        if($_GET['valor'] == 'mostrarTabla'){
            $control->mostrarTabla();
        }
    }
   
    
?>