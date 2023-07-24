<?php
class Cenotes {


    public function index() {
        require_once 'models/CenotesModel.php';

        // Crear una instancia del modelo UsersModel
        $cenotesModel = new CenotesModel();

        // Obtener los usuarios utilizando el método obtenerUsuarios()
        $cenotes = $cenotesModel->obtenerCenotes();

        // Pasar los usuarios a la vista
        extract(['cenotes' => $cenotes]);
        require 'views/cenotes.php';
    }

    public function index_cenotes() {
        require_once 'models/CenotesModel.php';

        // Crear una instancia del modelo UsersModel
        $cenotesModel = new CenotesModel();

        // Obtener los usuarios utilizando el método obtenerUsuarios()
        $cenotes = $cenotesModel->obtenerCenotes();

        // Pasar los usuarios a la vista
        extract(['cenotes' => $cenotes]);
        require 'views/aprobar_cenotes.php';
    }

    public function index_cenotes_filter() {
        require_once 'models/CenotesModel.php';

        // Crear una instancia del modelo UsersModel
        $cenotesModel = new CenotesModel();

        // Obtener los usuarios utilizando el método obtenerUsuarios()
        $filtro = $_POST['filtro'];
        $cenotes = $cenotesModel->obtenerCenotesFilter($filtro);

        // Pasar los usuarios a la vista
        extract(['cenotes' => $cenotes]);
        require 'views/aprobar_cenotes.php';
    }

    public function topTen() {
        require_once 'models/CenotesModel.php';

        // Crear una instancia del modelo UsersModel
        $cenotesModel = new CenotesModel();

        // Obtener los usuarios utilizando el método obtenerUsuarios()
        $cenotes = $cenotesModel->obtenerCenotesRandom();

        // Pasar los usuarios a la vista
        extract(['cenotes' => $cenotes]);        
        require 'views/plantillas/header.php';
        require 'views/top_ten.php';
        require 'views/plantillas/footer.php';
    }

    public function createView(){
        require 'views/create_cenotes.php';
    }

    public function updateView() {
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
    
            require 'views/update_cenote.php';
        } else {
            // Redirigir o mostrar un mensaje de error si se intenta acceder directamente a esta página sin el envío de datos POST
        }
    }

    public function actualizarCenote($id, $nombre, $ubicacion, $informacion, $status) {
        require_once 'models/CenotesModel.php';
        $cenoteModel = new CenoteSModel();

        $result = $cenoteModel->actualizarCenote($id, $nombre, $ubicacion, $informacion, $status);

        require_once 'Controllers/Panel.php';
        $panelController = new Panel();
        $panelController->index();
    }
    
    public function actualizarMiCenote($id, $nombre, $ubicacion, $informacion, $status) {
        require_once 'models/CenotesModel.php';
        $cenoteModel = new CenoteSModel();

        $result = $cenoteModel->actualizarCenote($id, $nombre, $ubicacion, $informacion, $status);

        $url = "/cenotes/mis_cenotes";
        header("Location: " . $url);
    }
    
    public function eliminarMiCenote($id) {
        require_once 'models/CenotesModel.php';
        $cenoteModel = new CenoteSModel();

        $result = $cenoteModel->deleteCenoteById($id);

        $url = "/cenotes/mis_cenotes";
        header("Location: " . $url);
    }

    public function createCenote(){
        // Verificar si existe la cookie "token"
        if (isset($_COOKIE['token'])) {
            // Obtener el token de la cookie
            $token = $_COOKIE['token'];

            require_once 'models/SessionModel.php';

            // Crear una instancia del modelo UsersModel
            $sessionModel = new SessionModel();


            // Obtener los usuarios utilizando el método obtenerUsuarios()
            $tokenValidate = $sessionModel->validateToken($_COOKIE['token']); 


            require_once 'models/UsersModel.php';

            // Crear una instancia del modelo UsersModel
            $userModel = new UsersModel();

            // Obtener los usuarios utilizando el método buscarUsuarioPorId()
            $userData = $userModel->buscarUsuarioPorId($tokenValidate);

            // Obtener el valor de tipo_usuario
            $tipoUsuario = $userData['tipo_usuario'];
  
            if ($tokenValidate) {
                require_once 'models/CenotesModel.php';
    
                // Crear una instancia del modelo CenotesModel
                $cenotesModel = new CenotesModel();
    
                // Crear el nuevo cenote utilizando el método crearCenote() del modelo
                if($tipoUsuario == "creator"){
                    $nombre = $_POST['nombre'];
                    $ubicacion = $_POST['ubicacion'];
                    $fotografia = $_FILES['fotografia']['tmp_name'];
                    $informacion = $_POST['informacion'];

                    $cenoteId = $cenotesModel->crearCenote($nombre, $ubicacion, $fotografia, $informacion, $tokenValidate, 1);

                    if ($cenoteId) {
                        // Cenote creado exitosamente
                        echo '<script>alert("Cenote creado exitosamente");</script>';
                    } else {
                        // Error al crear el cenote
                        echo '<script>alert("Error al crear el cenote");</script>';
                    }
                }else{
                    $nombre = $_POST['nombre'];
                    $ubicacion = $_POST['ubicacion'];
                    $fotografia = $_FILES['fotografia']['tmp_name'];
                    $informacion = $_POST['informacion'];

                    $cenoteId = $cenotesModel->crearCenote($nombre, $ubicacion, $fotografia, $informacion, $tokenValidate, 0);

                    if ($cenoteId) {
                        // Cenote creado exitosamente
                        echo '<script>alert("Cenote creado exitosamente");</script>';
                    } else {
                        // Error al crear el cenote
                        echo '<script>alert("Error al crear el cenote");</script>';
                    }
                }
                
    
                
            } else {
                $mensaje = "Token inválido";
    
                echo '<script>alert("' . $mensaje . '");</script>';
            }
        } else {
            $mensaje = "No tienes una sesión iniciada";
    
            echo '<script>alert("' . $mensaje . '");</script>';
        }

        $url = "/cenotes/mis_cenotes";
        header("Location: " . $url);

    }
    
    public function seeCenoteView() {
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

            require_once 'models/PuntuacionesModel.php';

            $puntuacionesModel = new PuntuacionesModel();
            $puntuaciones = $puntuacionesModel->buscarPuntuacionesPorCenoteId($id);

            extract(['puntuaciones' => $puntuaciones]);
            extract(['cenote' => $cenote]);
    
            require 'views/see_cenote.php';
        } else {
            // Redirigir o mostrar un mensaje de error si se intenta acceder directamente a esta página sin el envío de datos POST
        }
    }
    // Agrega más métodos de controlador según tus necesidades
}

?>