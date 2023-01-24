<html>
    <head>    </head>
    <body>
        <?php 
            $minimo = 1;
            $maximo = 100;
            $valor = rand($minimo, $maximo);
            echo $valor."</br>";
            if ($valor <= 50) {
                echo "el número generado es menor o igual que 50 </br>";
            } else {
                echo "el número generado es mayor que 50";
            }
        ?>
    </body>
</html>