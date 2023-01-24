<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA USUARIOS</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>


<body>
    <h2>USUARIOS</h2>
    <form method="POST" >
        <select name="tabla" id="selectorTabla">
            <option value="Cliente">Cliente</option>
        </select>
        <input type="submit" id="botonTabla" name="botonTablaMostrar" value="Mostrar Tabla!">
        <input type="submit" id="añadirTabla" name="botonTablaAñadir" value="Añadir Tabla!">
        <input type="submit" id="modificarTabla" name="botonTablaModificar" value="Modificar Tabla!">
        <input type="submit" id="borrarTabla" name="botonTablaEliminar" value="Borrar Tabla!">
    </form>

</body>
</html>


<?php 
    require "conexionBDPufosa.php";
    require "mostrar.php";
    require "modificar.php";
    require "eliminar.php";
    require "selectID.php";



    if(isset($_POST['botonTablaMostrar'])){

        if($_POST['tabla'] == 'Cliente') {
            mostrarCliente();

        } 
    }

    if(isset($_POST['botonTablaAñadir'])) {
            
            echo "<form method='post' action='añadir.php'>
                    <fieldset>
                        <legend>Añadir Cliente:</legend>
                        <input type='text' name='cliente' placeholder='Cliente' required>
                        <input type='text' name='nombre' placeholder='Nombre' required>
                        <input type='text' name='direccion' placeholder='Direccion' required>
                        <input type='text' name='ciudad' placeholder='Ciudad' required>
                        <input type='text' name='estado' placeholder='Estado' required>
                        <input type='text' name='codigoPostal' placeholder='Codigo Postal' required>
                        <input type='text' name='codigoArea' placeholder='Codigo de Area' required>
                        <input type='text' name='telefono' placeholder='Telefono' required>";
                        vendedor();
                        
                        //<input type='text' name='vendedorID' placeholder='vendedor' required>
                        echo "<input type='text' name='limite' placeholder='Limite de Credito' required>
                        <input type='text' name='comentario' placeholder='Comentarios' required>
                        <p><input type='submit' name='botonEnviarCliente' value='Enviar Datos'></p>
                    </fieldset>
                </form>";
                

    } 

    if(isset($_POST['botonTablaModificar'])) {

                    echo "<form method='post' action='modificar.php'>
                        <fieldset>
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
            
    }

    if(isset($_POST['botonTablaEliminar'])) {

                echo "<form method='post' action='eliminar.php'>
                        <fieldset>
                            <legend>Eliminar Cliente:</legend>";
                            cliente();
                            echo "<p><input type='submit' name='botonEliminarCliente' value='Enviar Datos'></p>
                        </fieldset>
                    </form>";
     
        
    }

?>