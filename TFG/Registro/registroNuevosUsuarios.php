
<?php
/*
    Una vez que se registra un usuario se comprueba si ya esta registrado (en la base de datos usuario) pueden pasar dos cosas:
    1-si ya ESTA REGISTRADO se muestra un mensaje que indica que ya esta registrado y se le manda a la ventana de login principal
    2-si NO ESTA REGISTRADO se le registra y se le manda a la ventana de login principal para que acceda con su cuenta recien creada

    En el caso de un login desde el login principal se comprueba que de verdad este registrado
    1- si ESTA REGISTRADO -> se le muestra su gestor de tareas
    2- si NO ESTA REGISTRADO -> se le muestra un mensaje de que los datos son errones/no esta registrado y se le manda al login de registro

*/
require "conexionBD.php";

function mostrarUsuarios()
{
    echo "mostrar todos los usuarios registrados";
    $conexion = conectar();
    $sql = "SELECT id, nombre, correo FROM usuarios";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) { //mostrar todas las filas de las tablas
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["nombre"] . " " . $row["correo"] . "<br>";
        }
    } else { //sobra ya que es solo una funcion de control de datos
        echo "Tabla vacia";
    }
}

function comprobarExisteUsuario($nombre)
{
    //echo "busqueda de usuarios<br>";
    $existe = false;
    $conexion = conectar();
    $sql = "SELECT id, nombre, correo FROM usuarios where nombre LIKE '$nombre'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) { //mostrar todas las filas de las tablas
        while ($row = $result->fetch_assoc()) {
            if ($row["nombre"] = $nombre) {
                //echo "id: " . $row["id"] . " - Name: " . $row["nombre"] . " " . $row["correo"] . "<br>";
            }
        }
        $existe = true;
    } else { //sobra ya que es solo una funcion de control de datos
        echo "Tabla vacia";
    }
    return $existe;
}

function insertarUsuario()
{
    $conexion = conectar();

    if (isset($_POST['registro'])) {
        $nombre = $_POST['nombreRg'];
        $correo = $_POST['correoRegistro'];
        $rCorreo = $_POST['confirmaCorreoRegistro'];
        $contraseña = $_POST['contraseña'];
        if (comprobarExisteUsuario($nombre) == false) {
            $insertar = $conexion->prepare("Insert INTO usuarios(nombre,correo,contraseña) VALUES (?,?,?)");
            $insertar->bind_param("sss", $nombre, $correo, $contraseña);
            $insertar->execute();
            echo "usuario registrado correctamente";
        } else {
            echo "el usuario ya esta registrado";
            echo '<script language="javascript">alert("Usuario ya registrado");</script>';
            //echo "<body onLoad=loginUsuarios.html;''>";
            $url = "loginUsuarios.html";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
        }
    }
}



//mostrarUsuarios();
//comprobarExisteUsuario("pepe");
insertarUsuario();





















/* 




    if (isset($_POST['registro'])) {

        $nombre = $_POST['nombreRg'];
        $correo = $_POST['correoRegistro'];
        $rCorreo = $_POST['confirmaCorreoRegistro'];
        /*  echo $nombre;
            echo $correo;
            echo $rCorreo;

        $sql2 = "INSERT INTO usuarios (2,nombre, correo) VALUES (2,pepe, pepe@pepe.com)";

        if ($conexion->query($sql2) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conexion->error;
        }*****************
        $insertar = $conexion->prepare("Insert INTO usuarios(nombre,correo) VALUES (?,?)");
        $insertar->bind_param("ss", $nombre, $correo);
        $insertar->execute();
    } else {
        echo "no pepe";
    }
}
return $conexion;




//mysql_selct_db("usuarios", $basedatos) or die("error de conexion");
if (isset($_POST['registro'])) {

    $nombre = $_POST['nombreRg'];
    $correo = $_POST['correoRegistro'];
    $rCorreo = $_POST['confirmaCorreoRegistro'];
    echo $nombre;
    echo $correo;
    echo $rCorreo;
} else {
    echo "no pepe";
}*/
?>

