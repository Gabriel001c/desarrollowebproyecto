<?php
require_once 'config/database.php';

class PuntuacionesModel {
    private $db;
         
    public function crearPuntuacion($id_cenote, $comentario, $puntuacion,$id_usuario) {
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
        $query = "INSERT INTO puntuaciones (id_cenote, comentario, puntuacion, id_usuario) VALUES (:id_cenote, :comentario, :puntuacion, :id_usuario)";
        $stmt = $db->prepare($query);
    
        // Asignar los valores a los parámetros de la consulta
        $stmt->bindParam(":id_cenote", $id_cenote);
        $stmt->bindParam(":comentario", $comentario);
        $stmt->bindParam(":puntuacion", $puntuacion);
        $stmt->bindParam(":id_usuario", $id_usuario);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Retorna el ID del registro insertado
        return $db->lastInsertId();
    }


    public function buscarPuntuacionesPorCenoteId($id) {
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
        $query = "SELECT comentario, puntuacion, u.usuario, u.imagen_perfil FROM puntuaciones p left join usuarios u on u.id = p.id_usuario WHERE p.id_cenote = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        $puntuaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $puntuaciones;
    }
}


