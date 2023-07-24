<?php
class Users {
    public function index() {
        require_once 'models/UsersModel.php';

        // Crear una instancia del modelo UsersModel
        $usersModel = new UsersModel();

        // Obtener los usuarios utilizando el método obtenerUsuarios()
        $usuarios = $usersModel->obtenerUsuarios();

        // Pasar los usuarios a la vista
        extract(['usuarios' => $usuarios]);
        require 'views/users.php';
    }

    public function clients() {
        require_once 'models/UsersModel.php';

        // Crear una instancia del modelo UsersModel
        $usersModel = new UsersModel();

        // Obtener los usuarios utilizando el método obtenerUsuarios()
        $usuarios = $usersModel->obtenerUsuarios();

        // Pasar los usuarios a la vista
        extract(['usuarios' => $usuarios]);
        require 'views/clients.php';
    }

    // Agrega más métodos de controlador según tus necesidades
}

?>
