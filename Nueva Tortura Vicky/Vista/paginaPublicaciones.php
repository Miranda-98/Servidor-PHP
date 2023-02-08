<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
</head>
<style>
    .mostrar td {
        border: solid black 1px;
    }

    table {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #barraPagina{
        margin: auto;
        width: 50%;
        
    }
</style>
<body>
    <table class="mostrar">
        <th colspan=12 class="mostrar">Tabla Viviendas</th>
        <tr>
            <td> </td>
            <td>ID</td>
            <td>TIPO</td>
            <td>ZONA</td>
            <td>DIRECCION</td>
            <td>Nº Dormitorios</td>
            <td>Precio</td>
            <td>Tamaño</td>
            <td>Extras</td>
            <td>Fotos</td>
            <td>Observaciones</td>
            <td>Fecha anuncio</td>
        </tr>

        <!-- <a href="busquedaPublicaciones.php">Filtrar resultados</a> -->
       <tr>
       <?php 
            require_once "../Modelo/publicacion.php";
            $publicacion = new Publicacion('inmobiliaria');
            // $publicacion->mostraDatosPublicaciones();

            

            $p = $publicacion->mostraDatosPublicaciones();
            
            foreach($p as $fila){
                $idSeleccionado = $fila['total_id'];
                $tipoSeleccionado = $fila['tipo'];
                $zonaSleccionado = $fila['zona'];
                $direccionSeleccionada = $fila['direccion'];
                $nDormitoriosSeleccionados = $fila['ndormitorios'];
                $precioSeleccionado = $fila['precio'];
                $tamañoSeleccionado = $fila['tamano'];
                $extrasSeleccionados = $fila['extras'];
                $observacionesSeleccionadas = $fila['observaciones'];
                $fechaSeleccionada = $fila['fecha_anuncio'];

             
                $aFotos = explode(',',$fila['fotos']);
                
                echo "<tr> 
                        <td>
                            <a href='../Controlador/cont_publicaciones.php?id=$idSeleccionado&valor=borrar'>Borrar</a><br/>
                            <a href='../Vista/modificarPublicacion.php?id=$idSeleccionado&tipo=$tipoSeleccionado&zona=$zonaSleccionado
                            &direccion=$direccionSeleccionada&dormitorios=$nDormitoriosSeleccionados&precio=$precioSeleccionado
                            &tamaño=$tamañoSeleccionado&extras=$extrasSeleccionados&observaciones=$observacionesSeleccionadas
                            &fecha=$fechaSeleccionada'>Modificar</a>
                        </td>
                        <td>" . $fila['total_id'] . "</td>
                        <td>" . $fila['tipo'] . "</td>
                        <td>" . $fila['zona'] . "</td>
                        <td>" . $fila['direccion'] . "</td>
                        <td>" . $fila['ndormitorios'] . "</td>
                        <td>" . $fila['precio'] . "</td>
                        <td>" . $fila['tamano'] . "</td>
                        <td>" . $fila['extras'] . "</td>";
                        echo "<td>"; 
                        for($i=0;$i<count($aFotos);$i++){
                            echo "<a href='../img/".$aFotos[$i]."' target='_blank'>" . $aFotos[$i] . "</a><br/>";
                        }
                        echo "</td>";
                        echo "<td>" . $fila['observaciones'] . "</td>
                        <td>" . $fila['fecha_anuncio'] . "</td>
                    </tr>";    
                    
            }
        ?>
       </tr>

        
            <!-- mostrarTabla()->controlador -->
    </table>
</body>
</html>