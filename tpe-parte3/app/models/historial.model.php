<?php
    require_once 'config.php';

    class HistorialModel{
        
        private $db;
        
        public function __construct(){
            $this->db = new PDO('mysql:host='.db_host.';dbname='.db_name.';charset='.db_charset, db_user, db_pass);           
        }
        
        function getAll($sort, $order) {
            $query = $this->db->prepare('SELECT * FROM historial INNER JOIN items ON historial.id_item = items.id_item ORDER BY '.$sort.' '.$order);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);      
        }

        public function getItem($id){
            $query = $this->db->prepare("SELECT * FROM historial INNER JOIN items ON historial.id_item = items.id_item WHERE historial.id_item = ? ");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function insert($fecha_de_prestado, $fecha_devuelto, $id_item){
            $query = $this->db->prepare("INSERT INTO historial (fecha_de_prestado, fecha_devuelto, id_item) VALUES(?,?,?)");
            $query->execute([$fecha_de_prestado,$fecha_devuelto,$id_item]);
            return $this->db->lastInsertId();
        }

        public function update($fecha_de_prestado, $fecha_devuelto, $id_item, $id){
            $query = $this->db->prepare("UPDATE historial SET fecha_de_prestado = ?, fecha_devuelto = ?, id_item = ? WHERE id=? ");
            $result = $query->execute([$fecha_de_prestado,$fecha_devuelto,$id_item,$id]);
            return $result;
        }
    }