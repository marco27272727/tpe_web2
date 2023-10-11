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

        function insertStudent($name,$lastName,$cellPhone,$dni,$dateHour){
            $query = $this->db->prepare("INSERT INTO alumno (nombre, apellido, numero_celular, dni, fecha_dia) VALUES(?,?,?,?,?)");
            $query->execute([$name,$lastName,$cellPhone,$dni,$dateHour]);
        }

        function removeStudent($id){
            $query = $this->db->prepare("DELETE FROM alumno where id_alumno = ?");
            $query->execute([$id]);
        }
    }