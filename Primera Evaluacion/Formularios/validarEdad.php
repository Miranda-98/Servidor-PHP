<html>
    <head>

    </head>

    <body>
        <?php 
            if(isset($_GET['enviar'])){
                $nombre = $_GET['nombre'];
                $edad = $_GET['edad'];

                if ($edad >= 18){
                    echo "$nombre es mayor de edad";
                } else {
                    echo "$nombre no es mayor de edad";
                }
            }
        ?>
    </body>
</html>