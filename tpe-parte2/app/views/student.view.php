<?php   

    class StudentView{

        // funcion que muestra todos los alumnos
        function displayStudents($students){
            require_once 'templates/list.students.phtml';
        } 
    }