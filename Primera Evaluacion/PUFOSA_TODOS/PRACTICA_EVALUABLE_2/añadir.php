<?php
require "conexion.php";

//recogida de los datos del formulario

if (isset($_POST['botonEnviarCliente'])) {
    $cliente_ID = $_POST['CLIENTE_ID'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['Direccion'];
    $ciudad = $_POST['Ciudad'];
    $estado = $_POST['Estado'];
    $cPostal = $_POST['CodigoPostal'];
    $cArea = $_POST['codigoArea'];
    $telefono = $_POST['Telefono'];
    $vendedor = $_POST['empleado'];
    $limiteCredito = $_POST['limite'];
    $comentarios = $_POST['comentario'];
    $IDREGISTRADO = $_REQUEST['pepe'];
    $ID = $_REQUEST['pepa'];



    try {
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //comprobar que el usuario no esta registrado 
        $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM cliente WHERE CLIENTE_ID='" . $_REQUEST['cliente'] . "';";
        $resultado = $conecta->query($sqlComprobar);
        $num = $resultado->fetch();
        if ($num['cantidad'] > 0) {
            echo '<script language="javascript">alert("el cliente ya esta registrado en la base de datos");</script>';
            $url = "paginaPresidente.php";
            echo "<SCRIPT>window.location='$url';</SCRIPT>";
        } else {
            //sentencia sql preparada
            $sqlP = $conecta->prepare("INSERT INTO cliente (CLIENTE_ID, nombre, Direccion, Ciudad,
                    Estado, CodigoPostal, CodigoDeArea, Telefono, Vendedor_ID, Limite_De_Credito, Comentarios)
                    VALUES (:clie, :nom, :dir, :ciu, :est, :cp, :ca, :tl, :vid, :lim, :com);");

            //paso del valor
            $sqlP->bindParam(":clie", $cliente_IDR);
            $sqlP->bindParam(":nom", $nombreR);
            $sqlP->bindParam(":dir", $direccionR);
            $sqlP->bindParam(":ciu", $ciudadR);
            $sqlP->bindParam(":est", $estadoR);
            $sqlP->bindParam(":cp", $cPostalR);
            $sqlP->bindParam(":ca", $cAreaR);
            $sqlP->bindParam(":tl", $telefonoR);
            $sqlP->bindParam(":vid", $vendedorR);
            $sqlP->bindParam(":lim", $limiteCreditoR);
            $sqlP->bindParam(":com", $comentariosR);


            //asignamos valor a los valores
            $cliente_IDR = $cliente_ID;
            $nombreR = $nombre;
            $direccionR = $direccion;
            $ciudadR = $ciudad;
            $estadoR = $estado;
            $cPostalR = $cPostal;
            $cAreaR = $cArea;
            $telefonoR = $telefono;
            $vendedorR = $vendedor;
            $limiteCreditoR = $limiteCredito;
            $comentariosR = $comentarios;

            //ejecutamos la inserccion
            $sqlP->execute();

            echo "cliente registrado correctamente";

            $archivo = fopen("PUFOSA.txt", "a+b");
            if (!$archivo) {
                echo "error al abrir el fichero";
            } else {
                fwrite($archivo, $ID . "\ ");
                $escribe = " añadir nuevo cliente -> id " . $_POST['CLIENTE_ID'] . " \ " . date("F j, Y, g:i a") . " \n ";
                fwrite($archivo, $escribe);
                rewind($archivo);
            }


            fclose($archivo);
        }

        echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
        header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
        die();
    } catch (PDOException $e) {
        echo '<script language="javascript">alert("error "+$e);</script>';
    }
}

//recogida de los datos del formulario

if (isset($_POST['botonEnviarDepartamento'])) {
    $departamento = $_POST['departamento'];
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

    try {
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //comprobar que el usuario no esta registrado 
        $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM departamento WHERE departamento_ID='" . $_REQUEST['departamento'] . "';";
        $resultado = $conecta->query($sqlComprobar);
        $num = $resultado->fetch();
        if ($num['cantidad'] > 0) {
            echo "departamento ya esta registrada en la base de datos"; //quitarlo
        } else {
            //sentencia sql preparada
            $sqlP = $conecta->prepare("INSERT INTO departamento (departamento_ID, Nombre, Ubicacion_ID) VALUES (:depa, :nom, :ubi)");


            //paso del valor
            $sqlP->bindParam(":depa", $departamentoR);
            $sqlP->bindParam(":nom", $nombreR);
            $sqlP->bindParam(":ubi", $ubicacionR);

            //asignamos valor a los valores
            $departamentoR = $departamento;
            $nombreR = $nombre;
            $ubicacionR = $ubicacion;

            //ejecutamos la inserccion
            $sqlP->execute();

            echo "departamento registrado correctamente";
        }

        echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
        header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
        die();
    } catch (PDOException $e) {
        echo "error -> " . $e;
    }
}

//recogida de los datos del formulario

if (isset($_POST['botonEnviarEmpleado'])) {
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

    try {

        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //comprobar que el usuario no esta registrado 
        $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM empleados WHERE Trabajo_ID='" . $_REQUEST['empleado'] . "';";
        $resultado = $conecta->query($sqlComprobar);
        $num = $resultado->fetch();
        if ($num['cantidad'] > 0) {
            echo "el empleado ya esta registrada en la base de datos"; //quitarlo
        } else {
            //sentencia sql preparada
            $sqlP = $conecta->prepare("INSERT INTO empleados (empleado_ID, Apellido, Nombre, Inicial_del_segundo_apellido,
                 Trabajo_ID, Jefe_ID, Fecha_contrato, Salario, Comision, Departamento_ID) VALUES (:emp, :ape, :nom, :ini, :tra, :jefe, :fech, :sal, :com, :dep);");

            //paso del valor
            $sqlP->bindParam(":emp", $empleadoR);
            $sqlP->bindParam(":ape", $apellidoR);
            $sqlP->bindParam(":nom", $nombreR);
            $sqlP->bindParam(":ini", $inicialR);
            $sqlP->bindParam(":tra", $trabajoR);
            $sqlP->bindParam(":jefe", $jefeR);
            $sqlP->bindParam(":fech", $fechR);
            $sqlP->bindParam(":sal", $salR);
            $sqlP->bindParam(":com", $comR);
            $sqlP->bindParam(":dep", $depR);


            //asignamos valor a los valores
            $empleadoR = $empleado_ID;
            $apellidoR = $Apellido;
            $nombreR = $Nombre;
            $inicialR = $Inicial_del_segundo_apellido;
            $trabajoR = $Trabajo_ID;
            $jefeR = $Jefe_ID;
            $fechR = $Fecha_contrato;
            $salR = $Salario;
            $comR = $Comision;
            $depR = $Departamento_ID;


            //ejecutamos la inserccion
            $sqlP->execute();

            echo "empleado registrado correctamente";
        }

        echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
        header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
        die();
    } catch (PDOException $e) {
        echo "ya existe un usuarios con esa Identificacion";
    }
}

//recogida de los datos del formulario

if (isset($_POST['botonEnviarTrabajo'])) {
    $trabajo = $_POST['trabajo'];
    $funcion = $_POST['funcion'];
    $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

    try {
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //comprobar que el usuario no esta registrado 
        $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM trabajos WHERE Trabajo_ID='" . $_REQUEST['trabajo'] . "';";
        $resultado = $conecta->query($sqlComprobar);
        $num = $resultado->fetch();
        if ($num['cantidad'] > 0) {
            echo "ya esta registrada en la base de datos"; //quitarlo
        } else {
            //sentencia sql preparada
            $sqlP = $conecta->prepare("INSERT INTO trabajos (Trabajo_ID, Funcion) VALUES (:trabajo, :funcion)");


            //paso del valor
            $sqlP->bindParam(":trabajo", $trabajoR);
            $sqlP->bindParam(":funcion", $funcionR);

            //asignamos valor a los valores
            $trabajoR = $trabajo;
            $funcionR = $funcion;

            //ejecutamos la inserccion
            $sqlP->execute();

            echo "trabajo registrado correctamente";
        }
        echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
        header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
        die();

    } catch (PDOException $e) {
        echo "error -> " . $e;
    }
}



//recogida de los datos del formulario

if (isset($_POST['botonEnviarUbicacion'])) {
    $ubi = $_POST['ubicacion'];
    $grupo = $_POST['grupo'];
    $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

    try {
        $conecta = conectar();
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //comprobar que el usuario no esta registrado 
        $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID='" . $_REQUEST['ubicacion'] . "';";
        $resultado = $conecta->query($sqlComprobar);
        $num = $resultado->fetch();
        if ($num['cantidad'] > 0) {
            echo "la ubicacion ya esta registrada en la base de datos"; //quitarlo
        } else {
            //sentencia sql preparada
            $sqlP = $conecta->prepare("INSERT INTO ubicacion (Ubicacion_ID, GrupoRegional) VALUES (:ubi, :grupo)");


            //paso del valor
            $sqlP->bindParam(":ubi", $ubicacion);
            $sqlP->bindParam(":grupo", $grupoRegional);

            //asignamos valor a los valores
            $ubicacion = $ubi;
            $grupoRegional = $grupo;

            //ejecutamos la inserccion
            $sqlP->execute();

            echo "ubicacion registrado correctamente";

        }
        echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
        header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
        die();
    } catch (PDOException $e) {
        echo "error -> " . $e;
    }
}
