<?php
include "../conexionBDPufosa.php";


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
    if (isset($_POST['botonEliminarCliente'])) {
        $cliente = $_POST['cliente'];
        $IDREGISTRADO = $_POST['pepe'];

        $aDatosFormulario = [$cliente];
        $campoID = $tabla . '_ID';
    }

    if (isset($_POST['botonEliminarDepartamento'])) {
        $departamento = $_POST['departamento'];
        $IDREGISTRADO = $_POST['pepe'];

        $aDatosFormulario = [$departamento];
        $campoID = $tabla . '_ID';
    }

    if (isset($_POST['botonEliminarEmpleado'])) {
        $empleado = $_POST['empleados'];
        $IDREGISTRADO = $_POST['pepe'];

        $aDatosFormulario = [$empleado];
        $campoID = 'Empleado_ID';
    }

    if (isset($_POST['botonEliminarTrabajo'])) {
        $trabajo = $_POST['trabajos'];
        $IDREGISTRADO = $_POST['pepe'];

        $aDatosFormulario = [$trabajo];
        $campoID = 'Trabajo_ID';
    }

    if (isset($_POST['botonEliminarUbicacion'])) {
        $ubicacion = $_POST['ubicacion'];
        $IDREGISTRADO = $_POST['pepe'];

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


        $archivo = fopen("../PUFOSA.txt", "a+b");
        if (!$archivo) {
            echo "error al abrir el fichero";
        } else {
            fwrite($archivo, $IDREGISTRADO."\ ");
            $escribe = " eliminar ".$tabla." -> id ".$aDatosFormulario[0]." " . $_POST[".$tabla."] . " \ " . date("F j, Y, g:i a") . " \n ";
            fwrite($archivo, $escribe);
            rewind($archivo);
        }


        fclose($archivo);

        header("location: ../pagina.php ? user=$IDREGISTRADO");
        die();
    } catch (PDOException $e) {
        echo "error al borrar" . $e->getMessage();
    }
}
