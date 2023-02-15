<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- formulario que pide el nombre. Al el botón de envío se redirige al archivo index. php-->
     <form action="index.php" method="post">
         <Label>Introduce tu nombre</label>
         <input type="text" name="nombre" autofocus="autofocus">
         <input type="submit" name ="identificar" value="enviar">
     </form>
 </body>

</html>