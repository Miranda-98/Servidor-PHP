<?php 
    if(session_status() == PHP_SESSION_NONE)
        session_start ();
    
    if(isset($_SESSION['login'])){
        echo "treeeeeeeeeeeeeeeeeeeeeeeeeee";
        if(isset($_SESSION['usuario'])){
            echo "asjjasjjjjjjjjjjjjjjjjjjjjjjjjjj";
            $nombre = $_SESSION['usuario'];
            session_unset();
            session_destroy();
        }
    
    } else {
        echo "<br>  pagina3.php - NO SE HA REGISTRADO O NO HAY SESION, debería redirigir a la página de login<br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <p> <?php if(isset($nombre)) echo "Hola ".$nombre ?></p>
        <label>Si pulsas el boton va a la pagina login</label>
        <input type="submit" name="loguear" value="volver">
    </form>
</body>
</html>