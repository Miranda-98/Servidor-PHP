<html>

<head>

</head>
<style>
    table,
    th,
    td {
        border: solid black 1px;
    }
</style>

<body>
    <?php
    /*
    Crear un array bidimensional asociativo en el que la clave de la primera dimensión será
    el nombre de los equipos de la primera división de la liga de fútbol. Cada equipo
    contendrá un array de dos elementos, el primero, con clave “puntos” contiene la
    puntuación obtenida en la pasada liga. El segundo elemento con clave “posición”
    contendrá en número la posición en la tabla en la que finalizó el equipo la liga.
    Utilizando los bucles que necesites muestra en pantalla los nombres de los equipos, los
    puntos y la posición de los equipos que terminaron en las tres primeras posiciones de la
    liga.
    */

    $equipos = array(
        "malaga" => array("puntos" => 10, "posicion" => 4),
        "sevilla" => array("puntos" => 30, "posicion" => 2),
        "betis" => array("puntos" => 20, "posicion" => 3),
        "mirandes" => array("puntos" => 40, "posicion" => 1)
    );

    //array_multisort ordena el segundo array segun el criterio de ordenación del primero
    $posicion = array();
    foreach ($equipos as $clave => $valor) {
        $posicion[$clave] = $valor['posicion'];
    }
    array_multisort($posicion, SORT_ASC, $equipos);


    foreach ($equipos as $key => $value) {
        if ($equipos[$key]['posicion'] < 4) {
            echo "$key ->";
            foreach ($equipos[$key] as $pepe => $value) {

                echo " $pepe $value";
            }
        }
        echo "</br>";
    }
    ?>
    
</body>

</html>