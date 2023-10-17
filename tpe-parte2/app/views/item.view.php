<?php

    class ItemView{
 
        //funcion que muestra todos los items que se pueden prestar en el cefce
        function displayItems($items,$students){
            require_once 'templates/list.item.phtml';
        } 
        
        //funcion que muestra los detalles de un items seleccionado
        function showItemDetail($detail,$students){
            require_once 'templates/detail.item.phtml';
        }

        function displayFilterStudent($filterStudent,$name,$students){
            require_once 'templates/filter.student.phtml';
        }

        function displayError($error){
            require_once 'templates/error.phtml';
        }

        function editItem($item){
            require_once 'templates/edit.form.item.phtml';
        }

        function chooseStudent($item,$students){
            require_once 'templates/lend.form.to.student.phtml';
        }
    }