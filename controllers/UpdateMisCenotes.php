<?php
class UpdateMisCenotes {

    public function updateMisCenotesView() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $ubicacion = $_POST['ubicacion'];
            $fotografia = base64_decode($_POST['fotografia']);
            $informacion = $_POST['informacion'];
            $status = $_POST['status'];

            $cenote = [
                'id' => $id,
                'nombre' => $nombre,
                'ubicacion' => $ubicacion,
                'fotografia' => $fotografia,
                'informacion' => $informacion,
                'status' => $status
            ];
            require_once 'models/ComentariosModel.php';

            $comentariosModel = new ComentariosModel();
            $comentarios = $comentariosModel->buscarComentariosPorCenoteId($id);




            extract(['comentarios' => $comentarios]);
            extract(['cenote' => $cenote]);
    
            require 'views/update_mi_cenote.php';
        } else {
            // Redirigir o mostrar un mensaje de error si se intenta acceder directamente a esta página sin el envío de datos POST
        }
    }

}
?>