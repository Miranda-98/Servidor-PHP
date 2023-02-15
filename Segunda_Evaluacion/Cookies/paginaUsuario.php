<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: <?php echo $_COOKIE['fondo'] ?>;
        color: <?php echo $_COOKIE['letra'] ?>
    }
</style>
<body>
    <h1>Bienvenido <?php echo $_COOKIE['nombre'] ?></h1>
    <form method="POST">
        <input type="submit" name="borrar" value="salir">
    </form>
    
</body>
</html>

<?php
    if(isset($_POST['borrar'])){
        setcookie('nombre', ' ', time()-500);
        setcookie('fondo', ' ', time()-500);
        setcookie('letra', ' ', time()-500);
        setcookie('tipo', ' ', time()-500);
        header('location:preferenciasUsuario.php');
    }
?>