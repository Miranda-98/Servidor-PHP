<?php
    session_start();

    $_SESSION['a'] = array();
    $_SESSION['a']['nombre'] = 'pepe';

    if(isset($_POST['producto'])){
        if(empty($_SESSION['a']['nombre']))
            echo "vacio";
        else 
            $añadir = $_POST['producto'];
            array_push($_SESSION['a'], $_POST['producto']);
    }
    

    echo "<br/><br/>";

    echo $_SESSION['a'];
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
    <form method="post">
        <input type=checkbox name="producto" value="0.00012">Bitcoin</input>
        <input type=checkbox name="producto" value="raton">Raton</input>
        <input type=checkbox name="producto" value="teclado">Teclado</input>
        <input type=checkbox name="producto" value="monitor">Monitor</input>
        <input type="submit" name="botonEnviar" value="Enviar">
    </form>
    <!-- <form method="post">
        <label>Introduce tu nombre</label>
        <input type="text" name="nombre">
        <input type="submit" name="botonEnviar" value="ENVIAR">
    </form> -->
</body>
</html>