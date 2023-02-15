<?php
        if(isset($_POST['enviar'])){
            setcookie('nombreUsuario', $_POST['nombre']);
            setcookie('colorFondo', $_POST['fondo']);
            setcookie('colorLetra', $_POST['letra']);
            setcookie('fuenteLetra', $_POST['tipo']);


            echo "Bienvenid@ ".$_POST['nombre']."<br/>";

        } else {
            header("location:index.html");
            die();
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candara"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monaco"/> -->
    <title>Document</title>
</head>
<style>
    body{
        background-color: <?php echo $_COOKIE['colorFondo']?>;
        color: <?php echo $_COOKIE['colorLetra']?>;
        font-family: <?php echo $_COOKIE['fuenteLetra']?>, cursive;
        font-size: 50px;
    }
    
</style>
<body>
<?php echo "pepe ".$_COOKIE['colorFondo'] ?>
<p>0123456789</p>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
        
</body>
</html>
