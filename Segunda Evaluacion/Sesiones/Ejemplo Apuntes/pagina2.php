<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    if(isset($_SESSION['login']) && $_SESSION['login'] == 'true') {
        if (isset($_SESSION['usuario'])) {
            $nombre = $_SESSION['usuario'];
            echo "<br/>Página2.php- USUARIO logeado<br/>";
            echo "<br/>Página2.php- usuario = ".$_SESSION['usuario']."<br/>";
            echo "<br> pagina2.php - ID sesión= ".session_id()."<br/>";

            unset($_SESSION['login']);
            
         }

    }else{
        echo "<br> pagina2.php - No SE HA REGISTRADO O NO HAY SESIÓN, debería redirigir a la a la página de login </br>";
        include('login.php');
        die();
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
            <?php if (isset ($nombre)) echo "Hola ".$nombre ?>
            <label>Si pulsas el botón va a la página 3 donde se borran la sesion</label><br/>
            <input type="submit" name = "borrar" value="Borrar sesión">
        </form>

    </body>
</html>