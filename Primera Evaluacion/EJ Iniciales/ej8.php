<html>
    <head>    </head>
    <body>
        <?php 
            $posicion = "verde";
            switch($posicion) {
                case "arriba":
                    echo $posicion;
                    break;
                case "abajo":
                    echo $posicion;
                    break;
                default:
                    echo "la variable contiene otro valor distinto de arriba y abajo";
            }
        ?>
    </body>
</html>