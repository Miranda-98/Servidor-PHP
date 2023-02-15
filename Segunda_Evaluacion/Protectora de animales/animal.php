<?php
    require "crud.php";

    class Animal extends Crud{
        private $Id, $nombre, $especie, $raza, $género, $color, $edad, $conexión;
        static $TABLA = 'animales';

        function __construct ($Id, $nombre, $especie, $raza, $género, $color, $edad, $conexion){
            parent::__construct(self::$TABLA, $conexion);
            $this->Id=$Id;
            $this->nombre=$nombre;
            $this->especie=$especie;
            $this->raza=$raza;
            $this->$género=$género;
            $this->color=$color;
            $this->edad=$edad;
            $this->conexion=$conexion;
    
        }

        function __get($valor)
        {
            return $this->$valor;
        }

        function __set($valor, $nuevoValor)
        {
            $this->$valor = $nuevoValor;
        }


        function crear(){
            try{
                $conn=parent::conectar();
                //$sql = "INSERT INTO animales (nombre, especie, raza, genero, color, edad) VALUES (:nom, :spe, :raz, :gen, :col, :edad)";
                $sql=    "INSERT INTO animales (nombre, especie, raza, genero, color, edad) VALUES (:nom, :spe, :raz, :gen, :col, :edad)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nom', $this->nombre);
                $stmt->bindParam(':spe', $this->especie);
                $stmt->bindParam(':raz', $this->raza);
                $stmt->bindParam(':gen', $this->género);
                $stmt->bindParam(':col', $this->color);
		        $stmt->bindParam(':edad', $this->edad);

                if($stmt->execute())
                    echo 'animal creado correctamente en la tabla ' . $this->get_tabla();
                else
                    echo 'error al añadir animal en la tabla ' . $this->get_tabla();
            }catch(PDOException $e){
                return "Error: " . $e->getMessage();
            }
        }

        function actualizar(){
            $fechaUpd = date('d/m/y h:i:s');
            $fechaCre = '2022-02-11';
            $conn = parent::conectar();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE animales SET nombre = :nom, 
                                        especie = :spe,
                                        raza = :raz,
                                        genero = :gen,
                                        color = :col,
                                        edad = :edad
                                        WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $this->Id);
            $stmt->bindParam(':nom', $this->nombre);
            $stmt->bindParam(':spe', $this->especie);
            $stmt->bindParam(':raz', $this->raza);
            $stmt->bindParam(':gen', $this->género);
            $stmt->bindParam(':col', $this->color);
            $stmt->bindParam(':edad', $this->edad);
            $stmt->bindParam(':cre', $fechaCre);
            $stmt->bindParam(':upd', $fechaUpd);
        
            if($stmt->execute()){
                echo  "<br/><br/>Animal actualizado correctamente";
            } else {
                echo  "<br/><br/>Animal no actualizado";
            }
                
        }
    }

    $animal1 = new Animal(15, "firulais", "perro", "chusco", "macho", "negro", 5, '');
    echo "<pre>";
    print_r($animal1);
    echo "<pre/>";
    
    $animal1->crear();
    $animal1->actualizar();
?>