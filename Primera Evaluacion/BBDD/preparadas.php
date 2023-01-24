<?php
include "conexion.php";
    $conexion = conectar();
    //$sql = "SELECT * FROM alumnos LIMIT 3;";
    //$result = $conexion->query($sql);//almaceno en result lo que devuelve la query 
    $result = $conexion->prepare("SELECT ");


    $insertar = $conexion->prepare("Insert INTO tareas2(valor) VALUES (?)");
    $insertar->bind_param("s", $tarea);
    $insertar->execute();
    
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