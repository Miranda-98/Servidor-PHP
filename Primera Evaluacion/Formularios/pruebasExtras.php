<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <label>Extras:</label>
        <input type="checkbox" id="piscina" name="extra[]" value="Piscina">
        <label name="extras"> Piscina</label>
        <input type="checkbox" id="jardin" name="extra[]" value="Jardin">
        <label name="extras"> Jardin</label>
        <input type="checkbox" id="garage" name="extra[]" value="Garage">
        <label name="extras"> Garage</label><br/>

        <input type="submit" value="Subir Publicacion" name="submit">
    </form>
</body>
</html>

<?php
    if(isset($_REQUEST['submit'])){
        foreach($_REQUEST['extra'] as $clave => $valor){
            $extras = $valor .",";
            
        }
        $extras = substr($extras, 0, -1);
            echo $extras;
    } else {
        echo "No";
    }
?>