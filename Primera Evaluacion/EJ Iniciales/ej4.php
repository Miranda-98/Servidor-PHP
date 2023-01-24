<html>
    <head>    </head>
    <body>
        <?php 
            $sueldoNeto = 2750;
            $retencion = 22;
            $sueldoBruto = $sueldoNeto-($sueldoNeto * $retencion)/100;

            echo "el sueldo neto es ".$sueldoNeto." € al cual
                se le aplica una retencion del ".$retencion." %, por
                lo que se le queda un sueldo bruto de ".$sueldoBruto." €.</br>";
        ?>
    </body>
</html>