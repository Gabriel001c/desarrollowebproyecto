<?php
require_once 'config/database.php';

class ComentariosModel {
    private $db;
         
    public function crearComentario($id_usuario,$id_cenote, $comentario) {
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
    
    
        // Preparar la consulta SQL para insertar un nuevo registro
        $query = "INSERT INTO comentarios ( id_usuario,id_cenote, comentario) VALUES (:id_usuario, :id_cenote, :comentario)";
        $stmt = $db->prepare($query);
    
        // Asignar los valores a los parámetros de la consulta
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->bindParam(":id_cenote", $id_cenote);
        $stmt->bindParam(":comentario", $comentario);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Retorna el ID del registro insertado
        return $db->lastInsertId();
    }


    public function buscarComentariosPorCenoteId($id) {
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
        $query = "SELECT * FROM comentarios WHERE id_cenote = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        $puntuaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $puntuaciones;
    }

    public function deleteComentarioById($id) {
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
        $query = "DELETE FROM comentarios WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
         
        return true;
    }    
}


