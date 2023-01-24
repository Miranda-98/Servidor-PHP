<html>
    <head> </head>
    <body>
        <?php 
            $colores = array("azul", "rojo", "verde", "rosa", "naranja", "morado");
            $buscado = "rosa";
            $posicion;

            if ( array_search($buscado, $colores) == true){
                echo "esta </br>";
            } else {
                echo "no esta </br>";
            }

            for ($i=0; $i < count($colores); $i++) { 
                if ($colores[$i] == $buscado) {
                    $posicion = $i;
                }
            }

            print_r($colores);
            
            array_splice($colores, 3, 1);

            for ($i=0; $i < count($colores); $i++) { 
                echo $colores[$i].", ";
            }
            print_r($colores);
        ?>
    </body>
</html>