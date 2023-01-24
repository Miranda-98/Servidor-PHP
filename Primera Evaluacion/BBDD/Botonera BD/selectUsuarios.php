<?php 
echo "<link rel='stylesheet' type='text/css' href='estilosBotonera.css' />";
    require "conexionClase.php";

    try{
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //sentencia sql
        $sql = "SELECT * FROM `alumnos`;";

        $result = $conecta->query($sql);//almaceno en result lo que devuelve la query 
    
        echo "<table border=solid black 1px>
        <th colspan=4>TABLA ALUMNOS</th>
                    <tr>
                        <td>codigo</td>
                        <td>nombre</td>
                        <td>apellido</td>
                        <td>correo</td>
                        <td>telefono</td>
                    </tr>";
        foreach($result as $row){
            echo " 
                    <tr>
                        <td>".$row[0]."</td>",
                        "<td>".$row[1]."</td>",
                        "<td>".$row[2]."</td>",
                        "<td>".$row[3]."</td>",
                        "<td>".$row[4]."</td>",
                    "</tr>";
        }



    } catch (PDOException $e){
        echo "error ".$e->getMessage();
    }
?>