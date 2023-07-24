<?php

class CookieGuard
{
    public function canEntry($page)
    {
        $canPass = false;


        // no login
        if ($page=='/' || $page=='/login' || $page=='/login_session' || $page== '/registro' || $page=='/top' || $page == '/logout' || $page == '/see_cenote' || $page =='/logout' ){
            $canPass = true;
        }

        if (isset($_COOKIE['token'])) {
                //TIPO ADMI
            if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] == 'admin') {
                if( $page=='/panel' || $page == '/cenote'|| $page== '/respaldo' || $page== '/respaldoDB' || $page=='/users' || $page=='/clients' || $page=='/update_cenote' || $page=='/aprobar_cenotes'|| $page=='/aprobar_cenotes_filter' || $page=='/actualizar_cenote' || $page=='/new_comentario' || $page=='/eliminar_mi_comentario')
                    $canPass = true;
            }else
            {
                // TIPO TURISTA
                if ($page=='/create_cenote' || $page=='/create_cenote_push' || $page=='/new_puntuacion' || $page=='/mis_cenotes' || $page=='/update_mi_cenote' || $page=='/actualizar_mi_cenote' || $page=='/eliminar_mi_cenote')
                    $canPass = true;
            } 
        }
        if (!$canPass){
            require_once 'controllers/Controller.php';
            $controller = new Controller();        
            $controller->index(); 
        }
        
        
        return $canPass;
    }
}

