<?php
include "conexion.php";
    $conexion = conectar();
    $sql = "SELECT * FROM alumnos LIMIT 3;";
    $result = $conexion->query($sql);//almaceno en result lo que devuelve la query 
    
    echo "<table border=solid black 1px>
    <th colspan=4>TABLA ALUMNOS</th>
                <tr>
                    <td>nombre</td>
                    <td>apellido</td>
                    <td>correo</td>
                    <td>telefono</td>
                </tr>";
    foreach($result as $row){
        echo " 
                <tr>
                    <td>".$row['NOMBRE']."</td>",
                    "<td>".$row['APELLIDOS']."</td>",
                    "<td>".$row['TELEFONO']."</td>",
                    "<td>".$row['CORREO']."</td>",
                "</tr>";
    }
?>