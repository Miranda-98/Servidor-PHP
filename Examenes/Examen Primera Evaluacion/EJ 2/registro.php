<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
       <form method="post" action="">
            <label>Codigo</label>
            <input type="text" name="codigo"><br/>

            <label>Nombre</label>
            <input type="text" name="nombre"><br/>

            <label>Apellido</label>
            <input type="text" name="apellidos"><br/>

            <label>Telefono</label>
            <input type="text" name="telefono"><br/>

            <label>Correo</label>
            <input type="text" name="correo"><br/>

            <label>Mensaje</label>
            <input tyoe="text" name='contador' value="<?php echo $_GET['msg'] ?? '' ?>">

            <input type="submit" name="botonEnviar" value="Enviar">
       </form>
    </fieldset>
</body>
</html>
<?php
    require "identificador.php";
    $nAlumnos = 0;
    

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= "SELECT COUNT(CODIGO) as nAlumnos FROM alumnos;";
    $result = $conn->query($sql);

    foreach($result as $row){
        $nAlumnos = $row['nAlumnos'] ;
    }

    class Alumno{
        private $codigo;
        private $nombre;
        private $apellidos;
        private $telefono;
        private $correo;
        
        function __construct($cod, $nom, $ape, $tel, $corr)        
        {
            $this->codigo=$cod;
            $this->nombre=$nom;
            $this->apellidos=$ape;
            $this->telefono=$tel;
            $this->correo=$corr;
            
        }


        function get_codigo(){
            return $this->codigo;
        }

        function set_codigo($cod){
            $this->codigo=$cod;
        }

        function get_nombre(){
            return $this->nombre;
        }

        function set_nombre($nom){
            $this->nombre=$nom;
        }

        function get_apellidos(){
            return $this->apellidos;
        }

        function set_apellidos($ape){
            $this->apellidos=$ape;
        }

        function get_telefono(){
            return $this->telefono;
        }

        function set_telefono($tel){
            $this->telefono=$tel;
        }

        function get_correo(){
            return $this->correo;
        }

        function set_correo($corr){
            $this->correo=$corr;
        }


    }

    // $nom, $ape, $tel, $corr
    echo $nAlumnos;
    $alumno1 = new Alumno($nAlumnos, "pepe", "gonzales", 111111, "pepe@gmail.com");
    echo "<pre>"; 
    print_r($alumno1);
    echo "</pre>";

    
    function comprobarEmail($agenda){
        $valido = null;
                if (strpos($agenda, "@")  && strpos($agenda, ".") ){
                    $valido = "true";
                    
                } else {
                    $valido = "false";
                }
        return $valido;          
        
    }




    if(isset($_POST['botonEnviar'])) {
        $codigo = $_POST['codigo'];
        $codigo2 = $nAlumnos+1;
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $contador = $_POST['contador'];

    


        if (comprobarEmail($correo) == true ){
            echo "el correo es valido <br/>";

            try {
                echo "contador: " . $contador . "<br/>";
    
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sqlComprobar = "SELECT COUNT(*) AS 'cantidad' FROM alumnos WHERE CODIGO=' " . $codigo2. " ';";
                $resultado = $conn->query($sqlComprobar);
                $num = $resultado->fetch();
                echo "ppppppppppppppppp";
                $archivo = fopen("log.txt", "a+b");
                if (!$archivo) {
                    echo "error al abrir el fichero";
                } else {
                    fwrite($archivo, $ID . "<br/>");
                    $escribe = $sqlComprobar;
                    fwrite($archivo, $escribe);
                    rewind($archivo);
                }


                fclose($archivo);


                if ($num['cantidad'] == 0) {
                    echo "xxxxxxxxxxxxxxxxxxxx";
                    try {
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sqlP = $conn->prepare("INSERT INTO alumnos (CODIGO, NOMBRE, APELLIDOS, TELEFONO, CORREO) 
                    
                        VALUES (:cod, :nom, :ape, :tel, :corr)");


                        //paso del valor
                        $sqlP->bindParam(":cod", $codigo2);
                        $sqlP->bindParam(":nom", $nombre);
                        $sqlP->bindParam(":ape", $apellidos);
                        $sqlP->bindParam(":tel", $telefono);
                        $sqlP->bindParam(":corr", $correo);

            
                        //ejecutamos la inserccion
                        $sqlP->execute();
            
                        header("location: registro.php ? msg = 'registro insertado correctamente' ");
                        die();


                    } catch (PDOException $e) {
                        echo 'error al insertar alumno';
                    }
                
                
                } else {
                    echo "el alumno ya esta registrado en la base de datos";
                }

            } catch (PDOException $e) {
                echo '<script language="javascript">alert("error "+$e);</script>';
            }

        } else {
            echo "el coreo no es valido <br/>";
            $contador++;

            

        }
    }
       
    
?>