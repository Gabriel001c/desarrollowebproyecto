<?php
require_once 'config/database.php';

class Session {
    public function login($email, $pasword) {
        require_once 'models/SessionModel.php';
        require_once 'models/UsersModel.php';
        require_once 'models/CenotesModel.php';
        
        // Crear una instancia del modelo UsersModel
        $sessionModel = new SessionModel();
        $cenotesModel = new CenotesModel();
        $userModel = new UsersModel();

        // Obtener los usuarios utilizando el método obtenerUsuarios()
        $loginValidate = $sessionModel->validateSession($email, $pasword);        

        if($loginValidate){
            $generateToken = $sessionModel->createSession($loginValidate);
            // Establecer la cookie
            setcookie('token', $generateToken, time() + 3600, '/'); // La cookie expira en una hora
            require_once 'models/CenotesModel.php';

            $userData = $userModel->buscarUsuarioPorId($loginValidate);
            
            setcookie('email', $userData['email'], time() + 3600, '/'); // La cookie expira en una hora
            setcookie('tipo_usuario', $userData['tipo_usuario'], time() + 3600, '/'); // La cookie expira en una hora
            setcookie('id_usuario', $loginValidate, time() + 3600, '/'); // La cookie expira en una hora

            // $url = "/cenotes";
            // header("Location: " . $url);
            // exit();
            return true;
        }else{
            $mensaje = "Inicio de sesión fallido";            
            // echo '<script>alert("' . $mensaje . '");</script>';
            // require 'views/login.php';             
            return false;

        }

        
    }

    public function logout(){
        // Eliminar la cookie "token" estableciendo un tiempo de expiración en el pasado
        setcookie('token', '', time() - 3600, '/');
        setcookie('tipo_usuario', '', time() - 3600, '/');
        setcookie('email', '', time() - 3600, '/');
        setcookie('id_usuario', '', time() - 3600, '/');

        $url = "/cenotes";
        header("Location: " . $url);
        exit();
        
    }
}

?>