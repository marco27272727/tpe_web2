<?php

    class ItemView{
 
        //funcion que muestra todos los items que se pueden prestar en el cefce
        function displayItems($items){
            require_once './templates/list.item.phtml';
        } 
        
        //funcion que muestra los detalles de un items seleccionado
        function showItemDetail($detail){
            require_once './templates/header.phtml';
            require_once './templates/detail.item.phtml';
        }
    }