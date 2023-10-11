<?php   

    class StudentView{

        // funcion que muestra todos los alumnos
        function displayStudents($students){
            require_once 'templates/list.students.phtml';
        } 

        function displayError($error){
            require_once 'templates/error.phtml';
        }
    }