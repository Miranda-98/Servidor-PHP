<?php 
    include "ReadingMaterial.php";
    include "Book.php";
    include "Magazine.php";

    //publisher -> $id, $name, $address, $telephone, $website
    //book -> $chapters, $authors, $title,$pages,$prices,$idP, $nameP, $addressP, $telephoneP, $websiteP
    //magazine -> $additionalResources, $title,$pages,$prices, $idP, $nameP, $addressP, $telephoneP, $websiteP

    $editor = new Publisher("01", "gerar", "3C", 666666666, "www.gerar.com");


    $libro1 = new Book(3, "juan", "la enferma uniconio", 100, 70, 1, "pepe", "cuenta", 666666666, "www.webpepe.com");
    $libro2 = new Book(3, "daniel", "la cenicienta", 100, 80, 1, "pepe", "cuenta", 666666666, "www.webpepe.com");
    $libro3 = new Book(3, "daniel", "peter pan y el lobo feroz", 100, 60, 1, "pepe", "cuenta", 666666666, "www.webpepe.com");
    $libro4 = new Book(3, "alonso", "php para dumps", 100, 50, 1, "pepe", "cuenta", 666666666, "www.webpepe.com");


    $revista1 = new Magazine("vaina 2", "hola", 50, 40, 1, "pepa", "albacete", 777777777, "www.webpepa.com");
    $revista2 = new Magazine("vaina 1", "adios", 30, 50, 1, "pepe", "cuenca", 777777777, "www.webpepe.com");
    $revista3 = new Magazine("vaina 3", "pronto", 15, 30, 1, "antonio", "avila", 777777777, "www.webantonio.com");
    $revista4 = new Magazine("vaina 4", "tarde", 100, 80, 1, "javier", "ciudad real", 777777777, "www.webjavier.com");
    $revista5 = new Magazine("vaina 5", "salcha perucha", 15, 60, 1, "yosimar", "zaragoza", 777777777, "www.webyosimar.com");
    $revista6 = new Magazine("vaina 6", "las urracas", 5, 45, 1, "magali", "cuenca", 777777777, "www.webmagali.com");


    //mostrar libro 
    function mostrarLibro($obj){
        //echo "capitulos ".$obj->get_chapters().", autor ".$obj->get_authors().", titulo ". $obj->get_title().", paginas ".$obj->get_pages()." precios ". $obj->get_prices().", idPublicacion ". $obj->get_id()."nombrePublicacion ". $obj->get_name().", direccion publicacion ". $obj->get_address().", telefono ". $obj->get_telephone().", web ". $obj->get_website();
        echo ('<pre>');
        print_r($obj);
        echo ('</pre>');    
    }
    
    //buscar por autor
    function buscarAutor($array,$autor){
        $array2 = array();
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]->get_authors() == $autor){
                echo "<br/>autor encontrado";
                $array2[$i] = $array[$i];
            } else {
                echo "<br/>autor no encontrado";
            }
       }
       echo ('<pre>');
       print_r($array2);
       echo ('</pre>'); 
    }

    //ordenar array a criterio del usuario ksort
    function ordenarAlfabeticamente2($array){
        // $array2 = array();
        // /*foreach($array as $datosArray) { 
        //     $array2[$datosArray[$array2->get_title()]] = $array
        // }*/
        // ksort($array);
        // echo ('<pre>');
        // print_r($array);
        // echo ('</pre>');
    }

    //ordenar array alfabeticamente array_multisort
    function ordenarAlfabeticamente($array){
       $array2 = array();
       for ($i = 0; $i < count($array); $i++) {
            $array2[$i] = $array[$i]->get_title();
       }
       sort($array2);
       var_dump($array2);
       array_multisort($array2,$array) ;
       echo ('<pre>');
       print_r($array);
       echo ('</pre>'); 
    }

    //ordenacion burbuja de libros por precio
    function ordenaArrayAsc($array){

        $numElemArray = count($array);
        $isOrdered = false;
        while(!$isOrdered){
        $isOrdered = true;
            for($i = 1; $i < $numElemArray; $i++){
                if($array[$i]-> get_prices() < $array[$i - 1]->get_prices()){
                    $aux = $array[$i]->get_prices();
                    $array[$i]->set_prices($array[$i - 1]->get_prices());
                    $array[$i - 1]->set_prices($aux);	
                    $isOrdered = false;
                }
            }
            
        }	
        return $array;	
    }

    function ordenaArrayDsc($array){

        $numElemArray = count($array);
        $isOrdered = false;
        while(!$isOrdered){
        $isOrdered = true;
            for($i = 1; $i < $numElemArray; $i++){
                if($array[$i]-> get_prices() > $array[$i - 1]->get_prices()){
                    $aux = $array[$i]->get_prices();
                    $array[$i]->set_prices($array[$i - 1]->get_prices());
                    $array[$i - 1]->set_prices($aux);	
                    $isOrdered = false;
                }
            }
            
        }	
        return $array;	
    }
    
    function ordenarArray($array, $orden){
        if ($orden == "ASC") {
            ordenaArrayAsc($array);
        } else {
            ordenaArrayDsc($array);
        }
    }

    $aLibros = array($libro1, $libro2, $libro3, $libro4);
    $aRevistas = array($revista1, $revista2, $revista3, $revista4, $revista5, $revista6);

    //echo "ordenar libros de forma ascendente";
    //ordenaArrayAsc($aLibros);
    //mostrarLibro($aLibros);
    //echo "ordenar libros de forma descendente";
    //ordenaArrayDsc($aLibros);
    //mostrarLibro($aLibros);
    echo "ordenar libros a criterio de usuario";
    $orden = "ASC";
    ordenarArray($aLibros,$orden);
    mostrarLibro($aLibros);
    /*echo "ordenar libros alfabeticamente";
    ordenarAlfabeticamente($aLibros);
    echo "buscar obras por autor";
    $autor = "daniel";
    buscarAutor($aLibros,$autor);*/

?>