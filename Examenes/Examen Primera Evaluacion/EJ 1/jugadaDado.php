<?PHP
    if(isset($_POST['botonEnviar'])){
       $nTiradas = $_POST['tirada'];
       $aDados = [];

       

       for ($i=0; $i < $nTiradas; $i++) { 
            $salidaDado = mt_rand(1,6);
            array_push($aDados, $salidaDado);
       }


       for ($i=0; $i < count($aDados); $i++) { 
     
       }


       foreach ($aDados as $clave => $valor){
            echo "el numero " . $clave . " aparece " . $valor . "<br/>";
       }

    } else {
        header("location: dado.html");
        die();
    }
?>