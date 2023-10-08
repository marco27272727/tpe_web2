<?php
    require_once './app/controllers/item.controller.php';
    require_once './app/controllers/student.controller.php';

    // tabla de router para el acceso pulico
    //mostrarObjetos -> showItems();
    // detail -> showDetail($id);
    //mostrarAlumnos -> showStudents();
    //alumno -> filterStudent();

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'mostrarObjetos';

    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    $params = explode('/', $action);

    switch($params[0]){
        case 'mostrarObjetos':
            $itemController = new ItemController();
            $itemController->showItems();
            break;
        case 'detalle':
            $itemController = new ItemController();
            $itemController->showDetail($params[1]);
            break;
        case 'mostarAlumnos':
            $studentController = new StudentController();
            $studentController->showStudents();
            break;
        case 'filtro' :
            $itemController = new ItemController();
            $itemController->filterStudent($params[1]);
            break;
        default:
            echo('404 Page not found');
            break;
    }