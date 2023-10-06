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

        public function showItems(){
            $items = $this->model->getAllItems();
            $this->view->displayItems($items); 
        }
    }