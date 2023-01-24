<html>

<head>

</head>

<body>
    <?php
    /*. Crear un array de 20 elementos que contenga números aleatorios entre 1 y 30 sin
        repetir. Mostrarlo en pantalla ordenado descendentemente. Los números impares se
        mostrarán en color rojo y los pares en color verde. Mostrar en pantalla cuántos números
        salieron repetidos al generar el array y cuáles fueron.
        Utiliza funciones de usuario.*/

    $lista = array();
    $lista_repetidos = array();
    $contador = 0;

    while ($contador < 20) {
        $n = rand(1, 30);
        if (in_array($n, $lista)){
            array_push($lista_repetidos, $n);
        } else {
            array_push($lista, $n);
            $contador++;
        }
    }

    //ordemar array de forma descendente
    arsort($lista);

    foreach ($lista as $valor) {
        if ($valor % 2 == 0) {
            echo "<span style='color: green; font-size: 45px'>$valor, </span>";
        } else {
            echo "<span style='color: red; font-size: 45px'>$valor, </span>";
        }
    }
    
    echo "</br>";
    echo "los elementos repetidos son: ";
    echo imprimir($lista_repetidos)." y hay un total de ".count($lista_repetidos);

    function imprimir($lista) {
        foreach ($lista as $l){
            echo "$l, ";
        }
    }
    ?>
</body>

</html>