<html>

<head> </head>

<body>
    <?php

    function fibonacci($n)
    {
        $num1 = 0;
        $num2 = 1;
        $contador = 0;
        $fibonacci = [0];

        while ($contador < $n) {
            $num3 = $num1 + $num2;
            $num1 = $num2;
            $num2 = $num3;
            $contador ++;
            array_push($fibonacci, $num3);
            echo $num3.", ";
        }

        foreach ($fibonacci as $recorrer) {
            echo "array fibonacci: ".$recorrer."</br>";
        }

        echo "array fibonacci: ";
        for ($i=0; $i < count($fibonacci); $i++) { 
            echo $fibonacci[$i].", ";
        }
        

    }
    fibonacci(10);
    ?>
</body>

</html>