<?php


function mostrar($tabla)
{
    try {
        $conexion = conectar();
        $sql = "SELECT * FROM $tabla;";
        $result = $conexion->query($sql);

        $camposTabla = [];
        $camposTablaCliente = "CLIENTE_ID/nombre/Direccion/Ciudad/Estado/CodigoPostal/CodigoDeArea/Telefono/Vendedor_ID/Limite_De_Credito/Comentarios";
        $camposTablaDepartamento = "departamento_ID/Nombre/Ubicacion_ID";
        $camposTablaEmpleados = "empleado_ID/Apellido/Nombre/Inicial_del_segundo_apellido/Trabajo_ID/Jefe_ID/Fecha_contrato/Salario/Comision/Departamento_ID";
        $camposTablaTrabajos = "Trabajo_ID/Funcion";
        $camposTablaUbicacion = "Ubicacion_ID/GrupoRegional";

        if ($tabla == "Cliente") {
            $camposTabla = explode("/", $camposTablaCliente);
        } else if ($tabla == "Departamento") {
            $camposTabla = explode("/", $camposTablaDepartamento);
        } else if ($tabla == "Empleados") {
            $camposTabla = explode("/", $camposTablaEmpleados);
        } else if ($tabla == "Trabajos") {
            $camposTabla = explode("/", $camposTablaTrabajos);
        } else if ($tabla == "Ubicacion") {
            $camposTabla = explode("/", $camposTablaUbicacion);
        }



        echo "<table id='tabla' border=solid black 1px>
            <th colspan=11>TABLA ".strtoupper($tabla)."</th><tr></tr>";

        for ($i = 0; $i < count($camposTabla); $i++) {//muestra el nombre de los campos de la tabla
            echo "<th>$camposTabla[$i]</th>";
        }

        foreach ($result as $fila) { //recorrer las filas que devuelve la consulta
            for ($i = 0; $i < count($camposTabla); $i++) {
                echo "<tr>";
                for ($i = 0; $i < count($camposTabla); $i++) {//rellena las celdas de las tablas
                    echo "<td>" . $fila[$camposTabla[$i]] . "</td>";
                }
                echo "</tr>";
            }
        }


    } catch (PDOException $e) {
        echo "error " . $e;
    }
}

