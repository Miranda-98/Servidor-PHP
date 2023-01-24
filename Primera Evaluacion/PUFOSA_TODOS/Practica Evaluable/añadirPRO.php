<?php

include "conexion.php";

$conn = conectar();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//depende del formulario que se accione en pagina.php se usa una funcion u otra
if (isset($_POST['botonEnviarCliente'])) {
    insertar("Cliente");
} else if (isset($_POST['botonEnviarDepartamento'])) {
    insertar("Departamento");
} else if (isset($_POST['botonEnviarEmpleado'])) {
    insertar("Empleados");
} else if (isset($_POST['botonEnviarTrabajo'])) {
    insertar("Trabajos");
} else if (isset($_POST['botonEnviarUbicacion'])) {
    insertar("Ubicacion");
}


function insertar($tabla)
{

    //recogida de 
    if (isset($_POST['botonEnviarCliente'])) {
        $cliente_ID = $_POST['CLIENTE_ID'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['Direccion'];
        $ciudad = $_POST['Ciudad'];
        $estado = $_POST['Estado'];
        $cPostal = $_POST['CodigoPostal'];
        $cArea = $_POST['CodigoDeArea'];
        $telefono = $_POST['Telefono'];
        $vendedor = $_POST['empleado'];
        $limiteCredito = $_POST['limite'];
        $comentarios = $_POST['comentario'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$cliente_ID, $nombre, $direccion, $ciudad, $estado, $cPostal, $cArea, $telefono, $vendedor, $limiteCredito, $comentarios];
    }
    if (isset($_POST['botonEnviarDepartamento'])) {
        $departamento = $_POST['departamento'];
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$departamento, $nombre, $ubicacion];
    } else if (isset($_POST['botonEnviarEmpleado'])) {
        $empleado_ID = $_POST['empleado'];
        $Apellido = $_POST['apellido'];
        $Nombre = $_POST['nombre'];
        $Inicial_del_segundo_apellido = $_POST['inicial'];
        $Trabajo_ID = $_POST['trabajos'];
        $Jefe_ID = $_POST['jefe'];
        $Fecha_contrato = $_POST['fechaContrato'];
        $Salario = $_POST['salario'];
        $Comision = $_POST['comision'];
        $Departamento_ID = $_POST['departamento'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$empleado_ID, $Apellido, $Nombre, $Inicial_del_segundo_apellido, $Trabajo_ID, $Jefe_ID, $Fecha_contrato, $Salario, $Comision, $Departamento_ID];
    } else if (isset($_POST['botonEnviarTrabajo'])) {
        $trabajo = $_POST['trabajo'];
        $funcion = $_POST['funcion'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$trabajo, $funcion];
    } else if (isset($_POST['botonEnviarUbicacion'])) {
        $ubi = $_POST['ubicacion'];
        $grupo = $_POST['grupo'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        $aDatosFormulario = [$ubi, $grupo];
    }

    $camposTabla = [];
    $camposCliente = "CLIENTE_ID/nombre/Direccion/Ciudad/Estado/CodigoPostal/CodigoDeArea/Telefono/Vendedor_ID/Limite_De_Credito/Comentarios";
    $camposDepartamento = "departamento_ID/Nombre/Ubicacion_ID";
    $camposEmpleados = "empleado_ID/Apellido/Nombre/Inicial_del_segundo_apellido/Trabajo_ID/Jefe_ID/Fecha_contrato/Salario/Comision/Departamento_ID";
    $camposTrabajos = "Trabajo_ID/Funcion";
    $camposUbicacion = "Ubicacion_ID/GrupoRegional";

    if ($tabla == "Cliente") {
        $camposTabla = explode("/", $camposCliente); //genera un array
        $camposTablaInsert = str_replace("/", ",", $camposCliente);
    } else if ($tabla == "Departamento") {
        $camposTabla = explode("/", $camposDepartamento);
        $camposTablaInsert = str_replace("/", ",", $camposDepartamento);
    } else if ($tabla == "Empleados") {
        $camposTabla = explode("/", $camposEmpleados);
        $camposTablaInsert = str_replace("/", ",", $camposEmpleados);
    } else if ($tabla == "Trabajos") {
        $camposTabla = explode("/", $camposTrabajos);
        $camposTablaInsert = str_replace("/", ",", $camposTrabajos);
    } else if ($tabla == "Ubicacion") {
        $camposTabla = explode("/", $camposUbicacion);
        $camposTablaInsert = str_replace("/", ",", $camposUbicacion);
    }

    try {
        $conexion = conectar();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

        //echo $aDatosFormulario[0],$aDatosFormulario[0],$aDatosFormulario[2];
        echo implode(',', $aDatosFormulario);
        echo $camposTablaInsert;
        $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM " . strtolower($tabla) . " WHERE " . $camposTabla[0] . " = " . $aDatosFormulario[0] . ";";
        $resultado = $conexion->query($sqlComprobar);
        $num = $resultado->fetch();
        if ($num['cantidad'] > 0) {
            $msg = false;
            header("location: pagina.php ? user=$IDREGISTRADO & registro=$ID");
            die();
        } else {

            if ($tabla == "Departamento") {
                $sql = "INSERT INTO $tabla ($camposTablaInsert)
                    VALUES (" ")";
            }
            $sql = "INSERT INTO $tabla ($camposTablaInsert)
                    VALUES (" . implode(',', $aDatosFormulario) . ")";

            $conexion->query($sql);
            
            if ($tabla == "Cliente") {
                $archivo = fopen("PUFOSA.txt", "a+b");
                if (!$archivo) {
                    echo "error al abrir el fichero";
                } else {
                    fwrite($archivo, $ID . "\ ");
                    $escribe = " añadir " . $tabla . " -> id " . $aDatosFormulario[0] . " " . $_POST[".$tabla."] . " \ " . date("F j, Y, g:i a") . " \n ";
                    fwrite($archivo, $escribe);
                    rewind($archivo);
                }
                
            }

            $msg = true;
            echo $msg;
            echo "<h1>ejecutado correctamente</h1>";

            echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
            header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID & msg=$msg");
            die();
        }
    } catch (PDOException $e) {
        echo $e;
        echo '<script language="javascript">alert("error "+$e);</script>';
    }
}
