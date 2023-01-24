<?php

    include "Publisher.php";
    abstract class ReadingMaterial{
        private static $id=0;
        private $title;
        private $pages;
        private $prices;
        private $atributoPublisher;


        function __construct($title,$pages, $prices, $idP, $nameP, $addressP, $telephoneP, $websiteP)
        {
            self::$id++;
            $this->title=$title;
            $this->pages=$pages;
            $this->prices=$prices;
            $this->atributoPublisher = new Publisher($idP, $nameP, $addressP, $telephoneP, $websiteP);

        }
        
        //abstract public function intro() : string;
        function get_id() {
            return $this->id;
        }

        function set_id($id) {
            $this->id=$id;
        }

        function get_title() {
            return $this->title;
        }

        function set_title($title){
            $this->title=$title;
        }

        function get_pages() {
            return $this->pages;
        }

        function set_pages($pages) {
            $this->pages=$pages;
        }
        
        function get_prices() {
            return $this->prices;
        }

        function set_prices($prices) {
            $this->prices=$prices;
        }

    }

    /*function mostrarObjetoPublisher($obj){
        echo $obj->get_id(), $obj->get_name(), $obj->get_address(), $obj->get_telephone(), $obj->get_website();
    }*/
    //private $editor;
    //$editor = new Publisher("01", "gerar", "3C", "666666666", "www.gerar.com");
    //$libro = new Book(3, "Daniel JR");
    //$revista = new Magazine("web");
    //var_dump($editor);
    //mostrarObjetoPublisher($editor);


    

?>