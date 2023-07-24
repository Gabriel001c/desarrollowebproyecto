<?php
class Puntuaciones {

    public function newPuntuacion() { 
        require_once 'models/PuntuacionesModel.php';
        $puntuacionesModel = new PuntuacionesModel();
    
        $id_cenote = $_POST['id_cenote'];
        $id_usuario = $_POST['id_usuario'];
        $comentario = $_POST['comentario'];
        $puntuacion = $_POST['puntuacion'];

        $puntuacionId = $puntuacionesModel->crearPuntuacion($id_cenote, $comentario, $puntuacion,$id_usuario);

        if ($puntuacionId) {
            // Cenote creado exitosamente
            echo '<script>alert("El comentario a sido guardado exitosamente");</script>';
        } else {
            // Error al crear el cenote
            echo '<script>alert("Error al crear el el comentario");</script>';
        }    

        $url = "/cenotes";
        header("Location: " . $url);
    }
 
}
?>
