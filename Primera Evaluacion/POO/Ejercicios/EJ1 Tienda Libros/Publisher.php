<?php 
    class Publisher{
        private $id;
        private $name;
        private $address;
        private $telephone;
        private $website;

        function __construct($id, $name, $address, $telephone, $website)
        {
            $this->id = $id;
            $this->name = $name;
            $this->address = $address;
            $this->telephone = $telephone;
            $this->website = $website;
        }

        function get_id(){
            return $this->id;
        }

        function set_id($id){
            $this->id=$id;
        }

        function get_name(){
            return $this->name;
        }

        function set_name($name){
            $this->name=$name;
        }

        function get_address(){
            return $this->address;
        }

        function set_address($address){
            $this->address=$address;
        }

        function get_telephone(){
            return $this->telephone;
        }

        function set_telephone($telephone){
            $this->telephone=$telephone;
        }

        function get_website(){
            return $this->website;
        }

        function set_website($website){
            $this->website=$website;
        }
    }
?>