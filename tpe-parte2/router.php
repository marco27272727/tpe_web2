<?php
    require_once './app/controllers/item.controller.php';



    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'showObjectos';

    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[0]){
        case 'showObjectos':
            $itemController = new ItemController();
            $itemController->ShowItems();
            break;
        default:
            echo('404 Page not found');
            break;
    }