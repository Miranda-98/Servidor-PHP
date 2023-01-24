<?php
    require '../Modelo/publicacion.php';

    class Controlador_Publicacion{
        function mostrarTabla(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->mostraDatosPublicaciones();
        }

        function eliminarPublicacion(){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->eliminarAnuncio(2);
        }
    }
    
?>