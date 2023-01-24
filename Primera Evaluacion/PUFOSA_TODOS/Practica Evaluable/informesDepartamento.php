<link rel="stylesheet" type="text/css" href="style.css" />
<?php
    include "conexion.php";

    $conexion = conectar();
    $sql = "SELECT departamento.Nombre, ubicacion.GrupoRegional as 'Ubicacion', COUNT(empleados.empleado_ID) as 'Empleados por Departamento', round(MAX(empleados.Salario)) as 'Salario Maximo', round(avg(empleados.Salario),2) as 'Salario Medio', round(min(empleados.Salario)) as 'Salario Minimo' FROM departamento
	inner join empleados
    	on departamento.departamento_ID = empleados.Departamento_ID
    inner join ubicacion
    	on departamento.Ubicacion_ID = ubicacion.Ubicacion_ID
    GROUP BY departamento.departamento_ID;";

    $result = $conexion->query($sql);
    
    echo "<table id='tabla' border=solid black 1px>
    <th colspan=6>INFORME DEPARTAMENTOS</th>
                <tr>
                    <td>Nombre</td>
                    <td>Ubicacion</td>
                    <td>Empleados por Departamento</td>
                    <td>Salario Maximo</td>
                    <td>Salario Medio</td>
                    <td>Salario Minimo</td>
                </tr>";
    foreach($result as $row){
        echo " 
                <tr>
                    <td>".$row['Nombre']."</td>",
                    "<td>".$row['Ubicacion']."</td>",
                    "<td>".$row['Empleados por Departamento']."</td>",
                    "<td>".$row['Salario Maximo']."</td>",
                    "<td>".$row['Salario Medio']."</td>",
                    "<td>".$row['Salario Minimo']."</td>",
                "</tr>";
    }
?>