<?php   

    require_once 'app/models/item.model.php';
    require_once 'app/views/api.view.php';

    class ItemController{
        private $model;
        private $view;

        function __construct(){
            $this->model = new ItemModel();
            $this->view = new ApiView();
        }

        function getAllItems(){
            $items = $this->model->getAllItems();
            $this->view->response($items,200);
        }
    }