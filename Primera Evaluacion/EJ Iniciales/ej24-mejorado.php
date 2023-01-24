<?php 
/* mostrar los equipos ordenados por posicion, para ello utiliza la funcion ksort. Puedes realizar los siguientes pasos
    -guardar en un array auxiliar los equipos por posicion. Despues lo ordeno y lo muestro por pantalla
    -el indice del array auxiliar sera la posicion en la que quedo, y el contenido es un array con el nombre del equipo y los puntos obtenidos
*/
        $equipos = array(
            "malaga" => array("puntos" => 10, "posicion" => 4),
            "sevilla" => array("puntos" => 30, "posicion" => 2),
            "betis" => array("puntos" => 20, "posicion" => 3),
            "mirandes" => array("puntos" => 40, "posicion" => 1)
        );

        $aux = [];
        foreach ($equipos as $nombreEquipo => $datos) {
            echo "<br>nombre equipos: $nombreEquipo";
            echo "<br>datos posicion: ".$datos['posicion'];
            echo "<br>datos puntos: ".$datos['puntos'];
            if($datos['posicion'] <= 3){
                //en la variable aux en el indice del valor de posicion meto el nombre del equipo y los puntos
                $aux[$datos['posicion']] = array($nombreEquipo,$datos['puntos']);
            }
        }


        ksort($aux);
        foreach ($aux as $posicion => $datos) {
            echo $posicion;
            foreach($datos as $valor) {
                echo $valor;
            }
            echo '<br>';
        }


        echo "<pre";
        print_r($aux);
        echo "</pre><br/>";


        echo "<pre";
        print_r($equipos);
        echo "</pre>";
?>