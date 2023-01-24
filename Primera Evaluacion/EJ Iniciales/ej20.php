<html>

<head>

</head>

<body>
    <?php
    /*
    Haz un programa que muestre 2000 cuadrados de colores aleatorios que además se
    coloquen en posiciones aleatorias por la pantalla.
    • El tamaño de los cuadrados será 50x50 píxeles.
    • Las posiciones aleatorias se calcularán entre 0 y 100 que representa el porcentaje
    (0% -100%) para posiciones absolutas, relativa, o fixed de los atributos left y top
    de los cuadrados.
    • Los colores aleatorios se calculan obteniendo un número aleatorio entre 0 y 255
    para cada valor RGB.
    */

    function colorRand(){
        $c = rand(0, 255);
        return $c;
    }

    function psRand1(){
        $p = rand(0, 100)."%";
        return $p;
    }

    function psRand2(){
        $p = rand(0, 100)."%";
        return $p;
    }

    function generarCuadrados(){
        echo "<div style='position: absolute; 
        height: 50px; 
        width: 50px;
        left:".psRand1().";
        top:".psRand2()."; 
        background-color: rgb(".colorRand().",".colorRand().",".colorRand().")' >  </div>";
    }

    for ($i=0; $i < 200; $i++) { 
        echo generarCuadrados();
    }
    
    ?>
</body>

</html>