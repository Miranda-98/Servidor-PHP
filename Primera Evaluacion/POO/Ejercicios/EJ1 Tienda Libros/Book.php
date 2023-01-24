<?php 
    class Book extends ReadingMaterial {
        private $chapters;
        private $authors;

        function __construct($chapters, $authors,$title,$pages,$prices,$idP, $nameP, $addressP, $telephoneP, $websiteP)
        {
            $this->chapters=$chapters;
            $this->authors=$authors;
            parent::__construct($title,$pages,$prices, $idP, $nameP, $addressP, $telephoneP, $websiteP);
            
        }

        function get_chapters(){
            return $this->chapters;
        }

        function set_chapters($chapters){
            $this->chapters=$chapters;
        }

        function get_authors(){
            return $this->authors;
        }

        function set_authors($authors){
            $this->authors=$authors;
        }
    }

    //capitulos, autor, id,titulo,paginas,precio
    //$obj1 = new Book(3,"jr",1,"libro 1",100,51);


    //var_dump($obj1);
    //$listaLibros = array($obj1, $obj2, $obj3, $obj4);

    //var_dump($listaLibros);
?>