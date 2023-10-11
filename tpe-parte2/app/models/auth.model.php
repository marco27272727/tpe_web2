<?php

    class AuthModel{

        private $db;
        
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_cefce;charset=utf8','root','');
        }
        public function getUsers(){
            $query = $this->db->prepare('SELECT * FROM users');
            $query->execute();
            $users = $query->fetch(PDO::FETCH_OBJ);
            return $users;
        }
    }