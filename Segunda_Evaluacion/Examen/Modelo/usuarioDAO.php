<?php
    require 'InterfazDAO.php';
    require 'usuario.php';

    class UsuarioDao implements InterfazDAO {
        public function conexion()
        {
            try {
                $conn = new PDO ("mysql:host=localhost;dbname=tienda;charset=utf8",'root','');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "conexion exitosa";
                return $conn;
            }catch (PDOException $e){
                echo "Error al conectar a la base de datos: " . $e->getMessage();
            }
        }

        public function recuperarUsuario($id,$pass)
        {
            try {
                $x = new UsuarioDao();
                $cone = $x->conexion();
                $sql = "SELECT * FROM usuario WHERE EMAIL = :A AND PASSWORD = :B";
                $stmt = $cone->prepare($sql);
                $stmt->bindParam(':A', $id);
                $stmt->bindParam(':B', $pass);
                $user = $stmt->execute();
                echo "<br/>Datos";
                return $user;
            } catch (PDOException $e) {
                echo "<br/>ERROR AL RECUPERAR USUARIO " . $e->getMessage();
            }
        }

        public function validarAcceso($id,$pass)
        {
            try {
                $x = new UsuarioDao();
                $cone = $x->conexion();
                $sql = "SELECT Password as 'pepe' FROM usuario WHERE Email = '$id'";
                $resultado = $cone->query($sql);
                $num = $resultado->fetch();
                
                print_r ($num['pepe']);
                if( password_verify( $pass, $num['pepe'])  ){
                    echo "true";
                    header('location: ../Vista/carrito.php');
                }
                
                else{
                    echo "false";
                    header('location: ../Vista/error.html');
                }
            } catch (PDOException $e) {
                echo "<br/>ERROR AL VALIDAR USUARIO " . $e->getMessage();
            }
        }

        function añadirUsuario($nom, $ape, $dom, $tel, $email, $contra)
        {
            try {
                $x = new UsuarioDao();
                $cone = $x->conexion();

                $sqlEmail = "SELECT COUNT(*) as 'pepe' FROM usuario WHERE Email = '$email'";
                $resultado = $cone->query($sqlEmail);
                $num = $resultado->fetch();
                if($num['pepe'] > 0){
                    header('location: ../Vista/correoFallido.php');
                } else{
                    $password = password_hash($contra, PASSWORD_DEFAULT);
                
                    $sql = "INSERT INTO usuario (Nombre, Apellidos, Domicilio, NumTelefono, Email, Password)
                        VALUES (:A,:B,:C,:D,:E,:F)";
                    $stmt = $cone->prepare($sql);
                    $stmt->bindParam(':A',$nom);
                    $stmt->bindParam(':B',$ape);
                    $stmt->bindParam(':C',$dom);
                    $stmt->bindParam(':D',$tel);
                    $stmt->bindParam(':E',$email);
                    $stmt->bindParam(':F',$password);
                    if($stmt->execute())
                        header('location: ../Vista/login.php');
                    else    
                        header('location: ../Vista/registro.php');
                }




                
            } catch (PDOException $w) {
                echo "<br/> ERROR AL AÑADIR USUARIO " . $w;
            }
        }
    }

    $x = new UsuarioDao();
    $x->conexion();
?>