<?php
class Controller {
    public function index() {
        require_once 'models/CenotesModel.php';

        $cenotesModel = new CenotesModel();
        $cenotes = $cenotesModel->obtenerCenotesFilter(true);
        extract(['cenotes' => $cenotes]);

        require 'views/plantillas/header.php';
        require 'views/home.php';
        require 'views/plantillas/footer.php';
    }
}
?>
