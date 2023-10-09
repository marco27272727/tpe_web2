<?php

    class ItemModel{
        
        private $db;
        
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_cefce;charset=utf8','root','');
        }
        
        public function getAllItems(){
            $query = $this->db->prepare('SELECT * FROM items');
            $query->execute();
            
            $items = $query->fetchAll(PDO::FETCH_OBJ);
            return $items;
        }

        function getRegisterById($id){
            $query = $this->db->prepare("SELECT * FROM items where id_item=?");
            $query->execute([$id]);
            $item = $query->fetch(PDO::FETCH_OBJ);
    
            return $item;
        }

        // en esta funcion se hizo un join para que de vuelva todos los items que pidio este alumno con esta id especifica.
        function getFilterStudent($id){
            $query = $this->db->prepare("SELECT * FROM items INNER JOIN alumno on items.id_alumno = alumno.id_alumno where items.id_alumno = ? ");
            $query->execute([$id]);

            $filterStudent = $query->fetchAll(PDO::FETCH_OBJ);
            return $filterStudent;
        }
    }