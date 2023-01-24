<?php
    require_once "conexion.php";
    //include_once "mostrar.php";
    function departamentoNombre() {
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM departamento ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='departamentoNombre'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['Nombre'].">".$fila['Nombre']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }      
    }

    function vendedor() {
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM empleados ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='empleado'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['empleado_ID'].">".$fila['empleado_ID']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }      
    }


    function cliente() {    
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM cliente ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='cliente'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['CLIENTE_ID'].">".$fila['CLIENTE_ID']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }
    }
    
    function departamento() {    
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM departamento ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='departamento'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['departamento_ID'].">".$fila['departamento_ID']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }
    }

    function empleados() {//select con los valores de los empleados_ID    
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM empleados ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='empleados'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['empleado_ID'].">".$fila['empleado_ID']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }
    
    }
    function trabajosNombre() {
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM departamento ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='trabajo2'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['Nombre'].">".$fila['Nombre']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }
    }


    function trabajos() {    
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM trabajos ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='trabajos'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['Trabajo_ID'].">".$fila['Trabajo_ID']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }
    
    }

    function ubicacion() {    
        try {
            $conexion = conectar();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM ubicacion ;";
        
            $result = $conexion->query($sql);
            
            echo "<select name='ubicacion'>";
            
            foreach($result as $fila){
                
                echo "<option value=".$fila['Ubicacion_ID'].">".$fila['Ubicacion_ID']."</option>";
                
            }
            echo "</select>";
        
        } catch (PDOException $e) {
            echo "conexion fallida: ".$e->getMessage();
        }
    }
?>