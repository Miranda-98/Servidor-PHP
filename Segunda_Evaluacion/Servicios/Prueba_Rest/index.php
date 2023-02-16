<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $datos = json_decode(file_get_contents('https://datos.madrid.es/egob/catalogo/210227-0-piscinas-publicas.json'),true);
       
        // echo "<pre>";
        // print_r($datos);
        // echo "</pre>";

    $piscinas =[];
        foreach ($datos['@graph'] as $piscina) {
            //$dastos = new Piscina ($piscina['title'],$piscina['address']['postal-code']);
            //$piscinas[] = $dastos;
            echo "Centro : ".$piscina['title'],"<br>";
            echo "CP : ".$piscina['address']['postal-code']."<br>";
            echo "district : ".$piscina['address']['district']['@id']."<br>";
        }
        
    ?>
</body>
</html>