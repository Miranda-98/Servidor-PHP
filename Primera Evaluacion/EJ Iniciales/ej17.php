<html>

<body>
    <?php

    $supermercado = array(
        "fruta" => array(1 => "pera", 2 => "manzana", 3 => "platano"),
        "verdura" => array(1 => "berenjena", 2 => "calabacin"),
        "lacteos" => array(1 => "leche", 2 => "yogur", 3 => "queso", 4 => "kefir")
    );
    foreach ($supermercado as $pepe => $valor) {
        echo "$pepe"."->";
        for ($i=1; $i <= count($valor); $i++) { 
            echo $valor[$i].", ";
        }
        
    }
    ?>
</body>

</html>