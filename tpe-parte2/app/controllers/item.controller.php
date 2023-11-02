<?php
    require_once './app/models/item.model.php';
    require_once './app/views/item.view.php';
    require_once './app/helpers/auth.helper.php';

    // se crea el objeto controllador de los items que se van a prestar en el cefce
    class ItemController {
        private $model;
        private $view;
        private $modelAlumno;
        private $authHelper;

        public function __construct(){
            $this->model = new ItemModel();
            $this->view = new ItemView();
            $this->modelAlumno = new StudentModel();
            $this->authHelper = new AuthHelper();
            $this->authHelper->init();

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
            $students = $this->modelAlumno->getAllStudents();
            $this->view->displayFilterStudent($filterStudent,$name,$students);
        }

        //funcion que agrega un nuevo item a la tabla de items
        public function addItem(){
            $this->authHelper->checkLoggedIn();
            $type = $_POST['type'];
            $number = $_POST['number'];
            $state  = $_POST['state'];

            if(empty($type) || empty($number) || empty($state)){
                $this->view->displayError("Debe de completar todo los campos");
                return;
            }

            $id = $this->model->insertItem($type,$number,$state);
            if(!$id){
                header('Location: ' . BASE_URL . 'mostrarObjetos');
            }
            else{
                $this->view->displayError("Error al insertar el item");
            }
        }

        //funcion que elimina un item ddeterminado 
        public function deleteItem($id){
            $this->authHelper->checkLoggedIn();
            $this->model->removeItem($id);
            header('Location: ' . BASE_URL . 'mostrarObjetos');
        }

        //funcion que edita un item determinado 
        public function editItem($id){
            $this->authHelper->checkLoggedIn();
            $item = $this->model->getRegisterById($id);
            $this->view->editItem($item);
        }

        // funcion que una vez editado ese item, actualiza en la tabla de items ese item determinado con esa id 
        public function insertItem($id){
            $this->authHelper->checkLoggedIn();
            if(isset($_POST['type']) || isset($_POST['number']) || isset($_POST['state'])){
                $type = $_POST['type'];
                $number = $_POST['number'];
                $state  = $_POST['state'];
                $this->model->insertEditItem($type,$number,$state,$id);

                header('Location: ' . BASE_URL . 'mostrarObjetos');
            }
        }

        // funcion que obtiene la id del estudiante al que se le va a prestar el item y actualiza la fila en la esta
        // ese item y se le agrega en la clave fk la id del estudiante y ademas se actualiza el campo en_uso para saber que esta prestado ese item
        public function lendItem($idItem,$idStudent){
            
            $this->model->updateItem($idItem,$idStudent);
            header('Location: ' . BASE_URL . 'mostrarObjetos');
        }

        // funcion que va a obtener la id del estudiante al cual se le va a prestar la id del item que se eligio
        public function getStudent($id){
            $item = $this->model->getRegisterById($id);
            $students = $this->modelAlumno->getAllStudents();
            $this->view->chooseStudent($item,$students);
        }
        
        //funcion que vuelve a poner en null la fk de ese item determinado y se cambia el campo en_uso para
        // demostrar que ese item se va a poder volver a prestar
        public function returnItem($id){
            $this->model->updateReturnItem($id);
            header('Location: ' . BASE_URL . 'mostrarObjetos');
        }
    }