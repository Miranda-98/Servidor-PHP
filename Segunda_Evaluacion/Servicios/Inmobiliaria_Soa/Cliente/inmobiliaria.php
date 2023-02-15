<?php
    $options = array('uri'=>'http://localhost/practicas_clase/Servidor-PHP/Segunda_Evaluacion/Servicios/Inmobiliaria_Soa/Servidor',
    'location'=>'http://localhost/practicas_clase/Servidor-PHP/Segunda_Evaluacion/Servicios/Inmobiliaria_Soa/Servidor/serverSOAP.php');
    try{
        $cliente = new SoapClient(null,$options);
        $response = $cliente->mostrar('Norte');
     
         // "pepe -> " . $response;

        echo "<style> table, td{border:solid black 1px;}</style>";
        echo "<table>";
        foreach ($response as $fila) {


            $idSeleccionado = $fila->id;
            $tipoSeleccionado = $fila->tipo;
            $zonaSleccionado = $fila->zona;
            $direccionSeleccionada = $fila->direccion;
            $nDormitoriosSeleccionados = $fila->ndormitorios;
            $precioSeleccionado = $fila->precio;
            $tamañoSeleccionado = $fila->tamano;
            $extrasSeleccionados = $fila->extras;
            $observacionesSeleccionadas = $fila->observaciones;
            $fechaSeleccionada = $fila->fecha_anuncio;


            echo "<tr>
                            <td>" . $fila->id . "</td>
                            <td>" . $fila->tipo . "</td>
                            <td>" . $fila->zona . "</td>
                            <td>" . $fila->direccion . "</td>
                            <td>" . $fila->ndormitorios . "</td>
                            <td>" . $fila->precio . "</td>
                            <td>" . $fila->tamano . "</td>
                            <td>" . $fila->extras . "</td>
                        </tr>";
        }
        echo "</table>";



        $response2 = $cliente->cantidad('Norte');
        echo "Con el filtro aplicado hay ". $response2[0] . " viviendas";
        // $cliente = new SoapClient(null, $options);
        // $response = $cliente->sumar(2,5);
        // echo "la suma es : ".$response."<br>";

        // $response = $cliente->restar(2,2);
        // echo "la resta es : ".$response;
    } catch (SoapFault $e) {
        echo '<br/> ERROR '.$e->getMessage();
    }
?>