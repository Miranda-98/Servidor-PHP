<html>

<head>
    <style>
        img{
            width: 500;
            height: 500;
        }
    </style>
</head>

<body>
    <?php
    /*Busca cuatro imágenes en internet. 
            Crea una página que muestre de forma aleatoria una de ellas.*/

    $valor = rand(0, 3);
    echo "<img src='foto".$valor.".png'>";
    //echo $valor;
    /*switch ($valor) {
        case 0:
            echo "<img src='foto1.png'>";
            break;
        case 1:
            echo "<img src='foto2.png'>";
            break;
        case 2:
            echo "<img src='foto3.png'>";
            break;
        case 3:
            echo "<img src='foto4.png'>";
            break;
    }*/
    ?>
</body>

</html>