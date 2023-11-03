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

        function get($params = []){
            if(empty($params)){
                $items = $this->model->getAllItems();
                $this->view->response($items, 200);
            } else {
                $item = $this->model->getRegisterById($params[':ID']);
                if(!empty($item)){
                    $this->view->response($item, 200);
                } else {
                    $this->view->response(['no existe el item con ese id'], 404);
                }
            }
        }
    }