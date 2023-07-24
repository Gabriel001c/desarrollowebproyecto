<?php
require_once 'config/database.php';

class UsersModel {
    private $db;

    public function obtenerUsuarios() {
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
        $query = "SELECT email, tipo_usuario, imagen_perfil FROM usuarios";
        $stmt = $db->prepare($query);
        $stmt->execute();
        // Obtener los resultados como un array asociativo
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;        
    }

    public function buscarUsuarioPorId($id) {
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
        $query = "SELECT email, tipo_usuario, imagen_perfil FROM usuarios WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


