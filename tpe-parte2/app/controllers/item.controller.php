<?php
    require_once './app/models/item.model.php';
    require_once './app/views/item.view.php';
    require_once './app/models/alumno.model.php';

    // se crea el objeto controllador de los items que se van a prestar en el cefce
    class ItemController {
        private $model;
        private $view;
        private $modelAlumno;

        public function __construct(){
            $this->model = new ItemModel();
            $this->view = new ItemView();
            //$this->modelAlumno = new AlumnoModel(); 
        }

        // esta funcion del controllador lo que haces es primero traer todos los items que estan en la base de datos y despues los muestra en la pagina
        public function showItems(){
            $items = $this->model->getAllItems();
            $this->view->displayItems($items); 
        }

        // esta funcion del controllador lo que hace es primero traer los datos de la id especifica que esta en la base de datos y despues muestra lso detalles en la pagina
        public function showDetail($id){
            $detail = $this->model->getRegisterById($id);
            $this->view->showItemDetail($detail);
        }
    }