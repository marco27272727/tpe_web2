<?php

    require_once './app/models/auth.model.php';
    require_once './app/views/auth.view.php';

    class AuthController{
        private $model;
        private $view;
        private $modelAlumno;

        public function __construct(){
            $this->model = new AuthModel();
            $this->view = new AuthView();
            $this->modelAlumno = new StudentModel();
        }
        
        public function showAuth(){
            $students = $this->modelAlumno->getAllStudents();
            $this->view->displayAuth($students);
        }

        public function Authentic(){
            $users = $this->model->getUsers();
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(($email == $users->e_mail) && (password_verify($password, $users->contraseña))){
                echo 'sos un capo';
            }
            else{
                echo 'te falla';
            }
        }
    }