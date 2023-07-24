<?php
require_once 'config/database.php';

class CenotesModel {
    private $db;

    public function obtenerCenotes() {
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
        $query = "SELECT id, nombre, ubicacion, fotografia, informacion, status FROM cenotes";
        $stmt = $db->prepare($query);
        $stmt->execute();
        // Obtener los resultados como un array asociativo
        $cenotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cenotes;        
    }

    public function obtenerCenotesFilter($status) {
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
        $query = "SELECT id, nombre, ubicacion, fotografia, informacion, status FROM cenotes WHERE status = :status";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        // Obtener los resultados como un array asociativo
        $cenotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cenotes;
    }
    

    public function obtenerCenotesRandom() {
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



        // $query = "SELECT nombre, ubicacion, fotografia, informacion, status FROM cenotes ORDER BY RAND() LIMIT 10";

        $query ="SELECT c.nombre,c.ubicacion,c.fotografia,c.informacion,c.status, COALESCE(SUM(p.puntuacion), 0) AS total_puntuacion
        FROM cenotes c
        LEFT JOIN puntuaciones p ON c.id = p.id_cenote
        WHERE status = 1
        GROUP BY c.id ORDER BY total_puntuacion DESC LIMIT 10;";
        



        $stmt = $db->prepare($query);
        $stmt->execute();
        // Obtener los resultados como un array asociativo
        $cenotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cenotes;        
    }

    public function crearCenote($nombre, $ubicacion, $fotografia, $informacion, $user_id, $status) {
        $host = 'localhost';
        $port = 3306;
        $database = 'cenotes';
        $username = 'root';
        $password = '';
    
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
    
        // Obtener el contenido de la imagen en formato de bytes
        $imagenData = file_get_contents($fotografia);
    
        // Preparar la consulta SQL para insertar un nuevo registro
        $query = "INSERT INTO cenotes (nombre, ubicacion, fotografia, informacion, usuario_id, status) VALUES (:nombre, :ubicacion, :fotografia, :informacion, :user_id, :status)";
        $stmt = $db->prepare($query);
    
        // Asignar los valores a los parámetros de la consulta
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":ubicacion", $ubicacion);
        $stmt->bindParam(":fotografia", $imagenData, PDO::PARAM_LOB);
        $stmt->bindParam(":informacion", $informacion);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":status", $status);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Retorna el ID del registro insertado
        return $db->lastInsertId();
    }

    public function actualizarCenote($id, $nombre, $ubicacion, $informacion, $status) {
        $host = 'localhost';
        $port = 3306;
        $database = 'cenotes';
        $username = 'root';
        $password = '';
    
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
    
        
    
        // Preparar la consulta SQL para actualizar el registro con el ID especificado
        $query = "UPDATE cenotes SET nombre = :nombre, ubicacion = :ubicacion, informacion = :informacion, status = :status WHERE id = :id";
        $stmt = $db->prepare($query);
    
        // Asignar los valores a los parámetros de la consulta
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":ubicacion", $ubicacion);        
        $stmt->bindParam(":informacion", $informacion);        
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Retorna true si la actualización fue exitosa, o false si ocurrió algún error
        return $stmt->rowCount() > 0;
    }
    
    public function obtenerCenotesByUserId($user_id) {
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
        $query = "SELECT c.id, c.nombre, c.ubicacion, c.fotografia, c.informacion, c.status, COUNT(cm.id) AS comentarios
        FROM cenotes c
        LEFT JOIN comentarios cm ON c.id = cm.id_cenote
        WHERE c.usuario_id = :usuario_id
        GROUP BY c.id, c.nombre, c.ubicacion, c.fotografia, c.informacion, c.status;";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":usuario_id", $user_id);
        $stmt->execute();
        // Obtener los resultados como un array asociativo
        $cenotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cenotes;
    }
    
    public function deleteCenoteById($cenote_id) {
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
        $query = "DELETE FROM cenotes WHERE id = :cenote_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":cenote_id", $cenote_id);
        $stmt->execute();
        // Obtener los resultados como un array asociativo
        // $cenotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
        return true;
    }    
}


