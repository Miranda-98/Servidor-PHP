<html>

<body>
    <?php
    /*
    Crea una función de usuario que reciba el correo electrónico de cada contacto de la
    agenda que devuelva true si el correo termina en “@gmail.com”, “@educa.madrid.org”,
    “@yahoo.com” o “@hotmail.com” y false en caso contrario.
    */
    
    $agenda = array(
        array("nombre" => "jorge", "direccion" => "madrid", "telefono" => "9999999", "correo" => "jorge@correo.com"),
        array("nombre" => "julia", "direccion" => "madrid", "telefono" => "9999999", "correo" => "julia@correo.com"),
        array("nombre" => "lucas", "direccion" => "madrid", "telefono" => "9999999", "correo" => "lucas@correo.com"),
        array("nombre" => "susana", "direccion" => "madrid", "telefono" => "9999999", "correo" => "susana@gmail.com"),
    );
    echo $agenda[1]['nombre'];
    echo "<table>
                <tr>
                <th colspan='3'>'agenda'</th>
                </tr>
                <tr>
                    <td>clave</td>
                    <td>clave</td>
                    <td>contenido</td>
                </tr>";

    foreach ($agenda as $a => $b) {
        echo "<tr>
                    <td rowspan='4'>$a</td> ";
        foreach ($agenda[$a] as $c => $b) {
            echo "<td>$c</td>
                <td>$b</td>
            </tr>";
        }
    }

    


    function comprobarEmail($agenda){
        $valido = null;
        foreach ($agenda as $fila => $dato) {
            foreach ($agenda[$fila] as $columna => $dato2) {
                if (strpos($dato2, "@gmail.com")){
                    $valido = "true";
                    
                } else {
                    $valido = "false";
                }
            }       
        }
    }

    echo "es valido: ".comprobarEmail($agenda);
    ?>
</body>

</html>