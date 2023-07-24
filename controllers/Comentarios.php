<?php
class Comentarios {

    public function newComentario() { 
        require_once 'models/ComentariosModel.php';
        $comentariosModel = new ComentariosModel();
    
        $id_usuario = $_POST['id_usuario'];
        $id_cenote = $_POST['id_cenote'];
        $comentario = $_POST['comentario'];

        $comentario = $comentariosModel->crearComentario($id_usuario,$id_cenote, $comentario);

        if ($puntuacionId) {
            // Cenote creado exitosamente
            echo '<script>alert("El comentario a sido guardado exitosamente");</script>';
        } else {
            // Error al crear el cenote
            echo '<script>alert("Error al crear el el comentario");</script>';
        }    


        $url = "/cenotes/panel";
        header("Location: " . $url);
    }

    public function deleteComentario($id) {
        require_once 'models/ComentariosModel.php';
        $comentariosModel = new ComentariosModel();

        $result = $comentariosModel->deleteComentarioById($id);

        $url = "/cenotes/panel";
        header("Location: " . $url);
    }
 
}



?>
