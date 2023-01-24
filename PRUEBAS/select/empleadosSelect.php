<?php 


  function empleados(){
    $bbdd = "PUFOSA";
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $contador = 0;

    try {
        $conexion = new PDO ("mysql:host=$servidor;dbname=$bbdd", $usuario, $contraseña);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM empleados ;";
  
        $result = $conexion->query($sql);//almaceno en result lo que devuelve la query 
       
        echo "<select name='empleadoNombre'>";
        
        foreach($result as $fila){
          
          echo "<option value='$contador'>
  
          <tr>
          <td>".$fila['empleado_ID']."</td>", "-",     
          "<td>".$fila['Nombre']."</td></tr>
  
          </option>";
       }
       echo "</select>";
  
    } catch (PDOException $e) {
        echo "conexion fallida: ".$e->getMessage();
    }

  }

  empleados();
  
?>