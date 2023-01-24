<html>
<!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
<?php
include "conexionBDPufosa.php";
include
include "CRUD/añadir.php";
include "CRUD/eliminar.php";
include "CRUD/modificar.php";
include "CRUD/mostrar.php";
include "CRUD/selectorID.php";
include "CRUD/mostrarPRO.php";
include "CRUD/añadirPRO.php";
include "CRUD/eliminarPRO.php";



if ($_GET['user'] == 672) {
    echo "<title> Presidente </title>";


    echo '<h2>';
    echo  "Presidente";
    echo '</h2>
                <form method="POST" >
                    <select name="tabla" id="selectorTabla">
                        <option value="seleccionaTabla">Selecciona una Tabla</option>
                        <option value="Cliente">Cliente</option>,
                        <option value="Departamento">Departamento</option>,
                        <option value="Empleados">Empleados</option>,
                        <option value="Trabajos">Trabajos</option>,
                        <option value="Ubicacion">Ubicacion</option>,
                    </select>
                    <input type="submit" id="botonTabla" name="botonTablaMostrar" value="Mostrar Tabla!">
                    <input type="submit" id="añadirTabla" name="botonTablaAñadir" value="Añadir Tabla!">
                    <input type="submit" id="modificarTabla" name="botonTablaModificar" value="Modificar Tabla!">
                    <input type="submit" id="borrarTabla" name="botonTablaEliminar" value="Borrar Tabla!">
                </form> ';
    echo "<a href='informesLOG.php'>Mostrar Informe de modificacines</a>";
} else if ($_GET['user'] == 671) {
    echo "<title> Manager </title>";

    echo '<h2>';
    echo  "Manager";
    echo '</h2>
                <form method="POST" >
                    <select name="tabla" id="selectorTabla">
                        <option value="seleccionaTabla">Selecciona una Tabla</option>
                        <option value="Cliente">Cliente</option>,
                        <option value="Departamento">Departamento</option>,
                        <option value="Empleados">Empleados</option>,
                        <option value="Trabajos">Trabajos</option>,
                        <option value="Ubicacion">Ubicacion</option>,
                    </select>
                    <input type="submit" id="botonTabla" name="botonTablaMostrar" value="Mostrar Tabla!">
                    <input type="submit" id="añadirTabla" name="botonTablaAñadir" value="Añadir Tabla!">
                    <input type="submit" id="modificarTabla" name="botonTablaModificar" value="Modificar Tabla!">
                    <input type="submit" id="borrarTabla" name="botonTablaEliminar" value="Borrar Tabla!">
                </form> ';
} else {
    echo "<title> Empleado </title>";

    echo '<h2>';
    echo  "Empleado";
    echo '</h2>
                <form method="POST" >
                <select name="tabla" id="selectorTabla">
                        <option value="Cliente">Cliente</option>
                    </select>
                    
                    <input type="submit" id="botonTabla" name="botonTablaMostrar" value="Mostrar Tabla Clientes">
                    <input type="submit" id="añadirTabla" name="botonTablaAñadir" value="Añadir Tabla CLientes">
                    <input type="submit" id="modificarTabla" name="botonTablaModificar" value="Modificar Tabla Clientes">
                    <input type="submit" id="borrarTabla" name="botonTablaEliminar" value="Borrar Tabla CLientes">
                </form> ';
}



if (isset($_POST['botonTablaMostrar'])) {

    $nombre = $_POST['tabla'];

    if ($_POST['tabla'] == 'Cliente')
        mostrar("Cliente");

    else if ($_POST['tabla'] == 'Departamento')
        mostrar("Departamento");

    else if ($_POST['tabla'] == 'Empleados')
        mostrar("Empleados");

    else if ($_POST['tabla'] == 'Trabajos')
        mostrar("Trabajos");

    else if ($_POST['tabla'] == 'Ubicacion')
        mostrar("Ubicacion");
}

