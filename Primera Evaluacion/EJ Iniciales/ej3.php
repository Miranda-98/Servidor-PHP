<html>

<head>
    <title></title>
    <?php 
        function restar() {
            return 3 - 2;
        }

        function multiplicar($num1=2,$num2=3) {
            return $num1 * $num2;
        }
    ?>
</head>

<body>

    <?php
        $num1 = 2;
        $num2 = 3;
        $suma = 3 + 2;
        echo "el valor de la suma es ".$suma."</br>";
        echo "el valor de la resta es ".restar()."</br>";
        echo "el valor de la multiplicacion es ".multiplicar()."</br>";
        $divide;
        $modulo;

    ?>
</body>

</html>