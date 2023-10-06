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
    }