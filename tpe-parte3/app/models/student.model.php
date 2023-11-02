<?php 

    require_once 'config.php';

    class StudentModel{
        private $db;
        
        public function __construct(){
            $this->db = new PDO('mysql:host='.db_host.';dbname='.db_name.';charset='.db_charset, db_user, db_pass);           
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

        function getRegisterById($id){
            $query = $this->db->prepare("SELECT * FROM alumno where id_alumno = ?");
            $query->execute([$id]);

            $student = $query->fetch(PDO::FETCH_OBJ);
            return $student;
        }

        function insertEditStudent($name,$lastName,$cellPhone,$dni,$dateHour,$id){
            $query = $this->db->prepare("UPDATE alumno SET nombre=?, apellido=?, numero_celular=?, dni=?, fecha_dia=? where id_alumno = ?");
            $query->execute([$name,$lastName,$cellPhone,$dni,$dateHour,$id]);
        }
    }