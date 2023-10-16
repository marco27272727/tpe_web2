<?php

    require_once './app/models/auth.model.php';
    require_once './app/views/auth.view.php';
    require_once './helpers/auth.helper.php';

    class AuthController{
        private $model;
        private $view;
        private $modelAlumno;
        private $authHelper;

        public function __construct(){
            $this->model = new AuthModel();
            $this->view = new AuthView();
            $this->modelAlumno = new StudentModel();
            $this->authHelper = new AuthHelper();
        }
        //muestra el formulario de login
        public function showAuth(){
            $students = $this->modelAlumno->getAllStudents();
            $this->view->displayAuth($students);
        }
        //autentica al usuario
        public function Authentic(){
            $users = $this->model->getUsers();
            $username = $_POST['username'];
            $password = $_POST['password'];
            if( (!empty($users->username) && password_verify($password, $users->contraseña))){
                $this->authHelper->login($users->username);
                header('Location: ' . BASE_URL . 'mostrarObjetos');
            }
            else{
                $this->view->displayLoginError();
            }
        }
        public function logout() {
            session_start();
            session_destroy();
            //$this->authHelper->logout();
            header('location. mostrarLogin');

        }
    
        private function checkLoggedIn(){
            session_start();
            if (!isset($_SESSION['ID_USER'])) {
                header('location. mostrarLogin');
            }
        }
    }