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

        public function addStudent(){
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $cellPhone  = $_POST['cellPhone'];
            $dni  = $_POST['dni'];
            $dateHour  = $_POST['dateHour'];

            if(empty($name) || empty($lastName) || empty($cellPhone) || empty($dni) || empty($dateHour)){
                $this->view->displayError("Debe de completar todo los campos");
                return;
            }

            $id = $this->model->insertStudent($name,$lastName,$cellPhone,$dni,$dateHour);
            if(!$id){
                header('Location: ' . BASE_URL);
            }
            else{
                $this->view->displayError("Error al insertar el item");
            }
        }

        public function deleteStudent($id){
            $this->model->removeStudent($id);
            header('Location: ' . BASE_URL);
        }

        public function editStudent($id){
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $cellPhone  = $_POST['cellPhone'];
            $dni  = $_POST['dni'];
            $dateHour  = $_POST['dateHour'];

            if(empty($name) || empty($lastName) || empty($cellPhone) || empty($dni) || empty($dateHour)){
                $this->view->displayError("Debe de completar todo los campos");
                return;
            }

            $id = $this->model->insertStudent($name,$lastName,$cellPhone,$dni,$dateHour);
            if(!$id){
                header('Location: ' . BASE_URL);
            }
            else{
                $this->view->displayError("Error al insertar el item");
            }
        }
        
    }