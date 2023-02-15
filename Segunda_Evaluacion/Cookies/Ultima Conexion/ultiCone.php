<?php
    setcookie('ultimaConexion', date('Y-m-d'));
    setcookie('horaConnexion', date("h:i"));

    // $date = date('Y-m-d') . " - " . date("h:i:s");
    setCookie('datosUltimaConexion', $date2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultima Conexion</title>
</head>
<body>
    <?php echo $_COOKIE['ultimaConexion']; echo $_COOKIE['horaConnexion']; echo "<br/><br/><br/>"; echo $_COOKIE['datosUltimaConexion']; ?>
</body>
</html>