<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PUFOSA</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div id="k">
        <p><?php echo $_GET['msg'] ?? "" ?></p>
        <h1>PUFOSA</h1>
        <div class="div-registro">
            <form method="POST" action="">
                <div id="div-usuarios">
                    <input type="text" id="inputUsuario" name="user" placeholder="Usuario" required>
                </div>
                <div id="div-contraseña">
                    <input type="text" id="inputContrasena" name="password" placeholder="Contraseña" required>
                </div>
                <div id="div-botones">
                    <input type="submit" id="botonRegistro" name="botonRegistro" value="Entrar!">
                    <input type="reset" id="botonReset" value="Borrar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>



<?php
    require "conexionBDPufosa.php";


    if(isset($_POST['botonRegistro'])){
        $nombreR = $_POST['user'];
        $contraseñaR = $_POST['password'];

        // echo $nombreR.' - '.$contraseñaR.'</br>';

        try{
            $usuario = "root";
            $contraseña = "";
    
            $conexion = conectar();
    
            //sentencia sql
            $sql = "SELECT * FROM empleados WHERE empleado_ID LIKE $nombreR;";
            $pass = "";
            $id;
    
            $result = $conexion->query($sql);//almaceno en result lo que devuelve la query 
                
            
            foreach($result as $fila){
                $fila['empleado_ID'];
                $fila['Inicial_del_segundo_apellido'];
                $fila['Trabajo_ID'];
    
                $usuario = $fila['empleado_ID'];
                $pass = $fila['Inicial_del_segundo_apellido']."".$fila['empleado_ID'];
                $id = $fila['Trabajo_ID'];
            }

            //comprobar que el usuario esta registrado 
            $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM empleados WHERE empleado_ID='".$_REQUEST['user']."';";
            $resultado = $conexion->query($sqlComprobar);
            $num = $resultado->fetch();
            if($num['cantidad']>0 && $pass == $contraseñaR) {
                // echo "usuario valido";
    
                fopen("PUFOSA.txt", "w+b");
                echo "ppppppppppppppppppppppppppp".$id;
                if (($id == 671 )) {
                    header("location:pagina.php ? user=$id");
                    die();
    
    
                } else if($id == 672) { 
    
                    header("location:pagina.php ? user=$id");
                    die();
    
                } else {

                    header("location:pagina.php ? user=$id");
                    die();
    
                }
            } else {
                header("location:index-login.php ? msg='<script language='javascript'>alert('los datos introducidos no son correctos')</script>';");
                die();
            }
        
    
    
        } catch (PDOException $e){
            echo" <script language='javascript'>alert('los datos introducidos no son correctos')</script>";
        }

    }

    
?>




