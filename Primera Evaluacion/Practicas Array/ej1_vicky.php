<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <?php 
         function aprobados() {
            $numero  = 50;
            $total = ($numero*2)/3;
            return $total;
        }
        ?>
        <?php 

            echo "hola enfermis </br>";
            echo "alumnos aprobados " . aprobados();
        ?>

        <?php 
            $miTienda = array("camiseta", "vaquero", "abrigo");
            $miTienda[] = "chubasquero";

            $miTienda = array("camiseta" => array("referencia" => 4567, "precio" => 14),
                            "vaqueros" => array("referencia" => 6090, "precio" => 35),
                            "abrigo" => array("referencia" => 3689, "precio" => 90));

            foreach ($miTienda as $productos => $referencia) {
                echo "el producto ".$productos." tiene una referencia ".$referencia['referencia']."</br>";
            }
        ?>
    </body>
</html>