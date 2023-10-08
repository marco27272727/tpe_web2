<?php

    require_once './app/models/student.model.php';
    require_once './app/views/student.view.php';

    class StudentController{
        private $model;
        private $view;

        public function __construct(){
            $this->model = new StudentModel();
            $this->view = new StudentView();
        }

        // funcion de controllador que primero obtiene todos los datos de la base de datos de alumnos 
        // y despues los muestran en la pagina 
        public function showStudents(){
            $students = $this->model->getAllStudents();
            $this->view->displayStudents($students);
        }
        
    }