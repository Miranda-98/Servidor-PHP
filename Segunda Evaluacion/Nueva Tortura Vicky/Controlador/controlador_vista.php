<?php
    require '../Modelo/publicacion.php';
    
    class Controlador_Vistas{
        function mostrarTabla(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->mostraDatosPublicaciones();
        }
    }
    
?>