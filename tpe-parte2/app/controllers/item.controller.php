<?php
    require_once './app/models/item.model.php';
    require_once './app/views/item.view.php';

    // se crea el objeto controllador de los items que se van a prestar en el cefce
    class ItemController {
        private $model;
        private $view;
        private $modelAlumno;

        public function __construct(){
            $this->model = new ItemModel();
            $this->view = new ItemView();
            $this->modelAlumno = new StudentModel();
        }

        // esta funcion del controllador lo que haces es primero traer todos los items que estan en la base de datos y despues los muestra en la pagina
        public function showItems(){
            $items = $this->model->getAllItems();
            $students = $this->modelAlumno->getAllStudents();
            $this->view->displayItems($items,$students); 
        }

        // esta funcion del controllador lo que hace es primero traer los datos de la id especifica que esta en la base de datos y despues muestra los detalles en la pagina
        public function showDetail($id){
            $detail = $this->model->getRegisterById($id);
            $students = $this->modelAlumno->getAllStudents();
            $this->view->showItemDetail($detail,$students);
        }

        // esta funcion del controllador lo que hace primero es obtener el campo nombre de la id especifica
        // despues se une con un join la tabla de tems y alumnos para obtener todos los items que ese alumno reservo
        // y por ultimo con la dos variable obtenidas se lo muestra por la pagina.
        public function filterStudent($id){
            $name = $this->modelAlumno->getNameById($id);
            $filterStudent = $this->model->getFilterStudent($id);
            $this->view->displayFilterStudent($filterStudent,$name);
        }

        public function addItem(){
            $type = $_POST['type'];
            $number = $_POST['number'];
            $state  = $_POST['state'];

            if(empty($type) || empty($number) || empty($state)){
                $this->view->displayError("Debe de completar todo los campos");
                return;
            }

            $id = $this->model->insertItem($type,$number,$state);
            if(!$id){
                header('Location: ' . BASE_URL);
            }
            else{
                $this->view->displayError("Error al insertar el item");
            }
        }

        public function deleteItem($id){
            $this->model->removeItem($id);
            header('Location: ' . BASE_URL);
        }

        public function editItem($id){
            $item = $this->model->getRegisterById($id);
            $this->view->editItem($item);
        }

        public function insertItem($id){
            if(isset($_POST['type']) || isset($_POST['number']) || isset($_POST['state'])){
                $type = $_POST['type'];
                $number = $_POST['number'];
                $state  = $_POST['state'];
                $this->model->insertEditItem($type,$number,$state,$id);

                header("Location: " . BASE_URL);
            }
        }

        public function lendItem($idItem,$idStudent){
            
            $this->model->updateItem($idItem,$idStudent);
            header('Location: ' . BASE_URL);
        }

        public function getStudent($id){
            $item = $this->model->getRegisterById($id);
            $students = $this->modelAlumno->getAllStudents();
            $this->view->chooseStudent($item,$students);
        }
    }