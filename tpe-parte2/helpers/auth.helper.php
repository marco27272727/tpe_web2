<?php

class AuthHelper {
    public function __construct() {}

    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $user_id = $_SESSION['ID_USER'] = $user->id;
        $username = $_SESSION['USERNAME'] = $user->username;
        return $user_id . $username;
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'mostrarObjetos');
    }

    public function checkLoggedIn() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . 'mostrarObjetos');
            die();
        }
    }
    
   
}
