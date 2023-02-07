<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EL gran master pepe</h1>
    <button><a href="../Vista/paginaInicio.php">Pagina inicio</a></button>
    
    <form method="post">
        <div><button name='botonUsuarios'>Mostrar usuarios</button></div>
        <div><button name='botonAdminUsuarios'>Administrar usuarios</button></div>
    </form>

    <?php
        include '../Vista/paginaUsuarios.php';
    ?>
</body>
</html>