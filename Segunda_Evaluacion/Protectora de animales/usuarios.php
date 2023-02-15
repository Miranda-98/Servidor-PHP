<?php
    require "crud.php";

    class Usuario extends Crud{
        private $Id, $nombre, $apellido, $sexo, $dirección, $teléfono, $edad, $conexión;
        static $TABLA = 'usuarios';

        function __construct ($id, $nombre, $apellido, $sexo, $direccion, $telefono, $edad, $conexion){
            parent::__construct(self::$TABLA, $conexion);
            $this->Id=$id;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->sexo=$sexo;
            $this->direccion=$direccion;
            $this->telefono=$telefono;
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
                $sql="INSERT INTO usuarios (nombre, apellido,sexo,direccion, telefono) VALUES (:nom, :ape, :sex, :dir, :tel)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nom', $this->nombre);
                $stmt->bindParam(':ape', $this->apellido);
                $stmt->bindParam(':sex', $this->sexo);
                $stmt->bindParam(':dir', $this->direccion);
                $stmt->bindParam(':tel', $this->telefono);
                if($stmt->execute())
                    echo 'usuario creado correctamente en la tabla ' . $this->get_tabla();
                else
                    echo 'error al añadir usuario en la tabla ' . $this->get_tabla();
            }catch(PDOException $e){
                return "Error: " . $e->getMessage();
            }
        }

        function actualizar (){
            $fechaUpd = date('d/m/y h:i:s');
            $fechaCre = '2022-02-11';
            $conn = parent::conectar();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuarios SET nombre = :nom,
                                        apellido = :ape,
                                         sexo = :sex,
                                          direccion = :dir, 
                                          telefono = :tel, 
                                          created_at = :cre, 
                                          updated_at = :upd 
                                          WHERE id = :id";
            
            //$sql = "UPDATE usuarios SET nombre = :nom, apellido = :ape, sexo = :sex, direccion = :dir , telefono = :tel WHERE id = $this->Id";
            //$sql = "UPDATE $this->get_tabla() SET departamento_ID=:cli, Nombre=:nom, Ubicacion_ID=:dir WHERE departamento_ID=:cli";
            $stms = $conn->prepare($sql);
            $stms->bindParam(':nom', $this->nombre);
            $stms->bindParam(':ape', $this->apellido);
            $stms->bindParam(':sex', $this->sexo);
            $stms->bindParam(':dir', $this->direccion);
            $stms->bindParam(':tel', $this->telefono);
            $stms->bindParam(':cre', $fechaUpd);
            $stms->bindParam(':upd', $fechaUpd);
            $stms->bindParam(':id', $this->Id);
        
            if($stms->execute()){
                echo  "<br/><br/>Usuario actualizado correctamente";
            } else {
                echo  "<br/><br/>Usuario no actualizado";
            }
                
        }
    }

    $usuario = new Usuario('2','maria victoria','martinez','hombre', '3c','111111', 24,'');
    echo "<pre>";
    print_r($usuario);
    echo "<pre/>";
    
    $usuario->crear();
    //$usuario->actualizar();
?>