<html>
    <head>    </head>
    <body>
        <?php 
            $numero = 15;
            $semana = array(1=>"luners", 2=>"martes", 3=>"miercoles", 4=>"jueves", 5=>"viernes", 6=>"sabado", 7=>"domingo");
            if ($numero > 0 && $numero < 8){
                echo $semana[$numero];
            } else {
                echo "el número no es valido";
            }
        ?>
    </body>
</html>