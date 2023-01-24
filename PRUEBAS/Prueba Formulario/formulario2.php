<?php
    if(isset($_POST['pepe'])) {
        $v = $_POST['pepe'];
    } else {
        $v = $_POST['pepe2'];
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
    <h1>FORMULARIO 2</h1>
    <form method="post" action="">
        <input type="text" name="pepe2" value="<?php echo $v     ?>">
        <input type="submit" name="boton" value="ok">
    </form>
</body>
</html>

