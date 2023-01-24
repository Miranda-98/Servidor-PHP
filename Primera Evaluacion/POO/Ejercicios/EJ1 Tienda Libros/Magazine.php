<?php
    class Magazine extends ReadingMaterial{
        private $additionalResources;

        function __construct($additionalResources,$title,$pages,$prices, $idP, $nameP, $addressP, $telephoneP, $websiteP)
        {
            $this->additionalResources=$additionalResources;
            parent::__construct($title,$pages,$prices, $idP, $nameP, $addressP, $telephoneP, $websiteP);
        }

        function get_additionalResources(){
            return $this->additionalResources;
        }

        function set_additionalResources($additionalResources){
            $this->additionalResources=$additionalResources;
        }
    }
?>