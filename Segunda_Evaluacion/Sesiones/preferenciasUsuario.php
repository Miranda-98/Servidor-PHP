<?php
    if(isset($_POST['borrar'])){
        setcookie('fondo', -1);   
        setcookie('letra', -1); 
        setcookie('tipografia', -1); 
        setcookie('nombre', -1); 
    }

    if(isset($_POST['enviar'])){
        $colorFondo = $_POST['fondo'];
        $colorLetra = $_POST['letra'];
        $tipografia = $_POST['tipo'];
        $nombre = $_POST['nombre'];
    

        if($_COOKIE['nombre'] == $nombre){
            $_COOKIE['fondo'];
            $_COOKIE['letra'];
            $_COOKIE['tipografia'];
            
            setcookie('fondo', $colorFondo);   
            setcookie('letra', $colorLetra); 
            setcookie('tipografia', $tipografia); 

            
        } else {
            setcookie('fondo', $colorFondo);   
            setcookie('letra', $colorLetra); 
            setcookie('tipografia', $tipografia); 
            setcookie('nombre', $nombre);
        }

        
   
}
        echo "nombre: " .$_COOKIE['nombre'] . "<br/>";
        echo "cookie fondo: " . $_COOKIE['fondo'] . "<br/>";
        echo "cookie color letra: " . $_COOKIE['letra'] . "<br/>";
        echo "cookie tipo letra: " . $_COOKIE['tipografia'] . "<br/>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?php echo $_COOKIE['fondo']?>">
    

    <form method="POST">
        <label>nombre</label>
        <input type="text" name="nombre">
        <label>fondo</label>
        <select name="fondo" id="colorFondo">
            <option value="green">verde</option>
            <option value="purple">amarillo</option>
            <option value="blue">azul</option>
            <option value="red">rojo</option>
        </select>
        <label>color letra</label>
        <select name="letra" id="colorLetra">
            <option value="green">verde</option>
            <option value="purple">amarillo</option>
            <option value="blue">azul</option>
            <option value="red">rojo</option>
        </select>
        <label>tipografia</label>
        <select name="tipo" id="tipografia">
            <option value="arial">arial</option>
            <option value="monoEspaciado">monoEspaciado</option>
            <option value="Roman">Roman</option>
        </select>
        <input type="submit" name="enviar" value="enviar">
        <input type="submit" name="borrar" value="borrar">
    </form>
</body>
</html>

