<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Publicacion</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
    }
</style>
<?php
// $expire = time() + (30 * 24 * 60 * 60); 
// $date2 = date("Y-m-d H:i:s");
// setCookie('datosUltimaConexion', $date2, $expire);//expira en 30 días
session_start();
if(!isset($_SESSION['user'])){
    header('location: ../Vista/loginUsuarios.html');
}
?>

<body>
    <div class="centrar">
        <h1>Añadir publicacion</h1>
        <button style="background-color: transparent; border:none;"><a href="../Vista/paginaInicio.php"><img src="../img/logo2.jpg" style="width: 100px; height: 100px;"></a></button>
        <!-- <button><a href="../Vista/paginaInicio.php" >Pagina Inicio</a></button> -->
        <!-- <form method="post">
            <input type="image" src="../img/logo.jpg" href="../Vista/paginaInicio.php" style="width: 80px; height: 80px;">
        </form> -->
    

        <form method="POST" action="" enctype="multipart/form-data">
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
            <input type="text" name="direccion" required><br />

            <label>Número de dormitorios:</label>
            <select name="habitaciones">
                <option name="1" value="1">1</option>
                <option name="2" value="2">2</option>
                <option name="3" value="3">3</option>
                <option name="4" value="4">4</option>
            </select><br />

            <label>Precio</label>
            <input type="number" name="precio" required><br>

            <label>Tamaño</label>
            <input type="number" name="tamaño" required><br>

            <label>Extras:</label>
            <input type="checkbox" id="piscina" name="extras[]" value="Piscina">
            <label name="extras"> Piscina</label>
            <input type="checkbox" id="jardin" name="extras[]" value="Jardín">
            <label name="extras"> Jardin</label>
            <input type="checkbox" id="garage" name="extras[]" value="Garage">
            <label name="extras"> Garage</label><br/>

            <!-- <select name="extras">
                <option name="piscina" value="Piscina">Piscina</option>
                <option name="jardin" value="Jardin">Jardin</option>
                <option name="garage" value="Garage">Garage</option>
            </select><br> -->

            <label>Observaciones</label><br />
            <textarea rows="10" cols="30" name="observaciones"></textarea><br />

            <label>Fecha anuncio</label><br />
            <input type="date" id="birthday" name="fechaCreacionAnuncio" required><br />

            <label>Fotos</label><br />
            <input type="file" name="fotosPublicacion[]" id="fotosPublicacion" multiple><br />



            <input type="submit" value="Subir Publicacion" name="submit">

        </form>
    </div>
    
</body>

</html>
<?php
if (isset($_POST['submit'])) {

    $tipo = $_REQUEST['tipo'];
    $zona = $_REQUEST['zona'];
    $direccion = $_REQUEST['direccion'];
    $habitaciones = $_REQUEST['habitaciones'];
    $precio = $_REQUEST['precio'];
    $tamano = $_REQUEST['tamaño'];
    if(isset($_POST['extras'])){
        $extras = $_REQUEST['extras'];
    
        $aux = 0;
        for($i=0; $i<count($extras); $i++){
            if($extras[$i] == 'Piscina')
                $aux += 1;
            else if($extras[$i] == 'Jardín')
                $aux += 2;
            else if($extras[$i] == 'Garage')
                $aux += 4;
        }
    } else {
        $aux = 0;
    }
    


    $observaciones = $_REQUEST['observaciones'];
    $fecha_anuncio = $_REQUEST['fechaCreacionAnuncio'];

    $foto = '';
    $archivo = $_FILES['fotosPublicacion'];
    for ($i = 0; $i < count($archivo['name']); $i++) {
        if ($i < count(($archivo['name'])) - 1)
            $foto = $foto . $archivo['name'][$i] . ',';
        else
            $foto = $foto . '' . $archivo['name'][$i];
    }

    include '../Controlador/cont_publicaciones.php';
    $p = new Controlador_Publicacion();
    $p->añadirPublicacion($tipo,$zona,$direccion,$habitaciones,$precio,$tamano,$aux,$observaciones,$fecha_anuncio,$foto);

        // Recuperamos los archivos seleccionados
        $files = $_FILES['fotosPublicacion'];

        // // Loop a través de los archivos
        for ($i = 0; $i < count($files['name']); $i++) {

            $fileExtension = strtolower(pathinfo($files['name'][$i], PATHINFO_EXTENSION));
            try {
                if (file_exists($files['name'][$i]))
                    throw new Exception("El archivo ya existe.");
                else if ($fileExtension != "jpg")
                    throw new Exception("Sólo se permiten archivos JPG.");

                // Verificamos si el archivo tiene un tamaño válido
                if ($files['size'][$i] > 0 && $files['size'][$i] < 200000) {
                    // Ruta temporal del archivo
                    $tempFile = $files['tmp_name'][$i];
                    // Nombre del archivo original
                    $fileName = $files['name'][$i];
                    // Destino final del archivo
                    $targetFile = "../img/" . $fileName;
                    // Mover el archivo a la ubicación especificada
                    move_uploaded_file($tempFile, $targetFile);

                    echo "<br/> filename" . $fileName;

                    echo "archivo subido correctamente";
                }
            } catch (Exception $e) {
                //echo "Error: " . $e->getMessage();
                //echo "archivo no subido a la base de datos";
            }
        }
    
}
?>