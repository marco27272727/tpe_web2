<?php   
    require_once 'libs/router.php';
    require_once 'app/controllers/item.controller.php';

    // dejo esto comentado como para despues utilizarlo en el postman
    //localhost/TPE_WEB2/tpe-parte3/api/items

    $router = new Router();


    $router->addRoute('items','GET','itemController','getAllItems');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

