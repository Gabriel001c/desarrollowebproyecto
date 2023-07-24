<?php
require_once 'config/database.php';

class RegistroModel {
    private $db;

    public function crearUsuario($email, $password_user, $userType, $profileImage, $user) {
         

        $host = 'localhost';
        $port = 3306;
        $database = 'cenotes';
        $username = 'root';
        $password = '';
        // Crear la conexión a la base de datos
        try {
            $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $db = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }

        if ($profileImage==''){
            $profileImage = 'views/assets/img/company/userDefault.png';
        }

        // Lee el contenido del archivo de imagen
        $imageData = file_get_contents($profileImage);

        // Prepara la consulta SQL
        $query = "INSERT INTO usuarios (email, password, tipo_usuario, imagen_perfil, usuario) VALUES (:email, :password, :userType, :imagen_perfil, :usuario)";
        $stmt = $db->prepare($query);

        // Vincula los parámetros
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password_user);
        $stmt->bindParam(":userType", $userType);
        $stmt->bindParam(":imagen_perfil", $imageData, PDO::PARAM_LOB);
        $stmt->bindParam(":usuario", $user);

        try {
            $stmt->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                // Error de duplicado (clave duplicada)
                echo "<script>alert('El email o usuario ya ha sido registrado');</script>";
            } else {
                die('Error al guardar el usuario: ' . $e->getMessage());
            }
        }
    }
}


