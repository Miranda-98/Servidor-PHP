<html>
    <head>    </head>
    <body>
        <?php 
            $numero = 5;
            if ((is_int($numero) == true) && ($numero > 0)){
                echo "es entero y positivo </br>";
                if($numero % 2 == 0){
                    echo "el número es par";
                } else {
                    echo "el número es impar";
                }
            } else {
                echo "no es entero y/o positivo";
            }
        ?>
    </body>
</html>