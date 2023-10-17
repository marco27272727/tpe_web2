<?php

    require_once './app/models/student.model.php';
    require_once './app/views/student.view.php';
    require_once './app/helpers/auth.helper.php';

    class StudentController{
        private $model;
        private $view;
        private $authHelper;

        public function __construct(){
            $this->model = new StudentModel();
            $this->view = new StudentView();
            $this->authHelper = new AuthHelper();
            $this->authHelper->init();
        }

        // funcion de controllador que primero obtiene todos los datos de la base de datos de alumnos 
        // y despues los muestran en la pagina 
        public function showStudents(){
            $students = $this->model->getAllStudents();
            $this->view->displayStudents($students);
        }

        public function addStudent(){
            $this->authHelper->checkLoggedIn();
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
                header("Location: " . BASE_URL. 'mostarAlumnos');
            }
            else{
                $this->view->displayError("Error al insertar el item");
            }
        }

        public function deleteStudent($id){
            $this->authHelper->checkLoggedIn();
            $this->model->removeStudent($id);
            header('Location: ' . BASE_URL . 'mostarAlumnos');
        }

        public function editStudent($id){
            $this->authHelper->checkLoggedIn();
            $student = $this->model->getRegisterById($id);
            $this->view->editStudent($student);
        }

        public function insertEditStudent($id){
            $this->authHelper->checkLoggedIn();
            if(isset($_POST['name']) || isset($_POST['lastName']) || isset($_POST['cellPhone']) || isset($_POST['dni']) || isset($_POST['dateHour'])){
                $name = $_POST['name'];
                $lastName = $_POST['lastName'];
                $cellPhone  = $_POST['cellPhone'];
                $dni  = $_POST['dni'];
                $dateHour  = $_POST['dateHour'];
                $this->model->insertEditStudent($name,$lastName,$cellPhone,$dni,$dateHour,$id);

                header("Location: " . BASE_URL. 'mostarAlumnos');
            }       
        }
        
    }