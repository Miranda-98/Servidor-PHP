<?php
/*
• El usuario debe seleccionar en un formulario sus preferencias en cuanto a color de fondo, color de letra, y tipografía (entre tres opciones).
  Además debe introducir el nombre y los apellidos.
• Al enviar el formulario se redirige a una página en la que se le saluda por sus nombre y que está configurada con los colores y tipo de letra elegido.
  Las opciones seleccionadas se guardarán en cookies, de forma que si se vuelve a ejecutar el script principal, si se detecta que hay cookies, se redirige
  automáticamente a esta segunda página, configurada con las selecciones realizadas.
• La segunda página contiene un enlace que al pulsarlo redirige a la primera página, borrando además las cookies con las opciones elegidas.
*/

    
    if(empty($_POST['nombre']) && (isset($_POST['enviar']))){
        header('location:preferenciasUsuario.php');
        die();
    } else {
        if(isset($_POST['enviar']) && isset($_POST['nombre'])){
            setcookie('nombre', $_POST['nombre']);
            setcookie('fondo', $_POST['fondo']);
            setcookie('letra', $_POST['letra']);
            setcookie('tipo', $_POST['tipo']);
            echo "hay cookies";
            header('location:paginaUsuario.php');
            
        }
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


    <form method="POST">
        <label>nombre</label>
        <input type="text" name="nombre">
        <label>fondo</label>
        <select name="fondo" id="colorFondo">
            <option value="green">verde</option>
            <option value="purple">morado</option>
            <option value="blue">azul</option>
            <option value="red">rojo</option>
        </select>
        <label>color letra</label>
        <select name="letra" id="colorLetra">
            <option value="red">rojo</option>
            <option value="green">verde</option>
            <option value="purple">morado</option>
            <option value="blue">azul</option>            
        </select>
        <label>tipografia</label>
        <select name="tipo" id="tipografia">
            <option value="arial">arial</option>
            <option value="monoEspaciado">monoEspaciado</option>
            <option value="Roman">Roman</option>
        </select>
        <input type="submit" name="enviar" value="enviar">
        <input type="reset" name="borrar" value="borrar">
    </form>
</body>
</html>
