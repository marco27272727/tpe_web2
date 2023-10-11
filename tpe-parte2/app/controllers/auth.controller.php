<?php

    require_once './app/models/auth.model.php';
    require_once './app/views/auth.view.php';

    class AuthController{
        private $model;
        private $view;

        public function __construct(){
            $this->model = new AuthModel();
            $this->view = new AuthView();

        }
        
        public function showAuth(){
            $this->view->displayAuth();
        }

        public function Authentic(){
            $users = $this->model->getUsers();
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(password_verify($password, $users->contraseña)){
                echo 'sos un capo';
            }
            else{
                echo 'te falla';
            }
        }
    }