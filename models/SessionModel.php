<?php
require_once 'config/database.php';

class SessionModel {
    private $db; // Accede a la variable de conexión a la base de datos definida en database.php
    public function createSession($userId) {       
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
        // Generar el token automáticamente
        $length = 32; // Longitud del token
        $token = uniqid('', true); // Generar un ID único basado en el tiempo actual
    
        // Verificar si el ID único es lo suficientemente largo
        if (strlen($token) < $length) {
            $token .= random_bytes($length - strlen($token)); // Completar el token con bytes aleatorios
        }
    
        
        $token = bin2hex($token); // Convertir el token a una cadena hexadecimal
        
        // Lógica para crear el registro de sesión en la tabla sesiones
        $query = "INSERT INTO sesiones (token, usuario_id) VALUES (:token, :userId)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();


        return $token; 
        
        // Aquí puedes realizar cualquier otra lógica necesaria después de crear la sesión
    }

    public function validateSession($email, $password_user) {
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
        $query = "SELECT id FROM usuarios WHERE email = :email AND password = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password_user);
        $stmt->execute();

        

        $result = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $result ? $result['id'] : false;
    }

    public function validateToken($token) {
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
        $query = "SELECT usuario_id FROM sesiones WHERE token = :token";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":token", $token);        
        $stmt->execute();

        

        $result = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $result ? $result['usuario_id'] : false;
    }

    
    
    // Agrega más métodos de modelo según tus necesidades
}
?>
