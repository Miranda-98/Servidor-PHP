<?php
    /*
        1- se comprueba que el usuario esta registrado
            - si ESTA REGISTRADO -> se le muestra su gestor de tareas
            - si NO ESTA REGISTRADO -> se le muestra un mensaje de que los datos son errones/no esta registrado y se le manda al login de registro
            
        1.1 - Si esta registrado se le manda a otra página que muestra su gestor de tareas  
    */
    require "conexionBD.php";
    
    function mostrarDatos()
    {
        $conexion = conectar();
        $nombre = $_POST['nombreUsuario'];
        $sql = "SELECT tareas.id, id_usuario, tarea from tareas	
                        inner join usuarios
                            on tareas.id_usuario=usuarios.id and usuarios.nombre like 'gerardo';";
                            
        $result = $conexion->query($sql);
            
        if ($result->num_rows > 0) { //mostrar todas las filas de las tablas
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - ID_USUARIO: " . $row["id_usuario"] . " " . $row["tarea"] . "<br>";
            }
        } else { //sobra ya que es solo una funcion de control de datos
            echo "El usuario no tiene tareas";
        }
        
    }
    
    
    function comprobarDatosRegistroCorrecto($correo, $contraseña)
    {
        
        $existe = false;
        $conexion = conectar();
        $sql = "SELECT id, nombre, correo FROM usuarios where (correo LIKE '$correo' and contraseña LIKE '$contraseña')";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) { //mostrar todas las filas de las tablas
            while ($row = $result->fetch_assoc()) {
                if (($row["correo"] = $correo) && ($row["contraseña"] = $contraseña)) {
                    //echo "id: " . $row["id"] . " - Name: " . $row["nombre"] . " " . $row["correo"] . "<br>";
                    echo "los datos son correctos";
                }
            }
            $existe = true;
        } else { //sobra ya que es solo una funcion de control de datos
            echo "Tabla vacia";
        }
        return $existe;
    }






    if (isset($_POST['registro'])) { //-> usuario existe -> lo mando a su pagina personal
        $correo = $_POST['nombreUsuario'];
        $contraseña = $_POST['passwordUsuario'];
        if (comprobarDatosRegistroCorrecto($correo, $contraseña) == true) {
            echo "el usuario existe";
            echo '<script language="javascript">alert("el usuario existe");</script>';
            $url = "../Registro/paginaUsuario.php";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
            //mostrarDatos();
        } else { //-> usuario no existe
            echo "el usuario no existe o los datos son incorrectos";
            echo '<script language="javascript">alert("el usuario no existe o los datos son incorrectos");</script>';
            $url = "loginUsuarios.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
        }
    }else{
        echo "formulario vacio";
    }
?>