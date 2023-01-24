<?php

require_once "conexion.php"; 

//depende del formulario que se accione en pagina.php se usa una funcion u otra

if (isset($_POST['botonEliminarCliente'])) {
    borrar("Cliente");
} else if (isset($_POST['botonEliminarDepartamento'])) {
    borrar("Departamento");
} else if (isset($_POST['botonEliminarEmpleado'])) {
    borrar("Empleados");
} else if (isset($_POST['botonEliminarTrabajo'])) {
    borrar("Trabajos");
} else if (isset($_POST['botonEliminarUbicacion'])) {
    borrar("Ubicacion");
}

function borrar($tabla)
{
    //recogida de los datos del formulario
    if (isset($_POST['botonEliminarCliente'])) {
        $cliente = $_POST['cliente'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$cliente];
        $campoID = $tabla . '_ID';
    }

    if (isset($_POST['botonEliminarDepartamento'])) {
        $departamento = $_POST['departamento'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$departamento];
        $campoID = $tabla . '_ID';
    }

    if (isset($_POST['botonEliminarEmpleado'])) {
        $empleado = $_POST['empleados'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$empleado];
        $campoID = 'Empleado_ID';
    }

    if (isset($_POST['botonEliminarTrabajo'])) {
        $trabajo = $_POST['trabajos'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$trabajo];
        $campoID = 'Trabajo_ID';
    }

    if (isset($_POST['botonEliminarUbicacion'])) {
        $ubicacion = $_POST['ubicacion'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$ubicacion];
        $campoID = $tabla . '_ID';
    }


    try {
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $sql = "DELETE FROM " . strtolower($tabla) . " WHERE $campoID =:cod";

        //sentencia sql preparada
        $sqlP = $conecta->prepare($sql);


        //paso del valor
        $sqlP->bindParam(":cod", $aDatosFormulario[0]);


        //ejecutamos la inserccion
        $sqlP->execute();


        if ($tabla == "Cliente") {
            $archivo = fopen("PUFOSA.txt", "a+b");
            if (!$archivo) {
                echo "error al abrir el fichero";
            } else {
                fwrite($archivo, $ID . "\ ");
                $escribe = " borrar " . $tabla . " -> id " . $aDatosFormulario[0] . " " . $_POST[".$tabla."] . " \ " . date("F j, Y, g:i a") . " \n ";
                fwrite($archivo, $escribe);
                rewind($archivo);
            }
        }


        echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
        header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
        die();
    } catch (PDOException $e) {
        echo '<script language="javascript">alert("no puedes borrar una tabla con dependencias");</script>';
        header("location: pagina.php ? user=$IDREGISTRADO");
        die();
    }
}