if (isset($_POST['botonTablaAñadir'])) {
    if ($_POST['tabla'] == 'Cliente') {


        echo "<form method='post' action='CRUD/añadirPRO.php'>
                        <fieldset>
                        <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                            <legend>Añadir Cliente:</legend>
                            <input type='text' name='CLIENTE_ID' placeholder='Cliente' required>
                            <input type='text' name='nombre' placeholder='Nombre' required>
                            <input type='text' name='Direccion' placeholder='Direccion' required>
                            <input type='text' name='Ciudad' placeholder='Ciudad' required>
                            <input type='text' name='Estado' placeholder='Estado' required>
                            <input type='text' name='CodigoPostal' placeholder='Codigo Postal' required>
                            <input type='text' name='CodigoDeArea' placeholder='Codigo de Area' required>
                            <input type='text' name='Telefono' placeholder='Telefono' required>";
        vendedor();

        //<input type='text' name='vendedorID' placeholder='vendedor' required>
        echo "<input type='text' name='limite' placeholder='Limite de Credito' required>
                            <input type='text' name='comentario' placeholder='Comentarios' required>
                            <p><input type='submit' name='botonEnviarCliente' value='Enviar Datos'></p>
                           
                        </fieldset>
                    </form>";
    } else if ($_POST['tabla'] == 'Departamento') {

        echo "<form method='post' action='CRUD/añadirPRO.php'>
                        <fieldset>
                        <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                            <legend>Añadir Departamento:</legend>
                            <input type='text' name='departamento' placeholder='Departamento ID' required>
                            <input type='text' name='nombre' placeholder='Nombre' required>";
        ubicacion();
        echo "<p><input type='submit' name='botonEnviarDepartamento' value='Enviar datos'></p>
                        </fieldset>
                    </form>";
    } else if ($_POST['tabla'] == 'Empleados') {

        echo "<form method='post' action='CRUD/añadirPRO.php'>
                                <fieldset>
                                <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                                <legend>Añadir Empleados:</legend>
                                <input type='text' name='empleado' placeholder='Empleado_ID' >
                                <input type='text' name='apellido' placeholder='Apellido' >
                                <input type='text' name='nombre' placeholder='Nombre' >
                                <input type='text' name='inicial' placeholder='Inicial Segundo Apellido' >";
        trabajos();
        echo "<input type='text' name='jefe' placeholder='Jefe ID' >
                                <input type='date' name='fechaContrato' placeholder='Fecha Contrato' >
                                <input type='text' name='salario' placeholder='Salario' >
                                <input type='text' name='comision' placeholder='Comision' >";
        departamento();
        echo "<p><input type='submit' name='botonEnviarEmpleado' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
    } else if ($_POST['tabla'] == 'Trabajos') {

        echo "<form method='post' action='CRUD/añadirPRO.php'>
                        <fieldset>
                        <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                            <legend>Añadir Trabajo:</legend>
                            <input type='text' name='trabajo' placeholder='Trabajo' required>
                            <input type='text' name='funcion' placeholder='Funcion' required>
                            <p><input type='submit' name='botonEnviarTrabajo' value='Enviar datos'></p>
                        </fieldset>
                    </form>";
    } else if ($_POST['tabla'] == 'Ubicacion') {

        echo "<form method='post' action='CRUD/añadirPRO.php'>
                        <fieldset>
                        <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                            <legend>Añadir Ubicacion:</legend>
                            <input type='text' name='ubicacion' placeholder='Ubicacion ID' required>
                            <input type='text' name='grupo' placeholder='Grupo Regional' required>
                            <p><input type='submit' name='botonEnviarUbicacion' value='Enviar datos'></p>
                        </fieldset>
                    </form>";
    }
}

