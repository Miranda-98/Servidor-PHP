 <?php 
 include_once('../DAO/Users_DAO.php');
 include_once('../Transfer_Object/Users_TO.php');
 class Users_BO {


    public function insertar () {
        try{
            $user = new Users_TO();
            $user->__set('nombre', $_POST['idLogin']);
            $user->__set('contraseña', $_POST['contraseña']);
            $userDAO = new Users_DAO();
            return $userDAO->registroUser($user);
           
            
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        
    }

    public function login () {
        $user = new Users_TO();
        $user->__set('nombre', $_POST['nombre']);
        $user->__set('contraseña', $_POST['contraseña']);
        $userDAO = new Users_DAO();
        return $userDAO->login($user);
    }


 }
 
  
 ?>