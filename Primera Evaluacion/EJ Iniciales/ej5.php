<html>
    <head>    </head>
    <body>
        <?php 
            $num1 = 2;
            $num2 = 4;
            echo "el primer número es ".$num1." y el valor del segundo número es ".$num2.".</br>";
            if ($num1 > $num2) {
                echo "el número ".$num1." es mayor que el número ".$num2;
            } elseif ($num1 < $num2) {
                echo "el número ".$num2." es mayor que el número ".$num1;
            } else {
                echo "los dos números son iguales";
            }
        ?>
    </body>
</html>