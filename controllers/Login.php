<?php
class Login {
    public function index($val) {
        extract(['ok' => $val]);
        
        require 'views/login.php';  
    }

    // Agrega más métodos de controlador según tus necesidades
}
?>
