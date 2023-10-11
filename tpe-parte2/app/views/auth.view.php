<?php

    class AuthView{
        //muestra la pagina de autenticación
        function displayAuth(){
            require_once 'templates/auth.phtml';
        }

        //muestra error de autenticacion
        function displayLoginError(){
            echo 'le erraste mi loco';
        }
    }