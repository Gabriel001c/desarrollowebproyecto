<?php
class Registro {
    public function index() {
                 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $this->crearUsuario();
            
            require 'views/login.php'; 
        }else{
            require 'views/registro.php'; 
        }
    }

    public function crearUsuario() {
        require 'models/RegistroModel.php';  
        
        // Crear el modelo de Registro con la conexión a la base de datos
        $registroModel = new RegistroModel();
        
        // Resto del código del método crearUsuario

        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $userType = "tourist";
        // Obtén la imagen del formulario
        $image = $_FILES['profileImage']['tmp_name'];
                
        // Resto del código
                
        return $registroModel->crearUsuario($email, $password, $userType, $image, $user);
    }

    // Agrega más métodos de controlador según tus necesidades
}
?>
