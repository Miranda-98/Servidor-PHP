<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 
        <?php
        echo 
            $_GET['id'],
            $_GET['tipo'],
            $_GET['zona'],
            $_GET['direccion'],
            $_GET['dormitorios'],
            $_GET['precio'],
            $_GET['tamaño'],
            $_GET['extras'],
            $_GET['observaciones'],
            $_GET['fecha'];
        ;
    ?> 
    -->
    <h1>Modificar Publicacion</h1>
    <button><a href="../Vista/paginaInicio.php">Pagina Inicio</a></button>
    <form method="POST" action="">
        <input type="number" name="id" value=<?php echo$_GET['id'] ?> hidden>
        <input type="text" name="fecha" value=<?php echo$_GET['fecha']?> hidden>


        <label>Tipo</label>
        <select name="tipo">
            <option name="piso" value="piso">Piso</option>
            <option name="adosado" value="adosado">Adosado</option>
            <option name="chalet" value="chalet">Chalet</option>
            <option name="casa" value="casa">Casa</option>
        </select><br>
        
        <label>Zona</label>
        <select name="zona">
            <option name="centro" value="centro">Centro</option>
            <option name="norte" value="norte">Norte</option>
            <option name="sur" value="sur">Sur</option>
            <option name="este" value="este">Este</option>
            <option name="oeste" value="oeste">Oeste</option>
        </select><br>

        <label>Direccion</label>
        <input type="text" name="direccion" value=<?php echo $_GET['direccion'] ?>><br/>

        <label>Dormitorios</label>
        <input type="text" name="dormitorios" value=<?php echo $_GET['dormitorios'] ?>><br/>

        <label>Precio</label>
        <input type="text" name="precio" value=<?php echo $_GET['precio'] ?>><br/>

        <label>Tamaño</label>
        <input type="text" name="tamaño" value=<?php echo $_GET['tamaño'] ?>><br/>

        <label>Extras:</label>
        <input type="checkbox" id="piscina" name="extras[]" value="Piscina">
        <label name="extras"> Piscina</label>
        <input type="checkbox" id="jardin" name="extras[]" value="Jardín">
        <label name="extras"> Jardin</label>
        <input type="checkbox" id="garage" name="extras[]" value="Garage">
        <label name="extras"> Garage</label><br/>

        <label>Observaciones</label>
        <input type="text" name="observaciones" value=<?php echo $_GET['observaciones'] ?>><br/>

        <input type="submit" name="modificar" value="Modificar">
        
    </form>
    <?php
        include '../Controlador/cont_publicaciones.php';
        // header('location: ../Controlador/cont_publicaciones.php?valor=modificar');
        
        
        $c = new Controlador_Publicacion();
        if(isset($_POST['id'])) {
            $aux = 0;
            $extras = $_REQUEST['extras'];
            if(isset($_REQUEST['extras'])){
                for($i=0; $i<count($extras); $i++){
                if($extras[$i] == 'Piscina')
                    $aux += 1;
                else if($extras[$i] == 'Jardín')
                    $aux += 2;
                else if($extras[$i] == 'Garage')
                    $aux += 4;
                }
            }
            $c->modificarPublicacion($_POST['id'],$_POST['tipo'],$_POST['zona'],$_POST['direccion'],$_POST['dormitorios'],$_POST['precio'],$_POST['tamaño'],$aux,$_POST['observaciones'],$_POST['fecha']);

        }   
    ?>
    <!-- echo "";$idSeleccionado&$tipoSeleccionado&$zonaSleccionado&$direccionSeleccionada&$nDormitoriosSeleccionados&$precioSeleccionado&$tamañoSeleccionado&$extrasSeleccionados&$observacionesSeleccionadas&$fechaSeleccionada -->
</body>
</html>