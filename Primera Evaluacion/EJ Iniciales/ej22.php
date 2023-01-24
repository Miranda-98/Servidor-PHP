<html>

<head>

</head>

<body>
    <?php
    /*Crear un array asociativo de dos dimensiones. La clave de la primera dimensión será el
    código de empleado que tendrá el formato “CExxxx” donde xxxx es un número de 4
    cifras.
    La segunda dimensión contiene un array asociativo con claves “nombre”, “edad” y
    “salario” cuyo contenido será el nombre, la edad y el salario del empleado.
    Hacer una función en PHP que reciba como parámetros el nombre, la edad y el salario
    de un empleado, y calcula un nuevo salario para esa persona en base a su situación:
    o Si el salario es mayor de 2.000€, no cambiará.
    o Si el salario está entre 1.000 y 2.000€:
    ▪ Si además la edad es mayor de 45 años se sube un 4%.
    ▪ Si la edad es menor o igual que 45 años se sube un 10%
    o Si el salario es menor de 1.000€:
    ▪ Los menores de 30 años cobrarán a partir de entonces exactamente 1.500€.
    ▪ De 30 a 45 años sube un 3%.
    ▪ A los mayores de 45 años sube un 15%.
    La función debe actualizar en el array los valores en caso de cambio y mostrar en
    pantalla los nombres y el nuevo salario de los que han sufrido modificaciones.*/

    $empleados = array(
        "CE0000" => array("nombre" => "pedro", "edad" => 44, "salario" => 1500),
        "CE0001" => array("nombre" => "luis", "edad" => 46, "salario" => 1500),
        "CE0002" => array("nombre" => "maria", "edad" => 31, "salario" => 1500),
        "CE0003" => array("nombre" => "marcos", "edad" => 28, "salario" => 1800),
    );

    function cambiaSueldo($nombre, $edad, &$salario)
    {
        $salarioAntiguo = $salario;
        if (1000 < $salario && $salario < 2000) {
            if ($edad > 45) {
                $salario = $salario + ($salario * 0.04);
            } else {
                $salario = $salario + ($salario * 0.10);
            }
        } else if (1000 < $salario) {
            if ($edad < 30) {
                $salario = 1500;
            } else if ($edad > 30 && $edad < 45) {
                $salario = $salario + ($salario * 0.03);
            } else {
                $salario = $salario + ($salario * 0.15);
            }
        }

        if ($salarioAntiguo != $salario) {
            echo "$nombre, $edad, $salario";
        } else {
            echo "$nombre, $edad, $salarioAntiguo";
        }
    }


    cambiaSueldo($empleados['CE0000']['nombre'], $empleados['CE0000']['edad'], $empleados['CE0000']['salario']);

    ?>
</body>

</html>