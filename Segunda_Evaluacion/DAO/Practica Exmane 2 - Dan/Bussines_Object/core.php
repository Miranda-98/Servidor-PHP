<?php  
require_once 'Animales_BO.php';
require_once 'Users_BO.php';
session_start();

if (isset($_SESSION['idUsuario'])) {
    
 
    if(isset($_POST['btnEnviarID'])){

        $pruebaMuestra = new Animales_BO();
    
        $registros2 = $pruebaMuestra->mostrarId(1);
        
        include '../Vista/resultadosID.php';
    
    } else if (isset($_POST['btnEnviarPasswd'])){
    
      $pruebaRegistro = new Users_BO();
    
        if($pruebaRegistro->insertar()){
            echo "BIENVENIDO";
            
        }else{
            echo "Error Registro";
        }
    
    }else if (isset($_POST['btnLogin'])) {
    
        $pruebaLogin = new Users_BO();
        $registros = $pruebaLogin -> login();
    
        if (password_verify($_REQUEST["contraseña"], $registros[0]["password"]) && ($_REQUEST["nombre"] == $registros[0]["name"])) {
            $_SESSION['idUsuario']=$_REQUEST["nombre"];
            $DAOObtieneTodos = new DAO();
            $DAOObtieneTodos->conectar();
            $animales = new Animales_BO();
            $registrosAnimales = $DAOObtieneTodos->obtenerTODO('animales');
            include_once "../Vista/todosResultados.php";

        }else{
            echo "Error Registro";
        }
    }else if (isset($_POST['registro'])) {
        include '../Vista/registro.php';
    }
} else {
    
    if (isset($_POST['btnLogin'])) {
    
        $pruebaLogin = new Users_BO();
        $registros = $pruebaLogin -> login();
    
        if (password_verify($_REQUEST["contraseña"], $registros[0]["password"]) && ($_REQUEST["nombre"] == $registros[0]["name"])) {
            $_SESSION['idUsuario']=$_REQUEST["nombre"];
            
            $DAOObtieneTodos = new DAO();
            $DAOObtieneTodos->conectar();
            $animales = new Animales_BO();
            $registrosAnimales = $DAOObtieneTodos->obtenerTODO('animales');

            include_once "../Vista/todosResultados.php";
            
            echo "BIENVENIDO";
        }
       
    }else{
        header("Location: ../Vista/login.php");
    }
}


//     if (isset($_SESSION['idUsuario'])) {
        
// } else {
//     header("Location: ../Vista/login.php");
// }





?>