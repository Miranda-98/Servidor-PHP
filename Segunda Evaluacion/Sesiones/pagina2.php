<?php
    session_start();
    // Comprobamos si la variable ya existe
    if (isset($_SESSION['visitas']))
        $_SESSION['visitas']++;
    else
        $_SESSION['visitas'] = 1;

    //En cada visita añadimos un valor al array "visitas"
    echo $_SESSION['hora'][2] = date('d/m/y');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?= "Hola " . $_SESSION["nombre"]; ?>
</body>

</html>