<?php 
    class StudentModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_cefce;charset=utf8','root','');
        }

        function getAllStudents(){
            $query = $this->db->prepare("SELECT * FROM alumno");
            $query->execute();

            $students = $query->fetchAll(PDO::FETCH_OBJ);
            return $students;
        }

        //obtengo solamente el campo nombre 
        function getNameById($id){
            $query = $this->db->prepare("SELECT nombre FROM alumno where id_alumno=?");
            $query->execute([$id]);

            $name = $query->fetch(PDO::FETCH_OBJ);
            return $name;
        }
    }