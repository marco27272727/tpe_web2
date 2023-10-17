<?php

    require_once 'config.php';
    
    class AuthModel{
        
        private $db;
        
        public function __construct(){
            $this->db = new PDO('mysql:host='.db_host.';dbname='.db_name.';charset='.db_charset, db_user, db_pass);           
        }

        public function getUsers($username){
            $query = $this->db->prepare('SELECT * FROM users WHERE username = ?');
            $query->execute([$username]);
            $users = $query->fetch(PDO::FETCH_OBJ);
            return $users;
        }
    }