<?php

    require_once './app/models/auth.model.php';
    require_once './app/views/auth.view.php';
    require_once './app/helpers/auth.helper.php';

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
        //muestra el formulario de 
        public function showAuth(){
            $students = $this->modelAlumno->getAllStudents();
            $this->view->displayAuth($students);
        }
        //autentica al usuario
        public function authentic(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->model->getUsers($username);
            if( ($user && password_verify($password, $user->contraseña))){
                $this->authHelper->login($user);
                header('Location: ' . BASE_URL . 'mostrarObjetos');
            }
            else{
                $this->view->displayLoginError();
            }
        }

        public function logout(){
            $this->authHelper->logout();
        }
    }