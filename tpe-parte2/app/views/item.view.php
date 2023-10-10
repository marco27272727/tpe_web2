<?php

    class ItemView{
 
        //funcion que muestra todos los items que se pueden prestar en el cefce
        function displayItems($items,$students){
            require_once 'templates/header.phtml';
            require_once 'templates/list.item.phtml';
        } 
        
        //funcion que muestra los detalles de un items seleccionado
        function showItemDetail($detail,$students){
            require_once 'templates/detail.item.phtml';
        }

        function displayFilterStudent($filterStudent,$name){
            require_once 'templates/filter.student.phtml';
        }
    }