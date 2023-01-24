<?php
    require_once "conexion.php";
    include "mostrarPRO.php";


    if(isset($_POST['botonModificarCliente'])) {
        $cliente_ID = $_POST['cliente'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $estado = $_POST['estado'];
        $cPostal = $_POST['codigoPostal'];
        $cArea = $_POST['codigoArea'];
        $telefono = $_POST['telefono'];
        $vendedor = $_POST['empleado'];
        $limiteCredito = $_POST['limite'];
        $comentarios = $_POST['comentario'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        try{
            $conecta = conectar();
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE cliente SET CLIENTE_ID = :clie, nombre = :nom, Direccion = :dir, Ciudad = :ciu,
             Estado = :est, CodigoPostal = :cp, CodigoDeArea = :ca, Telefono = :tl, Vendedor_ID = :vid,
              Limite_De_Credito = :lim, Comentarios = :com WHERE CLIENTE_ID = $cliente_ID;";

            //sentencia sql preparada
            $sqlP = $conecta->prepare($sql);

            //paso del valor
            $sqlP->bindParam(":clie", $cliente_ID);
            $sqlP->bindParam(":nom", $nombre);
            $sqlP->bindParam(":dir", $direccion);
            $sqlP->bindParam(":ciu", $ciudad);
            $sqlP->bindParam(":est", $estado);
            $sqlP->bindParam(":cp", $cPostal);
            $sqlP->bindParam(":ca", $cArea);
            $sqlP->bindParam(":tl", $telefono);
            $sqlP->bindParam(":vid", $vendedor);
            $sqlP->bindParam(":lim", $limiteCredito);
            $sqlP->bindParam(":com", $comentarios);

            //ejecutamos la inserccion
            $sqlP->execute();
            
            echo "cliente actualizado correctamente";

            
                $archivo = fopen("PUFOSA.txt", "a+b");
                if (!$archivo) {
                    echo "error al abrir el fichero";
                } else {
                    fwrite($archivo, $ID . "\ ");
                    $escribe = " modificar " . $tabla . " -> id " . $cliente_ID . " " . $_POST[".$tabla."] . " \ " . date("F j, Y, g:i a") . " \n ";
                    fwrite($archivo, $escribe);
                    rewind($archivo);
                }
            


            echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
            header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
            die();

        } catch (PDOException $e) {
            echo "error al modificar el cliente";
        }
    }

    if(isset($_POST['botonModificarDepartamento'])) {
        $departamento = $_POST['departamento'];
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        try{
            $conecta = conectar();
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $sql = "UPDATE departamento SET Nombre=:nom, Ubicacion_ID=:ubi WHERE departamento_ID=$departamento;";

            //sentencia sql preparada
            $sqlP = $conecta->prepare($sql);

            
            //paso del valor
            $sqlP->bindParam(":nom", $nombre);
            $sqlP->bindParam(":ubi", $ubicacion);

            
            //ejecutamos la inserccion
            $sqlP->execute();

            echo "departamento actualizado correctamente";
            echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
            header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
            die();
    

        } catch (PDOException $e){
            echo "error al modificar el departamento".$e->getMessage();
            
        } 
    }

    if(isset($_POST['botonModificarEmpleado'])) {
        $empleado = $_POST['empleados'];
        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $inicial = $_POST['inicial'];
        $trabajo = $_POST['trabajos'];
        $jefe = $_POST['empleado'];
        $fecha = $_POST['fechaContrato'];
        $salario = $_POST['salario'];
        $comision = $_POST['comision'];
        $departamento = $_POST['departamento'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        try{
            $conecta = conectar();
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE empleados SET Apellido = :ape, Nombre = :nom, Inicial_del_segundo_apellido = :ini, 
            Trabajo_ID = :tra, Jefe_ID = :jef, Fecha_contrato = :fec, Salario = :sal, Comision = :com, Departamento_ID = :dep 
            WHERE empleado_ID=$empleado;";

            //sentencia sql preparada
            $sqlP = $conecta->prepare($sql);

            //paso del valor
            $sqlP->bindParam(":ape", $apellido);
            $sqlP->bindParam(":nom", $nombre);
            $sqlP->bindParam(":ini", $inicial);
            $sqlP->bindParam(":tra", $trabajo);
            $sqlP->bindParam(":jef", $jefe);
            $sqlP->bindParam(":fec", $fecha);
            $sqlP->bindParam(":sal", $salario);
            $sqlP->bindParam(":com", $comision);
            $sqlP->bindParam(":dep", $departamento);

            //ejecutamos la inserccion
            $sqlP->execute();
            
            echo "empleado actualizado correctamente";
            echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
            header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
            die();


        } catch (PDOException $e) {
            echo "error al modificar el empleado";
        }
    }

    if(isset($_POST['botonModificarTrabajo'])) {
        $trabajo = $_POST['trabajos'];
        $funcion = $_POST['funcion'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        try{
            $conecta = conectar();
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $sql = "UPDATE trabajos SET Funcion=:gre WHERE Trabajo_ID=$trabajo;";

            //sentencia sql preparada
            $sqlP = $conecta->prepare($sql);

            
            //paso del valor
            $sqlP->bindParam(":gre", $funcion);

            
            //ejecutamos la inserccion
            $sqlP->execute();

            echo "trabajo actualizado correctamente";
            echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
            header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
            die();
    

        } catch (PDOException $e){
            echo "error al modificar el trabajo".$e->getMessage();
            
        } 
    }

    
    if(isset($_POST['botonModificarUbicacion'])) {
        $ubicacion = $_POST['ubicacion'];
        $grupo = $_POST['grupo'];
        $IDREGISTRADO = $_REQUEST['pepe'];
        $ID = $_REQUEST['pepa'];

        try{
            $conecta = conectar();
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $sql = "UPDATE ubicacion SET GrupoRegional=:gre WHERE Ubicacion_ID=$ubicacion;";

            //sentencia sql preparada
            $sqlP = $conecta->prepare($sql);

            
            //paso del valor
            $sqlP->bindParam(":gre", $grupo);

            
            //ejecutamos la inserccion
            $sqlP->execute();

            echo "ubicacion actualizado correctamente";
            echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
            header("location:pagina.php ? user=$IDREGISTRADO & registro=$ID");
            die();
   

        } catch (PDOException $e){
            echo "error al ingresar ubicacion".$e->getMessage();
        }
    }


            echo '<script language="javascript">alert("cliente registrado correctamente");</script>';
            header('location: pagina.php ? msg= "<script language="javascript">alert("cliente registrado correctamente");</script>" ');
            header("location:pagina.php ? user=$id & registro=$usuario");
            die();
?>