<?php
class MisCenotes {

 

    public function index_mis_cenotes() {
        require_once 'models/CenotesModel.php';
        $cenotesModel = new CenotesModel();
        $user_id = $_COOKIE['id_usuario'];


        $cenotes = $cenotesModel->obtenerCenotesByUserId($user_id);
        extract(['cenotes' => $cenotes]);
        require 'views/mis_cenotes.php';
    }

    // public function actualizarCenote($id, $nombre, $ubicacion, $informacion, $status) {
    //     require_once 'models/CenotesModel.php';
    //     $cenoteModel = new CenoteSModel();

    //     $result = $cenoteModel->actualizarCenote($id, $nombre, $ubicacion, $informacion, $status);

    //     require_once 'Controllers/Panel.php';
    //     $panelController = new Panel();
    //     $panelController->index();
    // }
     
 
}

?>