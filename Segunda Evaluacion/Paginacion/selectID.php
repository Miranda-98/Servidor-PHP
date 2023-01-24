<?php
    require_once "conexion.php";
    //include_once "mostrar.php";


    try {
        $conexion = conectar();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $limite = 10;

        /*
            Si pgnActual no existe mostramos la primera pagina de registros
            Si pgnActual si existe mostramos la pagina de registros correspondiente
        */
        if(isset($_GET['pgnActual'])){
            if($_GET['pgnActual']==1){
                header("Location:selectID.php");
            } else {
                $paginaActual = $_GET['pgnActual'];
            }
        } else {
            $paginaActual = 1;
        }
        
        // formula para la páginacino
        $paginacion = ($paginaActual-1) * $limite;

        // sql para obtener los registros
        $sql = "SELECT * FROM empleados LIMIT $paginacion,$limite";

        // sql para obtener la cantidad de registros
        $sql2 = "SELECT COUNT(*) AS 'cantidad' FROM empleados;";
 
        // en num se guardan la cantidad de registros para luego crear la cantidad de páginas necesarioas
        $nRegistros = $conexion->query($sql2);
        $num = $nRegistros->fetch();

        // se almacena los registros
        $result = $conexion->query($sql);
        
        echo "<table border=solid black 1px>
        <th colspan=11>TABLA EMPLEADOS</th>
                    <tr>
                        <td>empleado_ID</td>
                        <td>Apellido</td>
                        <td>Nombre</td>
                        <td>Inicial_del_segundo_apellido</td>
                        <td>Trbajo_ID</td>
                        <td>Jefe_ID</td>
                        <td>Fecha_contrato</td>
                        <td>Salario</td>
                        <td>Comision</td>
                        <td>Departamento_ID</td>
                    </tr>"; 
        
        
        
        foreach($result as $fila){
            echo " <tr>
            <td>".$fila['empleado_ID']."</td>", 
            "<td>".$fila['Apellido']."</td>", 
            "<td>".$fila['Nombre']."</td>", 
            "<td>".$fila['Inicial_del_segundo_apellido']."</td>", 
            "<td>".$fila['Trabajo_ID']."</td>", 
            "<td>".$fila['Jefe_ID']."</td>", 
            "<td>".$fila['Fecha_contrato']."</td>", 
            "<td>".$fila['Salario']."</td>", 
            "<td>".$fila['Comision']."</td>", 
            "<td>".$fila['Departamento_ID']."</td></tr>";


        }

        /*
            crear las páginas según la cantidad de registros existentes y la cantidad
            de datos a mostrar por página, el ceil redondea a la alza(para que cuando
            no se lleguen a la cantidad de registos minimo por pagina se muestren los
            sobrantes para no perderlos)
            el if es pura mariconada para estetica
        */
        for ($i=1; $i <= ceil($num['cantidad']/$limite); $i++) { 
            if($i<ceil($num['cantidad']/$limite))
                echo "<a href='?pgnActual=".$i."'>".$i."</a> - ";
            else 
                echo "<a href='?pgnActual=".$i."'>".$i."</a> ";
        }   
    
    } catch (PDOException $e) {
        echo "conexion fallida: ".$e->getMessage();
    }      


    
?>