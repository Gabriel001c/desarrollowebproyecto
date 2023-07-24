<?php
require_once 'config/database.php';
require_once 'controllers/Controller.php';
require_once 'controllers/Login.php';
require_once 'controllers/Registro.php';
require_once 'controllers/Panel.php';
require_once 'controllers/Users.php';
require_once 'controllers/Cenotes.php';
require_once 'controllers/MisCenotes.php';
require_once 'controllers/Session.php';
require_once 'controllers/Puntuaciones.php';
require_once 'controllers/CookieGuard.php';
require_once 'controllers/UpdateMisCenotes.php';
require_once 'controllers/Comentarios.php';

// Obtén la ruta actual
$request = $_SERVER['REQUEST_URI'];

// Ruta base del proyecto
$base_path = '/';

// Ruta relativa sin la ruta base
$path = str_replace($base_path, '', $request);
$path = $base_path;

// Enrutamiento básico

$CookieGuardcontroller = new CookieGuard();        

switch ($path) {
    case '/':
        // if(!$CookieGuardcontroller->canEntry('/'))break;
        $controller = new Controller();        
        $controller->index(); 
        break;
    
    case '/login':
        // if(!$CookieGuardcontroller->canEntry('/login'))break;
        $loginController = new Login();        
        $loginController->index(false);
        break;
    case '/login_session':
        // if(!$CookieGuardcontroller->canEntry('/'))break;
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sessionController = new Session();        
        $res = $sessionController->login($email, $password);
        if(!$res)
        {
                $loginController = new Login();        
                $loginController->index(true);
        }
        else{
            header("Location: /cenotes");
        }
        break;

    case '/registro':
        // if(!$CookieGuardcontroller->canEntry('/'))break;
        $registroController = new Registro();        
        $registroController->index();
        break;

    case '/panel':
        if(!$CookieGuardcontroller->canEntry('/panel'))break;
        $panelController = new Panel();        
        $panelController->index();
        break;

    case '/respaldo':
        if(!$CookieGuardcontroller->canEntry('/respaldo'))break;
        $panelController = new Panel();        
        $panelController->respaldo();
        break;

    case '/respaldoDB':
        if(!$CookieGuardcontroller->canEntry('/respaldoDB'))break;
        $panelController = new Panel();        
        $panelController->respaldarBD();
        break;

    case '/users':
        if(!$CookieGuardcontroller->canEntry('/users'))break;
        $userController = new Users();        
        $userController->index();
        break;

    case '/clients':
        if(!$CookieGuardcontroller->canEntry('/clients'))break;
        $userController = new Users();        
        $userController->clients();
        break;

    case '/cenote':
        if(!$CookieGuardcontroller->canEntry('/cenote'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->index();
        break;

    case '/top':
        if(!$CookieGuardcontroller->canEntry('/top'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->topTen();
        break;

    case '/logout':
        // if(!$CookieGuardcontroller->canEntry('/logout'))break;
        $sessionController = new Session();        
        $sessionController->logout();
        break;


    // Ruta '/login'
    case '/create_cenote':
        if(!$CookieGuardcontroller->canEntry('/create_cenote'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->createView();
        break;
    
    
    case '/update_cenote':
        if(!$CookieGuardcontroller->canEntry('/update_cenote'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->updateView();
        break;

    case '/see_cenote':
        // if(!$CookieGuardcontroller->canEntry('/see_cenote'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->seeCenoteView();
        break;

    case '/create_cenote_push':
        if(!$CookieGuardcontroller->canEntry('/create_cenote_push'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->createCenote();
        break;

    case '/aprobar_cenotes':
        if(!$CookieGuardcontroller->canEntry('/aprobar_cenotes'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->index_cenotes();
        break;

    case '/aprobar_cenotes_filter':
        if(!$CookieGuardcontroller->canEntry('/aprobar_cenotes_filter'))break;
        $cenotesController = new Cenotes();        
        $cenotesController->index_cenotes_filter();
        break;

    case '/actualizar_cenote':
        if(!$CookieGuardcontroller->canEntry('/actualizar_cenote'))break;
        $cenotesController = new Cenotes();
        $cenotesController->actualizarCenote($_POST['id'], $_POST['nombre'], $_POST['ubicacion'], $_POST['informacion'], $_POST['status']);
        break;
        
    case '/new_puntuacion':
        if(!$CookieGuardcontroller->canEntry('/new_puntuacion'))break;
        $puntuacionesController = new Puntuaciones();
        $PuntuacionesController->newPuntuacion($_POST['id_cenote'], $_POST['comentario'], $_POST['puntuacion']);
        break;
        
    case '/mis_cenotes':
        if(!$CookieGuardcontroller->canEntry('/mis_cenotes'))break;
        $cenotesController = new MisCenotes();        
        $cenotesController->index_mis_cenotes();
        break;

    case '/update_mi_cenote':
        if(!$CookieGuardcontroller->canEntry('/update_mi_cenote'))break;
        $cenotesController = new UpdateMisCenotes();        
        $cenotesController->updateMisCenotesView();
        break;
    case '/actualizar_mi_cenote':
        if(!$CookieGuardcontroller->canEntry('/actualizar_mi_cenote'))break;
        $cenotesController = new Cenotes();
        $cenotesController->actualizarMiCenote($_POST['id'], $_POST['nombre'], $_POST['ubicacion'], $_POST['informacion'], $_POST['status']);
        break;
    case '/eliminar_mi_cenote':
        if(!$CookieGuardcontroller->canEntry('/eliminar_mi_cenote'))break;
        $cenotesController = new Cenotes();
        $cenotesController->eliminarMiCenote($_POST['id']);
        break;

    case '/new_comentario':
        if(!$CookieGuardcontroller->canEntry('/new_comentario'))break;
        $comentariosController = new Comentarios();
        $ComentariosController->newComentario($_POST['id_usuario'],$_POST['id_cenote'], $_POST['comentario']);
        break;
        
    
    case '/eliminar_mi_comentario':
        if(!$CookieGuardcontroller->canEntry('/eliminar_mi_comentario'))break;
        $cenotesController = new Comentarios();
        $cenotesController->deleteComentario($_POST['id']);
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        echo 'Página no encontrada.';
        break;
}
?>

