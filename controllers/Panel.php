<?php
class Panel {
    public function index() {
        
        $nombre = $_COOKIE['email'];

        require_once 'models/UsersModel.php';

        $userModel = new UsersModel();
        $usuarios = $userModel->obtenerUsuarios();
         
        $usuario = $userModel->buscarUsuarioPorId($_COOKIE['id_usuario']);

        require_once 'models/CenotesModel.php';

        $cenotesModel = new CenotesModel();
        $cenotes = $cenotesModel->obtenerCenotes();
        
        $countStatus1 = 0;
        $countStatus0 = 0;
        $totalCount = 0;
        
        foreach ($cenotes as $cenote) {
            $status = $cenote['status'];
        
            if ($status === 1) {
                $countStatus1++;
            } elseif ($status === 0) {
                $countStatus0++;
            }
        
            $totalCount++;
        }
        

        extract(['nombre' => $nombre,'foto' => $usuario['imagen_perfil'],'countStatus1' => $countStatus1,'totalCount' => $totalCount,'countStatus0' => $countStatus0, 'countUser' =>count($usuarios)]);
        
        require 'views/panel.php';  
    }

    public function respaldo(){
        require 'views/respaldo.php';  
    }

    public function respaldarBD(){
        require 'models/PanelModel.php';  
            
        // Crear el modelo de Registro con la conexión a la base de datos
        $panelModel = new PanelModel();                
        $panelModel->respaldarBD();

        $this->index();
    }

    // Agrega más métodos de controlador según tus necesidades
}
?>
