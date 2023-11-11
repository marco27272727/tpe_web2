<?php   
    require_once 'libs/router.php';
    require_once 'app/controllers/item.controller.php';

    // dejo esto comentado como para despues utilizarlo en el postman
    //localhost/TPE_WEB2/tpe-parte3/api/items

    $router = new Router();


    $router->addRoute('historial', 'GET', 'itemController', 'getHistoriallItems');
    $router->addRoute('historial/:ID', 'GET', 'itemController', 'getHistoriallItem');
    $router->addRoute('historial', 'POST', 'itemController', 'addItem');
    $router->addRoute('historial/:ID', 'PUT', 'itemController', 'updateItem');

    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

