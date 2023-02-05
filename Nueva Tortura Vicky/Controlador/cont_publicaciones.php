<?php
    require '../Modelo/publicacion.php';

    class Controlador_Publicacion{
        function eliminarPublicacion($id){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->eliminarAnuncio($id);
        }

        function añadirPublicacion($tipo,$zona,$direccion,$ndormitorios,$precio,$tamano,$extras,$observaciones,$fecha_anuncio,$foto){
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->crearAnuncio($tipo,$zona,$direccion,$ndormitorios,$precio,$tamano,$extras,$observaciones,$fecha_anuncio,$foto);
        }

        function modificarPublicacion($id,$tipo,$zona,$direccion,$dormitorios,$precio,$tamaño,$extras,$observaciones,$fecha){
            // echo $id,$tipo,$zona,$direccion,$dormitorios,$precio,$tamaño,$extras,$observaciones,$fecha;
            
            $llamadaControlador = new Publicacion('inmobiliaria');
            $llamadaControlador->modificarAnuncio($id,$tipo,$zona,$direccion,$dormitorios,$precio,$tamaño,$extras,$observaciones,$fecha);
            // header('location: ../Vista/paginaInicio.php');

        }
    }
    $llamadaControlador = new Publicacion('inmobiliaria');

        
    if(isset($_GET['valor']) == 'borrar') {
        $llamadaControlador->eliminarAnuncio($_GET['id']);
        header('location: ../Vista/paginaInicio.php');
    } else if(isset($_GET['valor']) == 'modificar') {
        // $llamadaControlador->modificarAnuncio($_GET['id'], $_GET['']);
        // header('location: ../Vista/paginaInicio.php');
    } 
    
    
?>