if (isset($_POST['botonTablaModificar'])) {
    switch ($_POST['tabla']) {
        case 'Cliente';
            echo "<form method='post' action='CRUD/modificar.php'>
                            <fieldset>
                            <input type='hidden' name='pepe' value=".$_GET['user'].">
                                <legend>Añadir Cliente:</legend>";
            cliente();
            echo "<input type='text' name='nombre' placeholder='Nombre' required>
                                <input type='text' name='direccion' placeholder='Direccion' required>
                                <input type='text' name='ciudad' placeholder='Ciudad' required>
                                <input type='text' name='estado' placeholder='Estado' required>
                                <input type='text' name='codigoPostal' placeholder='Codigo Postal' required>
                                <input type='text' name='codigoArea' placeholder='Codigo de Area' required>
                                <input type='text' name='telefono' placeholder='Telefono' required>";
            vendedor();
            echo "<input type='text' name='limite' placeholder='Limite de Credito' required>
                                <input type='text' name='comentario' placeholder='Comentarios' required>
                                <p><input type='submit' name='botonModificarCliente' value='Enviar Datos'></p>
                            </fieldset>
                        </form>";
            mostrarCliente();
            break;

        case 'Departamento';
            echo "<form method='post' action='CRUD/modificar.php'>
                            <fieldset>
                            <input type='text' name='pepe' value=".$_GET['user'].">
                                <legend>Modificar Departamento:</legend>";
            departamento();
            echo "<input type='text' name='nombre' placeholder='Nombre' required>";
            ubicacion();
            echo "<p><input type='submit' name='botonModificarDepartamento' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
            mostrarDepartamento();
            break;

        case 'Empleados';
            echo "<form method='post' action='CRUD/modificar.php'>
                                <fieldset>
                                <input type='hidden' name='pepe' value=".$_GET['user'].">
                                <legend>Modificar Empleados:</legend>";
            empleados();
            echo "<input type='text' name='apellido' placeholder='Apellido' >
                                <input type='text' name='nombre' placeholder='Nombre' >
                                <input type='text' name='inicial' placeholder='Inicial Segundo Apellido' >";
            trabajos();
            vendedor();
            echo "<input type='date' name='fechaContrato' placeholder='Fecha Contrato' >
                                <input type='text' name='salario' placeholder='Salario' >
                                <input type='text' name='comision' placeholder='Comision' >";
            departamento();
            echo "<p><input type='submit' name='botonModificarEmpleado' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
            mostrarEmpleados();
            break;

        case 'Trabajos';
            echo "<form method='post' action='CRUD/modificar.php'>
                            <fieldset>
                            <input type='hidden' name='pepe' value=".$_GET['user'].">
                                <legend>Modificar Trabajo:</legend>";
            trabajos();
            echo "<input type='text' name='funcion' placeholder='Funcion' required>
                                <p><input type='submit' name='botonModificarTrabajo' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
            mostrarTrabajos();
            break;

        case 'Ubicacion';
            echo "<form method='post' action='CRUD/modificar.php'> 
                            <fieldset>
                            <input type='hidden' name='pepe' value=".$_GET['user'].">
                                <legend>Modificar Ubicacion:</legend>";
            ubicacion();
            echo "<input type='text' name='grupo' placeholder='Grupo Regional' required>
                                <p><input type='submit' name='botonModificarUbicacion' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
            mostrarUbicacion();
            break;
    }
}

if (isset($_POST['botonTablaEliminar'])) {
    switch ($_POST['tabla']) {
        case 'Cliente';
            mostrarClienteSimple();
            echo "<form method='post' action='CRUD/eliminarPRO.php'>
                            <fieldset>
                            <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                                <legend>Eliminar Cliente:</legend>";
            cliente();
            echo "<p><input type='submit' name='botonEliminarCliente' value='Enviar Datos'></p>
                            </fieldset>
                        </form>";
            break;

        case 'Departamento';
            mostrarDepartamentoSimple();
            echo "<form method='post' action='CRUD/eliminarPRO.php'>
                            <fieldset>
                            <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                                <legend>Eliminar Departamento:</legend>";
            departamento();
            echo "<p><input type='submit' name='botonEliminarDepartamento' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
            break;

        case 'Empleados';
            mostrarEmpleadosSimple();
            echo "<form method='post' action='CRUD/eliminarPRO.php'>
                                    <fieldset>
                                    <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                                    <legend>Eliminar Empleado:</legend>";
            empleados();
            echo "<p><input type='submit' name='botonEliminarEmpleado' value='Enviar datos'></p>
                                </fieldset>
                            </form>";
            break;

        case 'Trabajos';
            mostrarTrabajos();
            echo "<form method='post' action='CRUD/eliminarPRO.php'>
                            <fieldset>
                            <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                                <legend>Eliminar Trabajo:</legend>";
            trabajos();
            echo "<p><input type='submit' name='botonEliminarTrabajo' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
            break;

        case 'Ubicacion';
            mostrarUbicacion();
            echo "<form method='post' action='CRUD/eliminarPRO.php'>
                            <fieldset>
                            <input type='hidden' name='pepe' value=" . $_GET['user'] . ">
                                <legend>Eliminar Ubicacion:</legend>";
            ubicacion();
            echo "<p><input type='submit' name='botonEliminarUbicacion' value='Enviar datos'></p>
                            </fieldset>
                        </form>";
            break;
    }
}
?>

</html>