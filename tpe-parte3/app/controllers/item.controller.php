<?php   

    require_once 'app/models/historial.model.php';
    require_once 'app/views/api.view.php';

    class ItemController{
        private $model;
        private $view;
        private $data;

        function __construct(){
            $this->model = new HistorialModel();
            $this->view = new ApiView();
            $this->data = file_get_contents("php://input");
        }

        public function getData(){
            return json_decode($this->data);
        }

        public function getHistoriallItems(){               
            $fields = ['id', 'fecha_de_prestado', 'fecha_devuelto', 'id_item'];
            $order = ['asc', 'desc'];

            if(isset($_GET['sort']) && isset($_GET['order'])){
                if(in_array($_GET['sort'], $fields) && in_array($_GET['order'], $order)){
                    $sort = $_GET['sort'];
                    $order = $_GET['order'];
                    $record = $this->model->getOrder($sort, $order);
                    $this->view->response($record, 200);
                }else{
                    $this->view->response("No se puede ordenar de esta manera", 404);
                }
            }else{
                $record = $this->model->getAll();
                $this->view->response($record, 200);
            }
        }

        public function getHistoriallItem($params = null){
            $id = $params[':ID'];
            $item = $this->model->getItem($id);
            if($item){
                $this->view->response($item, 200);
            } else{
                $this->view->response("El item con el id=$id no existe", 404);
            }
        }

        public function addItem(){
            $item = $this->getData();
            if(empty($item->fecha_de_prestado) || empty($item->fecha_devuelto) || empty($item->id_item)){
                $this->view->response("Complete todos los datos", 400);
            } else{
                $id = $this->model->insert($item->fecha_de_prestado, $item->fecha_devuelto, $item->id_item);
                if ($id){
                    $this->view->response("Se agregago exitosamente este historial", 201);
                }else{
                    $this->view->response("No se pudo agregar la tarea", 404);
                }
            }
        }

        public function updateItem($params = null){
            $idItem = $params[':ID'];
            $item = $this->getData();
            if(empty($item->fecha_de_prestado) || empty($item->fecha_devuelto) || empty($item->id_item) || empty($idItem)){
                $this->view->response("Complete todos los datos", 400);
            } else{
                $id = $this->model->update($item->fecha_de_prestado, $item->fecha_devuelto, $item->id_item, $idItem);
                if ($id){
                    $this->view->response("Se modifico exitosamente", 200);
                }else{
                    $this->view->response("No se pudo actualizar", 404);
                }
            }
        }


    }