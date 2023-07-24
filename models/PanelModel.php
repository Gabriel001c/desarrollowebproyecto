<?php
require_once 'config/database.php';

class PanelModel {
    private $db;


    public function respaldarBD() {
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

        $backupFile = 'cenotes.sql';

        try {
            $query = 'SHOW TABLES';
            $stmt = $db->prepare($query);
            $stmt->execute();
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $sql = '';

            foreach ($tables as $table) {
                $query = "SHOW CREATE TABLE $table";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $tableData = $stmt->fetch(PDO::FETCH_ASSOC);

                $sql .= $tableData['Create Table'] . ";\n\n";

                $query = "SELECT * FROM $table";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($rows as $row) {
                    $rowValues = array_map([$db, 'quote'], array_values($row));
                    $sql .= "INSERT INTO $table VALUES (" . implode(', ', $rowValues) . ");\n";
                }

                $sql .= "\n";
            }

            file_put_contents($backupFile, $sql);

            // Descargar el archivo de respaldo
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($backupFile) . '"');
            header('Content-Length: ' . filesize($backupFile));
            readfile($backupFile);

            // Eliminar el archivo de respaldo
            unlink($backupFile);

            // Detener la ejecución del script
            exit;
        } catch (PDOException $e) {
            echo 'Error al realizar el respaldo de la base de datos: ' . $e->getMessage();
        }
        
    }
}
?>
