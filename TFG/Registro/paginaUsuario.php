<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA USUARIO</title>
</head>

<body>
    <?php
        require "conexionBD.php";
        $conexion = conectar();


        if (isset($_POST['registro'])) {
            $tarea = $_POST['tarea'];
            
            $insertar = $conexion->prepare("Insert INTO tareas2(valor) VALUES (?)");
            $insertar->bind_param("s", $tarea);
            $insertar->execute();
            echo "insertado correctamente";
        }

        function mostrarTabla() {
            $conexion = conectar();
            $sql = "SELECT valor from tareas2";
                                
            $result = $conexion->query($sql);
            echo "<table border= solid black 1px>";
            if ($result->num_rows > 0) { //mostrar todas las filas de las tablas
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>
                                valor: " . $row['valor']."<br>
                            </td>
                        </tr>";
                }
            } else { //sobra ya que es solo una funcion de control de datos
                echo "El usuario no tiene tareas";
            }
        }

        mostrarTabla();
        
    ?>






    <div>
        <form method="POST" action="paginaUsuario.php">
            <input type="text" name="tarea" value="" placeholder="Escribe tu tarea">
            <input id="submit" type="submit" name="registro" value="Guardar Tarea!">
        </form>

    </div>
</body>

</html>