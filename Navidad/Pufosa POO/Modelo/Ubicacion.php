<?php
    require "Crud.php";
    
    class Ubicacion extends Crud {
        private $ubicacionID;
        private $grupoRegional;
        private $con;
        public static $TABLA = "ubicacion";

        function __construct($ubicacionID, $grupoRegional)
        {
            parent::__construct($con,self::$TABLA);
            $this->ubicacionID = $ubicacionID;
            $this->grupoRegional = $grupoRegional;
            $this->con = parent::conectar();
        }
    }
?>