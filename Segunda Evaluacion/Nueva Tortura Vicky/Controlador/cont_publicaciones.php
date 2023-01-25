<?php
    require '../Modelo/publicacion.php';

    class Controlador_Publicacion{
        function eliminarPublicacion($id){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->eliminarAnuncio($id);
        }
    }
    $llamadaControlador = new Publicacion('inmobiliaria');

    echo 'valor -> ' . $_GET['valor'] . '<br>';
    echo 'id -> ' . $_GET['id'] . '<br>';
    if(isset($_GET['valor']) == 'borrar'){
        $llamadaControlador->eliminarAnuncio($_GET['id']);
        header('location: ../Vista/mostrarPublicaciones.php');
    }
    
?>