<?php

class AuthHelper {
    public function __construct() {}

    public function init(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        $this->init();
        $_SESSION['ID_USER'] = $user->id_auth;
        $_SESSION['USERNAME'] = $user->username;
    }

    public function logout() {
        $this->init();
        session_destroy();
        header('Location: ' . BASE_URL . 'mostrarLogin');
    }

    public function checkLoggedIn() {
        $this->init();
        if (isset($_SESSION['ID_USERS'])) {
            header("Location: " . BASE_URL . 'mostrarLogin');
            die();
        }
    }
    
   
}
